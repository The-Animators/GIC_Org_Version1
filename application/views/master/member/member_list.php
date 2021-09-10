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
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <label for="document_name" class="col-form-label col-md-4 text-right">Document Name<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="document_name" id="document_name" value="" placeholder="Enter document Name" class="form-control">
                                                    <span id="document_name_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="document_id" hidden>1</label>
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
                                <div class="col-md-12">

                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="document_name" class="col-form-label col-md-4 text-right"><strong>Document Name : </strong></label>
                                                <div class="col-md-8 col-form-label" id="document_name_det"> </div>
                                            </div>
                                        </div>

                                    </div>

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
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-4 row">
                                            <label for="filter_grp_name" class="col-form-label col-md-5 text-right">Group Name</label>
                                            <div class="col-md-7">
                                                <select name="filter_grp_name" id="filter_grp_name" class="form-control" onchange="GroupNameBasedMemberName()"  data-toggle="select2">
                                                    <option value="null">Select Group Name</option>
                                                    <?php $client_groupname = client_groupname_dropdown();
                                                    if (!empty($client_groupname)) : foreach ($client_groupname as $row6) : ?>
                                                            <option value="<?php echo $row6["id"]; ?>"><?php echo ucwords($row6["grpname"]); ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 row">
                                            <label for="filter_name" class="col-form-label col-md-5 text-right">Name</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" id="filter_name" name="filter_name" placeholder="Enter Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4 row">
                                            <label for="filter_middle_name" class="col-form-label col-md-5 text-right">Middle Name</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" id="filter_middle_name" name="filter_middle_name" placeholder="Enter Middle Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-1 row">
                                            <label for="filter_surename" class="col-form-label col-md-5 text-right">Surname</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" id="filter_surename" name="filter_surename" placeholder="Enter Surname">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-1 row">
                                            <label for="filter_contact" class="col-form-label col-md-5 text-right">Contact</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" id="filter_contact" name="filter_contact" placeholder="Enter Contact">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-1 row">
                                            <label for="filter_email" class="col-form-label col-md-5 text-right">Email</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" id="filter_email" name="filter_email" placeholder="Enter Email">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-1 row">
                                            <label for="filter_status" class="col-form-label col-md-5 text-right">Status</label>
                                            <div class="col-md-7">
                                                <select name="filter_status" id="filter_status" class="form-control">
                                                    <option value="null">Select Status</option>
                                                    <option value="1">Active</option>
                                                    <option value="2">In-Active</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-12 mt-1 ml-2">
                                            <center><button type="submit" id="search" class="btn btn-outline-secondary waves-effect btn-xs mr-4" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="reset" class="btn btn-outline-secondary waves-effect btn-xs" onclick="Reset_data()"><b><i class="mdi mdi-undo"></i>Reset</b></button></center>
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
                                <h4 class="header-title"><?php echo $title; ?> List <span id="member_list_count"></span></h4>

                            </div>
                            <!-- <div class="col-md-4">

                            </div> -->
                            <div class="col-md-6 text-right">
                                <button type="submit" id="filter_btn" class="btn btn-outline-secondary waves-effect btn-xs"><b><i class="mdi mdi-magnify"></i>&nbsp;Filter Off</b></button>
                                <!-- <input class='btn btn-facebook btn-sm' id='AddForm' value=' Add <?php //echo $title; 
                                                                                                        ?>' type='button' /> -->
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
                                                <th>Member Name</th>
                                                <th>DOB</th>
                                                <th>Age</th>
                                                <th>Contact</th>
                                                <th>Email</th>
                                                <th>Pan Card</th>
                                                <th>Aadhar Card</th>
                                                <th>Passport</th>
                                                <th>Gst Number</th>
                                                <th>Birth Certificate</th>
                                                <th>Photo</th>
                                                <!-- <th>Member Status</th>
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

    $("#AddForm").click(function() {
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
    });
    $('#document_name').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    function clearError() {
        $("#document_name").removeClass("parsley-error");
        $("#document_name_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#document_id").text("");
        $("#document_name").val("");
        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function OnRecover(member_id) {
        // var document_id = $("#document_id").text();
        var url = "<?php echo $base_url; ?>member/recover_member";
        confirmation_alert(id = member_id, url = url, title = "Member", type = "Recover");
    }

    function OnDelete(member_id) {
        // var document_id = $("#document_id").text();
        var url = "<?php echo $base_url; ?>member/remove_member";
        confirmation_alert(id = member_id, url = url, title = "Member", type = "Delet");
    }

    function Filter_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter On');
        $('#filter_form_modal').modal('toggle');

        var filter_grp_name = $("#filter_grp_name").val();
        var filter_name = $("#filter_name").val();
        var filter_middle_name = $("#filter_middle_name").val();
        var filter_surename = $("#filter_surename").val();
        var filter_contact = $("#filter_contact").val();
        var filter_email = $("#filter_email").val();
        var filter_status = $("#filter_status").val();

        if (filter_status == "null")
            filter_status = "";
        if (filter_grp_name == "null")
            filter_grp_name = "";
        var url = "<?php echo base_url(); ?>member/filter_member_list";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_grp_name: filter_grp_name,
                    filter_name: filter_name,
                    filter_middle_name: filter_middle_name,
                    filter_surename: filter_surename,
                    filter_contact: filter_contact,
                    filter_email: filter_email,
                    filter_status: filter_status,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var member_list_count = 0;
                    $("#member_list_count").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var view_btn = "";
                        var status_btn = "";
                        var member_id = "";
                        var member_name = "";
                        var member_contact = "";
                        var dob = "";
                        var document = [];
                        var member_email = "";
                        var group_name = "";
                        var member_status = "";
                        var del_flag = "";
                        var datas = "";
                        var status = "";

                        // alert(data["count_member"]);
                        member_list_count = data["count_member"];
                        $("#member_list_count").text(" Count ( " + member_list_count + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            member_id = parseInt(data[key].id);
                            name = data[key].name;
                            middle_name = data[key].middle_name;
                            surname = data[key].surname;
                            dob = data[key].dob;
                            document = data[key].document;

                            member_contact = data[key].contact;
                            member_email = data[key].email;
                            group_name = data[key].grpname;
                            member_status = data[key].status;
                            var isActive = data[key].is_delete;

                            dob = new Date(dob);
                            var today = new Date();
                            var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                            age = parseInt(age);
                            if (isNaN(age))
                                age = 0;
                            else
                                age = age;

                            if (age > 0) {
                                age = age;
                            } else {
                                age = 0;
                            }

                            dob = new Date(dob).toLocaleDateString('en-CA'); // 2020-08-19 (year-month-day) notice the;
                            if (dob == "Invalid Date") {
                                dob = "0000-00-00";
                            }
                            // alert(age);
                            // $('#age').html(age+' years old');

                            if (name == "null" || name == "" || name == null)
                                name = "";

                            if (middle_name == "null" || middle_name == "" || middle_name == null)
                                middle_name = " ";
                            else
                                middle_name = " " + middle_name;

                            if (surname == "null" || surname == "" || surname == null)
                                surname = " ";
                            else
                                surname = " " + surname;

                            if (member_contact == "null" || member_contact == "" || member_contact == null)
                                member_contact = "";

                            if (member_email == "null" || member_email == "" || member_email == null)
                                member_email = "";

                            if (group_name == "null" || group_name == "" || group_name == null)
                                group_name = "";

                            member_name = name + middle_name + surname;
                            var doc_file_tr = '';
                            if (document == "" || document == "null" || document == null || document == undefined) {
                                doc_file_tr = '<td>NA</td><td>NA</td><td>NA</td><td>NA</td><td>NA</td><td>NA</td>';
                            } else {
                                document = JSON.parse(data[key].document);
                                $.each(document, function(key_1, val_1) {
                                    // {"pan_image":"","aadhar_image":"","passport_image":"","gst_image":"","birth_certificate":"","photo":""}

                                    pan_image = document.pan_image;
                                    aadhar_image = document.aadhar_image;
                                    passport_image = document.passport_image;
                                    gst_image = document.gst_image;
                                    birth_certificate = document.birth_certificate;
                                    photo = document.photo;
                                    // if(member_id == "7695"){
                                    //     alert(pan_image);
                                    // }
                                    if (pan_image == "null" || pan_image == "" || pan_image == null || pan_image == undefined)
                                        pan_image = "NA";
                                    else
                                        pan_image = "<a href='<?php echo base_url(); ?>member/view_doc/1/" + member_id + "/" + pan_image + "'  class=' '  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";

                                    if (aadhar_image == "null" || aadhar_image == "" || aadhar_image == null || aadhar_image == undefined)
                                        aadhar_image = "NA";
                                    else
                                        aadhar_image = "<a href='<?php echo base_url(); ?>member/view_doc/2/" + member_id + "/" + aadhar_image + "'  class=' '  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";

                                    if (passport_image == "null" || passport_image == "" || passport_image == null || passport_image == undefined)
                                        passport_image = "NA";
                                    else
                                        passport_image = "<a href='<?php echo base_url(); ?>member/view_doc/3/" + member_id + "/" + passport_image + "'  class=' '  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";

                                    if (gst_image == "null" || gst_image == "" || gst_image == null || gst_image == undefined)
                                        gst_image = "NA";
                                    else
                                        gst_image = "<a href='<?php echo base_url(); ?>member/view_doc/4/" + member_id + "/" + gst_image + "'  class=' '  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";

                                    if (birth_certificate == "null" || birth_certificate == "" || birth_certificate == null || birth_certificate == undefined)
                                        birth_certificate = "NA";
                                    else
                                        birth_certificate = "<a href='<?php echo base_url(); ?>member/view_doc/5/" + member_id + "/" + birth_certificate + "'  class=' '  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";

                                    if (photo == "null" || photo == "" || photo == null || photo == undefined)
                                        photo = "NA";
                                    else
                                        photo = "<a href='<?php echo base_url(); ?>member/view_doc/6/" + member_id + "/" + photo + "'  class=' ' target='_blank' ><b><i class='mdi mdi-eye mdi-18'></i></b></a>";

                                    doc_file_tr = '<td>' + pan_image + '</td><td>' + aadhar_image + '</td><td>' + passport_image + '</td><td>' + gst_image + '</td><td>' + birth_certificate + '</td><td>' + photo + '</td>';
                                });
                            }

                            if (!isNaN(member_id)) {
                                if (member_status == 1) {
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
                                    var delete_btn_txt = "<a class='dropdown-item delete' href='javascript:void(0);' id='delete' onClick ='OnDelete(" + member_id + ")'><b>Delete</b></a>";
                                    // var delete_btn_txt = "<button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + member_id + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item recover' href='javascript:void(0);' id='recover' onClick ='OnRecover(" + member_id + ")'><b>Recover</b></a>";
                                    // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + member_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                                }
                                var view_btn = "<a href='<?php echo $base_url . "clients/view_member/"; ?>" + member_id + "' class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view' id='view'>View</a>";

                                status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + member_id + "' value='' type='button' onClick ='updateStatus(" + member_id + "," + member_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='<?php echo $base_url . "clients/view_member/"; ?>" + member_id + "' id='view'><b>View</b></a><a class='dropdown-item edit' href='<?php echo base_url() . "clients/edit_member/"; ?>" + member_id + "' id='edit'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + member_id + "' href='javascript:void(0);' id='status_btn_" + member_id + "' onClick ='updateStatus(" + member_id + "," + member_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td> <td><center>' + group_name + '</center></td><td>' + member_name + '</td><td>' + dob + '</td><td>' + age + '</td><td>' + member_contact + '</td><td>' + member_email + '</td>' + doc_file_tr + '</tr>';
                            }
                        });

                    } else {
                        $("#member_list_count").text(" Count ( " + member_list_count + " ) ");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="17"><center>Data Not Found</center></td> </tr>';
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

        $("#filter_grp_name").val("null");
        $("#filter_name").val("");
        $("#filter_middle_name").val("");
        $("#filter_surename").val("");
        $("#filter_contact").val("");
        $("#filter_email").val("");
        $("#filter_status").val("null");
        get_member_list();
    }

    get_member_list();

    function get_member_list() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>member/get_member_list";
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
                    var member_list_count = 0;
                    $("#member_list_count").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var view_btn = "";
                        var status_btn = "";
                        var member_id = "";
                        var member_name = "";
                        var member_contact = "";
                        var dob = "";
                        var document = [];
                        var member_email = "";
                        var group_name = "";
                        var member_status = "";
                        var del_flag = "";
                        var datas = "";
                        var status = "";

                        // alert(data["count_member"]);
                        member_list_count = data["count_member"];
                        $("#member_list_count").text(" Count ( " + member_list_count + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            member_id = parseInt(data[key].id);
                            name = data[key].name;
                            middle_name = data[key].middle_name;
                            surname = data[key].surname;
                            dob = data[key].dob;
                            document = data[key].document;

                            member_contact = data[key].contact;
                            member_email = data[key].email;
                            group_name = data[key].grpname;
                            member_status = data[key].status;
                            var isActive = data[key].is_delete;

                            dob = new Date(dob);
                            var today = new Date();
                            var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                            age = parseInt(age);
                            if (isNaN(age))
                                age = 0;
                            else
                                age = age;

                            if (age > 0) {
                                age = age;
                            } else {
                                age = 0;
                            }

                            dob = new Date(dob).toLocaleDateString('en-CA'); // 2020-08-19 (year-month-day) notice the;
                            if (dob == "Invalid Date") {
                                dob = "0000-00-00";
                            }
                            // alert(age);
                            // $('#age').html(age+' years old');

                            if (name == "null" || name == "" || name == null)
                                name = "";

                            if (middle_name == "null" || middle_name == "" || middle_name == null)
                                middle_name = " ";
                            else
                                middle_name = " " + middle_name;

                            if (surname == "null" || surname == "" || surname == null)
                                surname = " ";
                            else
                                surname = " " + surname;

                            if (member_contact == "null" || member_contact == "" || member_contact == null)
                                member_contact = "";

                            if (member_email == "null" || member_email == "" || member_email == null)
                                member_email = "";

                            if (group_name == "null" || group_name == "" || group_name == null)
                                group_name = "";

                            member_name = name + middle_name + surname;
                            var doc_file_tr = '';
                            if (document == "" || document == "null" || document == null || document == undefined) {
                                doc_file_tr = '<td>NA</td><td>NA</td><td>NA</td><td>NA</td><td>NA</td><td>NA</td>';
                            } else {
                                document = JSON.parse(data[key].document);
                                $.each(document, function(key_1, val_1) {
                                    // {"pan_image":"","aadhar_image":"","passport_image":"","gst_image":"","birth_certificate":"","photo":""}

                                    pan_image = document.pan_image;
                                    aadhar_image = document.aadhar_image;
                                    passport_image = document.passport_image;
                                    gst_image = document.gst_image;
                                    birth_certificate = document.birth_certificate;
                                    photo = document.photo;
                                    // if(member_id == "7695"){
                                    //     alert(pan_image);
                                    // }
                                    if (pan_image == "null" || pan_image == "" || pan_image == null || pan_image == undefined)
                                        pan_image = "NA";
                                    else
                                        pan_image = "<a href='<?php echo base_url(); ?>member/view_doc/1/" + member_id + "/" + pan_image + "'  class=' '  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";

                                    if (aadhar_image == "null" || aadhar_image == "" || aadhar_image == null || aadhar_image == undefined)
                                        aadhar_image = "NA";
                                    else
                                        aadhar_image = "<a href='<?php echo base_url(); ?>member/view_doc/2/" + member_id + "/" + aadhar_image + "'  class=' '  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";

                                    if (passport_image == "null" || passport_image == "" || passport_image == null || passport_image == undefined)
                                        passport_image = "NA";
                                    else
                                        passport_image = "<a href='<?php echo base_url(); ?>member/view_doc/3/" + member_id + "/" + passport_image + "'  class=' '  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";

                                    if (gst_image == "null" || gst_image == "" || gst_image == null || gst_image == undefined)
                                        gst_image = "NA";
                                    else
                                        gst_image = "<a href='<?php echo base_url(); ?>member/view_doc/4/" + member_id + "/" + gst_image + "'  class=' '  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";

                                    if (birth_certificate == "null" || birth_certificate == "" || birth_certificate == null || birth_certificate == undefined)
                                        birth_certificate = "NA";
                                    else
                                        birth_certificate = "<a href='<?php echo base_url(); ?>member/view_doc/5/" + member_id + "/" + birth_certificate + "'  class=' '  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";

                                    if (photo == "null" || photo == "" || photo == null || photo == undefined)
                                        photo = "NA";
                                    else
                                        photo = "<a href='<?php echo base_url(); ?>member/view_doc/6/" + member_id + "/" + photo + "'  class=' ' target='_blank' ><b><i class='mdi mdi-eye mdi-18'></i></b></a>";

                                    doc_file_tr = '<td>' + pan_image + '</td><td>' + aadhar_image + '</td><td>' + passport_image + '</td><td>' + gst_image + '</td><td>' + birth_certificate + '</td><td>' + photo + '</td>';
                                });
                            }

                            if (!isNaN(member_id)) {
                                if (member_status == 1) {
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
                                    var delete_btn_txt = "<a class='dropdown-item delete' href='javascript:void(0);' id='delete' onClick ='OnDelete(" + member_id + ")'><b>Delete</b></a>";
                                    // var delete_btn_txt = "<button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + member_id + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item recover' href='javascript:void(0);' id='recover' onClick ='OnRecover(" + member_id + ")'><b>Recover</b></a>";
                                    // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + member_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                                }
                                var view_btn = "<a href='<?php echo $base_url . "clients/view_member/"; ?>" + member_id + "' class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view' id='view'>View</a>";

                                status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + member_id + "' value='' type='button' onClick ='updateStatus(" + member_id + "," + member_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='<?php echo $base_url . "clients/view_member/"; ?>" + member_id + "' id='view'><b>View</b></a><a class='dropdown-item edit' href='<?php echo base_url() . "clients/edit_member/"; ?>" + member_id + "' id='edit'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + member_id + "' href='javascript:void(0);' id='status_btn_" + member_id + "' onClick ='updateStatus(" + member_id + "," + member_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td> <td><center>' + group_name + '</center></td><td>' + member_name + '</td><td>' + dob + '</td><td>' + age + '</td><td>' + member_contact + '</td><td>' + member_email + '</td>' + doc_file_tr + '</tr>';
                            }
                        });

                    } else {
                        $("#member_list_count").text(" Count ( " + member_list_count + " ) ");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="17"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function updateStatus(member_id, member_status) {

        var url = "<?php echo $base_url; ?>member/update_member_status";

        if (member_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": member_id,
                    "status": member_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + member_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                            $("#edit_" + member_id).addClass(status_btn_txt);
                            $("#status_btn_" + member_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                            $("#edit_" + member_id).addClass(status_btn_txt);
                            $("#status_btn_" + member_id).text(status);
                        }

                        $("#status_btn_" + member_id).text(status);


                        $('#status_btn_' + member_id).attr('onClick', 'updateStatus(' + member_id + ',' + data["userdata"]["status"] + ')');

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
                CheckFormAccess(submenu_permission, 7, url);
                check(role_permission, 7);
            }
        }
    });
</script>