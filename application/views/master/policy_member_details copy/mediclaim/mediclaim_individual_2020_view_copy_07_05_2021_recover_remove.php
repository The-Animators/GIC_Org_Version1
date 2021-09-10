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
                    <th><button class="btn btn-primary btn-sm Add_Mediclaim_2020" id="Add_Mediclaim_2020" onclick="AddMediclaim2020(0)">Add</button></th>
                    <th>Name Of Insured</th>
                    <th>DOB</th>
                    <th>Age</th>
                    <th>Relations</th>
                    <th>Past History</th>
                    <th>Type Of Policy</th>
                    <th>Option </th>
                    <th>Sum Insured</th>
                    <th>Premium</th>
                    <th>NCD (No Claim Discount)</th>
                    <th>Premium After NCD</th>
                    <th>Restore Cover</th>
                    <th>Restore Premium</th>
                    <th>Maternity Cover</th>
                    <th>Maternity Premium</th>
                    <th>Daily Cash Cover</th>
                    <th>Daily Cash Premium</th>
                </tr>
            </thead>
            <tbody id="first_table_tbody">
                <tr>
                <td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_mediclaim2020_0" onClick=removeMediclaim2020(0) disabled></td>
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
                        <?php endforeach; endif; ?>
                    </select></td>
                <td><textarea style="width:120px;" class="form-control past_history" name="past_history[]" id="past_history_0"></textarea></td>
                <td><select style="width:120px;" id="name_insured_policy_type_0" name="name_insured_policy_type[]" class="form-control name_insured_policy_type" onchange="Name_insuredPolicy_type(0)">
                        <option value="Floater 2020(Individual)">Floater 2020(Individual) </option>
                    </select></td>
                <td><select style="width:110px;" id="name_insured_policy_option_0" name="name_insured_policy_option[]" class="form-control name_insured_policy_option" disabled>
                        <option value="Individual" selected>Individual</option>
                        <option value="Floater">Floater</option>
                    </select></td>
                <td width="12%"><select style="width:105px;" id="name_insured_sum_insured_0" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_premiumBasedon_age_sumInsured_PolicyType(0)">
                        <option value="null">Select Sum Insured</option>
                    </select></td>
                <td width="8%"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium_0" value="" class="form-control name_insured_premium"></td>
                <td width="8%"><input style="width:110px;" type="text" name="name_insured_ncd[]" id="name_insured_ncd_0" class="form-control name_insured_ncd" onkeyup="name_insured_ncd_Cal(0)" value=""></td>
                <td width="8%"><input style="width:110px;" type="text" name="name_insured_premium_after_ncd[]" id="name_insured_premium_after_ncd_0" value="" class="form-control name_insured_premium_after_ncd"></td>
                <td><select style="width:110px;" class="form-control restore_cover" name="restore_cover" id="restore_cover_0" onchange="get_Restore_cover_Premium(0)">
                    <option value="Not Required">Not Required</option>
                    <option value="Required">Required</option>
                </select></td>
                <td><input style="width:110px;" type="text" name="restore_cover_premium[]" id="restore_cover_premium_0" class="form-control restore_cover_premium" value=""></td>
                <td><select style="width:110px;" class="form-control maternity_new_born_baby_cover" name="maternity_new_born_baby_cover" id="maternity_new_born_baby_cover_0" onchange="get_Maternity_cover_Premium(0)">
                    <option value="Not Required">Not Required</option>
                    <option value="Required">Required</option>
                </select></td>
                <td><input style="width:110px;" type="text" name="maternity_new_born_baby_cover_premium[]" id="maternity_new_born_baby_cover_premium_0" class="form-control maternity_new_born_baby_cover_premium" value=""></td>
                <td><select style="width:110px;" class="form-control daily_cash_allowance_cover" name="daily_cash_allowance_cover" id="daily_cash_allowance_cover_0" onchange="get_DailyCashAllowenceBB_cover_Premium(0)">
                    <option value="Not Required">Not Required</option>
                    <option value="Required">Required</option>
                </select></td>
                <td><input style="width:110px;" type="text" name="daily_cash_allowance_cover_premium[]" id="daily_cash_allowance_cover_premium_0" class="form-control daily_cash_allowance_cover_premium" value=""></td>
            </tr>
        </tbody>
            <input type="hidden" id="new_load_gross_premium" name="new_load_gross_premium" value="">
        </table>
    </div>
    <div class="col-md-12">
        <table class="table mb-0 table-bordered mt-2 col-md-12">
            <tr id="declaration_sale_fig_tr">
                <td colspn="2"><strong> Total Premium: </strong></td>
                <td colspn="2"><strong></strong></td>
                <td><strong id="medi_ind_2020_total_premium_td"><input type="text" id="medi_ind_2020_total_premium" name="medi_ind_2020_total_premium" class="form-control" disabled></strong></td>
            </tr>
            <tr id="annual_turn_over_tr">
                <td colspn=""><strong> Family discount to be considered in individual policy for more than 2 people: </strong></td>
                <td colspn=""><strong><input type="text" id="medi_ind_2020_family_descount_per" name="medi_ind_2020_family_descount_per" class="form-control" onkeyup="medi_ind_2020_family_descount_per_Cal()" value="0">
                    </strong></td>
                <td><strong id="medi_ind_2020_family_descount_tot_td"><input type="text" id="medi_ind_2020_family_descount_tot" name="medi_ind_2020_family_descount_tot" class="form-control" disabled></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Add Loading: </strong></td>
                <td colspn=""><strong id="medi_ind_2020_load_description_td"><textarea class="form-control" name="medi_ind_2020_load_description" id="medi_ind_2020_load_description"></textarea></strong></td>
                <td><strong id="medi_ind_2020_load_amount_td"><input type="text" id="medi_ind_2020_load_amount" name="medi_ind_2020_load_amount" class="form-control" onkeyup="add_load_amount()"></td>
            </tr>

            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Restore Cover Premium: </strong></td>
                <td colspn=""><strong id=""></strong></td>
                <td><strong id="medi_ind_2020_restore_cover_premium_td"><input type="text" id="medi_ind_2020_restore_cover_premium" name="medi_ind_2020_restore_cover_premium" class="form-control" disabled></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Maternity & New Born Baby Cover PREMIUM: </strong></td>
                <td colspn=""><strong id=""></strong></td>
                <td><strong id="medi_ind_2020_maternity_new_bornbaby_td"><input type="text" id="medi_ind_2020_maternity_new_bornbaby" name="medi_ind_2020_maternity_new_bornbaby" class="form-control" disabled></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Daily Cash Allowance on Hospitalization Cover Premium (consider B chart): </strong></td>
                <td colspn=""><strong id=""></strong></td>
                <td><strong id="medi_ind_2020_daily_cash_allow_hosp_td"><input type="text" id="medi_ind_2020_daily_cash_allow_hosp" name="medi_ind_2020_daily_cash_allow_hosp" class="form-control" disabled></td>
            </tr>

            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Premium After Loading/Gross Premium: </strong></td>
                <td colspn=""><strong id=""></strong></td>
                <td><strong id="medi_ind_2020_load_gross_premium_td"><input type="text" id="medi_ind_2020_load_gross_premium" name="medi_ind_2020_load_gross_premium" class="form-control" disabled></td>
            </tr>
            <tr>
                <td colspn=""><strong> CGST:</strong></td>
                <td><strong id="medi_ind_2020_cgst_rate_td"><input type="text" id="cgst_fire_per" name="medi_ind_2020_cgst_rate" class="form-control" onkeyup="gst_apply()"></td>
                <td><strong id="medi_ind_2020_cgst_tot_td"><input type="text" id="medi_ind_2020_cgst_tot" name="medi_ind_2020_cgst_tot" class="form-control" disabled></td>
            </tr>
            <tr>
                <td><strong> SGST</strong></td>
                <td><strong id="medi_ind_2020_sgst_rate_td"><input type="text" id="sgst_fire_per" name="medi_ind_2020_sgst_rate" class="form-control" onkeyup="gst_apply()" ></td>
                <td><strong id="medi_ind_2020_sgst_tot_td"><input type="text" id="medi_ind_2020_sgst_tot" name="medi_ind_2020_sgst_tot" class="form-control" disabled></td>
            </tr>
            <tr>
                <td colspn="3"><strong class="text-purple">Final Premium</strong></td>
                <td colspn="3"><strong class="text-purple"></strong></td>
                <td><strong id="medi_ind_2020_final_premium_td"><input type="text" id="medi_ind_2020_final_premium" name="medi_ind_2020_final_premium" class="form-control" disabled><input type="hidden" id="medi_ind2020_policy_id" name="medi_ind2020_policy_id" class="form-control"></td>
            </tr>
        </table>
    </div>
