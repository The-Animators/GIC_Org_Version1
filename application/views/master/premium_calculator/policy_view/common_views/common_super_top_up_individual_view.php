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
                    <th><button class="btn btn-primary btn-sm Add_SuperTop_ind" id="Add_SuperTop_ind" onclick="Add_SuperTop_Individual(0)">Add</button></th>
                    <th>Name Of Insured</th>
                    <th>DOB</th>
                    <th>Age</th>
                    <th>Relations</th>
                    <th>Nominee Name</th>
                    <th>Nominee Relations</th>
                    <th>Past History</th>
                    <th>Type Of Policy</th>
                    <th>Option </th>
                    <th>Deductable/ Thershold</th>
                    <th>Sum Insured</th>
                    <th>Premium</th>
                </tr>
            </thead>
            <tbody id="first_table_tbody">
                <!-- <tr>
                    <td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_SuperTop_ind_0" onClick=remove_SuperTop_Individual(0) disabled></td>
                    <td width="12%"><select style="width:280px;" id="name_insured_member_name_0" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(0)">
                            <option value="null">Select Member Names</option>
                        </select></td>
                    <td><input style="width:100px;" type="text" id="name_insured_dob_0" name="name_insured_dob[]" value="" class="form-control name_insured_dob"></td>

                    <td><input style="width:55px;" type="text" id="name_insured_age_0" name="name_insured_age[]" value="" class="form-control name_insured_age"></td>

                    <td><select style="width:120px;" id="name_insured_relation_0" name="name_insured_relation[]" class="form-control name_insured_relation">
                            <option value="null">Select Relation</option>
                            <?php $relationship = relationship_dropdown();
                            if (!empty($relationship)) : foreach ($relationship as $relation) : ?>
                                    <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option>
                            <?php endforeach;
                            endif; ?>
                        </select></td>
                    <td width="12%"><select style="width:280px;" id="nominee_name_0" name="nominee_name[]" class="form-control nominee_name">
                            <option value="null">Select Nominee Name</option>
                        </select></td>
                    <td><select style="width:120px;" id="nominee_relation_0" name="nominee_relation[]" class="form-control nominee_relation">
                            <option value="null">Select Nominee Relation</option>
                            <?php $relationship = relationship_dropdown();
                            if (!empty($relationship)) : foreach ($relationship as $relation) : ?>
                                    <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option>
                            <?php endforeach;
                            endif; ?>
                        </select></td>
                    <td><textarea style="width:120px;" id="past_history_0" name="past_history[]" class="form-control past_history"></textarea></td>

                    <td><select style="width:120px;" id="name_insured_policy_type_0" name="name_insured_policy_type[]" class="form-control name_insured_policy_type">  <option value="Individual">Individual</option> </select></td>

                    <td width="12%"><input style="width:110px;" type="text" name="name_insured_policy_option[]" id="name_insured_policy_option_0" class="form-control name_insured_policy_option" value="" ></td>

                    <td width="8%"><input type="text" style="width:105px;" id="name_insured_deductable_thershold_0" name="name_insured_deductable_thershold[]" class="form-control name_insured_deductable_thershold" value=""></td>
                    <td width="8%"><input type="text" style="width:105px;" id="name_insured_sum_insured_0" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" value=""></td>

                    <td width="8%"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium_0" class="form-control name_insured_premium" onkeyup="name_insured_premium_Cal()" value="" ></td>
                    
                </tr> -->

            </tbody>
        </table>
    </div>
    <div class="col-md-12">
        <table class="table mb-0 table-bordered mt-2 col-md-12">
            <tr id="declaration_sale_fig_tr">
                <td colspn="2"><strong> Total Premium: </strong></td>
                <td colspn="2"><strong></strong></td>
                <td><strong id="supertopup_ind_total_premium_td"><input type="text" id="supertopup_ind_total_premium" name="supertopup_ind_total_premium" vlaue="" class="form-control" disabled></strong></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Add Loading: </strong></td>
                <td colspn=""><strong id="supertopup_ind_load_description_td"><textarea class="form-control" name="supertopup_ind_load_description" id="supertopup_ind_description"></textarea></strong></td>
                <td><strong id="supertopup_ind_load_amount_td"><input type="text" id="supertopup_ind_load_amount" name="supertopup_ind_load_amount" class="form-control" onkeyup="add_load_amount()"></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Premium After Loading/Gross Premium: </strong></td>
                <td colspn=""><strong id=""></strong></td>
                <td><strong id="supertopup_ind_load_gross_premium_td"><input type="text" id="supertopup_ind_load_gross_premium" name="supertopup_ind_load_gross_premium" class="form-control"></td>
            </tr>
            <tr>
                <td colspn=""><strong> CGST:</strong></td>
                <td><strong id="supertopup_ind_cgst_rate_td"><input type="text" id="cgst_fire_per" name="supertopup_ind_cgst_rate" class="form-control" onkeyup="gst_apply()"></td>
                <td><strong id="supertopup_ind_cgst_tot_td"><input type="text" id="supertopup_ind_cgst_tot" name="supertopup_ind_cgst_tot" class="form-control"></td>
            </tr>
            <tr>
                <td><strong> SGST</strong></td>
                <td><strong id="supertopup_ind_sgst_rate_td"><input type="text" id="sgst_fire_per" name="supertopup_ind_sgst_rate" class="form-control" onkeyup="gst_apply()"></td>
                <td><strong id="supertopup_ind_sgst_tot_td"><input type="text" id="supertopup_ind_sgst_tot" name="supertopup_ind_sgst_tot" class="form-control"></td>
            </tr>
            <tr>
                <td colspn="3"><strong class="text-purple">Final Premium</strong></td>
                <td colspn="3"><strong class="text-purple"></strong></td>
                <td><strong id="supertopup_ind_final_premium_td"><input type="text" id="supertopup_ind_final_premium" name="supertopup_ind_final_premium" class="form-control" disabled>
                <input type="hidden" id="supertopup_ind_policy_id" name="supertopup_ind_policy_id" class="form-control" value=""></td>
            </tr>
        </table>
    </div>

