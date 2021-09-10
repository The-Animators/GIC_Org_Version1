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
                            <h4 class="modal-title"><?php echo $title; ?> Details</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-row">

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="section" class="col-form-label col-md-2 text-right">Section<span class="text-danger">*</span></label>
                                                <div class="col-md-7">
                                                    <select class="form-control" name="section" id="section">
                                                        <option value="null">Select Section</option>
                                                        <?php if (!empty($section)) : foreach ($section as $row) : ?>
                                                                <option value="<?php echo  $row["policy_question_section_id"]; ?>"><?php echo  $row["policy_question_section_name"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <span id="section_err"></span>
                                                </div>
                                                <div class="col-md-3">
                                                    <button id="add_section" onclick='sectinAdd()' class="btn btn-primary btn-sm">Add Section</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row" id="section_div" style="display:none;">
                                                <label for="section_name" class="col-form-label col-md-2 text-right"></label>
                                                <div class="col-md-7">
                                                    <input type="text" name="section_name" id="section_name" value="" placeholder="Enter Section Name" class="form-control">
                                                    <span id="section_name_err"></span>
                                                </div>
                                                <div class="col-md-3">
                                                    <button id="save_section" onclick='SectionSave()' class="btn btn-primary btn-sm">Save Section</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="question" class="col-form-label col-md-2 text-right">Questions<span class="text-danger">*</span></label>
                                                <div class="col-md-10">
                                                    <textarea rows="5" name="question" id="question" value="" placeholder="Enter Questions" class="form-control"></textarea>
                                                    <span id="question_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="answer" class="col-form-label col-md-2 text-right">Answer<span class="text-danger">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="answer" id="answer" value="" data-role="tagsinput" placeholder="Enter  Answers" />
                                                    <span id="answer_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="policy_question_id" hidden>1</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <center>
                                                <button id="update" onclick='onUpdate()' style="display: none;" class="btn btn-primary btn-sm">Update Question</button>
                                                <button id="submit" class="btn btn-primary btn-sm">Save Question</button>
                                                <!-- <button id="delete" onclick='OnDelete()' style="display: none;" class="btn btn-primary btn-sm">Delete Question</button> -->
                                                <!-- <button id="recover" onclick='OnRecover()' style="display: none;" class="btn btn-primary btn-sm">Recover Question</button> -->
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
                                <div class="col-md-12">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="10%">Section :</td>
                                                <td><strong><span id="section_details" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="10%">Questions :</td>
                                                <td><strong><span id="question_details" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="10%">Answer :</td>
                                                <td><strong><span id="answer_details" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                    <!-- <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="section" class="col-form-label col-md-3 text-right"><strong>Section : </strong></label>
                                                <div class="col-md-7 col-form-label" id="section_details"></div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="question" class="col-form-label col-md-3 text-right"><strong>Questions : </strong></label>
                                                <div class="col-md-9 col-form-label" id="question_details"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="answer" class="col-form-label col-md-3 text-right"><strong>Answer : </strong></label>
                                                <div class="col-md-9 col-form-label" id="answer_details"></div>
                                            </div>
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
                                        <div class="col-md-3 row">
                                            <label for="filter_section" class="col-form-label col-md-4 text-right">Section</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="filter_section" id="filter_section">
                                                    <option value="null">Select Section</option>
                                                    <?php if (!empty($section)) : foreach ($section as $row) : ?>
                                                            <option value="<?php echo  $row["policy_question_section_id"]; ?>"><?php echo  $row["policy_question_section_name"]; ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-9 row">
                                            <label for="filter_question" class="col-form-label col-md-2 text-right">Question</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" id="filter_question" name="filter_question" placeholder="Enter Question">
                                            </div>
                                        </div>
                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_ans" class="col-form-label col-md-4 text-right">Answer</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="filter_ans" name="filter_ans" placeholder="Enter Answer">
                                            </div>
                                        </div>
                                        <div class="col-md-3 row mt-1">
                                            <label for="filter_status" class="col-form-label col-md-4 text-right">Status</label>
                                            <div class="col-md-8">
                                                <select name="filter_status" id="filter_status" class="form-control">
                                                    <option value="null">Select Status</option>
                                                    <option value="1">Active</option>
                                                    <option value="2">In-Active</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3 row mt-1 ml-1">
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
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_quest_ans_data"></span></h4>
                            </div>
                            <!-- <div class="col-md-4">

                            </div> -->
                            <div class="col-md-4 text-right">
                                <input class='btn btn-facebook btn-xs' id='AddForm' value='Add' type='button' />
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
                                        <th>
                                            <center>Section</center>
                                        </th>
                                        <th>
                                            <center>Questions</center>
                                        </th>
                                        <th>Answer</th>
                                        <!-- <th>Questions & Answer Status</th>
                                        <th>Permanent Delete</th>
                                        <th>Delete Status</th> -->
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

    function sectinAdd() {
        $("#section_div").attr("style", "");
    }

    function SectionSave() {
        // alert("hi");
        var section_name = $("#section_name").val();
        var url = "<?php echo $base_url; ?>master/policy_masterquestionans/add_section";

        if ((url != "") || (section_name != "")) {
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    section_name: section_name,
                },
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },
                success: function(data) {
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        $("#section_name").val("");
                        $("#section_name").removeClass("parsley-error");
                        $("#section_name_err").removeClass("text-danger").html("");
                        $("#section_err").removeClass("text-danger").html("");
                        $("#section").removeClass("parsley-error");
                        get_section();
                        $("#section_div").attr("style", "display:none");
                    } else {
                        if (data["message"]["section_name_err"] != "")
                            $("#section_name").addClass("parsley-error");
                        else
                            $("#section_name").removeClass("parsley-error");
                        $("#section_name_err").addClass("text-danger").html(data["message"]["section_name_err"]);
                    }
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function get_section() {
        var url = "<?php echo $base_url; ?>master/policy_masterquestionans/get_section";
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
                    if (data["status"] == true) {
                        var val = data["userdata"];
                        $('#section').html("");
                        var option_val = "";
                        $('#section').append("<option value=''>Select</option>");
                        for (var i = 0; i < val.length; i++) {
                            var policy_question_section_id = val[i]["policy_question_section_id"];
                            var policy_question_section_name = val[i]["policy_question_section_name"];

                            option_val += '<option value="' + policy_question_section_id + '">' + policy_question_section_name + '</option>';

                        }
                        $('#section').append(option_val);

                    } else {
                        $('#section').html("");
                        $('#section').append("<option value=''>Select</option>");
                    }
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {}
            });

        }
    }

    $("#AddForm").click(function() {
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
    });
    $('#question').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    $('#answer').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#section').on('change', function() {
        document.getElementById("update").disabled = false;
    });

    function clearError() {
        $("#question").removeClass("parsley-error");
        $("#question_err").removeClass("text-danger").text("");

        $("#answer").removeClass("parsley-error");
        $("#answer_err").removeClass("text-danger").text("");

        $("#section").removeClass("parsley-error");
        $("#section_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#policy_question_id").text("");
        $("#question").val("");
        $("#answer").val("");
        $("#section").val("null");

        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function OnRecover(policy_question_id) {
        // var policy_question_id = $("#policy_question_id").text();
        var url = "<?php echo $base_url; ?>master/policy_masterquestionans/recover_quest_ans";
        confirmation_alert(id = policy_question_id, url = url, title = "Questions & Answer", type = "Recover");
    }

    function OnDelete(policy_question_id) {
        // var policy_question_id = $("#policy_question_id").text();
        var url = "<?php echo $base_url; ?>master/policy_masterquestionans/remove_quest_ans";
        confirmation_alert(id = policy_question_id, url = url, title = "Questions & Answer", type = "Delet");
    }

    function OnDeletePermanently(policy_question_id) {
        var url = "<?php echo $base_url; ?>master/policy_masterquestionans/delete_quest_ans";
        confirmation_alert(id = policy_question_id, url = url, title = "Questions & Answer", type = "Delet");
    }

    function onView(val) {
        clearError();
        $('#view_form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/policy_masterquestionans/edit_quest_ans";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    policy_question_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {

                    $("#policy_question_id").text(data["userdata"].policy_question_id);
                    $("#question_details").text(data["userdata"].question);
                    $('#answer_details').text(data["userdata"].answer);
                    $('#section_details').text(data["userdata"].policy_question_section_name);

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function onEdit(val) {
        clearError();
        $("#policy_question_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();
        $('#form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/policy_masterquestionans/edit_quest_ans";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    policy_question_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    // var myObj = JSON.parse(data);
                    $("#policy_question_id").text(data["userdata"].policy_question_id);
                    $("#question").val(data["userdata"].question);
                    // $("#answer").val(data["userdata"].answer);
                    var answer = data["userdata"].answer;
                    $('#answer').tagsinput('add', answer);
                    // $("#section").val(data["userdata"].fk_policy_question_section_id);
                    $('select[id^="section"] option[value="' + data["userdata"].fk_policy_question_section_id + '"]').attr("selected", "selected");

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
        var policy_question_id = $("#policy_question_id").text();
        var question = $("#question").val();
        var answer = $("#answer").val();
        var section = $("#section").val();
        if (section == "null")
            section = "";
        var url = "<?php echo $base_url; ?>master/policy_masterquestionans/update_quest_ans";

        $.ajax({
            type: "POST",
            url: url,
            data: {
                policy_question_id: policy_question_id,
                question: question,
                answer: answer,
                section: section,
            },
            dataType: 'json',
            async: false,
            cache: false,
            beforeSend: function() {

            },
            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#question").val("");
                    $("#question").removeClass("parsley-error");
                    $("#answer").val("");
                    $("#answer").removeClass("parsley-error");
                    $("#section").val("");
                    $("#section").removeClass("parsley-error");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["message"]["question_err"] != "")
                        $("#question").addClass("parsley-error");
                    else
                        $("#question").removeClass("parsley-error");
                    $("#question_err").addClass("text-danger").html(data["message"]["question_err"]);

                    if (data["message"]["answer_err"] != "")
                        $("#answer").addClass("parsley-error");
                    else
                        $("#answer").removeClass("parsley-error");
                    $("#answer_err").addClass("text-danger").html(data["message"]["answer_err"]);

                    if (data["message"]["section_err"] != "")
                        $("#section").addClass("parsley-error");
                    else
                        $("#section").removeClass("parsley-error");
                    $("#section_err").addClass("text-danger").html(data["message"]["section_err"]);
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    $("#submit").click(function() {
        var question = $("#question").val();
        var answer = $("#answer").val();
        var section = $("#section").val();
        if (section == "null")
            section = "";
        var url = "<?php echo $base_url; ?>master/policy_masterquestionans/add_quest_ans";

        $.ajax({
            url: url,
            data: {
                question: question,
                answer: answer,
                section: section,
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
                    $("#question").val("");
                    $("#question").removeClass("parsley-error");
                    $("#answer").val("");
                    $("#answer").removeClass("parsley-error");
                    $("#section").val("");
                    $("#section").removeClass("parsley-error");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["message"]["question_err"] != "")
                        $("#question").addClass("parsley-error");
                    else
                        $("#question").removeClass("parsley-error");
                    $("#question_err").addClass("text-danger").html(data["message"]["question_err"]);

                    if (data["message"]["answer_err"] != "")
                        $("#answer").addClass("parsley-error");
                    else
                        $("#answer").removeClass("parsley-error");
                    $("#answer_err").addClass("text-danger").html(data["message"]["answer_err"]);

                    if (data["message"]["section_err"] != "")
                        $("#section").addClass("parsley-error");
                    else
                        $("#section").removeClass("parsley-error");
                    $("#section_err").addClass("text-danger").html(data["message"]["section_err"]);
                }

            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    });

    function Filter_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter On');
        $('#filter_form_modal').modal('toggle');

        var filter_section = $("#filter_section").val();
        var filter_question = $("#filter_question").val();
        var filter_ans = $("#filter_ans").val();
        var filter_status = $("#filter_status").val();

        if (filter_section == "null")
            filter_section = "";
        if (filter_status == "null")
            filter_status = "";
        var url = "<?php echo $base_url; ?>master/policy_masterquestionans/filter_quest_ans_list";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_section: filter_section,
                    filter_question: filter_question,
                    filter_ans: filter_ans,
                    filter_status: filter_status,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var total_quest_ans_data = 0;
                    $("#total_quest_ans_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var view_btn = "";
                        var status_btn = "";
                        var policy_question_id = "";
                        var question = "";
                        var answer = "";
                        var quest_ans_status = "";
                        var policy_question_section_name = "";
                        var datas = "";
                        var status = "";
                        total_quest_ans_data = data["total_quest_ans_data"];
                        $("#total_quest_ans_data").text(" Count ( " + total_quest_ans_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            policy_question_id = parseInt(data[key].policy_question_id);
                            question = data[key].question;
                            answer = data[key].answer;
                            quest_ans_status = data[key].quest_ans_status;
                            policy_question_section_name = data[key].policy_question_section_name;
                            var isActive = data[key].del_flag;
                            if (!isNaN(policy_question_id)) {
                                if (quest_ans_status == 1) {
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
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + policy_question_id + ")'><b>Delete</b></a>";
                                    // var delete_btn_txt = "<button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + policy_question_id + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + policy_question_id + ")'><b>Recover</b></a>";
                                    // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + policy_question_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                                }

                                // edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm edit' id='edit' value='' type='button' onClick ='onEdit(" + policy_question_id + ")' >Edit</button>";
                                // view_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view' id='view' value='' type='button' onClick ='onView(" + policy_question_id + ")' >View</button>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + policy_question_id + "' value='' type='button' onClick ='updateStatus(" + policy_question_id + "," + quest_ans_status + ")' >" + status + "</button>";
                                // delete_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm' value='' type='button' onClick ='OnDeletePermanently(" + policy_question_id + ")' >Delete Permanently</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + policy_question_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + policy_question_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + policy_question_id + "' href='javascript:void(0);' id='status_btn_" + policy_question_id + "' onClick ='updateStatus(" + policy_question_id + "," + quest_ans_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDeletePermanently(" + policy_question_id + ")'><b>Delete Permanently</b></a></div></div>";

                                datas += '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td><td>' + policy_question_section_name + '</td> <td><center>' + question + '</center></td><td>' + answer + '</td></tr>';
                            }
                        });

                    } else {
                        $("#total_quest_ans_data").text(" Count ( " + total_quest_ans_data + " ) ");
                        datas = '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="4"><center>Data Not Found</center></td> </tr>';
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

        $("#filter_section").val("null");
        $("#filter_question").val("");
        $("#filter_ans").val("");
        $("#filter_status").val("null");
        getQuestAnsList();
    }

    getQuestAnsList();

    function getQuestAnsList() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/policy_masterquestionans/get_quest_ans_list";
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
                    var total_quest_ans_data = 0;
                    $("#total_quest_ans_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var view_btn = "";
                        var status_btn = "";
                        var policy_question_id = "";
                        var question = "";
                        var answer = "";
                        var quest_ans_status = "";
                        var policy_question_section_name = "";
                        var datas = "";
                        var status = "";
                        total_quest_ans_data = data["total_quest_ans_data"];
                        $("#total_quest_ans_data").text(" Count ( " + total_quest_ans_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            policy_question_id = parseInt(data[key].policy_question_id);
                            question = data[key].question;
                            answer = data[key].answer;
                            quest_ans_status = data[key].quest_ans_status;
                            policy_question_section_name = data[key].policy_question_section_name;
                            var isActive = data[key].del_flag;
                            if (!isNaN(policy_question_id)) {
                                if (quest_ans_status == 1) {
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
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + policy_question_id + ")'><b>Delete</b></a>";
                                    // var delete_btn_txt = "<button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + policy_question_id + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + policy_question_id + ")'><b>Recover</b></a>";
                                    // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + policy_question_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                                }

                                // edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm edit' id='edit' value='' type='button' onClick ='onEdit(" + policy_question_id + ")' >Edit</button>";
                                // view_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view' id='view' value='' type='button' onClick ='onView(" + policy_question_id + ")' >View</button>";
                                // status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + policy_question_id + "' value='' type='button' onClick ='updateStatus(" + policy_question_id + "," + quest_ans_status + ")' >" + status + "</button>";
                                // delete_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm' value='' type='button' onClick ='OnDeletePermanently(" + policy_question_id + ")' >Delete Permanently</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + policy_question_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + policy_question_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + policy_question_id + "' href='javascript:void(0);' id='status_btn_" + policy_question_id + "' onClick ='updateStatus(" + policy_question_id + "," + quest_ans_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDeletePermanently(" + policy_question_id + ")'><b>Delete Permanently</b></a></div></div>";

                                datas += '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td><td>' + policy_question_section_name + '</td> <td><center>' + question + '</center></td><td>' + answer + '</td></tr>';
                            }
                        });

                    } else {
                        $("#total_quest_ans_data").text(" Count ( " + total_quest_ans_data + " ) ");
                        datas = '<tr class="" onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="4"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function updateStatus(policy_question_id, quest_ans_status) {

        var url = "<?php echo $base_url; ?>master/policy_masterquestionans/update_quest_ans_status";

        if (policy_question_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": policy_question_id,
                    "status": quest_ans_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + policy_question_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["quest_ans_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                            $("#edit_" + policy_question_id).addClass(status_btn_txt);
                            $("#status_btn_" + policy_question_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                            $("#edit_" + policy_question_id).addClass(status_btn_txt);
                            $("#status_btn_" + policy_question_id).text(status);
                        }

                        $("#status_btn_" + policy_question_id).text(status);


                        $('#status_btn_' + policy_question_id).attr('onClick', 'updateStatus(' + policy_question_id + ',' + data["userdata"]["quest_ans_status"] + ')');

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
        var path = window.location.pathname;
        var page = path.split("/").pop();
        var user_role_id = <?php echo  $this->session->userdata("@_user_role_id"); ?>;
        var submenu_permission = "<?php echo $this->session->userdata("@_user_role_sub_menu_permission"); ?>";
        var role_permission = '<?php echo $this->session->userdata("@_staff_role_permission"); ?>';
        var url = '<?php echo base_url(); ?>login/logout';
        if ((user_role_id != 1) && (user_role_id != 2)) {
            var id = $("#submenu").data("value");
            if (id != "") {
                CheckFormAccess(submenu_permission, 11, url);
                check(role_permission, 11);
            }
        }
    });
</script>