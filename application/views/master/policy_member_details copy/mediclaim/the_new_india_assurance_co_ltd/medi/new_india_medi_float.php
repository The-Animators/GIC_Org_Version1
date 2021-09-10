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
                    <th><button class="btn btn-primary btn-sm Add_Mediclaim_HDFC" id="Add_Mediclaim_HDFC" onclick="AddMediclaimHDFC(0)">Add</button></th>
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
                <td><strong id="medi_total_amount_td"><input type="text" id="tot_premium" name="tot_premium" class="form-control tot_premium"  disabled></strong></td>
            </tr>
            <tr id="">
                <td colspn="3"><strong> Floater Discount: </strong></td>
                <td colspn=""><strong id="floater_disc_rate_td"><input type="text" id="floater_disc_rate" name="floater_disc_rate" class="form-control floater_disc_rate" onkeyup="floater_disc_tot_Cal()" value="0"></strong></td>
                <td><strong id="floater_disc_tot_td"><input type="text" id="floater_disc_tot" name="floater_disc_tot" class="form-control floater_disc_tot" disabled></td>
            </tr>
            <tr id="">
                <td colspn="3"><strong> Premium After Discount: </strong></td>
                <td colspn=""><strong></strong></td>
                <td><strong id="family_disc_tot_td"><input type="text" id="gross_premium_tot" name="gross_premium_tot" class="form-control gross_premium_tot" disabled><input type="hidden" name="gross_premium_tot_new"  id="gross_premium_tot_new" value=""></td>
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
                <td><strong id="medi_final_premium_td"><input type="text" id="medi_final_premium" name="medi_final_premium" class="form-control" disabled><input type="hidden" id="medi_new_india_assu_float_policy_id" name="medi_new_india_assu_float_policy_id" class="form-control"></td>
            </tr>
        </table>
    </div>
</div>

