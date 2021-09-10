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
                    <!-- <th colspan="2"></th> -->
                    <th>Name Of Insured</th>
                    <th>DOB</th>
                    <th>Age</th>
                    <th>Relations</th>
                    <th>Type Of Policy</th>
                    <th>Option </th>
                    <th>Sum Insured</th>
                    <th>Premium</th>
                    <th>DM %</th>
                    <th>DM Loading</th>
                    <th>HTN %</th>
                    <th>HTN Loading</th>
                    <th>Premium After Loading</th>
                    <th>NCD %</th>
                    <th>NCD Amount</th>
                    <th>Premium After NCD</th>
                </tr>
            </thead>
            <tbody id="first_table_tbody">
                <tr>
                    <td width="12%"><select style="width:280px;" id="name_insured_member_name" name="name_insured_member_name" class="form-control name_insured_member_name" onchange="get_dob()">
                            <option value="null">Select Member Names</option>
                        </select></td>
                    <td><input style="width:100px;" type="text" id="name_insured_dob" name="name_insured_dob" value="" class="form-control"></td>

                    <td><input style="width:55px;" type="text" id="name_insured_age" name="name_insured_age" value="" class="form-control"></td>

                    <td><select style="width:120px;" id="name_insured_relation" name="name_insured_relation" class="form-control name_insured_relation">
                            <option value="null">Select Relation</option>
                            <?php $relationship = relationship_dropdown();
                            if (!empty($relationship)) : foreach ($relationship as $relation) : ?>
                                    <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option>
                            <?php endforeach;
                            endif; ?>
                        </select></td>

                    <td><select style="width:120px;" id="name_insured_policy_type" name="name_insured_policy_type" class="form-control name_insured_policy_type" onchange="remove_sumInsured_basedon_policyType()">
                            <option value="null">Select Policy Type</option>
                            <option value="Platinum">Platinum</option>
                            <option value="Gold">Gold</option>
                            <option value="Senior Citizen">Senior Citizen</option>
                        </select></td>

                    <td><select style="width:110px;" id="name_insured_policy_option" name="name_insured_policy_option" class="form-control name_insured_policy_option">
                            <!-- <option value="null">Select Policy Option</option> -->
                            <option value="Individual">Individual</option>
                            <option value="Floater">Floater</option>
                        </select></td>
                    <td width="12%"><select style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured" class="form-control name_insured_sum_insured" onchange="premium_basedon_Type()">
                            <option value="null">Select Sum Insured</option>
                        </select></td>
                    <td width="8%"><input style="width:110px;" type="text" name="name_insured_premium" id="name_insured_premium" value="" class="form-control"></td>
                    <td width="8%">
                        <div class="row">
                            <div class="col-md-12"><select style="width:90px;" id="dm_yes_no" name="dm_yes_no" class="form-control dm_yes_no" onchange="dm_yes_no()">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select></div>
                            <div class="col-md-12 mt-1"><input style="width:90px;" type="text" name="dm_percentage" id="dm_percentage" value="10" class="form-control" onkeyup="dm_loading_Cal()"></div>
                        </div>
                    </td>
                    <td width="8%"><input style="width:110px;" type="text" name="dm_loading" id="dm_loading" value="" class="form-control"></td>
                    <td width="8%">
                        <div class="row">
                            <div class="col-md-12"><select style="width:90px;" id="htn_yes_no" name="htn_yes_no" class="form-control htn_yes_no" onchange="htn_yes_no()">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select></div>
                            <div class="col-md-12 mt-1"><input style="width:90px;" type="text" name="htn_percentage" id="htn_percentage" value="10" class="form-control" onkeyup="htn_loading_Cal()"></div>
                        </div>
                    </td>
                    <td><input style="width:110px;" type="text" name="htn_loading" id="htn_loading" value="" class="form-control"></td>
                    <td><input style="width:110px;" type="text" name="premium_after_loading" id="premium_after_loading" value="" class="form-control"></td>
                    <td width="9%">
                        <select style="width:90px;" id="ncd_percentage" name="ncd_percentage" class="form-control ncd_percentage" onchange="ncd_amount_Cal()">
                            <option value="5">5%</option>
                            <option value="10">10%</option>
                            <option value="15">15%</option>
                            <option value="20">20%</option>
                            <option value="25">25%</option>
                        </select>
                        <!-- <input type="text" name="ncd_percentage" id="ncd_percentage" value="" class="form-control"> -->
                    </td>
                    <td><input style="width:110px;" type="text" name="ncd_amount" id="ncd_amount" value="" class="form-control"></td>
                    <td><input style="width:110px;" type="text" name="premium_after_ncd_amount" id="premium_after_ncd_amount" value="" class="form-control"></td>
                </tr>

            </tbody>
        </table>
    </div>
    <div class="col-md-12">
        <table class="table mb-0 table-bordered mt-2 col-md-12">
            <tr id="declaration_sale_fig_tr">
                <td colspn="2"><strong> Total: </strong></td>
                <td colspn=""><strong></strong></td>
                <td colspn=""><strong><input type="text" id="medi_total_ncd_amount" name="medi_total_ncd_amount" class="form-control"></strong></td>
                <td><strong id="medi_total_amount_td"><input type="text" id="medi_total_amount" name="medi_total_amount" class="form-control"></strong></td>
            </tr>
            <tr id="annual_turn_over_tr">
                <td colspn=""><strong> Family Discount: </strong></td>

                <td colspn=""><strong><input type="text" id="medi_family_disc_rate" name="medi_family_disc_rate" class="form-control"></strong></td>
                <td colspn=""><strong></strong></td>
                <td><strong id="medi_family_disc_tot_td"><input type="text" id="medi_family_disc_tot" name="medi_family_disc_tot" class="form-control"></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Pemium After FD: </strong></td>
                <td colspn=""><strong></strong></td>
                <td colspn=""><strong></strong></td>
                <td><strong id="medi_premium_after_fd_td"><input type="text" id="medi_premium_after_fd" name="medi_premium_after_fd" class="form-control"></td>
            </tr>
            <tr>
                <td colspn=""><strong> CGST:</strong></td>
                <td><strong id="medi_cgst_rate_td"><input type="text" id="cgst_fire_per" name="medi_cgst_rate" class="form-control"></td>
                <td><strong id=""></strong></td>
                <td><strong id="medi_cgst_tot_td"><input type="text" id="medi_cgst_tot" name="medi_cgst_tot" class="form-control"></td>
            </tr>
            <tr>
                <td><strong> SGST</strong></td>
                <td><strong id="medi_sgst_rate_td"><input type="text" id="sgst_fire_per" name="medi_sgst_rate" class="form-control"></td>
                <td><strong id=""></strong></td>
                <td><strong id="medi_sgst_tot_td"><input type="text" id="medi_sgst_tot" name="medi_sgst_tot" class="form-control"></td>
            </tr>
            <tr>
                <td colspn="3"><strong class="text-purple">Final Premium</strong></td>
                <td colspn="2"><strong></strong></td>
                <td colspn="2"><strong></strong></td>
                <td><strong id="medi_final_premium_td"><input type="text" id="medi_final_premium" name="medi_final_premium" class="form-control"></td>
            </tr>
        </table>
    </div>
