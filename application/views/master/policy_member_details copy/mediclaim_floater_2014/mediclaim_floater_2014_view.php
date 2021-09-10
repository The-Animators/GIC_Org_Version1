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
                <td><strong id="medi_float_2014_total_premium_td"><input type="text" id="medi_float_2014_total_premium" name="medi_float_2014_total_premium" class="form-control" disabled></strong></td>
            </tr>
            <tr id="annual_turn_over_tr">
                <td colspn=""><strong> Premium For Additional Child: </strong></td>
                <td colspn=""><strong>
                <div class="row">
                    <div class="col-md-6"><input type="text" id="medi_float_2014_child_count" name="medi_float_2014_child_count" class="form-control" disabled></div>
                    <div class="col-md-6"><input type="text" id="medi_float_2014_child_count_first_premium" name="medi_float_2014_child_count_first_premium" class="form-control" disabled></div>
                </div>
                
                <!-- <input type="text" id="medi_float_2014_child_count" name="medi_float_2014_child_count" class="form-control" disabled> -->
                </strong></td>
                <td><strong id="medi_float_2014_child_total_premium_td"><input type="text" id="medi_float_2014_child_total_premium" name="medi_float_2014_child_total_premium" class="form-control" disabled></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Add Loading: </strong></td>
                <td colspn=""><strong id="medi_float_2014_load_description_td"><textarea class="form-control" name="medi_float_2014_load_description" id="medi_float_2014_load_description"></textarea></strong></td>
                <td><strong id="medi_float_2014_load_amount_td"><input type="text" id="medi_float_2014_load_amount" name="medi_float_2014_load_amount" class="form-control" onkeyup="add_load_amount()"></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Premium After Loading/Gross Premium: </strong></td>
                <td colspn=""><strong id=""></strong></td>
                <td><strong id="medi_float_2014_load_gross_premium_td"><input type="text" id="medi_float_2014_load_gross_premium" name="medi_float_2014_load_gross_premium" class="form-control"></td>
            </tr>
            <tr>
                <td colspn=""><strong> CGST:</strong></td>
                <td><strong id="medi_float_2014_cgst_rate_td"><input type="text" id="cgst_fire_per" name="medi_float_2014_cgst_rate" class="form-control" onkeyup="gst_apply()"></td>
                <td><strong id="medi_float_2014_cgst_tot_td"><input type="text" id="medi_float_2014_cgst_tot" name="medi_float_2014_cgst_tot" class="form-control"></td>
            </tr>
            <tr>
                <td><strong> SGST</strong></td>
                <td><strong id="medi_float_2014_sgst_rate_td"><input type="text" id="sgst_fire_per" name="medi_float_2014_sgst_rate" class="form-control" onkeyup="gst_apply()"></td>
                <td><strong id="medi_float_2014_sgst_tot_td"><input type="text" id="medi_float_2014_sgst_tot" name="medi_float_2014_sgst_tot" class="form-control"></td>
            </tr>
            <tr>
                <td colspn="3"><strong class="text-purple">Final Premium</strong></td>
                <td colspn="3"><strong class="text-purple"></strong></td>
                <td><strong id="medi_float_2014_final_premium_td"><input type="text" id="medi_float_2014_final_premium" name="medi_float_2014_final_premium" class="form-control" disabled><input type="hidden" id="medi_floater_2014_id" name="medi_floater_2014_id" class="form-control"></td>
            </tr>
        </table>
    </div>
</div>

