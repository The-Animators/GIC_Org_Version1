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
                                            <h4 class="header-title"><?php echo $title; ?></h4>
                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-4 text-right">
                                            <a href="<?php echo base_url() . "master/claims/claims_questions"; ?>" class='btn btn-secondary waves-effect btn-xs'>Back</a>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                            
                                            <?php if(!empty($result_data['claims_type'])){ ?>

                                            <div class="form-row">

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label for="claims_type" class="col-form-label col-md-2">Claim Type<span class="text-danger">*</span></label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="claims_type" id="claims_type" placeholder="Enter Claims Type" class="form-control" value="<?php if(!empty($result_data['claims_type'])): echo $result_data['claims_type']; endif; ?>">
                                                            <span id="claims_type_error"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="format" class="col-form-label">Letter Format<span class="text-danger">*</span></label>
                                                            <textarea id="format" name="format" class="form-control"><?php echo $result_data['format']; ?></textarea>
                                                            <span id="format_error"></span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="question" class="col-form-label">Questions to be asked <span class="text-danger">*</span></label>
                                                            <table style="border: 1px solid #dddddd;padding: 8px; width: 100%;">
                                                                
                                                            <?php
                                                            
                                                                $array = json_decode($result_data['question']);
                                                                $count = count($array);
                                                            
                                                            ?>

                                                                <tbody id="append_question">

                                                                <?php

                                                                    for($i = 0; $i < $count; $i++){


                                                                    
                                                                ?>

                                                                    

                                                                    <tr style="padding:10px;">
                                                                        <td style="border: 1px solid #dddddd;">
                                                                            <input type="text" name="question[] " id="question" value="<?php echo $array[$i]; ?>" placeholder="Enter question" class="form-control question">
                                                                        </td>
                                                                        <td style="border: 1px solid #dddddd;">
                                                                        <?php if($i == 0): ?>
                                                                            <center><button class="btn btn-primary btn-sm dripicons-plus" id="add_question_0" onClick="AddQuestion(<?php echo $count+1; ?>)"></center></button>
                                                                        <?php else: ?>

                                                                            <center><button class="btn btn-danger btn-sm dripicons-cross" id="remove_question_<?php echo $i; ?>" onClick="RemoveQuestion(<?php echo $i; ?>)"></button></center>

                                                                        <?php endif; ?>
                                                                        </td>
                                                                    </tr>

                                                                <?php } ?>

                                                                </tbody>

                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <hr>

                                                <div class="col-md-6 offset-md-3 mt-2">
                                                    <center>
                                                        <button id="submit" class="btn btn-primary btn-sm">Save Policy</button>
                                                    </center>
                                                </div>  
                                                
                                            </div>

                                            <?php }else{ ?>

                                                <div class="form-row">

                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label for="claims_type" class="col-form-label col-md-2">Claim Type<span class="text-danger">*</span></label>
                                                            <div class="col-md-10">
                                                                <input type="text" name="claims_type" id="claims_type" placeholder="Enter Claims Type" class="form-control" >
                                                                <span id="claims_type_error"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="format" class="col-form-label">Letter Format<span class="text-danger">*</span></label>
                                                                <textarea id="format" name="format" class="form-control"></textarea>
                                                                <span id="format_error"></span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="question" class="col-form-label">Questions to be asked <span class="text-danger">*</span></label>
                                                                <table style="border: 1px solid #dddddd;padding: 8px; width: 100%;">

                                                                    <tbody id="append_question">

                                                                        <tr style="padding:10px;">
                                                                            <td style="border: 1px solid #dddddd;">
                                                                                <input type="text" name="question[] " id="question" placeholder="Enter question" class="form-control question">
                                                                            </td>
                                                                            <td style="border: 1px solid #dddddd;">
                                                                                <center><button class="btn btn-primary btn-sm dripicons-plus" id="add_question_0" onClick="AddQuestion(0)"></center></button>
                                                                            </td>
                                                                        </tr>

                                                                    </tbody>

                                                                </table>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="col-md-6 offset-md-3 mt-2">
                                                        <center>
                                                            <button id="submit" class="btn btn-primary btn-sm">Save Policy</button>
                                                        </center>
                                                    </div>  

                                                    </div>

                                            <?php } ?>

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

                $(document).ready(function() { $("#format").summernote({ height: 400, minHeight: null, maxHeight: null, focus: !1 }), $(".inline-editor").summernote({ airMode: !0 }) });

                function AddQuestion(add_remark) {
                    add_remark = add_remark + 1;
                    $("#add_question_0").attr("onClick", "AddQuestion(" + add_remark + ")");
                    var tr_table = '<tr style="padding:10px;"> <td > <input type="text" name="question[]" id="question_' + add_remark + '" value="" placeholder="Enter question" class="form-control question"> </td><td style="border: 1px solid #dddddd;"> <center><button class="btn btn-danger btn-sm dripicons-cross" id="remove_question_' + add_remark + '" onClick="RemoveQuestion(' + add_remark + ')"></center></button> </td></tr>';
                    $("#append_question").append(tr_table);
                }

                function RemoveQuestion(add_remark) {
                    $("#remove_question_" + add_remark).closest("tr").remove();
                }

                
                $("#submit").click(function() {
                    var claims_type = $("#claims_type").val();
                    var format      = $("#format").val();
                    var navid       = [];
                    <?php if(!empty($id)): ?>
                    var id = '<?php echo $id; ?>';
                    <?php else: ?>
                        var id = "";
                    <?php endif; ?>
                    // alert(id);
                    // return false;
                    $("#append_question tr:has(.question)").each(function(key, val) {
                        navid.push($(".question", this).val());
                    });
                    var url = "<?php echo base_url(); ?>master/claims/save_questions";

                    $.ajax({
                        url: url,
                        data: {
                            claims_type: claims_type,
                            format: format,
                            navid: navid,
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
                                    window.location.href = '<?php echo base_url(); ?>master/claims/claims_questions';
                                }, 1500);
                            }else{

                                if(data["message"]["claims_type_error"] != ""){
                                    $("#claims_type_error").addClass("text-danger").html(data["message"]["claims_type_error"]);
                                    $("#claims_type").addClass("parsley-error");
                                    $("#claims_type").focus();
                                }else{
                                    $("#claims_type_error").removeClass("text-danger").html("");
                                    $("#claims_type").removeClass("parsley-error");
                                }

                                if(data["message"]["format_error"] != ""){
                                    $("#format_error").addClass("text-danger").html(data["message"]["format_error"]);
                                }else{
                                    $("#claims_type_error").removeClass("text-danger").html("");
                                }
                                
                            }
                            
                        },
                        error: function(request, status, error) {
                            //alert('Error: '+request.error);
                        }
                    });

                });


                function toast(heading, message_txt, icon){
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
