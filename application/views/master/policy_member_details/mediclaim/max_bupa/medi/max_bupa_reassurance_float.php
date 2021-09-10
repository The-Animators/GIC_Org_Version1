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
    <div class="col-md-6">
        <div class="form-group row">
            <label for="risk_code" class="col-form-label col-md-4  text-right">Years of Premium : </label>
            <div class="col-md-8">
                <select class="form-control years_of_premium" name="years_of_premium" id="years_of_premium" onchange="Region_change();Term_Discount_table();">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label for="hazard_grade" class="col-form-label col-md-4  text-right">Region : </label>
            <div class="col-md-8">
                <select class="form-control region" name="region" id="region" onchange="Region_change()">
                    <option value="Zone 1">Zone 1</option>
                    <option value="Zone 2">Zone 2</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="first_table">
            <thead>
                <tr>
                    <th>Name Of Insured</th>
                    <th>DOB</th>
                    <th>Age</th>
                    <th>Relations</th>
                    <th>Nominee Name</th>
                    <th>Nominee Relations</th>
                    <th>Sum Insured</th>
                    <th>Basic Premium</th>
                    <th>Personal Accident Benefit Premium</th>
                    <th>Hospital Cash</th>
                    <th>Safeguard Benefit</th>
                    <th>Total Premium</th>
                </tr>
            </thead>
            <tbody id="first_table_tbody">

            </tbody>
        </table>
    </div>
    <div class="col-md-12 mt-2"><span><strong>Term Discount : </strong></span></div>
    <div class="col-md-12">
    
        <table class="table mb-0 table-bordered mt-2 col-md-12">
            <thead>
                <tr id="">
                    <td><center><strong>Term: </strong></center></td>
                    <td><center><strong>Percentage: </strong></center></td>
                    <td><center><strong>Discount: </strong></center></td>
                    <td><center><strong>Notes: </strong></center></td>
                </tr>
            </thead> 

            <tbody>
                <tr id="first_term">
                    <td>1</td>
                    <td><input type="text" name="first_year_rate" id="first_year_rate" class="form-control first_year_rate" value="0"></td>
                    <td><input type="text" name="first_year_tot" id="first_year_tot" class="form-control first_year_tot" value="0"></td>
                    <td>0%</td>
                </tr>
                <tr id="second_term" style="display:none;">
                    <td>2</td>
                    <td><input type="text" name="second_year_rate" id="second_year_rate" class="form-control second_year_rate" value="7.5"></td>
                    <td><input type="text" name="second_year_tot" id="second_year_tot" class="form-control second_year_tot" value=""></td>
                    <td>7.5% on 2nd year’s premium</td>
                </tr>
                <tr id="third_term" style="display:none;">
                    <td>3</td>
                    <td><input type="text" name="third_year_rate" id="third_year_rate" class="form-control third_year_rate" value="15"></td>
                    <td><input type="text" name="third_year_tot" id="third_year_tot" class="form-control third_year_tot" value=""></td>
                    <td>Additional 15% on 3rd year’s premium</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td></td>
                    <td><input type="text" name="tot_term_disc" id="tot_term_disc" class="form-control tot_term_disc" value=""></td>
                    <td></td>
                </tr>
            </tbody> 
        </table>

        <table class="table mb-0 table-bordered mt-2 col-md-12">
            <tr id="">
                <td colspn="2"><strong>Total Premium: </strong></td>
                <td colspn=""><strong></strong></td>
                <td><strong id="medi_total_amount_td"><input type="text" id="tot_premium" name="tot_premium" class="form-control tot_premium" disabled></strong></td>
            </tr>
            <td colspn="3"><strong> Standing Instruction Discount: </strong></td>
                <td colspn=""><strong id="stand_instu_rate_td"><input type="text" id="stand_instu_rate" name="stand_instu_rate" class="form-control stand_instu_rate" onkeyup="Standing_Instruction_Discount_Cal()" value="0"></strong></td>
                <td><strong id="stand_instu_tot_td"><input type="text" id="stand_instu_tot" name="stand_instu_tot" class="form-control stand_instu_tot" disabled></strong></td>
            </tr>
            <td colspn="3"><strong> Doctor Discount: </strong></td>
                <td colspn=""><strong id="doctor_disc_per_td"><input type="text" id="doctor_disc_per" name="doctor_disc_per" class="form-control doctor_disc_per" onkeyup="medi_doctor_disc_tot_Cal()" value="5"></strong></td>
                <td><strong id="doctor_disc_tot_td"><input type="text" id="doctor_disc_tot" name="doctor_disc_tot" class="form-control doctor_disc_tot" disabled></strong></td>
            </tr>

            <tr id="">
                <td colspn="3"><strong>Gross Premium: </strong></td>
                <td colspn=""><strong></strong></td>
                <td><strong id="gross_premium_tot_td"><input type="text" id="gross_premium_tot" name="gross_premium_tot" class="form-control gross_premium_tot" disabled><input type="hidden" name="gross_premium_tot_new"  id="gross_premium_tot_new" value=""></td>
            </tr>
            <tr>
                <td colspn=""><strong> CGST:</strong></td>
                <td><strong id="medi_cgst_rate_td"><input type="text" id="cgst_fire_per" name="medi_cgst_rate" class="form-control" onkeyup="gst_apply()"></td>
                <td><strong id="medi_cgst_tot_td"><input type="text" id="medi_cgst_tot" name="medi_cgst_tot" class="form-control" disabled></td>
            </tr>
            <tr>
                <td><strong> SGST</strong></td>
                <td><strong id="medi_sgst_rate_td"><input type="text" id="sgst_fire_per" name="medi_sgst_rate" class="form-control" onkeyup="gst_apply()"></td>
                <td><strong id="medi_sgst_tot_td"><input type="text" id="medi_sgst_tot" name="medi_sgst_tot" class="form-control" disabled></td>
            </tr>
            <tr>
                <td colspn="3"><strong class="text-purple">Final Premium</strong></td>
                <td colspn="2"><strong></strong></td>
                <td><strong id="medi_final_premium_td"><input type="text" id="medi_final_premium" name="medi_final_premium" class="form-control" disabled><input type="hidden" id="medi_max_bupa_reassure_float_policy_id" name="medi_max_bupa_reassure_float_policy_id" class="form-control"><input type="hidden"  name="max_age"  id="max_age" value=""></td>
            </tr>
        </table>
    </div>
