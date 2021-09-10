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

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="header-title"><?php echo $title; ?> List</h4>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4 text-right">
                                <a href ="<?php echo base_url(); ?>master/premium_calculator/add_cal" class='btn btn-facebook btn-sm AddForm' id='AddForm' >Add <?php echo $title; ?></a>
                            </div>

                        </div>

                        <p class="sub-header">

                        </p>

                        <table id="datatable" class="table  table-striped table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Department Name</th>
                                    <th>Department Status</th>
                                    <th>Delete Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Action</th>
                                    <th>Department Name</th>
                                    <th>Department Status</th>
                                    <th>Delete Status</th>

                                </tr>
                            </tfoot>
                            <tbody id="tableData">

                            </tbody>
                        </table>
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

    function OnRecover(department_id) {
        // var department_id = $("#department_id").text();
        var url = "<?php echo $base_url; ?>master/department/recover_department";
        confirmation_alert(id = department_id, url = url, title = "Department", type = "Recover");
    }

    function OnDelete(department_id) {
        // var department_id = $("#department_id").text();
        var url = "<?php echo $base_url; ?>master/department/remove_department";
        confirmation_alert(id = department_id, url = url, title = "Department", type = "Delet");
    }

    // getDepartmentList();

    function getDepartmentList() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/department/get_department_list";
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
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var department_id = "";
                        var department_name = "";
                        var department_status = "";
                        var datas = "";
                        var status = "";
                        $.each(data, function(key, val) {

                            department_id = parseInt(data[key].department_id);
                            department_name = data[key].department_name;
                            department_status = data[key].department_status;
                            var isActive = data[key].del_flag;
                            if (!isNaN(department_id)) {
                                if (department_status == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light  btn-sm edit";
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light  btn-sm edit";
                                }

                                if (isActive == 1) {
                                    var del_status = "No";

                                    var delete_btn_txt = "<button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + department_id + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + department_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                                }
                                var view_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view' id='view' value='' type='button' onClick ='onView(" + department_id + ")' >View</button>";


                                edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm edit' id='edit' value='' type='button' onClick ='onEdit(" + department_id + ")' >Edit</button>";
                                status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + department_id + "' value='' type='button' onClick ='updateStatus(" + department_id + "," + department_status + ")' >" + status + "</button>";

                                datas += '<tr><td>' + edit_btn + '<br/>' + view_btn + '</td>  <td>' + department_name + '</td><td>' + status_btn + '</td> <td>' + delete_btn_txt + '</td></tr>';
                            }
                        });

                    } else {
                        datas = '<tr><td colspan="4"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function updateStatus(department_id, department_status) {

        var url = "<?php echo $base_url; ?>master/department/update_department_status";

        if (department_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": department_id,
                    "status": department_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + department_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["department_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                            $("#edit_" + department_id).addClass(status_btn_txt);
                            $("#status_btn_" + department_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                            $("#edit_" + department_id).addClass(status_btn_txt);
                            $("#status_btn_" + department_id).text(status);
                        }

                        $("#status_btn_" + department_id).text(status);


                        $('#status_btn_' + department_id).attr('onClick', 'updateStatus(' + department_id + ',' + data["userdata"]["department_status"] + ')');

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