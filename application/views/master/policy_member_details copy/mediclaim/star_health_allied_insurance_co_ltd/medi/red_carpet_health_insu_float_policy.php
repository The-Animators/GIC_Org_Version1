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
                <select class="form-control years_of_premium" name="years_of_premium" id="years_of_premium" onchange="Region_change();">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <!-- <option value="4">4</option>
                    <option value="5">5</option> -->
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
                </tr>
            </thead>
            <tbody id="first_table_tbody">

            </tbody>
        </table>
    </div>
    
    <div class="col-md-12">
        <table class="table mb-0 table-bordered mt-2 col-md-12">
            <tr id="">
                <td colspn="2"><strong>Total Premium: </strong></td>
                <td colspn=""><strong></strong></td>
                <td><strong id="medi_total_amount_td"><input type="text" id="tot_premium" name="tot_premium" class="form-control tot_premium" disabled></strong></td>
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
                <td><strong id="medi_final_premium_td"><input type="text" id="medi_final_premium" name="medi_final_premium" class="form-control" disabled><input type="hidden" id="medi_star_health_float_policy_id" name="medi_star_health_float_policy_id" class="form-control"><input type="hidden" id="max_age" name="max_age" class="form-control"></td>
            </tr>
        </table>
    </div>
</div>

<script>
    var sum_insured_dropdown_val = "";
    var add_medi_starHealth_counter = 0;
    var main_Mediclaim_starHealth = [];
    
    var second_year_tot = 0;
    var third_year_tot = 0;

    function Region_change(){
        var years_of_premium = $("#years_of_premium").val();
        second_year_tot = 0;
        third_year_tot = 0;
        var flag = false;
        if (years_of_premium == "null" || years_of_premium == ""){
            flag =false;
        } else {
            flag =true;
        }
        get_basic_premium();
    }

    function removeMediclaimstarHealth(add_medi_starHealth_counter) {

        $("#remove_mediclaim_starHealth_" + add_medi_starHealth_counter).closest("tr").remove();
        var indexValue = main_Mediclaim_starHealth.indexOf(add_medi_starHealth_counter);
        main_Mediclaim_starHealth.splice(indexValue, 1);

        if (main_Mediclaim_starHealth.length == 0) {
            add_medi_starHealth_counter = 0;
            main_Mediclaim_starHealth = [];
            $("#Add_Mediclaim_starHealth").attr("onClick", "AddMediclaimstarHealth(" + add_medi_starHealth_counter + ")");
        }
        second_year_tot = 0;
        third_year_tot = 0;
        // alert(main_Mediclaim_starHealth);
        get_basic_premium();
        // alert(main_Mediclaim_starHealth);
    }

    function family_Size_Val(family_size_new) {
        // alert(family_size_new);
        var star_health_allied_insu_type = $("#star_health_allied_insu_type").val();
        if(star_health_allied_insu_type=="null" || star_health_allied_insu_type == "")
            toaster(message_type = "Error", message_txt = "The Floater Policy Type field is required.", message_icone = "error");

        if(family_size_new != "" && family_size_new !="null" && family_size_new !=undefined)
            var family_size = family_size_new;
        else
            var family_size = $("#star_health_allied_insu_red_carpet_float_family_size").val();

        if (family_size == "2A + 0C")
            var Family_size_count = 2;
            AddMediclaimstarHealth(Family_size_count);
    }

    function AddMediclaimstarHealth(Family_size_count) {
        var policy_holder_name = $("#policy_holder_name").val();
        var tr_table = "";
        $("#first_table_tbody").empty();

        for (var add_medi_starHealth_counter = 0; add_medi_starHealth_counter < Family_size_count; add_medi_starHealth_counter++) {
            tr_table += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_starHealth_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_starHealth_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_starHealth_counter + '" name="name_insured_dob[]" value="" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_starHealth_counter + '" name="name_insured_age[]" value="" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_starHealth_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;  endif; ?> </select></td>';

            if(add_medi_starHealth_counter == 0){
                tr_table += ' <td width="12%"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach;     endif; ?> </select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium()"><option value="null">Select Sum Insured</option>' + sum_insured_dropdown_val + '</select></td><td> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium"  class="form-control basic_premium" value=""></td></tr>';
            }
         }
         $("#first_table_tbody").append(tr_table);
        for (var add_medi_starHealth_counter = 0; add_medi_starHealth_counter < Family_size_count; add_medi_starHealth_counter++) {
            if(add_medi_starHealth_counter == 0){
                $("#name_insured_member_name_" + add_medi_starHealth_counter).val(policy_holder_name);
                get_dob(add_medi_starHealth_counter);
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

    function get_dob(add_medi_starHealth_counter) {
        get_age(add_medi_starHealth_counter);
        if (add_medi_starHealth_counter == 0) {
            var name_insured_relation = $('#name_insured_relation_' + add_medi_starHealth_counter + ' option').filter(function() {
                return $(this).html() == "Self";
            }).val();
            $('#name_insured_relation_' + add_medi_starHealth_counter).val(name_insured_relation);
        }
        var region = $("#region").val();
        var years_of_premium = $("#years_of_premium").val();

        if (region == "null" || region == "" || years_of_premium == "null" || years_of_premium == "") {
            $('#name_insured_member_name_' + add_medi_starHealth_counter).prop('selectedIndex', 0);
            if (region == "null" || region == "")
                toaster(message_type = "Error", message_txt = " Please Select Region First.", message_icone = "error");
            if (years_of_premium == "null" || years_of_premium == "")
                toaster(message_type = "Error", message_txt = " Please Select Years of Premium.", message_icone = "error");
            return false;
        }

        var name_insured_member_name = $("#name_insured_member_name_" + add_medi_starHealth_counter).val();
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
                        $('#name_insured_dob_' + add_medi_starHealth_counter).val("");
                        var dob = data["userdata"].dob;
                        if (dob == "null") {
                            dob = "";
                            toaster(message_type = "Error", message_txt = "The DOB field is required.", message_icone = "error");
                        } else {
                            dob = dateFormate(dob);
                        }
                        $('#name_insured_dob_' + add_medi_starHealth_counter).val(dob);
                    } else {
                        $('#name_insured_dob_' + add_medi_starHealth_counter).val("");
                    }
                    get_age(add_medi_starHealth_counter);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function get_age(add_medi_starHealth_counter) {
        var name_insured_member_name = $("#name_insured_member_name_" + add_medi_starHealth_counter).val();
        var name_insured_dob = $("#name_insured_dob_" + add_medi_starHealth_counter).val();

        if (name_insured_member_name == "null" || name_insured_member_name == "" || name_insured_dob == "") {
            $('#name_insured_age_' + add_medi_starHealth_counter).val("");
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
                    var age = data["age"];
                    if(age <60 || age >75){
                        $('#name_insured_age_' + add_medi_starHealth_counter).val(age);
                        $("#name_insured_sum_insured").attr("disabled",false);
                        $("#basic_premium").attr("disabled",false);
                        $("#name_insured_sum_insured").val("null");
                        $("#basic_premium").val(0);
                    }else{
                    if (data["status"] == true) {
                        $('#name_insured_age_' + add_medi_starHealth_counter).val("");
                        var age = data["age"];
                        if(age <60 || age >75){
                            // $('#name_insured_age_' + add_medi_starHealth_counter).val("");
                        }else{
                            $('#name_insured_age_' + add_medi_starHealth_counter).val(age);
                        }
                    } else {
                        $('#name_insured_age_' + add_medi_starHealth_counter).val("");
                    }
                    if(age <60 || age >75){
                        toaster(message_type = "Error", message_txt = "Only 60 to 75 Years people allowed For This Policy .", message_icone = "error");
                        $("#name_insured_sum_insured").attr("disabled",true);
                        $("#basic_premium").attr("disabled",true);
                        $("#name_insured_sum_insured").val("null");
                        $("#basic_premium").val("");
                        $("#tot_premium").val("");
                        $("#medi_cgst_tot").val("");
                        $("#medi_sgst_tot").val("");
                        $("#medi_final_premium").val("");
                        return false;
                    }else{
                        $("#name_insured_sum_insured").attr("disabled",false);
                        $("#basic_premium").attr("disabled",false);
                    }}
                    get_age_Comparision();
                    get_basic_premium();
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

    function check_suminsured(add_medi_starHealth_counter) {

        var name_insured_sum_insured = $("#name_insured_sum_insured_" + add_medi_starHealth_counter).val();
        name_insured_sum_insured = sum_insured_int_Converter(name_insured_sum_insured);
        var name_insured_member_name = $("#name_insured_member_name_" + add_medi_starHealth_counter).val();
        if (name_insured_member_name == "null" || name_insured_member_name == "") {
            toaster(message_type = "Error", message_txt = "The Name Of Insured field is required.", message_icone = "error");
            $('#name_insured_sum_insured_' + add_medi_starHealth_counter).prop('selectedIndex', 0);
            $('#basic_premium').val(0);
            // $('#tot_premium').val("");
            Tot_basic_premium();
            return false;
        }
    }

    sum_insured_dropdown();

    function sum_insured_dropdown() {
        var sum_Val = ["10,00,000", "15,00,000", "20,00,000", "25,00,000"];
        var i = 0;
        for (i; i <= 3; i++) {
            sum_insured_dropdown_val += '<option value="' + sum_Val[i] + '">' + sum_Val[i] + '</option>';
        }
        $(".name_insured_sum_insured").append(sum_insured_dropdown_val);
        // alert(sum_insured_dropdown_val);

        $(".name_insured_member_name").empty();
        $(".name_insured_member_name").append('<option value="null">Select Member Names</option>' + option_val_data);
        $(".nominee_name").empty();
        $(".nominee_name").append('<option value="null">Select Nominee Name</option>' + option_val_data);
    }
    var actual_data_MediclaimstarHealth = [];

    function Total_Medi_starHealth_red_carpet_float() {
        actual_data_MediclaimstarHealth = [];

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

            actual_data_MediclaimstarHealth.push([key, name_insured_member_name, name_insured_member_name_txt, name_insured_dob, name_insured_age, name_insured_relation, name_insured_relation_txt, nominee_name, nominee_name_txt, nominee_relation, nominee_relation_txt, name_insured_sum_insured, basic_premium]);
            if (name_insured_member_name == '')
                actual_data_MediclaimstarHealth.splice(key, 1);
        });
        // console.log(actual_data_MediclaimstarHealth);
        // alert(actual_data_MediclaimstarHealth);
        return actual_data_MediclaimstarHealth;

        // var total_MediclaimstarHealth = JSON.stringify(Total_MediclaimstarHealth());
        // alert(total_MediclaimstarHealth);
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

    function getcolumnOnyears_of_premium(years_of_premium) {
        var column_value = "";
        if (years_of_premium == 1) {
            column_value = "1_year";
        } else if (years_of_premium == 2) {
            column_value = "2_year";
        } else if (years_of_premium == 3) {
            column_value = "3_year";
        }
        // alert(column_value);
        return column_value;
    }

    function get_basic_premium(add_medi_starHealth_counter) {
        check_suminsured(add_medi_starHealth_counter);
        $('#basic_premium').val(0);
        Tot_basic_premium();
        // $('#tot_premium').val("");
        var years_of_premium = $("#years_of_premium").val();
        var column_value = getcolumnOnyears_of_premium(years_of_premium);
        var max_age = $("#max_age").val();
        var name_insured_sum_insured = $("#name_insured_sum_insured").val();
        var condition_value = sum_insured_int_Converter(name_insured_sum_insured);

        if(max_age <60 || max_age >75){
            name_insured_age="";
            toaster(message_type = "Error", message_txt = "Only 60 to 75 Years people allowed For This Policy .", message_icone = "error");
            $("#name_insured_sum_insured").attr("disabled",true);
            $("#basic_premium").attr("disabled",true);
            $("#name_insured_sum_insured").val("null");
            $("#basic_premium").val(0);
            Tot_basic_premium();
           
            return false;
            
        }else{
            $("#name_insured_sum_insured").attr("disabled",false);
            $("#basic_premium").attr("disabled",false);
        }

        if (years_of_premium != "null" && years_of_premium != "" && max_age != "" && name_insured_sum_insured != "null" && name_insured_sum_insured != "" && condition_value != "" && column_value != "") {
            var url = "<?php echo base_url(); ?>master/remote/get_star_health_allied_float_basic_prem";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        years_of_premium : years_of_premium,
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
                                $('#basic_premium').val(0);

                            $('#basic_premium').val(0);
                            if(max_age <60 || max_age >75){
                                $('#basic_premium').val(0);
                            }else{
                            $('#basic_premium').val(data["userdata"]);
                            }

                        } else {
                            $('#basic_premium').val(0);
                        }
                        Tot_basic_premium();
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
            $("#tot_premium").val(total); 
        }
        gst_apply();
    }

    // Calculation Section Start

    function gst_apply() {
        var tot_premium = $("#tot_premium").val();
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