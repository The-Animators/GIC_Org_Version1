<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<?php
if (!empty($staff_details)) {
    // print_r($staff_details);
    // die("Test");
    $staff_id = $staff_details["staff_id"];
    $staff_name = $staff_details["staff_name"];
    $user_name = $staff_details["staff_username"];
    $password = $staff_details["staff_password"];
    $email = $staff_details["staff_email"];
    $staff_mobile = $staff_details["staff_mobile"];
    $staff_desc = $staff_details["staff_desc"];
    $roles = $staff_details["fk_user_role_id"];
    $del_flag = $staff_details["del_flag"];
    $staff_doj = $staff_details["staff_doj"];
    $staff_sallary = $staff_details["staff_sallary"];
    $staff_profile = $staff_details["staff_profile"];
    $staff_pan = $staff_details["staff_pan"];
    $staff_aadhar = $staff_details["staff_aadhar"];
} else {
    $staff_id = "";
    $staff_name = "";
    $user_name = "";
    $password = "";
    $email = "";
    $staff_mobile = "";
    $staff_desc = "";
    $roles = "";
    $del_flag = "";
    $staff_doj = "";
    $staff_sallary = "";
    $staff_profile = "";
    $staff_pan = "";
    $staff_aadhar = "";
}
?>
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
                                <h4 class="header-title"><?php echo $add . $title; ?></h4>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4 text-right">
                                <a href="<?php echo base_url() . "master/staff"; ?>" class='btn btn-secondary waves-effect width-md btn-sm'>Back</a>
                            </div>

                        </div>

                        <p class="sub-header">

                        </p>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="staff_name" class="col-form-label col-md-4 text-right">Staff Name<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="staff_name" id="staff_name" value="<?php echo $staff_name; ?>" placeholder="Enter Staff Name" class="form-control">
                                                <span id="staff_name_err"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="user_name" class="col-form-label col-md-4 text-right">User Name<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="user_name" id="user_name" value="<?php echo $user_name; ?>" placeholder="Enter User Name" class="form-control">
                                                <span id="user_name_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="password" class="col-form-label col-md-4  text-right">Password<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="password" id="password" value="<?php echo $password; ?>" placeholder="Enter Password" class="form-control">
                                                <span id="password_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="email" class="col-form-label col-md-4  text-right">Email<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="email" id="email" value="<?php echo $email; ?>" placeholder="Enter Email" class="form-control">
                                                <span id="email_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="staff_mobile" class="col-form-label col-md-4  text-right">Mobile<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="staff_mobile" id="staff_mobile" value="<?php echo $staff_mobile; ?>" placeholder="Enter Mobile" class="form-control">
                                                <span id="staff_mobile_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="roles" class="col-form-label col-md-4  text-right">User Roles<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select name="roles" id="roles" class="form-control" onchange="role_based_Submenu()">
                                                    <option value="null">Select Role</option>
                                                    <?php if (!empty($user_roles)) : foreach ($user_roles as $row) :
                                                            if ($roles == $row["user_role_id"])
                                                                $selected = "selected";
                                                            else
                                                                $selected = "";
                                                    ?>
                                                            <option value="<?php echo $row["user_role_id"]; ?>" <?php echo $selected; ?>><?php echo $row["user_role_title"]; ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                                <span id="roles_err"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="staff_doj" class="col-form-label col-md-4  text-right">DOJ</label>
                                            <div class="col-md-8">
                                                <input type="text" name="staff_doj" id="staff_doj" value="<?php echo $staff_doj; ?>" placeholder="Enter DOJ" class="form-control">
                                                <span id="staff_doj_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="staff_sallary" class="col-form-label col-md-4  text-right">Sallary</label>
                                            <div class="col-md-8">
                                                <input type="text" name="staff_sallary" id="staff_sallary" value="<?php echo $staff_sallary; ?>" placeholder="Enter Sallary" class="form-control">
                                                <span id="staff_sallary_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="staff_profile" class="col-form-label col-md-4 text-right">Profile</label>
                                            <div class="col-md-8">
                                                <input type="file" name="staff_profile" id="staff_profile" class="form-control filestyle staff_profile" data-input="false" id="filestyle-1" tabindex="-1" onchange="check_file_upload(id ='staff_profile')">
                                                <span id="staff_profile_err"></span>
                                                <span id="staff_profile_det" style="display:none;"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="staff_pan" class="col-form-label col-md-4 text-right">PAN</label>
                                            <div class="col-md-8">
                                                <input type="file" name="staff_pan" id="staff_pan" class="form-control filestyle staff_pan" data-input="false" id="filestyle-1" tabindex="-1" onchange="check_file_upload(id ='staff_pan')">
                                                <span id="staff_pan_err"></span>
                                                <span id="staff_pan_det" style="display:none;"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="staff_aadhar" class="col-form-label col-md-4 text-right">Aadhar</label>
                                            <div class="col-md-8">
                                                <input type="file" name="staff_aadhar" id="staff_aadhar" class="form-control filestyle staff_aadhar" data-input="false" id="filestyle-1" tabindex="-1" onchange="check_file_upload(id ='staff_aadhar')">
                                                <span id="staff_aadhar_err"></span>
                                                <span id="staff_aadhar_det" style="display:none;"></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="staff_desc" class="col-form-label col-md-4 text-right">Description</label>
                                            <div class="col-md-8">
                                                <textarea rows="5" name="staff_desc" id="staff_desc" class="form-control staff_desc" ><?php echo $staff_desc; ?></textarea>
                                                <span id="staff_desc_err"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row" id="role_permission" style="display:none;">
                                    <div class="col-md-12">
                                        <table id="datatable" class="table  table-striped table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                            <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Modules</th>
                                                    <!-- <th>Select All</th> -->
                                                    <th>Add</th>
                                                    <th>Edit</th>
                                                    <th>View</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Modules</th>
                                                    <!-- <th>Select All</th> -->
                                                    <th>Add</th>
                                                    <th>Edit</th>
                                                    <th>View</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </tfoot>
                                            <tbody id="tableData">
                                                <?php
                                                $i = 1;
                                                if (!empty($submenu_list)) :
                                                    foreach ($submenu_list as $row) : ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td>
                                                                <?php echo $row["submenu_name"]; ?>
                                                            </td>

                                                            <td>
                                                                <input type="hidden" class="submenu_id" name="submenu_id[]" id="submenu_id_<?php echo $row["submenu_id"]; ?>" value="<?php echo $row["submenu_id"]; ?>">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="add[]" class="custom-control-input add" id="add_<?php echo $row["submenu_id"]; ?>" onclick="check_checkbox(<?php echo $row['submenu_id']; ?>)">
                                                                    <label class="custom-control-label" for="add_<?php echo $row["submenu_id"]; ?>"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="edit[]" class="custom-control-input edit" id="edit_<?php echo $row["submenu_id"]; ?>" onclick="check_checkbox(<?php echo $row['submenu_id']; ?>)">
                                                                    <label class="custom-control-label" for="edit_<?php echo $row["submenu_id"]; ?>"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="view[]" class="custom-control-input view" id="view_<?php echo $row["submenu_id"]; ?>" onclick="check_checkbox(<?php echo $row['submenu_id']; ?>)">
                                                                    <label class="custom-control-label" for="view_<?php echo $row["submenu_id"]; ?>"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="delete[]" class="custom-control-input delete" id="delete_<?php echo $row["submenu_id"]; ?>" onclick="check_checkbox(<?php echo $row['submenu_id']; ?>)">
                                                                    <label class="custom-control-label" for="delete_<?php echo $row["submenu_id"]; ?>"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php $i++;
                                                    endforeach;
                                                else : ?>
                                                    <tr>
                                                        <td colspan="7">
                                                            <center>Data Not Found</center>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label id="staff_id" hidden><?php echo $staff_id; ?></label>
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
    $(document).ready(function() {
        var staff_id = "<?php echo $staff_id; ?>";
        var staff_profile = "<?php echo $staff_profile; ?>";
        var staff_pan = "<?php echo $staff_pan; ?>";
        var staff_aadhar = "<?php echo $staff_aadhar; ?>";
        
        if (staff_profile == "" || staff_profile == null || staff_profile == undefined) {
            var view_staff_profile = "";
            var download_staff_profile = "";
            var delete_staff_profile = "";
            $("#staff_profile_det").hide();
        } else if (staff_profile != "") {
            $("#staff_profile_det").show();
            // alert(staff_profile);
            var view_staff_profile = "<a href='<?php echo base_url(); ?>master/staff/view_doc/1/" + staff_id + "/" + staff_profile + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
            var download_staff_profile = "<a href='<?php echo base_url(); ?>master/staff/download_doc/1/" + staff_id + "/" + staff_profile + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
            var delete_staff_profile = "<a onclick=OnDelete_Doc('" + staff_id + ',' + 1 + ',' + staff_profile + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
            
        }
        $("#staff_profile_det").html(view_staff_profile + "  " + download_staff_profile + "  " + delete_staff_profile);

        if (staff_pan == "" || staff_pan == null || staff_pan == undefined) {
            var view_staff_pan = "";
            var download_staff_pan = "";
            var delete_staff_pan = "";
            $("#staff_pan_det").hide();
        } else if (staff_pan != "") {
            $("#staff_pan_det").show();
            // alert(staff_pan);
            var view_staff_pan = "<a href='<?php echo base_url(); ?>master/staff/view_doc/2/" + staff_id + "/" + staff_pan + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
            var download_staff_pan = "<a href='<?php echo base_url(); ?>master/staff/download_doc/2/" + staff_id + "/" + staff_pan + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
            var delete_staff_pan = "<a onclick=OnDelete_Doc('" + staff_id + ',' + 2 + ',' + staff_pan + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
            
        }
        $("#staff_pan_det").html(view_staff_pan + "  " + download_staff_pan + "  " + delete_staff_pan);

        if (staff_aadhar == "" || staff_aadhar == null || staff_aadhar == undefined) {
            var view_staff_aadhar = "";
            var download_staff_aadhar = "";
            var delete_staff_aadhar = "";
            $("#staff_aadhar_det").hide();
        } else if (staff_aadhar != "") {
            $("#staff_aadhar_det").show();
            var view_staff_aadhar = "<a href='<?php echo base_url(); ?>master/staff/view_doc/3/" + staff_id + "/" + staff_aadhar + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
            var download_staff_aadhar = "<a href='<?php echo base_url(); ?>master/staff/download_doc/3/" + staff_id + "/" + staff_aadhar + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
            var delete_staff_aadhar = "<a onclick=OnDelete_Doc('" + staff_id + ',' + 3 + ',' + staff_aadhar + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
            
        }
        $("#staff_aadhar_det").html(view_staff_aadhar + "  " + download_staff_aadhar + "  " + delete_staff_aadhar);
    });

    function check_file_upload(id) {
        if ($.inArray($('#' + id).val().split('.').pop().toLowerCase(), ['png', 'jpg', 'jpeg', 'pdf', 'jpe']) == -1) {
            toaster(message_type = "Error", message_txt = "Invalid Extension!", message_icone = "error");
            $('#' + id).addClass("parsley-error");
            $('#' + id + "_err").addClass("text-danger").html("Please Select Only Valid Document Like PDF,Image File Only.");
            toaster(message_type = "Error", message_txt = "Please Select Only Valid Document Like PDF,Image File Only.", message_icone = "error");
            return false;
        } else {
            $('#' + id).removeClass("parsley-error");
            $('#' + id + "_err").removeClass("text-danger").html("");
        }
    }

    $(function() {
        $("#staff_doj").datepicker({
            'format': 'dd-mm-yyyy',
            'autoclose': true,
            'todayHighlight': true
        });
    });

    function OnDelete_Doc(staff_doc_details) {
        var staff_doc_details = staff_doc_details.split(",");
        var staff_id = staff_doc_details[0];
        var doc_type = staff_doc_details[1];
        var doc_name = staff_doc_details[2];
        var url = staff_doc_details[3];

        // alert(doc_type);
        // alert(doc_name);
        // alert(staff_id);
        // die();
        if (doc_type == 1)
            var title = "Profile Photo";
        else if (doc_type == 2)
            var title = "PAN Card Document";
        else if (doc_type == 3)
            var title = "Aadhar Card Document";
        document_confirmation_alert(id = staff_id, doc_type = doc_type, doc_name = doc_name, url = url, title = title, type = "Delet");
    }

    function role_based_Submenu() {
        var roles = $("#roles").val();

        // alert(roles);
        var url = "<?php echo $base_url; ?>master/staff/role_based_submenu";

        if (roles != "") {
            $.ajax({
                url: url,
                data: {
                    roles: roles
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },
                success: function(data) {
                    if (data["status"] == true) {
                        var val = data["userdata"];
                        // var submenu_list = JSON.parse(val);
                        $("#role_permission").attr("style", "")
                        $('#role_permission').empty();
                        var option_val = "";
                        for (var i = 0; i < val.length; i++) {
                            var submenu_id = val[i]["submenu_id"];
                            var submenu_name = val[i]["submenu_name"];

                            option_val += '<tr><td>' + (i + 1) + '</td> <td>' + submenu_name + ' </td> <td><input type="hidden" class="submenu_id" name="submenu_id[]" id="submenu_id_' + submenu_id + '" value=' + submenu_id + '><div class="custom-control custom-checkbox"><input type="checkbox" name="add[]" class="custom-control-input add" id="add_' + submenu_id + '" onclick="check_checkbox(' + submenu_id + ')"><label class="custom-control-label" for="add_' + submenu_id + '"></label></div></td> <td>  <div class="custom-control custom-checkbox"> <input type="checkbox" name="edit[]" class="custom-control-input edit" id="edit_' + submenu_id + '" onclick="check_checkbox(' + submenu_id + ')"> <label class="custom-control-label" for="edit_' + submenu_id + '"></label> </div> </td> <td><div class="custom-control custom-checkbox"><input type="checkbox" name="view[]" class="custom-control-input view" id="view_' + submenu_id + '" onclick="check_checkbox(' + submenu_id + ')"><label class="custom-control-label" for="view_' + submenu_id + '"></label> </div> </td> <td> <div class="custom-control custom-checkbox"><input type="checkbox" name="delete[]" class="custom-control-input delete" id="delete_' + submenu_id + '" onclick="check_checkbox(' + submenu_id + ')"><label class="custom-control-label" for="delete_' + submenu_id + '"></label> </div> </td> </tr> ';

                        }


                    } else {
                        $('#role_permission').empty();
                        option_val = "<tr><td colspan='6'><center>Data Not Found !</center></td> </tr>";

                    }
                    $('#role_permission').append("<span class='col-md-12'><strong><u>Sub-Menu : </u></strong></span><br/><div class='col-md-12'><table id='datatable' class='table  table-striped table-bordered  dt-responsive nowrap' style='border-collapse: collapse; border-spacing: 0; width: 100%;'><thead><tr> <th>SN</th><th>Modules</th><th>Add</th><th>Edit</th><th>View</th><th>Delete</th></tr></thead><tbody id='tableData'>" + option_val + "</tbody></table></div>");
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function check_checkbox(submenu_id) {
        if ($("#add_" + submenu_id).prop("checked") == true) {
            document.getElementById("update").disabled = false;
        } else if ($("#add_" + submenu_id).prop("checked") == false) {
            document.getElementById("update").disabled = false;
        }
        if ($("#edit_" + submenu_id).prop("checked") == true) {
            document.getElementById("update").disabled = false;
        } else if ($("#edit_" + submenu_id).prop("checked") == false) {
            document.getElementById("update").disabled = false;
        }
        if ($("#view_" + submenu_id).prop("checked") == true) {
            document.getElementById("update").disabled = false;
        } else if ($("#view_" + submenu_id).prop("checked") == false) {
            document.getElementById("update").disabled = false;
        }
        if ($("#delete_" + submenu_id).prop("checked") == true) {
            document.getElementById("update").disabled = false;
        } else if ($("#delete_" + submenu_id).prop("checked") == false) {
            document.getElementById("update").disabled = false;
        }
    }

    var actual_data = [];
    var staff_id = "<?php echo $staff_id; ?>";

    function Checked(staff_id) {
        var url = "<?php echo $base_url; ?>master/staff/get_permission";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    staff_id: staff_id
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },
                success: function(data) {
                    var permissionArr = data["userdata"].role_permission
                    var permissionArrs = JSON.parse(permissionArr);

                    $.each(permissionArrs, function(key, val) {
                        var add = permissionArrs[key][0];
                        var edit = permissionArrs[key][1];
                        var view = permissionArrs[key][2];
                        var delete_txt = permissionArrs[key][3];
                        var submenu_id = permissionArrs[key][4];
                        if (add == 1)
                            $("#add_" + submenu_id).attr("checked", true);
                        else
                            $("#add_" + submenu_id).attr("checked", false);
                        if (edit == 1)
                            $("#edit_" + submenu_id).attr("checked", true);
                        else
                            $("#edit_" + submenu_id).attr("checked", false);
                        if (view == 1)
                            $("#view_" + submenu_id).attr("checked", true);
                        else
                            $("#view_" + submenu_id).attr("checked", false);
                        if (delete_txt == 1)
                            $("#delete_" + submenu_id).attr("checked", true);
                        else
                            $("#delete_" + submenu_id).attr("checked", false);

                        $("#submenu_id_" + submenu_id).val(submenu_id);
                    });

                    document.getElementById("update").disabled = true;

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function totIn_Array() {

        $("tr:has(.add)").each(function(index, value) {
            var add = $(".add", this).is(':checked');
            var edit = $(".edit", this).is(':checked');
            var view = $(".view", this).is(':checked');
            var delete_txt = $(".delete", this).is(':checked');
            var submenu_id = $(".submenu_id", this).val();
            if (add == true)
                add = 1;
            else
                add = 0;

            if (edit == true)
                edit = 1;
            else
                edit = 0;
            if (view == true)
                view = 1;
            else
                view = 0;

            if (delete_txt == true)
                delete_txt = 1;
            else
                delete_txt = 0;

            actual_data.push([add, edit, view, delete_txt, submenu_id]);

            if (add === 'null' || add === '')
                actual_data.splice(index, 1);
        });
        // alert(actual_data);
        return actual_data;
    }

    $('#staff_name').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#user_name').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#password').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#email').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#staff_mobile').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#staff_desc').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#roles').on('change', function() {
        document.getElementById("update").disabled = false;
    });

    $('#staff_doj').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#staff_sallary').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#staff_profile').on('click', function() {
        document.getElementById("update").disabled = false;
    });
    $('#staff_pan').on('click', function() {
        document.getElementById("update").disabled = false;
    });
    $('#staff_aadhar').on('click', function() {
        document.getElementById("update").disabled = false;
    });


    $(document).ready(function() {
        Checked(staff_id);
        var roles = $("#roles").val();
        if (roles == "null")
            roles = "";
        if (roles != "") {
            $("#role_permission").attr("style", "");
        } else {
            $("#role_permission").attr("style", "display:none;");
        }
        $("#roles").on("change", function() {
            var roles = $("#roles").val();
            if (roles == "null")
                roles = "";
            // alert(roles);
            if (roles != "") {
                $("#role_permission").attr("style", "");
            } else {
                $("#role_permission").attr("style", "display:none;");
            }

        });
        <?php if (!empty($staff_details)) { ?>
            $("#update").show();
            $("#delete").show();
            $("#submit").hide();
        <?php } ?>
        <?php if ($del_flag == 0) { ?>

            $("#recover").show();
            $("#update").hide();
            $("#delete").hide();
        <?php } else { ?>
            $("#recover").hide();
            $("#update").show();
            $("#delete").show();
        <?php } ?>
    });

    function clearError() {
        $("#staff_name").removeClass("parsley-error");
        $("#staff_name_err").removeClass("text-danger").text("");
        $("#user_name").removeClass("parsley-error");
        $("#user_name_err").removeClass("text-danger").text("");
        $("#password").removeClass("parsley-error");
        $("#password_err").removeClass("text-danger").text("");
        $("#email").removeClass("parsley-error");
        $("#email_err").removeClass("text-danger").text("");
        $("#staff_mobile").removeClass("parsley-error");
        $("#staff_mobile_err").removeClass("text-danger").text("");
        $("#staff_desc").removeClass("parsley-error");
        $("#staff_desc_err").removeClass("text-danger").text("");
        $("#roles").removeClass("parsley-error");
        $("#roles_err").removeClass("text-danger").text("");

        $("#staff_doj").removeClass("parsley-error");
        $("#staff_doj_err").removeClass("text-danger").text("");
        $("#staff_sallary").removeClass("parsley-error");
        $("#staff_sallary_err").removeClass("text-danger").text("");
        $("#staff_profile").removeClass("parsley-error");
        $("#staff_profile_err").removeClass("text-danger").text("");
        $("#staff_pan").removeClass("parsley-error");
        $("#staff_pan_err").removeClass("text-danger").text("");
        $("#staff_aadhar").removeClass("parsley-error");
        $("#staff_aadhar_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#staff_id").text("");
        $("#staff_name").val("");
        $("#user_name").val("");
        $("#password").val("");
        $("#email").val("");
        $("#staff_mobile").val("");
        $("#staff_desc").val("");
        $("#roles").val("");

        $("#staff_doj").val("");
        $("#staff_sallary").val("");
        $("#staff_profile").val("");
        $("#staff_pan").val("");
        $("#staff_aadhar").val("");

        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function OnRecover() {
        var staff_id = $("#staff_id").text();
        var url = "<?php echo $base_url; ?>master/staff/recover_staff";
        confirmation_alert(id = staff_id, url = url, title = "Staff", type = "Recover");
    }

    function OnDelete() {
        var staff_id = $("#staff_id").text();
        var url = "<?php echo $base_url; ?>master/staff/remove_staff";
        confirmation_alert(id = staff_id, url = url, title = "Staff", type = "Delet");
    }

    function onUpdate() {
        var Tot_Arrray = totIn_Array();
        var actual_data = JSON.stringify(Tot_Arrray);
        // alert(actual_data);

        var staff_id = $("#staff_id").text();
        var staff_name = $("#staff_name").val();
        var user_name = $("#user_name").val();
        var password = $("#password").val();
        var email = $("#email").val();
        var staff_mobile = $("#staff_mobile").val();
        var staff_desc = $("#staff_desc").val();
        var roles = $("#roles").val();

        var staff_doj = $("#staff_doj").val();
        var staff_sallary = $("#staff_sallary").val();

        var staff_profile = $('#staff_profile').prop('files')[0];
        var staff_pan = $('#staff_pan').prop('files')[0];
        var staff_aadhar = $('#staff_aadhar').prop('files')[0];
        // var staff_profile = $("#staff_profile").val();
        // var staff_pan = $("#staff_pan").val();
        // var staff_aadhar = $("#staff_aadhar").val();

        if (roles == "null")
            roles = "";

        var form_data = new FormData();
        form_data.append('staff_id', staff_id);
        form_data.append('staff_name', staff_name);
        form_data.append('user_name', user_name);
        form_data.append('password', password);
        form_data.append('email', email);
        form_data.append('staff_mobile', staff_mobile);
        form_data.append('staff_desc', staff_desc);
        form_data.append('roles', roles);
        form_data.append('role_permission', actual_data);

        form_data.append('staff_doj', staff_doj);
        form_data.append('staff_sallary', staff_sallary);
        form_data.append('staff_profile', staff_profile);
        form_data.append('staff_pan', staff_pan);
        form_data.append('staff_aadhar', staff_aadhar);

        var url = "<?php echo $base_url; ?>master/staff/update_staff";

        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            // data: {
            //     staff_id: staff_id,
            //     staff_name: staff_name,
            //     user_name: user_name,
            //     password: password,
            //     email: email,
            //     roles: roles,
            //     role_permission: Tot_Arrray,
            // },
            dataType: 'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {

            },
            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#staff_name").val("");
                    $("#user_name").val("");
                    $("#password").val("");
                    $("#email").val("");
                    $("#staff_mobile").val("");
                    $("#staff_desc").val("");
                    $("#roles").val("");
                    $("#staff_name").removeClass("parsley-error");
                    $("#user_name").removeClass("parsley-error");
                    $("#password").removeClass("parsley-error");
                    $("#email").removeClass("parsley-error");
                    $("#staff_mobile").removeClass("parsley-error");
                    $("#staff_desc").removeClass("parsley-error");
                    $("#roles").removeClass("parsley-error");

                    $("#staff_doj").val("");
                    $("#staff_sallary").val("");
                    $("#staff_profile").val("");
                    $("#staff_pan").val("");
                    $("#staff_aadhar").val("");
                    $("#staff_doj").removeClass("parsley-error");
                    $("#staff_sallary").removeClass("parsley-error");
                    $("#staff_profile").removeClass("parsley-error");
                    $("#staff_pan").removeClass("parsley-error");
                    $("#staff_aadhar").removeClass("parsley-error");
                    setTimeout(function() {
                        // location.reload();
                        window.location.href = '<?php echo base_url(); ?>master/staff';
                    }, 1000);
                } else {
                    if (data["message"]["staff_name_err"] != "")
                        $("#staff_name").addClass("parsley-error");
                    else
                        $("#staff_name").removeClass("parsley-error");
                    $("#staff_name_err").addClass("text-danger").html(data["message"]["staff_name_err"]);
                    if (data["message"]["user_name_err"] != "")
                        $("#user_name").addClass("parsley-error");
                    else
                        $("#user_name").removeClass("parsley-error");
                    $("#user_name_err").addClass("text-danger").html(data["message"]["user_name_err"]);
                    if (data["message"]["password_err"] != "")
                        $("#password").addClass("parsley-error");
                    else
                        $("#password").removeClass("parsley-error");
                    $("#password_err").addClass("text-danger").html(data["message"]["password_err"]);
                    if (data["message"]["email_err"] != "")
                        $("#email").addClass("parsley-error");
                    else
                        $("#email").removeClass("parsley-error");
                    $("#email_err").addClass("text-danger").html(data["message"]["email_err"]);
                    if (data["message"]["staff_mobile_err"] != "")
                        $("#staff_mobile").addClass("parsley-error");
                    else
                        $("#staff_mobile").removeClass("parsley-error");
                    $("#staff_mobile_err").addClass("text-danger").html(data["message"]["staff_mobile_err"]);
                    if (data["message"]["staff_desc_err"] != "")
                        $("#staff_desc").addClass("parsley-error");
                    else
                        $("#staff_desc").removeClass("parsley-error");
                    $("#staff_desc_err").addClass("text-danger").html(data["message"]["staff_desc_err"]);
                    if (data["message"]["roles_err"] != "")
                        $("#roles").addClass("parsley-error");
                    else
                        $("#roles").removeClass("parsley-error");
                    $("#roles_err").addClass("text-danger").html(data["message"]["roles_err"]);


                    if (data["message"]["staff_doj_err"] != "")
                        $("#staff_doj").addClass("parsley-error");
                    else
                        $("#staff_doj").removeClass("parsley-error");
                    $("#staff_doj_err").addClass("text-danger").html(data["message"]["staff_doj_err"]);
                    if (data["message"]["staff_sallary_err"] != "")
                        $("#staff_sallary").addClass("parsley-error");
                    else
                        $("#staff_sallary").removeClass("parsley-error");
                    $("#staff_sallary_err").addClass("text-danger").html(data["message"]["staff_sallary_err"]);
                    if (data["message"]["staff_profile_err"] != "")
                        $("#staff_profile").addClass("parsley-error");
                    else
                        $("#staff_profile").removeClass("parsley-error");
                    $("#staff_profile_err").addClass("text-danger").html(data["message"]["staff_profile_err"]);
                    if (data["message"]["staff_pan_err"] != "")
                        $("#staff_pan").addClass("parsley-error");
                    else
                        $("#staff_pan").removeClass("parsley-error");
                    $("#staff_pan_err").addClass("text-danger").html(data["message"]["staff_pan_err"]);
                    if (data["message"]["staff_aadhar_err"] != "")
                        $("#staff_aadhar").addClass("parsley-error");
                    else
                        $("#staff_aadhar").removeClass("parsley-error");
                    $("#staff_aadhar_err").addClass("text-danger").html(data["message"]["staff_aadhar_err"]);
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    $("#submit").click(function() {
        var Tot_Arrray = totIn_Array();
        var actual_data = JSON.stringify(Tot_Arrray);
        var staff_name = $("#staff_name").val();
        var user_name = $("#user_name").val();
        var password = $("#password").val();
        var email = $("#email").val();
        var staff_mobile = $("#staff_mobile").val();
        var staff_desc = $("#staff_desc").val();
        var roles = $("#roles").val();

        var staff_doj = $("#staff_doj").val();
        var staff_sallary = $("#staff_sallary").val();

        var staff_profile = $('#staff_profile').prop('files')[0];
        var staff_pan = $('#staff_pan').prop('files')[0];
        var staff_aadhar = $('#staff_aadhar').prop('files')[0];
        // var staff_profile = $("#staff_profile").val();
        // var staff_pan = $("#staff_pan").val();
        // var staff_aadhar = $("#staff_aadhar").val();

        // alert(roles);
        if (roles == "null")
            roles = "";

        var form_data = new FormData();
        form_data.append('staff_name', staff_name);
        form_data.append('user_name', user_name);
        form_data.append('password', password);
        form_data.append('email', email);
        form_data.append('staff_mobile', staff_mobile);
        form_data.append('staff_desc', staff_desc);
        form_data.append('roles', roles);
        form_data.append('role_permission', actual_data);

        form_data.append('staff_doj', staff_doj);
        form_data.append('staff_sallary', staff_sallary);
        form_data.append('staff_profile', staff_profile);
        form_data.append('staff_pan', staff_pan);
        form_data.append('staff_aadhar', staff_aadhar);

        var url = "<?php echo $base_url; ?>master/staff/add_staff";

        $.ajax({
            url: url,
            data: form_data,
            // data: {
            //     staff_name: staff_name,
            //     user_name: user_name,
            //     password: password,
            //     email: email,
            //     roles: roles,
            //     role_permission: Tot_Arrray,
            // },
            type: 'POST',
            dataType: 'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {

            },

            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#staff_name").val("");
                    $("#user_name").val("");
                    $("#password").val("");
                    $("#email").val("");
                    $("#staff_mobile").val("");
                    $("#staff_desc").val("");
                    $("#roles").val("");
                    $("#staff_name").removeClass("parsley-error");
                    $("#user_name").removeClass("parsley-error");
                    $("#password").removeClass("parsley-error");
                    $("#email").removeClass("parsley-error");
                    $("#staff_mobile").removeClass("parsley-error");
                    $("#staff_desc").removeClass("parsley-error");
                    $("#roles").removeClass("parsley-error");

                    $("#staff_doj").val("");
                    $("#staff_sallary").val("");
                    $("#staff_profile").val("");
                    $("#staff_pan").val("");
                    $("#staff_aadhar").val("");
                    $("#staff_doj").removeClass("parsley-error");
                    $("#staff_sallary").removeClass("parsley-error");
                    $("#staff_profile").removeClass("parsley-error");
                    $("#staff_pan").removeClass("parsley-error");
                    $("#staff_aadhar").removeClass("parsley-error");
                    setTimeout(function() {
                        // location.reload();
                        window.location.href = '<?php echo base_url(); ?>master/staff';
                    }, 1000);
                } else {
                    if (data["message"]["staff_name_err"] != "")
                        $("#staff_name").addClass("parsley-error");
                    else
                        $("#staff_name").removeClass("parsley-error");
                    $("#staff_name_err").addClass("text-danger").html(data["message"]["staff_name_err"]);
                    if (data["message"]["user_name_err"] != "")
                        $("#user_name").addClass("parsley-error");
                    else
                        $("#user_name").removeClass("parsley-error");
                    $("#user_name_err").addClass("text-danger").html(data["message"]["user_name_err"]);
                    if (data["message"]["password_err"] != "")
                        $("#password").addClass("parsley-error");
                    else
                        $("#password").removeClass("parsley-error");
                    $("#password_err").addClass("text-danger").html(data["message"]["password_err"]);
                    if (data["message"]["email_err"] != "")
                        $("#email").addClass("parsley-error");
                    else
                        $("#email").removeClass("parsley-error");
                    $("#email_err").addClass("text-danger").html(data["message"]["email_err"]);
                    if (data["message"]["staff_mobile_err"] != "")
                        $("#staff_mobile").addClass("parsley-error");
                    else
                        $("#staff_mobile").removeClass("parsley-error");
                    $("#staff_mobile_err").addClass("text-danger").html(data["message"]["staff_mobile_err"]);
                    if (data["message"]["staff_desc_err"] != "")
                        $("#staff_desc").addClass("parsley-error");
                    else
                        $("#staff_desc").removeClass("parsley-error");
                    $("#staff_desc_err").addClass("text-danger").html(data["message"]["staff_desc_err"]);
                    if (data["message"]["roles_err"] != "")
                        $("#roles").addClass("parsley-error");
                    else
                        $("#roles").removeClass("parsley-error");
                    $("#roles_err").addClass("text-danger").html(data["message"]["roles_err"]);

                    if (data["message"]["staff_doj_err"] != "")
                        $("#staff_doj").addClass("parsley-error");
                    else
                        $("#staff_doj").removeClass("parsley-error");
                    $("#staff_doj_err").addClass("text-danger").html(data["message"]["staff_doj_err"]);
                    if (data["message"]["staff_sallary_err"] != "")
                        $("#staff_sallary").addClass("parsley-error");
                    else
                        $("#staff_sallary").removeClass("parsley-error");
                    $("#staff_sallary_err").addClass("text-danger").html(data["message"]["staff_sallary_err"]);
                    if (data["message"]["staff_profile_err"] != "")
                        $("#staff_profile").addClass("parsley-error");
                    else
                        $("#staff_profile").removeClass("parsley-error");
                    $("#staff_profile_err").addClass("text-danger").html(data["message"]["staff_profile_err"]);
                    if (data["message"]["staff_pan_err"] != "")
                        $("#staff_pan").addClass("parsley-error");
                    else
                        $("#staff_pan").removeClass("parsley-error");
                    $("#staff_pan_err").addClass("text-danger").html(data["message"]["staff_pan_err"]);
                    if (data["message"]["staff_aadhar_err"] != "")
                        $("#staff_aadhar").addClass("parsley-error");
                    else
                        $("#staff_aadhar").removeClass("parsley-error");
                    $("#staff_aadhar_err").addClass("text-danger").html(data["message"]["staff_aadhar_err"]);
                }

            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    });
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