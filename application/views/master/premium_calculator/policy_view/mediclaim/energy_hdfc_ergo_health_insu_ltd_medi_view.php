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
                    <th><button class="btn btn-primary btn-sm Add_Energy_Medi_HDFC" id="Add_Energy_Medi_HDFC" onclick="AddEnergyMediHDFC(0)">Add</button></th>
                    <th>Name Of Insured</th>
                    <th>DOB</th>
                    <th>Age</th>
                    <th>Relations</th>
                    <th>Nominee Name</th>
                    <th>Nominee Relations</th>
                    <th>Type Of Policy</th>
                    <th>Sum Insured</th>
                    <th>Premium</th>
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
            <tr id="">
                <td colspn="3"><strong> Less Discount: </strong></td>
                <td colspn=""><strong id="less_disc_per_td"><input type="text" id="less_disc_per" name="less_disc_per" class="form-control less_disc_per" onkeyup="medi_less_disc_tot_Cal()"></strong></td>
                <td><strong id="less_disc_tot_td"><input type="text" id="less_disc_tot" name="less_disc_tot" class="form-control less_disc_tot" disabled></strong></td>
            </tr>
            <tr id="">
                <td colspn="3"><strong> Loading: </strong></td>
                <td colspn=""><strong><textarea rows="3" id="load_desc" name="load_desc" class="load_desc form-control"></textarea></strong></td>
                <td><strong id="load_tot_td"><input type="text" id="load_tot" name="load_tot" class="form-control load_tot" onkeyup="Tot_gross_premium()"></strong></td>
            </tr>

            <tr id="">
                <td colspn="3"><strong> Gross Premium: </strong></td>
                <td colspn=""><strong></strong></td>
                <td><strong id="less_disc_tot_td"><input type="text" id="gross_premium_tot" name="gross_premium_tot" class="form-control gross_premium_tot" disabled><input type="hidden" name="gross_premium_tot_new" id="gross_premium_tot_new" value=""></td>
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
                <td><strong id="medi_final_premium_td"><input type="text" id="medi_final_premium" name="medi_final_premium" class="form-control" disabled><input type="hidden" id="medi_hdfc_ergo_health_insu_energy_policy_id" name="medi_hdfc_ergo_health_insu_energy_policy_id" class="form-control"></td>
            </tr>
        </table>
    </div>
</div>