<script>
    var sum_insured_dropdown_val = "";
    var add_medi_hdfc_counter = 0;
    var main_Mediclaim_HDFC = [];

    function removeMediclaimHDFC(add_medi_hdfc_counter) {

        $("#remove_mediclaim_HDFC_" + add_medi_hdfc_counter).closest("tr").remove();
        var indexValue = main_Mediclaim_HDFC.indexOf(add_medi_hdfc_counter);
        main_Mediclaim_HDFC.splice(indexValue, 1);
        get_basic_premium(add_medi_hdfc_counter);
        floater_disc_tot_Cal();
        // alert(main_Mediclaim_HDFC);
        if (main_Mediclaim_HDFC.length == 0) {
            add_medi_hdfc_counter = 0;
            main_Mediclaim_HDFC = [];
            $("#Add_Mediclaim_HDFC").attr("onClick", "AddMediclaimHDFC(" + add_medi_hdfc_counter + ")");
        }
        // alert(main_Mediclaim_HDFC);
    }

    function AddMediclaimHDFC(add_medi_hdfc_counter) {
        var policy_holder_name = $("#policy_holder_name").val();
        main_Mediclaim_HDFC.push(add_medi_hdfc_counter);

        var tr_table = '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_mediclaim_HDFC_' + add_medi_hdfc_counter + '" onClick=removeMediclaimHDFC(' + add_medi_hdfc_counter + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_hdfc_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_hdfc_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_hdfc_counter + '" name="name_insured_dob[]" value="" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_hdfc_counter + '" name="name_insured_age[]" value="" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_hdfc_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;      endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_medi_hdfc_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_medi_hdfc_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_' + add_medi_hdfc_counter + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_medi_hdfc_counter + ')"><option value="null">Select Sum Insured</option>'+sum_insured_dropdown_val+'</select></td><td> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium_' + add_medi_hdfc_counter + '"  class="form-control basic_premium" value=""></td></tr>';
        $("#first_table_tbody").append(tr_table);
        if(add_medi_hdfc_counter == 0){
            $("#name_insured_member_name_" + add_medi_hdfc_counter).val(policy_holder_name);
            get_dob(add_medi_hdfc_counter);
        }
        add_medi_hdfc_counter = add_medi_hdfc_counter + 1;
        $("#Add_Mediclaim_HDFC").attr("onClick", "AddMediclaimHDFC(" + add_medi_hdfc_counter + ")");
        floater_disc_tot_Cal();
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

    function get_dob(add_medi_hdfc_counter) {
        get_age(add_medi_hdfc_counter);
        if (add_medi_hdfc_counter == 0) {
            var name_insured_relation = $('#name_insured_relation_' + add_medi_hdfc_counter + ' option').filter(function() {
                return $(this).html() == "Self";
            }).val();
            $('#name_insured_relation_' + add_medi_hdfc_counter).val(name_insured_relation);
        }
        var region = $("#region").val();
        var years_of_premium = $("#years_of_premium").val();

        if(region == "null" || region == "" ||years_of_premium == "null" || years_of_premium == ""){
            $('#name_insured_member_name_'+ add_medi_hdfc_counter).prop('selectedIndex',0);
            if(region == "null" || region == "")
                toaster(message_type = "Error", message_txt = " Please Select Region First.", message_icone = "error");
            if(years_of_premium == "null" || years_of_premium == "")
                toaster(message_type = "Error", message_txt = " Please Select Years of Premium.", message_icone = "error");
            return false;
        }

        var name_insured_member_name = $("#name_insured_member_name_" + add_medi_hdfc_counter).val();
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

        if(name_insured_member_name=="null" || name_insured_member_name == "" || name_insured_dob == ""){
            $('#name_insured_age_' + add_medi_hdfc_counter).val("");
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
                        $('#name_insured_age_' + add_medi_hdfc_counter).val("");
                        var age = data["age"];
                        $('#name_insured_age_' + add_medi_hdfc_counter).val(age);
                    } else {
                        $('#name_insured_age_' + add_medi_hdfc_counter).val("");
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

    sum_insured_dropdown();

    function sum_insured_dropdown() {
        var sum_Val = ["2,00,000", "3,00,000", "5,00,000", "8,00,000", "10,00,000", "12,00,000", "15,00,000"];
        var i = 0;
        for (i; i <= 6; i++) {
            sum_insured_dropdown_val += '<option value="' + sum_Val[i] + '">' + sum_Val[i] + '</option>';
        }
        $(".name_insured_sum_insured").append(sum_insured_dropdown_val);
        // alert(sum_insured_dropdown_val);

        $(".name_insured_member_name").empty();
        $(".name_insured_member_name").append('<option value="null">Select Member Names</option>' + option_val_data);
        $(".nominee_name").empty();
        $(".nominee_name").append('<option value="null">Select Nominee Name</option>' + option_val_data);
    }
    var actual_data_MediclaimHDFC = [];

    function Total_Medi_the_new_flaoter_assu() {
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
            var name_insured_sum_insured = $(".name_insured_sum_insured", this).val();
            var basic_premium = $(".basic_premium", this).val();

            actual_data_MediclaimHDFC.push([key, name_insured_member_name, name_insured_member_name_txt, name_insured_dob, name_insured_age, name_insured_relation, name_insured_relation_txt, nominee_name, nominee_name_txt, nominee_relation, nominee_relation_txt, name_insured_sum_insured,basic_premium]);
            if (name_insured_member_name == '')
                actual_data_MediclaimHDFC.splice(key, 1);
        });
        // console.log(actual_data_MediclaimHDFC);
        // alert(actual_data_MediclaimHDFC);
        return actual_data_MediclaimHDFC;

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
            column_value = "<18";
        }else if (age <= 35) {
            column_value = "18_35";
        }else if (age <= 45) {
            column_value = "36_45";
        } else if (age <= 50) {
            column_value = "46_50";
        } else if (age <= 55) {
            column_value = "51_55";
        } else if (age <= 60) {
            column_value = "56_60";
        } else if (age <= 65) {
            column_value = "61_65";
        }
        // alert(column_value);
        return column_value;
    }

    function get_basic_premium(add_medi_hdfc_counter) {
        $('#basic_premium_' + add_medi_hdfc_counter).val("");
        $('#tot_prem_' + add_medi_hdfc_counter).val("");
        Tot_basic_premium();

        var name_insured_member_name = $("#name_insured_member_name_" + add_medi_hdfc_counter).val();
        if(name_insured_member_name =="null" || name_insured_member_name == ""){
            toaster(message_type = "Error", message_txt = "The Name Of Insured field is required.", message_icone = "error");
            $('#name_insured_sum_insured_' + add_medi_hdfc_counter).prop('selectedIndex',0);
            $('#ncd_type_' + add_medi_hdfc_counter).prop('selectedIndex',0);
            $('#maternity_type_' + add_medi_hdfc_counter).prop('selectedIndex',0);
            $('#limit_of_cataract_type_' + add_medi_hdfc_counter).prop('selectedIndex',0);
            $('#limit_of_cataract_prem_' + add_medi_hdfc_counter).prop('selectedIndex',0);
            $('#ncd_prem_' + add_medi_hdfc_counter).val("");
            $('#maternity_prem_' + add_medi_hdfc_counter).val("");
            $('#basic_premium_' + add_medi_hdfc_counter).val("");
            return false;
        }
        var name_insured_age = $("#name_insured_age_" + add_medi_hdfc_counter).val();
        var column_value  = getcolumnOnAge(name_insured_age);
        var name_insured_sum_insured = $("#name_insured_sum_insured_" + add_medi_hdfc_counter).val();
        var condition_value = sum_insured_int_Converter(name_insured_sum_insured);
        
        if (name_insured_age != "" && name_insured_sum_insured != "null"  && name_insured_sum_insured != "" && condition_value != "" && column_value !="") {
            var url = "<?php echo base_url(); ?>master/remote/get_the_new_india_assu_policy_floater_medi_basic_prem";

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
                                $('#basic_premium_' + add_medi_hdfc_counter).val("");

                            $('#basic_premium_' + add_medi_hdfc_counter).val("");
                            $('#basic_premium_' + add_medi_hdfc_counter).val(data["userdata"]);

                        } else {
                            $('#basic_premium_' + add_medi_hdfc_counter).val("");
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
        $("#gross_premium_tot_new").val(total);
        floater_disc_tot_Cal();
    }

    function floater_disc_tot_Cal() {
        var rowCount = $('#first_table tbody tr').length;
        var vals = $("#floater_disc_rate").val();
        vals = parseInt(vals);

        if (isNaN(vals))
            vals = "#";
        else
            vals = vals;
        if (rowCount == 1) {
            $("#floater_disc_rate").val(0);
        } else if (rowCount == 2) {
            var newVals = $("#floater_disc_rate").val();
            if(newVals!=""){
                if (vals == 0 || vals == "#" || vals !="") {
                    $("#floater_disc_rate").val(5);
                }
            } 
        } else if (rowCount == 3) {
            var newVals = $("#floater_disc_rate").val();
            if(newVals!=""){
                if (vals == 0 || vals == "#" || vals !="") {
                    $("#floater_disc_rate").val(10);
                }
            } 
        } else if (rowCount == 4) {
            var newVals = $("#floater_disc_rate").val();
            if(newVals !=""){
                if (vals == 0 || vals == "#" || vals !="") {
                    $("#floater_disc_rate").val(15);
                }
            } 
        }
        var floater_disc_rate = $("#floater_disc_rate").val();
        var tot_premium = $("#tot_premium").val();

        floater_disc_rate = parseInt(floater_disc_rate);
        tot_premium = parseInt(tot_premium);

        if (isNaN(floater_disc_rate))
            floater_disc_rate = 0;
        else
            floater_disc_rate = floater_disc_rate;

        if (isNaN(tot_premium))
            tot_premium = 0;
        else
            tot_premium = tot_premium;

        if (rowCount == 1) {
            var floater_disc_tot = Math.round((floater_disc_rate * tot_premium) / 100);
            $("#floater_disc_tot").val(floater_disc_tot);
        } else {
            var floater_disc_tot = Math.round((floater_disc_rate * tot_premium) / 100);
            $("#floater_disc_tot").val(floater_disc_tot);
        }
        Tot_gross_premium_Cal();
    }

    function Tot_gross_premium_Cal(){
        var gross_premium_tot_new = $("#gross_premium_tot_new").val();
        var floater_disc_tot = $("#floater_disc_tot").val();

        gross_premium_tot_new = parseInt(gross_premium_tot_new);
        floater_disc_tot = parseInt(floater_disc_tot);

        if (isNaN(gross_premium_tot_new))
            gross_premium_tot_new = 0;
        else
            gross_premium_tot_new = gross_premium_tot_new;

        if (isNaN(floater_disc_tot))
            floater_disc_tot = 0;
        else
            floater_disc_tot = floater_disc_tot;
       
        var tot_prem = 0;
        tot_prem = (gross_premium_tot_new - floater_disc_tot);
        tot_prem = parseInt(tot_prem);

        if (isNaN(tot_prem))
            tot_prem = 0;
        else
            tot_prem = tot_prem;
        $("#gross_premium_tot").val(tot_prem);
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