</div>

<script>
    var sum_insured_dropdown_val = "";
    var add_medi_maxBupa_counter = 0;
    var main_Mediclaim_maxBupa = [];
    
    var second_year_tot = 0;
    var third_year_tot = 0;

    function Region_change(){
        // alert(main_Mediclaim_maxBupa);
        var region = $("#region").val();
        var years_of_premium = $("#years_of_premium").val();
        second_year_tot = 0;
        third_year_tot = 0;
        var flag = false;
        if (region == 'null' || region =="" || years_of_premium == "null" || years_of_premium == ""){
            flag =false;
        } else {
            flag =true;
        }
        // get_basic_premium_basedon_region(flag,main_Mediclaim_maxBupa);
        get_basic_premium();
    }

    function Term_Discount_table(){
        var years_of_premium = $("#years_of_premium").val();
        if(years_of_premium == 2){
            $("#second_term").show();
            $("#third_term").hide();
        }else if(years_of_premium == 3 || years_of_premium == 4 || years_of_premium == 5){
            $("#second_term").show();
            $("#third_term").show();
        }else if(years_of_premium == 1){
            $("#second_term").hide();
            $("#third_term").hide();
        }
    }

    function removeMediclaimmaxBupa(add_medi_maxBupa_counter) {

        $("#remove_mediclaim_maxBupa_" + add_medi_maxBupa_counter).closest("tr").remove();
        var indexValue = main_Mediclaim_maxBupa.indexOf(add_medi_maxBupa_counter);
        main_Mediclaim_maxBupa.splice(indexValue, 1);
        if (main_Mediclaim_maxBupa.length == 0) {
            add_medi_maxBupa_counter = 0;
            main_Mediclaim_maxBupa = [];
            $("#Add_Mediclaim_maxBupa").attr("onClick", "AddMediclaimmaxBupa(" + add_medi_maxBupa_counter + ")");
        }
        second_year_tot = 0;
        third_year_tot = 0;
        get_basic_premium_basedon_region(flag=true,main_Mediclaim_maxBupa);
        Tot_premium_after_discount(add_medi_maxBupa_counter);
    }

    function family_Size_Val(family_size_new) {
        // alert(family_size_new);
        var sub_policy_name_hidden = $("#sub_policy_name").is(":visible");
        if (sub_policy_name_hidden == true) {
            var sub_policy_name = $("#sub_policy_name").val();
            if (sub_policy_name == "null" || sub_policy_name == "") {
                toaster(message_type = "Error", message_txt = "The Floater Sub Policy Name field is required.", message_icone = "error");
                return false;
            }
        }

        if(family_size_new != "" && family_size_new !="null" && family_size_new !=undefined)
            var sub_policy_family_size= family_size_new;
        else
            var sub_policy_family_size= $("#sub_policy_family_size").val();

        if (sub_policy_family_size== "1A + 1C")
            var Family_size_count = 2;
        else if (sub_policy_family_size== "1A + 2C")
            var Family_size_count = 3;
        else if (sub_policy_family_size== "1A + 3C")
            var Family_size_count = 4;
        else if (sub_policy_family_size== "1A + 4C")
            var Family_size_count = 5;
        else if (sub_policy_family_size== "2A + 0C")
            var Family_size_count = 2;
        else if (sub_policy_family_size== "2A + 1C")
            var Family_size_count = 3;
        else if (sub_policy_family_size== "2A + 2C")
            var Family_size_count = 4;
        else if (sub_policy_family_size== "2A + 3C")
            var Family_size_count = 5;
        else if (sub_policy_family_size== "2A + 4C")
            var Family_size_count = 6;
            AddMediclaimmaxBupa(Family_size_count);
    }

    function AddMediclaimmaxBupa(Family_size_count) {
        var policy_holder_name = $("#policy_holder_name").val();
        var tr_table = "";
        $("#first_table_tbody").empty();
        // get_basic_premium_basedon_region('+true+','+main_Mediclaim_maxBupa+')
        for (var add_medi_maxBupa_counter = 0; add_medi_maxBupa_counter < Family_size_count; add_medi_maxBupa_counter++) {
            tr_table += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_maxBupa_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_maxBupa_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_maxBupa_counter + '" name="name_insured_dob[]" value="" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_maxBupa_counter + '" name="name_insured_age[]" value="" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_maxBupa_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;  endif; ?> </select></td> ';

            if(add_medi_maxBupa_counter == 0){
                tr_table +='<td width="12%" rowspan="'+Family_size_count+'"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td rowspan="'+Family_size_count+'"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach;     endif; ?> </select></td><td width="12%" rowspan="'+Family_size_count+'"><select style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium()"><option value="null">Select Sum Insured</option>' + sum_insured_dropdown_val + '</select></td><td rowspan="'+Family_size_count+'"> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium"  class="form-control basic_premium" value=""></td><td rowspan="'+Family_size_count+'"><select style="width:110px;" id="pab_type" name="pab_type[]" class="form-control pab_type"  onchange="get_pab_type_premium()"><option value="Not Opted">Not Opted</option> <option value="Opted">Opted</option> </select><input type="text" name="pab_prem[]" id="pab_prem" class="form-control mt-1 pab_prem" value=""></td><td rowspan="'+Family_size_count+'"><select style="width:110px;" name="hospital_cash_type[]" id="hospital_cash_type" class="form-control hospital_cash_type" onchange="get_hospital_cash_type_prem()" ><option value="Not Opted">Not Opted</option> <option value="Opted">Opted</option></select><input type="text" name="hospital_cash_prem[]" id="hospital_cash_prem" class="form-control mt-1 hospital_cash_prem" value=""></td><td rowspan="'+Family_size_count+'"><select style="width:110px;" name="safeguard_benefi_type[]" id="safeguard_benefi_type" class="form-control safeguard_benefi_type" onchange="get_safeguard_benefi_type_prem()" ><option value="Not Opted">Not Opted</option> <option value="Opted">Opted</option></select><input style="width:100px;" type="text" name="safeguard_benefi_prem[]" id="safeguard_benefi_prem" value="" class="form-control mt-1 safeguard_benefi_prem" > </td><td width="8%" rowspan="'+Family_size_count+'"><input style="width:100px;" type="text" name="tot_prem[]" id="tot_prem" value="" class="form-control tot_prem" ></td> </tr>';
            }
         }
        $("#first_table_tbody").append(tr_table);
        for (var add_medi_maxBupa_counter = 0; add_medi_maxBupa_counter < Family_size_count; add_medi_maxBupa_counter++) {
            if(add_medi_maxBupa_counter == 0){
                $("#name_insured_member_name_" + add_medi_maxBupa_counter).val(policy_holder_name);
                get_dob(add_medi_maxBupa_counter);
            }
        }
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

    function get_dob(add_medi_maxBupa_counter) {
        get_age(add_medi_maxBupa_counter);
        if (add_medi_maxBupa_counter == 0) {
            var name_insured_relation = $('#name_insured_relation_' + add_medi_maxBupa_counter + ' option').filter(function() {
                return $(this).html() == "Self";
            }).val();
            $('#name_insured_relation_' + add_medi_maxBupa_counter).val(name_insured_relation);
        }
        var region = $("#region").val();
        var years_of_premium = $("#years_of_premium").val();

        if (region == "null" || region == "" || years_of_premium == "null" || years_of_premium == "") {
            $('#name_insured_member_name_' + add_medi_maxBupa_counter).prop('selectedIndex', 0);
            if (region == "null" || region == "")
                toaster(message_type = "Error", message_txt = " Please Select Region First.", message_icone = "error");
            if (years_of_premium == "null" || years_of_premium == "")
                toaster(message_type = "Error", message_txt = " Please Select Years of Premium.", message_icone = "error");
            return false;
        }

        var name_insured_member_name = $("#name_insured_member_name_" + add_medi_maxBupa_counter).val();
        var url = "<?php echo base_url(); ?>master/policy/get_membernameBased_details";

        if (name_insured_member_name != "" || name_insured_member_name != "null") {
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
                        $('#name_insured_dob_' + add_medi_maxBupa_counter).val("");
                        var dob = data["userdata"].dob;
                        if (dob == "null") {
                            dob = "";
                            toaster(message_type = "Error", message_txt = "The DOB field is required.", message_icone = "error");
                        } else {
                            dob = dateFormate(dob);
                        }
                        $('#name_insured_dob_' + add_medi_maxBupa_counter).val(dob);
                    } else {
                        $('#name_insured_dob_' + add_medi_maxBupa_counter).val("");
                    }
                    get_age(add_medi_maxBupa_counter);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function get_age(add_medi_maxBupa_counter) {
        var sub_policy_name_hidden = $("#sub_policy_name").is(":visible");
        if (sub_policy_name_hidden == true) {
            var sub_policy_name = $("#sub_policy_name").val();
            if (sub_policy_name == "null" || sub_policy_name == "") {
                toaster(message_type = "Error", message_txt = "The Floater Sub Policy Name field is required.", message_icone = "error");
                return false;
            }
        }
        var name_insured_member_name = $("#name_insured_member_name_" + add_medi_maxBupa_counter).val();
        var name_insured_dob = $("#name_insured_dob_" + add_medi_maxBupa_counter).val();

        if (name_insured_member_name == "null" || name_insured_member_name == "" || name_insured_dob == "") {
            $('#name_insured_age_' + add_medi_maxBupa_counter).val("");
        }

        var url = "<?php echo base_url(); ?>master/policy/get_age_calculation_basedon_dob";

        if (name_insured_member_name != "null" && name_insured_member_name != "" && name_insured_dob != "") {
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
                        $('#name_insured_age_' + add_medi_maxBupa_counter).val("");
                        var age = data["age"];
                        $('#name_insured_age_' + add_medi_maxBupa_counter).val(age);
                    } else {
                        $('#name_insured_age_' + add_medi_maxBupa_counter).val("");
                    }
                    get_age_Comparision();
                    // get_basic_premium(add_medi_maxBupa_counter);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
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
        get_basic_premium();
    }

    function check_suminsured() {

        var name_insured_sum_insured = $("#name_insured_sum_insured").val();
        name_insured_sum_insured = sum_insured_int_Converter(name_insured_sum_insured);
        var name_insured_member_name = $("#name_insured_member_name").val();
        if (name_insured_member_name == "null" || name_insured_member_name == "") {
            toaster(message_type = "Error", message_txt = "The Name Of Insured field is required.", message_icone = "error");
            $('#name_insured_sum_insured').prop('selectedIndex', 0);
            $('#pab_type').prop('selectedIndex', 0);
            $('#hospital_cash_type').prop('selectedIndex', 0);
            $('#safeguard_benefi_type').prop('selectedIndex', 0);
            $('#pab_prem').val("");
            $('#hospital_cash_prem').val("");
            $('#safeguard_benefi_prem').val("");
            return false;
        }

        get_pab_type_premium();
        get_hospital_cash_type_prem();
        get_safeguard_benefi_type_prem();
        Tot_Benefit_Cal();
    }

    sum_insured_dropdown();

    function sum_insured_dropdown() {
        var sum_Val = ["3,00,000", "4,00,000", "5,00,000", "7,50,000", "10,00,000", "12,50,000", "15,00,000", "20,00,000", "25,00,000", "50,00,000", "75,00,000", "1,00,00,000"];
        var i = 0;
        for (i; i <= 11; i++) {
            sum_insured_dropdown_val += '<option value="' + sum_Val[i] + '">' + sum_Val[i] + '</option>';
        }
        $(".name_insured_sum_insured").append(sum_insured_dropdown_val);
        // alert(sum_insured_dropdown_val);

        $(".name_insured_member_name").empty();
        $(".name_insured_member_name").append('<option value="null">Select Member Names</option>' + option_val_data);
        $(".nominee_name").empty();
        $(".nominee_name").append('<option value="null">Select Nominee Name</option>' + option_val_data);
    }
    var actual_data_MediclaimmaxBupa = [];

    function Total_FloatMedi_max_bupa_reassure() {
        actual_data_MediclaimmaxBupa = [];

        $("#first_table tr:has(.name_insured_member_name)").each(function(key, val) {
            var name_insured_member_name = $(".name_insured_member_name", this).val();
            var name_insured_member_name_txt = $(".name_insured_member_name option:selected", this).text();
            var name_insured_dob = $(".name_insured_dob", this).val();
            var name_insured_age = $(".name_insured_age", this).val();
            var name_insured_relation = $(".name_insured_relation", this).val();
            var name_insured_relation_txt = $(".name_insured_relation option:selected", this).text();
            var nominee_name = $(".nominee_name", this).val();
            var nominee_name_txt = $(".nominee_name option:selected", this).text();
            var nominee_relation = $(".nominee_relation", this).val();
            var nominee_relation_txt = $(".nominee_relation option:selected", this).text();
            var name_insured_sum_insured = $(".name_insured_sum_insured", this).val();
            var basic_premium = $(".basic_premium", this).val();

            var pab_type = $(".pab_type", this).val();
            var pab_prem = $(".pab_prem", this).val();
            var hospital_cash_type = $(".hospital_cash_type", this).val();
            var hospital_cash_prem = $(".hospital_cash_prem", this).val();
            var safeguard_benefi_type = $(".safeguard_benefi_type", this).val();
            var safeguard_benefi_prem = $(".safeguard_benefi_prem", this).val();
            var tot_prem = $(".tot_prem", this).val();

            actual_data_MediclaimmaxBupa.push([key, name_insured_member_name, name_insured_member_name_txt, name_insured_dob, name_insured_age, name_insured_relation, name_insured_relation_txt, nominee_name, nominee_name_txt, nominee_relation, nominee_relation_txt, name_insured_sum_insured, basic_premium, pab_type, pab_prem, hospital_cash_type, hospital_cash_prem, safeguard_benefi_type, safeguard_benefi_prem, tot_prem]);
            if (name_insured_member_name == '')
                actual_data_MediclaimmaxBupa.splice(key, 1);
        });
        // console.log(actual_data_MediclaimmaxBupa);
        // alert(actual_data_MediclaimmaxBupa);
        return actual_data_MediclaimmaxBupa;

        // var total_MediclaimmaxBupa = JSON.stringify(Total_MediclaimmaxBupa());
        // alert(total_MediclaimmaxBupa);
        // return false;
    }

    function sum_insured_int_Converter(name_insured_sum_insured) {
        var sum_insured = "";
        if (name_insured_sum_insured == "1,00,000")
            var sum_insured = "100000";
        else if (name_insured_sum_insured == "1,50,000")
            var sum_insured = "150000";
        else if (name_insured_sum_insured == "2,00,000")
            var sum_insured = "200000";
        else if (name_insured_sum_insured == "2,50,000")
            var sum_insured = "250000";
        else if (name_insured_sum_insured == "3,00,000")
            var sum_insured = "300000";
        else if (name_insured_sum_insured == "3,50,000")
            var sum_insured = "350000";
        else if (name_insured_sum_insured == "4,00,000")
            var sum_insured = "400000";
        else if (name_insured_sum_insured == "4,50,000")
            var sum_insured = "450000";
        else if (name_insured_sum_insured == "5,00,000")
            var sum_insured = "500000";
        else if (name_insured_sum_insured == "5,50,000")
            var sum_insured = "550000";
        else if (name_insured_sum_insured == "6,00,000")
            var sum_insured = "600000";
        else if (name_insured_sum_insured == "6,50,000")
            var sum_insured = "650000";
        else if (name_insured_sum_insured == "7,00,000")
            var sum_insured = "700000";
        else if (name_insured_sum_insured == "7,50,000")
            var sum_insured = "750000";
        else if (name_insured_sum_insured == "8,00,000")
            var sum_insured = "800000";
        else if (name_insured_sum_insured == "8,50,000")
            var sum_insured = "850000";
        else if (name_insured_sum_insured == "9,00,000")
            var sum_insured = "900000";
        else if (name_insured_sum_insured == "9,50,000")
            var sum_insured = "950000";
        else if (name_insured_sum_insured == "10,00,000")
            var sum_insured = "1000000";
        else if (name_insured_sum_insured == "12,00,000")
            var sum_insured = "1200000";
        else if (name_insured_sum_insured == "12,50,000")
            var sum_insured = "1250000";
        else if (name_insured_sum_insured == "11,00,000")
            var sum_insured = "1100000";
        else if (name_insured_sum_insured == "15,00,000")
            var sum_insured = "1500000";
        else if (name_insured_sum_insured == "16,00,000")
            var sum_insured = "1600000";
        else if (name_insured_sum_insured == "20,00,000")
            var sum_insured = "2000000";
        else if (name_insured_sum_insured == "25,00,000")
            var sum_insured = "2500000";
        else if (name_insured_sum_insured == "50,00,000")
            var sum_insured = "5000000";
        else if (name_insured_sum_insured == "75,00,000")
            var sum_insured = "7500000";
        else if (name_insured_sum_insured == "1,00,00,000")
            var sum_insured = "10000000";

        sum_insured = parseInt(sum_insured);

        if (isNaN(sum_insured))
            sum_insured = 0;
        else
            sum_insured = sum_insured;

        return sum_insured;

    }

    function getcolumnOnAge(age) {
        var column_value = "";
        if (age <= 17) {
            column_value = "00_17";
        } else if (age <= 35) {
            column_value = "18_35";
        } else if (age <= 45) {
            column_value = "36_45";
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
            column_value = "75+";
        }
        // alert(column_value);
        return column_value;
    }

    function get_pab_type_premium() {
        $('#pab_prem' ).val("");
        var pab_type = $("#pab_type").val();
        var max_age = $("#max_age").val();
        var basic_premium = $("#basic_premium").val();
        basic_premium = parseInt(basic_premium);
        if(isNaN(basic_premium))
            basic_premium = 0;
        else
            basic_premium = basic_premium;

        var pab_prem = 0;
        if(pab_type == "Opted"){
            if(max_age >= 18){
                var pab_prem_rate = 0.89;
                pab_prem = Math.round((basic_premium * pab_prem_rate) / 100);
                $("#pab_prem").val(pab_prem);
            }
        }else{
            $("#pab_prem").val(pab_prem);
        }
        Tot_Benefit_Cal();
    }

    function get_hospital_cash_type_prem() {
        $('#hospital_cash_prem').val("");
        var hospital_cash_type = $("#hospital_cash_type").val();
        var max_age = $("#max_age").val();
        var basic_premium = $("#basic_premium").val();
        basic_premium = parseInt(basic_premium);
        if(isNaN(basic_premium))
            basic_premium = 0;
        else
            basic_premium = basic_premium;

        var hospital_cash_prem = 0;
        if(hospital_cash_type == "Opted"){
            var hospital_cash_prem_rate = 6.5;
            hospital_cash_prem = Math.round((basic_premium * hospital_cash_prem_rate) / 100);
            $("#hospital_cash_prem").val(hospital_cash_prem);
        }else{
            $("#hospital_cash_prem").val(hospital_cash_prem);
        }
        Tot_Benefit_Cal();
    }

    function get_safeguard_benefi_type_prem() {
        var name_insured_sum_insured = $("#name_insured_sum_insured").val();
        name_insured_sum_insured = sum_insured_int_Converter(name_insured_sum_insured);
        $('#safeguard_benefi_prem').val("");
        var safeguard_benefi_type = $("#safeguard_benefi_type").val();
        var max_age = $("#max_age").val();
        var basic_premium = $("#basic_premium").val();
        basic_premium = parseInt(basic_premium);
        if(isNaN(basic_premium))
            basic_premium = 0;
        else
            basic_premium = basic_premium;

        var safeguard_benefi_prem = 0;
        var safeguard_benefi_prem_rate = 0;
        if(safeguard_benefi_type == "Opted"){
            if(name_insured_sum_insured <= 500000)
                safeguard_benefi_prem_rate = 10;
            else if(name_insured_sum_insured > 500000)
                safeguard_benefi_prem_rate = 7.5;

            safeguard_benefi_prem = Math.round((basic_premium * safeguard_benefi_prem_rate) / 100);
            $("#safeguard_benefi_prem").val(safeguard_benefi_prem);
            
        }else{
            $("#safeguard_benefi_prem").val(safeguard_benefi_prem);
        }
        Tot_Benefit_Cal();
  
    }

    function get_basic_premium() {
     
        $('#basic_premium').val("");
        $('#tot_prem').val("");
        check_suminsured();
        Tot_Benefit_Cal();

        var name_insured_member_name = $("#name_insured_member_name").val();
        if (name_insured_member_name == "null" || name_insured_member_name == "") {
            toaster(message_type = "Error", message_txt = "The Name Of Insured field is required.", message_icone = "error");
            $('#name_insured_sum_insured').prop('selectedIndex', 0);
            $('#pab_type').prop('selectedIndex', 0);
            $('#hospital_cash_type').prop('selectedIndex', 0);
            $('#safeguard_benefi_type').prop('selectedIndex', 0);
            $('#pab_prem').val("");
            $('#hospital_cash_prem').val("");
            $('#safeguard_benefi_prem').val("");
            return false;
        }
        var years_of_premium = $("#years_of_premium").val();
        var region = $("#region").val();
        var max_age = $("#max_age").val();
        if(max_age<18){
            toaster(message_type = "Error", message_txt = "This Age Person Basic Premium Not Available.", message_icone = "error");
            return false;
        }
        // var condition_value = getcolumnOnAge(name_insured_age);
        var name_insured_sum_insured = $("#name_insured_sum_insured").val();
        var column_value = sum_insured_int_Converter(name_insured_sum_insured);
        var sub_policy_family_size= $("#sub_policy_family_size").val();
        var condition_value = [];
        max_age = parseInt(max_age);
        count=1;
        for(var i=0;i<years_of_premium;i++){
            if(i==0)
                max_age = max_age;
            else
                max_age = max_age+count;
            condition_value[i] = getcolumnOnAge(max_age);
        }

        if (years_of_premium != "null" && years_of_premium != "" && region != "null" && region != "" && max_age != "" && name_insured_sum_insured != "null" && name_insured_sum_insured != "" && condition_value != "" && column_value != "") {
            var url = "<?php echo base_url(); ?>master/remote/get_max_bupa_reassure_float_basic_prem";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        sub_policy_family_size: sub_policy_family_size,
                        region : region,
                        age: max_age,
                        condition_value: condition_value,
                        column_value: column_value,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            if (data["userdata"] == "")
                                $('#basic_premium').val("");

                            $('#basic_premium').val("");
                            $('#basic_premium').val(data["userdata"]);

                        } else {
                            $('#basic_premium').val("");
                        }
                        check_suminsured();
                        Tot_Benefit_Cal();

                        second_year_tot = 0;
                        third_year_tot = 0; // Hilight

                        var term_disc = get_year_wise_term_discount();
                        if(term_disc != undefined || term_disc != "undefined" || term_disc !="" || term_disc !="null" || term_disc !=null){
                            term_disc = term_disc.split("-");
                            var sec_year_tot = term_disc[0];
                            var th_year_tot = term_disc[1];

                            second_year_tot = parseInt(second_year_tot) + parseInt(sec_year_tot);
                            third_year_tot = parseInt(third_year_tot) + parseInt(th_year_tot);
                            $("#second_year_tot").val(second_year_tot);
                            $("#third_year_tot").val(third_year_tot);
                        }
                        Tot_Term_Discount();
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

    function Tot_Benefit_Cal(){
        var basic_premium = $("#basic_premium").val();
        var pab_prem = $("#pab_prem").val();
        var hospital_cash_prem = $("#hospital_cash_prem").val();
        var safeguard_benefi_prem = $("#safeguard_benefi_prem").val();

        basic_premium = parseInt(basic_premium);
        pab_prem = parseInt(pab_prem);
        hospital_cash_prem = parseInt(hospital_cash_prem);
        safeguard_benefi_prem = parseInt(safeguard_benefi_prem);

        if (isNaN(basic_premium))
            basic_premium = 0;
        else
            basic_premium = basic_premium;

        if (isNaN(pab_prem))
            pab_prem = 0;
        else
            pab_prem = pab_prem;

        if (isNaN(hospital_cash_prem))
            hospital_cash_prem = 0;
        else
            hospital_cash_prem = hospital_cash_prem;

        if (isNaN(safeguard_benefi_prem))
            safeguard_benefi_prem = 0;
        else
            safeguard_benefi_prem = safeguard_benefi_prem;

        var tot_prem = 0;
        tot_prem = basic_premium + pab_prem + hospital_cash_prem + safeguard_benefi_prem;

        tot_prem = parseInt(tot_prem);
        $("#tot_prem").val("");
        
        if (isNaN(tot_prem))
            tot_prem = 0;
        else
            tot_prem = tot_prem;
        $("#tot_prem").val(tot_prem);

        Tot_premium();
    }

    function Tot_premium() {
        var inputs = $(".tot_prem");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var tot_prem = $(inputs[i]).val();
            tot_prem = parseInt(tot_prem);
            if (isNaN(tot_prem))
                tot_prem = 0;
            else
                tot_prem = tot_prem;

            total = total + tot_prem;
            if (isNaN(total))
                total = 0;
            else
                total = total;
            $("#tot_premium").val(total);
        }
        $("#gross_premium_tot_new").val(total);
        Tot_basic_premium();
        Standing_Instruction_Discount_Cal();
        Tot_premium_after_discount();
    }

    function Standing_Instruction_Discount_Cal(){
        var inputs = $(".basic_premium");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var basic_premium = $(inputs[i]).val();
            basic_premium = parseInt(basic_premium);
            if (isNaN(basic_premium))
                basic_premium = 0;
            else
                basic_premium = basic_premium;

            total = total + basic_premium;
            if (isNaN(total))
                total = 0;
            else
                total = total;
        }

        var stand_instu_rate = $("#stand_instu_rate").val();
        var stand_instu_tot = 0;
        stand_instu_rate = parseInt(stand_instu_rate);
        if (isNaN(stand_instu_rate))
            stand_instu_rate = 0;
        else
            stand_instu_rate = stand_instu_rate;

        stand_instu_tot = Math.round((stand_instu_rate * total) /100);
        $("#stand_instu_tot").val(stand_instu_tot);
        medi_doctor_disc_tot_Cal();
        Tot_premium_after_discount();
    }

    function medi_doctor_disc_tot_Cal(total){
        var inputs = $(".basic_premium");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var basic_premium = $(inputs[i]).val();
            basic_premium = parseInt(basic_premium);
            if (isNaN(basic_premium))
                basic_premium = 0;
            else
                basic_premium = basic_premium;

            total = total + basic_premium;
            if (isNaN(total))
                total = 0;
            else
                total = total;
        }
        var doctor_disc_per = $("#doctor_disc_per").val();
        var doctor_disc_tot = 0;
        doctor_disc_per = parseInt(doctor_disc_per);
        if (isNaN(doctor_disc_per))
            doctor_disc_per = 0;
        else
            doctor_disc_per = doctor_disc_per;

        doctor_disc_tot = Math.round((doctor_disc_per * total) /100);
        $("#doctor_disc_tot").val(doctor_disc_tot);
        Tot_premium_after_discount();
    }

    function Tot_basic_premium() {
        var inputs = $(".basic_premium");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var basic_premium = $(inputs[i]).val();
            basic_premium = parseInt(basic_premium);
            if (isNaN(basic_premium))
                basic_premium = 0;
            else
                basic_premium = basic_premium;

            total = total + basic_premium;
            if (isNaN(total))
                total = 0;
            else
                total = total;
            $("#tot_basic_prem").val(total);
        }
    }

    var tot_premium_rate = 0;

    function get_year_wise_term_discount() {
        $("#second_year_tot").val("");
        $("#third_year_tot").val("");

        var years_of_premium = $("#years_of_premium").val();
        var region = $("#region").val();
        var max_age = $("#max_age").val();

        var name_insured_sum_insured = $("#name_insured_sum_insured").val();
        var column_value = sum_insured_int_Converter(name_insured_sum_insured);
        var sub_policy_family_size= $("#sub_policy_family_size").val();

        var second_year_tot = 0;
        var third_year_tot = 0;
        
        var condition_value = [];
        max_age = parseInt(max_age);
        count=1;
        for(var i=0;i<years_of_premium;i++){
            if(i==0)
                max_age = max_age;
            else
                max_age = max_age+count;
            condition_value[i] = getcolumnOnAge(max_age);
        }

        if (years_of_premium != "null" && years_of_premium != "" && region != "null" && region != "" && max_age != "" && name_insured_sum_insured != "null" && name_insured_sum_insured != "" && condition_value != "" && column_value != "") {
            var url = "<?php echo base_url(); ?>master/remote/get_max_bupa_reassure_float_year_wise_term_discount";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        sub_policy_family_size: sub_policy_family_size,
                        region : region,
                        age: max_age,
                        condition_value: condition_value,
                        column_value: column_value,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            var val = data["userdata"];
                            var column = data["condition_value"];
                            var age = 0;
                            var column_val = JSON.parse(column_value);
                            var val_count = val.length;
                            var rate = 0;
                            console.log(val);

                            for (var i = 0; i < column.length; i++) {
                                var term_count = parseInt(i+1);
                                age = column[i];
                                var premium_rate = 0;
                                for (var j = 0; j < val.length; j++) {
                                if(years_of_premium == 2){
                                    if(val.length==1){
                                        var age_1 = val[0]["age"];
                                    }else if(val.length==2){
                                        if(age >75)
                                            var age_1 = val[0]["age"];
                                        else{
                                            var age_1 = val[1]["age"];
                                        }
                                    }else{
                                        var age_1 = val[2]["age"];
                                    }
                                }else if(years_of_premium == 3 || years_of_premium == 4 || years_of_premium == 5){
                                    if(val.length==1){
                                        var age_1 = val[0]["age"];
                                    }else if(val.length==2){
                                        if(age >75)
                                            var age_1 = val[0]["age"];
                                        else{
                                            var age_1 = val[1]["age"];
                                        }
                                    }else{
                                        var age_1 = val[2]["age"];
                                    }
                                    if(val.length==2)
                                        var age_2 = val[1]["age"];
                                    else if(val.length==1)
                                        var age_2 = val[0]["age"];
                                    else
                                        var age_2 = val[2]["age"];
                                }

                                if(i == 1){
                                    rate = 7.5;
                                    if(age == age_1){
                                        if(val.length==2)
                                            premium_rate = val[1][column_val];
                                        else if(val.length==1)
                                            premium_rate = val[0][column_val];
                                        else
                                            premium_rate = val[2][column_val];
                                    }
                                    second_year_tot = Math.round((rate * premium_rate) /100);
                                    $("#second_year_tot").val(second_year_tot);
                                }else if(i == 2){
                                    var rate_1 = 7.5;
                                    if((age == age_1) || (age == age_2) || (age != age_1) || (age != age_2)){
                                        
                                        if(years_of_premium == 2){
                                            if(val.length==2)
                                                var premium_rate_1 = val[1][column_val];
                                            else if(val.length==1)
                                                var premium_rate_1 = val[0][column_val];
                                        }else if(years_of_premium == 3 || years_of_premium == 4 || years_of_premium == 5){
                                            console.log(column_val);
                                            if(val.length==2)
                                                var premium_rate_1 = val[1][column_val];
                                            else if(val.length==1)
                                                var premium_rate_1 = val[0][column_val];

                                            if(val.length==2)
                                                var premium_rate_2 = val[1][column_val];
                                            else if(val.length==1)
                                                var premium_rate_2 = val[0][column_val];
                                            else
                                                var premium_rate_2 = val[2][column_val];
                                        }
                                        second_year_tot = Math.round((rate_1 * premium_rate_1) /100);
                                        $("#second_year_tot").val(second_year_tot);

                                        var rate_2 = 15;
                                        
                                        third_year_tot = Math.round((rate_2 * premium_rate_2) /100);
                                        $("#third_year_tot").val(third_year_tot);
                                    }

                                }
                                }
                            }
                            // alert(second_year_tot);
                            // alert(third_year_tot);
                            // if(val.length == 1){
                            //     rate = 7.5;
                            //     premium_rate = val[1][column_val];
                            //     var second_year_tot = Math.round((rate * premium_rate) /100);
                            //     $("#second_year_tot").val(second_year_tot);
                            //     alert(premium_rate+" Premium rate ");
                            // }else if(val.length == 2){
                            //     var rate_1 = 7.5;
                            //     var premium_rate_1 = val[1][column_val];
                            //     var second_year_tot = Math.round((rate_1 * premium_rate_1) /100);
                            //     $("#second_year_tot").val(second_year_tot);
                            //     alert(premium_rate+" Premium rate ");

                            //     var rate_2 = 15;
                            //     var premium_rate_2 = val[2][column_val];
                            //     var third_year_tot = Math.round((rate_2 * premium_rate_2) /100);
                            //     $("#third_year_tot").val(third_year_tot);
                            //     alert(premium_rate+" Premium rate ");
                            // }
                        } else {
                            $("#second_year_tot").val("");
                            $("#third_year_tot").val("");
                        }

                        Tot_Term_Discount();
                    },
                    error: function(xhr, status) {
                        alert('Sorry, there was a problem!');
                    },
                    complete: function(xhr, status) {

                    }
                });
     
            }
        }
        return second_year_tot+"-"+third_year_tot;
    }

    function Tot_Term_Discount(){
        var first_year_tot = $("#first_year_tot").val();
        var second_year_tot = $("#second_year_tot").val();
        var third_year_tot = $("#third_year_tot").val();

        first_year_tot = parseInt(first_year_tot);
        second_year_tot = parseInt(second_year_tot);
        third_year_tot = parseInt(third_year_tot);

        if (isNaN(first_year_tot))
            first_year_tot = 0;
        else
            first_year_tot = first_year_tot;

        if (isNaN(second_year_tot))
            second_year_tot = 0;
        else
            second_year_tot = second_year_tot;

        if (isNaN(third_year_tot))
            third_year_tot = 0;
        else
            third_year_tot = third_year_tot;

        var tot_term_disc = 0;
        tot_term_disc = first_year_tot + second_year_tot + third_year_tot;

        tot_term_disc = parseInt(tot_term_disc);

        if (isNaN(tot_term_disc))
            tot_term_disc = 0;
        else
            tot_term_disc = tot_term_disc;
            
        $("#tot_term_disc").val(tot_term_disc);
        Tot_premium_after_discount();
    }

    function Tot_premium_after_discount() {

        var gross_premium_tot_new = $("#gross_premium_tot_new").val();
        var tot_term_disc = $("#tot_term_disc").val();
        var stand_instu_tot = $("#stand_instu_tot").val();
        var doctor_disc_tot = $('#doctor_disc_tot').val();

        gross_premium_tot_new = parseInt(gross_premium_tot_new);
        tot_term_disc = parseInt(tot_term_disc);
        stand_instu_tot = parseInt(stand_instu_tot);
        doctor_disc_tot = parseInt(doctor_disc_tot);

        if (isNaN(gross_premium_tot_new))
            gross_premium_tot_new = 0;
        else
            gross_premium_tot_new = gross_premium_tot_new;

        if (isNaN(tot_term_disc))
            tot_term_disc = 0;
        else
            tot_term_disc = tot_term_disc;

        if (isNaN(stand_instu_tot))
            stand_instu_tot = 0;
        else
            stand_instu_tot = stand_instu_tot;

        if (isNaN(doctor_disc_tot))
            doctor_disc_tot = 0;
        else
            doctor_disc_tot = doctor_disc_tot;

        var discount = 0;
        discount = tot_term_disc + stand_instu_tot + doctor_disc_tot;
        
        var last_gross_premium_tot = 0;
        last_gross_premium_tot = (gross_premium_tot_new - discount);

        last_gross_premium_tot = parseInt(last_gross_premium_tot);
        if (isNaN(last_gross_premium_tot))
            last_gross_premium_tot = 0;
        else
            last_gross_premium_tot = last_gross_premium_tot;

        $("#gross_premium_tot").val(last_gross_premium_tot);
        gst_apply();
    }

    // Calculation Section Start

    function gst_apply() {
        var tot_premium = $("#gross_premium_tot").val();
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

        tot_premium = parseInt(tot_premium);
        if (isNaN(tot_premium))
            tot_premium = 0;
        else
            tot_premium = tot_premium;

        if (tot_premium == "") {
            $("#medi_cgst_tot").val(0);
            $("#medi_sgst_tot").val(0);
            $("#medi_final_premium").val(0);
        }

        var medi_cgst_tot = Math.round((tot_premium * cgst_fire_per) / 100);
        var medi_sgst_tot = Math.round((tot_premium * sgst_fire_per) / 100);
        $("#medi_cgst_tot").val(medi_cgst_tot);
        $("#medi_sgst_tot").val(medi_sgst_tot);

        var medi_final_premium = parseInt(tot_premium) + parseInt(medi_cgst_tot) + parseInt(medi_sgst_tot);
        $("#medi_final_premium").val(medi_final_premium);

    }

    // Calculation Section End
</script>