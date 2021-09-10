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
                                    <!-- <h4 class="page-title"><?php// echo $title; ?></h4> -->
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
        <input type="hidden" name="update_id" value="<?php echo $c_id; ?>">
        <input type="hidden" name="cmid" value="<?php echo $client_details[0]['cmid']; ?>">
        <input type="hidden" name="qst_ans_id" value="<?php echo $client_details[0]['qst_ans_id']; ?>">
            <div class="card">
                <div class="card-body">
                    
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <h3>Members Detail</h3>
                        </div>
                        <div class="col-md-8  text-right">
                        <input type="button" value="Back"  class="btn btn-secondary waves-effect width-md btn-sm" onclick="history.go(-1);"  />
                            <!-- <a href="<?php //echo $back; ?>" class="btn btn-secondary waves-effect width-md btn-sm">Back</a> -->
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
                            </div>
                            <div class="col-sm-4">
                            <label>Name</label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="Name" value="<?php 
                                if($client_details[0]['name'] == "null")
                                    echo ""; 
                                else
                                    echo $client_details[0]['name']; 
                                //echo $client_details[0]['name']; ?>">
                            </div>
                            <div class="col-sm-4">
                            <label>Middle Name</label>
                                <input class="form-control" type="text" id="middle_name" name="middle_name" placeholder="Middle Name" value="<?php 
                                if($client_details[0]['middle_name'] == "null")
                                    echo ""; 
                                else
                                    echo $client_details[0]['middle_name']; 
                                //echo $client_details[0]['middle_name']; ?>">
                            </div>
                           

                            
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-4">
                            <label>Surname</label>
                                <input class="form-control" type="text" id="surname" name="surname" placeholder="Surname" value="<?php
                                if($client_details[0]['surname'] == "null")
                                    echo ""; 
                                else
                                    echo $client_details[0]['surname']; 
                                ?>">
                            </div>
                        <div class="col-sm-4">
                            <label>Contact</label>
                                <input class="form-control" type="text" id="contact" name="contact" placeholder="Contact" value="<?php echo $client_details[0]['contact']; ?>">
                            </div>
                            <div class="col-sm-4">
                            <label>Email</label>
                                <input class="form-control" type="text" id="email" name="email" placeholder="Email" value="<?php echo $client_details[0]['email']; ?>">
                            </div>
                           
                            
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-4">
                                <label>Address</label>
                                <input class="form-control" type="text" id="address" name="address" placeholder="Address" value="<?php echo $client_details[0]['address']; ?>">
                            </div>
                        <div class="col-sm-4">
                            <label>Relation</label>
                                <!-- <input class="form-control" type="text" id="relation" name="relation" placeholder="Relation" value="<?php //echo $client_details[0]['relation']; ?>"> -->
                                <?php 
                                $js = 'id="relation" class="form-control"';
                                echo form_dropdown('relation', $getRelation, '',$js);
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
                            </div>
                           
                            
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-4">
                            <label>Date Of Birth</label>
                                <input type="text" class="form-control" placeholder="Date Of Birth" id="dob" name="dob" value="<?php echo $client_details[0]['dob']; ?>">
                            </div>
                        <div class="col-sm-4">
                            <label>Education</label>
                                <input type="text" class="form-control" placeholder="Education" id="education" name="education" value="<?php echo $client_details[0]['education']; ?>">
                            </div>
                            <div class="col-sm-4">
                            <label>Proffession</label>
                                <input type="text" class="form-control" placeholder="Proffession" id="proffession" name="proffession" value="<?php echo $client_details[0]['proffession']; ?>">
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
                            </div>
                        <div class="col-sm-4">
                            <label>Marrage Date</label>
                                <input type="text" class="form-control" placeholder="Marrage date" id="dom" name="dom" value="<?php echo $client_details[0]['dom']; ?>">
                            </div>
                            <div class="col-sm-4">
                            <label>Annaul Income</label>
                                <input type="text" class="form-control" placeholder="Annaul Income" id="annual_income" name="annual_income" value="<?php echo $client_details[0]['annual_income']; ?>">
                            </div>
                            
                            
                        </div>



                        <hr>
                        <h3>KYC Detail</h3>
                        <!-- <h4 class="card-title"></h4> -->
                        <hr>

                        
                        <div class="form-group row">
                        <div class="col-sm-4">
                                <label>Pan card</label>
                                <input type="text" class="form-control" placeholder="Pan Number" id="pan_number" name="pan_number" value="<?php echo $client_details[0]['pan_number']; ?>">
                            </div>
                        <div class="col-sm-4">
                            <label>Aadhar Card</label>
                                <input type="text" class="form-control" placeholder="Aadhar Card" id="aadhar_card" name="aadhar_card" value="<?php echo $client_details[0]['aadhar_card']; ?>">
                            </div>
                            
                            <div class="col-sm-4">
                            <label>Passport</label>
                                <input type="text" class="form-control" placeholder="Passport" id="passport" name="passport" value="<?php echo $client_details[0]['passport']; ?>">
                            </div>
                            
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-4">
                            <label>Gst Number</label>
                                <input type="text" class="form-control" placeholder="Gstin Number" id="gst_no" name="gst_no" value="<?php echo $client_details[0]['gst_no']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-2">
                             <label>Pan Card : <?php echo @$doc['pan_image'];?></label>
                            

                        </div>
                            <div class="col-sm-2">
                                <input type="file" class="filestyle"  data-buttonname="btn-secondary" id="pan_image" name="pan_image">
                                <input type="hidden" name="old_pan_image" value="<?php echo @$doc['pan_image'];?>"/>
                            </div>
                            <div class="col-sm-2">
                            <label>Aadhar Card :<?php echo @$doc['aadhar_image'];?></label>
                            
                        </div>
                            <div class="col-sm-2">
                                <input type="file" class="filestyle"  data-buttonname="btn-secondary" id="aadhar_image" name="aadhar_image" >
                                <input type="hidden" name="old_aadhar_image" value="<?php echo @$doc['aadhar_image'];?>"/>
                            </div>

                            <div class="col-sm-2">
                            <label>Passport : <?php echo @$doc['passport_image'];?></label>
                            
                        </div>

                            <div class="col-sm-2">
                                <input type="file" class="filestyle" data-buttonname="btn-secondary" id="passport_image" name="passport_image">
                                <input type="hidden" name="old_passport_image" value="<?php echo @$doc['passport_image'];?>"/>
                            </div>
                            
                            
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-2">
                                <label>Gst Number : <?php echo @$doc['gst_image'];?></label>
                               
                            </div>
                        <div class="col-sm-2">
                                <input type="file" class="filestyle"  data-buttonname="btn-secondary" id="gst_image" name="gst_image">
                                <input type="hidden" name="old_gst_image" value="<?php echo @$doc['gst_image'];?>"/>
                            </div>

                            
                               <div class="col-sm-2">
                               <label>Birth Certificate : <?php echo @$doc['birth_certificate'];?></label>
                                
                            </div>
                            <div class="col-sm-2">
                                <input type="file" class="filestyle" data-buttonname="btn-secondary" id="birth_certificate" name="birth_certificate">
                                <input type="hidden" name="old_birth_certificate" value="<?php echo @$doc['birth_certificate'];?>"/>
                            </div>
                            
                               <div class="col-sm-2">
                               <label>Photo : <?php echo @$doc['photo'];?></label>    
                                
                            </div>
                            <div class="col-sm-2">
                               
                                <input type="file" class="filestyle"  data-buttonname="btn-secondary" id="photo" name="photo">
                                <input type="hidden" name="old_photo" value="<?php echo @$doc['photo'];?>"/>
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
                            $j=1;
                            foreach($policy_section as $val){ ?>

                            <h4><?php echo $val['policy_question_section_name']; ?></h4>

                            <?php 
                            
                            $sql = "select policy_question_id,question from master_policy_question_ans where fk_policy_question_section_id = ".$val['policy_question_section_id']." ";
                            $query = $this->db->query($sql);
                            $result = $query->result_array(); 
                            

                            $i=1;
                            foreach($result as $qst){ ?>

                          <div class="form-group row">
                            <div class="col-sm-6">
                                <label><b><?php echo $i; ?></b> <?php echo $qst['question']?></label>
                                <input type="hidden" name="question_list[]" value="<?php echo $qst['policy_question_id']?>">
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control" id="live_or_travel<?php echo $j;?>" name="live_or_travel[]">
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="None">None</option>
                                    
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" id="live_or_travel_remarks<?php echo $j;?>" name="live_or_travel_remarks[]" placeholder="Detail/ Remark">
                            </div>
                            </div>
                             <?php $i++; $j++;}   ?>

                            <?php  } ?>

                            
                      
                        <div class="form-group mb-0 text-center">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" id="updateMDetail" data-form="formData2">
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
<!-- <script src="<?= base_url();?>assets/js/master-clients.js"></script> -->
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
   // alert(baseUrl);
   
    if($('#title').val()==''){
       alert('Please Select title'); return false;
    }
    else if($('#name').val()==''){
       alert('Please Enter Name'); return false;
    }
    else if($('#contact').val()==''){
       alert('Please Enter contact'); return false;
    }
    else if($('#email').val()==''){
       alert('Please Enter email'); return false;
    }
    else if($('#address').val()==''){
       alert('Please enter address'); return false;
    }
    else if($('#relation').val()==''){
       alert('Please enter relation'); return false;
    }
    else if($('#gender').val()==''){
       alert('Please Select title'); return false;
    }
    else if($('#dob').val()==''){
       alert('Please enter date of birth'); return false;
    }
    else if($('#education').val()==''){
       alert('Please enter education'); return false;
    }
    else if($('#proffession').val()==''){
       alert('Please enter proffession'); return false;
    }
    else if($('#martial_status').val()==''){
       alert('Please select martial status'); return false;
    }
    else if($('#annual_income').val()==''){
       alert('Please enter annual income'); return false;
    }
    else if($('#pan_number').val()==''){
       alert('Please enter pan number'); return false;
    }
    else if($('#aadhar_card').val()==''){
       alert('Please enter aadhar card'); return false;
    }
    else{


       var formdata = new FormData($('#formData')[0]);
       // formdata.append('winner_data', 1);
       $.ajax({
           type: "POST",
           url: baseUrl + 'Clients/updateMDetail',
           data: formdata,
           contentType: false,
           processData: false,
           dataType: "json",
           success: function (data) {

               if (data.status == true) {
                   alert('Data updated Successfully');
                   window.location.reload();               }
           },
           error: function (response) {
               alert('Error posting feeds');
               return false;
           }
       });
   }
});


