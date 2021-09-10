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

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="header-title">View <?php echo $title; ?></h4>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4 text-right">
                                <a href="<?php echo base_url(); ?>master/premium_calculator/" class='btn btn-secondary waves-effect width-md btn-sm mb-1'>Back</a>
                            </div>
                        </div>



                        <!-- // Premium Calculator view Start -->
                        <div class="form-row mt-2">
                            <div class="col-md-12" id="append_premium_calculator"><?php //print_r($result); die(); ?></div>
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
    <script src="<?= base_url(); ?>assets/custom_js/common_premium_chart.js"></script>
    <script>
    var counter = 0;
    var client = '<?php echo $fk_client_id; ?>';
        var BaseURl = '<?php echo $base_url; ?>';
        $(document).ready(function() {
            load_view_normal('<?php echo $premium_calculator_policy_view2; ?>');
        });

        function view(val) {

        }

        var member_array = <?php echo json_encode($member_array); ?>;
       
        //alert(not_converted_sum_insured);

        $(document).ready(function() {
            GroupNameBasedMemberName(client);
            if (member_array != "")
                AddMediclaim_by_arra(member_array);
        });

        var not_converted_sum_insureds = '<?php echo $not_converted_sum_insured; ?>';

        function AddMediclaim_by_arra(member_array) {
            // alert(option_val_member_data);
            var tr_table = "";
            member_array = JSON.parse(member_array);
            $.each(member_array, function(key, val) {

                var member_id = member_array[key][0];
                var member_name = member_array[key][1];
                var member_dob = member_array[key][2];
                var member_age = member_array[key][3];
                var member_relation_id = member_array[key][4];
                var member_relation = member_array[key][5];

                tr_table += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + key + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + key + ')"> <option value="null">Select Member Names</option>' + option_val_member_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + key + '" name="name_insured_dob[]" value="" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + key + '" name="name_insured_age[]" value="" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + key + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach; endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + key + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_member_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + key + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach;      endif; ?> </select></td><td><select style="width:120px;" id="name_insured_policy_type_' + key + '" name="name_insured_policy_type[]" class="form-control name_insured_policy_type" onchange="remove_sumInsured_basedon_policyType(' + key + ')">  <option value="null">Select Policy Type</option> <option value="Platinum">Platinum</option> <option value="Gold">Gold</option><option value="Sr. Citizen">Sr. Citizen</option> </select></td><td><select style="width:110px;" id="name_insured_policy_option_' + key + '" name="name_insured_policy_option[]" class="form-control name_insured_policy_option" disabled><option value="Individual">Individual</option> <option value="Floater">Floater</option> </select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_' + key + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="premium_basedon_Type(' + key + ')"><option value="null">Select Sum Insured</option> ' + sum_insured_dropdown_val + '   </select></td><td width="8%"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium_' + key + '" value="" class="form-control name_insured_premium"></td><td width="8%"> <div class="row"><div class="col-md-12"><select style="width:90px;" id="dm_yes_no_' + key + '" name="dm_yes_no[]" class="form-control dm_yes_no" onchange="dm_yes_no(' + key + ')"> <option value="No">No</option><option value="Yes">Yes</option>   </select></div><div class="col-md-12 mt-1"><input style="width:90px;" type="text" name="dm_percentage[]" id="dm_percentage_' + key + '" value="10" class="form-control dm_percentage" onkeyup="dm_loading_Cal(' + key + ')"></div>  </div>  </td> <td width="8%"><input style="width:110px;" type="text" name="dm_loading[]" id="dm_loading_' + key + '" value="" class="form-control dm_loading"></td><td width="8%"><div class="row"> <div class="col-md-12"><select style="width:90px;" id="htn_yes_no_' + key + '" name="htn_yes_no[]" class="form-control htn_yes_no" onchange="htn_yes_no(' + key + ')"><option value="No">No</option><option value="Yes">Yes</option> </select></div> <div class="col-md-12 mt-1"><input style="width:90px;" type="text" name="htn_percentage[]" id="htn_percentage_' + key + '" value="10" class="form-control htn_percentage" onkeyup="htn_loading_Cal(' + key + ')"></div>  </div> </td> <td><input style="width:110px;" type="text" name="htn_loading[]" id="htn_loading_' + key + '" value="" class="form-control htn_loading"></td> <td><input style="width:110px;" type="text" name="premium_after_loading[]" id="premium_after_loading_' + key + '" value="" class="form-control premium_after_loading"></td> <td width="9%"> <select style="width:90px;" id="ncd_percentage_' + key + '" name="ncd_percentage[]" class="form-control ncd_percentage" onchange="ncd_amount_Cal(' + key + ')"> <option value="5">5%</option> <option value="10">10%</option><option value="15">15%</option> <option value="20">20%</option><option value="25">25%</option> </select>  </td><td><input style="width:110px;" type="text" name="ncd_amount[]" id="ncd_amount_' + key + '" value="" class="form-control ncd_amount"></td><td><input style="width:110px;" type="text" name="premium_after_ncd_amount[]" id="premium_after_ncd_amount_' + key + '" value="" class="form-control premium_after_ncd_amount"></td></tr>';

            });
            console.log(tr_table);
            $("#first_table_tbody").empty();
            //document.getElementById("first_table_tbody").appendChild(tr_table);filter_sum_insured
            $("#first_table_tbody").append(tr_table);
            var count = member_array.length;
            $.each(member_array, function(key, val) {
                var member_id = member_array[key][0];
                var member_name = member_array[key][1];
                var member_dob = member_array[key][2];
                var member_age = member_array[key][3];
                var member_relation_id = member_array[key][4];
                var member_relation = member_array[key][5];
                if (member_age > 61) {
                    var policy_type = "Sr. Citizen";
                } else if (member_age > 36) {
                    var policy_type = "Gold";
                } else if (member_age <= 36) {
                    var policy_type = "Platinum";
                }
                $("#name_insured_member_name_" + key).val(member_id);
                $("#name_insured_dob_" + key).val(member_dob);
                $("#name_insured_age_" + key).val(member_age);
                $("#name_insured_relation_" + key).val(member_relation_id);
                $("#name_insured_policy_type_" + key).val(policy_type);
                $("#name_insured_sum_insured_" + key).val(not_converted_sum_insureds);
                dm_yes_no(key);
                htn_yes_no(key);
                // main_Mediclaim.push(key);
            });
            $.each(member_array, function(key, val) {
                premium_basedon_Type(key)
            });
            $.each(member_array, function(key, val) {
                //$("#name_insured_sum_insured_" + key).val(not_converted_sum_insured);
                dm_yes_no(key);
                htn_yes_no(key);
                // main_Mediclaim.push(key);
            });
            $("#Add_Mediclaim").attr("onClick", "AddMediclaim(" + count + ")");
        }

        
    </script>
    <script src="<?= base_url(); ?>assets/custom_js/premium_cal.js"></script>