</div>

<script>
    var indi2020_dropdown_val = "";

    sum_insured_dropdown();

    function sum_insured_dropdown() {
        var sum_Val = ["1,00,000", "1,50,000", "2,00,000", "2,50,000", "3,00,000", "3,50,000", "4,00,000", "4,50,000", "5,00,000", "6,00,000", "7,00,000", "8,00,000", "9,00,000", "10,00,000", "15,00,000", "20,00,000", "25,00,000"];
        var i = 0;
        for (i; i <= 16; i++) {
            indi2020_dropdown_val += '<option value="' + sum_Val[i] + '">' + sum_Val[i] + '</option>';
        }
        // alert(sum_insured_dropdown_val);
        $(".name_insured_sum_insured").append(indi2020_dropdown_val);
        $(".name_insured_member_name").empty();
        $(".name_insured_member_name").append('<option value="null">Select Member Names</option>'+option_val_data);
        // alert(option_val_data);
    }
    var add_medi_counter2020 = 0;
    var main_Mediclaim2020 = [];
    function removeMediclaim2020(add_medi_counter2020) {
        $("#remove_mediclaim2020_" + add_medi_counter2020).closest("tr").remove();
        var indexValue = main_Mediclaim2020.indexOf(add_medi_counter2020);
            main_Mediclaim2020.splice(indexValue, 1);
            // alert(main_Mediclaim2020);
        if (main_Mediclaim2020.length == 0) {
            add_medi_counter2020=0;
            main_Mediclaim2020 = [];
            $("#Add_Mediclaim_2020").attr("onClick", "AddMediclaim2020(" + add_medi_counter2020 + ")");
        }
        medi2020_ncd_amount_Cal();
    }

    function AddMediclaim2020(add_medi_counter2020) {
        add_medi_counter2020 = add_medi_counter2020 + 1;
        // alert(add_medi_counter2020);

        main_Mediclaim2020.push(add_medi_counter2020);
        $("#Add_Mediclaim_2020").attr("onClick", "AddMediclaim2020(" + add_medi_counter2020 + ")");
        var tr_table = '<tr><td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_mediclaim2020_' + add_medi_counter2020 + '" onClick=removeMediclaim2020(' + add_medi_counter2020 + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_counter2020 + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_counter2020 + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_counter2020 + '" name="name_insured_dob[]" value="" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_counter2020 + '" name="name_insured_age[]" value="" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_counter2020 + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach; endif; ?> </select></td><td><textarea  style="width:120px;" class="form-control past_history" name="past_history[]" id="past_history_' + add_medi_counter2020 + '"></textarea></td> <td><select style="width:120px;" id="name_insured_policy_type_' + add_medi_counter2020 + '" name="name_insured_policy_type[]" class="form-control name_insured_policy_type" onchange="Name_insuredPolicy_type(' + add_medi_counter2020 + ')">  <option value="Floater 2020(Individual)">Floater 2020(Individual) </option> </select></td><td><select style="width:110px;" id="name_insured_policy_option_' + add_medi_counter2020 + '" name="name_insured_policy_option[]" class="form-control name_insured_policy_option"><option value="Individual" selected>Individual</option> <option value="Floater" >Floater</option> </select></td><td width="12%" align="center"><select style="width:105px;" id="name_insured_sum_insured_' + add_medi_counter2020 + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_premiumBasedon_age_sumInsured_PolicyType(' + add_medi_counter2020 + ')"><option value="null">Select Sum Insured</option> ' + indi2020_dropdown_val + '   </select></td><td width="8%"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium_' + add_medi_counter2020 + '" value="" class="form-control name_insured_premium"></td><td width="8%"><input style="width:110px;" type="text" name="name_insured_ncd[]" id="name_insured_ncd_' + add_medi_counter2020 + '" class="form-control name_insured_ncd" onkeyup="name_insured_ncd_Cal(' + add_medi_counter2020 + ')" value=""></td><td width="8%"><input style="width:110px;" type="text" name="name_insured_premium_after_ncd[]" id="name_insured_premium_after_ncd_' + add_medi_counter2020 + '" value="" class="form-control name_insured_premium_after_ncd"></td>                <td><select style="width:110px;" class="form-control restore_cover" name="restore_cover" id="restore_cover_' + add_medi_counter2020 + '" onchange="get_Restore_cover_Premium(' + add_medi_counter2020 + ')"><option value="Not Required">Not Required</option> <option value="Required">Required</option> </select></td> <td><input style="width:110px;" type="text" name="restore_cover_premium[]" id="restore_cover_premium_' + add_medi_counter2020 + '" class="form-control restore_cover_premium" value=""></td> <td><select style="width:110px;" class="form-control maternity_new_born_baby_cover" name="maternity_new_born_baby_cover" id="maternity_new_born_baby_cover_' + add_medi_counter2020 + '" onchange="get_Maternity_cover_Premium(' + add_medi_counter2020 + ')"><option value="Not Required">Not Required</option> <option value="Required">Required</option>  </select></td> <td><input style="width:110px;" type="text" name="maternity_new_born_baby_cover_premium[]" id="maternity_new_born_baby_cover_premium_' + add_medi_counter2020 + '" class="form-control maternity_new_born_baby_cover_premium" value=""></td> <td><select style="width:110px;" class="form-control daily_cash_allowance_cover" name="daily_cash_allowance_cover" id="daily_cash_allowance_cover_' + add_medi_counter2020 + '" onchange="get_DailyCashAllowenceBB_cover_Premium(' + add_medi_counter2020 + ')"><option value="Not Required">Not Required</option> <option value="Required">Required</option>    </select></td> <td><input style="width:110px;" type="text" name="daily_cash_allowance_cover_premium[]" id="daily_cash_allowance_cover_premium_' + add_medi_counter2020 + '" class="form-control daily_cash_allowance_cover_premium" value=""></td></tr>';
        $("#first_table_tbody").append(tr_table);
        var policy_type = $("#name_insured_policy_type_" + add_medi_counter2020).val();
            // alert(policy_type);
            if (policy_type == "Floater 2020(Individual)") {
                document.getElementById("name_insured_policy_option_" + add_medi_counter2020).disabled = true;
            } 
            medi_ind_2020_family_descount_per_Cal();
    }

    var actual_data_Mediclaim_indi2020 = [];

    function Total_Mediclaim_indi2020() {
        actual_data_Mediclaim_indi2020 = [];

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
            var name_insured_sum_insured = $(".name_insured_sum_insured", this).val();
            var name_insured_premium = $(".name_insured_premium", this).val();
            var name_insured_ncd = $(".name_insured_ncd", this).val();
            var name_insured_premium_after_ncd = $(".name_insured_premium_after_ncd", this).val();

            var restore_cover = $(".restore_cover", this).val();
            var restore_cover_premium = $(".restore_cover_premium", this).val();
            var maternity_new_born_baby_cover = $(".maternity_new_born_baby_cover", this).val();
            var maternity_new_born_baby_cover_premium = $(".maternity_new_born_baby_cover_premium", this).val();
            var daily_cash_allowance_cover = $(".daily_cash_allowance_cover", this).val();
            var daily_cash_allowance_cover_premium = $(".daily_cash_allowance_cover_premium", this).val();

            actual_data_Mediclaim_indi2020.push([key, name_insured_member_name, name_insured_member_name_txt, name_insured_dob, name_insured_age, name_insured_relation, name_insured_relation_txt, past_history, name_insured_policy_type, name_insured_policy_option, name_insured_sum_insured, name_insured_premium, name_insured_ncd, name_insured_premium_after_ncd, restore_cover, restore_cover_premium, maternity_new_born_baby_cover, maternity_new_born_baby_cover_premium, daily_cash_allowance_cover, daily_cash_allowance_cover_premium]);
            if (name_insured_member_name == '')
                actual_data_Mediclaim_indi2020.splice(key, 1);
        });
        // console.log(actual_data_Mediclaim_indi2020);
        // alert(actual_data_Mediclaim_indi2020);
        return actual_data_Mediclaim_indi2020;

        // var total_mediclaim_indi2020 = JSON.stringify(Total_Mediclaim_indi2020());
        // alert(total_mediclaim_indi2020);
        // return false;
    }
    // Calculation Section Start

    function dateFormate(value) {
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

    function get_dob(add_medi_counter2020) {
        var rowCount = $('#first_table tbody tr').length;

        if (add_medi_counter2020 == 0) {
            var name_insured_relation = $('#name_insured_relation_' + add_medi_counter2020 + ' option').filter(function() {
                return $(this).html() == "Self";
            }).val();
            $('#name_insured_relation_' + add_medi_counter2020).val(name_insured_relation);
        }
      
        var name_insured_member_name = $("#name_insured_member_name_" + add_medi_counter2020).val();
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
                        $('#name_insured_dob_' + add_medi_counter2020).val("");
                        var dob = data["userdata"].dob;
                        // alert(dob);
                        if (dob == "null") {
                            dob = "";
                            toaster(message_type = "Error", message_txt = "The DOB field is required.", message_icone = "error");
                        } else {
                            dob = dateFormate(dob);
                        }
                        // alert(dob);
                        $('#name_insured_dob_' + add_medi_counter2020).val(dob);
                        get_age(add_medi_counter2020);
                    } else {
                        $('#name_insured_dob_' + add_medi_counter2020).val("");
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

    function get_age(add_medi_counter2020) {
        var name_insured_member_name = $("#name_insured_member_name_" + add_medi_counter2020).val();
        var name_insured_dob = $("#name_insured_dob_" + add_medi_counter2020).val();
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
                        $('#name_insured_age_' + add_medi_counter2020).val("");
                        var age = data["age"];
                        $('#name_insured_age_' + add_medi_counter2020).val(age);
                    } else {
                        $('#name_insured_age_' + add_medi_counter2020).val("");
                    }
                    get_premiumBasedon_age_sumInsured_PolicyType(add_medi_counter2020);
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
        var column_value = "";
        if (age <= 25) {
            column_value = "91_25";
        }else if (age <= 30) {
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

    function get_premiumBasedon_age_sumInsured_PolicyType(add_medi_counter2020) {

        var name_insured_sum_insured = $("#name_insured_sum_insured_"+add_medi_counter2020).val();
        var name_insured_age = $("#name_insured_age_"+add_medi_counter2020).val();
        var column_value = getcolumnOnAge(name_insured_age);

        // alert(column_value);

        if (name_insured_sum_insured != "null" && name_insured_sum_insured != "" && name_insured_age != "" && name_insured_age != "null" && column_value != "") {
            var url = "<?php echo base_url(); ?>master/remote/get_individual_2020_chart";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        age: name_insured_age,
                        column_value: column_value,
                        condition_value: name_insured_sum_insured,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            $('#name_insured_premium_'+add_medi_counter2020).val("");
                            new_premium = parseInt(data["userdata"]);
                            $('#name_insured_premium_'+add_medi_counter2020).val(new_premium);
                            // $("#medi_ind_2020_total_premium").val(new_premium);
                            $("#name_insured_ncd_"+add_medi_counter2020).val(0);
                        } else {
                            $('#name_insured_premium_'+add_medi_counter2020).val("");
                        }
                        // medi_ind_2020_family_descount_per_Cal();
                        name_insured_ncd_Cal(add_medi_counter2020);
                        // get_Restore_cover_Premium(add_medi_counter2020);
                        // get_Maternity_cover_Premium(add_medi_counter2020);
                        // get_DailyCashAllowenceBB_cover_Premium(add_medi_counter2020);
                        medi2020_ncd_amount_Cal();
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

    function medi2020_ncd_amount_Cal() {
        var inputs = $(".name_insured_premium_after_ncd");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var name_insured_premium_after_ncd = $(inputs[i]).val();
            name_insured_premium_after_ncd = parseInt(name_insured_premium_after_ncd);
            if (isNaN(name_insured_premium_after_ncd))
            name_insured_premium_after_ncd = 0;
            else
            name_insured_premium_after_ncd = name_insured_premium_after_ncd;

            total = total + name_insured_premium_after_ncd;
            $("#medi_ind_2020_total_premium").val(total);
        }
        medi_ind_2020_family_descount_per_Cal();
        add_load_amount();
        add_cover_amount();
    }

    function name_insured_ncd_Cal(add_medi_counter2020) {
        var name_insured_ncd = $("#name_insured_ncd_"+add_medi_counter2020).val();
        var name_insured_premium = $("#name_insured_premium_"+add_medi_counter2020).val();
        name_insured_ncd = parseInt(name_insured_ncd);
        name_insured_premium = parseInt(name_insured_premium);
        var name_insured_premium_after_ncd = 0;

        if (isNaN(name_insured_ncd))
            name_insured_ncd = 0;
        else
            name_insured_ncd = name_insured_ncd;

        if (isNaN(name_insured_premium))
            name_insured_premium = 0;
        else
            name_insured_premium = name_insured_premium;
        var name_insured_ncd_percentage = Math.round((name_insured_premium * name_insured_ncd) / 100);

        name_insured_premium_after_ncd = parseInt(name_insured_premium) + parseInt(name_insured_ncd_percentage);
        $("#name_insured_premium_after_ncd_"+add_medi_counter2020).val(name_insured_premium_after_ncd);
        // $("#medi_ind_2020_total_premium").val(name_insured_premium_after_ncd);
        medi2020_ncd_amount_Cal();
 
    }

    function medi_ind_2020_family_descount_per_Cal(){
        
        var rowCount = $('#first_table tbody tr').length;

        var vals=$("#medi_ind_2020_family_descount_per").val();
        vals = parseInt(vals);
        // alert(vals);
        if (isNaN(vals))
            vals = "#";
        else
            vals = vals;
        if (rowCount ==1) {
            // alert(rowCount+"1");
            $("#medi_ind_2020_family_descount_per").val(0);
        } else if (rowCount == 2){
            if(vals==0 && vals!="#"){
                // alert(rowCount+"2");
                // alert(vals);
                $("#medi_ind_2020_family_descount_per").val(5);
            }
        }
        var medi_ind_2020_family_descount_per = $("#medi_ind_2020_family_descount_per").val();
        var medi_ind_2020_total_premium = $("#medi_ind_2020_total_premium").val();
        medi_ind_2020_family_descount_per = parseInt(medi_ind_2020_family_descount_per);

        if (isNaN(medi_ind_2020_family_descount_per))
            medi_ind_2020_family_descount_per = 0;
        else
            medi_ind_2020_family_descount_per = medi_ind_2020_family_descount_per;
        
        medi_ind_2020_total_premium = parseInt(medi_ind_2020_total_premium);

        if (isNaN(medi_ind_2020_total_premium))
            medi_ind_2020_total_premium = 0;
        else
            medi_ind_2020_total_premium = medi_ind_2020_total_premium;

        var medi_ind_2020_family_descount_tot = Math.round((medi_ind_2020_family_descount_per * medi_ind_2020_total_premium) / 100);
        $("#medi_ind_2020_family_descount_tot").val(medi_ind_2020_family_descount_tot);

        var medi_ind_2020_total_premium = $("#medi_ind_2020_total_premium").val();
        if (isNaN(medi_ind_2020_total_premium))
        medi_ind_2020_total_premium = 0;
        else
        medi_ind_2020_total_premium = medi_ind_2020_total_premium;

        var medi_ind_2020_load_gross_premium = (parseInt(medi_ind_2020_total_premium) - parseInt(medi_ind_2020_family_descount_tot));
        // alert(medi_ind_2020_load_gross_premium);
        $("#medi_ind_2020_load_gross_premium").val(medi_ind_2020_load_gross_premium);
        $("#new_load_gross_premium").val(medi_ind_2020_load_gross_premium);
        add_load_amount();
    }

    function add_load_amount() {
        var medi_ind_2020_load_gross_premium = $("#new_load_gross_premium").val();
        var medi_ind_2020_load_amount = $("#medi_ind_2020_load_amount").val();
        // var medi_ind_2020_family_descount_tot = $("#medi_ind_2020_family_descount_tot").val();
        var medi_ind_2020_restore_cover_premium = $("#medi_ind_2020_restore_cover_premium").val();
        var medi_ind_2020_maternity_new_bornbaby = $("#medi_ind_2020_maternity_new_bornbaby").val();
        var medi_ind_2020_daily_cash_allow_hosp = $("#medi_ind_2020_daily_cash_allow_hosp").val();
        medi_ind_2020_restore_cover_premium = parseInt(medi_ind_2020_restore_cover_premium);
        medi_ind_2020_maternity_new_bornbaby = parseInt(medi_ind_2020_maternity_new_bornbaby);
        medi_ind_2020_daily_cash_allow_hosp = parseInt(medi_ind_2020_daily_cash_allow_hosp);
 

        if (isNaN(medi_ind_2020_restore_cover_premium))
            medi_ind_2020_restore_cover_premium = 0;
        else
            medi_ind_2020_restore_cover_premium = medi_ind_2020_restore_cover_premium;

        if (isNaN(medi_ind_2020_maternity_new_bornbaby))
            medi_ind_2020_maternity_new_bornbaby = 0;
        else
            medi_ind_2020_maternity_new_bornbaby = medi_ind_2020_maternity_new_bornbaby;
        if (isNaN(medi_ind_2020_daily_cash_allow_hosp))
            medi_ind_2020_daily_cash_allow_hosp = 0;
        else
            medi_ind_2020_daily_cash_allow_hosp = medi_ind_2020_daily_cash_allow_hosp;

        medi_ind_2020_load_gross_premium = parseInt(medi_ind_2020_load_gross_premium);

        if (isNaN(medi_ind_2020_load_gross_premium))
            medi_ind_2020_load_gross_premium = 0;
        else
            medi_ind_2020_load_gross_premium = medi_ind_2020_load_gross_premium;

        medi_ind_2020_family_descount_tot = parseInt(medi_ind_2020_family_descount_tot);

        if (isNaN(medi_ind_2020_family_descount_tot))
            medi_ind_2020_family_descount_tot = 0;
        else
            medi_ind_2020_family_descount_tot = medi_ind_2020_family_descount_tot;

        medi_ind_2020_load_amount = parseInt(medi_ind_2020_load_amount);

        if (isNaN(medi_ind_2020_load_amount))
            medi_ind_2020_load_amount = 0;
        else
            medi_ind_2020_load_amount = medi_ind_2020_load_amount;

        var new_medi_ind_2020_load_gross_premium = 0;
        // add_cover_amount();
        new_medi_ind_2020_load_gross_premium = parseInt(medi_ind_2020_load_gross_premium) + medi_ind_2020_load_amount+medi_ind_2020_restore_cover_premium+medi_ind_2020_maternity_new_bornbaby+medi_ind_2020_daily_cash_allow_hosp;
        //    alert(medi_ind_2020_load_gross_premium);
        //    alert(medi_ind_2020_restore_cover_premium);
        //    alert(medi_ind_2020_child_total_premium);
        //    alert(medi_ind_2020_load_amount);
        //    alert(medi_ind_2020_load_gross_premium);
        // alert(new_medi_ind_2020_load_gross_premium);
        $("#medi_ind_2020_load_gross_premium").val(0);
        $("#medi_ind_2020_load_gross_premium").val(new_medi_ind_2020_load_gross_premium);
        add_cover_amount();
        gst_apply();
        
    }

    function getRestore_covercolumnOnAge(age) {
        // alert(size_txt);
        var column_value = "";

        if (age <= 40) {
            column_value = "<40";
        } else if (age <= 50) {
            column_value = "41_50";
        } else if (age <= 60) {
            column_value = "51_60";
        } else if (age > 60) {
            column_value = ">60";
        }
        return column_value;
    }

    function get_Restore_cover_Premium(add_medi_counter2020) {
        var name_insured_age = $("#name_insured_age_"+add_medi_counter2020).val();
        // var max_age = $("#max_age").val();
        var restore_cover = $("#restore_cover_"+add_medi_counter2020).val();
        var column_value = getRestore_covercolumnOnAge(name_insured_age);

        if (restore_cover != "null" && restore_cover != "" && name_insured_age != "" && column_value != "") {
            var url = "<?php echo base_url(); ?>master/remote/get_restore_cover_premium_individual_2020";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        restore_cover: restore_cover,
                        column_value: column_value,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            if (data["userdata"] != "")
                                var medi_ind_2020_restore_cover_premium = data["userdata"];
                            else
                                var medi_ind_2020_restore_cover_premium = 0;
                            $("#restore_cover_premium_"+add_medi_counter2020).val("");
                            $("#restore_cover_premium_"+add_medi_counter2020).val(medi_ind_2020_restore_cover_premium);

                        } else {
                            $("#restore_cover_premium_"+add_medi_counter2020).val(0);
                        }
                        medi_ind_2020_family_descount_per_Cal();
                        medi_ind_2020_restore_cover_premium_Cal();
                        add_cover_amount();
                    },
                    error: function(xhr, status) {
                        alert('Sorry, there was a problem!');
                    },
                    complete: function(xhr, status) {}
                });
            }
        }
    }

    function get_Maternity_cover_Premium(add_medi_counter2020) {
        var name_insured_sum_insured = $("#name_insured_sum_insured_"+add_medi_counter2020).val();
        var maternity_new_born_baby_cover = $("#maternity_new_born_baby_cover_"+add_medi_counter2020).val();

        if (name_insured_sum_insured == "1,00,000")
            var sum_insured_new = "100000";
        else if (name_insured_sum_insured == "1,50,000")
            var sum_insured_new = "150000";
        else if (name_insured_sum_insured == "2,00,000")
            var sum_insured_new = "200000";
        else if (name_insured_sum_insured == "2,50,000")
            var sum_insured_new = "250000";
        else if (name_insured_sum_insured == "3,00,000")
            var sum_insured_new = "300000";
        else if (name_insured_sum_insured == "3,50,000")
            var sum_insured_new = "350000";
        else if (name_insured_sum_insured == "4,00,000")
            var sum_insured_new = "400000";
        else if (name_insured_sum_insured == "4,50,000")
            var sum_insured_new = "450000";
        else if (name_insured_sum_insured == "5,00,000")
            var sum_insured_new = "500000";
        else if (name_insured_sum_insured == "6,00,000")
            var sum_insured_new = "600000";
        else if (name_insured_sum_insured == "7,00,000")
            var sum_insured_new = "700000";
        else if (name_insured_sum_insured == "8,00,000")
            var sum_insured_new = "800000";
        else if (name_insured_sum_insured == "9,00,000")
            var sum_insured_new = "900000";
        else if (name_insured_sum_insured == "10,00,000")
            var sum_insured_new = "1000000";
        else if (name_insured_sum_insured == "15,00,000")
            var sum_insured_new = "1500000";
        else if (name_insured_sum_insured == "20,00,000")
            var sum_insured_new = "2000000";
        else if (name_insured_sum_insured == "25,00,000")
            var sum_insured_new = "2500000";

        if (name_insured_sum_insured != "null" && name_insured_sum_insured != "" && maternity_new_born_baby_cover != "null" && maternity_new_born_baby_cover != "") {
            var url = "<?php echo base_url(); ?>master/remote/get_maternity_cover_premium_floater_2020";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        maternity_new_born_baby_cover: maternity_new_born_baby_cover,
                        condition_value: name_insured_sum_insured,
                        condition_value_2: sum_insured_new,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            if (data["userdata"] != "")
                                var medi_ind_2020_maternity_new_bornbaby = data["userdata"];
                            else
                                var medi_ind_2020_maternity_new_bornbaby = 0;
                            $("#maternity_new_born_baby_cover_premium_"+add_medi_counter2020).val("");
                            $("#maternity_new_born_baby_cover_premium_"+add_medi_counter2020).val(medi_ind_2020_maternity_new_bornbaby);

                        } else {
                            $("#maternity_new_born_baby_cover_premium_"+add_medi_counter2020).val(0);
                        }
                        medi_ind_2020_family_descount_per_Cal();
                        medi_ind_2020_maternity_new_bornbaby_Cal();
                        add_cover_amount();
                    },
                    error: function(xhr, status) {
                        alert('Sorry, there was a problem!');
                    },
                    complete: function(xhr, status) {}
                });
            }
        }
    }

    function getDailyCashAllowenceBB_covercolumnOnAge(age) {
        // alert(size_txt);
        var condition_value = "";
        if (age <= 50) {
            condition_value = "<50";
        } else if (age <= 60) {
            condition_value = "51_60";
        } else if (age > 60) {
            condition_value = ">60";
        }
        return condition_value;
    }

    function get_DailyCashAllowenceBB_cover_Premium(add_medi_counter2020) {
        var name_insured_age = $("#name_insured_age_"+add_medi_counter2020).val();
        var condition_value = getDailyCashAllowenceBB_covercolumnOnAge(name_insured_age);
        var name_insured_sum_insured = $("#name_insured_sum_insured_"+add_medi_counter2020).val();
        var daily_cash_allowance_cover = $("#daily_cash_allowance_cover_"+add_medi_counter2020).val();

        if (name_insured_sum_insured == "1,00,000")
            var sum_insured_new = "100000";
        else if (name_insured_sum_insured == "1,50,000")
            var sum_insured_new = "150000";
        else if (name_insured_sum_insured == "2,00,000")
            var sum_insured_new = "200000";
        else if (name_insured_sum_insured == "2,50,000")
            var sum_insured_new = "250000";
        else if (name_insured_sum_insured == "3,00,000")
            var sum_insured_new = "300000";
        else if (name_insured_sum_insured == "3,50,000")
            var sum_insured_new = "350000";
        else if (name_insured_sum_insured == "4,00,000")
            var sum_insured_new = "400000";
        else if (name_insured_sum_insured == "4,50,000")
            var sum_insured_new = "450000";
        else if (name_insured_sum_insured == "5,00,000")
            var sum_insured_new = "500000";
        else if (name_insured_sum_insured == "6,00,000")
            var sum_insured_new = "600000";
        else if (name_insured_sum_insured == "7,00,000")
            var sum_insured_new = "700000";
        else if (name_insured_sum_insured == "8,00,000")
            var sum_insured_new = "800000";
        else if (name_insured_sum_insured == "9,00,000")
            var sum_insured_new = "900000";
        else if (name_insured_sum_insured == "10,00,000")
            var sum_insured_new = "1000000";
        else if (name_insured_sum_insured == "15,00,000")
            var sum_insured_new = "1500000";
        else if (name_insured_sum_insured == "20,00,000")
            var sum_insured_new = "2000000";
        else if (name_insured_sum_insured == "25,00,000")
            var sum_insured_new = "2500000";


        sum_insured_new = parseInt(sum_insured_new);
        if (isNaN(sum_insured_new))
            sum_insured_new = 0;
        else
            sum_insured_new = sum_insured_new;

        if (sum_insured_new <= 500000)
            var column_value = "<500000";
        else if (sum_insured_new > 500000 && sum_insured_new <= 1500000)
            var column_value = "5>sum_insured<15";
        else if (sum_insured_new > 1500000)
            var column_value = ">1500000";

        // alert(sum_insured_new);
        // alert(column_value);

        if (daily_cash_allowance_cover != "null" && daily_cash_allowance_cover != "" && column_value != "undefined" && column_value != "" && name_insured_age != "" && condition_value != "") {
            var url = "<?php echo base_url(); ?>master/remote/get_dailycashallowencebb_cover_premium_individual_2020";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        daily_cash_allowance_cover: daily_cash_allowance_cover,
                        column_value: column_value,
                        condition_value: condition_value,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            if (data["userdata"] != "")
                                var medi_ind_2020_daily_cash_allow_hosp = data["userdata"];
                            else
                                var medi_ind_2020_daily_cash_allow_hosp = 0;
                            $("#daily_cash_allowance_cover_premium_"+add_medi_counter2020).val("");
                            $("#daily_cash_allowance_cover_premium_"+add_medi_counter2020).val(medi_ind_2020_daily_cash_allow_hosp);

                        } else {
                            $("#daily_cash_allowance_cover_premium_"+add_medi_counter2020).val(0);
                        }
                        medi_ind_2020_family_descount_per_Cal();
                        medi_ind_2020_daily_cash_allow_hosp_Cal();
                        add_cover_amount();
                    },
                    error: function(xhr, status) {
                        alert('Sorry, there was a problem!');
                    },
                    complete: function(xhr, status) {}
                });
            }
        }
    }

    function medi_ind_2020_restore_cover_premium_Cal() {
        var inputs = $(".restore_cover_premium");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var restore_cover_premium = $(inputs[i]).val();
            restore_cover_premium = parseInt(restore_cover_premium);
        if (isNaN(restore_cover_premium))
            restore_cover_premium = 0;
        else
            restore_cover_premium = restore_cover_premium;

            total = total + restore_cover_premium;
            $("#medi_ind_2020_restore_cover_premium").val(total);
        }
        medi_ind_2020_family_descount_per_Cal();
        add_load_amount();
        add_cover_amount();
    }

    function medi_ind_2020_maternity_new_bornbaby_Cal() {
        var inputs = $(".maternity_new_born_baby_cover_premium");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var maternity_new_born_baby_cover_premium = $(inputs[i]).val();
            maternity_new_born_baby_cover_premium = parseInt(maternity_new_born_baby_cover_premium);
            if (isNaN(maternity_new_born_baby_cover_premium))
            maternity_new_born_baby_cover_premium = 0;
            else
            maternity_new_born_baby_cover_premium = maternity_new_born_baby_cover_premium;

            total = total + maternity_new_born_baby_cover_premium;
            $("#medi_ind_2020_maternity_new_bornbaby").val(total);
        }
        medi_ind_2020_family_descount_per_Cal();
        add_load_amount();
        add_cover_amount();
    }

    function medi_ind_2020_daily_cash_allow_hosp_Cal() {
        var inputs = $(".daily_cash_allowance_cover_premium");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var daily_cash_allowance_cover_premium = $(inputs[i]).val();
            daily_cash_allowance_cover_premium = parseInt(daily_cash_allowance_cover_premium);
            if (isNaN(daily_cash_allowance_cover_premium))
            daily_cash_allowance_cover_premium = 0;
            else
            daily_cash_allowance_cover_premium = daily_cash_allowance_cover_premium;

            total = total + daily_cash_allowance_cover_premium;
            $("#medi_ind_2020_daily_cash_allow_hosp").val(total);
        }
        medi_ind_2020_family_descount_per_Cal();
        add_load_amount();
        add_cover_amount();
    }

    function add_cover_amount() {
        var medi_ind_2020_load_gross_premium = $("#medi_ind_2020_load_gross_premium").val();
        // var medi_ind_2020_child_total_premium = $("#medi_ind_2020_child_total_premium").val();
        var medi_ind_2020_load_amount = $("#medi_ind_2020_load_amount").val();
        var medi_ind_2020_restore_cover_premium = $("#medi_ind_2020_restore_cover_premium").val();
        var medi_ind_2020_maternity_new_bornbaby = $("#medi_ind_2020_maternity_new_bornbaby").val();
        var medi_ind_2020_daily_cash_allow_hosp = $("#medi_ind_2020_daily_cash_allow_hosp").val();

        medi_ind_2020_load_gross_premium = parseInt(medi_ind_2020_load_gross_premium);
        // medi_ind_2020_child_total_premium = parseInt(medi_ind_2020_child_total_premium);
        medi_ind_2020_load_amount = parseInt(medi_ind_2020_load_amount);
        medi_ind_2020_restore_cover_premium = parseInt(medi_ind_2020_restore_cover_premium);
        medi_ind_2020_maternity_new_bornbaby = parseInt(medi_ind_2020_maternity_new_bornbaby);
        medi_ind_2020_daily_cash_allow_hosp = parseInt(medi_ind_2020_daily_cash_allow_hosp);

        if (isNaN(medi_ind_2020_load_gross_premium))
        medi_ind_2020_load_gross_premium = 0;
        else
        medi_ind_2020_load_gross_premium = medi_ind_2020_load_gross_premium;

        // if (isNaN(medi_ind_2020_child_total_premium))
        //     medi_ind_2020_child_total_premium = 0;
        // else
        //     medi_ind_2020_child_total_premium = medi_ind_2020_child_total_premium;

        if (isNaN(medi_ind_2020_load_amount))
            medi_ind_2020_load_amount = 0;
        else
            medi_ind_2020_load_amount = medi_ind_2020_load_amount;

        if (isNaN(medi_ind_2020_restore_cover_premium))
            medi_ind_2020_restore_cover_premium = 0;
        else
            medi_ind_2020_restore_cover_premium = medi_ind_2020_restore_cover_premium;

        if (isNaN(medi_ind_2020_maternity_new_bornbaby))
            medi_ind_2020_maternity_new_bornbaby = 0;
        else
            medi_ind_2020_maternity_new_bornbaby = medi_ind_2020_maternity_new_bornbaby;

        if (isNaN(medi_ind_2020_daily_cash_allow_hosp))
            medi_ind_2020_daily_cash_allow_hosp = 0;
        else
            medi_ind_2020_daily_cash_allow_hosp = medi_ind_2020_daily_cash_allow_hosp;

        var new_medi_ind_2020_load_gross_premium = 0;

        new_medi_ind_2020_load_gross_premium = medi_ind_2020_load_gross_premium + medi_ind_2020_load_amount + medi_ind_2020_restore_cover_premium + medi_ind_2020_maternity_new_bornbaby + medi_ind_2020_daily_cash_allow_hosp;
        // alert(medi_ind_2020_restore_cover_premium);
        // alert(new_medi_ind_2020_load_gross_premium);
        $("#medi_ind_2020_load_gross_premium").val(medi_ind_2020_load_gross_premium);
        gst_apply();
    }

    function gst_apply() {
        var medi_ind_2020_load_gross_premium = $("#medi_ind_2020_load_gross_premium").val();
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

        medi_ind_2020_load_gross_premium = parseInt(medi_ind_2020_load_gross_premium);
        if (isNaN(medi_ind_2020_load_gross_premium))
            medi_ind_2020_load_gross_premium = 0;
        else
            medi_ind_2020_load_gross_premium = medi_ind_2020_load_gross_premium;

        if (medi_ind_2020_load_gross_premium == "") {
            $("#medi_ind_2020_cgst_tot").val(0);
            $("#medi_ind_2020_sgst_tot").val(0);
            $("#medi_ind_2020_final_premium").val(0);
        }

        var medi_ind_2020_cgst_tot = Math.round((medi_ind_2020_load_gross_premium * cgst_fire_per) / 100);
        var medi_ind_2020_sgst_tot = Math.round((medi_ind_2020_load_gross_premium * sgst_fire_per) / 100);
        $("#medi_ind_2020_cgst_tot").val(medi_ind_2020_cgst_tot);
        $("#medi_ind_2020_sgst_tot").val(medi_ind_2020_sgst_tot);

        var medi_ind_2020_final_premium = parseInt(medi_ind_2020_load_gross_premium) + parseInt(medi_ind_2020_cgst_tot) + parseInt(medi_ind_2020_sgst_tot);
        $("#medi_ind_2020_final_premium").val(medi_ind_2020_final_premium);

    }

    // Calculation Section End
</script>