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
                                            <h4 class="header-title text-danger">ACTUAL CLAIM STATUS : </h4>
                                        </div>
                                        <div class="col-md-4 offset-md-4 text-right">
                                            <select name="actual_claim_status" id="actual_claim_status" class="form-control">
                                                <option value="">Select Status</option>
                                                <option value="claim_intimated">Claim Intimated</option>
                                                <option value="under_process">Under Process</option>
                                                <option value="query">Query</option>
                                                <option value="partly_settled">Partly Settled</option>
                                                <option value="settled">Settled</option>
                                                <option value="paper_submitted">Paper Submitted</option>
                                            </select>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <h4 class="header-title">Claiment Info (Step One)</h4>
                                        </div>
                                        <div class="col-md-4 offset-md-4 text-right">
                                            <a class='btn btn-primary btn-sm text-white' id='ListForm' href="<?php echo base_url(); ?>master/claims/">Edit Claim Info (Step One)</a>
                                            <a class='btn btn-facebook btn-sm text-white' id='ListForm' href="<?php echo base_url(); ?>master/claims/">Claim List</a>
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
                                                                <label for="claiment_name" class="col-form-label col-md-6">Claiment Name<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control col-md-6" id="claiment_name" name="claiment_name" value="<?php echo $result_data['member_name']; ?>" readonly />
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
                                                                <label for="policy_type" class="col-form-label col-md-6">Policy Type<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control col-md-6" id="policy_type" name="policy_type" value="<?php echo $result_data['claims_type']; ?>" readonly />
                                                                <span id="policy_type_error"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="date_of_al" class="col-form-label col-md-6">Date of Admission/Loss<span class="text-danger">*</span></label>
                                                                <input type="text" name="date_of_al" id="date_of_al" placeholder="Date dd-mm-yyyy" class="form-control col-md-6" value="<?php echo $result_data['date_loss_addmission']; ?>" readonly />
                                                                <span id="date_of_al_error"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="policy_type" class="col-form-label col-md-6">Status<span class="text-danger">*</span></label>
                                                                <input type="text" name="status" id="status" placeholder="Status" class="form-control col-md-6" value="<?php echo $result_data['intimation_status']; ?>" readonly />
                                                                <span class="text-right" id="status_error"></span>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <hr>

                                                    <div style="display: none;">

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <h4 class="header-title">Claim Questions</h4>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <table class="table" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th width="50%">Question</th>
                                                                    <th width="50%">Answer</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="question_append">
                                                            <?php
                                                            $arrayQ = json_decode($result_data['question']);
                                                            $arrayA = json_decode($result_data['questions_list']);
                                                            $count = count($arrayA);
                                                            for($i= 0; $i<$count; $i++){
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-group row"><label for="answer" class="col-form-label col-md-12"><?php echo $arrayQ[$i]; ?><span class="text-danger">*</span></label></td>
                                                                <td><input value="<?php echo $arrayA[$i]; ?>" class="form-control col-md-12 answer" readonly/></div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                              }  
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <h4 class="header-title">Letter Format</h4>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-8 offset-md-2" style="border: 1px solid #ccc!important;padding: 15px;border-radius: 10px;">
                                                                <?php echo html_entity_decode($result_data['letter_format']); ?>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>


                                                    <!-- Surveyour Details -->

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <h4 class="header-title">Surveyour Details</h4>
                                                        </div>
                                                        <div class="col-md-2 offset-md-6">
                                                        <button class="btn btn-primary btn-sm dripicons-plus btn-block" id="add_surveyour_details_0" onClick="AddSurveyourDetails(0)"> Add Surveyour Details</button>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="col-md-12">
                                                        <table class="table" style="border: 1px solid #dddddd;padding: 8px; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                <td>Name of surveyor</td>
                                                                <td>Contact Number</td>
                                                                <td>Office Contact</td>
                                                                <td>Email-id</td>
                                                                <td>Office Address</td>
                                                                <td width="5%" align="right">Remove</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="append_surveyour_details">
                                                            <?php

                                                                $array = $result_data['svyr_details_list'];
                                                                
                                                                if(!empty($array)){
                                                                    $json = json_decode($array);
                                                                    $count = count($json);
                                                                }else{
                                                                    $count = 0;
                                                                }

                                                                for($i = 0; $i < $count; $i++){
                                                            ?>
                                                                <tr style="padding:10px;">
                                                                    <td>
                                                                        <input type="text" name="surveyour_details_name_of_surveyor[]" id="surveyour_details_name_of_surveyor" placeholder="Enter name_of_surveyor" class="form-control surveyour_details_name_of_surveyor" value="<?php echo $json[$i][1]; ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="surveyour_details_contact_number[]" id="surveyour_details_contact_number" placeholder="Enter contact_number" class="form-control surveyour_details_contact_number" value="<?php echo $json[$i][2]; ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="surveyour_details_office_contact[]" id="surveyour_details_office_contact" placeholder="Enter office_contact" class="form-control surveyour_details_office_contact" value="<?php echo $json[$i][3]; ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="surveyour_details_email_id[]" id="surveyour_details_email_id" placeholder="Enter email_id" class="form-control surveyour_details_email_id" value="<?php echo $json[$i][4]; ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="surveyour_details_office_address[]" id="surveyour_details_office_address" placeholder="Enter office_address" class="form-control surveyour_details_office_address" value="<?php echo $json[$i][5]; ?>">
                                                                    </td>
                                                                    <td align="right">
                                                                        <button class="btn btn-danger btn-sm dripicons-cross" id="remove_surveyour_details_<?php echo $i; ?>" onClick="RemoveSurveyourDetails(<?php echo $i; ?>)"></button>
                                                                    </td>
                                                                </tr>
                                                            <?php }  ?>
                                                            </tbody>

                                                        </table>

                                                    </div>

                                                    <hr>
                                                    <!-- Survey Details -->

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <h4 class="header-title">Survey Details</h4>
                                                        </div>
                                                        <div class="col-md-2 offset-md-6">
                                                        <?php

                                                                $array10 = $result_data['srvey_details_list'];

                                                                if(!empty($array10)){
                                                                    $json10 = json_decode($array10);
                                                                    $count10 = count($json10);
                                                                }else{
                                                                    $count10 = 0;
                                                                }
                                                        ?>
                                                        <button class="btn btn-primary btn-sm dripicons-plus btn-block" id="add_survey_details_0" onClick="AddSurveyDetails(<?php echo $count10-1; ?>)"> Add Survey Details</button>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="col-md-12">
                                                        <table class="table" style="border: 1px solid #dddddd;padding: 8px; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <td width="20%">Name of Surveyor</td>
                                                                    <td width="20%">Date Of Survey</td>
                                                                    <td width="30%">Description</td>
                                                                    <td width="20%">File Upload</td>
                                                                    <td width="5%" align="right">Remove</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="append_survey_details">
                                                            <?php

                                                                $array0 = $result_data['srvey_details_list'];
                                                                
                                                                if(!empty($array0)){
                                                                    $json0 = json_decode($array0);
                                                                    $count0 = count($json0);
                                                                }else{
                                                                    $count0 = 0;
                                                                }

                                                                $array = $result_data['svyr_details_list'];
                                                                $survey_array = $result_data['srvey_details_list'];

                                                                for($k = 0; $k < $count0; $k++){
                                                            ?>

                                                                <tr style="padding:10px;">
                                                                    <td>
                                                                        <select class="form-control survey_details_survey_name" name="survey_details_survey_name[]">
                                                                            <option value="">Select</option>

                                                                            <?php

                                                                                if(!empty($array)){
                                                                                    $json = json_decode($array);
                                                                                    $count = count($json);

                                                                                    $survey_json = json_decode($survey_array);
                                                                                    $survey_count = count($survey_json);
                                                                                }else{
                                                                                    $count = 0;
                                                                                }

                                                                                for($i = 0; $i < $count; $i++){

                                                                                    $check = str_replace(" ","",$survey_json[$j][1]);
                                                                                    if($json[$i][1]==$survey_json[$k][1])
                                                                                    {
                                                                                        $selected = 'selected';
                                                                                    }else{
                                                                                        $selected = "";
                                                                                    }
                                                                            ?>

                                                                            <option  value="<?php echo $json[$i][1]; ?>" <?php echo $selected; ?>><?php echo $json[$i][1]; ?></option>

                                                                            <?php } ?>

                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <input type="date" name="survey_details_date[]" id="survey_details_date" placeholder="Enter servey_date" class="form-control survey_details_date" value="<?php echo $json0[$k][2]; ?>">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="survey_details_description[]" id="survey_details_description" placeholder="Enter office_contact" class="form-control survey_details_description" value="<?php echo $json0[$k][3]; ?>">
                                                                    </td>
                                                                    <td style="display:flex;">

                                                                        <?php

                                                                        $sd_file = $json0[$k][4];
                                                                        if(empty($sd_file)){

                                                                        ?>

                                                                        <input type="file" name="survey_details_file[]" id="survey_details_file_<?php echo $k; ?>" class="form-control survey_details_file">&nbsp;<button class="btn btn-success btn-sm dripicons-upload" id="upload_survey_details_<?php echo $k; ?>" onClick="UploadSurveyDetails(<?php echo $k; ?>, 'servey_details')"></button> <span  style="display:none;" class="badge badge-success p-2" id="survey_details_file_name_<?php echo $k; ?>"></span><input type="hidden" name="survey_details_actual_file_name_<?php echo $k; ?>" id="survey_details_actual_file_name_<?php echo $k; ?>" class="form-control survey_details_actual_file_name_<?php echo $k; ?>">

                                                                        <?php }else{ ?>

                                                                        <a href="<?php echo base_url().'claims/survey_details/'.$json0[$k][4]; ?>">
                                                                            <span class="badge badge-success p-2" id="survey_details_file_name_<?php echo $k; ?>">Check File</span>
                                                                        </a>
                                                                        <input type="hidden" name="survey_details_actual_file_name_<?php echo $k; ?>" id="survey_details_actual_file_name_<?php echo $k; ?>" class="form-control survey_details_actual_file_name_<?php echo $k; ?>" value="<?php echo $json0[$k][4]; ?>">

                                                                        <?php } ?>

                                                                    </td>
                                                                    <td align="right">
                                                                        <button class="btn btn-danger btn-sm dripicons-cross" id="remove_survey_details_<?php echo $k; ?>" onClick="RemoveSurveyDetails(<?php echo $k; ?>)"></button>
                                                                    </td>
                                                                </tr>

                                                            <?php } ?>

                                                            </tbody>

                                                        </table>

                                                    </div>

                                                    <hr>

                                                    <!-- Document Required Details -->
                                                    <!-- Document Required From Client Details -->
                                                    <div class="row">

                                                        <!-- Document Required Details -->
                                                        <div class="col-md-6">

                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <h4 class="header-title">Document Required</h4>
                                                                </div>
                                                                <div class="col-md-3 offset-md-6" align="righr">
                                                                <button class="btn btn-primary btn-sm dripicons-plus btn-block" id="add_document_required_0" onClick="AddDocumentRequired(0)"> Add Document</button>
                                                                </div>
                                                            </div>
                                                            <br>

                                                            <div class="col-md-12">
                                                                <table class="table" style="border: 1px solid #dddddd;padding: 8px; width: 100%;">
                                                                    <thead>
                                                                        <tr>
                                                                            <td width="30%">Document Type</td>
                                                                            <td width="30%">File</td>
                                                                            <td width="35%">Surveyour Name</td>
                                                                            <td width="5%" align="right">Remove</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="append_document_required">

                                                                        <?php

                                                                            $doc_req_array = $result_data['doc_requirment_list'];
                                                                            
                                                                            if(!empty($doc_req_array)){
                                                                                $doc_req_json = json_decode($doc_req_array);
                                                                                $doc_req_count = count($doc_req_json);
                                                                            }else{
                                                                                $doc_req_count = 0;
                                                                            }

                                                                            $array = $result_data['svyr_details_list'];
                                                                            $doc_requirment_array = $result_data['doc_requirment_list'];

                                                                            for($a = 0; $a < $doc_req_count; $a++){
                                                                        ?>

                                                                        <tr style="padding:10px;">
                                                                            <td>
                                                                                <select class="form-control document_required_type" name="document_required_type[]">
                                                                                    <option value="">Select</option>
                                                                                    <?php
                                                                                        $arrayDoc = $result_data['document_arr'];
                                                                                        //$jsonDoc = json_decode($arrayDoc);
                                                                                        $countDoc = count($arrayDoc);
                                                                                        for($i = 0; $i < $countDoc; $i++){

                                                                                            if($arrayDoc[$i]['document_id']==$doc_req_json[$a][1])
                                                                                            {
                                                                                                $selected = 'selected';
                                                                                            }else{
                                                                                                $selected = "";
                                                                                            }
                                                                                            
                                                                                    ?>
                                                                                        <option <?php echo $selected; ?> value="<?php echo $arrayDoc[$i]['document_id']; ?>"><?php echo $arrayDoc[$i]['document_name']; ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </td>
                                                                            <td style="display:flex;">
                                                                                <!-- <input type="file" name="document_required_file[]" id="document_required_file" class="form-control document_required_file"> -->
                                                                                
                                                                                <?php

                                                                                $dr_file = $doc_req_json[$a][2];
                                                                                if(empty($dr_file)){

                                                                                ?>

                                                                                <input type="file" name="document_required_file[]" id="document_required_file_<?php echo $a; ?>" class="form-control document_required_file">&nbsp;<button class="btn btn-success btn-sm dripicons-upload" id="upload_document_required_file_<?php echo $a; ?>" onClick="UploadDocumentRequired(<?php echo $a; ?>, 'document_required')"></button> <span  style="display:none;" class="badge badge-success p-2" id="document_required_file_name_<?php echo $a; ?>"></span><input type="hidden" name="document_required_file_actual_file_name_<?php echo $a; ?>" id="document_required_file_actual_file_name_<?php echo $a; ?>" class="form-control document_required_file_actual_file_name_<?php echo $a; ?>">

                                                                                <?php }else{ ?>

                                                                                    <span class="badge badge-success p-2" id="document_required_file_name_<?php echo $a; ?>">Check File</span><input type="hidden" name="document_required_file_actual_file_name_<?php echo $a; ?>" id="document_required_file_actual_file_name_<?php echo $a; ?>" class="form-control document_required_file_actual_file_name_<?php echo $a; ?>" value="<?php echo $dr_file; ?>">

                                                                                <?php } ?>

                                                                            </td>
                                                                            <td>
                                                                                <select class="form-control document_required_serveyour_name" name="document_required_serveyour_name[]">
                                                                                    <option value="">Select</option>
                                                                                    
                                                                                    <?php

                                                                                        if(!empty($array)){
                                                                                            $json = json_decode($array);
                                                                                            $count = count($json);

                                                                                            $doc_requirment_json = json_decode($doc_requirment_array);

                                                                                        }else{
                                                                                            $count = 0;
                                                                                        }

                                                                                        for($i = 0; $i < $count; $i++){
                                                                                            
                                                                                                if($json[$i][1]==$doc_requirment_json[$a][3])
                                                                                                {
                                                                                                    $selected = 'selected';
                                                                                                }else{
                                                                                                    $selected = "";
                                                                                                }
                                                                                    ?>

                                                                                    <option  value="<?php echo $json[$i][1]; ?>" <?php echo $selected; ?>><?php echo $json[$i][1]; ?></option>

                                                                                    <?php } ?>

                                                                                </select>
                                                                            </td>
                                                                            <td align="right">
                                                                                <button class="btn btn-danger btn-sm dripicons-cross" id="remove_document_required_<?php echo $a; ?>" onClick="RemoveDocumentRequired(<?php echo $a; ?>)"></button>
                                                                            </td>
                                                                        </tr>

                                                                        <?php } ?>

                                                                    </tbody>

                                                                </table>

                                                            </div>
                                                        
                                                        </div>
                                                        
                                                        <!-- Document Required From Client Details -->
                                                        <div class="col-md-6">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h4 class="header-title">Document Required From Client</h4>
                                                                </div>
                                                                <div class="col-md-3 offset-md-3" align="righr">
                                                                <button class="btn btn-primary btn-sm dripicons-plus btn-block" id="add_document_required_client_0" onClick="AddDocumentRequiredClient(0)"> Add Document</button>
                                                                </div>
                                                            </div>
                                                            <br>

                                                            <div class="col-md-12">

                                                                <table class="table" style="border: 1px solid #dddddd;padding: 8px; width: 100%;">
                                                                    <thead>
                                                                        <tr>
                                                                            <td width="45%">Document Type</td>
                                                                            <td width="45%">File</td>
                                                                            <td width="10%" align="right">Remove</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="append_document_required_client">

                                                                        <?php

                                                                            $doc_req_client_array = $result_data['doc_received_from_client_list'];
                                                                            
                                                                            if(!empty($doc_req_client_array)){
                                                                                $doc_req_client_json = json_decode($doc_req_client_array);
                                                                                $doc_req_client_count = count($doc_req_client_json);
                                                                            }else{
                                                                                $doc_req_client_count = 0;
                                                                            }

                                                                            for($drc = 0; $drc < $doc_req_client_count; $drc++){
                                                                        ?>

                                                                        <tr style="padding:10px;">
                                                                            <td>
                                                                                <select class="form-control document_required_client_type" name="document_required_client_type[]">
                                                                                    <option value="">Select</option>
                                                                                    <?php
                                                                                        $arrayDocClient = $result_data['document_arr'];
                                                                                        $count = count($arrayDocClient);
                                                                                        for($i = 0; $i < $count; $i++){

                                                                                            if($arrayDocClient[$i]['document_id']==$doc_req_client_json[$drc][1])
                                                                                            {
                                                                                                $selectedDClient = 'selected';
                                                                                            }else{
                                                                                                $selectedDClient = "";
                                                                                            }
                                                                                    ?>
                                                                                        <option <?php echo $selectedDClient; ?> value="<?php echo $arrayDocClient[$i]['document_id']; ?>"><?php echo $arrayDocClient[$i]['document_name']; ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </td>
                                                                            <td style="display: flex;">

                                                                                <?php

                                                                                $drc_file = $doc_req_client_json[$drc][2];
                                                                                if(empty($drc_file)){

                                                                                ?>

                                                                                <input type="file" name="document_required_client_file[]" id="document_required_client_file" class="form-control document_required_client_file"> &nbsp;<button class="btn btn-success btn-sm dripicons-upload" id="upload_survey_details_<?php echo $k; ?>" onClick="UploadSurveyDetails(<?php echo $k; ?>, 'servey_details')"></button> <span  style="display:none;" class="badge badge-success p-2" id="survey_details_file_name_<?php echo $k; ?>"></span><input type="hidden" name="survey_details_actual_file_name_<?php echo $k; ?>" id="survey_details_actual_file_name_<?php echo $k; ?>" class="form-control survey_details_actual_file_name_<?php echo $k; ?>">

                                                                                <?php }else{ ?>

                                                                                <?php } ?>
                                                                            </td>
                                                                            <td align="right">
                                                                                <button class="btn btn-danger btn-sm dripicons-cross" id="remove_document_required_client_<?php echo $drc; ?>" onClick="RemoveDocumentRequiredClient(<?php echo $drc; ?>)"></button>
                                                                            </td>
                                                                        </tr>

                                                                        <?php } ?>

                                                                    </tbody>

                                                                </table>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <!-- Query Upload Details -->
                                                    <!-- Query Letter Reply Details -->
                                                    <div class="row">

                                                        <!-- Query Upload Details -->
                                                        <div class="col-md-6">

                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <h4 class="header-title">Query Upload</h4>
                                                                </div>
                                                                <div class="col-md-3 offset-md-6" align="righr">
                                                                <button class="btn btn-primary btn-sm dripicons-plus btn-block" id="add_query_upload_0" onClick="AddQueryUpload(0)"> Add Query Upload</button>
                                                                </div>
                                                            </div>
                                                            <br>

                                                            <div class="col-md-12">

                                                                <table class="table" style="border: 1px solid #dddddd;padding: 8px; width: 100%;">
                                                                    <thead>
                                                                        <tr>
                                                                            <td width="45%">Query Letter</td>
                                                                            <td width="45%">Date Of Query</td>
                                                                            <td width="10%" align="right">Remove</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="append_query_upload">

                                                                        <tr style="padding:10px;">
                                                                            <td>
                                                                                <input type="file" name="query_upload_file[]" id="query_upload_file" class="form-control query_upload_file">
                                                                            </td>
                                                                            <td>
                                                                                <input type="date" name="query_upload_date[]" id="query_upload_date" placeholder="Enter Date" class="form-control query_upload_date">
                                                                            </td>
                                                                            <td align="right">
                                                                                <button class="btn btn-danger btn-sm dripicons-cross" id="remove_query_upload_0" onClick="RemoveQueryUpload(0)"></button>
                                                                            </td>
                                                                        </tr>

                                                                    </tbody>

                                                                </table>

                                                            </div>
                                                        
                                                        </div>
                                                        
                                                        <!-- Query Letter Reply Details -->
                                                        <div class="col-md-6">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h4 class="header-title">Query Letter Reply</h4>
                                                                </div>
                                                                <div class="col-md-3 offset-md-3" align="righr">
                                                                <button class="btn btn-primary btn-sm dripicons-plus btn-block" id="add_query_letter_reply_0" onClick="AddQueryLetterReply(0)"> Add Document</button>
                                                                </div>
                                                            </div>
                                                            <br>

                                                            <div class="col-md-12">

                                                                <table class="table" style="border: 1px solid #dddddd;padding: 8px; width: 100%;">
                                                                        <thead>
                                                                            <tr>
                                                                                <td width="45%">Query Letter</td>
                                                                                <td width="45%">Remark</td>
                                                                                <td width="10%" align="right">Remove</td>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="append_query_letter_reply">

                                                                            <tr style="padding:10px;">
                                                                                <td>
                                                                                    <input type="file" name="query_letter_reply_file[]" id="query_letter_reply_file" class="form-control query_letter_reply_file">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="query_letter_reply_remark[]" id="query_letter_reply_remark" placeholder="Enter Remark" class="form-control query_letter_reply_remark">
                                                                                </td>
                                                                                <td align="right">
                                                                                    <button class="btn btn-danger btn-sm dripicons-cross" id="remove_query_letter_reply_0" onClick="RemoveQueryLetterReply(0)"></button>
                                                                                </td>
                                                                            </tr>

                                                                        </tbody>

                                                                    </table>

                                                            </div>

                                                        </div>

                                                    </div>


                                                </div>

                                                <div class="col-md-6 offset-md-3 mt-2">
                                                    <center>
                                                        <button id="submit" class="btn btn-primary">Save Claim</button>
                                                    </center>
                                                </div>

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

                var claim_status = "<?php echo $result_data['actual_claim_status']; ?>";
                $("#actual_claim_status").val(claim_status);

                // Add/Remove Surveyour Details >> ADD ROWs FOR MORE DETAILS
                function AddSurveyourDetails(add_remark) {
                    var tr_table = '';
                    add_remark = add_remark + 1;
                    $("#add_surveyour_details_0").attr("onClick", "AddSurveyourDetails(" + add_remark + ")");

                    tr_table += '<tr style="padding:10px;"><td><input type="text" name="surveyour_details_name_of_surveyor[]" id="surveyour_details_name_of_surveyor" placeholder="Enter name_of_surveyor" class="form-control surveyour_details_name_of_surveyor"> </td>';

                    tr_table += '<td> <input type="text" name="surveyour_details_contact_number[]" id="surveyour_details_contact_number" placeholder="Enter contact_number" class="form-control surveyour_details_contact_number"> </td>';

                    tr_table += '<td> <input type="text" name="surveyour_details_office_contact[]" id="surveyour_details_office_contact" placeholder="Enter office_contact" class="form-control surveyour_details_office_contact"> </td>';

                    tr_table += '<td> <input type="text" name="surveyour_details_email_id[]" id="surveyour_details_email_id" placeholder="Enter email_id" class="form-control surveyour_details_email_id"> </td>';

                    tr_table += '<td> <input type="text" name="surveyour_details_office_address[]" id="surveyour_details_office_address" placeholder="Enter office_address" class="form-control surveyour_details_office_address"> </td>';

                    tr_table += '<td align="right"> <button class="btn btn-danger btn-sm dripicons-cross" id="remove_surveyour_details_'+add_remark+'" onClick="RemoveSurveyourDetails('+add_remark+')"></button> </td></tr>';

                    $("#append_surveyour_details").append(tr_table);
                    
                }

                function RemoveSurveyourDetails(add_remark) {
                    $("#remove_surveyour_details_" + add_remark).closest("tr").remove();
                }


                // Add/Remove Survey Details >> ADD ROWs FOR MORE DETAILS
                function AddSurveyDetails(add_remark) {
                    var tr_table = '';
                    add_remark = add_remark + 1;
                    $("#add_survey_details_0").attr("onClick", "AddSurveyDetails(" + add_remark + ")");

                    tr_table += '<tr style="padding:10px;"> <td> <select class="form-control survey_details_survey_name" name="survey_details_survey_name[]"> <option value="">Select</option> <?php $array=$result_data["svyr_details_list"]; if(!empty($array)){$json=json_decode($array); $count=count($json);}else{$count=0;}for($i=0; $i < $count; $i++){?><option value="<?php echo $json[$i][1]; ?>"><?php echo $json[$i][1]; ?></option><?php } ?> </select></td>';

                    tr_table += '<td> <input type="date" name="survey_details_date[]" id="survey_details_date" placeholder="Enter servey_date" class="form-control survey_details_date"></td>';

                    tr_table += '<td> <input type="text" name="survey_details_description[]" id="survey_details_description" placeholder="Enter office_contact" class="form-control survey_details_description"></td>';

                    tr_table += '<td style="display:flex;"><input type="file" name="survey_details_file[]" id="survey_details_file_'+add_remark+'" class="form-control survey_details_file">&nbsp;<button class="btn btn-success btn-sm dripicons-upload" id="upload_survey_details_'+add_remark+'" onClick="UploadSurveyDetails('+add_remark+', \'servey_details\')"></button> <span  style="display:none;" class="badge badge-success p-2" id="survey_details_file_name_'+add_remark+'"></span><input type="hidden" name="survey_details_actual_file_name_'+add_remark+'" id="survey_details_actual_file_name_'+add_remark+'" class="form-control survey_details_actual_file_name_'+add_remark+'"> </td>';

                    tr_table += '<td align="right"> <button class="btn btn-danger btn-sm dripicons-cross" id="remove_survey_details_'+add_remark+'" onClick="RemoveSurveyDetails('+add_remark+')"></button></td></tr>';

                    $("#append_survey_details").append(tr_table);
                    
                }

                function RemoveSurveyDetails(add_remark) {
                    $("#remove_survey_details_" + add_remark).closest("tr").remove();
                }


                // Add/Remove DOCUMENT REQUIRED >> ADD ROWs FOR MORE DETAILS
                function AddDocumentRequired(add_remark) {
                    var tr_table = '';
                    add_remark = add_remark + 1;
                    $("#add_document_required_0").attr("onClick", "AddDocumentRequired(" + add_remark + ")");

                    tr_table += '<tr style="padding:10px;"> <td> <select class="form-control document_required_type" name="document_required_type[]"> <option value="">Select</option> <?php $arrayDoc=$result_data["document_arr"]; $count=count($arrayDoc); for($i=0; $i < $count; $i++){?> <option value="<?php echo $arrayDoc[$i]["document_id"]; ?>"><?php echo $arrayDoc[$i]["document_name"]; ?></option> <?php } ?> </select> </td>';


                    tr_table += '<td style="display:flex;"><input type="file" name="document_required_file[]" id="document_required_file_'+add_remark+'" class="form-control document_required_file">&nbsp;<button class="btn btn-success btn-sm dripicons-upload" id="upload_document_required_file_'+add_remark+'" onClick="UploadDocumentRequired('+add_remark+', \'document_required\')"></button> <span  style="display:none;" class="badge badge-success p-2" id="document_required_file_name_'+add_remark+'"></span><input type="hidden" name="document_required_file_actual_file_name_'+add_remark+'" id="document_required_file_actual_file_name_'+add_remark+'" class="form-control document_required_file_actual_file_name_'+add_remark+'"> </td>';

                    //tr_table += '<td> <input type="file" name="document_required_file[]" id="document_required_file" class="form-control document_required_file"> </td>';

                    tr_table += '<td> <select class="form-control document_required_serveyour_name" name="document_required_serveyour_name[]"> <option value="">Select</option> <?php $array=$result_data["svyr_details_list"]; if(!empty($array)){$json=json_decode($array); $count=count($json);}else{$count=0;}for($i=0; $i < $count; $i++){?><option value="<?php echo $json[$i][1]; ?>"><?php echo $json[$i][1]; ?></option><?php } ?> </select> </td>';

                    tr_table += '<td align="right"> <button class="btn btn-danger btn-sm dripicons-cross" id="remove_document_required_'+add_remark+'" onClick="RemoveDocumentRequired('+add_remark+')"></button> </td></tr>';

                    $("#append_document_required").append(tr_table);
                    
                }

                function RemoveDocumentRequired(add_remark) {
                    $("#remove_document_required_" + add_remark).closest("tr").remove();
                }


                // Add/Remove DOCUMENT REQUIRED FROM CLIENT >> ADD ROWs FOR MORE DETAILS
                function AddDocumentRequiredClient(add_remark) {
                    var tr_table = '';
                    add_remark = add_remark + 1;
                    $("#add_document_required_client_0").attr("onClick", "AddDocumentRequiredClient(" + add_remark + ")");

                    tr_table += '<tr style="padding:10px;"> <td> <select class="form-control document_required_client_type" name="document_required_client_type[]"> <option value="">Select</option> <?php $arrayDoc=$result_data["document_arr"]; $count=count($arrayDoc); for($i=0; $i < $count; $i++){?> <option value="<?php echo $arrayDoc[$i]["document_id"]; ?>"><?php echo $arrayDoc[$i]["document_name"]; ?></option> <?php } ?> </select> </td>';

                    tr_table += '<td> <input type="file" name="document_required_client_file[]" id="document_required_client_file" class="form-control document_required_client_file"> </td>';

                    tr_table += '<td align="right"> <button class="btn btn-danger btn-sm dripicons-cross" id="remove_document_required_client_'+add_remark+'" onClick="RemoveDocumentRequiredClient('+add_remark+')"></button> </td></tr>';

                    $("#append_document_required_client").append(tr_table);
                    
                }

                function RemoveDocumentRequiredClient(add_remark) {
                    $("#remove_document_required_client_" + add_remark).closest("tr").remove();
                }


                // Add/Remove DOCUMENT REQUIRED FROM CLIENT >> ADD ROWs FOR MORE DETAILS
                function AddQueryUpload(add_remark) {
                    var tr_table = '';
                    add_remark = add_remark + 1;
                    $("#add_query_upload_0").attr("onClick", "AddQueryUpload(" + add_remark + ")");

                    tr_table += '<tr style="padding:10px;"> <td> <input type="file" name="query_upload_file[]" id="query_upload_file" class="form-control query_upload_file"> </td>';

                    tr_table += '<td> <input type="date" name="query_upload_date[]" id="query_upload_date" placeholder="Enter Date" class="form-control query_upload_date"> </td>';

                    tr_table += '<td align="right"> <button class="btn btn-danger btn-sm dripicons-cross" id="remove_query_upload_'+add_remark+'" onClick="RemoveQueryUpload('+add_remark+')"></button> </td></tr>';

                    $("#append_query_upload").append(tr_table);
                    
                }

                function RemoveQueryUpload(add_remark) {
                    $("#remove_query_upload_" + add_remark).closest("tr").remove();
                }


                // Add/Remove QUERY LETTER REPLY >> ADD ROWs FOR MORE DETAILS
                function AddQueryLetterReply(add_remark) {
                    var tr_table = '';
                    add_remark = add_remark + 1;
                    $("#add_query_letter_reply_0").attr("onClick", "AddQueryLetterReply(" + add_remark + ")");

                    tr_table += '<tr><td> <input type="file" name="query_letter_reply_file[]" id="query_letter_reply_file" class="form-control query_letter_reply_file"> </td>';

                    tr_table += '<td> <input type="text" name="query_letter_reply_remark[]" id="query_letter_reply_remark" placeholder="Enter Remark" class="form-control query_letter_reply_remark"> </td>';

                    tr_table += '<td align="right"> <button class="btn btn-danger btn-sm dripicons-cross" id="remove_query_letter_reply_'+add_remark+'" onClick="RemoveQueryLetterReply('+add_remark+')"></button> </td></tr>';

                    $("#append_query_letter_reply").append(tr_table);
                    
                }

                function RemoveQueryLetterReply(add_remark) {
                    $("#remove_query_letter_reply_" + add_remark).closest("tr").remove();
                }


                //-------------- SAVE DATA To DATABASE ---------------------//

                $("#submit").click(function() {

                    var url = "<?php echo base_url(); ?>master/claims/save_claim_step_two";

                    var status = $("#actual_claim_status").val();

                    <?php if (!empty($id)) : ?>
                        var id = '<?php echo $aid; ?>';
                    <?php else : ?>
                        var id = "";
                    <?php endif; ?>

                    var actual_surveyour_details = [];
                    var actual_survey_details = [];
                    var actual_document_required = [];
                    var actual_document_required_client = [];
                    var actual_query_upload = [];
                    var actual_query_letter_reply = [];
                    var push = [];

                    $("#append_surveyour_details tr:has(.surveyour_details_name_of_surveyor)").each(function(key, val) {

                        var surveyour_details_name_of_surveyor = $(".surveyour_details_name_of_surveyor", this).val();
                        var surveyour_details_contact_number = $(".surveyour_details_contact_number", this).val();
                        var surveyour_details_office_contact = $(".surveyour_details_office_contact", this).val();
                        var surveyour_details_email_id = $(".surveyour_details_email_id", this).val();
                        var surveyour_details_office_address = $(".surveyour_details_office_address", this).val();

                        actual_surveyour_details.push([key, surveyour_details_name_of_surveyor, surveyour_details_contact_number, surveyour_details_office_contact, surveyour_details_email_id, surveyour_details_office_address]);

                    });

                    $("#append_survey_details tr:has(.survey_details_survey_name)").each(function(key, val) {

                        var survey_details_survey_name = $(".survey_details_survey_name", this).val();
                        var survey_details_date = $(".survey_details_date", this).val();
                        var survey_details_description = $(".survey_details_description", this).val();
                        var survey_details_file = $(".survey_details_actual_file_name_"+key, this).val();

                        actual_survey_details.push([key, survey_details_survey_name, survey_details_date, survey_details_description, survey_details_file]);

                    });

                    $("#append_document_required tr:has(.document_required_type)").each(function(key, val) {
                        var document_required_type = $(".document_required_type", this).val();
                        var document_required_file = $(".document_required_file_actual_file_name_"+key, this).val();
                        var document_required_serveyour_name = $(".document_required_serveyour_name", this).val();

                        actual_document_required.push([key, document_required_type, document_required_file, document_required_serveyour_name]);

                    });

                    $("#append_document_required_client tr:has(.document_required_client_type)").each(function(key, val) {
                        var document_required_client_type = $(".document_required_client_type", this).val();
                        var document_required_client_file = $(".document_required_client_file", this).val();

                        actual_document_required_client.push([key, document_required_client_type, document_required_client_file]);

                    });

                    $("#append_query_upload tr:has(.query_upload_file)").each(function(key, val) {
                        var query_upload_file = $(".query_upload_file", this).val();
                        var query_upload_date = $(".query_upload_date", this).val();

                        actual_query_upload.push([key, query_upload_file, query_upload_date]);

                    });

                    $("#append_query_letter_reply tr:has(.query_letter_reply_file)").each(function(key, val) {
                        var query_letter_reply_file = $(".query_letter_reply_file", this).val();
                        var query_letter_reply_remark = $(".query_letter_reply_remark", this).val();

                        actual_query_letter_reply.push([key, query_letter_reply_file, query_letter_reply_remark]);

                    });

                    // push.push(id);
                    // push.push(actual_surveyour_details);
                    // push.push(actual_survey_details);
                    // push.push(actual_document_required);
                    // push.push(actual_document_required_client);
                    // push.push(actual_query_upload);
                    // push.push(actual_query_letter_reply);
                    // console.log(push);

                    $.ajax({
                        url: url,
                        data: {
                            actual_surveyour_details: actual_surveyour_details,
                            actual_survey_details: actual_survey_details,
                            actual_document_required: actual_document_required,
                            actual_document_required_client: actual_document_required_client,
                            actual_query_upload: actual_query_upload,
                            actual_query_letter_reply: actual_query_letter_reply,
                            status: status,
                            id: id,
                        },
                        type: 'POST',
                        dataType: "json",
                        async: false,
                        cache: false,
                        beforeSend: function() {},
                        success: function(data) {

                            if (data["status"] == true) {
                                toast("Success", data["message"], "success");
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            }else if(data["message"]["status"] != ""){
                                toast("Alert", "Actual Claim Status field is required", "warning");
                            }else{
                                toast("Error", "Something went wrong", "error");
                            }

                        },
                        error: function(request, status, error) {
                            //alert('Error: '+request.error);
                        }
                    });

                });

                function UploadSurveyDetails(id = '', type = ''){

                    //alert(id+' :: '+type);

                    var fd = new FormData();
                    var files = $('#survey_details_file_'+id)[0].files;
                    var url = "<?php echo base_url(); ?>master/claims/up";

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
                                    $("#survey_details_file_"+id).hide();
                                    $("#upload_survey_details_"+id).hide();
                                    $("#survey_details_file_name_"+id).show();
                                    $("#survey_details_file_name_"+id).html("Uploaded");
                                    $("#survey_details_actual_file_name_"+id).val(data['file_name']);
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

                function UploadDocumentRequired(id = '', type = ''){

                    var fd = new FormData();
                    var files = $('#document_required_file_'+id)[0].files;
                    var url = "<?php echo base_url(); ?>master/claims/up";

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
                                console.log(data);
                                if(data['status']){
                                    $("#document_required_file_"+id).hide();
                                    $("#upload_document_required_file_"+id).hide();
                                    $("#document_required_file_name_"+id).show();
                                    $("#document_required_file_name_"+id).html("Uploaded");
                                    $("#document_required_file_actual_file_name_"+id).val(data['file_name']);
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