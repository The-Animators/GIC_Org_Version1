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

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_client_data"></span></h4>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4 text-right">
                                <a href="<?php echo base_url() . "clients/"; ?>" class='btn btn-facebook btn-xs'>Add</a>
                                <button type="submit" id="filter_btn" class="btn btn-outline-secondary waves-effect btn-xs"><b><i class="mdi mdi-magnify"></i>&nbsp;Filter Off</b></button>
                                <!-- <a href="<?php //echo base_url() . "clients/member_details"; 
                                                ?>" class='btn btn-facebook btn-sm'>Add Member</a> -->
                            </div>

                        </div>

                        <!-- <table id="datatable" class="table  table-striped table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> -->

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
                                                    <center>Group Name</center>
                                                </th>
                                                <th>Refered By</th>
                                                <th>Residential Address</th>
                                                <th>Residential Country</th>
                                                <th>Residential city</th>
                                                <th>Residential Office Contact</th>
                                                <th>Office Address</th>
                                                <th>Office Contact</th>
                                                <!-- <th>Status</th>
                                        <th>Delete Status</th> -->
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
                                    <label for="filter_group_name" class="col-form-label col-md-5 text-right">Group Name</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="filter_group_name" name="filter_group_name" placeholder="Enter Group Name">
                                    </div>
                                </div>
                                <div class="col-md-4 row">
                                    <label for="filter_refered_by" class="col-form-label col-md-5 text-right">Refered By</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="filter_refered_by" name="filter_refered_by" placeholder="Enter Refered By">
                                    </div>
                                </div>
                                <div class="col-md-4 row">
                                    <label for="filter_office_contact" class="col-form-label col-md-5 text-right">Office Contact</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="filter_office_contact" name="filter_office_contact" placeholder="Enter Office Contact">
                                    </div>
                                </div>
                                <div class="col-md-4 row mt-1">
                                    <label for="filter_status" class="col-form-label col-md-5 text-right">Status</label>
                                    <div class="col-md-7">
                                        <select name="filter_status" id="filter_status" class="form-control">
                                            <option value="null">Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="2">In-Active</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-12 ml-2">
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
<!-- <script src="<?= base_url(); ?>assets/js/client_list.js"></script> -->
<script>
    $("#filter_btn").click(function() {
        $('#filter_form_modal').modal('toggle');
    });
    let baseUrl = "<?php echo base_url(); ?>";
