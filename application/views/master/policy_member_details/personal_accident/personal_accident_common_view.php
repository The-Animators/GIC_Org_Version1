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
                    <th><button class="btn btn-primary btn-sm Add_Personal_accident" id="Add_Personal_accident" onclick="AddPersonal_accident(0)">Add</button></th>
                    <th>Name Of Insured</th>
                    <th>DOB</th>
                    <th>Age</th>
                    <th>Relations</th>
                    <th>Nominee Name</th>
                    <th>Nominee Relations</th>
                    <th>Sum Insured</th>
                    <th>Risk Group</th>
                    <th>Premium</th>
                </tr>
            </thead>
            <tbody id="first_table_tbody">
               
            </tbody>
        </table>
    </div>
    <div class="col-md-12">
        <table class="table mb-0 table-bordered mt-2 col-md-12">
            <tr id="declaration_sale_fig_tr">
                <td colspn="2"><strong>Total Premium: </strong></td>
                <td colspn=""><strong></strong></td>
                <td><strong id="tot_premium_td"><input type="text" id="tot_premium" name="tot_premium" class="form-control" disabled></strong></td>
            </tr>
            <tr id="annual_turn_over_tr">
                <td colspn=""><strong> Less Discount In Percent: </strong></td>

                <td colspn=""><strong><input type="text" id="less_disc_rate" name="less_disc_rate" class="form-control less_disc_rate" onkeyup="medi_less_disc_tot_Cal()"></strong></td>
                <td><strong id="less_disc_tot_td"><input type="text" id="less_disc_tot" name="less_disc_tot" class="form-control" disabled></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Gross Premium: </strong></td>
                <td colspn=""><strong></strong></td>
                <td><strong id="gross_premium_td"><input type="text" id="gross_premium" name="gross_premium" class="form-control gross_premium" disabled><input type="hidden" id="gross_premium_new" name="gross_premium_new" class="form-control gross_premium_new" disabled></td>
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
                <td><strong id="medi_final_premium_td"><input type="text" id="medi_final_premium" name="medi_final_premium" class="form-control" disabled><input type="hidden" id="paccident_policy_id" name="paccident_policy_id" class="form-control" ></td>
            </tr>
        </table>
    </div>
</div>

