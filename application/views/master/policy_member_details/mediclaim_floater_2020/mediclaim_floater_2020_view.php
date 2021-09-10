<style>
    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    /* tr:nth-child(even) {
        background-color: #f2f2f2
    } */
</style>
<div class="row">
    <div class="col-md-12" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="first_table">
            <thead>
                <tr>
                    <th>Name Of Insured</th>
                    <th>DOB</th>
                    <th>Age</th>
                    <th>Relations</th>
                    <th>Past History</th>
                    <th>Type Of Policy</th>
                    <th>Option </th>
                    <th>Nominee Name</th>
                    <th>Nominee Relations</th>
                    <th>Sum Insured</th>
                    <th>Premium</th>
                    <th>NCD (No Claim Discount)</th>
                    <th>Premium After NCD</th>
                </tr>
            </thead>
            <tbody id="first_table_tbody">

            </tbody>
            <input type="hidden" id="max_age" name="max_age" value="">
        </table>
    </div>
    <div class="col-md-12">
        <table class="table mb-0 table-bordered mt-2 col-md-12">
            <tr id="declaration_sale_fig_tr">
                <td colspn="2"><strong> Total Premium: </strong></td>
                <td colspn="2"><strong></strong></td>
                <td><strong id="medi_float_2020_total_premium_td"><input type="text" id="medi_float_2020_total_premium" name="medi_float_2020_total_premium" class="form-control" disabled></strong></td>
            </tr>
            <tr id="annual_turn_over_tr">
                <td colspn=""><strong> Premium For Additional Child: </strong></td>
                <td colspn=""><strong>
                        <div class="row">
                            <div class="col-md-6"><input type="text" id="medi_float_2020_child_count" name="medi_float_2020_child_count" class="form-control" disabled></div>
                            <div class="col-md-6"><input type="text" id="medi_float_2020_child_count_first_premium" name="medi_float_2020_child_count_first_premium" class="form-control" disabled></div>
                        </div>
                    </strong></td>
                <td><strong id="medi_float_2020_child_total_premium_td"><input type="text" id="medi_float_2020_child_total_premium" name="medi_float_2020_child_total_premium" class="form-control" disabled></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Add Loading: </strong></td>
                <td colspn=""><strong id="medi_float_2020_load_description_td"><textarea class="form-control" name="medi_float_2020_load_description" id="medi_float_2020_load_description"></textarea></strong></td>
                <td><strong id="medi_float_2020_load_amount_td"><input type="text" id="medi_float_2020_load_amount" name="medi_float_2020_load_amount" class="form-control" onkeyup="add_load_amount()"></td>
            </tr>

            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Restore Cover Premium: </strong></td>
                <td colspn=""><strong id=""></strong></td>
                <td><strong id="medi_float_2020_restore_cover_premium_td"><input type="text" id="medi_float_2020_restore_cover_premium" name="medi_float_2020_restore_cover_premium" class="form-control"></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Maternity & New Born Baby Cover PREMIUM: </strong></td>
                <td colspn=""><strong id=""></strong></td>
                <td><strong id="medi_float_2020_maternity_new_bornbaby_td"><input type="text" id="medi_float_2020_maternity_new_bornbaby" name="medi_float_2020_maternity_new_bornbaby" class="form-control"></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Daily Cash Allowance on Hospitalization Cover Premium (consider B chart): </strong></td>
                <td colspn=""><strong id=""></strong></td>
                <td><strong id="medi_float_2020_daily_cash_allow_hosp_td"><input type="text" id="medi_float_2020_daily_cash_allow_hosp" name="medi_float_2020_daily_cash_allow_hosp" class="form-control"></td>
            </tr>

            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Premium After Loading/Gross Premium: </strong></td>
                <td colspn=""><strong id=""></strong></td>
                <td><strong id="medi_float_2020_load_gross_premium_td"><input type="text" id="medi_float_2020_load_gross_premium" name="medi_float_2020_load_gross_premium" class="form-control"></td>
            </tr>
            <tr>
                <td colspn=""><strong> CGST:</strong></td>
                <td><strong id="medi_float_2020_cgst_rate_td"><input type="text" id="cgst_fire_per" name="medi_float_2020_cgst_rate" class="form-control" onkeyup="gst_apply()"></td>
                <td><strong id="medi_float_2020_cgst_tot_td"><input type="text" id="medi_float_2020_cgst_tot" name="medi_float_2020_cgst_tot" class="form-control"></td>
            </tr>
            <tr>
                <td><strong> SGST</strong></td>
                <td><strong id="medi_float_2020_sgst_rate_td"><input type="text" id="sgst_fire_per" name="medi_float_2020_sgst_rate" class="form-control" onkeyup="gst_apply()"></td>
                <td><strong id="medi_float_2020_sgst_tot_td"><input type="text" id="medi_float_2020_sgst_tot" name="medi_float_2020_sgst_tot" class="form-control"></td>
            </tr>
            <tr>
                <td colspn="3"><strong class="text-purple">Final Premium</strong></td>
                <td colspn="3"><strong class="text-purple"></strong></td>
                <td><strong id="medi_float_2020_final_premium_td"><input type="text" id="medi_float_2020_final_premium" name="medi_float_2020_final_premium" class="form-control" disabled><input type="hidden" id="medi_floater_2020_id" name="medi_floater_2020_id" class="form-control"></td>
            </tr>
        </table>
    </div>
</div>