<script>
    var sum_insured_dropdown_val = "";

    sum_insured_dropdown();

    function sum_insured_dropdown() {
        var sum_Val = ["1,00,000", "1,50,000", "2,00,000", "2,50,000", "3,00,000", "3,50,000", "4,00,000", "4,50,000", "5,00,000", "6,00,000", "7,00,000", "8,00,000", "9,00,000", "10,00,000"];
        var i = 0;
        for (i; i <= 13; i++) {
            sum_insured_dropdown_val += '<option value="' + sum_Val[i] + '">' + sum_Val[i] + '</option>';
        }
        // alert(sum_insured_dropdown_val);
        $(".name_insured_sum_insured").append(sum_insured_dropdown_val);
    }

    function family_Size_Val(family_size_new) {
        // alert(family_size_new);
        if(family_size_new != "" && family_size_new !="null" && family_size_new !=undefined)
            var family_size = family_size_new;
        else
            var family_size = $("#family_size").val();

        if (family_size == 1)
            var Family_size_count = 2;
        else if (family_size == 2)
            var Family_size_count = 3;
        else if (family_size == 3)
            var Family_size_count = 4;
        else if (family_size == 4)
            var Family_size_count = 2;
        else if (family_size == 5)
            var Family_size_count = 3;
        AddMediclaim_2014(Family_size_count);
    }

    function AddMediclaim_2014(Family_size_count) {
        var policy_holder_name = $("#policy_holder_name").val();
        var tr_table = "";

        $("#first_table_tbody").empty();
        // alert(add_medi_counter);
        for (var add_medi_counter = 0; add_medi_counter < Family_size_count; add_medi_counter++) {
            // alert(i);
            tr_table += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_counter + '" name="name_insured_dob[]" value="" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_counter + '" name="name_insured_age[]" value="" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach; endif; ?> </select></td><td><textarea  style="width:120px;" class="form-control past_history" name="past_history[]" id="past_history_' + add_medi_counter + '"></textarea></td> <td><select style="width:120px;" id="name_insured_policy_type_' + add_medi_counter + '" name="name_insured_policy_type[]" class="form-control name_insured_policy_type" onchange="Name_insuredPolicy_type(' + add_medi_counter + ')">  <option value="Family Floater 2014">Family Floater 2014 </option> </select></td><td><select style="width:110px;" id="name_insured_policy_option_' + add_medi_counter + '" name="name_insured_policy_option[]" class="form-control name_insured_policy_option"><option value="Individual">Individual</option> <option value="Floater" selected>Floater</option> </select></td>';

            if (add_medi_counter == 0) {
                tr_table += '<td width="12%" rowspan="' + Family_size_count + '" align="center"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option> '+option_val_data+'</select></td>  <td rowspan="' + Family_size_count + '" align="center"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();    if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%" rowspan="' + Family_size_count + '" align="center"><select style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_premiumBasedon_age_sumInsured_PolicyType()"><option value="null">Select Sum Insured</option> ' + sum_insured_dropdown_val + '   </select></td><td width="8%" rowspan="' + Family_size_count + '"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium" value="" class="form-control name_insured_premium"></td></tr>';
            }
        }
        //var tr_table_1 = '<td width="12%" rowspan="' + Family_size_count + '"><select style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_premiumBasedon_age_sumInsured_PolicyType()(' + add_medi_counter + ')"><option value="null">Select Sum Insured</option> ' + sum_insured_dropdown_val + '   </select></td><td width="8%" rowspan="' + Family_size_count + '"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium" value="" class="form-control name_insured_premium"></td></tr>';
        //  alert(Family_size_count);

        $("#first_table_tbody").append(tr_table);
        for (var add_medi_counter = 0; add_medi_counter < Family_size_count; add_medi_counter++) {

            var policy_type = $("#name_insured_policy_type_" + add_medi_counter).val();
            // alert(policy_type);
            if (policy_type == "Family Floater 2014") {
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

    var actual_data_Mediclaim_floater2014 = [];

    function Total_Mediclaim_floater2014() {
        actual_data_Mediclaim_floater2014 = [];

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
            var nominee_name = $(".nominee_name", this).val();
            var nominee_relation = $(".nominee_relation", this).val();
            
            var nominee_name_txt = $(".nominee_name option:selected", this).text();
            var nominee_relation_txt = $(".nominee_relation option:selected", this).text();
            
            actual_data_Mediclaim_floater2014.push([key, name_insured_member_name, name_insured_member_name_txt, name_insured_dob, name_insured_age, name_insured_relation, name_insured_relation_txt,past_history, name_insured_policy_type, name_insured_policy_option, name_insured_sum_insured, name_insured_premium,nominee_name,nominee_relation,nominee_name_txt,nominee_relation_txt]);
            if (name_insured_member_name == '')
            actual_data_Mediclaim_floater2014.splice(key, 1);
        });
        // console.log(actual_data_Mediclaim_floater2014);
        // alert(actual_data_Mediclaim_floater2014);
        return actual_data_Mediclaim_floater2014;

        // var total_mediclaim_floater2014 = JSON.stringify(Total_Mediclaim_floater2014());
        // alert(total_mediclaim_floater2014);
        // return false;
    }
    // Calculation Section Start
function dateFormate(value) {
    // alert(value);
    var date = value.split("-");

    var day = (date[0]),
        month = (date[1]),
        year = (date[2]);

    year = year.length;
    // if ()
    //     alert(year);
    // if (year)

    if (year < 4) {
        year = (date[0]);
        day = (date[2]);
        if (!$.isNumeric(month)) {
            // alert(month);
            month = getMonthFromString(month);
            var new_date = new Date(year, month - 1, day).toLocaleDateString('en-CA');
            var date = new Date(new_date);
            var get_y = date.getFullYear();
            var get_m = ("0" + (date.getMonth() + 1)).slice(-2);
            var get_d = ("0" + date.getDate()).slice(-2);
        } else {
            var date = value.split("-");
            var day = (date[2]),
                month = (date[1]),
                year = (date[0]);
            if (!$.isNumeric(month)) {
                month = getMonthFromString(month);
            }
            var new_date = new Date(year, month, day).toLocaleDateString('en-CA');
            var date = new Date(new_date);
            var get_y = date.getFullYear();
            var get_m = ("0" + (date.getMonth())).slice(-2);
            var get_d = ("0" + date.getDate()).slice(-2);
            if (get_m == "00")
                get_m = "12";
            var org_date = get_d + "-" + get_m + "-" + get_y;
        }
        var org_date = get_d + "-" + get_m + "-" + get_y;
    } else {
        var date = value.split("-");
        var day = (date[2]),
            month = (date[1]),
            year = (date[0]);
        if (!$.isNumeric(month)) {
            month = getMonthFromString(month);
        }
        var new_date = new Date(year, month, day).toLocaleDateString('en-CA');
        var date = new Date(new_date);
        var get_y = date.getFullYear();
        var get_m = ("0" + (date.getMonth())).slice(-2);
        var get_d = ("0" + date.getDate()).slice(-2);
        if (get_m == "00")
            get_m = "12";
        var org_date = get_d + "-" + get_m + "-" + get_y;
    }



    return org_date;
}
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
        var family_size = $("#family_size").val();

        if (family_size == 1)
            var size_txt = "2a_0c";
        else if (family_size == 2)
            var size_txt = "2a_1c";
        else if (family_size == 3)
            var size_txt = "2a_2c";
        else if (family_size == 4)
            var size_txt = "1a_1c";
        else if (family_size == 5)
            var size_txt = "1a_2c";

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

    function get_premiumBasedon_age_sumInsured_PolicyType() {
        // alert("Hi");
        var max_age = $("#max_age").val();
        var name_insured_sum_insured = $("#name_insured_sum_insured").val();
        // alert(max_age);p"1,00,000", "1,50,000", "2,00,000", "2,50,000", "3,00,000", "3,50,000", "4,00,000", "4,50,000", "5,00,000", "6,00,000", "7,00,000", "8,00,000", "9,00,000", "10,00,000"
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
        // alert(name_insured_sum_insured);
        var condition_value = getcolumnOnAge(max_age);

        if (max_age != "" && name_insured_sum_insured != "null" && name_insured_sum_insured != "" && condition_value != "") {
            var url = "<?php echo base_url(); ?>master/remote/get_floater_2014_chart";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        max_age: max_age,
                        column_value: sum_insured_new,
                        condition_value: condition_value,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            $('#name_insured_premium').val("");
                            var tot_premium = 0;
                            if (max_age > 80) {
                                tot_premium = Math.round(parseInt(5) * parseInt(data["userdata"]) / 100);
                                var new_premium = parseInt(tot_premium) + parseInt(data["userdata"]);
                                // alert(tot_premium);
                            } else {
                                new_premium = parseInt(data["userdata"]);
                            }
                            // alert(tot_premium+"normal");
                            $('#name_insured_premium').val(new_premium);
                            $("#medi_float_2014_total_premium").val(new_premium);
                            get_premium_Of_Child(sum_insured_new);
                        } else {
                            $('#name_insured_premium').val("");
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

    }

    function getchild_age_Cond(age) {
        var addition_of_more_child = $("#addition_of_more_child").val();

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

    function get_premium_Of_Child(sum_insured_new) {
        var max_age = $("#max_age").val();
        var addition_of_more_child = $("#addition_of_more_child").val();

        var name_insured_sum_insured = $("#name_insured_sum_insured").val();
        // alert(max_age);p"1,00,000", "1,50,000", "2,00,000", "2,50,000", "3,00,000", "3,50,000", "4,00,000", "4,50,000", "5,00,000", "6,00,000", "7,00,000", "8,00,000", "9,00,000", "10,00,000"
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

        var condition_value = getchild_age_Cond(max_age);
        if (max_age != "" && name_insured_sum_insured != "null" && name_insured_sum_insured != "" && condition_value != "") {
            var url = "<?php echo base_url(); ?>master/remote/get_floater_2014_chart_for_child";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        max_age: max_age,
                        column_value: sum_insured_new,
                        condition_value: condition_value,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            var child_tot_premium = 0;
                            if (data["userdata"] != "" && data["userdata"] != "null")
                                child_tot_premium = (parseInt(addition_of_more_child) * parseInt(data["userdata"]));

                            var tot_premium = 0;
                            if (max_age > 80) {
                                tot_premium = Math.round(parseInt(5) * parseInt(child_tot_premium) / 100);
                                var new_premium = parseInt(tot_premium) + parseInt(child_tot_premium);
                                // alert(tot_premium);
                            } else {
                                var new_premium = parseInt(child_tot_premium);
                            }
                            // alert(tot_premium+"normal");
                            $("#medi_float_2014_child_count").val("");
                            $('#medi_float_2014_child_count_first_premium').val("");
                            $('#medi_float_2014_child_total_premium').val("");
                            if (addition_of_more_child != "")
                                $("#medi_float_2014_child_count").val(addition_of_more_child);
                            $('#medi_float_2014_child_count_first_premium').val(data["userdata"]);
                            $('#medi_float_2014_child_total_premium').val(new_premium);
                            
                        } else {
                            $("#medi_float_2014_child_count").val("");
                            $('#medi_float_2014_child_count_first_premium').val("");
                            $('#medi_float_2014_child_total_premium').val("");
                        }
                        add_load_amount();
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

    function add_load_amount() {
        var medi_float_2014_total_premium = $("#medi_float_2014_total_premium").val();
        var medi_float_2014_child_total_premium = $("#medi_float_2014_child_total_premium").val();
        var medi_float_2014_load_amount = $("#medi_float_2014_load_amount").val();

        medi_float_2014_total_premium = parseInt(medi_float_2014_total_premium);

        if (isNaN(medi_float_2014_total_premium))
            medi_float_2014_total_premium = 0;
        else
            medi_float_2014_total_premium = medi_float_2014_total_premium;

        medi_float_2014_child_total_premium = parseInt(medi_float_2014_child_total_premium);

        if (isNaN(medi_float_2014_child_total_premium))
            medi_float_2014_child_total_premium = 0;
        else
            medi_float_2014_child_total_premium = medi_float_2014_child_total_premium;

        medi_float_2014_load_amount = parseInt(medi_float_2014_load_amount);

        if (isNaN(medi_float_2014_load_amount))
            medi_float_2014_load_amount = 0;
        else
            medi_float_2014_load_amount = medi_float_2014_load_amount;

        var medi_float_2014_load_gross_premium = 0;

        medi_float_2014_load_gross_premium = medi_float_2014_total_premium + medi_float_2014_child_total_premium + medi_float_2014_load_amount;
        $("#medi_float_2014_load_gross_premium").val(medi_float_2014_load_gross_premium);
        gst_apply();
    }

    function gst_apply() {
        var medi_float_2014_load_gross_premium = $("#medi_float_2014_load_gross_premium").val();
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

        medi_float_2014_load_gross_premium = parseInt(medi_float_2014_load_gross_premium);
        if (isNaN(medi_float_2014_load_gross_premium))
            medi_float_2014_load_gross_premium = 0;
        else
            medi_float_2014_load_gross_premium = medi_float_2014_load_gross_premium;

        if (medi_float_2014_load_gross_premium == "") {
            $("#medi_float_2014_cgst_tot").val(0);
            $("#medi_float_2014_sgst_tot").val(0);
            $("#medi_float_2014_final_premium").val(0);
        }

        var medi_float_2014_cgst_tot = Math.round((medi_float_2014_load_gross_premium * cgst_fire_per) / 100);
        var medi_float_2014_sgst_tot = Math.round((medi_float_2014_load_gross_premium * sgst_fire_per) / 100);
        $("#medi_float_2014_cgst_tot").val(medi_float_2014_cgst_tot);
        $("#medi_float_2014_sgst_tot").val(medi_float_2014_sgst_tot);

        var medi_float_2014_final_premium = parseInt(medi_float_2014_load_gross_premium) + parseInt(medi_float_2014_cgst_tot) + parseInt(medi_float_2014_sgst_tot);
        $("#medi_float_2014_final_premium").val(medi_float_2014_final_premium);

    }

    // Calculation Section End
</script>