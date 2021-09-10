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
                    <th><button class="btn btn-primary btn-sm Add_NewIndia_supertopup" id="Add_NewIndia_supertopup" onclick="AddNewIndia_supertopup(0)">Add</button></th>
                    <th>Name Of Insured</th>
                    <th>DOB</th>
                    <th>Age</th>
                    <th>Relations</th>
                    <th>Nominee Name</th>
                    <th>Nominee Relations</th>
                    <th>Threshold</th>
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
                <td><strong id="medi_total_amount_td"><input type="text" id="tot_premium" name="tot_premium" class="form-control tot_premium"  disabled></strong></td>
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
                <td><strong id="medi_final_premium_td"><input type="text" id="medi_final_premium" name="medi_final_premium" class="form-control" disabled><input type="hidden" id="the_new_india_supertopup_assu_ind_policy_id" name="the_new_india_supertopup_assu_ind_policy_id" class="form-control"></td>
            </tr>
        </table>
    </div>
</div>

<script>
    var sum_insured_dropdown_val = "";
    var add_newindia_supertop_counter = 0;
    var main_NewIndia_supertopup = [];

    function removeNewIndia_supertopup(add_newindia_supertop_counter) {

        $("#remove_NewIndia_supertopup_" + add_newindia_supertop_counter).closest("tr").remove();
        var indexValue = main_NewIndia_supertopup.indexOf(add_newindia_supertop_counter);
        main_NewIndia_supertopup.splice(indexValue, 1);
        get_basic_premium(add_newindia_supertop_counter);
        // alert(main_NewIndia_supertopup);
        if (main_NewIndia_supertopup.length == 0) {
            add_newindia_supertop_counter = 0;
            main_NewIndia_supertopup = [];
            $("#Add_NewIndia_supertopup").attr("onClick", "AddNewIndia_supertopup(" + add_newindia_supertop_counter + ")");
        }
        // alert(main_NewIndia_supertopup);
    }

    function AddNewIndia_supertopup(add_newindia_supertop_counter) {
        var policy_holder_name = $("#policy_holder_name").val();
        
        main_NewIndia_supertopup.push(add_newindia_supertop_counter);
        // alert(policy_holder_name);
        var tr_table = '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_NewIndia_supertopup_' + add_newindia_supertop_counter + '" onClick=removeNewIndia_supertopup(' + add_newindia_supertop_counter + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_newindia_supertop_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_newindia_supertop_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_newindia_supertop_counter + '" name="name_insured_dob[]" value="" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_newindia_supertop_counter + '" name="name_insured_age[]" value="" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_newindia_supertop_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation" onchange="check_age_relation('+add_newindia_supertop_counter+')"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;      endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_newindia_supertop_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_newindia_supertop_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%"><select style="width:105px;" id="threshold_' + add_newindia_supertop_counter + '" name="threshold[]" class="form-control threshold" onchange="get_sum_insured_dropdown(' + add_newindia_supertop_counter + ')"><option value="null">Select Threshold</option><option value="5,00,000">5,00,000</option><option value="8,00,000">8,00,000</option></select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_' + add_newindia_supertop_counter + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_newindia_supertop_counter + ')"><option value="null">Select Sum Insured</option></select></td><td> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium_' + add_newindia_supertop_counter + '"  class="form-control basic_premium" value=""></td></tr>';
        $("#first_table_tbody").append(tr_table);
        if(add_newindia_supertop_counter == 0){
            $("#name_insured_member_name_" + add_newindia_supertop_counter).val(policy_holder_name);
            get_dob(add_newindia_supertop_counter);
        }
        add_newindia_supertop_counter = add_newindia_supertop_counter + 1;
        $("#Add_NewIndia_supertopup").attr("onClick", "AddNewIndia_supertopup(" + add_newindia_supertop_counter + ")");

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

    function get_dob(add_newindia_supertop_counter) {
        get_age(add_newindia_supertop_counter);
        if (add_newindia_supertop_counter == 0) {
            var name_insured_relation = $('#name_insured_relation_' + add_newindia_supertop_counter + ' option').filter(function() {
                return $(this).html() == "Self";
            }).val();
            // alert(name_insured_relation);
            $('#name_insured_relation_' + add_newindia_supertop_counter).val(name_insured_relation);
        }
        var region = $("#region").val();
        var years_of_premium = $("#years_of_premium").val();

        if(region == "null" || region == "" ||years_of_premium == "null" || years_of_premium == ""){
            $('#name_insured_member_name_'+ add_newindia_supertop_counter).prop('selectedIndex',0);
            if(region == "null" || region == "")
                toaster(message_type = "Error", message_txt = " Please Select Region First.", message_icone = "error");
            if(years_of_premium == "null" || years_of_premium == "")
                toaster(message_type = "Error", message_txt = " Please Select Years of Premium.", message_icone = "error");
            return false;
        }

        var name_insured_member_name = $("#name_insured_member_name_" + add_newindia_supertop_counter).val();
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
                        $('#name_insured_dob_' + add_newindia_supertop_counter).val("");
                        var dob = data["userdata"].dob;
                        if (dob == "null") {
                            dob = "";
                            toaster(message_type = "Error", message_txt = "The DOB field is required.", message_icone = "error");
                        } else {
                            dob = dateFormate(dob);
                        }
                        $('#name_insured_dob_' + add_newindia_supertop_counter).val(dob);
                    } else {
                        $('#name_insured_dob_' + add_newindia_supertop_counter).val("");
                    }
                    get_age(add_newindia_supertop_counter);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function get_age(add_newindia_supertop_counter) {
        var name_insured_member_name = $("#name_insured_member_name_" + add_newindia_supertop_counter).val();
        var name_insured_dob = $("#name_insured_dob_" + add_newindia_supertop_counter).val();

        if(name_insured_member_name=="null" || name_insured_member_name == "" || name_insured_dob == ""){
            $('#name_insured_age_' + add_newindia_supertop_counter).val("");
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
                        $('#name_insured_age_' + add_newindia_supertop_counter).val("");
                        var age = data["age"];
                        $('#name_insured_age_' + add_newindia_supertop_counter).val(age);
                    } else {
                        $('#name_insured_age_' + add_newindia_supertop_counter).val("");
                    }
                    get_basic_premium(add_newindia_supertop_counter);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function get_sum_insured_dropdown(add_newindia_supertop_counter){
        var threshold = $("#threshold_"+add_newindia_supertop_counter).val();
        threshold = sum_insured_int_Converter(threshold);
        var threshold_sum_insured_dropdown_val = "";
        var threshold_sum_insured = "";
        var loop_count = "";
        $("#name_insured_sum_insured_"+add_newindia_supertop_counter).empty();
        if(threshold != "null" || threshold !=""){
            var five_lakh_sum_Val = ["5,00,000", "10,00,000", "15,00,000"];
            var eight_lakh_sum_Val = ["7,00,000", "12,00,000", "17,00,000", "22,00,000"];

            if(threshold == "500000"){
                $("#name_insured_sum_insured_"+add_newindia_supertop_counter).empty();
                threshold_sum_insured = five_lakh_sum_Val;
                loop_count = 2;
                var i = 0;
                for (i; i <= loop_count; i++) {
                    threshold_sum_insured_dropdown_val += '<option value="' + threshold_sum_insured[i] + '">' + threshold_sum_insured[i] + '</option>';
                }
            }else if(threshold == "800000"){
                $("#name_insured_sum_insured_"+add_newindia_supertop_counter).empty();
                threshold_sum_insured = eight_lakh_sum_Val;
                loop_count = 3;
                var i = 0;
                for (i; i <= loop_count; i++) {
                    threshold_sum_insured_dropdown_val += '<option value="' + threshold_sum_insured[i] + '">' + threshold_sum_insured[i] + '</option>';
                }
            }
            $("#name_insured_sum_insured_"+add_newindia_supertop_counter).append('<option value="null">Select Sum Insured</option>'+threshold_sum_insured_dropdown_val);
        }
    }

    sum_insured_dropdown();

    function sum_insured_dropdown() {
        var sum_Val = ["1,00,000","2,00,000","3,00,000","4,00,000", "5,00,000","6,00,000","7,00,000","8,00,000", "10,00,000", "12,00,000", "15,00,000"];
        var i = 0;
        for (i; i <= 10; i++) {
            sum_insured_dropdown_val += '<option value="' + sum_Val[i] + '">' + sum_Val[i] + '</option>';
        }
        // $(".name_insured_sum_insured").append(sum_insured_dropdown_val);
        // alert(sum_insured_dropdown_val);

        $(".name_insured_member_name").empty();
        $(".name_insured_member_name").append('<option value="null">Select Member Names</option>' + option_val_data);
        $(".nominee_name").empty();
        $(".nominee_name").append('<option value="null">Select Nominee Name</option>' + option_val_data);
    }
    var actual_data_NewIndia_supertopup = [];

    function Total_supertopup_the_new_assu() {
        actual_data_NewIndia_supertopup = [];

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
            var threshold = $(".threshold", this).val();
            var name_insured_sum_insured = $(".name_insured_sum_insured", this).val();
            var basic_premium = $(".basic_premium", this).val();

            actual_data_NewIndia_supertopup.push([key, name_insured_member_name, name_insured_member_name_txt, name_insured_dob, name_insured_age, name_insured_relation, name_insured_relation_txt, nominee_name, nominee_name_txt, nominee_relation, nominee_relation_txt, threshold, name_insured_sum_insured,basic_premium]);
            if (name_insured_member_name == '')
                actual_data_NewIndia_supertopup.splice(key, 1);
        });
        // console.log(actual_data_NewIndia_supertopup);
        // alert(actual_data_NewIndia_supertopup);
        return actual_data_NewIndia_supertopup;

        // var total_MediclaimHDFC = JSON.stringify(Total_MediclaimHDFC());
        // alert(total_MediclaimHDFC);
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
        else if (name_insured_sum_insured == "11,00,000")
            var sum_insured = "1100000";
        else if (name_insured_sum_insured == "15,00,000")
            var sum_insured = "1500000";
        else if (name_insured_sum_insured == "16,00,000")
            var sum_insured = "1600000";
        else if (name_insured_sum_insured == "17,00,000")
            var sum_insured = "1700000";
        else if (name_insured_sum_insured == "18,00,000")
            var sum_insured = "1800000";
        else if (name_insured_sum_insured == "19,00,000")
            var sum_insured = "1900000";
        else if (name_insured_sum_insured == "20,00,000")
            var sum_insured = "2000000";
        else if (name_insured_sum_insured == "21,00,000")
            var sum_insured = "2100000";     
        else if (name_insured_sum_insured == "22,00,000")
            var sum_insured = "2200000";    
        else if (name_insured_sum_insured == "23,00,000")
            var sum_insured = "2300000";  
        else if (name_insured_sum_insured == "24,00,000")
            var sum_insured = "2400000";
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
            column_value = "0_17";
        }else if (age <= 44 ){
            column_value = "18_44";
        } else if (age <= 54) {
            column_value = "45_54";
        } else if (age <= 60) {
            column_value = "55_60";
        } else if (age <= 65) {
            column_value = "61_65";
        }
        return column_value;
    }

    function check_age_relation(add_newindia_supertop_counter){
        var name_insured_member_name = $("#name_insured_member_name_" + add_newindia_supertop_counter).val();
        var name_insured_relation = $("#name_insured_relation_" + add_newindia_supertop_counter+" option:selected").text();
        var name_insured_age = $("#name_insured_age_" + add_newindia_supertop_counter).val();

        if(((name_insured_relation == "Self") && (name_insured_age <= 17)) || ((name_insured_relation == "Self") && (name_insured_age > 65))){
            if((name_insured_relation == "Self") && (name_insured_age <= 17)){
                toaster(message_type = "Error", message_txt = "The Age Less than 18 Years Peoples is Not Found Basic Premium in Chart.", message_icone = "error");
                return false;
            }
            if((name_insured_relation == "Self") && (name_insured_age > 65)){
                toaster(message_type = "Error", message_txt = "The Age Greater than 6 Years or 60+ Peoples is Not Found Basic Premium in Chart.", message_icone = "error");
                return false;
            }
        }

        if((name_insured_relation != "Self") && (name_insured_age > 60)){
            toaster(message_type = "Error", message_txt = "The Age Greater than 60 Years or 60+ Peoples is Not Found Basic Premium in Chart.", message_icone = "error");
            return false;
        }

        if(name_insured_member_name =="null" || name_insured_member_name == ""){
            toaster(message_type = "Error", message_txt = "The Name Of Insured field is required.", message_icone = "error");
            $('#name_insured_sum_insured_' + add_newindia_supertop_counter).prop('selectedIndex',0);
            $('#threshold_' + add_newindia_supertop_counter).prop('selectedIndex',0);
            $('#basic_premium_' + add_newindia_supertop_counter).val("");
            return false;
        }
    }

    function get_basic_premium(add_newindia_supertop_counter) {
        check_age_relation(add_newindia_supertop_counter);
        $('#basic_premium_' + add_newindia_supertop_counter).val("");
        Tot_basic_premium();
        var column_value  = "";
        var name_insured_relation = $("#name_insured_relation_" + add_newindia_supertop_counter+" option:selected").text();
        var name_insured_age = $("#name_insured_age_" + add_newindia_supertop_counter).val();
        column_value  = getcolumnOnAge(name_insured_age);
        var name_insured_sum_insured = $("#name_insured_sum_insured_" + add_newindia_supertop_counter).val();
        var condition_value = sum_insured_int_Converter(name_insured_sum_insured);

        // var table_name = "";
        // alert(column_value);
        // if((add_newindia_supertop_counter == 0) && (name_insured_relation=="Self"))
        //     table_name = "the_new_india_supertopup_policy_ind_primary_member_premium_chart";
        // else    
        //     table_name = "the_new_india_supertopup_policy_ind_additional_member_premium";

        if (name_insured_age != "" && name_insured_sum_insured != "null"  && name_insured_sum_insured != "" && condition_value != "" && column_value !="") {
            var url = "<?php echo base_url(); ?>master/remote/get_the_new_india_assu_policy_super_topup_ind_basic_prem";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        counter: add_newindia_supertop_counter,
                        name_insured_relation : name_insured_relation,
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
                                $('#basic_premium_' + add_newindia_supertop_counter).val("");

                            $('#basic_premium_' + add_newindia_supertop_counter).val("");
                            $('#basic_premium_' + add_newindia_supertop_counter).val(data["userdata"]);

                        } else {
                            $('#basic_premium_' + add_newindia_supertop_counter).val("");
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