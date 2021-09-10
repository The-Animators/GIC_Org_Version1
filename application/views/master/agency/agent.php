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
                                                <label for="agent_name" class="col-form-label col-md-4 text-right">Company<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select class="form-control" id="company" name="company">
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
                                                <label for="agent_name" class="col-form-label col-md-4 text-right">Agent Name<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="agent_name" id="agent_name" value="" placeholder="Enter Agent Name" class="form-control">
                                                    <span id="agent_name_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="agent_code" class="col-form-label col-md-4 text-right">Agency Code<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="agent_code" id="agent_code" value="" placeholder="Enter Agency Code" class="form-control">
                                                    <span id="agent_code_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="username" class="col-form-label col-md-4 text-right">User ID</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="username" id="username" value="" placeholder="Enter User ID" class="form-control">
                                                    <span id="username_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="password" class="col-form-label col-md-4 text-right">Password</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="password" id="password" value="" placeholder="Enter Password" class="form-control">
                                                    <span id="password_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="agent_profile" class="col-form-label col-md-4 text-right">Profile</label>
                                                <div class="col-md-8">
                                                    <input type="file" name="agent_profile" id="agent_profile" class="form-control filestyle agent_profile" data-input="false" id="filestyle-1" tabindex="-1" onchange="check_file_upload(id ='agent_profile')">
                                                    <span id="agent_profile_err"></span>
                                                    <span id="agent_profile_det" style="display:none;"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="link" class="col-form-label col-md-4 text-right">Link</label>
                                                <div class="col-md-8">
                                                    <textarea rows="5" name="link" id="link" value="" placeholder="Enter Link" class="form-control"></textarea>
                                                    <span id="link_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="agent_id" hidden>1</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <center>
                                                <button id="update" onclick='onUpdate()' style="display: none;" class="btn btn-primary btn-sm">Update <?php echo $title; ?></button>
                                                <button id="submit" class="btn btn-primary btn-sm">Save <?php echo $title; ?></button>
                                                <!-- <button id="delete" onclick='OnDelete()' style="display: none;" class="btn btn-primary btn-sm">Delete <?php echo $title; ?></button>
                                                <button id="recover" onclick='OnRecover()' style="display: none;" class="btn btn-primary btn-sm">Recover <?php echo $title; ?></button> -->
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
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Company :</td>
                                                <td><strong><span id="company_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Agent Name :</td>
                                                <td><strong><span id="agent_name_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Agent Code :</td>
                                                <td><strong><span id="agent_code_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">User ID :</td>
                                                <td><strong><span id="username_det" class="text-orange"></span></strong></td>
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
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Link :</td>
                                                <td><strong><span id="link_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Profile :</td>
                                                <td><strong><span id="agent_profile_view_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
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

                                <div class="col-md-4">
                                    <div class="form-row">
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
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-row">
                                        <label for="filter_agent_name" class="col-form-label col-md-4 text-right">Agent Name</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="filter_agent_name" name="filter_agent_name" placeholder="Enter Agent Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-row">
                                        <label for="filter_agent_code" class="col-form-label col-md-4 text-right">Agency Code</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="filter_agent_code" name="filter_agent_code" placeholder="Enter Agency Code">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-row">
                                        <label for="filter_username" class="col-form-label col-md-4 text-right">User ID</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="filter_username" name="filter_username" placeholder="Enter User ID">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-1">
                                    <div class="form-row">
                                        <label for="filter_password" class="col-form-label col-md-4 text-right">Password</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="filter_password" name="filter_password" placeholder="Enter Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-1">
                                    <div class="form-row">
                                        <label for="filter_link" class="col-form-label col-md-4 text-right">Link</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="filter_link" name="filter_link" placeholder="Enter Link">
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
                                <div class="col-md-12 mt-1 ml-1">
                                    <center><button type="submit" id="search" class="btn btn-outline-secondary waves-effect btn-xs mr-4" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="reset" class="btn btn-outline-secondary waves-effect btn-xs" onclick="Reset_data()"><b><i class="mdi mdi-undo"></i>Reset</b></button></center>
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
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_agent_data"></span></h4>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4 text-right">
                                <input class='btn btn-facebook btn-xs' id='AddForm' value='Add' type='button' />
                                <button type="submit" id="filter_btn" class="btn btn-outline-secondary waves-effect btn-xs"><b><i class="mdi mdi-magnify"></i>&nbsp;Filter Off</b></button>
                            </div>
                        </div>

                        <div class="table-cont">
                            <table class="commission_table fixed" id="commission_table" border="1">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>SN.</th>
                                        <th>
                                            <center>Company</center>
                                        </th>
                                        <th>
                                            <center>Agent Name</center>
                                        </th>
                                        <th>Agency Code</th>
                                        <th>Portal Link</th>
                                        <th>User Id</th>
                                        <th>Password</th>
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
    $("#AddForm").click(function() {
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
        $("#agent_profile_det").hide();
    });

    $("#filter_btn").click(function() {
        $('#filter_form_modal').modal('toggle');
    });

    $('#company').on('change', function() {
        document.getElementById("update").disabled = false;
    });

    $('#agent_name').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    $('#agent_code').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    $('#username').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    $('#password').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    $('#link').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    $('#agent_profile').on('click', function() {
        document.getElementById("update").disabled = false;
    });

    function clearError() {
        $("#company").removeClass("parsley-error");
        $("#company_err").removeClass("text-danger").text("");
        
        $("#agent_name").removeClass("parsley-error");
        $("#agent_name_err").removeClass("text-danger").text("");

        $("#agent_code").removeClass("parsley-error");
        $("#agent_code_err").removeClass("text-danger").text("");

        $("#username").removeClass("parsley-error");
        $("#username_err").removeClass("text-danger").text("");

        $("#password").removeClass("parsley-error");
        $("#password_err").removeClass("text-danger").text("");

        $("#link").removeClass("parsley-error");
        $("#link_err").removeClass("text-danger").text("");

        $("#agent_profile").removeClass("parsley-error");
        $("#agent_profile_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#agent_id").text("");
        $("#company").val("null");
        $("#agent_name").val("");
        $("#agent_code").val("");
        $("#username").val("");
        $("#password").val("");
        $("#link").val("");
        $("#agent_profile").val("");

        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function check_file_upload(id) {
        if ($.inArray($('#' + id).val().split('.').pop().toLowerCase(), ['png', 'jpg', 'jpeg', 'jpe']) == -1) {
            toaster(message_type = "Error", message_txt = "Invalid Extension!", message_icone = "error");
            $('#' + id).addClass("parsley-error");
            $('#' + id + "_err").addClass("text-danger").html("Please Select Only Valid Document Like Image File Only.");
            toaster(message_type = "Error", message_txt = "Please Select Only Valid Document Like Image File Only.", message_icone = "error");
            return false;
        } else {
            $('#' + id).removeClass("parsley-error");
            $('#' + id + "_err").removeClass("text-danger").html("");
        }
    }

    function OnDelete_Doc(agent_doc_details) {
        var agent_doc_details = agent_doc_details.split(",");
        var agent_id = agent_doc_details[0];
        var doc_type = agent_doc_details[1];
        var doc_name = agent_doc_details[2];
        var url = agent_doc_details[3];

        if (doc_type == 1)
            var title = "Profile Photo";
        document_confirmation_alert(id = agent_id, doc_type = doc_type, doc_name = doc_name, url = url, title = title, type = "Delet");
    }

    function OnRecover(agent_id) {
        var url = "<?php echo $base_url; ?>master/agency/recover_agent";
        confirmation_alert(id = agent_id, url = url, title = "Agent", type = "Recover");
    }

    function OnDelete(agent_id) {
        var url = "<?php echo $base_url; ?>master/agency/remove_agent";
        confirmation_alert(id = agent_id, url = url, title = "Agent", type = "Delet");
    }

    function onView(val) {
        $('#view_form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/agency/edit_agent";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    agent_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},

                success: function(data) {
                    $("#company_det").text(data["userdata"].company_name);
                    $("#agent_name_det").text(data["userdata"].name);
                    $("#agent_code_det").text(data["userdata"].code);
                    $("#username_det").text(data["userdata"].username);
                    $("#password_det").text(data["userdata"].password);
                    // $("#link_det").text(data["userdata"].link);
                    var link = wordwrap(data["userdata"].link, '40', '<br/>', cut = '', type = "2");
                    if (link == "" || link == null || link == undefined)
                        link = '';
                    else
                        link = '<a href ="' + data["userdata"].link + '" target="_blank">[' + link + ']</a>';
                    $("#link_det").html(link);

                    var agent_id = data["userdata"].magency_id;
                    var agent_profile = data["userdata"].agent_profile;
                    if (agent_profile == "" || agent_profile == null || agent_profile == undefined) {
                        var view_agent_profile = "";
                        var download_agent_profile = "";
                        var delete_agent_profile = "";
                        $("#agent_profile_view_det").hide();
                    } else if (agent_profile != "") {
                        $("#agent_profile_view_det").show();
                        var view_agent_profile = "<a href='<?php echo base_url(); ?>master/agency/view_doc/1/" + agent_id + "/" + agent_profile + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        var download_agent_profile = "<a href='<?php echo base_url(); ?>master/agency/download_doc/1/" + agent_id + "/" + agent_profile + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        var delete_agent_profile = "<a onclick=OnDelete_Doc('" + agent_id + ',' + 1 + ',' + agent_profile + ',' + '<?php echo base_url(); ?>master/agency/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                    }
                    $("#agent_profile_view_det").html(view_agent_profile + "&nbsp;&nbsp;&nbsp;&nbsp;" + download_agent_profile + "&nbsp;&nbsp;&nbsp;&nbsp;" + delete_agent_profile);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function onEdit(val) {
        clearError();
        $("#agent_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();
        $('#form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/agency/edit_agent";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    agent_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},

                success: function(data) {
                    $("#company").val(data["userdata"].fk_mcompany_id);
                    $("#agent_id").text(data["userdata"].magency_id);
                    $("#agent_name").val(data["userdata"].name);
                    $("#agent_code").val(data["userdata"].code);
                    $("#username").val(data["userdata"].username);
                    $("#password").val(data["userdata"].password);
                    $("#link").val(data["userdata"].link);

                    var agent_id = data["userdata"].magency_id;
                    var agent_profile = data["userdata"].agent_profile;
                    if (agent_profile == "" || agent_profile == null || agent_profile == undefined) {
                        var view_agent_profile = "";
                        var download_agent_profile = "";
                        var delete_agent_profile = "";
                        $("#agent_profile_det").hide();
                    } else if (agent_profile != "") {
                        $("#agent_profile_det").show();
                        var view_agent_profile = "<a href='<?php echo base_url(); ?>master/agency/view_doc/1/" + agent_id + "/" + agent_profile + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        var download_agent_profile = "<a href='<?php echo base_url(); ?>master/agency/download_doc/1/" + agent_id + "/" + agent_profile + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        var delete_agent_profile = "<a onclick=OnDelete_Doc('" + agent_id + ',' + 1 + ',' + agent_profile + ',' + '<?php echo base_url(); ?>master/agency/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                    }
                    $("#agent_profile_det").html(view_agent_profile + "  " + download_agent_profile + "  " + delete_agent_profile);

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
        var agent_id = $("#agent_id").text();
        var company = $("#company").val();
        var agent_name = $("#agent_name").val();
        var agent_code = $("#agent_code").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var link = $("#link").val();
        var agent_profile = $('#agent_profile').prop('files')[0];
        if (company == "null")
            company = "";
        var form_data = new FormData();
        form_data.append('agent_id', agent_id);
        form_data.append('company', company);
        form_data.append('agent_name', agent_name);
        form_data.append('agent_code', agent_code);
        form_data.append('username', username);
        form_data.append('password', password);
        form_data.append('link', link);
        form_data.append('agent_profile', agent_profile);

        var url = "<?php echo $base_url; ?>master/agency/update_agent";

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
                    $("#company").val("");
                    $("#company").removeClass("parsley-error");
                    $("#agent_name").val("");
                    $("#agent_name").removeClass("parsley-error");
                    $("#agent_code").val("");
                    $("#agent_code").removeClass("parsley-error");
                    $("#username").val("");
                    $("#username").removeClass("parsley-error");
                    $("#password").val("");
                    $("#password").removeClass("parsley-error");
                    $("#link").val("");
                    $("#link").removeClass("parsley-error");
                    $("#agent_profile").val("");
                    $("#agent_profile").removeClass("parsley-error");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["messages"] != "") {
                        if (data["messages"]["agent_profile_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["agent_profile_err"], message_icone = "error");
                        if (data["messages"]["agent_profile_err"] != "")
                            $("#agent_profile").addClass("parsley-error");
                        else
                            $("#agent_profile").removeClass("parsley-error");
                        $("#agent_profile_err").addClass("text-danger").html(data["messages"]["agent_profile_err"]);

                    } else {
                        if (data["message"]["company_err"] != "")
                            $("#company").addClass("parsley-error");
                        else
                            $("#company").removeClass("parsley-error");
                        $("#company_err").addClass("text-danger").html(data["message"]["company_err"]);

                        if (data["message"]["agent_name_err"] != "")
                            $("#agent_name").addClass("parsley-error");
                        else
                            $("#agent_name").removeClass("parsley-error");
                        $("#agent_name_err").addClass("text-danger").html(data["message"]["agent_name_err"]);

                        if (data["message"]["agent_code_err"] != "")
                            $("#agent_code").addClass("parsley-error");
                        else
                            $("#agent_code").removeClass("parsley-error");
                        $("#agent_code_err").addClass("text-danger").html(data["message"]["agent_code_err"]);

                        if (data["message"]["username_err"] != "")
                            $("#username").addClass("parsley-error");
                        else
                            $("#username").removeClass("parsley-error");
                        $("#username_err").addClass("text-danger").html(data["message"]["username_err"]);

                        if (data["message"]["password_err"] != "")
                            $("#password").addClass("parsley-error");
                        else
                            $("#password").removeClass("parsley-error");
                        $("#password_err").addClass("text-danger").html(data["message"]["password_err"]);

                        if (data["message"]["link_err"] != "")
                            $("#link").addClass("parsley-error");
                        else
                            $("#link").removeClass("parsley-error");
                        $("#link_err").addClass("text-danger").html(data["message"]["link_err"]);

                        if (data["message"]["agent_profile_err"] != "")
                            $("#agent_profile").addClass("parsley-error");
                        else
                            $("#agent_profile").removeClass("parsley-error");
                        $("#agent_profile_err").addClass("text-danger").html(data["message"]["agent_profile_err"]);
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
        var agent_name = $("#agent_name").val();
        var agent_code = $("#agent_code").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var link = $("#link").val();
        var agent_profile = $('#agent_profile').prop('files')[0];

        if (company == "null")
            company = "";

        var form_data = new FormData();
        form_data.append('company', company);
        form_data.append('agent_name', agent_name);
        form_data.append('agent_code', agent_code);
        form_data.append('username', username);
        form_data.append('password', password);
        form_data.append('link', link);
        form_data.append('agent_profile', agent_profile);

        var url = "<?php echo $base_url; ?>master/agency/add_agent";

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
                    $("#company").val("");
                    $("#company").removeClass("parsley-error");
                    $("#agent_name").val("");
                    $("#agent_name").removeClass("parsley-error");
                    $("#agent_code").val("");
                    $("#agent_code").removeClass("parsley-error");
                    $("#username").val("");
                    $("#username").removeClass("parsley-error");
                    $("#password").val("");
                    $("#password").removeClass("parsley-error");
                    $("#link").val("");
                    $("#link").removeClass("parsley-error");
                    $("#agent_profile").val("");
                    $("#agent_profile").removeClass("parsley-error");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["messages"] != "") {
                        if (data["messages"]["agent_profile_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["agent_profile_err"], message_icone = "error");
                        if (data["messages"]["agent_profile_err"] != "")
                            $("#agent_profile").addClass("parsley-error");
                        else
                            $("#agent_profile").removeClass("parsley-error");
                        $("#agent_profile_err").addClass("text-danger").html(data["messages"]["agent_profile_err"]);

                    } else {

                        if (data["message"]["company_err"] != "")
                            $("#company").addClass("parsley-error");
                        else
                            $("#company").removeClass("parsley-error");
                        $("#company_err").addClass("text-danger").html(data["message"]["company_err"]);

                        if (data["message"]["agent_name_err"] != "")
                            $("#agent_name").addClass("parsley-error");
                        else
                            $("#agent_name").removeClass("parsley-error");
                        $("#agent_name_err").addClass("text-danger").html(data["message"]["agent_name_err"]);

                        if (data["message"]["agent_code_err"] != "")
                            $("#agent_code").addClass("parsley-error");
                        else
                            $("#agent_code").removeClass("parsley-error");
                        $("#agent_code_err").addClass("text-danger").html(data["message"]["agent_code_err"]);

                        if (data["message"]["username_err"] != "")
                            $("#username").addClass("parsley-error");
                        else
                            $("#username").removeClass("parsley-error");
                        $("#username_err").addClass("text-danger").html(data["message"]["username_err"]);

                        if (data["message"]["password_err"] != "")
                            $("#password").addClass("parsley-error");
                        else
                            $("#password").removeClass("parsley-error");
                        $("#password_err").addClass("text-danger").html(data["message"]["password_err"]);

                        if (data["message"]["link_err"] != "")
                            $("#link").addClass("parsley-error");
                        else
                            $("#link").removeClass("parsley-error");
                        $("#link_err").addClass("text-danger").html(data["message"]["link_err"]);

                        if (data["message"]["agent_profile_err"] != "")
                            $("#agent_profile").addClass("parsley-error");
                        else
                            $("#agent_profile").removeClass("parsley-error");
                        $("#agent_profile_err").addClass("text-danger").html(data["message"]["agent_profile_err"]);
                    }
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
        var filter_agent_name = $("#filter_agent_name").val();
        var filter_agent_code = $("#filter_agent_code").val();
        var filter_username = $("#filter_username").val();
        var filter_password = $("#filter_password").val();
        var filter_link = $("#filter_link").val();
        var filter_status = $("#filter_status").val();
        var filter_company = $("#filter_company").val();

        if (filter_status == "null")
            filter_status = "";

        if (filter_company == "null")
            filter_company = "";
        var url = "<?php echo $base_url; ?>master/agency/filter_agent_list";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_agent_name: filter_agent_name,
                    filter_agent_code: filter_agent_code,
                    filter_username: filter_username,
                    filter_password: filter_password,
                    filter_link: filter_link,
                    filter_status: filter_status,
                    filter_company: filter_company,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var total_agent_data = 0;
                    $("#total_agent_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var agent_id = "";
                        var agent_name = "";
                        var agent_code = "";
                        var username = "";
                        var password = "";
                        var link = "";
                        var agent_status = "";
                        var datas = "";
                        var status = "";
                        total_agent_data = data["total_agent_data"];
                        $("#total_agent_data").text(" Count ( " + total_agent_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            agent_id = parseInt(data[key].magency_id);
                            company_name = data[key].company_name;
                            agent_name = data[key].name;
                            agent_code = data[key].code;
                            username = data[key].username;
                            password = data[key].password;
                            link = data[key].link;
                            var link = wordwrap(link, '20', '<br/>', cut = '', type = "2");
                            if (link == "" || link == null || link == undefined)
                                link = '';
                            else
                                link = '<a href ="' + link + '" target="_blank">[' + link + ']</a>';
                            // $("#link_det").html(link);
                            // link = (link + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + "<br/>" + '$2');

                            if (company_name == "" || company_name == null || company_name == "null" || company_name == undefined || company_name == "undefined")
                                company_name = '';
                            else
                                company_name = company_name;

                            if (agent_name == "" || agent_name == null || agent_name == "null" || agent_name == undefined || agent_name == "undefined")
                                agent_name = '';
                            else
                                agent_name = agent_name;

                            if (agent_code == "" || agent_code == null || agent_code == "null" || agent_code == undefined || agent_code == "undefined")
                                agent_code = '';
                            else
                                agent_code = agent_code;

                            if (username == "" || username == null || username == "null" || username == undefined || username == "undefined")
                                username = '';
                            else
                                username = username;

                            if (password == "" || password == null || password == "null" || password == undefined || password == "undefined")
                                password = '';
                            else
                                password = password;
                            agent_status = data[key].magency_status;
                            var isActive = data[key].del_flag;
                            if (!isNaN(agent_id)) {
                                if (agent_status == 1) {
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
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + agent_id + ")'><b>Delete</b></a>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + agent_id + ")'><b>Recover</b></a>";
                                }

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + agent_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + agent_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + agent_id + "' href='javascript:void(0);' id='status_btn_" + agent_id + "' onClick ='updateStatus(" + agent_id + "," + agent_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td><td><center>' + company_name + '</center></td> <td><center>' + agent_name + '</center></td><td>' + agent_code + '</td><td>' + link + '</td><td>' + username + '</td><td>' + password + '</td></tr>';
                            }
                        });

                    } else {
                        $("#total_agent_data").text(" Count ( " + total_agent_data + " ) ");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="11"><center>Data Not Found</center></td> </tr>';
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
        $("#filter_agent_name").val("");
        $("#filter_agent_code").val("");
        $("#filter_username").val("");
        $("#filter_password").val("");
        $("#filter_link").val("");
        $("#filter_status").val("null");
        get_agent_list();
    }
    get_agent_list();

    function wordwrap(str = "", width = "", brk = "", cut = "", type = "1") { // Type 1:break, 2:not Break
        if (type == 1)
            brk = brk;
        else
            brk = '';
        brk = brk || 'n';
        width = width || 75;
        cut = cut || false;

        if (!str) {
            return str;
        }
        var regex = '.{1,' + width + '}(\|$)' + (cut ? '|.{' + width + '}|.+$' : '|\S+?(\|$)');
        return str.match(RegExp(regex, 'g')).join(brk);
    }

    function get_agent_list() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/agency/get_agent_list";
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
                    var total_agent_data = 0;
                    $("#total_agent_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var agent_id = "";
                        var agent_name = "";
                        var agent_code = "";
                        var username = "";
                        var password = "";
                        var link = "";
                        var login_our_site = "";
                        var less_income_tax = "";
                        var commission_percentage = "";
                        var agent_status = "";
                        var datas = "";
                        var status = "";
                        total_agent_data = data["total_agent_data"];
                        $("#total_agent_data").text(" Count ( " + total_agent_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            agent_id = parseInt(data[key].magency_id);
                            company_name = data[key].company_name;
                            agent_name = data[key].name;
                            agent_code = data[key].code;
                            username = data[key].username;
                            password = data[key].password;
                            link = data[key].link;
                            var link = wordwrap(link, '20', '<br/>', cut = '', type = "2");
                            if (link == "" || link == null || link == undefined)
                                link = '';
                            else
                                link = '<a href ="' + link + '" target="_blank">[' + link + ']</a>';
                            // link = (link + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + "<br/>" + '$2');

                            if (company_name == "" || company_name == null || company_name == "null" || company_name == undefined || company_name == "undefined")
                                company_name = '';
                            else
                                company_name = company_name;

                            if (agent_name == "" || agent_name == null || agent_name == "null" || agent_name == undefined || agent_name == "undefined")
                                agent_name = '';
                            else
                                agent_name = agent_name;

                            if (agent_code == "" || agent_code == null || agent_code == "null" || agent_code == undefined || agent_code == "undefined")
                                agent_code = '';
                            else
                                agent_code = agent_code;

                            if (username == "" || username == null || username == "null" || username == undefined || username == "undefined")
                                username = '';
                            else
                                username = username;

                            if (password == "" || password == null || password == "null" || password == undefined || password == "undefined")
                                password = '';
                            else
                                password = password;

                            agent_status = data[key].magency_status;
                            var isActive = data[key].del_flag;
                            if (!isNaN(agent_id)) {
                                if (agent_status == 1) {
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
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + agent_id + ")'><b>Delete</b></a>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + agent_id + ")'><b>Recover</b></a>";
                                }

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + agent_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + agent_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + agent_id + "' href='javascript:void(0);' id='status_btn_" + agent_id + "' onClick ='updateStatus(" + agent_id + "," + agent_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td><td><center>' + company_name + '</center></td> <td><center>' + agent_name + '</center></td><td>' + agent_code + '</td><td>' + link + '</td><td>' + username + '</td><td>' + password + '</td></tr>';
                            }
                        });

                    } else {
                        $("#total_agent_data").text(" Count ( " + total_agent_data + " ) ");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="11"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function updateStatus(agent_id, agent_status) {

        var url = "<?php echo $base_url; ?>master/agency/update_agent_status";

        if (agent_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": agent_id,
                    "status": agent_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + agent_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["agent_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                            $("#edit_" + agent_id).addClass(status_btn_txt);
                            $("#status_btn_" + agent_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                            $("#edit_" + agent_id).addClass(status_btn_txt);
                            $("#status_btn_" + agent_id).text(status);
                        }

                        $("#status_btn_" + agent_id).text(status);


                        $('#status_btn_' + agent_id).attr('onClick', 'updateStatus(' + agent_id + ',' + data["userdata"]["agent_status"] + ')');

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
                CheckFormAccess(submenu_permission, 10, url);
                check(role_permission, 10);
            }
        }
    });
</script>