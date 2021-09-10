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
            <tr>
                <td colspn="3"><strong class="text-purple">Final Premium</strong></td>
                <td colspn="2"><strong></strong></td>
                <td><strong id="medi_final_premium_td"><input type="text" id="medi_final_premium" name="medi_final_premium" class="form-control" disabled><input type="hidden" id="care_adv_float_id" name="care_adv_float_id" class="form-control"><input type="hidden" name="max_age" id="max_age" valuee="" ></td>
            </tr>
        </table>
    </div>
</div>

<script>
    var sum_insured_dropdown_val = "";
    var add_care_adv_counter = 0;
    var main_Care_Advantage = [];

    function removeCareAdvantage(add_care_adv_counter) {

        $("#remove_Care_Advantage_" + add_care_adv_counter).closest("tr").remove();
        var indexValue = main_Care_Advantage.indexOf(add_care_adv_counter);
        main_Care_Advantage.splice(indexValue, 1);
        get_basic_premium(add_care_adv_counter);
        Tot_basic_premium();
        if (main_Care_Advantage.length == 0) {
            add_care_adv_counter = 0;
            main_Care_Advantage = [];
            $("#Add_Care_Advantage").attr("onClick", "AddCareAdvantage(" + add_care_adv_counter + ")");
        }
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
            var sub_policy_family_size = family_size_new;
        else
            var sub_policy_family_size = $("#sub_policy_family_size").val();

        if (sub_policy_family_size == "1A + 1C")
            var Family_size_count = 2;
        else if (sub_policy_family_size == "1A + 2C")
            var Family_size_count = 3;
        else if (sub_policy_family_size == "1A + 3C")
            var Family_size_count = 4;
        else if (sub_policy_family_size == "1A + 4C")
            var Family_size_count = 5;
        else if (sub_policy_family_size == "2A + 0C")
            var Family_size_count = 2;
        else if (sub_policy_family_size == "2A + 1C")
            var Family_size_count = 3;
        else if (sub_policy_family_size == "2A + 2C")
            var Family_size_count = 4;
        else if (sub_policy_family_size == "2A + 3C")
            var Family_size_count = 5;
        else if (sub_policy_family_size == "2A + 4C")
            var Family_size_count = 6;
            AddCareAdvantage(Family_size_count);
    }

    function AddCareAdvantage(Family_size_count) {
        var policy_holder_name = $("#policy_holder_name").val();
        // main_Care_Advantage.push(add_care_adv_counter);
        var tr_table = "";
        // alert(Family_size_count);
        $("#first_table_tbody").empty();
        for (var add_care_adv_counter = 0; add_care_adv_counter < Family_size_count; add_care_adv_counter++) {
            tr_table += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_care_adv_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_care_adv_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_care_adv_counter + '" name="name_insured_dob[]" value="" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_care_adv_counter + '" name="name_insured_age[]" value="" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_care_adv_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;      endif; ?> </select></td>';
                
            if(add_care_adv_counter == 0){
                tr_table +=' <td width="12%" rowspan="'+Family_size_count+'"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td rowspan="'+Family_size_count+'"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%" rowspan="'+Family_size_count+'"><select style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium()"><option value="null">Select Sum Insured</option>'+sum_insured_dropdown_val+'</select></td><td rowspan="'+Family_size_count+'"> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium"  class="form-control basic_premium" value=""></td></tr>';
            }
        }
        $("#first_table_tbody").append(tr_table);
        for (var add_care_adv_counter = 0; add_care_adv_counter < Family_size_count; add_care_adv_counter++) {
            if(add_care_adv_counter == 0){
                $("#name_insured_member_name_" + add_care_adv_counter).val(policy_holder_name);
                get_dob(add_care_adv_counter);
            }
        }
        add_care_adv_counter = add_care_adv_counter + 1;
        $("#Add_Care_Advantage").attr("onClick", "AddCareAdvantage(" + add_care_adv_counter + ")");
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

    function get_dob(add_care_adv_counter) {
        get_age(add_care_adv_counter);
        if (add_care_adv_counter == 0) {
            var name_insured_relation = $('#name_insured_relation_' + add_care_adv_counter + ' option').filter(function() {
                return $(this).html() == "Self";
            }).val();
            $('#name_insured_relation_' + add_care_adv_counter).val(name_insured_relation);
        }
        var region = $("#region").val();
        var years_of_premium = $("#years_of_premium").val();

        if(region == "null" || region == "" ||years_of_premium == "null" || years_of_premium == ""){
            $('#name_insured_member_name_'+ add_care_adv_counter).prop('selectedIndex',0);
            if(region == "null" || region == "")
                toaster(message_type = "Error", message_txt = " Please Select Region First.", message_icone = "error");
            if(years_of_premium == "null" || years_of_premium == "")
                toaster(message_type = "Error", message_txt = " Please Select Years of Premium.", message_icone = "error");
            return false;
        }

        var name_insured_member_name = $("#name_insured_member_name_" + add_care_adv_counter).val();
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
                        $('#name_insured_dob_' + add_care_adv_counter).val("");
                        var dob = data["userdata"].dob;
                        if (dob == "null") {
                            dob = "";
                            toaster(message_type = "Error", message_txt = "The DOB field is required.", message_icone = "error");
                        } else {
                            dob = dateFormate(dob);
                        }
                        $('#name_insured_dob_' + add_care_adv_counter).val(dob);
                    } else {
                        $('#name_insured_dob_' + add_care_adv_counter).val("");
                    }
                    get_age(add_care_adv_counter);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function get_age(add_care_adv_counter) {
        var sub_policy_name_hidden = $("#sub_policy_name").is(":visible");
        if (sub_policy_name_hidden == true) {
            var sub_policy_name = $("#sub_policy_name").val();
            if (sub_policy_name == "null" || sub_policy_name == "") {
                toaster(message_type = "Error", message_txt = "The Floater Sub Policy Name field is required.", message_icone = "error");
                return false;
            }
        }
        var name_insured_member_name = $("#name_insured_member_name_" + add_care_adv_counter).val();
        var name_insured_dob = $("#name_insured_dob_" + add_care_adv_counter).val();

        if(name_insured_member_name=="null" || name_insured_member_name == "" || name_insured_dob == ""){
            $('#name_insured_age_' + add_care_adv_counter).val("");
        }
        
        var url = "<?php echo base_url(); ?>master/policy/get_age_calculation_basedon_dob";

        if (name_insured_member_name != "null" && name_insured_member_name != "" && name_insured_dob !="") {
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
                        $('#name_insured_age_' + add_care_adv_counter).val("");
                        var age = data["age"];
                        $('#name_insured_age_' + add_care_adv_counter).val(age);
                    } else {
                        $('#name_insured_age_' + add_care_adv_counter).val("");
                    }
                    if(age<18){
                        toaster(message_type = "Error", message_txt = "The Age "+age+" Years Old Peoples Premium is Not Available.", message_icone = "error");
                        $("#name_insured_sum_insured").attr("disabled",true);
                        return false
                    }else{
                        $("#name_insured_sum_insured").attr("disabled",false);
                    }
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

    sum_insured_dropdown();

    function sum_insured_dropdown() {
        var sum_Val = ["25,00,000", "50,00,000", "1,00,00,000"];
        var i = 0;
        for (i; i <= 2; i++) {
            sum_insured_dropdown_val += '<option value="' + sum_Val[i] + '">' + sum_Val[i] + '</option>';
        }
        $(".name_insured_sum_insured").append(sum_insured_dropdown_val);

        $(".name_insured_member_name").empty();
        $(".name_insured_member_name").append('<option value="null">Select Member Names</option>' + option_val_data);
        $(".nominee_name").empty();
        $(".nominee_name").append('<option value="null">Select Nominee Name</option>' + option_val_data);
    }
    var actual_data_CareAdvantage = [];

    function Total_care_adv_float() {
        actual_data_CareAdvantage = [];

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

            actual_data_CareAdvantage.push([key, name_insured_member_name, name_insured_member_name_txt, name_insured_dob, name_insured_age, name_insured_relation, name_insured_relation_txt, nominee_name, nominee_name_txt, nominee_relation, nominee_relation_txt, name_insured_sum_insured,basic_premium]);
            if (name_insured_member_name == '')
                actual_data_CareAdvantage.splice(key, 1);
        });
        return actual_data_CareAdvantage;
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
        if (age < 18) {
            column_value = "";
        }else if (age <= 24) {
            column_value = "18_24";
        }else if (age <= 35) {
            column_value = "25_35";
        }else if (age <= 40) {
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
        return column_value;
    }

    function get_basic_premium() {
        $('#basic_premium').val("");
        // $('#medi_final_premium').val("");
        Tot_basic_premium();

        var name_insured_member_name = $("#name_insured_member_name_" + add_care_adv_counter).val();
        if(name_insured_member_name =="null" || name_insured_member_name == ""){
            toaster(message_type = "Error", message_txt = "The Name Of Insured field is required.", message_icone = "error");
            $('#name_insured_sum_insured').prop('selectedIndex',0);
            $('#basic_premium').val("");
            return false;
        }
        var sub_policy_family_size = $("#sub_policy_family_size").val();
        var max_age = $("#max_age").val();
        if(max_age<18){
            toaster(message_type = "Error", message_txt = "The Age "+max_age+" Years Old Peoples Premium is Not Available.", message_icone = "error");
            $("#max_age").val("");
            return false
        }
        var condition_value  = getcolumnOnAge(max_age);
        var name_insured_sum_insured = $("#name_insured_sum_insured").val();
        var column_value = sum_insured_int_Converter(name_insured_sum_insured);
        
        if (max_age != "" && name_insured_sum_insured != "null"  && name_insured_sum_insured != "" && condition_value != "" && column_value !="") {
            var url = "<?php echo base_url(); ?>master/remote/get_care_health_care_advantage_float_basic_prem";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        sub_policy_family_size: sub_policy_family_size,
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
                            if(data["userdata"]=="")
                                $('#basic_premium').val("");

                            $('#basic_premium').val("");
                            $('#basic_premium').val(data["userdata"]);

                        } else {
                            $('#basic_premium').val("");
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

    function Tot_basic_premium(){
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
            
            $("#medi_final_premium").val(total);
        }
    }

    // Calculation Section End
</script>