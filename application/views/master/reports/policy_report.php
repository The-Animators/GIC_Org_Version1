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
                        <h4 class="page-title">View <?php echo $title; ?></h4>
                    </div>
                </div>
            </div>
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
                                                    $latest_year = date('Y', strtotime('+20 years'));;
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
                                            <label for="filter_company" class="col-form-label col-md-4 text-right">Company : </label>
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
                                            <label for="filter_department" class="col-form-label col-md-4 text-right">Department<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select name="filter_department" id="filter_department" class="form-control" data-toggle="select2" onchange="DepartmentBasedPolicyName();">
                                                    <option value="null">Select Department</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_policy_name" class="col-form-label col-md-4 text-right">Policy Name<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select name="filter_policy_name" id="filter_policy_name" class="form-control" data-toggle="select2">
                                                    <option value="null">Select Policy Name</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_agency" class="col-form-label col-md-4 text-right">Agency : </label>
                                            <div class="col-md-8">
                                                <select name="filter_agency" id="filter_agency" class="form-control" data-toggle="select2">
                                                    <option value="null">Select Agency Code</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_policy_holder" class="col-form-label col-md-4 text-right">Policy Holder : </label>
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

                    <div class="card-box">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_policy_data"></span></h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" id="filter_btn" class="btn btn-outline-secondary waves-effect btn-xs"><b><i class="mdi mdi-magnify"></i>&nbsp;Filter Off</b></button>
                                <!-- <input class='btn btn-facebook btn-sm' id='AddForm' value=' Add <?php echo $title; ?>' type='button' /> -->
                            </div>

                        </div>

                        <div class="wrapper1">
                            <div class="div1"></div>
                        </div>
                        <div class="wrapper2">
                            <div class="div2">
                                <div class="table-cont">
                                    <table class="commission_table fixed" id="commission_table" border="1">
                                        <!-- <tr>
                                        <th>SNo</th>
                                        <th>Serial No.</th>
                                        <th>Group Name</th>
                                        <th>Policy Holder</th>
                                        <th>Department</th>
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
                                        <th>Month</th>
                                        <th>Year</th>
                                        <th>Type of policy</th>
                                    </tr> -->

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
        var filter_company = $("#filter_company").val();
        var filter_agency = $("#filter_agency").val();
        var filter_policy_holder = $("#filter_policy_holder").val();
        var filter_department = $("#filter_department").val();
        var filter_policy_name = $("#filter_policy_name").val();
        // alert(filter_company);
        if (filter_year == "null")
            filter_year = "";
        if (filter_month == "null")
            filter_month = "";
        if (filter_company == "null")
            filter_company = "";
        if (filter_agency == "null")
            filter_agency = "";
        if (filter_policy_holder == "null")
            filter_policy_holder = "";
        if (filter_department == "null")
            filter_department = "";
        if (filter_policy_name == "null")
            filter_policy_name = "";

        var url = "<?php echo $base_url; ?>master/reports/filter_policy";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_year: filter_year,
                    filter_month: filter_month,
                    filter_company: filter_company,
                    filter_agency: filter_agency,
                    filter_policy_holder: filter_policy_holder,
                    filter_department: filter_department,
                    filter_policy_name: filter_policy_name,
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
                                    status = '<i class="fa fa-toggle-on" aria-hidden="true"></i>';
                                    var status_btn_txt = "btn btn-outline-success waves-effect waves-light mt-1 btn-sm edit";
                                } else {
                                    status = '<i class="fa fa-toggle-off" aria-hidden="true"></i>';
                                    var status_btn_txt = "btn btn-outline-danger waves-effect waves-light mt-1 btn-sm edit";
                                }
                                if (isActive == 1) {
                                    var del_status = "No";

                                    var delete_btn_txt = "<button class='btn btn-facebook btn-sm mr-1 mt-1 delete' value='' type='button' onClick ='OnDelete(" + policy_id + ")' ><i class='fa fa-trash' aria-hidden='true'></i></button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + policy_id + ")' class='btn btn-facebook btn-sm mr-1 mt-1 delete'><i class='fa fa-undo' aria-hidden='true'></i></button></button>";
                                }

                                if (policy_upload == "") {
                                    var view_policy_upload = "";
                                    var download_policy_upload = "";
                                    var delete_policy_upload = "";
                                } else if (policy_upload != "") {
                                    var view_policy_upload = "<a href='<?php echo base_url(); ?>master/policy/view_doc/1/" + policy_id + "'  class='text-info'><b>View</b></a>";
                                    var download_policy_upload = "<a href='<?php echo base_url(); ?>master/policy/download_doc/1/" + policy_id + "'  class='text-success'><b>Download</b></a>";
                                    var delete_policy_upload = "<a onclick=OnDelete_Doc('" + data["userdata"].policy_id + ',' + 1 + ',' + data["userdata"].policy_upload + ',' + '<?php echo base_url(); ?>master/policy/delete_doc' + "') href='#'  class='text-danger'><b>Remove</b></a>";
                                }

                                var expiry_date = date_to;
                                var current_date = new Date().toLocaleDateString('en-CA'); // 2020-08-19 (year-month-day) 

                                var renew_btn = "";
                                if (current_date <= expiry_date) {
                                    renew_btn = "";
                                } else {
                                    renew_btn = " <a id='renew' href='<?php echo base_url() . "master/Policy_renew/renew_policy/"; ?>" + policy_id + "' class='btn btn-facebook btn-sm mr-1 mt-1 edit' id='edit'>Renew</a>";

                                }

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + sn + '</td><td>' + total_serial_no + '</td> <td><center>' + grpname + '</center></td> <td>' + member_name + '</td><td>' + department_name + '</td><td>' + policy_type_title + '</td><td>' + policy_no + '</td><td>' + current_sum_insured + '</td><td>' + current_total_premium + '</td><td>' + date_from + '</td><td>' + date_to + '</td><td>' + view_policy_upload + " " + download_policy_upload + " " + delete_policy_upload + '</td><td>' + commission_amt + '</td><td>' + endorsement + '</td><td>' + claim + '</td><td>' + company_name + '</td><td>' + pre_year_policy_no + '</td><td>' + agency_name_code + '</td><td>' + sub_agent_name_code + '</td><td>' + type + '</td><td>' + policy_type_tit + '</td> </tr>';
                                // <td>' + month + '</td><td>' + year + '</td>

                            }
                        });

                    } else {
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="22"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append("<tr><th>SN.</th><th>Serial No.</th><th><center>Group Name</center></th><th>Policy Holder</th><th>Department</th><th>Policy Name</th><th>Policy No.</th><th>Sum Insured</th> <th>Premium</th><th>Date From</th>  <th>Date To</th> <th>Policy PDF</th><th>Commission Received</th><th>Endorsements</th><th>Claims</th> <th>Company</th><th>Previous Year Policy No.</th><th>Agency</th><th>Sub agency</th> <th>Type</th><th>Type of policy</th> </tr> " + datas);
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
        $("#search,#filter_btn").removeClass("btn btn-outline-danger waves-effect btn-xs mr-4").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-secondary waves-effect btn-xs mr-4").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter Off');
        $('#filter_form_modal').modal('toggle');

        // $("#filter_year").val();
        $("#filter_year").val("null");
        $("#filter_month").val("null");
        $("#filter_company").val("null");
        $("#filter_agency").val("null");
        $("#filter_policy_holder").val("null");
        $("#filter_department").val("null");
        $("#filter_policy_name").val("null");
        $("#filter_year").prop('selectedIndex', 0);
        $("#filter_month").prop('selectedIndex', 0);
        $("#filter_company").prop('selectedIndex', 0);
        $("#filter_agency").prop('selectedIndex', 0);
        $("#filter_policy_holder").prop('selectedIndex', 0);
        $("#filter_department").prop('selectedIndex', 0);
        $("#filter_policy_name").prop('selectedIndex', 0);

        getPOLICYList();
    }

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

    getPOLICYList();

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
                                    status = '<i class="fa fa-toggle-on" aria-hidden="true"></i>';
                                    var status_btn_txt = "btn btn-outline-success waves-effect waves-light mt-1 btn-sm edit";
                                } else {
                                    status = '<i class="fa fa-toggle-off" aria-hidden="true"></i>';
                                    var status_btn_txt = "btn btn-outline-danger waves-effect waves-light mt-1 btn-sm edit";
                                }
                                if (isActive == 1) {
                                    var del_status = "No";

                                    var delete_btn_txt = "<button class='btn btn-facebook btn-sm mr-1 mt-1 delete' value='' type='button' onClick ='OnDelete(" + policy_id + ")' ><i class='fa fa-trash' aria-hidden='true'></i></button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + policy_id + ")' class='btn btn-facebook btn-sm mr-1 mt-1 delete'><i class='fa fa-undo' aria-hidden='true'></i></button></button>";
                                }

                                if (policy_upload == "") {
                                    var view_policy_upload = "";
                                    var download_policy_upload = "";
                                    var delete_policy_upload = "";
                                } else if (policy_upload != "") {
                                    var view_policy_upload = "<a href='<?php echo base_url(); ?>master/policy/view_doc/1/" + policy_id + "'  class='text-info'><b>View</b></a>";
                                    var download_policy_upload = "<a href='<?php echo base_url(); ?>master/policy/download_doc/1/" + policy_id + "'  class='text-success'><b>Download</b></a>";
                                    var delete_policy_upload = "<a onclick=OnDelete_Doc('" + data["userdata"].policy_id + ',' + 1 + ',' + data["userdata"].policy_upload + ',' + '<?php echo base_url(); ?>master/policy/delete_doc' + "') href='#'  class='text-danger'><b>Remove</b></a>";
                                }

                                var expiry_date = date_to;
                                var current_date = new Date().toLocaleDateString('en-CA'); // 2020-08-19 (year-month-day) 

                                var renew_btn = "";
                                if (current_date <= expiry_date) {
                                    renew_btn = "";
                                } else {
                                    renew_btn = " <a id='renew' href='<?php echo base_url() . "master/Policy_renew/renew_policy/"; ?>" + policy_id + "' class='btn btn-facebook btn-sm mr-1 mt-1 edit' id='edit'>Renew</a>";

                                }

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + sn + '</td><td>' + total_serial_no + '</td> <td><center>' + grpname + '</center></td> <td>' + member_name + '</td><td>' + department_name + '</td><td>' + policy_type_title + '</td><td>' + policy_no + '</td><td>' + current_sum_insured + '</td><td>' + current_total_premium + '</td><td>' + date_from + '</td><td>' + date_to + '</td><td>' + view_policy_upload + " " + download_policy_upload + " " + delete_policy_upload + '</td><td>' + commission_amt + '</td><td>' + endorsement + '</td><td>' + claim + '</td><td>' + company_name + '</td><td>' + pre_year_policy_no + '</td><td>' + agency_name_code + '</td><td>' + sub_agent_name_code + '</td><td>' + type + '</td><td>' + policy_type_tit + '</td> </tr>';
                                // <td>' + month + '</td><td>' + year + '</td>

                            }
                        });

                    } else {
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="22"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append("<tr><th>SN.</th><th>Serial No.</th><th><center>Group Name</center></th><th>Policy Holder</th><th>Department</th><th>Policy Name</th><th>Policy No.</th><th>Sum Insured</th> <th>Premium</th><th>Date From</th>  <th>Date To</th> <th>Policy PDF</th><th>Commission Received</th><th>Endorsements</th><th>Claims</th> <th>Company</th><th>Previous Year Policy No.</th><th>Agency</th><th>Sub agency</th> <th>Type</th><th>Type of policy</th> </tr> " + datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }
</script>