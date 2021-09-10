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
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!-- <h4 class="header-title"><?php echo $title; ?></h4> -->
                                            <h4 class="header-title">Mediclaim Intimation</h4>
                                        </div>
                                        <div class="col-md-4 offset-md-4 text-right">
                                            <input class='btn btn-facebook btn-sm' id='ListForm' value='Mediclaim List' type='button' />
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-row">

                                                <div class="col-md-12">

                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="policy_holder" class="col-form-label col-md-6">Policy Holder<span class="text-danger">*</span></label>
                                                                <input class="form-control col-md-6" id="policy_holder" placeholder="Policy Holder" value="<?php echo $result_data['name'].' '. $result_data['middle_name'] .' '. $result_data['surname']; ?>" readonly />
                                                                <input type="hidden" name="policy_holder_id" id="policy_holder_id" value="<?php echo $result_data['fk_cust_member_id']; ?>" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                        
                                                            <div class="form-group row">
                                                                <label for="claiment_name" class="col-form-label col-md-6">Claiment Name<span class="text-danger">*</span></label>
                                                                <select <?php if($v){echo 'disabled';} ?> class="form-control col-md-6" id="claiment_name" name="claiment_name">
                                                                    <option value="" selected disabled>Select Name</option>
                                                                    <?php
                                                                    $selected_clmnt_id = $result_data['cmi_data']['cmi_fk_policy_claiment'];
                                                                    $members = count($result_data['member_name_data_arr']);
                                                                    for ($i = 0; $i < $members; $i++) {

                                                                    ?>
                                                                        <option <?php if($selected_clmnt_id==$result_data['member_name_data_arr'][$i]['id']){echo 'selected';} ?> data-position="<?php echo $i; ?>" value="<?php echo $result_data['member_name_data_arr'][$i]['id']; ?>"><?php echo $result_data['member_name_data_arr'][$i]['name']; ?></option>
                                                                    <?php } ?>

                                                                </select>
                                                                <span id="claiment_name_error"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="insurance_company" class="col-form-label col-md-6">Insurance Company<span class="text-danger">*</span></label>
                                                                <input class="form-control col-md-6" id="insurance_company" placeholder="Insurance Company" value="<?php echo $result_data['company_name']; ?>" readonly />
                                                                <input type="hidden" name="policy_id" id="policy_id" value="<?php echo $id; ?>" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="policy_type_id" class="col-form-label col-md-6">Policy Type<span class="text-danger">*</span></label>
                                                                <input class="form-control col-md-6" placeholder="Policy Type" value="<?php echo $result_data['policy_type']; ?>" readonly />
                                                                <input type="hidden" name="policy_type_id" id="policy_type_id" value="<?php echo $result_data['fk_policy_type_id']; ?>" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="policy_no" class="col-form-label col-md-6">Policy No<span class="text-danger">*</span></label>
                                                                <input class="form-control col-md-6" placeholder="Policy No" value="<?php echo $result_data['policy_no']; ?>" readonly />
                                                                <input type="hidden" name="policy_no" id="policy_no" value="<?php echo $result_data['policy_no']; ?>" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="date_to" class="col-form-label col-md-6">Policy Expiry Date<span class="text-danger">*</span></label>
                                                                <input class="form-control col-md-6" placeholder="Expiry Date" value="<?php echo date_format(date_create($result_data['date_to']), "d-m-Y"); ?>" readonly />
                                                                <input type="hidden" name="date_to" id="date_to" value="<?php echo $result_data['date_to']; ?>" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">TPA<span class="text-danger">*</span></label>
                                                                <input class="form-control col-md-6" placeholder="TPA" value="<?php echo $result_data['tpa_name']; ?>" readonly />
                                                                <input type="hidden" name="tpa" id="tpa" value="<?php echo $result_data['tpa_company']; ?>" />
                                                            </div>
                                                        </div>
                                                        
                                                       

                                                          

                                                        <div class="col-md-12">
                                                        <table class="table" style="border: 1px solid #dddddd;padding: 8px; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <td width="20%">Name of Hospital</td>
                                                                    <td width="20%">Date Of Admission</td>
                                                                    <td width="30%">Diagnosis</td>
                                                                    <td width="10%" align="right">
                                                                    <?php if(!$v){ ?>
                                                                    <button class="btn btn-primary btn-sm dripicons-plus btn-block" id="add_hospital_details_0" onClick="AddHospitalDetails(0)"> Add Survey Details</button>
                                                                    <?php } ?>
                                                                    </td>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="append_hospital_details">
                                                            <?php
                                                            if(!empty($result_data['cmi_data'])):
                                                                $cmi_data = json_decode($result_data['cmi_data']['cmi_hospital_details']);
                                                                $count = count($cmi_data);
                                                                // print_r($cmi_data);
                                                                // die();
                                                                if(!empty($cmi_data)): $i=0; foreach($cmi_data as $row): ?>

