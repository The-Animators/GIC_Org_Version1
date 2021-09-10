<?php
$custumer_id = $this->uri->segment(3);
// echo '<pre>';
// print_r($client_details); exit;
// $doc = (array)json_decode(@$client_details[0]['document']);
// $contact_per = (array)json_decode(@$client_details[0]['contact_person']);


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
                        <input type="hidden" name="customer_id" value="<?php echo $custumer_id; ?>">
                        <div class="card">
                            <div class="card-body">

                                <h3>Members Detail</h3>
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

                                        <select class="form-control" name="title" id="title">
                                            <option value="">Select Title</option>
                                            <option value="Mr">Mr</option>
                                            <option value="Mrs">Mrs</option>
                                        </select>
                                        <span id="title_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="name" name="name" placeholder="Name">
                                        <span id="name_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="middle_name" name="middle_name" placeholder="Middle Name">
                                        <span id="middle_name_err"></span>
                                    </div>


                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="surname" name="surname" placeholder="Surname">
                                        <span id="surname_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="contact" name="contact" placeholder="Contact">
                                        <span id="contact_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="email" name="email" placeholder="Email">
                                        <span id="email_err"></span>
                                    </div>


                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="address" name="address" placeholder="Address">
                                        <span id="address_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- <input class="form-control" type="text" id="relation" name="relation" placeholder="Relation"> -->

                                        <?php
                                        $js = 'id="relation" class="form-control"';
                                        echo form_dropdown('relation', $getRelation, '', $js);
                                        ?>

                                    </div>
                                    <div class="col-sm-4">
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
                                        <input type="text" class="form-control member_date" placeholder="Date Of Birth" id="dob" name="dob">
                                        <span id="dob_err"></span>
                                    </div>

                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" placeholder="Education" id="education" name="education">
                                        <span id="education_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" placeholder="Proffession" id="proffession" name="proffession">
                                        <span id="proffession_err"></span>
                                    </div>


                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <select class="form-control" name="martial_status" id="martial_status">
                                            <option value="">Select Martial Status</option>
                                            <option value="Married">Married</option>
                                            <option value="UnMarried">UnMarried</option>
                                        </select>
                                        <span id="martial_status_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control member_date" placeholder="Marrage date" id="dom" name="dom">
                                        <span id="dom_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" placeholder="Annaul Income" id="annual_income" name="annual_income">
                                        <span id="annual_income_err"></span>
                                    </div>


                                </div>
                                <hr>
                                <h3>KYC Detail</h3>
                                <!-- <h4 class="card-title"></h4> -->
                                <hr>

                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" placeholder="Pan Number" id="pan_number" name="pan_number">
                                        <span id="pan_number_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" placeholder="Aadhar Card" id="aadhar_card" name="aadhar_card">
                                        <span id="aadhar_card_err"></span>
                                    </div>

                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" placeholder="Passport" id="passport" name="passport">
                                        <span id="passport_err"></span>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" placeholder="Gstin Number" id="gst_no" name="gst_no">
                                        <span id="gst_no_err"></span>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-4">
                                        <label>Pan Card</label>
                                        <input type="file" class="filestyle" data-buttonname="btn-secondary" id="pan_image" name="pan_image">
                                        <span id="pan_image_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Aadhar Card</label>
                                        <input type="file" class="filestyle" data-buttonname="btn-secondary" id="aadhar_image" name="aadhar_image">
                                        <span id="aadhar_image_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Passport </label>
                                        <input type="file" class="filestyle" data-buttonname="btn-secondary" id="passport_image" name="passport_image">
                                        <span id="passport_image_err"></span>
                                    </div>


                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label>Gst Number</label>
                                        <input type="file" class="filestyle" data-buttonname="btn-secondary" id="gst_image" name="gst_image">
                                        <span id="gst_image_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Birth Certificate</label>
                                        <input type="file" class="filestyle" data-buttonname="btn-secondary" id="birth_certificate" name="birth_certificate">
                                        <span id="birth_certificate_err"></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Photo</label>
                                        <input type="file" class="filestyle" data-buttonname="btn-secondary" id="photo" name="photo">
                                        <span id="photo_err"></span>
                                    </div>
                                </div>
                                <hr>
                                <h4>Bio Detail</h4>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="height" name="height" placeholder="Height">
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="weight" name="weight" placeholder="Weight">
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="chest" name="chest" placeholder="Chest">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="abdomen" name="abdomen" placeholder="Abdomen">
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="current_health_status" name="current_health_status" placeholder="Current Health Status">
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="glasses" name="glasses" placeholder="Glasses">
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

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name </th>
                                            <th>Contact </th>
                                            <th>Email </th>
                                            <th>address </th>
                                            <th>Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($client_details)) {
                                            foreach ($client_details as $val) {                            // $val = (array)$val; 
                                        ?>
                                                <tr>
                                                    <td><?php echo $val['name']; ?></td>
                                                    <td><?php echo $val['contact']; ?></td>
                                                    <td><?php echo $val['email']; ?></td>
                                                    <td><?php echo $val['address']; ?></td>
                                                    <td><a class="btn btn-success button button5" href="<?php echo base_url(); ?>clients/view_member/<?php echo $val['id']; ?>" type="button">View</a> <a class="btn btn-warning button button5" href="<?php echo base_url(); ?>clients/edit_member/<?php echo $val['id']; ?>" type="button">Edit</a> <button type="button" class="btn btn-danger button button5" onclick="delete_single_memb(<?php echo $val['id']; ?>)" title="Delete"><i class="fa fa fa-trash" aria-hidden="true"></i></button></td>
                                                </tr>



                                        <?php }
                                        } else {
                                            echo '<tr class="text-center"><td colspan="5">No Member Found</td> <tr>';
                                        }
                                        ?>

                                    </tbody>
                                </table>

                                <div class="form-group mb-0 text-center">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" id="AddMember" data-form="formData2">
                                            <i class="fa fa-save"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect reset" data-form="permissions-form">
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




