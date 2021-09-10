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
                    <th><button class="btn btn-primary btn-sm Add_Care" id="Add_Care" onclick="AddCare(0)">Add</button></th>
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
                <td colspn="3"><strong class="text-purple">Final Premium</strong></td>
                <td colspn="2"><strong></strong></td>
                <td><strong id="medi_final_premium_td"><input type="text" id="medi_final_premium" name="medi_final_premium" class="form-control" disabled><input type="hidden" id="care_ind_id" name="care_ind_id" class="form-control"></td>
            </tr>
        </table>
    </div>
</div>

<script>
    var sum_insured_dropdown_val = "";
    var add_care_counter = 0;
    var main_Care = [];

    function removeCare(add_care_counter) {

        $("#remove_Care_" + add_care_counter).closest("tr").remove();
        var indexValue = main_Care.indexOf(add_care_counter);
        main_Care.splice(indexValue, 1);
        get_basic_premium(add_care_counter);
        Tot_basic_premium();
        if (main_Care.length == 0) {
            add_care_counter = 0;
            main_Care = [];
            $("#Add_Care").attr("onClick", "AddCare(" + add_care_counter + ")");
        }
    }

    function AddCare(add_care_counter) {
        var policy_holder_name = $("#policy_holder_name").val();
        main_Care.push(add_care_counter);

        var tr_table = '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_Care_' + add_care_counter + '" onClick=removeCare(' + add_care_counter + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_care_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_care_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_care_counter + '" name="name_insured_dob[]" value="" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_care_counter + '" name="name_insured_age[]" value="" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_care_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;      endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_care_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_care_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_' + add_care_counter + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_care_counter + ')"><option value="null">Select Sum Insured</option>'+sum_insured_dropdown_val+'</select></td><td> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium_' + add_care_counter + '"  class="form-control basic_premium" value=""></td> </tr>';
        $("#first_table_tbody").append(tr_table);

        if(add_care_counter == 0){
            $("#name_insured_member_name_" + add_care_counter).val(policy_holder_name);
            get_dob(add_care_counter);
        }

        add_care_counter = add_care_counter + 1;
        $("#Add_Care").attr("onClick", "AddCare(" + add_care_counter + ")");
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

    function get_dob(add_care_counter) {
        get_age(add_care_counter);
        if (add_care_counter == 0) {
            var name_insured_relation = $('#name_insured_relation_' + add_care_counter + ' option').filter(function() {
                return $(this).html() == "Self";
            }).val();
            $('#name_insured_relation_' + add_care_counter).val(name_insured_relation);
        }
        var region = $("#region").val();
        var years_of_premium = $("#years_of_premium").val();

        if(region == "null" || region == "" ||years_of_premium == "null" || years_of_premium == ""){
            $('#name_insured_member_name_'+ add_care_counter).prop('selectedIndex',0);
            if(region == "null" || region == "")
                toaster(message_type = "Error", message_txt = " Please Select Region First.", message_icone = "error");
            if(years_of_premium == "null" || years_of_premium == "")
                toaster(message_type = "Error", message_txt = " Please Select Years of Premium.", message_icone = "error");
            return false;
        }

        var name_insured_member_name = $("#name_insured_member_name_" + add_care_counter).val();
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
                        $('#name_insured_dob_' + add_care_counter).val("");
                        var dob = data["userdata"].dob;
                        if (dob == "null") {
                            dob = "";
                            toaster(message_type = "Error", message_txt = "The DOB field is required.", message_icone = "error");
                            $('#name_insured_sum_insured_' + add_care_counter).prop('selectedIndex',0);
                            $('#ncd_type_' + add_care_counter).prop('selectedIndex',0);
                            $('#maternity_type_' + add_care_counter).prop('selectedIndex',0);
                            $('#limit_of_cataract_type_' + add_care_counter).prop('selectedIndex',0);
                            $('#limit_of_cataract_prem_' + add_care_counter).val("");
                            $('#ncd_prem_' + add_care_counter).val("");
                            $('#maternity_prem_' + add_care_counter).val("");
                            $('#basic_premium_' + add_care_counter).val("");
                            $('#tot_prem_' + add_care_counter).val("");
                            return false;
                        } else {
                            dob = dateFormate(dob);
                        }
                        $('#name_insured_dob_' + add_care_counter).val(dob);
                    } else {
                        $('#name_insured_dob_' + add_care_counter).val("");
                    }
                    get_age(add_care_counter);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function get_age(add_care_counter) {
        var name_insured_member_name = $("#name_insured_member_name_" + add_care_counter).val();
        var name_insured_dob = $("#name_insured_dob_" + add_care_counter).val();

        if(name_insured_member_name=="null" || name_insured_member_name == "" || name_insured_dob == ""){
            $('#name_insured_age_' + add_care_counter).val("");
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
                        $('#name_insured_age_' + add_care_counter).val("");
                        var age = data["age"];
                        $('#name_insured_age_' + add_care_counter).val(age);
                    } else {
                        $('#name_insured_age_' + add_care_counter).val("");
                    }
                    if(age<5){
                        toaster(message_type = "Error", message_txt = "The Age "+age+" Years Old Peoples Premium is Not Available.", message_icone = "error");
                        return false
                    }
                    get_basic_premium(add_care_counter);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function check_suminsured(add_care_counter){

        var name_insured_age = $("#name_insured_age_" + add_care_counter).val();
        var name_insured_sum_insured = $("#name_insured_sum_insured_" + add_care_counter).val();
        name_insured_sum_insured = sum_insured_int_Converter(name_insured_sum_insured);
        var name_insured_member_name = $("#name_insured_member_name_" + add_care_counter).val();
        // alert(name_insured_age);
        if(name_insured_age<5){
            toaster(message_type = "Error", message_txt = "The Age "+name_insured_age+" Years Old Peoples Premium is Not Available.", message_icone = "error");
            return false
        }
        if(name_insured_age == ""){
            $('#name_insured_sum_insured_' + add_care_counter).prop('selectedIndex',0);
            $('#basic_premium_' + add_care_counter).val("");
            return false;
        }
        if(name_insured_member_name =="null" || name_insured_member_name == ""){
            toaster(message_type = "Error", message_txt = "The Name Of Insured field is required.", message_icone = "error");
            $('#name_insured_sum_insured_' + add_care_counter).prop('selectedIndex',0);
            $('#basic_premium_' + add_care_counter).val("");
            return false;
        }
    }

    sum_insured_dropdown();

    function sum_insured_dropdown() {
        var sum_Val = ["4,00,000", "5,00,000", "7,00,000", "10,00,000", "15,00,000", "20,00,000", "25,00,000", "30,00,000","40,00,000", "50,00,000","60,00,000", "75,00,000"];
        var i = 0;
        for (i; i <= 11; i++) {
            sum_insured_dropdown_val += '<option value="' + sum_Val[i] + '">' + sum_Val[i] + '</option>';
        }
        $(".name_insured_sum_insured").append(sum_insured_dropdown_val);
        $(".name_insured_member_name").empty();
        $(".name_insured_member_name").append('<option value="null">Select Member Names</option>' + option_val_data);
        $(".nominee_name").empty();
        $(".nominee_name").append('<option value="null">Select Nominee Name</option>' + option_val_data);
    }
    var actual_data_Care = [];

    function Total_care_ind() {
        actual_data_Care = [];

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

            actual_data_Care.push([key, name_insured_member_name, name_insured_member_name_txt, name_insured_dob, name_insured_age, name_insured_relation, name_insured_relation_txt, nominee_name, nominee_name_txt, nominee_relation, nominee_relation_txt, name_insured_sum_insured,basic_premium]);
            if (name_insured_member_name == '')
                actual_data_Care.splice(key, 1);
        });
        return actual_data_Care;
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
        else if (name_insured_sum_insured == "30,00,000")
            var sum_insured = "3000000";
        else if (name_insured_sum_insured == "40,00,000")
            var sum_insured = "4000000";
        else if (name_insured_sum_insured == "50,00,000")
            var sum_insured = "5000000";
        else if (name_insured_sum_insured == "60,00,000")
            var sum_insured = "6000000";
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
        if (age < 5) {
            column_value = "";
        }else if (age <= 24) {
            column_value = "5_24";
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

    function get_basic_premium(add_care_counter) {
        $('#basic_premium_' + add_care_counter).val("");
        // $('#medi_final_premium').val("");
        check_suminsured(add_care_counter);
        Tot_basic_premium();

        var name_insured_member_name = $("#name_insured_member_name_" + add_care_counter).val();
        if(name_insured_member_name =="null" || name_insured_member_name == ""){
            toaster(message_type = "Error", message_txt = "The Name Of Insured field is required.", message_icone = "error");
            $('#name_insured_sum_insured_' + add_care_counter).prop('selectedIndex',0);
            $('#basic_premium_' + add_care_counter).val("");
        }
        var name_insured_age = $("#name_insured_age_" + add_care_counter).val();
        var condition_value  = getcolumnOnAge(name_insured_age);
        var name_insured_sum_insured = $("#name_insured_sum_insured_" + add_care_counter).val();
        var column_value = sum_insured_int_Converter(name_insured_sum_insured);
        
        if (name_insured_age != "" && name_insured_sum_insured != "null"  && name_insured_sum_insured != "" && condition_value != "" && column_value !="") {
            var url = "<?php echo base_url(); ?>master/remote/get_care_health_care_ind_basic_prem";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        age: name_insured_age,
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
                                $('#basic_premium_' + add_care_counter).val("");

                            $('#basic_premium_' + add_care_counter).val("");
                            $('#basic_premium_' + add_care_counter).val(data["userdata"]);

                        } else {
                            $('#basic_premium_' + add_care_counter).val("");
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