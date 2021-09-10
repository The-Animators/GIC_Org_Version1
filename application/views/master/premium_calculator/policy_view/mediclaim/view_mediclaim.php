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
    .table td, .table th {
    padding: .5rem;
    font-size: 13px;
    }
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
                    <th>Type Of Policy</th>
                    <th>Option </th>
                    <th>Sum Insured</th>
                    <th>Premium</th>
                    <th id="dm_per_th">DM %</th>
                    <th id="dm_load_th">DM Loading</th>
                    <th id="htn_per_th">HTN %</th>
                    <th id="htn_load_th">HTN Loading</th>
                    <th>Premium After Loading</th>
                    <th>NCD %</th>
                    <th>NCD Amount</th>
                    <th>Premium After NCD</th>
                </tr>
            </thead>
            <tbody id="first_table_tbody">

            </tbody>
        </table>
    </div>
    <div class="col-md-12">
        <table class="table mb-0 table-bordered mt-2 col-md-12">
            <tr id="declaration_sale_fig_tr">
                <!-- <td colspn="2"><strong>NCD Total: </strong></td> -->
                <td colspn="2" width="50%"><strong>Total: </strong></td>
                <!-- <td colspn="2" width="35%"><strong> </strong></td> -->
                <td colspn=""><center><strong id="medi_total_ncd_amount"></strong></center></td>
                <td colspn="2"><strong> Premium Total: </strong></td>
                <td><center><strong id="medi_total_amount"></strong></center></td>
            </tr>
            <tr id="annual_turn_over_tr">
                <td colspn=""><strong> Family Discount: </strong></td>
                <td colspn=""><center><strong id="medi_family_disc_rate"></strong></center></td>
                <td colspn=""><strong></strong></td>
                <td><center><strong id="medi_family_disc_tot"></center></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Pemium After FD: </strong></td>
                <td colspn=""><strong></strong></td>
                <td colspn=""><strong></strong></td>
                <td><center><strong id="medi_premium_after_fd"></center></td>
            </tr>
            <tr>
                <td colspn=""><strong> CGST:</strong></td>
                <td><center><strong id="cgst_fire_per"></center></td>
                <td><strong id=""></strong></td>
                <td><center><strong id="medi_cgst_tot"></center></td>
            </tr>
            <tr>
                <td><strong> SGST</strong></td>
                <td><center><strong id="sgst_fire_per"></center></td>
                <td><strong id=""></strong></td>
                <td><center><strong id="medi_sgst_tot"></center></td>
            </tr>
            <tr>
                <td colspn="3"><strong class="text-purple">Final Premium</strong></td>
                <td colspn="2"><strong></strong></td>
                <td colspn="2"><strong></strong></td>
                <td><center><strong class="text-purple" id="medi_final_premium"></center></td>
            </tr>
        </table>
    </div>
</div>