</div>

<script>
    var option_policy_dropdown_val = "";
    policy_option_dropdown();

    function policy_option_dropdown() {
        var option_Val = ["A", "B", "C", "D", "E", "F", "G", "H"];
        var i = 0;
        for (i; i <= 7; i++) {
            option_policy_dropdown_val += '<option value="' + option_Val[i] + '">' + option_Val[i] + '</option>';
        }
        // alert(option_val_data);
        // alert(nominee_name);
        // $(".name_insured_policy_option").append(option_policy_dropdown_val);
        $(".name_insured_member_name").empty();
        $(".name_insured_member_name").append('<option value="null">Select Member Names</option>'+option_val_data);
        $(".nominee_name").empty();
        $(".nominee_name").append('<option value="null">Select Nominee Name</option>'+option_val_data);
    }
    var sum_insured_dropdown_val = "";
    var add_supertopup_counter = 0;
    var main_SuperTopUp_Ind = [];
    function remove_SuperTop_Individual(add_supertopup_counter) {
        $("#remove_SuperTop_ind_" + add_supertopup_counter).closest("tr").remove();
        var indexValue = main_SuperTopUp_Ind.indexOf(add_supertopup_counter);
        main_SuperTopUp_Ind.splice(indexValue, 1);

        if (main_SuperTopUp_Ind.length == 0) {
            add_supertopup_counter = 0;
            main_SuperTopUp_Ind = [];
            $("#Add_SuperTop_ind").attr("onClick", "Add_SuperTop_Individual(" + add_supertopup_counter + ")");
        }

        // var indexValue = main_SuperTopUp_Ind.indexOf(add_supertopup_counter);
        //     main_SuperTopUp_Ind.splice(indexValue, 1);
            // alert(main_SuperTopUp_Ind);
        // if (main_SuperTopUp_Ind.length == 0) {
        //     add_supertopup_counter=0;
        //     main_SuperTopUp_Ind = [];
        //     $("#Add_SuperTop_ind").attr("onClick", "Add_SuperTop_Individual(" + add_supertopup_counter + ")");
        // }
        get_premium_thresold_sum_insured_basedOn_Age_Policy_Option(add_supertopup_counter);
        name_insured_premium_Cal();
    }

    function Add_SuperTop_Individual(add_supertopup_counter) {
        var policy_holder_name = $("#policy_holder_name").val();
        // alert(add_supertopup_counter);

        main_SuperTopUp_Ind.push(add_supertopup_counter);
        
        var tr_table = '<tr> <td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_SuperTop_ind_'+add_supertopup_counter+'" onClick=remove_SuperTop_Individual('+add_supertopup_counter+')></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_'+add_supertopup_counter+'" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob('+add_supertopup_counter+')"><option value="null">Select Member Names</option>'+option_val_data+'</select></td> <td><input style="width:100px;" type="text" id="name_insured_dob_'+add_supertopup_counter+'" name="name_insured_dob[]" value="" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_'+add_supertopup_counter+'" name="name_insured_age[]" value="" class="form-control name_insured_age"></td> <td><select style="width:120px;" id="name_insured_relation_'+add_supertopup_counter+'" name="name_insured_relation[]" class="form-control name_insured_relation"> <option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach; endif; ?></select></td><td width="12%"><select style="width:280px;" id="nominee_name_'+add_supertopup_counter+'" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>'+option_val_data+' </select></td>  <td><select style="width:120px;" id="nominee_relation_'+add_supertopup_counter+'" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();    if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td><textarea style="width:120px;" id="past_history_'+add_supertopup_counter+'" name="past_history[]" class="form-control past_history"></textarea></td>  <td><select style="width:120px;" id="name_insured_policy_type_'+add_supertopup_counter+'" name="name_insured_policy_type[]" class="form-control name_insured_policy_type">  <option value="Individual">Individual</option> </select></td> <td width="12%"><input style="width:110px;" type="text" name="name_insured_policy_option[]" id="name_insured_policy_option_'+add_supertopup_counter+'" value="" class="form-control name_insured_policy_option" ></td><td width="8%"><input type="text" style="width:105px;" id="name_insured_deductable_thershold_'+add_supertopup_counter+'" name="name_insured_deductable_thershold[]" class="form-control name_insured_deductable_thershold" value=""></td><td width="8%"><input type="text" style="width:105px;" id="name_insured_sum_insured_'+add_supertopup_counter+'" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" value=""></td><td width="8%"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium_'+add_supertopup_counter+'" class="form-control name_insured_premium" onkeyup="name_insured_premium_Cal()" value="" ></td></tr>';
        $("#first_table_tbody").append(tr_table);
        
        if(add_supertopup_counter == 0){
            $("#name_insured_member_name_" + add_supertopup_counter).val(policy_holder_name);
            get_dob(add_supertopup_counter);
        }

        get_premium_thresold_sum_insured_basedOn_Age_Policy_Option(add_supertopup_counter);
        name_insured_premium_Cal();

        add_supertopup_counter = add_supertopup_counter + 1;
        $("#Add_SuperTop_ind").attr("onClick", "Add_SuperTop_Individual(" + add_supertopup_counter + ")");
    }

    var actual_data_SuperTopUp_Ind = [];

    function Total_SuperTopUp_Ind() {
        actual_data_SuperTopUp_Ind = [];

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
            var name_insured_deductable_thershold = $(".name_insured_deductable_thershold", this).val();
            var name_insured_sum_insured = $(".name_insured_sum_insured", this).val();
            var name_insured_premium = $(".name_insured_premium", this).val();
            var nominee_name = $(".nominee_name", this).val();
            var nominee_relation = $(".nominee_relation", this).val();
            var nominee_name_txt = $(".nominee_name option:selected", this).text();
            var nominee_relation_txt = $(".nominee_relation option:selected", this).text();

            actual_data_SuperTopUp_Ind.push([key, name_insured_member_name, name_insured_member_name_txt, name_insured_dob, name_insured_age, name_insured_relation, name_insured_relation_txt, past_history, name_insured_policy_type, name_insured_policy_option, name_insured_deductable_thershold, name_insured_sum_insured, name_insured_premium,nominee_name,nominee_relation,nominee_name_txt,nominee_relation_txt]);
            if (name_insured_member_name == '')
                actual_data_SuperTopUp_Ind.splice(key, 1);
        });
        // console.log(actual_data_SuperTopUp_Ind);
        // alert(actual_data_SuperTopUp_Ind);
        return actual_data_SuperTopUp_Ind;

        // var total_supertopup_inddividual = JSON.stringify(Total_SuperTopUp_Ind());
        // alert(total_supertopup_inddividual);
        // return false;
    }
