
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
                                <div class="col-md-12">

                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="35%">Staff Name :</td>
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
                                                        <td width="35%">User Name :</td>
                                                        <td><strong><span id="user_name_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="user_name" class="col-form-label col-md-4 text-right"><strong>User Name : </strong></label>
                                                <div class="col-md-8 col-form-label" id="user_name_det"></div>
                                            </div> -->
                                        </div>

                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="35%">Password :</td>
                                                        <td><strong><span id="password_single_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="password" class="col-form-label col-md-4 text-right"><strong>Password : </strong></label>
                                                <div class="col-md-8 col-form-label" id="password_single_det"></div>
                                            </div> -->
                                        </div>

                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="35%">Email :</td>
                                                        <td><strong><span id="email_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="email" class="col-form-label col-md-4 text-right"><strong>Email : </strong></label>
                                                <div class="col-md-8 col-form-label" id="email_det"></div>
                                            </div> -->
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="35%">Mobile :</td>
                                                        <td><strong><span id="staff_mobile_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="email" class="col-form-label col-md-4 text-right"><strong>Mobile : </strong></label>
                                                <div class="col-md-8 col-form-label" id="staff_mobile_det"></div>
                                            </div> -->
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="35%">User Roles :</td>
                                                        <td><strong><span id="roles_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="user_role" class="col-form-label col-md-4 text-right"><strong>User Roles : </strong></label>
                                                <div class="col-md-8 col-form-label" id="roles_det"></div>
                                            </div> -->
                                        </div>

                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="35%">DOJ :</td>
                                                        <td><strong><span id="staff_doj_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="staff_doj" class="col-form-label col-md-4 text-right"><strong>DOJ : </strong></label>
                                                <div class="col-md-8 col-form-label" id="staff_doj_det"></div>
                                            </div> -->
                                        </div>
                                        <?php if ($this->session->userdata("@_user_role_title") == "Admin" || $this->session->userdata("@_user_role_title") == "Super Admin") : ?>
                                            <div class="col-md-4">
                                                <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td width="35%">Sallary :</td>
                                                            <td><strong><span id="staff_sallary_det" class="text-orange"></span></strong></td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                                <!-- <div class="form-group row">
                                                    <label for="staff_sallary" class="col-form-label col-md-4 text-right"><strong>Sallary : </strong></label>
                                                    <div class="col-md-8 col-form-label" id="staff_sallary_det"></div>
                                                </div> -->
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="35%">Profile :</td>
                                                        <td><strong><span id="staff_profile_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="staff_profile" class="col-form-label col-md-4 text-right"><strong>Profile : </strong></label>
                                                <div class="col-md-8 col-form-label" id="staff_profile_det"></div>
                                            </div> -->
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="35%">PAN :</td>
                                                        <td><strong><span id="staff_pan_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="staff_pan" class="col-form-label col-md-4 text-right"><strong>PAN : </strong></label>
                                                <div class="col-md-8 col-form-label" id="staff_pan_det"></div>
                                            </div> -->
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="35%">Aadhar :</td>
                                                        <td><strong><span id="staff_aadhar_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="staff_aadhar" class="col-form-label col-md-4 text-right"><strong>Aadhar : </strong></label>
                                                <div class="col-md-8 col-form-label" id="staff_aadhar_det"></div>
                                            </div> -->
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="35%">Description :</td>
                                                        <td><strong><span id="staff_desc_det" class="text-orange"></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <div class="form-group row">
                                                <label for="email" class="col-form-label col-md-4 text-right"><strong>Description : </strong></label>
                                                <div class="col-md-8 col-form-label" id="staff_desc_det"></div>
                                            </div> -->
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group row" id="role_permission">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="staff_card_details">

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
    getStaffList();

    function getStaffList() {
        var staff_sess_id = '<?php echo $this->session->userdata("@_staff_id"); ?>';
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/staff/get_staff_list";
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
                    var total_staff_data = 0;
                    $("#total_staff_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var staff_id = "";
                        var staff_name = "";
                        var staff_username = "";
                        var staff_email = "";
                        var user_role_title = "";
                        var staff_status = "";
                        var datas = "";
                        var status = "";
                        var isActive = "";
                        total_staff_data = data["total_staff_data"];
                        $("#total_staff_data").text(" Count ( " + total_staff_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {

                            staff_id = parseInt(data[key].staff_id);
                            staff_name = data[key].staff_name;
                            staff_username = data[key].staff_username;
                            staff_email = data[key].staff_email;
                            staff_mobile = data[key].staff_mobile;
                            staff_desc = data[key].staff_desc;
                            user_role_title = data[key].user_role_title;
                            staff_password = data[key].staff_password;
                            staff_doj = data[key].staff_doj;
                            staff_sallary = data[key].staff_sallary;
                            staff_profile = data[key].staff_profile;
                            staff_pan = data[key].staff_pan;
                            staff_aadhar = data[key].staff_aadhar;
                            staff_status = data[key].staff_status;
                            isActive = data[key].del_flag;
                            // alert(staff_doj);
                            if (staff_name == "" || staff_name == null || staff_name == undefined)
                                staff_name = "";
                            else
                                staff_name = staff_name;

                            if (staff_username == "" || staff_username == null || staff_username == undefined)
                                staff_username = "";
                            else
                                staff_username = staff_username;

                            if (staff_email == "" || staff_email == null || staff_email == undefined)
                                staff_email = "";
                            else
                                staff_email = wordwrap(staff_email, '20', '<br/>');

                            if (staff_mobile == "" || staff_mobile == null || staff_mobile == undefined)
                                staff_mobile = "";
                            else
                                staff_mobile = staff_mobile;

                            if (staff_desc == "" || staff_desc == null || staff_desc == undefined)
                                staff_desc = "";
                            else
                                staff_desc = staff_desc;

                            if (user_role_title == "" || user_role_title == null || user_role_title == undefined)
                                user_role_title = "";
                            else
                                user_role_title = user_role_title;

                            if (staff_password == "" || staff_password == null || staff_password == undefined)
                                staff_password = "";
                            else
                                staff_password = staff_password;

                            if (staff_doj == "" || staff_doj == null || staff_doj == undefined)
                                staff_doj = "";
                            else
                                staff_doj = staff_doj;

                            if (staff_sallary == "" || staff_sallary == null || staff_sallary == undefined)
                                staff_sallary = "";
                            else
                                staff_sallary = staff_sallary;


                            if (!isNaN(staff_id)) {
                                if (staff_status == 1) {
                                    status = "Un-Block";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light btn-sm edit";
                                    badge_status = '<i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>';
                                } else {
                                    status = "Block";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light btn-sm edit";
                                    badge_status = '<i class="mdi mdi-star-circle member-star text-danger" title="verified user"></i>';
                                }
                                if (isActive == 1) {
                                    var del_status = "No";
                                    var delete_btn_txt = "<a class='dropdown-item delete' href='javascript:void(0);' id='delete' value='' type='button' onClick ='OnDelete(" + staff_id + ")' ><b>Delete</b></a>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item recover' href='javascript:void(0);' id='recover' value='' type='button' onClick ='OnRecover(" + staff_id + ")' ><b>Recover</b></a>";
                                }
                                var view_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view' id='view' value='' type='button' onClick ='onView(" + staff_id + ")' >View</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='#' id='view' value='' type='button' onClick ='onView(" + staff_id + ")'><b>View</b></a><a class='dropdown-item edit' href='<?php echo base_url() . 'master/staff/staff/0/'; ?>" + staff_id + "' id='edit'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + staff_id + "' href='#' id='status_btn_" + staff_id + "' value='' type='button' onClick ='updateStatus(" + staff_id + "," + staff_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                if (staff_profile == "" || staff_profile == null || staff_profile == undefined) {
                                    var view_staff_profile = "";
                                    var download_staff_profile = "";
                                    var delete_staff_profile = "";
                                    saff_profile_img = '<img src="<?php echo base_url(); ?>assets/gic_img/user/user_profile.jpg" class="rounded-circle img-thumbnail" alt="profile-image">';
                                } else if (staff_profile != "") {
                                    var view_staff_profile = "<a href='<?php echo base_url(); ?>master/staff/view_doc/1/" + staff_id + "/" + staff_profile + "'  class='text-info'  target='_blank'><b>View</b></a>";
                                    var download_staff_profile = "<a href='<?php echo base_url(); ?>master/staff/download_doc/1/" + staff_id + "/" + staff_profile + "'  class='text-success'><b>Download</b></a>";
                                    var delete_staff_profile = "<a onclick=OnDelete_Doc('" + staff_id + ',' + 1 + ',' + staff_profile + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='#' class='text-danger'><b>Remove</b></a>";

                                    saff_profile_img = '<img src="<?php echo base_url(); ?>assets/staff/staff_profile/' + staff_profile + '" class="rounded-circle img-thumbnail" alt="profile-image">';
                                }

                                if (staff_pan == "" || staff_pan == null || staff_pan == undefined) {
                                    var view_staff_pan = "";
                                    var download_staff_pan = "";
                                    var delete_staff_pan = "";
                                } else if (staff_pan != "") {
                                    var view_staff_pan = "<a href='<?php echo base_url(); ?>master/staff/view_doc/2/" + staff_id + "/" + staff_pan + "'  class='text-info'  target='_blank'><b>View</b></a>";
                                    var download_staff_pan = "<a href='<?php echo base_url(); ?>master/staff/download_doc/2/" + staff_id + "/" + staff_pan + "'  class='text-success'><b>Download</b></a>";
                                    var delete_staff_pan = "<a onclick=OnDelete_Doc('" + staff_id + ',' + 2 + ',' + staff_pan + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='#' class='text-danger'><b>Remove</b></a>";
                                }

                                if (staff_aadhar == "" || staff_aadhar == null || staff_aadhar == undefined) {
                                    var view_staff_aadhar = "";
                                    var download_staff_aadhar = "";
                                    var delete_staff_aadhar = "";
                                } else if (staff_aadhar != "") {
                                    var view_staff_aadhar = "<a href='<?php echo base_url(); ?>master/staff/view_doc/3/" + staff_id + "/" + staff_aadhar + "'  class='text-info'  target='_blank'><b>View</b></a>";
                                    var download_staff_aadhar = "<a href='<?php echo base_url(); ?>master/staff/download_doc/3/" + staff_id + "/" + staff_aadhar + "'  class='text-success'><b>Download</b></a>";
                                    var delete_staff_aadhar = "<a onclick=OnDelete_Doc('" + staff_id + ',' + 3 + ',' + staff_aadhar + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='#' class='text-danger'><b>Remove</b></a>";
                                }

                                edit_btn = " <a href='<?php echo base_url() . "master/staff/staff/0/"; ?>" + staff_id + "' class='btn btn-facebook waves-effect waves-light btn-xs edit' id='edit'>Edit Staff</a>";
                                status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + staff_id + "' value='' type='button' onClick ='updateStatus(" + staff_id + "," + staff_status + ")' >" + status + "</button>";

                                if (staff_sess_id == staff_id) {
                                    <?php if ($this->session->userdata("@_user_role_title") == "Admin" || $this->session->userdata("@_user_role_title") == "Super Admin") : ?>
                                        staff_passs_show_div = '';
                                    <?php else : ?>
                                        staff_passs_show_div = '<div class="col-md-12"><table class="table mr-1 ml-1 mb-1 table-bordered"><thead><tr><td width="35%">Password :</td><td><strong><span class="text-orange" id="password_det_' + staff_id + '">' + asteriskCard(staff_password) + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="show_password_' + staff_id + '" onclick=show_password("' + staff_password + '","' + staff_id + '");> <i class="mdi mdi-eye mdi-18"></i></a></span></strong></td></tr></thead></table></div>';

                                    <?php endif; ?>
                                } else {
                                    staff_passs_show_div = '';
                                }

                                datas += '<div class="col-lg-3"><div class="text-center card-box"><div class="dropdown float-right"><a href="#" class="dropdown-toggle card-drop arrow-none" data-toggle="dropdown" aria-expanded="false"><div><i class="mdi mdi-dots-horizontal h3 m-0 text-muted"></i></div></a><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item view"  href="javascript:void(0);" id="view" type="button" onClick ="onView(' + staff_id + ')">View</a> <?php if ($this->session->userdata("@_user_role_title") == "Admin" || $this->session->userdata("@_user_role_title") == "Super Admin") : ?><a class="dropdown-item edit"  href="<?php echo base_url() . 'master/staff/staff/0/'; ?>' + staff_id + '" id="edit" >Edit</a>' + delete_btn_txt + '<a class="dropdown-item ' + status_btn_txt + ' status_btn_' + staff_id + '" href="javascript:void(0);" id="status_btn_' + staff_id + '" type="button" onClick ="updateStatus(' + staff_id + ',' + staff_status + ')" ><b>' + status + '</b></a><?php endif; ?></div></div>     <div class="clearfix"></div><div class="member-card"><div class="avatar-xl member-thumb mx-auto">' + saff_profile_img + badge_status + '</div>      <div class="row mt-2"><div class="col-md-12"><div class="form-row">    <div class="col-md-12"><table class="table mr-1 ml-1 mb-1 table-bordered"><thead><tr><td width="35%">Staff Name :</td><td><strong><span class="text-orange">' + staff_name + '</span></strong></td> </tr></thead></table></div>        <div class="col-md-12"><table class="table mr-1 ml-1 mb-1 table-bordered"><thead><tr><td width="35%">Email :</td><td><strong><span class="text-orange">' + staff_email + '</span></strong></td></tr></thead></table></div>     <div class="col-md-12"><table class="table mr-1 ml-1 mb-1 table-bordered"><thead><tr><td width="35%">Mobile :</td><td><strong><span class="text-orange">' + staff_mobile + '</span></strong></td></tr></thead></table></div>         <div class="col-md-12"><table class="table mr-1 ml-1 mb-1 table-bordered"><thead><tr> <td width="35%">User Roles :</td>  <td><strong><span class="text-orange">' + user_role_title + '</span></strong></td></tr></thead></table></div>            <div class="col-md-12"><table class="table mr-1 ml-1 mb-1 table-bordered"><thead><tr><td width="35%">DOJ :</td><td><strong><span class="text-orange">' + staff_doj + '</span></strong></td></tr></thead></table></div>        <?php if ($this->session->userdata("@_user_role_title") == "Admin" || $this->session->userdata("@_user_role_title") == "Super Admin") : ?><div class="col-md-12"><table class="table mr-1 ml-1 mb-1 table-bordered"><thead><tr><td width="35%">Sallary :</td><td><strong><span class="text-orange">' + staff_sallary + '</span></strong></td></tr></thead></table> </div><?php endif; ?>        <div class="col-md-12"><table class="table mr-1 ml-1 mb-1 table-bordered"><thead><tr><td width="35%">User Name :</td><td><strong><span class="text-orange">' + staff_username + '</span></strong></td></tr></thead></table></div>         ' + staff_passs_show_div + '<?php if ($this->session->userdata("@_user_role_title") == "Admin" || $this->session->userdata("@_user_role_title") == "Super Admin") : ?><div class="col-md-12"><table class="table mr-1 ml-1 mb-1 table-bordered"><thead><tr><td width="35%">Password :</td><td><strong><span class="text-orange" id="password_det_' + staff_id + '">' + asteriskCard(staff_password) + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="show_password_' + staff_id + '" onclick=show_password("' + staff_password + '","' + staff_id + '");> <i class="mdi mdi-eye mdi-18"></i></a></span></strong></td></tr></thead></table></div><?php endif; ?> </div></div></div></div> </div></div>';

                                // asteriskCard(staff_password) + '<a href="javascript:void(0);" id="show_password" onclick=show_password("' + staff_password + '");> <i class="mdi mdi-incognito mdi-18"></i> Show</a>wordwrap(data[key].website, '20', '<br/>');
                            }
                        });

                    } else {
                        $("#total_staff_data").text(" Count ( " + total_staff_data + " ) ");
                        datas = '<div class="col-lg-3"><div class="text-center card-box"><div class="dropdown float-right"><a href="#" class="dropdown-toggle card-drop arrow-none" data-toggle="dropdown" aria-expanded="false"><div><i class="mdi mdi-dots-horizontal h3 m-0 text-muted"></i></div></a><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="javascript:void(0);">Edit</a><a class="dropdown-item" href="javascript:void(0);">Delete</a><a class="dropdown-item" href="javascript:void(0);">Block</a></div></div>     <div class="clearfix"></div><div class="member-card"><div class="avatar-xl member-thumb mx-auto"><img src="<?php echo base_url(); ?>assets/gic_img/user/user_profile.jpg" class="rounded-circle img-thumbnail" alt="profile-image"><i class="mdi mdi-star-circle member-star text-success" title="verified user"></i></div>      <div class="row mt-2"><div class="col-md-12"><div class="form-row">    <div class="col-md-12"><table class="table mr-1 ml-1 mb-1 table-bordered"><thead><tr><td width="35%">Staff Name :</td><td><strong><span class="text-orange">NA</span></strong></td> </tr></thead></table></div>        <div class="col-md-12"><table class="table mr-1 ml-1 mb-1 table-bordered"><thead><tr><td width="35%">Email :</td><td><strong><span class="text-orange">NA</span></strong></td></tr></thead></table></div>            <div class="col-md-12"><table class="table mr-1 ml-1 mb-1 table-bordered"><thead><tr> <td width="35%">User Roles :</td>  <td><strong><span class="text-orange">NA</span></strong></td></tr></thead></table></div>            <div class="col-md-12"><table class="table mr-1 ml-1 mb-1 table-bordered"><thead><tr><td width="35%">DOJ :</td><td><strong><span class="text-orange">NA</span></strong></td></tr></thead></table></div>        <?php if ($this->session->userdata("@_user_role_title") == "Admin" || $this->session->userdata("@_user_role_title") == "Super Admin") : ?><div class="col-md-12"><table class="table mr-1 ml-1 mb-1 table-bordered"><thead><tr><td width="35%">Sallary :</td><td><strong><span class="text-orange">NA</span></strong></td></tr></thead></table> </div><?php endif; ?>        <div class="col-md-12"><table class="table mr-1 ml-1 mb-1 table-bordered"><thead><tr><td width="35%">User Name :</td><td><strong><span  class="text-orange">NA</span></strong></td></tr></thead></table></div>         <div class="col-md-12"><table class="table mr-1 ml-1 mb-1 table-bordered"><thead><tr><td width="35%">Password :</td><td><strong><span class="text-orange">NA</span></strong></td></tr></thead></table></div> </div></div></div></div> </div></div>';
                    }
                    $("#staff_card_details").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function OnRecover(staff_id) {
        var url = "<?php echo $base_url; ?>master/staff/recover_staff";
        confirmation_alert(id = staff_id, url = url, title = "Staff", type = "Recover");
    }

    function OnDelete(staff_id) {
        var url = "<?php echo $base_url; ?>master/staff/remove_staff";
        confirmation_alert(id = staff_id, url = url, title = "Staff", type = "Delet");
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

    function onView(val) {
        var staff_passs_show_btn = '';
        var staff_sess_id = '<?php echo $this->session->userdata("@_staff_id"); ?>';
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
                    staff_id = data["userdata"].staff_id;
                    $("#staff_name_det").text(data["userdata"].staff_name);
                    $("#user_name_det").text(data["userdata"].staff_username);
                    $("#staff_mobile_det").text(data["userdata"].staff_mobile);
                    $("#staff_desc_det").text(data["userdata"].staff_desc);

                    if (staff_sess_id == staff_id) {
                        <?php if ($this->session->userdata("@_user_role_title") == "Admin" || $this->session->userdata("@_user_role_title") == "Super Admin") : ?>
                            staff_passs_show_btn = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="show_password" onclick=show_password_single("' + data["userdata"].staff_password + '","' + staff_id + '");> <i class="mdi mdi-eye mdi-18"></i></a>';
                        <?php else : ?>
                            staff_passs_show_btn = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="show_password" onclick=show_password_single("' + data["userdata"].staff_password + '","' + staff_id + '");> <i class="mdi mdi-eye mdi-18"></i></a>';

                        <?php endif; ?>
                    } else {
                        <?php if ($this->session->userdata("@_user_role_title") == "Admin" || $this->session->userdata("@_user_role_title") == "Super Admin") : ?>
                            staff_passs_show_btn = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="show_password" onclick=show_password_single("' + data["userdata"].staff_password + '","' + staff_id + '");> <i class="mdi mdi-eye mdi-18"></i></a>';
                        <?php endif; ?>
                    }


                    $("#password_single_det").html(asteriskCard(data["userdata"].staff_password) + staff_passs_show_btn);
                    $("#email_det").text(data["userdata"].staff_email);
                    $("#roles_det").text(data["userdata"].user_role_title);

                    $("#staff_doj_det").text(data["userdata"].staff_doj);
                    $("#staff_sallary_det").text(data["userdata"].staff_sallary);

                    if (data["userdata"].staff_profile == "" || data["userdata"].staff_profile == null || data["userdata"].staff_profile == undefined) {
                        var view_staff_profile = "";
                        var download_staff_profile = "";
                        var delete_staff_profile = "";
                    } else if (data["userdata"].staff_profile != "") {
                        var view_staff_profile = "<a href='<?php echo base_url(); ?>master/staff/view_doc/1/" + data["userdata"].staff_id + "/" + data["userdata"].staff_profile + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        var download_staff_profile = "<a href='<?php echo base_url(); ?>master/staff/download_doc/1/" + data["userdata"].staff_id + "/" + data["userdata"].staff_profile + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        <?php if ($this->session->userdata("@_user_role_title") == "Admin" || $this->session->userdata("@_user_role_title") == "Super Admin") : ?>
                            var delete_staff_profile = "<a onclick=OnDelete_Doc('" + data["userdata"].staff_id + ',' + 1 + ',' + data["userdata"].staff_profile + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='#' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                        <?php else : ?>
                            var delete_staff_profile = "";
                        <?php endif; ?>
                    }


                    if (data["userdata"].staff_pan == "" || data["userdata"].staff_pan == null || data["userdata"].staff_pan == undefined) {
                        var view_staff_pan = "";
                        var download_staff_pan = "";
                        var delete_staff_pan = "";
                    } else if (data["userdata"].staff_pan != "") {
                        var view_staff_pan = "<a href='<?php echo base_url(); ?>master/staff/view_doc/2/" + data["userdata"].staff_id + "/" + data["userdata"].staff_pan + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        var download_staff_pan = "<a href='<?php echo base_url(); ?>master/staff/download_doc/2/" + data["userdata"].staff_id + "/" + data["userdata"].staff_pan + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        <?php if ($this->session->userdata("@_user_role_title") == "Admin" || $this->session->userdata("@_user_role_title") == "Super Admin") : ?>
                            var delete_staff_pan = "<a onclick=OnDelete_Doc('" + data["userdata"].staff_id + ',' + 2 + ',' + data["userdata"].staff_pan + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='#' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                        <?php else : ?>
                            var delete_staff_pan = "";
                        <?php endif; ?>
                    }


                    if (data["userdata"].staff_aadhar == "" || data["userdata"].staff_aadhar == null || data["userdata"].staff_aadhar == undefined) {
                        var view_staff_aadhar = "";
                        var download_staff_aadhar = "";
                        var delete_staff_aadhar = "";
                    } else if (data["userdata"].staff_aadhar != "") {
                        var view_staff_aadhar = "<a href='<?php echo base_url(); ?>master/staff/view_doc/3/" + data["userdata"].staff_id + "/" + data["userdata"].staff_aadhar + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        var download_staff_aadhar = "<a href='<?php echo base_url(); ?>master/staff/download_doc/3/" + data["userdata"].staff_id + "/" + data["userdata"].staff_aadhar + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        <?php if ($this->session->userdata("@_user_role_title") == "Admin" || $this->session->userdata("@_user_role_title") == "Super Admin") : ?>
                            var delete_staff_aadhar = "<a onclick=OnDelete_Doc('" + data["userdata"].staff_id + ',' + 3 + ',' + data["userdata"].staff_aadhar + ',' + '<?php echo base_url(); ?>master/staff/delete_doc' + "') href='#' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                        <?php else : ?>
                            var delete_staff_aadhar = "";
                        <?php endif; ?>
                    }


                    if (staff_sess_id == staff_id) {
                        <?php if ($this->session->userdata("@_user_role_title") == "Admin" || $this->session->userdata("@_user_role_title") == "Super Admin") : ?>
                            staff_profile_proof_show_btn = view_staff_profile + "&nbsp;&nbsp;&nbsp;" + download_staff_profile + "&nbsp;&nbsp;&nbsp;" + delete_staff_profile;
                            staff_pan_proof_show_btn = view_staff_pan + "&nbsp;&nbsp;&nbsp;" + download_staff_pan + "&nbsp;&nbsp;&nbsp;" + delete_staff_pan;
                            staff_aadhar_proof_show_btn = view_staff_aadhar + "&nbsp;&nbsp;&nbsp;" + download_staff_aadhar + "&nbsp;&nbsp;&nbsp;" + delete_staff_aadhar;
                        <?php else : ?>
                            staff_profile_proof_show_btn = view_staff_profile + "&nbsp;&nbsp;&nbsp;" + download_staff_profile;
                            staff_pan_proof_show_btn = view_staff_pan + "&nbsp;&nbsp;&nbsp;" + download_staff_pan;
                            staff_aadhar_proof_show_btn = view_staff_aadhar + "&nbsp;&nbsp;&nbsp;" + download_staff_aadhar;
                        <?php endif; ?>
                    } else {
                        <?php if ($this->session->userdata("@_user_role_title") == "Admin" || $this->session->userdata("@_user_role_title") == "Super Admin") : ?>
                            staff_profile_proof_show_btn = view_staff_profile + "&nbsp;&nbsp;&nbsp;" + download_staff_profile + "&nbsp;&nbsp;&nbsp;" + delete_staff_profile;
                            staff_pan_proof_show_btn = view_staff_pan + "&nbsp;&nbsp;&nbsp;" + download_staff_pan + "&nbsp;&nbsp;&nbsp;" + delete_staff_pan;
                            staff_aadhar_proof_show_btn = view_staff_aadhar + "&nbsp;&nbsp;&nbsp;" + download_staff_aadhar + "&nbsp;&nbsp;&nbsp;" + delete_staff_aadhar;
                        <?php endif; ?>
                    }
                    $("#staff_profile_det").html(staff_profile_proof_show_btn);
                    $("#staff_pan_det").html(staff_pan_proof_show_btn);
                    $("#staff_aadhar_det").html(staff_aadhar_proof_show_btn);

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function updateStatus(staff_id, staff_status) {

        var url = "<?php echo $base_url; ?>master/staff/update_staff_status";

        if (staff_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": staff_id,
                    "status": staff_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + staff_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["staff_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                            $("#edit_" + staff_id).addClass(status_btn_txt);
                            $("#status_btn_" + staff_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                            $("#edit_" + staff_id).addClass(status_btn_txt);
                            $("#status_btn_" + staff_id).text(status);
                        }

                        $("#status_btn_" + staff_id).text(status);


                        $('#status_btn_' + staff_id).attr('onClick', 'updateStatus(' + staff_id + ',' + data["userdata"]["menu_status"] + ')');

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

    function show_password_single(staff_password, staff_id) {
        $("#password_single_det").html("");
        $("#password_single_det").html("Please Wait ....");
        setTimeout(function() {
            $("#password_single_det").html("");
            $("#password_single_det").html("Please Wait ....");
            $("#password_single_det").html("");
            $("#password_single_det").html(staff_password + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="hide_password_' + staff_id + '" onclick=hide_password_single("' + staff_password + '","' + staff_id + '");> <i class="mdi mdi-incognito mdi-18"></i> </a>');
        }, 3000);
    }

    function hide_password_single(staff_password, staff_id) {
        $("#password_single_det").html("");
        $("#password_single_det").html("Please Wait ....");
        setTimeout(function() {
            $("#password_single_det").html("");
            $("#password_single_det").html("Please Wait ....");
            $("#password_single_det").html("");
            $("#password_single_det").html(staff_password_astrix + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="show_password_' + staff_id + '" onclick=show_password_single("' + staff_password + '","' + staff_id + '");> <i class="mdi mdi-eye mdi-18"></i> </a>');
        }, 3000);
        staff_password_astrix = asteriskCard(staff_password);
    }

    function show_password(staff_password, staff_id) {
        $("#password_det_" + staff_id).html("");
        $("#password_det_" + staff_id).html("Please Wait ....");
        setTimeout(function() {
            $("#password_det_" + staff_id).html("");
            $("#password_det_" + staff_id).html("Please Wait ....");
            $("#password_det_" + staff_id).html("");
            $("#password_det_" + staff_id).html(staff_password + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="hide_password_' + staff_id + '" onclick=hide_password("' + staff_password + '","' + staff_id + '");> <i class="mdi mdi-incognito mdi-18"></i> </a>');
        }, 3000);
    }

    function hide_password(staff_password, staff_id) {
        $("#password_det_" + staff_id).html("");
        $("#password_det_" + staff_id).html("Please Wait ....");
        setTimeout(function() {
            $("#password_det_" + staff_id).html("");
            $("#password_det_" + staff_id).html("Please Wait ....");
            $("#password_det_" + staff_id).html("");
            $("#password_det_" + staff_id).html(staff_password_astrix + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="show_password_' + staff_id + '" onclick=show_password("' + staff_password + '","' + staff_id + '");> <i class="mdi mdi-eye mdi-18"></i> </a>');
        }, 3000);
        staff_password_astrix = asteriskCard(staff_password);
    }

    function asteriskCard(string) {
        var lastfour = string.length > 8 ? string.substr(string.length - (string.length - 9)) : "";
        var firstfour = string.substr(0, 1);
        var dots = '*****'.substring(0, string.length - 1);
        var total = (firstfour) + (dots.length > 0 ? '' + dots + '' : dots) + (lastfour);
        return total;
    }

    function wordwrap(str = "", width = "", brk = "", cut = "") {
        brk = brk || 'n';
        width = width || 75;
        cut = cut || false;

        if (!str) {
            return str;
        }

        var regex = '.{1,' + width + '}(\|$)' + (cut ? '|.{' + width + '}|.+$' : '|\S+?(\|$)');

        return str.match(RegExp(regex, 'g')).join(brk);

    }
</script>