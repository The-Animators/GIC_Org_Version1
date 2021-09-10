<?php

// echo '<pre>';
// print_r($client_details); exit;
$doc = (array)json_decode($client_details[0]['document']);
$contact_per = (array)json_decode($client_details[0]['contact_person']);


?>

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
                        <!-- <h4 class="page-title"><?php //echo $title; 
                                                    ?></h4> -->
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
                                                <label for="department_name" class="col-form-label col-md-4 text-right">Department Name<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="department_name" id="department_name" value="" placeholder="Enter Department Name" class="form-control">
                                                    <span id="department_name_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="department_id" hidden>1</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <center>
                                                <button id="update" onclick='onUpdate()' style="display: none;" class="btn btn-primary btn-xs">Update <?php echo $title; ?></button>
                                                <button id="submit" class="btn btn-primary btn-xs">Save <?php echo $title; ?></button>
                                                <button id="delete" onclick='OnDelete()' style="display: none;" class="btn btn-primary btn-xs">Delete <?php echo $title; ?></button>
                                                <button id="recover" onclick='OnRecover()' style="display: none;" class="btn btn-primary btn-xs">Recover <?php echo $title; ?></button>
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
            <!-- 
                        <style type="text/css">
    .input-group{width: 40%; float:right}
    .card-title{padding: 10px;background: #cdcdcd!important}
    label b{color: #000!important}
</style> -->
            <div class="row">
                <div class="col-12">
                </div>
                <div class="col-12" id="personalDetail">
                    <form method="POST" id="formData" enctype="multipart/form-data">
                        <input type="hidden" name="update_id" value="<?php echo $c_id; ?>">
                        <input type="hidden" name="cmid" value="<?php echo $client_details[0]['cmid']; ?>">
                        <input type="hidden" name="qst_ans_id" value="<?php echo $client_details[0]['qst_ans_id']; ?>">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <?php
                                    // if($group_list){
                                    //     echo '<a class="btn btn-primary waves-effect mr-1" href="'.base_url().'clients/group/list">View Group</a>';
                                    // }
                                    // if($group_member_list){
                                    //     echo '<a class="btn btn-primary waves-effect" href="'.base_url().'clients/member/list">View Group Member</a>';
                                    // }
                                    ?>
                                    <div class="col-md-4">
                                        <!-- <h4 class="header-title"><?php //echo "Edit " . $title; 
                                                                        ?></h4> -->
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                    <div class="col-md-4 text-right">

                                        <a href="<?php echo base_url() . "clients/client_list"; ?>" class='btn btn-secondary waves-effect btn-xs'>Back</a>
                                    </div>


                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Group Name</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="grpname" name="grpname" placeholder="Group Name" value="<?php echo $client_details[0]['grpname']; ?>" required >
                                        <span id="grpname_err"></span>
                                    </div>
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Refered By</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" required id="reffered_by" name="reffered_by" value=" <?php echo $client_details[0]['reffered_by']; ?>" placeholder="Refered By">
                                        <span id="reffered_by_err"></span>
                                    </div>
                                </div>
                                <hr>
                                <h5>Contact Person's</h5>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="button" id="addContact" value="Add" class="pull-left btn 
                                btn-primary waves-effect waves-light  btn-xs mr-1" style="clear: both" />
                                    </div>
                                </div>

                                <div id="client_repete">

                                    <?php
                                    if (!empty($contact_per['contact_name']))
                                        for ($i = 0; $i < count($contact_per['contact_name']); $i++) {
                                            // $val = (array)$val; 
                                    ?>


                                        <div class="form-group row" id="client_repete_div<?php echo $i; ?>">
                                            <div class="col-sm-2">
                                                <input class="form-control" type="text" name="contact_name[]" placeholder="Name" value="<?php echo  $contact_per['contact_name'][$i]; ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <input class="form-control" type="text" name="mobile[]" placeholder="Mobile" value="<?php echo $contact_per['mobile'][$i]; ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <input class="form-control" type="text" name="whatsapp[]" placeholder="WhatsApp" value="<?php echo $contact_per['whatsapp'][$i]; ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <input class="form-control" type="text" name="telegram[]" placeholder="Telegram" value="<?php echo $contact_per['telegram'][$i]; ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <input class="form-control" type="text" name="contact_email[]" placeholder="Email" value="<?php echo $contact_per['contact_email'][$i]; ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <input class="btn btn-danger waves-effect waves-light  btn-xs delecontact" type="button" value="Delete" />
                                            </div>

                                        </div>

                                    <?php }  ?>


                                </div>

                                <hr>
                                <h5>Residential Address</h5>
                                <hr>

                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label>Address Line 1</label>
                                        <input class="form-control" type="text" id="r_address1" name="r_address1" placeholder="Address Line 1" value="<?php echo $client_details[0]['r_address1']; ?>">
                                        <span id="r_address1_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Address Line 2</label>
                                        <input class="form-control" type="text" id="r_address2" name="r_address2" placeholder="Address line 2" value="<?php echo $client_details[0]['r_address2']; ?>">
                                        <span id="r_address2_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Address Line 3</label>
                                        <input class="form-control" type="text" id="r_address3" name="r_address3" placeholder="Address line 3" value="<?php echo $client_details[0]['r_address3']; ?>">
                                        <span id="r_address3_err"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label>State</label>
                                        <input class="form-control" type="text" id="r_state" name="r_state" placeholder="State" value="<?php echo $client_details[0]['r_state']; ?>">
                                        <?php
                                        // $js = 'id="r_state" class="form-control"';
                                        // echo form_dropdown('r_state', $states, '',$js);
                                        ?>
                                        <span id="r_state_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Residential Country</label>
                                        <input class="form-control" type="text" id="r_country" name="r_country" placeholder="Residential Country" value="<?php echo $client_details[0]['r_country']; ?>">
                                        <span id="r_country_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Residential City</label>
                                        <input class="form-control" type="text" id="r_city" name="r_city" placeholder="Residential City" value="<?php echo $client_details[0]['r_city']; ?>">
                                        <span id="r_city_err"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label>Residential Zip</label>
                                        <input class="form-control" type="text" id="r_zip" name="r_zip" placeholder="Residential Zipcode" value="<?php echo $client_details[0]['r_zip']; ?>">
                                        <span id="r_zip_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Residential Contact 1</label>
                                        <input class="form-control" type="text" id="r_office_contact1" name="r_office_contact1" placeholder="Residential Contact 1" value="<?php echo $client_details[0]['r_office_contact1']; ?>">
                                        <span id="r_office_contact1_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Residential Contact 2</label>
                                        <input class="form-control" type="text" id="r_office_contact2" name="r_office_contact2" placeholder="Residential Contact 2" value="<?php echo $client_details[0]['r_office_contact2']; ?>">
                                        <span id="r_office_contact2_err"></span>
                                    </div>
                                </div>

                                <hr>
                                <h5>
                                    Office Address
                                    <div class="pull-right" style="float: right;">
                                        <label for="sameasresidential">
                                            <input type="checkbox" class="checkbox" name="sameasresidential" id="sameasresidential">
                                            <small>Same As Home Address</small>
                                        </label>
                                    </div>
                                </h5>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label>Address Line 1</label>
                                        <input class="form-control hblank" type="text" id="o_address1" name="o_address1" placeholder="Address Line 1" value="<?php echo $client_details[0]['o_address1']; ?>">
                                        <span id="o_address1_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Address Line 2</label>
                                        <input class="form-control hblank" type="text" id="o_address2" name="o_address2" placeholder="Address line 2" value="<?php echo $client_details[0]['o_address2']; ?>">
                                        <span id="o_address2_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Address Line 3</label>
                                        <input class="form-control hblank" type="text" id="o_address3" name="o_address3" placeholder="Address line 3" value="<?php echo $client_details[0]['o_address3']; ?>">
                                        <span id="o_address3_err"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label>State</label>
                                        <input class="form-control" type="text" id="o_state" name="o_state" placeholder="State" value="<?php echo $client_details[0]['o_state']; ?>">
                                        <span id="o_state_err"></span>
                                        <?php
                                        // $js = 'id="o_state" class="form-control hblank"';
                                        // echo form_dropdown('o_state', $states, '',$js);
                                        ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Office Country</label>
                                        <input class="form-control hblank" type="text" id="o_country" name="o_country" placeholder="Office Country" value="<?php echo $client_details[0]['o_country']; ?>">
                                        <span id="o_country_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Office city</label>
                                        <input class="form-control hblank" type="text" id="o_city" name="o_city" placeholder="Office City" value="<?php echo $client_details[0]['o_city']; ?>">
                                        <span id="o_city_err"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label>Office Zip</label>
                                        <input class="form-control hblank" type="text" id="o_zip" name="o_zip" placeholder="Office Zipcode" value="<?php echo $client_details[0]['o_zip']; ?>">
                                        <span id="o_zip_err"></span> <span id="o_zip_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Office Contact 1</label>
                                        <input class="form-control hblank" type="text" id="o_office_contact1" name="o_office_contact1" placeholder="Office Contact 1" value="<?php echo $client_details[0]['o_office_contact1']; ?>">
                                        <span id="o_office_contact1_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Office Contact 2</label>
                                        <input class="form-control hblank" type="text" id="o_office_contact2" name="o_office_contact2" placeholder="Office Contact 2" value="<?php echo $client_details[0]['o_office_contact2']; ?>">
                                        <span id="o_office_contact2_err"></span>
                                    </div>
                                </div>
                                <hr>
                                <h5>Correspondence Address</h5>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <?php
                                        if ($client_details[0]['officecheck'] == 'Home') {
                                            $home = 'checked';
                                            $office = '';
                                        } else {
                                            $office = 'checked';
                                            $home = '';
                                        }
                                        ?>
                                        <label for="optradio1">
                                            <input type="radio" name="officecheck" id="optradio1" value="Home" <?php echo $home; ?> />
                                            Home Address
                                        </label>
                                        <label for="optradio2">
                                            <input type="radio" name="officecheck" id="optradio2" value="Office" <?php echo $office; ?> />
                                            Office Address
                                        </label>
                                    </div>
                                </div>
                                <!-- <div class="form-group mb-0 text-center">
                        <div>
                            <input type="hidden" id="id" name="id" value="0">
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" id="save" data-form="formData">
                                <i class="fa fa-save"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect reset" data-form="permissions-form">
                                Cancel
                            </button>
                        </div>
                    </div> -->



                                <div class="form-group mb-0 text-center">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light  btn-xs mr-1" id="update_member" data-form="formData2">
                                            <i class="fa fa-save"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect  btn-xs reset" data-form="permissions-form">
                                            Cancel
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Members Detail</h4>
                <div id="memberDetail" style="display: none">
                    <form method="POST" id="formData2">
                        
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div> -->

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
<!-- <script src="<?= base_url(); ?>assets/js/master-clients.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/js/common.js"></script> -->

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->
<script>
    let baseUrl = "<?php echo base_url(); ?>";
</script>
<script>
    $(document).on("click", "#update_member", function(e) {
        e.preventDefault();
        var formdata = new FormData($('#formData')[0]);
        // formdata.append('winner_data', 1);
        $.ajax({
            type: "POST",
            url: baseUrl + 'clients/update_client',
            data: formdata,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data) {
                if (data["status"] == true) {
                    // alert(data["customer_id"]);
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    // $("#grpname").val("");
                    // $("#reffered_by").val("");
                    // $("#r_address1").val("");
                    // $("#r_state").val("");
                    // $("#r_country").val("");
                    // $("#r_city").val("");
                    // $("#r_zip").val("");
                    // $("#r_office_contact1").val("");
                    // $("#o_address1").val("");
                    // $("#o_state").val("");
                    // $("#o_country").val("");
                    // $("#o_city").val("");
                    // $("#o_zip").val("");
                    // $("#o_office_contact1").val("");

                    $("#grpname").removeClass("parsley-error");
                    $("#reffered_by").removeClass("parsley-error");
                    $("#r_address1").removeClass("parsley-error");
                    $("#r_state").removeClass("parsley-error");
                    $("#r_country").removeClass("parsley-error");
                    $("#r_city").removeClass("parsley-error");
                    $("#r_zip").removeClass("parsley-error");
                    $("#r_office_contact1").removeClass("parsley-error");
                    $("#o_address1").removeClass("parsley-error");
                    $("#o_state").removeClass("parsley-error");
                    $("#o_country").removeClass("parsley-error");
                    $("#o_city").removeClass("parsley-error");
                    $("#o_zip").removeClass("parsley-error");
                    $("#o_office_contact1").removeClass("parsley-error");
                    setTimeout(function() {
                        // document.location.href = baseUrl + 'clients/client_list/';
                        document.location.href = baseUrl + 'clients/member_details/' +
                            data["customer_id"];
                        // location.reload();Clients/member_details/
                    }, 1000);
                } else {

                    if (data["message"]["grpname_err"] != "") {
                        $("#grpname").addClass("parsley-error");
                        $("#grpname").focus();
                    } else
                        $("#grpname").removeClass("parsley-error");
                    $("#grpname_err").addClass("text-danger").html(data["message"]["grpname_err"]);

                    if (data["message"]["reffered_by_err"] != "") {
                        $("#reffered_by").addClass("parsley-error");
                        $("#reffered_by").focus();
                    } else
                        $("#reffered_by").removeClass("parsley-error");
                    $("#reffered_by_err").addClass("text-danger").html(data["message"]["reffered_by_err"]);

                    if (data["message"]["r_address1_err"] != "") {
                        $("#r_address1").addClass("parsley-error");
                        $("#r_address1").focus();
                    } else
                        $("#r_address1").removeClass("parsley-error");
                    $("#r_address1_err").addClass("text-danger").html(data["message"]["r_address1_err"]);

                    if (data["message"]["r_state_err"] != "") {
                        $("#r_state").addClass("parsley-error");
                        $("#r_state").focus();
                    } else
                        $("#r_state").removeClass("parsley-error");
                    $("#r_state_err").addClass("text-danger").html(data["message"]["r_state_err"]);

                    if (data["message"]["r_country_err"] != "") {
                        $("#r_country").addClass("parsley-error");
                        $("#r_country").focus();
                    } else
                        $("#r_country").removeClass("parsley-error");
                    $("#r_country_err").addClass("text-danger").html(data["message"]["r_country_err"]);

                    if (data["message"]["r_city_err"] != "") {
                        $("#r_city").addClass("parsley-error");
                        $("#r_city").focus();
                    } else
                        $("#r_city").removeClass("parsley-error");
                    $("#r_city_err").addClass("text-danger").html(data["message"]["r_city_err"]);

                    if (data["message"]["r_zip_err"] != "") {
                        $("#r_zip").addClass("parsley-error");
                        $("#r_zip").focus();
                    } else
                        $("#r_zip").removeClass("parsley-error");
                    $("#r_zip_err").addClass("text-danger").html(data["message"]["r_zip_err"]);

                    if (data["message"]["r_office_contact1_err"] != "") {
                        $("#r_office_contact1").addClass("parsley-error");
                        $("#r_office_contact1").focus();
                    } else
                        $("#r_office_contact1").removeClass("parsley-error");
                    $("#r_office_contact1_err").addClass("text-danger").html(data["message"]["r_office_contact1_err"]);

                    if (data["message"]["o_address1_err"] != "") {
                        $("#o_address1").addClass("parsley-error");
                        $("#o_address1").focus();
                    } else
                        $("#o_address1").removeClass("parsley-error");
                    $("#o_address1_err").addClass("text-danger").html(data["message"]["o_address1_err"]);

                    if (data["message"]["o_state_err"] != "") {
                        $("#o_state").addClass("parsley-error");
                        $("#o_state").focus();
                    } else
                        $("#o_state").removeClass("parsley-error");
                    $("#o_state_err").addClass("text-danger").html(data["message"]["o_state_err"]);

                    if (data["message"]["o_country_err"] != "") {
                        $("#o_country").addClass("parsley-error");
                        $("#o_country").focus();
                    } else
                        $("#o_country").removeClass("parsley-error");
                    $("#o_country_err").addClass("text-danger").html(data["message"]["o_country_err"]);

                    if (data["message"]["o_city_err"] != "") {
                        $("#o_city").addClass("parsley-error");
                        $("#o_city").focus();
                    } else
                        $("#o_city").removeClass("parsley-error");
                    $("#o_city_err").addClass("text-danger").html(data["message"]["o_city_err"]);

                    if (data["message"]["o_zip_err"] != "") {
                        $("#o_zip").addClass("parsley-error");
                        $("#o_zip").focus();
                    } else
                        $("#o_zip").removeClass("parsley-error");
                    $("#o_zip_err").addClass("text-danger").html(data["message"]["o_zip_err"]);

                    if (data["message"]["o_office_contact1_err"] != "") {
                        $("#o_office_contact1").addClass("parsley-error");
                        $("#o_office_contact1").focus();
                    } else
                        $("#o_office_contact1").removeClass("parsley-error");
                    $("#o_office_contact1_err").addClass("text-danger").html(data["message"]["o_office_contact1_err"]);

                }
                // if (data.status == true) {
                //     alert('Data Updated Successfully');
                //     window.location.reload();
                // }
            },
            error: function(response) {
                alert('Error posting feeds');
                return false;
            }
        });
    });

    var clickCounter = 0;
    $("#addContact").click(function() {
        if (clickCounter == 0) {
            clickCounter = "<?php echo count($contact_per); ?>";
            clickCounter++;
        }

        //alert("The paragraph was clicked.");
        addContact(clickCounter++);
    });

    function addContact(count) {

        //   count = count+1;
        //   $("#addContact").attr("onClick", "addContact(" + count + ")");
        var tr_table = '<div class="form-group row " id="client_repete_div' + count + '"><div class="col-sm-2">';
        tr_table += '<input class="form-control" type="text" name="contact_name[]" placeholder="Name" value="">';
        tr_table += '</div><div class="col-sm-2"><input class="form-control" type="text" name="mobile[]"';
        tr_table += 'placeholder="Mobile" value=""></div> <div class="col-sm-2"><input class="form-control" ';
        tr_table += 'type="text" name="whatsapp[]" placeholder="WhatsApp" value=""></div><div class="col-sm-2">';
        tr_table += '<input class="form-control" type="text" name="telegram[]" placeholder="Telegram" value="">';

        tr_table += '</div><div class="col-sm-2"><input class="form-control"type="text"name="contact_email[]"';
        tr_table += 'placeholder="Email" value=""></div> <div class="col-sm-2"> <input class="btn btn-danger delecontact';
        tr_table += ' waves-effect waves-light btn-xs" type="button"  value="Delete"/></div></div>';
        $("#client_repete").append(tr_table);

    }
    // $(".delecontact").click(function(){
    //     removeEmprr();
    // });
    // function removeContact(elem) {
    //         var div_id = $(this).attr("type");
    //     alert(div_id);

    // };

    $(document).ready(function() {
        $(document).on('click', '.delecontact', function() {
            var del_e = $(this).parent().parent().remove();

        });
    });

    getClientDetails();

    function getClientDetails() {
        $("#tableData").empty();
        var c_id = "<?php echo $c_id; ?>";
        // alert(mcompany_id);
        var url = "<?php echo $base_url; ?>clients/getClient";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    'id': c_id
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {

                    var res = data.data;

                    if (data.status == true) {

                        $.each(res, function(key, val) {
                            // $('#r_state option[value="' + val.r_state +'"]').prop("selected", true);
                            // $('#o_state option[value="' + val.o_state +'"]').prop("selected", true);
                            // $('#title option[value="' + val.title +'"]').prop("selected", true);
                            // $('#gender option[value="' + val.gender +'"]').prop("selected", true);
                            // $('#martial_status option[value="' + val.martial_status +'"]').prop("selected", true);

                            var qst_and_ans = JSON.parse(val.qst_and_ans);

                            var k = 1;

                            $.each(qst_and_ans.live_or_travel, function(key, val) {

                                $('#live_or_travel' + k + ' option[value="' + val + '"]').prop("selected", true);

                                k++;
                            });
                            k = 1
                            $.each(qst_and_ans.live_or_travel_remarks, function(key, val) {

                                $("#live_or_travel_remarks" + k).val(val);

                                k++;
                            });

                            if (val.custstatus == 1) {
                                var status = "Active";
                                var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light btn-xs";
                            } else {
                                var status = "In-Active";
                                var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light btn-xs";
                            }

                            var edit_btn = " <a href='<?php echo base_url() . "clients/edit_client/"; ?>" + val.custid + "' class='btn btn-facebook btn-xs mr-1' >Edit Company</a><button id='delete' onclick='OnDelete(" + val.custid + ")' class='btn btn-primary btn-xs mr-1'>Delete <?php echo $title; ?></button><button id='recover' onclick='OnRecover(" + val.custid + ")' class='btn btn-primary btn-xs mr-1' style='display:none;'>Recover <?php echo $title; ?></button>";

                            var status_btn = "<button class='" + status_btn_txt + "  mr-1' id='status_btn_" + val.custid + "' value='' type='button' onClick ='updateStatus(" + val.custid + "," + val.custstatus + ")' >" + status + "</button>";

                            var back_btn = '<a href="<?php echo base_url() . "clients/client_list"; ?>" class="btn btn-secondary waves-effect width-md btn-xs">Back</a>';
                            $("#btn_details").append(edit_btn + status_btn + back_btn);
                        });

                    }

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }
</script>