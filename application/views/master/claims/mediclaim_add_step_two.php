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
                                            <h4 class="header-title">Register Health Claim</h4>
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
                                                                <select disabled class="form-control col-md-6" id="claiment_name" name="claiment_name">
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
                                                        <h4>Hospital Details</h4>
                                                        <table class="table" style="border: 1px solid #dddddd;padding: 8px; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <td width="20%">Name of Hospital</td>
                                                                    <td width="20%">Date Of Admission</td>
                                                                    <td width="20%">Date Of Discharge</td>
                                                                    <td width="30%">Diagnosis</td>
                                                                    <td width="8%" align="right">
                                                                    <?php if(!$v){ ?>
                                                                    <button data-toggle='tooltip' data-placement='top' title='' data-original-title='Hospital Details' class="btn btn-primary btn-sm dripicons-plus btn-block" id="add_hospital_details_0" onClick="AddHospitalDetails(0)"> Add </button>
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

<td> <input type="date" name="hospital_details_date" id="hospital_details_date" placeholder="Enter date" class="form-control hospital_details_date" value="<?php if(!empty($cmi_data[$i][2])): echo $cmi_data[$i][2]; endif; ?>" <?php if($v){echo 'disabled';} ?>></td>

<td> <input type="date" name="hospital_details_discharge_date" id="hospital_details_discharge_date" placeholder="Enter date" class="form-control hospital_details_discharge_date" <?php if($v){echo 'disabled';} ?>></td>

<td> <input type="text" name="hospital_details_diagnosis" id="hospital_details_diagnosis" placeholder="Enter Diagnosis" class="form-control hospital_details_diagnosis" value="<?php if(!empty($cmi_data[$i][3])): echo $cmi_data[$i][3]; endif; ?>" <?php if($v){echo 'disabled';} ?>></td>


<td align="right"> <?php if(!$v){ ?> <button class="btn btn-danger btn-sm dripicons-cross" id="remove_hospital_details_<?php echo $i; ?>" onClick="RemoveHospitalDetails('<?php echo $i; ?>')"></button> <?php } ?> </td></tr>

                                                            <?php   $i++; endforeach; endif;endif; ?>
                                                            </tbody>

                                                        </table>

                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label for="pstillnsdtls" class="col-form-label col-md-2">Past Illness Details<span class="text-danger">*</span></label>
                                                            <textarea id="pstillnsdtls" name="pstillnsdtls" class="col-md-10" rows="5" placeholder="Eg: All diagnostic tests including X-rays, MRIs, blood tests, and so on as long they are associated with the patient's stay in the hospital for at least one night."></textarea>
                                                            <span id="pstillnsdtls_error"></span>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label for="claiment_name" class="col-form-label col-md-6">Type Of Claim<span class="text-danger">*</span></label>
                                                            <select class="form-control col-md-6" id="claiment_name" name="claiment_name">
                                                                <option value="" disabled selected>Select Type</option>
                                                                <option value="Normal">Normal</option>
                                                                <option value="Pre & Post Hospitalization">Pre & Post Hospitalization</option>
                                                                <option value="Balance & DVR">Balance & DVR</option>
                                                                <option value="Health Checkup">Health Checkup</option>
                                                            </select>
                                                            <span id="claiment_name_error"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label for="tpa" class="col-form-label col-md-6">Claim File No.<span class="text-danger">*</span></label>
                                                            <input class="form-control col-md-6" placeholder="File No" />
                                                        </div>
                                                    </div>
                                                    
                                                    </div>

                                                    <hr>

                                                    <div class="row">
                                                        
                                                        <div class="col-md-4 mb-1">
                                                            <h4>Claim Intimation Given (YES)</h4>
                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="cig_date" class="col-form-label col-md-6">Date<span class="text-danger">*</span></label>
                                                                <input type="date" id="cig_date" class="form-control col-md-6" placeholder="Date" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="cig_email" class="col-form-label col-md-6">Email ID<span class="text-danger">*</span></label>
                                                                <input type="email" id="cig_email" class="form-control col-md-6" placeholder="Email ID" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="cig_time" class="col-form-label col-md-6">Time<span class="text-danger">*</span></label>
                                                                <input type="time" id="cig_time" class="form-control col-md-6" placeholder="Time" />
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <hr>

                                                    <div class="row">
                                                        
                                                        <div class="col-md-4 mb-1">
                                                            <h4>Questionnaire</h4>
                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">Docs Received From Client On<span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control col-md-6" placeholder="Date" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">Paper Submitted On<span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control col-md-6" placeholder="Date" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">Paper Received On Time<span class="text-danger">*</span></label>
                                                                <div class=" col-md-6 col-form-label">
                                                                    <label for="prot_yes">
                                                                        <input type="radio" name="prot" id="prot_yes" value="1"> Yes
                                                                    </label>
                                                                    <label for="prot_no" class="ml-2">
                                                                        <input type="radio" name="prot" id="prot_no" value="0" checked> No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="psb" class="col-form-label col-md-6">Paper Submitted By<span class="text-danger">*</span></label>
                                                                <select class="form-control col-md-6" id="psb" name="psb">
                                                                    <option value="" disabled selected>Select By</option>
                                                                    <option value="Online Via Email">Online Via Email</option>
                                                                    <option value="Online Via Portal">Online Via Portal</option>
                                                                    <option value="Via Courier">Via Courier</option>
                                                                    <option value="Via Original File">Via Original File</option>
                                                                </select>
                                                                <span id="psb_error"></span>
                                                            </div>
                                                        </div>

                                                        <!-- Online Via Email -->

                                                        <div class="col-md-4 ove" style="display: none;">
                                                            <div class="form-group row">
                                                                <label for="psb_email" class="col-form-label col-md-6">Email ID<span class="text-danger">*</span></label>
                                                                <input type="email" id="psb_email" class="form-control col-md-6" placeholder="Email ID" />
                                                            </div>
                                                        </div>

                                                        <!-- Online Via Portal -->

                                                        <div class="col-md-4 ovp" style="display: none;">
                                                            <div class="form-group row">
                                                                <label for="psb_tcktno" class="col-form-label col-md-6">Ticket No<span class="text-danger">*</span></label>
                                                                <input type="text" id="psb_tcktno" class="form-control col-md-6" placeholder="Ticket No" />
                                                            </div>
                                                        </div>

                                                        <!-- Via Courier -->

                                                        <div class="col-md-4 vc" style="display: none;">
                                                            <div class="form-group row">
                                                                <label for="psb_ackgmnt" class="col-form-label col-md-6">Acknowledgement<span class="text-danger">*</span></label>
                                                                <div style="display:flex;" class="col-md-6" >
                                                                    <input type="file" name="psb3_ackgmnt_file" id="psb3_ackgmnt_file_0" class="form-control psb3_ackgmnt_file">&nbsp;
                                                                    <button class="btn btn-success btn-sm dripicons-upload" id="upload_psb3_ackgmnt_0" onclick="UploadFile('psb3_ackgmnt', 0, 'paper_submitted_ackgmnt')"></button> <span style="display:none;" class="badge badge-success p-2" id="psb3_ackgmnt_file_name_0"></span>
                                                                    <input type="hidden" name="psb3_ackgmnt_actual_file_name_0" id="psb3_ackgmnt_actual_file_name_0" class="form-control psb3_ackgmnt_actual_file_name_0">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 vc" style="display: none;">
                                                            <div class="form-group row">
                                                                <label for="psb_receipt" class="col-form-label col-md-6">Receipt<span class="text-danger">*</span></label>
                                                                <div style="display:flex;" class="col-md-6" >
                                                                    <input type="file" name="psb3_receipt_file[]" id="psb3_receipt_file_0" class="form-control psb3_receipt_file">&nbsp;
                                                                    <button class="btn btn-success btn-sm dripicons-upload" id="upload_psb3_receipt_0" onclick="UploadFile('psb3_receipt', 0, 'paper_submitted_ackgmnt')"></button> <span style="display:none;" class="badge badge-success p-2" id="psb3_receipt_file_name_0"></span>
                                                                    <input type="hidden" name="psb3_receipt_actual_file_name_0" id="psb3_receipt_actual_file_name_0" class="form-control psb3_receipt_actual_file_name_0">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Via Original File -->

                                                        <div class="col-md-4 vof" style="display: none;">
                                                            <div class="form-group row">
                                                                <label for="psb4_ackgmnt" class="col-form-label col-md-6">Acknowledgement<span class="text-danger">*</span></label>
                                                                <div style="display:flex;" class="col-md-6" >
                                                                    <input type="file" name="psb4_ackgmnt_file" id="psb4_ackgmnt_file_0" class="form-control psb4_ackgmnt_file">&nbsp;
                                                                    <button class="btn btn-success btn-sm dripicons-upload" id="upload_psb4_ackgmnt_0" onclick="UploadFile('psb4_ackgmnt', 0, 'paper_submitted_ackgmnt')"></button> <span style="display:none;" class="badge badge-success p-2" id="psb4_ackgmnt_file_name_0"></span>
                                                                    <input type="hidden" name="psb4_ackgmnt_actual_file_name_0" id="psb4_ackgmnt_actual_file_name_0" class="form-control psb4_ackgmnt_actual_file_name_0">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">Discharged Card Signed & Stamped<span class="text-danger">*</span></label>
                                                                <div class=" col-md-6 col-form-label">
                                                                    <label for="dcss_yes">
                                                                        <input type="radio" name="dcss" id="dcss_yes" value="1"> Yes
                                                                    </label>
                                                                    <label for="dcss_no" class="ml-2">
                                                                        <input type="radio" name="dcss" id="dcss_no" value="0" checked> No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">Assistance Dr. Charged Applied<span class="text-danger">*</span></label>
                                                                <div class=" col-md-6 col-form-label">
                                                                    <label for="adca_yes">
                                                                        <input type="radio" name="adca" id="adca_yes" value="1"> Yes
                                                                    </label>
                                                                    <label for="adca_no" class="ml-2">
                                                                        <input type="radio" name="adca" id="adca_no" value="0" checked> No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">Is it accident claim<span class="text-danger">*</span></label>
                                                                <div class=" col-md-6 col-form-label">
                                                                    <label for="iiac_yes">
                                                                        <input type="radio" name="iiac" id="iiac_yes" value="1"> Yes
                                                                    </label>
                                                                    <label for="iiac_no" class="ml-2">
                                                                        <input type="radio" name="iiac" id="iiac_no" value="0" checked> No
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="adg form-group row" style="display: none;">
                                                                <label for="tpa" class="col-form-label col-md-6">Alchol Declaration Given<span class="text-danger">*</span></label>
                                                                <div class=" col-md-6 col-form-label">
                                                                    <label for="adg_yes">
                                                                        <input type="radio" name="adg" id="adg_yes" value="1"> Yes
                                                                    </label>
                                                                    <label for="adg_no" class="ml-2">
                                                                        <input type="radio" name="adg" id="adg_no" value="0" checked> No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        

                                                    </div>

                                                    <hr>

                                                    <div class="row">
                                                        
                                                        <div class="col-md-4 mb-1">
                                                            <h4>KYC Submitted</h4>
                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <h5 class="text-danger">Policy Holder KYC Details</h5>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">PAN Card<span class="text-danger">*</span></label>

                                                                <!-- <div style="display:flex;" class="col-md-6" >
                                                                    <span style="display:block;" class="badge badge-success p-2" id="survey_details_file_name_0">pan_card.pdf</span>
                                                                    <input type="hidden" name="survey_details_actual_file_name_0" id="survey_details_actual_file_name_0" class="form-control survey_details_actual_file_name_0">
                                                                </div> -->

                                                                <div style="display:flex;" class="col-md-6" >
                                                                    <input type="file" name="phkd_pan_file" id="phkd_pan_file_0" class="form-control phkd_pan_file">&nbsp;
                                                                    <button class="btn btn-success btn-sm dripicons-upload" id="upload_phkd_pan_0" onclick="UploadFile('phkd_pan', 0, 'mediclaim_kyc')"></button> <span style="display:none;" class="badge badge-success p-2" id="phkd_pan_file_name_0"></span>
                                                                    <input type="hidden" name="phkd_pan_actual_file_name_0" id="phkd_pan_actual_file_name_0" class="form-control phkd_pan_actual_file_name_0">
                                                                </div>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">Aadhar Card<span class="text-danger">*</span></label>
                                                                <div style="display:flex;" class="col-md-6" >
                                                                    <input type="file" name="phkd_aadhar_file[]" id="phkd_aadhar_file_0" class="form-control phkd_aadhar_file">&nbsp;
                                                                    <button class="btn btn-success btn-sm dripicons-upload" id="upload_phkd_aadhar_0" onclick="UploadFile('phkd_aadhar', 0, 'mediclaim_kyc')"></button> <span style="display:none;" class="badge badge-success p-2" id="phkd_aadhar_file_name_0"></span>
                                                                    <input type="hidden" name="phkd_aadhar_actual_file_name_0" id="phkd_aadhar_actual_file_name_0" class="form-control phkd_aadhar_actual_file_name_0">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">Original  Cancelled Cheque<span class="text-danger">*</span></label>
                                                                <div style="display:flex;" class="col-md-6" >
                                                                    <input type="file" name="phkd_og_can_cheque_file[]" id="phkd_og_can_cheque_file_0" class="form-control phkd_og_can_cheque_file">&nbsp;
                                                                    <button class="btn btn-success btn-sm dripicons-upload" id="upload_phkd_og_can_cheque_0" onclick="UploadFile('phkd_og_can_cheque', 0, 'mediclaim_kyc')"></button> <span style="display:none;" class="badge badge-success p-2" id="phkd_og_can_cheque_file_name_0"></span>
                                                                    <input type="hidden" name="phkd_og_can_cheque_actual_file_name_0" id="phkd_og_can_cheque_actual_file_name_0" class="form-control phkd_og_can_cheque_actual_file_name_0">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-12">
                                                            <h5 class="text-danger">Claiment KYC Details</h5>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">PAN Card<span class="text-danger">*</span></label>

                                                                <!-- <div style="display:flex;" class="col-md-6" >
                                                                    <span style="display:block;" class="badge badge-success p-2" id="survey_details_file_name_0">pan_card.pdf</span>
                                                                    <input type="hidden" name="survey_details_actual_file_name_0" id="survey_details_actual_file_name_0" class="form-control survey_details_actual_file_name_0">
                                                                </div> -->

                                                                <div style="display:flex;" class="col-md-6" >
                                                                    <input type="file" name="ckd_pan_file" id="ckd_pan_file_0" class="form-control ckd_pan_file">&nbsp;
                                                                    <button class="btn btn-success btn-sm dripicons-upload" id="upload_ckd_pan_0" onclick="UploadFile('ckd_pan', 0, 'mediclaim_kyc')"></button> <span style="display:none;" class="badge badge-success p-2" id="ckd_pan_file_name_0"></span>
                                                                    <input type="hidden" name="ckd_pan_actual_file_name_0" id="ckd_pan_actual_file_name_0" class="form-control ckd_pan_actual_file_name_0">
                                                                </div>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">Aadhar Card<span class="text-danger">*</span></label>
                                                                <div style="display:flex;" class="col-md-6" >
                                                                    <input type="file" name="ckd_aadhar_file[]" id="ckd_aadhar_file_0" class="form-control ckd_aadhar_file">&nbsp;
                                                                    <button class="btn btn-success btn-sm dripicons-upload" id="upload_ckd_aadhar_0" onclick="UploadFile('ckd_aadhar', 0, 'mediclaim_kyc')"></button> <span style="display:none;" class="badge badge-success p-2" id="ckd_aadhar_file_name_0"></span>
                                                                    <input type="hidden" name="ckd_aadhar_actual_file_name_0" id="ckd_aadhar_actual_file_name_0" class="form-control ckd_aadhar_actual_file_name_0">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">Original  Cancelled Cheque<span class="text-danger">*</span></label>
                                                                <div style="display:flex;" class="col-md-6" >
                                                                    <input type="file" name="ckd_og_can_cheque_file[]" id="ckd_og_can_cheque_file_0" class="form-control ckd_og_can_cheque_file">&nbsp;
                                                                    <button class="btn btn-success btn-sm dripicons-upload" id="upload_ckd_og_can_cheque_0" onclick="UploadFile('ckd_og_can_cheque', 0, 'mediclaim_kyc')"></button> <span style="display:none;" class="badge badge-success p-2" id="ckd_og_can_cheque_file_name_0"></span>
                                                                    <input type="hidden" name="ckd_og_can_cheque_actual_file_name_0" id="ckd_og_can_cheque_actual_file_name_0" class="form-control ckd_og_can_cheque_actual_file_name_0">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">PAN Card<span class="text-danger">*</span></label>
                                                                <div class=" col-md-6 col-form-label">
                                                                    <label for="pan_card_yes">
                                                                        <input type="radio" name="pan_card" id="pan_card_yes" value="1"> Yes
                                                                    </label>
                                                                    <label for="pan_card_no" class="ml-2">
                                                                        <input type="radio" name="pan_card" id="pan_card_no" value="0" checked> No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">Aadhar Card<span class="text-danger">*</span></label>
                                                                <div class=" col-md-6 col-form-label">
                                                                    <label for="aadhar_card_yes">
                                                                        <input type="radio" name="aadhar_card" id="aadhar_card_yes" value="1"> Yes
                                                                    </label>
                                                                    <label for="aadhar_card_no" class="ml-2">
                                                                        <input type="radio" name="aadhar_card" id="aadhar_card_no" value="0" checked> No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">Original  Cancelled Cheque<span class="text-danger">*</span></label>
                                                                <div class=" col-md-6 col-form-label">
                                                                    <label for="occ_yes">
                                                                        <input type="radio" name="occ" id="occ_yes" value="1"> Yes
                                                                    </label>
                                                                    <label for="occ_no" class="ml-2">
                                                                        <input type="radio" name="occ" id="occ_no" value="0" checked> No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>

                                                    </div>

                                                    <hr>

                                                    <div class="row">
                                                        
                                                        <div class="col-md-4 mb-1">
                                                            <h4>Bill Entry</h4>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        
                                                        <div class="col-md-12">
                                                            <table class="table bill_table" style="border: 1px solid #dddddd;padding: 8px; width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <td width="20%">Bill No</td>
                                                                        <td width="20%">Bill Date</td>
                                                                        <td width="20%">Name Of Biller</td>
                                                                        <td width="20%">Description</td>
                                                                        <td width="30%">Amount On Bill</td>
                                                                        <td width="8%" align="right">
                                                                        <button data-toggle='tooltip' data-placement='top' title='' data-original-title='Bill Details' class="btn btn-primary btn-sm dripicons-plus btn-block" id="add_bill_details_0" onClick="AddBillDetails(0)"> Add </button>
                                                                        </td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="append_bill_details">
                                                                </tbody>
                                                                <tfooter>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>
                                                                            <div class="row">
                                                                                <label for="totla_amount" class="col-md-6">Total Amount:</label>
                                                                                <input type="number" name="totla_bill_amount" id="totla_bill_amount" readonly class="col-md-6 form-control totla_bill_amount" />
                                                                            </div>
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tfooter>

                                                            </table>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label for="hprs" class="col-form-label col-md-6">Hospital Payment Receipt Submitted<span class="text-danger">*</span></label>
                                                                <div class=" col-md-6 col-form-label">
                                                                    <label for="hprs_yes">
                                                                        <input type="radio" name="hprs" id="hprs_yes" value="1"> Yes
                                                                    </label>
                                                                    <label for="hprs_no" class="ml-2">
                                                                        <input type="radio" name="hprs" id="hprs_no" value="0" checked> No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-12">
                                                            <table class="hprs_table table" style="border: 1px solid #dddddd; padding: 8px; width: 100%; display: none;">
                                                                <thead>
                                                                    <tr>
                                                                        <td width="20%">Receipt No</td>
                                                                        <td width="20%">Receipt Date</td>
                                                                        <td width="20%">Receipt Amount</td>
                                                                        <td width="10%" align="right">
                                                                        <button data-toggle='tooltip' data-placement='top' title='' data-original-title='Receipt Details' class="btn btn-primary btn-sm dripicons-plus btn-block" id="add_receipt_details_0" onClick="AddReceiptDetails(0)"> Add </button>
                                                                        </td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="append_receipt_details">
                                                                </tbody>
                                                                <tfooter>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>
                                                                            <div class="row">
                                                                                <label for="totla_receipt_amount" class="col-md-6">Total Amount:</label>
                                                                                <input type="number" name="totla_receipt_amount" id="totla_receipt_amount" readonly class="col-md-6 form-control totla_receipt_amount" />
                                                                            </div>
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tfooter>
                                                            </table>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <p style="font-size: 1.1em;">Note* : If Total Bill Amount & Receipt Amount is same <span style="color: green; font-weight:800;">[GREEN]</span> All ok, If not same both the values are different <span style="color: red; font-weight:800;">[RED]</span>.</p>
                                                        </div>

                                                        <div class="col-md-12 mb-1">
                                                            <h4>Query Upload</h4>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <table class="table" style="border: 1px solid #dddddd;padding: 8px; width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <td width="30%">Query Letter Reply</td>
                                                                        <td width="30%">Date Of Query</td>
                                                                        <td width="30%">Remark</td>
                                                                        <td width="10%" align="right">
                                                                        <button data-toggle='tooltip' data-placement='top' title='' data-original-title='Query Reply Details' class="btn btn-primary btn-sm dripicons-plus btn-block" id="add_query_details_0" onClick="AddQueryDetails(0)"> Add </button>
                                                                        </td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="append_query_details">
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>

                                                    <hr>

                                                    <div class="row">

                                                        <div class="col-md-12 mb-1">
                                                            <h4>Other Document For Submittion</h4>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">Response<span class="text-danger">*</span></label>
                                                                <div class=" col-md-6 col-form-label">
                                                                    <label for="respns_yes">
                                                                        <input type="radio" name="respns" id="respns_yes" value="1"> Yes
                                                                    </label>
                                                                    <label for="respns_no" class="ml-2">
                                                                        <input type="radio" name="respns" id="respns_no" value="0" checked> No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">Hospital Bill Breakup<span class="text-danger">*</span></label>
                                                                <div class=" col-md-6 col-form-label">
                                                                    <label for="hbb_yes">
                                                                        <input type="radio" name="hbb" id="hbb_yes" value="1"> Yes
                                                                    </label>
                                                                    <label for="hbb_no" class="ml-2">
                                                                        <input type="radio" name="hbb" id="hbb_no" value="0" checked> No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">Original  Discharge Card<span class="text-danger">*</span></label>
                                                                <div class=" col-md-6 col-form-label">
                                                                    <label for="odc_yes">
                                                                        <input type="radio" name="odc" id="odc_yes" value="1"> Yes
                                                                    </label>
                                                                    <label for="odc_no" class="ml-2">
                                                                        <input type="radio" name="odc" id="odc_no" value="0" checked> No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">Prescription<span class="text-danger">*</span></label>
                                                                <div class=" col-md-6 col-form-label">
                                                                    <label for="presp_yes">
                                                                        <input type="radio" name="presp" id="presp_yes" value="1"> Yes
                                                                    </label>
                                                                    <label for="presp_no" class="ml-2">
                                                                        <input type="radio" name="presp" id="presp_no" value="0" checked> No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">Consultation Paper<span class="text-danger">*</span></label>
                                                                <div class=" col-md-6 col-form-label">
                                                                    <label for="cp_yes">
                                                                        <input type="radio" name="cp" id="cp_yes" value="1"> Yes
                                                                    </label>
                                                                    <label for="cp_no" class="ml-2">
                                                                        <input type="radio" name="cp" id="cp_no" value="0" checked> No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">Claim Form Part (B) Filled<span class="text-danger">*</span></label>
                                                                <div class=" col-md-6 col-form-label">
                                                                    <label for="cfpf_yes">
                                                                        <input type="radio" name="cfpf" id="cfpf_yes" value="1"> Yes
                                                                    </label>
                                                                    <label for="cfpf_no" class="ml-2">
                                                                        <input type="radio" name="cfpf" id="cfpf_no" value="0" checked> No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="tpa" class="col-form-label col-md-6">Films of XRays/MRI/Other<span class="text-danger">*</span></label>
                                                                <div class=" col-md-6 col-form-label">
                                                                    <label for="fxmo_yes">
                                                                        <input type="radio" name="fxmo" id="fxmo_yes" value="1"> Yes
                                                                    </label>
                                                                    <label for="fxmo_no" class="ml-2">
                                                                        <input type="radio" name="fxmo" id="fxmo_no" value="0" checked> No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="fxmo form-group row" style="display: none;">
                                                                <label for="tpa" class="col-form-label col-md-6">Count<span class="text-danger">*</span></label>
                                                                <input class="form-control col-md-6" placeholder="count" />
                                                            </div>
                                                        </div>


                                                    </div>

                                                    <hr>

                                                    <div class="row">

                                                        <div class="col-md-12 mb-1">
                                                            <h4>Upload Claim Form (PDF / Docx / Excel / etc)</h4>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="claim_form" class="col-form-label col-md-6">Claim Form<span class="text-danger">*</span></label>
                                                                <div style="display:flex;" class="col-md-6" >
                                                                    <input type="file" name="claim_form_file" id="claim_form_file_0" class="form-control claim_form_file">&nbsp;
                                                                    <button class="btn btn-success btn-sm dripicons-upload" id="upload_claim_form_0" onclick="UploadFile('claim_form', 0, 'ClaimForm')"></button> <span style="display:none;" class="badge badge-success p-2" id="claim_form_file_name_0"></span>
                                                                    <input type="hidden" name="claim_form_actual_file_name_0" id="claim_form_actual_file_name_0" class="form-control claim_form_actual_file_name_0">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                                <?php if(!$v){ ?>

                                                <div class="col-md-6 offset-md-3 mt-2">
                                                    <center>
                                                        <button id="submit" class="btn btn-primary">Save Details</button>
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

                $('input[type=radio][name=iiac]').change(function() {
                    if (this.value == '1') {
                        $(".adg").show();
                    }else {
                        $(".adg").hide();
                    }
                });

                $('input[type=radio][name=fxmo]').change(function() {
                    if (this.value == '1') {
                        $(".fxmo").show();
                    }else {
                        $(".fxmo").hide();
                    }
                });

                $('input[type=radio][name=hprs]').change(function() {
                    if (this.value == '1') {
                        $(".hprs_table").show();

                        // Total_commission_rece_company();
                        // Total_receipt_amount();
                        // var totla_bill_amount = $("#totla_bill_amount").val();
                        // var totla_receipt_amount = $("#totla_receipt_amount").val();

                        // if(totla_bill_amount == totla_receipt_amount){
                        //     $(".bill_table").attr("style","background-color:green");
                        //     $(".hprs_table").attr("style","background-color:green");
                        // }else{
                        //     $(".bill_table").attr("style","background-color:red");
                        //     $(".hprs_table").attr("style","background-color:red");
                        // }

                    }else {
                        $(".hprs_table").hide();
                        $("#append_receipt_details").empty();
                        $("#totla_receipt_amount").val("");
                    }
                });


                $('#psb').on('change', function() {

                    var val = this.value;

                    if(val=='Online Via Email'){
                        $('.ovp').hide();
                        $('.vc').hide();
                        $('.vof').hide();

                        $('.ove').fadeIn(1500);
                    }

                    if(val=='Online Via Portal'){
                        $('.ove').hide();
                        $('.vc').hide();
                        $('.vof').hide();

                        $('.ovp').fadeIn(1500);
                    }

                    if(val=='Via Courier'){
                        $('.ove').hide();
                        $('.vof').hide();
                        $('.ovp').hide();

                        $('.vc').fadeIn(1500);
                    }

                    if(val=='Via Original File'){
                        $('.ove').hide();
                        $('.ovp').hide();
                        $('.vc').hide();

                        $('.vof').fadeIn(1500);
                    }

                });


                // Add/Remove Hospital Details >> ADD ROWs FOR MORE DETAILS
                function AddHospitalDetails(add_remark) {
                    var tr_table = '';
                    add_remark = add_remark + 1;
                    $("#add_hospital_details_0").attr("onClick", "AddHospitalDetails(" + add_remark + ")");

                    tr_table += '<tr><td> <input type="text" name="hospital_details_name[]" id="hospital_details_name" placeholder="Enter Hospital Name" class="form-control hospital_details_name"></td>';

                    tr_table += '<td> <input type="date" name="hospital_details_date[]" id="hospital_details_date" placeholder="Enter date" class="form-control hospital_details_date"></td>';

                    tr_table += '<td> <input type="date" name="hospital_details_discharge_date[]" id="hospital_details_discharge_date" placeholder="Enter date" class="form-control hospital_details_discharge_date"></td>';

                    tr_table += '<td> <input type="text" name="hospital_details_diagnosis[]" id="hospital_details_diagnosis" placeholder="Enter Diagnosis" class="form-control hospital_details_diagnosis"></td>';

                    tr_table += '<td align="right"> <button class="btn btn-danger btn-sm dripicons-cross" id="remove_hospital_details_'+add_remark+'" onClick="RemoveHospitalDetails('+add_remark+')"></button></td></tr>';

                    $("#append_hospital_details").append(tr_table);
                    
                }

                function RemoveHospitalDetails(add_remark) {
                    $("#remove_hospital_details_" + add_remark).closest("tr").remove();
                }



                // Add/Remove Bill Details >> ADD ROWs FOR MORE DETAILS
                function AddBillDetails(add_remark) {
                    var tr_table = '';
                    add_remark = add_remark + 1;
                    $("#add_bill_details_0").attr("onClick", "AddBillDetails(" + add_remark + ")");

                    tr_table += '<tr><td> <input type="text" name="bill_details_bill_no" id="bill_details_bill_no" placeholder="Enter Bill No" class="form-control bill_details_bill_no"></td>';

                    tr_table += '<td> <input type="date" name="bill_details_date[]" id="bill_details_date" placeholder="Enter date" class="form-control bill_details_date"></td>';

                    tr_table += '<td> <input type="text" name="bill_details_biller_name" id="bill_details_biller_name" placeholder="Name Of Biller" class="form-control bill_details_biller_name"></td>';

                    tr_table += '<td> <select class="form-control" id="claiment_name" name="claiment_name"> <option value="" disabled="" selected="">Select Type</option> <option value="Hospital Final Bill">Hospital Final Bill</option> <option value="Pathology Bill">Pathology Bill</option> <option value="Medicine Bill">Medicine Bill</option> <option value="Other Bill">Other Bill</option> </select> <textarea name="bill_details_description" id="bill_details_description" placeholder="Enter Description" class="mt-1 form-control bill_details_description"></textarea></td>';

                    tr_table += '<td> <input type="number" name="bill_details_bill_amount" id="bill_details_bill_amount" placeholder="Amount Of Bill" class="form-control bill_details_bill_amount" onkeyup="Total_commission_rece_company()"></td>';

                    tr_table += '<td align="right"> <button class="btn btn-danger btn-sm dripicons-cross" id="remove_bill_details_'+add_remark+'" onClick="RemoveBillDetails('+add_remark+')"></button></td></tr>';

                    $("#append_bill_details").append(tr_table);
                    
                }

                function RemoveBillDetails(add_remark) {
                    $("#remove_bill_details_" + add_remark).closest("tr").remove();
                }


                function Total_commission_rece_company() {
                    var inputs = $(".bill_details_bill_amount");
                    var total = 0;
                    for (var i = 0; i < inputs.length; i++) {
                        var commission_rece_company = $(inputs[i]).val();
                        total = total + parseFloat(commission_rece_company);
                        if (isNaN(total))
                            total = 0;
                        else
                            total = total;
                        $("#totla_bill_amount").val(total.toFixed(2));
                    }
                }

                function Total_receipt_amount() {
                    var inputs = $(".receipt_details_receipt_amount");
                    var total = 0;
                    for (var i = 0; i < inputs.length; i++) {
                        var receipt_amount = $(inputs[i]).val();
                        total = total + parseFloat(receipt_amount);
                        if (isNaN(total))
                            total = 0;
                        else
                            total = total;
                        $("#totla_receipt_amount").val(total.toFixed(2));
                    }

                    // if($("#append_receipt_details tr").is(":visible") == false)
                    // {
                    //     $("#totla_receipt_amount").val(0);
                    // }
                }



                // Add/Remove Bill Details >> ADD ROWs FOR MORE DETAILS
                function AddReceiptDetails(add_remark) {
                    var tr_table = '';
                    add_remark = add_remark + 1;
                    $("#add_receipt_details_0").attr("onClick", "AddReceiptDetails(" + add_remark + ")");

                    tr_table += '<tr><td> <input type="text" name="receipt_details_receipt_no" id="receipt_details_receipt_no" placeholder="Enter Receipt No" class="form-control receipt_details_receipt_no"></td>';

                    tr_table += '<td> <input type="date" name="receipt_details_date" id="receipt_details_date" placeholder="Enter date" class="form-control receipt_details_date"></td>';

                    tr_table += '<td> <input type="number" name="receipt_details_receipt_amount" id="receipt_details_receipt_amount" placeholder="Amount" class="form-control receipt_details_receipt_amount" onkeyup="Total_receipt_amount()"></td>';

                    tr_table += '<td align="right"> <button class="btn btn-danger btn-sm dripicons-cross" id="remove_receipt_details_'+add_remark+'" onClick="RemoveReceiptDetails('+add_remark+')"></button></td></tr>';

                    $("#append_receipt_details").append(tr_table);
                    
                }

                function RemoveReceiptDetails(add_remark) {
                    $("#remove_receipt_details_" + add_remark).closest("tr").remove();
                }

                // Add/Remove Bill Details >> ADD ROWs FOR MORE DETAILS
                function AddQueryDetails(add_remark) {
                    var tr_table = '';
                    add_remark = add_remark + 1;
                    $("#add_query_details_0").attr("onClick", "AddQueryDetails(" + add_remark + ")");

                    tr_table += '<tr><td style="display:flex;"><input type="file" name="query_details_file" id="query_details_file_'+add_remark+'" class="form-control query_details_file">&nbsp;<button class="btn btn-success btn-sm dripicons-upload" id="upload_query_details_'+add_remark+'" onClick="UploadFile(\'query_details\', '+add_remark+', \'mediclaim_query_upload\')"></button> <span  style="display:none;" class="badge badge-success p-2" id="query_details_file_name_'+add_remark+'"></span><input type="hidden" name="query_details_actual_file_name_'+add_remark+'" id="query_details_actual_file_name_'+add_remark+'" class="form-control query_details_actual_file_name_'+add_remark+'"> </td>';

                    tr_table += '<td> <input type="date" name="query_details_date" id="query_details_date" placeholder="Enter date" class="form-control query_details_date"></td>';

                    tr_table += '<td> <input type="text" name="query_details_query_remark" id="query_details_query_remark" placeholder="Remark" class="form-control query_details_query_remark"></td>';

                    tr_table += '<td align="right"> <button class="btn btn-danger btn-sm dripicons-cross" id="remove_query_details_'+add_remark+'" onClick="RemoveQueryDetails('+add_remark+')"></button></td></tr>';

                    $("#append_query_details").append(tr_table);
                    
                }

                function RemoveQueryDetails(add_remark) {
                    $("#remove_query_details_" + add_remark).closest("tr").remove();
                }



                // SAVE DATA To DATABASE

                $("#submit").click(function() {

                    var reg_mediclaim_hospital_details = $("#policy_holder_id").val();
                    var reg_mediclaim_past_illness = $("#pstillnsdtls").val();
                    var reg_mediclaim_claim_type = $("#policy_holder_id").val();
                    var reg_mediclaim_claim_file_no = $("#policy_holder_id").val();
                    var reg_mediclaim_claim_given_date = $("#policy_holder_id").val();
                    var reg_mediclaim_claim_given_email = $("#policy_holder_id").val();
                    var reg_mediclaim_claim_given_time = $("#policy_holder_id").val();
                    var reg_mediclaim_question_dfrc = $("#policy_holder_id").val();
                    var reg_mediclaim_question_pso = $("#policy_holder_id").val();
                    var reg_mediclaim_question_prot = $("#policy_holder_id").val();
                    var reg_mediclaim_question_psb = $("#policy_holder_id").val();
                    var reg_mediclaim_question_psb_email = $("#policy_holder_id").val();
                    var reg_mediclaim_question_psb_ticketno = $("#policy_holder_id").val();
                    var reg_mediclaim_question_psb_courier_ackgmnt = $("#policy_holder_id").val();
                    var reg_mediclaim_question_psb_courier_receipt = $("#policy_holder_id").val();
                    var reg_mediclaim_question_psb_ogfile_ackgmnt = $("#policy_holder_id").val();
                    var reg_mediclaim_question_dcss = $("#policy_holder_id").val();
                    var reg_mediclaim_question_adca = $("#policy_holder_id").val();
                    var reg_mediclaim_question_iiac = $("#policy_holder_id").val();
                    var reg_mediclaim_question_adg = $("#policy_holder_id").val();
                    var reg_mediclaim_kyc_phkd_pan = $("#policy_holder_id").val();
                    var reg_mediclaim_kyc_phkd_aadhar = $("#policy_holder_id").val();
                    var reg_mediclaim_kyc_phkd_og_can_cheque = $("#policy_holder_id").val();
                    var reg_mediclaim_kyc_ckd_pan = $("#policy_holder_id").val();
                    var reg_mediclaim_kyc_ckd_aadhar = $("#policy_holder_id").val();
                    var reg_mediclaim_kyc_ckd_og_can_cheque = $("#policy_holder_id").val();
                    var reg_mediclaim_kyc_pan = $("#policy_holder_id").val();
                    var reg_mediclaim_kyc_aadhar = $("#policy_holder_id").val();
                    var reg_mediclaim_kyc_og_can_cheque = $("#policy_holder_id").val();
                    var reg_mediclaim_bill_entry = $("#policy_holder_id").val();
                    var reg_mediclaim_hprs = $("#policy_holder_id").val();
                    var reg_mediclaim_query_reply_upload = $("#policy_holder_id").val();
                    var reg_mediclaim_od_response = $("#policy_holder_id").val();
                    var reg_mediclaim_od_hospital_bill_breakup = $("#policy_holder_id").val();
                    var reg_mediclaim_od_original_discharge = $("#policy_holder_id").val();
                    var reg_mediclaim_od_prescription = $("#policy_holder_id").val();
                    var reg_mediclaim_od_consultation_paper = $("#policy_holder_id").val();
                    var reg_mediclaim_od_claim_form_b = $("#policy_holder_id").val();
                    var reg_mediclaim_od_films = $("#policy_holder_id").val();
                    var reg_mediclaim_od_films_count = $("#policy_holder_id").val();
                    var reg_mediclaim_claim_form = $("#policy_holder_id").val();


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

                    var url = "<?php echo base_url(); ?>master/claims/save_mediclaim_register";
                    var err_flag =0;
                    $("#append_hospital_details tr:has(.hospital_details_name)").each(function(key, val) {

                        var hospital_details_name = $(".hospital_details_name", this).val();
                        var hospital_details_date = $(".hospital_details_date", this).val();
                        var hospital_details_discharge_date = $(".hospital_details_discharge_date", this).val();
                        var hospital_details_diagnosis = $(".hospital_details_diagnosis", this).val();

                        actual_hospital_details.push([key, hospital_details_name, hospital_details_date, hospital_details_discharge_date, hospital_details_diagnosis]);

                    });

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


                function UploadFile(prefix = '', id = '', type = ''){

                    //alert(id+' :: '+type);

                    var fd = new FormData();
                    var files = $('#'+prefix+'_file_'+id)[0].files;
                    var url = "<?php echo base_url(); ?>master/claims/mediclaim_up";

                    if(files.length > 0 ){
                        fd.append('file', files[0]);
                        fd.append('type', type);
                        fd.append('id', id);
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: fd,
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            success: function(data){
                                //console.log(data);
                                if(data['status']){
                                    $("#"+prefix+"_file_"+id).hide();
                                    $("#upload_"+prefix+"_"+id).hide();
                                    $("#"+prefix+"_file_name_"+id).show();
                                    $("#"+prefix+"_file_name_"+id).html("Uploaded");
                                    $("#"+prefix+"_actual_file_name_"+id).val(data['file_name']);
                                    toast("Success", "Uploaded", "success");
                                }else{
                                    toast("Failed", "Failed to upload file", "error");
                                }
                            },
                        });
                    }else{
                        alert("Please select a file.");
                    }

                    }


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