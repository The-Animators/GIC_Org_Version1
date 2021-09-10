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
                                                <label for="company" class="col-form-label col-md-5 text-right">Company : <span class="text-danger">*</span></label>
                                                <div class="col-md-7">
                                                    <select class="form-control" id="company" name="company" onchange="company_agency()">
                                                        <option value="null">Select Company</option>
                                                        <?php $company = company_dropdown();
                                                        if (!empty($company)) : foreach ($company as $row) : ?>
                                                                <option value="<?php echo $row["mcompany_id"]; ?>"><?php echo ucwords($row["company_name"]); ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <span id="company_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="agency" class="col-form-label col-md-4 text-right">Agency : <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select name="agency" id="agency" class="form-control">
                                                        <option value="null">Select Agency Code</option>
                                                    </select>
                                                    <span id="agency_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="quarterly_period" class="col-form-label col-md-4 text-right">Quarterly Period : <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select name="quarterly_period" id="quarterly_period" class="form-control">
                                                        <option value="null">Select Quarterly Period</option>
                                                        <option value="January - March">January - March</option>
                                                        <option value="April - June">April - June</option>
                                                        <option value="July - September">July - September</option>
                                                        <option value="October - December">October - December</option>
                                                    </select>
                                                    <span id="quarterly_period_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="tds_doc_upload" class="col-form-label col-md-5 text-right">TDS document : <span class="text-danger">*</span></label>
                                                <div class="col-md-7">
                                                    <input type="file" name="tds_doc_upload" id="tds_doc_upload" class="form-control filestyle" data-input="false" id="filestyle-1" tabindex="-1">
                                                    <span id="tds_doc_upload_err"></span>
                                                    <span id="tds_doc_upload_file_det"></span>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="tds_certificate_id" hidden>1</label>
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
                                <div class="col-md-8">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="20%">Company :</td>
                                                <td><strong><span id="company_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Agency :</td>
                                                <td><strong><span id="agency_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Quarterly Period :</td>
                                                <td><strong><span id="quarterly_period_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">TDS document :</td>
                                                <td><strong><span id="tds_doc_upload_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <!-- <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="company" class="col-form-label col-md-5 text-right">Company : </label>
                                                <div class="col-form-label col-md-7" id="company_det"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="agency" class="col-form-label col-md-4 text-right">Agency : </label>
                                                <div class="col-form-label col-md-8" id="agency_det"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="quarterly_period" class="col-form-label col-md-4 text-right">Quarterly Period : </label>
                                                <div class="col-form-label col-md-8" id="quarterly_period_det"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="tds_doc_upload" class="col-form-label col-md-5 text-right">TDS document : </label>
                                                <div class="col-form-label col-md-7" id="tds_doc_upload_det"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div> -->
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-row">

                                        <div class="col-md-4">
                                            <div class="form-group row">
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
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="filter_agency" class="col-form-label col-md-4 text-right">Agency : </label>
                                                <div class="col-md-8">
                                                    <select name="filter_agency" id="filter_agency" class="form-control" data-toggle="select2">
                                                        <option value="null">Select Agency Code</option>
                                                    </select>
                                                </div>
                                                <!-- <div class="col-md-2"><button type="submit" id="search" class="btn btn-outline-secondary waves-effect width-md btn-sm" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button></div> -->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="filter_quarterly_period" class="col-form-label col-md-4 text-right">Quarterly Period :</label>
                                                <div class="col-md-8">
                                                    <select name="filter_quarterly_period" id="filter_quarterly_period" class="form-control">
                                                        <option value="null">Select Quarterly Period</option>
                                                        <option value="January - March">January - March</option>
                                                        <option value="April - June">April - June</option>
                                                        <option value="July - September">July - September</option>
                                                        <option value="October - December">October - December</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-1">
                                            <div class="form-row">
                                                <label for="filter_status" class="col-form-label col-md-4 text-right">Status</label>
                                                <div class="col-md-8">
                                                    <select name="filter_status" id="filter_status" class="form-control">
                                                        <option value="null">Select Status</option>
                                                        <option value="1">Active</option>
                                                        <option value="2">In-Active</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-1">
                                            <center><button type="submit" id="search" class="btn btn-outline-secondary waves-effect btn-xs mr-2" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="reset" class="btn btn-outline-secondary waves-effect btn-xs" onclick="Reset_data()"><b><i class="mdi mdi-undo"></i>Reset</b></button></center>
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
                            <div class="col-md-4">
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_data"></span></h4>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4 text-right">
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
                                        <th>
                                            <center>Insurance Company</center>
                                        </th>
                                        <th>
                                            <center>Agency</center>
                                        </th>
                                        <th>Quarterly Period </th>
                                        <th>TDS document</th>
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
    function company_agency(option_agency_val) {
        var filter_company = $("#filter_company").val();
        var company = $("#company").val();

        if (filter_company != "null")
            company = filter_company;
        else if (company != "null")
            company = company;

        if (option_agency_val != undefined) {
            $('#agency').empty();
            var option_val = "";
            $.each(option_agency_val, function(key, val) {
                var magency_id = option_agency_val[key].magency_id;
                var code = option_agency_val[key].code;
                var name = option_agency_val[key].name;
                option_val += '<option value="' + magency_id + '">' + name + ' ( ' + code + ' ) </option>';
            });
            $('#agency').append("<option value='null'>Select Agency</option>" + option_val);
        } else {
            var url = "<?php echo $base_url; ?>master/policy/get_companybased_agency";

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
                            console.log(val);
                            $('#agency').html("<option value='null'>Select Agency</option>");
                            $('#filter_agency').html("<option value='null'>Select Agency</option>");

                            var option_val = "";
                            for (var i = 0; i < val.length; i++) {
                                var magency_id = val[i]["magency_id"];
                                var code = val[i]["code"];
                                var name = val[i]["name"];
                                option_val += '<option value="' + magency_id + '">' + name + ' ( ' + code + ' ) </option>';
                            }
                        } else {
                            $('#agency').html("<option value='null'>Select Agency</option>");
                            $('#filter_agency').html("<option value='null'>Select Agency</option>");
                        }
                        $('#agency').append(option_val);
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
    }

    function Filter_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter On');
        $('#filter_form_modal').modal('toggle');
        var filter_agency = $("#filter_agency").val();
        var filter_company = $("#filter_company").val();
        var filter_quarterly_period = $("#filter_quarterly_period").val();
        var filter_status = $("#filter_status").val();
        // alert(filter_date);
        if (filter_company == "null")
            filter_company = "";

        if (filter_agency == "null")
            filter_agency = "";

        if (filter_quarterly_period == "null")
            filter_quarterly_period = "";

        if (filter_status == "null")
            filter_status = "";

        var url = "<?php echo $base_url; ?>master/commission/filter_tds_cert";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_agency: filter_agency,
                    filter_company: filter_company,
                    filter_quarterly_period: filter_quarterly_period,
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
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var view_btn = "";
                        var status_btn = "";
                        var tds_certificate_id = "";
                        var company = "";
                        var agency = "";
                        var quarterly_period = "";
                        var policy_type = "";
                        var tds_doc_upload = "";
                        var document_list = "";
                        var claims_form = "";
                        var claims_procedure = "";
                        var comission_percentage = "";
                        var commission_tds_certificate_status = "";
                        var datas = "";
                        var status = "";
                        var total_commission_tds_certificate = data["total_commission_tds_certificate"];
                        $("#total_data").text("Count (" + total_commission_tds_certificate + ")");
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            tds_certificate_id = parseInt(data[key].tds_certificate_id);
                            company_id = data[key].fk_company_id;
                            company = data[key].company_name;
                            agency = data[key].agency;
                            quarterly_period = data[key].quarterly_period;
                            tds_doc_upload = data[key].tds_doc_upload;
                            agency_name = data[key].agency_name;
                            commission_tds_certificate_status = data[key].commission_tds_certificate_status;
                            var total_commission_tds_certificate = data[key].total_commission_tds_certificate;

                            var isActive = data[key].commission_tds_certificate_del_flag;
                            if (!isNaN(tds_certificate_id)) {
                                if (commission_tds_certificate_status == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light  btn-sm edit";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light  btn-sm edit";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }
                                // alert(tds_doc_upload);
                                if (tds_doc_upload == "" || tds_doc_upload == "null" || tds_doc_upload == null || tds_doc_upload == undefined) {
                                    var view_tds_doc_upload = "<span class='badge badge-warning pl-2'> Pending</span>";
                                    var download_tds_doc_upload = "";
                                    var delete_tds_doc_upload = "";
                                } else if (tds_doc_upload != "") {
                                    var view_tds_doc_upload = "<a href='<?php echo base_url(); ?>master/commission/view_doc/2/" + tds_certificate_id + "/" + tds_doc_upload + "' id='view_tds_doc_upload_" + tds_certificate_id + "' ><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                    var download_tds_doc_upload = "<a href='<?php echo base_url(); ?>master/commission/download_doc/2/" + tds_certificate_id + "/" + tds_doc_upload + "'  id='download_tds_doc_upload_" + tds_certificate_id + "'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                    var delete_tds_doc_upload = "<a onclick=OnDelete_Doc('" + tds_certificate_id + ',' + 2 + ',' + tds_doc_upload + ',' + '<?php echo base_url(); ?>master/commission/delete_doc' + "') href='javascript:void(0);'class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                                }

                                if (isActive == 1) {
                                    var del_status = "No";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + tds_certificate_id + ")'><b>Delete</b></a>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + tds_certificate_id + ")'><b>Recover</b></a>";
                                }

                                // edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm' id='edit_btn' value='' type='button' onClick ='onEdit(" + tds_certificate_id + ")' >Edit</button>";
                                // view_btn = "<a href='<?php echo base_url(); ?>master/commission/view/" + company_id + "' class='btn btn-info waves-effect width-md waves-light btn-sm view'  id='view'>View</a>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + tds_certificate_id + "' value='' type='button' onClick ='updateStatus(" + tds_certificate_id + "," + commission_bill_entry_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + tds_certificate_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + tds_certificate_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + tds_certificate_id + "' href='javascript:void(0);' id='status_btn_" + tds_certificate_id + "' onClick ='updateStatus(" + tds_certificate_id + "," + commission_tds_certificate_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td> <td><center>' + company + '</center></td><td><center>' + agency_name + '</center></td><td>' + quarterly_period + '</td><td>' + view_tds_doc_upload + '&nbsp;&nbsp;&nbsp;' + download_tds_doc_upload + '&nbsp;&nbsp;&nbsp;' + delete_tds_doc_upload + '</td></tr>';
                            }
                        });

                    } else {
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="5"><center>Data Not Found</center></td> </tr>';
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

        $("#filter_company").val("null");
        $("#filter_agency").val("null");
        $("#filter_quarterly_period").val("null");
        $("#filter_status").val("null");
        getCommission_TDS_Certificate_List();
    }
    $("#filter_btn").click(function() {
        $('#filter_form_modal').modal('toggle');
    });

    $("#AddForm").click(function() {
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
    });
    $('#company').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#agency').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#quarterly_period').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#tds_doc_upload').on('click', function() {
        document.getElementById("update").disabled = false;
    });


    function clearError() {
        $("#company").removeClass("parsley-error");
        $("#company_err").removeClass("text-danger").text("");

        $("#agency").removeClass("parsley-error");
        $("#agency_err").removeClass("text-danger").text("");

        $("#quarterly_period").removeClass("parsley-error");
        $("#quarterly_period_err").removeClass("text-danger").text("");

        $("#tds_doc_upload").removeClass("parsley-error");
        $("#tds_doc_upload_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#tds_certificate_id").text("");
        $("#company").val("null");
        $("#agency").val("null");
        $("#quarterly_period").val("null");
        $("#tds_doc_upload").val("");

        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function OnRecover(tds_certificate_id) {
        // var tds_certificate_id = $("#tds_certificate_id").text();
        var url = "<?php echo $base_url; ?>master/commission/recover_commission_tds_cert";
        confirmation_alert(id = tds_certificate_id, url = url, title = "TDS Certificate", type = "Recover");
    }

    function OnDelete(tds_certificate_id) {
        // var tds_certificate_id = $("#tds_certificate_id").text();
        var url = "<?php echo $base_url; ?>master/commission/remove_commission_tds_cert";
        confirmation_alert(id = tds_certificate_id, url = url, title = "TDS Certificate", type = "Delet");
    }

    function onEdit(val) {
        clearError();
        $("#tds_certificate_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();
        $('#form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/commission/edit_tds_cert";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    tds_certificate_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    // var myObj = JSON.parse(data);
                    console.log(data["userdata"]);
                    $("#tds_certificate_id").text(data["userdata"].tds_certificate_id);
                    tds_certificate_id = data["userdata"].tds_certificate_id;
                    var option_agency_val = data["userdata"].agency_data_arr;
                    company_agency(option_agency_val);
                    var company = data["userdata"].fk_company_id;
                    var agency = data["userdata"].fk_agency_id;
                    var quarterly_period = data["userdata"].quarterly_period;
                    $('select[id^="company"] option[value="' + company + '"]').attr("selected", "selected");
                    $("#agency").val(agency);
                    $("#quarterly_period").val(quarterly_period);
                    var tds_doc_upload = data["userdata"].tds_doc_upload;
                    if (tds_doc_upload == "" || tds_doc_upload == "null" || tds_doc_upload == null || tds_doc_upload == undefined) {
                        var view_tds_doc_upload = "<span class='badge badge-warning pl-2'> Pending</span>";
                        var download_tds_doc_upload = "";
                        var delete_tds_doc_upload = "";
                    } else if (tds_doc_upload != "") {
                        var view_tds_doc_upload = "<a href='<?php echo base_url(); ?>master/commission/view_doc/2/" + tds_certificate_id + "/" + tds_doc_upload + "' id='view_tds_doc_upload_" + tds_certificate_id + "'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        var download_tds_doc_upload = "<a href='<?php echo base_url(); ?>master/commission/download_doc/2/" + tds_certificate_id + "/" + tds_doc_upload + "'  id='download_tds_doc_upload_" + tds_certificate_id + "'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        var delete_tds_doc_upload = "<a onclick=OnDelete_Doc('" + tds_certificate_id + ',' + 2 + ',' + tds_doc_upload + ',' + '<?php echo base_url(); ?>master/commission/delete_doc' + "') href='javascript:void(0);'class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                    }
                    $("#tds_doc_upload_file_det").html(view_tds_doc_upload + ' ' + download_tds_doc_upload + ' ' + delete_tds_doc_upload);

                    var isActive = data["userdata"].commission_tds_certificate_del_flag;

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

    function onView(val) {
        // clearError();
        $('#view_form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/commission/edit_tds_cert";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    tds_certificate_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    $("#tds_certificate_id").text(data["userdata"].tds_certificate_id);
                    tds_certificate_id = data["userdata"].tds_certificate_id;
                    var option_agency_val = data["userdata"].agency_data_arr;
                    company_agency(option_agency_val);
                    var company = data["userdata"].company_name;
                    var agency = data["userdata"].agency_name;
                    var quarterly_period = data["userdata"].quarterly_period;
                    var tds_doc_upload = data["userdata"].tds_doc_upload;
                    $('#company_det').text(company);
                    $("#agency_det").text(agency);
                    $("#quarterly_period_det").text(quarterly_period);

                    if (tds_doc_upload == "" || tds_doc_upload == "null" || tds_doc_upload == null || tds_doc_upload == undefined) {
                        var view_tds_doc_upload = "<span class='badge badge-warning pl-2'> Pending</span>";
                        var download_tds_doc_upload = "";
                        var delete_tds_doc_upload = "";
                    } else if (tds_doc_upload != "") {
                        var view_tds_doc_upload = "<a href='<?php echo base_url(); ?>master/commission/view_doc/2/" + tds_certificate_id + "/" + tds_doc_upload + "' id='view_tds_doc_upload_" + tds_certificate_id + "'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        var download_tds_doc_upload = "<a href='<?php echo base_url(); ?>master/commission/download_doc/2/" + tds_certificate_id + "/" + tds_doc_upload + "'  id='download_tds_doc_upload_" + tds_certificate_id + "'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        var delete_tds_doc_upload = "<a onclick=OnDelete_Doc('" + tds_certificate_id + ',' + 2 + ',' + tds_doc_upload + ',' + '<?php echo base_url(); ?>master/commission/delete_doc' + "') href='javascript:void(0);'class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                    }
                    $("#tds_doc_upload_det").html(view_tds_doc_upload + '&nbsp;&nbsp;&nbsp;' + download_tds_doc_upload + '&nbsp;&nbsp;&nbsp;' + delete_tds_doc_upload);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function onUpdate() {
        var tds_certificate_id = $("#tds_certificate_id").text();

        var company = $("#company").val();
        var company_name_txt = $("#company option:selected").text();
        var agency = $("#agency").val();
        var quarterly_period = $("#quarterly_period").val();
        var tds_doc_upload = $('#tds_doc_upload').prop('files')[0];
        if (company == "null")
            company = "";

        if (agency == "null")
            agency = "";

        if (quarterly_period == "null")
            quarterly_period = "";
        if (company == "null")
            company = "";

        if (tds_doc_upload == "undefined" || tds_doc_upload == undefined || tds_doc_upload == "" || tds_doc_upload == "null") {
            tds_doc_upload = "";
        }

        // alert(tds_doc_upload);

        var form_data = new FormData();
        form_data.append('tds_certificate_id', tds_certificate_id);
        form_data.append('company', company);
        form_data.append('company_name_txt', company_name_txt);
        form_data.append('agency', agency);
        form_data.append('quarterly_period', quarterly_period);
        form_data.append('tds_doc_upload', tds_doc_upload);

        var url = "<?php echo $base_url; ?>master/commission/update_tds_cert";

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
                    $("#agency").val("null");
                    $("#quarterly_period").val("null");
                    $("#tds_doc_upload").val("");

                    $("#company").removeClass("parsley-error");
                    $("#agency").removeClass("parsley-error");
                    $("#quarterly_period").removeClass("parsley-error");
                    $("#tds_doc_upload").removeClass("parsley-error");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["messages"] != "") {
                        if (data["messages"]["tds_doc_upload_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["tds_doc_upload_err"], message_icone = "error");

                        if (data["messages"]["tds_doc_upload_err"] != "")
                            $("#tds_doc_upload").addClass("parsley-error");
                        else
                            $("#tds_doc_upload").removeClass("parsley-error");
                        $("#tds_doc_upload_err").addClass("text-danger").html(data["messages"]["tds_doc_upload_err"]);

                    } else {
                        if (data["message"]["company_err"] != "")
                            $("#company").addClass("parsley-error");
                        else
                            $("#company").removeClass("parsley-error");
                        $("#company_err").addClass("text-danger").html(data["message"]["company_err"]);

                        if (data["message"]["agency_err"] != "")
                            $("#agency").addClass("parsley-error");
                        else
                            $("#agency").removeClass("parsley-error");
                        $("#agency_err").addClass("text-danger").html(data["message"]["agency_err"]);

                        if (data["message"]["quarterly_period_err"] != "")
                            $("#quarterly_period").addClass("parsley-error");
                        else
                            $("#quarterly_period").removeClass("parsley-error");
                        $("#quarterly_period_err").addClass("text-danger").html(data["message"]["quarterly_period_err"]);

                        if (data["message"]["tds_doc_upload_err"] != "")
                            $("#tds_doc_upload").addClass("parsley-error");
                        else
                            $("#tds_doc_upload").removeClass("parsley-error");
                        $("#tds_doc_upload_err").addClass("text-danger").html(data["message"]["tds_doc_upload_err"]);

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
        var agency = $("#agency").val();
        var quarterly_period = $("#quarterly_period").val();
        var company_name_txt = $("#company option:selected").text();
        var tds_doc_upload = $('#tds_doc_upload').prop('files')[0];

        if (tds_doc_upload == "undefined" || tds_doc_upload == undefined || tds_doc_upload == "" || tds_doc_upload == "null") {
            tds_doc_upload = "";
        }

        if (company == "null")
            company = "";

        if (agency == "null")
            agency = "";

        if (quarterly_period == "null")
            quarterly_period = "";

        var form_data = new FormData();
        form_data.append('company', company);
        form_data.append('company_name_txt', company_name_txt);
        form_data.append('agency', agency);
        form_data.append('quarterly_period', quarterly_period);
        form_data.append('tds_doc_upload', tds_doc_upload);


        var url = "<?php echo $base_url; ?>master/commission/add_tds_cert";

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
                    $("#agency").val("null");
                    $("#quarterly_period").val("null");
                    $("#tds_doc_upload").val("");

                    $("#company").removeClass("parsley-error");
                    $("#agency").removeClass("parsley-error");
                    $("#quarterly_period").removeClass("parsley-error");
                    $("#tds_doc_upload").removeClass("parsley-error");

                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["messages"] != "") {
                        if (data["messages"]["tds_doc_upload_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["tds_doc_upload_err"], message_icone = "error");

                        if (data["messages"]["tds_doc_upload_err"] != "")
                            $("#tds_doc_upload").addClass("parsley-error");
                        else
                            $("#tds_doc_upload").removeClass("parsley-error");
                        $("#tds_doc_upload_err").addClass("text-danger").html(data["messages"]["tds_doc_upload_err"]);

                    } else {
                        if (data["message"]["company_err"] != "")
                            $("#company").addClass("parsley-error");
                        else
                            $("#company").removeClass("parsley-error");
                        $("#company_err").addClass("text-danger").html(data["message"]["company_err"]);

                        if (data["message"]["agency_err"] != "")
                            $("#agency").addClass("parsley-error");
                        else
                            $("#agency").removeClass("parsley-error");
                        $("#agency_err").addClass("text-danger").html(data["message"]["agency_err"]);

                        if (data["message"]["quarterly_period_err"] != "")
                            $("#quarterly_period").addClass("parsley-error");
                        else
                            $("#quarterly_period").removeClass("parsley-error");
                        $("#quarterly_period_err").addClass("text-danger").html(data["message"]["quarterly_period_err"]);

                        if (data["message"]["tds_doc_upload_err"] != "")
                            $("#tds_doc_upload").addClass("parsley-error");
                        else
                            $("#tds_doc_upload").removeClass("parsley-error");
                        $("#tds_doc_upload_err").addClass("text-danger").html(data["message"]["tds_doc_upload_err"]);

                    }
                }

            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    });

    getCommission_TDS_Certificate_List();

    function OnDelete_Doc(staff_doc_details) {
        var staff_doc_details = staff_doc_details.split(",");
        var staff_id = staff_doc_details[0];
        var doc_type = staff_doc_details[1];
        var doc_name = staff_doc_details[2];
        var url = staff_doc_details[3];
        if (doc_type == 1)
            var title = "Profile Photo";
        else if (doc_type == 2)
            var title = "TDS Certificate";
        else if (doc_type == 3)
            var title = "Aadhar Card Document";
        document_confirmation_alert(id = staff_id, doc_type = doc_type, doc_name = doc_name, url = url, title = title, type = "Delet");
    }

    function getCommission_TDS_Certificate_List() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/commission/get_tds_cert_list";
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
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var view_btn = "";
                        var status_btn = "";
                        var tds_certificate_id = "";
                        var company = "";
                        var agency = "";
                        var quarterly_period = "";
                        var policy_type = "";
                        var tds_doc_upload = "";
                        var document_list = "";
                        var claims_form = "";
                        var claims_procedure = "";
                        var comission_percentage = "";
                        var commission_tds_certificate_status = "";
                        var datas = "";
                        var status = "";
                        var total_commission_tds_certificate = data["total_commission_tds_certificate"];
                        $("#total_data").text("Count (" + total_commission_tds_certificate + ")");
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            tds_certificate_id = parseInt(data[key].tds_certificate_id);
                            company_id = data[key].fk_company_id;
                            company = data[key].company_name;
                            agency = data[key].agency;
                            quarterly_period = data[key].quarterly_period;
                            tds_doc_upload = data[key].tds_doc_upload;
                            agency_name = data[key].agency_name;
                            commission_tds_certificate_status = data[key].commission_tds_certificate_status;
                            var total_commission_tds_certificate = data[key].total_commission_tds_certificate;

                            var isActive = data[key].commission_tds_certificate_del_flag;
                            if (!isNaN(tds_certificate_id)) {
                                if (commission_tds_certificate_status == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light  btn-sm edit";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light  btn-sm edit";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }
                                // alert(tds_doc_upload);
                                if (tds_doc_upload == "" || tds_doc_upload == "null" || tds_doc_upload == null || tds_doc_upload == undefined) {
                                    var view_tds_doc_upload = "<span class='badge badge-warning pl-2'> Pending</span>";
                                    var download_tds_doc_upload = "";
                                    var delete_tds_doc_upload = "";
                                } else if (tds_doc_upload != "") {
                                    var view_tds_doc_upload = "<a href='<?php echo base_url(); ?>master/commission/view_doc/2/" + tds_certificate_id + "/" + tds_doc_upload + "' id='view_tds_doc_upload_" + tds_certificate_id + "' target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                    var download_tds_doc_upload = "<a href='<?php echo base_url(); ?>master/commission/download_doc/2/" + tds_certificate_id + "/" + tds_doc_upload + "'  id='download_tds_doc_upload_" + tds_certificate_id + "'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                    var delete_tds_doc_upload = "<a onclick=OnDelete_Doc('" + tds_certificate_id + ',' + 2 + ',' + tds_doc_upload + ',' + '<?php echo base_url(); ?>master/commission/delete_doc' + "') href='javascript:void(0);'class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                                }

                                if (isActive == 1) {
                                    var del_status = "No";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + tds_certificate_id + ")'><b>Delete</b></a>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + tds_certificate_id + ")'><b>Recover</b></a>";
                                }

                                // edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm' id='edit_btn' value='' type='button' onClick ='onEdit(" + tds_certificate_id + ")' >Edit</button>";
                                // view_btn = "<a href='<?php echo base_url(); ?>master/plans_policy/view/" + company_id + "' class='btn btn-info waves-effect width-md waves-light btn-sm view'  id='view'>View</a>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + tds_certificate_id + "' value='' type='button' onClick ='updateStatus(" + tds_certificate_id + "," + commission_bill_entry_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + tds_certificate_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + tds_certificate_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + tds_certificate_id + "' href='javascript:void(0);' id='status_btn_" + tds_certificate_id + "' onClick ='updateStatus(" + tds_certificate_id + "," + commission_tds_certificate_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td> <td>' + sn + '</td><td><center>' + company + '</center></td><td><center>' + agency_name + '</center></td><td>' + quarterly_period + '</td><td>' + view_tds_doc_upload + '&nbsp;&nbsp;&nbsp;' + download_tds_doc_upload + '&nbsp;&nbsp;&nbsp;' + delete_tds_doc_upload + '</td></tr>';
                            }
                        });

                    } else {
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="5"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function updateStatus(tds_certificate_id, commission_bill_entry_status) {

        var url = "<?php echo $base_url; ?>master/commission/update_commission_tds_cert_status";

        if (tds_certificate_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": tds_certificate_id,
                    "status": commission_bill_entry_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + tds_certificate_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["commission_bill_entry_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                            $("#edit_" + tds_certificate_id).addClass(status_btn_txt);
                            $("#status_btn_" + tds_certificate_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                            $("#edit_" + tds_certificate_id).addClass(status_btn_txt);
                            $("#status_btn_" + tds_certificate_id).text(status);
                        }

                        $("#status_btn_" + tds_certificate_id).text(status);


                        $('#status_btn_' + tds_certificate_id).attr('onClick', 'updateStatus(' + tds_certificate_id + ',' + data["userdata"]["commission_bill_entry_status"] + ')');

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