// Calculation Section Start
 
    function dateFormate_new(value) {
        var date = value.split("-");

        var day = (date[0]),
            month = (date[1]),
            year = (date[2]);

        if(!$.isNumeric(month)){
            month = getMonthFromString(month);
        }
        var new_date= new Date(year, month - 1, day).toLocaleDateString('en-CA');

        var date = new Date(new_date),
                get_y = date.getFullYear(),
                get_m = ("0" + (date.getMonth() + 1)).slice(-2);
                get_d=("0" + date.getDate()).slice(-2);

        var org_date = get_d+"-"+get_m+"-"+get_y;

         return org_date;
    }

    function getMonthFromString(mon){
        return new Date(Date.parse(mon +" 1, 2012")).getMonth()+1
    }

    function get_dob(add_supertopup_counter) {
        // alert(add_supertopup_counter);
        var rowCount = $('#first_table tbody tr').length;

        if(add_supertopup_counter == 0){
            var name_insured_relation =  $('#name_insured_relation_'+add_supertopup_counter+' option').filter(function () { return $(this).html() == "Self"; }).val();
            $('#name_insured_relation_'+add_supertopup_counter).val(name_insured_relation);
        }

        var name_insured_member_name = $("#name_insured_member_name_"+add_supertopup_counter).val();
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
                        $('#name_insured_dob_'+add_supertopup_counter).val("");
                        var dob = data["userdata"].dob;
                        // alert(dob);
                        if(dob == "null"){
                            dob = "";
                            toaster(message_type = "Error", message_txt = "The DOB field is required.", message_icone = "error");
                        }else{
                            dob = dateFormate(dob);
                        }
                        // alert(dob);
                        $('#name_insured_dob_'+add_supertopup_counter).val(dob);
                        get_age(add_supertopup_counter);
                    } else {
                        $('#name_insured_dob_'+add_supertopup_counter).val("");
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

    function get_age(add_supertopup_counter) {
        var name_insured_member_name = $("#name_insured_member_name_"+add_supertopup_counter).val();
        var name_insured_dob = $("#name_insured_dob_"+add_supertopup_counter).val();
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
                        $('#name_insured_age_'+add_supertopup_counter).val("");
                        var age = data["age"];
                        $('#name_insured_age_'+add_supertopup_counter).val(age);
                    } else {
                        $('#name_insured_age_'+add_supertopup_counter).val("");
                    }
                    get_premium_thresold_sum_insured_basedOn_Age_Policy_Option(add_supertopup_counter)
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
            var size_txt = "2";
        else if (family_size == 2)
            var size_txt = ">2";
        else if (family_size == 3)
            var size_txt = ">2";
        else if (family_size == 4)
            var size_txt = "2";
        else if (family_size == 5)
            var size_txt = ">2";

        // alert(family_size);
        var column_value = "";
        if (age <= 45) {
            column_value = "0_45";
        } else if (age <= 60) {
            column_value = "46_60";
        } else if (age > 60) {
            column_value = ">61";
        }
        // alert(condition_value);
        return column_value;
    }

    function get_premium_thresold_sum_insured_basedOn_Age_Policy_Option(add_supertopup_counter) {
        var name_insured_policy_option = $("#name_insured_policy_option_"+add_supertopup_counter).val();
        var name_insured_age = $("#name_insured_age_"+add_supertopup_counter).val();
        var column_value = getcolumnOnAge(name_insured_age);

        if (name_insured_age != "" && name_insured_policy_option != "null" && name_insured_policy_option != "" && column_value != "") {
            var url = "<?php echo base_url(); ?>master/remote/get_supertopup_ind_chart";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        age: name_insured_age,
                        column_value: column_value,
                        condition_value: name_insured_policy_option,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            // alert(data["userdata"]);
                            $('#name_insured_deductable_thershold_'+add_supertopup_counter).val("");
                            $('#name_insured_sum_insured_'+add_supertopup_counter).val("");
                            $('#name_insured_premium_'+add_supertopup_counter).val("");
                            // $('#supertopup_ind_total_premium').val("");
                            $("#name_insured_deductable_thershold_"+add_supertopup_counter).val(data["userdata"]["treshold"]);
                            $("#name_insured_sum_insured_"+add_supertopup_counter).val(data["userdata"]["sum_insured"]);
                            $('#name_insured_premium_'+add_supertopup_counter).val(data["plan_rate_premium"]);
                            $('#supertopup_ind_total_premium_'+add_supertopup_counter).val(data["plan_rate_premium"]);
                            name_insured_premium_Cal();
                        } else {
                            $('#name_insured_deductable_thershold_'+add_supertopup_counter).val("");
                            $('#name_insured_sum_insured_'+add_supertopup_counter).val("");
                            $('#name_insured_premium_'+add_supertopup_counter).val("");
                            // $('#supertopup_ind_total_premium').val("");
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
    function name_insured_premium_Cal() {
        var inputs = $(".name_insured_premium");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var name_insured_premium = $(inputs[i]).val();
            name_insured_premium = parseInt(name_insured_premium);
            if (isNaN(name_insured_premium))
            name_insured_premium = 0;
            else
            name_insured_premium = name_insured_premium;

            total = total + name_insured_premium;
            $("#supertopup_ind_total_premium").val(total);
        }
        add_load_amount();
    }
    // function name_Insured_Premium_Tot(add_supertopup_counter){
    //     var name_insured_premium = $("#name_insured_premium_"+add_supertopup_counter).val();

    //     name_insured_premium = parseInt(name_insured_premium);

    //     if (isNaN(name_insured_premium))
    //         name_insured_premium = 0;
    //     else
    //         name_insured_premium = name_insured_premium;
    //     $("#supertopup_ind_total_premium").val(name_insured_premium);
    //     add_load_amount();
    // }
    function add_load_amount() {
        var supertopup_ind_total_premium = $("#supertopup_ind_total_premium").val();
        var supertopup_ind_load_amount = $("#supertopup_ind_load_amount").val();

        supertopup_ind_total_premium = parseInt(supertopup_ind_total_premium);

        if (isNaN(supertopup_ind_total_premium))
            supertopup_ind_total_premium = 0;
        else
            supertopup_ind_total_premium = supertopup_ind_total_premium;

        supertopup_ind_load_amount = parseInt(supertopup_ind_load_amount);

        if (isNaN(supertopup_ind_load_amount))
            supertopup_ind_load_amount = 0;
        else
            supertopup_ind_load_amount = supertopup_ind_load_amount;

        var supertopup_ind_load_gross_premium = 0;

        // alert(supertopup_ind_total_premium);
        // alert(supertopup_ind_load_amount);

        supertopup_ind_load_gross_premium = supertopup_ind_total_premium + supertopup_ind_load_amount;
        // alert(supertopup_ind_load_gross_premium);
        $("#supertopup_ind_load_gross_premium").val(supertopup_ind_load_gross_premium);
        gst_apply();
    }

    function gst_apply() {
        var supertopup_ind_load_gross_premium = $("#supertopup_ind_load_gross_premium").val();
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

        supertopup_ind_load_gross_premium = parseInt(supertopup_ind_load_gross_premium);
        if (isNaN(supertopup_ind_load_gross_premium))
            supertopup_ind_load_gross_premium = 0;
        else
            supertopup_ind_load_gross_premium = supertopup_ind_load_gross_premium;

        if (supertopup_ind_load_gross_premium == "") {
            $("#supertopup_ind_cgst_tot").val(0);
            $("#supertopup_ind_sgst_tot").val(0);
            $("#supertopup_ind_final_premium").val(0);
        }

        var supertopup_ind_cgst_tot = Math.round((supertopup_ind_load_gross_premium * cgst_fire_per) / 100);
        var supertopup_ind_sgst_tot = Math.round((supertopup_ind_load_gross_premium * sgst_fire_per) / 100);
        $("#supertopup_ind_cgst_tot").val(supertopup_ind_cgst_tot);
        $("#supertopup_ind_sgst_tot").val(supertopup_ind_sgst_tot);

        var supertopup_ind_final_premium = parseInt(supertopup_ind_load_gross_premium) + parseInt(supertopup_ind_cgst_tot) + parseInt(supertopup_ind_sgst_tot);
        $("#supertopup_ind_final_premium").val(supertopup_ind_final_premium);

    }





    // Calculation Section End
</script>