<script>
    var sum_insured_dropdown_val = "";
    function sum_insured_dropdown() {
        var sum_Val = ["1,00,000", "1,25,000", "1,50,000", "1,75,000", "2,00,000", "2,25,000", "2,50,000", "2,75,000", "3,00,000", "3,25,000", "3,50,000", "3,75,000", "4,00,000", "4,25,000", "4,50,000", "4,75,000", "5,00,000", "5,25,000", "5,50,000", "5,75,000", "6,00,000", "6,25,000", "6,50,000", "6,75,000", "7,00,000", "7,25,000", "7,50,000", "7,75,000", "8,00,000", "10,00,000", "15,00,000", "20,00,000"];
        var i = 0;
        for (i; i <= 31; i++) {
            sum_insured_dropdown_val += '<option value="' + sum_Val[i] + '">' + sum_Val[i] + '</option>';
        }
        // alert(sum_insured_dropdown_val);
        $(".name_insured_sum_insured").append(sum_insured_dropdown_val);
        
        $(".name_insured_member_name").empty();
        $(".name_insured_member_name").append('<option value="null">Select Member Names</option>'+option_val_member_data);
        $(".nominee_name").empty();
        $(".nominee_name").append('<option value="null">Select Nominee Name</option>'+option_val_member_data);
    }
    
    sum_insured_dropdown();
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



    function get_dob(counter) {
        // alert(counter);
        var rowCount = $('#first_table tbody tr').length;

        if(counter == 0){
            var name_insured_relation =  $('#name_insured_relation_'+counter+' option').filter(function () { return $(this).html() == "Self"; }).val();
            $('#name_insured_relation_'+counter).val(name_insured_relation);
        }
        // alert(rowCount);
        if(rowCount==1){
            // var name_insured_relation = $('#name_insured_relation').find('option[text="Self"]').val();
            // var name_insured_relation =  $('#name_insured_relation_'+counter+' option').filter(function () { return $(this).html() == "Self"; }).val();
            // $('#name_insured_relation_'+counter).val(name_insured_relation);
        }

        var name_insured_member_name = $("#name_insured_member_name_"+counter).val();
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
                        $('#name_insured_dob_'+counter).val("");
                        var dob = data["userdata"].dob;
                        // alert(dob);
                        if(dob == "null"){
                            dob = "";
                            toaster(message_type = "Error", message_txt = "The DOB field is required.", message_icone = "error");
                        }else{
                            dob = dateFormate(dob);
                        }
                        // alert(dob);
                        $('#name_insured_dob_'+counter).val(dob);
                        get_age(counter);
                    } else {
                        $('#name_insured_dob_'+counter).val("");
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

    function get_age(counter) {
        var name_insured_member_name = $("#name_insured_member_name_"+counter).val();
        var name_insured_dob = $("#name_insured_dob_"+counter).val();
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
                        $('#name_insured_age_'+counter).val("");
                        var age = data["age"];
                        $('#name_insured_age_'+counter).val(age);
                        remove_policyType_basedonAge(counter);
                    } else {
                        $('#name_insured_age_'+counter).val("");
                    }
                    medi_ncd_amount_Cal();
                    medi_total_amount_Cal();
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function remove_policyType_basedonAge(counter) {
        var name_insured_age = $("#name_insured_age_"+counter).val();
        if (name_insured_age > 36 || name_insured_age > 61) {
            // alert("36");
            if (name_insured_age > 36) {
                $("#name_insured_policy_type_"+counter+" option[value='Platinum']").remove();
            } else {
                $("#name_insured_policy_type_"+counter+" option[value='Platinum']").remove();
                $("#name_insured_policy_type_"+counter).append('<option value="Platinum">Platinum</option>');
            }
            if (name_insured_age > 61) {
                $("#name_insured_policy_type_"+counter+" option[value='Gold']").remove();
            } else {
                $("#name_insured_policy_type_"+counter+" option[value='Gold']").remove();
                $("#name_insured_policy_type_"+counter).append('<option value="Gold">Gold</option>');
            }
        } else {
            $("#name_insured_policy_type_"+counter).empty();
            $("#name_insured_policy_type_"+counter).append('<option value="null">Select Policy Type</option><option value="Platinum">Platinum</option><option value="Gold">Gold</option><option value="Sr. Citizen">Sr. Citizen</option>');
        }
        var name_insured_policy_type = $("#name_insured_policy_type_"+counter).val();
        if(name_insured_policy_type=="null"){
            $("#name_insured_sum_insured_"+counter).empty();
            $("#name_insured_premium_"+counter).val("");
        }
        remove_sumInsured_basedon_policyType(counter);
    }

    function remove_sumInsured_basedon_policyType(counter) {
        var name_insured_policy_type = $("#name_insured_policy_type_"+counter).val();
        // alert(name_insured_policy_type);
        if (name_insured_policy_type == "Gold" || name_insured_policy_type == "Sr. Citizen") {
            $("#name_insured_sum_insured_"+counter+" option[value='15,00,000']").remove();
            $("#name_insured_sum_insured_"+counter+" option[value='20,00,000']").remove();
        } else {
            // alert(sum_insured_dropdown_val);
            // $("#name_insured_sum_insured").append('<option value="1,50,0000">1,50,0000</option>');
            // $("#name_insured_sum_insured").append('<option value="2,00,000">2,00,000</option>');
            $("#name_insured_sum_insured_"+counter).empty();
            $("#name_insured_sum_insured_"+counter).append(sum_insured_dropdown_val);
        }

        get_premiumBasedon_age_sumInsured_PolicyType(counter);
            medi_ncd_amount_Cal();
            medi_total_amount_Cal();
    }

    function getcolumnOnAge(age) {
        var column_value = "";
        if (age <= 25) {
            column_value = "91days_25years";
        } else if (age <= 30) {
            column_value = "26_30";
        } else if (age <= 35) {
            column_value = "31_35";
        } else if (age <= 40) {
            column_value = "36_40";
        } else if (age <= 45) {
            column_value = "41_45";
        } else if (age <= 50) {
            column_value = "46_50";
        } else if (age <= 55) {
            column_value = "51_55";
        } else if (age <= 60) {
            column_value = "56_60";
        }
        return column_value;
    }

    function get_Gold_columnOnAge(age) {
        var column_value = "";
        if (age <= 40) {
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

    function get_Senior_Citizen_columnOnAge(age) {
        var column_value = "";
        if (age <= 65) {
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

    function premium_basedon_Type(counter) {
        get_premiumBasedon_age_sumInsured_PolicyType(counter);
        var name_insured_premium = $("#name_insured_premium_"+counter).val();
        if (name_insured_premium == "") {
            $("#dm_loading_"+counter).val("");
            $("#htn_loading_"+counter).val("");
            $("#premium_after_loading_+counter_"+counter).val("");
            $("#ncd_amount_"+counter).val("");
            $("#premium_after_ncd_amount_"+counter).val("");

            $("#dm_loading_"+counter).val(0);
            $("#htn_loading_"+counter).val(0);
            $("#premium_after_loading_"+counter).val(0);
            $("#ncd_amount_"+counter).val(0);
            $("#premium_after_ncd_amount_"+counter).val(0);
        }
             medi_ncd_amount_Cal();
            medi_total_amount_Cal();
    }

    function get_premiumBasedon_age_sumInsured_PolicyType(counter) {
        var name_insured_age = $("#name_insured_age_"+counter).val();
        // alert(column_value);
        var name_insured_sum_insured = $("#name_insured_sum_insured_"+counter).val();
        var name_insured_policy_type = $("#name_insured_policy_type_"+counter).val();
        // alert(name_insured_policy_type);// Platinum  Gold  Senior Citizen
        if(name_insured_policy_type == "Platinum"){
            var column_value = getcolumnOnAge(name_insured_age);
        }else if(name_insured_policy_type == "Gold"){
            var column_value = get_Gold_columnOnAge(name_insured_age);
        }else if(name_insured_policy_type == "Sr. Citizen"){
            var column_value = get_Senior_Citizen_columnOnAge(name_insured_age);
        }

        if (name_insured_age != "" && name_insured_sum_insured != "" && name_insured_policy_type != "") {
            var url = "<?php echo base_url(); ?>master/policy/get_premium_from_chart";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        age: name_insured_age,
                        sum_insured: name_insured_sum_insured,
                        column_value: column_value,
                        policy_type: name_insured_policy_type
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            $('#name_insured_premium_'+counter).val("");
                            $('#name_insured_premium_'+counter).val(data["userdata"]);
                            if (data["userdata"] == "") {
                                $("#dm_loading_"+counter).val("");
                                $("#htn_loading_"+counter).val("");
                                $("#premium_after_loading_"+counter).val("");
                                $("#ncd_amount_"+counter).val("");
                                $("#premium_after_ncd_amount_"+counter).val("");

                                $("#dm_loading_"+counter).val(0);
                                $("#htn_loading_"+counter).val(0);
                                $("#premium_after_loading_"+counter).val(0);
                                $("#ncd_amount_"+counter).val(0);
                                $("#premium_after_ncd_amount_"+counter).val(0);
                            }
                            dm_yes_no(counter);
                            htn_yes_no(counter);
                            
                        } else {
                            $('#name_insured_premium_'+counter).val("");
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

    dm_yes_no(counter);
    function dm_yes_no(counter) {

        var dm_yes_no = $("#dm_yes_no_"+counter).val();
        if (dm_yes_no == "Yes") {
            $("#dm_percentage_"+counter).show();
            $("#dm_percentage_"+counter).val("10");
        } else if (dm_yes_no == "No") {
            $("#dm_percentage_"+counter).hide();
            $("#dm_percentage_"+counter).val(0);
        }
        dm_loading_Cal(counter);
    }
    htn_yes_no(counter);
    function htn_yes_no(counter) {
        // alert("hi");
        var htn_yes_no = $("#htn_yes_no_"+counter).val();
        // alert(counter);
        // alert(htn_yes_no);
        if (htn_yes_no == "Yes") {
            $("#htn_percentage_"+counter).show();
            $("#htn_percentage_"+counter).val(10);
        } else if (htn_yes_no == "No") {
            $("#htn_percentage_"+counter).hide();
            $("#htn_percentage_"+counter).val(0);
        }
        htn_loading_Cal(counter);
    }

    function dm_loading_Cal(counter) {
        var dm_percentage = $("#dm_percentage_"+counter).val();
        var name_insured_premium = $("#name_insured_premium_"+counter).val();

        dm_percentage = parseInt(dm_percentage);
        name_insured_premium = parseInt(name_insured_premium);

        if (isNaN(dm_percentage))
            dm_percentage = 0;
        else
            dm_percentage = dm_percentage;

        if (isNaN(name_insured_premium))
            name_insured_premium = 0;
        else
            name_insured_premium = name_insured_premium;
        var dm_loading = Math.round((dm_percentage * name_insured_premium) / 100);
        // alert(dm_loading);
        dm_loading=Math.round(dm_loading);
        $("#dm_loading_"+counter).val(dm_loading);
        premium_after_loading_Cal(counter);
    }

    function htn_loading_Cal(counter) {
        var htn_percentage = $("#htn_percentage_"+counter).val();
        var name_insured_premium = $("#name_insured_premium_"+counter).val();

        htn_percentage = parseInt(htn_percentage);
        name_insured_premium = parseInt(name_insured_premium);

        if (isNaN(htn_percentage))
            htn_percentage = 0;
        else
            htn_percentage = htn_percentage;

        if (isNaN(name_insured_premium))
            name_insured_premium = 0;
        else
            name_insured_premium = name_insured_premium;
        var htn_loading = Math.round((htn_percentage * name_insured_premium) / 100);
        $("#htn_loading_"+counter).val(htn_loading);
        premium_after_loading_Cal(counter);
    }

    function premium_after_loading_Cal(counter) {
        var dm_loading = $("#dm_loading_"+counter).val();
        var htn_loading = $("#htn_loading_"+counter).val();
        var name_insured_premium = $("#name_insured_premium_"+counter).val();

        dm_loading = parseInt(dm_loading);
        htn_loading = parseInt(htn_loading);
        name_insured_premium = parseInt(name_insured_premium);

        if (isNaN(dm_loading))
            dm_loading = 0;
        else
            dm_loading = dm_loading;

        if (isNaN(htn_loading))
            htn_loading = 0;
        else
            htn_loading = htn_loading;

        if (isNaN(name_insured_premium))
            name_insured_premium = 0;
        else
            name_insured_premium = name_insured_premium;

        var premium_after_loading = dm_loading + htn_loading + name_insured_premium;
        $("#premium_after_loading_"+counter).val(premium_after_loading);
        ncd_amount_Cal(counter);
    }

    function ncd_amount_Cal(counter) {
        var ncd_percentage = $("#ncd_percentage_"+counter).val();
        var premium_after_loading = $("#premium_after_loading_"+counter).val();

        ncd_percentage = parseInt(ncd_percentage);
        premium_after_loading = parseInt(premium_after_loading);

        if (isNaN(ncd_percentage))
            ncd_percentage = 0;
        else
            ncd_percentage = ncd_percentage;

        if (isNaN(premium_after_loading))
            premium_after_loading = 0;
        else
            premium_after_loading = premium_after_loading;
        var ncd_amount = Math.round((ncd_percentage * premium_after_loading) / 100);
        $("#ncd_amount_"+counter).val(ncd_amount);
        premium_after_ncd_amount_Cal(counter);

    }

    function premium_after_ncd_amount_Cal(counter) {
        var ncd_amount = $("#ncd_amount_"+counter).val();
        var premium_after_loading = $("#premium_after_loading_"+counter).val();

        ncd_amount = parseInt(ncd_amount);
        premium_after_loading = parseInt(premium_after_loading);

        if (isNaN(ncd_amount))
            ncd_amount = 0;
        else
            ncd_amount = ncd_amount;

        if (isNaN(premium_after_loading))
            premium_after_loading = 0;
        else
            premium_after_loading = premium_after_loading;
        var premium_after_ncd_amount = (premium_after_loading - ncd_amount);
        $("#premium_after_ncd_amount_"+counter).val(premium_after_ncd_amount);
        medi_ncd_amount_Cal(counter);
        medi_total_amount_Cal(counter);
    }

    // var ncd_amount_Total = 0;
    function medi_ncd_amount_Cal_bak(counter) {
        var ncd_amount = $("#ncd_amount_"+counter).val();

        ncd_amount = parseInt(ncd_amount);

        if (isNaN(ncd_amount))
            ncd_amount = 0;
        else
            ncd_amount = ncd_amount;

        $("#medi_total_ncd_amount").text(ncd_amount);
    }

    function medi_ncd_amount_Cal() {
        var inputs = $(".ncd_amount");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var ncd_amount = $(inputs[i]).val();
            ncd_amount = parseInt(ncd_amount);
            if (isNaN(ncd_amount))
            ncd_amount = 0;
            else
            ncd_amount = ncd_amount;

            total = total + ncd_amount;
            $("#medi_total_ncd_amount").text(total);
        }
    }

    function medi_total_amount_Cal() {
        var inputs = $(".premium_after_ncd_amount");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var premium_after_ncd_amount = $(inputs[i]).val();
            premium_after_ncd_amount = parseInt(premium_after_ncd_amount);
            if (isNaN(premium_after_ncd_amount))
            premium_after_ncd_amount = 0;
            else
            premium_after_ncd_amount = premium_after_ncd_amount;

            // alert(premium_after_ncd_amount);

            total = total + premium_after_ncd_amount;
            $("#medi_total_amount").text(total);
        }
        medi_family_disc_tot_Cal();
    }

    function medi_total_amount_Cal_bak(counter) {
        var premium_after_ncd_amount = $("#premium_after_ncd_amount_"+counter).val();

        premium_after_ncd_amount = parseInt(premium_after_ncd_amount);

        if (isNaN(premium_after_ncd_amount))
            premium_after_ncd_amount = 0;
        else
            premium_after_ncd_amount = premium_after_ncd_amount;
        $("#medi_total_amount").text(premium_after_ncd_amount);
        medi_family_disc_tot_Cal();
    }

    function medi_family_disc_tot_Cal() {
        var rowCount = $('#first_table tbody tr').length;
        // alert(rowCount);
        var vals=$("#medi_family_disc_rate").text();
        vals = parseInt(vals);

        if (isNaN(vals))
            vals = "#";
        else
            vals = vals;
        if (rowCount == 1) {
            $("#medi_family_disc_rate").text(0);
        } else if (rowCount == 2){
            if(vals==0 && vals!="#"){
                // alert(vals);
                $("#medi_family_disc_rate").text(5);
            }
        }
        var medi_family_disc_rate = $("#medi_family_disc_rate").text();
        var medi_total_amount = $("#medi_total_amount").text();

        medi_family_disc_rate = parseInt(medi_family_disc_rate);
        medi_total_amount = parseInt(medi_total_amount);

        if (isNaN(medi_family_disc_rate))
            medi_family_disc_rate = 0;
        else
            medi_family_disc_rate = medi_family_disc_rate;

        if (isNaN(medi_total_amount))
            medi_total_amount = 0;
        else
            medi_total_amount = medi_total_amount;

        if (rowCount == 1) {
            var medi_family_disc_tot = Math.round((medi_family_disc_rate * medi_total_amount) / 100);
            $("#medi_family_disc_tot").text(medi_family_disc_tot);
            // $("#medi_family_disc_tot").val(medi_total_amount);
        } else {
            var medi_family_disc_tot = Math.round((medi_family_disc_rate * medi_total_amount) / 100);
            $("#medi_family_disc_tot").text(medi_family_disc_tot);
        }
        medi_premium_after_fd_Cal();
    }

    function medi_premium_after_fd_Cal() {
        var medi_total_amount = $("#medi_total_amount").text();
        var medi_family_disc_tot = $("#medi_family_disc_tot").text();
        medi_total_amount = parseInt(medi_total_amount);
        medi_family_disc_tot = parseInt(medi_family_disc_tot);

        if (isNaN(medi_total_amount))
            medi_total_amount = 0;
        else
            medi_total_amount = medi_total_amount;

        if (isNaN(medi_family_disc_tot))
            medi_family_disc_tot = 0;
        else
            medi_family_disc_tot = medi_family_disc_tot;

        var medi_premium_after_fd = medi_total_amount-medi_family_disc_tot;

        $("#medi_premium_after_fd").text(medi_premium_after_fd);
        gst_apply();
    }

    function gst_apply() {
        var medi_premium_after_fd = $("#medi_premium_after_fd").text();
        var cgst_fire_per = $("#cgst_fire_per").text();
        var sgst_fire_per = $("#sgst_fire_per").text();

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

        medi_premium_after_fd = parseInt(medi_premium_after_fd);
        if (isNaN(medi_premium_after_fd))
            medi_premium_after_fd = 0;
        else
            medi_premium_after_fd = medi_premium_after_fd;

        if (medi_premium_after_fd == "") {
            $("#medi_cgst_tot").text(0);
            $("#medi_sgst_tot").text(0);
            $("#medi_final_premium").text(0);
        }

        var medi_cgst_tot = Math.round((medi_premium_after_fd * cgst_fire_per) / 100);
        var medi_sgst_tot = Math.round((medi_premium_after_fd * sgst_fire_per) / 100);
        $("#medi_cgst_tot").text(medi_cgst_tot);
        $("#medi_sgst_tot").text(medi_sgst_tot);

        var medi_final_premium = parseInt(medi_premium_after_fd) + parseInt(medi_cgst_tot) + parseInt(medi_sgst_tot);
        $("#medi_final_premium").text(medi_final_premium);

    }

</script>