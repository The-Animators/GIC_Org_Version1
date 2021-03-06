<?php

// echo '<pre>';
// print_r($client_details); exit;
$doc = (array)json_decode($client_details[0]['document']);
// $contact_per = (array)json_decode($client_details[0]['contact_person']);


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
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
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

                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5>Members Detail</h5>
                                    </div>
                                    <div class="col-md-8  text-right">
                                        <input type="button" value="Back" class="btn btn-secondary waves-effect btn-xs" onclick="history.go(-1);" />
                                        <!-- <a href="<?php //echo $back; 
                                                        ?>" class="btn btn-secondary waves-effect width-md btn-sm">Back</a> -->
                                    </div>
                                </div>
                                <!-- <h4 class="card-title"></h4> -->
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-4">

                                        <select class="form-control" name="role_type" id="role_type">
                                            <option value="">Select Role Type</option>
                                            <option value="5">Client Admin</option>
                                            <option value="6">Client Individual</option>
                                        </select>
                                        <span id="role_type_err"></span>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label>Title</label>
                                        <select class="form-control" name="title" id="title">
                                            <option value="">Select Title</option>
                                            <option value="Mr">Mr</option>
                                            <option value="Mrs">Mrs</option>
                                        </select>
                                        <span id="title_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Name</label>
                                        <input class="form-control" type="text" id="name" name="name" placeholder="Name" value="<?php
                                                                                                                                if ($client_details[0]['name'] == "null")
                                                                                                                                    echo "";
                                                                                                                                else
                                                                                                                                    echo $client_details[0]['name'];
                                                                                                                                //echo $client_details[0]['name']; 
                                                                                                                                ?>">
                                                                                                                                <span id="name_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Middle Name</label>
                                        <input class="form-control" type="text" id="middle_name" name="middle_name" placeholder="Middle Name" value="<?php
                                                                                                                                                        if ($client_details[0]['middle_name'] == "null")
                                                                                                                                                            echo "";
                                                                                                                                                        else
                                                                                                                                                            echo $client_details[0]['middle_name'];
                                                                                                                                                        //echo $client_details[0]['middle_name']; 
                                                                                                                                                        ?>">
                                        <span id="middle_name_err"></span>
                                    </div>



                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label>Surname</label>
                                        <input class="form-control" type="text" id="surname" name="surname" placeholder="Surname" value="<?php
                                                                                                                                            if ($client_details[0]['surname'] == "null")
                                                                                                                                                echo "";
                                                                                                                                            else
                                                                                                                                                echo $client_details[0]['surname'];
                                                                                                                                            ?>">
                                                                                                                                            <span id="surname_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Contact</label>
                                        <input class="form-control" type="text" id="contact" name="contact" placeholder="Contact" value="<?php echo $client_details[0]['contact']; ?>">
                                        <span id="contact_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Email</label>
                                        <input class="form-control" type="text" id="email" name="email" placeholder="Email" value="<?php echo $client_details[0]['email']; ?>">
                                        <span id="email_err"></span>
                                    </div>


                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label>Address</label>
                                        <input class="form-control" type="text" id="address" name
                                        ="address" placeholder="Address" value="<?php echo $client_details[0]['address']; ?>">
                                        <span id="address_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Relation</label>
                                        <!-- <input class="form-control" type="text" id="relation" name="relation" placeholder="Relation" value="<?php //echo $client_details[0]['relation']; 
                                                                                                                                                    ?>"> -->
                                        <?php
                                        $js = 'id="relation" class="form-control"';
                                        echo form_dropdown('relation', $getRelation, '', $js);
                                        ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Gender</label>
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Transgender">Transgender</option>
                                        </select>
                                        <span id="gender_err"></span>
                                    </div>


                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <?php
                                        $dob = $client_details[0]['dob'];
                                        if (!empty($dob)) {
                                            $orderdate = explode('-', $dob);
                                            // print_r($orderdate);
                                            // die();
                                            $year = $orderdate[0];
                                            $month   = $orderdate[1];
                                            $day  = $orderdate[2];
                                            $new_dob = $month . "/" . $day . "/" . $year;
                                        } else {
                                            $new_dob = "";
                                        }
                                        ?>
                                        <label>Date Of Birth</label>
                                        <input type="text" class="form-control" placeholder="Date Of Birth" id="dob" name="dob" value="<?php echo $new_dob; ?>">
                                        <span id="dob_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Education</label>
                                        <input type="text" class="form-control" placeholder="Education" id="education" name="education" value="<?php echo $client_details[0]['education']; ?>">
                                        <span id="education_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Proffession</label>
                                        <input type="text" class="form-control" placeholder="Proffession" id="proffession" name="proffession" value="<?php echo $client_details[0]['proffession']; ?>">
                                        <span id="proffession_err"></span>
                                    </div>


                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label>Martial Status</label>
                                        <select class="form-control" name="martial_status" id="martial_status">
                                            <option value="">Select Martial Status</option>
                                            <option value="Married">Married</option>
                                            <option value="UnMarried">UnMarried</option>
                                        </select>
                                        <span id="martial_status_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <?php
                                        $dom = $client_details[0]['dom'];
                                        if (!empty($dom)) {
                                            $orderdate1 = explode('-', $dom);
                                            // print_r($orderdate);
                                            // die();
                                            $year = $orderdate1[0];
                                            $month   = $orderdate1[1];
                                            $day  = $orderdate1[2];
                                            $new_dom = $month . "/" . $day . "/" . $year;
                                        } else {
                                            $new_dom = "";
                                        }
                                        ?>
                                        <label>Marrage Date</label>
                                        <input type="text" class="form-control" placeholder="Marrage date" id="dom" name="dom" value="<?php echo $new_dom; ?>">
                                        <span id="dom_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Annaul Income</label>
                                        <input type="text" class="form-control" placeholder="Annaul Income" id="annual_income" name="annual_income" value="<?php echo $client_details[0]['annual_income']; ?>">
                                        <span id="annual_income_err"></span>
                                    </div>


                                </div>



                                <hr>
                                <h5>KYC Detail</h5>
                                <!-- <h4 class="card-title"></h4> -->
                                <hr>


                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label>Pan card</label>
                                        <input type="text" class="form-control" placeholder="Pan Number" id="pan_number" name="pan_number" value="<?php echo $client_details[0]['pan_number']; ?>">
                                        <span id="pan_number_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Aadhar Card</label>
                                        <input type="text" class="form-control" placeholder="Aadhar Card" id="aadhar_card" name="aadhar_card" value="<?php echo $client_details[0]['aadhar_card']; ?>">
                                        <span id="aadhar_card_err"></span>
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Passport</label>
                                        <input type="text" class="form-control" placeholder="Passport" id="passport" name="passport" value="<?php echo $client_details[0]['passport']; ?>">
                                        <span id="passport_err"></span>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label>Gst Number</label>
                                        <input type="text" class="form-control" placeholder="Gstin Number" id="gst_no" name="gst_no" value="<?php echo $client_details[0]['gst_no']; ?>">
                                        <span id="gst_no_err"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <?php
                                    $base_url = base_url();
                                    if (empty($doc['pan_image'])) {
                                        $view_pan_image = "";
                                    } else if (!empty($doc['pan_image'])) {
                                        $pan_image = $doc['pan_image'];
                                        $view_pan_image = "<a href='$base_url/assets/member_doc/pan_image/$pan_image' target='_blank'><strong>View Pan Card</strong></a>";
                                    }
                                    if (empty($doc['aadhar_image'])) {
                                        $view_aadhar_image = "";
                                    } else if (!empty($doc['aadhar_image'])) {
                                        $aadhar_image = $doc['aadhar_image'];
                                        $view_aadhar_image = "<a href='$base_url/assets/member_doc/aadhar_image/$aadhar_image' target='_blank'><strong>View Aadhar Card</strong></a>";
                                    }
                                    if (empty($doc['passport_image'])) {
                                        $view_passport_image = "";
                                    } else if (!empty($doc['passport_image'])) {
                                        $passport_image = $doc['passport_image'];
                                        $view_passport_image = "<a href='$base_url/assets/member_doc/passport_image/$passport_image' target='_blank'><strong>View Passport</strong></a>";
                                    }
                                    if (empty($doc['gst_image'])) {
                                        $view_gst_image = "";
                                    } else if (!empty($doc['gst_image'])) {
                                        $gst_image = $doc['gst_image'];
                                        $view_gst_image = "<a href='$base_url/assets/member_doc/gst_image/$gst_image' target='_blank'><strong>View Gst Number</strong></a>";
                                    }
                                    if (empty($doc['birth_certificate'])) {
                                        $view_birth_certificate = "";
                                    } else if (!empty($doc['birth_certificate'])) {
                                        $birth_certificate = $doc['birth_certificate'];
                                        $view_birth_certificate = "<a href='$base_url/assets/member_doc/birth_certificate/$birth_certificate' target='_blank'><strong>View Birth Certificate</strong></a>";
                                    }
                                    if (empty($doc['photo'])) {
                                        $view_photo = "";
                                    } else if (!empty($doc['photo'])) {
                                        $photo = $doc['photo'];
                                        $view_photo = "<a href='$base_url/assets/member_doc/photo/$photo' target='_blank'><strong>View Photo</strong></a>";
                                    }
                                    ?>
                                    <div class="col-sm-2">
                                        <label>Pan Card : <?php echo $view_pan_image; ?><?php //echo @$doc['pan_image']; 
                                                                                        ?></label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="file" class="filestyle" data-buttonname="btn-secondary" id="pan_image" name="pan_image">
                                        <input type="hidden" name="old_pan_image" value="<?php echo @$doc['pan_image']; ?>" />
                                        <span id="pan_image_err"></span>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Aadhar Card : <?php echo $view_aadhar_image; ?><?php //echo @$doc['aadhar_image']; 
                                                                                                ?></label>

                                    </div>
                                    <div class="col-sm-2">
                                        <input type="file" class="filestyle" data-buttonname="btn-secondary" id="aadhar_image" name="aadhar_image">
                                        <input type="hidden" name="old_aadhar_image" value="<?php echo @$doc['aadhar_image']; ?>" />
                                        <span id="aadhar_image_err"></span>
                                    </div>

                                    <div class="col-sm-2">
                                        <label>Passport : <?php echo $view_passport_image; ?><?php //echo @$doc['passport_image']; 
                                                                                                ?></label>

                                    </div>

                                    <div class="col-sm-2">
                                        <input type="file" class="filestyle" data-buttonname="btn-secondary" id="passport_image" name="passport_image">
                                        <input type="hidden" name="old_passport_image" value="<?php echo @$doc['passport_image']; ?>" />
                                        <span id="passport_image_err"></span>
                                    </div>


                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label>Gst Number : <?php echo $view_gst_image; ?><?php //echo @$doc['gst_image']; 
                                                                                            ?></label>

                                    </div>
                                    <div class="col-sm-2">
                                        <input type="file" class="filestyle" data-buttonname="btn-secondary" id="gst_image" name="gst_image">
                                        <input type="hidden" name="old_gst_image" value="<?php echo @$doc['gst_image']; ?>" />
                                        <span id="gst_image_err"></span>
                                    </div>


                                    <div class="col-sm-2">
                                        <label>Birth Certificate : <?php echo $view_birth_certificate; ?><?php //echo @$doc['birth_certificate']; 
                                                                                                            ?></label>

                                    </div>
                                    <div class="col-sm-2">
                                        <input type="file" class="filestyle" data-buttonname="btn-secondary" id="birth_certificate" name="birth_certificate">
                                        <input type="hidden" name="old_birth_certificate" value="<?php echo @$doc['birth_certificate']; ?>" />
                                        <span id="birth_certificate_err"></span>
                                    </div>

                                    <div class="col-sm-2">
                                        <label>Photo : <?php echo $view_photo; ?><?php //echo @$doc['photo']; 
                                                                                    ?></label>

                                    </div>
                                    <div class="col-sm-2">

                                        <input type="file" class="filestyle" data-buttonname="btn-secondary" id="photo" name="photo">
                                        <input type="hidden" name="old_photo" value="<?php echo @$doc['photo']; ?>" />
                                        <span id="photo_err"></span>
                                    </div>
                                </div>
                                <hr>
                                <h4>Bio Detail</h4>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label>Height</label>
                                        <input class="form-control" type="text" id="height" name="height" placeholder="Height" value="<?php echo $client_details[0]['height']; ?>">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Weight</label>
                                        <input class="form-control" type="text" id="weight" name="weight" placeholder="Weight" value="<?php echo $client_details[0]['weight']; ?>">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Chest</label>
                                        <input class="form-control" type="text" id="chest" name="chest" placeholder="Chest" value="<?php echo $client_details[0]['chest']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label>Abdomen</label>
                                        <input class="form-control" type="text" id="abdomen" name="abdomen" placeholder="Abdomen" value="<?php echo $client_details[0]['abdomen']; ?>">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Current Health Status</label>
                                        <input class="form-control" type="text" id="current_health_status" name="current_health_status" placeholder="Current Health Status" value="<?php echo $client_details[0]['current_health_status']; ?>">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Glasses</label>
                                        <input class="form-control" type="text" id="glasses" name="glasses" placeholder="Glasses" value="<?php echo $client_details[0]['glasses']; ?>">
                                    </div>
                                </div>

                                <hr>

                                <?php
                                $j = 1;
                                foreach ($policy_section as $val) { ?>

                                    <h4><?php echo $val['policy_question_section_name']; ?></h4>

                                    <?php

                                    $sql = "select policy_question_id,question from master_policy_question_ans where fk_policy_question_section_id = " . $val['policy_question_section_id'] . " ";
                                    $query = $this->db->query($sql);
                                    $result = $query->result_array();


                                    $i = 1;
                                    foreach ($result as $qst) { ?>

                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label><b><?php echo $i; ?></b> <?php echo $qst['question'] ?></label>
                                                <input type="hidden" name="question_list[]" value="<?php echo $qst['policy_question_id'] ?>">
                                            </div>
                                            <div class="col-sm-2">
                                                <select class="form-control" id="live_or_travel<?php echo $j; ?>" name="live_or_travel[]">
                                                    <option value="">Select</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                    <option value="None">None</option>

                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" id="live_or_travel_remarks<?php echo $j; ?>" name="live_or_travel_remarks[]" placeholder="Detail/ Remark">
                                            </div>
                                        </div>
                                    <?php $i++;
                                        $j++;
                                    }   ?>

                                <?php  } ?>



                                <div class="form-group mb-0 text-center">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light btn-sm mr-1" id="updateMDetail" data-form="formData2">
                                            <i class="fa fa-save"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect btn-sm reset" data-form="permissions-form">
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
    $(document).on("click", "#updateMDetail", function(e) {
        e.preventDefault();

        var formdata = new FormData($('#formData')[0]);

        $.ajax({
            type: "POST",
            url: baseUrl + 'Clients/update_member',
            data: formdata,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#title").val("");
                    $("#name").val("");
                    $("#contact").val("");
                    $("#email").val("");
                    $("#address").val("");
                    $("#relation").val("");
                    $("#gender").val("");
                    $("#dob").val("");
                    $("#education").val("");
                    $("#proffession").val("");
                    $("#martial_status").val("");
                    $("#annual_income").val("");
                    $("#pan_number").val("");
                    $("#aadhar_card").val("");

                    $("#title").removeClass("parsley-error");
                    $("#name").removeClass("parsley-error");
                    $("#contact").removeClass("parsley-error");
                    $("#email").removeClass("parsley-error");
                    $("#address").removeClass("parsley-error");
                    $("#relation").removeClass("parsley-error");
                    $("#gender").removeClass("parsley-error");
                    $("#dob").removeClass("parsley-error");
                    $("#education").removeClass("parsley-error");
                    $("#proffession").removeClass("parsley-error");
                    $("#martial_status").removeClass("parsley-error");
                    $("#annual_income").removeClass("parsley-error");
                    $("#pan_number").removeClass("parsley-error");
                    $("#aadhar_card").removeClass("parsley-error");
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["messages"] != "") {

                        if (data["messages"]["pan_image_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["pan_image_err"], message_icone = "error");
                        if (data["messages"]["pan_image_err"] != "") {
                            $("#pan_image").addClass("parsley-error");
                            $("#pan_image").focus();
                        } else
                            $("#pan_image").removeClass("parsley-error");
                        $("#pan_image_err").addClass("text-danger").html(data["messages"]["pan_image_err"]);

                        if (data["messages"]["aadhar_image_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["aadhar_image_err"], message_icone = "error");
                        if (data["messages"]["aadhar_image_err"] != "") {
                            $("#aadhar_image").addClass("parsley-error");
                            $("#aadhar_image").focus();
                        } else
                            $("#aadhar_image").removeClass("parsley-error");
                        $("#aadhar_image_err").addClass("text-danger").html(data["messages"]["aadhar_image_err"]);

                        if (data["messages"]["passport_image_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["passport_image_err"], message_icone = "error");
                        if (data["messages"]["passport_image_err"] != "") {
                            $("#passport_image").addClass("parsley-error");
                            $("#passport_image").focus();
                        } else
                            $("#passport_image").removeClass("parsley-error");
                        $("#passport_image_err").addClass("text-danger").html(data["messages"]["passport_image_err"]);

                        if (data["messages"]["gst_image_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["gst_image_err"], message_icone = "error");
                        if (data["messages"]["gst_image_err"] != "") {
                            $("#gst_image").addClass("parsley-error");
                            $("#gst_image").focus();
                        } else
                            $("#gst_image").removeClass("parsley-error");
                        $("#gst_image_err").addClass("text-danger").html(data["messages"]["gst_image_err"]);

                        if (data["messages"]["birth_certificate_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["birth_certificate_err"], message_icone = "error");
                        if (data["messages"]["birth_certificate_err"] != "") {
                            $("#birth_certificate").addClass("parsley-error");
                            $("#birth_certificate").focus();
                        } else
                            $("#birth_certificate").removeClass("parsley-error");
                        $("#birth_certificate_err").addClass("text-danger").html(data["messages"]["birth_certificate_err"]);

                        if (data["messages"]["photo_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["photo_err"], message_icone = "error");
                        if (data["messages"]["photo_err"] != "") {
                            $("#photo").addClass("parsley-error");
                            $("#photo").focus();
                        } else
                            $("#photo").removeClass("parsley-error");
                        $("#photo_err").addClass("text-danger").html(data["messages"]["photo_err"]);

                    } else {
                        if (data["message"]["title_err"] != "") {
                            $("#title").addClass("parsley-error");
                            $("#title").focus();
                        } else
                            $("#title").removeClass("parsley-error");
                        $("#title_err").addClass("text-danger").html(data["message"]["title_err"]);

                        if (data["message"]["name_err"] != "") {
                            $("#name").addClass("parsley-error");
                            $("#name").focus();
                        } else
                            $("#name").removeClass("parsley-error");
                        $("#name_err").addClass("text-danger").html(data["message"]["name_err"]);

                        if (data["message"]["contact_err"] != "") {
                            $("#contact").addClass("parsley-error");
                            $("#contact").focus();
                        } else
                            $("#contact").removeClass("parsley-error");
                        $("#contact_err").addClass("text-danger").html(data["message"]["contact_err"]);

                        if (data["message"]["email_err"] != "") {
                            $("#email").addClass("parsley-error");
                            $("#email").focus();
                        } else
                            $("#email").removeClass("parsley-error");
                        $("#email_err").addClass("text-danger").html(data["message"]["email_err"]);

                        if (data["message"]["address_err"] != "") {
                            $("#address").addClass("parsley-error");
                            $("#address").focus();
                        } else
                            $("#address").removeClass("parsley-error");
                        $("#address_err").addClass("text-danger").html(data["message"]["address_err"]);

                        if (data["message"]["relation_err"] != "") {
                            $("#relation").addClass("parsley-error");
                            $("#relation").focus();
                        } else
                            $("#relation").removeClass("parsley-error");
                        $("#relation_err").addClass("text-danger").html(data["message"]["relation_err"]);

                        if (data["message"]["gender_err"] != "") {
                            $("#gender").addClass("parsley-error");
                            $("#gender").focus();
                        } else
                            $("#gender").removeClass("parsley-error");
                        $("#gender_err").addClass("text-danger").html(data["message"]["gender_err"]);

                        if (data["message"]["dob_err"] != "") {
                            $("#dob").addClass("parsley-error");
                            $("#dob").focus();
                        } else
                            $("#dob").removeClass("parsley-error");
                        $("#dob_err").addClass("text-danger").html(data["message"]["dob_err"]);

                        if (data["message"]["education_err"] != "") {
                            $("#education").addClass("parsley-error");
                            $("#education").focus();
                        } else
                            $("#education").removeClass("parsley-error");
                        $("#education_err").addClass("text-danger").html(data["message"]["education_err"]);

                        if (data["message"]["proffession_err"] != "") {
                            $("#proffession").addClass("parsley-error");
                            $("#proffession").focus();
                        } else
                            $("#proffession").removeClass("parsley-error");
                        $("#proffession_err").addClass("text-danger").html(data["message"]["proffession_err"]);

                        if (data["message"]["martial_status_err"] != "") {
                            $("#martial_status").addClass("parsley-error");
                            $("#martial_status").focus();
                        } else
                            $("#martial_status").removeClass("parsley-error");
                        $("#martial_status_err").addClass("text-danger").html(data["message"]["martial_status_err"]);

                        if (data["message"]["annual_income_err"] != "") {
                            $("#annual_income").addClass("parsley-error");
                            $("#annual_income").focus();
                        } else
                            $("#annual_income").removeClass("parsley-error");
                        $("#annual_income_err").addClass("text-danger").html(data["message"]["annual_income_err"]);

                        if (data["message"]["pan_number_err"] != "") {
                            $("#pan_number").addClass("parsley-error");
                            $("#pan_number").focus();
                        } else
                            $("#pan_number").removeClass("parsley-error");
                        $("#pan_number_err").addClass("text-danger").html(data["message"]["pan_number_err"]);

                        if (data["message"]["aadhar_card_err"] != "") {
                            $("#aadhar_card").addClass("parsley-error");
                            $("#aadhar_card").focus();
                        } else
                            $("#aadhar_card").removeClass("parsley-error");
                        $("#aadhar_card_err").addClass("text-danger").html(data["message"]["aadhar_card_err"]);
                    }
                }
            },

            error: function(request, status, error) {
                alert(request.responseText);
            }
        });

    });


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


    $(document).ready(function() {
        $("#dob,#dom").datepicker({
            autoclose: !0,
            todayHighlight: !0
        });

        getmDetails();
    });

    function getmDetails() {
        $("#tableData").empty();
        var c_id = "<?php echo $c_id; ?>";
        // alert(mcompany_id);
        var url = "<?php echo $base_url; ?>clients/getmDetails";
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

                            $('#title option[value="' + val.title + '"]').prop("selected", true);
                            $('#relation option[value="' + val.relation + '"]').prop("selected", true);
                            $('#role_type option[value="' + val.role_type + '"]').prop("selected", true);
                            $('#gender option[value="' + val.gender + '"]').prop("selected", true);
                            $('#martial_status option[value="' + val.martial_status + '"]').prop("selected", true);

                            var qst_and_ans = JSON.parse(val.qst_and_ans);
                            // alert(qst_and_ans);
                            var k = 1;

                        if(qst_and_ans =="null" || qst_and_ans ==null){
                            qst_and_ans = "";
                        }
                            $.each(qst_and_ans.live_or_travel, function(key, val) {

                                $('#live_or_travel' + k + ' option[value="' + val + '"]').prop("selected", true);

                                k++;
                            })
                            k = 1
                            $.each(qst_and_ans.live_or_travel_remarks, function(key, val) {

                                $("#live_or_travel_remarks" + k).val(val);

                                k++;
                            })
                        

                        });

                    }

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

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
                            $('#r_state option[value="' + val.r_state + '"]').prop("selected", true);
                            $('#o_state option[value="' + val.o_state + '"]').prop("selected", true);
                            $('#title option[value="' + val.title + '"]').prop("selected", true);
                            $('#gender option[value="' + val.gender + '"]').prop("selected", true);
                            $('#martial_status option[value="' + val.martial_status + '"]').prop("selected", true);

                            var qst_and_ans = JSON.parse(val.qst_and_ans);

                            var k = 1;

                            $.each(qst_and_ans.live_or_travel, function(key, val) {

                                $('#live_or_travel' + k + ' option[value="' + val + '"]').prop("selected", true);

                                k++;
                            })
                            k = 1
                            $.each(qst_and_ans.live_or_travel_remarks, function(key, val) {

                                $("#live_or_travel_remarks" + k).val(val);

                                k++;
                            })


                            if (val.custstatus == 1) {
                                var status = "Active";
                                var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light btn-sm";
                            } else {
                                var status = "In-Active";
                                var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light btn-sm";
                            }

                            var edit_btn = " <a href='<?php echo base_url() . "clients/edit_client/"; ?>" + val.custid + "' class='btn btn-facebook btn-sm mr-1' >Edit Company</a><button id='delete' onclick='OnDelete(" + val.custid + ")' class='btn btn-primary btn-sm mr-1'>Delete <?php echo $title; ?></button><button id='recover' onclick='OnRecover(" + val.custid + ")' class='btn btn-primary btn-sm mr-1' style='display:none;'>Recover <?php echo $title; ?></button>";

                            var status_btn = "<button class='" + status_btn_txt + "  mr-1' id='status_btn_" + val.custid + "' value='' type='button' onClick ='updateStatus(" + val.custid + "," + val.custstatus + ")' >" + status + "</button>";

                            var back_btn = '<a href="<?php echo base_url() . "clients/client_list"; ?>" class="btn btn-secondary waves-effect width-md btn-sm">Back</a>';
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