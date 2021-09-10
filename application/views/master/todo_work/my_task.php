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
            <div id="form_modal" class="modal fade bs-example-modal-lg bs-example-modal-center" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
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
                                            <button type="button" class="btn btn-success waves-effect waves-light btn-xs" id="add_circular" onclick="Circular_add()">Add Circular</button>
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
                                            <label id="task_id" hidden>1</label>
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
                                <div class="col-md-4">
                                    <div class="form-row">
                                        <label for="filter_task_type" class="col-form-label col-md-4 text-right">Task Type</label>
                                        <div class="col-md-8">
                                            <select name="filter_task_type" id="filter_task_type" class="form-control filter_task_type" onchange="TaskType()">
                                                <option value="null">Select Status</option>
                                                <option value="Manual">Manual</option>
                                                <option value="System Task">System Task</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-row">
                                        <label for="filter_task_title" class="col-form-label col-md-4 text-right">Task Title</label>
                                        <div class="col-md-8" id="task_title_div">
                                            <input type="text" class="form-control" id="filter_task_title" name="filter_task_title" placeholder="Enter Task Title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-row">
                                        <label for="filter_staff" class="col-form-label col-md-4 text-right">Staff</label>
                                        <div class="col-md-8">
                                            <select name="filter_staff" id="filter_staff" class="selectpicker" multiple data-selected-text-format="count" data-style="btn-secondary">
                                                <option value="null">Select Staff</option>
                                                <?php $staff_det = staff_dropdown();
                                                if (!empty($staff_det)) : foreach ($staff_det as $row) : ?>
                                                        <option value="<?php echo $row["staff_id"]; ?>"><?php echo $row["staff_name"]; ?></option>
                                                <?php endforeach;
                                                endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mt-1">
                                    <div class="form-row">
                                        <label for="filter_task_desc" class="col-form-label col-md-4 text-right">Task Description</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="filter_task_desc" name="filter_task_desc" placeholder="Enter Task Description">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-1">
                                    <div class="form-row">
                                        <label for="filter_priority" class="col-form-label col-md-4 text-right">Priority</label>
                                        <div class="col-md-8">
                                            <select name="filter_priority" id="filter_priority" class="form-control filter_priority">
                                                <option value="null">Select Priority</option>
                                                <option value="Simple">Simple</option>
                                                <option value="Low">Low</option>
                                                <option value="Moderate">Moderate</option>
                                                <option value="High">High</option>
                                                <option value="Very High">Very High</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-1">
                                    <div class="form-row">
                                        <label for="filter_task_status" class="col-form-label col-md-4 text-right">Task Status</label>
                                        <div class="col-md-8">
                                            <select name="filter_task_status" id="filter_task_status" class="form-control filter_task_status">
                                                <option value="null">Select Task Status</option>
                                                <option value="New">New</option>
                                                <option value="Under process">Under process</option>
                                                <option value="FollowUp">FollowUp</option>
                                                <option value="On Hold">On Hold</option>
                                                <option value="Completed">Completed</option>
                                                <option value="CLOSED">Closed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="filter_start_date" class="col-form-label col-md-4 text-right">Start Date</label>
                                        <div class="col-md-8">
                                            <input type="text" name="filter_start_date" id="filter_start_date" class="form-control filter_start_date" placeholder="Enter Start Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="filter_end_date" class="col-form-label col-md-4 text-right">End Date</label>
                                        <div class="col-md-8">
                                            <input type="text" name="filter_end_date" id="filter_end_date" class="form-control filter_end_date" placeholder="Enter End Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-1">
                                    <div class="form-row">
                                        <label for="filter_status" class="col-form-label col-md-4 text-right">Status</label>
                                        <div class="col-md-8">
                                            <select name="filter_status" id="filter_status" class="form-control">
                                                <option value="null">Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="2">In-Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-1 ml-1">
                                    <center><button type="submit" id="search" class="btn btn-outline-secondary waves-effect btn-xs mr-2" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="reset" class="btn btn-outline-secondary waves-effect btn-xs" onclick="Reset_data()"><b><i class="mdi mdi-undo"></i>Reset</b></button></center>
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
                            <div class="col-md-4">
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_task"></span></h4>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4 text-right">
                                <a href="<?php echo base_url(); ?>master/task_work/assign" class="btn btn-facebook btn-xs" id='AddForm'>Add</a>
                                <button type="submit" id="filter_btn" class="btn btn-outline-secondary waves-effect btn-xs"><b><i class="mdi mdi-magnify"></i>&nbsp;Filter Off</b></button>
                                <!-- <button onclick="playSound('https://your-file.mp3');">Play</button>   -->
                            </div>

                        </div>

                        <!-- <table id="datatable" class="table  table-striped table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> -->
                        <div class="table-cont">
                            <table class="commission_table fixed" id="commission_table" border="1">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>SN.</th>
                                        <th>
                                            <center>Task Type</center>
                                        </th>
                                        <th>Task Title</th>
                                        <th>Staff</th>
                                        <th>Task Description</th>
                                        <th>Priority</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Task Status</th>
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
    function TaskType() {
        $("#task_title_div").empty();
        var task_type = $("#filter_task_type").val();
        $("#task_title_div").append('<input type="text" class="form-control" id="filter_task_title" name="filter_task_title" placeholder="Enter Task Title">');
        if (task_type == "System Task") {
            $("#task_title_div").empty();
            $("#task_title_div").append('<select name="filter_task_title" id="filter_task_title" class="form-control filter_task_title" ><option value="null">Select Task Title</option><?php $task_title_list = task_title_dropdown(); if (!empty($task_title_list)) : foreach ($task_title_list as $row) : ?><option value="<?php echo $row["task_title"]; ?>"><?php echo $row["task_title"]; ?></option><?php endforeach;    endif; ?></select>');
        } else if (task_type == "Manual") {
            $("#task_title_div").empty();
            $("#task_title_div").append('<input type="text" class="form-control" id="filter_task_title" name="filter_task_title" placeholder="Enter Task Title">');
        }
    }
    $(function() {
        $("#filter_start_date").datepicker({
            'format': 'dd-mm-yyyy',
            'autoclose': true,
            'todayHighlight': true
        });
        $("#filter_end_date").datepicker({
            'format': 'dd-mm-yyyy',
            'autoclose': true,
            'todayHighlight': true
        });
    });
    $("#filter_btn").click(function() {
        $('#filter_form_modal').modal('toggle');
    });
    $("#view").click(function() {
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
    });

    function clearError() {
        $("#task_type").removeClass("parsley-error");
        $("#task_type_err").removeClass("text-danger").text("");

        $("#task_title").removeClass("parsley-error");
        $("#task_title_err").removeClass("text-danger").text("");

        $("#task_desc").removeClass("parsley-error");
        $("#task_desc_err").removeClass("text-danger").text("");

        $("#staff").removeClass("parsley-error");
        $("#staff_err").removeClass("text-danger").text("");

        $("#priority").removeClass("parsley-error");
        $("#priority_err").removeClass("text-danger").text("");

        $("#start_date").removeClass("parsley-error");
        $("#start_date_err").removeClass("text-danger").text("");

        $("#end_date").removeClass("parsley-error");
        $("#end_date_err").removeClass("text-danger").text("");

        $("#status").removeClass("parsley-error");
        $("#status_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#task_id").text("");
        $("#task_type").val("null");
        $("#task_title").val("null");
        $("#task_desc").val("null");
        $("#staff").val("");
        $("#priority").val("");
        $("#start_date").val("null");
        $("#end_date").val("");
        $("#status").val("");

        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function OnRecover(task_id) {
        var url = "<?php echo $base_url; ?>master/task_work/recover_assign_task";
        confirmation_alert(id = task_id, url = url, title = "Task", type = "Recover");
    }

    function OnDelete(task_id) {
        var url = "<?php echo $base_url; ?>master/task_work/remove_assign_task";
        confirmation_alert(id = task_id, url = url, title = "Task", type = "Delet");
    }

    function onEdit(val) {
        clearError();
        // alert(val);
        $("#task_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();
        var url = "<?php echo $base_url; ?>master/task_work/edit_assign_task";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    task_id: val,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    var task_id = data["userdata"].task_id;
                    var task_type = data["userdata"].task_type;
                    var task_title = data["userdata"].task_title;
                    var task_desc = data["userdata"].task_desc;
                    var staff = data["userdata"].fk_staff_id;
                    var priority = data["userdata"].priority;
                    var start_date = data["userdata"].start_date;
                    var end_date = data["userdata"].end_date;
                    var status = data["userdata"].status;

                    var task_type_flag = false;

                    if (task_type == "Manual") {
                        task_type_flag = true;
                        var task_type_id = "task_type_manual";
                    } else if (task_type == "System Task") {
                        task_type_flag = true;
                        var task_type_id = "task_type_system_task";
                    }
                    if (staff != "")
                        var selectedOptions = staff.split(",");
                    else
                        var selectedOptions = "";
                    $("#task_id").text(data["userdata"].task_id);
                    $("#" + task_type_id).prop('checked', task_type_flag);
                    $("#task_title").val(task_title);
                    $("#task_desc").val(task_desc);
                    $("#staff").val(selectedOptions);
                    $("#priority").val(priority);
                    $("#start_date").val(start_date);
                    $("#end_date").val(end_date);
                    $("#status").val(status);

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

    function Filter_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter On');
        $('#filter_form_modal').modal('toggle');

        var filter_task_type = $("#filter_task_type").val();
        var filter_task_title = $("#filter_task_title").val();
        var filter_staff = $("#filter_staff").val();
        var filter_task_desc = $("#filter_task_desc").val();
        var filter_priority = $("#filter_priority").val();
        var filter_task_status = $("#filter_task_status").val();
        var filter_start_date = $("#filter_start_date").val();
        var filter_end_date = $("#filter_end_date").val();
        var filter_status = $("#filter_status").val();

        if (filter_task_type == "null")
            filter_task_type = "";
        if (filter_task_title == "null")
            filter_task_title = "";
        if (filter_staff == "null")
            filter_staff = "";
        if (filter_priority == "null")
            filter_priority = "";
        if (filter_task_status == "null")
            filter_task_status = "";
        if (filter_status == "null")
            filter_status = "";
        var url = "<?php echo $base_url; ?>master/task_work/filter_assign_task_list";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_task_type: filter_task_type,
                    filter_task_title: filter_task_title,
                    filter_staff: filter_staff,
                    filter_task_desc: filter_task_desc,
                    filter_priority: filter_priority,
                    filter_task_status: filter_task_status,
                    filter_start_date: filter_start_date,
                    filter_end_date: filter_end_date,
                    filter_status: filter_status,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var total_task = 0;
                    $("#total_task").text("");
                    var total_task = 0;
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var datas = "";
                        total_task = data["total_task"];
                        var data = data["userdata"];
                        $("#total_task").text(" Count ( " + total_task + " ) ");
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            var task_id = data[key].task_id;
                            var task_type = data[key].task_type;
                            var task_title = data[key].task_title;
                            var task_desc = data[key].task_desc;
                            var staff = data[key].fk_staff_id;
                            var staff_name_str_arr = data[key].staff_name_str_arr;
                            var priority = data[key].priority;
                            var start_date = data[key].start_date;
                            var end_date = data[key].end_date;
                            var status_task = data[key].status;
                            var task_status = data[key].task_status;
                            // alert(task_type);staff_name_str_arr
                            var isActive = data[key].del_flag;
                            if (!isNaN(task_id)) {
                                if (task_status == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light  btn-sm edit";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light  btn-sm edit";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }
                                if (isActive == 1) {
                                    var del_status = "No";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + task_id + ")'><b>Delete</b></a>";
                                    // var delete_btn_txt = "<button class='btn btn-facebook btn-xs mr-1 mt-1 delete' value='' type='button' onClick ='OnDelete(" + task_id + ")' ><i class='fa fa-trash' aria-hidden='true'></i></button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + task_id + ")'><b>Recover</b></a>";
                                    // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + task_id + ")' class='btn btn-facebook btn-xs mr-1 mt-1 delete'><i class='fa fa-undo' aria-hidden='true'></i></button></button>";
                                }

                                // view_btn = "<a href='<?php echo base_url() . "master/task_work/view_assign/"; ?>" + task_id + "' class='btn btn-facebook btn-xs mt-1 view' id='view'><i class='fas fa-eye'></i></a>";
                                // edit_btn = " <a href='<?php echo base_url() . "master/task_work/assign/"; ?>" + task_id + "' class='btn btn-facebook btn-xs mt-1 edit' id='edit'><i class='fas fa-pencil-alt'></i></a>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + task_id + "' value='' type='button' onClick ='updateStatus(" + task_id + "," + task_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='<?php echo base_url() . "master/task_work/view_assign/"; ?>" + task_id + "' id='view'><b>View</b></a><a class='dropdown-item edit' href='<?php echo base_url() . "master/task_work/assign/"; ?>" + task_id + "' id='edit' ><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + task_id + "' href='javascript:void(0);' id='status_btn_" + task_id + "' onClick ='updateStatus(" + task_id + "," + task_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td> <td><center>' + task_type + '</center></td><td>' + task_title + '</td><td>' + staff_name_str_arr + '</td><td>' + task_desc + '</td><td>' + priority + '</td><td>' + start_date + '</td><td>' + end_date + '</td><td>' + status_task + '</td></tr>';
                            }
                            // alert(datas);
                        });

                    } else {
                        $("#total_task").text(" Count ( " + total_task + " ) ");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="9"><center>Data Not Found</center></td> </tr>';
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

        $("#filter_task_type").val("null");
        $("#filter_task_title").val("");
        $("#filter_staff").val("null");
        $("#filter_task_desc").val("");
        $("#filter_priority").val("null");
        $("#filter_task_status").val("null");
        $("#filter_start_date").val("");
        $("#filter_end_date").val("");
        $("#filter_status").val("null");
        getMy_TaskList();
    }

    getMy_TaskList();

    function getMy_TaskList() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/task_work/get_assign_task_list";
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
                    var total_task = 0;
                    console.log(data);
                    console.log(data["userdata"]);
                    if (data["status"] == true) {
                        var datas = "";
                        total_task = data["total_task"];
                        var data = data["userdata"];

                        // alert(total_task);
                        $("#total_task").text(" Count ( " + total_task + " ) ");
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            var task_id = data[key].task_id;
                            var task_type = data[key].task_type;
                            var task_title = data[key].task_title;
                            var task_desc = data[key].task_desc;
                            var staff = data[key].fk_staff_id;
                            var staff_name_str_arr = data[key].staff_name_str_arr;
                            var priority = data[key].priority;
                            var start_date = data[key].start_date;
                            var end_date = data[key].end_date;
                            var status_task = data[key].status;
                            var task_status = data[key].task_status;
                            // alert(task_type);staff_name_str_arr
                            var isActive = data[key].del_flag;
                            if (!isNaN(task_id)) {
                                if (task_status == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light  btn-sm edit";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light  btn-sm edit";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }
                                if (isActive == 1) {
                                    var del_status = "No";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + task_id + ")'><b>Delete</b></a>";
                                    // var delete_btn_txt = "<button class='btn btn-facebook btn-xs mr-1 mt-1 delete' value='' type='button' onClick ='OnDelete(" + task_id + ")' ><i class='fa fa-trash' aria-hidden='true'></i></button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + task_id + ")'><b>Recover</b></a>";
                                    // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + task_id + ")' class='btn btn-facebook btn-xs mr-1 mt-1 delete'><i class='fa fa-undo' aria-hidden='true'></i></button></button>";
                                }

                                // view_btn = "<a href='<?php echo base_url() . "master/task_work/view_assign/"; ?>" + task_id + "' class='btn btn-facebook btn-xs mt-1 view' id='view'><i class='fas fa-eye'></i></a>";
                                // edit_btn = " <a href='<?php echo base_url() . "master/task_work/assign/"; ?>" + task_id + "' class='btn btn-facebook btn-xs mt-1 edit' id='edit'><i class='fas fa-pencil-alt'></i></a>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + task_id + "' value='' type='button' onClick ='updateStatus(" + task_id + "," + task_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='<?php echo base_url() . "master/task_work/view_assign/"; ?>" + task_id + "' id='view'><b>View</b></a><a class='dropdown-item edit' href='<?php echo base_url() . "master/task_work/assign/"; ?>" + task_id + "' id='edit' ><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + task_id + "' href='javascript:void(0);' id='status_btn_" + task_id + "' onClick ='updateStatus(" + task_id + "," + task_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td> <td><center>' + task_type + '</center></td><td>' + task_title + '</td><td>' + staff_name_str_arr + '</td><td>' + task_desc + '</td><td>' + priority + '</td><td>' + start_date + '</td><td>' + end_date + '</td><td>' + status_task + '</td></tr>';
                            }
                            // alert(datas);
                        });
                        // alert(datas);

                    } else {
                        $("#total_task").text(" Count ( " + total_task + " ) ");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="9"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function updateStatus(task_id, task_status) {

        var url = "<?php echo $base_url; ?>master/task_work/update_assign_task_status";

        if (task_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": task_id,
                    "status": task_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + task_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["task_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-xs waves-light edit";
                            $("#edit_" + task_id).addClass(status_btn_txt);
                            $("#status_btn_" + task_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-xs waves-light edit";
                            $("#edit_" + task_id).addClass(status_btn_txt);
                            $("#status_btn_" + task_id).text(status);
                        }

                        $("#status_btn_" + task_id).text(status);


                        $('#status_btn_' + task_id).attr('onClick', 'updateStatus(' + task_id + ',' + data["userdata"]["task_status"] + ')');

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

    update_task_view_status();

    function update_task_view_status() {
        var staff_id = "<?php echo $this->session->userdata("@_staff_id"); ?>";
        var user_role_id = "<?php echo $this->session->userdata("@_user_role_id"); ?>";
        var url = "<?php echo $base_url; ?>master/task_work/update_task_view_status";

        if (url != "") {

            $.ajax({
                url: url,
                data: {
                    "staff_id": staff_id,
                    "status": 2,
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var count_status = data["userdata"];
                    if (data["status"] == true) {
                        var my_flag = false;
                        // toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        $.each(count_status, function(key, val) {
                            var task_view_status = count_status[key].task_view_status;
                            if (task_view_status == 1)
                                my_flag = true;

                        });
                        // var reloads = [2000, 13000]
                        // if(my_flag==true){
                        //     setTimeout(function() {
                        //         location.reload();
                        //     }, 1000);
                        // }
                        if (user_role_id == 1 || user_role_id == 2) {

                        } else {
                            ;
                            (function() {
                                var reloads = [500],
                                    storageKey = 'reloadIndex',
                                    reloadIndex = parseInt(localStorage.getItem(storageKey), 10) || 0;

                                if (reloadIndex >= reloads.length || isNaN(reloadIndex)) {
                                    localStorage.removeItem(storageKey);
                                    return;
                                }

                                setTimeout(function() {
                                    window.location.reload();
                                }, reloads[reloadIndex]);

                                localStorage.setItem(storageKey, parseInt(reloadIndex, 10) + 1);
                            }());
                        }


                    } else {
                        // toaster(message_type = "Error", message_txt = data["message"], message_icone = "error");
                    }

                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                }

            });
        }
    }

    function playSound(url) {
        const audio = new Audio(url);
        audio.play();
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