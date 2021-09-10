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
                        <h4 class="page-title">View <?php echo $title; ?></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <!-- Form row -->
            <!-- end page title -->
            <!-- <div id="form_modal" class="modal fade bs-example-modal-lg bs-example-modal-center" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title"><?php echo $title; ?> Details</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-row">

                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="company" class="col-form-label col-md-4 text-right">Company<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select namse="company" id="company" class="form-control">
                                                        <option value="null">Select Company</option>
                                                        <?php $company = company_dropdown();
                                                        if (!empty($company)) : foreach ($company as $row) : ?>
                                                                <option value="<?php echo $row["mcompany_id"]; ?>"><?php echo $row["company_name"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <label class="col-form-label" id="company_err"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="department" class="col-form-label col-md-4 text-right">Department<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select namse="department" id="department" class="form-control" onchange="departmentBasedPolicy()">
                                                        <option value="null">Select Department</option>
                                                        <?php $department = department_dropdown();
                                                        if (!empty($department)) : foreach ($department as $row) : ?>
                                                                <option value="<?php echo $row["plans_policy_id"]; ?>"><?php echo $row["department_name"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <label class="col-form-label" id="department_err"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="policy_name" class="col-form-label col-md-4 text-right">Policy Name<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select namse="policy_name" id="policy_name" class="form-control">
                                                        <option value="null">Select Policy Name</option>
                                                        <?php $policy_name = policy_type_dropdown();
                                                        if (!empty($policy_name)) : foreach ($policy_name as $row) : ?>
                                                                <option value="<?php echo $row["policy_type_id"]; ?>"><?php echo $row["policy_type"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <label class="col-form-label" id="policy_name_err"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="policy_type" class="col-form-label col-md-4 text-right">Policy Type<label class="text-danger">*</label></label>
                                                <div class="col-md-8">
                                                    <select namse="policy_type" id="policy_type" class="form-control">
                                                        <option value="1">Individual</option>
                                                        <option value="2">Floater</option>
                                                    </select>
                                                    <label class="col-form-label" id="policy_type_err"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" id="policy_wording_div">
                                            <div class="form-group row">
                                                <label for="policy_wording" class="col-form-label col-md-4 text-right">Policy Wordings<label class="text-danger">*</label></label>
                                                <div class="col-md-8">
                                                    <input type="file" name="policy_wording" id="policy_wording" class="form-control  filestyle" data-input="false" id="filestyle-1" tabindex="-1">
                                                    <label class="col-form-label" id="policy_wording_err"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="document_list" class="col-form-label col-md-4 text-right">Document List<label class="text-danger">*</label></label>
                                                <div class="col-md-8">
                                                    <select name="document_list" id="document_list" class="selectpicker" multiple data-selected-text-format="count" data-style="btn-secondary">
                                                        <?php $document = document_dropdown();
                                                        if (!empty($document)) : foreach ($document as $row) : ?>
                                                                <option value="<?php echo $row["document_id"]; ?>"><?php echo $row["document_name"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <label class="col-form-label" id="document_liste_err"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" id="claims_form_div">
                                            <div class="form-group row">
                                                <label for="claims_form" class="col-form-label col-md-4 text-right">Claims Form<label class="text-danger">*</label></label>
                                                <div class="col-md-8">
                                                    <input type="file" name="claims_form" id="claims_form" class="form-control filestyle" data-input="false" id="filestyle-1" tabindex="-1">
                                                    <label class="col-form-label" id="claims_form_err"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <label for="claims_procedure" class="col-form-label col-md-2 text-right">Policy Wording<label class="text-danger">*</label></label>
                                                <div class="col-md-10">
                                                    <textarea name="claims_procedure" id="claims_procedure" value="" placeholder="Enter Policy Wording" class="form-control "></textarea>
                                                    <label class="col-form-label" id="claims_procedure_err"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="comission_percentage" class="col-form-label col-md-4 text-right">Comission % :</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="comission_percentage" id="comission_percentage" class="form-control comission_percentage">
                                                    <span id="comission_percentage_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-8 m-b-1">
                                            <button type="button" class="btn btn-success waves-effect waves-light btn-sm" id="add_circular" onclick="Circular_add()">Add Circular</button>
                                        </div>



                                    </div>

                                    <div class="form-row" style="display:none;" id="circular_detail_div">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="circular_date" class="col-form-label col-md-4 text-right">Circular Date<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="date" name="circular_date" id="circular_date" value="" placeholder="Enter Short Name" class="form-control circular_date">
                                                    <span id="circular_date_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="circular_upload" class="col-form-label col-md-4 text-right">Circular Upload<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="file" name="circular_upload" id="circular_upload" class="form-control filestyle circular_upload" data-input="false" id="filestyle-1" tabindex="-1" onchange="check_circular_upload()">
                                                    <span id="circular_upload_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <button id="upload" onclick='update_circular_upload()' class="btn btn-primary btn-sm" disabled>Upload</button>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <label for="circular_doc_reason" class="col-form-label col-md-2 text-right">Circular Reason</label>
                                                <div class="col-md-10">
                                                    <textarea rows="3" name="circular_doc_reason" id="circular_doc_reason" value="" placeholder="Enter Circular Reason" class="form-control circular_doc_reason"></textarea>
                                                    <span id="circular_doc_reason_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="plans_policy_id" hidden>1</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <center>
                                                <button id="update" onclick='onUpdate()' style="display: none;" class="btn btn-primary btn-sm mt-2">Update <?php echo $title; ?></button>
                                                <button id="submit" class="btn btn-primary btn-sm">Save <?php echo $title; ?></button>
                                            </center>
                                        </div>
                                        <div class="form-group col-md-4"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

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
                                                <label for="company" class="col-form-label col-md-4 text-right">Company<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select namse="company" id="company" class="form-control">
                                                        <option value="null">Select Company</option>
                                                        <?php $company = company_dropdown();
                                                        if (!empty($company)) : foreach ($company as $row) : ?>
                                                                <option value="<?php echo $row["mcompany_id"]; ?>"><?php echo $row["company_name"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <span id="company_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="department" class="col-form-label col-md-4 text-right">Department<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select namse="department" id="department" class="form-control" onchange="departmentBasedPolicy()">
                                                        <option value="null">Select Department</option>
                                                        <?php $department = department_dropdown();
                                                        if (!empty($department)) : foreach ($department as $row) : ?>
                                                                <option value="<?php echo $row["department_id"]; ?>"><?php echo $row["department_name"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <span id="department_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="policy_name" class="col-form-label col-md-4 text-right">Policy Name<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select namse="policy_name" id="policy_name" class="form-control">
                                                        <option value="null">Select Policy Name</option>
                                                        <?php $policy_name = policy_type_dropdown();
                                                        if (!empty($policy_name)) : foreach ($policy_name as $row) : ?>
                                                                <option value="<?php echo $row["policy_type_id"]; ?>"><?php echo $row["policy_type"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <span id="policy_name_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="policy_type" class="col-form-label col-md-4 text-right">Policy Type<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select namse="policy_type" id="policy_type" class="form-control">
                                                        <option value="1">Individual</option>
                                                        <option value="2">Floater</option>
                                                    </select>
                                                    <span id="policy_type_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="policy_wording" class="col-form-label col-md-4 text-right">Policy Wordings<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="file" name="policy_wording" id="policy_wording" class="form-control  filestyle" data-input="false" id="filestyle-1" tabindex="-1" onchange="check_file_upload(id ='policy_wording')">
                                                    <span id="policy_wording_details"></span>
                                                    <span id="policy_wording_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="document_list" class="col-form-label col-md-4 text-right">Document List<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <!-- <select namse="document_list" id="document_list" class="form-control"> -->
                                                    <select name="document_list" id="document_list" class="selectpicker" multiple data-selected-text-format="count" data-style="btn-secondary">
                                                        <!-- <option value="null">Select Document</option> -->
                                                        <?php $document = document_dropdown();
                                                        if (!empty($document)) : foreach ($document as $row) : ?>
                                                                <option value="<?php echo $row["document_id"]; ?>"><?php echo $row["document_name"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <span id="document_list_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="claims_form" class="col-form-label col-md-4 text-right">Claims Form<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="file" name="claims_form" id="claims_form" class="form-control filestyle" data-input="false" id="filestyle-1" tabindex="-1">
                                                    <span id="claims_form_err"></span>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <label for="claims_procedure" class="col-form-label col-md-2 text-right">Policy Wording Remark<span class="text-danger">*</span></label>
                                                <div class="col-md-10">
                                                    <textarea name="claims_procedure" id="claims_procedure" value="" placeholder="Enter Policy Wording" class="form-control "></textarea>
                                                    <span id="claims_procedure_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="comission_percentage" class="col-form-label col-md-4 text-right">Comission % :</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="comission_percentage" id="comission_percentage" class="form-control comission_percentage">
                                                    <span id="comission_percentage_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 m-b-1">
                                            <button type="button" class="btn btn-success waves-effect waves-light btn-sm" id="add_circular" onclick="Circular_add()">Add Circular</button>
                                        </div>


                                    </div>
                                    <div class="form-row" style="display:none;" id="circular_detail_div">

                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="proposal_date" class="col-form-label col-md-4 text-right">Proposal Date<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="date" name="proposal_date" id="proposal_date" value="" placeholder="Enter Short Name" class="form-control proposal_date">
                                                    <span id="proposal_date_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="proposal_upload" class="col-form-label col-md-4 text-right">Proposal Upload<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="file" name="proposal_upload" id="proposal_upload" class="form-control filestyle proposal_upload" data-input="false" id="filestyle-1" tabindex="-1" onchange="check_file_upload(id ='proposal_upload')">
                                                    <span id="proposal_upload_details"></span>
                                                    <span id="proposal_upload_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="claim_date" class="col-form-label col-md-4 text-right">Claim Date<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="date" name="claim_date" id="claim_date" value="" placeholder="Enter Short Name" class="form-control claim_date">
                                                    <span id="claim_date_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="claim_upload" class="col-form-label col-md-4 text-right">Claim Form Upload<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="file" name="claim_upload" id="claim_upload" class="form-control filestyle claim_upload" data-input="false" id="filestyle-1" tabindex="-1" onchange="check_file_upload(id ='claim_upload')">
                                                    <span id="claim_upload_details"></span>
                                                    <span id="claim_upload_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="brochure_date" class="col-form-label col-md-4 text-right">Brochure Date<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="date" name="brochure_date" id="brochure_date" value="" placeholder="Enter Short Name" class="form-control brochure_date">
                                                    <span id="brochure_date_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="brochure_upload" class="col-form-label col-md-4 text-right">Brochure Upload<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="file" name="brochure_upload" id="brochure_upload" class="form-control filestyle brochure_upload" data-input="false" id="filestyle-1" tabindex="-1" onchange="check_file_upload(id ='brochure_upload')">
                                                    <span id="brochure_upload_details"></span>
                                                    <span id="brochure_upload_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="one_pager_date" class="col-form-label col-md-4 text-right">One Pager Date<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="date" name="one_pager_date" id="one_pager_date" value="" placeholder="Enter Short Name" class="form-control one_pager_date">
                                                    <span id="one_pager_date_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="one_pager_upload" class="col-form-label col-md-4 text-right">One Pager Upload<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="file" name="one_pager_upload" id="one_pager_upload" class="form-control filestyle one_pager_upload" data-input="false" id="filestyle-1" tabindex="-1" onchange="check_file_upload(id ='one_pager_upload')">
                                                    <span id="one_pager_upload_details"></span>
                                                    <span id="one_pager_upload_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="form-row" style="display:none;" id="circular_detail_div">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="circular_date" class="col-form-label col-md-4 text-right">Circular Date<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="date" name="circular_date" id="circular_date" value="" placeholder="Enter Short Name" class="form-control circular_date">
                                                    <span id="circular_date_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="circular_upload" class="col-form-label col-md-4 text-right">Circular Upload<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="file" name="circular_upload" id="circular_upload" class="form-control filestyle circular_upload" data-input="false" id="filestyle-1" tabindex="-1">
                                                    <span id="circular_upload_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="circular_doc_reason" class="col-form-label col-md-4 text-right">Circular Reason</label>
                                                <div class="col-md-8">
                                                    <textarea rows="3" name="circular_doc_reason" id="circular_doc_reason" value="" placeholder="Enter Circular Reason" class="form-control circular_doc_reason"></textarea>
                                                    <span id="circular_doc_reason_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="plans_policy_id" hidden>1</label>
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
                                                <td><strong><span id="company_view_err" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Department :</td>
                                                <td><strong><span id="department_view_err" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Policy Name :</td>
                                                <td><strong><span id="policy_name_view_err" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Policy Type :</td>
                                                <td><strong><span id="policy_type_view_err" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Document List :</td>
                                                <td><strong><span id="document_liste_view_err" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Policy Wording :</td>
                                                <td><strong><span id="claims_procedure_view_err" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Comission % :</td>
                                                <td><strong><span id="comission_percentage_view_err" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>

                                    <!-- <div class="form-row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="company" class="col-form-label col-md-6 text-right"><strong>Company : </strong></label>
                                                <div class="col-md-6">
                                                    <label class="col-form-label text-success" id="company_view_err"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="department" class="col-form-label col-md-6 text-right"><strong>Department : </strong></label>
                                                <div class="col-md-6">

                                                    <label class="col-form-label" id="department_view_err"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="policy_name" class="col-form-label col-md-6 text-right"><strong>Policy Name : </strong></label>
                                                <div class="col-md-6">

                                                    <label class="col-form-label" id="policy_name_view_err"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="policy_type" class="col-form-label col-md-6 text-right"><strong>Policy Type : </strong></label>
                                                <div class="col-md-6">

                                                    <label class="col-form-label" id="policy_type_view_err"></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="document_list" class="col-form-label col-md-6 text-right"><strong>Document List : </strong></label>
                                                <div class="col-md-6">

                                                    <label class="col-form-label" id="document_liste_view_err"></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-9">
                                            <div class="form-group row">
                                                <label for="claims_procedure" class="col-form-label col-md-3 text-right"><strong>Policy Wording : </strong></label>
                                                <div class="col-md-9">
                                                    <label class="col-form-label" id="claims_procedure_view_err"></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="comission_percentage" class="col-form-label col-md-6 text-right"><strong>Comission % : </strong></label>
                                                <div class="col-md-6">

                                                    <label class="col-form-label" id="comission_percentage_view_err"></label>
                                                </div>
                                            </div>
                                        </div>

                                    </div> -->

                                    <!-- <div class="form-row">
                                        <div class="col-md-12"><strong>Circular Details : </strong></div>
                                        <div class="col-md-12">
                                            <table class="table m-0 table-colored-bordered table-bordered-purple">
                                                <thead>
                                                    <tr>
                                                        <th>SN</th>
                                                        <th>Circular Date</th>
                                                        <th>Circular Uploaded</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="append_view_circular_doc">

                                                </tbody>
                                            </table>

                                        </div>
                                    </div> -->


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
                                        <!-- <div class="col-md-4 row">
                                        <label for="filter_company" class="col-form-label col-md-5 text-right">Company</label>
                                        <div class="col-md-7">
                                            <select name="filter_company" id="filter_company" class="form-control">
                                                <option value="null">Select Company</option>
                                                <?php $company = company_dropdown();
                                                if (!empty($company)) : foreach ($company as $row) : ?>
                                                        <option value="<?php echo $row["mcompany_id"]; ?>"><?php echo $row["company_name"]; ?></option>
                                                <?php endforeach;
                                                endif; ?>
                                            </select>
                                        </div>
                                    </div> -->
                                        <div class="col-md-4 row">
                                            <label for="filter_department" class="col-form-label col-md-5 text-right">Department</label>
                                            <div class="col-md-7">
                                                <select name="filter_department" id="filter_department" class="form-control" onchange="filter_departmentBasedPolicy()">
                                                    <option value="null">Select Department</option>
                                                    <?php $department_drop = department_dropdown();
                                                    if (!empty($department_drop)) : foreach ($department_drop as $row) : ?>
                                                            <option value="<?php echo $row["department_id"]; ?>"><?php echo $row["department_name"]; ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 row">
                                            <label for="filter_policy_name" class="col-form-label col-md-5 text-right">Policy Name</label>
                                            <div class="col-md-7">
                                                <select name="filter_policy_name" id="filter_policy_name" class="form-control">
                                                    <option value="null">Select Policy Name</option>
                                                    <!-- <?php $policy_name_drop = policy_type_dropdown();
                                                            if (!empty($policy_name_drop)) : foreach ($policy_name_drop as $row) : ?>
                                                        <option value="<?php echo $row["policy_type_id"]; ?>"><?php echo $row["policy_type"]; ?></option>
                                                <?php endforeach;
                                                            endif; ?> -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 row mt-1">
                                            <label for="filter_status" class="col-form-label col-md-4 text-right">Status</label>
                                            <div class="col-md-8">
                                                <select name="filter_status" id="filter_status" class="form-control">
                                                    <option value="null">Select Status</option>
                                                    <option value="1">Active</option>
                                                    <option value="2">In-Active</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-1 ml-2">
                                            <center><button type="submit" id="search" class="btn btn-outline-secondary waves-effect btn-xs mr-2" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="reset" class="btn btn-outline-secondary waves-effect btn-xs" onclick="Reset_data()"><b><i class="mdi mdi-undo"></i>Reset</b></button></center>
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
                            <div class="col-md-8">
                                <h4 class="header-title">View <?php echo $title; ?> List <span id="total_plans_policy_data"></span></h4>
                            </div>
                            <!-- <div class="col-md-4">

                            </div> -->
                            <div class="col-md-4 text-right">
                                <!-- <input class='btn btn-facebook btn-sm' id='AddForm' value=' Add <?php echo $title; ?>' type='button' /> -->
                                <button type="submit" id="filter_btn" class="btn btn-outline-secondary waves-effect btn-xs"><b><i class="mdi mdi-magnify"></i>&nbsp;Filter Off</b></button>
                            </div>

                        </div>

                        <!-- <table id="datatable" class="table  table-striped table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> -->

                        <div class="table-cont">
                            <table class="commission_table fixed" id="commission_table" border="1">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>SN.</th>
                                        <th>Company</th>
                                        <th>Department</th>
                                        <th>Policy Name</th>
                                        <th>Policy Type</th>
                                        <!-- <th>Document</th> -->
                                        <th>Policy Wording Remark</th>
                                        <th>Comission</th>
                                        <th>Policy Wordings</th>

                                        <th>Claims Form</th>
                                        <th>Proposal Doc</th>
                                        <!-- <th>Circular Doc</th>
                                    <th>Other Doc</th> -->
                                        <th>Prospectus / Brochure Doc</th>
                                        <th>One Pager Doc</th>
                                        <!-- <th>Status</th>
                                        <th>Delete Status</th>
                                        <th>Permanent Delete</th> -->
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
    $("#filter_btn").click(function() {
        $('#filter_form_modal').modal('toggle');
    });

    function filter_departmentBasedPolicy() {
        var department = $("#filter_department").val();
        // alert(department);
        var url = "<?php echo $base_url; ?>master/plans_policy/department_based_policy";

        if (department != "") {
            $.ajax({
                url: url,
                data: {
                    department: department
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var option_val = "";
                    if (data["status"] == true) {
                        var val = data["userdata"];
                        $('#filter_policy_name').empty("");
                        option_val = '<option value="null">Select Policy Name</option>';
                        for (var i = 0; i < val.length; i++) {
                            var policy_type_id = val[i]["policy_type_id"];
                            var policy_type = val[i]["policy_type"];
                            option_val += '<option value=' + policy_type_id + '>' + policy_type + '</option>';
                        }
                    } else {
                        $('#filter_policy_name').empty("");
                        option_val = '<option value="null">Select Policy Name</option>';
                    }
                    $('#filter_policy_name').append(option_val);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function departmentBasedPolicy() {
        var department = $("#department").val();
        // alert(department);
        var url = "<?php echo $base_url; ?>master/plans_policy/department_based_policy";

        if (department != "") {
            $.ajax({
                url: url,
                data: {
                    department: department
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var option_val = "";
                    if (data["status"] == true) {
                        var val = data["userdata"];
                        $('#policy_name').empty("");
                        option_val = '<option value="null">Select Policy Name</option>';
                        for (var i = 0; i < val.length; i++) {
                            var policy_type_id = val[i]["policy_type_id"];
                            var policy_type = val[i]["policy_type"];
                            option_val += '<option value=' + policy_type_id + '>' + policy_type + '</option>';
                        }
                    } else {
                        $('#policy_name').empty("");
                        option_val = '<option value="null">Select Policy Name</option>';
                    }
                    $('#policy_name').append(option_val);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    $("#AddForm").click(function() {
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
    });
    $('#company').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#department').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#policy_name').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#policy_type').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#policy_wording').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#document_list').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#circular_date').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#circular_upload').on('click', function() {
        document.getElementById("update").disabled = false;
    });
    $('#claims_form').on('click', function() {
        document.getElementById("update").disabled = false;
    });
    $('#claims_procedure').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#comission_percentage').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    $('#proposal_date').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#claim_date').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#brochure_date').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#one_pager_date').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#proposal_upload').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#claim_upload').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#brochure_upload').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#one_pager_upload').on('change', function() {
        document.getElementById("update").disabled = false;
    });

    function clearError() {
        $("#company").removeClass("parsley-error");
        $("#company_err").removeClass("text-danger").text("");

        $("#department").removeClass("parsley-error");
        $("#department_err").removeClass("text-danger").text("");

        $("#policy_name").removeClass("parsley-error");
        $("#policy_name_err").removeClass("text-danger").text("");

        $("#policy_type").removeClass("parsley-error");
        $("#policy_type_err").removeClass("text-danger").text("");

        $("#policy_wording").removeClass("parsley-error");
        $("#policy_wording_err").removeClass("text-danger").text("");

        $("#document_list").removeClass("parsley-error");
        $("#document_list_err").removeClass("text-danger").text("");

        $("#claims_form").removeClass("parsley-error");
        $("#claims_form_err").removeClass("text-danger").text("");

        $("#claims_procedure").removeClass("parsley-error");
        $("#claims_procedure_err").removeClass("text-danger").text("");

        $("#comission_percentage").removeClass("parsley-error");
        $("#comission_percentage_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#plans_policy_id").text("");
        $("#company").val("null");
        $("#department").val("null");
        $("#policy_name").val("null");
        // $("#policy_type").val("");
        $("#policy_wording").val("");
        $("#document_list").val("null");
        $("#claims_form").val("");
        $("#claims_procedure").val("");
        $("#comission_percentage").val("");

        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function OnRecover(plans_policy_id) {
        // var plans_policy_id = $("#plans_policy_id").text();
        var url = "<?php echo $base_url; ?>master/plans_policy/recover_plans_policy";
        confirmation_alert(id = plans_policy_id, url = url, title = "Plans & Policy", type = "Recover");
    }

    function OnDelete(plans_policy_id) {
        // var plans_policy_id = $("#plans_policy_id").text();
        var url = "<?php echo $base_url; ?>master/plans_policy/remove_plans_policy";
        confirmation_alert(id = plans_policy_id, url = url, title = "Plans & Policy", type = "Delet");
    }

    function onEdit(val) {
        clearError();
        $("#plans_policy_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();
        $('#form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/plans_policy/edit_plans_policy";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    plans_policy_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    console.log(data);
                    // var myObj = JSON.parse(data);
                    $("#plans_policy_id").text(data["userdata"].plans_policy_id);
                    // $("#policy_wording").val(data["userdata"].policy_wording);
                    // $("#claims_form").val(data["userdata"].claims_form);
                    $("#claims_procedure").val(data["userdata"].claims_procedure);
                    $("#comission_percentage").val(data["userdata"].comission_percentage);

                    var company = data["userdata"].fk_mcompany_id;
                    var department = data["userdata"].fk_plans_policy_id;
                    var policy_name = data["userdata"].fk_policy_type_id;
                    var policy_type = data["userdata"].policy_type;
                    var document_list = data["userdata"].fk_document_id;
                    var circular_doc_list_data_arr = data["userdata"].circular_doc_list_data_arr;

                    plans_policy_id = data["userdata"].plans_policy_id;
                    claim_doc_name = data["userdata"].claim_doc_name;
                    proposal_doc_name = data["userdata"].proposal_doc_name;
                    circular_doc_name = data["userdata"].circular_doc_name;
                    other_doc_name = data["userdata"].other_doc_name;
                    brochure_upload = data["userdata"].brochure_upload;
                    one_pager_upload = data["userdata"].one_pager_upload;

                    claim_doc_date = data["userdata"].claim_doc_date;
                    proposal_doc_date = data["userdata"].proposal_doc_date;
                    circular_doc_date = data["userdata"].circular_doc_date;
                    other_doc_date = data["userdata"].other_doc_date;
                    brochure_date = data["userdata"].brochure_date;
                    one_pager_date = data["userdata"].one_pager_date;

                    // alert(data["userdata"].proposal_doc_date);
                    // alert(data["userdata"].claim_doc_date);
                    // alert(data["userdata"].brochure_date);
                    // alert(data["userdata"].one_pager_date);
                    $("#proposal_date").val(data["userdata"].proposal_doc_date);
                    $("#claim_date").val(data["userdata"].claim_doc_date);
                    $("#brochure_date").val(data["userdata"].brochure_date);
                    $("#one_pager_date").val(data["userdata"].one_pager_date);
                    // alert(proposal_doc_name);

                    if (data["userdata"].policy_wording == undefined || data["userdata"].policy_wording == "" || data["userdata"].policy_wording == "undefined" || data["userdata"].policy_wording == null) {
                        view_policy_wording = "";
                        download_policy_wording = "";
                        delete_policy_wording = "";
                    } else if (data["userdata"].policy_wording != "") {
                        view_policy_wording = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/3/" + plans_policy_id + "/" + data["userdata"].policy_wording + "'  target='_blank' class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        download_policy_wording = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/3/" + plans_policy_id + "/" + data["userdata"].policy_wording + "'  target='_blank' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        delete_policy_wording = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 1 + ',' + data["userdata"].policy_wording + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);'class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                    }

                    if (claim_doc_name == undefined || claim_doc_name == "" || claim_doc_name == "undefined" || claim_doc_name == null) {
                        view_claim_doc_name = "";
                        download_claim_doc_name = "";
                        delete_claim_doc_name = "";
                    } else if (claim_doc_name != "") {
                        view_claim_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/3/" + plans_policy_id + "/" + claim_doc_name + "'  target='_blank' class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        download_claim_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/3/" + plans_policy_id + "/" + claim_doc_name + "'  target='_blank' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        delete_claim_doc_name = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 3 + ',' + claim_doc_name + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                    }

                    if (proposal_doc_name == "" || proposal_doc_name == "undefined" || proposal_doc_name == "" || proposal_doc_name == null) {
                        view_proposal_doc_name = "";
                        download_proposal_doc_name = "";
                        delete_proposal_doc_name = "";
                    } else if (proposal_doc_name != "") {
                        view_proposal_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/4/" + plans_policy_id + "/" + proposal_doc_name + "'  target='_blank' class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        download_proposal_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/4/" + plans_policy_id + "/" + proposal_doc_name + "' target='_blank' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        delete_proposal_doc_name = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 4 + ',' + proposal_doc_name + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                    }

                    if (circular_doc_name == "" || circular_doc_name == "undefined" || circular_doc_name == "" || circular_doc_name == null) {
                        view_circular_doc_name = "";
                        download_circular_doc_name = "";
                        delete_circular_doc_name = "";
                    } else if (circular_doc_name != "") {
                        view_circular_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/5/" + plans_policy_id + "/" + circular_doc_name + "'  target='_blank' class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        download_circular_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/5/" + plans_policy_id + "/" + circular_doc_name + "' target='_blank' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        delete_circular_doc_name = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 5 + ',' + circular_doc_name + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                    }

                    if (other_doc_name == "" || other_doc_name == "undefined" || other_doc_name == undefined || other_doc_name == null) {
                        view_other_doc_name = "";
                        download_other_doc_name = "";
                        delete_other_doc_name = "";
                    } else if (other_doc_name != "") {
                        view_other_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/6/" + plans_policy_id + "/" + other_doc_name + "'  target='_blank' class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        download_other_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/6/" + plans_policy_id + "/" + other_doc_name + "' target='_blank' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        delete_other_doc_name = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 6 + ',' + other_doc_name + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                    }

                    if (brochure_upload == "" || brochure_upload == "undefined" || brochure_upload == null || brochure_upload == undefined) {
                        view_brochure_upload = "";
                        download_brochure_upload = "";
                        delete_brochure_upload = "";
                    } else if (brochure_upload != "") {
                        view_brochure_upload = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/7/" + plans_policy_id + "/" + brochure_upload + "'  target='_blank' class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        download_brochure_upload = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/7/" + plans_policy_id + "/" + brochure_upload + "' target='_blank' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        delete_brochure_upload = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 7 + ',' + brochure_upload + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                    }

                    if (one_pager_upload == "" || one_pager_upload == "undefined" || one_pager_upload == null || one_pager_upload == undefined) {
                        view_one_pager_upload = "";
                        download_one_pager_upload = "";
                        delete_one_pager_upload = "";
                    } else if (one_pager_upload != "") {
                        view_one_pager_upload = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/8/" + plans_policy_id + "/" + one_pager_upload + "'  target='_blank' class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        download_one_pager_upload = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/8/" + plans_policy_id + "/" + one_pager_upload + "' target='_blank' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        delete_one_pager_upload = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 8 + ',' + one_pager_upload + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                    }
                    $("#policy_wording_details").html(view_policy_wording + " " + download_policy_wording + " " + delete_policy_wording);
                    $("#proposal_upload_details").html(view_proposal_doc_name + " " + download_proposal_doc_name + " " + delete_proposal_doc_name);
                    $("#claim_upload_details").html(view_claim_doc_name + " " + download_claim_doc_name + " " + delete_claim_doc_name);
                    $("#brochure_upload_details").html(view_brochure_upload + " " + download_brochure_upload + " " + delete_brochure_upload);
                    $("#one_pager_upload_details").html(view_one_pager_upload + " " + download_one_pager_upload + " " + delete_one_pager_upload);

                    $('select[id^="company"] option[value="' + company + '"]').attr("selected", "selected");
                    $('select[id^="department"] option[value="' + department + '"]').attr("selected", "selected");
                    $('select[id^="policy_name"] option[value="' + policy_name + '"]').attr("selected", "selected");
                    $('select[id^="policy_type"] option[value="' + policy_type + '"]').attr("selected", "selected");
                    // $('select[id^="document_list"] option[value="' + document_list + '"]').attr("selected", "selected");
                    if (document_list != "")
                        var selectedOptions = document_list.split(",");
                    else
                        var selectedOptions = "";

                    var checkboxes = document.getElementsByClassName("document_list");
                    $('#document_list').selectpicker("val", selectedOptions);

                    $("#append_circular_doc").empty();
                    var append_circular_doc = "";
                    var count = 1;
                    // alert(circular_doc_list_data_arr);
                    $.each(circular_doc_list_data_arr, function(key, val) {
                        var circular_doc_id = circular_doc_list_data_arr[key].circular_doc_id;
                        var circular_doc_date = circular_doc_list_data_arr[key].circular_doc_date;
                        var circular_doc_name = circular_doc_list_data_arr[key].circular_doc_name;
                        var circular_doc_status = circular_doc_list_data_arr[key].circular_doc_status;
                        var circular_doc_del_flag = circular_doc_list_data_arr[key].circular_doc_del_flag;
                        var disabled = "";
                        var delete_circular_doc = "";
                        if (circular_doc_del_flag == 1) {
                            var del_status = "Delete";
                            disabled = "";
                            delete_circular_doc = "<button class='btn btn-outline-danger waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='On_Circular_doc_Delete(" + circular_doc_id + "," + circular_doc_del_flag + ")'   id='common_del_cir_doc_" + circular_doc_id + "'>Delete</button>";
                        } else if (circular_doc_del_flag == 0) {
                            disabled = "disabled";
                            var del_status = "Recover";
                            $("circular_doc_count_" + circular_doc_id);
                            $("circular_doc_date_" + circular_doc_id);
                            $("circular_doc_name_" + circular_doc_id);
                            delete_circular_doc = "<button onclick='On_Circular_doc_Recover(" + circular_doc_id + "," + circular_doc_del_flag + ")' class='btn btn-outline-primary waves-effect width-md waves-light btn-sm delete' id='common_del_cir_doc_" + circular_doc_id + "' >Recover</button>";
                        }

                        // alert(disabled);
                        // alert(circular_doc_del_flag);
                        // alert(circular_doc_del_flag);
                        // alert(delete_circular_doc);
                        if (circular_doc_name == "" || circular_doc_name == "null" || circular_doc_name == null || circular_doc_name == undefined) {
                            var view_circular_doc = "";
                            var download_circular_doc = "";
                        } else if (circular_doc_name != "") {
                            var view_circular_doc = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/3/" + data["userdata"].plans_policy_id + "/" + circular_doc_id + "'  class='btn btn-outline-primary waves-effect width-md waves-light btn-sm delete' id='view_circular_doc_" + circular_doc_id + "' ><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                            var download_circular_doc = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/3/" + data["userdata"].plans_policy_id + "/" + circular_doc_id + "' class='btn btn-outline-primary waves-effect width-md waves-light btn-sm delete' id='download_circular_doc_" + circular_doc_id + "'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        }
                        circular_doc_btn = delete_circular_doc + " " + view_circular_doc + "  " + download_circular_doc;
                        // alert(circular_doc_btn);
                        append_circular_doc += '<tr id="circular_doc_strike_' + circular_doc_id + '"><td scope="row"><span id="circular_doc_count_' + circular_doc_id + '">' + count + '</span></td><td><span id="circular_doc_date_' + circular_doc_id + '">' + circular_doc_date + '</span></td><td ><span id="circular_doc_name_' + circular_doc_id + '">' + circular_doc_name + '</span></td><td>' + circular_doc_btn + '</td></tr>';
                        count++;
                    });
                    $("#append_circular_doc").append(append_circular_doc);

                    $.each(circular_doc_list_data_arr, function(key, val) {
                        var circular_doc_id = circular_doc_list_data_arr[key].circular_doc_id;
                        var circular_doc_del_flag = circular_doc_list_data_arr[key].circular_doc_del_flag;
                        if (circular_doc_del_flag == 0) {
                            $("#circular_doc_count_" + circular_doc_id).wrap("<strike>");
                            $("#circular_doc_date_" + circular_doc_id).wrap("<strike>");
                            $("#circular_doc_name_" + circular_doc_id).wrap("<strike>");

                            $("#view_circular_doc_" + circular_doc_id).hide();
                            $("#download_circular_doc_" + circular_doc_id).hide();
                        } else {
                            $("#view_circular_doc_" + circular_doc_id).show();
                            $("#download_circular_doc_" + circular_doc_id).show();
                        }
                    });
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
        var plans_policy_id = $("#plans_policy_id").text();

        var company = $("#company").val();
        var department = $("#department").val();
        var policy_name = $("#policy_name").val();

        var company_name_txt = $("#company option:selected").text();
        var department_name_txt = $("#department option:selected").text();
        var policy_name_txt = $("#policy_name option:selected").text();

        var policy_type = $("#policy_type").val();
        var policy_wording = $('#policy_wording').prop('files')[0];
        // var claims_form = $('#claims_form').prop('files')[0];
        // var policy_wording = $("#policy_wording").val();
        var document_list = $("#document_list").val();
        // var claims_form = $("#claims_form").val();
        var claims_procedure = $("#claims_procedure").val();
        var comission_percentage = $("#comission_percentage").val();

        // var circular_date = $("#circular_date").val();
        // var circular_doc_reason = $("#circular_doc_reason").val();
        // var circular_upload = $('#circular_upload').prop('files')[0];

        // alert(circular_date);
        // alert(circular_upload);
        // if (circular_date == "undefined" || circular_date == undefined || circular_date == "" || circular_date == "null") {
        //     circular_date = "";
        // }
        // if (circular_upload == "undefined" || circular_upload == undefined || circular_upload == "" || circular_upload == "null") {
        //     circular_upload = "";
        // }

        if (company == "null")
            company = "";

        if (department == "null")
            department = "";

        if (policy_name == "null")
            policy_name = "";

        if (document_list == "null")
            document_list = "";

        var proposal_date = $("#proposal_date").val();
        var proposal_upload = $('#proposal_upload').prop('files')[0];

        var claim_date = $("#claim_date").val();
        var claim_upload = $('#claim_upload').prop('files')[0];

        var brochure_date = $("#brochure_date").val();
        var brochure_upload = $('#brochure_upload').prop('files')[0];

        var one_pager_date = $("#one_pager_date").val();
        var one_pager_upload = $('#one_pager_upload').prop('files')[0];

        if (proposal_date == "undefined" || proposal_date == undefined || proposal_date == "" || proposal_date == "null") {
            proposal_date = "";
        }
        if (proposal_upload == "undefined" || proposal_upload == undefined || proposal_upload == "" || proposal_upload == "null") {
            proposal_upload = "";
        }
        if (claim_date == "undefined" || claim_date == undefined || claim_date == "" || claim_date == "null") {
            claim_date = "";
        }
        if (claim_upload == "undefined" || claim_upload == undefined || claim_upload == "" || claim_upload == "null") {
            claim_upload = "";
        }
        if (brochure_date == "undefined" || brochure_date == undefined || brochure_date == "" || brochure_date == "null") {
            brochure_date = "";
        }
        if (brochure_upload == "undefined" || brochure_upload == undefined || brochure_upload == "" || brochure_upload == "null") {
            brochure_upload = "";
        }

        if (one_pager_date == "undefined" || one_pager_date == undefined || one_pager_date == "" || one_pager_date == "null") {
            one_pager_date = "";
        }
        if (one_pager_upload == "undefined" || one_pager_upload == undefined || one_pager_upload == "" || one_pager_upload == "null") {
            one_pager_upload = "";
        }

        var form_data = new FormData();
        form_data.append('plans_policy_id', plans_policy_id);
        form_data.append('company', company);
        form_data.append('department', department);
        form_data.append('policy_name', policy_name);

        form_data.append('company_name_txt', company_name_txt);
        form_data.append('department_name_txt', department_name_txt);
        form_data.append('policy_name_txt', policy_name_txt);

        form_data.append('policy_type', policy_type);
        form_data.append('policy_wording', policy_wording);
        form_data.append('document_list', document_list);
        // form_data.append('claims_form', claims_form);
        form_data.append('claims_procedure', claims_procedure);
        form_data.append('comission_percentage', comission_percentage);

        // form_data.append('circular_date', circular_date);
        // form_data.append('circular_upload', circular_upload);
        // form_data.append('circular_doc_reason', circular_doc_reason);

        form_data.append('proposal_date', proposal_date);
        form_data.append('proposal_upload', proposal_upload);

        form_data.append('claim_date', claim_date);
        form_data.append('claim_upload', claim_upload);

        form_data.append('brochure_date', brochure_date);
        form_data.append('brochure_upload', brochure_upload);

        form_data.append('one_pager_date', one_pager_date);
        form_data.append('one_pager_upload', one_pager_upload);

        var url = "<?php echo $base_url; ?>master/plans_policy/update_plans_policy";

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
                    $("#company").val("null");
                    $("#department").val("null");
                    $("#policy_name").val("null");
                    $("#policy_type").val("");
                    $("#policy_wording").val("");
                    $("#document_list").val("null");
                    $("#claims_form").val("");
                    $("#claims_procedure").val("");
                    $("#comission_percentage").val("");

                    $("#company").removeClass("parsley-error");
                    $("#department").removeClass("parsley-error");
                    $("#policy_name").removeClass("parsley-error");
                    $("#policy_type").removeClass("parsley-error");
                    $("#policy_wording").removeClass("parsley-error");
                    $("#document_list").removeClass("parsley-error");
                    $("#claims_form").removeClass("parsley-error");
                    $("#claims_procedure").removeClass("parsley-error");
                    $("#comission_percentage").removeClass("parsley-error");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["messages"] != "") {
                        if (data["messages"]["policy_wording_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["policy_wording_err"], message_icone = "error");
                        // if (data["messages"]["claims_form_err"] != "")
                        //     toaster(message_type = "Error", message_txt = data["messages"]["claims_form_err"], message_icone = "error");

                        // if (data["messages"]["circular_upload_err"] != "")
                        //     toaster(message_type = "Error", message_txt = data["messages"]["circular_upload_err"], message_icone = "error");

                        if (data["messages"]["policy_wording_err"] != "")
                            $("#policy_wording").addClass("parsley-error");
                        else
                            $("#policy_wording").removeClass("parsley-error");
                        $("#policy_wording_err").addClass("text-danger").html(data["messages"]["policy_wording_err"]);

                        // if (data["messages"]["claims_form_err"] != "")
                        //     $("#claims_form").addClass("parsley-error");
                        // else
                        //     $("#claims_form").removeClass("parsley-error");
                        // $("#claims_form_err").addClass("text-danger").html(data["messages"]["claims_form_err"]);

                        if (data["messages"]["proposal_upload_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["proposal_upload_err"], message_icone = "error");
                        if (data["messages"]["claim_upload_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["claim_upload_err"], message_icone = "error");
                        if (data["messages"]["brochure_upload_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["brochure_upload_err"], message_icone = "error");
                        if (data["messages"]["one_pager_upload_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["one_pager_upload_err"], message_icone = "error");

                        if (data["messages"]["proposal_upload_err"] != "")
                            $("#proposal_upload").addClass("parsley-error");
                        else
                            $("#proposal_upload").removeClass("parsley-error");
                        $("#proposal_upload_err").addClass("text-danger").html(data["messages"]["proposal_upload_err"]);

                        if (data["messages"]["claim_upload_err"] != "")
                            $("#claim_upload").addClass("parsley-error");
                        else
                            $("#claim_upload").removeClass("parsley-error");
                        $("#claim_upload_err").addClass("text-danger").html(data["messages"]["claim_upload_err"]);

                        if (data["messages"]["brochure_upload_err"] != "")
                            $("#brochure_upload").addClass("parsley-error");
                        else
                            $("#brochure_upload").removeClass("parsley-error");
                        $("#brochure_upload_err").addClass("text-danger").html(data["messages"]["brochure_upload_err"]);

                        if (data["messages"]["one_pager_upload_err"] != "")
                            $("#one_pager_upload").addClass("parsley-error");
                        else
                            $("#one_pager_upload").removeClass("parsley-error");
                        $("#one_pager_upload_err").addClass("text-danger").html(data["messages"]["one_pager_upload_err"]);

                    } else {
                        if (data["message"]["company_err"] != "")
                            $("#company").addClass("parsley-error");
                        else
                            $("#company").removeClass("parsley-error");
                        $("#company_err").addClass("text-danger").html(data["message"]["company_err"]);

                        if (data["message"]["department_err"] != "")
                            $("#department").addClass("parsley-error");
                        else
                            $("#department").removeClass("parsley-error");
                        $("#department_err").addClass("text-danger").html(data["message"]["department_err"]);

                        if (data["message"]["policy_name_err"] != "")
                            $("#policy_name").addClass("parsley-error");
                        else
                            $("#policy_name").removeClass("parsley-error");
                        $("#policy_name_err").addClass("text-danger").html(data["message"]["policy_name_err"]);

                        if (data["message"]["policy_type_err"] != "")
                            $("#policy_type").addClass("parsley-error");
                        else
                            $("#policy_type").removeClass("parsley-error");
                        $("#policy_type_err").addClass("text-danger").html(data["message"]["policy_type_err"]);

                        if (data["message"]["policy_wording_err"] != "")
                            $("#policy_wording").addClass("parsley-error");
                        else
                            $("#policy_wording").removeClass("parsley-error");
                        $("#policy_wording_err").addClass("text-danger").html(data["message"]["policy_wording_err"]);

                        if (data["message"]["document_liste_err"] != "")
                            $("#document_list").addClass("parsley-error");
                        else
                            $("#document_list").removeClass("parsley-error");
                        $("#document_liste_err").addClass("text-danger").html(data["message"]["document_liste_err"]);

                        if (data["message"]["claims_form_err"] != "")
                            $("#claims_form").addClass("parsley-error");
                        else
                            $("#claims_form").removeClass("parsley-error");
                        $("#claims_form_err").addClass("text-danger").html(data["message"]["claims_form_err"]);

                        if (data["message"]["claims_procedure_err"] != "")
                            $("#claims_procedure").addClass("parsley-error");
                        else
                            $("#claims_procedure").removeClass("parsley-error");
                        $("#claims_procedure_err").addClass("text-danger").html(data["message"]["claims_procedure_err"]);
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
        var department = $("#department").val();
        var policy_name = $("#policy_name").val();
        var policy_type = $("#policy_type").val();
        var policy_wording = $('#policy_wording').prop('files')[0];
        var claims_form = $('#claims_form').prop('files')[0];
        // var policy_wording = $("#policy_wording").val();

        var document_list = $("#document_list").val();
        // var claims_form = $("#claims_form").val();

        var claims_procedure = $("#claims_procedure").val();
        var comission_percentage = $("#comission_percentage").val();

        if (company == "null")
            company = "";

        if (department == "null")
            department = "";

        if (policy_name == "null")
            policy_name = "";

        if (document_list == "null")
            document_list = "";

        var form_data = new FormData();
        form_data.append('company', company);
        form_data.append('department', department);
        form_data.append('policy_name', policy_name);
        form_data.append('policy_type', policy_type);
        form_data.append('policy_wording', policy_wording);
        form_data.append('document_list', document_list);
        form_data.append('claims_form', claims_form);
        form_data.append('claims_procedure', claims_procedure);
        form_data.append('comission_percentage', comission_percentage);

        var url = "<?php echo $base_url; ?>master/plans_policy/add_plans_policy";

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
                    $("#company").val("null");
                    $("#department").val("null");
                    $("#policy_name").val("null");
                    $("#policy_type").val("");
                    $("#policy_wording").val("");
                    $("#document_list").val("null");
                    $("#claims_form").val("");
                    $("#claims_procedure").val("");
                    $("#comission_percentage").val("");

                    $("#company").removeClass("parsley-error");
                    $("#department").removeClass("parsley-error");
                    $("#policy_name").removeClass("parsley-error");
                    $("#policy_type").removeClass("parsley-error");
                    $("#policy_wording").removeClass("parsley-error");
                    $("#document_list").removeClass("parsley-error");
                    $("#claims_form").removeClass("parsley-error");
                    $("#claims_procedure").removeClass("parsley-error");
                    $("#comission_percentage").removeClass("parsley-error");

                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["messages"] != "") {
                        if (data["messages"]["policy_wording_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["policy_wording_err"], message_icone = "error");
                        if (data["messages"]["claims_form_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["claims_form_err"], message_icone = "error");

                        if (data["messages"]["policy_wording_err"] != "")
                            $("#policy_wording").addClass("parsley-error");
                        else
                            $("#policy_wording").removeClass("parsley-error");
                        $("#policy_wording_err").addClass("text-danger").html(data["messages"]["policy_wording_err"]);

                        if (data["messages"]["claims_form_err"] != "")
                            $("#claims_form").addClass("parsley-error");
                        else
                            $("#claims_form").removeClass("parsley-error");
                        $("#claims_form_err").addClass("text-danger").html(data["messages"]["claims_form_err"]);

                    } else {
                        if (data["message"]["company_err"] != "")
                            $("#company").addClass("parsley-error");
                        else
                            $("#company").removeClass("parsley-error");
                        $("#company_err").addClass("text-danger").html(data["message"]["company_err"]);

                        if (data["message"]["department_err"] != "")
                            $("#department").addClass("parsley-error");
                        else
                            $("#department").removeClass("parsley-error");
                        $("#department_err").addClass("text-danger").html(data["message"]["department_err"]);

                        if (data["message"]["policy_name_err"] != "")
                            $("#policy_name").addClass("parsley-error");
                        else
                            $("#policy_name").removeClass("parsley-error");
                        $("#policy_name_err").addClass("text-danger").html(data["message"]["policy_name_err"]);

                        if (data["message"]["policy_type_err"] != "")
                            $("#policy_type").addClass("parsley-error");
                        else
                            $("#policy_type").removeClass("parsley-error");
                        $("#policy_type_err").addClass("text-danger").html(data["message"]["policy_type_err"]);

                        if (data["message"]["policy_wording_err"] != "")
                            $("#policy_wording").addClass("parsley-error");
                        else
                            $("#policy_wording").removeClass("parsley-error");
                        $("#policy_wording_err").addClass("text-danger").html(data["message"]["policy_wording_err"]);

                        if (data["message"]["document_list_err"] != "")
                            $("#document_list").addClass("parsley-error");
                        else
                            $("#document_list").removeClass("parsley-error");
                        $("#document_list_err").addClass("text-danger").html(data["message"]["document_list_err"]);

                        if (data["message"]["claims_form_err"] != "")
                            $("#claims_form").addClass("parsley-error");
                        else
                            $("#claims_form").removeClass("parsley-error");
                        $("#claims_form_err").addClass("text-danger").html(data["message"]["claims_form_err"]);

                        if (data["message"]["claims_procedure_err"] != "")
                            $("#claims_procedure").addClass("parsley-error");
                        else
                            $("#claims_procedure").removeClass("parsley-error");
                        $("#claims_procedure_err").addClass("text-danger").html(data["message"]["claims_procedure_err"]);

                    }
                }

            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    });

    function Circular_add() {
        $("#add_circular").hide();
        $("#circular_detail_div").show();
    }

    function check_circular_upload() {
        var ext = $('#circular_upload').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['png', 'jpg', 'jpeg', 'pdf']) == -1) {
            toaster(message_type = "Error", message_txt = "Invalid Extension!", message_icone = "error");
            toaster(message_type = "Error", message_txt = "Please Select Only PDF And Image Document Only.", message_icone = "error");
            // alert('invalid extension!');
            var attr = $('#upload').attr('disabled');
            // alert(attr);
            if (attr == undefined || attr == false) {
                // alert("NO");
                $('#upload').attr("disabled", true);
            }
        } else {
            $('#upload').removeAttr('disabled');
        }
    }

    function check_file_upload(id) {
        if ($.inArray($('#' + id).val().split('.').pop().toLowerCase(), ['png', 'jpg', 'jpeg', 'pdf', 'jpe', 'doc', 'docx', 'csv', 'xls']) == -1) {
            toaster(message_type = "Error", message_txt = "Invalid Extension!", message_icone = "error");
            $('#' + id).addClass("parsley-error");
            $('#' + id + "_err").addClass("text-danger").html("Please Select Only Valid Document Like PDF,Image,Excel or Doc File Only.");
            toaster(message_type = "Error", message_txt = "Please Select Only Valid Document Like PDF,Image,Excel or Doc File Only.", message_icone = "error");
            return false;
        } else {
            $('#' + id).removeClass("parsley-error");
            $('#' + id + "_err").removeClass("text-danger").html("");
        }
    }

    function update_circular_upload() {
        var plans_policy_id = $("#plans_policy_id").text();
        var company = $("#company").val();
        var department = $("#department").val();
        var policy_name = $("#policy_name").val();
        var company_name_txt = $("#company option:selected").text();
        var department_name_txt = $("#department option:selected").text();
        var policy_name_txt = $("#policy_name option:selected").text();
        var policy_type = $("#policy_type").val();
        var document_list = $("#document_list").val();
        var circular_date = $("#circular_date").val();
        var circular_upload = $('#circular_upload').prop('files')[0];
        var circular_doc_reason = $("#circular_doc_reason").val();
        if (circular_upload == undefined || circular_upload == "") {
            toaster(message_type = "Error", message_txt = "Please Select Circular Upload File!", message_icone = "error");
            return false;
        }
        if (circular_date == undefined || circular_date == "") {
            toaster(message_type = "Error", message_txt = "Please Select Circular Date File!", message_icone = "error");
            return false;
        }
        // alert(circular_upload);

        if (company == "null")
            company = "";

        if (department == "null")
            department = "";

        if (policy_name == "null")
            policy_name = "";

        if (document_list == "null")
            document_list = "";

        var form_data = new FormData();
        form_data.append('plans_policy_id', plans_policy_id);
        form_data.append('company', company);
        form_data.append('department', department);
        form_data.append('policy_name', policy_name);

        form_data.append('company_name_txt', company_name_txt);
        form_data.append('department_name_txt', department_name_txt);
        form_data.append('policy_name_txt', policy_name_txt);

        form_data.append('policy_type', policy_type);
        form_data.append('document_list', document_list);

        form_data.append('circular_date', circular_date);
        form_data.append('circular_upload', circular_upload);
        form_data.append('circular_doc_reason', circular_doc_reason);

        var url = "<?php echo $base_url; ?>master/plans_policy/update_circular_upload";

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
                    // $("#company").val("null");
                    // $("#department").val("null");
                    // $("#policy_name").val("null");
                    // $("#policy_type").val("");
                    // $("#document_list").val("null");
                    $("#circular_upload").val("");
                    $("#circular_doc_reason").val("");

                    $("#company").removeClass("parsley-error");
                    $("#department").removeClass("parsley-error");
                    $("#policy_name").removeClass("parsley-error");
                    $("#policy_type").removeClass("parsley-error");
                    $("#document_list").removeClass("parsley-error");
                    get_circular_doc();
                } else {
                    if (data["messages"] != "") {

                        if (data["messages"]["circular_upload_err"] != "")
                            toaster(message_type = "Error", message_txt = data["messages"]["circular_upload_err"], message_icone = "error");
                        if (data["messages"]["circular_upload_err"] != "")
                            $("#circular_upload").addClass("parsley-error");
                        else
                            $("#circular_upload").removeClass("parsley-error");
                        $("#circular_upload_err").addClass("text-danger").html(data["messages"]["circular_upload_err"]);

                    } else {
                        if (data["message"]["company_err"] != "")
                            $("#company").addClass("parsley-error");
                        else
                            $("#company").removeClass("parsley-error");
                        $("#company_err").addClass("text-danger").html(data["message"]["company_err"]);

                        if (data["message"]["department_err"] != "")
                            $("#department").addClass("parsley-error");
                        else
                            $("#department").removeClass("parsley-error");
                        $("#department_err").addClass("text-danger").html(data["message"]["department_err"]);

                        if (data["message"]["policy_name_err"] != "")
                            $("#policy_name").addClass("parsley-error");
                        else
                            $("#policy_name").removeClass("parsley-error");
                        $("#policy_name_err").addClass("text-danger").html(data["message"]["policy_name_err"]);

                        if (data["message"]["policy_type_err"] != "")
                            $("#policy_type").addClass("parsley-error");
                        else
                            $("#policy_type").removeClass("parsley-error");
                        $("#policy_type_err").addClass("text-danger").html(data["message"]["policy_type_err"]);

                        if (data["message"]["document_liste_err"] != "")
                            $("#document_list").addClass("parsley-error");
                        else
                            $("#document_list").removeClass("parsley-error");
                        $("#document_list_err").addClass("text-danger").html(data["message"]["document_liste_err"]);

                    }
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    function get_circular_doc() {
        var plans_policy_id = $("#plans_policy_id").text();
        // alert(plans_policy_id);
        var url = "<?php echo $base_url; ?>master/plans_policy/get_circular_doc";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    plans_policy_id: plans_policy_id
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    if (data["status"] == true) {
                        var circular_doc_val = data["userdata"];
                        $("#append_circular_doc").empty();
                        var append_circular_doc = "";
                        var count = 1;
                        $.each(circular_doc_val, function(key, val) {
                            var circular_doc_id = circular_doc_val[key].circular_doc_id;
                            var circular_doc_date = circular_doc_val[key].circular_doc_date;
                            var circular_doc_name = circular_doc_val[key].circular_doc_name;
                            var circular_doc_status = circular_doc_val[key].circular_doc_status;
                            var circular_doc_del_flag = circular_doc_val[key].circular_doc_del_flag;

                            if (circular_doc_del_flag == 1) {
                                var del_status = "Delete";

                                var delete_circular_doc = "<button class='btn btn-outline-danger waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='On_Circular_doc_Delete(" + circular_doc_id + ")' >Delete</button>";
                            } else {
                                var del_status = "Recover";
                                var delete_circular_doc = "<button id='recover' onclick='On_Circular_doc_Recover(" + circular_doc_id + ")' class='btn btn-outline-danger waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                            }

                            if (circular_doc_name == "" || circular_doc_name == "null" || circular_doc_name == null || circular_doc_name == undefined) {
                                var view_circular_doc = "";
                                var download_circular_doc = "";
                            } else if (circular_doc_name != "") {
                                var view_circular_doc = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/3/" + data["userdata"].plans_policy_id + "/" + circular_doc_id + "'  class='btn btn-outline-primary waves-effect width-md waves-light btn-sm delete'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                var download_circular_doc = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/3/" + data["userdata"].plans_policy_id + "/" + circular_doc_id + "' class='btn btn-outline-primary waves-effect width-md waves-light btn-sm delete'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                            }
                            circular_doc_btn = delete_circular_doc + " " + view_circular_doc + "  " + download_circular_doc;

                            append_circular_doc += '<tr><td scope="row">' + count + '</td><td>' + circular_doc_date + '</td><td>' + circular_doc_name + '</td><td>' + circular_doc_btn + '</td></tr>';
                            count++;
                        });
                        $("#append_circular_doc").append(append_circular_doc);
                    }

                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {}
            });

        }
    }

    function On_Circular_doc_Recover(circular_doc_id, circular_doc_del_flag) {
        var url = "<?php echo $base_url; ?>master/plans_policy/recover_circular_doc";
        Sweet_confirmation_alert(id = circular_doc_id, status = circular_doc_del_flag, url = url, title = "Circular Document", type = "Recover");
    }

    function On_Circular_doc_Delete(circular_doc_id, circular_doc_del_flag) {
        var url = "<?php echo $base_url; ?>master/plans_policy/remove_circular_doc";
        Sweet_confirmation_alert(id = circular_doc_id, status = circular_doc_del_flag, url = url, title = "Circular Document", type = "Delet");
    }

    function Sweet_confirmation_alert(id = "", status = "", url = "", title = "", type = "") {
        swal.fire({
            title: "Are you sure to " + type + "e This " + title + " ",
            text: "Would you like to proceed ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: false
        }).
        then(function(t) {
            // alert(t.value);
            if (t.value == true) {
                $.ajax({
                    url: url,
                    data: {
                        id: id
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {

                    },
                    success: function(data) {
                        if (data["status"] == true) {
                            swal.fire(title + " " + type + "ed Successfully! ", {
                                icon: "success",
                                type: "success",
                                timer: 2000,
                            });
                            if (status == 1) {
                                status = 0;
                                $("#common_del_cir_doc_" + id).attr("onclick", "On_Circular_doc_Recover(" + id + "," + status + ")");
                                $("#common_del_cir_doc_" + id).removeClass("btn btn-outline-danger waves-effect width-md waves-light btn-sm delete");
                                $("#common_del_cir_doc_" + id).addClass("btn btn-outline-primary waves-effect width-md waves-light btn-sm delete");
                                $("#common_del_cir_doc_" + id).text("");
                                $("#common_del_cir_doc_" + id).text("Recover");

                                $("#circular_doc_count_" + id).wrap("<strike>");
                                $("#circular_doc_date_" + id).wrap("<strike>");
                                $("#circular_doc_name_" + id).wrap("<strike>");

                                $("#view_circular_doc_count_" + id).wrap("<strike>");
                                $("#view_circular_doc_date_" + id).wrap("<strike>");
                                $("#view_circular_doc_name_" + id).wrap("<strike>");

                                $("#view_circular_doc_" + id).hide();
                                $("#download_circular_doc_" + id).hide();

                                $("#vview_circular_doc_" + id).hide();
                                $("#vdownload_circular_doc_" + id).hide();
                            } else if (status == 0) {
                                status = 1;
                                $("#common_del_cir_doc_" + id).attr("onclick", "On_Circular_doc_Delete(" + id + "," + status + ")");
                                $("#common_del_cir_doc_" + id).removeClass("btn btn-outline-primary waves-effect width-md waves-light btn-sm delete");
                                $("#common_del_cir_doc_" + id).addClass("btn btn-outline-danger waves-effect width-md waves-light btn-sm delete");
                                $("#common_del_cir_doc_" + id).text("");
                                $("#common_del_cir_doc_" + id).text("Delete");
                                var span_Tags = $("span");
                                if ($("#circular_doc_count_" + id).parent().is("strike")) {
                                    $("#circular_doc_count_" + id).unwrap();
                                }
                                if ($("#circular_doc_date_" + id).parent().is("strike")) {
                                    $("#circular_doc_date_" + id).unwrap();
                                }
                                if ($("#circular_doc_name_" + id).parent().is("strike")) {
                                    $("#circular_doc_name_" + id).unwrap();
                                }

                                if ($("#view_circular_doc_count_" + id).parent().is("strike")) {
                                    $("#view_circular_doc_count_" + id).unwrap();
                                }
                                if ($("#view_circular_doc_date_" + id).parent().is("strike")) {
                                    $("#view_circular_doc_date_" + id).unwrap();
                                }
                                if ($("#view_circular_doc_name_" + id).parent().is("strike")) {
                                    $("#view_circular_doc_name_" + id).unwrap();
                                }

                                $("#view_circular_doc_" + id).show();
                                $("#download_circular_doc_" + id).show();

                                $("#vview_circular_doc_" + id).show();
                                $("#vdownload_circular_doc_" + id).show();
                                // $("#circular_doc_count_" + id).unwrap("<strike>");
                                // $("#circular_doc_date_" + id).unwrap("<strike>");
                                // $("#circular_doc_name_" + id).unwrap("<strike>");

                            }
                            // setTimeout(function() {
                            //     location.reload();
                            // }, 1800);
                        } else {
                            swal.fire("Error On Deleteing " + title + "!", {
                                icon: "danger",
                                type: "warning",
                                timer: 2000,
                            });
                            // setTimeout(function() {
                            //     location.reload();
                            // }, 500);
                        }
                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            } else {
                swal.fire("Cancelled", "", "error");
            }

        })
    }

    function OnDeletePermanently(plans_policy_id) {
        var url = "<?php echo $base_url; ?>master/plans_policy/delete_plans_policy";
        confirmation_alert(id = plans_policy_id, url = url, title = "Plans & Policy", type = "Delet");
    }

    function Filter_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter On');
        $('#filter_form_modal').modal('toggle');

        // var filter_company = $("#filter_company").val();
        var filter_department = $("#filter_department").val();
        var filter_policy_name = $("#filter_policy_name").val();
        var filter_status = $("#filter_status").val();

        // if (filter_company == "null")
        //     filter_company = "";

        if (filter_department == "null")
            filter_department = "";

        if (filter_policy_name == "null")
            filter_policy_name = "";

        if (filter_status == "null")
            filter_status = "";

        var url = "<?php echo $base_url; ?>master/plans_policy/filter_plans_policy_list_view";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    view: "<?php echo $view; ?>",
                    company_id: "<?php echo $company_id; ?>",
                    // filter_company: filter_company,
                    filter_department: filter_department,
                    filter_policy_name: filter_policy_name,
                    filter_status: filter_status,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var total_plans_policy_data = 0;
                    $("#total_plans_policy_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var view_btn = "";
                        var view_circular_doc_list_btn = "";
                        var status_btn = "";
                        var plans_policy_id = "";
                        var company = "";
                        var department = "";
                        var policy_name = "";
                        var policy_type = "";
                        var policy_wording = "";
                        var document_list = "";
                        var claims_form = "";
                        var claims_procedure = "";
                        var comission_percentage = "";
                        var plans_policy_status = "";
                        var datas = "";
                        var status = "";
                        var doc_name = "";
                        // var view_claims_form ="";
                        var total_policy = data["total_policy"];
                        total_plans_policy_data = data["total_plans_policy_data"];
                        $("#total_plans_policy_data").text(" Count ( " + total_plans_policy_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            plans_policy_id = parseInt(data[key].plans_policy_id);
                            // alert(plans_policy_id);
                            company_id = data[key].fk_mcompany_id;
                            fk_document_id = data[key].fk_document_id;
                            company = data[key].company_name;
                            department = data[key].department_name;
                            policy_name = data[key].policy_type_title;
                            policy_type = data[key].policy_type;
                            policy_wording = data[key].policy_wording;
                            document_list = data[key].document_name;
                            claims_form = data[key].claims_form;

                            claim_doc_name = data[key].claim_doc_name;
                            proposal_doc_name = data[key].proposal_doc_name;
                            circular_doc_name = data[key].circular_doc_name;
                            other_doc_name = data[key].other_doc_name;
                            brochure_upload = data[key].brochure_upload;
                            one_pager_upload = data[key].one_pager_upload;
                            // alert(proposal_doc_name);

                            if (claim_doc_name == undefined || claim_doc_name == "" || claim_doc_name == "undefined" || claim_doc_name == null) {
                                view_claim_doc_name = "";
                                download_claim_doc_name = "";
                                delete_claim_doc_name = "";
                            } else if (claim_doc_name != "") {
                                view_claim_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/3/" + plans_policy_id + "/" + claim_doc_name + "'  target='_blank' class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                download_claim_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/3/" + plans_policy_id + "/" + claim_doc_name + "'  target='_blank' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                delete_claim_doc_name = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 3 + ',' + claim_doc_name + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                            }

                            if (proposal_doc_name == "" || proposal_doc_name == "undefined" || proposal_doc_name == "" || proposal_doc_name == null) {
                                view_proposal_doc_name = "";
                                download_proposal_doc_name = "";
                                delete_proposal_doc_name = "";
                            } else if (proposal_doc_name != "") {
                                view_proposal_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/4/" + plans_policy_id + "/" + proposal_doc_name + "'  target='_blank' class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                download_proposal_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/4/" + plans_policy_id + "/" + proposal_doc_name + "' target='_blank' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                delete_proposal_doc_name = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 4 + ',' + proposal_doc_name + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                            }

                            if (circular_doc_name == "" || circular_doc_name == "undefined" || circular_doc_name == "" || circular_doc_name == null) {
                                view_circular_doc_name = "";
                                download_circular_doc_name = "";
                                delete_circular_doc_name = "";
                            } else if (circular_doc_name != "") {
                                view_circular_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/5/" + plans_policy_id + "/" + circular_doc_name + "'  target='_blank' class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                download_circular_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/5/" + plans_policy_id + "/" + circular_doc_name + "' target='_blank' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                delete_circular_doc_name = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 5 + ',' + circular_doc_name + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                            }

                            if (other_doc_name == "" || other_doc_name == "undefined" || other_doc_name == undefined || other_doc_name == null) {
                                view_other_doc_name = "";
                                download_other_doc_name = "";
                                delete_other_doc_name = "";
                            } else if (other_doc_name != "") {
                                view_other_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/6/" + plans_policy_id + "/" + other_doc_name + "'  target='_blank' class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                download_other_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/6/" + plans_policy_id + "/" + other_doc_name + "' target='_blank' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                delete_other_doc_name = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 6 + ',' + other_doc_name + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                            }

                            if (brochure_upload == "" || brochure_upload == "undefined" || brochure_upload == null || brochure_upload == undefined) {
                                view_brochure_upload = "";
                                download_brochure_upload = "";
                                delete_brochure_upload = "";
                            } else if (brochure_upload != "") {
                                view_brochure_upload = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/7/" + plans_policy_id + "/" + brochure_upload + "'  target='_blank' class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                download_brochure_upload = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/7/" + plans_policy_id + "/" + brochure_upload + "' target='_blank' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                delete_brochure_upload = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 7 + ',' + brochure_upload + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                            }

                            if (one_pager_upload == "" || one_pager_upload == "undefined" || one_pager_upload == null || one_pager_upload == undefined) {
                                view_one_pager_upload = "";
                                download_one_pager_upload = "";
                                delete_one_pager_upload = "";
                            } else if (one_pager_upload != "") {
                                view_one_pager_upload = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/8/" + plans_policy_id + "/" + one_pager_upload + "'  target='_blank' class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                download_one_pager_upload = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/8/" + plans_policy_id + "/" + one_pager_upload + "' target='_blank' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                delete_one_pager_upload = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 8 + ',' + one_pager_upload + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                            }

                            claim_doc_reason = data[key].claim_doc_reason;
                            proposal_doc_reason = data[key].proposal_doc_reason;
                            circular_doc_reason = data[key].circular_doc_reason;
                            other_doc_reason = data[key].other_doc_reason;
                            brochure_doc_reason = data[key].brochure_doc_reason;
                            one_pager_doc_reason = data[key].one_pager_doc_reason;

                            claim_doc_date = data[key].claim_doc_date;
                            proposal_doc_date = data[key].proposal_doc_date;
                            circular_doc_date = data[key].circular_doc_date;
                            other_doc_date = data[key].other_doc_date;
                            brochure_date = data[key].brochure_date;
                            one_pager_date = data[key].one_pager_date;

                            claims_procedure = data[key].claims_procedure;
                            comission_percentage = data[key].comission_percentage;
                            plans_policy_status = data[key].plans_policy_status;
                            // doc_name = doc_name_list(fk_document_id);

                            // if (doc_name != 'undefined')
                            //     var document_name = doc_name;
                            // alert(document_name + "123");
                            if (comission_percentage == null)
                                comission_percentage = "";
                            else
                                comission_percentage = comission_percentage;

                            var isActive = data[key].del_flag;
                            if (!isNaN(plans_policy_id)) {
                                if (plans_policy_status == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light btn-sm edit";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light btn-sm edit";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }

                                if (isActive == 1) {
                                    var del_status = "No";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + plans_policy_id + ")'><b>Delete</b></a>";
                                    // var delete_btn_txt = "<button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + plans_policy_id + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item recover' href='javascript:void(0);' id='recover' onClick ='OnRecover(" + plans_policy_id + ")'><b>Recover</b></a>";
                                    // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + plans_policy_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                                }


                                if (policy_type == 1)
                                    var policy_type_tit = "Individual";
                                else if (policy_type == 2)
                                    var policy_type_tit = "Floater";

                                // edit_btn = "<button class='btn btn-facebook btn-sm mt-1 ml-1 edit' id='edit' value='' type='button' onClick ='onEdit(" + plans_policy_id + ")' ><i class='fas fa-pencil-alt'></i></button>";
                                // edit_btn = '<a href="<?php echo base_url(); ?>master/plans_policy/edit/'+plans_policy_id+'" class="btn btn-facebook btn-sm mt-1 ml-1 edit"><i class="fas fa-pencil-alt"></i></a>';
                                // view_btn = "<button class='btn btn-facebook btn-sm mt-1 view' id='view' value='' type='button' onClick ='onView(" + plans_policy_id + ")' ><i class='fas fa-eye'></i></button>";
                                // view_circular_doc_list_btn = "<a href='<?php echo base_url(); ?>master/plans_policy/view_circular_doc_list/<?php echo $company_id; ?>/" + plans_policy_id + "'  class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view'>Circular Details</a>";
                                // alert(plans_policy_id);
                                var view_policy_wording = "";
                                var view_claims_form = "";
                                var download_policy_wording = "";
                                var delete_policy_wording = "";
                                var download_claims_form = "";
                                if (policy_wording != "") {
                                    view_policy_wording = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/1/" + plans_policy_id + "'  class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                    download_policy_wording = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/1/" + plans_policy_id + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                    delete_policy_wording = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 1 + ',' + data[key].policy_wording + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);'class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                                }
                                if (claims_form != "") {
                                    view_claims_form = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/2/" + plans_policy_id + "'  class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                    download_claims_form = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/2/" + plans_policy_id + "' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                }
                                // alert(view_policy_wording);
                                if (view_policy_wording == "undefined")
                                    view_policy_wording = "";
                                if (view_claims_form == "undefined")
                                    view_claims_form = "";

                                // view_btn = "<a href='<?php echo base_url(); ?>master/plans_policy/view/"+company_id+"' class='btn btn-info waves-effect width-md waves-light btn-sm'  >View</a>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + plans_policy_id + "' value='' type='button' onClick ='updateStatus(" + plans_policy_id + "," + plans_policy_status + ")' >" + status + "</button>";
                                // delete_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm' value='' type='button' onClick ='OnDeletePermanently(" + plans_policy_id + ")' >Delete Permanently</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + plans_policy_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + plans_policy_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + plans_policy_id + "' href='javascript:void(0);' id='status_btn_" + plans_policy_id + "' onClick ='updateStatus(" + plans_policy_id + "," + plans_policy_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "<a class='dropdown-item view' href='<?php echo base_url(); ?>master/plans_policy/view_circular_doc_list/<?php echo $company_id; ?>/" + plans_policy_id + "' id='view' ><b>Circular Details</b><a class='dropdown-item recover' href='javascript:void(0);' id='recover' onClick ='OnDeletePermanently(" + plans_policy_id + ")'><b>Delete Permanently</b></a></div></div>";


                                // datas += '<tr><td>' + view_btn + "<br>" + edit_btn + '</td><td>' + company + '</td> <td>' + department + '</td><td>' + policy_name + '</td><td>' + policy_type_tit + '</td><td >' + document_list + '</td><td>' + claims_procedure + '</td><td>' + view_policy_wording + "  " + download_policy_wording + '</td><td>' + view_claims_form + "  " + download_claims_form + '</td><td>' + status_btn + '</td><td>' + del_status + '</td></tr>';<td>' + view_circular_doc_name + "  " + download_circular_doc_name + '</td><td>' + view_other_doc_name + "  " + download_other_doc_name + '</td>
                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + "<br/>" + badge_status + '</td><td>' + sn + '</td><td>' + company + '</td> <td>' + department + '</td><td>' + policy_name + '</td><td>' + policy_type_tit + '</td><td>' + claims_procedure + '</td><td>' + comission_percentage + '</td><td>' + view_policy_wording + "&nbsp;&nbsp;&nbsp;" + download_policy_wording + "&nbsp;&nbsp;&nbsp;" + delete_policy_wording + '</td><td>' + view_claim_doc_name + "&nbsp;&nbsp;&nbsp;" + download_claim_doc_name + "&nbsp;&nbsp;&nbsp;" + delete_claim_doc_name + '</td><td>' + view_proposal_doc_name + "&nbsp;&nbsp;&nbsp;" + download_proposal_doc_name + "&nbsp;&nbsp;&nbsp;" + delete_proposal_doc_name + '</td><td>' + view_brochure_upload + "&nbsp;&nbsp;&nbsp;" + download_brochure_upload + "&nbsp;&nbsp;&nbsp;" + delete_brochure_upload + '</td><td>' + view_one_pager_upload + "&nbsp;&nbsp;&nbsp;" + download_one_pager_upload + "&nbsp;&nbsp;&nbsp;" + delete_one_pager_upload + '</td></tr>';
                            }
                        });

                    } else {
                        $("#total_plans_policy_data").text(" Count ( " + total_plans_policy_data + " ) ");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td collabel="4"><center>Data Not Found</center></td> </tr>';
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

        // $("#filter_company").val("null");
        $("#filter_department").val("null");
        $("#filter_policy_name").val("null");
        $("#filter_status").val("null");
        getPlansPolicyList();
    }
    getPlansPolicyList();

    function OnDelete_Doc(plan_policy_details) {
        var plan_policy_details = plan_policy_details.split(",");
        var plans_policy_id = plan_policy_details[0];
        var doc_type = plan_policy_details[1];
        var doc_name = plan_policy_details[2];
        var url = plan_policy_details[3];
        // alert(policy_id);
        // alert(doc_type);
        // alert(doc_name);
        // alert(url);
        if (doc_type == 1)
            var title = "Policy Wordings Document";
        else if (doc_type == 2)
            var title = "Claim Form Upload Document";
        else if (doc_type == 3)
            var title = "Claim Form Upload Document";
        else if (doc_type == 4)
            var title = "Proposal Upload Document";
        else if (doc_type == 5)
            var title = "Circular Upload Document";
        else if (doc_type == 6)
            var title = "Other Upload Document";
        else if (doc_type == 7)
            var title = "Brochure Upload Document";
        else if (doc_type == 8)
            var title = "One Pager Upload Document";
        document_confirmation_alert(id = plans_policy_id, doc_type = doc_type, doc_name = doc_name, url = url, title = title, type = "Delet");
    }

    function getPlansPolicyList() {
        // alert("Hi");
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/plans_policy/get_plans_policy_list_view/view/<?php echo $company_id; ?>";
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
                    var total_plans_policy_data = 0;
                    $("#total_plans_policy_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var view_btn = "";
                        var view_circular_doc_list_btn = "";
                        var status_btn = "";
                        var plans_policy_id = "";
                        var company = "";
                        var department = "";
                        var policy_name = "";
                        var policy_type = "";
                        var policy_wording = "";
                        var document_list = "";
                        var claims_form = "";
                        var claims_procedure = "";
                        var comission_percentage = "";
                        var plans_policy_status = "";
                        var datas = "";
                        var status = "";
                        var doc_name = "";
                        // var view_claims_form ="";
                        var total_policy = data["total_policy"];
                        total_plans_policy_data = data["total_plans_policy_data"];
                        $("#total_plans_policy_data").text(" Count ( " + total_plans_policy_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            plans_policy_id = parseInt(data[key].plans_policy_id);
                            // alert(plans_policy_id);
                            company_id = data[key].fk_mcompany_id;
                            fk_document_id = data[key].fk_document_id;
                            company = data[key].company_name;
                            department = data[key].department_name;
                            policy_name = data[key].policy_type_title;
                            policy_type = data[key].policy_type;
                            policy_wording = data[key].policy_wording;
                            document_list = data[key].document_name;
                            claims_form = data[key].claims_form;

                            claim_doc_name = data[key].claim_doc_name;
                            proposal_doc_name = data[key].proposal_doc_name;
                            circular_doc_name = data[key].circular_doc_name;
                            other_doc_name = data[key].other_doc_name;
                            brochure_upload = data[key].brochure_upload;
                            one_pager_upload = data[key].one_pager_upload;
                            // alert(proposal_doc_name);

                            if (claim_doc_name == undefined || claim_doc_name == "" || claim_doc_name == "undefined" || claim_doc_name == null) {
                                view_claim_doc_name = "";
                                download_claim_doc_name = "";
                                delete_claim_doc_name = "";
                            } else if (claim_doc_name != "") {
                                view_claim_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/3/" + plans_policy_id + "/" + claim_doc_name + "'  target='_blank' class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                download_claim_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/3/" + plans_policy_id + "/" + claim_doc_name + "'  target='_blank' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                delete_claim_doc_name = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 3 + ',' + claim_doc_name + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                            }

                            if (proposal_doc_name == "" || proposal_doc_name == "undefined" || proposal_doc_name == "" || proposal_doc_name == null) {
                                view_proposal_doc_name = "";
                                download_proposal_doc_name = "";
                                delete_proposal_doc_name = "";
                            } else if (proposal_doc_name != "") {
                                view_proposal_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/4/" + plans_policy_id + "/" + proposal_doc_name + "'  target='_blank' class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                download_proposal_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/4/" + plans_policy_id + "/" + proposal_doc_name + "' target='_blank' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                delete_proposal_doc_name = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 4 + ',' + proposal_doc_name + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                            }

                            if (circular_doc_name == "" || circular_doc_name == "undefined" || circular_doc_name == "" || circular_doc_name == null) {
                                view_circular_doc_name = "";
                                download_circular_doc_name = "";
                                delete_circular_doc_name = "";
                            } else if (circular_doc_name != "") {
                                view_circular_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/5/" + plans_policy_id + "/" + circular_doc_name + "'  target='_blank' class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                download_circular_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/5/" + plans_policy_id + "/" + circular_doc_name + "' target='_blank' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                delete_circular_doc_name = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 5 + ',' + circular_doc_name + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                            }

                            if (other_doc_name == "" || other_doc_name == "undefined" || other_doc_name == undefined || other_doc_name == null) {
                                view_other_doc_name = "";
                                download_other_doc_name = "";
                                delete_other_doc_name = "";
                            } else if (other_doc_name != "") {
                                view_other_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/6/" + plans_policy_id + "/" + other_doc_name + "'  target='_blank' class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                download_other_doc_name = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/6/" + plans_policy_id + "/" + other_doc_name + "' target='_blank' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                delete_other_doc_name = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 6 + ',' + other_doc_name + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                            }

                            if (brochure_upload == "" || brochure_upload == "undefined" || brochure_upload == null || brochure_upload == undefined) {
                                view_brochure_upload = "";
                                download_brochure_upload = "";
                                delete_brochure_upload = "";
                            } else if (brochure_upload != "") {
                                view_brochure_upload = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/7/" + plans_policy_id + "/" + brochure_upload + "'  target='_blank' class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                download_brochure_upload = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/7/" + plans_policy_id + "/" + brochure_upload + "' target='_blank' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                delete_brochure_upload = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 7 + ',' + brochure_upload + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                            }

                            if (one_pager_upload == "" || one_pager_upload == "undefined" || one_pager_upload == null || one_pager_upload == undefined) {
                                view_one_pager_upload = "";
                                download_one_pager_upload = "";
                                delete_one_pager_upload = "";
                            } else if (one_pager_upload != "") {
                                view_one_pager_upload = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/8/" + plans_policy_id + "/" + one_pager_upload + "'  target='_blank' class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                download_one_pager_upload = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/8/" + plans_policy_id + "/" + one_pager_upload + "' target='_blank' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                delete_one_pager_upload = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 8 + ',' + one_pager_upload + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                            }

                            claim_doc_reason = data[key].claim_doc_reason;
                            proposal_doc_reason = data[key].proposal_doc_reason;
                            circular_doc_reason = data[key].circular_doc_reason;
                            other_doc_reason = data[key].other_doc_reason;
                            brochure_doc_reason = data[key].brochure_doc_reason;
                            one_pager_doc_reason = data[key].one_pager_doc_reason;

                            claim_doc_date = data[key].claim_doc_date;
                            proposal_doc_date = data[key].proposal_doc_date;
                            circular_doc_date = data[key].circular_doc_date;
                            other_doc_date = data[key].other_doc_date;
                            brochure_date = data[key].brochure_date;
                            one_pager_date = data[key].one_pager_date;

                            claims_procedure = data[key].claims_procedure;
                            comission_percentage = data[key].comission_percentage;
                            plans_policy_status = data[key].plans_policy_status;
                            // doc_name = doc_name_list(fk_document_id);

                            // if (doc_name != 'undefined')
                            //     var document_name = doc_name;
                            // alert(document_name + "123");
                            if (comission_percentage == null)
                                comission_percentage = "";
                            else
                                comission_percentage = comission_percentage;

                            var isActive = data[key].del_flag;
                            if (!isNaN(plans_policy_id)) {
                                if (plans_policy_status == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light btn-sm edit";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light btn-sm edit";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }

                                if (isActive == 1) {
                                    var del_status = "No";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + plans_policy_id + ")'><b>Delete</b></a>";
                                    // var delete_btn_txt = "<button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + plans_policy_id + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item recover' href='javascript:void(0);' id='recover' onClick ='OnRecover(" + plans_policy_id + ")'><b>Recover</b></a>";
                                    // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + plans_policy_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                                }


                                if (policy_type == 1)
                                    var policy_type_tit = "Individual";
                                else if (policy_type == 2)
                                    var policy_type_tit = "Floater";

                                // edit_btn = "<button class='btn btn-facebook btn-sm mt-1 ml-1 edit' id='edit' value='' type='button' onClick ='onEdit(" + plans_policy_id + ")' ><i class='fas fa-pencil-alt'></i></button>";
                                // edit_btn = '<a href="<?php echo base_url(); ?>master/plans_policy/edit/'+plans_policy_id+'" class="btn btn-facebook btn-sm mt-1 ml-1 edit"><i class="fas fa-pencil-alt"></i></a>';
                                // view_btn = "<button class='btn btn-facebook btn-sm mt-1 view' id='view' value='' type='button' onClick ='onView(" + plans_policy_id + ")' ><i class='fas fa-eye'></i></button>";
                                // view_circular_doc_list_btn = "<a href='<?php echo base_url(); ?>master/plans_policy/view_circular_doc_list/<?php echo $company_id; ?>/" + plans_policy_id + "'  class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view'>Circular Details</a>";
                                // alert(plans_policy_id);
                                var view_policy_wording = "";
                                var view_claims_form = "";
                                var download_policy_wording = "";
                                var delete_policy_wording = "";
                                var download_claims_form = "";
                                if (policy_wording != "") {
                                    view_policy_wording = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/1/" + plans_policy_id + "'  class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                    download_policy_wording = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/1/" + plans_policy_id + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                    delete_policy_wording = "<a onclick=OnDelete_Doc('" + plans_policy_id + ',' + 1 + ',' + data[key].policy_wording + ',' + '<?php echo base_url(); ?>master/plans_policy/delete_doc' + "') href='javascript:void(0);'class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";
                                }
                                if (claims_form != "") {
                                    view_claims_form = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/2/" + plans_policy_id + "'  class='text-info'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                                    download_claims_form = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/2/" + plans_policy_id + "' class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                                }
                                // alert(view_policy_wording);
                                if (view_policy_wording == "undefined")
                                    view_policy_wording = "";
                                if (view_claims_form == "undefined")
                                    view_claims_form = "";

                                // view_btn = "<a href='<?php echo base_url(); ?>master/plans_policy/view/"+company_id+"' class='btn btn-info waves-effect width-md waves-light btn-sm'  >View</a>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + plans_policy_id + "' value='' type='button' onClick ='updateStatus(" + plans_policy_id + "," + plans_policy_status + ")' >" + status + "</button>";
                                // delete_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm' value='' type='button' onClick ='OnDeletePermanently(" + plans_policy_id + ")' >Delete Permanently</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + plans_policy_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + plans_policy_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + plans_policy_id + "' href='javascript:void(0);' id='status_btn_" + plans_policy_id + "' onClick ='updateStatus(" + plans_policy_id + "," + plans_policy_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "<a class='dropdown-item view' href='<?php echo base_url(); ?>master/plans_policy/view_circular_doc_list/<?php echo $company_id; ?>/" + plans_policy_id + "' id='view' ><b>Circular Details</b><a class='dropdown-item recover' href='javascript:void(0);' id='recover' onClick ='OnDeletePermanently(" + plans_policy_id + ")'><b>Delete Permanently</b></a></div></div>";


                                // datas += '<tr><td>' + view_btn + "<br>" + edit_btn + '</td><td>' + company + '</td> <td>' + department + '</td><td>' + policy_name + '</td><td>' + policy_type_tit + '</td><td >' + document_list + '</td><td>' + claims_procedure + '</td><td>' + view_policy_wording + "  " + download_policy_wording + '</td><td>' + view_claims_form + "  " + download_claims_form + '</td><td>' + status_btn + '</td><td>' + del_status + '</td></tr>';<td>' + view_circular_doc_name + "  " + download_circular_doc_name + '</td><td>' + view_other_doc_name + "  " + download_other_doc_name + '</td>
                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + "<br/>" + badge_status + '</td><td>' + sn + '</td><td>' + company + '</td> <td>' + department + '</td><td>' + policy_name + '</td><td>' + policy_type_tit + '</td><td>' + claims_procedure + '</td><td>' + comission_percentage + '</td><td>' + view_policy_wording + "&nbsp;&nbsp;&nbsp;" + download_policy_wording + "&nbsp;&nbsp;&nbsp;" + delete_policy_wording + '</td><td>' + view_claim_doc_name + "&nbsp;&nbsp;&nbsp;" + download_claim_doc_name + "&nbsp;&nbsp;&nbsp;" + delete_claim_doc_name + '</td><td>' + view_proposal_doc_name + "&nbsp;&nbsp;&nbsp;" + download_proposal_doc_name + "&nbsp;&nbsp;&nbsp;" + delete_proposal_doc_name + '</td><td>' + view_brochure_upload + "&nbsp;&nbsp;&nbsp;" + download_brochure_upload + "&nbsp;&nbsp;&nbsp;" + delete_brochure_upload + '</td><td>' + view_one_pager_upload + "&nbsp;&nbsp;&nbsp;" + download_one_pager_upload + "&nbsp;&nbsp;&nbsp;" + delete_one_pager_upload + '</td></tr>';
                            }
                        });

                    } else {
                        $("#total_plans_policy_data").text(" Count ( " + total_plans_policy_data + " ) ");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td collabel="4"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function doc_name_list(fk_document_id) {
        // alert(fk_document_id);
        var url = "<?php echo $base_url; ?>master/plans_policy/document_name";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    fk_document_id: fk_document_id
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    // var document_name="";
                    if (data["status"] == true) {
                        var document_name = data["document_name"];
                        if (document_name == 'undefined')
                            document_name = "";
                        else
                            document_name = document_name;

                        // return document_name;
                        // return document_name;
                        // $("#doc_name_data").empty();
                        // $("#doc_name_data").empty();
                        // alert(document_name);
                        // return document_name;
                    }
                    // else{
                    //     if(document_name =="undefined")
                    //     document_name ="";
                    // }
                    // return document_name;
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function onView(val) {
        clearError();

        $("#update").hide();
        $("#delete").hide();
        $("#submit").hide();
        $('#view_form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/plans_policy/edit_plans_policy";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    plans_policy_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    $("#plans_policy_id").text(data["userdata"].plans_policy_id);

                    $("#company_view_err").text(data["userdata"].company_name);
                    $("#department_view_err").text(data["userdata"].department_name);
                    $("#policy_name_view_err").text(data["userdata"].policy_type_title);
                    var policy_type = data["userdata"].policy_type;
                    if (policy_type == 1)
                        var policy_type_tit = "Individual";
                    else if (policy_type == 2)
                        var policy_type_tit = "Floater";
                    $("#policy_type_view_err").text(policy_type_tit);
                    $("#document_liste_view_err").text(data["userdata"].document_name);
                    $("#claims_procedure_view_err").text(data["userdata"].claims_procedure);
                    $("#comission_percentage_view_err").text(data["userdata"].comission_percentage);

                    var circular_doc_list_data_arr = data["userdata"].circular_doc_list_data_arr;
                    $("#append_view_circular_doc").empty();
                    var append_circular_doc = "";
                    var count = 1;
                    $.each(circular_doc_list_data_arr, function(key, val) {
                        var circular_doc_id = circular_doc_list_data_arr[key].circular_doc_id;
                        var circular_doc_date = circular_doc_list_data_arr[key].circular_doc_date;
                        var circular_doc_name = circular_doc_list_data_arr[key].circular_doc_name;
                        var circular_doc_status = circular_doc_list_data_arr[key].circular_doc_status;
                        var circular_doc_del_flag = circular_doc_list_data_arr[key].circular_doc_del_flag;
                        var disabled = "";
                        if (circular_doc_del_flag == 1) {
                            var del_status = "Delete";
                            disabled = "";
                            var delete_circular_doc = "<button class='btn btn-outline-danger waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='On_Circular_doc_Delete(" + circular_doc_id + "," + circular_doc_del_flag + ")' id='common_del_cir_doc_" + circular_doc_id + "'>Delete</button>";
                        } else {
                            disabled = "disabled";
                            var del_status = "Recover";
                            var delete_circular_doc = "<button onclick='On_Circular_doc_Recover(" + circular_doc_id + "," + circular_doc_del_flag + ")' class='btn btn-outline-primary waves-effect width-md waves-light btn-sm delete' id='common_del_cir_doc_" + circular_doc_id + "'>Recover</button>";
                        }

                        if (circular_doc_name == "" || circular_doc_name == "null" || circular_doc_name == null || circular_doc_name == undefined) {
                            var view_circular_doc = "";
                            var download_circular_doc = "";
                        } else if (circular_doc_name != "") {
                            var view_circular_doc = "<a href='<?php echo base_url(); ?>master/plans_policy/view_doc/3/" + data["userdata"].plans_policy_id + "/" + circular_doc_id + "'  class='btn btn-outline-primary waves-effect width-md waves-light btn-sm delete' id='vview_circular_doc_" + circular_doc_id + "' " + disabled + "><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                            var download_circular_doc = "<a href='<?php echo base_url(); ?>master/plans_policy/download_doc/3/" + data["userdata"].plans_policy_id + "/" + circular_doc_id + "' class='btn btn-outline-primary waves-effect width-md waves-light btn-sm delete' id='vdownload_circular_doc_" + circular_doc_id + "' " + disabled + "><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        }
                        circular_doc_btn = delete_circular_doc + " " + view_circular_doc + "  " + download_circular_doc;

                        append_circular_doc += '<tr id="circular_doc_strike_' + circular_doc_id + '"><td scope="row"><span id="view_circular_doc_count_' + circular_doc_id + '">' + count + '</span></td><td><span id="view_circular_doc_date_' + circular_doc_id + '">' + circular_doc_date + '</span></td><td ><span id="view_circular_doc_name_' + circular_doc_id + '">' + circular_doc_name + '</span></td><td>' + circular_doc_btn + '</td></tr>';
                        count++;
                    });
                    // alert(append_circular_doc);
                    $("#append_view_circular_doc").append(append_circular_doc);
                    $.each(circular_doc_list_data_arr, function(key, val) {
                        var circular_doc_id = circular_doc_list_data_arr[key].circular_doc_id;
                        var circular_doc_del_flag = circular_doc_list_data_arr[key].circular_doc_del_flag;
                        if (circular_doc_del_flag == 0) {
                            $("#view_circular_doc_count_" + circular_doc_id).wrap("<strike>");
                            $("#view_circular_doc_date_" + circular_doc_id).wrap("<strike>");
                            $("#view_circular_doc_name_" + circular_doc_id).wrap("<strike>");

                            $("#vview_circular_doc_" + circular_doc_id).hide();
                            $("#vdownload_circular_doc_" + circular_doc_id).hide();
                        } else {
                            $("#vview_circular_doc_" + circular_doc_id).show();
                            $("#vdownload_circular_doc_" + circular_doc_id).show();
                        }
                    });
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function updateStatus(plans_policy_id, plans_policy_status) {

        var url = "<?php echo $base_url; ?>master/plans_policy/update_plans_policy_status";

        if (plans_policy_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": plans_policy_id,
                    "status": plans_policy_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + plans_policy_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["plans_policy_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                            $("#edit_" + plans_policy_id).addClass(status_btn_txt);
                            $("#status_btn_" + plans_policy_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                            $("#edit_" + plans_policy_id).addClass(status_btn_txt);
                            $("#status_btn_" + plans_policy_id).text(status);
                        }

                        $("#status_btn_" + plans_policy_id).text(status);


                        $('#status_btn_' + plans_policy_id).attr('onClick', 'updateStatus(' + plans_policy_id + ',' + data["userdata"]["plans_policy_status"] + ')');

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
        var date = new Date();

        var day = ("0" + date.getDate()).slice(-2);
        var month = ("0" + (date.getMonth() + 1)).slice(-2);

        var today = date.getFullYear() + "-" + (month) + "-" + (day);
        $('#circular_date').val(today);
    });
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
                CheckFormAccess(submenu_permission, 9, url);
                check(role_permission, 9);
            }
        }
    });
</script>