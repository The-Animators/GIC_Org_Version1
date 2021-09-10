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
                                                        <td width="40%">Staff Name :</td>
                                                        <td><strong><span id="staff_name_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="staff_name" class="col-form-label col-md-4 text-right"><strong>Staff Name : </strong></label>
                                                <div class="col-md-8 col-form-label" id="staff_name_det"></div>
                                            </div> -->
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">User Name :</td>
                                                        <td><strong><span id="user_name_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="user_name" class="col-form-label col-md-4 text-right"><strong>User Name : </strong></label>
                                                <div class="col-md-8 col-form-label" id="user_name_det"></div>
                                            </div> -->
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Password :</td>
                                                        <td><strong><span id="password_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="password" class="col-form-label col-md-4 text-right"><strong>Password : </strong></label>
                                                <div class="col-md-8 col-form-label" id="password_det"></div>
                                            </div> -->
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Email :</td>
                                                        <td><strong><span id="email_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="email" class="col-form-label col-md-4 text-right"><strong>Email : </strong></label>
                                                <div class="col-md-8 col-form-label" id="email_det"></div>
                                            </div> -->
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Mobile :</td>
                                                        <td><strong><span id="staff_mobile_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="email" class="col-form-label col-md-4 text-right"><strong>Mobile : </strong></label>
                                                <div class="col-md-8 col-form-label" id="staff_mobile_det"></div>
                                            </div> -->
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">User Roles :</td>
                                                        <td><strong><span id="roles_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="user_role" class="col-form-label col-md-4 text-right"><strong>User Roles : </strong></label>
                                                <div class="col-md-8 col-form-label" id="roles_det"></div>
                                            </div> -->
                                        </div>

                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">DOJ :</td>
                                                        <td><strong><span id="staff_doj_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="staff_doj" class="col-form-label col-md-4 text-right"><strong>DOJ : </strong></label>
                                                <div class="col-md-8 col-form-label" id="staff_doj_det"></div>
                                            </div> -->
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Sallary :</td>
                                                        <td><strong><span id="staff_sallary_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="staff_sallary" class="col-form-label col-md-4 text-right"><strong>Sallary : </strong></label>
                                                <div class="col-md-8 col-form-label" id="staff_sallary_det"></div>
                                            </div> -->
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Profile :</td>
                                                        <td><strong><span id="staff_profile_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="staff_profile" class="col-form-label col-md-4 text-right"><strong>Profile : </strong></label>
                                                <div class="col-md-8 col-form-label" id="staff_profile_det"></div>
                                            </div> -->
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">PAN :</td>
                                                        <td><strong><span id="staff_pan_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="staff_pan" class="col-form-label col-md-4 text-right"><strong>PAN : </strong></label>
                                                <div class="col-md-8 col-form-label" id="staff_pan_det"></div>
                                            </div> -->
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Aadhar :</td>
                                                        <td><strong><span id="staff_aadhar_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="staff_aadhar" class="col-form-label col-md-4 text-right"><strong>Aadhar : </strong></label>
                                                <div class="col-md-8 col-form-label" id="staff_aadhar_det"></div>
                                            </div> -->
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Description :</td>
                                                        <td><strong><span id="staff_desc_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="email" class="col-form-label col-md-4 text-right"><strong>Description : </strong></label>
                                                <div class="col-md-8 col-form-label" id="staff_desc_det"></div>
                                            </div> -->
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group row" id="role_permission">
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
                                                        <option value="<?php echo $i; ?>" <?php // if ($i == $currently_selected) echo "selected"; ?>><?php echo $i; ?></option>
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
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_staff_data"></span></h4>
                            </div>
                            <!-- <div class="col-md-4">

                            </div> -->
                            <div class="col-md-6 text-right">
                                <a id="AddForm" href="<?php echo base_url() . "master/staff/staff/1"; ?>" class='btn btn-facebook btn-xs'>Add</a>
                                <button type="submit" id="filter_btn" class="btn btn-outline-secondary waves-effect btn-xs"><b><i class="mdi mdi-magnify"></i>&nbsp;Filter Off</b></button>
                            </div>
                        </div>

                        <div class="table-cont">
                            <table class="commission_table fixed" id="commission_table" border="1">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>Action</center>
                                        </th>
                                        <th>
                                            <center>SN.</center>
                                        </th>
                                        <th>
                                            <center>Staff Name</center>
                                        </th>
                                        <th>
                                            <center>User Name</center>
                                        </th>
                                        <th>
                                            <center>Password</center>
                                        </th>
                                        <th>
                                            <center>User Role</center>
                                        </th>
                                        <th>
                                            <center>Email</center>
                                        </th>
                                        <th>
                                            <center>Mobile</center>
                                        </th>
                                        <th>
                                            <center>DOJ</center>
                                        </th>
                                        <th>
                                            <center>Sallary</center>
                                        </th>
                                        <th>
                                            <center>Profile</center>
                                        </th>
                                        <th>
                                            <center>PAN</center>
                                        </th>
                                        <th>
                                            <center>Aadhar</center>
                                        </th>
                                        <th>
                                            <center>Description</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="tableData"></tbody>
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

        var url = "<?php echo $base_url; ?>master/staff/filter_staff";

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
                    var total_staff_data = 0;
                    $("#total_staff_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var staff_id = "";
                        var staff_name = "";
                        var staff_username = "";
                        var staff_email = "";
                        var user_role_title = "";
                        var staff_status = "";
                        var datas = "";
                        var status = "";
                        var isActive = "";
                        var datas = "";

                        total_staff_data = data["total_staff_data"];
                        $("#total_staff_data").text(" Count ( " + total_staff_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            staff_id = parseInt(data[key].staff_id);
                            staff_name = data[key].staff_name;
                            staff_username = data[key].staff_username;
                            staff_email = data[key].staff_email;
                            staff_mobile = data[key].staff_mobile;
                            staff_desc = data[key].staff_desc;
                            user_role_title = data[key].user_role_title;
                            staff_password = data[key].staff_password;
                            staff_doj = data[key].staff_doj;
                            staff_sallary = data[key].staff_sallary;
                            staff_profile = data[key].staff_profile;
                            staff_pan = data[key].staff_pan;
                            staff_aadhar = data[key].staff_aadhar;
                            staff_status = data[key].staff_status;
                            isActive = data[key].del_flag;

                            if (staff_name == "" || staff_name == null || staff_name == undefined)
                                staff_name = "";
                            else
                                staff_name = staff_name;

                            if (staff_username == "" || staff_username == null || staff_username == undefined)
                                staff_username = "";
                            else
                                staff_username = staff_username;

                            if (staff_email == "" || staff_email == null || staff_email == undefined)
                                staff_email = "";
                            else
                                staff_email = staff_email;

                            if (staff_mobile == "" || staff_mobile == null || staff_mobile == undefined)
                                staff_mobile = "";
                            else
                                staff_mobile = staff_mobile;

                            if (staff_desc == "" || staff_desc == null || staff_desc == undefined)
                                staff_desc = "";
                            else
                                staff_desc = staff_desc;

                            if (user_role_title == "" || user_role_title == null || user_role_title == undefined)
                                user_role_title = "";
                            else
                                user_role_title = user_role_title;

                            if (staff_password == "" || staff_password == null || staff_password == undefined)
                                staff_password = "";
                            else
                                staff_password = staff_password;

                            if (staff_doj == "" || staff_doj == null || staff_doj == undefined)
                                staff_doj = "";
                            else
                                staff_doj = staff_doj;

                            if (staff_sallary == "" || staff_sallary == null || staff_sallary == undefined)
                                staff_sallary = "";
                            else
                                staff_sallary = staff_sallary;


                            if (!isNaN(staff_id)) {
                                if (staff_status == 1) {
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
                                    var delete_btn_txt = "<a class='dropdown-item delete' href='javascript:void(0);' id='delete' value='' type='button' onClick ='OnDelete(" + staff_id + ")' ><b>Delete</b></a>";
                                    // var delete_btn_txt = "<button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + staff_id + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item recover' href='javascript:void(0);' id='recover' value='' type='button' onClick ='OnRecover(" + staff_id + ")' ><b>Recover</b></a>";
                                    // "<button id='recover' onclick='OnRecover(" + staff_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                                }
                                var view_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view' id='view' value='' type='button' onClick ='onView(" + staff_id + ")' >View</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' value='' type='button' onClick ='onView(" + staff_id + ")'><b>View</b></a><a class='dropdown-item edit' href='<?php echo base_url() . 'master/staff/staff/0/'; ?>" + staff_id + "' id='edit'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + staff_id + "' href='javascript:void(0);' id='status_btn_" + staff_id + "' value='' type='button' onClick ='updateStatus(" + staff_id + "," + staff_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                if (staff_profile == "" || staff_profile == null || staff_profile == undefined) {
                                    var view_staff_profile = "";
                                    var download_staff_profile = "";
                                    var delete_staff_profile = "";
                                } else if (staff_profile != "") {
                                    var view_staff_profile = "<a href='<?php echo base_url(); ?>master/staff/view_doc/1/" + staff_id + "/" + staff_profile + "'  class='text-info'  target='_blank'><b>View</b></a>";
                                    var download_staff_profile = "<a href='<?php echo base_url(); ?>master/staff/download_doc/1/" + staff_id + "/" + staff_profile + "'  class='text-success'><b>Download</b></a>";
                                    var delete_staff_profile = "<a onclick=OnDelete_Doc('" + staff_id + ',' + 1 + ',' + staff_profile + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b>Remove</b></a>";
                                }

                                if (staff_pan == "" || staff_pan == null || staff_pan == undefined) {
                                    var view_staff_pan = "";
                                    var download_staff_pan = "";
                                    var delete_staff_pan = "";
                                } else if (staff_pan != "") {
                                    var view_staff_pan = "<a href='<?php echo base_url(); ?>master/staff/view_doc/2/" + staff_id + "/" + staff_pan + "'  class='text-info'  target='_blank'><b>View</b></a>";
                                    var download_staff_pan = "<a href='<?php echo base_url(); ?>master/staff/download_doc/2/" + staff_id + "/" + staff_pan + "'  class='text-success'><b>Download</b></a>";
                                    var delete_staff_pan = "<a onclick=OnDelete_Doc('" + staff_id + ',' + 2 + ',' + staff_pan + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b>Remove</b></a>";
                                }

                                if (staff_aadhar == "" || staff_aadhar == null || staff_aadhar == undefined) {
                                    var view_staff_aadhar = "";
                                    var download_staff_aadhar = "";
                                    var delete_staff_aadhar = "";
                                } else if (staff_aadhar != "") {
                                    var view_staff_aadhar = "<a href='<?php echo base_url(); ?>master/staff/view_doc/3/" + staff_id + "/" + staff_aadhar + "'  class='text-info'  target='_blank'><b>View</b></a>";
                                    var download_staff_aadhar = "<a href='<?php echo base_url(); ?>master/staff/download_doc/3/" + staff_id + "/" + staff_aadhar + "'  class='text-success'><b>Download</b></a>";
                                    var delete_staff_aadhar = "<a onclick=OnDelete_Doc('" + staff_id + ',' + 3 + ',' + staff_aadhar + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b>Remove</b></a>";
                                }

                                edit_btn = " <a href='<?php echo base_url() . "master/staff/staff/0/"; ?>" + staff_id + "' class='btn btn-facebook waves-effect waves-light btn-xs edit' id='edit'>Edit Staff</a>";
                                status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + staff_id + "' value='' type='button' onClick ='updateStatus(" + staff_id + "," + staff_status + ")' >" + status + "</button>";

                                datas += '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + "<br/>" + badge_status + '</td><td>' + sn + '</td><td><center>' + staff_name + '</center></td> <td>' + staff_username + '</td><td>' + staff_password + '</td> <td>' + user_role_title + '</td><td>' + staff_email + '</td><td>' + staff_mobile + '</td> <td>' + staff_doj + '</td><td>' + staff_sallary + '</td><td>' + view_staff_profile + "  " + download_staff_profile + "  " + delete_staff_profile + '</td><td>' + view_staff_pan + "  " + download_staff_pan + "  " + delete_staff_pan + '</td><td>' + view_staff_aadhar + "  " + download_staff_aadhar + "  " + delete_staff_aadhar + '</td><td>' + staff_desc + '</td> </tr>';
                            }
                        });

                    } else {
                        $("#total_staff_data").text(" Count ( " + total_staff_data + " ) ");
                        datas = '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="11"><center>Data Not Found</center></td> </tr>';
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

        // $("#filter_year").val();
        $("#filter_month").val("null");
        $("#filter_day").val("null");
        $("#filter_staff").val("null");
        $("#filter_user_role").val("null");
        $("#filter_status").val("null");
        $("#filter_staff").prop('selectedIndex', 0);
        $("#filter_user_role").prop('selectedIndex', 0);
        getStaffList();
    }


    function OnRecover(staff_id) {
        // var staff_id = $("#staff_id").text();
        var url = "<?php echo $base_url; ?>master/staff/recover_staff";
        confirmation_alert(id = staff_id, url = url, title = "Staff", type = "Recover");
    }

    function OnDelete(staff_id) {
        // var staff_id = $("#staff_id").text();
        var url = "<?php echo $base_url; ?>master/staff/remove_staff";
        confirmation_alert(id = staff_id, url = url, title = "Staff", type = "Delet");
    }

    function OnDelete_Doc(staff_doc_details) {
        var staff_doc_details = staff_doc_details.split(",");
        var staff_id = staff_doc_details[0];
        var doc_type = staff_doc_details[1];
        var doc_name = staff_doc_details[2];
        var url = staff_doc_details[3];
        if (doc_type == 1)
            var title = "Profile Photo";
        else if (doc_type == 2)
            var title = "PAN Card Document";
        else if (doc_type == 3)
            var title = "Aadhar Card Document";
        document_confirmation_alert(id = staff_id, doc_type = doc_type, doc_name = doc_name, url = url, title = title, type = "Delet");
    }

    function onView(val) {
        // clearError();
        $('#view_form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/staff/edit_staff";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    staff_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},

                success: function(data) {
                    $("#staff_name_det").text(data["userdata"].staff_name);
                    $("#user_name_det").text(data["userdata"].staff_username);
                    // $("#password_det").text(data["userdata"].staff_password);
                    staff_passs_show_btn = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="show_password" onclick=show_password_single("' + data["userdata"].staff_password + '","' + data["userdata"].staff_id + '");> <i class="mdi mdi-eye mdi-18"></i></a>';
                    $("#password_det").html(asteriskCard(data["userdata"].staff_password) + staff_passs_show_btn);
                    $("#email_det").text(data["userdata"].staff_email);
                    $("#roles_det").text(data["userdata"].user_role_title);

                    $("#staff_doj_det").text(data["userdata"].staff_doj);
                    $("#staff_sallary_det").text(data["userdata"].staff_sallary);
                    $("#staff_mobile_det").text(data["userdata"].staff_mobile);
                    $("#staff_desc_det").text(data["userdata"].staff_desc);

                    if (data["userdata"].staff_profile == "" || data["userdata"].staff_profile == null || data["userdata"].staff_profile == undefined) {
                        var view_staff_profile = "";
                        var download_staff_profile = "";
                        var delete_staff_profile = "";
                    } else if (data["userdata"].staff_profile != "") {
                        var view_staff_profile = "<a href='<?php echo base_url(); ?>master/staff/view_doc/1/" + data["userdata"].staff_id + "/" + data["userdata"].staff_profile + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        var download_staff_profile = "<a href='<?php echo base_url(); ?>master/staff/download_doc/1/" + data["userdata"].staff_id + "/" + data["userdata"].staff_profile + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        var delete_staff_profile = "<a onclick=OnDelete_Doc('" + data["userdata"].staff_id + ',' + 1 + ',' + data["userdata"].staff_profile + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                    }
                    $("#staff_profile_det").html(view_staff_profile + "&nbsp;&nbsp;&nbsp;" + download_staff_profile + "&nbsp;&nbsp;&nbsp;" + delete_staff_profile);

                    if (data["userdata"].staff_pan == "" || data["userdata"].staff_pan == null || data["userdata"].staff_pan == undefined) {
                        var view_staff_pan = "";
                        var download_staff_pan = "";
                        var delete_staff_pan = "";
                    } else if (data["userdata"].staff_pan != "") {
                        var view_staff_pan = "<a href='<?php echo base_url(); ?>master/staff/view_doc/2/" + data["userdata"].staff_id + "/" + data["userdata"].staff_pan + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        var download_staff_pan = "<a href='<?php echo base_url(); ?>master/staff/download_doc/2/" + data["userdata"].staff_id + "/" + data["userdata"].staff_pan + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        var delete_staff_pan = "<a onclick=OnDelete_Doc('" + data["userdata"].staff_id + ',' + 2 + ',' + data["userdata"].staff_pan + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                    }
                    $("#staff_pan_det").html(view_staff_pan + "&nbsp;&nbsp;&nbsp;" + download_staff_pan + "&nbsp;&nbsp;&nbsp;" + delete_staff_pan);

                    if (data["userdata"].staff_aadhar == "" || data["userdata"].staff_aadhar == null || data["userdata"].staff_aadhar == undefined) {
                        var view_staff_aadhar = "";
                        var download_staff_aadhar = "";
                        var delete_staff_aadhar = "";
                    } else if (data["userdata"].staff_aadhar != "") {
                        var view_staff_aadhar = "<a href='<?php echo base_url(); ?>master/staff/view_doc/3/" + data["userdata"].staff_id + "/" + data["userdata"].staff_aadhar + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        var download_staff_aadhar = "<a href='<?php echo base_url(); ?>master/staff/download_doc/3/" + data["userdata"].staff_id + "/" + data["userdata"].staff_aadhar + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        var delete_staff_aadhar = "<a onclick=OnDelete_Doc('" + data["userdata"].staff_id + ',' + 3 + ',' + data["userdata"].staff_aadhar + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                    }
                    $("#staff_aadhar_det").html(view_staff_aadhar + "&nbsp;&nbsp;&nbsp;" + download_staff_aadhar + "&nbsp;&nbsp;&nbsp;" + delete_staff_aadhar);

                    //  $("#staff_profile_det").text(data["userdata"].staff_profile);
                    //  $("#staff_pan_det").text(data["userdata"].staff_pan);
                    //  $("#staff_aadhar_det").text(data["userdata"].staff_aadhar);

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function show_password_single(staff_password, staff_id) {
        $("#password_det").html("");
        $("#password_det").html("Please Wait ....");
        setTimeout(function() {
            $("#password_det").html("");
            $("#password_det").html("Please Wait ....");
            $("#password_det").html("");
            $("#password_det").html(staff_password + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="hide_password_' + staff_id + '" onclick=hide_password_single("' + staff_password + '","' + staff_id + '");> <i class="mdi mdi-incognito mdi-18"></i> </a>');
        }, 3000);
    }

    function hide_password_single(staff_password, staff_id) {
        $("#password_det").html("");
        $("#password_det").html("Please Wait ....");
        setTimeout(function() {
            $("#password_det").html("");
            $("#password_det").html("Please Wait ....");
            $("#password_det").html("");
            $("#password_det").html(staff_password_astrix + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="show_password_' + staff_id + '" onclick=show_password_single("' + staff_password + '","' + staff_id + '");> <i class="mdi mdi-eye mdi-18"></i> </a>');
        }, 3000);
        staff_password_astrix = asteriskCard(staff_password);
    }

    function asteriskCard(string) {
        var lastfour = string.length > 8 ? string.substr(string.length - (string.length - 9)) : "";
        var firstfour = string.substr(0, 1);
        var dots = '*****'.substring(0, string.length - 1);
        var total = (firstfour) + (dots.length > 0 ? '' + dots + '' : dots) + (lastfour);
        return total;
    }

    getStaffList();

    function getStaffList() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/staff/get_staff_list";
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
                    var total_staff_data = 0;
                    $("#total_staff_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var staff_id = "";
                        var staff_name = "";
                        var staff_username = "";
                        var staff_email = "";
                        var user_role_title = "";
                        var staff_status = "";
                        var datas = "";
                        var status = "";
                        var isActive = "";
                        total_staff_data = data["total_staff_data"];
                        $("#total_staff_data").text(" Count ( " + total_staff_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            staff_id = parseInt(data[key].staff_id);
                            staff_name = data[key].staff_name;
                            staff_username = data[key].staff_username;
                            staff_email = data[key].staff_email;
                            staff_mobile = data[key].staff_mobile;
                            staff_desc = data[key].staff_desc;
                            user_role_title = data[key].user_role_title;
                            staff_password = data[key].staff_password;
                            staff_doj = data[key].staff_doj;
                            staff_sallary = data[key].staff_sallary;
                            staff_profile = data[key].staff_profile;
                            staff_pan = data[key].staff_pan;
                            staff_aadhar = data[key].staff_aadhar;
                            staff_status = data[key].staff_status;
                            isActive = data[key].del_flag;
                            // alert(staff_doj);
                            if (staff_name == "" || staff_name == null || staff_name == undefined)
                                staff_name = "";
                            else
                                staff_name = staff_name;

                            if (staff_username == "" || staff_username == null || staff_username == undefined)
                                staff_username = "";
                            else
                                staff_username = staff_username;

                            if (staff_email == "" || staff_email == null || staff_email == undefined)
                                staff_email = "";
                            else
                                staff_email = staff_email;

                            if (staff_mobile == "" || staff_mobile == null || staff_mobile == undefined)
                                staff_mobile = "";
                            else
                                staff_mobile = staff_mobile;

                            if (staff_desc == "" || staff_desc == null || staff_desc == undefined)
                                staff_desc = "";
                            else
                                staff_desc = staff_desc;

                            if (user_role_title == "" || user_role_title == null || user_role_title == undefined)
                                user_role_title = "";
                            else
                                user_role_title = user_role_title;

                            if (staff_password == "" || staff_password == null || staff_password == undefined)
                                staff_password = "";
                            else
                                staff_password = staff_password;

                            if (staff_doj == "" || staff_doj == null || staff_doj == undefined)
                                staff_doj = "";
                            else
                                staff_doj = staff_doj;

                            if (staff_sallary == "" || staff_sallary == null || staff_sallary == undefined)
                                staff_sallary = "";
                            else
                                staff_sallary = staff_sallary;


                            if (!isNaN(staff_id)) {
                                if (staff_status == 1) {
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
                                    var delete_btn_txt = "<a class='dropdown-item delete' href='javascript:void(0);' id='delete' value='' type='button' onClick ='OnDelete(" + staff_id + ")' ><b>Delete</b></a>";
                                    // var delete_btn_txt = "<button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + staff_id + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item recover' href='javascript:void(0);' id='recover' value='' type='button' onClick ='OnRecover(" + staff_id + ")' ><b>Recover</b></a>";
                                    // "<button id='recover' onclick='OnRecover(" + staff_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                                }
                                var view_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view' id='view' value='' type='button' onClick ='onView(" + staff_id + ")' >View</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' value='' type='button' onClick ='onView(" + staff_id + ")'><b>View</b></a><a class='dropdown-item edit' href='<?php echo base_url() . 'master/staff/staff/0/'; ?>" + staff_id + "' id='edit'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + staff_id + "' href='javascript:void(0);' id='status_btn_" + staff_id + "' value='' type='button' onClick ='updateStatus(" + staff_id + "," + staff_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                if (staff_profile == "" || staff_profile == null || staff_profile == undefined) {
                                    var view_staff_profile = "";
                                    var download_staff_profile = "";
                                    var delete_staff_profile = "";
                                } else if (staff_profile != "") {
                                    var view_staff_profile = "<a href='<?php echo base_url(); ?>master/staff/view_doc/1/" + staff_id + "/" + staff_profile + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                    var download_staff_profile = "<a href='<?php echo base_url(); ?>master/staff/download_doc/1/" + staff_id + "/" + staff_profile + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                    var delete_staff_profile = "<a onclick=OnDelete_Doc('" + staff_id + ',' + 1 + ',' + staff_profile + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                                }

                                if (staff_pan == "" || staff_pan == null || staff_pan == undefined) {
                                    var view_staff_pan = "";
                                    var download_staff_pan = "";
                                    var delete_staff_pan = "";
                                } else if (staff_pan != "") {
                                    var view_staff_pan = "<a href='<?php echo base_url(); ?>master/staff/view_doc/2/" + staff_id + "/" + staff_pan + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                    var download_staff_pan = "<a href='<?php echo base_url(); ?>master/staff/download_doc/2/" + staff_id + "/" + staff_pan + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                    var delete_staff_pan = "<a onclick=OnDelete_Doc('" + staff_id + ',' + 2 + ',' + staff_pan + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                                }

                                if (staff_aadhar == "" || staff_aadhar == null || staff_aadhar == undefined) {
                                    var view_staff_aadhar = "";
                                    var download_staff_aadhar = "";
                                    var delete_staff_aadhar = "";
                                } else if (staff_aadhar != "") {
                                    var view_staff_aadhar = "<a href='<?php echo base_url(); ?>master/staff/view_doc/3/" + staff_id + "/" + staff_aadhar + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                    var download_staff_aadhar = "<a href='<?php echo base_url(); ?>master/staff/download_doc/3/" + staff_id + "/" + staff_aadhar + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                    var delete_staff_aadhar = "<a onclick=OnDelete_Doc('" + staff_id + ',' + 3 + ',' + staff_aadhar + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                                }

                                edit_btn = " <a href='<?php echo base_url() . "master/staff/staff/0/"; ?>" + staff_id + "' class='btn btn-facebook waves-effect waves-light btn-xs edit' id='edit'>Edit Staff</a>";
                                status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + staff_id + "' value='' type='button' onClick ='updateStatus(" + staff_id + "," + staff_status + ")' >" + status + "</button>";

                                datas += '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + "<br/>" + badge_status + '</td><td>' + sn + '</td><td><center>' + staff_name + '</center></td> <td>' + staff_username + '</td><td>' + staff_password + '</td> <td>' + user_role_title + '</td><td>' + staff_email + '</td><td>' + staff_mobile + '</td> <td>' + staff_doj + '</td><td>' + staff_sallary + '</td><td>' + view_staff_profile + "&nbsp;&nbsp;&nbsp;" + download_staff_profile + "&nbsp;&nbsp;&nbsp;" + delete_staff_profile + '</td><td>' + view_staff_pan + "&nbsp;&nbsp;&nbsp;" + download_staff_pan + "&nbsp;&nbsp;&nbsp;" + delete_staff_pan + '</td><td>' + view_staff_aadhar + "&nbsp;&nbsp;&nbsp;" + download_staff_aadhar + "&nbsp;&nbsp;&nbsp;" + delete_staff_aadhar + '</td><td>' + staff_desc + '</td> </tr>';

                                // datas += '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + "<br/>" + badge_status + '</td><td>' + staff_name + '</td> <td>' + staff_username + '</td><td>' + staff_password + '</td> <td>' + user_role_title + '</td><td>' + staff_email + '</td> <td>' + staff_doj + '</td><td>' + staff_sallary + '</td><td>' + view_staff_profile + "  " + download_staff_profile + "  " + delete_staff_profile + '</td><td>' + view_staff_pan + "  " + download_staff_pan + "  " + delete_staff_pan + '</td><td>' + view_staff_aadhar + "  " + download_staff_aadhar + "  " + delete_staff_aadhar + '</td> </tr>';
                            }
                        });

                    } else {
                        $("#total_staff_data").text(" Count ( " + total_staff_data + " ) ");
                        datas = '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="11"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function updateStatus(staff_id, staff_status) {

        var url = "<?php echo $base_url; ?>master/staff/update_staff_status";

        if (staff_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": staff_id,
                    "status": staff_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + staff_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["staff_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                            $("#edit_" + staff_id).addClass(status_btn_txt);
                            $("#status_btn_" + staff_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                            $("#edit_" + staff_id).addClass(status_btn_txt);
                            $("#status_btn_" + staff_id).text(status);
                        }

                        $("#status_btn_" + staff_id).text(status);


                        $('#status_btn_' + staff_id).attr('onClick', 'updateStatus(' + staff_id + ',' + data["userdata"]["menu_status"] + ')');

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
                CheckFormAccess(submenu_permission, 2, url);
                check(role_permission, 2);
            }
        }
    });
</script>