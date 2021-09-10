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

                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_tpa_name" class="col-form-label col-md-4 text-right">TPA Name</label>
                                            <div class="col-md-8">
                                                <input type="text" name="filter_tpa_name" id="filter_tpa_name" class="form-control filter_tpa_name" placeholder="Enter TPA Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_short_name" class="col-form-label col-md-4 text-right">TPA Short Name</label>
                                            <div class="col-md-8">
                                                <input type="text" name="filter_short_name" id="filter_short_name" class="form-control filter_short_name" placeholder="Enter TPA Short Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_common_email" class="col-form-label col-md-4 text-right">Email</label>
                                            <div class="col-md-8">
                                                <input type="text" name="filter_common_email" id="filter_common_email" class="form-control filter_common_email" placeholder="Enter Common Email">
                                            </div>
                                        </div>
                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_office_contact" class="col-form-label col-md-4 text-right">Office Contact</label>
                                            <div class="col-md-8">
                                                <input type="text" name="filter_office_contact" id="filter_office_contact" class="form-control filter_office_contact" placeholder="Enter Office Contact">
                                            </div>
                                        </div>
                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_website" class="col-form-label col-md-4 text-right">Website</label>
                                            <div class="col-md-8">
                                                <input type="text" name="filter_website" id="filter_website" class="form-control filter_website" placeholder="Enter Website">
                                            </div>
                                        </div>
                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_status" class="col-form-label col-md-4 text-right">Status</label>
                                            <div class="col-md-8">
                                                <select name="filter_status" id="filter_status" class="form-control">
                                                    <option value="null">Select Status</option>
                                                    <option value="1">Active</option>
                                                    <option value="2">In-Active</option>
                                                </select>
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
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_tpa_data"></span></h4>
                            </div>
                            <!-- <div class="col-md-4">

                            </div> -->
                            <div class="col-md-6 text-right">
                                <a id="AddForm" href="<?php echo base_url() . "master/tpa/tpa"; ?>" class='btn btn-facebook btn-xs'>Add</a>
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
                                            <center>TPA Name</center>
                                        </th>
                                        <th>Short Name</th>
                                        <th>Comman Email</th>
                                        <th>Office Contact</th>
                                        <th>Toll Free No 1</th>
                                        <th>Toll Free No 2</th>
                                        <th>Website</th>
                                        <th>Address</th>
                                        <!-- <th>TPA Status</th> -->
                                        <th>Delete Status</th>
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
    function wordwrap(str = "", width = "", brk = "", cut = "") {
        // if (str && !str.match(/^.+:\/\/.*/)) {
        //     str ='https://' + str;
        // }
        brk = brk || 'n';
        width = width || 75;
        cut = cut || false;

        if (!str) {
            return str;
        }

        var regex = '.{1,' + width + '}(\|$)' + (cut ? '|.{' + width + '}|.+$' : '|\S+?(\|$)');

        return str.match(RegExp(regex, 'g')).join(brk);

    }
    $("#filter_btn").click(function() {
        $('#filter_form_modal').modal('toggle');
    });
    getTPAList();

    function OnRecover(tpa_id) {
        var url = "<?php echo $base_url; ?>master/tpa/recover_tpa";
        confirmation_alert(id = tpa_id, url = url, title = "TPA Details", type = "Recover");
    }

    function OnDelete(tpa_id) {
        var url = "<?php echo $base_url; ?>master/tpa/remove_tpa";
        confirmation_alert(id = tpa_id, url = url, title = "TPA Details", type = "Delet");
    }

    function Filter_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter On');
        $('#filter_form_modal').modal('toggle');

        var filter_tpa_name = $("#filter_tpa_name").val();
        var filter_short_name = $("#filter_short_name").val();
        var filter_common_email = $("#filter_common_email").val();
        var filter_office_contact = $("#filter_office_contact").val();
        var filter_website = $("#filter_website").val();
        var filter_status = $("#filter_status").val();

        if (filter_status == "null")
            filter_status = "";

        var url = "<?php echo $base_url; ?>master/tpa/filter_tpa_list";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_tpa_name: filter_tpa_name,
                    filter_short_name: filter_short_name,
                    filter_common_email: filter_common_email,
                    filter_office_contact: filter_office_contact,
                    filter_website: filter_website,
                    filter_status: filter_status,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var total_tpa_data = 0;
                    $("#total_tpa_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var view_btn = "";
                        var datas = "";
                        var status_btn = "";
                        var status = "";

                        var tpa_id = "";
                        var tpa_name = "";
                        var tpa_status = "";
                        var short_name = "";
                        var common_email = "";
                        var address = "";
                        var city = "";
                        var state = "";
                        var zipcode = "";
                        var office_contact = "";
                        var website = "";
                        var tollfree_no_1 = "";
                        var tollfree_no_2 = "";
                        var comman_address = "";
                        var company_del_flag = "";
                        total_tpa_data = data["total_tpa_data"];
                        $("#total_tpa_data").text(" Count ( " + total_tpa_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            tpa_id = parseInt(data[key].mtpa_id);
                            tpa_name = data[key].tpa_name;
                            short_name = data[key].short_name;
                            common_email = data[key].common_email;
                            address = data[key].address;
                            state = data[key].state;
                            city = data[key].city;
                            zipcode = data[key].zipcode;
                            // website = data[key].website;
                            website = wordwrap(data[key].website, '20', '<br/>');
                            office_contact = data[key].office_contact;
                            tollfree_no_1 = data[key].tollfree_no_1;
                            tollfree_no_2 = data[key].tollfree_no_2;
                            tpa_status = data[key].tpa_status;
                            del_flag = data[key].company_del_flag;
                            var isActive = data[key].tpa_del_flag;

                            if (website == "" || website == null || website == undefined)
                                website = '';
                            else
                                website = '<a href ="' + data[key].website + '" target="_blank">[' + website + ']</a>';

                            comman_address = address + " , " + state + " , " + city + " , " + zipcode;
                            if (!isNaN(tpa_id)) {
                                if (tpa_status == 1) {
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
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + tpa_id + ")'><b>Delete</b></a>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + tpa_id + ")'><b>Recover</b></a>";
                                }
                                // view_btn = " <a href='<?php echo base_url() . "master/tpa/view_tpa/"; ?>" + tpa_id + "' class='btn btn-facebook btn-sm view' id='view'>View TPA</a>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + tpa_id + "' value='' type='button' onClick ='updateStatus(" + tpa_id + "," + tpa_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='<?php echo base_url() . "master/tpa/view_tpa/"; ?>" + tpa_id + "' id='view'><b>View</b></a><a class='dropdown-item edit' href='<?php echo base_url() . "master/tpa/edit_tpa/"; ?>" + tpa_id + "' id='edit'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + tpa_id + "' href='javascript:void(0);' id='status_btn_" + tpa_id + "' onClick ='updateStatus(" + tpa_id + "," + tpa_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + "<br/>" + badge_status + '</td><td>' + sn + '</td><td><center>' + tpa_name + '</center></td> <td>' + short_name + '</td> <td>' + common_email + '</td><td>' + office_contact + '</td><td>' + tollfree_no_1 + '</td><td>' + tollfree_no_2 + '</td><td>' + website + '</td><td>' + comman_address + '</td> <td>' + del_status + '</td> </tr>';
                            }
                        });

                    } else {
                        $("#total_tpa_data").text(" Count ( " + total_tpa_data + " ) ");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="10"><center>Data Not Found</center></td> </tr>';
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

        $("#filter_tpa_name").val("");
        $("#filter_short_name").val("");
        $("#filter_common_email").val("");
        $("#filter_office_contact").val("");
        $("#filter_website").val("");
        $("#filter_status").val("null");
        getTPAList();
    }

    function getTPAList() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/tpa/get_tpa_list";
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
                    var total_tpa_data = 0;
                    $("#total_tpa_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var view_btn = "";
                        var datas = "";
                        var status_btn = "";
                        var status = "";

                        var tpa_id = "";
                        var tpa_name = "";
                        var tpa_status = "";
                        var short_name = "";
                        var common_email = "";
                        var address = "";
                        var city = "";
                        var state = "";
                        var zipcode = "";
                        var office_contact = "";
                        var website = "";
                        var tollfree_no_1 = "";
                        var tollfree_no_2 = "";
                        var comman_address = "";
                        var company_del_flag = "";
                        total_tpa_data = data["total_tpa_data"];
                        $("#total_tpa_data").text(" Count ( " + total_tpa_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            tpa_id = parseInt(data[key].mtpa_id);
                            tpa_name = data[key].tpa_name;
                            short_name = data[key].short_name;
                            common_email = data[key].common_email;
                            address = data[key].address;
                            state = data[key].state;
                            city = data[key].city;
                            zipcode = data[key].zipcode;
                            // website = data[key].website;
                            website = wordwrap(data[key].website, '20', '<br/>');
                            office_contact = data[key].office_contact;
                            tollfree_no_1 = data[key].tollfree_no_1;
                            tollfree_no_2 = data[key].tollfree_no_2;
                            tpa_status = data[key].tpa_status;
                            del_flag = data[key].company_del_flag;
                            var isActive = data[key].tpa_del_flag;

                            if (website == "" || website == null || website == undefined)
                                website = '';
                            else
                                website = '<a href ="' + data[key].website + '" target="_blank">[' + website + ']</a>';

                            comman_address = address + " , " + state + " , " + city + " , " + zipcode;
                            if (!isNaN(tpa_id)) {
                                if (tpa_status == 1) {
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
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + tpa_id + ")'><b>Delete</b></a>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + tpa_id + ")'><b>Recover</b></a>";
                                }
                                // view_btn = " <a href='<?php echo base_url() . "master/tpa/view_tpa/"; ?>" + tpa_id + "' class='btn btn-facebook btn-sm view' id='view'>View TPA</a>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + tpa_id + "' value='' type='button' onClick ='updateStatus(" + tpa_id + "," + tpa_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='<?php echo base_url() . "master/tpa/view_tpa/"; ?>" + tpa_id + "' id='view'><b>View</b></a><a class='dropdown-item edit' href='<?php echo base_url() . "master/tpa/edit_tpa/"; ?>" + tpa_id + "' id='edit'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + tpa_id + "' href='javascript:void(0);' id='status_btn_" + tpa_id + "' onClick ='updateStatus(" + tpa_id + "," + tpa_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + "<br/>" + badge_status + '</td><td>' + sn + '</td><td><center>' + tpa_name + '</center></td> <td>' + short_name + '</td> <td>' + common_email + '</td><td>' + office_contact + '</td><td>' + tollfree_no_1 + '</td><td>' + tollfree_no_2 + '</td><td>' + website + '</td><td>' + comman_address + '</td> <td>' + del_status + '</td> </tr>';
                            }
                        });

                    } else {
                        $("#total_tpa_data").text(" Count ( " + total_tpa_data + " ) ");
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

    function updateStatus(tpa_id, tpa_status) {

        var url = "<?php echo $base_url; ?>master/tpa/update_tpa_status";

        if (tpa_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": tpa_id,
                    "status": tpa_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + tpa_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["tpa_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                            $("#edit_" + tpa_id).addClass(status_btn_txt);
                            $("#status_btn_" + tpa_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                            $("#edit_" + tpa_id).addClass(status_btn_txt);
                            $("#status_btn_" + tpa_id).text(status);
                        }

                        $("#status_btn_" + tpa_id).text(status);


                        $('#status_btn_' + tpa_id).attr('onClick', 'updateStatus(' + tpa_id + ',' + data["userdata"]["tpa_status"] + ')');


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
                CheckFormAccess(submenu_permission, 5, url);
                check(role_permission, 5);
            }
        }
    });
</script>