// $(".delecontact").click(function(){
//     removeEmprr();
// });
// function removeContact(elem) {
//         var div_id = $(this).attr("type");
//     alert(div_id);

// };

$(document).ready(function() {
    $(document).on('click', '.delecontact', function () {
		var del_e = $(this).parent().parent().remove();
        
    });
});


$(document).ready(function() {  
    $("#dob,#dom").datepicker({autoclose:!0,todayHighlight:!0});

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
            data: {'id':c_id},
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
                       
                        $('#title option[value="' + val.title +'"]').prop("selected", true);
                        $('#relation option[value="' + val.relation +'"]').prop("selected", true);
                        $('#role_type option[value="' + val.role_type +'"]').prop("selected", true);
                        $('#gender option[value="' + val.gender +'"]').prop("selected", true);
                        $('#martial_status option[value="' + val.martial_status +'"]').prop("selected", true);

                        var qst_and_ans = JSON.parse(val.qst_and_ans);

                        var k =1;

                        $.each(qst_and_ans.live_or_travel, function(key, val) {
                            
                            $('#live_or_travel'+ k +' option[value="' + val +'"]').prop("selected", true);
                            
                            k++;
                        })
                        k =1
                        $.each(qst_and_ans.live_or_travel_remarks, function(key, val) {

                            $("#live_or_travel_remarks"+ k).val(val);
                            
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
            data: {'id':c_id},
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
                        $('#r_state option[value="' + val.r_state +'"]').prop("selected", true);
                        $('#o_state option[value="' + val.o_state +'"]').prop("selected", true);
                        $('#title option[value="' + val.title +'"]').prop("selected", true);
                        $('#gender option[value="' + val.gender +'"]').prop("selected", true);
                        $('#martial_status option[value="' + val.martial_status +'"]').prop("selected", true);

                        var qst_and_ans = JSON.parse(val.qst_and_ans);

                        var k =1;

                        $.each(qst_and_ans.live_or_travel, function(key, val) {
                            
                            $('#live_or_travel'+ k +' option[value="' + val +'"]').prop("selected", true);
                            
                            k++;
                        })
                        k =1
                        $.each(qst_and_ans.live_or_travel_remarks, function(key, val) {

                            $("#live_or_travel_remarks"+ k).val(val);
                            
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


                $("#AddForm").click(function() {
                    $('#form_modal').modal('toggle');
                    uninitialize();
                    clearError();
                });
                $('#department_name').on('keyup', function() {
                    document.getElementById("update").disabled = false;
                });

                function clearError() {
                    $("#department_name").removeClass("parsley-error");
                    $("#department_name_err").removeClass("text-danger").text("");
                }

                function uninitialize() {
                    $("#department_id").text("");
                    $("#department_name").val("");
                    $("#update").hide();
                    $("#delete").hide();
                    $("#submit").show();
                }

                function OnRecover() {
                    var department_id = $("#department_id").text();
                    var url = "<?php echo $base_url; ?>master/department/recover_department";
                    confirmation_alert(id = department_id, url = url, title = "Department", type = "Recover");
                }

                function OnDelete() {
                    var department_id = $("#department_id").text();
                    var url = "<?php echo $base_url; ?>master/department/remove_department";
                    confirmation_alert(id = department_id, url = url, title = "Department", type = "Delet");
                }

                function onEdit(val) {
                    clearError();
                    $("#department_id").text(val);
                    $("#update").show();
                    $("#delete").show();
                    $("#submit").hide();
                    $('#form_modal').modal('toggle');
                    var url = "<?php echo $base_url; ?>master/department/edit_department";
                    if (url != "") {
                        $.ajax({
                            url: url,
                            data: {
                                department_id: val
                            },
                            type: 'POST',
                            dataType: 'json',
                            async: false,
                            cache: false,
                            beforeSend: function() {

                            },

                            success: function(data) {
                                // var myObj = JSON.parse(data);
                                $("#department_id").text(data["userdata"].department_id);
                                $("#department_name").val(data["userdata"].department_name);

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
                    var department_id = $("#department_id").text();
                    var department_name = $("#department_name").val();

                    var url = "<?php echo $base_url; ?>master/department/update_department";

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            department_id: department_id,
                            department_name: department_name,
                        },
                        dataType: 'json',
                        async: false,
                        cache: false,
                        beforeSend: function() {

                        },
                        success: function(data) {
                            if (data["status"] == true) {
                                toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                                $("#department_name").val("");
                                $("#department_name").removeClass("parsley-error");
                                $('#form_modal').modal('toggle');

                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            } else {
                                if (data["message"]["department_name_err"] != "")
                                    $("#department_name").addClass("parsley-error");
                                else
                                    $("#department_name").removeClass("parsley-error");
                                $("#department_name_err").addClass("text-danger").html(data["message"]["department_name_err"]);

                            }
                        },
                        error: function(request, status, error) {
                            alert(request.responseText);
                        }
                    });
                }

                $("#submit").click(function() {
                    var department_name = $("#department_name").val();
                    var url = "<?php echo $base_url; ?>master/department/add_department";

                    $.ajax({
                        url: url,
                        data: {
                            department_name: department_name,
                        },
                        type: 'POST',
                        dataType: 'json',
                        async: false,
                        cache: false,
                        beforeSend: function() {

                        },

                        success: function(data) {
                            if (data["status"] == true) {
                                toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                                $("#department_name").val("");
                                $("#department_name").removeClass("parsley-error");
                                $('#form_modal').modal('toggle');

                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            } else {
                                if (data["message"]["department_name_err"] != "")
                                    $("#department_name").addClass("parsley-error");
                                else
                                    $("#department_name").removeClass("parsley-error");
                                $("#department_name_err").addClass("text-danger").html(data["message"]["department_name_err"]);

                            }

                        },
                        error: function(request, status, error) {
                            alert(request.responseText);
                        }
                    });
                });

                getDepartmentList();

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
                                                var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light  btn-sm";
                                            } else {
                                                status = "In-Active";
                                                var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light  btn-sm";
                                            }

                                            if (isActive == 1)
                                                var del_status = "No";
                                            else
                                                var del_status = "Yes";

                                            edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm' id='edit_btn' value='' type='button' onClick ='onEdit(" + department_id + ")' >Edit</button>";
                                            status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + department_id + "' value='' type='button' onClick ='updateStatus(" + department_id + "," + department_status + ")' >" + status + "</button>";

                                            datas += '<tr><td>' + edit_btn + '</td> <td>' + department_name + '</td><td>' + status_btn + '</td> <td>' + del_status + '</td></tr>';
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
                                        var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light";
                                        $("#edit_" + department_id).addClass(status_btn_txt);
                                        $("#status_btn_" + department_id).text(status);
                                    } else {
                                        status = "Active";
                                        var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light";
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