<script src="<?= base_url(); ?>assets/js/master-clients.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/js/common.js"></script> -->

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->
<script>
    let baseUrl = "<?php echo base_url(); ?>";
</script>
<script>
    // var clickCounter=0;
    $("#addContact").click(function() {

        addContact();
    });

    function addContact() {

        //   count = count+1;
        //   $("#addContact").attr("onClick", "addContact(" + count + ")");
        var tr_table = '<div class="form-group row "><div class="col-sm-2">';
        tr_table += '<input class="form-control" type="text" name="contact_name[]" placeholder="Name" value="">';
        tr_table += '</div><div class="col-sm-2"><input class="form-control" type="text" name="mobile[]"';
        tr_table += 'placeholder="Mobile" value=""></div> <div class="col-sm-2"><input class="form-control" ';
        tr_table += 'type="text" name="whatsapp[]" placeholder="WhatsApp" value=""></div><div class="col-sm-2">';
        tr_table += '<input class="form-control" type="text" name="telegram[]" placeholder="Telegram" value="">';

        tr_table += '</div><div class="col-sm-2"><input class="form-control"type="text"name="contact_email[]"';
        tr_table += 'placeholder="Email" value=""></div> <div class="col-sm-2"> <input class="btn btn-danger delecontact';
        tr_table += ' waves-effect waves-light" type="button"  value="Delete"/></div></div>';
        $("#client_repete").append(tr_table);

    }


    $(document).ready(function() {
        $("#dob,#dom").datepicker({
            autoclose: !0,
            todayHighlight: !0
        });

        $(document).on('click', '.delecontact', function() {
            var del_e = $(this).parent().parent().remove();

        });
    });

    function delete_single_memb(id) {

        $.ajax({
            type: "POST",
            url: baseUrl + 'Clients/delete_member',
            data: {
                'id': id
            },
            // contentType: false,
            // processData: false,
            dataType: "json",
            success: function(data) {

                if (data.status == true) {
                    alert('Data Deleted Successfully');
                    window.location.reload();
                }
            },
            error: function(response) {
                alert('Error posting feeds');
                return false;
            }
        });
    }

</script>