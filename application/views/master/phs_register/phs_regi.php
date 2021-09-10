<style>
    .table td,
    .table th {
        padding: .2rem;
    }
</style>
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
                                                        <td width="40%">Serial No :</td>
                                                        <td><strong><span id="serial_no_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Policy No :</td>
                                                        <td><strong><span id="policy_no_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Holder Type :</td>
                                                        <td><strong><span id="holder_type_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Policy Holder :</td>
                                                        <td><strong><span id="policy_holder_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Company Type :</td>
                                                        <td><strong><span id="company_type_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Company :</td>
                                                        <td><strong><span id="company_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col-md-4" id="branch_code_div" style="display:none;">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Branch Code : </td>
                                                        <td><strong><span id="branch_code_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Receipt No :</td>
                                                        <td><strong><span id="receipt_no_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Receipt Doc :</td>
                                                        <td><strong><span id="receipt_doc_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Due Date :</td>
                                                        <td><strong><span id="due_date_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Ammount :</td>
                                                        <td><strong><span id="ammount_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Final Doc :</td>
                                                        <td><strong><span id="final_doc_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Purpose Of Sending :</td>
                                                        <td><strong><span id="purpose_of_sending_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Types Of Document :</td>
                                                        <td><strong><span id="types_of_doc_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="40%">Remark :</td>
                                                        <td><strong><span id="remark_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
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
                                                        <option value="<?php echo $i; ?>" <?php //if ($i == $currently_selected) echo "selected"; 
                                                                                            ?>><?php echo $i; ?></option>
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
                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_serial_no" class="col-form-label col-md-4 text-right">Serial No</label>
                                            <div class="col-md-8">
                                                <input type="text" name="filter_serial_no" id="filter_serial_no" class="form-control filter_serial_no" placeholder="Enter Serial No">
                                            </div>
                                        </div>
                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_policy_no" class="col-form-label col-md-4 text-right">Policy No</label>
                                            <div class="col-md-8">
                                                <input type="text" name="filter_policy_no" id="filter_policy_no" class="form-control filter_policy_no" placeholder="Enter Policy No">
                                            </div>
                                        </div>
                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_branch_code" class="col-form-label col-md-4 text-right">Branch Code</label>
                                            <div class="col-md-8">
                                                <input type="text" name="filter_branch_code" id="filter_branch_code" class="form-control filter_branch_code" placeholder="Enter Branch Code">
                                            </div>
                                        </div>
                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_receipt_no" class="col-form-label col-md-4 text-right">Receipt No.</label>
                                            <div class="col-md-8">
                                                <input type="text" name="filter_receipt_no" id="filter_receipt_no" class="form-control filter_receipt_no" placeholder="Enter Receipt No.">
                                            </div>
                                        </div>
                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_due_date" class="col-form-label col-md-4 text-right">Due Date</label>
                                            <div class="col-md-8">
                                                <input type="text" name="filter_due_date" id="filter_due_date" class="form-control filter_due_date" placeholder="Enter Due Date">
                                            </div>
                                        </div>
                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_holder_type" class="col-form-label col-md-4 text-right">Holder Type</label>
                                            <div class="col-md-8">
                                                <select name="filter_holder_type" id="filter_holder_type" class="form-control" onchange="HolderType()">
                                                    <option value="null">Select Holder Type</option>
                                                    <option value="Manual">Manual</option>
                                                    <option value="System">System</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_policy_holder" class="col-form-label col-md-4 text-right">Policy Holder</label>
                                            <div class="col-md-8" id="holder_div">
                                                <input type="text" name="filter_policy_holder" id="filter_policy_holder" class="form-control filter_policy_holder" placeholder="Enter Policy Holder">
                                            </div>
                                        </div>
                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_company_type" class="col-form-label col-md-4 text-right">Company Type</label>
                                            <div class="col-md-8">
                                                <select name="filter_company_type" id="filter_company_type" class="form-control" onchange="CompanyType()">
                                                    <option value="null">Select Company Type</option>
                                                    <option value="Manual">Manual</option>
                                                    <option value="System">System</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_company" class="col-form-label col-md-4 text-right">Company</label>
                                            <div class="col-md-8" id="company_div">
                                                <input type="text" name="filter_company" id="filter_company" class="form-control filter_company" placeholder="Enter Company">
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-1">
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
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_phs_regi_data"></span></h4>
                            </div>
                            <!-- <div class="col-md-4">

                            </div> -->
                            <div class="col-md-6 text-right">
                                <a id="AddForm" href="<?php echo base_url() . "master/phs_regi/phs_regi/1"; ?>" class='btn btn-facebook btn-xs'>Add</a>
                                <button type="submit" id="filter_btn" class="btn btn-outline-secondary waves-effect btn-xs"><b><i class="mdi mdi-magnify"></i>&nbsp;Filter Off</b></button>
                            </div>
                        </div>
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
                                                    <center>Action</center>
                                                </th>
                                                <th>
                                                    <center>SN.</center>
                                                </th>
                                                <th>
                                                    <center>Serial No.</center>
                                                </th>
                                                <th>
                                                    <center>Policy No.</center>
                                                </th>
                                                <th>
                                                    <center>Holder Type</center>
                                                </th>
                                                <th>
                                                    <center>Policy Holder</center>
                                                </th>
                                                <th>
                                                    <center>Company Type</center>
                                                </th>
                                                <th>
                                                    <center>Company</center>
                                                </th>
                                                <th>
                                                    <center>Branch Code</center>
                                                </th>
                                                <th>
                                                    <center>Receipt No.</center>
                                                </th>
                                                <th>
                                                    <center>Due Date</center>
                                                </th>
                                                <th>
                                                    <center>Ammount</center>
                                                </th>
                                                <th>
                                                    <center>Purpose</center>
                                                </th>
                                                <th>
                                                    <center>Document</center>
                                                </th>
                                                <th>
                                                    <center>Remark</center>
                                                </th>
                                                <th>
                                                    <center>Receipt Doc.</center>
                                                </th>
                                                <th>
                                                    <center>Final Doc</center>
                                                </th>

                                                <th>
                                                    <center>Created</center>
                                                </th>
                                                <th>
                                                    <center>Modified</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableData"></tbody>
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
    $(function() {
        $("#filter_due_date").datepicker({
            'format': 'dd-mm-yyyy',
            'autoclose': true,
            'todayHighlight': true
        });
    });

    function CompanyType() {
        var filter_company_type = $("#filter_company_type option:selected").text();

        if (filter_company_type == "System") {
            $("#company_div").empty("");
            $("#company_div").append('<select class="form-control" data-toggle="select2" id="filter_company" name="filter_company" ><option value="null">Select Company</option><?php $company = company_dropdown();
                                                                                                                                                                                if (!empty($company)) : foreach ($company as $row) : ?><option value="<?php echo $row["mcompany_id"]; ?>"><?php echo ucwords(addslashes($row["company_name"])); ?></option><?php endforeach;
                                                                                                                                                                                                                                                                                                                                                    endif; ?> </select>');
        } else if (filter_company_type == "Manual") {
            $("#company_div").empty("");
            $("#company_div").append('<input type="text" name="filter_company" id="filter_company" value="" placeholder="Enter Company" class="form-control">');
        }
    }

    function HolderType() {
        var filter_holder_type = $("#filter_holder_type option:selected").text();

        if (filter_holder_type == "System") {
            $("#holder_div").empty("");
            $("#holder_div").append('<select name="filter_policy_holder" id="filter_policy_holder" class="form-control filter_policy_holder" data-toggle="select2"><option value="null">Select Policy Holder Name</option><?php $members = members_dropdown();
                                                                                                                                                                                                                            if (!empty($members)) : foreach ($members as $row7) :  ?><option value="<?php echo $row7["id"]; ?>" ><?php echo ucwords(addslashes($row7["name"])); ?></option><?php endforeach;
                                                                                                                                                                                                                                                                                                                                                                                    endif; ?></select>');
        } else if (filter_holder_type == "Manual") {
            $("#holder_div").empty("");
            $("#holder_div").append('<input type="text" name="filter_policy_holder" id="filter_policy_holder" value="" placeholder="Enter Policy Holder Name" class="form-control" >');
        }
    }

    function Filter_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter On');
        $('#filter_form_modal').modal('toggle');

        var filter_year = $("#filter_year").val();
        var filter_month = $("#filter_month").val();
        var filter_day = $("#filter_day").val();
        var filter_serial_no = $("#filter_serial_no").val();
        var filter_policy_no = $("#filter_policy_no").val();
        var filter_branch_code = $("#filter_branch_code").val();
        var filter_receipt_no = $("#filter_receipt_no").val();
        var filter_due_date = $("#filter_due_date").val();
        var filter_holder_type = $("#filter_holder_type").val();
        var filter_company_type = $("#filter_company_type").val();
        var filter_policy_holder = $("#filter_policy_holder").val();
        var filter_company = $("#filter_company").val();

        if (filter_year == "null")
            filter_year = "";
        if (filter_month == "null")
            filter_month = "";
        if (filter_day == "null")
            filter_day = "";
        if (filter_due_date == "null" || filter_due_date == null || filter_due_date == undefined)
            filter_due_date = "";
        if (filter_holder_type == "null")
            filter_holder_type = "";
        if (filter_company_type == "null")
            filter_company_type = "";
        if (filter_policy_holder == "null")
            filter_policy_holder = "";
        if (filter_company == "null")
            filter_company = "";

        var url = "<?php echo $base_url; ?>master/phs_regi/filter_phs_regi_list";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_year: filter_year,
                    filter_month: filter_month,
                    filter_day: filter_day,
                    filter_serial_no: filter_serial_no,
                    filter_policy_no: filter_policy_no,
                    filter_branch_code: filter_branch_code,
                    filter_receipt_no: filter_receipt_no,
                    filter_due_date: filter_due_date,
                    filter_holder_type: filter_holder_type,
                    filter_company_type: filter_company_type,
                    filter_policy_holder: filter_policy_holder,
                    filter_company: filter_company,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var total_phs_regi_data = 0;
                    $("#total_phs_regi_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var phs_regi_id = "";
                        var serial_no = "";
                        var policy_no = "";
                        var policy_holder = "";
                        var fk_company_id = "";
                        var phs_regi_status = "";
                        var datas = "";
                        var status = "";
                        var isActive = "";
                        var document = "";
                        total_phs_regi_data = data["total_phs_regi_data"];
                        $("#total_phs_regi_data").text(" Count ( " + total_phs_regi_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            phs_regi_id = parseInt(data[key].phs_regi_id);
                            serial_no = data[key].serial_no;
                            policy_no = data[key].policy_no;
                            policy_holder = data[key].policy_holder;
                            fk_company_id = data[key].fk_company_id;
                            company_short_code = data[key].company_short_code;
                            receipt_no = data[key].receipt_no;
                            due_date = data[key].due_date;
                            ammount = data[key].ammount;
                            purpose_of_send = data[key].purpose_of_send;
                            document = data[key].document;
                            remark = data[key].remark;
                            holder_type = data[key].holder_type;
                            company_type = data[key].company_type;
                            company_id = data[key].company_id;
                            policy_holder_id = data[key].policy_holder_id;
                            branch_code = data[key].branch_code;
                            receipt_doc = data[key].receipt_doc;
                            final_doc = data[key].final_doc;
                            create_date = data[key].create_date;
                            modify_dt = data[key].modify_dt;
                            fk_staff_id = data[key].fk_staff_id;
                            fk_user_role_id = data[key].fk_user_role_id;
                            phs_regi_status = data[key].phs_regi_status;
                            isActive = data[key].del_flag;

                            // alert(document);
                            if (serial_no == "" || serial_no == null || serial_no == undefined)
                                serial_no = "";
                            else
                                serial_no = serial_no;

                            if (policy_no == "" || policy_no == null || policy_no == undefined)
                                policy_no = "";
                            else
                                policy_no = policy_no;

                            if (policy_holder == "" || policy_holder == null || policy_holder == undefined)
                                policy_holder = "";
                            else
                                policy_holder = policy_holder;

                            if (fk_company_id == "" || fk_company_id == null || fk_company_id == undefined)
                                fk_company_id = "";
                            else
                                fk_company_id = fk_company_id;

                            if (company_short_code == "" || company_short_code == null || company_short_code == undefined)
                                company_short_code = "";
                            else
                                company_short_code = company_short_code;

                            if (receipt_no == "" || receipt_no == null || receipt_no == undefined)
                                receipt_no = "";
                            else
                                receipt_no = receipt_no;

                            if (due_date == "" || due_date == null || due_date == undefined)
                                due_date = "";
                            else
                                due_date = due_date;

                            if (ammount == "" || ammount == null || ammount == undefined)
                                ammount = "";
                            else
                                ammount = ammount;

                            if (purpose_of_send == "" || purpose_of_send == null || purpose_of_send == undefined)
                                purpose_of_send = "";
                            else
                                purpose_of_send = purpose_of_send;

                            if (document == "" || document == null || document == undefined)
                                document = "";
                            else
                                document = document;

                            if (remark == "" || remark == null || remark == undefined)
                                remark = "";
                            else
                                remark = remark;

                            if (holder_type == "" || holder_type == null || holder_type == undefined)
                                holder_type = "";
                            else
                                holder_type = holder_type;

                            if (company_type == "" || company_type == null || company_type == undefined)
                                company_type = "";
                            else
                                company_type = company_type;

                            if (branch_code == "" || branch_code == null || branch_code == undefined)
                                branch_code = "";
                            else
                                branch_code = branch_code;

                            if (receipt_doc == "" || receipt_doc == null || receipt_doc == undefined)
                                receipt_doc = "";
                            else
                                receipt_doc = receipt_doc;

                            if (final_doc == "" || final_doc == null || final_doc == undefined)
                                final_doc = "";
                            else
                                final_doc = final_doc;

                            if (modify_dt == "" || modify_dt == null || modify_dt == undefined)
                                modify_dt = "";
                            else
                                modify_dt = modify_dt;


                            if (!isNaN(phs_regi_id)) {
                                if (phs_regi_status == 1) {
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
                                    var delete_btn_txt = "<a class='dropdown-item delete' href='javascript:void(0);' id='delete' value='' type='button' onClick ='OnDelete(" + phs_regi_id + ',"' + serial_no + '"' + ")' ><b>Delete</b></a>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item recover' href='javascript:void(0);' id='recover' value='' type='button' onClick ='OnRecover(" + phs_regi_id + ',"' + serial_no + '"' + ")' ><b>Recover</b></a>";
                                }

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' value='' type='button' onClick ='onView(" + phs_regi_id + ")'><b>View</b></a><a class='dropdown-item edit' href='<?php echo base_url() . 'master/phs_regi/phs_regi/0/'; ?>" + phs_regi_id + "' id='edit'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + phs_regi_id + "' href='javascript:void(0);' id='status_btn_" + phs_regi_id + "' value='' type='button' onClick ='updateStatus(" + phs_regi_id + "," + phs_regi_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                if (receipt_doc == "" || receipt_doc == null || receipt_doc == undefined) {
                                    var view_receipt_doc = "";
                                    var download_receipt_doc = "";
                                    var delete_receipt_doc = "";
                                } else if (receipt_doc != "") {
                                    var view_receipt_doc = "<a href='<?php echo base_url(); ?>master/phs_regi/view_doc/1/" + phs_regi_id + "/" + receipt_doc + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                    var download_receipt_doc = "<a href='<?php echo base_url(); ?>master/phs_regi/download_doc/1/" + phs_regi_id + "/" + receipt_doc + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                    var delete_receipt_doc = "<a onclick=OnDelete_Doc('" + phs_regi_id + ',' + 1 + ',' + receipt_doc + ',' + '<?php echo base_url(); ?>master/phs_regi/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                                }

                                if (final_doc == "" || final_doc == null || final_doc == undefined) {
                                    var view_final_doc = "";
                                    var download_final_doc = "";
                                    var delete_final_doc = "";
                                } else if (final_doc != "") {
                                    var view_final_doc = "<a href='<?php echo base_url(); ?>master/phs_regi/view_doc/2/" + phs_regi_id + "/" + final_doc + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                    var download_final_doc = "<a href='<?php echo base_url(); ?>master/phs_regi/download_doc/2/" + phs_regi_id + "/" + final_doc + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                    var delete_final_doc = "<a onclick=OnDelete_Doc('" + phs_regi_id + ',' + 2 + ',' + final_doc + ',' + '<?php echo base_url(); ?>master/phs_regi/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                                }

                                datas += '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + "<br/>" + badge_status + '</td><td>' + sn + '</td><td><center>' + serial_no + '</center></td> <td>' + policy_no + '</td><td>' + holder_type + '</td> <td>' + policy_holder + '</td><td>' + company_type + '</td><td>' + fk_company_id + '</td> <td>' + branch_code + '</td><td>' + receipt_no + '</td><td>' + due_date + '</td><td>' + ammount + '</td><td>' + purpose_of_send + '</td><td>' + document + '</td><td>' + remark + '</td><td>' + view_receipt_doc + "&nbsp;&nbsp;" + download_receipt_doc + "&nbsp;&nbsp;" + delete_receipt_doc + '</td><td>' + view_final_doc + "&nbsp;&nbsp;" + download_final_doc + "&nbsp;&nbsp;" + delete_final_doc + '</td><td>' + create_date + '</td><td>' + modify_dt + '</td> </tr>';
                            }
                        });

                    } else {
                        $("#total_phs_regi_data").text(" Count ( " + total_phs_regi_data + " ) ");
                        datas = '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="19"><center>Data Not Found</center></td> </tr>';
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
        get_phs_regi_list();
    }

    function OnRecover(phs_regi_id, serial_no) {
        title = "PHS Register those Serial No. is " + serial_no;
        var url = "<?php echo $base_url; ?>master/phs_regi/recover_phs_regi";
        confirmation_alert(id = phs_regi_id, url = url, title = title, type = "Recover");
    }

    function OnDelete(phs_regi_id, serial_no) { //+ ','+serial_no+
        // alert(serial_no);
        title = "PHS Register those Serial No. is " + serial_no;
        var url = "<?php echo $base_url; ?>master/phs_regi/remove_phs_regi";
        confirmation_alert(id = phs_regi_id, url = url, title = title, type = "Delet");
    }

    function OnDelete_Doc(staff_doc_details) {
        var staff_doc_details = staff_doc_details.split(",");
        var phs_regi_id = staff_doc_details[0];
        var doc_type = staff_doc_details[1];
        var doc_name = staff_doc_details[2];
        var url = staff_doc_details[3];
        if (doc_type == 1)
            var title = "Receipt Document";
        else if (doc_type == 2)
            var title = "Final Document";
        document_confirmation_alert(id = phs_regi_id, doc_type = doc_type, doc_name = doc_name, url = url, title = title, type = "Delet");
    }

    function onView(val) {
        $('#view_form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/phs_regi/edit_phs_regi";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    phs_regi_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},

                success: function(data) {
                    $("#serial_no_det").text(data["userdata"].serial_no);
                    $("#policy_no_det").text(data["userdata"].policy_no);
                    $("#holder_type_det").text(data["userdata"].holder_type);
                    $("#policy_holder_det").text(data["userdata"].policy_holder);
                    $("#company_type_det").text(data["userdata"].company_type);

                    $("#company_det").text(data["userdata"].fk_company_id);
                    $("#branch_code_det").text(data["userdata"].branch_code);
                    $("#receipt_no_det").text(data["userdata"].receipt_no);
                    $("#due_date_det").text(data["userdata"].due_date);
                    $("#ammount_det").text(data["userdata"].ammount);
                    $("#purpose_of_sending_det").text(data["userdata"].purpose_of_send);
                    $("#types_of_doc_det").text(data["userdata"].document);
                    $("#remark_det").text(data["userdata"].remark);

                    if (data["userdata"].receipt_doc == "" || data["userdata"].receipt_doc == null || data["userdata"].receipt_doc == undefined) {
                        var view_receipt_doc = "";
                        var download_receipt_doc = "";
                        var delete_receipt_doc = "";
                    } else if (data["userdata"].receipt_doc != "") {
                        var view_receipt_doc = "<a href='<?php echo base_url(); ?>master/phs_regi/view_doc/1/" + data["userdata"].phs_regi_id + "/" + data["userdata"].receipt_doc + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        var download_receipt_doc = "<a href='<?php echo base_url(); ?>master/phs_regi/download_doc/1/" + data["userdata"].phs_regi_id + "/" + data["userdata"].receipt_doc + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        var delete_receipt_doc = "<a onclick=OnDelete_Doc('" + data["userdata"].phs_regi_id + ',' + 1 + ',' + data["userdata"].receipt_doc + ',' + '<?php echo base_url(); ?>master/phs_regi/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                    }
                    $("#receipt_doc_det").html(view_receipt_doc + "&nbsp;&nbsp;&nbsp;&nbsp;" + download_receipt_doc + "&nbsp;&nbsp;&nbsp;&nbsp;" + delete_receipt_doc);

                    if (data["userdata"].final_doc == "" || data["userdata"].final_doc == null || data["userdata"].final_doc == undefined) {
                        var view_final_doc = "";
                        var download_final_doc = "";
                        var delete_final_doc = "";
                    } else if (data["userdata"].final_doc != "") {
                        var view_final_doc = "<a href='<?php echo base_url(); ?>master/phs_regi/view_doc/2/" + data["userdata"].phs_regi_id + "/" + data["userdata"].final_doc + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        var download_final_doc = "<a href='<?php echo base_url(); ?>master/phs_regi/download_doc/2/" + data["userdata"].phs_regi_id + "/" + data["userdata"].final_doc + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        var delete_final_doc = "<a onclick=OnDelete_Doc('" + data["userdata"].phs_regi_id + ',' + 2 + ',' + data["userdata"].final_doc + ',' + '<?php echo base_url(); ?>master/phs_regi/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                    }
                    $("#final_doc_det").html(view_final_doc + "&nbsp;&nbsp;&nbsp;&nbsp;" + download_final_doc + "&nbsp;&nbsp;&nbsp;&nbsp;" + delete_final_doc);

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    get_phs_regi_list();

    function get_phs_regi_list() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/phs_regi/get_phs_regi_list";
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
                    var total_phs_regi_data = 0;
                    $("#total_phs_regi_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var phs_regi_id = "";
                        var serial_no = "";
                        var policy_no = "";
                        var policy_holder = "";
                        var fk_company_id = "";
                        var phs_regi_status = "";
                        var datas = "";
                        var status = "";
                        var isActive = "";
                        var document = "";
                        total_phs_regi_data = data["total_phs_regi_data"];
                        $("#total_phs_regi_data").text(" Count ( " + total_phs_regi_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            phs_regi_id = parseInt(data[key].phs_regi_id);
                            serial_no = data[key].serial_no;
                            policy_no = data[key].policy_no;
                            policy_holder = data[key].policy_holder;
                            fk_company_id = data[key].fk_company_id;
                            company_short_code = data[key].company_short_code;
                            receipt_no = data[key].receipt_no;
                            due_date = data[key].due_date;
                            ammount = data[key].ammount;
                            purpose_of_send = data[key].purpose_of_send;
                            document = data[key].document;
                            remark = data[key].remark;
                            holder_type = data[key].holder_type;
                            company_type = data[key].company_type;
                            company_id = data[key].company_id;
                            policy_holder_id = data[key].policy_holder_id;
                            branch_code = data[key].branch_code;
                            receipt_doc = data[key].receipt_doc;
                            final_doc = data[key].final_doc;
                            create_date = data[key].create_date;
                            modify_dt = data[key].modify_dt;
                            fk_staff_id = data[key].fk_staff_id;
                            fk_user_role_id = data[key].fk_user_role_id;
                            phs_regi_status = data[key].phs_regi_status;
                            isActive = data[key].del_flag;

                            // alert(document);
                            if (serial_no == "" || serial_no == null || serial_no == undefined)
                                serial_no = "";
                            else
                                serial_no = serial_no;

                            if (policy_no == "" || policy_no == null || policy_no == undefined)
                                policy_no = "";
                            else
                                policy_no = policy_no;

                            if (policy_holder == "" || policy_holder == null || policy_holder == undefined)
                                policy_holder = "";
                            else
                                policy_holder = policy_holder;

                            if (fk_company_id == "" || fk_company_id == null || fk_company_id == undefined)
                                fk_company_id = "";
                            else
                                fk_company_id = fk_company_id;

                            if (company_short_code == "" || company_short_code == null || company_short_code == undefined)
                                company_short_code = "";
                            else
                                company_short_code = company_short_code;

                            if (receipt_no == "" || receipt_no == null || receipt_no == undefined)
                                receipt_no = "";
                            else
                                receipt_no = receipt_no;

                            if (due_date == "" || due_date == null || due_date == undefined)
                                due_date = "";
                            else
                                due_date = due_date;

                            if (ammount == "" || ammount == null || ammount == undefined)
                                ammount = "";
                            else
                                ammount = ammount;

                            if (purpose_of_send == "" || purpose_of_send == null || purpose_of_send == undefined)
                                purpose_of_send = "";
                            else
                                purpose_of_send = purpose_of_send;

                            if (document == "" || document == null || document == undefined)
                                document = "";
                            else
                                document = document;

                            if (remark == "" || remark == null || remark == undefined)
                                remark = "";
                            else
                                remark = remark;

                            if (holder_type == "" || holder_type == null || holder_type == undefined)
                                holder_type = "";
                            else
                                holder_type = holder_type;

                            if (company_type == "" || company_type == null || company_type == undefined)
                                company_type = "";
                            else
                                company_type = company_type;

                            if (branch_code == "" || branch_code == null || branch_code == undefined)
                                branch_code = "";
                            else
                                branch_code = branch_code;

                            if (receipt_doc == "" || receipt_doc == null || receipt_doc == undefined)
                                receipt_doc = "";
                            else
                                receipt_doc = receipt_doc;

                            if (final_doc == "" || final_doc == null || final_doc == undefined)
                                final_doc = "";
                            else
                                final_doc = final_doc;

                            if (modify_dt == "" || modify_dt == null || modify_dt == undefined)
                                modify_dt = "";
                            else
                                modify_dt = modify_dt;


                            if (!isNaN(phs_regi_id)) {
                                if (phs_regi_status == 1) {
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
                                    var delete_btn_txt = "<a class='dropdown-item delete' href='javascript:void(0);' id='delete' value='' type='button' onClick ='OnDelete(" + phs_regi_id + ',"' + serial_no + '"' + ")' ><b>Delete</b></a>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item recover' href='javascript:void(0);' id='recover' value='' type='button' onClick ='OnRecover(" + phs_regi_id + ',"' + serial_no + '"' + ")' ><b>Recover</b></a>";
                                }

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' value='' type='button' onClick ='onView(" + phs_regi_id + ")'><b>View</b></a><a class='dropdown-item edit' href='<?php echo base_url() . 'master/phs_regi/phs_regi/0/'; ?>" + phs_regi_id + "' id='edit'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + phs_regi_id + "' href='javascript:void(0);' id='status_btn_" + phs_regi_id + "' value='' type='button' onClick ='updateStatus(" + phs_regi_id + "," + phs_regi_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                if (receipt_doc == "" || receipt_doc == null || receipt_doc == undefined) {
                                    var view_receipt_doc = "";
                                    var download_receipt_doc = "";
                                    var delete_receipt_doc = "";
                                } else if (receipt_doc != "") {
                                    var view_receipt_doc = "<a href='<?php echo base_url(); ?>master/phs_regi/view_doc/1/" + phs_regi_id + "/" + receipt_doc + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                    var download_receipt_doc = "<a href='<?php echo base_url(); ?>master/phs_regi/download_doc/1/" + phs_regi_id + "/" + receipt_doc + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                    var delete_receipt_doc = "<a onclick=OnDelete_Doc('" + phs_regi_id + ',' + 1 + ',' + receipt_doc + ',' + '<?php echo base_url(); ?>master/phs_regi/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                                }

                                if (final_doc == "" || final_doc == null || final_doc == undefined) {
                                    var view_final_doc = "";
                                    var download_final_doc = "";
                                    var delete_final_doc = "";
                                } else if (final_doc != "") {
                                    var view_final_doc = "<a href='<?php echo base_url(); ?>master/phs_regi/view_doc/2/" + phs_regi_id + "/" + final_doc + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                    var download_final_doc = "<a href='<?php echo base_url(); ?>master/phs_regi/download_doc/2/" + phs_regi_id + "/" + final_doc + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                    var delete_final_doc = "<a onclick=OnDelete_Doc('" + phs_regi_id + ',' + 2 + ',' + final_doc + ',' + '<?php echo base_url(); ?>master/phs_regi/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                                }

                                datas += '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + "<br/>" + badge_status + '</td><td>' + sn + '</td><td><center>' + serial_no + '</center></td> <td>' + policy_no + '</td><td>' + holder_type + '</td> <td>' + policy_holder + '</td><td>' + company_type + '</td><td>' + fk_company_id + '</td> <td>' + branch_code + '</td><td>' + receipt_no + '</td><td>' + due_date + '</td><td>' + ammount + '</td><td>' + purpose_of_send + '</td><td>' + document + '</td><td>' + remark + '</td><td>' + view_receipt_doc + "&nbsp;&nbsp;" + download_receipt_doc + "&nbsp;&nbsp;" + delete_receipt_doc + '</td><td>' + view_final_doc + "&nbsp;&nbsp;" + download_final_doc + "&nbsp;&nbsp;" + delete_final_doc + '</td><td>' + create_date + '</td><td>' + modify_dt + '</td> </tr>';
                            }
                        });

                    } else {
                        $("#total_phs_regi_data").text(" Count ( " + total_phs_regi_data + " ) ");
                        datas = '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="19"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function updateStatus(phs_regi_id, phs_regi_status) {

        var url = "<?php echo $base_url; ?>master/phs_regi/update_phs_regi_status";

        if (phs_regi_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": phs_regi_id,
                    "status": phs_regi_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + phs_regi_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["phs_regi_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                            $("#edit_" + phs_regi_id).addClass(status_btn_txt);
                            $("#status_btn_" + phs_regi_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                            $("#edit_" + phs_regi_id).addClass(status_btn_txt);
                            $("#status_btn_" + phs_regi_id).text(status);
                        }

                        $("#status_btn_" + phs_regi_id).text(status);


                        $('#status_btn_' + phs_regi_id).attr('onClick', 'updateStatus(' + phs_regi_id + ',' + data["userdata"]["phs_regi_status"] + ')');

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