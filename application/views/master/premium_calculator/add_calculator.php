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
                                <h4 class="header-title"><?php echo $title; ?></h4>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4 text-right">
                                <a href="<?php echo base_url(); ?>master/premium_calculator/" class='btn btn-secondary waves-effect width-md btn-sm mb-1'>Back</a>
                            </div>
                        </div>

                        <div class="row">

                            <!-- <div class="card-box col-md-3 card-body">Priyanshu Singh</div> -->

                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label for="group_type" class="col-form-label col-md-5 text-right">Type</label>
                                    <div class="col-md-7">
                                        <select name="group_type" id="group_type" class="form-control group_type" onchange="GroupType()">
                                            <option value="null">Select Type</option>
                                            <option value="Group">Group</option>
                                            <option value="Without Group">Without Group</option>
                                        </select>
                                        <span id="group_type_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label for="group_name" class="col-form-label col-md-5 text-right">Group Name</label>
                                    <div class="col-md-7" id="group_name_select_div">
                                        <select name="group_name" id="group_name" class="form-control" onchange="GroupNameBasedMemberName()">
                                            <option value="null">Select Group Name</option>

                                        </select>
                                        <span id="group_name_err"></span>
                                    </div>
                                    <div class="col-md-7" id="group_name_input_div" style="display:none;">
                                        <input type="text" id="group_name" name="group_name" class="form-control group_name" value="">
                                        <span id="group_name_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label for="policy_option" class="col-form-label col-md-5 text-right">Policy Option</label>
                                    <div class="col-md-7">
                                        <select name="policy_option" id="policy_option" class="form-control" onchange="PolicyOption_family_Size()">
                                            <option value="null">Select Policy Option</option>
                                            <option value="Individual">Individual</option>
                                            <option value="Floater">Floater</option>
                                        </select>
                                        <span id="policy_option_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label for="type_of_policy" class="col-form-label col-md-5 text-right">Type Of Policy</label>
                                    <div class="col-md-7">
                                        <select name="type_of_policy" id="type_of_policy" class="form-control">
                                            <option value="null">Select Type Of Policy</option>
                                            <option value="Mediclaim">Mediclaim</option>
                                            <option value="Super Top UP">Super Top UP</option>
                                        </select>
                                        <span id="type_of_policy_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" id="family_size_div" style="display:none;">
                                <div class="form-group row">
                                    <label for="family_size" class="col-form-label col-md-5 text-right">Family Size</label>
                                    <div class="col-md-7">
                                        <select name="family_size" id="family_size" class="form-control" onchange="family_Size_Val()">
                                            <option value="null">Select Family Size</option>
                                        </select>
                                        <span id="family_size_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label for="sum_insured" class="col-form-label col-md-5 text-right">Sum Insured</label>
                                    <div class="col-md-7">
                                        <select name="sum_insured" id="sum_insured" class="form-control">
                                            <option value="null">Select Sum Insured</option>
                                        </select>
                                        <span id="sum_insured_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label for="protector_rider" class="col-form-label col-md-5 text-right">Protector Rider</label>
                                    <div class="col-md-7">
                                        <select name="protector_rider" id="protector_rider" class="form-control">
                                            <option value="null">Select Protector Rider</option>
                                            <option value="Not Opted">Not Opted</option>
                                            <option value="Opted">Opted</option>
                                        </select>
                                        <span id="protector_rider_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" id="filter_table_ind">
                                <table class="table mb-0 table-bordered" id="first_table_filter">
                                    <thead>
                                        <tr>
                                            <th><button class="btn btn-primary btn-sm Add_Filter" id="Add_Filter" onclick="AddFilter(0)">Add</button></th>
                                            <th>Name</th>
                                            <th>DOB</th>
                                            <th>Age</th>
                                            <th>Relation</th>
                                        </tr>
                                    </thead>
                                    <tbody id="first_table_ind_tbody">

                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-12" id="filter_table_float" style="display:none;">
                                <table class="table mb-0 table-bordered" id="first_table_filter">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>DOB</th>
                                            <th>Age</th>
                                            <th>Relation</th>
                                        </tr>
                                    </thead>
                                    <tbody id="first_table_float_tbody">

                                    </tbody>
                                </table>
                            </div>

                            <!-- btn btn-outline-danger waves-effect width-md waves-light  -->
                            <div class="col-md-5 mt-3"></div>
                            <div class="col-md-3 mt-3"><button type="submit" id="search" class="btn btn-outline-secondary waves-effect width-md btn-sm" onclick="Filter_Policy()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="search" class="btn btn-danger btn-sm ml-1" onclick="Filter_Policy_Reset()"><b>Reset</b></button></div>
                            <div class="col-md-4 mt-3"></div>

                        </div>

                        <!-- // Premium Calculator view Start -->
                        <div class="form-row mt-2">
                            <div class="col-md-12" id="append_premium_calculator"></div>
                        </div>
                        <div class="form-row mt-2">
                            <div class="col-md-12" id="append_premium_calculator_2"></div>
                        </div>
                        <div class="form-row mt-2">
                            <div class="col-md-12" id="append_premium_calculator_3"></div>
                        </div>

                        <div class="form-row mt-2">
                            <div class="col-md-12" id="save_calculation" style="display:none;">
                                <!-- <button type="submit" id="save_calculation_submit" class="btn btn-outline-secondary waves-effect width-md btn-sm" onclick="save_Calculation()">Save</button></div> -->
                            </div>
                            <!-- // Premium Calculator view End -->
                            <!-- <hr> -->
                            <!-- <div class="form-row mt-2">
                            <div class="form-group col-md-4">
                            </div>
                            <div class="form-group col-md-5">
                                <center><button type="submit" id="search" class="btn btn-primary btn-sm">Save</button></center>
                            </div>
                            <div class="form-group col-md-4"></div>
                        </div> -->
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
        var BaseURl = '<?php echo $base_url; ?>';
        var filter_counter = 0;
        var main_filter = [];
        var main_member_filter_Det = [];
        var main_age = [];
        var main_company_arr = [];
        var option_val_member_data = "";
        var group_id = "";
        // var option_val_data = option_val_member_data;
        var group_name_dropdown = '<?php $client_groupname = client_groupname_dropdown(); if (!empty($client_groupname)) : foreach ($client_groupname as $row6) : ?><option value="<?php echo $row6["id"]; ?>"><?php echo ucwords(addslashes($row6["grpname"])); ?></option><?php endforeach;  endif; ?>';

        function GroupType() {
            // alert(group_name_dropdown);
            var group_type = $("#group_type").val();
            // alert(group_type);
            if (group_type != "null") {
                if (group_type == "Group") {
                    $("#group_name_input_div").hide();
                    $("#group_name_select_div").show();
                    $("#group_name").append(group_name_dropdown);
                } else if (group_type == "Without Group") {
                    $("#group_name_input_div").show();
                    $("#group_name_select_div").hide();
                    $("#group_name").empty();
                }
            }
            $("#group_type").attr('disabled', 'disabled')
        }

        function AddFilter_float(Family_size_count) {
            $("#filter_table_ind").hide();
            $("#filter_table_float").show();
            var policy_holder_name = $("#policy_holder_name").val();
            var tr_table = "";
            $("#first_table_float_tbody").empty();

            for (var filter_counter = 0; filter_counter < Family_size_count; filter_counter++) {
                tr_table += '<tr><td><div id="filter_member_name_select_' + filter_counter + '"><select id="filter_member_name_' + filter_counter + '" name="filter_member_name[]" class="form-control filter_member_name" onchange="get_dob(' + filter_counter + ')"> <option value="null">Select Member Names</option>' + option_val_member_data + '</select></div><div id="filter_member_name_input_' + filter_counter + '" style="display:none;"><input type="text" id="filter_member_name_' + filter_counter + '" name="filter_member_name" class="form-control filter_member_name" value=""></div></td><td><input type="text" id="filter_dob_' + filter_counter + '" name="filter_dob[]" value="" class="form-control filter_dob"></td> <td><div class="row"><div class="col-md-6"><input type="text" id="adult_age_' + filter_counter + '" name="adult_age[]" value="" class="form-control adult_age"></div><div class="col-md-6 row" id="child_age_div_' + filter_counter + '" style="display:none;"><label class="col-md-6" id="">Age In Days</label><div class="col-md-6"><input type="text" id="child_age_' + filter_counter + '" name="child_age[]" value="" class="form-control child_age"></div></div></div></td><td><select style="width:120px;" id="filter_member_relation_' + filter_counter + '" name="filter_member_relation[]" class="form-control filter_member_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value ="<?php echo $relation["relation_id"]; ?>"> <?php echo $relation["relation_title"]; ?> </option> <?php endforeach;  endif; ?> </select></td> </tr>';
            }
            $("#first_table_float_tbody").append(tr_table);

            for (var filter_counter = 0; filter_counter < Family_size_count; filter_counter++) {
                // if (filter_counter == 0) {
                //     $("#filter_member_name_" + filter_counter).val(policy_holder_name);
                //     get_dob(filter_counter);
                // }
                if (filter_counter == 0) {
                var filter_member_relation = $('#filter_member_relation_' + filter_counter + ' option').filter(function() {
                    return $(this).html() == "Self";
                }).val();
                $('#filter_member_relation_' + filter_counter).val('22');
            }
                GroupType_2(filter_counter);
            }
        }

        function AddFilter(filter_counter) {
            main_filter.push(filter_counter);
            var tr_table = '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_Filter_' + filter_counter + '" onClick=RemoveFilter(' + filter_counter + ') ></td><td><div id="filter_member_name_select_' + filter_counter + '"><select id="filter_member_name_' + filter_counter + '" name="filter_member_name[]" class="form-control filter_member_name" onchange="get_dob(' + filter_counter + ')"> <option value="null">Select Member Names</option>' + option_val_member_data + '</select></div><div id="filter_member_name_input_' + filter_counter + '" style="display:none;"><input type="text" id="filter_member_name_inp_' + filter_counter + '" name="filter_member_name_inp" class="form-control filter_member_name_inp" value=""></div></td><td><input type="text" id="filter_dob_' + filter_counter + '" name="filter_dob[]" value="" class="form-control filter_dob"></td> <td><div class="row"><div class="col-md-6"><input type="text" id="adult_age_' + filter_counter + '" name="adult_age[]" value="" class="form-control adult_age"></div><div class="col-md-6 row" id="child_age_div_' + filter_counter + '" style="display:none;"><label class="col-md-6" id="">Age In Days</label><div class="col-md-6"><input type="text" id="child_age_' + filter_counter + '" name="child_age[]" value="" class="form-control child_age"></div></div></div></td><td><select style="width:120px;" id="filter_member_relation_' + filter_counter + '" name="filter_member_relation[]" class="form-control filter_member_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"> <?php echo $relation["relation_title"]; ?> </option> <?php endforeach; endif; ?> </select></td> </tr>';
            $("#first_table_ind_tbody").append(tr_table);
            if (filter_counter == 0) {
                var filter_member_relation = $('#filter_member_relation_' + filter_counter + ' option').filter(function() {
                    return $(this).html() == "Self";
                }).val();
                // alert(filter_member_relation);
                $('#filter_member_relation_' + filter_counter).val('22');
            }

            GroupType_2(filter_counter);
            filter_counter = filter_counter + 1;
            $("#Add_Filter").attr("onClick", "AddFilter(" + filter_counter + ")");
        }
    </script>
    <script src="<?= base_url(); ?>assets/custom_js/premium_cal.js"></script>