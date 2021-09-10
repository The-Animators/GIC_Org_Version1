<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<script>
    $(function() {
        var window_size = $(window).width(); // returns width of browser viewport
        var html_size = $(document).width(); // returns width of HTML document
        $(".wrapper1").width(window_size);
        $(".wrapper2").width(window_size);
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

                                        <div class="col-md-3 row">
                                            <label for="filter_year" class="col-form-label col-md-5 text-right">Year : </label>
                                            <div class="col-md-7">
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
                                            <label for="filter_month" class="col-form-label col-md-5 text-right">Month : </label>
                                            <div class="col-md-7">
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
                                            <label for="filter_date" class="col-form-label col-md-5 text-right">Date : </label>
                                            <div class="col-md-7">
                                                <select class="form-control" id="filter_date" name="filter_date">
                                                    <option value="null">Select Date</option>
                                                    <?php for ($i = 1; $i <= 31; $i++) : if ($i <= 9) : $i = "0" . $i;
                                                        endif; ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 row">
                                            <label for="filter_company" class="col-form-label col-md-4 text-right">Company : </label>
                                            <div class="col-md-8">
                                                <select class="form-control" data-toggle="select2" id="filter_company" name="filter_company">
                                                    <option value="null">Select Company</option>
                                                    <?php $company = company_dropdown();
                                                    if (!empty($company)) : foreach ($company as $row) : ?>
                                                            <option value="<?php echo $row["mcompany_id"]; ?>"><?php echo ucwords($row["company_name"]); ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                            </div>
                                            <!-- <div class="col-md-2"><button type="submit" id="search" class="btn btn-outline-secondary waves-effect width-md btn-sm" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button></div> -->
                                        </div>
                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_status" class="col-form-label col-md-5 text-right">Status</label>
                                            <div class="col-md-7">
                                                <select name="filter_status" id="filter_status" class="form-control">
                                                    <option value="null">Select Status</option>
                                                    <option value="1">Active</option>
                                                    <option value="2">In-Active</option>
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
            <!-- end page title -->
            <!-- Form row -->
            <!-- end page title -->
            <div id="view_commission_bill_uploaded_policy" class="modal fade bs-example-modal-lg bs-example-modal-center" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title"><?php echo $title; ?> Details <span id="total_data2"></span></h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-row">
                                        <table class="commission_table table table-striped table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Bill No.</th>
                                                    <th>Serial No.</th>
                                                    <th><center>Group Name</center></th>
                                                    <th>Policy Holder</th>
                                                    <th>Type of Policy</th>
                                                    <th>Policy Number</th>
                                                    <th width="5%">Expiry Date</th>
                                                    <th>Insurance Company</th>
                                                    <th>Commission % Received from Company</th>
                                                    <th>Commission Amt Received by company</th>
                                                    <!-- <th>Gross Premium</th>
                                                <th>Status</th>
                                                <th>Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody id="policy_data">
                                            </tbody>
                                        </table>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="form_modal" class="modal fade bs-example-modal-lg bs-example-modal-center" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title"><?php echo $title; ?> Details</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-row">

                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="company" class="col-form-label col-md-4 text-right">Company : <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select namse="company" id="company" class="form-control">
                                                        <option value="null">Select Company</option>
                                                        <?php $company = company_dropdown();
                                                        if (!empty($company)) : foreach ($company as $row) : ?>
                                                                <option value="<?php echo $row["mcompany_id"]; ?>"><?php echo $row["company_name"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <span id="company_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="bill_upload" class="col-form-label col-md-4 text-right">Bill Upload : <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="file" name="bill_upload" id="bill_upload" class="form-control filestyle" data-input="false" id="filestyle-1" tabindex="-1">
                                                    <span id="bill_upload_details"></span>
                                                    <span id="bill_upload_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="date_checking" class="col-form-label col-md-4 text-right">Date Checking : <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="date" name="date_checking" id="date_checking" class="form-control">
                                                    <span id="date_checking_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="end_date_checking" class="col-form-label col-md-4 text-right">Date Checking End : <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="date" name="end_date_checking" id="end_date_checking" class="form-control">
                                                    <span id="end_date_checking_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <label for="bill_remark" class="col-form-label col-md-2 text-right">Bill Details : <span class="text-danger">*</span></label>
                                                <div class="col-md-10">
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
                                            <label id="commission_bill_entry_id" hidden>1</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <center>
                                                <button id="update" onclick='onUpdate()' style="display: none;" class="btn btn-primary btn-sm">Update</button>
                                                <button id="submit" class="btn btn-primary btn-sm">Save</button>
                                                <button id="delete" onclick='OnDelete()' style="display: none;" class="btn btn-primary btn-sm">Delete</button>
                                                <button id="recover" onclick='OnRecover()' style="display: none;" class="btn btn-primary btn-sm">Recover</button>
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
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_data"></span></h4>
                            </div>
                            <!-- <div class="col-md-4">

                            </div> -->
                            <div class="col-md-6 text-right">
                                <!-- <input class='btn btn-facebook btn-sm' id='AddForm' value=' Add <?php echo $title; ?>' type='button' /> -->
                                <button type="submit" id="filter_btn" class="btn btn-outline-secondary waves-effect btn-xs"><b><i class="mdi mdi-magnify"></i>&nbsp;Filter Off</b></button>
                            </div>

                        </div>

                        <!-- <table id="datatable" class="table  table-striped table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> -->
                        <!-- <div class="wrapper1">
                            <div class="div1"></div>
                        </div>
                        <div class="wrapper2">
                            <div class="div2"> -->
                        <div class="table-cont">
                            <table class="commission_table fixed" id="commission_table" border="1">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>SN.</th>
                                        <th><center>Bill Number</center></th>
                                        <th>Bill Date</th>
                                        <th>Insurance Company</th>
                                        <th>Bill Details</th>
                                        <th>Bill Upload</th>
                                        <th>Start Date Checking</th>
                                        <th>End Date Checking</th>
                                    </tr>
                                </thead>
                                <tbody id="tableData">

                                </tbody>
                            </table>
                            <!-- </div>
                            </div> -->
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
            var filter_date = $("#filter_date").val();
            var filter_company = $("#filter_company").val();
            var filter_status = $("#filter_status").val();
            // alert(filter_date);
            // if (filter_date == "undefined" || filter_date == undefined || filter_date == "" || filter_date == "null") {
            //     filter_date = "";
            // }
            if (filter_year == "null")
                filter_year = "";

            if (filter_month == "null")
                filter_month = "";

            if (filter_date == "null")
                filter_date = "";

            if (filter_company == "null")
                filter_company = "";

            if (filter_status == "null")
                filter_status = "";

            var url = "<?php echo $base_url; ?>master/commission/filter_commission_bill_entry";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        filter_year: filter_year,
                        filter_month: filter_month,
                        filter_date: filter_date,
                        filter_company: filter_company,
                        filter_status: filter_status,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        $("#total_data").text("");
                        $("#tableData").empty();
                        var total_commission_bill_entry = 0;
                        if (data["status"] == true) {
                            var edit_btn = "";
                            var view_btn = "";
                            var status_btn = "";
                            var commission_bill_entry_id = "";
                            var company = "";
                            var date_checking = "";
                            var bill_remark = "";
                            var policy_type = "";
                            var bill_upload = "";
                            var document_list = "";
                            var claims_form = "";
                            var claims_procedure = "";
                            var comission_percentage = "";
                            var commission_bill_entry_status = "";
                            var datas = "";
                            var status = "";
                            total_commission_bill_entry = data["total_commission_bill_entry"];

                            $("#total_data").text("Count (" + total_commission_bill_entry + ")");
                            $.each(data, function(key, val) {
                                sn = parseInt(key) + parseInt(1);
                                commission_bill_entry_id = parseInt(data[key].commission_bill_entry_id);
                                company_id = data[key].fk_company_id;
                                company = data[key].company_name;
                                date_checking = data[key].date_checking;
                                end_date_checking = data[key].end_date_checking;
                                bill_remark = data[key].bill_remark;
                                bill_upload = data[key].bill_upload_file_name;
                                commission_bill_entry_status = data[key].commission_bill_entry_status;
                                var total_commission_bill_entry = data[key].total_commission_bill_entry;
                                var bill_no = data[key].bill_no;
                                var bill_date = data[key].bill_date;
                                var policy_ids = data[key].policy_ids;

                                var isActive = data[key].commission_bill_entry_del_flag;
                                if (!isNaN(commission_bill_entry_id)) {
                                    if (commission_bill_entry_status == 1) {
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
                                        var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + commission_bill_entry_id + ")'><b>Delete</b></a>";
                                        // var delete_btn_txt = "<button class='btn btn-facebook btn-sm mr-1 mt-1 delete' value='' type='button' onClick ='OnDelete(" + commission_bill_entry_id + ")' ><i class='fa fa-trash' aria-hidden='true'></i></button>";
                                    } else {
                                        var del_status = "Yes";
                                        var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + commission_bill_entry_id + ")'><b>Recover</b></a>";
                                        // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + commission_bill_entry_id + ")' class='btn btn-facebook btn-sm mr-1 mt-1 delete'><i class='fa fa-undo' aria-hidden='true'></i></button></button>";
                                    }
                                    // alert(bill_upload);
                                    if (bill_upload == "" || bill_upload == "null" || bill_upload == null || bill_upload == undefined) {
                                        var view_bill_upload = "";
                                        var download_bill_upload = "";
                                        var delete_bill_upload = "";
                                    } else if (bill_upload != "") {
                                        var view_bill_upload = "<a href='<?php echo base_url(); ?>master/commission/view_doc/1/" + commission_bill_entry_id + "/" + bill_upload + "' id='view_bill_upload_" + commission_bill_entry_id + "'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                        var download_bill_upload = "<a href='<?php echo base_url(); ?>master/commission/download_doc/1/" + commission_bill_entry_id + "/" + bill_upload + "'  id='download_bill_upload_" + commission_bill_entry_id + "'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                        var delete_bill_upload = "<a onclick=OnDelete_Doc('" + commission_bill_entry_id + ',' + 1 + ',' + bill_upload + ',' + '<?php echo base_url(); ?>master/commission/delete_doc' + "') href='javascript:void(0);'class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                                    }

                                    view_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm' id='edit_btn' value='' type='button' onClick ='onView(" + commission_bill_entry_id + ")' >Edit</button>";
                                    edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm' id='edit_btn' value='' type='button' onClick ='onEdit(" + commission_bill_entry_id + ")' >Edit</button>";
                                    status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + commission_bill_entry_id + "' value='' type='button' onClick ='updateStatus(" + commission_bill_entry_id + "," + commission_bill_entry_status + ")' >" + status + "</button>";

                                    action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + commission_bill_entry_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);" + commission_bill_entry_id + "' id='edit' onClick ='onEdit(" + commission_bill_entry_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + commission_bill_entry_id + "' href='javascript:void(0);' id='status_btn_" + commission_bill_entry_id + "' onClick ='updateStatus(" + commission_bill_entry_id + "," + commission_bill_entry_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                    datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td><td><center>' + bill_no + '</center></td><td>' + bill_date + '</td> <td>' + company + '</td><td>' + bill_remark + '</td><td>' + view_bill_upload + '&nbsp;&nbsp;&nbsp;' + download_bill_upload + '&nbsp;&nbsp;&nbsp;' + delete_bill_upload + '</td><td>' + date_checking + '</td><td>' + end_date_checking + '</td></tr>';
                                }
                            });

                        } else {
                            $("#total_data").text("");
                            $("#total_data").text("Count (" + total_commission_bill_entry + ")");
                            datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="7"><center>Data Not Found</center></td> </tr>';
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

            $("#filter_year").val("null");
            $("#filter_month").val("null");
            $("#filter_company").val("null");
            $("#filter_date").val("null");
            $("#filter_status").val("null");
            getCommission_bill_Entry_List();
        }

        function OnRecover(commission_bill_entry_id) {
            var url = "<?php echo $base_url; ?>master/policy/recoverpolicy";
            confirmation_alert(id = commission_bill_entry_id, url = url, title = "<?php echo $title; ?>", type = "Recover");
        }

        function OnDelete(commission_bill_entry_id) {
            var url = "<?php echo $base_url; ?>master/policy/removepolicy";
            confirmation_alert(id = commission_bill_entry_id, url = url, title = "<?php echo $title; ?>", type = "Delet");
        }
        $("#AddForm").click(function() {
            $('#form_modal').modal('toggle');
            uninitialize();
            clearError();
        });
        $('#company').on('change', function() {
            document.getElementById("update").disabled = false;
        });
        $('#date_checking').on('change', function() {
            document.getElementById("update").disabled = false;
        });
        $('#end_date_checking').on('change', function() {
            document.getElementById("update").disabled = false;
        });
        $('#bill_remark').on('keyup', function() {
            document.getElementById("update").disabled = false;
        });
        $('#bill_upload').on('click', function() {
            document.getElementById("update").disabled = false;
        });
        $('#bill_no').on('click', function() {
            document.getElementById("update").disabled = false;
        });
        $('#bill_date').on('click', function() {
            document.getElementById("update").disabled = false;
        });

        function OnDelete_Doc(commission_bill_uploaded_details) {
            var commission_bill_uploaded_details = commission_bill_uploaded_details.split(",");
            var commission_bill_entry_id = commission_bill_uploaded_details[0];
            var doc_type = commission_bill_uploaded_details[1];
            var doc_name = commission_bill_uploaded_details[2];
            var url = commission_bill_uploaded_details[3];
            if (doc_type == 1)
                var title = "Bill Upload Document";
            document_confirmation_alert(id = commission_bill_entry_id, doc_type = doc_type, doc_name = doc_name, url = url, title = title, type = "Delet");
        }

        function clearError() {
            $("#company").removeClass("parsley-error");
            $("#company_err").removeClass("text-danger").text("");

            $("#date_checking").removeClass("parsley-error");
            $("#date_checking_err").removeClass("text-danger").text("");

            $("#bill_remark").removeClass("parsley-error");
            $("#bill_remark_err").removeClass("text-danger").text("");

            $("#bill_upload").removeClass("parsley-error");
            $("#bill_upload_err").removeClass("text-danger").text("");
        }

        function uninitialize() {
            $("#commission_bill_entry_id").text("");
            $("#company").val("null");
            $("#date_checking").val("");
            $("#bill_remark").val("");
            $("#bill_upload").val("");

            $("#update").hide();
            $("#delete").hide();
            $("#submit").show();
        }

        function OnRecover(commission_bill_entry_id) {
            // var commission_bill_entry_id = $("#commission_bill_entry_id").text();
            var url = "<?php echo $base_url; ?>master/commission/recover_commission_bill_entry";
            confirmation_alert(id = commission_bill_entry_id, url = url, title = "Commission Bill Uploaded", type = "Recover");
        }

        function OnDelete(commission_bill_entry_id) {
            // var commission_bill_entry_id = $("#commission_bill_entry_id").text();
            var url = "<?php echo $base_url; ?>master/commission/remove_commission_bill_entry";
            confirmation_alert(id = commission_bill_entry_id, url = url, title = "Commission Bill Uploaded", type = "Delet");
        }

        function onEdit(val) {
            clearError();
            $("#commission_bill_entry_id").text(val);
            $("#update").show();
            $("#delete").show();
            $("#submit").hide();
            $('#form_modal').modal('toggle');
            var url = "<?php echo $base_url; ?>master/commission/edit_commission_bill_entry";
            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        commission_bill_entry_id: val
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {

                    },

                    success: function(data) {
                        console.log(data);
                        // var myObj = JSON.parse(data);
                        $("#commission_bill_entry_id").text(data["userdata"].commission_bill_entry_id);

                        var company = data["userdata"].fk_company_id;
                        var bill_date = data["userdata"].bill_date;
                        var bill_no = data["userdata"].bill_no;
                        var bill_upload_file_name = data["userdata"].bill_upload_file_name;
                        var date_checking = data["userdata"].date_checking;
                        var end_date_checking = data["userdata"].end_date_checking;
                        var bill_remark = data["userdata"].bill_remark;
                        date_checking = date_checking.split(" ");
                        var main_date = date_checking[0].split("-");
                        var date = main_date[3] + "-" + main_date[2] + "-" + main_date[1];
                        end_date_checking = end_date_checking.split(" ");
                        // var main_date = date_checking[0].split("-");
                        // var date = main_date[3] + "-" + main_date[2] + "-" + main_date[1];

                        // var main_date2 = bill_date.split("-");
                        // var bill_date2 = main_date2[3] + "-" + main_date2[2] + "-" + main_date2[1];
                        // alert(date);
                        $('select[id^="company"] option[value="' + company + '"]').attr("selected", "selected");
                        $("#date_checking").val(date_checking[0]);
                        $("#end_date_checking").val(end_date_checking[0]);
                        $("#bill_remark").val(bill_remark);
                        $("#bill_date").val(bill_date);
                        $("#bill_no").val(bill_no);

                        var isActive = data["userdata"].commission_bill_entry_del_flag;
                        commission_bill_entry_id = data["userdata"].commission_bill_entry_id;

                        // alert(bill_upload_file_name);

                        if (bill_upload_file_name == "" || bill_upload_file_name == "undefined" || bill_upload_file_name == null || bill_upload_file_name == undefined) {
                            view_bill_upload = "";
                            download_bill_upload = "";
                            delete_bill_upload = "";
                        } else if (bill_upload != "") {
                            view_bill_upload = "<a href='<?php echo base_url(); ?>master/commission/view_doc/1/" + commission_bill_entry_id + "/" + bill_upload_file_name + "'  target='_blank' class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                            download_bill_upload = "<a href='<?php echo base_url(); ?>master/commission/download_doc/1/" + commission_bill_entry_id + "/" + bill_upload_file_name + "' target='_blank' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                            delete_bill_upload = "<a onclick=OnDelete_Doc('" + commission_bill_entry_id + ',' + 1 + ',' + bill_upload_file_name + ',' + '<?php echo base_url(); ?>master/commission/delete_doc' + "') href='#'  class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                        }

                        $("#bill_upload_details").html(view_bill_upload + "&nbsp;&nbsp;&nbsp;" + download_bill_upload + "&nbsp;&nbsp;&nbsp;" + delete_bill_upload);
                        if (isActive == 0) {
                            $("#recover").show();
                            $("#update").hide();
                            $("#delete").hide();
                        } else {
                            $("#recover").hide();
                            $("#update").show();
                            $("#delete").show();
                        }
                        document.getElementById("update").disabled = true;

                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            }
        }

        function onUpdate() {
            var commission_bill_entry_id = $("#commission_bill_entry_id").text();

            var company = $("#company").val();
            var company_name_txt = $("#company option:selected").text();
            var date_checking = $("#date_checking").val();
            var end_date_checking = $("#end_date_checking").val();
            var bill_remark = $("#bill_remark").val();
            var bill_upload = $('#bill_upload').prop('files')[0];
            var bill_no = $("#bill_no").val();
            var bill_date = $("#bill_date").val();
            if (date_checking == "undefined" || date_checking == undefined || date_checking == "" || date_checking == "null") {
                date_checking = "";
            }
            if (end_date_checking == "undefined" || end_date_checking == undefined || end_date_checking == "" || end_date_checking == "null") {
                end_date_checking = "";
            }
            if (bill_upload == "undefined" || bill_upload == undefined || bill_upload == "" || bill_upload == "null") {
                bill_upload = "";
            }
            if (company == "null")
                company = "";

            if (date_checking == "null")
                date_checking = "";

            if (bill_remark == "null")
                bill_remark = "";

            var form_data = new FormData();
            form_data.append('commission_bill_entry_id', commission_bill_entry_id);
            form_data.append('company', company);
            form_data.append('company_name_txt', company_name_txt);
            form_data.append('date_checking', date_checking);
            form_data.append('end_date_checking', end_date_checking);
            form_data.append('bill_remark', bill_remark);
            form_data.append('bill_upload', bill_upload);
            form_data.append('bill_no', bill_no);
            form_data.append('bill_date', bill_date);

            // if (bill_upload == undefined || bill_upload == "") {
            //     toaster(message_type = "Error", message_txt = "Please Select Bill Upload File!", message_icone = "error");
            //     $("#bill_upload_err").addClass("text-danger").text("Please Select Bill Upload File!");
            //     return false;
            // }

            var url = "<?php echo $base_url; ?>master/commission/update_commission_bill_entry";

            $.ajax({
                type: "POST",
                url: url,
                data: form_data,
                dataType: 'json',
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {},
                success: function(data) {
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        $("#company").val("null");
                        $("#bill_upload").val("");
                        $("#date_checking").val("");
                        $("#bill_remark").val("");
                        $("#bill_no").val("");
                        $("#bill_date").val("");

                        $("#bill_upload").removeClass("parsley-error");
                        $("#date_checking").removeClass("parsley-error");
                        $("#bill_remark").removeClass("parsley-error");
                        $("#bill_no").removeClass("parsley-error");
                        $("#bill_date").removeClass("parsley-error");
                        $("#bill_upload_err").removeClass("text-danger").text("");
                        $('#form_modal').modal('toggle');

                        setTimeout(function() {
                            location.reload();
                        }, 1000);
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
                            if (data["message"]["company_err"] != "")
                                $("#company").addClass("parsley-error");
                            else
                                $("#company").removeClass("parsley-error");
                            $("#company_err").addClass("text-danger").html(data["message"]["company_err"]);

                            if (data["message"]["date_checking_err"] != "")
                                $("#date_checking").addClass("parsley-error");
                            else
                                $("#date_checking").removeClass("parsley-error");
                            $("#date_checking_err").addClass("text-danger").html(data["message"]["date_checking_err"]);

                            if (data["message"]["bill_remark_err"] != "")
                                $("#bill_remark").addClass("parsley-error");
                            else
                                $("#bill_remark").removeClass("parsley-error");
                            $("#bill_remark_err").addClass("text-danger").html(data["message"]["bill_remark_err"]);

                            if (data["message"]["bill_upload_err"] != "")
                                $("#bill_upload").addClass("parsley-error");
                            else
                                $("#bill_upload").removeClass("parsley-error");
                            $("#bill_upload_err").addClass("text-danger").html(data["message"]["bill_upload_err"]);

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

        $("#submit").click(function() {
            var company = $("#company").val();
            var date_checking = $("#date_checking").val();
            var bill_remark = $("#bill_remark").val();
            var company_name_txt = $("#company option:selected").text();
            var bill_upload = $('#bill_upload').prop('files')[0];

            if (date_checking == "undefined" || date_checking == undefined || date_checking == "" || date_checking == "null") {
                date_checking = "";
            }
            if (bill_upload == "undefined" || bill_upload == undefined || bill_upload == "" || bill_upload == "null") {
                bill_upload = "";
            }

            if (company == "null")
                company = "";

            if (date_checking == "null")
                date_checking = "";

            if (bill_remark == "null")
                bill_remark = "";

            var form_data = new FormData();
            form_data.append('company', company);
            form_data.append('company_name_txt', company_name_txt);
            form_data.append('date_checking', date_checking);
            form_data.append('bill_remark', bill_remark);
            form_data.append('bill_upload', bill_upload);


            var url = "<?php echo $base_url; ?>master/commission/add_commission_bill_entry";

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
                        $("#company").val("null");
                        $("#date_checking").val("");
                        $("#bill_remark").val("");
                        $("#bill_upload").val("");

                        $("#company").removeClass("parsley-error");
                        $("#date_checking").removeClass("parsley-error");
                        $("#bill_remark").removeClass("parsley-error");
                        $("#bill_upload").removeClass("parsley-error");

                        $('#form_modal').modal('toggle');

                        setTimeout(function() {
                            location.reload();
                        }, 1000);
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
                            if (data["message"]["company_err"] != "")
                                $("#company").addClass("parsley-error");
                            else
                                $("#company").removeClass("parsley-error");
                            $("#company_err").addClass("text-danger").html(data["message"]["company_err"]);

                            if (data["message"]["date_checking_err"] != "")
                                $("#date_checking").addClass("parsley-error");
                            else
                                $("#date_checking").removeClass("parsley-error");
                            $("#date_checking_err").addClass("text-danger").html(data["message"]["date_checking_err"]);

                            if (data["message"]["bill_remark_err"] != "")
                                $("#bill_remark").addClass("parsley-error");
                            else
                                $("#bill_remark").removeClass("parsley-error");
                            $("#bill_remark_err").addClass("text-danger").html(data["message"]["bill_remark_err"]);

                            if (data["message"]["bill_upload_err"] != "")
                                $("#bill_upload").addClass("parsley-error");
                            else
                                $("#bill_upload").removeClass("parsley-error");
                            $("#bill_upload_err").addClass("text-danger").html(data["message"]["bill_upload_err"]);

                        }
                    }

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        });

        getCommission_bill_Entry_List();

        function getCommission_bill_Entry_List() {
            $("#tableData").empty();
            var url = "<?php echo $base_url; ?>master/commission/get_commission_bill_entry_list";
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
                        $("#total_data").text("");
                        $("#tableData").empty();
                        var total_commission_bill_entry = 0;
                        if (data["status"] == true) {
                            var edit_btn = "";
                            var view_btn = "";
                            var status_btn = "";
                            var commission_bill_entry_id = "";
                            var company = "";
                            var date_checking = "";
                            var bill_remark = "";
                            var policy_type = "";
                            var bill_upload = "";
                            var document_list = "";
                            var claims_form = "";
                            var claims_procedure = "";
                            var comission_percentage = "";
                            var commission_bill_entry_status = "";
                            var datas = "";
                            var status = "";
                            total_commission_bill_entry = data["total_commission_bill_entry"];

                            $("#total_data").text("Count (" + total_commission_bill_entry + ")");
                            $.each(data, function(key, val) {
                                sn = parseInt(key) + parseInt(1);
                                commission_bill_entry_id = parseInt(data[key].commission_bill_entry_id);
                                company_id = data[key].fk_company_id;
                                company = data[key].company_name;
                                date_checking = data[key].date_checking;
                                end_date_checking = data[key].end_date_checking;
                                bill_remark = data[key].bill_remark;
                                bill_upload = data[key].bill_upload_file_name;
                                commission_bill_entry_status = data[key].commission_bill_entry_status;
                                var total_commission_bill_entry = data[key].total_commission_bill_entry;
                                var bill_no = data[key].bill_no;
                                var bill_date = data[key].bill_date;
                                var policy_ids = data[key].policy_ids;

                                var isActive = data[key].commission_bill_entry_del_flag;
                                if (!isNaN(commission_bill_entry_id)) {
                                    if (commission_bill_entry_status == 1) {
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
                                        var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + commission_bill_entry_id + ")'><b>Delete</b></a>";
                                        // var delete_btn_txt = "<button class='btn btn-facebook btn-sm mr-1 mt-1 delete' value='' type='button' onClick ='OnDelete(" + commission_bill_entry_id + ")' ><i class='fa fa-trash' aria-hidden='true'></i></button>";
                                    } else {
                                        var del_status = "Yes";
                                        var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + commission_bill_entry_id + ")'><b>Recover</b></a>";
                                        // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + commission_bill_entry_id + ")' class='btn btn-facebook btn-sm mr-1 mt-1 delete'><i class='fa fa-undo' aria-hidden='true'></i></button></button>";
                                    }
                                    // alert(bill_upload);
                                    if (bill_upload == "" || bill_upload == "null" || bill_upload == null || bill_upload == undefined) {
                                        var view_bill_upload = "";
                                        var download_bill_upload = "";
                                        var delete_bill_upload = "";
                                    } else if (bill_upload != "") {
                                        var view_bill_upload = "<a href='<?php echo base_url(); ?>master/commission/view_doc/1/" + commission_bill_entry_id + "/" + bill_upload + "' id='view_bill_upload_" + commission_bill_entry_id + "'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                        var download_bill_upload = "<a href='<?php echo base_url(); ?>master/commission/download_doc/1/" + commission_bill_entry_id + "/" + bill_upload + "'  id='download_bill_upload_" + commission_bill_entry_id + "'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                        var delete_bill_upload = "<a onclick=OnDelete_Doc('" + commission_bill_entry_id + ',' + 1 + ',' + bill_upload + ',' + '<?php echo base_url(); ?>master/commission/delete_doc' + "') href='javascript:void(0);'class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                                    }

                                    view_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm' id='edit_btn' value='' type='button' onClick ='onView(" + commission_bill_entry_id + ")' >Edit</button>";
                                    edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm' id='edit_btn' value='' type='button' onClick ='onEdit(" + commission_bill_entry_id + ")' >Edit</button>";
                                    status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + commission_bill_entry_id + "' value='' type='button' onClick ='updateStatus(" + commission_bill_entry_id + "," + commission_bill_entry_status + ")' >" + status + "</button>";

                                    action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + commission_bill_entry_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);" + commission_bill_entry_id + "' id='edit' onClick ='onEdit(" + commission_bill_entry_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + commission_bill_entry_id + "' href='javascript:void(0);' id='status_btn_" + commission_bill_entry_id + "' onClick ='updateStatus(" + commission_bill_entry_id + "," + commission_bill_entry_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                    datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td><td><center>' + bill_no + '</center></td><td>' + bill_date + '</td> <td>' + company + '</td><td>' + bill_remark + '</td><td>' + view_bill_upload + '&nbsp;&nbsp;&nbsp;' + download_bill_upload + '&nbsp;&nbsp;&nbsp;' + delete_bill_upload + '</td><td>' + date_checking + '</td><td>' + end_date_checking + '</td></tr>';
                                }
                            });

                        } else {
                            $("#total_data").text("");
                            $("#total_data").text("Count (" + total_commission_bill_entry + ")");
                            datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="7"><center>Data Not Found</center></td> </tr>';
                        }
                        $("#tableData").append(datas);
                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            }
        }

        function updateStatus(commission_bill_entry_id, commission_bill_entry_status) {

            var url = "<?php echo $base_url; ?>master/commission/update_commission_bill_entry_status";

            if (commission_bill_entry_id != "") {

                $.ajax({
                    url: url,
                    data: {
                        "id": commission_bill_entry_id,
                        "status": commission_bill_entry_status
                    },
                    type: 'POST',
                    //dataType : 'json',
                    success: function(data) {
                        var data = JSON.parse(data);
                        var status = "";
                        var update_style = "";
                        $("#status_btn_" + commission_bill_entry_id).text("");
                        if (data["status"] == true) {
                            toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                            if (data["userdata"]["commission_bill_entry_status"] == 1) {
                                status = "In-Active";
                                var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                                $("#edit_" + commission_bill_entry_id).addClass(status_btn_txt);
                                $("#status_btn_" + commission_bill_entry_id).text(status);
                            } else {
                                status = "Active";
                                var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                                $("#edit_" + commission_bill_entry_id).addClass(status_btn_txt);
                                $("#status_btn_" + commission_bill_entry_id).text(status);
                            }

                            $("#status_btn_" + commission_bill_entry_id).text(status);


                            $('#status_btn_' + commission_bill_entry_id).attr('onClick', 'updateStatus(' + commission_bill_entry_id + ',' + data["userdata"]["commission_bill_entry_status"] + ')');

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

        function onView(val) {
            clearError();
            $("#commission_bill_entry_id").text(val);
            $('#view_commission_bill_uploaded_policy').modal('toggle');
            var url = "<?php echo $base_url; ?>master/commission/view_commission_bill_uploaded_policy";
            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        commission_bill_entry_id: val
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {

                    },

                    success: function(data) {
                        var total_commission_data = 0;
                        $("#total_data2").text("");
                        $("#policy_data").empty();
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
                            bill_no = data["bill_no"];
                            // console.log(data);
                            var data = data["userdata"];
                            $("#total_data2").text("Count (" + total_commission_data + ")");
                            $.each(data, function(key, val) {

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
                                    bill_no
                                    datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + bill_no + '</td><td>' + total_serial_no + '</td><td><center>' + grpname + '</center></td><td>' + member_name + '</td><td>' + policy_type_title + '</td><td>' + policy_no + '</td><td>' + date_to + '</td><td>' + company_name + '</td><td>' + commission_rece_company + '</td><td>' + commission_amt_rece_company + '</td></tr>';
                                }
                            });

                        } else {
                            $("#total_data2").text("");
                            $("#total_data2").text("Count (" + total_commission_data + ")");
                            datas = '<tr><td colspan="11"><center>Data Not Found</center></td> </tr>';
                        }
                        $("#policy_data").append(datas);
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
                    CheckFormAccess(submenu_permission, 9, url);
                    check(role_permission, 9);
                }
            }
        });
    </script>