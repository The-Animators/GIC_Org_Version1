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
    <div class="col-md-6">
        <div class="form-group row">
            <label for="risk_code" class="col-form-label col-md-4  text-right">Years of Premium : </label>
            <div class="col-md-8">
                <select class="form-control years_of_premium" name="years_of_premium" id="years_of_premium" onchange="Region_change()">
                    <!-- <option value="null">Select Years of Premium</option> -->
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label for="hazard_grade" class="col-form-label col-md-4  text-right">Region : </label>
            <div class="col-md-8">
                <select class="form-control region" name="region" id="region"  onchange="Region_change()">
                    <!-- <option value="null">Select Region</option> -->
                    <option value="National Capital Region and Mumbai Metropolitan Region">National Capital Region and Mumbai Metropolitan Region</option>
                    <option value="Rest of India">Rest of India</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="first_table">
            <thead>
                <tr>
                    <th>Name Of Insured</th>
                    <th>DOB</th>
                    <th>Age</th>
                    <th>Past History</th>
                    <th>Relations</th>
                    <th>Nominee Name</th>
                    <th>Nominee Relations</th>
                    <th>Sum Insured</th>
                    <th>NCB</th>
                    <th>Protector Rider</th>
                    <th>Hospital Daily Cash(Per Day)</th>
                    <th>IPA Rider Si</th>
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
            <tr id="annual_turn_over_tr">
                <td colspn=""><strong> Premium For Additional Child: </strong></td>
                <td colspn=""><strong>
                <div class="row">
                    <div class="col-md-6"><input type="text" id="hdfc_ergo_health_insu_child_count" name="hdfc_ergo_health_insu_child_count" class="form-control" disabled></div>
                    <div class="col-md-6"><input type="text" id="hdfc_ergo_health_insu_child_count_first_premium" name="hdfc_ergo_health_insu_child_count_first_premium" class="form-control" disabled></div>
                </div></strong></td>
                <td><strong id="hdfc_ergo_health_insu_child_total_premium_td"><input type="text" id="hdfc_ergo_health_insu_child_total_premium" name="hdfc_ergo_health_insu_child_total_premium" class="form-control" disabled></td>
            </tr>
            <tr id="">
                <td colspn="2"><strong>Protector Rider Premium: </strong></td>
                <td colspn=""><strong></strong></td>
                <td><strong id="medi_total_amount_td"><input type="text" id="protect_ride_prem_tot" name="protect_ride_prem_tot" class="form-control protect_ride_prem_tot" disabled></strong></td>
            </tr>
            <tr id="">
                <td colspn=""><strong> Hospital Daily Cash Premium: </strong></td>
                <td colspn=""><strong></strong></td>
                <td><strong id="hospital_daily_cash_prem_tot_td"><input type="text" id="hospital_daily_cash_prem_tot" name="hospital_daily_cash_prem_tot" class="form-control" disabled></td>
            </tr>
            <tr id="">
                <td colspn=""><strong>IPA Rider Premium:</strong></td>
                <td colspn=""><strong></strong></td>
                <td><strong id="ipa_rider_prem_tot_td"><input type="text" id="ipa_rider_prem_tot" name="ipa_rider_prem_tot" class="form-control ipa_rider_prem_tot" disabled></td>
            </tr>
            <tr id="">
                <td colspn="3"><strong> Long Term Premuim Discount: </strong></td>
                <td colspn=""><strong id="less_disc_per_td"><input type="text" id="less_disc_per" name="less_disc_per" class="form-control less_disc_per" onkeyup="medi_less_disc_tot_Cal()"  value="0"></strong></td>
                <td><strong id="less_disc_tot_td"><input type="text" id="less_disc_tot" name="less_disc_tot" class="form-control less_disc_tot" disabled></strong></td>
            </tr>
            <tr id="">
                <td colspn=""><strong>Stay Active Benefit:</strong></td>
                <td colspn=""><strong><input type="text" id="stay_active_benefit" name="stay_active_benefit" class="form-control stay_active_benefit" onkeyup="Tot_stay_active_benefit_premium()"></strong></td>
                <td><strong id="ipa_rider_prem_tot_td"><input type="text" id="stay_active_benefit_prem_tot" name="stay_active_benefit_prem_tot" class="form-control stay_active_benefit_prem_tot" disabled></td>
            </tr>
            <tr id="">
                <td colspn="3"><strong> Loading: </strong></td>
                <td colspn=""><strong><textarea rows="3" id="load_desc" name="load_desc"  class="load_desc form-control"></textarea></strong></td>
                <td><strong id="load_tot_td"><input type="text" id="load_tot" name="load_tot" class="form-control load_tot" onkeyup="Tot_gross_premium()"></td>
            </tr>
            <!-- <tr id="">
                <td colspn="3"><strong> Family Discount in Individual Policy only if 2 or more person covered: </strong></td>
                <td colspn=""><strong><input type="text" id="family_disc_per" name="family_disc_per" class="form-control family_disc_per"  onkeyup="medi_family_disc_tot_Cal()"></strong></td>
                <td><strong id="family_disc_tot_td"><input type="text" id="family_disc_tot" name="family_disc_tot" class="form-control family_disc_tot" ></td>
            </tr> -->
            <tr id="">
                <td colspn="3"><strong> Gross Premium: </strong></td>
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
                <td><strong id="medi_final_premium_td"><input type="text" id="medi_final_premium" name="medi_final_premium" class="form-control" disabled><input type="hidden" id="medi_hdfc_ergo_health_insu_float_policy_id" name="medi_hdfc_ergo_health_insu_float_policy_id" class="form-control"><input type="hidden"  name="max_age"  id="max_age" value=""></td>
            </tr>
        </table>
    </div>
