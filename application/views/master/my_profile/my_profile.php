<style>
    form i {
        margin-left: -30px;
        cursor: pointer;
    }
</style>
<link href="<?php echo base_url(); ?>assets/libs/spinkit/spinkit.css" rel="stylesheet" type="text/css">
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
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
                        <h4 class="page-title"><?php echo $title; ?> </h4>
                    </div>
                </div>
            </div>

            <div id="form_modal" class="modal fade bs-example-modal-lg bs-example-modal-center" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">My Authentication Details</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <label for="user_name" class="col-form-label col-md-4 text-right">User Name : <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="user_name" id="user_name" value="" placeholder="Enter User Name" class="form-control">
                                                    <span id="user_name_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <label for="password" class="col-form-label col-md-4 text-right">Password : <span class="text-danger">*</span></label>
                                                <div class="col-md-7">
                                                    <input type="password" name="password" id="password" value="" placeholder="Enter Password" class="form-control">
                                                    <span id="password_err"></span>
                                                </div>
                                                <div class="col-md-1">
                                                    <i class='mdi mdi-incognito mdi-18 text-info' id="show_password" onclick="show_MyAuth_password()"></i>
                                                    <!-- <i class="mdi mdi-eye mdi-18" id="togglePassword"></i> -->
                                                 </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="staff_id" hidden>1</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <center>
                                                <button id="update" onclick='onMyAuth_Update()' style="display: none;" class="btn btn-primary btn-xs">Update</button>
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
                <div class="col-lg-12">
                    <div class="card-box">
                        <div class="form-row">
                            <h4 class="header-title col-md-6 mb-6"><?php echo $title; ?></h4>
                            <span class="col-md-6 text-right" id="my_auth_btn"></span>
                        </div>

                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#profile" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                    <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                                    <span class="d-none d-sm-block">Profile</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#auth" data-toggle="tab" aria-expanded="true" class="nav-link">
                                    <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
                                    <span class="d-none d-sm-block">Authentication</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#add_proof" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span class="d-block d-sm-none"><i class="mdi mdi-email-outline"></i></span>
                                    <span class="d-none d-sm-block">Address Proof</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                                <div class="sk-circle12 sk-child avatar-xl member-thumb mx-auto mb-3">
                                    <?php if (!empty($this->session->userdata("@_staff_profile"))) : ?>
                                        <img src="<?php echo base_url(); ?>assets/staff/staff_profile/<?php echo $this->session->userdata("@_staff_profile"); ?>" class="rounded-circle img-thumbnail" alt="profile-image">
                                    <?php else : ?>
                                        <img src="<?php echo base_url(); ?>assets/gic_img/user/user_profile.jpg" class="rounded-circle img-thumbnail" alt="profile-image">
                                    <?php endif; ?>
                                    <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">

                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td width="40%">Staff Name :</td>
                                                            <td><strong><span id="staff_name_det" class="text-orange"></span></strong></td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                                <!-- <div class="form-group row">
                                                    <label for="staff_name" class="col-form-label col-md-4 text-right"><strong>Staff Name : </strong></label>
                                                    <div class="col-md-8 col-form-label" id="staff_name_det"></div>
                                                </div> -->
                                            </div>

                                            <div class="col-md-4">
                                                <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td width="40%">Email :</td>
                                                            <td><strong><span id="email_det" class="text-orange"></span></strong></td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>

                                            <div class="col-md-4">
                                                <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td width="40%">Mobile :</td>
                                                            <td><strong><span id="staff_mobile_det" class="text-orange"></span></strong></td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>

                                            <div class="col-md-4">
                                                <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td width="40%">User Roles :</td>
                                                            <td><strong><span id="roles_det" class="text-orange"></span></strong></td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>

                                            <div class="col-md-4">
                                                <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td width="40%">DOJ :</td>
                                                            <td><strong><span id="staff_doj_det" class="text-orange"></span></strong></td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                            <?php if ($this->session->userdata("@_user_role_title") == "Admin" || $this->session->userdata("@_user_role_title") == "Super Admin") : ?>
                                                <div class="col-md-4">
                                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <td width="40%">Sallary :</td>
                                                                <td><strong><span id="staff_sallary_det" class="text-orange"></span></strong></td>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            <?php endif; ?>
                                            <div class="col-md-4">
                                                <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td width="40%">Profile :</td>
                                                            <td><strong><span id="staff_profile_det" class="text-orange"></span></strong></td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                            <div class="col-md-4">
                                                <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td width="40%">Description :</td>
                                                            <td><strong><span id="staff_desc_det" class="text-orange"></span></strong></td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>

                                            <!-- <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="email" class="col-form-label col-md-4 text-right"><strong>Email : </strong></label>
                                                    <div class="col-md-8 col-form-label" id="email_det"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="user_role" class="col-form-label col-md-4 text-right"><strong>User Roles : </strong></label>
                                                    <div class="col-md-8 col-form-label" id="roles_det"></div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="staff_doj" class="col-form-label col-md-4 text-right"><strong>DOJ : </strong></label>
                                                    <div class="col-md-8 col-form-label" id="staff_doj_det"></div>
                                                </div>
                                            </div>
                                            <?php if ($this->session->userdata("@_user_role_title") == "Admin" || $this->session->userdata("@_user_role_title") == "Super Admin") : ?>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="staff_sallary" class="col-form-label col-md-4 text-right"><strong>Sallary : </strong></label>
                                                        <div class="col-md-8 col-form-label" id="staff_sallary_det"></div>
                                                    </div>
                                                </div>
                                            <?php endif; ?> -->
                                            <!-- <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="staff_profile" class="col-form-label col-md-4 text-right"><strong>Profile : </strong></label>
                                                    <div class="col-md-8 col-form-label" id="staff_profile_det"></div>
                                                </div>
                                            </div> -->


                                            <div class="col-md-12">
                                                <div class="form-group row" id="role_permission">
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane show" id="auth">
                                <div class="row mt-2">
                                    <div class="col-md-12">

                                        <div class="form-row">

                                            <div class="col-md-4">
                                                <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td width="40%">User Name :</td>
                                                            <td><strong><span id="user_name_det" class="text-orange"></span></strong></td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                            <div class="col-md-4">
                                                <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td width="40%">Password :</td>
                                                            <td><strong><span id="password_det" class="text-orange"></span></strong></td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                            <!-- <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="user_name" class="col-form-label col-md-4 text-right"><strong>User Name : </strong></label>
                                                    <div class="col-md-8 col-form-label" id="user_name_det"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="password" class="col-form-label col-md-4 text-right"><strong>Password : </strong></label>
                                                    <div class="col-md-8 col-form-label" id="password_det"></div>
                                                </div>
                                            </div> -->

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="add_proof">
                                <div class="row mt-2">
                                    <div class="col-md-12">

                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td width="40%">PAN :</td>
                                                            <td><strong><span id="staff_pan_det" class="text-orange"></span></strong></td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                            <div class="col-md-4">
                                                <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td width="40%">Aadhar :</td>
                                                            <td><strong><span id="staff_aadhar_det" class="text-orange"></span></strong></td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                            <!-- <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="staff_pan" class="col-form-label col-md-4 text-right"><strong>PAN : </strong></label>
                                                    <div class="col-md-8 col-form-label" id="staff_pan_det"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="staff_aadhar" class="col-form-label col-md-4 text-right"><strong>Aadhar : </strong></label>
                                                    <div class="col-md-8 col-form-label" id="staff_aadhar_det"></div>
                                                </div>
                                            </div> -->

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php echo date("Y"); ?> &copy; GIC by <a href="">Animator</a>
                </div>
            </div>
        </div>
    </footer>