<tr><td> <input type="text" name="hospital_details_name" id="hospital_details_name" placeholder="Enter Hospital Name" class="form-control hospital_details_name" value="<?php if(!empty($cmi_data[$i][1])): echo $cmi_data[$i][1]; endif; ?>" <?php if($v){echo 'disabled';} ?>></td>

<td> <input type="date" name="hospital_details_date" id="hospital_details_date" placeholder="Enter servey_date" class="form-control hospital_details_date" value="<?php if(!empty($cmi_data[$i][2])): echo $cmi_data[$i][2]; endif; ?>" <?php if($v){echo 'disabled';} ?>></td>

<td> <input type="text" name="hospital_details_diagnosis" id="hospital_details_diagnosis" placeholder="Enter Diagnosis" class="form-control hospital_details_diagnosis" value="<?php if(!empty($cmi_data[$i][3])): echo $cmi_data[$i][3]; endif; ?>" <?php if($v){echo 'disabled';} ?>></td>


<td align="right"> <?php if(!$v){ ?> <button class="btn btn-danger btn-sm dripicons-cross" id="remove_hospital_details_<?php echo $i; ?>" onClick="RemoveHospitalDetails('<?php echo $i; ?>')"></button> <?php } ?> </td></tr>

                                                            <?php   $i++; endforeach; endif;endif; ?>
                                                            </tbody>

                                                        </table>

                                                    </div>


                                                        <!-- <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label for="diagnosis" class="col-form-label col-md-2">Diagnosis<span class="text-danger">*</span></label>
                                                                <textarea id="diagnosis" name="diagnosis" class="col-form-label col-md-10" rows="5" placeholder="Eg: All diagnostic tests including X-rays, MRIs, blood tests, and so on as long they are associated with the patient's stay in the hospital for at least one night."></textarea>
                                                                <span id="diagnosis_error"></span>
                                                            </div>
                                                        </div> -->

                                                    </div>

                                                    <hr>

                                                </div>

                                                <?php if(!$v){ ?>

                                                <div class="col-md-6 offset-md-3 mt-2">
                                                    <center>
                                                        <button id="submit" class="btn btn-primary">Save Claim Intimation</button>
                                                    </center>
                                                </div>

                                                <?php } ?>

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
                    
                    <?php if (!empty($count)) : ?>
                        var set_count = '<?php echo $count; ?>';
                    <?php else : ?>
                        var set_count = "0";
                    <?php endif; ?>

                    $("#add_hospital_details_0").attr("onClick", "AddHospitalDetails(" + set_count + ")");


                });


                // Add/Remove Survey Details >> ADD ROWs FOR MORE DETAILS
                function AddHospitalDetails(add_remark) {
                    var tr_table = '';
                    add_remark = add_remark + 1;
                    $("#add_hospital_details_0").attr("onClick", "AddHospitalDetails(" + add_remark + ")");

                    tr_table += '<tr><td> <input type="text" name="hospital_details_name[]" id="hospital_details_name" placeholder="Enter Hospital Name" class="form-control hospital_details_name"></td>';

                    tr_table += '<td> <input type="date" name="hospital_details_date[]" id="hospital_details_date" placeholder="Enter servey_date" class="form-control hospital_details_date"></td>';

                    tr_table += '<td> <input type="text" name="hospital_details_diagnosis[]" id="hospital_details_diagnosis" placeholder="Enter Diagnosis" class="form-control hospital_details_diagnosis"></td>';

                    tr_table += '<td align="right"> <button class="btn btn-danger btn-sm dripicons-cross" id="remove_hospital_details_'+add_remark+'" onClick="RemoveHospitalDetails('+add_remark+')"></button></td></tr>';

                    $("#append_hospital_details").append(tr_table);
                    
                }

                function RemoveHospitalDetails(add_remark) {
                    $("#remove_hospital_details_" + add_remark).closest("tr").remove();
                }


                // SAVE DATA To DATABASE

                $("#submit").click(function() {

                    var actual_hospital_details = [];

                    var policy_holder_id    = $("#policy_holder_id").val();
                    var claiment_name       = $("#claiment_name").val();
                    var policy_no           = $("#policy_no").val();
                    var policy_id           = $("#policy_id").val();
                    var date_to             = $("#date_to").val();
                    var policy_type_id      = $("#policy_type_id").val();
                    var date_of_al          = $("#date_of_al").val();
                    var tpa                 = $("#tpa").val();
                    var hospital_name       = $("#hospital_name").val();
                    var diagnosis           = $("#diagnosis").val();

                    <?php if (!empty($eid)) : ?>
                        var id = '<?php echo $eid; ?>';
                    <?php else : ?>
                        var id = "";
                    <?php endif; ?>

                    var url = "<?php echo base_url(); ?>master/claims/save_mediclaim_intimation";
                    var err_flag =0;
                    $("#append_hospital_details tr:has(.hospital_details_name)").each(function(key, val) {

                        var hospital_details_name = $(".hospital_details_name", this).val();
                        var hospital_details_date = $(".hospital_details_date", this).val();
                        var hospital_details_diagnosis = $(".hospital_details_diagnosis", this).val();

                        actual_hospital_details.push([key, hospital_details_name, hospital_details_date, hospital_details_diagnosis]);

                        if(hospital_details_name == "" || hospital_details_date == "" || hospital_details_diagnosis == ""){
                            err_flag = 1;
                        }

                    });

                    if(err_flag==1){
                        toast("Error", "Please fill all details of hospital", "error");
                        return false;
                    }

                    //console.log(actual_hospital_details);
                    //return false;



                    $.ajax({
                        url: url,
                        data: {
                            policy_holder_id: policy_holder_id,
                            claiment_name: claiment_name,
                            policy_no: policy_no,
                            policy_id: policy_id,
                            date_to:date_to,
                            policy_type_id:policy_type_id,
                            tpa:tpa,
                            hospital_details:actual_hospital_details,
                            id:id,
                        },
                        type: 'POST',
                        dataType: "json",
                        async: false,
                        cache: false,
                        beforeSend: function() {
                        },
                        success: function(data) {
                            if(data["status"]==true){
                                toast("Success", data["message"], "success");
                                setTimeout(function() {
                                    window.location.href = '<?php echo base_url(); ?>master/claims/mediclaims';
                                }, 2000);
                            }else{

                                if(data["message"]["claiment_name_error"] != ""){
                                    $("#claiment_name_error").addClass("text-danger").html(data["message"]["claiment_name_error"]);
                                    $("#claiment_name").addClass("parsley-error");
                                }else{
                                    $("#claiment_name_error").removeClass("text-danger").html("");
                                    $("#claiment_name").removeClass("parsley-error");
                                }

                                if(data["message"]["hospital_name_error"] != ""){
                                    $("#hospital_name_error").addClass("text-danger").html(data["message"]["hospital_name_error"]);
                                    $("#hospital_name").addClass("parsley-error");
                                }else{
                                    $("#hospital_name_error").removeClass("text-danger").html("");
                                    $("#hospital_name").removeClass("parsley-error");
                                }

                                if(data["message"]["date_of_al_error"] != ""){
                                    $("#date_of_al_error").addClass("text-danger").html(data["message"]["date_of_al_error"]);
                                    $("#date_of_al").addClass("parsley-error");
                                }else{
                                    $("#date_of_al_error").removeClass("text-danger").html("");
                                    $("#date_of_al").removeClass("parsley-error");
                                }

                                if(data["message"]["diagnosis_error"] != ""){
                                    $("#diagnosis_error").addClass("text-danger").html(data["message"]["diagnosis_error"]);
                                    $("#diagnosis").addClass("parsley-error");
                                }else{
                                    $("#diagnosis_error").removeClass("text-danger").html("");
                                    $("#diagnosis").removeClass("parsley-error");
                                }

                            }

                        },
                        error: function(request, status, error) {
                            //alert('Error: '+request.error);
                        }
                    });

                });


                function toast(heading, message_txt, icon) {
                    $.toast({
                        heading: heading,
                        text: message_txt,
                        position: "top-right",
                        loaderBg: "#3b98b5",
                        icon: icon, // info, success, warning, error
                        hideAfter: 3e3,
                        stack: 1
                    })
                }

            </script>