</div>

<script>
    var sum_insured_dropdown_val = "";
    sum_insured_dropdown();

    function sum_insured_dropdown() {
        var sum_Val = ["100000", "125000", "150000", "175000", "200000", "225000", "250000", "275000", "300000", "325000", "350000", "375000", "400000", "425000", "450000", "475000", "500000", "525000", "550000", "575000", "600000", "625000", "650000", "675000", "700000", "725000", "750000", "775000", "800000", "1000000", "1500000", "2000000"];
        var i = 0;
        for (i; i <= 31; i++) {
            sum_insured_dropdown_val += '<option value="' + sum_Val[i] + '">' + sum_Val[i] + '</option>';
        }
        // alert(sum_insured_dropdown_val);
        $("#name_insured_sum_insured").append(sum_insured_dropdown_val);
    }

    function get_dob() {
        var rowCount = $('#first_table tbody tr').length;
        if(rowCount==1){
            // var name_insured_relation = $('#name_insured_relation').find('option[text="Self"]').val();
            var name_insured_relation =  $('#name_insured_relation option').filter(function () { return $(this).html() == "Self"; }).val();
            $('#name_insured_relation').val(name_insured_relation);
            // alert(name_insured_relation);
        }

        var name_insured_member_name = $("#name_insured_member_name").val();
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
                        $('#name_insured_dob').val("");
                        var dob = data["userdata"].dob;
                        $('#name_insured_dob').val(dob);
                        get_age();
                    } else {
                        $('#name_insured_dob').val("");
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

    function get_age() {
        var name_insured_member_name = $("#name_insured_member_name").val();
        var name_insured_dob = $("#name_insured_dob").val();
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
                        $('#name_insured_age').val("");
                        var age = data["age"];
                        $('#name_insured_age').val(age);
                        remove_policyType_basedonAge();
                    } else {
                        $('#name_insured_age').val("");
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

    function remove_policyType_basedonAge() {
        var name_insured_age = $("#name_insured_age").val();
        if (name_insured_age > 36 || name_insured_age > 61) {
            // alert("36");
            if (name_insured_age > 36) {
                $("#name_insured_policy_type option[value='Platinum']").remove();
            } else {
                $("#name_insured_policy_type option[value='Platinum']").remove();
                $("#name_insured_policy_type").append('<option value="Platinum">Platinum</option>');
            }
            if (name_insured_age > 61) {
                $("#name_insured_policy_type option[value='Gold']").remove();
            } else {
                $("#name_insured_policy_type option[value='Gold']").remove();
                $("#name_insured_policy_type").append('<option value="Gold">Gold</option>');
            }
        } else {
            $("#name_insured_policy_type").empty();
            $("#name_insured_policy_type").append('<option value="null">Select Policy Type</option><option value="Platinum">Platinum</option><option value="Gold">Gold</option><option value="Senior Citizen">Senior Citizen</option>');
        }
        var name_insured_policy_type = $("#name_insured_policy_type").val();
        if(name_insured_policy_type=="null"){
            $("#name_insured_sum_insured").empty();
            $("#name_insured_premium").val("");
        }
        remove_sumInsured_basedon_policyType();
    }

    function remove_sumInsured_basedon_policyType() {
        var name_insured_policy_type = $("#name_insured_policy_type").val();
        // alert(name_insured_policy_type);
        if (name_insured_policy_type == "Gold" || name_insured_policy_type == "Senior Citizen") {
            $("#name_insured_sum_insured option[value='1500000']").remove();
            $("#name_insured_sum_insured option[value='2000000']").remove();
        } else {
            // alert(sum_insured_dropdown_val);
            // $("#name_insured_sum_insured").append('<option value="1500000">1500000</option>');
            // $("#name_insured_sum_insured").append('<option value="2000000">2000000</option>');
            $("#name_insured_sum_insured").empty();
            $("#name_insured_sum_insured").append(sum_insured_dropdown_val);
        }
        get_premiumBasedon_age_sumInsured_PolicyType();
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

    function premium_basedon_Type() {
        get_premiumBasedon_age_sumInsured_PolicyType();
        var name_insured_premium = $("#name_insured_premium").val();
        if (name_insured_premium == "") {
            $("#dm_loading").val("");
            $("#htn_loading").val("");
            $("#premium_after_loading").val("");
            $("#ncd_amount").val("");
            $("#premium_after_ncd_amount").val("");

            $("#dm_loading").val(0);
            $("#htn_loading").val(0);
            $("#premium_after_loading").val(0);
            $("#ncd_amount").val(0);
            $("#premium_after_ncd_amount").val(0);
        }
    }

    function get_premiumBasedon_age_sumInsured_PolicyType() {
        var name_insured_age = $("#name_insured_age").val();
        var column_value = getcolumnOnAge(name_insured_age);
        // alert(column_value);
        var name_insured_sum_insured = $("#name_insured_sum_insured").val();
        var name_insured_policy_type = $("#name_insured_policy_type").val();
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
                            $('#name_insured_premium').val("");
                            $('#name_insured_premium').val(data["userdata"]);
                            if (data["userdata"] == "") {
                                $("#dm_loading").val("");
                                $("#htn_loading").val("");
                                $("#premium_after_loading").val("");
                                $("#ncd_amount").val("");
                                $("#premium_after_ncd_amount").val("");

                                $("#dm_loading").val(0);
                                $("#htn_loading").val(0);
                                $("#premium_after_loading").val(0);
                                $("#ncd_amount").val(0);
                                $("#premium_after_ncd_amount").val(0);
                            }
                            dm_yes_no();
                            htn_yes_no();
                        } else {
                            $('#name_insured_premium').val("");
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

    function dateFormate(value) {
        var date = value.split("-");
        var d = parseInt(date[0], 10),
            m = parseInt(date[1], 10),
            y = parseInt(date[2], 10);
        return new Date(y, m - 1, d).toLocaleDateString('en-CA');
        var tdate = '01-30-2001';
        tdate = dateFormate(tdate);
        // tdate = [tdate.slice(-4), tdate.slice(0, 5)].join('-');
        alert(tdate);
    }

    // dm_yes_no();
    function dm_yes_no() {

        var dm_yes_no = $("#dm_yes_no").val();
        if (dm_yes_no == "Yes") {
            $("#dm_percentage").show();
            $("#dm_percentage").val("10");
        } else if (dm_yes_no == "No") {
            $("#dm_percentage").hide();
            $("#dm_percentage").val(0);
        }
        dm_loading_Cal();
    }
    // htn_yes_no();
    function htn_yes_no() {
        // alert("hi");
        var htn_yes_no = $("#htn_yes_no").val();
        if (htn_yes_no == "Yes") {
            $("#htn_percentage").show();
            $("#htn_percentage").val(10);
        } else if (htn_yes_no == "No") {
            $("#htn_percentage").hide();
            $("#htn_percentage").val(0);
        }
        htn_loading_Cal();
    }

    function dm_loading_Cal() {
        var dm_percentage = $("#dm_percentage").val();
        var name_insured_premium = $("#name_insured_premium").val();

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
        var dm_loading = (dm_percentage * name_insured_premium) / 100;
        $("#dm_loading").val(dm_loading);
        premium_after_loading_Cal();
    }

    function htn_loading_Cal() {
        var htn_percentage = $("#htn_percentage").val();
        var name_insured_premium = $("#name_insured_premium").val();

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
        var htn_loading = (htn_percentage * name_insured_premium) / 100;
        $("#htn_loading").val(htn_loading);
        premium_after_loading_Cal();
    }

    function premium_after_loading_Cal() {
        var dm_loading = $("#dm_loading").val();
        var htn_loading = $("#htn_loading").val();
        var name_insured_premium = $("#name_insured_premium").val();

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
        $("#premium_after_loading").val(premium_after_loading);
        ncd_amount_Cal();
    }

    function ncd_amount_Cal() {
        var ncd_percentage = $("#ncd_percentage").val();
        var premium_after_loading = $("#premium_after_loading").val();

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
        var ncd_amount = (ncd_percentage * premium_after_loading) / 100;
        $("#ncd_amount").val(ncd_amount);
        premium_after_ncd_amount_Cal();

    }

    function premium_after_ncd_amount_Cal() {
        var ncd_amount = $("#ncd_amount").val();
        var premium_after_loading = $("#premium_after_loading").val();

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
        $("#premium_after_ncd_amount").val(premium_after_ncd_amount);
        medi_ncd_amount_Cal();
        medi_total_amount_Cal();
    }

    function medi_ncd_amount_Cal() {
        var ncd_amount = $("#ncd_amount").val();

        ncd_amount = parseInt(ncd_amount);

        if (isNaN(ncd_amount))
            ncd_amount = 0;
        else
            ncd_amount = ncd_amount;
        $("#medi_total_ncd_amount").val(ncd_amount);
    }

    function medi_total_amount_Cal() {
        var premium_after_ncd_amount = $("#premium_after_ncd_amount").val();

        premium_after_ncd_amount = parseInt(premium_after_ncd_amount);

        if (isNaN(premium_after_ncd_amount))
            premium_after_ncd_amount = 0;
        else
            premium_after_ncd_amount = premium_after_ncd_amount;
        $("#medi_total_amount").val(premium_after_ncd_amount);
        medi_family_disc_tot_Cal();
    }

    function medi_family_disc_tot_Cal() {
        var rowCount = $('#first_table tbody tr').length;
        // alert(rowCount);
        if (rowCount == 1) {
            $("#medi_family_disc_rate").val(0);
        } else {
            $("#medi_family_disc_rate").val(5);
        }
        var medi_family_disc_rate = $("#medi_family_disc_rate").val();
        var medi_total_amount = $("#medi_total_amount").val();

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
            $("#medi_family_disc_tot").val(medi_total_amount);
        } else {
            var medi_family_disc_tot = (medi_family_disc_rate * medi_total_amount) / 100;
            $("#medi_family_disc_tot").val(medi_family_disc_tot);
        }
        medi_premium_after_fd_Cal();
    }

    function medi_premium_after_fd_Cal() {
        var medi_family_disc_tot = $("#medi_family_disc_tot").val();
        medi_family_disc_tot = parseInt(medi_family_disc_tot);

        if (isNaN(medi_family_disc_tot))
            medi_family_disc_tot = 0;
        else
            medi_family_disc_tot = medi_family_disc_tot;

        $("#medi_premium_after_fd").val(medi_family_disc_tot);
        gst_apply();
    }

    function gst_apply() {
        var medi_premium_after_fd = $("#medi_premium_after_fd").val();
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

        medi_premium_after_fd = parseInt(medi_premium_after_fd);
        if (isNaN(medi_premium_after_fd))
            medi_premium_after_fd = 0;
        else
            medi_premium_after_fd = medi_premium_after_fd;

        if (medi_premium_after_fd == "") {
            $("#medi_cgst_tot").val(0);
            $("#medi_sgst_tot").val(0);
            $("#medi_final_premium").val(0);
        }

        var medi_cgst_tot = (medi_premium_after_fd * cgst_fire_per) / 100;
        var medi_sgst_tot = (medi_premium_after_fd * sgst_fire_per) / 100;
        $("#medi_cgst_tot").val(medi_cgst_tot);
        $("#medi_sgst_tot").val(medi_sgst_tot);

        var medi_final_premium = parseInt(medi_premium_after_fd) + parseInt(medi_cgst_tot) + parseInt(medi_sgst_tot);
        $("#medi_final_premium").val(medi_final_premium);

    }
</script>