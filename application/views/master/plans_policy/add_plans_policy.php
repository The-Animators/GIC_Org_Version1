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
                                    <h4 class="page-title"><?php if($method=="edit"): echo "Edit "; else: echo "Add "; endif; ?> <?php echo $title; ?></h4>
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
                                            <h4 class="header-title"><?php if($method=="edit"): echo "Edit "; else: echo "Add "; endif; ?> <?php echo $title; ?></h4>
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4 text-right">
                                            <a href="<?php echo base_url(); ?>master/plans_policy/" class="btn btn-secondary waves-effect width-md btn-sm mb-1">Back</a>
                                        </div>
                                    </div>

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
                                                            <input type="file" name="policy_wording" id="policy_wording" class="form-control  filestyle" data-input="false" id="filestyle-1" tabindex="-1">
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
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="claims_form" class="col-form-label col-md-4 text-right">Claims Form<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="file" name="claims_form" id="claims_form" class="form-control filestyle" data-input="false" id="filestyle-1" tabindex="-1">
                                                            <span id="claims_form_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="claims_procedure" class="col-form-label col-md-4 text-right">Policy Wording<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
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
                                                <div class="col-md-8 m-b-1">
                                                    <button type="button" class="btn btn-success waves-effect waves-light btn-sm" id="add_circular" onclick="Circular_add()">Add Extra Documents</button>
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
                                                            <input type="file" name="proposal_upload" id="proposal_upload" class="form-control filestyle proposal_upload" data-input="false" id="filestyle-1" tabindex="-1" onchange="check_proposal_upload()">
                                                            <span id="proposal_upload_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="proposal_doc_reason" class="col-form-label col-md-4 text-right">Proposal Remark</label>
                                                        <div class="col-md-8">
                                                            <textarea rows="3" name="proposal_doc_reason" id="proposal_doc_reason" value="" placeholder="Enter Proposal  Remark" class="form-control proposal_doc_reason"></textarea>
                                                            <span id="proposal_doc_reason_err"></span>
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
                                                        <label for="claim_upload" class="col-form-label col-md-4 text-right">Claim Upload<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="file" name="claim_upload" id="claim_upload" class="form-control filestyle claim_upload" data-input="false" id="filestyle-1" tabindex="-1" onchange="check_claim_upload()">
                                                            <span id="claim_upload_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="claim_doc_reason" class="col-form-label col-md-4 text-right">Claim Remark</label>
                                                        <div class="col-md-8">
                                                            <textarea rows="3" name="claim_doc_reason" id="claim_doc_reason" value="" placeholder="Enter Claim Remark" class="form-control claim_doc_reason"></textarea>
                                                            <span id="claim_doc_reason_err"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="other_date" class="col-form-label col-md-4 text-right">Other Date<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="date" name="other_date" id="other_date" value="" placeholder="Enter Other Date" class="form-control other_date">
                                                            <span id="other_date_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="other_upload" class="col-form-label col-md-4 text-right">Other Upload<span class="text-danger">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="file" name="other_upload" id="other_upload" class="form-control filestyle other_upload" data-input="false" id="filestyle-1" tabindex="-1" onchange="check_other_upload()">
                                                            <span id="other_upload_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="other_doc_reason" class="col-form-label col-md-4 text-right">Other Remark</label>
                                                        <div class="col-md-8">
                                                            <textarea rows="3" name="other_doc_reason" id="other_doc_reason" value="" placeholder="Enter Other Remark" class="form-control other_doc_reason"></textarea>
                                                            <span id="other_doc_reason_err"></span>
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
                                                            <input type="file" name="brochure_upload" id="brochure_upload" class="form-control filestyle brochure_upload" data-input="false" id="filestyle-1" tabindex="-1" onchange="check_brochure_upload()">
                                                            <span id="brochure_upload_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="brochure_doc_reason" class="col-form-label col-md-4 text-right">Brochure Remark</label>
                                                        <div class="col-md-8">
                                                            <textarea rows="3" name="brochure_doc_reason" id="brochure_doc_reason" value="" placeholder="Enter Brochure Remark" class="form-control brochure_doc_reason"></textarea>
                                                            <span id="brochure_doc_reason_err"></span>
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
                                                            <input type="file" name="one_pager_upload" id="one_pager_upload" class="form-control filestyle one_pager_upload" data-input="false" id="filestyle-1" tabindex="-1" onchange="check_one_pager_upload()">
                                                            <span id="one_pager_upload_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="one_pager_doc_reason" class="col-form-label col-md-4 text-right">One Pager Remark</label>
                                                        <div class="col-md-8">
                                                            <textarea rows="3" name="one_pager_doc_reason" id="one_pager_doc_reason" value="" placeholder="Enter one_pager Remark" class="form-control one_pager_doc_reason"></textarea>
                                                            <span id="one_pager_doc_reason_err"></span>
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
                $('#policy_wording').on('click', function() {
                    document.getElementById("update").disabled = false;
                });
                $('#document_list').on('change', function() {
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

                function OnRecover() {
                    var plans_policy_id = $("#plans_policy_id").text();
                    var url = "<?php echo $base_url; ?>master/plans_policy/recover_plans_policy";
                    confirmation_alert(id = plans_policy_id, url = url, title = "Plans & Policy", type = "Recover");
                }

                function OnDelete() {
                    var plans_policy_id = $("#plans_policy_id").text();
                    var url = "<?php echo $base_url; ?>master/plans_policy/remove_plans_policy";
                    confirmation_alert(id = plans_policy_id, url = url, title = "Plans & Policy", type = "Delet");
                }
                <?php if($method=="edit"): ?>
                    var val = '<?php echo $plans_policy_id; ?>';
                    onEdit(val);
                <?php endif; ?>
                function onEdit(val) {
                    clearError();
                    // alert(val);
                    $("#plans_policy_id").text(val);
                    $("#update").show();
                    $("#delete").show();
                    $("#submit").hide();
                    var url = "<?php echo $base_url; ?>master/plans_policy/edit_plans_policy";
                    if (url != "") {
                        $.ajax({
                            url: url,
                            data: {
                                plans_policy_id: val,
                            },
                            type: 'POST',
                            dataType: 'json',
                            async: false,
                            cache: false,
                            beforeSend: function() {

                            },

                            success: function(data) {
                                // var myObj = JSON.parse(data);
                                // console.log(data);
                                $("#plans_policy_id").text(data["userdata"].plans_policy_id);
                                // $("#policy_wording").val(data["userdata"].policy_wording);
                                // $("#claims_form").val(data["userdata"].claims_form);
                                $("#claims_procedure").val(data["userdata"].claims_procedure);
                                $("#comission_percentage").val(data["userdata"].comission_percentage);

                                var company = data["userdata"].fk_mcompany_id;
                                var department = data["userdata"].fk_department_id;
                                var policy_name = data["userdata"].fk_policy_type_id;
                                var policy_type = data["userdata"].policy_type;
                                var document_list = data["userdata"].fk_document_id;

                                // alert(company);

                                $('select[id^="company"] option[value="' + company + '"]').attr("selected", "selected");
                                $('select[id^="department"] option[value="' + department + '"]').attr("selected", "selected");
                                $('select[id^="policy_name"] option[value="' + policy_name + '"]').attr("selected", "selected");
                                $('select[id^="policy_type"] option[value="' + policy_type + '"]').attr("selected", "selected");
                                if (document_list != "")
                                    var selectedOptions = document_list.split(",");
                                else
                                    var selectedOptions = "";
                                $('#document_list').val(selectedOptions);
                                // var checkboxes = document.getElementsByClassName("document_list");
                                // $('#document_list').selectpicker("val", selectedOptions);

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
                    // alert(plans_policy_id);
                    var company = $("#company").val();
                    var department = $("#department").val();
                    var policy_name = $("#policy_name").val();
                    var policy_type = $("#policy_type").val();
                    var policy_wording = $('#policy_wording').prop('files')[0];
                    var claims_form = $('#claims_form').prop('files')[0];
                    var document_list = $("#document_list").val();

                    var claims_procedure = $("#claims_procedure").val();
                    var comission_percentage = $("#comission_percentage").val();

                    var circular_date = $("#circular_date").val();
                    var circular_doc_reason = $("#circular_doc_reason").val();
                    var circular_upload = $('#circular_upload').prop('files')[0];

                    if (circular_date == "undefined" || circular_date == undefined || circular_date == "" || circular_date == "null") {
                        circular_date = "";
                    }
                    if (circular_upload == "undefined" || circular_upload == undefined || circular_upload == "" || circular_upload == "null") {
                        circular_upload = "";
                    }

                    var proposal_date = $("#proposal_date").val();
                    var proposal_doc_reason = $("#proposal_doc_reason").val();
                    var proposal_upload = $('#proposal_upload').prop('files')[0];

                    if (proposal_date == "undefined" || proposal_date == undefined || proposal_date == "" || proposal_date == "null") {
                        proposal_date = "";
                    }
                    if (proposal_upload == "undefined" || proposal_upload == undefined || proposal_upload == "" || proposal_upload == "null") {
                        proposal_upload = "";
                    }

                    var claim_date = $("#claim_date").val();
                    var claim_doc_reason = $("#claim_doc_reason").val();
                    var claim_upload = $('#claim_upload').prop('files')[0];

                    if (claim_date == "undefined" || claim_date == undefined || claim_date == "" || claim_date == "null") {
                        claim_date = "";
                    }
                    if (claim_upload == "undefined" || claim_upload == undefined || claim_upload == "" || claim_upload == "null") {
                        claim_upload = "";
                    }

                    var other_date = $("#other_date").val();
                    var other_doc_reason = $("#other_doc_reason").val();
                    var other_upload = $('#other_upload').prop('files')[0];

                    if (other_date == "undefined" || other_date == undefined || other_date == "" || other_date == "null") {
                        other_date = "";
                    }
                    if (other_upload == "undefined" || other_upload == undefined || other_upload == "" || other_upload == "null") {
                        other_upload = "";
                    }

                    var brochure_date = $("#brochure_date").val();
                    var brochure_doc_reason = $("#brochure_doc_reason").val();
                    var brochure_upload = $('#brochure_upload').prop('files')[0];

                    if (brochure_date == "undefined" || brochure_date == undefined || brochure_date == "" || brochure_date == "null") {
                        brochure_date = "";
                    }
                    if (brochure_upload == "undefined" || brochure_upload == undefined || brochure_upload == "" || brochure_upload == "null") {
                        brochure_upload = "";
                    }

                    var one_pager_date = $("#one_pager_date").val();
                    var one_pager_doc_reason = $("#one_pager_doc_reason").val();
                    var one_pager_upload = $('#one_pager_upload').prop('files')[0];

                    if (one_pager_date == "undefined" || one_pager_date == undefined || one_pager_date == "" || one_pager_date == "null") {
                        one_pager_date = "";
                    }
                    if (one_pager_upload == "undefined" || one_pager_upload == undefined || one_pager_upload == "" || one_pager_upload == "null") {
                        one_pager_upload = "";
                    }


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
                    form_data.append('policy_type', policy_type);
                    form_data.append('policy_wording', policy_wording);
                    form_data.append('document_list', document_list);
                    form_data.append('claims_form', claims_form);
                    form_data.append('claims_procedure', claims_procedure);
                    form_data.append('comission_percentage', comission_percentage);

                    form_data.append('circular_date', circular_date);
                    form_data.append('circular_upload', circular_upload);
                    form_data.append('circular_doc_reason', circular_doc_reason);

                    form_data.append('proposal_date', proposal_date);
                    form_data.append('proposal_upload', proposal_upload);
                    form_data.append('proposal_doc_reason', proposal_doc_reason);

                    form_data.append('claim_date', claim_date);
                    form_data.append('claim_upload', claim_upload);
                    form_data.append('claim_doc_reason', claim_doc_reason);

                    form_data.append('other_date', other_date);
                    form_data.append('other_upload', other_upload);
                    form_data.append('other_doc_reason', other_doc_reason);

                    form_data.append('brochure_date', brochure_date);
                    form_data.append('brochure_upload', brochure_upload);
                    form_data.append('brochure_doc_reason', brochure_doc_reason);

                    form_data.append('one_pager_date', one_pager_date);
                    form_data.append('one_pager_upload', one_pager_upload);
                    form_data.append('one_pager_doc_reason', one_pager_doc_reason);

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

                                // setTimeout(function() {
                                //     location.reload();
                                // }, 1000);

                                setTimeout(function() {
                                    // location.reload();
                                    document.location.href = "<?php echo base_url(); ?>master/plans_policy";
                                }, 1000);
                            } else {
                                if (data["messages"] != "") {
                                    if (data["messages"]["policy_wording_err"] != "")
                                        toaster(message_type = "Error", message_txt = data["messages"]["policy_wording_err"], message_icone = "error");
                                    if (data["messages"]["claims_form_err"] != "")
                                        toaster(message_type = "Error", message_txt = data["messages"]["claims_form_err"], message_icone = "error");

                                    if (data["messages"]["circular_upload_err"] != "")
                                        toaster(message_type = "Error", message_txt = data["messages"]["circular_upload_err"], message_icone = "error");

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

                                    if (data["messages"]["circular_upload_err"] != "")
                                        $("#circular_upload").addClass("parsley-error");
                                    else
                                        $("#circular_upload").removeClass("parsley-error");
                                    $("#circular_upload_err").addClass("text-danger").html(data["messages"]["circular_upload_err"]);

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

                                    if (data["messages"]["other_upload_err"] != "")
                                        $("#other_upload").addClass("parsley-error");
                                    else
                                        $("#other_upload").removeClass("parsley-error");
                                    $("#other_upload_err").addClass("text-danger").html(data["messages"]["other_upload_err"]);

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
                                    $("#document_list_err").addClass("text-danger").html(data["message"]["document_liste_err"]);

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


                                    if (data["message"]["circular_upload_err"] != "")
                                        $("#circular_upload").addClass("parsley-error");
                                    else
                                        $("#circular_upload").removeClass("parsley-error");
                                    $("#circular_upload_err").addClass("text-danger").html(data["message"]["circular_upload_err"]);

                                    if (data["message"]["proposal_upload_err"] != "")
                                        $("#proposal_upload").addClass("parsley-error");
                                    else
                                        $("#proposal_upload").removeClass("parsley-error");
                                    $("#proposal_upload_err").addClass("text-danger").html(data["message"]["proposal_upload_err"]);

                                    if (data["message"]["claim_upload_err"] != "")
                                        $("#claim_upload").addClass("parsley-error");
                                    else
                                        $("#claim_upload").removeClass("parsley-error");
                                    $("#claim_upload_err").addClass("text-danger").html(data["message"]["claim_upload_err"]);

                                    if (data["message"]["other_upload_err"] != "")
                                        $("#other_upload").addClass("parsley-error");
                                    else
                                        $("#other_upload").removeClass("parsley-error");
                                    $("#other_upload_err").addClass("text-danger").html(data["message"]["other_upload_err"]);

                                    if (data["message"]["brochure_upload_err"] != "")
                                        $("#brochure_upload").addClass("parsley-error");
                                    else
                                        $("#brochure_upload").removeClass("parsley-error");
                                    $("#brochure_upload_err").addClass("text-danger").html(data["message"]["brochure_upload_err"]);

                                    if (data["message"]["one_pager_upload_err"] != "")
                                        $("#one_pager_upload").addClass("parsley-error");
                                    else
                                        $("#one_pager_upload").removeClass("parsley-error");
                                    $("#one_pager_upload_err").addClass("text-danger").html(data["message"]["one_pager_upload_err"]);

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

                    var company_name_txt = $("#company option:selected").text();
                    var department_name_txt = $("#department option:selected").text();
                    var policy_name_txt = $("#policy_name option:selected").text();

                    var policy_type = $("#policy_type").val();
                    var policy_wording = $('#policy_wording').prop('files')[0];
                    var claims_form = $('#claims_form').prop('files')[0];

                    var document_list = $("#document_list").val();

                    var claims_procedure = $("#claims_procedure").val();
                    var comission_percentage = $("#comission_percentage").val();

                    var circular_date = $("#circular_date").val();
                    var circular_doc_reason = $("#circular_doc_reason").val();
                    var circular_upload = $('#circular_upload').prop('files')[0];

                    if (circular_date == "undefined" || circular_date == undefined || circular_date == "" || circular_date == "null") {
                        circular_date = "";
                    }
                    if (circular_upload == "undefined" || circular_upload == undefined || circular_upload == "" || circular_upload == "null") {
                        circular_upload = "";
                    }

                    var proposal_date = $("#proposal_date").val();
                    var proposal_doc_reason = $("#proposal_doc_reason").val();
                    var proposal_upload = $('#proposal_upload').prop('files')[0];

                    if (proposal_date == "undefined" || proposal_date == undefined || proposal_date == "" || proposal_date == "null") {
                        proposal_date = "";
                    }
                    if (proposal_upload == "undefined" || proposal_upload == undefined || proposal_upload == "" || proposal_upload == "null") {
                        proposal_upload = "";
                    }

                    var claim_date = $("#claim_date").val();
                    var claim_doc_reason = $("#claim_doc_reason").val();
                    var claim_upload = $('#claim_upload').prop('files')[0];

                    if (claim_date == "undefined" || claim_date == undefined || claim_date == "" || claim_date == "null") {
                        claim_date = "";
                    }
                    if (claim_upload == "undefined" || claim_upload == undefined || claim_upload == "" || claim_upload == "null") {
                        claim_upload = "";
                    }

                    var other_date = $("#other_date").val();
                    var other_doc_reason = $("#other_doc_reason").val();
                    var other_upload = $('#other_upload').prop('files')[0];

                    if (other_date == "undefined" || other_date == undefined || other_date == "" || other_date == "null") {
                        other_date = "";
                    }
                    if (other_upload == "undefined" || other_upload == undefined || other_upload == "" || other_upload == "null") {
                        other_upload = "";
                    }

                    var brochure_date = $("#brochure_date").val();
                    var brochure_doc_reason = $("#brochure_doc_reason").val();
                    var brochure_upload = $('#brochure_upload').prop('files')[0];

                    if (brochure_date == "undefined" || brochure_date == undefined || brochure_date == "" || brochure_date == "null") {
                        brochure_date = "";
                    }
                    if (brochure_upload == "undefined" || brochure_upload == undefined || brochure_upload == "" || brochure_upload == "null") {
                        brochure_upload = "";
                    }

                    var one_pager_date = $("#one_pager_date").val();
                    var one_pager_doc_reason = $("#one_pager_doc_reason").val();
                    var one_pager_upload = $('#one_pager_upload').prop('files')[0];

                    if (one_pager_date == "undefined" || one_pager_date == undefined || one_pager_date == "" || one_pager_date == "null") {
                        one_pager_date = "";
                    }
                    if (one_pager_upload == "undefined" || one_pager_upload == undefined || one_pager_upload == "" || one_pager_upload == "null") {
                        one_pager_upload = "";
                    }

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

                    form_data.append('company_name_txt', company_name_txt);
                    form_data.append('department_name_txt', department_name_txt);
                    form_data.append('policy_name_txt', policy_name_txt);

                    form_data.append('policy_type', policy_type);
                    form_data.append('policy_wording', policy_wording);
                    form_data.append('document_list', document_list);
                    form_data.append('claims_form', claims_form);
                    form_data.append('claims_procedure', claims_procedure);
                    form_data.append('comission_percentage', comission_percentage);

                    form_data.append('circular_date', circular_date);
                    form_data.append('circular_upload', circular_upload);
                    form_data.append('circular_doc_reason', circular_doc_reason);

                    form_data.append('proposal_date', proposal_date);
                    form_data.append('proposal_upload', proposal_upload);
                    form_data.append('proposal_doc_reason', proposal_doc_reason);

                    form_data.append('claim_date', claim_date);
                    form_data.append('claim_upload', claim_upload);
                    form_data.append('claim_doc_reason', claim_doc_reason);

                    form_data.append('other_date', other_date);
                    form_data.append('other_upload', other_upload);
                    form_data.append('other_doc_reason', other_doc_reason);

                    form_data.append('brochure_date', brochure_date);
                    form_data.append('brochure_upload', brochure_upload);
                    form_data.append('brochure_doc_reason', brochure_doc_reason);

                    form_data.append('one_pager_date', one_pager_date);
                    form_data.append('one_pager_upload', one_pager_upload);
                    form_data.append('one_pager_doc_reason', one_pager_doc_reason);

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
                                    // location.reload();
                                    document.location.href = "<?php echo base_url(); ?>master/plans_policy";
                                }, 1000);
                            } else {
                                if (data["messages"] != "") {
                                    if (data["messages"]["policy_wording_err"] != "")
                                        toaster(message_type = "Error", message_txt = data["messages"]["policy_wording_err"], message_icone = "error");
                                    if (data["messages"]["claims_form_err"] != "")
                                        toaster(message_type = "Error", message_txt = data["messages"]["claims_form_err"], message_icone = "error");

                                    if (data["messages"]["circular_upload_err"] != "")
                                        toaster(message_type = "Error", message_txt = data["messages"]["circular_upload_err"], message_icone = "error");

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

                                    if (data["messages"]["circular_upload_err"] != "")
                                        $("#circular_upload").addClass("parsley-error");
                                    else
                                        $("#circular_upload").removeClass("parsley-error");
                                    $("#circular_upload_err").addClass("text-danger").html(data["messages"]["circular_upload_err"]);

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

                                    if (data["messages"]["other_upload_err"] != "")
                                        $("#other_upload").addClass("parsley-error");
                                    else
                                        $("#other_upload").removeClass("parsley-error");
                                    $("#other_upload_err").addClass("text-danger").html(data["messages"]["other_upload_err"]);

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
                                    $("#document_list_err").addClass("text-danger").html(data["message"]["document_liste_err"]);

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


                                    if (data["message"]["circular_upload_err"] != "")
                                        $("#circular_upload").addClass("parsley-error");
                                    else
                                        $("#circular_upload").removeClass("parsley-error");
                                    $("#circular_upload_err").addClass("text-danger").html(data["message"]["circular_upload_err"]);

                                    if (data["message"]["proposal_upload_err"] != "")
                                        $("#proposal_upload").addClass("parsley-error");
                                    else
                                        $("#proposal_upload").removeClass("parsley-error");
                                    $("#proposal_upload_err").addClass("text-danger").html(data["message"]["proposal_upload_err"]);

                                    if (data["message"]["claim_upload_err"] != "")
                                        $("#claim_upload").addClass("parsley-error");
                                    else
                                        $("#claim_upload").removeClass("parsley-error");
                                    $("#claim_upload_err").addClass("text-danger").html(data["message"]["claim_upload_err"]);

                                    if (data["message"]["other_upload_err"] != "")
                                        $("#other_upload").addClass("parsley-error");
                                    else
                                        $("#other_upload").removeClass("parsley-error");
                                    $("#other_upload_err").addClass("text-danger").html(data["message"]["other_upload_err"]);

                                    if (data["message"]["brochure_upload_err"] != "")
                                        $("#brochure_upload").addClass("parsley-error");
                                    else
                                        $("#brochure_upload").removeClass("parsley-error");
                                    $("#brochure_upload_err").addClass("text-danger").html(data["message"]["brochure_upload_err"]);

                                    if (data["message"]["one_pager_upload_err"] != "")
                                        $("#one_pager_upload").addClass("parsley-error");
                                    else
                                        $("#one_pager_upload").removeClass("parsley-error");
                                    $("#one_pager_upload_err").addClass("text-danger").html(data["message"]["one_pager_upload_err"]);

                                }
                            }

                        },
                        error: function(request, status, error) {
                            alert(request.responseText);
                        }
                    });
                });

                getPlansPolicyList();

                function getPlansPolicyList() {
                    $("#tableData").empty();
                    var url = "<?php echo $base_url; ?>master/plans_policy/get_plans_policy_list";
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
                                    var view_btn = "";
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
                                    var total_policy = data["total_policy"];
                                    $.each(data, function(key, val) {

                                        plans_policy_id = parseInt(data[key].plans_policy_id);
                                        company_id = data[key].fk_mcompany_id;
                                        company = data[key].company_name;
                                        department = data[key].department_name;
                                        policy_name = data[key].policy_type_title;
                                        policy_type = data[key].policy_type;
                                        policy_wording = data[key].policy_wording;
                                        document_list = data[key].document_name;
                                        claims_form = data[key].claims_form;
                                        claims_procedure = data[key].claims_procedure;
                                        comission_percentage = data[key].comission_percentage;
                                        plans_policy_status = data[key].plans_policy_status;
                                        var total_policy = data[key].total_policy;

                                        var isActive = data[key].del_flag;
                                        if (!isNaN(plans_policy_id)) {
                                            if (plans_policy_status == 1) {
                                                status = "Active";
                                                var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light  btn-sm edit";
                                            } else {
                                                status = "In-Active";
                                                var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light  btn-sm edit";
                                            }

                                            if (isActive == 1)
                                                var del_status = "No";
                                            else
                                                var del_status = "Yes";

                                            // edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm' id='edit_btn' value='' type='button' onClick ='onEdit(" + plans_policy_id + ")' >Edit</button>";
                                            view_btn = "<a href='<?php echo base_url(); ?>master/plans_policy/view/" + company_id + "' class='btn btn-info waves-effect width-md waves-light btn-sm view'  id='view'>View</a>";
                                            status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + plans_policy_id + "' value='' type='button' onClick ='updateStatus(" + plans_policy_id + "," + plans_policy_status + ")' >" + status + "</button>";

                                            datas += '<tr><td>' + view_btn + '</td> <td>' + company + '</td><td>' + total_policy + '</td></tr>';
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
                    $('#proposal_date').val(today);
                    $('#claim_date').val(today);
                    $('#other_date').val(today);
                    $('#brochure_date').val(today);
                    $('#one_pager_date').val(today);
                });

                function Circular_add() {
                    $("#add_circular").hide();
                    $("#circular_detail_div").show();
                }

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