</div>

<script>
    var sum_insured_dropdown_val = "";
    var add_medi_hdfc_counter = 0;
    var main_Mediclaim_HDFC = [];

    function Region_change(){
        var region = $("#region").val();
        var years_of_premium = $("#years_of_premium").val();
        var flag = false;
        if (region == 'null' || region =="" || years_of_premium == "null" || years_of_premium == ""){
            flag =false;
        } else {
            flag =true;
        }
        // alert(flag);
        // if(flag==true)
        get_basic_premium();
    }

    function removeMediclaimHDFC(add_medi_hdfc_counter) {
        $("#remove_mediclaim_HDFC_" + add_medi_hdfc_counter).closest("tr").remove();
        var indexValue = main_Mediclaim_HDFC.indexOf(add_medi_hdfc_counter);
        main_Mediclaim_HDFC.splice(indexValue, 1);
        // alert(main_Mediclaim_HDFC);
        if (main_Mediclaim_HDFC.length == 0) {
            add_medi_hdfc_counter = 0;
            main_Mediclaim_HDFC = [];
            $("#Add_Mediclaim_HDFC").attr("onClick", "AddMediclaimHDFC(" + add_medi_hdfc_counter + ")");
        }
        Tot_protect_ride_prem_tot();
        Tot_hospital_daily_cash_prem_tot();
        Tot_ipa_rider_prem_tot();
        Tot_premium();
        Tot_gross_premium();
        medi_family_disc_tot_Cal();
        // alert(main_Mediclaim_HDFC);
    }

    function family_Size_Val(family_size_new) {
        // alert(family_size_new);
        var hdfc_ergo_health_insu_individual_policy_type = $("#hdfc_ergo_health_insu_individual_policy_type").val();
        if(hdfc_ergo_health_insu_individual_policy_type=="null" || hdfc_ergo_health_insu_individual_policy_type == "")
            toaster(message_type = "Error", message_txt = "The Floater Policy Type field is required.", message_icone = "error");

        if(family_size_new != "" && family_size_new !="null" && family_size_new !=undefined)
            var family_size = family_size_new;
        else
            var family_size = $("#hdfc_ergo_health_insu_family_size").val();

        if (family_size == "1A + 1C")
            var Family_size_count = 2;
        else if (family_size == "1A + 2C")
            var Family_size_count = 3;
        else if (family_size == "1A + 3C")
            var Family_size_count = 4;
        else if (family_size == "1A + 4C")
            var Family_size_count = 5;
        else if (family_size == "1A + 5C")
            var Family_size_count = 6;
        else if (family_size == "2A + 0C")
            var Family_size_count = 2;
        else if (family_size == "2A + 1C")
            var Family_size_count = 3;
        else if (family_size == "2A + 2C")
            var Family_size_count = 4;
        else if (family_size == "2A + 3C")
            var Family_size_count = 5;
        else if (family_size == "2A + 4C")
            var Family_size_count = 6;
            AddMediclaimHDFC(Family_size_count);
    }

    function AddMediclaimHDFC(Family_size_count) {
        var policy_holder_name = $("#policy_holder_name").val();
        // main_Mediclaim_HDFC.push(add_medi_hdfc_counter);
        var tr_table = "";
        $("#first_table_tbody").empty();
        for (var add_medi_hdfc_counter = 0; add_medi_hdfc_counter < Family_size_count; add_medi_hdfc_counter++) {
            tr_table += '<tr><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_hdfc_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_hdfc_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_hdfc_counter + '" name="name_insured_dob[]" value="" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_hdfc_counter + '" name="name_insured_age[]" value="" class="form-control name_insured_age"></td><td><textarea style="width:100px;" rows="3" name="past_history[]"  id="past_history_' + add_medi_hdfc_counter + '" class="form-control past_history"></textarea></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_hdfc_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;      endif; ?> </select></td>';

            if(add_medi_hdfc_counter == 0){
                tr_table+=' <td width="12%" rowspan="'+Family_size_count+'"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td rowspan="'+Family_size_count+'"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td width="12%" rowspan="'+Family_size_count+'"><select style="width:105px;" id="name_insured_sum_insured" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium()"><option value="null">Select Sum Insured</option> ' + sum_insured_dropdown_val + '   </select></td><td rowspan="'+Family_size_count+'"> <input style="width:100px;" type="text" name="ncb_per[]" id="ncb_per"  class="form-control ncb_per" value=""><input style="width:100px;" type="text" name="ncb_tot_sum_insured[]" id="ncb_tot_sum_insured"  class="form-control mt-1 ncb_tot_sum_insured" value=""></td><td rowspan="'+Family_size_count+'"><select style="width:110px;" id="protector_rider_type" name="protector_rider_type[]" class="form-control protector_rider_type"  onchange="Tot_protector_rider_type_premium()"><option value="Not Opted">Not Opted</option> <option value="Opted">Opted</option> </select><input type="text" name="protector_rider_prem[]" id="protector_rider_prem" class="form-control mt-1 protector_rider_prem" value=""></td><td rowspan="'+Family_size_count+'"><select style="width:110px;" name="hospital_daily_cash_per_day[]" id="hospital_daily_cash_per_day" class="form-control hospital_daily_cash_per_day" onchange="get_hospital_daily_cash_prem()"><option value="null">Select Hospital Daily Cash</option><option value="1000">1000</option><option value="2000">2000</option><option value="3000">3000</option></select><input type="text" name="hospital_daily_cash_prem[]" id="hospital_daily_cash_prem" class="form-control mt-1 hospital_daily_cash_prem" value=""></td><td width="8%" rowspan="'+Family_size_count+'"><input style="width:110px;" type="text" name="ipa_rider_sum_insured[]" id="ipa_rider_sum_insured" value="" class="form-control ipa_rider_sum_insured" onkeyup="Tot_ipa_rider_premium()"><input type="text" name="ipa_rider_prem[]" id="ipa_rider_prem" class="form-control mt-1 ipa_rider_prem" value=""></td><td width="8%" rowspan="'+Family_size_count+'"> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium" value="" class="form-control basic_premium" ></td> </tr>';
            }
        }
        $("#first_table_tbody").append(tr_table);
        for (var add_medi_hdfc_counter = 0; add_medi_hdfc_counter < Family_size_count; add_medi_hdfc_counter++) {
            if(add_medi_hdfc_counter == 0){
                $("#name_insured_member_name_" + add_medi_hdfc_counter).val(policy_holder_name);
                get_dob(add_medi_hdfc_counter);
            }
        }
        medi_family_disc_tot_Cal();
        // alert(main_Mediclaim_HDFC);
    }
    sum_insured_dropdown();

    function sum_insured_dropdown() {
        var sum_Val = ["3,00,000", "5,00,000", "10,00,000", "15,00,000", "20,00,000", "25,00,000", "50,00,000"];
        var i = 0;
        for (i; i <= 6; i++) {
            sum_insured_dropdown_val += '<option value="' + sum_Val[i] + '">' + sum_Val[i] + '</option>';
        }
        $(".name_insured_sum_insured").append(sum_insured_dropdown_val);

        $(".name_insured_member_name").empty();
        $(".name_insured_member_name").append('<option value="null">Select Member Names</option>' + option_val_data);
        $(".nominee_name").empty();
        $(".nominee_name").append('<option value="null">Select Nominee Name</option>' + option_val_data);
    }
    var actual_data_MediclaimHDFC = [];

    function Total_MediclaimHDFC_float() {
        actual_data_MediclaimHDFC = [];

        $("#first_table tr:has(.name_insured_member_name)").each(function(key, val) {
            var name_insured_member_name = $(".name_insured_member_name", this).val();
            var name_insured_member_name_txt = $(".name_insured_member_name option:selected", this).text();
            var name_insured_dob = $(".name_insured_dob", this).val();
            var name_insured_age = $(".name_insured_age", this).val();
            var past_history = $(".past_history", this).val();
            var name_insured_relation = $(".name_insured_relation", this).val();
            var name_insured_relation_txt = $(".name_insured_relation option:selected", this).text();
            var nominee_name = $(".nominee_name", this).val();
            var nominee_name_txt = $(".nominee_name option:selected", this).text();
            var nominee_relation = $(".nominee_relation", this).val();
            var nominee_relation_txt = $(".nominee_relation option:selected", this).text();
            var name_insured_sum_insured = $(".name_insured_sum_insured", this).val();
            var ncb_per = $(".ncb_per", this).val();
            var protector_rider_type = $(".protector_rider_type", this).val();
            var protector_rider_prem = $(".protector_rider_prem", this).val();
            var hospital_daily_cash_per_day = $(".hospital_daily_cash_per_day", this).val();
            var hospital_daily_cash_prem = $(".hospital_daily_cash_prem", this).val();
            var ipa_rider_sum_insured = $(".ipa_rider_sum_insured", this).val();
            var ipa_rider_prem = $(".ipa_rider_prem", this).val();
            var basic_premium = $(".basic_premium", this).val();
            var ncb_tot_sum_insured = $(".ncb_tot_sum_insured", this).val();

            actual_data_MediclaimHDFC.push([key, name_insured_member_name, name_insured_member_name_txt, name_insured_dob, name_insured_age, past_history, name_insured_relation, name_insured_relation_txt, nominee_name, nominee_name_txt, nominee_relation, nominee_relation_txt, name_insured_sum_insured, ncb_per, protector_rider_type, protector_rider_prem, hospital_daily_cash_per_day, hospital_daily_cash_prem, ipa_rider_sum_insured, ipa_rider_prem, basic_premium, ncb_tot_sum_insured]);
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
        if (age <= 17) {
            column_value = "91days_17";
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

    function Tot_protector_rider_type_premium(){
        var name_insured_sum_insured = $("#name_insured_sum_insured").val();
        var protector_rider_type = $("#protector_rider_type").val();
        var basic_premium = $("#basic_premium").val();
        name_insured_sum_insured = sum_insured_int_Converter(name_insured_sum_insured);
        var protector_rider_prem = 0;
        if(protector_rider_type=="Opted"){
            name_insured_sum_insured = parseInt(name_insured_sum_insured);
            basic_premium = parseInt(basic_premium);

            if (isNaN(name_insured_sum_insured))
                name_insured_sum_insured = 0;
            else
                name_insured_sum_insured = name_insured_sum_insured;

            if (isNaN(basic_premium))
                basic_premium = 0;
            else
                basic_premium = basic_premium;

            if(name_insured_sum_insured<=500000)
                var protector_rider_per = 10;
            else if(name_insured_sum_insured > 500000)
                var protector_rider_per = 7.5;
         
            protector_rider_prem = Math.round((basic_premium * protector_rider_per) / 100);
           
            if (isNaN(protector_rider_prem))
                protector_rider_prem = 0;
            else
                protector_rider_prem = protector_rider_prem;
        }
        $("#protector_rider_prem").val(protector_rider_prem);
        Tot_protect_ride_prem_tot();
    }

    function Tot_protect_ride_prem_tot(){
        var inputs = $(".protector_rider_prem");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var protector_rider_prem = $(inputs[i]).val();
            protector_rider_prem = parseInt(protector_rider_prem);
            if (isNaN(protector_rider_prem))
                protector_rider_prem = 0;
            else
                protector_rider_prem = protector_rider_prem;

            total = total + protector_rider_prem;
            if (isNaN(total))
                total = 0;
            else
                total = total;
            $("#protect_ride_prem_tot").val(total);
        }
        Tot_gross_premium();
    }

    function get_hospital_daily_cash(hdfc_ergo_health_insu_family_size){
        var column_value = "";
        if (hdfc_ergo_health_insu_family_size == "1A + 1C") {
            column_value = "1A_1C";
        }else if (hdfc_ergo_health_insu_family_size == "1A + 2C") {
            column_value = "1A_2C";
        } else if (hdfc_ergo_health_insu_family_size == "1A + 3C") {
            column_value = "1A_3C";
        } else if (hdfc_ergo_health_insu_family_size == "1A + 4C") {
            column_value = "";
        } else if (hdfc_ergo_health_insu_family_size == "1A + 5C") {
            column_value = "";
        } else if (hdfc_ergo_health_insu_family_size == "2A + 0C") {
            column_value = "2A_0C";
        } else if (hdfc_ergo_health_insu_family_size == "2A + 1C") {
            column_value = "2A_1C";
        } else if (hdfc_ergo_health_insu_family_size == "2A + 2C") {
            column_value = "2A_2C";
        } else if (hdfc_ergo_health_insu_family_size == "2A + 3C") {
            column_value = "2A_3C";
        } else if (hdfc_ergo_health_insu_family_size == "2A + 4C") {
            column_value = "";
        }
        return column_value;
    }

    function get_hospital_daily_cash_prem() {
        var max_age = $("#max_age").val();
        var condition_value = getcolumnOnAge(max_age);
        var hospital_daily_cash_per_day = $("#hospital_daily_cash_per_day").val();
        var hdfc_ergo_health_insu_family_size = $("#hdfc_ergo_health_insu_family_size").val();
        hdfc_ergo_health_insu_family_size = get_hospital_daily_cash(hdfc_ergo_health_insu_family_size);
        
        if (max_age != "" && hospital_daily_cash_per_day != ""  && hospital_daily_cash_per_day != "null" && condition_value != "" && hdfc_ergo_health_insu_family_size != "") {
            var url = "<?php echo base_url(); ?>master/remote/get_float_hospital_daily_cash_prem";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        age: max_age,
                        sum_insured: hospital_daily_cash_per_day,
                        condition_value: condition_value,
                        column_value: hdfc_ergo_health_insu_family_size,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            if(data["userdata"]=="")
                                $('#hospital_daily_cash_prem').val("");

                            $('#hospital_daily_cash_prem').val("");
                            $('#hospital_daily_cash_prem').val(data["userdata"]);

                        } else {
                            $('#hospital_daily_cash_prem').val("");
                        }
                        Tot_hospital_daily_cash_prem_tot();
                        get_premium_Of_Child();
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

    function Tot_hospital_daily_cash_prem_tot(){
        var inputs = $(".hospital_daily_cash_prem");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var hospital_daily_cash_prem = $(inputs[i]).val();
            hospital_daily_cash_prem = parseInt(hospital_daily_cash_prem);
            if (isNaN(hospital_daily_cash_prem))
                hospital_daily_cash_prem = 0;
            else
                hospital_daily_cash_prem = hospital_daily_cash_prem;

            total = total + hospital_daily_cash_prem;
            if (isNaN(total))
                total = 0;
            else
                total = total;
            $("#hospital_daily_cash_prem_tot").val(total);
        }
        Tot_gross_premium();
    }

    function Tot_ipa_rider_premium(){
        var ipa_rider_sum_insured = $("#ipa_rider_sum_insured").val();
        ipa_rider_sum_insured = parseInt(ipa_rider_sum_insured);

        if (isNaN(ipa_rider_sum_insured))
            ipa_rider_sum_insured = 0;
        else
            ipa_rider_sum_insured = ipa_rider_sum_insured;
        // alert(ipa_rider_sum_insured);
        var ipa_rider_prem = 0;
        
        ipa_rider_prem = (ipa_rider_sum_insured * (0.99)) / 1000;
        ipa_rider_prem=Math.round(ipa_rider_prem);
        if (isNaN(ipa_rider_prem))
            ipa_rider_prem = 0;
        else
            ipa_rider_prem = ipa_rider_prem;
        // alert(ipa_rider_prem);

        $("#ipa_rider_prem").val(ipa_rider_prem);
        Tot_ipa_rider_prem_tot();
    }

    function Tot_ipa_rider_prem_tot(){
        var inputs = $(".ipa_rider_prem");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var ipa_rider_prem = $(inputs[i]).val();
            ipa_rider_prem = parseInt(ipa_rider_prem);
            if (isNaN(ipa_rider_prem))
                ipa_rider_prem = 0;
            else
                ipa_rider_prem = ipa_rider_prem;

            total = total + ipa_rider_prem;
            if (isNaN(total))
                total = 0;
            else
                total = total;
            $("#ipa_rider_prem_tot").val(total);
        }  
        Tot_gross_premium();
    }

    function get_basic_premium() {
        $('#basic_premium').val("");
        $("#tot_premium").val("");
        Tot_stay_active_benefit_premium();
        get_premium_Of_Child();
        // Tot_protector_rider_type_premium();

        var years_of_premium = $("#years_of_premium").val();
        var region = $("#region").val();
        var hdfc_ergo_health_insu_family_size = $("#hdfc_ergo_health_insu_family_size").val();
        var max_age = $("#max_age").val();
        var name_insured_sum_insured = $("#name_insured_sum_insured").val();
        name_insured_sum_insured = sum_insured_int_Converter(name_insured_sum_insured);

        var condition_value = [];
        max_age = parseInt(max_age);
        count=1;
        for(var i=0;i<years_of_premium;i++){
            if(i==0)
                max_age = max_age;
            else
                max_age = max_age+count;
            // alert(name_insured_age);
            // alert(i);
            condition_value[i] = getcolumnOnAge(max_age);
        }
        // var condition_value = getcolumnOnAge(max_age);
        // alert(max_age);
        // alert(condition_value);
        
        if (region != "" && max_age != "" && name_insured_sum_insured != "" && condition_value != "") {
            var url = "<?php echo base_url(); ?>master/remote/get_float_hdfc_ergo_health_insurance_basic_premium";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        region: region,
                        age: max_age,
                        hdfc_ergo_health_insu_family_size : hdfc_ergo_health_insu_family_size,
                        condition_value: condition_value,
                        column_value: name_insured_sum_insured,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            $("#tot_premium").val("");
                            if(data["userdata"]=="")
                                $('#basic_premium').val("");

                            $('#basic_premium').val("");
                            $('#basic_premium').val(data["userdata"]);
                            $("#tot_premium").val(data["userdata"]);

                        } else {
                            $('#basic_premium').val("");
                            $("#tot_premium").val("");
                        }
                        Tot_stay_active_benefit_premium(add_medi_hdfc_counter);
                        get_premium_Of_Child();
                        Tot_protector_rider_type_premium();
                        medi_less_disc_tot_Cal();
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
 
    function get_premium_Of_Child() {
        var max_age = $("#max_age").val();
        var addition_of_more_child = $("#hdfc_ergo_health_insu_addition_of_more_child").val();
        var hospital_daily_cash_per_day = $("#hospital_daily_cash_per_day").val();
        var basic_premium = $("#basic_premium").val();
        addition_of_more_child = parseInt(addition_of_more_child);
        if (isNaN(addition_of_more_child))
            addition_of_more_child = 0;
        else
            addition_of_more_child = addition_of_more_child;
        // alert(max_age);
        // alert(addition_of_more_child);
        // alert(hospital_daily_cash_per_day);
        if (max_age != "" && hospital_daily_cash_per_day != "null" && hospital_daily_cash_per_day != "") {
            var url = "<?php echo base_url(); ?>master/remote/get_float_hdfc_ergo_health_insurance_chart_for_child";
            // alert(url);
            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        max_age: max_age,
                        column_value: hospital_daily_cash_per_day,
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            var child_tot_premium = 0;
                            if (data["userdata"] != "" && data["userdata"] != "null")
                                child_tot_premium = (parseInt(addition_of_more_child) * parseInt(data["userdata"]));

                                if(addition_of_more_child != ""){
                                    var new_premium = parseInt(child_tot_premium);
                                    // var new_premium = parseInt(basic_premium) + parseInt(child_tot_premium);
                                }else
                                    var new_premium = 0;
                            
                            // alert(tot_premium+"normal");
                            $("#hdfc_ergo_health_insu_child_count").val("");
                            $('#hdfc_ergo_health_insu_child_count_first_premium').val("");
                            $('hdfc_ergo_health_insu_child_total_premium').val("");
                            if (addition_of_more_child != ""){
                                $("#hdfc_ergo_health_insu_child_count").val(addition_of_more_child);
                                $('#hdfc_ergo_health_insu_child_count_first_premium').val(data["userdata"]);
                            }
                            $('#hdfc_ergo_health_insu_child_total_premium').val(new_premium);
                            
                        } else {
                            $("#hdfc_ergo_health_insu_child_count").val("");
                            $('#hdfc_ergo_health_insu_child_count_first_premium').val("");
                            $('#hdfc_ergo_health_insu_child_total_premium').val("");
                        }
                        // add_load_amount();
                        Tot_gross_premium();
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

    function Tot_stay_active_benefit_premium(){
        var gross_premium_tot_new = $("#gross_premium_tot_new").val();
        var stay_active_benefit = $("#stay_active_benefit").val();
        gross_premium_tot_new = parseInt(gross_premium_tot_new);
        stay_active_benefit = parseInt(stay_active_benefit);

        if (isNaN(gross_premium_tot_new))
            gross_premium_tot_new = 0;
        else
            gross_premium_tot_new = gross_premium_tot_new;

        if (isNaN(stay_active_benefit))
            stay_active_benefit = 0;
        else
            stay_active_benefit = stay_active_benefit;
        var stay_active_benefit_prem = 0;
        
        stay_active_benefit_prem = Math.round((gross_premium_tot_new * stay_active_benefit) / 100);

        if (isNaN(stay_active_benefit_prem))
            stay_active_benefit_prem = 0;
        else
            stay_active_benefit_prem = stay_active_benefit_prem;
        
        $("#stay_active_benefit_prem_tot").val(stay_active_benefit_prem);
        medi_less_disc_tot_Cal();
    }

    function Tot_last_gross_prem_total(){
        var gross_premium_tot_new = $("#gross_premium_tot_new").val();
        var stay_active_benefit_prem = $("#stay_active_benefit_prem_tot").val();
        var less_disc_tot = $("#less_disc_tot").val();
        gross_premium_tot_new = parseInt(gross_premium_tot_new);
        stay_active_benefit_prem = parseInt(stay_active_benefit_prem);
        less_disc_tot = parseInt(less_disc_tot);

        if (isNaN(gross_premium_tot_new))
            gross_premium_tot_new = 0;
        else
            gross_premium_tot_new = gross_premium_tot_new;

        if (isNaN(stay_active_benefit_prem))
            stay_active_benefit_prem = 0;
        else
            stay_active_benefit_prem = stay_active_benefit_prem;

        if (isNaN(less_disc_tot))
            less_disc_tot = 0;
        else
            less_disc_tot = less_disc_tot;

        var gross_premium_tot = 0;
        var discount = stay_active_benefit_prem + less_disc_tot;
        gross_premium_tot = (gross_premium_tot_new - discount);
        gross_premium_tot = parseInt(gross_premium_tot);

        if (isNaN(gross_premium_tot))
            gross_premium_tot = 0;
        else
            gross_premium_tot = gross_premium_tot;
        $("#gross_premium_tot").val(gross_premium_tot);
        // Tot_premium(add_medi_hdfc_counter);
        gst_apply();

    }

    function Tot_premium(){
        var inputs = $(".premium_after_discount");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var premium_after_discount = $(inputs[i]).val();
            premium_after_discount = parseInt(premium_after_discount);
            if (isNaN(premium_after_discount))
                premium_after_discount = 0;
            else
                premium_after_discount = premium_after_discount;

            total = total + premium_after_discount;
            if (isNaN(total))
                total = 0;
            else
                total = total;
            $("#tot_premium").val(total);
        }
        Tot_gross_premium();
    }

    function Tot_gross_premium(){
        var tot_premium = $("#tot_premium").val();
        var protect_ride_prem_tot = $("#protect_ride_prem_tot").val();
        var hospital_daily_cash_prem_tot = $("#hospital_daily_cash_prem_tot").val();
        var ipa_rider_prem_tot = $("#ipa_rider_prem_tot").val();
        var load_tot = $("#load_tot").val();
        var hdfc_ergo_health_insu_child_total_premium = $("#hdfc_ergo_health_insu_child_total_premium").val();

        tot_premium = parseInt(tot_premium);
        protect_ride_prem_tot = parseInt(protect_ride_prem_tot);
        hospital_daily_cash_prem_tot = parseInt(hospital_daily_cash_prem_tot);
        ipa_rider_prem_tot = parseInt(ipa_rider_prem_tot);
        load_tot = parseInt(load_tot);
        hdfc_ergo_health_insu_child_total_premium = parseInt(hdfc_ergo_health_insu_child_total_premium);

        if (isNaN(tot_premium))
            tot_premium = 0;
        else
            tot_premium = tot_premium;

        if (isNaN(protect_ride_prem_tot))
            protect_ride_prem_tot = 0;
        else
            protect_ride_prem_tot = protect_ride_prem_tot;

        if (isNaN(hospital_daily_cash_prem_tot))
            hospital_daily_cash_prem_tot = 0;
        else
            hospital_daily_cash_prem_tot = hospital_daily_cash_prem_tot;

        if (isNaN(ipa_rider_prem_tot))
            ipa_rider_prem_tot = 0;
        else
            ipa_rider_prem_tot = ipa_rider_prem_tot;
        
        if (isNaN(load_tot))
            load_tot = 0;
        else
            load_tot = load_tot;
                    
        if (isNaN(hdfc_ergo_health_insu_child_total_premium))
            hdfc_ergo_health_insu_child_total_premium = 0;
        else
            hdfc_ergo_health_insu_child_total_premium = hdfc_ergo_health_insu_child_total_premium;

        var gross_premium_tot=0;
        gross_premium_tot= tot_premium+protect_ride_prem_tot+hospital_daily_cash_prem_tot+ipa_rider_prem_tot+load_tot+hdfc_ergo_health_insu_child_total_premium;

        gross_premium_tot = parseInt(gross_premium_tot);
        if (isNaN(gross_premium_tot))
            gross_premium_tot = 0;
        else
            gross_premium_tot = gross_premium_tot;
            // alert(gross_premium_tot);
        $("#gross_premium_tot").val(gross_premium_tot);
        $("#gross_premium_tot_new").val(gross_premium_tot);
        Tot_stay_active_benefit_premium();
        medi_less_disc_tot_Cal();
    }
    // Calculation Section Start

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

        if (name_insured_member_name != "" && name_insured_dob !="") {
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
                    get_age_Comparision();
                    // get_basic_premium(add_medi_hdfc_counter);
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

    function ncd_amount_Cal(add_medi_hdfc_counter) {
        var ncd_percentage = $("#ncb_per_" + add_medi_hdfc_counter).val();
        var premium_after_loading = $("#premium_after_loading_" + add_medi_hdfc_counter).val();

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
        $("#ncd_amount_" + add_medi_hdfc_counter).val(ncd_amount);
        premium_after_ncd_amount_Cal(add_medi_hdfc_counter);

    }

    function medi_less_disc_tot_Cal() {

        var years_of_premium = $("#years_of_premium").val();
        var tot_premium = $("#tot_premium").val();

        var vals = $("#less_disc_per").val();
        vals = parseInt(vals);
        // alert(vals);
        if (isNaN(vals))
            vals = "#";
        else
            vals = vals;

        years_of_premium = parseInt(years_of_premium);
        tot_premium = parseInt(tot_premium);

        if (isNaN(years_of_premium))
            years_of_premium = 0;
        else
            years_of_premium = years_of_premium;

        if (years_of_premium <= 1) {
            $("#less_disc_per").val(0);
        } else if(years_of_premium>=2){
            var newVals = $("#less_disc_per").val();
            if(newVals!=""){
                if (vals == 0 || vals == "#") {
                    $("#less_disc_per").val(7.5);
                }
            } 
        }

        var less_disc_per = $("#less_disc_per").val();
        if (isNaN(less_disc_per))
            less_disc_per = 0;
        else
            less_disc_per = less_disc_per;

        if (isNaN(tot_premium))
            tot_premium = 0;
        else
            tot_premium = tot_premium;

        var less_disc_tot = Math.round((less_disc_per * tot_premium) / 100);
        less_disc_tot = parseInt(less_disc_tot);

        if (isNaN(less_disc_tot))
            less_disc_tot = 0;
        else
            less_disc_tot = less_disc_tot;

        $("#less_disc_tot").val(less_disc_tot);
        medi_family_disc_tot_Cal();
    }

    function medi_family_disc_tot_Cal() {
        var rowCount = $('#first_table tbody tr').length;
        // alert(rowCount);
        var vals = $("#family_disc_per").val();
        vals = parseInt(vals);

        if (isNaN(vals))
            vals = "#";
        else
            vals = vals;
        if (rowCount == 1) {
            $("#family_disc_per").val(0);
        } else if (rowCount == 2) {
            if (vals == 0 && vals != "#") {
                // alert(vals);
                $("#family_disc_per").val(10);
            }
        }
        var family_disc_per = $("#family_disc_per").val();
        var gross_premium_tot_new = $("#gross_premium_tot_new").val();

        family_disc_per = parseInt(family_disc_per);
        gross_premium_tot_new = parseInt(gross_premium_tot_new);

        if (isNaN(family_disc_per))
            family_disc_per = 0;
        else
            family_disc_per = family_disc_per;

        if (isNaN(gross_premium_tot_new))
            gross_premium_tot_new = 0;
        else
            gross_premium_tot_new = gross_premium_tot_new;

        if (rowCount == 1) {
            var family_disc_tot = Math.round((family_disc_per * gross_premium_tot_new) / 100);
            $("#family_disc_tot").val(family_disc_tot);
        } else {
            var family_disc_tot = Math.round((family_disc_per * gross_premium_tot_new) / 100);
            $("#family_disc_tot").val(family_disc_tot);
        }
        var last_gross_premium=0;
        last_gross_premium = gross_premium_tot_new-family_disc_tot;
        last_gross_premium = parseInt(last_gross_premium);

        if (isNaN(last_gross_premium))
            last_gross_premium = 0;
        else
            last_gross_premium = last_gross_premium;
        $("#gross_premium_tot").val(last_gross_premium);
        Tot_last_gross_prem_total();
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