<script>
    var sum_insured_dropdown_val = "";
    var add_pa_counter = 0;
    var main_Personal_accident = [];
    function removePersonal_accident(add_pa_counter) {
        $("#remove_personal_accident_" + add_pa_counter).closest("tr").remove();
        var indexValue = main_Personal_accident.indexOf(add_pa_counter);
        main_Personal_accident.splice(indexValue, 1);
        if (main_Personal_accident.length == 0) {
            add_pa_counter = 0;
            main_Personal_accident = [];
            $("#Add_Personal_accident").attr("onClick", "AddPersonal_accident(" + add_pa_counter + ")");
        }
    }

    function AddPersonal_accident(add_pa_counter) {
        var policy_holder_name = $("#policy_holder_name").val();
        main_Personal_accident.push(add_pa_counter);
        var tr_table = '<tr><td width="2%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_personal_accident_'+add_pa_counter+'" onClick=removePersonal_accident('+add_pa_counter+') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_'+add_pa_counter+'" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob('+add_pa_counter+')"><option value="null">Select Member Names</option>' + option_val_data + '</select></td><td width="8%"><input style="width:100px;" type="text" id="name_insured_dob_'+add_pa_counter+'" name="name_insured_dob[]" value="" class="form-control name_insured_dob"></td> <td width="5%"><input style="width:55px;" type="text" id="name_insured_age_'+add_pa_counter+'" name="name_insured_age[]" value="" class="form-control name_insured_age"></td> <td><select style="width:120px;" id="name_insured_relation_' + add_pa_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;      endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_pa_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_pa_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td> <td width="20%">Table 1:<br/><select style="width:110px;" id="name_insured_sum_insured_'+add_pa_counter+'_1" name="name_insured_sum_insured_1[]" class="form-control name_insured_sum_insured_1" onchange="get_premium('+add_pa_counter+',1)"><option value="null">Select Sum Insured</option>'+sum_insured_dropdown_val+'</select></div></td> <td width="20%">Table 1:<br/><select style="width:110px;" id="risk_group_'+add_pa_counter+'_1" name="risk_group_1[]" class="form-control risk_group_1" onchange="get_premium('+add_pa_counter+',1)"><option value="null">Select Risk Group</option><option value="Risk Group 1">Risk Group 1</option><option value="Risk Group 2">Risk Group 2</option><option value="Risk Group 3">Risk Group 3</option></select><br/></td>  <td width="20%">Table 1:<br/><input style="width:110px;" type="text"  id="name_insured_premium_'+add_pa_counter+'_1" name="name_insured_premium_1[]" class="form-control name_insured_premium_1" onkeyup="premium_tot_Cal('+add_pa_counter+')" ></td></tr>';
        $("#first_table_tbody").append(tr_table);

        if(add_pa_counter == 0){
            $("#name_insured_member_name_" + add_pa_counter).val(policy_holder_name);
            get_dob(add_pa_counter);
        }

        add_pa_counter = add_pa_counter + 1;
        $("#Add_Personal_accident").attr("onClick", "AddPersonal_accident(" + add_pa_counter + ")");
    }

    var actual_data_PAccident = [];

    function Total_PAccident() {
        actual_data_PAccident = [];

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
            var name_insured_sum_insured_1 = $(".name_insured_sum_insured_1", this).val();
            var risk_group_1 = $(".risk_group_1", this).val();
            var name_insured_premium_1 = $(".name_insured_premium_1", this).val();

            actual_data_PAccident.push([key, name_insured_member_name , name_insured_member_name_txt , name_insured_dob , name_insured_age , name_insured_relation , name_insured_relation_txt , nominee_name , nominee_name_txt , nominee_relation , nominee_relation_txt , name_insured_sum_insured_1 , risk_group_1 , name_insured_premium_1]);
            if (name_insured_member_name == '')
                actual_data_PAccident.splice(key, 1);
        });
        return actual_data_PAccident;
    }

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

    function get_dob(add_pa_counter) {
        var rowCount = $('#first_table tbody tr').length;

        if(add_pa_counter == 0){
            var name_insured_relation =  $('#name_insured_relation_'+add_pa_counter+' option').filter(function () { return $(this).html() == "Self"; }).val();
            $('#name_insured_relation_'+add_pa_counter).val(name_insured_relation);
        }

        var name_insured_member_name = $("#name_insured_member_name_"+add_pa_counter).val();
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
                        $('#name_insured_dob_'+add_pa_counter).val("");
                        var dob = data["userdata"].dob;
                        if(dob == "null"){
                            dob = "";
                            toaster(message_type = "Error", message_txt = "The DOB field is required.", message_icone = "error");
                        }else{
                            dob = dateFormate(dob);
                        }
                        $('#name_insured_dob_'+add_pa_counter).val(dob);
                        get_age(add_pa_counter);
                    } else {
                        $('#name_insured_dob_'+add_pa_counter).val("");
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

    function get_age(add_pa_counter) {
        var name_insured_member_name = $("#name_insured_member_name_"+add_pa_counter).val();
        var name_insured_dob = $("#name_insured_dob_"+add_pa_counter).val();

        if(name_insured_member_name == "null" || name_insured_member_name == ""){
            $('#name_insured_age_'+add_pa_counter).val("");
            return false;
        }
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
                        $('#name_insured_age_'+add_pa_counter).val("");
                        var age = data["age"];
                        $('#name_insured_age_'+add_pa_counter).val(age);
                    } else {
                        $('#name_insured_age_'+add_pa_counter).val("");
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

    sum_insured_dropdown();
    function sum_insured_dropdown() {
        var sum_Val = ["50,000","1,00,000", "2,00,000", "3,00,000", "4,00,000", "5,00,000", "6,00,000", "7,00,000", "8,00,000", "9,00,000", "10,00,000", "15,00,000", "20,00,000", "25,00,000", "30,00,000", "35,00,000", "40,00,000", "45,00,000", "50,00,000", "55,00,000", "60,00,000", "65,00,000", "70,00,000", "75,00,000", "80,00,000", "85,00,000", "90,00,000", "95,00,000", "1,00,00,000"];
        var i = 0;
        for (i; i <= 28; i++) {
            sum_insured_dropdown_val += '<option value="' + sum_Val[i] + '">' + sum_Val[i] + '</option>';
        }
        // alert(sum_insured_dropdown_val);
        $(".name_insured_sum_insured_1").empty();
        $(".name_insured_sum_insured_1").append('<option value="null">Select Sum Insured</option>'+sum_insured_dropdown_val);
        $(".name_insured_sum_insured_2").empty();
        $(".name_insured_sum_insured_2").append('<option value="null">Select Sum Insured</option>'+sum_insured_dropdown_val);  
        $(".name_insured_sum_insured_3").empty();
        $(".name_insured_sum_insured_3").append('<option value="null">Select Sum Insured</option>'+sum_insured_dropdown_val);
        $(".name_insured_sum_insured_4").empty();
        $(".name_insured_sum_insured_4").append('<option value="null">Select Sum Insured</option>'+sum_insured_dropdown_val);
        $(".name_insured_member_name").empty();
        $(".name_insured_member_name").append('<option value="null">Select Member Names</option>'+option_val_data);
        // $(".nominee_name").empty();
        // $(".nominee_name").append('<option value="null">Select Nominee Name</option>'+option_val_data);
    }

    // Calculation Section Start
    function name_insured_sum_insured_INTVAl(Sum_insured){
        var new_sum_insured = "";
        if(Sum_insured == "50,000")
            new_sum_insured = 50000; 
        else if(Sum_insured == "1,00,000")
            new_sum_insured = 100000; 
        else if(Sum_insured == "2,00,000")
            new_sum_insured = 200000; 
        else if(Sum_insured == "3,00,000")
            new_sum_insured = 300000; 
        else if(Sum_insured == "4,00,000")
            new_sum_insured = 400000; 
        else if(Sum_insured == "5,00,000")
            new_sum_insured = 500000; 
        else if(Sum_insured == "6,00,000")
            new_sum_insured = 600000; 
        else if(Sum_insured == "7,00,000")
            new_sum_insured = 700000; 
        else if(Sum_insured == "8,00,000")
            new_sum_insured = 800000; 
        else if(Sum_insured == "9,00,000")
            new_sum_insured = 900000; 
        else if(Sum_insured == "10,00,000")
            new_sum_insured = 1000000; 
        else if(Sum_insured == "15,00,000")
            new_sum_insured = 1500000; 
        else if(Sum_insured == "20,00,000")
            new_sum_insured = 2000000; 
        else if(Sum_insured == "25,00,000")
            new_sum_insured = 2500000; 
        else if(Sum_insured == "30,00,000")
            new_sum_insured = 3000000; 
        else if(Sum_insured == "35,00,000")
            new_sum_insured = 3500000;
        else if(Sum_insured == "40,00,000")
            new_sum_insured = 4000000;
        else if(Sum_insured == "45,00,000")
            new_sum_insured = 4500000; 
        else if(Sum_insured == "50,00,000")
            new_sum_insured = 5000000; 
        else if(Sum_insured == "55,00,000")
            new_sum_insured = 5500000; 
        else if(Sum_insured == "60,00,000")
            new_sum_insured = 6000000; 
        else if(Sum_insured == "65,00,000")
            new_sum_insured = 6500000;  
        else if(Sum_insured == "70,00,000")
            new_sum_insured = 7000000; 
        else if(Sum_insured == "75,00,000")
            new_sum_insured = 7500000; 
        else if(Sum_insured == "80,00,000")
            new_sum_insured = 8000000; 
        else if(Sum_insured == "85,00,000")
            new_sum_insured = 8500000; 
        else if(Sum_insured == "90,00,000")
            new_sum_insured = 9000000; 
        else if(Sum_insured == "95,00,000")
            new_sum_insured = 9500000; 
        else if(Sum_insured == "1,00,00,000")
            new_sum_insured = 10000000; 

        return new_sum_insured;
    }

    function get_premium(add_pa_counter,count){
        var name_insured_member_name = $("#name_insured_member_name_"+add_pa_counter).val();
        if(name_insured_member_name == "null" || name_insured_member_name == ""){
            toaster(message_type = "Error", message_txt = "The Name Of Insured field is required.", message_icone = "error");
            $('#name_insured_sum_insured_'+add_pa_counter+"_"+count).prop('selectedIndex',0);
            $("#risk_group_"+add_pa_counter+"_"+count).prop('selectedIndex',0);
            $("#name_insured_premium_"+add_pa_counter+"_"+count).val("");
            return false;
        }

        // var name_insured_sum_insured = $("#name_insured_sum_insured_"+add_pa_counter+"_"+count).val();
        // name_insured_sum_insured = name_insured_sum_insured_INTVAl(name_insured_sum_insured);
        // name_insured_sum_insured = parseInt(name_insured_sum_insured);

        // $("#name_insured_premium_"+add_pa_counter+"_"+count).val(name_insured_premium);

        // sum_insured_Cal(add_pa_counter);
        // premium_Cal(add_pa_counter);
    }

    // function get_manual_premium(add_pa_counter,count){
    //     var name_insured_premium = $("#name_insured_premium_"+add_pa_counter+"_"+count).val();
    // }

    function sum_insured_Cal(add_pa_counter) {

        var name_insured_sum_insured_1 = $("#name_insured_sum_insured_"+add_pa_counter+"_1").val();

        name_insured_sum_insured_1 = name_insured_sum_insured_INTVAl(name_insured_sum_insured_1);

        name_insured_sum_insured_1 = parseInt(name_insured_sum_insured_1);
        var sum_insured = 0;
        if (isNaN(name_insured_sum_insured_1))
            name_insured_sum_insured_1 = 0;
        else
            name_insured_sum_insured_1 = name_insured_sum_insured_1;


        sum_insured = name_insured_sum_insured_1;
        $("#sum_insured_"+add_pa_counter).val(sum_insured);
    }

    function premium_Cal(add_pa_counter){
        var name_insured_premium_1 = $("#name_insured_premium_"+add_pa_counter+"_1").val();

        name_insured_premium_1 = parseInt(name_insured_premium_1);

        var premium = 0;
        if (isNaN(name_insured_premium_1))
            name_insured_premium_1 = 0;
        else
            name_insured_premium_1 = name_insured_premium_1;


        premium = premium + name_insured_premium_1;
        $("#premium_"+add_pa_counter).val(premium);
        premium_tot_Cal(add_pa_counter);
    }

    function premium_tot_Cal(add_pa_counter) {
        var inputs = $(".name_insured_premium_1");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var premium = $(inputs[i]).val();
            premium = parseInt(premium);
            if (isNaN(premium))
                premium = 0;
            else
                premium = premium;

            total = total + premium;
            $("#tot_premium").val(total);
            $("#gross_premium_new").val(total);
        }
        medi_less_disc_tot_Cal();
    }

    function medi_less_disc_tot_Cal() {

        var less_disc_rate = $("#less_disc_rate").val();
        var tot_premium = $("#tot_premium").val();

        // less_disc_rate = parseInt(less_disc_rate);
        tot_premium = parseInt(tot_premium);

        if (isNaN(less_disc_rate))
            less_disc_rate = 0;
        else
            less_disc_rate = less_disc_rate;

        if (isNaN(tot_premium))
            tot_premium = 0;
        else
            tot_premium = tot_premium;

        var less_disc_tot = Math.round((less_disc_rate * tot_premium) / 100);
        $("#less_disc_tot").val(less_disc_tot);
        
        gross_premium();
    }

    function gross_premium() {
        var gross_premium = $("#gross_premium_new").val();
        var less_disc_tot = $("#less_disc_tot").val();
        gross_premium = parseInt(gross_premium);
        less_disc_tot = parseInt(less_disc_tot);

        if (isNaN(gross_premium))
            gross_premium = 0;
        else
            gross_premium = gross_premium;

        if (isNaN(less_disc_tot))
            less_disc_tot = 0;
        else
            less_disc_tot = less_disc_tot;

        var last_gross_premium = gross_premium - less_disc_tot;

        $("#gross_premium").val(last_gross_premium);
        gst_apply();
    }

    function gst_apply() {
        var gross_premium = $("#gross_premium").val();
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

        gross_premium = parseInt(gross_premium);
        if (isNaN(gross_premium))
            gross_premium = 0;
        else
            gross_premium = gross_premium;

        if (gross_premium == "") {
            $("#medi_cgst_tot").val(0);
            $("#medi_sgst_tot").val(0);
            $("#medi_final_premium").val(0);
        }

        var medi_cgst_tot = Math.round((gross_premium * cgst_fire_per) / 100);
        var medi_sgst_tot = Math.round((gross_premium * sgst_fire_per) / 100);
        $("#medi_cgst_tot").val(medi_cgst_tot);
        $("#medi_sgst_tot").val(medi_sgst_tot);

        var medi_final_premium = parseInt(gross_premium) + parseInt(medi_cgst_tot) + parseInt(medi_sgst_tot);
        $("#medi_final_premium").val(medi_final_premium);

    }

    // Calculation Section End
</script>