<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<?php
if (!empty($phs_regi_details)) {
    $phs_regi_id = $phs_regi_details["phs_regi_id"];
    $serial_no = $phs_regi_details["serial_no"];
    $serial_no_counter = $phs_regi_details["serial_no_counter"];
    $policy_no = $phs_regi_details["policy_no"];
    $policy_holder = $phs_regi_details["policy_holder"];
    $company_name = $phs_regi_details["fk_company_id"];
    $branch_code = $phs_regi_details["branch_code"];
    $receipt_doc = $phs_regi_details["receipt_doc"];
    $final_doc = $phs_regi_details["final_doc"];
    $holder_type = $phs_regi_details["holder_type"];
    $company_type = $phs_regi_details["company_type"];
    $receipt_no = $phs_regi_details["receipt_no"];
    $due_date = $phs_regi_details["due_date"];
    $ammount = $phs_regi_details["ammount"];
    $purpose_of_send = $phs_regi_details["purpose_of_send"];
    $document = $phs_regi_details["document"];
    $company_id = $phs_regi_details["company_id"];
    $policy_holder_id = $phs_regi_details["policy_holder_id"];
    $remark = $phs_regi_details["remark"];
    $del_flag = $phs_regi_details["del_flag"];
} else {
    $phs_regi_id = "";
    $serial_no = "";
    $serial_no_counter = "";
    $policy_no = "";
    $policy_holder = "";
    $company_name = "";
    $branch_code = "";
    $receipt_doc = "";
    $final_doc = "";
    $holder_type = "";
    $company_type = "";
    $receipt_no = "";
    $due_date = "";
    $ammount = "";
    $purpose_of_send = "";
    $document = "";
    $company_id = "";
    $policy_holder_id = "";
    $remark = "";
    $del_flag = "";
}
?>
<div class="content-page">
    <div class="content">

        <div class="container-fluid">
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

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="header-title"><?php echo $add . $title; ?></h4>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4 text-right">
                                <a href="<?php echo base_url() . "master/phs_regi"; ?>" class='btn btn-secondary waves-effect btn-xs'>Back</a>
                            </div>

                        </div>

                        <p class="sub-header">

                        </p>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="serial_no" class="col-form-label col-md-4 text-right">Serial No.<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="serial_no" id="serial_no" value="<?php echo $serial_no; ?>" placeholder="Enter Serial No." class="form-control">
                                                <input type="hidden" name="serial_no_counter" id="serial_no_counter" value="<?php echo $serial_no_counter; ?>" placeholder="Enter Serial No." class="form-control">
                                                <span id="serial_no_err"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="policy_no" class="col-form-label col-md-4 text-right">Policy No.<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="policy_no" id="policy_no" value="<?php echo $policy_no; ?>" placeholder="Enter Policy No." class="form-control">
                                                <span id="policy_no_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="holder_type" class="col-form-label col-md-4 text-right">Holder Type<span class="text-danger">*</span></label>
                                            <div class="col-md-3">
                                                <div class="custom-control custom-radio col-form-label ">
                                                    <input type="radio" id="holder_type_manual" name="holder_type" class="custom-control-input holder_type" value="Manual" <?php if ($edit_add_flage == 0): echo set_radio("holder_type", "Manual", ($holder_type=="Manual"?TRUE:FALSE)); endif; ?>  onclick="HolderType()">
                                                    <label class="custom-control-label" for="holder_type_manual">Manual</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="custom-control custom-radio col-form-label ">
                                                    <input type="radio" id="holder_type_system" name="holder_type" class="custom-control-input holder_type" value="System" <?php if ($edit_add_flage == 0): echo set_radio("holder_type", "System", ($holder_type=="System"?TRUE:FALSE)); endif; ?>  <?php if ($edit_add_flage == 1) : ?> checked="" <?php endif; ?> onchange="HolderType()">
                                                    <label class="custom-control-label" for="holder_type_system">System</label>
                                                </div>
                                            </div>
                                            <span id="holder_type_err"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="policy_holder" class="col-form-label col-md-4  text-right">Policy Holder<span class="text-danger">*</span></label>
                                            <div class="col-md-8" id="holder_div">
                                                <select name="policy_holder" id="policy_holder" class="form-control policy_holder" data-toggle="select2" onchange="onchangeholder();">
                                                    <option value="null">Select Policy Holder Name</option>
                                                    <?php $members = members_dropdown();
                                                    if (!empty($members)) : foreach ($members as $row7) :  ?>
                                                            <option value="<?php echo $row7["id"]; ?>" <?php if ($row7["id"] == $policy_holder_id) : echo "selected";
                                                                                                        endif; ?>><?php echo $row7["name"]; ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                                <span id="policy_holder_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="company_type" class="col-form-label col-md-4 text-right">Company Type<span class="text-danger">*</span></label>
                                            <div class="col-md-3">
                                                <div class="custom-control custom-radio col-form-label ">
                                                    <input type="radio" id="company_type_manual" name="company_type" class="custom-control-input company_type" value="Manual" <?php if ($edit_add_flage == 0): echo set_radio("company_type", "Manual", ($company_type=="Manual"?TRUE:FALSE)); endif; ?> onclick="CompanyType()">
                                                    <label class="custom-control-label" for="company_type_manual">Manual</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="custom-control custom-radio col-form-label ">
                                                    <input type="radio" id="company_type_system" name="company_type" class="custom-control-input company_type" value="System" <?php if ($edit_add_flage == 0): echo set_radio("company_type", "System", ($company_type=="System"?TRUE:FALSE)); endif; ?> <?php if ($edit_add_flage == 1) : ?> checked="" <?php endif; ?> onchange="CompanyType()">
                                                    <label class="custom-control-label" for="company_type_system">System</label>
                                                </div>
                                            </div>
                                            <span id="company_type_err"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="company" class="col-form-label col-md-4  text-right">Company<span class="text-danger">*</span></label>
                                            <div class="col-md-8" id="company_div">
                                                <select class="form-control" data-toggle="select2" id="company" name="company" onchange="onchangecompany();">
                                                    <option value="null">Select Company</option>
                                                    <?php $company = company_dropdown();
                                                    if (!empty($company)) : foreach ($company as $row) : ?>
                                                            <option value="<?php echo $row["mcompany_id"]; ?>" <?php if ($row["mcompany_id"] == $company_id) : echo "selected";
                                                                                                                endif; ?>><?php echo ucwords($row["company_name"]); ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                                <span id="company_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="branch_code_div" style="display:none;">
                                        <div class="form-group row">
                                            <label for="branch_code" class="col-form-label col-md-4  text-right">Branch Code.</label>
                                            <div class="col-md-8">
                                                <input type="text" name="branch_code" id="branch_code" value="<?php echo $branch_code; ?>" placeholder="Enter Branch Code" class="form-control">
                                                <span id="branch_code_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="receipt_no" class="col-form-label col-md-4  text-right">Receipt No.</label>
                                            <div class="col-md-8">
                                                <input type="text" name="receipt_no" id="receipt_no" value="<?php echo $receipt_no; ?>" placeholder="Enter Receipt No." class="form-control">
                                                <span id="receipt_no_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="receipt_doc" class="col-form-label col-md-4  text-right">Receipt Doc.</label>
                                            <div class="col-md-8">
                                                <input type="file" name="receipt_doc" id="receipt_doc" value="<?php echo $receipt_doc; ?>" placeholder="Enter Receipt Doc." class="form-control">
                                                <span id="receipt_doc_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="due_date" class="col-form-label col-md-4  text-right">Due Date</label>
                                            <div class="col-md-8">
                                                <input type="text" name="due_date" id="due_date" value="<?php echo $due_date; ?>" placeholder="Enter Due Date" class="form-control">
                                                <span id="due_date_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="ammount" class="col-form-label col-md-4  text-right">Ammount<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="ammount" id="ammount" value="<?php echo $ammount; ?>" placeholder="Enter Ammount" class="form-control">
                                                <span id="ammount_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="final_doc" class="col-form-label col-md-4  text-right">Final Doc.</label>
                                            <div class="col-md-8">
                                                <input type="file" name="final_doc" id="final_doc" value="<?php echo $final_doc; ?>" placeholder="Enter Final Doc." class="form-control">
                                                <span id="final_doc_err"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="purpose_of_send" class="col-form-label col-md-4 text-right">Purpose Of Sending</label>
                                            <div class="col-md-8">
                                                <textarea rows="5" name="purpose_of_send" id="purpose_of_send" class="form-control purpose_of_send" placeholder="Enter Purpose Of Sending .."><?php echo $purpose_of_send; ?></textarea>
                                                <span id="purpose_of_send_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="document" class="col-form-label col-md-4 text-right">Types Of Document</label>
                                            <div class="col-md-8">
                                                <textarea rows="5" name="document" id="document" class="form-control document" placeholder="Enter Types Of Document .."><?php echo $document; ?></textarea>
                                                <span id="document_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="remark" class="col-form-label col-md-4 text-right">Remark<span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select name="remark" id="remark" class="form-control remark">
                                                    <option value="New" <?php if ($remark == "New") : echo "selected"; endif; ?>>New</option>
                                                    <option value="Under process" <?php if ($remark == "Under process") : echo "selected"; endif; ?>>Under process</option>
                                                    <option value="FollowUp" <?php if ($remark == "FollowUp") : echo "selected"; endif; ?>>FollowUp</option>
                                                    <option value="Completed" <?php if ($remark == "Completed") : echo "selected"; endif; ?>>Completed</option>
                                                </select>
                                                <span id="remark_err"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label id="phs_regi_id" hidden><?php echo $phs_regi_id; ?></label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <center>
                                            <button id="update" onclick='onUpdate()' style="display: none;" class="btn btn-primary btn-sm">Update <?php echo $title; ?></button>
                                            <button id="submit" onclick='onAdd()' class="btn btn-primary btn-sm">Save <?php echo $title; ?></button>
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

    </div>

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php echo date("Y"); ?> &copy; GIC by <a href="">Animator</a>
                </div>
            </div>
        </div>
    </footer>

