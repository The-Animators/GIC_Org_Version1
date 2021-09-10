<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<script>
    $(function() {
        var window_size = $(window).width(); // returns width of browser viewport
        var html_size = $(document).width(); // returns width of HTML document
        $(".wrapper1").width(window_size);
        $(".wrapper2").width(window_size);
        // alert(html_size);
        // alert(window_size);
        $(".wrapper1").scroll(function() {
            $(".wrapper2").scrollLeft($(".wrapper1").scrollLeft());
        });
        $(".wrapper2").scroll(function() {
            $(".wrapper1").scrollLeft($(".wrapper2").scrollLeft());
        });
    });
</script>
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
                                            <label for="filter_year" class="col-form-label col-md-4 text-right">Year : </label>
                                            <div class="col-md-8">
                                                <select class="form-control" id="filter_year" name="filter_year">
                                                    <option value="null">Select Year</option>
                                                    <?php
                                                    $currently_selected = date('Y');
                                                    $earliest_year = 1950;
                                                    $latest_year = date('Y', strtotime('+80 years'));;
                                                    foreach (range($latest_year, $earliest_year) as $i) :
                                                    ?>
                                                        <option value="<?php echo $i; ?>" <?php if ($i == $currently_selected) echo "selected"; ?>><?php echo $i; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 row">
                                            <label for="filter_month" class="col-form-label col-md-4 text-right">Month : </label>
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
                                        <div class="col-md-4 row">
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
                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_policy_no" class="col-form-label col-md-4 text-right">Policy No.</label>
                                            <div class="col-md-8" id="task_title_div">
                                                <input type="text" class="form-control" id="filter_policy_no" name="filter_policy_no" placeholder="Enter Policy No.">
                                            </div>
                                        </div>
                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_prev_policy_no" class="col-form-label col-md-4 text-right">Previous Year Policy No.</label>
                                            <div class="col-md-8" id="task_title_div">
                                                <input type="text" class="form-control" id="filter_prev_policy_no" name="filter_prev_policy_no" placeholder="Enter Previous Year Policy No.">
                                            </div>
                                        </div>
                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_company" class="col-form-label col-md-4 text-right">Company</label>
                                            <div class="col-md-8">
                                                <select class="form-control" data-toggle="select2" id="filter_company" name="filter_company" onchange="company_department();DepartmentBasedPolicyName();company_agency();">
                                                    <option value="null">Select Company</option>
                                                    <?php $company = company_dropdown();
                                                    if (!empty($company)) : foreach ($company as $row) : ?>
                                                            <option value="<?php echo $row["mcompany_id"]; ?>"><?php echo ucwords($row["company_name"]); ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_department" class="col-form-label col-md-4 text-right">Department</label>
                                            <div class="col-md-8">
                                                <select name="filter_department" id="filter_department" class="form-control" data-toggle="select2" onchange="DepartmentBasedPolicyName();">
                                                    <option value="null">Select Department</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_policy_name" class="col-form-label col-md-4 text-right">Policy Name</label>
                                            <div class="col-md-8">
                                                <select name="filter_policy_name" id="filter_policy_name" class="form-control" data-toggle="select2">
                                                    <option value="null">Select Policy Name</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_policy_type" class="col-form-label col-md-4 text-right">Policy Type</label>
                                            <div class="col-md-8">
                                                <select name="filter_policy_type" id="filter_policy_type" class="form-control">
                                                    <option value="null">Select Policy Type</option>
                                                    <option value="1">Individual</option>
                                                    <option value="2">Floater</option>
                                                    <option value="3">Residential & Commercial</option>
                                                    <option value="4">Common Individual</option>
                                                    <option value="5">Common Floater</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_agency" class="col-form-label col-md-4 text-right">Agency</label>
                                            <div class="col-md-8">
                                                <select name="filter_agency" id="filter_agency" class="form-control" data-toggle="select2">
                                                    <option value="null">Select Agency Code</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_sub_agency_code" class="col-form-label col-md-4 text-right">Sub-Agency Code</label>
                                            <div class="col-md-8">
                                                <select name="filter_sub_agency_code" id="filter_sub_agency_code" class="form-control" data-toggle="select2">
                                                    <option value="0">Nil</option>
                                                    <?php $subagency = subagency_dropdown();
                                                    if (!empty($subagency)) : foreach ($subagency as $row5) : ?>
                                                            <option value="<?php echo $row5["sub_agent_id"]; ?>"><?php echo ucwords($row5["sub_agent_code"]); ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_group_name" class="col-form-label col-md-4 text-right">Group Name</label>
                                            <div class="col-md-8">
                                                <select name="filter_group_name" id="filter_group_name" class="form-control" onchange="GroupNameBasedMemberName();" data-toggle="select2">
                                                    <option value="null">Select Group Name</option>
                                                    <?php $client_groupname = client_groupname_dropdown();
                                                    if (!empty($client_groupname)) : foreach ($client_groupname as $row6) : ?>
                                                            <option value="<?php echo $row6["id"]; ?>"><?php echo ucwords($row6["grpname"]); ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_policy_holder" class="col-form-label col-md-4 text-right">Policy Holder</label>
                                            <div class="col-md-8">
                                                <select name="filter_policy_holder" id="filter_policy_holder" class="form-control" data-toggle="select2">
                                                    <option value="null">Select Policy Holder</option>
                                                    <?php if (!empty($policy_holder)) : foreach ($policy_holder as $row) : ?>
                                                            <option value="<?php echo $row["id"]; ?>"><?php echo $row["member_name"]; ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
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
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_policy_data"></span></h4>
                            </div>
                            <!-- <div class="col-md-4">

                            </div> -->
                            <div class="col-md-6 text-right">
                                <a id="AddForm" href="<?php echo base_url() . "master/policy/add_policy"; ?>" class='btn btn-facebook btn-xs'>Add</a>
                                <button type="submit" id="filter_btn" class="btn btn-outline-secondary waves-effect btn-xs"><b><i class="mdi mdi-magnify"></i>&nbsp;Filter Off</b></button>
                            </div>
                        </div>

                        <!-- <table id="datatable" class="table  table-striped table-bordered  dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;"> -->
                        <div class="wrapper1">
                            <div class="div1"></div>
                        </div>
                        <div class="wrapper2">
                            <div class="div2">
                                <div class="table-cont">
                                    <table class="commission_table fixed" id="commission_table" border="1">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>SN.</th>
                                                <th>
                                                    <center>Serial No.</center>
                                                </th>
                                                <th>Group Name</th>
                                                <th>Policy Holder</th>
                                                <th>Department</th>
                                                <th>Policy Name</th>
                                                <th>Policy No.</th>
                                                <th>Sum Insured</th>
                                                <th>Premium</th>
                                                <th>Date From</th>
                                                <th>Date To</th>
                                                <th>Policy PDF</th>
                                                <th>Commission Received</th>
                                                <th>Endorsements</th>
                                                <th>Claims</th>
                                                <th>Company</th>
                                                <th>Previous Year Policy No.</th>
                                                <th>Agency</th>
                                                <th>Sub agency</th>
                                                <th>Type</th>
                                                <!-- <th>Month</th>
                                                 <th>Year</th> -->
                                                <th>Type of policy</th>
                                            </tr>
                                        </thead>

                                        <tbody id="tableData">

                                        </tbody>
                                    </table>
                                </div>
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

        function company_department() {
            var company = $("#filter_company").val();

            var url = "<?php echo $base_url; ?>master/policy/get_companybased_department";

            if (company != "") {
                $.ajax({
                    url: url,
                    data: {
                        company: company
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            var val = data["userdata"];
                            $('#filter_department').html("<option value='null'>Select Department</option>");
                            var option_val = "";
                            for (var i = 0; i < val.length; i++) {
                                var department_id = val[i]["department_id"];
                                var department_name = val[i]["department_name"].charAt(0).toUpperCase() + val[i]["department_name"].slice(1);
                                option_val += '<option value="' + department_id + '">' + department_name + '</option>';
                            }
                        } else {
                            $('#filter_department').html("<option value='null'>Select Department</option>");
                        }
                        $('#filter_department').append(option_val);
                    },
                    error: function(xhr, status) {
                        alert('Sorry, there was a problem!');
                    },
                    complete: function(xhr, status) {

                    }
                });
            }
        }

        function DepartmentBasedPolicyName() {
            var department = $("#filter_department").val();
            var company = $("#filter_company").val();

            var url = "<?php echo $base_url; ?>master/policy/get_departmentBased_policyname";

            if (department != "") {
                $.ajax({
                    url: url,
                    data: {
                        department: department,
                        company: company,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            var val = data["userdata"];
                            $('#filter_policy_name').html("<option value='null'>Select Policy Name</option>");
                            var option_val = "";
                            for (var i = 0; i < val.length; i++) {
                                var policy_type_id = val[i]["policy_type_id"];
                                var policy_type = val[i]["policy_type"].charAt(0).toUpperCase() + val[i]["policy_type"].slice(1);
                                option_val += '<option value="' + policy_type_id + '">' + policy_type + '</option>';
                            }
                        } else {
                            $('#filter_policy_name').html("<option value='null'>Select Policy Name</option>");
                        }
                        $('#filter_policy_name').append(option_val);
                    },
                    error: function(xhr, status) {
                        alert('Sorry, there was a problem!');
                    },
                    complete: function(xhr, status) {

                    }
                });
            }
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

        function GroupNameBasedMemberName() {
            var group_name = $("#filter_group_name").val();
            var url = "<?php echo $base_url; ?>master/policy/get_groupBased_membername";
            if (group_name != "") {
                $.ajax({
                    url: url,
                    data: {
                        group_name: group_name
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            var val = data["userdata"];
                            $('#filter_policy_holder').html("<option value='null'>Select Policy Holder Name</option>");
                            var option_val = "";
                            for (var i = 0; i < val.length; i++) {
                                var member_id = val[i]["id"];
                                var member_name = val[i]["name"].charAt(0).toUpperCase() + val[i]["name"].slice(1);
                                option_val += '<option value="' + member_id + '">' + member_name + '</option>';
                            }
                        } else {
                            $('#filter_policy_holder').html("<option value='null'>Select Policy Holder Name</option>");
                        }
                        $('#filter_policy_holder').append(option_val);
                    },
                    error: function(xhr, status) {
                        alert('Sorry, there was a problem!');
                    },
                    complete: function(xhr, status) {

                    }
                });
            }
        }

        function Filter_data() {
            $("#search,#filter_btn").removeClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('');
            $("#search,#filter_btn").addClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter On');
            $('#filter_form_modal').modal('toggle');

            var filter_year = $("#filter_year").val();
            var filter_month = $("#filter_month").val();
            var filter_day = $("#filter_day").val();
            var filter_policy_no = $("#filter_policy_no").val();
            var filter_prev_policy_no = $("#filter_prev_policy_no").val();
            var filter_company = $("#filter_company").val();
            var filter_department = $("#filter_department").val();
            var filter_policy_name = $("#filter_policy_name").val();
            var filter_policy_type = $("#filter_policy_type").val();
            var filter_agency = $("#filter_agency").val();
            var filter_sub_agency_code = $("#filter_sub_agency_code").val();
            var filter_group_name = $("#filter_group_name").val();
            var filter_policy_holder = $("#filter_policy_holder").val();

            // alert(filter_company);filter_policy_type
            if (filter_year == "null")
                filter_year = "";
            if (filter_month == "null")
                filter_month = "";
            if (filter_day == "null")
                filter_day = "";
            if (filter_company == "null")
                filter_company = "";
            if (filter_department == "null")
                filter_department = "";
            if (filter_policy_name == "null")
                filter_policy_name = "";
            if (filter_policy_type == "null")
                filter_policy_type = "";
            if (filter_agency == "null")
                filter_agency = "";
            if (filter_sub_agency_code == "null")
                filter_sub_agency_code = "";
            if (filter_group_name == "null")
                filter_group_name = "";
            if (filter_policy_holder == "null")
                filter_policy_holder = "";

            var url = "<?php echo $base_url; ?>master/policy/filter_policy";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        filter_year: filter_year,
                        filter_month: filter_month,
                        filter_day: filter_day,
                        filter_policy_no: filter_policy_no,
                        filter_prev_policy_no: filter_prev_policy_no,
                        filter_company: filter_company,
                        filter_department: filter_department,
                        filter_policy_name: filter_policy_name,
                        filter_policy_type: filter_policy_type,
                        filter_agency: filter_agency,
                        filter_sub_agency_code: filter_sub_agency_code,
                        filter_group_name: filter_group_name,
                        filter_policy_holder: filter_policy_holder,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        $("#tableData").empty();
                        var total_policy_data = 0;
                        $("#total_policy_data").text("");
                        if (data["status"] == true) {
                            var view_btn = "";
                            var edit_btn = "";
                            var status_btn = "";

                            var datas = "";

                            var status = "";
                            var policy_id = "";
                            var serial_no = "";
                            var policy_member_status = "";
                            var company_name = "";
                            var department_name = "";
                            var policy_type_tit = "";
                            var policy_type_title = "";
                            var member_name = "";
                            var master_agency_code = "";
                            var sub_agent_code = "";
                            var grpname = "";
                            var policy_type = "";
                            var mode_of_premimum = "";
                            var date_from = "";
                            var date_to = "";
                            var payment_date_from = "";
                            var payment_date_to = "";
                            var policy_no = "";
                            var date_commenced = "";
                            var policy_upload = "";
                            var reg_mobile = "";
                            var reg_email = "";

                            total_policy_data = data["total_policy_data"];
                            $("#total_policy_data").text(" Count ( " + total_policy_data + " ) ");
                            var data = data["userdata"];
                            $.each(data, function(key, val) {
                                sn = parseInt(key) + parseInt(1);
                                policy_id = parseInt(data[key].policy_id);
                                var serial_no_year = data[key].serial_no_year;
                                var serial_no_month = data[key].serial_no_month;
                                serial_no = data[key].serial_no;
                                var total_serial_no = serial_no_year + "/" + serial_no_month + "/" + serial_no;
                                grpname = data[key].grpname;
                                member_name = data[key].member_name;
                                department_name = data[key].department_name;
                                policy_no = data[key].policy_no;
                                basic_gross_premium = data[key].basic_gross_premium;
                                current_sum_insured = data[key].current_sum_insured;
                                current_total_premium = data[key].current_total_premium;
                                date_from = data[key].date_from;
                                date_to = data[key].date_to;
                                policy_upload = data[key].policy_upload;
                                commission_amt_rece_company = data[key].commission_amt_rece_company;
                                renewal_flag = data[key].renewal_flag;
                                endorsment_flag = data[key].endorsment_flag;
                                claims_flag = data[key].claims_flag;
                                company_name = data[key].company_name;
                                prev_policy_no = data[key].prev_policy_no;
                                master_agency_name = data[key].master_agency_name;
                                master_agency_code = data[key].master_agency_code;
                                sub_agent_name = data[key].sub_agent_name;
                                sub_agent_code = data[key].sub_agent_code;
                                policy_type = data[key].policy_type;
                                policy_type_title = data[key].policy_type_title;


                                if (basic_gross_premium == undefined || basic_gross_premium == null || basic_gross_premium == "null" || basic_gross_premium == "")
                                    basic_gross_premium = "";
                                else
                                    basic_gross_premium = basic_gross_premium;
                                if (current_sum_insured == undefined || current_sum_insured == null || current_sum_insured == "null" || current_sum_insured == "")
                                    current_sum_insured = "";
                                else
                                    current_sum_insured = current_sum_insured;
                                if (current_total_premium == undefined || current_total_premium == null || current_total_premium == "null" || current_total_premium == "")
                                    current_total_premium = "";
                                else
                                    current_total_premium = current_total_premium;
                                if (prev_policy_no == undefined || prev_policy_no == null || prev_policy_no == "null" || prev_policy_no == "")
                                    prev_policy_no = "";
                                else
                                    prev_policy_no = prev_policy_no;

                                if (master_agency_name == undefined || master_agency_name == null || master_agency_name == "null" || master_agency_name == "")
                                    master_agency_name = "";
                                else
                                    master_agency_name = master_agency_name;

                                if (master_agency_code == undefined || master_agency_code == null || master_agency_code == "null" || master_agency_code == "")
                                    master_agency_code = "";
                                else
                                    master_agency_code = " ( " + master_agency_code + " )";

                                if (sub_agent_name == undefined || sub_agent_name == null || sub_agent_name == "null" || sub_agent_name == "")
                                    sub_agent_name = "";
                                else
                                    sub_agent_name = sub_agent_name;

                                if (sub_agent_code == undefined || sub_agent_code == null || sub_agent_code == "null" || sub_agent_code != "")
                                    sub_agent_code = "";
                                else
                                    sub_agent_code = " ( " + sub_agent_code + " )";

                                agency_name_code = master_agency_name + master_agency_code;
                                sub_agent_name_code = sub_agent_name + sub_agent_code;

                                pre_year_policy_no = data[key].pre_year_policy_no;
                                if (pre_year_policy_no == undefined || pre_year_policy_no == null || pre_year_policy_no == "null" || pre_year_policy_no == "")
                                    pre_year_policy_no = "";
                                else
                                    pre_year_policy_no = pre_year_policy_no;
                                claim = "";
                                endorsement = "";
                                month = "";
                                year = "";
                                if (renewal_flag == 1)
                                    var type = "Renew";
                                else if (endorsment_flag == 1)
                                    var type = "Endorsed";
                                else
                                    var type = "New";

                                if (commission_amt_rece_company != 0 || commission_amt_rece_company != "")
                                    commission_amt = "Yes";
                                else
                                    commission_amt = "No";

                                if (policy_type == 1)
                                    policy_type_tit = "Individual";
                                else if (policy_type == 2)
                                    policy_type_tit = "Floater";
                                else if (policy_type == 3)
                                    policy_type_tit = "Residential & Commercial";
                                else if (policy_type == 4)
                                    policy_type_tit = "Common Individual";
                                else if (policy_type == 5)
                                    policy_type_tit = "Common Floater";

                                var floater_policy_type = data[key].floater_policy_type;
                                if (floater_policy_type == null || floater_policy_type == "" || floater_policy_type == "null")
                                    floater_policy_type = "";
                                else
                                    floater_policy_type = " ( " + floater_policy_type + " ) ";

                                if (mode_of_premimum == 1)
                                    mode_of_premimum = "Monthly";
                                else if (mode_of_premimum == 2)
                                    mode_of_premimum = "Quaterly";
                                else if (mode_of_premimum == 3)
                                    mode_of_premimum = "Half-Yearly";
                                else if (mode_of_premimum == 4)
                                    mode_of_premimum = "Yearly";
                                else if (mode_of_premimum == 5)
                                    mode_of_premimum = "2 Year";
                                else if (mode_of_premimum == 6)
                                    mode_of_premimum = "3 Year";
                                else if (mode_of_premimum == 7)
                                    mode_of_premimum = "4 Year";
                                else if (mode_of_premimum == 8)
                                    mode_of_premimum = "5 Year";
                                else if (mode_of_premimum == 9)
                                    mode_of_premimum = "6 Year";
                                else if (mode_of_premimum == 10)
                                    mode_of_premimum = "7 Year";
                                else if (mode_of_premimum == 11)
                                    mode_of_premimum = "8 Year";
                                else if (mode_of_premimum == 12)
                                    mode_of_premimum = "9 Year";
                                else if (mode_of_premimum == 13)
                                    mode_of_premimum = "10 Year";

                                policy_member_status = data[key].policy_member_status;
                                var isActive = data[key].del_flag;
                                var dynamic_path = data[key].dynamic_path;

                                if (sub_agent_code == null)
                                    sub_agent_code = "";

                                if (!isNaN(policy_id)) {
                                    if (policy_member_status == 1) {
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
                                        var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + policy_id + ")'><b>Delete</b></a>";
                                        // var delete_btn_txt = "<button class='btn btn-facebook btn-xs mr-1 mt-1 delete' value='' type='button' onClick ='OnDelete(" + policy_id + ")' ><i class='fa fa-trash' aria-hidden='true'></i></button>";
                                    } else {
                                        var del_status = "Yes";
                                        var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + policy_id + ")'><b>Recover</b></a>";
                                        // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + policy_id + ")' class='btn btn-facebook btn-xs mr-1 mt-1 delete'><i class='fa fa-undo' aria-hidden='true'></i></button></button>";
                                    }
                                    if (policy_upload == "" || policy_upload == null || policy_upload == "null" || policy_upload == "undefined" || policy_upload == undefined) {
                                        var view_policy_upload = "";
                                        var download_policy_upload = "";
                                        var delete_policy_upload = "";
                                    } else if (policy_upload != "") {
                                        var view_policy_upload = "<a href='<?php echo base_url(); ?>master/policy/view_doc/1/" + policy_id + "'  class='text-info' target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                        var download_policy_upload = "<a href='<?php echo base_url(); ?>master/policy/download_doc/1/" + policy_id + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                        var delete_policy_upload = "<a onclick=OnDelete_Doc('" + policy_id + ',' + 1 + ',' + policy_upload + ',' + '<?php echo base_url(); ?>master/policy/delete_doc' + "') href='javascript:void(0);'  class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                                    }

                                    var expiry_date = date_to;
                                    var current_date = new Date().toLocaleDateString('en-CA'); // 2020-08-19 (year-month-day) 

                                    var renew_btn = "";
                                    if (current_date <= expiry_date) {
                                        renew_btn = "";
                                    } else {
                                        renew_btn = " <a id='renew' href='<?php echo base_url() . "master/Policy_renew/renew_policy/"; ?>" + policy_id + "' class='btn btn-facebook btn-xs mr-1 mt-1 edit' id='edit'>Renew</a>";

                                    }

                                    if (policy_type_title == "Mediclaim" || policy_type_title == "Cancer Plan" || policy_type_title == "Daily Cash" || policy_type_title == "Overseas Mediclaim" || policy_type_title == "Student Overseas Mediclaim" || policy_type_title == "Employment Overseas Mediclaim" || policy_type_title == "Personal Accident" || policy_type_title == "Super Top Up" || policy_type_title == "Top Up" || policy_type_title == "Critical illness" || policy_type_title == "GPA" || policy_type_title == "GMC") {
                                        var claim_btn_class = "btn btn-outline-success waves-effect width-md waves-light btn-sm edit";
                                        var claim_url = '<?php echo base_url() . "master/claims/mediclaim_step_one/"; ?>' + policy_id;
                                    } else {
                                        var claim_btn_class = "btn btn-outline-warning waves-effect width-md waves-light btn-sm edit";
                                        var claim_url = '<?php echo base_url() . "master/claims/claim_add/"; ?>' + policy_id;
                                    }
                                    // <?php //echo base_url() . "master/claims/claim_add/"; 
                                        ?>" + policy_id + "

                                    view_btn = " <a href='<?php echo base_url() . "master/policy/view_policy/"; ?>" + policy_id + "' class='btn btn-facebook btn-xs mt-1 view' id='view'><i class='fas fa-eye'></i></a>";
                                    edit_btn = " <a href='<?php echo base_url() . "master/policy/edit_policy/"; ?>" + policy_id + "' class='btn btn-facebook btn-xs mt-1 edit' id='edit'><i class='fas fa-pencil-alt'></i></a>";
                                    status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + policy_id + "' value='' type='button' onClick ='updateStatus(" + policy_id + "," + policy_member_status + ")' >" + status + "</button>";
                                    claim_btn = " <a href='" + claim_url + "' class='" + claim_btn_class + "' id=''>Add Claim</a>";


                                    action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='<?php echo base_url() . "master/policy/view_policy/"; ?>" + policy_id + "' id='view'><b>View</b></a><a class='dropdown-item edit' href='<?php echo base_url() . "master/policy/edit_policy/"; ?>" + policy_id + "' id='edit' ><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + policy_id + "' href='javascript:void(0);' id='status_btn_" + policy_id + "' onClick ='updateStatus(" + policy_id + "," + policy_member_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "<a class='dropdown-item view " + claim_btn_class + "' href='" + claim_url + "' id='view'><b>Add Claim</b></a></div></div>";

                                    datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td><td><center>' + total_serial_no + '</center></td> <td>' + grpname + '</td> <td>' + member_name + '</td><td>' + department_name + '</td><td>' + policy_type_title + '</td><td>' + policy_no + '</td><td>' + current_sum_insured + '</td><td>' + current_total_premium + '</td><td>' + date_from + '</td><td>' + date_to + '</td><td>' + "&nbsp;&nbsp;&nbsp;" + view_policy_upload + "&nbsp;&nbsp;&nbsp;" + download_policy_upload + "&nbsp;&nbsp;&nbsp;" + delete_policy_upload + '</td><td>' + commission_amt + '</td><td>' + endorsement + '</td><td>' + claim + '</td><td>' + company_name + '</td><td>' + pre_year_policy_no + '</td><td>' + agency_name_code + '</td><td>' + sub_agent_name_code + '</td><td>' + type + '</td><td>' + policy_type_tit + '</td> </tr>';
                                    // <td>' + month + '</td><td>' + year + '</td>

                                }
                            });

                        } else {
                            datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="22"><center>Data Not Found</center></td> </tr>';
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
            $("#filter_year").val("null");
            $("#filter_month").val("null");
            $("#filter_day").val("null");
            $("#filter_policy_no").val("");
            $("#filter_prev_policy_no").val("");
            $("#filter_company").val("null");
            $("#filter_department").val("null");
            $("#filter_policy_name").val("null");
            $("#filter_policy_type").val("null");
            $("#filter_agency").val("null");
            $("#filter_sub_agency_code").val("null");
            $("#filter_group_name").val("null");
            $("#filter_policy_holder").val("null");

            $("#filter_year").prop('selectedIndex', 0);
            $("#filter_month").prop('selectedIndex', 0);
            $("#filter_day").prop('selectedIndex', 0);
            $("#filter_company").prop('selectedIndex', 0);
            $("#filter_department").prop('selectedIndex', 0);
            $("#filter_policy_name").prop('selectedIndex', 0);
            $("#filter_policy_type").prop('selectedIndex', 0);
            $("#filter_agency").prop('selectedIndex', 0);
            $("#filter_sub_agency_code").prop('selectedIndex', 0);
            $("#filter_group_name").prop('selectedIndex', 0);
            $("#filter_policy_holder").prop('selectedIndex', 0);

            getPOLICYList();
        }
        getPOLICYList();

        function OnDelete_Doc(policy_details) {
            var policy_details = policy_details.split(",");
            var policy_id = policy_details[0];
            var doc_type = policy_details[1];
            var doc_name = policy_details[2];
            var url = policy_details[3];
            // alert(policy_id);
            // alert(doc_type);
            // alert(doc_name);
            // alert(url);
            if (doc_type == 1)
                var title = "Policy Upload Document";
            else if (doc_type == 2)
                var title = "Quotation Upload Document";
            document_confirmation_alert(id = policy_id, doc_type = doc_type, doc_name = doc_name, url = url, title = title, type = "Delet");
        }

        function getPOLICYList() {
            $("#tableData").empty();
            var url = "<?php echo $base_url; ?>master/policy/get_policy_list";
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
                        var total_policy_data = 0;
                        $("#total_policy_data").text("");
                        if (data["status"] == true) {
                            var view_btn = "";
                            var edit_btn = "";
                            var status_btn = "";

                            var datas = "";

                            var status = "";
                            var policy_id = "";
                            var serial_no = "";
                            var policy_member_status = "";
                            var company_name = "";
                            var department_name = "";
                            var policy_type_tit = "";
                            var policy_type_title = "";
                            var member_name = "";
                            var master_agency_code = "";
                            var sub_agent_code = "";
                            var grpname = "";
                            var policy_type = "";
                            var mode_of_premimum = "";
                            var date_from = "";
                            var date_to = "";
                            var payment_date_from = "";
                            var payment_date_to = "";
                            var policy_no = "";
                            var date_commenced = "";
                            var policy_upload = "";
                            var reg_mobile = "";
                            var reg_email = "";

                            total_policy_data = data["total_policy_data"];
                            $("#total_policy_data").text(" Count ( " + total_policy_data + " ) ");
                            var data = data["userdata"];
                            $.each(data, function(key, val) {
                                sn = parseInt(key) + parseInt(1);
                                policy_id = parseInt(data[key].policy_id);
                                var serial_no_year = data[key].serial_no_year;
                                var serial_no_month = data[key].serial_no_month;
                                serial_no = data[key].serial_no;
                                var total_serial_no = serial_no_year + "/" + serial_no_month + "/" + serial_no;
                                grpname = data[key].grpname;
                                member_name = data[key].member_name;
                                department_name = data[key].department_name;
                                policy_no = data[key].policy_no;
                                basic_gross_premium = data[key].basic_gross_premium;
                                current_sum_insured = data[key].current_sum_insured;
                                current_total_premium = data[key].current_total_premium;
                                date_from = data[key].date_from;
                                date_to = data[key].date_to;
                                policy_upload = data[key].policy_upload;
                                commission_amt_rece_company = data[key].commission_amt_rece_company;
                                renewal_flag = data[key].renewal_flag;
                                endorsment_flag = data[key].endorsment_flag;
                                claims_flag = data[key].claims_flag;
                                company_name = data[key].company_name;
                                prev_policy_no = data[key].prev_policy_no;
                                master_agency_name = data[key].master_agency_name;
                                master_agency_code = data[key].master_agency_code;
                                sub_agent_name = data[key].sub_agent_name;
                                sub_agent_code = data[key].sub_agent_code;
                                policy_type = data[key].policy_type;
                                policy_type_title = data[key].policy_type_title;


                                if (basic_gross_premium == undefined || basic_gross_premium == null || basic_gross_premium == "null" || basic_gross_premium == "")
                                    basic_gross_premium = "";
                                else
                                    basic_gross_premium = basic_gross_premium;
                                if (current_sum_insured == undefined || current_sum_insured == null || current_sum_insured == "null" || current_sum_insured == "")
                                    current_sum_insured = "";
                                else
                                    current_sum_insured = current_sum_insured;
                                if (current_total_premium == undefined || current_total_premium == null || current_total_premium == "null" || current_total_premium == "")
                                    current_total_premium = "";
                                else
                                    current_total_premium = current_total_premium;
                                if (prev_policy_no == undefined || prev_policy_no == null || prev_policy_no == "null" || prev_policy_no == "")
                                    prev_policy_no = "";
                                else
                                    prev_policy_no = prev_policy_no;

                                if (master_agency_name == undefined || master_agency_name == null || master_agency_name == "null" || master_agency_name == "")
                                    master_agency_name = "";
                                else
                                    master_agency_name = master_agency_name;

                                if (master_agency_code == undefined || master_agency_code == null || master_agency_code == "null" || master_agency_code == "")
                                    master_agency_code = "";
                                else
                                    master_agency_code = " ( " + master_agency_code + " )";

                                if (sub_agent_name == undefined || sub_agent_name == null || sub_agent_name == "null" || sub_agent_name == "")
                                    sub_agent_name = "";
                                else
                                    sub_agent_name = sub_agent_name;

                                if (sub_agent_code == undefined || sub_agent_code == null || sub_agent_code == "null" || sub_agent_code != "")
                                    sub_agent_code = "";
                                else
                                    sub_agent_code = " ( " + sub_agent_code + " )";

                                agency_name_code = master_agency_name + master_agency_code;
                                sub_agent_name_code = sub_agent_name + sub_agent_code;

                                pre_year_policy_no = data[key].pre_year_policy_no;
                                if (pre_year_policy_no == undefined || pre_year_policy_no == null || pre_year_policy_no == "null" || pre_year_policy_no == "")
                                    pre_year_policy_no = "";
                                else
                                    pre_year_policy_no = pre_year_policy_no;
                                claim = "";
                                endorsement = "";
                                month = "";
                                year = "";
                                if (renewal_flag == 1)
                                    var type = "Renew";
                                else if (endorsment_flag == 1)
                                    var type = "Endorsed";
                                else
                                    var type = "New";

                                if (commission_amt_rece_company != 0 || commission_amt_rece_company != "")
                                    commission_amt = "Yes";
                                else
                                    commission_amt = "No";

                                if (policy_type == 1)
                                    policy_type_tit = "Individual";
                                else if (policy_type == 2)
                                    policy_type_tit = "Floater";
                                else if (policy_type == 3)
                                    policy_type_tit = "Residential & Commercial";
                                else if (policy_type == 4)
                                    policy_type_tit = "Common Individual";
                                else if (policy_type == 5)
                                    policy_type_tit = "Common Floater";

                                var floater_policy_type = data[key].floater_policy_type;
                                if (floater_policy_type == null || floater_policy_type == "" || floater_policy_type == "null")
                                    floater_policy_type = "";
                                else
                                    floater_policy_type = " ( " + floater_policy_type + " ) ";

                                if (mode_of_premimum == 1)
                                    mode_of_premimum = "Monthly";
                                else if (mode_of_premimum == 2)
                                    mode_of_premimum = "Quaterly";
                                else if (mode_of_premimum == 3)
                                    mode_of_premimum = "Half-Yearly";
                                else if (mode_of_premimum == 4)
                                    mode_of_premimum = "Yearly";
                                else if (mode_of_premimum == 5)
                                    mode_of_premimum = "2 Year";
                                else if (mode_of_premimum == 6)
                                    mode_of_premimum = "3 Year";
                                else if (mode_of_premimum == 7)
                                    mode_of_premimum = "4 Year";
                                else if (mode_of_premimum == 8)
                                    mode_of_premimum = "5 Year";
                                else if (mode_of_premimum == 9)
                                    mode_of_premimum = "6 Year";
                                else if (mode_of_premimum == 10)
                                    mode_of_premimum = "7 Year";
                                else if (mode_of_premimum == 11)
                                    mode_of_premimum = "8 Year";
                                else if (mode_of_premimum == 12)
                                    mode_of_premimum = "9 Year";
                                else if (mode_of_premimum == 13)
                                    mode_of_premimum = "10 Year";

                                policy_member_status = data[key].policy_member_status;
                                var isActive = data[key].del_flag;
                                var dynamic_path = data[key].dynamic_path;

                                if (sub_agent_code == null)
                                    sub_agent_code = "";

                                if (!isNaN(policy_id)) {
                                    if (policy_member_status == 1) {
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
                                        var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + policy_id + ")'><b>Delete</b></a>";
                                        // var delete_btn_txt = "<button class='btn btn-facebook btn-xs mr-1 mt-1 delete' value='' type='button' onClick ='OnDelete(" + policy_id + ")' ><i class='fa fa-trash' aria-hidden='true'></i></button>";
                                    } else {
                                        var del_status = "Yes";
                                        var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + policy_id + ")'><b>Recover</b></a>";
                                        // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + policy_id + ")' class='btn btn-facebook btn-xs mr-1 mt-1 delete'><i class='fa fa-undo' aria-hidden='true'></i></button></button>";
                                    }

                                    if (policy_upload == "" || policy_upload == null || policy_upload == "null" || policy_upload == "undefined" || policy_upload == undefined) {
                                        var view_policy_upload = "";
                                        var download_policy_upload = "";
                                        var delete_policy_upload = "";
                                    } else if (policy_upload != "") {
                                        var view_policy_upload = "<a href='<?php echo base_url(); ?>master/policy/view_doc/1/" + policy_id + "'  class='text-info' target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                        var download_policy_upload = "<a href='<?php echo base_url(); ?>master/policy/download_doc/1/" + policy_id + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                        var delete_policy_upload = "<a onclick=OnDelete_Doc('" + policy_id + ',' + 1 + ',' + policy_upload + ',' + '<?php echo base_url(); ?>master/policy/delete_doc' + "') href='javascript:void(0);'  class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                                    }

                                    var expiry_date = date_to;
                                    var current_date = new Date().toLocaleDateString('en-CA'); // 2020-08-19 (year-month-day) 

                                    var renew_btn = "";
                                    if (current_date <= expiry_date) {
                                        renew_btn = "";
                                    } else {
                                        renew_btn = " <a id='renew' href='<?php echo base_url() . "master/Policy_renew/renew_policy/"; ?>" + policy_id + "' class='btn btn-facebook btn-xs mr-1 mt-1 edit' id='edit'>Renew</a>";

                                    }

                                    if (policy_type_title == "Mediclaim" || policy_type_title == "Cancer Plan" || policy_type_title == "Daily Cash" || policy_type_title == "Overseas Mediclaim" || policy_type_title == "Student Overseas Mediclaim" || policy_type_title == "Employment Overseas Mediclaim" || policy_type_title == "Personal Accident" || policy_type_title == "Super Top Up" || policy_type_title == "Top Up" || policy_type_title == "Critical illness" || policy_type_title == "GPA" || policy_type_title == "GMC") {
                                        var claim_btn_class = "btn btn-outline-success waves-effect width-md waves-light btn-sm edit";
                                        var claim_url = '<?php echo base_url() . "master/claims/mediclaim_step_one/"; ?>' + policy_id;
                                    } else {
                                        var claim_btn_class = "btn btn-outline-warning waves-effect width-md waves-light btn-sm edit";
                                        var claim_url = '<?php echo base_url() . "master/claims/claim_add/"; ?>' + policy_id;
                                    }
                                    // <?php //echo base_url() . "master/claims/claim_add/"; 
                                        ?>" + policy_id + "

                                    view_btn = " <a href='<?php echo base_url() . "master/policy/view_policy/"; ?>" + policy_id + "' class='btn btn-facebook btn-xs mt-1 view' id='view'><i class='fas fa-eye'></i></a>";
                                    edit_btn = " <a href='<?php echo base_url() . "master/policy/edit_policy/"; ?>" + policy_id + "' class='btn btn-facebook btn-xs mt-1 edit' id='edit'><i class='fas fa-pencil-alt'></i></a>";
                                    status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + policy_id + "' value='' type='button' onClick ='updateStatus(" + policy_id + "," + policy_member_status + ")' >" + status + "</button>";
                                    claim_btn = " <a href='" + claim_url + "' class='" + claim_btn_class + "' id=''>Add Claim</a>";


                                    action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='<?php echo base_url() . "master/policy/view_policy/"; ?>" + policy_id + "' id='view'><b>View</b></a><a class='dropdown-item edit' href='<?php echo base_url() . "master/policy/edit_policy/"; ?>" + policy_id + "' id='edit' ><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + policy_id + "' href='javascript:void(0);' id='status_btn_" + policy_id + "' onClick ='updateStatus(" + policy_id + "," + policy_member_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "<a class='dropdown-item view " + claim_btn_class + "' href='" + claim_url + "' id='view'><b>Add Claim</b></a></div></div>";

                                    datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td><td><center>' + total_serial_no + '</center></td> <td>' + grpname + '</td> <td>' + member_name + '</td><td>' + department_name + '</td><td>' + policy_type_title + '</td><td>' + policy_no + '</td><td>' + current_sum_insured + '</td><td>' + current_total_premium + '</td><td>' + date_from + '</td><td>' + date_to + '</td><td>' + "&nbsp;&nbsp;&nbsp;" + view_policy_upload + "&nbsp;&nbsp;&nbsp;" + download_policy_upload + "&nbsp;&nbsp;&nbsp;" + delete_policy_upload + '</td><td>' + commission_amt + '</td><td>' + endorsement + '</td><td>' + claim + '</td><td>' + company_name + '</td><td>' + pre_year_policy_no + '</td><td>' + agency_name_code + '</td><td>' + sub_agent_name_code + '</td><td>' + type + '</td><td>' + policy_type_tit + '</td> </tr>';
                                    // <td>' + month + '</td><td>' + year + '</td>

                                }
                            });

                        } else {
                            datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="22"><center>Data Not Found</center></td> </tr>';
                        }
                        $("#tableData").append(datas);
                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            }
        }

        function updateStatus(policy_id, policy_member_status) {

            var url = "<?php echo $base_url; ?>master/policy/update_policy_member_status";

            if (policy_id != "") {

                $.ajax({
                    url: url,
                    data: {
                        "id": policy_id,
                        "status": policy_member_status
                    },
                    type: 'POST',
                    //dataType : 'json',
                    success: function(data) {
                        var data = JSON.parse(data);
                        var status = "";
                        var update_style = "";
                        $("#status_btn_" + policy_id).text("");
                        if (data["status"] == true) {
                            toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                            if (data["userdata"]["policy_member_status"] == 1) {
                                status = "In-Active";
                                var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                                $("#edit_" + policy_id).addClass(status_btn_txt);
                                $("#status_btn_" + policy_id).text(status);
                            } else {
                                status = "Active";
                                var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                                $("#edit_" + policy_id).addClass(status_btn_txt);
                                $("#status_btn_" + policy_id).text(status);
                            }

                            $("#status_btn_" + policy_id).text(status);


                            $('#status_btn_' + policy_id).attr('onClick', 'updateStatus(' + policy_id + ',' + data["userdata"]["policy_member_status"] + ')');


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

        function OnRecover(policy_id) {
            var url = "<?php echo $base_url; ?>master/policy/recoverpolicy";
            confirmation_alert(id = policy_id, url = url, title = "<?php echo $title; ?>", type = "Recover");
        }

        function OnDelete(policy_id) {
            var url = "<?php echo $base_url; ?>master/policy/removepolicy";
            confirmation_alert(id = policy_id, url = url, title = "<?php echo $title; ?>", type = "Delet");
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