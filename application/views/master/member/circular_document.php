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
                        <h4 class="page-title">Circular Document</h4>
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
                            <h4 class="modal-title">Circular Details</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-row">

                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="company" class="col-form-label col-md-4 text-right">Company<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select namse="company" id="company" class="form-control">
                                                        <option value="null">Select Company</option>
                                                        <?php $company = company_dropdown();
                                                        if (!empty($company)) : foreach ($company as $row) : ?>
                                                                <option value="<?php echo $row["mcompany_id"]; ?>"><?php echo $row["company_name"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <label class="col-form-label" id="company_err"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="department" class="col-form-label col-md-4 text-right">Department<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select namse="department" id="department" class="form-control" onchange="departmentBasedPolicy()">
                                                        <option value="null">Select Department</option>
                                                        <?php $department = department_dropdown();
                                                        if (!empty($department)) : foreach ($department as $row) : ?>
                                                                <option value="<?php echo $row["department_id"]; ?>"><?php echo $row["department_name"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <label class="col-form-label" id="department_err"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="policy_name" class="col-form-label col-md-4 text-right">Policy Name<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select namse="policy_name" id="policy_name" class="form-control">
                                                        <option value="null">Select Policy Name</option>
                                                        <?php $policy_name = policy_type_dropdown();
                                                        if (!empty($policy_name)) : foreach ($policy_name as $row) : ?>
                                                                <option value="<?php echo $row["policy_type_id"]; ?>"><?php echo $row["policy_type"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <label class="col-form-label" id="policy_name_err"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-8 m-b-1">
                                            <button type="button" class="btn btn-success waves-effect waves-light btn-sm" id="add_circular" onclick="Circular_add()">Add Circular</button>
                                        </div> -->
                                    </div>

                                    <!-- <div class="form-row" style="display:none;" id="circular_detail_div"> -->
                                    <div class="form-row" id="circular_detail_div">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="circular_date" class="col-form-label col-md-4 text-right">Circular Date<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="date" name="circular_date" id="circular_date" value="" placeholder="Enter Short Name" class="form-control circular_date">
                                                    <span id="circular_date_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="circular_upload" class="col-form-label col-md-4 text-right">Circular Upload<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="file" name="circular_upload" id="circular_upload" class="form-control filestyle circular_upload" data-input="false" id="filestyle-1" tabindex="-1" onchange="check_circular_upload()">
                                                    <span id="circular_upload_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <label for="circular_doc_reason" class="col-form-label col-md-2 text-right">Circular Remark</label>
                                                <div class="col-md-10">
                                                    <textarea rows="3" name="circular_doc_reason" id="circular_doc_reason" value="" placeholder="Enter Circular Remark" class="form-control circular_doc_reason"></textarea>
                                                    <span id="circular_doc_reason_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="plans_policy_id" hidden>1</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <center>
                                                <button onclick='update_circular_upload()' class="btn btn-primary btn-sm mt-2">Save Circular</button>
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

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="header-title">Circular Document List <span id="member_list_count"></span></h4>

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
                                        <!-- <th>SN</th> -->
                                        <th>
                                            <center>Company</center>
                                        </th>
                                        <th>Remark</th>
                                        <th>Circular Doc</th>
                                        <th>Circular Date</th>
                                        <th>Department</th>
                                        <th>Policy</th>
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
                            <label for="filter_company" class="col-form-label col-md-4 text-right">Company</label>
                            <div class="col-md-8">
                                <select class="form-control" data-toggle="select2" id="filter_company" name="filter_company" onchange="Filtercompany_department();FilterDepartmentBasedPolicyName();">
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
                                <select name="filter_department" id="filter_department" class="form-control" data-toggle="select2" onchange="FilterDepartmentBasedPolicyName();">
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
                            <label for="filter_remark" class="col-form-label col-md-4 text-right">Remark</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="filter_remark" name="filter_remark" placeholder="Enter Remark">
                            </div>
                        </div>
                        <div class="col-md-12 mt-1">
                            <center><button type="submit" id="search" class="btn btn-outline-secondary waves-effect width-md btn-sm mr-1" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="reset" class="btn btn-outline-secondary waves-effect btn-xs" onclick="Reset_data()"><b><i class="mdi mdi-undo"></i>Reset</b></button></center>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
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
    function Filtercompany_department() {
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

    function FilterDepartmentBasedPolicyName() {
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
        var filter_company = $("#filter_company").val();
        var filter_department = $("#filter_department").val();
        var filter_policy_name = $("#filter_policy_name").val();
        var filter_remark = $("#filter_remark").val();

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

        var url = "<?php echo $base_url; ?>member/filter_circular_doc_list";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_year: filter_year,
                    filter_month: filter_month,
                    filter_day: filter_day,
                    filter_company: filter_company,
                    filter_department: filter_department,
                    filter_policy_name: filter_policy_name,
                    filter_remark: filter_remark,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    $("#tableData").empty();
                    var member_list_count = 0;
                    $("#member_list_count").text("");
                    if (data["status"] == true) {
                        var view_btn = "";
                        var status_btn = "";
                        var member_id = "";
                        var member_name = "";
                        var member_contact = "";
                        var dob = "";
                        var document = [];
                        var member_email = "";
                        var group_name = "";
                        var member_status = "";
                        var del_flag = "";
                        var datas = "";
                        var status = "";

                        // alert(data["count_member"]);
                        $("#member_list_count").text(" Count (" + data["count_doc"] + ")");
                        var circular_doc_val = data["userdata"];
                        $("#tableData").empty();
                        var append_circular_doc = "";
                        var count = 1;
                        // alert(circular_doc_val);
                        $.each(circular_doc_val, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            var circular_doc_id = circular_doc_val[key].circular_doc_id;
                            var circular_doc_date = circular_doc_val[key].circular_doc_date;
                            var circular_doc_name = circular_doc_val[key].circular_doc_name;
                            var circular_doc_reason = circular_doc_val[key].circular_doc_reason;
                            var circular_doc_status = circular_doc_val[key].circular_doc_status;
                            var circular_doc_del_flag = circular_doc_val[key].circular_doc_del_flag;
                            // circular_doc_name = circular_doc_name.substr(0, 10);
                            var company_name = circular_doc_val[key].company_name;
                            var department_name = circular_doc_val[key].department_name;
                            var policy_name = circular_doc_val[key].policy_name;

                            if (company_name == "" || company_name == "null" || company_name == undefined || company_name == null)
                                company_name = "NA";

                            if (department_name == "" || department_name == "null" || department_name == undefined || department_name == null)
                                department_name = "NA";

                            if (policy_name == "" || policy_name == "null" || policy_name == undefined || policy_name == null)
                                policy_name = "NA";

                            var disabled = "";
                            var delete_circular_doc = "";
                            if (circular_doc_reason == "" || circular_doc_reason == "null" || circular_doc_reason == undefined || circular_doc_reason == null)
                                circular_doc_reason = "NA";

                            if (circular_doc_del_flag == 1) {
                                var del_status = "Delete";
                                disabled = "";
                                delete_circular_doc = "<a href='javascript:void(0);' class='text-danger delete' value='' type='button' onClick ='On_Circular_doc_Delete(" + circular_doc_id + "," + circular_doc_del_flag + ")'   id='common_del_cir_doc_" + circular_doc_id + "'><i class='fa fa-trash'></i></a>";
                            } else if (circular_doc_del_flag == 0) {
                                disabled = "disabled";
                                var del_status = "Recover";
                                // $("#circular_doc_count_" + circular_doc_id);
                                // $("#circular_doc_date_" + circular_doc_id);
                                // $("#circular_doc_name_" + circular_doc_id);
                                // $("#circular_doc_reason_" + circular_doc_id);
                                delete_circular_doc = "<a  href='javascript:void(0);' onclick='On_Circular_doc_Recover(" + circular_doc_id + "," + circular_doc_del_flag + ")' class='text-primary delete' id='common_del_cir_doc_" + circular_doc_id + "' ><i class='fa fa-undo'></i></a>";
                            }

                            // alert(disabled);
                            // alert(circular_doc_del_flag);
                            // alert(circular_doc_del_flag);
                            // alert(delete_circular_doc);
                            if (circular_doc_name == "" || circular_doc_name == "null" || circular_doc_name == null || circular_doc_name == undefined) {
                                var view_circular_doc = "";
                                var download_circular_doc = "";
                            } else if (circular_doc_name != "") {
                                var view_circular_doc = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/3/" + data["userdata"].plans_policy_id + "/" + circular_doc_id + "' target='_blank' id='view_circular_doc_" + circular_doc_id + "'><b><i class='far fa-eye'></i></b></a>";
                                var download_circular_doc = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/3/" + data["userdata"].plans_policy_id + "/" + circular_doc_id + "' id='download_circular_doc_" + circular_doc_id + "'><b><i class='fas fa-cloud-download-alt'></i></b></a>";
                            }
                            circular_doc_btn = "&nbsp;&nbsp;&nbsp;" + delete_circular_doc + "&nbsp;&nbsp;&nbsp;" + view_circular_doc + "&nbsp;&nbsp;&nbsp;" + download_circular_doc;
                            // alert(circular_doc_btn);circular_doc_reason_
                            append_circular_doc += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)" id="circular_doc_strike_' + circular_doc_id + '"><td>' + circular_doc_btn + '</td><td>' + sn + '</td><td><center><span id="company_name_' + circular_doc_id + '">' + company_name + '</span></center></td><td ><span id="circular_doc_reason_' + circular_doc_id + '">' + circular_doc_reason + '</span></td><td ><a href="<?php echo base_url(); ?>master/plans_policy/view_doc/3/' + data["userdata"].plans_policy_id + '/' + circular_doc_id + '"  target="_blank"><span id="circular_doc_name_' + circular_doc_id + '" class="mdi mdi-file-pdf" style="font-size: 30px;color:red;" title="' + circular_doc_name + '"></span></a></td><td><span id="circular_doc_date_' + circular_doc_id + '">' + circular_doc_date + '</span></td><td><span id="department_name_' + circular_doc_id + '">' + department_name + '</span></td><td><span id="policy_name_' + circular_doc_id + '">' + policy_name + '</span></td></tr>';
                            // append_circular_doc += '<tr id="circular_doc_strike_' + circular_doc_id + '"><td>' + circular_doc_btn + '</td><td>' + company_name + '</td><td >' + circular_doc_reason + '</td><td >' + circular_doc_name + '</td><td>' + circular_doc_date + '</td><td>' + department_name + '</td><td>' + policy_name + '</span></td></tr>';
                            count++;
                            // $("#circular_doc_name_" + circular_doc_id ).replace("_",'<br/>');
                        });
                        $("#tableData").append(append_circular_doc);

                        $.each(circular_doc_val, function(key, val) {
                            var circular_doc_id = circular_doc_val[key].circular_doc_id;
                            var circular_doc_del_flag = circular_doc_val[key].circular_doc_del_flag;
                            if (circular_doc_del_flag == 0) {
                                $("#circular_doc_count_" + circular_doc_id).wrap("<strike>");
                                $("#circular_doc_date_" + circular_doc_id).wrap("<strike>");
                                $("#circular_doc_name_" + circular_doc_id).wrap("<strike>");
                                $("#circular_doc_reason_" + circular_doc_id).wrap("<strike>");

                                $("#company_name_" + circular_doc_id).wrap("<strike>");
                                $("#department_name_" + circular_doc_id).wrap("<strike>");
                                $("#policy_name_" + circular_doc_id).wrap("<strike>");

                                $("#view_circular_doc_" + circular_doc_id).hide();
                                $("#download_circular_doc_" + circular_doc_id).hide();
                            } else {
                                $("#view_circular_doc_" + circular_doc_id).show();
                                $("#download_circular_doc_" + circular_doc_id).show();
                            }
                        });
                        // $("table #datatable th").attr("style","");
                        // $("table #datatable th").attr("style","width:100px;");
                        // $("table #datatable th").removeAttr("style");​
                        // $("table #datatable th").attr("style","");​
                        $("table #datatable th").removeAttr("style");
                        // $("table #datatable th" ).css("width:", "")
                    } else {
                        $("#member_list_count").text(" Count (" + member_list_count + ")");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="8"><center>Data Not Found</center></td> </tr>';
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

    function Reset_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter Off');
        $('#filter_form_modal').modal('toggle');

        // $("#filter_year").val();
        $("#filter_year").val("null");
        $("#filter_month").val("null");
        $("#filter_day").val("null");
        $("#filter_company").val("null");
        $("#filter_department").val("null");
        $("#filter_policy_name").val("null");
        $("#filter_remark").val("");

        $("#filter_year").prop('selectedIndex', 0);
        $("#filter_month").prop('selectedIndex', 0);
        $("#filter_day").prop('selectedIndex', 0);
        $("#filter_company").prop('selectedIndex', 0);
        $("#filter_department").prop('selectedIndex', 0);
        $("#filter_policy_name").prop('selectedIndex', 0);

        get_circular_doc_list();
    }

    function departmentBasedPolicy() {
        var department = $("#department").val();
        // alert(department);
        var url = "<?php echo $base_url; ?>master/plans_policy/department_based_policy";

        if (department != "") {
            $.ajax({
                url: url,
                data: {
                    department: department
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var option_val = "";
                    if (data["status"] == true) {
                        var val = data["userdata"];
                        $('#policy_name').empty("");
                        option_val = '<option value="null">Select Policy Name</option>';
                        for (var i = 0; i < val.length; i++) {
                            var policy_type_id = val[i]["policy_type_id"];
                            var policy_type = val[i]["policy_type"];
                            option_val += '<option value=' + policy_type_id + '>' + policy_type + '</option>';
                        }
                    } else {
                        $('#policy_name').empty("");
                        option_val = '<option value="null">Select Policy Name</option>';
                    }
                    $('#policy_name').append(option_val);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }
    $("#AddForm").click(function() {
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
    });
    $('#document_name').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    function clearError() {
        $("#document_name").removeClass("parsley-error");
        $("#document_name_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#document_id").text("");
        $("#document_name").val("");
        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function OnRecover(member_id) {
        // var document_id = $("#document_id").text();
        var url = "<?php echo $base_url; ?>member/recover_member";
        confirmation_alert(id = member_id, url = url, title = "Member", type = "Recover");
    }

    function OnDelete(member_id) {
        // var document_id = $("#document_id").text();
        var url = "<?php echo $base_url; ?>member/remove_member";
        confirmation_alert(id = member_id, url = url, title = "Member", type = "Delet");
    }


    get_circular_doc_list();

    function get_circular_doc_list() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>member/get_circular_doc_list";
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
                    $("#tableData").empty();
                    var member_list_count = 0;
                    $("#member_list_count").text("");
                    if (data["status"] == true) {
                        var view_btn = "";
                        var status_btn = "";
                        var member_id = "";
                        var member_name = "";
                        var member_contact = "";
                        var dob = "";
                        var document = [];
                        var member_email = "";
                        var group_name = "";
                        var member_status = "";
                        var del_flag = "";
                        var datas = "";
                        var status = "";

                        // alert(data["count_member"]);
                        $("#member_list_count").text(" Count (" + data["count_doc"] + ")");
                        var circular_doc_val = data["userdata"];
                        $("#tableData").empty();
                        var append_circular_doc = "";
                        var count = 1;
                        // alert(circular_doc_val);
                        $.each(circular_doc_val, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            var circular_doc_id = circular_doc_val[key].circular_doc_id;
                            var circular_doc_date = circular_doc_val[key].circular_doc_date;
                            var circular_doc_name = circular_doc_val[key].circular_doc_name;
                            var circular_doc_reason = circular_doc_val[key].circular_doc_reason;
                            var circular_doc_status = circular_doc_val[key].circular_doc_status;
                            var circular_doc_del_flag = circular_doc_val[key].circular_doc_del_flag;
                            // circular_doc_name = circular_doc_name.substr(0, 10);
                            var company_name = circular_doc_val[key].company_name;
                            var department_name = circular_doc_val[key].department_name;
                            var policy_name = circular_doc_val[key].policy_name;

                            if (company_name == "" || company_name == "null" || company_name == undefined || company_name == null)
                                company_name = "NA";

                            if (department_name == "" || department_name == "null" || department_name == undefined || department_name == null)
                                department_name = "NA";

                            if (policy_name == "" || policy_name == "null" || policy_name == undefined || policy_name == null)
                                policy_name = "NA";

                            var disabled = "";
                            var delete_circular_doc = "";
                            if (circular_doc_reason == "" || circular_doc_reason == "null" || circular_doc_reason == undefined || circular_doc_reason == null)
                                circular_doc_reason = "NA";

                            if (circular_doc_del_flag == 1) {
                                var del_status = "Delete";
                                disabled = "";
                                delete_circular_doc = "<a href='javascript:void(0);' class='text-danger delete' value='' type='button' onClick ='On_Circular_doc_Delete(" + circular_doc_id + "," + circular_doc_del_flag + ")'   id='common_del_cir_doc_" + circular_doc_id + "'><i class='fa fa-trash'></i></a>";
                            } else if (circular_doc_del_flag == 0) {
                                disabled = "disabled";
                                var del_status = "Recover";
                                // $("#circular_doc_count_" + circular_doc_id);
                                // $("#circular_doc_date_" + circular_doc_id);
                                // $("#circular_doc_name_" + circular_doc_id);
                                // $("#circular_doc_reason_" + circular_doc_id);
                                delete_circular_doc = "<a  href='javascript:void(0);' onclick='On_Circular_doc_Recover(" + circular_doc_id + "," + circular_doc_del_flag + ")' class='text-primary delete' id='common_del_cir_doc_" + circular_doc_id + "' ><i class='fa fa-undo'></i></a>";
                            }

                            // alert(disabled);
                            // alert(circular_doc_del_flag);
                            // alert(circular_doc_del_flag);
                            // alert(delete_circular_doc);
                            if (circular_doc_name == "" || circular_doc_name == "null" || circular_doc_name == null || circular_doc_name == undefined) {
                                var view_circular_doc = "";
                                var download_circular_doc = "";
                            } else if (circular_doc_name != "") {
                                var view_circular_doc = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/3/" + data["userdata"].plans_policy_id + "/" + circular_doc_id + "' target='_blank' id='view_circular_doc_" + circular_doc_id + "'><b><i class='far fa-eye'></i></b></a>";
                                var download_circular_doc = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/3/" + data["userdata"].plans_policy_id + "/" + circular_doc_id + "' id='download_circular_doc_" + circular_doc_id + "'><b><i class='fas fa-cloud-download-alt'></i></b></a>";
                            }
                            circular_doc_btn = "&nbsp;&nbsp;&nbsp;" + delete_circular_doc + "&nbsp;&nbsp;&nbsp;" + view_circular_doc + "&nbsp;&nbsp;&nbsp;" + download_circular_doc;
                            // alert(circular_doc_btn);circular_doc_reason_
                            append_circular_doc += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)" id="circular_doc_strike_' + circular_doc_id + '"><td>' + circular_doc_btn + '</td><td>' + sn + '</td><td><center><span id="company_name_' + circular_doc_id + '">' + company_name + '</span></center></td><td ><span id="circular_doc_reason_' + circular_doc_id + '">' + circular_doc_reason + '</span></td><td ><a href="<?php echo base_url(); ?>master/plans_policy/view_doc/3/' + data["userdata"].plans_policy_id + '/' + circular_doc_id + '"  target="_blank"><span id="circular_doc_name_' + circular_doc_id + '" class="mdi mdi-file-pdf" style="font-size: 30px;color:red;" title="' + circular_doc_name + '"></span></a></td><td><span id="circular_doc_date_' + circular_doc_id + '">' + circular_doc_date + '</span></td><td><span id="department_name_' + circular_doc_id + '">' + department_name + '</span></td><td><span id="policy_name_' + circular_doc_id + '">' + policy_name + '</span></td></tr>';
                            // append_circular_doc += '<tr id="circular_doc_strike_' + circular_doc_id + '"><td>' + circular_doc_btn + '</td><td>' + company_name + '</td><td >' + circular_doc_reason + '</td><td >' + circular_doc_name + '</td><td>' + circular_doc_date + '</td><td>' + department_name + '</td><td>' + policy_name + '</span></td></tr>';
                            count++;
                            // $("#circular_doc_name_" + circular_doc_id ).replace("_",'<br/>');
                        });
                        $("#tableData").append(append_circular_doc);

                        $.each(circular_doc_val, function(key, val) {
                            var circular_doc_id = circular_doc_val[key].circular_doc_id;
                            var circular_doc_del_flag = circular_doc_val[key].circular_doc_del_flag;
                            if (circular_doc_del_flag == 0) {
                                $("#circular_doc_count_" + circular_doc_id).wrap("<strike>");
                                $("#circular_doc_date_" + circular_doc_id).wrap("<strike>");
                                $("#circular_doc_name_" + circular_doc_id).wrap("<strike>");
                                $("#circular_doc_reason_" + circular_doc_id).wrap("<strike>");

                                $("#company_name_" + circular_doc_id).wrap("<strike>");
                                $("#department_name_" + circular_doc_id).wrap("<strike>");
                                $("#policy_name_" + circular_doc_id).wrap("<strike>");

                                $("#view_circular_doc_" + circular_doc_id).hide();
                                $("#download_circular_doc_" + circular_doc_id).hide();
                            } else {
                                $("#view_circular_doc_" + circular_doc_id).show();
                                $("#download_circular_doc_" + circular_doc_id).show();
                            }
                        });
                        // $("table #datatable th").attr("style","");
                        // $("table #datatable th").attr("style","width:100px;");
                        // $("table #datatable th").removeAttr("style");​
                        // $("table #datatable th").attr("style","");​
                        $("table #datatable th").removeAttr("style");
                        // $("table #datatable th" ).css("width:", "")
                    } else {
                        $("#member_list_count").text(" Count (" + member_list_count + ")");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="8"><center>Data Not Found</center></td> </tr>';
                    }

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function Circular_add() {
        $("#add_circular").hide();
        $("#circular_detail_div").show();
    }

    function check_circular_upload() {
        var ext = $('#circular_upload').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['png', 'jpg', 'jpeg', 'pdf']) == -1) {
            toaster(message_type = "Error", message_txt = "Invalid Extension!", message_icone = "error");
            toaster(message_type = "Error", message_txt = "Please Select Only PDF And Image Document Only.", message_icone = "error");
            // alert('invalid extension!');
            var attr = $('#upload').attr('disabled');
            // alert(attr);
            if (attr == undefined || attr == false) {
                // alert("NO");
                $('#upload').attr("disabled", true);
            }
        } else {
            $('#upload').removeAttr('disabled');
        }
    }

    function update_circular_upload() {
        var plans_policy_id = $("#plans_policy_id").text();
        var company = $("#company").val();
        var department = $("#department").val();
        var policy_name = $("#policy_name").val();
        var company_name_txt = $("#company option:selected").text();
        var department_name_txt = $("#department option:selected").text();
        var policy_name_txt = $("#policy_name option:selected").text();
        var policy_type = $("#policy_type").val();
        var document_list = $("#document_list").val();
        var circular_date = $("#circular_date").val();
        var circular_upload = $('#circular_upload').prop('files')[0];
        var circular_doc_reason = $("#circular_doc_reason").val();
        if (circular_upload == undefined || circular_upload == "") {
            toaster(message_type = "Error", message_txt = "Please Select Circular Upload File!", message_icone = "error");
            return false;
        }
        if (circular_date == undefined || circular_date == "") {
            toaster(message_type = "Error", message_txt = "Please Select Circular Date File!", message_icone = "error");
            return false;
        }
        // alert(circular_upload);

        if (company == "null")
            company = "";

        if (department == "null")
            department = "";

        if (policy_name == "null")
            policy_name = "";

        if (document_list == "null")
            document_list = "";

        var form_data = new FormData();
        form_data.append('plans_policy_id', plans_policy_id);
        form_data.append('company', company);
        form_data.append('department', department);
        form_data.append('policy_name', policy_name);

        form_data.append('company_name_txt', company_name_txt);
        form_data.append('department_name_txt', department_name_txt);
        form_data.append('policy_name_txt', policy_name_txt);

        form_data.append('policy_type', policy_type);
        form_data.append('document_list', document_list);

        form_data.append('circular_date', circular_date);
        form_data.append('circular_upload', circular_upload);
        form_data.append('circular_doc_reason', circular_doc_reason);

        var url = "<?php echo $base_url; ?>master/plans_policy/update_circular_upload";

        $.ajax({
            url: url,
            data: form_data,
            type: 'POST',
            dataType: 'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {},

            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    // $("#company").val("null");
                    // $("#department").val("null");
                    // $("#policy_name").val("null");
                    // $("#policy_type").val("");
                    // $("#document_list").val("null");
                    $("#circular_upload").val("");
                    $("#circular_doc_reason").val("");

                    $("#company").removeClass("parsley-error");
                    $("#department").removeClass("parsley-error");
                    $("#policy_name").removeClass("parsley-error");
                    $("#policy_type").removeClass("parsley-error");
                    $("#document_list").removeClass("parsley-error");
                    get_circular_doc_list();
                } else {
                    if (data["messages"] != "") {

                        if (data["messages"]["circular_upload_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["circular_upload_err"], message_icone = "error");
                        if (data["messages"]["circular_upload_err"] != "")
                            $("#circular_upload").addClass("parsley-error");
                        else
                            $("#circular_upload").removeClass("parsley-error");
                        $("#circular_upload_err").addClass("text-danger").html(data["messages"]["circular_upload_err"]);

                    } else {
                        if (data["message"]["company_err"] != "")
                            $("#company").addClass("parsley-error");
                        else
                            $("#company").removeClass("parsley-error");
                        $("#company_err").addClass("text-danger").html(data["message"]["company_err"]);

                        if (data["message"]["department_err"] != "")
                            $("#department").addClass("parsley-error");
                        else
                            $("#department").removeClass("parsley-error");
                        $("#department_err").addClass("text-danger").html(data["message"]["department_err"]);

                        if (data["message"]["policy_name_err"] != "")
                            $("#policy_name").addClass("parsley-error");
                        else
                            $("#policy_name").removeClass("parsley-error");
                        $("#policy_name_err").addClass("text-danger").html(data["message"]["policy_name_err"]);

                        if (data["message"]["policy_type_err"] != "")
                            $("#policy_type").addClass("parsley-error");
                        else
                            $("#policy_type").removeClass("parsley-error");
                        $("#policy_type_err").addClass("text-danger").html(data["message"]["policy_type_err"]);

                        if (data["message"]["document_liste_err"] != "")
                            $("#document_list").addClass("parsley-error");
                        else
                            $("#document_list").removeClass("parsley-error");
                        $("#document_list_err").addClass("text-danger").html(data["message"]["document_liste_err"]);

                    }
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    function On_Circular_doc_Recover(circular_doc_id, circular_doc_del_flag) {
        var url = "<?php echo $base_url; ?>master/plans_policy/recover_circular_doc";
        Sweet_confirmation_alert(id = circular_doc_id, status = circular_doc_del_flag, url = url, title = "Circular Document", type = "Recover");
    }

    function On_Circular_doc_Delete(circular_doc_id, circular_doc_del_flag) {
        var url = "<?php echo $base_url; ?>master/plans_policy/remove_circular_doc";
        Sweet_confirmation_alert(id = circular_doc_id, status = circular_doc_del_flag, url = url, title = "Circular Document", type = "Delet");
    }

    function Sweet_confirmation_alert(id = "", status = "", url = "", title = "", type = "") {
        swal.fire({
            title: "Are you sure to " + type + "e This " + title + " ",
            text: "Would you like to proceed ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: false
        }).
        then(function(t) {
            // alert(t.value);
            if (t.value == true) {
                $.ajax({
                    url: url,
                    data: {
                        id: id
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {

                    },
                    success: function(data) {
                        if (data["status"] == true) {
                            swal.fire(title + " " + type + "ed Successfully! ", {
                                icon: "success",
                                type: "success",
                                timer: 2000,
                            });
                            if (status == 1) {
                                status = 0;
                                $("#common_del_cir_doc_" + id).attr("onclick", "On_Circular_doc_Recover(" + id + "," + status + ")");
                                $("#common_del_cir_doc_" + id).removeClass("text-danger delete");
                                $("#common_del_cir_doc_" + id).addClass("text-primary delete");
                                $("#common_del_cir_doc_" + id).html("");
                                $("#common_del_cir_doc_" + id).html("<i class='fa fa-undo'></i>");

                                $("#circular_doc_count_" + id).wrap("<strike>");
                                $("#circular_doc_date_" + id).wrap("<strike>");
                                $("#circular_doc_name_" + id).wrap("<strike>");
                                $("#circular_doc_reason_" + id).wrap("<strike>");

                                $("#company_name_" + id).wrap("<strike>");
                                $("#department_name_" + id).wrap("<strike>");
                                $("#policy_name_" + id).wrap("<strike>");

                                $("#view_circular_doc_" + id).hide();
                                $("#download_circular_doc_" + id).hide();
                            } else if (status == 0) {
                                status = 1;
                                $("#common_del_cir_doc_" + id).attr("onclick", "On_Circular_doc_Delete(" + id + "," + status + ")");
                                $("#common_del_cir_doc_" + id).removeClass("text-primary delete");
                                $("#common_del_cir_doc_" + id).addClass("text-danger delete");
                                $("#common_del_cir_doc_" + id).html("");
                                $("#common_del_cir_doc_" + id).html("<i class='fa fa-trash'></i>");
                                var span_Tags = $("span");
                                if ($("#circular_doc_count_" + id).parent().is("strike")) {
                                    $("#circular_doc_count_" + id).unwrap();
                                }
                                if ($("#circular_doc_date_" + id).parent().is("strike")) {
                                    $("#circular_doc_date_" + id).unwrap();
                                }
                                if ($("#circular_doc_name_" + id).parent().is("strike")) {
                                    $("#circular_doc_name_" + id).unwrap();
                                }
                                if ($("#circular_doc_reason_" + id).parent().is("strike")) {
                                    $("#circular_doc_reason_" + id).unwrap();
                                }
                                if ($("#company_name_" + id).parent().is("strike")) {
                                    $("#company_name_" + id).unwrap();
                                }
                                if ($("#department_name_" + id).parent().is("strike")) {
                                    $("#department_name_" + id).unwrap();
                                }
                                if ($("#policy_name_" + id).parent().is("strike")) {
                                    $("#policy_name_" + id).unwrap();
                                }

                                $("#view_circular_doc_" + id).show();
                                $("#download_circular_doc_" + id).show();

                            }
                        } else {
                            swal.fire("Error On Deleteing " + title + "!", {
                                icon: "danger",
                                type: "warning",
                                timer: 2000,
                            });
                        }
                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            } else {
                swal.fire("Cancelled", "", "error");
            }

        })
    }

    $(document).ready(function() {
        var date = new Date();

        var day = ("0" + date.getDate()).slice(-2);
        var month = ("0" + (date.getMonth() + 1)).slice(-2);

        var today = date.getFullYear() + "-" + (month) + "-" + (day);
        $('#circular_date').val(today);
    });
</script>
<script>
    // $(document).ready(function() {
    //     var path = window.location.pathname;
    //     var page = path.split("/").pop();
    //     var user_role_id = <?php echo  $this->session->userdata("@_user_role_id"); ?>;
    //     var submenu_permission = "<?php echo $this->session->userdata("@_user_role_sub_menu_permission"); ?>";
    //     var role_permission = '<?php echo $this->session->userdata("@_staff_role_permission"); ?>';
    //     var url = '<?php echo base_url(); ?>login/logout';
    //     if ((user_role_id != 1) && (user_role_id != 2)) {
    //         var id = $("#submenu").data("value");
    //         if (id != "") {
    //             CheckFormAccess(submenu_permission, 7, url);
    //             check(role_permission, 7);
    //         }
    //     }
    // });
</script>