<script>
    var sum_insured_dropdown_val = "";
    var add_medi_hdfc_counter = 0;
    var main_Energy_Medi_HDFC = [];
    var actual_data_MediclaimHDFC = [];

    function removeEnergyMediHDFC(add_medi_hdfc_counter) {
        $("#remove_energy_medi_HDFC_" + add_medi_hdfc_counter).closest("tr").remove();
        var indexValue = main_Energy_Medi_HDFC.indexOf(add_medi_hdfc_counter);
        main_Energy_Medi_HDFC.splice(indexValue, 1);
        // alert(main_Energy_Medi_HDFC);
        if (main_Energy_Medi_HDFC.length == 0) {
            add_medi_hdfc_counter = 0;
            main_Energy_Medi_HDFC = [];
            $("#Add_Energy_Medi_HDFC").attr("onClick", "AddEnergyMediHDFC(" + add_medi_hdfc_counter + ")");
        }
        Tot_premium();
        medi_less_disc_tot_Cal();
        Tot_gross_premium();
        // alert(main_Energy_Medi_HDFC);
    }

    function AddEnergyMediHDFC(add_medi_hdfc_counter) {
        var policy_holder_name = $("#policy_holder_name").val();
        main_Energy_Medi_HDFC.push(add_medi_hdfc_counter);

        var tr_table = '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_energy_medi_HDFC_' + add_medi_hdfc_counter + '" onClick=removeEnergyMediHDFC(' + add_medi_hdfc_counter + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_hdfc_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_hdfc_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_hdfc_counter + '" name="name_insured_dob[]" value="" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_hdfc_counter + '" name="name_insured_age[]" value="" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_hdfc_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach; endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_medi_hdfc_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_medi_hdfc_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach;  endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="type_of_policy_' + add_medi_hdfc_counter + '" name="type_of_policy[]" class="form-control type_of_policy" onchange="get_basic_premium(' + add_medi_hdfc_counter + ')"> <option value="null">Select Type Of Policy</option><option value="Silver No Co-Payment">Silver No Co-Payment</option><option value="Silver Co-Payment">Silver Co-Payment</option><option value="Gold No Co-Payment">Gold No Co-Payment</option><option value="Gold Co-Payment">Gold Co-Payment</option></select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_' + add_medi_hdfc_counter + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_medi_hdfc_counter + ')"><option value="null">Select Sum Insured</option> ' + sum_insured_dropdown_val + '   </select></td><td width="8%"> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium_' + add_medi_hdfc_counter + '" value="" class="form-control basic_premium" ></td>  </tr>';
        $("#first_table_tbody").append(tr_table);
        if(add_medi_hdfc_counter == 0){
            $("#name_insured_member_name_" + add_medi_hdfc_counter).val(policy_holder_name);
            get_dob(add_medi_hdfc_counter);
        }
        add_medi_hdfc_counter = add_medi_hdfc_counter + 1;
        $("#Add_Energy_Medi_HDFC").attr("onClick", "AddEnergyMediHDFC(" + add_medi_hdfc_counter + ")");
        // alert(main_Energy_Medi_HDFC);
    }

    sum_insured_dropdown();

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

    function get_dob(add_medi_hdfc_counter) {
        if (add_medi_hdfc_counter == 0) {
            var name_insured_relation = $('#name_insured_relation_' + add_medi_hdfc_counter + ' option').filter(function() {
                return $(this).html() == "Self";
            }).val();
            $('#name_insured_relation_' + add_medi_hdfc_counter).val(name_insured_relation);
        }
        var region = $("#region").val();
        var years_of_premium = $("#years_of_premium").val();

        if (region == "null" || region == "" || years_of_premium == "null" || years_of_premium == "") {
            $('#name_insured_member_name_' + add_medi_hdfc_counter).prop('selectedIndex', 0);
            if (region == "null" || region == "")
                toaster(message_type = "Error", message_txt = " Please Select Region First.", message_icone = "error");
            if (years_of_premium == "null" || years_of_premium == "")
                toaster(message_type = "Error", message_txt = " Please Select Years of Premium.", message_icone = "error");
            return false;
        }

        var name_insured_member_name = $("#name_insured_member_name_" + add_medi_hdfc_counter).val();
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
                        $('#name_insured_dob_' + add_medi_hdfc_counter).val("");
                        var dob = data["userdata"].dob;
                        if (dob == "null") {
                            dob = "";
                            toaster(message_type = "Error", message_txt = "The DOB field is required.", message_icone = "error");
                        } else {
                            dob = dateFormate(dob);
                        }
                        $('#name_insured_dob_' + add_medi_hdfc_counter).val(dob);
                    } else {
                        $('#name_insured_dob_' + add_medi_hdfc_counter).val("");
                    }
                    get_age(add_medi_hdfc_counter);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function get_age(add_medi_hdfc_counter) {
        var name_insured_member_name = $("#name_insured_member_name_" + add_medi_hdfc_counter).val();
        var name_insured_dob = $("#name_insured_dob_" + add_medi_hdfc_counter).val();
        var url = "<?php echo base_url(); ?>master/policy/get_age_calculation_basedon_dob";

        if (name_insured_member_name != "" && name_insured_dob != "") {
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
                        $('#name_insured_age_' + add_medi_hdfc_counter).val("");
                        var age = data["age"];
                        $('#name_insured_age_' + add_medi_hdfc_counter).val(age);
                    } else {
                        $('#name_insured_age_' + add_medi_hdfc_counter).val("");
                    }
                    if(age<18){
                        toaster(message_type = "Error", message_txt = "The Age "+age+" Years Old Peoples Premium is Not Available.", message_icone = "error");
                        $("#name_insured_sum_insured_"+add_medi_hdfc_counter).attr("disabled",true);
                        return false
                    }else{
                        $("#name_insured_sum_insured_"+add_medi_hdfc_counter).attr("disabled",false);
                    }
                    get_basic_premium(add_medi_hdfc_counter);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function sum_insured_dropdown() {
        var sum_Val = ["2,00,000", "3,00,000", "5,00,000", "10,00,000", "15,00,000", "20,00,000", "25,00,000", "50,00,000"];
        var i = 0;
        for (i; i <= 7; i++) {
            sum_insured_dropdown_val += '<option value="' + sum_Val[i] + '">' + sum_Val[i] + '</option>';
        }
        $(".name_insured_sum_insured").append(sum_insured_dropdown_val);

        $(".name_insured_member_name").empty();
        $(".name_insured_member_name").append('<option value="null">Select Member Names</option>' + option_val_data);
        $(".nominee_name").empty();
        $(".nominee_name").append('<option value="null">Select Nominee Name</option>' + option_val_data);
    }

    function Total_Energy_Medi_HDFC() {
        actual_data_MediclaimHDFC = [];

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
            var type_of_policy = $(".type_of_policy", this).val();
            var name_insured_sum_insured = $(".name_insured_sum_insured", this).val();
            var basic_premium = $(".basic_premium", this).val();

            actual_data_MediclaimHDFC.push([key, name_insured_member_name, name_insured_member_name_txt, name_insured_dob, name_insured_age, name_insured_relation, name_insured_relation_txt, nominee_name, nominee_name_txt, nominee_relation, nominee_relation_txt, type_of_policy, name_insured_sum_insured, basic_premium]);
            if (name_insured_member_name == '')
                actual_data_MediclaimHDFC.splice(key, 1);
        });
        // console.log(actual_data_MediclaimHDFC);
        // alert(actual_data_MediclaimHDFC);
        return actual_data_MediclaimHDFC;

        // var total_MediclaimHDFC = JSON.stringify(Total_Energy_Medi_HDFC());
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
        else if (name_insured_sum_insured == "6,00,000")
            var sum_insured = "600000";
        else if (name_insured_sum_insured == "7,00,000")
            var sum_insured = "700000";
        else if (name_insured_sum_insured == "8,00,000")
            var sum_insured = "800000";
        else if (name_insured_sum_insured == "9,00,000")
            var sum_insured = "900000";
        else if (name_insured_sum_insured == "10,00,000")
            var sum_insured = "1000000";
        else if (name_insured_sum_insured == "15,00,000")
            var sum_insured = "1500000";
        else if (name_insured_sum_insured == "20,00,000")
            var sum_insured = "2000000";
        else if (name_insured_sum_insured == "25,00,000")
            var sum_insured = "2500000";
        else if (name_insured_sum_insured == "50,00,000")
            var sum_insured = "5000000";

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
        }else if (age <= 35) {
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
        } else if (age <= 80) {
            column_value = "76_80";
        } else if (age > 80) {
            column_value = ">80";
        }
        return column_value;
    }

    // Calculation Section Start

    function get_basic_premium(add_medi_hdfc_counter) {
        // alert("Hi");
        var type_of_policy = $("#type_of_policy_" + add_medi_hdfc_counter).val();
        var name_insured_age = $("#name_insured_age_" + add_medi_hdfc_counter).val();
        if(name_insured_age<18){
            toaster(message_type = "Error", message_txt = "The Age "+name_insured_age+" Years Old Peoples Premium is Not Available.", message_icone = "error");
            $("#name_insured_sum_insured_"+add_medi_hdfc_counter).attr("disabled",true);
            return false
        }else{
            $("#name_insured_sum_insured_"+add_medi_hdfc_counter).attr("disabled",false);
        }
        var condition_value = getcolumnOnAge(name_insured_age);
        var name_insured_sum_insured = $("#name_insured_sum_insured_" + add_medi_hdfc_counter).val();
        var column_value = sum_insured_int_Converter(name_insured_sum_insured);

        if (type_of_policy != "" && type_of_policy != "null" && name_insured_age != "" && name_insured_sum_insured != "" && name_insured_sum_insured != "null" && condition_value != "" && column_value != "") {
            var url = "<?php echo base_url(); ?>master/remote/get_hdfc_ergo_health_insu_energy_basic_premium";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        type_of_policy: type_of_policy,
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
                            if (data["userdata"] == "")
                                $('#basic_premium_' + add_medi_hdfc_counter).val("");

                            $('#basic_premium_' + add_medi_hdfc_counter).val("");
                            $('#basic_premium_' + add_medi_hdfc_counter).val(data["userdata"]);

                        } else {
                            $('#basic_premium_' + add_medi_hdfc_counter).val("");
                        }
                        Tot_premium();
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

    function Tot_premium() {
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
        // Tot_gross_premium();
        medi_less_disc_tot_Cal()
    }

    function medi_less_disc_tot_Cal() {

        var less_disc_per = $("#less_disc_per").val();
        var tot_premium = $("#tot_premium").val();

        less_disc_per = parseInt(less_disc_per);
        tot_premium = parseInt(tot_premium);

        if (isNaN(less_disc_per))
            less_disc_per = 0;
        else
            less_disc_per = less_disc_per;

        if (isNaN(tot_premium))
            tot_premium = 0;
        else
            tot_premium = tot_premium;

        var less_disc_tot = Math.round((less_disc_per * tot_premium) / 100);
        $("#less_disc_tot").val(less_disc_tot);

        var last_gross_premium = 0;
        last_gross_premium = tot_premium - less_disc_tot;
        last_gross_premium = parseInt(last_gross_premium);

        if (isNaN(last_gross_premium))
            last_gross_premium = 0;
        else
            last_gross_premium = last_gross_premium;
        $("#gross_premium_tot").val(last_gross_premium);
        $("#gross_premium_tot_new").val(last_gross_premium);
        Tot_gross_premium()
        gst_apply();
    }

    function Tot_gross_premium() {
        var gross_premium_tot_new = $("#gross_premium_tot_new").val();
        var less_disc_tot = $("#less_disc_tot").val();
        var load_tot = $("#load_tot").val();

        gross_premium_tot_new = parseInt(gross_premium_tot_new);
        less_disc_tot = parseInt(less_disc_tot);
        load_tot = parseInt(load_tot);

        if (isNaN(gross_premium_tot_new))
            gross_premium_tot_new = 0;
        else
            gross_premium_tot_new = gross_premium_tot_new;

        if (isNaN(less_disc_tot))
            less_disc_tot = 0;
        else
            less_disc_tot = less_disc_tot;

        if (isNaN(load_tot))
            load_tot = 0;
        else
            load_tot = load_tot;

        var gross_premium_tot = 0;
        gross_premium_tot = gross_premium_tot_new + load_tot;

        gross_premium_tot = parseInt(gross_premium_tot);
        if (isNaN(gross_premium_tot))
            gross_premium_tot = 0;
        else
            gross_premium_tot = gross_premium_tot;
        $("#gross_premium_tot").val(gross_premium_tot);
        gst_apply();
    }

    function gst_apply() {
        var gross_premium_tot = $("#gross_premium_tot").val();
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

        gross_premium_tot = parseInt(gross_premium_tot);
        if (isNaN(gross_premium_tot))
            gross_premium_tot = 0;
        else
            gross_premium_tot = gross_premium_tot;

        if (gross_premium_tot == "") {
            $("#medi_cgst_tot").val(0);
            $("#medi_sgst_tot").val(0);
            $("#medi_final_premium").val(0);
        }

        var medi_cgst_tot = Math.round((gross_premium_tot * cgst_fire_per) / 100);
        var medi_sgst_tot = Math.round((gross_premium_tot * sgst_fire_per) / 100);
        $("#medi_cgst_tot").val(medi_cgst_tot);
        $("#medi_sgst_tot").val(medi_sgst_tot);

        var medi_final_premium = parseInt(gross_premium_tot) + parseInt(medi_cgst_tot) + parseInt(medi_sgst_tot);
        $("#medi_final_premium").val(medi_final_premium);

    }

    // Calculation Section End
</script>