</div>
<script>
    function show_MyAuth_password(){
        $("#show_password").attr("onclick","hide_MyAuth_password()");
        $("#show_password").removeClass("mdi mdi-incognito mdi-18 text-info");
        $("#show_password").addClass("mdi mdi-eye mdi-18 text-info");
        $("#password").attr("type","text");
    }

    function hide_MyAuth_password(){
        $("#show_password").attr("onclick","show_MyAuth_password()");
        $("#show_password").removeClass("mdi mdi-eye mdi-18 text-info");
        $("#show_password").addClass("mdi mdi-incognito mdi-18 text-info");
        $("#password").attr("type","password");
    }

    function OnDelete_Doc(staff_doc_details) {
        var staff_doc_details = staff_doc_details.split(",");
        var staff_id = staff_doc_details[0];
        var doc_type = staff_doc_details[1];
        var doc_name = staff_doc_details[2];
        var url = staff_doc_details[3];
        if (doc_type == 1)
            var title = "Profile Photo";
        else if (doc_type == 2)
            var title = "PAN Card Document";
        else if (doc_type == 3)
            var title = "Aadhar Card Document";
        document_confirmation_alert(id = staff_id, doc_type = doc_type, doc_name = doc_name, url = url, title = title, type = "Delet");
    }
    <?php if (!empty($this->session->userdata("@_staff_id"))) : ?>
        onView(<?php echo $this->session->userdata("@_staff_id"); ?>)
    <?php endif; ?>

    function clearError() {
        $("#user_name").removeClass("parsley-error");
        $("#user_name_err").removeClass("text-danger").text("");

        $("#password").removeClass("parsley-error");
        $("#password_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#staff_id").text("");
        $("#user_name").val("");
        $("#password").val("");
        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function onEdit_My_Auth(val) {
        clearError();
        $("#staff_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();
        $('#form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/staff/edit_staff";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    staff_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},

                success: function(data) {
                    if (data["status"] == true) {
                        staff_id = data["userdata"].staff_id;
                        staff_username = data["userdata"].staff_username;
                        staff_password = data["userdata"].staff_password;

                        $("#staff_id").text(staff_id);
                        $("#user_name").val(staff_username);
                        $("#password").val(staff_password);
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
                    }
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function onMyAuth_Update() {
        var staff_id = $("#staff_id").text();
        var user_name = $("#user_name").val();
        var password = $("#password").val();

        var url = "<?php echo $base_url; ?>master/staff/update_my_auth";

        $.ajax({
            type: "POST",
            url: url,
            data: {
                staff_id: staff_id,
                user_name: user_name,
                password: password,
            },
            dataType: 'json',
            async: false,
            cache: false,
            beforeSend: function() {},
            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#user_name").val("");
                    $("#user_name").removeClass("parsley-error");
                    $("#password").val("");
                    $("#password").removeClass("parsley-error");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
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

                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    function onView(val) {
        $('#view_form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/staff/edit_staff";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    staff_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},

                success: function(data) {
                    var staff_id = data["userdata"].staff_id;
                    $("#staff_name_det").text(data["userdata"].staff_name);
                    $("#user_name_det").text(data["userdata"].staff_username);
                    $("#password_det").html(asteriskCard(data["userdata"].staff_password) + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="show_password" onclick=show_password("' + data["userdata"].staff_password + '");> <i class="mdi mdi-eye mdi-18"></i></a>');
                    $("#email_det").text(data["userdata"].staff_email);
                    $("#staff_mobile_det").text(data["userdata"].staff_mobile);
                    $("#staff_desc_det").text(data["userdata"].staff_desc);
                    $("#roles_det").text(data["userdata"].user_role_title);

                    $("#staff_doj_det").text(data["userdata"].staff_doj);
                    $("#staff_sallary_det").text(data["userdata"].staff_sallary);

                    my_auth_btn = "<button class='btn btn-facebook btn-xs edit' id='edit' value='' type='button' onClick ='onEdit_My_Auth(" + staff_id + ")' >Update My Auth</button>";

                    $("#my_auth_btn").append(my_auth_btn);

                    if (data["userdata"].staff_profile == "" || data["userdata"].staff_profile == null || data["userdata"].staff_profile == undefined) {
                        var view_staff_profile = "";
                        var download_staff_profile = "";
                        var delete_staff_profile = "";
                    } else if (data["userdata"].staff_profile != "") {
                        var view_staff_profile = "<a href='<?php echo base_url(); ?>master/staff/view_doc/1/" + data["userdata"].staff_id + "/" + data["userdata"].staff_profile + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        var download_staff_profile = "<a href='<?php echo base_url(); ?>master/staff/download_doc/1/" + data["userdata"].staff_id + "/" + data["userdata"].staff_profile + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        <?php if ($this->session->userdata("@_user_role_title") == "Admin" || $this->session->userdata("@_user_role_title") == "Super Admin") : ?>
                            var delete_staff_profile = "<a onclick=OnDelete_Doc('" + data["userdata"].staff_id + ',' + 1 + ',' + data["userdata"].staff_profile + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                        <?php else : ?>
                            var delete_staff_profile = "";
                        <?php endif; ?>
                    }
                    $("#staff_profile_det").html(view_staff_profile + "&nbsp;&nbsp;&nbsp;" + download_staff_profile + "&nbsp;&nbsp;&nbsp;" + delete_staff_profile);

                    if (data["userdata"].staff_pan == "" || data["userdata"].staff_pan == null || data["userdata"].staff_pan == undefined) {
                        var view_staff_pan = "";
                        var download_staff_pan = "";
                        var delete_staff_pan = "";
                    } else if (data["userdata"].staff_pan != "") {
                        var view_staff_pan = "<a href='<?php echo base_url(); ?>master/staff/view_doc/2/" + data["userdata"].staff_id + "/" + data["userdata"].staff_pan + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        var download_staff_pan = "<a href='<?php echo base_url(); ?>master/staff/download_doc/2/" + data["userdata"].staff_id + "/" + data["userdata"].staff_pan + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        <?php if ($this->session->userdata("@_user_role_title") == "Admin" || $this->session->userdata("@_user_role_title") == "Super Admin") : ?>
                            var delete_staff_pan = "<a onclick=OnDelete_Doc('" + data["userdata"].staff_id + ',' + 2 + ',' + data["userdata"].staff_pan + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                        <?php else : ?>
                            var delete_staff_pan = "";
                        <?php endif; ?>
                    }
                    $("#staff_pan_det").html(view_staff_pan + "&nbsp;&nbsp;&nbsp;" + download_staff_pan + "&nbsp;&nbsp;&nbsp;" + delete_staff_pan);

                    if (data["userdata"].staff_aadhar == "" || data["userdata"].staff_aadhar == null || data["userdata"].staff_aadhar == undefined) {
                        var view_staff_aadhar = "";
                        var download_staff_aadhar = "";
                        var delete_staff_aadhar = "";
                    } else if (data["userdata"].staff_aadhar != "") {
                        var view_staff_aadhar = "<a href='<?php echo base_url(); ?>master/staff/view_doc/3/" + data["userdata"].staff_id + "/" + data["userdata"].staff_aadhar + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        var download_staff_aadhar = "<a href='<?php echo base_url(); ?>master/staff/download_doc/3/" + data["userdata"].staff_id + "/" + data["userdata"].staff_aadhar + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        <?php if ($this->session->userdata("@_user_role_title") == "Admin" || $this->session->userdata("@_user_role_title") == "Super Admin") : ?>
                            var delete_staff_aadhar = "<a onclick=OnDelete_Doc('" + data["userdata"].staff_id + ',' + 3 + ',' + data["userdata"].staff_aadhar + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                        <?php else : ?>
                            var delete_staff_aadhar = "";
                        <?php endif; ?>
                    }
                    $("#staff_aadhar_det").html(view_staff_aadhar + "&nbsp;&nbsp;&nbsp;" + download_staff_aadhar + "&nbsp;&nbsp;&nbsp;" + delete_staff_aadhar);

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function show_password(staff_password) {
        $("#password_det").html("");
        $("#password_det").html("Please Wait ....");
        setTimeout(function() {
            $("#password_det").html("");
            $("#password_det").html("Please Wait ....");
            $("#password_det").html("");
            $("#password_det").html(staff_password + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="hide_password" onclick=hide_password("' + staff_password + '");> <i class="mdi mdi-incognito mdi-18"></i></a>');
        }, 3000);
        // setTimeout(function() {
        //     $("#password_det").html("");
        //     $("#password_det").html("Please Wait ....");
        // }, 3000);
        // $("#password_det").html("");
        // $("#password_det").html(staff_password + '<a href="javascript:void(0);" id="hide_password" onclick=hide_password("' + staff_password + '");> <i class="mdi mdi-incognito"></i> Hide</a>');
    }

    function hide_password(staff_password) {
        $("#password_det").html("");
        $("#password_det").html("Please Wait ....");
        setTimeout(function() {
            $("#password_det").html("");
            $("#password_det").html("Please Wait ....");
            $("#password_det").html("");
            $("#password_det").html(staff_password_astrix + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="show_password" onclick=show_password("' + staff_password + '");> <i class="mdi mdi-eye mdi-18"></i></a>');
        }, 3000);
        staff_password_astrix = asteriskCard(staff_password);
        // alert(staff_password);
        // $("#password_det").html("");
        // $("#password_det").html(staff_password_astrix + '<a href="javascript:void(0);" id="show_password" onclick=show_password("' + staff_password + '");> <i class="mdi mdi-incognito"></i> Show</a>');
    }

    function asteriskCard(string) {
        var lastfour = string.length > 8 ? string.substr(string.length - (string.length - 9)) : "";
        var firstfour = string.substr(0, 1);
        var dots = '*****'.substring(0, string.length - 1);
        var total = (firstfour) + (dots.length > 0 ? '' + dots + '' : dots) + (lastfour);
        return total;
    }
</script>