</script>
<script>
    function OnRecover(client_id) {
        var url = "<?php echo $base_url; ?>clients/recover_client";
        confirmation_alert(id = client_id, url = url, title = "Client", type = "Recover");
    }

    function OnDelete(client_id) {
        // alert(client_id);
        var url = "<?php echo $base_url; ?>clients/remove_client";
        confirmation_alert(id = client_id, url = url, title = "Client", type = "Delet");
    }

    function Filter_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter On');
        $('#filter_form_modal').modal('toggle');

        var filter_group_name = $("#filter_group_name").val();
        var filter_refered_by = $("#filter_refered_by").val();
        var filter_office_contact = $("#filter_office_contact").val();
        var filter_status = $("#filter_status").val();

        if (filter_status == "null")
            filter_status = "";

        var url = "<?php echo base_url(); ?>clients/filter_client_list";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_group_name: filter_group_name,
                    filter_refered_by: filter_refered_by,
                    filter_office_contact: filter_office_contact,
                    filter_status: filter_status,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var total_client_data = 0;
                    $("#total_client_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var id = "";
                        var grpname = "";
                        var c_status = "";
                        var datas = "";
                        var status = "";
                        total_client_data = data["total_client_data"];
                        $("#total_client_data").text(" Count ( " + total_client_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            id = parseInt(data[key].id);
                            grpname = data[key].grpname;
                            reffered_by = data[key].reffered_by;
                            r_address1 = data[key].r_address1;
                            r_country = data[key].r_country;
                            r_city = data[key].r_city;
                            r_office_contact1 = data[key].r_office_contact1;
                            o_address1 = data[key].o_address1;
                            o_office_contact1 = data[key].o_office_contact1;
                            c_status = data[key].c_status;
                            var isActive = data[key].c_is_delete;
                            if (!isNaN(id)) {
                                if (c_status == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light  btn-sm edit";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light  btn-sm edit";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }

                                if (isActive == 0) {
                                    var del_status = "No";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + id + ")'><b>Delete</b></a>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + id + ")'><b>Recover</b></a>";
                                }
                                var view_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view' id='view' value='' type='button' onClick ='onView(" + id + ")' >View</button>";
                                edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm edit' id='edit' value='' type='button' onClick ='onEdit(" + id + ")' >Edit</button>";
                                status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + id + "' value='' type='button' onClick ='updateStatus(" + id + "," + c_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='<?php echo base_url() . "clients/view_client/"; ?>" + id + "' id='view'><b>View</b></a><a class='dropdown-item edit' href='<?php echo base_url() . "clients/edit_client/"; ?>" + id + "' id='edit'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + id + "' href='javascript:void(0);' id='status_btn_" + id + "' onClick ='updateStatus(" + id + "," + c_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td> <td><center>' + grpname + '</center></td> <td>' + reffered_by + '</td> <td>' + r_address1 + '</td><td>' + r_country + '</td><td>' + r_city + '</td><td>' + r_office_contact1 + '</td><td>' + o_address1 + '</td><td>' + o_office_contact1 + '</td></tr>';

                                // datas += '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td> <td>' + sn + '</td> <td><center>' + grpname + '</center></td></tr>';
                            }
                        });

                    } else {
                        $("#total_client_data").text(" Count ( " + total_client_data + " ) ");
                        datas = '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="2"><center>Data Not Found</center></td> </tr>';
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

        $("#filter_group_name").val("");
        $("#filter_refered_by").val("");
        $("#filter_office_contact").val("");
        $("#filter_status").val("null");
        get_client_list();
    }

    get_client_list();

    function get_client_list() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>clients/get_client_list";
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
                    var total_client_data = 0;
                    $("#total_client_data").text("");
                    $("#tableData").empty();
                    // alert(data["data"]);
                    if (data.status == true) {
                        var datas = "";
                        total_client_data = data["total_client_data"];
                        $("#total_client_data").text(" Count ( " + total_client_data + " ) ");
                        var data = data["data"];
                        $.each(data, function(key, val) {

                            sn = parseInt(key) + parseInt(1);
                            // comman_address = address + " , " + state + " , " + city + " , " + zipcode;
                            if (val.c_status == 1) {

                                status = "Active";
                                var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light  btn-sm edit";
                                badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                            } else {
                                status = "In-Active";
                                var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light  btn-sm edit";
                                badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                            }
                            // alert(val.c_is_delete);
                            if (val.c_is_delete == 0) {
                                var del_status = "No";
                                var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + val.id + ")'><b>Delete</b></a>";
                            } else {
                                var del_status = "Yes";
                                var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + val.id + ")'><b>Recover</b></a>";
                            }
                            view_btn = " <a href='<?php echo base_url() . "clients/view_client/"; ?>" + val.id + "' class='btn btn-facebook btn-sm' >View Clients</a>";
                            status_btn = status;

                            if (val.grpname == "null" || val.grpname == null)
                                val.grpname = "";
                            if (val.reffered_by == "null" || val.reffered_by == null)
                                val.reffered_by = "";
                            if (val.r_address1 == "null" || val.r_address1 == null)
                                val.r_address1 = "";
                            if (val.r_country == "null" || val.r_country == null)
                                val.r_country = "";
                            if (val.r_city == "null" || val.r_city == null)
                                val.r_city = "";
                            if (val.r_office_contact1 == "null" || val.r_office_contact1 == null)
                                val.r_office_contact1 = "";
                            if (val.o_address1 == "null" || val.o_address1 == null)
                                val.o_address1 = "";
                            if (val.o_office_contact1 == "null" || val.o_office_contact1 == null)
                                val.o_office_contact1 = "";

                            action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='<?php echo base_url() . "clients/view_client/"; ?>" + val.id + "' id='view'><b>View</b></a><a class='dropdown-item edit' href='<?php echo base_url() . "clients/edit_client/"; ?>" + val.id + "' id='edit' ><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + val.id + "' href='javascript:void(0);' id='status_btn_" + val.id + "' onClick ='updateStatus(" + val.id + "," + val.c_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                            datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td> <td><center>' + val.grpname + '</center></td> <td>' + val.reffered_by + '</td> <td>' + val.r_address1 + '</td><td>' + val.r_country + '</td><td>' + val.r_city + '</td><td>' + val.r_office_contact1 + '</td><td>' + val.o_address1 + '</td><td>' + val.o_office_contact1 + '</td></tr>';
                            // datas += '<tr><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td> <td>' + val.grpname + '</td> <td>' + val.reffered_by + '</td> <td>' + val.r_address1 + '</td><td>' + val.r_country + '</td><td>' + val.r_city + '</td><td>' + val.r_office_contact1 + '</td><td>' + val.o_address1 + '</td><td>' + val.o_office_contact1 + '</td> <td>' + status_btn + '</td> <td>' + del_status + '</td></tr>';
                            // alert(datas);
                        });

                    } else {
                        $("#total_client_data").text(" Count ( " + total_client_data + " ) ");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="10"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function updateStatus(client_id, client_status) {

        var url = "<?php echo $base_url; ?>clients/update_client_status";

        if (client_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": client_id,
                    "status": client_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + client_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["company_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light";
                            $("#edit_" + client_id).addClass(status_btn_txt);
                            $("#status_btn_" + client_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light";
                            $("#edit_" + client_id).addClass(status_btn_txt);
                            $("#status_btn_" + client_id).text(status);
                        }

                        $("#status_btn_" + client_id).text(status);


                        $('#status_btn_' + client_id).attr('onClick', 'updateStatus(' + client_id + ',' + data["userdata"]["c_status"] + ')');


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