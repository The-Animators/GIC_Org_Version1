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
                                                <select class="form-control" data-toggle="select2" id="filter_company" name="filter_company" onchange="company_agency()">
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
                                            <label for="filter_agency" class="col-form-label col-md-4 text-right">Agency : </label>
                                            <div class="col-md-8">
                                                <select name="filter_agency" id="filter_agency" class="form-control" data-toggle="select2">
                                                    <option value="null">Select Agency Code</option>
                                                </select>
                                            </div>
                                            <!-- <div class="col-md-2"><button type="submit" id="search" class="btn btn-outline-secondary waves-effect width-md btn-sm" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button></div> -->
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
                                            <center><button type="submit" id="search" class="btn btn-outline-secondary waves-effect btn-xs mr-2" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="reset" class="btn btn-outline-secondary waves-effect btn-xs" onclick="Reset_data()"><b><i class="mdi mdi-undo"></i>Reset</b></button></center>
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
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info dropdown-toggle waves-effect width-xs waves-light " data-toggle="dropdown" aria-expanded="false">Actions <i class="mdi mdi-chevron-down"></i> </button>
                                    <div class="dropdown-menu ">
                                        <a class="dropdown-item pay" href="#" id="due" data-id="due" data-value="1" onclick="Pay('due','1')"><b>Not Received</b></a>
                                        <a class="dropdown-item pay" href="#" id="partial_paid" data-id="partial_paid" data-value="2" onclick="Pay('partial_paid','2')"><b>Partial Paid</b></a>
                                        <a class="dropdown-item pay" href="#" id="paid" data-id="paid" data-value="3" onclick="Pay('paid','3')"><b>Fully Paid</b></a>
                                        <a class="dropdown-item pay" href="#" id="extra_paid" data-id="extra_paid" data-value="3" onclick="Pay('extra_paid','4')"><b>Extra Paid</b></a>
                                    </div>
                                </div>
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
                                                <th>SN.</th>
                                                <th>Serial No.</th>
                                                <th><center>Group Name</center></th>
                                                <th>Policy Holder</th>
                                                <th>Type of Policy</th>
                                                <th>Policy Number</th>
                                                <th width="5%">Expiry Date</th>
                                                <th>Insurance Company</th>
                                                <th>Gross Premium</th>
                                                <?php if ($this->session->userdata("@_user_role_title") == "Super Admin" || $this->session->userdata("@_user_role_title") == "Admin") : ?>
                                                    <th>Commission % Receivable</th>
                                                    <th>Commission Amt Receivable</th>
                                                <?php endif; ?>
                                                <th>Commission % Received from Company</th>
                                                <th>Commission Amt Received by company</th>
                                                <th>Commission Difference</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableData">
                                        </tbody>
                                        <?php if (($this->session->userdata("@_user_role_title") == "Super Admin") || ($this->session->userdata("@_user_role_title") == "Admin")) : ?>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="10" class="text-right"></td>
                                                    <td><input type="text" name="total_commission_amt_receivable" id="total_commission_amt_receivable" value="" class="form-control" disabled>Total Commission Amt Receivable :</td>
                                                    <td></td>
                                                    <td><input type="text" name="total_commission_amt_received_by_company" id="total_commission_amt_received_by_company" value="" class="form-control" disabled>Total Commission Amt Received by Company :</td>
                                                    <td><input type="text" name="total_diff_commission_amt" id="total_diff_commission_amt" value="" class="form-control" disabled>Difference in Commission :</td>
                                                </tr>
                                            </tfoot>
                                        <?php endif; ?>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <?php if (($this->session->userdata("@_user_role_title") == "Super Admin") || ($this->session->userdata("@_user_role_title") == "Admin")) : ?>
                            <!-- <div class="row
                            card-body">
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-4 row">
                                            <label for="filter_year" class="col-form-label col-md-5 text-right  font-weight-bold">Total Commission Amt Receivable : </label>
                                            <div class="col-md-7">
                                                <input type="text" name="total_commission_amt_receivable" id="total_commission_amt_receivable" value="" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4 row">
                                            <label for="filter_month" class="col-form-label col-md-5 text-right font-weight-bold">Total Commission Amt Received by Company : </label>
                                            <div class="col-md-7">
                                                <input type="text" name="total_commission_amt_received_by_company" id="total_commission_amt_received_by_company" value="" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4 row">
                                            <label for="filter_month" class="col-form-label col-md-5 text-right font-weight-bold">Difference in Commission : </label>
                                            <div class="col-md-7">
                                                <input type="text" name="total_diff_commission_amt" id="total_diff_commission_amt" value="" class="form-control" disabled>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div> -->
                        <?php endif; ?>

                        <!-- Commission Bill Entry Document  STart-->
                        <div class="row" id="commission_bill_entry" style="display:none;">
                            <div class="col-md-12">

                                <div class="form-row">

                                    <!-- <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="company" class="col-form-label col-md-4 text-right">Company : <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select namse="company" id="company" class="form-control">
                                                    <option value="null">Select Company</option>
                                                    <?php //$company = company_dropdown();
                                                    //if (!empty($company)) : foreach ($company as $row) : 
                                                    ?>
                                                            <option value="<?php //echo $row["mcompany_id"]; 
                                                                            ?>"><?php //echo $row["company_name"]; 
                                                                                ?></option>
                                                    <?php //endforeach;
                                                    //endif; 
                                                    ?>
                                                </select>
                                                <span id="company_err"></span>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="bill_upload" class="col-form-label col-md-4 text-right">Bill Upload : <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="file" name="bill_upload" id="bill_upload" class="form-control filestyle" data-input="false" id="filestyle-1" tabindex="-1">
                                                <span id="bill_upload_err"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="date_checking" class="col-form-label col-md-4 text-right">Start Date Checking : <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="date" name="date_checking" id="date_checking" class="form-control">
                                                <span id="date_checking_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="end_date_checking" class="col-form-label col-md-4 text-right">End Date Checking : <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="date" name="end_date_checking" id="end_date_checking" class="form-control">
                                                <span id="end_date_checking_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="bill_remark" class="col-form-label col-md-4 text-right">Bill Details : <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <textarea name="bill_remark" id="bill_remark" value="" placeholder="Enter Bill Details" class="form-control "></textarea>
                                                <span id="bill_remark_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="bill_no" class="col-form-label col-md-4 text-right">Bill No. : <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="bill_no" id="bill_no" class="form-control">
                                                <span id="bill_no_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="bill_date" class="col-form-label col-md-4 text-right">Bill Date : <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="date" name="bill_date" id="bill_date" class="form-control">
                                                <span id="bill_date_err"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <center>
                                            <button id="submit" class="btn btn-primary btn-sm" onclick="update_commission_bill_entry()">Save</button>
                                        </center>
                                    </div>
                                    <div class="form-group col-md-4"></div>
                                </div>

                            </div>
                        </div>
                        <!-- Commission Bill Entry Document End-->

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
    window.onload = function() {
        var tableCont = document.querySelector('#table-cont')
        /**
         * scroll handle
         * @param {event} e -- scroll event
         */
        function scrollHandle(e) {
            var scrollTop = this.scrollTop;
            this.querySelector('thead').style.transform = 'translateY(' + scrollTop + 'px)';
        }

        tableCont.addEventListener('scroll', scrollHandle)
    }

    function Pay(status, val) {
        // var id = $(".pay").data("id");
        // var value = $(".pay").data('value');
        // alert(status);
        // alert(val);
        // var rows = $('table.commission_table tr');

        if (status == "due") {
            $('.due').show();
            $('.equal').hide();
            $('.positive').hide();
            $('.negative').hide();
        } else if (status == "partial_paid") {
            $('.positive').show();
            $('.due').hide();
            $('.equal').hide();
            $('.negative').hide();
        } else if (status == "paid") {
            $('.equal').show();
            $('.due').hide();
            $('.positive').hide();
            $('.negative').hide();
        } else if (status == "extra_paid") {
            $('.negative').show();
            $('.due').hide();
            $('.equal').hide();
            $('.positive').hide();
        }
        $("#total_data").text("");
        var count = $('#tableData tr:visible').length;
        $("#total_data").text(" Count( " + count + " )");

        var tot_comm_amt_rece = 0;
        var tot_comm_amt_rece_comp = 0;
        var tot_comm_amt_diff = 0;
        var visible = $("#tableData tr").is(":visible");
        if (visible == true) {
            $('#tableData tr:visible').each(function() {
                var comm_amt_rece = $(this).find("td:visible").eq(9).html();
                var comm_amt_rece_comp = $(this).find("td:visible").eq(11).html();
                var comm_amt_diff = $(this).find("td:visible").eq(12).html();

                tot_comm_amt_rece = parseInt(tot_comm_amt_rece) + parseInt(comm_amt_rece);
                tot_comm_amt_rece_comp = parseInt(tot_comm_amt_rece_comp) + parseInt(comm_amt_rece_comp);
                tot_comm_amt_diff = parseInt(tot_comm_amt_diff) + parseInt(comm_amt_diff);
                $("#total_commission_amt_receivable").val(tot_comm_amt_rece);
                $("#total_commission_amt_received_by_company").val(tot_comm_amt_rece_comp);
                $("#total_diff_commission_amt").val(tot_comm_amt_diff);
                // alert(comm_amt_rece);
                // alert(comm_amt_rece_comp);
                // alert(comm_amt_rece_comp);
                // alert(tot_comm_amt_rece_comp);
            });
        } else {

            $("#total_commission_amt_receivable").val(0);
            $("#total_commission_amt_received_by_company").val(0);
            $("#total_diff_commission_amt").val(0);
        }
        // $('.equal').hide();extra_paid
        // $('.positive').hide();due
        // $('.negative').hide();

    }
    var total_commission_amt_receivable = 0;
    var total_commission_amt_received_by_company = 0;

    function Filter_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-secondary waves-effect btn-xs mr-4").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-danger waves-effect btn-xs mr-4").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter On');
        $('#filter_form_modal').modal('toggle');
        total_commission_amt_receivable = 0;
        total_commission_amt_received_by_company = 0;
        var filter_year = $("#filter_year").val();
        var filter_month = $("#filter_month").val();
        var filter_company = $("#filter_company").val();
        var filter_agency = $("#filter_agency").val();
        var filter_policy_holder = $("#filter_policy_holder").val();
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
            $('#filter_form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/commission/filter_commission";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_year: filter_year,
                    filter_month: filter_month,
                    filter_company: filter_company,
                    filter_agency: filter_agency,
                    filter_policy_holder: filter_policy_holder,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var total_commission_data = 0;
                    if (data["status"] == true) {
                        $("#tableData").empty();
                        $("#total_data").text("");
                        var datas = "";
                        total_commission_data = data["total_commission_data"];

                        $("#total_data").text("Count (" + total_commission_data + ")");
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            policy_id = parseInt(data[key].policy_id);
                            company_name = data[key].company_name;
                            policy_type_title = data[key].policy_type_title;
                            member_name = data[key].member_name;
                            grpname = data[key].grpname;
                            var serial_no_year = data[key].serial_no_year;
                            var serial_no_month = data[key].serial_no_month;
                            serial_no = data[key].serial_no;

                            var total_serial_no = serial_no_year + "/" + serial_no_month + "/" + serial_no;
                            date_to = data[key].date_to;
                            policy_no = data[key].policy_no;

                            basic_gross_premium = parseInt(data[key].basic_gross_premium);
                            plan_policy_commission = parseInt(data[key].plan_policy_commission);
                            commission_rece_company = parseInt(data[key].commission_rece_company);
                            commission_amt_rece_company = parseInt(data[key].commission_amt_rece_company);
                            var grpname = data[key].grpname;

                            if (isNaN(plan_policy_commission))
                                plan_policy_commission = 0;
                            else
                                plan_policy_commission = plan_policy_commission;

                            if (isNaN(basic_gross_premium))
                                basic_gross_premium = 0;
                            else
                                basic_gross_premium = basic_gross_premium;

                            if (isNaN(commission_rece_company))
                                commission_rece_company = 0;
                            else
                                commission_rece_company = commission_rece_company;

                            if (isNaN(commission_amt_rece_company))
                                commission_amt_rece_company = 0;
                            else
                                commission_amt_rece_company = commission_amt_rece_company;

                            commission_amt_receivable = Math.round((basic_gross_premium * plan_policy_commission) / 100);

                            if (commission_amt_rece_company == 0 || commission_amt_rece_company == "")
                                commission_amt_rece_company = Math.round((basic_gross_premium * commission_rece_company) / 100);
                            else
                                commission_amt_rece_company = commission_amt_rece_company;

                            if (isNaN(commission_amt_receivable))
                                commission_amt_receivable = 0;
                            else
                                commission_amt_receivable = commission_amt_receivable;
                            var isActive = data[key].del_flag;


                            var commission_diff = parseInt(commission_amt_receivable) - parseInt(commission_amt_rece_company);

                            if (isNaN(commission_diff))
                                commission_diff = 0;
                            else
                                commission_diff = commission_diff;

                            if (total_commission_amt_receivable == 0) {
                                total_commission_amt_receivable = commission_amt_receivable;
                            } else {
                                total_commission_amt_receivable = total_commission_amt_receivable + commission_amt_receivable;
                            }
                            if (total_commission_amt_received_by_company == 0) {
                                total_commission_amt_received_by_company = commission_amt_rece_company;
                            } else {
                                total_commission_amt_received_by_company = total_commission_amt_received_by_company + commission_amt_rece_company;
                            }
                            var tr_class = "";
                            if (commission_diff > 0) {
                                if (commission_amt_receivable == commission_diff) {
                                    tr_class = "due";
                                    pay_btn_class = "badge badge-danger pl-2";
                                    pay_btn_txt = " Due";
                                } else {
                                    tr_class = "positive";
                                    pay_btn_class = "badge badge-warning pl-2";
                                    pay_btn_txt = " Partial Paid";
                                }
                            } else if (commission_diff < 0) {
                                tr_class = "negative";
                                pay_btn_class = "badge badge-info pl-2";
                                pay_btn_txt = " Extra paid";
                            } else if (commission_diff == 0) {
                                tr_class = "equal";
                                pay_btn_class = "badge badge-success pl-2";
                                pay_btn_txt = " Paid";
                            }
                            var pay_status_btn = '<span class="' + pay_btn_class + '">' + pay_btn_txt + '</span>';

                            if (!isNaN(policy_id)) {
                                var inline_edit = '<button type="button" class="btn btn-danger btn-sm ml-1 editbtn"  id="edit_btn_' + policy_id + '"  onclick="OnInLine_Edit(' + policy_id + ')" disabled>Edit</button>';
                                if (isActive == 1) {
                                    var del_status = "No";

                                    var delete_btn_txt = "<button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + policy_id + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + policy_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                                }
                                // total_serial_no
                                datas += '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + sn + '</td><td>' + total_serial_no + '</td><td><center>' + grpname + '</center></td><td>' + member_name + '</td><td>' + policy_type_title + '</td><td>' + policy_no + '</td><td>' + date_to + '</td><td>' + company_name + '</td><td id="gross_premium_' + policy_id + '">' + basic_gross_premium + '</td> <?php if (($this->session->userdata("@_user_role_title") == "Super Admin") || ($this->session->userdata("@_user_role_title") == "Admin")) : ?><td>' + plan_policy_commission + '</td> <td id="commission_amt_receivable_' + policy_id + '">' + commission_amt_receivable + '</td> <?php endif; ?><td id="commission_rece_company_' + policy_id + '"  contenteditable="true" onkeyup="Commission_AMT_Rece_Company(' + policy_id + ')">' + commission_rece_company + '</td><td id="commission_amt_rece_company_' + policy_id + '"  onkeyup="Minus_Commission_AMT_Rece_Company(' + policy_id + ')"  class="commission_rece_company">' + commission_amt_rece_company + '</td><td id="commission_diff_' + policy_id + '" class="commission_diff">' + commission_diff + "</td><td>" + pay_status_btn + '</td><td contenteditable="false">' + inline_edit + '</td></tr>';
                            }
                        });
                        $("#total_commission_amt_receivable").val(total_commission_amt_receivable);
                        $("#total_commission_amt_received_by_company").val(total_commission_amt_received_by_company);

                    } else {
                        <?php if (($this->session->userdata("@_user_role_title") == "Super Admin") || ($this->session->userdata("@_user_role_title") == "Admin")) : ?>
                            var count = 16;
                        <?php else: ?>
                            var count = 14;
                        <?php endif; ?>
                        $("#tableData").empty();
                        $("#total_data").text("");
                        $("#total_data").text("Count (" + total_commission_data + ")");
                        datas = '<tr><td colspan="'+count+'" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><center>Data Not Found</center></td> </tr>';
                    }
                    $('#tableData').append(datas);
                    Tot_commission_rece_company();
                    Tot_commission_Diffrence();

                    $.each(data, function(key, val) {
                        policy_id = parseInt(data[key].policy_id);
                        basic_gross_premium = parseInt(data[key].basic_gross_premium);
                        plan_policy_commission = parseInt(data[key].plan_policy_commission);
                        commission_rece_company = parseInt(data[key].commission_rece_company);
                        commission_amt_rece_company = parseInt(data[key].commission_amt_rece_company);

                        if (isNaN(plan_policy_commission))
                            plan_policy_commission = 0;
                        else
                            plan_policy_commission = plan_policy_commission;

                        if (isNaN(basic_gross_premium))
                            basic_gross_premium = 0;
                        else
                            basic_gross_premium = basic_gross_premium;

                        if (isNaN(commission_rece_company))
                            commission_rece_company = 0;
                        else
                            commission_rece_company = commission_rece_company;

                        if (isNaN(commission_amt_rece_company))
                            commission_amt_rece_company = 0;
                        else
                            commission_amt_rece_company = commission_amt_rece_company;

                        commission_amt_receivable = Math.round((basic_gross_premium * plan_policy_commission) / 100);

                        if (commission_amt_rece_company == 0 || commission_amt_rece_company == "")
                            commission_amt_rece_company = Math.round((basic_gross_premium * commission_rece_company) / 100);
                        else
                            commission_amt_rece_company = commission_amt_rece_company;

                        if (isNaN(commission_amt_receivable))
                            commission_amt_receivable = 0;
                        else
                            commission_amt_receivable = commission_amt_receivable;
                        var isActive = data[key].del_flag;


                        var commission_diff = parseInt(commission_amt_receivable) - parseInt(commission_amt_rece_company);

                        if (isNaN(commission_diff))
                            commission_diff = 0;
                        else
                            commission_diff = commission_diff;

                        if (total_commission_amt_receivable == 0) {
                            total_commission_amt_receivable = commission_amt_receivable;
                        } else {
                            total_commission_amt_receivable = total_commission_amt_receivable + commission_amt_receivable;
                        }
                        if (total_commission_amt_received_by_company == 0) {
                            total_commission_amt_received_by_company = commission_amt_rece_company;
                        } else {
                            total_commission_amt_received_by_company = total_commission_amt_received_by_company + commission_amt_rece_company;
                        }

                        if (!isNaN(policy_id)) {
                            var tr_class = "";
                            if (commission_diff > 0) {
                                if (commission_amt_receivable == commission_diff)
                                    tr_class = "due";
                                else
                                    tr_class = "positive";
                                //  tr_class="positive";
                            } else if (commission_diff < 0) {
                                tr_class = "negative";
                            } else if (commission_diff == 0) {
                                tr_class = "equal";
                            }
                            // alert(tr_class);
                            // $("#tableData tr").addClass(tr_class);
                            $("#commission_diff_" + policy_id).closest('tr').addClass(tr_class);
                        }
                    });
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });

            if (filter_company != "") {
                $(".editbtn").attr("disabled", false);
            } else {
                $(".editbtn").attr("disabled", true);
            }

            $('.editbtn').click(function() {
                var currentTD = $(this).parents('tr').find('td');
                if ($(this).text().trim() == 'Edit') {
                    currentTD = $(this).parents('tr').find($("td").not(":nth-child(1)")).not(":nth-child(2)").not(":nth-child(3)").not(":nth-child(4)").not(":nth-child(5)").not(":nth-child(6)").not(":nth-child(7)").not(":nth-child(8)").not(":nth-child(9)").not(":nth-child(10)").not(":nth-child(13)").not(":nth-child(14)");
                    $.each(currentTD, function() {
                        $(this).parents('tr').find($("td").not(":nth-child(1)")).not(":nth-child(2)").not(":nth-child(3)").not(":nth-child(4)").not(":nth-child(5)").not(":nth-child(6)").not(":nth-child(7)").not(":nth-child(8)").not(":nth-child(9)").not(":nth-child(10)").not(":nth-child(13)").not(":nth-child(14)").css({
                            // 'background': '#E6E6E6',
                            'background': '#FF5733',
                            'color': '#fff'
                        });
                        $(this).prop('contenteditable', true).css({
                            'background': '#fff',
                            'color': '#000'

                        })
                    });
                } else {
                    $.each(currentTD, function() {
                        $(this).prop('contenteditable', false).removeAttr("style");
                    });
                }

                $(this).html($(this).html() == 'Edit' ? 'Update' : 'Edit')
                if ($(this).html() == 'Update') {
                    $(this).prop('contenteditable', false)
                }

            });
        }
    }

    function Reset_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter Off');
        $('#filter_form_modal').modal('toggle');

        $("#filter_year").val("null");
        $("#filter_month").val("null");
        $("#filter_company").val("null");
        $("#filter_agency").val("");
        get_commission_List();
    }

    function Tot_commission_Diffrence() {
        var inputs = $(".commission_diff");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var commission_diff = $(inputs[i]).text();
            // commission_diff = parseInt(commission_diff);
            // if (isNaN(commission_diff))
            // commission_diff = 0;
            // else
            // commission_diff = commission_diff;

            total = total + parseInt(commission_diff);
            if (isNaN(total))
                total = 0;
            else
                total = total;
            // $("#medi_final_premium").val(total);
            $("#total_diff_commission_amt").val(total);
        }
    }

    function Tot_commission_rece_company() {
        var inputs = $(".commission_rece_company");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var commission_rece_company = $(inputs[i]).text();
            // commission_diff = parseInt(commission_diff);
            // if (isNaN(commission_diff))
            // commission_diff = 0;
            // else
            // commission_diff = commission_diff;

            total = total + parseInt(commission_rece_company);
            if (isNaN(total))
                total = 0;
            else
                total = total;
            // $("#medi_final_premium").val(total);
            $("#total_commission_amt_received_by_company").val(total);
        }
    }

    function Commission_AMT_Rece_Company(policy_id) {
        // alert(policy_id);commission_amt_receivable
        var gross_premium = $("#gross_premium_" + policy_id).text();
        var commission_rece_company = $("#commission_rece_company_" + policy_id).text();
        var commission_amt_receivable = $("#commission_amt_receivable_" + policy_id).text();
        commission_amt_rece_company = Math.round((gross_premium * commission_rece_company) / 100);
        if (isNaN(commission_amt_rece_company))
            commission_amt_rece_company = 0;
        else
            commission_amt_rece_company = commission_amt_rece_company;

        $("#commission_amt_rece_company_" + policy_id).text(commission_amt_rece_company);

        if (isNaN(commission_amt_receivable))
            commission_amt_receivable = 0;
        else
            commission_amt_receivable = commission_amt_receivable;

        var commission_diff = parseInt(commission_amt_receivable) - parseInt(commission_amt_rece_company);

        if (isNaN(commission_diff))
            commission_diff = 0;
        else
            commission_diff = commission_diff;

        $("#commission_diff_" + policy_id).text(commission_diff);
        // alert(gross_premium);

    }

    function Minus_Commission_AMT_Rece_Company(policy_id) {
        var commission_amt_receivable = $("#commission_amt_receivable_" + policy_id).text();
        var commission_amt_rece_company = $("#commission_amt_rece_company_" + policy_id).text();
        if (isNaN(commission_amt_receivable))
            commission_amt_receivable = 0;
        else
            commission_amt_receivable = commission_amt_receivable;

        if (isNaN(commission_amt_rece_company))
            commission_amt_rece_company = 0;
        else
            commission_amt_rece_company = commission_amt_rece_company;

        var commission_diff = parseInt(commission_amt_receivable) - parseInt(commission_amt_rece_company);

        if (isNaN(commission_diff))
            commission_diff = 0;
        else
            commission_diff = commission_diff;

        if (commission_diff > 0) {
            var tr_class = "positive";
        } else if (commission_diff < 0) {
            var tr_class = "negative";
        } else if (commission_diff == 0) {
            var tr_class = "equal";
        }

        $("#commission_diff_" + policy_id).text(commission_diff);
        $("#commission_diff_" + policy_id).closest('tr').addClass(tr_class);
        Tot_commission_rece_company();
        Tot_commission_Diffrence();
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

    $(document).ready(function() {
        $('.editbtn').click(function() {
            var currentTD = $(this).parents('tr').find('td');
            if ($(this).text().trim() == 'Edit') {
                currentTD = $(this).parents('tr').find($("td").not(":nth-child(1)")).not(":nth-child(2)").not(":nth-child(3)").not(":nth-child(4)").not(":nth-child(5)").not(":nth-child(6)").not(":nth-child(7)").not(":nth-child(8)").not(":nth-child(9)").not(":nth-child(10)").not(":nth-child(13)").not(":nth-child(14)");
                // currentTD = $(this).parents('tr').find($("td").not(":nth-child(2)"));
                // currentTD = $(this).parents('tr').find($("td").not(":nth-child(3)"));
                // currentTD = $(this).parents('tr').find($("td").not(":nth-child(4)"));
                // currentTD = $(this).parents('tr').find($("td").not(":nth-child(5)"));
                // currentTD = $(this).parents('tr').find($("td").not(":nth-child(6)"));
                // currentTD = $(this).parents('tr').find($("td").not(":nth-child(7)"));
                // currentTD = $(this).parents('tr').find($("td").not(":nth-child(8)"));
                // currentTD = $(this).parents('tr').find($("td").not(":nth-child(9)"));
                $.each(currentTD, function() {
                    $(this).parents('tr').find($("td").not(":nth-child(1)")).not(":nth-child(2)").not(":nth-child(3)").not(":nth-child(4)").not(":nth-child(5)").not(":nth-child(6)").not(":nth-child(7)").not(":nth-child(8)").not(":nth-child(9)").not(":nth-child(10)").not(":nth-child(13)").not(":nth-child(14)").css({
                        // 'background': '#E6E6E6',
                        'background': '#FF5733',
                        'color': '#fff'
                    });
                    $(this).prop('contenteditable', true).css({
                        'background': '#fff',
                        'color': '#000'

                    })
                });
            } else {
                $.each(currentTD, function() {
                    $(this).prop('contenteditable', false).removeAttr("style");
                });
            }

            $(this).html($(this).html() == 'Edit' ? 'Update' : 'Edit')
            if ($(this).html() == 'Update') {
                $(this).prop('contenteditable', false)
            }

        });
    });

    get_commission_List();

    function get_commission_List() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/commission/get_commission_list";
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
                    var total_commission_data = 0;
                    $("#total_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        total_commission_amt_receivable = 0;
                        total_commission_amt_received_by_company = 0;
                        var view_btn = "";
                        var edit_btn = "";
                        var status_btn = "";

                        var datas = "";

                        var status = "";
                        var policy_id = "";
                        var company_name = "";
                        var policy_type_title = "";
                        var grpname = "";
                        var member_name = "";
                        var date_to = "";
                        var policy_no = "";

                        var commission_amt_receivable = "";
                        total_commission_data = data["total_commission_data"];
                        // console.log(data);

                        $("#total_data").text("Count (" + total_commission_data + ")");
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            policy_id = parseInt(data[key].policy_id);
                            company_name = data[key].company_name;
                            policy_type_title = data[key].policy_type_title;
                            member_name = data[key].member_name;
                            grpname = data[key].grpname;
                            var serial_no_year = data[key].serial_no_year;
                            var serial_no_month = data[key].serial_no_month;
                            serial_no = data[key].serial_no;

                            var total_serial_no = serial_no_year + "/" + serial_no_month + "/" + serial_no;
                            date_to = data[key].date_to;
                            policy_no = data[key].policy_no;

                            basic_gross_premium = parseInt(data[key].basic_gross_premium);
                            plan_policy_commission = parseInt(data[key].plan_policy_commission);
                            commission_rece_company = parseInt(data[key].commission_rece_company);
                            commission_amt_rece_company = parseInt(data[key].commission_amt_rece_company);
                            var grpname = data[key].grpname;

                            if (isNaN(plan_policy_commission))
                                plan_policy_commission = 0;
                            else
                                plan_policy_commission = plan_policy_commission;

                            if (isNaN(basic_gross_premium))
                                basic_gross_premium = 0;
                            else
                                basic_gross_premium = basic_gross_premium;

                            if (isNaN(commission_rece_company))
                                commission_rece_company = 0;
                            else
                                commission_rece_company = commission_rece_company;

                            if (isNaN(commission_amt_rece_company))
                                commission_amt_rece_company = 0;
                            else
                                commission_amt_rece_company = commission_amt_rece_company;

                            // alert(basic_gross_premium);
                            // alert(commission_rece_company);
                            // alert(commission_amt_rece_company);

                            commission_amt_receivable = Math.round((basic_gross_premium * plan_policy_commission) / 100);

                            if (commission_amt_rece_company == 0 || commission_amt_rece_company == "")
                                commission_amt_rece_company = Math.round((basic_gross_premium * commission_rece_company) / 100);
                            else
                                commission_amt_rece_company = commission_amt_rece_company;

                            if (isNaN(commission_amt_receivable))
                                commission_amt_receivable = 0;
                            else
                                commission_amt_receivable = commission_amt_receivable;

                            var commission_diff = parseInt(commission_amt_receivable) - parseInt(commission_amt_rece_company);

                            if (isNaN(commission_diff))
                                commission_diff = 0;
                            else
                                commission_diff = commission_diff;

                            var isActive = data[key].del_flag;


                            if (total_commission_amt_receivable == 0) {
                                total_commission_amt_receivable = commission_amt_receivable;
                            } else {
                                total_commission_amt_receivable = total_commission_amt_receivable + commission_amt_receivable;
                            }

                            if (total_commission_amt_received_by_company == 0) {
                                total_commission_amt_received_by_company = commission_amt_rece_company;
                            } else {
                                total_commission_amt_received_by_company = total_commission_amt_received_by_company + commission_amt_rece_company;
                            }

                            var tr_class = "";
                            if (commission_diff > 0) {
                                if (commission_amt_receivable == commission_diff) {
                                    tr_class = "due";
                                    pay_btn_class = "badge badge-danger pl-2";
                                    pay_btn_txt = " Due";
                                } else {
                                    tr_class = "positive";
                                    pay_btn_class = "badge badge-warning pl-2";
                                    pay_btn_txt = " Partial Paid";
                                }
                            } else if (commission_diff < 0) {
                                tr_class = "negative";
                                pay_btn_class = "badge badge-info pl-2";
                                pay_btn_txt = " Extra paid";
                            } else if (commission_diff == 0) {
                                tr_class = "equal";
                                pay_btn_class = "badge badge-success pl-2";
                                pay_btn_txt = " Paid";
                            }
                            var pay_status_btn = '<span class="' + pay_btn_class + '">' + pay_btn_txt + '</span>';

                            if (!isNaN(policy_id)) {
                                var inline_edit = '<button type="button" class="btn btn-danger btn-sm ml-1 editbtn"  id="edit_btn_' + policy_id + '" onclick="OnInLine_Edit(' + policy_id + ')" disabled>Edit</button>';
                                if (isActive == 1) {
                                    var del_status = "No";

                                    var delete_btn_txt = "<button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + policy_id + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + policy_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                                }

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + sn + '</td><td>' + total_serial_no + '</td><td><center>' + grpname + '</center></td><td>' + member_name + '</td><td>' + policy_type_title + '</td><td>' + policy_no + '</td><td>' + date_to + '</td><td>' + company_name + '</td><td>' + basic_gross_premium + '</td><?php if (($this->session->userdata("@_user_role_title") == "Super Admin") || ($this->session->userdata("@_user_role_title") == "Admin")) : ?><td>' + plan_policy_commission + '</td> <td>' + commission_amt_receivable + '</td> <?php endif; ?> <td id="commission_rece_company_' + policy_id + '">' + commission_rece_company + '</td><td id="commission_amt_rece_company_' + policy_id + '">' + commission_amt_rece_company + '</td><td id="commission_diff_' + policy_id + '"  class="commission_diff">' + commission_diff + "</td><td>" + pay_status_btn + '</td><td contenteditable="false" >' + inline_edit + '</td></tr>';
                            }
                        });
                        $("#total_commission_amt_receivable").val(total_commission_amt_receivable);
                        $("#total_commission_amt_received_by_company").val(total_commission_amt_received_by_company);

                    } else {
                        <?php if (($this->session->userdata("@_user_role_title") == "Super Admin") || ($this->session->userdata("@_user_role_title") == "Admin")) : ?>
                            var count = 16;
                        <?php else: ?>
                            var count = 14;
                        <?php endif; ?>
                        $("#total_data").text("");
                        $("#total_data").text("Count (" + total_commission_data + ")");
                        datas = '<tr><td colspan="'+count+'" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                    Tot_commission_rece_company();
                    Tot_commission_Diffrence();

                    $.each(data, function(key, val) {
                        policy_id = parseInt(data[key].policy_id);
                        basic_gross_premium = parseInt(data[key].basic_gross_premium);
                        plan_policy_commission = parseInt(data[key].plan_policy_commission);
                        commission_rece_company = parseInt(data[key].commission_rece_company);
                        commission_amt_rece_company = parseInt(data[key].commission_amt_rece_company);

                        if (isNaN(plan_policy_commission))
                            plan_policy_commission = 0;
                        else
                            plan_policy_commission = plan_policy_commission;

                        if (isNaN(basic_gross_premium))
                            basic_gross_premium = 0;
                        else
                            basic_gross_premium = basic_gross_premium;

                        if (isNaN(commission_rece_company))
                            commission_rece_company = 0;
                        else
                            commission_rece_company = commission_rece_company;

                        if (isNaN(commission_amt_rece_company))
                            commission_amt_rece_company = 0;
                        else
                            commission_amt_rece_company = commission_amt_rece_company;

                        commission_amt_receivable = Math.round((basic_gross_premium * plan_policy_commission) / 100);

                        if (commission_amt_rece_company == 0 || commission_amt_rece_company == "")
                            commission_amt_rece_company = Math.round((basic_gross_premium * commission_rece_company) / 100);
                        else
                            commission_amt_rece_company = commission_amt_rece_company;

                        if (isNaN(commission_amt_receivable))
                            commission_amt_receivable = 0;
                        else
                            commission_amt_receivable = commission_amt_receivable;
                        var isActive = data[key].del_flag;


                        var commission_diff = parseInt(commission_amt_receivable) - parseInt(commission_amt_rece_company);

                        if (isNaN(commission_diff))
                            commission_diff = 0;
                        else
                            commission_diff = commission_diff;

                        if (total_commission_amt_receivable == 0) {
                            total_commission_amt_receivable = commission_amt_receivable;
                        } else {
                            total_commission_amt_receivable = total_commission_amt_receivable + commission_amt_receivable;
                        }
                        if (total_commission_amt_received_by_company == 0) {
                            total_commission_amt_received_by_company = commission_amt_rece_company;
                        } else {
                            total_commission_amt_received_by_company = total_commission_amt_received_by_company + commission_amt_rece_company;
                        }

                        if (!isNaN(policy_id)) {
                            var tr_class = "";
                            if (commission_diff > 0) {
                                if (commission_amt_receivable == commission_diff)
                                    tr_class = "due";
                                else
                                    tr_class = "positive";
                            } else if (commission_diff < 0) {
                                tr_class = "negative";
                            } else if (commission_diff == 0) {
                                tr_class = "equal";
                            }
                            // alert(tr_class);
                            // $("#tableData tr").addClass(tr_class);
                            $("#commission_diff_" + policy_id).closest('tr').addClass(tr_class);
                        }
                    });
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    var actual_policy_glob_id = [];

    function OnInLine_Edit(policy_id) {
        // var button_val = $(this).parents('tr').find('td').not(":nth-child(12)").html("");

        var button_val = $("#edit_btn_" + policy_id).text();
        // alert(actual_policy_glob_id);
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
                        actual_policy_glob_id.push(policy_id);
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        $("#department_name").val("");
                        $("#department_name").removeClass("parsley-error");
                        $('#form_modal').modal('toggle');
                        $("#commission_bill_entry").show();
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

    function onlyUnique(value, index, self) {
        return self.indexOf(value) === index;
    }

    function update_commission_bill_entry() {
        // actual_policy_glob_id = [];
        var filter_company = $("#filter_company").val();
        // var bill_upload = $("#bill_upload").val();
        var bill_upload = $('#bill_upload').prop('files')[0];
        var date_checking = $("#date_checking").val();
        var end_date_checking = $("#end_date_checking").val();
        var bill_remark = $("#bill_remark").val();
        var bill_no = $("#bill_no").val();
        var bill_date = $("#bill_date").val();
        // alert(actual_policy_glob_id);end_date_checking
        var policy_ids = actual_policy_glob_id.filter(onlyUnique);
        // alert(policy_ids);
        // return false;

        var form_data = new FormData();
        form_data.append('company', filter_company);
        form_data.append('bill_upload', bill_upload);
        form_data.append('date_checking', date_checking);
        form_data.append('end_date_checking', end_date_checking);
        form_data.append('bill_remark', bill_remark);
        form_data.append('bill_no', bill_no);
        form_data.append('bill_date', bill_date);
        form_data.append('policy_ids', policy_ids);

        if (bill_upload == undefined || bill_upload == "") {
            toaster(message_type = "Error", message_txt = "Please Select Bill Upload File!", message_icone = "error");
            $("#bill_upload_err").addClass("text-danger").text("Please Select Bill Upload File!");
            return false;
        }

        var url = "<?php echo $base_url; ?>master/commission/add_commission_bill_entry_by_commission_list";

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
                    $("#bill_upload").val("");
                    $("#date_checking").val("");
                    $("#end_date_checking").val("");
                    $("#bill_remark").val("");
                    $("#bill_no").val("");
                    $("#bill_date").val("");

                    $("#bill_upload").removeClass("parsley-error");
                    $("#date_checking").removeClass("parsley-error");
                    $("#end_date_checking").removeClass("parsley-error");
                    $("#bill_remark").removeClass("parsley-error");
                    $("#bill_no").removeClass("parsley-error");
                    $("#bill_date").removeClass("parsley-error");
                    $("#bill_upload_err").removeClass("text-danger").text("");
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                    // get_brochure_doc_list();
                } else {
                    if (data["messages"] != "") {

                        if (data["messages"]["bill_upload_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["bill_upload_err"], message_icone = "error");
                        if (data["messages"]["bill_upload_err"] != "")
                            $("#bill_upload").addClass("parsley-error");
                        else
                            $("#bill_upload").removeClass("parsley-error");
                        $("#bill_upload_err").addClass("text-danger").html(data["messages"]["bill_upload_err"]);

                    } else {
                        if (data["message"]["bill_upload_err"] != "")
                            $("#bill_upload").addClass("parsley-error");
                        else
                            $("#bill_upload").removeClass("parsley-error");
                        $("#bill_upload_err").addClass("text-danger").html(data["message"]["bill_upload_err"]);

                        if (data["message"]["date_checking_err"] != "")
                            $("#date_checking").addClass("parsley-error");
                        else
                            $("#date_checking").removeClass("parsley-error");
                        $("#date_checking_err").addClass("text-danger").html(data["message"]["date_checking_err"]);

                        if (data["message"]["end_date_checking_err"] != "")
                            $("#end_date_checking").addClass("parsley-error");
                        else
                            $("#end_date_checking").removeClass("parsley-error");
                        $("#end_date_checking_err").addClass("text-danger").html(data["message"]["end_date_checking_err"]);

                        if (data["message"]["bill_remark_err"] != "")
                            $("#bill_remark").addClass("parsley-error");
                        else
                            $("#bill_remark").removeClass("parsley-error");
                        $("#bill_remark_err").addClass("text-danger").html(data["message"]["bill_remark_err"]);

                        if (data["message"]["bill_no_err"] != "")
                            $("#bill_no").addClass("parsley-error");
                        else
                            $("#bill_no").removeClass("parsley-error");
                        $("#bill_no_err").addClass("text-danger").html(data["message"]["bill_no_err"]);

                        if (data["message"]["bill_date_err"] != "")
                            $("#bill_date").addClass("parsley-error");
                        else
                            $("#bill_date").removeClass("parsley-error");
                        $("#bill_date_err").addClass("text-danger").html(data["message"]["bill_date_err"]);
                    }
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
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