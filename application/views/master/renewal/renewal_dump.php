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
            <div id="form_modal" class="modal fade bs-example-modal-lg bs-example-modal-center" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Renewal Premium Details</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <label for="basic_sum_insured" class="col-form-label col-md-4 text-right">Total Sum Insured<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="basic_sum_insured" id="basic_sum_insured" value="" placeholder="Enter Total Sum Insured" class="form-control">
                                                    <span id="basic_sum_insured_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <label for="basic_gross_premium" class="col-form-label col-md-4 text-right">Total Premium<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="basic_gross_premium" id="basic_gross_premium" value="" placeholder="Enter Total Premium" class="form-control">
                                                    <span id="basic_gross_premium_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="policy_id" hidden>1</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <center>
                                                <button id="update" onclick='onPremium_Update()' style="display: none;" class="btn btn-primary btn-sm">Update <?php echo $title; ?></button>
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
                                        <div class="col-md-4 row">
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
                                        <div class="col-md-4 row">
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
                                        <div class="col-md-4 row">
                                            <label for="filter_company" class="col-form-label col-md-4 text-right">Company</label>
                                            <div class="col-md-8">
                                                <select class="form-control" data-toggle="select2" id="filter_company" name="filter_company" onchange="company_department();">
                                                    <option value="null">Select Company</option>
                                                    <?php $company = company_dropdown();
                                                    if (!empty($company)) : foreach ($company as $row) : ?>
                                                            <option value="<?php echo $row["mcompany_id"]; ?>"><?php echo ucwords($row["company_name"]); ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 row">
                                            <label for="filter_department" class="col-form-label col-md-4 text-right">Department</label>
                                            <div class="col-md-8">
                                                <select name="filter_department" id="filter_department" class="form-control">
                                                    <option value="null">Select Department</option>
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
                                            <label for="filter_group" class="col-form-label col-md-4 text-right">Group Name</label>
                                            <div class="col-md-8">
                                                <select name="filter_group" id="filter_group" class="form-control" data-toggle="select2" onchange="GroupNameBasedMemberName();">
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
                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_premium_status" class="col-form-label col-md-4 text-right">Updated</label>
                                            <div class="col-md-8">
                                                <select name="filter_premium_status" id="filter_premium_status" class="form-control">
                                                    <option value="null">Select Policy Type</option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-1">
                                            <center><button type="submit" id="search" class="btn btn-outline-secondary waves-effect width-md btn-sm mr-1" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="reset" class="btn btn-outline-secondary waves-effect btn-xs" onclick="Reset_data()"><b><i class="mdi mdi-undo"></i>Reset</b></button></center>
                                        </div>
                                        <div class="col-md-4 text-right mt-1"></div>
                                        <!-- <div class="col-md-2 row mt-1">
                                        <div class="col-md-12"></div>
                                    </div> -->
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
                                <h4 class="header-title"><?php echo $title; ?> <span id="total_policy_data"></span></h4>
                            </div>
                            <!-- <div class="col-md-4"></div> -->
                            <div class="col-md-6 text-right">
                                <button type="submit" id="filter_btn" class="btn btn-outline-secondary waves-effect btn-xs"><b><i class="mdi mdi-magnify"></i>&nbsp;Filter Off</b></button>
                            </div>
                        </div>

                        <!-- <p class="sub-header"></p> -->
                        <!-- <div class="row">
                            
                        </div> -->
                        <span id="not_updated_button"></span>
                        <div class="wrapper1">
                            <div class="div1"></div>
                        </div>
                        <div class="wrapper2">
                            <div class="div2">
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

                                                        <!-- <label for="select_all">
                                                <input type="checkbox" name="select_all" id="select_all" value="">
                                            </label> -->
                                                    </center>
                                                </th>
                                                <th> Action</th>
                                                <th> SN.</th>
                                                <th>Serial No.</th>
                                                <th>Group Name</th>
                                                <th>Policy Holder Name</th>
                                                <th>Department</th>
                                                <th>Policy Type</th>
                                                <th>Policy No.</th>
                                                <th>Date From</th>
                                                <th>Date To</th>
                                                <th>Sum Insured</th>
                                                <th>Premium</th>
                                                <th>Policy PDF</th>
                                                <th>Company</th>
                                                <th>Next Year Premium Status</th>
                                            </tr>
                                        </thead>

                                        <tbody id="tableData">

                                        </tbody>
                                    </table>
                                </div>
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
    var selectedID = [];
    $(document).ready(function() {

        // Multiple Select Section Start	
        $("#select_all").change(function() {
            $("#not_updated_button").empty('');
            if (this.checked) {
                var selectedID = [];
                $(".all").each(function() {
                    this.checked = true;
                    selectedID.push(this.id);
                    // alert(selectedID);
                    // alert("multiple checked");
                    console.log("multiple checked");

                });
                $("#not_updated_button").append('<button id="not_update" onclick="Not_Updated()" class="btn btn-primary btn-xs mb-1 not_update">Not Updated</button>');
            } else {
                $(".all").each(function() {
                    this.checked = false;
                    selectedID = [];
                    // alert("multiple unchecked");
                    console.log("multiple unchecked");
                    $("#not_updated_button").empty('');
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
                $("#not_updated_button").empty('');
                $("#not_updated_button").append('<button id="not_update" onclick="Not_Updated()" class="btn btn-primary btn-xs mb-1 not_update">Not Updated</button>');
                if (isAllChecked == 0) {
                    // alert("single checked 3");
                    console.log("single checked 3");
                    $("#select_all").prop("checked", true);
                }
            } else {
                // alert("single checked 4");
                console.log("single checked 4");
                $("#not_updated_button").empty('');
                var selectedID = [];
                $(':checkbox[name="renewal_dum_ids[]"]:checked').each(function() {
                    selectedID.push(this.id);
                    // alert(selectedID);
                })
                //~ alert(selectedID);
                if (selectedID == "") {
                    $("#not_updated_button").empty('');
                }
                // alert("single un-checked");	
                console.log("single un-checked");
                $("#select_all").prop("checked", false);

                $(".all").each(function() {
                    if ($(this).is(":checked")) {
                        console.log("single checked 5");
                        $("#not_updated_button").empty('');
                        $("#not_updated_button").append('<button id="not_update" onclick="Not_Updated()" class="btn btn-primary btn-xs mb-1 not_update">Not Updated</button>');
                        // alert("single checked 5");

                    }
                })
            }
        });
        //Single Select Section End

    });

    function Not_Updated() {
        selectedID = [];
        var renewal_dum_ids = $(':checkbox[name="renewal_dum_ids[]"]:checked').each(function() {
            selectedID.push(this.id);
        });
        var url = "<?php echo $base_url; ?>master/renewal/update_not_renewable_policy";

        if (selectedID != "") {
            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        "policy_id_arr": selectedID,
                        "next_year_premium_flag": "0",
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    success: function(data) {
                        if (data["status"] == true) {
                            toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
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
    }

    function company_department() {
        var filter_company = $("#filter_company").val();
        if (filter_company == "null")
            filter_company = "";

        var url = "<?php echo $base_url; ?>master/policy/get_companybased_department";

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

    function GroupNameBasedMemberName() {

        var filter_group = $("#filter_group").val();
        if (filter_group == "null")
            filter_group = "";

        var url = "<?php echo $base_url; ?>master/policy/get_groupBased_membername";
        var option_val = "";

        if (filter_group != "") {
            $.ajax({
                url: url,
                data: {
                    group_name: filter_group
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    if (data["status"] == true) {
                        var option_val = "";
                        var val = data["userdata"];
                        $('#filter_policy_holder').html("<option value='null'>Select Policy Holder</option>");
                        for (var i = 0; i < val.length; i++) {
                            var member_id = val[i]["id"];
                            var member_name = val[i]["name"].charAt(0).toUpperCase() + val[i]["name"].slice(1);
                            option_val += '<option value="' + member_id + '">' + member_name + '</option>';
                        }
                    } else {
                        $('#filter_policy_holder').html("<option value='null'>Select Policy Holder</option>");
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
        var filter_company = $("#filter_company").val();
        var filter_department = $("#filter_department").val();
        var filter_policy_type = $("#filter_policy_type").val();
        var filter_group = $("#filter_group").val();
        var filter_policy_holder = $("#filter_policy_holder").val();
        var filter_premium_status = $("#filter_premium_status").val();

        if (filter_year == "null")
            filter_year = "";
        if (filter_month == "null")
            filter_month = "";
        if (filter_company == "null")
            filter_company = "";
        if (filter_department == "null")
            filter_department = "";
        if (filter_policy_type == "null")
            filter_policy_type = "";
        if (filter_group == "null")
            filter_group = "";
        if (filter_policy_holder == "null")
            filter_policy_holder = "";
        if (filter_premium_status == "null")
            filter_premium_status = "";

        var url = "<?php echo $base_url; ?>master/renewal/filter_renewal_dump";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_year: filter_year,
                    filter_month: filter_month,
                    filter_company: filter_company,
                    filter_department: filter_department,
                    filter_policy_type: filter_policy_type,
                    filter_group: filter_group,
                    filter_policy_holder: filter_policy_holder,
                    filter_premium_status: filter_premium_status,
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
                            company_name = data[key].company_name;
                            department_name = data[key].department_name;
                            policy_type_title = data[key].policy_type_title;
                            member_name = data[key].member_name;

                            // master_agency_code = data[key].master_agency_code;
                            // sub_agent_code = data[key].sub_agent_code;
                            grpname = data[key].grpname;
                            policy_type = data[key].policy_type;
                            mode_of_premimum = data[key].mode_of_premimum;
                            date_from = data[key].date_from;
                            date_to = data[key].date_to;
                            // alert(date_to);
                            payment_date_from = data[key].payment_date_from;
                            payment_date_to = data[key].payment_date_to;
                            policy_no = data[key].policy_no;
                            date_commenced = data[key].date_commenced;
                            policy_upload = data[key].policy_upload;
                            reg_mobile = data[key].reg_mobile;
                            reg_email = data[key].reg_email;
                            var grpname = data[key].grpname;
                            var sum_insured = data[key].basic_sum_insured;
                            if (sum_insured == undefined || sum_insured == null || sum_insured == "null" || sum_insured == "undefined" || sum_insured == "") {
                                sum_insured = "0";
                            }
                            var gross_premium = data[key].basic_gross_premium;
                            // alert(gross_premium);
                            if (gross_premium == undefined || gross_premium == null || gross_premium == "null" || gross_premium == "undefined" || gross_premium == "") {
                                gross_premium = "0";
                            }
                            var comission = data[key].plan_policy_commission;
                            if (comission == undefined || comission == null || comission == "null" || comission == "undefined" || comission == "") {
                                comission = "0";
                            }
                            var floater_policy_type = data[key].floater_policy_type;
                            master_agency_name = data[key].master_agency_name;
                            master_agency_code = data[key].master_agency_code;
                            sub_agent_name = data[key].sub_agent_name;
                            sub_agent_code = data[key].sub_agent_code;

                            if (master_agency_name == undefined || master_agency_name == null || master_agency_name == "null" || master_agency_name == "")
                                master_agency_name = "";
                            else
                                master_agency_name = master_agency_name;
                            policy_upload = data[key].policy_upload;

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
                            // alert(floater_policy_type);
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

                            var next_year_premium_flag = data[key].next_year_premium_flag;
                            if (next_year_premium_flag == 1) {
                                next_year_premium_status = '<span class="badge badge-success pl-2"> Updated</span>';
                                anchor_tag = "<a class='dropdown-item edit' href='<?php echo base_url() . "master/renewal/renew_policy/"; ?>" + policy_id + "' id='renew' value='' type='button' ><b>Renew</b></a><a class='dropdown-item edit' href='<?php echo base_url() . "master/renewal/reminder/"; ?>" + policy_id + "' id='reminder_letter' value='' type='button'  ><b>View Letter</b></a>";
                            } else if (next_year_premium_flag == 0) {
                                next_year_premium_status = '<span class="badge badge-danger pl-2"> Not Updated</span>';
                                anchor_tag = "";
                            }

                            if (sub_agent_code == null)
                                sub_agent_code = "";

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

                            if (!isNaN(policy_id)) {
                                if (policy_member_status == 1) {
                                    status = 'Active ';
                                    // var status_btn_txt = "btn btn-outline-success waves-effect waves-light mt-1 btn-xs  edit";
                                    var status_btn_txt = "";
                                } else {
                                    status = 'In-Active ';
                                    // var status_btn_txt = "btn btn-outline-danger waves-effect waves-light mt-1 btn-xs  edit";
                                    var status_btn_txt = "";
                                }
                                if (isActive == 1) {
                                    var del_status = "No";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + policy_id + ")'><b>Delete</b></a>";
                                    // var delete_btn_txt = "<button class='btn btn-facebook btn-xs  mr-1 mt-1 delete' value='' type='button' onClick ='OnDelete(" + policy_id + ")' ><i class='fa fa-trash' aria-hidden='true'></i></button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + policy_id + ")'><b>Recover</b></a>";
                                    // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + policy_id + ")' class='btn btn-facebook btn-xs  mr-1 mt-1 delete'><i class='fa fa-undo' aria-hidden='true'></i></button></button>";
                                }

                                if (policy_upload == "") {
                                    var view_policy_upload = "";
                                    var download_policy_upload = "";
                                    var delete_policy_upload = "";
                                } else if (policy_upload != "") {
                                    var view_policy_upload = "<a href='<?php echo base_url(); ?>master/policy/view_doc/1/" + policy_id + "'  class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                    var download_policy_upload = "<a href='<?php echo base_url(); ?>master/policy/download_doc/1/" + policy_id + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                    var delete_policy_upload = "<a onclick=OnDelete_Doc('" + data["userdata"].policy_id + ',' + 1 + ',' + data["userdata"].policy_upload + ',' + '<?php echo base_url(); ?>master/policy/delete_doc' + "') href='javascript:void(0);'  class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                                }

                                // aler(download_policy_upload);
                                // aler(view_policy_upload);
                                var expiry_date = date_to;
                                var current_date = new Date().toLocaleDateString('en-CA'); // 2020-08-19 (year-month-day) notice the ;
                                var renew_btn = "";
                                var intimation_btn = "";
                                // alert(expiry_date);
                                // alert(current_date);
                                // if (current_date <= expiry_date) {
                                //     renew_btn = "";
                                // } else {
                                // renew_btn = " <a id='renew' href='<?php echo base_url() . "master/renewal/renew_policy/"; ?>" + policy_id + "' class='btn btn-facebook btn-xs  mr-1 mt-1 edit' id='edit'>Renew</a>";
                                // intimation_btn = " <a id='renew' href='<?php echo base_url() . "master/renewal/reminder/"; ?>" + policy_id + "' class='btn btn-facebook btn-xs  mr-1 mt-1 edit' id='edit'>View Letter</a>";

                                // }
                                // view_btn = " <a href='<?php echo base_url() . "master/policy/view_policy/"; ?>" + policy_id + "' class='btn btn-facebook btn-xs  mt-1 view' id='view'><i class='fas fa-eye'></i></a>";
                                // edit_btn = " <a href='<?php echo base_url() . "master/policy/edit_policy/"; ?>" + policy_id + "' class='btn btn-facebook btn-xs  mt-1 edit' id='edit'><i class='fas fa-pencil-alt'></i></a>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + policy_id + "' value='' type='button' onClick ='updateStatus(" + policy_id + "," + policy_member_status + ")' >" + status + "</button>";
                                // edit_premium_btn = "<button class='btn btn-facebook btn-xs edit' id='edit' value='' type='button' onClick ='onEdit(" + policy_id + ")' >Update Premium</button>";
                                // check_box = "<label for='select_all'><input type='checkbox' name='renewal_dum_ids[]' id='"+policy_id+"' value='"+policy_id+"' class='all ml-1'> </label>";<a class='dropdown-item edit' href='javascript:void(0);' id='update_premium' value='' type='button' onClick ='onEdit(" + policy_id + ")'  ><b>Update Premium</b></a>

                                check_box = "<div class='custom-control custom-checkbox'><input type='checkbox' name='renewal_dum_ids[]' class='custom-control-input all' id='" + policy_id + "' value='" + policy_id + "'><label class='custom-control-label' for='" + policy_id + "'></label></div>";
                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='<?php echo base_url() . 'master/renewal/view_policy/'; ?>" + policy_id + "' id='view'><b>View</b></a><a class='dropdown-item edit' href='<?php echo base_url() . 'master/renewal/editpolicy/'; ?>" + policy_id + "' id='edit'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + policy_id + "' href='javascript:void(0);' id='status_btn_" + policy_id + "' value='' type='button' onClick ='updateStatus(" + policy_id + "," + policy_member_status + ")' ><b>" + status + "</b></a>" + anchor_tag +delete_btn_txt+ "</div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + check_box + '</td><td>' + action_btn + '</td><td>' + sn + '</td><td>' + total_serial_no + '</td> <td>' + grpname + '</td> <td>' + member_name + '</td><td>' + department_name + '</td><td>' + policy_type_tit + floater_policy_type + '</td><td>' + policy_no + '</td><td>' + date_from + '</td><td>' + date_to + '</td><td>' + sum_insured + '</td><td>' + gross_premium + '</td><td>' + view_policy_upload + "&nbsp;&nbsp;&nbsp;" + download_policy_upload + "&nbsp;&nbsp;&nbsp;" + delete_policy_upload + '</td><td>' + company_name + '</td><td>' + next_year_premium_status + '</td></tr>';
                            }
                        });

                    } else {
                        $("#total_policy_data").text(" Count ( " + total_policy_data + " ) ");
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
        $("#filter_month").val("null");
        $("#filter_company").val("null");

        $("#filter_department").val("null");
        $("#filter_policy_type").val("null");
        $("#filter_group").val("null");
        $("#filter_policy_holder").val("null");
        $("#filter_premium_status").val("null");
        $("#filter_company").prop('selectedIndex', 0);
        $("#filter_group").prop('selectedIndex', 0);
        $("#filter_policy_holder").prop('selectedIndex', 0);
        getPOLICYList();
    }
</script>
<script>
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
        var url = "<?php echo $base_url; ?>master/renewal/get_renewal_dump_policy_list";
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
                    console.log(data);
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
                            company_name = data[key].company_name;
                            department_name = data[key].department_name;
                            policy_type_title = data[key].policy_type_title;
                            member_name = data[key].member_name;

                            // master_agency_code = data[key].master_agency_code;
                            // sub_agent_code = data[key].sub_agent_code;
                            grpname = data[key].grpname;
                            policy_type = data[key].policy_type;
                            mode_of_premimum = data[key].mode_of_premimum;
                            date_from = data[key].date_from;
                            date_to = data[key].date_to;
                            // alert(date_to);
                            payment_date_from = data[key].payment_date_from;
                            payment_date_to = data[key].payment_date_to;
                            policy_no = data[key].policy_no;
                            date_commenced = data[key].date_commenced;
                            policy_upload = data[key].policy_upload;
                            reg_mobile = data[key].reg_mobile;
                            reg_email = data[key].reg_email;
                            var grpname = data[key].grpname;
                            var sum_insured = data[key].basic_sum_insured;
                            if (sum_insured == undefined || sum_insured == null || sum_insured == "null" || sum_insured == "undefined" || sum_insured == "") {
                                sum_insured = "0";
                            }
                            var gross_premium = data[key].basic_gross_premium;
                            // alert(gross_premium);
                            if (gross_premium == undefined || gross_premium == null || gross_premium == "null" || gross_premium == "undefined" || gross_premium == "") {
                                gross_premium = "0";
                            }
                            var comission = data[key].plan_policy_commission;
                            if (comission == undefined || comission == null || comission == "null" || comission == "undefined" || comission == "") {
                                comission = "0";
                            }
                            var floater_policy_type = data[key].floater_policy_type;
                            master_agency_name = data[key].master_agency_name;
                            master_agency_code = data[key].master_agency_code;
                            sub_agent_name = data[key].sub_agent_name;
                            sub_agent_code = data[key].sub_agent_code;

                            if (master_agency_name == undefined || master_agency_name == null || master_agency_name == "null" || master_agency_name == "")
                                master_agency_name = "";
                            else
                                master_agency_name = master_agency_name;
                            policy_upload = data[key].policy_upload;

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
                            // alert(floater_policy_type);
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

                            var next_year_premium_flag = data[key].next_year_premium_flag;
                            if (next_year_premium_flag == 1) {
                                next_year_premium_status = '<span class="badge badge-success pl-2"> Updated</span>';
                                anchor_tag = "<a class='dropdown-item edit' href='<?php echo base_url() . "master/renewal/renew_policy/"; ?>" + policy_id + "' id='renew' value='' type='button' ><b>Renew</b></a><a class='dropdown-item edit' href='<?php echo base_url() . "master/renewal/reminder/"; ?>" + policy_id + "' id='reminder_letter' value='' type='button'  ><b>View Letter</b></a>";
                            } else if (next_year_premium_flag == 0) {
                                next_year_premium_status = '<span class="badge badge-danger pl-2"> Not Updated</span>';
                                anchor_tag = "";
                            }

                            if (sub_agent_code == null)
                                sub_agent_code = "";

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

                            if (!isNaN(policy_id)) {
                                if (policy_member_status == 1) {
                                    status = 'Active ';
                                    // var status_btn_txt = "btn btn-outline-success waves-effect waves-light mt-1 btn-xs  edit";
                                    var status_btn_txt = "";
                                } else {
                                    status = 'In-Active ';
                                    // var status_btn_txt = "btn btn-outline-danger waves-effect waves-light mt-1 btn-xs  edit";
                                    var status_btn_txt = "";
                                }
                                if (isActive == 1) {
                                    var del_status = "No";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + policy_id + ")'><b>Delete</b></a>";
                                    // var delete_btn_txt = "<button class='btn btn-facebook btn-xs  mr-1 mt-1 delete' value='' type='button' onClick ='OnDelete(" + policy_id + ")' ><i class='fa fa-trash' aria-hidden='true'></i></button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + policy_id + ")'><b>Recover</b></a>";
                                    // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + policy_id + ")' class='btn btn-facebook btn-xs  mr-1 mt-1 delete'><i class='fa fa-undo' aria-hidden='true'></i></button></button>";
                                }

                                if (policy_upload == "") {
                                    var view_policy_upload = "";
                                    var download_policy_upload = "";
                                    var delete_policy_upload = "";
                                } else if (policy_upload != "") {
                                    var view_policy_upload = "<a href='<?php echo base_url(); ?>master/policy/view_doc/1/" + policy_id + "'  class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                    var download_policy_upload = "<a href='<?php echo base_url(); ?>master/policy/download_doc/1/" + policy_id + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                    var delete_policy_upload = "<a onclick=OnDelete_Doc('" + data["userdata"].policy_id + ',' + 1 + ',' + data["userdata"].policy_upload + ',' + '<?php echo base_url(); ?>master/policy/delete_doc' + "') href='javascript:void(0);'  class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                                }

                                // aler(download_policy_upload);
                                // aler(view_policy_upload);
                                var expiry_date = date_to;
                                var current_date = new Date().toLocaleDateString('en-CA'); // 2020-08-19 (year-month-day) notice the ;
                                var renew_btn = "";
                                var intimation_btn = "";
                                // alert(expiry_date);
                                // alert(current_date);
                                // if (current_date <= expiry_date) {
                                //     renew_btn = "";
                                // } else {
                                // renew_btn = " <a id='renew' href='<?php echo base_url() . "master/renewal/renew_policy/"; ?>" + policy_id + "' class='btn btn-facebook btn-xs  mr-1 mt-1 edit' id='edit'>Renew</a>";
                                // intimation_btn = " <a id='renew' href='<?php echo base_url() . "master/renewal/reminder/"; ?>" + policy_id + "' class='btn btn-facebook btn-xs  mr-1 mt-1 edit' id='edit'>View Letter</a>";

                                // }
                                // view_btn = " <a href='<?php echo base_url() . "master/policy/view_policy/"; ?>" + policy_id + "' class='btn btn-facebook btn-xs  mt-1 view' id='view'><i class='fas fa-eye'></i></a>";
                                // edit_btn = " <a href='<?php echo base_url() . "master/policy/edit_policy/"; ?>" + policy_id + "' class='btn btn-facebook btn-xs  mt-1 edit' id='edit'><i class='fas fa-pencil-alt'></i></a>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + policy_id + "' value='' type='button' onClick ='updateStatus(" + policy_id + "," + policy_member_status + ")' >" + status + "</button>";
                                // edit_premium_btn = "<button class='btn btn-facebook btn-xs edit' id='edit' value='' type='button' onClick ='onEdit(" + policy_id + ")' >Update Premium</button>";
                                // check_box = "<label for='select_all'><input type='checkbox' name='renewal_dum_ids[]' id='"+policy_id+"' value='"+policy_id+"' class='all ml-1'> </label>";<a class='dropdown-item edit' href='javascript:void(0);' id='update_premium' value='' type='button' onClick ='onEdit(" + policy_id + ")'  ><b>Update Premium</b></a>

                                check_box = "<div class='custom-control custom-checkbox'><input type='checkbox' name='renewal_dum_ids[]' class='custom-control-input all' id='" + policy_id + "' value='" + policy_id + "'><label class='custom-control-label' for='" + policy_id + "'></label></div>";
                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='<?php echo base_url() . 'master/renewal/view_policy/'; ?>" + policy_id + "' id='view'><b>View</b></a><a class='dropdown-item edit' href='<?php echo base_url() . 'master/renewal/editpolicy/'; ?>" + policy_id + "' id='edit'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + policy_id + "' href='javascript:void(0);' id='status_btn_" + policy_id + "' value='' type='button' onClick ='updateStatus(" + policy_id + "," + policy_member_status + ")' ><b>" + status + "</b></a>" + anchor_tag +delete_btn_txt+ "</div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + check_box + '</td><td>' + action_btn + '</td><td>' + sn + '</td><td>' + total_serial_no + '</td> <td>' + grpname + '</td> <td>' + member_name + '</td><td>' + department_name + '</td><td>' + policy_type_tit + floater_policy_type + '</td><td>' + policy_no + '</td><td>' + date_from + '</td><td>' + date_to + '</td><td>' + sum_insured + '</td><td>' + gross_premium + '</td><td>' + view_policy_upload + "&nbsp;&nbsp;&nbsp;" + download_policy_upload + "&nbsp;&nbsp;&nbsp;" + delete_policy_upload + '</td><td>' + company_name + '</td><td>' + next_year_premium_status + '</td></tr>';
                            }
                        });

                    } else {
                        $("#total_policy_data").text(" Count ( " + total_policy_data + " ) ");
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

    function clearError() {
        $("#basic_sum_insured").removeClass("parsley-error");
        $("#basic_sum_insured_err").removeClass("text-danger").text("");

        $("#basic_gross_premium").removeClass("parsley-error");
        $("#basic_gross_premium_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#policy_id").text("");
        $("#basic_sum_insured").val("");
        $("#basic_gross_premium").val("");
        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function onEdit(val) {
        clearError();
        $("#policy_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();
        $('#form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/renewal/edit_premium_dump";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    policy_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    // var myObj = JSON.parse(data);
                    if (data["status"] == true) {
                        policy_id = data["userdata"].policy_id;
                        basic_sum_insured = data["userdata"].basic_sum_insured;
                        basic_gross_premium = data["userdata"].basic_gross_premium;
                        renewal_letter_premium_flag = data["userdata"].renewal_letter_premium_flag;

                        $("#policy_id").text(policy_id);
                        $("#basic_sum_insured").val(basic_sum_insured);
                        $("#basic_gross_premium").val(basic_gross_premium);

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
                        // document.getElementById("update").disabled = true;
                    }
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function onPremium_Update() {
        var policy_id = $("#policy_id").text();
        var basic_sum_insured = $("#basic_sum_insured").val();
        var basic_gross_premium = $("#basic_gross_premium").val();

        var url = "<?php echo $base_url; ?>master/renewal/update_premium_dump";

        $.ajax({
            type: "POST",
            url: url,
            data: {
                policy_id: policy_id,
                basic_sum_insured: basic_sum_insured,
                basic_gross_premium: basic_gross_premium,
            },
            dataType: 'json',
            async: false,
            cache: false,
            beforeSend: function() {

            },
            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#basic_sum_insured").val("");
                    $("#basic_sum_insured").removeClass("parsley-error");
                    $("#basic_gross_premium").val("");
                    $("#basic_gross_premium").removeClass("parsley-error");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["message"]["basic_sum_insured_err"] != "")
                        $("#basic_sum_insured").addClass("parsley-error");
                    else
                        $("#basic_sum_insured").removeClass("parsley-error");
                    $("#basic_sum_insured_err").addClass("text-danger").html(data["message"]["basic_sum_insured_err"]);

                    if (data["message"]["basic_gross_premium_err"] != "")
                        $("#basic_gross_premium").addClass("parsley-error");
                    else
                        $("#basic_gross_premium").removeClass("parsley-error");
                    $("#basic_gross_premium_err").addClass("text-danger").html(data["message"]["basic_gross_premium_err"]);

                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    function updateStatus(policy_id, policy_member_status) {

        var url = "<?php echo $base_url; ?>master/renewal/update_policy_member_status";

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
        var url = "<?php echo $base_url; ?>master/renewal/recoverpolicy";
        confirmation_alert(id = policy_id, url = url, title = "<?php echo $title; ?>", type = "Recover");
    }

    function OnDelete(policy_id) {
        var url = "<?php echo $base_url; ?>master/renewal/removepolicy";
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