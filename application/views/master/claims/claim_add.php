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
                                            <h4 class="header-title">Claiment Info</h4>
                                        </div>
                                        <div class="col-md-4 offset-md-4 text-right">
                                            <input class='btn btn-facebook btn-sm' id='ListForm' value='Claim List' type='button' />
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
                                                                <select class="form-control col-md-6" id="claiment_name" name="claiment_name">
                                                                    <option value="" selected disabled>Select Name</option>
                                                                    <?php

                                                                    $members = count($result_data['member_data_arr']);
                                                                    for ($i = 0; $i < $members; $i++) {

                                                                    ?>
                                                                        <option data-position="<?php echo $i; ?>" value="<?php echo $result_data['member_data_arr'][$i]['id']; ?>"><?php echo $result_data['member_data_arr'][$i]['name']; ?></option>
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
                                                                <label for="policy_type" class="col-form-label col-md-6">Policy Type<span class="text-danger">*</span></label>
                                                                <select class="form-control col-md-6" id="policy_type" name="policy_type">
                                                                    <option value="" selected disabled>Select Type</option>

                                                                    <?php

                                                                    $question_list = count($result_data['question_list_data_arr']);
                                                                    for ($i = 0; $i < $question_list; $i++) {

                                                                    ?>
                                                                        <option data-position="<?php echo $i; ?>" value="<?php echo $result_data['question_list_data_arr'][$i]['id']; ?>"><?php echo $result_data['question_list_data_arr'][$i]['claims_type']; ?></option>
                                                                    <?php } ?>

                                                                </select>
                                                                <span id="policy_type_error"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="date_of_al" class="col-form-label col-md-6">Date of Admission/Loss<span class="text-danger">*</span></label>
                                                                <input type="date" name="date_of_al" id="date_of_al" placeholder="Date dd-mm-yyyy" class="form-control col-md-6">
                                                                <span id="date_of_al_error"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="policy_type" class="col-form-label col-md-6">Status<span class="text-danger">*</span></label>
                                                                <select class="form-control col-md-6" id="status" name="status">
                                                                    <option value="" selected disabled>Select Status</option>
                                                                    <option value="claim_intimated">Claim Intimated</option>
                                                                    <option value="paper_submitted">Paper Submitted</option>
                                                                </select>
                                                                <span class="text-right" id="status_error"></span>
                                                            </div>
                                                        </div>

                                                        <!-- <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <label for="format" class="col-form-label col-md-6">Letter Format<span class="text-danger">*</span></label>
                                                                <textarea id="format" name="format" class="form-control col-md-6"></textarea>
                                                                <span id="format_error"></span>
                                                            </div>
                                                        </div> -->

                                                    </div>

                                                    <hr>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <h4 class="header-title">Claim Questions</h4>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <!-- <div class="row" id="question_append">

                                                    </div> -->

                                                    <table class="table" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Question</th>
                                                                <th>Answer</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="question_append"></tbody>
                                                    </table>

                                                    <hr>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <h4 class="header-title">Letter Format</h4>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-8 offset-md-2" style="border: 1px solid #ccc!important;padding: 15px;border-radius: 10px;">
                                                            <div id="letter_format"></div>
                                                        </div>
                                                    </div>

                                                    <hr>

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
                // $(function() {
                //     $("#date_of_al").datepicker({
                //         'format': 'yyyy-mm-dd',
                //         'autoclose': true,
                //         'todayHighlight': true
                //     });
                // });


                // getPOLICYDetails();

                // function getPOLICYDetails() {
                //     var policy_id = <?php echo $id; ?>;
                //     var insurance_company = $("#insurance_company");
                //     var url = "<?php echo base_url(); ?>master/claims/loadAddClaimData";
                //     if (url != "") {

                //         $.ajax({
                //             url: url,
                //             data: {
                //                 'policy_id': policy_id
                //             },
                //             type: 'POST',
                //             dataType: 'json',
                //             async: false,
                //             cache: false,
                //             beforeSend: function() {},
                //             success: function(data) {
                //                 console.log(data);
                //                 //insurance_company.val(data['userdata']['company_name']);
                //                 //alert(data['userdata']['company_name']);
                //             },
                //             error: function(xhr, status) {
                //                 alert('Sorry, there was a problem!');
                //             },
                //             complete: function(xhr, status) {}
                //         });

                //     }
                // }



                function getSingleQuestionData(id) {
                    var url = "<?php echo base_url(); ?>master/claims/getSingleQuestionData";
                    if (url != "") {

                        $.ajax({
                            url: url,
                            data: {
                                'id': id
                            },
                            type: 'POST',
                            dataType: 'json',
                            async: false,
                            cache: false,
                            beforeSend: function() {},
                            success: function(data) {
                                $("#question_append").empty();
                                //console.log(data['question_data']['question']);
                                //console.log(data['question_data']);
                                //console.log(data['question']);
                                var actual_data = data['format'].split("#$!");
                                var final_data = "";
                                $.each(actual_data, function(key, k_val) {
                                    final_data += actual_data[key];
                                    var labels = "<span id='label_" + key + "'></span>";
                                    final_data += labels;
                                });

                                var ndata = '';
                                var data = data['question'];
                                var val = JSON.parse(data);
                                var i = 1;
                                $.each(val, function(key, k_val) {
                                    var question = val[key];

                                    ndata += '<tr><td width="50%"><div class="form-group row"><label for="answer" class="col-form-label col-md-12">' + question + '<span class="text-danger">*</span></label></td><td><input class="form-control col-md-12 answer" name="answer[]" onKeyup=onchangeAnswer("' + key + '") id="Answer_' + key + '" placeholder="Answer_' + (i++) + '" /> <span id="answer_error' + key + '"></span></div></td></tr>'
                                });
                                $("#question_append").append(ndata);
                                $("#letter_format").html(final_data);



                            },
                            error: function(xhr, status) {
                                alert('Sorry, there was a problem!');
                            },
                            complete: function(xhr, status) {}
                        });

                    }
                }

                function onchangeAnswer(id) {
                    var ids = "label_" + id;
                    $("#" + ids).html("<u><b>&nbsp;" + $("#Answer_" + id).val() + "&nbsp;<b><u>");
                }

                $('#policy_type').on('change', function() {
                    var id = this.value;
                    getSingleQuestionData(id);

                });


                // SAVE DATA To DATABASE

                $("#submit").click(function() {

                    var claiment_name = $("#claiment_name").val();
                    var policy_id = $("#policy_id").val();
                    var policy_type = $("#policy_type").val();
                    var date_of_al = $("#date_of_al").val();
                    var status = $("#status").val();
                    var date_of_al = $("#date_of_al").val();
                    var format = $("#letter_format").html();
                    var push = [];
                    var answers = [];

                    <?php if (!empty($eid)) : ?>
                        var id = '<?php echo $eid; ?>';
                    <?php else : ?>
                        var id = "";
                    <?php endif; ?>

                    $("#question_append tr:has(.answer)").each(function(key, val) {
                        answers.push($(".answer", this).val());
                    });
                    var url = "<?php echo base_url(); ?>master/claims/save_claim_step_one";

                    // push.push(claiment_name);
                    // push.push(policy_id);
                    // push.push(policy_type);
                    // push.push(date_of_al);
                    // push.push(status);
                    // push.push(format);
                    // push.push(answers);
                    // console.log(push);

                    $.ajax({
                        url: url,
                        data: {
                            claiment_name: claiment_name,
                            policy_id: policy_id,
                            policy_type: policy_type,
                            date_of_al:date_of_al,
                            status:status,
                            format:format,
                            answers:answers,
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
                                    window.location.href = '<?php echo base_url(); ?>master/claims/';
                                }, 2000);
                            }else{

                                if(data["message"]["claiment_name_error"] != ""){
                                    $("#claiment_name_error").addClass("text-danger").html(data["message"]["claiment_name_error"]);
                                    $("#claiment_name").addClass("parsley-error");
                                    //$("#claiment_name").required();
                                }else{
                                    $("#claiment_name_error").removeClass("text-danger").html("");
                                    $("#claiment_name").removeClass("parsley-error");
                                }

                                if(data["message"]["policy_type_error"] != ""){
                                    $("#policy_type_error").addClass("text-danger").html(data["message"]["policy_type_error"]);
                                    $("#policy_type").addClass("parsley-error");
                                    //$("#policy_type").required();
                                }else{
                                    $("#policy_type_error").removeClass("text-danger").html("");
                                    $("#policy_type").removeClass("parsley-error");
                                }

                                if(data["message"]["date_of_al_error"] != ""){
                                    $("#date_of_al_error").addClass("text-danger").html(data["message"]["date_of_al_error"]);
                                    $("#date_of_al").addClass("parsley-error");
                                    //$("#policy_type").required();
                                }else{
                                    $("#policy_type_error").removeClass("text-danger").html("");
                                    $("#policy_type").removeClass("parsley-error");
                                }

                                if(data["message"]["status_error"] != ""){
                                    $("#status_error").addClass("text-danger").html(data["message"]["status_error"]);
                                    $("#status").addClass("parsley-error");
                                    //$("#policy_type").required();
                                }else{
                                    $("#policy_type_error").removeClass("text-danger").html("");
                                    $("#status").removeClass("parsley-error");
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