<script>
    var floater2020_dropdown_val = "";

    sum_insured_dropdown();

    function sum_insured_dropdown() {
        var sum_Val = ["1,00,000", "1,50,000", "2,00,000", "2,50,000", "3,00,000", "3,50,000", "4,00,000", "4,50,000", "5,00,000", "6,00,000", "7,00,000", "8,00,000", "9,00,000", "10,00,000", "15,00,000", "20,00,000", "25,00,000"];
        var i = 0;
        for (i; i <= 16; i++) {
            floater2020_dropdown_val += '<option value="' + sum_Val[i] + '">' + sum_Val[i] + '</option>';
        }
        // alert(sum_insured_dropdown_val);
        $(".name_insured_sum_insured").append(floater2020_dropdown_val);
    }

    function family_Size_Val(family_size_new) {
        var sub_policy_name_hidden = $("#sub_policy_name").is(":visible");
        if (sub_policy_name_hidden == true) {
            var sub_policy_name = $("#sub_policy_name").val();
            if (sub_policy_name == "null" || sub_policy_name == "") {
                toaster(message_type = "Error", message_txt = "The Floater Sub Policy Name field is required.", message_icone = "error");
                return false;
            }
        }
        // alert(family_size_new);
        if (family_size_new != "" && family_size_new != "null" && family_size_new != undefined)
            var sub_policy_family_size= family_size_new;
        else
            var sub_policy_family_size= $("#sub_policy_family_size").val();

        if (sub_policy_family_size== "1A + 1C")
            var Family_size_count = 2;
        else if (sub_policy_family_size== "1A + 2C")
            var Family_size_count = 3;
        else if (sub_policy_family_size== "2A + 0C")
            var Family_size_count = 2;
        else if (sub_policy_family_size== "2A + 2C")
            var Family_size_count = 4;
        else if (sub_policy_family_size== "2A + 1C")
            var Family_size_count = 3;
        else if (sub_policy_family_size== "2A + 3C")
            var Family_size_count = 5;

        //     if (family_size == 1)
        //     var Family_size_count = 2;
        // else if (family_size == 2)
        //     var Family_size_count = 3;
        // else if (family_size == 3)
        //     var Family_size_count = 4;
        // else if (family_size == 4)
        //     var Family_size_count = 2;
        // else if (family_size == 5)
        //     var Family_size_count = 3;
        // else if (family_size == 6)
        //     var Family_size_count = 5;
        AddMediclaim_2020(Family_size_count);
    }

    function AddMediclaim_2020(Family_size_count) {
        var policy_holder_name = $("#policy_holder_name").val();
        var tr_table = "";

        $("#first_table_tbody").empty();
        // alert(add_medi_counter);
        for (var add_medi_counter = 0; add_medi_counter < Family_size_count; add_medi_counter++) {
            // alert(floater2020_dropdown_val);
            tr_table += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_counter + '" name="name_insured_dob[]" value="" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_counter + '" name="name_insured_age[]" value="" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;     endif; ?> </select></td><td><textarea  style="width:120px;" class="form-control past_history" name="past_history[]" id="past_history_' + add_medi_counter + '"></textarea></td> <td><select style="width:120px;" id="name_insured_policy_type_' + add_medi_counter + '" name="name_insured_policy_type[]" class="form-control name_insured_policy_type" onchange="Name_insuredPolicy_type(' + add_medi_counter + ')">  <option value="Family Floater 2020">Family Floater 2020 </option> </select></td><td><select style="width:110px;" id="name_insured_policy_option_' + add_medi_counter + '" name="name_insured_policy_option[]" class="form-control name_insured_policy_option"><option value="Individual">Individual</option> <option value="Floater" selected>Floater</option> </select></td>';

            if (add_medi_counter == 0) {
                tr_table += '<td width="12%" rowspan="' + Family_size_count + '" align="center"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option> '+option_val_data+'</select></td>  <td rowspan="' + Family_size_count + '" align="center"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();    if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%" rowspan="' + Family_size_count + '" align="center"><select style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_premiumBasedon_age_sumInsured_PolicyType()"><option value="null">Select Sum Insured</option> ' + floater2020_dropdown_val + '   </select></td><td width="8%" rowspan="' + Family_size_count + '"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium" value="" class="form-control name_insured_premium"></td><td width="8%" rowspan="' + Family_size_count + '"><input style="width:110px;" type="text" name="name_insured_ncd[]" id="name_insured_ncd" class="form-control name_insured_ncd" onkeyup="name_insured_ncd_Cal()" value=""></td><td width="8%" rowspan="' + Family_size_count + '"><input style="width:110px;" type="text" name="name_insured_premium_after_ncd[]" id="name_insured_premium_after_ncd" value="" class="form-control name_insured_premium_after_ncd"></td></tr>';
            }
        }
        //var tr_table_1 = '<td width="12%" rowspan="' + Family_size_count + '"><select style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_premiumBasedon_age_sumInsured_PolicyType()(' + add_medi_counter + ')"><option value="null">Select Sum Insured</option> ' + sum_insured_dropdown_val + '   </select></td><td width="8%" rowspan="' + Family_size_count + '"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium" value="" class="form-control name_insured_premium"></td></tr>';
        //  alert(Family_size_count);

        $("#first_table_tbody").append(tr_table);
        for (var add_medi_counter = 0; add_medi_counter < Family_size_count; add_medi_counter++) {

            var policy_type = $("#name_insured_policy_type_" + add_medi_counter).val();
            // alert(policy_type);
            if (policy_type == "Family Floater 2020") {
                document.getElementById("name_insured_policy_option_" + add_medi_counter).disabled = true;
            } else {
                // document.getElementById("name_insured_policy_option_"+add_medi_counter).disabled = false; 
            }
        }

        for (var add_medi_counter = 0; add_medi_counter < Family_size_count; add_medi_counter++) {
            if(add_medi_counter == 0){
                $("#name_insured_member_name_" + add_medi_counter).val(policy_holder_name);
                get_dob(add_medi_counter);
            }
        }

    }

    function get_age_Comparision() {
        var inputs = $(".name_insured_age");
        var size = inputs.length;
        // alert(size);
        var total = "";
        for (var i = 0; i < inputs.length; i++) {
            var name_insured_age = $(inputs[i]).val();
            name_insured_age = parseInt(name_insured_age);
            if (isNaN(name_insured_age))
                name_insured_age = 0;
            else
                name_insured_age = name_insured_age;

            total += " " + name_insured_age;
        }
        get_age_comp_split(total, size);
    }

    function get_age_comp_split(total, size) {
        var split_val = total.split(" ");
        var ageArr = [];
        // alert(size);
        for (var i = 0; i <= size; i++) {
            var final_age = split_val[i];
            ageArr.push(final_age);
        }
        getMaxAge(ageArr)
    }

    function getMaxAge(ageArr) {
        // alert(ageArr);
        var max_age = Math.max.apply(Math, ageArr);
        $("#max_age").val(max_age);
        // alert(max_age);
        get_premiumBasedon_age_sumInsured_PolicyType();
    }

    var actual_data_Mediclaim_floater2020 = [];

    function Total_Mediclaim_floater2020() {
        actual_data_Mediclaim_floater2020 = [];

        $("#first_table tr:has(.name_insured_member_name)").each(function(key, val) {

            var name_insured_member_name = $(".name_insured_member_name", this).val();
            var name_insured_member_name_txt = $(".name_insured_member_name option:selected", this).text();
            var name_insured_dob = $(".name_insured_dob", this).val();
            var name_insured_age = $(".name_insured_age", this).val();
            var name_insured_relation = $(".name_insured_relation", this).val();
            var name_insured_relation_txt = $(".name_insured_relation option:selected", this).text();
            var past_history = $(".past_history", this).val();
            var name_insured_policy_type = $(".name_insured_policy_type", this).val();
            var name_insured_policy_option = $(".name_insured_policy_option", this).val();
            var name_insured_sum_insured = $(".name_insured_sum_insured", this).val();
            var name_insured_premium = $(".name_insured_premium", this).val();
            var name_insured_ncd = $(".name_insured_ncd", this).val();
            var name_insured_premium_after_ncd = $(".name_insured_premium_after_ncd", this).val();
            var nominee_name = $(".nominee_name", this).val();
            var nominee_relation = $(".nominee_relation", this).val();
            
            var nominee_name_txt = $(".nominee_name option:selected", this).text();
            var nominee_relation_txt = $(".nominee_relation option:selected", this).text();

            actual_data_Mediclaim_floater2020.push([key, name_insured_member_name, name_insured_member_name_txt, name_insured_dob, name_insured_age, name_insured_relation, name_insured_relation_txt, past_history, name_insured_policy_type, name_insured_policy_option, name_insured_sum_insured, name_insured_premium, name_insured_ncd, name_insured_premium_after_ncd,nominee_name,nominee_relation,nominee_name_txt,nominee_relation_txt]);
            if (name_insured_member_name == '')
                actual_data_Mediclaim_floater2020.splice(key, 1);
        });
        // console.log(actual_data_Mediclaim_floater2020);
        // alert(actual_data_Mediclaim_floater2020);
        return actual_data_Mediclaim_floater2020;

        // var total_mediclaim_floater2020 = JSON.stringify(Total_Mediclaim_floater2020());
        // alert(total_mediclaim_floater2020);
        // return false;
    }
    // Calculation Section Start

    function dateFormate_new(value) {
        var date = value.split("-");

        var day = (date[0]),
            month = (date[1]),
            year = (date[2]);

        if (!$.isNumeric(month)) {
            month = getMonthFromString(month);
        }
        var new_date = new Date(year, month - 1, day).toLocaleDateString('en-CA');

        var date = new Date(new_date),
            get_y = date.getFullYear(),
            get_m = ("0" + (date.getMonth() + 1)).slice(-2);
        get_d = ("0" + date.getDate()).slice(-2);

        var org_date = get_d + "-" + get_m + "-" + get_y;

        return org_date;
    }

    function getMonthFromString(mon) {
        return new Date(Date.parse(mon + " 1, 2012")).getMonth() + 1
    }

    function get_dob(add_medi_counter) {
        // alert(add_medi_counter);

        var rowCount = $('#first_table tbody tr').length;

        if (add_medi_counter == 0) {
            var name_insured_relation = $('#name_insured_relation_' + add_medi_counter + ' option').filter(function() {
                return $(this).html() == "Self";
            }).val();
            $('#name_insured_relation_' + add_medi_counter).val(name_insured_relation);
        }
        // alert(rowCount);
        if (rowCount == 1) {
            // var name_insured_relation = $('#name_insured_relation').find('option[text="Self"]').val();
            // var name_insured_relation =  $('#name_insured_relation_'+add_medi_counter+' option').filter(function () { return $(this).html() == "Self"; }).val();
            // $('#name_insured_relation_'+add_medi_counter).val(name_insured_relation);
        }

        var name_insured_member_name = $("#name_insured_member_name_" + add_medi_counter).val();
        // alert(name_insured_member_name);
        var url = "<?php echo base_url(); ?>master/policy/get_membernameBased_details";

        if (name_insured_member_name != "") {
            $.ajax({
                url: url,
                data: {
                    member_name: name_insured_member_name
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    if (data["status"] == true) {
                        $('#name_insured_dob_' + add_medi_counter).val("");
                        var dob = data["userdata"].dob;
                        // alert(dob);
                        if (dob == "null") {
                            dob = "";
                            toaster(message_type = "Error", message_txt = "The DOB field is required.", message_icone = "error");
                        } else {
                            dob = dateFormate(dob);
                        }
                        // alert(dob);
                        $('#name_insured_dob_' + add_medi_counter).val(dob);
                        get_age(add_medi_counter);
                    } else {
                        $('#name_insured_dob_' + add_medi_counter).val("");
                    }
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function get_age(add_medi_counter) {
        var sub_policy_name_hidden = $("#sub_policy_name").is(":visible");
        if (sub_policy_name_hidden == true) {
            var sub_policy_name = $("#sub_policy_name").val();
            if (sub_policy_name == "null" || sub_policy_name == "") {
                toaster(message_type = "Error", message_txt = "The Floater Sub Policy Name field is required.", message_icone = "error");
                return false;
            }
        }
        var name_insured_member_name = $("#name_insured_member_name_" + add_medi_counter).val();
        var name_insured_dob = $("#name_insured_dob_" + add_medi_counter).val();
        // alert(name_insured_dob);
        var url = "<?php echo base_url(); ?>master/policy/get_age_calculation_basedon_dob";

        if (name_insured_member_name != "") {
            $.ajax({
                url: url,
                data: {
                    member_id: name_insured_member_name,
                    dob: name_insured_dob
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    if (data["status"] == true) {
                        $('#name_insured_age_' + add_medi_counter).val("");
                        var age = data["age"];
                        $('#name_insured_age_' + add_medi_counter).val(age);
                    } else {
                        $('#name_insured_age_' + add_medi_counter).val("");
                    }
                    get_age_Comparision();
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function getcolumnOnAge(age) {
        var sub_policy_family_size= $("#sub_policy_family_size").val();

        if (sub_policy_family_size== "2A + 0C")
            var size_txt = "2a_0c";
        else if (sub_policy_family_size== "2A + 1C")
            var size_txt = "2a_1c";
        else if (sub_policy_family_size== "2A + 2C")
            var size_txt = "2a_2c";
        else if (sub_policy_family_size== "1A + 1C")
            var size_txt = "1a_1c";
        else if (sub_policy_family_size== "1A + 2C")
            var size_txt = "1a_2c";
        else if (sub_policy_family_size== "2A + 3C")
            var size_txt = "2a_3c";

        // alert(size_txt);
        var column_value = "";
        if (size_txt == "1a_1c" || size_txt == "1a_2c") {
            if (age <= 25) {
                column_value = "18_25";
            } else if (age <= 30) {
                column_value = "26_30";
            } else if (age <= 35) {
                column_value = "31_35";
            } else if (age <= 40) {
                column_value = "36_40";
            } else if (age <= 45) {
                column_value = "41_45";
            } else if (age <= 50) {
                column_value = "46_50";
            } else if (age <= 55) {
                column_value = "51_55";
            } else if (age <= 60) {
                column_value = "56_60";
            } else if (age <= 65) {
                column_value = "61_65";
            } else if (age <= 70) {
                column_value = "66_70";
            } else if (age <= 75) {
                column_value = "71_75";
            } else if (age > 75) {
                column_value = ">75";
            }
        }

        if (size_txt == "2a_0c" || size_txt == "2a_1c" || size_txt == "2a_2c" || size_txt == "2a_3c") {
            if (age <= 30) {
                column_value = "18_30";
            } else if (age <= 35) {
                column_value = "31_35";
            } else if (age <= 40) {
                column_value = "36_40";
            } else if (age <= 45) {
                column_value = "41_45";
            } else if (age <= 50) {
                column_value = "46_50";
            } else if (age <= 55) {
                column_value = "51_55";
            } else if (age <= 60) {
                column_value = "56_60";
            } else if (age <= 65) {
                column_value = "61_65";
            } else if (age <= 70) {
                column_value = "66_70";
            } else if (age <= 75) {
                column_value = "71_75";
            } else if (age > 75) {
                column_value = ">75";
            }
        }
        // alert(column_value);
        return column_value;
    }

    function get_premiumBasedon_age_sumInsured_PolicyType() {
        var sub_policy_family_size= $("#sub_policy_family_size").val();

        if (sub_policy_family_size== "2A + 0C")
            var family_size_txt = "2a_0c";
        else if (sub_policy_family_size== "2A + 1C")
            var family_size_txt = "2a_1c";
        else if (sub_policy_family_size== "2A + 2C")
            var family_size_txt = "2a_2c";
        else if (sub_policy_family_size== "1A + 1C")
            var family_size_txt = "1a_1c";
        else if (sub_policy_family_size== "1A + 2C")
            var family_size_txt = "1a_2c";
        else if (sub_policy_family_size== "2A + 3C")
            var family_size_txt = "2a_3c";

        //     if (family_size == 1)
        //     var family_size_txt = "2a_0c";
        // else if (family_size == 2)
        //     var family_size_txt = "2a_1c";
        // else if (family_size == 3)
        //     var family_size_txt = "2a_2c";
        // else if (family_size == 4)
        //     var family_size_txt = "1a_1c";
        // else if (family_size == 5)
        //     var family_size_txt = "1a_2c";
        // else if (family_size == 6)
        //     var family_size_txt = "2a_3c";

        var max_age = $("#max_age").val();
        var name_insured_sum_insured = $("#name_insured_sum_insured").val();
        var column_value = getcolumnOnAge(max_age);

        if (max_age != "" && name_insured_sum_insured != "null" && name_insured_sum_insured != "" && column_value != "" && family_size_txt != "" && family_size_txt != "null") {
            var url = "<?php echo base_url(); ?>master/remote/get_floater_2020_chart";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        max_age: max_age,
                        column_value: column_value,
                        condition_value: name_insured_sum_insured,
                        family_size_txt: family_size_txt,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            $('#name_insured_premium').val("");
                            new_premium = parseInt(data["userdata"]);
                            $('#name_insured_premium').val(new_premium);
                            // $("#medi_float_2020_total_premium").val(new_premium);
                            $("#name_insured_ncd").val(0);
                        } else {
                            $('#name_insured_premium').val("");
                        }
                        get_premium_Of_Child(name_insured_sum_insured);
                        name_insured_ncd_Cal();
                        get_Restore_cover_Premium();
                        get_Maternity_cover_Premium();
                        get_DailyCashAllowenceBB_cover_Premium();
                    },
                    error: function(xhr, status) {
                        alert('Sorry, there was a problem!');
                    },
                    complete: function(xhr, status) {

                    }
                });
            }
        }

    }

    function getchild_age_Cond(age) {
        var addition_of_more_child = $("#sub_policy_add_child").val();

        if (addition_of_more_child == 1)
            var size_txt = "per_child";
        else if (addition_of_more_child == 2)
            var size_txt = "per_child";
        else if (addition_of_more_child == 3)
            var size_txt = "per_child";
        else if (addition_of_more_child == 4)
            var size_txt = "per_child";
        else if (addition_of_more_child == 5)
            var size_txt = "per_child";

        // alert(family_size);
        var column_value = "";
        var condition_value = "";
        if (age <= 35) {
            column_value = "00_35";
            condition_value = "00_35" + "#" + size_txt;
        } else if (age <= 40) {
            column_value = "36_40";
            condition_value = "36_40" + "#" + size_txt;
        } else if (age <= 45) {
            column_value = "41_45";
            condition_value = "41_45" + "#" + size_txt;
        } else if (age <= 50) {
            column_value = "46_50";
            condition_value = "46_50" + "#" + size_txt;
        } else if (age <= 55) {
            column_value = "51_55";
            condition_value = "51_55" + "#" + size_txt;
        } else if (age <= 60) {
            column_value = "56_60";
            condition_value = "56_60" + "#" + size_txt;
        } else if (age <= 65) {
            column_value = "61_65";
            condition_value = "61_65" + "#" + size_txt;
        } else if (age <= 70) {
            column_value = "66_70";
            condition_value = "66_70" + "#" + size_txt;
        } else if (age <= 75) {
            column_value = "71_75";
            condition_value = "71_75" + "#" + size_txt;
        } else if (age <= 80) {
            column_value = "76_80";
            condition_value = "76_80" + "#" + size_txt;
        } else if (age > 80) {
            column_value = "76_80";
            condition_value = "76_80" + "#" + size_txt;
        }
        // alert(condition_value);
        return condition_value;
    }

    function get_premium_Of_Child(name_insured_sum_insured) {
        var sub_policy_name_hidden = $("#sub_policy_name").is(":visible");
        if (sub_policy_name_hidden == true) {
            var sub_policy_name = $("#sub_policy_name").val();
            if (sub_policy_name == "null" || sub_policy_name == "") {
                toaster(message_type = "Error", message_txt = "The Floater Sub Policy Name field is required.", message_icone = "error");
                return false;
            }
        }
        var max_age = $("#max_age").val();
        var addition_of_more_child = $("#sub_policy_add_child").val();
        addition_of_more_child = parseInt(addition_of_more_child);
        if (isNaN(addition_of_more_child))
            addition_of_more_child = 0;
        else
            addition_of_more_child = addition_of_more_child;
        var name_insured_sum_insured = $("#name_insured_sum_insured").val();
        if (name_insured_sum_insured == "1,00,000")
            var sum_insured_new = "100000";
        else if (name_insured_sum_insured == "1,50,000")
            var sum_insured_new = "150000";
        else if (name_insured_sum_insured == "2,00,000")
            var sum_insured_new = "200000";
        else if (name_insured_sum_insured == "2,50,000")
            var sum_insured_new = "250000";
        else if (name_insured_sum_insured == "3,00,000")
            var sum_insured_new = "300000";
        else if (name_insured_sum_insured == "3,50,000")
            var sum_insured_new = "350000";
        else if (name_insured_sum_insured == "4,00,000")
            var sum_insured_new = "400000";
        else if (name_insured_sum_insured == "4,50,000")
            var sum_insured_new = "450000";
        else if (name_insured_sum_insured == "5,00,000")
            var sum_insured_new = "500000";
        else if (name_insured_sum_insured == "6,00,000")
            var sum_insured_new = "600000";
        else if (name_insured_sum_insured == "7,00,000")
            var sum_insured_new = "700000";
        else if (name_insured_sum_insured == "8,00,000")
            var sum_insured_new = "800000";
        else if (name_insured_sum_insured == "9,00,000")
            var sum_insured_new = "900000";
        else if (name_insured_sum_insured == "10,00,000")
            var sum_insured_new = "1000000";
        else if (name_insured_sum_insured == "15,00,000")
            var sum_insured_new = "1500000";
        else if (name_insured_sum_insured == "20,00,000")
            var sum_insured_new = "2000000";
        else if (name_insured_sum_insured == "25,00,000")
            var sum_insured_new = "2500000";

        var condition_value = getchild_age_Cond(max_age);
        if (name_insured_sum_insured != "null" && name_insured_sum_insured != "" && sum_insured_new != "") {
            var url = "<?php echo base_url(); ?>master/remote/get_floater_2020_chart_for_child";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        column_value: sum_insured_new,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            var child_tot_premium = 0;
                            $("#medi_float_2020_child_count").val("");
                            $("#medi_float_2020_child_count_first_premium").val("");
                            $('#medi_float_2020_child_total_premium').val("");
                            if (data["userdata"] != "" && data["userdata"] != "null")
                                child_tot_premium = (parseInt(addition_of_more_child) * parseInt(data["userdata"]));
                            child_tot_premium = parseInt(child_tot_premium);
                            if (isNaN(child_tot_premium))
                                child_tot_premium = 0;
                            else
                                child_tot_premium = child_tot_premium;
                            // alert(data["userdata"]);
                            // alert(tot_premium+"normal");

                            if (addition_of_more_child != ""){
                                $("#medi_float_2020_child_count").val(addition_of_more_child);
                                $("#medi_float_2020_child_count_first_premium").val(data["userdata"]);
                                $('#medi_float_2020_child_total_premium').val(child_tot_premium);
                            }
                        } else {
                            $("#medi_float_2020_child_count").val("");
                            $("#medi_float_2020_child_count_first_premium").val("");
                            $('#medi_float_2020_child_total_premium').val("");
                        }
                        add_load_amount();
                        add_cover_amount();
                    },
                    error: function(xhr, status) {
                        alert('Sorry, there was a problem!');
                    },
                    complete: function(xhr, status) {

                    }
                });
            }
        }
    }

    function name_insured_ncd_Cal() {
        var name_insured_ncd = $("#name_insured_ncd").val();
        var name_insured_premium = $("#name_insured_premium").val();
        name_insured_ncd = parseInt(name_insured_ncd);
        name_insured_premium = parseInt(name_insured_premium);
        var name_insured_premium_after_ncd = 0;

        if (isNaN(name_insured_ncd))
            name_insured_ncd = 0;
        else
            name_insured_ncd = name_insured_ncd;

        if (isNaN(name_insured_premium))
            name_insured_premium = 0;
        else
            name_insured_premium = name_insured_premium;
        var name_insured_ncd_percentage = Math.round((name_insured_premium * name_insured_ncd) / 100);

        name_insured_premium_after_ncd = parseInt(name_insured_premium) + parseInt(name_insured_ncd_percentage);
        $("#name_insured_premium_after_ncd").val(name_insured_premium_after_ncd);
        $("#medi_float_2020_total_premium").val(name_insured_premium_after_ncd);
        add_load_amount();
        add_cover_amount();
    }

    function add_load_amount() {
        var medi_float_2020_total_premium = $("#medi_float_2020_total_premium").val();
        var medi_float_2020_child_total_premium = $("#medi_float_2020_child_total_premium").val();
        var medi_float_2020_load_amount = $("#medi_float_2020_load_amount").val();

        medi_float_2020_total_premium = parseInt(medi_float_2020_total_premium);

        if (isNaN(medi_float_2020_total_premium))
            medi_float_2020_total_premium = 0;
        else
            medi_float_2020_total_premium = medi_float_2020_total_premium;

        medi_float_2020_child_total_premium = parseInt(medi_float_2020_child_total_premium);

        if (isNaN(medi_float_2020_child_total_premium))
            medi_float_2020_child_total_premium = 0;
        else
            medi_float_2020_child_total_premium = medi_float_2020_child_total_premium;

        medi_float_2020_load_amount = parseInt(medi_float_2020_load_amount);

        if (isNaN(medi_float_2020_load_amount))
            medi_float_2020_load_amount = 0;
        else
            medi_float_2020_load_amount = medi_float_2020_load_amount;

        var medi_float_2020_load_gross_premium = 0;

        medi_float_2020_load_gross_premium = medi_float_2020_total_premium + medi_float_2020_child_total_premium + medi_float_2020_load_amount;
        //    alert(medi_float_2020_load_gross_premium);
        //    alert(medi_float_2020_child_total_premium);
        //    alert(medi_float_2020_load_amount);
        //    alert(medi_float_2020_load_gross_premium);

        $("#medi_float_2020_load_gross_premium").val(medi_float_2020_load_gross_premium);
        gst_apply();
        add_cover_amount();
    }

    function getRestore_covercolumnOnAge(age) {
        // alert(size_txt);
        var column_value = "";

        if (age <= 40) {
            column_value = "<40";
        } else if (age <= 50) {
            column_value = "41_50";
        } else if (age <= 60) {
            column_value = "51_60";
        } else if (age > 60) {
            column_value = ">60";
        }
        return column_value;
    }

    function get_Restore_cover_Premium() {
        var max_age = $("#max_age").val();
        var restore_cover = $("#restore_cover").val();
        var column_value = getRestore_covercolumnOnAge(max_age);

        if (restore_cover != "null" && restore_cover != "" && max_age != "" && column_value != "") {
            var url = "<?php echo base_url(); ?>master/remote/get_restore_cover_premium_floater_2020";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        restore_cover: restore_cover,
                        column_value: column_value,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            if (data["userdata"] != "")
                                var medi_float_2020_restore_cover_premium = data["userdata"];
                            else
                                var medi_float_2020_restore_cover_premium = 0;
                            $("#medi_float_2020_restore_cover_premium").val("");
                            $("#medi_float_2020_restore_cover_premium").val(medi_float_2020_restore_cover_premium);

                        } else {
                            $("#medi_float_2020_restore_cover_premium").val(0);
                        }
                        add_cover_amount();
                    },
                    error: function(xhr, status) {
                        alert('Sorry, there was a problem!');
                    },
                    complete: function(xhr, status) {}
                });
            }
        }
    }

    function get_Maternity_cover_Premium() {
        var name_insured_sum_insured = $("#name_insured_sum_insured").val();
        var maternity_new_born_baby_cover = $("#maternity_new_born_baby_cover").val();

        if (name_insured_sum_insured == "1,00,000")
            var sum_insured_new = "100000";
        else if (name_insured_sum_insured == "1,50,000")
            var sum_insured_new = "150000";
        else if (name_insured_sum_insured == "2,00,000")
            var sum_insured_new = "200000";
        else if (name_insured_sum_insured == "2,50,000")
            var sum_insured_new = "250000";
        else if (name_insured_sum_insured == "3,00,000")
            var sum_insured_new = "300000";
        else if (name_insured_sum_insured == "3,50,000")
            var sum_insured_new = "350000";
        else if (name_insured_sum_insured == "4,00,000")
            var sum_insured_new = "400000";
        else if (name_insured_sum_insured == "4,50,000")
            var sum_insured_new = "450000";
        else if (name_insured_sum_insured == "5,00,000")
            var sum_insured_new = "500000";
        else if (name_insured_sum_insured == "6,00,000")
            var sum_insured_new = "600000";
        else if (name_insured_sum_insured == "7,00,000")
            var sum_insured_new = "700000";
        else if (name_insured_sum_insured == "8,00,000")
            var sum_insured_new = "800000";
        else if (name_insured_sum_insured == "9,00,000")
            var sum_insured_new = "900000";
        else if (name_insured_sum_insured == "10,00,000")
            var sum_insured_new = "1000000";
        else if (name_insured_sum_insured == "15,00,000")
            var sum_insured_new = "1500000";
        else if (name_insured_sum_insured == "20,00,000")
            var sum_insured_new = "2000000";
        else if (name_insured_sum_insured == "25,00,000")
            var sum_insured_new = "2500000";

        if (name_insured_sum_insured != "null" && name_insured_sum_insured != "" && maternity_new_born_baby_cover != "null" && maternity_new_born_baby_cover != "") {
            var url = "<?php echo base_url(); ?>master/remote/get_maternity_cover_premium_floater_2020";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        maternity_new_born_baby_cover: maternity_new_born_baby_cover,
                        condition_value: name_insured_sum_insured,
                        condition_value_2: sum_insured_new,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            if (data["userdata"] != "")
                                var medi_float_2020_maternity_new_bornbaby = data["userdata"];
                            else
                                var medi_float_2020_maternity_new_bornbaby = 0;
                            $("#medi_float_2020_maternity_new_bornbaby").val("");
                            $("#medi_float_2020_maternity_new_bornbaby").val(medi_float_2020_maternity_new_bornbaby);

                        } else {
                            $("#medi_float_2020_maternity_new_bornbaby").val(0);
                        }
                        add_cover_amount();
                    },
                    error: function(xhr, status) {
                        alert('Sorry, there was a problem!');
                    },
                    complete: function(xhr, status) {}
                });
            }
        }
    }

    function getDailyCashAllowenceBB_covercolumnOnAge(age) {
        // alert(size_txt);
        var condition_value = "";
        if (age <= 50) {
            condition_value = "<50";
        } else if (age <= 60) {
            condition_value = "51_60";
        } else if (age > 60) {
            condition_value = ">60";
        }
        return condition_value;
    }

    function get_DailyCashAllowenceBB_cover_Premium() {
        var max_age = $("#max_age").val();
        var condition_value = getDailyCashAllowenceBB_covercolumnOnAge(max_age);
        var name_insured_sum_insured = $("#name_insured_sum_insured").val();
        var daily_cash_allowance_cover = $("#daily_cash_allowance_cover").val();

        if (name_insured_sum_insured == "1,00,000")
            var sum_insured_new = "100000";
        else if (name_insured_sum_insured == "1,50,000")
            var sum_insured_new = "150000";
        else if (name_insured_sum_insured == "2,00,000")
            var sum_insured_new = "200000";
        else if (name_insured_sum_insured == "2,50,000")
            var sum_insured_new = "250000";
        else if (name_insured_sum_insured == "3,00,000")
            var sum_insured_new = "300000";
        else if (name_insured_sum_insured == "3,50,000")
            var sum_insured_new = "350000";
        else if (name_insured_sum_insured == "4,00,000")
            var sum_insured_new = "400000";
        else if (name_insured_sum_insured == "4,50,000")
            var sum_insured_new = "450000";
        else if (name_insured_sum_insured == "5,00,000")
            var sum_insured_new = "500000";
        else if (name_insured_sum_insured == "6,00,000")
            var sum_insured_new = "600000";
        else if (name_insured_sum_insured == "7,00,000")
            var sum_insured_new = "700000";
        else if (name_insured_sum_insured == "8,00,000")
            var sum_insured_new = "800000";
        else if (name_insured_sum_insured == "9,00,000")
            var sum_insured_new = "900000";
        else if (name_insured_sum_insured == "10,00,000")
            var sum_insured_new = "1000000";
        else if (name_insured_sum_insured == "15,00,000")
            var sum_insured_new = "1500000";
        else if (name_insured_sum_insured == "20,00,000")
            var sum_insured_new = "2000000";
        else if (name_insured_sum_insured == "25,00,000")
            var sum_insured_new = "2500000";


        sum_insured_new = parseInt(sum_insured_new);
        if (isNaN(sum_insured_new))
            sum_insured_new = 0;
        else
            sum_insured_new = sum_insured_new;

        if (sum_insured_new <= 500000)
            var column_value = "<500000";
        else if (sum_insured_new > 500000 && sum_insured_new <= 1500000)
            var column_value = "5>sum_insured<15";
        else if (sum_insured_new > 1500000)
            var column_value = ">1500000";

        // alert(sum_insured_new);
        // alert(column_value);

        if (daily_cash_allowance_cover != "null" && daily_cash_allowance_cover != "" && column_value != "undefined" && column_value != "" && max_age != "" && condition_value != "") {
            var url = "<?php echo base_url(); ?>master/remote/get_dailycashallowencebb_cover_premium_floater_2020";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        daily_cash_allowance_cover: daily_cash_allowance_cover,
                        column_value: column_value,
                        condition_value: condition_value,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            if (data["userdata"] != "")
                                var medi_float_2020_daily_cash_allow_hosp = data["userdata"];
                            else
                                var medi_float_2020_daily_cash_allow_hosp = 0;
                            $("#medi_float_2020_daily_cash_allow_hosp").val("");
                            $("#medi_float_2020_daily_cash_allow_hosp").val(medi_float_2020_daily_cash_allow_hosp);

                        } else {
                            $("#medi_float_2020_daily_cash_allow_hosp").val(0);
                        }
                        add_cover_amount();
                    },
                    error: function(xhr, status) {
                        alert('Sorry, there was a problem!');
                    },
                    complete: function(xhr, status) {}
                });
            }
        }
    }

    function add_cover_amount() {
        var medi_float_2020_total_premium = $("#medi_float_2020_total_premium").val();
        var medi_float_2020_child_total_premium = $("#medi_float_2020_child_total_premium").val();
        var medi_float_2020_load_amount = $("#medi_float_2020_load_amount").val();
        var medi_float_2020_restore_cover_premium = $("#medi_float_2020_restore_cover_premium").val();
        var medi_float_2020_maternity_new_bornbaby = $("#medi_float_2020_maternity_new_bornbaby").val();
        var medi_float_2020_daily_cash_allow_hosp = $("#medi_float_2020_daily_cash_allow_hosp").val();

        medi_float_2020_total_premium = parseInt(medi_float_2020_total_premium);
        medi_float_2020_child_total_premium = parseInt(medi_float_2020_child_total_premium);
        medi_float_2020_load_amount = parseInt(medi_float_2020_load_amount);
        medi_float_2020_restore_cover_premium = parseInt(medi_float_2020_restore_cover_premium);
        medi_float_2020_maternity_new_bornbaby = parseInt(medi_float_2020_maternity_new_bornbaby);
        medi_float_2020_daily_cash_allow_hosp = parseInt(medi_float_2020_daily_cash_allow_hosp);

        if (isNaN(medi_float_2020_total_premium))
            medi_float_2020_total_premium = 0;
        else
            medi_float_2020_total_premium = medi_float_2020_total_premium;

        if (isNaN(medi_float_2020_child_total_premium))
            medi_float_2020_child_total_premium = 0;
        else
            medi_float_2020_child_total_premium = medi_float_2020_child_total_premium;

        if (isNaN(medi_float_2020_load_amount))
            medi_float_2020_load_amount = 0;
        else
            medi_float_2020_load_amount = medi_float_2020_load_amount;

        if (isNaN(medi_float_2020_restore_cover_premium))
            medi_float_2020_restore_cover_premium = 0;
        else
            medi_float_2020_restore_cover_premium = medi_float_2020_restore_cover_premium;

        if (isNaN(medi_float_2020_maternity_new_bornbaby))
            medi_float_2020_maternity_new_bornbaby = 0;
        else
            medi_float_2020_maternity_new_bornbaby = medi_float_2020_maternity_new_bornbaby;

        if (isNaN(medi_float_2020_daily_cash_allow_hosp))
            medi_float_2020_daily_cash_allow_hosp = 0;
        else
            medi_float_2020_daily_cash_allow_hosp = medi_float_2020_daily_cash_allow_hosp;

        var medi_float_2020_load_gross_premium = 0;

        medi_float_2020_load_gross_premium = medi_float_2020_total_premium + medi_float_2020_child_total_premium + medi_float_2020_load_amount + medi_float_2020_restore_cover_premium + medi_float_2020_maternity_new_bornbaby + medi_float_2020_daily_cash_allow_hosp;
        $("#medi_float_2020_load_gross_premium").val(medi_float_2020_load_gross_premium);
        gst_apply();
    }

    function gst_apply() {
        var medi_float_2020_load_gross_premium = $("#medi_float_2020_load_gross_premium").val();
        var cgst_fire_per = $("#cgst_fire_per").val();
        var sgst_fire_per = $("#sgst_fire_per").val();

        cgst_fire_per = parseInt(cgst_fire_per);
        if (isNaN(cgst_fire_per))
            cgst_fire_per = 0;
        else
            cgst_fire_per = cgst_fire_per;

        sgst_fire_per = parseInt(sgst_fire_per);
        if (isNaN(sgst_fire_per))
            sgst_fire_per = 0;
        else
            sgst_fire_per = sgst_fire_per;

        medi_float_2020_load_gross_premium = parseInt(medi_float_2020_load_gross_premium);
        if (isNaN(medi_float_2020_load_gross_premium))
            medi_float_2020_load_gross_premium = 0;
        else
            medi_float_2020_load_gross_premium = medi_float_2020_load_gross_premium;

        if (medi_float_2020_load_gross_premium == "") {
            $("#medi_float_2020_cgst_tot").val(0);
            $("#medi_float_2020_sgst_tot").val(0);
            $("#medi_float_2020_final_premium").val(0);
        }

        var medi_float_2020_cgst_tot = Math.round((medi_float_2020_load_gross_premium * cgst_fire_per) / 100);
        var medi_float_2020_sgst_tot = Math.round((medi_float_2020_load_gross_premium * sgst_fire_per) / 100);
        $("#medi_float_2020_cgst_tot").val(medi_float_2020_cgst_tot);
        $("#medi_float_2020_sgst_tot").val(medi_float_2020_sgst_tot);

        var medi_float_2020_final_premium = parseInt(medi_float_2020_load_gross_premium) + parseInt(medi_float_2020_cgst_tot) + parseInt(medi_float_2020_sgst_tot);
        $("#medi_float_2020_final_premium").val(medi_float_2020_final_premium);

    }

    // Calculation Section End
</script>