</div>

<script>
    <?php if ($company_name == "LIC Of India") { ?>
        brach_code_show('<?php echo $company_name; ?>');
    <?php } ?>

    function brach_code_show(company_name) {

        if (company_name == "LIC Of India")
            $("#branch_code_div").show();
        else
            $("#branch_code_div").hide();
    }

    <?php if ($edit_add_flage == 1) { ?>
    <?php } elseif ($edit_add_flage == 0) { ?>
        CompanyType(company_type_old ='<?php echo $company_type; ?>');
        HolderType(holder_type_old ='<?php echo $holder_type; ?>');
    <?php } ?>

    function CompanyType(company_type_old) {
        // alert(company_type_old);
        if (company_type_old == "" || company_type_old == undefined || company_type_old == "undefined" || company_type_old == null || company_type_old == "null")
            var company_type = $("input[name='company_type']:checked").val();
        else
            var company_type = company_type_old;

        if (company_type == "System") {
            $("#company_div").empty("");
            $("#company_div").append('<select class="form-control" data-toggle="select2" id="company" name="company" onchange="onchangecompany();"><option value="null">Select Company</option><?php $company = company_dropdown();if (!empty($company)) : foreach ($company as $row) : ?><option value="<?php echo $row["mcompany_id"]; ?>" <?php if ($row["mcompany_id"] == $company_id) : echo "selected";endif; ?>><?php echo ucwords(addslashes($row["company_name"])); ?></option><?php endforeach; endif; ?> </select>');
            // getSubTitle(task_title_drop_old);
        } else if (company_type == "Manual") {
            $("#company_div").empty("");
            $("#company_div").append('<input type="text" name="company" id="company" value="<?php echo $company_name; ?>" placeholder="Enter Company" class="form-control" onkeyup="onkeyupcompany();">');

        }
        // $('.select2-hidden-accessible').selectpicker('refresh');
        // $('#company').trigger("change");
        // $("#company").multiselect('refresh');
    }

    function HolderType(holder_type_old) {
        // alert(holder_type_old);
        if (holder_type_old == "" || holder_type_old == undefined || holder_type_old == "undefined" || holder_type_old == null || holder_type_old == "null")
            var holder_type = $("input[name='holder_type']:checked").val();
        else
            var holder_type = holder_type_old;

        if (holder_type == "System") {
            $("#holder_div").empty("");
            $("#holder_div").append('<select name="policy_holder" id="policy_holder" class="form-control policy_holder" data-toggle="select2"  onchange="onchangeholder();"><option value="null">Select Policy Holder Name</option><?php $members = members_dropdown();  if (!empty($members)) : foreach ($members as $row7) :  ?><option value="<?php echo $row7["id"]; ?>" <?php if ($row7["id"] == $policy_holder_id) : echo "selected"; endif; ?>><?php echo ucwords(addslashes($row7["name"])); ?></option><?php endforeach;  endif; ?></select>');
            // getSubTitle(task_title_drop_old);
        } else if (holder_type == "Manual") {
            $("#holder_div").empty("");
            $("#holder_div").append('<input type="text" name="policy_holder" id="policy_holder" value="<?php echo $policy_holder; ?>" placeholder="Enter Policy Holder Name" class="form-control" onkeyup="onkeyupholder();">');
        }
        // $('.select2-hidden-accessible').selectpicker('refresh');
        // $('#policy_holder').trigger("chosen:updated");
    }

    <?php if ($edit_add_flage == 1) { ?>
        getPolicyCounter();
    <?php } elseif ($edit_add_flage == 0) { ?>
    <?php } ?>

    function getPolicyCounter() {
        var url = "<?php echo $base_url; ?>master/phs_regi/get_serial_no_counter";
        if (url != "") {
            $.ajax({
                url: url,
                data: {},
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var data_details = data["userdata"];
                    var policy_counter = 0;
                    if (data_details == 0 || data_details == "") {
                        policy_counter = policy_counter + 1;
                    } else {
                        var policy_counter_new = data_details.serial_no_counter;
                        policy_counter = parseInt(policy_counter_new) + 1;
                    }
                    var actual_policy_counter = policy_counter;
                    var current_month = '<?php echo date('M'); ?>';
                    var current_year = '<?php echo date('Y'); ?>';
                    // alert(current_month);
                    $('#serial_no').val(current_month + '/' + current_year + '/' + actual_policy_counter);
                    $("#serial_no_counter").val(actual_policy_counter);

                    if (actual_policy_counter != "")
                        document.getElementById("serial_no").disabled = true;

                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }
    $(function() {
        $("#due_date").datepicker({
            'format': 'dd-mm-yyyy',
            'autoclose': true,
            'todayHighlight': true
        });
    });
    $('#serial_no').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#policy_no').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    function onkeyupcompany() {
        document.getElementById("update").disabled = false;
    }

    function onchangecompany() {
        var company = $("#company option:selected").text();
        // alert(company);
        document.getElementById("update").disabled = false;

        if (company == "null")
            company = "";

        if (company == "LIC Of India"){
            $("#branch_code_div").show();
            $("#branch_code").val("897");
        }else{
            $("#branch_code_div").hide();
            $("#branch_code").val("");
        }
    }

    function onkeyupholder() {
        document.getElementById("update").disabled = false;
    }

    function onchangeholder() {
        document.getElementById("update").disabled = false;
    }
    // $('#policy_holder').on('change', function() {
    //     document.getElementById("update").disabled = false;
    // });
    // $('#company').on('change', function() {
    //     document.getElementById("update").disabled = false;
    // });
    $('#receipt_no').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#purpose_of_send').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#ammount').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#due_date').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#document').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#remark').on('change', function() {
        document.getElementById("update").disabled = false;
    });

    $('#branch_code').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('input[name="holder_type"]:checked').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('input[name="company_type"]:checked').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#receipt_doc').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#final_doc').on('change', function() {
        document.getElementById("update").disabled = false;
    });

    $(document).ready(function() {
        <?php if (!empty($phs_regi_details)) { ?>
            $("#update").show();
            $("#delete").show();
            $("#submit").hide();
        <?php } ?>
        <?php if ($del_flag == 0) { ?>
            <?php if ($edit_add_flage == 1) { ?>
                $("#recover").hide();
            <?php } elseif ($edit_add_flage == 0) { ?>
                $("#recover").show();
            <?php } ?>
            $("#update").hide();
            $("#delete").hide();
        <?php } else { ?>
            $("#recover").hide();
            $("#update").show();
            $("#delete").show();
        <?php } ?>
    });

    function clearError() {
        $("#serial_no").removeClass("parsley-error");
        $("#serial_no_err").removeClass("text-danger").text("");
        $("#policy_no").removeClass("parsley-error");
        $("#policy_no_err").removeClass("text-danger").text("");
        $("#policy_holder").removeClass("parsley-error");
        $("#policy_holder_err").removeClass("text-danger").text("");
        $("#company").removeClass("parsley-error");
        $("#company_err").removeClass("text-danger").text("");
        $("#receipt_no").removeClass("parsley-error");
        $("#receipt_no_err").removeClass("text-danger").text("");
        $("#purpose_of_send").removeClass("parsley-error");
        $("#purpose_of_send_err").removeClass("text-danger").text("");
        $("#ammount").removeClass("parsley-error");
        $("#ammount_err").removeClass("text-danger").text("");

        $("#due_date").removeClass("parsley-error");
        $("#due_date_err").removeClass("text-danger").text("");
        $("#document").removeClass("parsley-error");
        $("#document_err").removeClass("text-danger").text("");
        $("#remark").removeClass("parsley-error");
        $("#remark_err").removeClass("text-danger").text("");

        $("#branch_code").removeClass("parsley-error");
        $("#branch_code_err").removeClass("text-danger").text("");
        $("#holder_type").removeClass("parsley-error");
        $("#holder_type_err").removeClass("text-danger").text("");
        $("#company_type").removeClass("parsley-error");
        $("#company_type_err").removeClass("text-danger").text("");
        $("#receipt_doc").removeClass("parsley-error");
        $("#receipt_doc_err").removeClass("text-danger").text("");
        $("#final_doc").removeClass("parsley-error");
        $("#final_doc_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#phs_regi_id").text("");
        $("#serial_no").val("");
        $("#serial_no_counter").val("");
        $("#policy_no").val("");
        $("#policy_holder").val("");
        $("#company").val("");
        $("#receipt_no").val("");
        $("#purpose_of_send").val("");
        $("#ammount").val("");
        $("#due_date").val("");
        $("#document").val("");
        $("#remark").val("");

        $("#branch_code").val("");
        $("#holder_type").val("");
        $("#company_type").val("");
        $("#receipt_doc").val("");
        $("#final_doc").val("");


        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function OnRecover() {
        var phs_regi_id = $("#phs_regi_id").text();
        var url = "<?php echo $base_url; ?>master/phs_regi/recover_phs_regi";
        confirmation_alert(id = phs_regi_id, url = url, title = "Staff", type = "Recover");
    }

    function OnDelete() {
        var phs_regi_id = $("#phs_regi_id").text();
        var url = "<?php echo $base_url; ?>master/phs_regi/remove_phs_regi";
        confirmation_alert(id = phs_regi_id, url = url, title = "Staff", type = "Delet");
    }

    function onUpdate() {
        var phs_regi_id = $("#phs_regi_id").text();
        var serial_no = $("#serial_no").val();
        var serial_no_counter = $("#serial_no_counter").val();
        var policy_no = $("#policy_no").val();
        var policy_holder = $("#policy_holder").val();
        var company = $("#company").val();
        var receipt_no = $("#receipt_no").val();
        var purpose_of_send = $("#purpose_of_send").val();
        var ammount = $("#ammount").val();
        var due_date = $("#due_date").val();
        var document = $("#document").val();
        var remark = $("#remark").val();

        var branch_code = $("#branch_code").val();
        // var holder_type = $("#holder_type").val();
        // var company_type = $("#company_type").val();
        var holder_type = $('input[name="holder_type"]:checked').val();
        var company_type = $('input[name="company_type"]:checked').val();

        var receipt_doc = $('#receipt_doc').prop('files')[0];
        var final_doc = $('#final_doc').prop('files')[0];

        if (policy_holder == "null")
            policy_holder = "";

        if (company == "null")
            company = "";

        var form_data = new FormData();
        form_data.append('phs_regi_id', phs_regi_id);
        form_data.append('serial_no', serial_no);
        form_data.append('serial_no_counter', serial_no_counter);
        form_data.append('policy_no', policy_no);
        form_data.append('policy_holder', policy_holder);
        form_data.append('company', company);
        form_data.append('receipt_no', receipt_no);
        form_data.append('purpose_of_send', purpose_of_send);
        form_data.append('ammount', ammount);
        form_data.append('due_date', due_date);
        form_data.append('document', document);
        form_data.append('remark', remark);

        form_data.append('branch_code', branch_code);
        form_data.append('holder_type', holder_type);
        form_data.append('company_type', company_type);
        form_data.append('receipt_doc', receipt_doc);
        form_data.append('final_doc', final_doc);

        var url = "<?php echo $base_url; ?>master/phs_regi/update_phs_regi";

        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            dataType: 'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {

            },
            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#serial_no").val("");
                    $("#policy_no").val("");
                    $("#policy_holder").val("");
                    $("#company").val("");
                    $("#receipt_no").val("");
                    $("#purpose_of_send").val("");
                    $("#ammount").val("");
                    $("#serial_no").removeClass("parsley-error");
                    $("#policy_no").removeClass("parsley-error");
                    $("#policy_holder").removeClass("parsley-error");
                    $("#company").removeClass("parsley-error");
                    $("#receipt_no").removeClass("parsley-error");
                    $("#purpose_of_send").removeClass("parsley-error");
                    $("#ammount").removeClass("parsley-error");

                    $("#due_date").val("");
                    $("#document").val("");
                    $("#remark").val("");
                    $("#due_date").removeClass("parsley-error");
                    $("#document").removeClass("parsley-error");
                    $("#remark").removeClass("parsley-error");
                    setTimeout(function() {
                        // location.reload();
                        window.location.href = '<?php echo base_url(); ?>master/phs_regi';
                    }, 1000);
                } else {
                    if (data["message"]["serial_no_err"] != "")
                        $("#serial_no").addClass("parsley-error");
                    else
                        $("#serial_no").removeClass("parsley-error");
                    $("#serial_no_err").addClass("text-danger").html(data["message"]["serial_no_err"]);
                    if (data["message"]["policy_no_err"] != "")
                        $("#policy_no").addClass("parsley-error");
                    else
                        $("#policy_no").removeClass("parsley-error");
                    $("#policy_no_err").addClass("text-danger").html(data["message"]["policy_no_err"]);
                    if (data["message"]["policy_holder_err"] != "")
                        $("#policy_holder").addClass("parsley-error");
                    else
                        $("#policy_holder").removeClass("parsley-error");
                    $("#policy_holder_err").addClass("text-danger").html(data["message"]["policy_holder_err"]);
                    if (data["message"]["company_err"] != "")
                        $("#company").addClass("parsley-error");
                    else
                        $("#company").removeClass("parsley-error");
                    $("#company_err").addClass("text-danger").html(data["message"]["company_err"]);
                    if (data["message"]["receipt_no_err"] != "")
                        $("#receipt_no").addClass("parsley-error");
                    else
                        $("#receipt_no").removeClass("parsley-error");
                    $("#receipt_no_err").addClass("text-danger").html(data["message"]["receipt_no_err"]);
                    if (data["message"]["purpose_of_send_err"] != "")
                        $("#purpose_of_send").addClass("parsley-error");
                    else
                        $("#purpose_of_send").removeClass("parsley-error");
                    $("#purpose_of_send_err").addClass("text-danger").html(data["message"]["purpose_of_send_err"]);
                    if (data["message"]["ammount_err"] != "")
                        $("#ammount").addClass("parsley-error");
                    else
                        $("#ammount").removeClass("parsley-error");
                    $("#ammount_err").addClass("text-danger").html(data["message"]["ammount_err"]);

                    if (data["message"]["due_date_err"] != "")
                        $("#due_date").addClass("parsley-error");
                    else
                        $("#due_date").removeClass("parsley-error");
                    $("#due_date_err").addClass("text-danger").html(data["message"]["due_date_err"]);
                    if (data["message"]["document_err"] != "")
                        $("#document").addClass("parsley-error");
                    else
                        $("#document").removeClass("parsley-error");
                    $("#document_err").addClass("text-danger").html(data["message"]["document_err"]);
                    if (data["message"]["remark_err"] != "")
                        $("#remark").addClass("parsley-error");
                    else
                        $("#remark").removeClass("parsley-error");
                    $("#remark_err").addClass("text-danger").html(data["message"]["remark_err"]);
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    function onAdd() {
        var serial_no = $("#serial_no").val();
        // alert(serial_no);
        var serial_no_counter = $("#serial_no_counter").val();
        var policy_no = $("#policy_no").val();
        var policy_holder = $("#policy_holder").val();
        var company = $("#company").val();
        var receipt_no = $("#receipt_no").val();
        var purpose_of_send = $("#purpose_of_send").val();
        var ammount = $("#ammount").val();
        var due_date = $("#due_date").val();
        var document = $("#document").val();
        var remark = $("#remark").val();
        var branch_code = $("#branch_code").val();
        var holder_type = $('input[name="holder_type"]:checked').val();
        var company_type = $('input[name="company_type"]:checked').val();
        // var holder_type = $("#holder_type").val();
        // var company_type = $("#company_type").val();
        var receipt_doc = $('#receipt_doc').prop('files')[0];
        var final_doc = $('#final_doc').prop('files')[0];

        if (policy_holder == "null")
            policy_holder = "";

        if (company == "null")
            company = "";

        var form_data = new FormData();
        form_data.append('serial_no', serial_no);
        form_data.append('serial_no_counter', serial_no_counter);
        form_data.append('policy_no', policy_no);
        form_data.append('policy_holder', policy_holder);
        form_data.append('company', company);
        form_data.append('receipt_no', receipt_no);
        form_data.append('purpose_of_send', purpose_of_send);
        form_data.append('ammount', ammount);
        form_data.append('due_date', due_date);
        form_data.append('document', document);
        form_data.append('remark', remark);

        form_data.append('branch_code', branch_code);
        form_data.append('holder_type', holder_type);
        form_data.append('company_type', company_type);
        form_data.append('receipt_doc', receipt_doc);
        form_data.append('final_doc', final_doc);

        var url = "<?php echo $base_url; ?>master/phs_regi/add_phs_regi";

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
                    $("#serial_no").val("");
                    $("#policy_no").val("");
                    $("#policy_holder").val("");
                    $("#company").val("");
                    $("#receipt_no").val("");
                    $("#purpose_of_send").val("");
                    $("#ammount").val("");
                    $("#serial_no").removeClass("parsley-error");
                    $("#policy_no").removeClass("parsley-error");
                    $("#policy_holder").removeClass("parsley-error");
                    $("#company").removeClass("parsley-error");
                    $("#receipt_no").removeClass("parsley-error");
                    $("#purpose_of_send").removeClass("parsley-error");
                    $("#ammount").removeClass("parsley-error");

                    $("#due_date").val("");
                    $("#document").val("");
                    $("#remark").val("");
                    $("#due_date").removeClass("parsley-error");
                    $("#document").removeClass("parsley-error");
                    $("#remark").removeClass("parsley-error");
                    setTimeout(function() {
                        window.location.href = '<?php echo base_url(); ?>master/phs_regi';
                    }, 1000);
                } else {
                    if (data["message"]["serial_no_err"] != "")
                        $("#serial_no").addClass("parsley-error");
                    else
                        $("#serial_no").removeClass("parsley-error");
                    $("#serial_no_err").addClass("text-danger").html(data["message"]["serial_no_err"]);
                    if (data["message"]["policy_no_err"] != "")
                        $("#policy_no").addClass("parsley-error");
                    else
                        $("#policy_no").removeClass("parsley-error");
                    $("#policy_no_err").addClass("text-danger").html(data["message"]["policy_no_err"]);
                    if (data["message"]["policy_holder_err"] != "")
                        $("#policy_holder").addClass("parsley-error");
                    else
                        $("#policy_holder").removeClass("parsley-error");
                    $("#policy_holder_err").addClass("text-danger").html(data["message"]["policy_holder_err"]);
                    if (data["message"]["company_err"] != "")
                        $("#company").addClass("parsley-error");
                    else
                        $("#company").removeClass("parsley-error");
                    $("#company_err").addClass("text-danger").html(data["message"]["company_err"]);
                    if (data["message"]["receipt_no_err"] != "")
                        $("#receipt_no").addClass("parsley-error");
                    else
                        $("#receipt_no").removeClass("parsley-error");
                    $("#receipt_no_err").addClass("text-danger").html(data["message"]["receipt_no_err"]);
                    if (data["message"]["purpose_of_send_err"] != "")
                        $("#purpose_of_send").addClass("parsley-error");
                    else
                        $("#purpose_of_send").removeClass("parsley-error");
                    $("#purpose_of_send_err").addClass("text-danger").html(data["message"]["purpose_of_send_err"]);
                    if (data["message"]["ammount_err"] != "")
                        $("#ammount").addClass("parsley-error");
                    else
                        $("#ammount").removeClass("parsley-error");
                    $("#ammount_err").addClass("text-danger").html(data["message"]["ammount_err"]);

                    if (data["message"]["due_date_err"] != "")
                        $("#due_date").addClass("parsley-error");
                    else
                        $("#due_date").removeClass("parsley-error");
                    $("#due_date_err").addClass("text-danger").html(data["message"]["due_date_err"]);
                    if (data["message"]["document_err"] != "")
                        $("#document").addClass("parsley-error");
                    else
                        $("#document").removeClass("parsley-error");
                    $("#document_err").addClass("text-danger").html(data["message"]["document_err"]);
                    if (data["message"]["remark_err"] != "")
                        $("#remark").addClass("parsley-error");
                    else
                        $("#remark").removeClass("parsley-error");
                    $("#remark_err").addClass("text-danger").html(data["message"]["remark_err"]);

                }

            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }
</script>
<script>
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
                CheckFormAccess(submenu_permission, 2, url);
                check(role_permission, 2);
            }
        }
    });
</script>