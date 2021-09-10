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
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_claim_data"></span></h4>
                            </div>

                            <div class="col-md-6 text-right">
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
                                        <th><center>Claiment Name</center></th>
                                        <th>Company Name</th>
                                        <th>Policy Name</th>
                                        <th>Intimation Status</th>
                                        <th>Date Admissoin/Loss</th>
                                        <!-- <th>Delete Status</th> -->
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
                                    <label for="filter_claiment" class="col-form-label col-md-4 text-right">Claiment Name</label>
                                    <div class="col-md-8">
                                        <select class="form-control" data-toggle="select2" id="filter_claiment" name="filter_claiment">
                                            <option value="null">Select Claiment Name</option>
                                            <?php $company = members_dropdown();
                                            if (!empty($company)) : foreach ($company as $row) : ?>
                                                    <option value="<?php echo $row["id"]; ?>"><?php echo ucwords($row["name"]); ?></option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 row mt-1">
                                    <label for="filter_company" class="col-form-label col-md-4 text-right">Company</label>
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
                                </div>
                                <div class="col-md-4 row mt-1">
                                    <label for="filter_policy_name" class="col-form-label col-md-4 text-right">Policy Name</label>
                                    <div class="col-md-8">
                                        <select name="filter_policy_name" id="filter_policy_name" class="form-control" data-toggle="select2">
                                            <option value="null">Select Policy Name</option>
                                            <?php $policy_list = policy_type_dropdown();
                                            if (!empty($policy_list)) : foreach ($policy_list as $row) : ?>
                                                    <option value="<?php echo $row["policy_type_id"]; ?>"><?php echo ucwords($row["policy_type"]); ?></option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>
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
        var filter_claiment = $("#filter_claiment").val();
        var filter_policy_name = $("#filter_policy_name").val();

        if (filter_year == "null")
            filter_year = "";
        if (filter_month == "null")
            filter_month = "";
        if (filter_day == "null")
            filter_day = "";
        if (filter_company == "null")
            filter_company = "";
        if (filter_claiment == "null")
            filter_claiment = "";
        if (filter_policy_name == "null")
            filter_policy_name = "";

        var url = "<?php echo $base_url; ?>master/claims/filter_claims_list";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_year: filter_year,
                    filter_month: filter_month,
                    filter_day: filter_day,
                    filter_company: filter_company,
                    filter_claiment: filter_claiment,
                    filter_policy_name: filter_policy_name,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    if (data["status"] == true) {
                        console.log(data);
                    }
                    var total_claim_data = 0;
                    $("#total_claim_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {

                        console.log(data);

                        var edit_btn = "";
                        var status_btn = "";
                        var id = "";
                        var member_name = "";
                        var company_name = "";
                        var intimation_status = "";
                        var date_loss_addmission = "";
                        var claims_type = "";
                        var created_date = "";
                        var policy_id = "";
                        var datas = "";
                        var status = "";
                        var nstatus = "";
                        total_claim_data = data["total_claim_data"];
                        $("#total_claim_data").text(" Count ( " + total_claim_data + " ) ");
                        var data = data["question_data"];
                        $.each(data, function(key, val) {

                            sn = parseInt(key) + parseInt(1);
                            id = data[key].claim_main_id;
                            // id = parseInt(id);
                            // if(!isNaN(id)){alert(id);}


                            policy_id = data[key].policy_id;
                            created_date = data[key].created_date;
                            member_name = data[key].member_name;
                            company_name = data[key].company_name;
                            intimation_status = data[key].intimation_status;
                            claims_type = data[key].claims_type;
                            date_loss_addmission = data[key].date_loss_addmission;
                            var isActive = data[key].del_flag;

                            if (intimation_status == 'claim_intimated') {
                                nstatus = 'Claim Intimated';
                            } else if (intimation_status == 'paper_submitted') {
                                nstatus = 'Paper Submitted';
                            } else {
                                nstatus = 'Other';
                            }

                            if (!isNaN(id)) {

                                if (isActive == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light  btn-sm edit";
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light  btn-sm edit";
                                }

                                if (isActive == 1) {
                                    var del_status = "No";
                                    var delete_btn_txt = "<a class='dropdown-item delete' href = 'javascript:void(0);'  onClick ='OnDeleteRecover(" + id + ',' + 0 + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a href = 'javascript:void(0);' class='dropdown-item delete' id='recover' onclick='OnDeleteRecover(" + id + ',' + 1 + ")' >Recover</button>";
                                }
                                var view_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view' id='view' value='' type='button' onClick ='onView(" + id + ")' >View</button>";

                                edit_btn = "<a href='<?php echo base_url(); ?>master/claims/claim_add_step_two/" + policy_id + "/" + id + "' class='btn btn-info waves-effect width-md waves-light btn-sm edit' id='edit' >Edit</a>";
                                status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + id + "' value='' type='button' onClick ='updateStatus(" + id + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view'  onClick ='onView(" + id + ")'><b>View</b></a><a class='dropdown-item edit' href='<?php echo base_url(); ?>master/claims/claim_add_step_two/" + policy_id + "/" + id + "' id='edit' ><b>Edit</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr><td>' + action_btn + '</td><td>' + sn + '</td>  <td><center>' + member_name + '</center></td><td>' + company_name + '</td> <td>' + claims_type + '</td><td>' + nstatus + '</td><td>' + date_loss_addmission + '</td> </tr>';
                            }

                        });

                    } else {
                        datas = '<tr><td colspan="4"><center>Data Not Found</center></td> </tr>';
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
        $("#filter_company").val("null");
        $("#filter_claiment").val("null");
        $("#filter_policy_name").val("null");

        $("#filter_year").prop('selectedIndex', 0);
        $("#filter_month").prop('selectedIndex', 0);
        $("#filter_day").prop('selectedIndex', 0);
        $("#filter_company").prop('selectedIndex', 0);
        $("#filter_claiment").prop('selectedIndex', 0);
        $("#filter_policy_name").prop('selectedIndex', 0);

        getClaimsList();
    }
    getClaimsList();

    function getClaimsList() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/claims/get_claims_list";
        if (url != "") {
            $.ajax({
                url: url,
                data: {},
                type: 'GET',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {

                    if (data["status"] == true) {
                        console.log(data);
                    }
                    var total_claim_data = 0;
                    $("#total_claim_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {

                        console.log(data);

                        var edit_btn = "";
                        var status_btn = "";
                        var id = "";
                        var member_name = "";
                        var company_name = "";
                        var intimation_status = "";
                        var date_loss_addmission = "";
                        var claims_type = "";
                        var created_date = "";
                        var policy_id = "";
                        var datas = "";
                        var status = "";
                        var nstatus = "";
                        total_claim_data = data["total_claim_data"];
                        $("#total_claim_data").text(" Count ( " + total_claim_data + " ) ");
                        var data = data["question_data"];
                        $.each(data, function(key, val) {

                            sn = parseInt(key) + parseInt(1);
                            id = data[key].claim_main_id;
                            // id = parseInt(id);
                            // if(!isNaN(id)){alert(id);}


                            policy_id = data[key].policy_id;
                            created_date = data[key].created_date;
                            member_name = data[key].member_name;
                            company_name = data[key].company_name;
                            intimation_status = data[key].intimation_status;
                            claims_type = data[key].claims_type;
                            date_loss_addmission = data[key].date_loss_addmission;
                            var isActive = data[key].del_flag;

                            if (intimation_status == 'claim_intimated') {
                                nstatus = 'Claim Intimated';
                            } else if (intimation_status == 'paper_submitted') {
                                nstatus = 'Paper Submitted';
                            } else {
                                nstatus = 'Other';
                            }

                            if (!isNaN(id)) {

                                if (isActive == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light  btn-sm edit";
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light  btn-sm edit";
                                }

                                if (isActive == 1) {
                                    var del_status = "No";
                                    var delete_btn_txt = "<a class='dropdown-item delete' href = 'javascript:void(0);'  onClick ='OnDeleteRecover(" + id + ',' + 0 + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a href = 'javascript:void(0);' class='dropdown-item delete' id='recover' onclick='OnDeleteRecover(" + id + ',' + 1 + ")' >Recover</button>";
                                }
                                var view_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view' id='view' value='' type='button' onClick ='onView(" + id + ")' >View</button>";

                                edit_btn = "<a href='<?php echo base_url(); ?>master/claims/claim_add_step_two/" + policy_id + "/" + id + "' class='btn btn-info waves-effect width-md waves-light btn-sm edit' id='edit' >Edit</a>";
                                status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + id + "' value='' type='button' onClick ='updateStatus(" + id + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view'  onClick ='onView(" + id + ")'><b>View</b></a><a class='dropdown-item edit' href='<?php echo base_url(); ?>master/claims/claim_add_step_two/" + policy_id + "/" + id + "' id='edit' ><b>Edit</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr><td>' + action_btn + '</td><td>' + sn + '</td>  <td><center>' + member_name + '</center></td><td>' + company_name + '</td> <td>' + claims_type + '</td><td>' + nstatus + '</td><td>' + date_loss_addmission + '</td> </tr>';
                            }

                        });

                    } else {
                        datas = '<tr><td colspan="4"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    //alert(request.responseText);
                }
            });
        }
    }

    function OnDeleteRecover(id, status) {
        var url = "<?php echo $base_url; ?>master/claims/remove_question";
        var stype = '';
        var nid = id + ':' + status;
        if (status == 1) {
            var stype = 'Recover';
        } else {
            var stype = 'Delet';
        }
        confirmation_alert(id = nid, url = url, title = "Claim Question", type = stype);
    }
</script>