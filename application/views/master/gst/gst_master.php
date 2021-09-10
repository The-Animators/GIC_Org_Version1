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
                        <h4 class="page-title"><?php echo $title; ?> Master</h4>
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
                            <h4 class="modal-title"><?php echo $title; ?> Master Details</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label for="cgst" class="col-form-label col-md-4 text-right">CGST % <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="cgst" id="cgst" value="" placeholder="Enter CGST" class="form-control">
                                                    <span id="cgst_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label for="sgst" class="col-form-label col-md-4 text-right">SGST % <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="sgst" id="sgst" value="" placeholder="Enter SGST" class="form-control">
                                                    <span id="sgst_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label for="ugst" class="col-form-label col-md-4 text-right">UGST % <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="ugst" id="ugst" value="" placeholder="Enter UGST" class="form-control">
                                                    <span id="ugst_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label for="igst" class="col-form-label col-md-4 text-right">IGST % <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="igst" id="igst" value="" placeholder="Enter IGST" class="form-control">
                                                    <span id="igst_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label for="gst_fromdate" class="col-form-label col-md-4 text-right">From Date <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="gst_fromdate" id="gst_fromdate" value="" placeholder="Enter From Date" class="form-control">
                                                    <span id="gst_fromdate_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label for="gst_todate" class="col-form-label col-md-4 text-right">To Date <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="gst_todate" id="gst_todate" value="" placeholder="Enter To Date" class="form-control">
                                                    <span id="gst_todate_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="gst_id" hidden>1</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <center>
                                                <button id="update" onclick='onUpdate()' style="display: none;" class="btn btn-primary btn-sm">Update <?php echo $title; ?></button>
                                                <button id="submit" class="btn btn-primary btn-sm">Save <?php echo $title; ?></button>
                                                <button id="delete" onclick='OnDelete()' style="display: none;" class="btn btn-primary btn-sm">Delete <?php echo $title; ?></button>
                                                <button id="recover" onclick='OnRecover()' style="display: none;" class="btn btn-primary btn-sm">Recover <?php echo $title; ?></button>
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
                            <h4 class="modal-title">View <?php echo $title; ?> Master Details</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row">
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">CGST % :</td>
                                                <td><strong><span id="cgst_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">SGST % :</td>
                                                <td><strong><span id="sgst_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">UGST % :</td>
                                                <td><strong><span id="ugst_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">IGST % :</td>
                                                <td><strong><span id="igst_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">From Date :</td>
                                                <td><strong><span id="gst_fromdate_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">To Date :</td>
                                                <td><strong><span id="gst_todate_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <!-- <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label for="cgst" class="col-form-label col-md-4 text-right"><strong>CGST % : </strong></label>
                                                <div class="col-md-8 col-form-label" id="cgst_det"> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label for="sgst" class="col-form-label col-md-4 text-right"><strong>SGST % : </strong></label>
                                                <div class="col-md-8 col-form-label" id="sgst_det"> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label for="ugst" class="col-form-label col-md-4 text-right"><strong>UGST % : </strong></label>
                                                <div class="col-md-8 col-form-label" id="ugst_det"> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label for="igst" class="col-form-label col-md-4 text-right"><strong>IGST % : </strong></label>
                                                <div class="col-md-8 col-form-label" id="igst_det"> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label for="gst_fromdate" class="col-form-label col-md-4 text-right"><strong>From Date :</strong></label>
                                                <div class="col-md-8 col-form-label" id="gst_fromdate_det"> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label for="gst_todate" class="col-form-label col-md-4 text-right"><strong>To Date : </strong></label>
                                                <div class="col-md-8 col-form-label" id="gst_todate_det"> </div>
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
                            <div class="row ">
                                <div class="col-md-2">
                                    <div class="form-row">
                                        <label for="filter_cgst" class="col-form-label col-md-4 text-right">CGST %</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="filter_cgst" name="filter_cgst" placeholder="Enter CGST %">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-row">
                                        <label for="filter_sgst" class="col-form-label col-md-4 text-right">SGST %</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="filter_sgst" name="filter_sgst" placeholder="Enter SGST %">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-row">
                                        <label for="filter_igst" class="col-form-label col-md-4 text-right">IGST %</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="filter_igst" name="filter_igst" placeholder="Enter IGST %">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-row">
                                        <label for="filter_ugst" class="col-form-label col-md-4 text-right">UGST %</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="filter_ugst" name="filter_ugst" placeholder="Enter UGST %">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-1">
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
                                <div class="col-md-2">
                                    <div class="form-row">
                                        <label for="filter_from_date" class="col-form-label col-md-4 text-right">From Date</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="filter_from_date" name="filter_from_date" placeholder="Enter From Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-row">
                                        <label for="filter_to_date" class="col-form-label col-md-4 text-right">To Date</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="filter_to_date" name="filter_to_date" placeholder="Enter To Date">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mt-1 ml-1">
                                    <div class="form-row">
                                        <center><button type="submit" id="search" class="btn btn-outline-secondary waves-effect btn-xs mr-4" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="reset" class="btn btn-outline-secondary waves-effect btn-xs" onclick="Reset_data()"><b><i class="mdi mdi-undo"></i>Reset</b></button></center>
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
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_gst_data"></span></h4>
                            </div>
                            <!-- <div class="col-md-4">

                            </div> -->
                            <div class="col-md-6 text-right">
                                <!-- <input class='btn btn-facebook btn-sm' id='AddForm' value='Add <?php echo $title; ?>' type='button' /> -->
                                <button class='btn btn-facebook btn-xs' id='AddForm' title='Add' type='button'> <i class="fa fa-plus" aria-hidden="true"></i></button>
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
                                        <th>CGST</th>
                                        <th>SGST</th>
                                        <th>UGST</th>
                                        <th>IGST</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
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
    $("#filter_btn").click(function() {
        $('#filter_form_modal').modal('toggle');
    });
    $(function() {
        $("#gst_fromdate,#filter_from_date").datepicker({
            'format': 'yyyy-mm-dd',
            'autoclose': true,
            'todayHighlight': true
        });
        $("#gst_todate,#filter_to_date").datepicker({
            'format': 'yyyy-mm-dd',
            'autoclose': true,
            'todayHighlight': true
        });
    });
    $("#AddForm").click(function() {
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
        $("#gst_todate").datepicker();
        $("#gst_todate").datepicker("setDate", "2050-01-01");
    });
    $('#cgst').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#sgst').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#ugst').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#igst').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#gst_fromdate').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#gst_todate').on('change', function() {
        document.getElementById("update").disabled = false;
    });

    function clearError() {
        $("#cgst").removeClass("parsley-error");
        $("#cgst_err").removeClass("text-danger").text("");

        $("#sgst").removeClass("parsley-error");
        $("#sgst_err").removeClass("text-danger").text("");

        $("#ugst").removeClass("parsley-error");
        $("#ugst_err").removeClass("text-danger").text("");

        $("#igst").removeClass("parsley-error");
        $("#igst_err").removeClass("text-danger").text("");

        $("#gst_fromdate").removeClass("parsley-error");
        $("#gst_fromdate_err").removeClass("text-danger").text("");

        $("#gst_todate").removeClass("parsley-error");
        $("#gst_todate_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#gst_id").text("");
        $("#cgst").val("");
        $("#sgst").val("");
        $("#ugst").val("");
        $("#igst").val("");
        $("#gst_fromdate").val("");
        $("#gst_todate").val("");
        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function OnRecover(gst_id) {
        var url = "<?php echo $base_url; ?>master/gst_master/recover_gst";
        confirmation_alert(id = gst_id, url = url, title = "GST Master", type = "Recover");
    }

    function OnDelete(gst_id) {
        var url = "<?php echo $base_url; ?>master/gst_master/remove_gst";
        confirmation_alert(id = gst_id, url = url, title = "GST Master", type = "Delet");
    }


    function onView(val) {
        clearError();
        $('#view_form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/gst_master/edit_gst";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    gst_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},

                success: function(data) {
                    $("#cgst_det").text(data["userdata"].cgst);
                    $("#sgst_det").text(data["userdata"].sgst);
                    $("#ugst_det").text(data["userdata"].ugst);
                    $("#igst_det").text(data["userdata"].igst);
                    var gst_fromdate_det = data["userdata"].gst_fromdate;
                    var gst_fromdate_det = gst_fromdate_det.split("-");
                    f_year = gst_fromdate_det[0];
                    f_month = gst_fromdate_det[1];
                    f_day = gst_fromdate_det[2];

                    var gst_todate_det = data["userdata"].gst_todate;
                    var gst_todate_det = gst_todate_det.split("-");
                    t_year = gst_todate_det[0];
                    t_month = gst_todate_det[1];
                    t_day = gst_todate_det[2];
                    // alert(year);
                    $("#gst_fromdate_det").text(t_day + "-" + t_month + "-" + t_year);
                    $("#gst_todate_det").text(f_day + "-" + f_month + "-" + f_year);

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function onEdit(val) {
        clearError();
        $("#gst_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();
        $('#form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/gst_master/edit_gst";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    gst_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    // var myObj = JSON.parse(data);
                    $("#gst_id").text(data["userdata"].gst_id);
                    $("#cgst").val(data["userdata"].cgst);
                    $("#sgst").val(data["userdata"].sgst);
                    $("#ugst").val(data["userdata"].ugst);
                    $("#igst").val(data["userdata"].igst);
                    $("#gst_fromdate").val(data["userdata"].gst_fromdate);
                    $("#gst_todate").val(data["userdata"].gst_todate);

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
                    document.getElementById("update").disabled = true;

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function onUpdate() {
        var gst_id = $("#gst_id").text();
        var cgst = $("#cgst").val();
        var sgst = $("#sgst").val();
        var ugst = $("#ugst").val();
        var igst = $("#igst").val();
        var gst_fromdate = $("#gst_fromdate").val();
        var gst_todate = $("#gst_todate").val();

        var form_data = new FormData();
        form_data.append('gst_id', gst_id);
        form_data.append('cgst', cgst);
        form_data.append('sgst', sgst);
        form_data.append('ugst', ugst);
        form_data.append('igst', igst);
        form_data.append('gst_fromdate', gst_fromdate);
        form_data.append('gst_todate', gst_todate);

        var url = "<?php echo $base_url; ?>master/gst_master/update_gst";

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
                    $("#cgst").val("");
                    $("#cgst").removeClass("parsley-error");
                    $("#cgst_err").removeClass("text-danger");

                    $("#sgst").val("");
                    $("#sgst").removeClass("parsley-error");
                    $("#sgst_err").removeClass("text-danger");

                    $("#ugst").val("");
                    $("#ugst").removeClass("parsley-error");
                    $("#ugst_err").removeClass("text-danger");

                    $("#igst").val("");
                    $("#igst").removeClass("parsley-error");
                    $("#igst_err").removeClass("text-danger");

                    $("#gst_fromdate").val("");
                    $("#gst_fromdate").removeClass("parsley-error");
                    $("#gst_fromdate_err").removeClass("text-danger");

                    $("#gst_todate").val("");
                    $("#gst_todate").removeClass("parsley-error");
                    $("#gst_todate_err").removeClass("text-danger");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["message"]["cgst_err"] != "")
                        $("#cgst").addClass("parsley-error");
                    else
                        $("#cgst").removeClass("parsley-error");
                    $("#cgst_err").addClass("text-danger").html(data["message"]["cgst_err"]);

                    if (data["message"]["sgst_err"] != "")
                        $("#sgst").addClass("parsley-error");
                    else
                        $("#sgst").removeClass("parsley-error");
                    $("#sgst_err").addClass("text-danger").html(data["message"]["sgst_err"]);

                    if (data["message"]["ugst_err"] != "")
                        $("#ugst").addClass("parsley-error");
                    else
                        $("#ugst").removeClass("parsley-error");
                    $("#ugst_err").addClass("text-danger").html(data["message"]["ugst_err"]);

                    if (data["message"]["igst_err"] != "")
                        $("#igst").addClass("parsley-error");
                    else
                        $("#igst").removeClass("parsley-error");
                    $("#igst_err").addClass("text-danger").html(data["message"]["igst_err"]);

                    if (data["message"]["gst_fromdate_err"] != "")
                        $("#gst_fromdate").addClass("parsley-error");
                    else
                        $("#gst_fromdate").removeClass("parsley-error");
                    $("#gst_fromdate_err").addClass("text-danger").html(data["message"]["gst_fromdate_err"]);

                    if (data["message"]["gst_todate_err"] != "")
                        $("#gst_todate").addClass("parsley-error");
                    else
                        $("#gst_todate").removeClass("parsley-error");
                    $("#gst_todate_err").addClass("text-danger").html(data["message"]["gst_todate_err"]);
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    $("#submit").click(function() {
        var cgst = $("#cgst").val();
        var sgst = $("#sgst").val();
        var ugst = $("#ugst").val();
        var igst = $("#igst").val();
        var gst_fromdate = $("#gst_fromdate").val();
        var gst_todate = $("#gst_todate").val();

        var form_data = new FormData();
        form_data.append('cgst', cgst);
        form_data.append('sgst', sgst);
        form_data.append('ugst', ugst);
        form_data.append('igst', igst);
        form_data.append('gst_fromdate', gst_fromdate);
        form_data.append('gst_todate', gst_todate);

        var url = "<?php echo $base_url; ?>master/gst_master/add_gst";

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
                    $("#cgst").val("");
                    $("#cgst").removeClass("parsley-error");
                    $("#cgst_err").removeClass("text-danger");

                    $("#sgst").val("");
                    $("#sgst").removeClass("parsley-error");
                    $("#sgst_err").removeClass("text-danger");

                    $("#ugst").val("");
                    $("#ugst").removeClass("parsley-error");
                    $("#ugst_err").removeClass("text-danger");

                    $("#igst").val("");
                    $("#igst").removeClass("parsley-error");
                    $("#igst_err").removeClass("text-danger");

                    $("#gst_fromdate").val("");
                    $("#gst_fromdate").removeClass("parsley-error");
                    $("#gst_fromdate_err").removeClass("text-danger");

                    $("#gst_todate").val("");
                    $("#gst_todate").removeClass("parsley-error");
                    $("#gst_todate_err").removeClass("text-danger");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["message"]["cgst_err"] != "")
                        $("#cgst").addClass("parsley-error");
                    else
                        $("#cgst").removeClass("parsley-error");
                    $("#cgst_err").addClass("text-danger").html(data["message"]["cgst_err"]);

                    if (data["message"]["sgst_err"] != "")
                        $("#sgst").addClass("parsley-error");
                    else
                        $("#sgst").removeClass("parsley-error");
                    $("#sgst_err").addClass("text-danger").html(data["message"]["sgst_err"]);

                    if (data["message"]["ugst_err"] != "")
                        $("#ugst").addClass("parsley-error");
                    else
                        $("#ugst").removeClass("parsley-error");
                    $("#ugst_err").addClass("text-danger").html(data["message"]["ugst_err"]);

                    if (data["message"]["igst_err"] != "")
                        $("#igst").addClass("parsley-error");
                    else
                        $("#igst").removeClass("parsley-error");
                    $("#igst_err").addClass("text-danger").html(data["message"]["igst_err"]);

                    if (data["message"]["gst_fromdate_err"] != "")
                        $("#gst_fromdate").addClass("parsley-error");
                    else
                        $("#gst_fromdate").removeClass("parsley-error");
                    $("#gst_fromdate_err").addClass("text-danger").html(data["message"]["gst_fromdate_err"]);

                    if (data["message"]["gst_todate_err"] != "")
                        $("#gst_todate").addClass("parsley-error");
                    else
                        $("#gst_todate").removeClass("parsley-error");
                    $("#gst_todate_err").addClass("text-danger").html(data["message"]["gst_todate_err"]);
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    });

    function Filter_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-secondary waves-effect btn-xs mr-4").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-danger waves-effect btn-xs mr-4").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter On');
        $('#filter_form_modal').modal('toggle');

        var filter_cgst = $("#filter_cgst").val();
        var filter_sgst = $("#filter_sgst").val();
        var filter_igst = $("#filter_igst").val();
        var filter_ugst = $("#filter_ugst").val();
        var filter_from_date = $("#filter_from_date").val();
        var filter_to_date = $("#filter_to_date").val();
        var filter_status = $("#filter_status").val();

        if (filter_status == "null")
            filter_status = "";
        var url = "<?php echo $base_url; ?>master/gst_master/filter_gst_list";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_cgst: filter_cgst,
                    filter_sgst: filter_sgst,
                    filter_igst: filter_igst,
                    filter_ugst: filter_ugst,
                    filter_from_date: filter_from_date,
                    filter_to_date: filter_to_date,
                    filter_status: filter_status,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var total_gst_data = 0;
                    $("#total_gst_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var gst_id = "";
                        var cgst = "";
                        var gst_status = "";
                        var datas = "";
                        var status = "";
                        total_gst_data = data["total_gst_data"];
                        $("#total_gst_data").text(" Count ( " + total_gst_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            gst_id = parseInt(data[key].gst_id);
                            cgst = data[key].cgst;
                            sgst = data[key].sgst;
                            ugst = data[key].ugst;
                            igst = data[key].igst;
                            gst_fromdate = data[key].gst_fromdate;
                            gst_todate = data[key].gst_todate;
                            gst_status = data[key].gst_status;
                            var isActive = data[key].del_flag;
                            if (!isNaN(gst_id)) {
                                if (gst_status == 1) {
                                    status = 'Active';
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light btn-sm edit";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = 'In-Active';
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light btn-sm edit";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }

                                if (isActive == 1) {
                                    var del_status = "No";
                                    var delete_btn_txt = "<a class='dropdown-item recover' href='javascript:void(0);' id='recover' onClick ='OnDelete(" + gst_id + ")'><b>Delete</b></a>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item recover' href='javascript:void(0);' id='recover' onClick ='OnRecover(" + gst_id + ")'><b>Recover</b></a>";
                                }

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + gst_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + gst_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + gst_id + "' href='javascript:void(0);' id='status_btn_" + gst_id + "' onClick ='update_gst_status(" + gst_id + "," + gst_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr><td>' + action_btn + '<br/>' + badge_status + '</td>  <td>' + sn + '</td><td>' + cgst + '</td><td>' + sgst + '</td><td>' + ugst + '</td><td>' + igst + '</td><td>' + gst_fromdate + '</td><td>' + gst_todate + '</td></tr>';
                            }
                        });

                    } else {
                        $("#total_gst_data").text(" Count ( " + total_gst_data + " ) ");
                        datas = '<tr><td colspan="7"><center>Data Not Found</center></td> </tr>';
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
        $("#search,#filter_btn").removeClass("btn btn-outline-danger waves-effect btn-xs mr-4").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-secondary waves-effect btn-xs mr-4").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter Off');
        $('#filter_form_modal').modal('toggle');

        $("#filter_cgst").val("");
        $("#filter_sgst").val("");
        $("#filter_igst").val("");
        $("#filter_ugst").val("");
        $("#filter_from_date").val("");
        $("#filter_to_date").val("");
        $("#filter_status").val("null");
        get_gst_list();
    }
    get_gst_list();

    function get_gst_list() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/gst_master/get_gst_list";
        if (url != "") {
            $.ajax({
                url: url,
                data: {},
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var total_gst_data = 0;
                    $("#total_gst_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var gst_id = "";
                        var cgst = "";
                        var gst_status = "";
                        var datas = "";
                        var status = "";
                        total_gst_data = data["total_gst_data"];
                        $("#total_gst_data").text(" Count ( " + total_gst_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            gst_id = parseInt(data[key].gst_id);
                            cgst = data[key].cgst;
                            sgst = data[key].sgst;
                            ugst = data[key].ugst;
                            igst = data[key].igst;
                            gst_fromdate = data[key].gst_fromdate;
                            gst_todate = data[key].gst_todate;
                            gst_status = data[key].gst_status;
                            var isActive = data[key].del_flag;

                            // var gst_fromdate_det = data[key].gst_fromdate.split("-");
                            // f_year = gst_fromdate_det[0];
                            // f_month = gst_fromdate_det[1];
                            // f_day = gst_fromdate_det[2];

                            // gst_fromdate = f_day + "-" + f_month + "-" + f_year;

                            // var gst_todate_det = data[key].gst_todate.split("-");
                            // t_year = gst_todate_det[0];
                            // t_month = gst_todate_det[1];
                            // t_day = gst_todate_det[2];

                            // gst_todate_det = t_day + "-" + t_month + "-" + t_year;

                            if (!isNaN(gst_id)) {
                                if (gst_status == 1) {
                                    status = 'Active';
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light btn-sm edit";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = 'In-Active';
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light btn-sm edit";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }

                                if (isActive == 1) {
                                    var del_status = "No";
                                    var delete_btn_txt = "<a class='dropdown-item recover' href='javascript:void(0);' id='recover' onClick ='OnDelete(" + gst_id + ")'><b>Delete</b></a>";
                                    // var delete_btn_txt = "<button class='btn btn-facebook btn-sm mt-1 ml-1 delete' value='' type='button' onClick ='OnDelete(" + gst_id + ")' ><i class='fa fa-trash' aria-hidden='true'></i></button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item recover' href='javascript:void(0);' id='recover' onClick ='OnRecover(" + gst_id + ")'><b>Recover</b></a>";
                                    // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + gst_id + ")' class='btn btn btn-facebook btn-sm mt-1 ml-1 delete'><i class='fa fa-undo' aria-hidden='true'></i></button>";
                                }
                                // var view_btn = "<button class='btn btn-facebook btn-sm mt-1 ml-1 view' id='view' value='' type='button' onClick ='onView(" + gst_id + ")' ><i class='fas fa-eye'></i></button>";
                                // edit_btn = "<button class='btn btn-facebook btn-sm mt-1 ml-1 edit' id='edit' value='' type='button' onClick ='onEdit(" + gst_id + ")' ><i class='fas fa-pencil-alt'></i></button>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + gst_id + "' value='' type='button' onClick ='update_gst_status(" + gst_id + "," + gst_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + gst_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + gst_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + gst_id + "' href='javascript:void(0);' id='status_btn_" + gst_id + "' onClick ='update_gst_status(" + gst_id + "," + gst_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr><td>' + action_btn + '<br/>' + badge_status + '</td>  <td>' + sn + '</td><td>' + cgst + '</td><td>' + sgst + '</td><td>' + ugst + '</td><td>' + igst + '</td><td>' + gst_fromdate + '</td><td>' + gst_todate + '</td></tr>';
                            }
                        });

                    } else {
                        $("#total_gst_data").text(" Count ( " + total_gst_data + " ) ");
                        datas = '<tr><td colspan="7"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function update_gst_status(gst_id, gst_status) {

        var url = "<?php echo $base_url; ?>master/gst_master/update_gst_status";

        if (gst_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": gst_id,
                    "status": gst_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + gst_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["gst_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                            $("#edit_" + gst_id).addClass(status_btn_txt);
                            $("#status_btn_" + gst_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                            $("#edit_" + gst_id).addClass(status_btn_txt);
                            $("#status_btn_" + gst_id).text(status);
                        }

                        $("#status_btn_" + gst_id).text(status);


                        $('#status_btn_' + gst_id).attr('onClick', 'updateStatus(' + gst_id + ',' + data["userdata"]["gst_status"] + ')');

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
                CheckFormAccess(submenu_permission, 6, url);
                check(role_permission, 6);
            }
        }
    });
</script>