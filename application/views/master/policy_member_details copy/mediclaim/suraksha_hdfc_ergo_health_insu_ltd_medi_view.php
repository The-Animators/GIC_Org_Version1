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
                <select class="form-control region" name="region" id="region" onchange="Region_change()">
                    <!-- <option value="null">Select Region</option> -->
                    <option value="Tier 1B (Mumbai, Pune, Surat, Varodara, Ahmedabad)">Tier 1B (Mumbai, Pune, Surat, Varodara, Ahmedabad)</option>
                    <option value="Tier 1A (Delhi/NCR)">Tier 1A (Delhi/NCR)</option>
                    <option value="Tier 2 (Rest of India)">Tier 2 (Rest of India)</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="first_table">
            <thead>
                <tr>
                    <th><button class="btn btn-primary btn-sm Add_suraksha_Medi_HDFC" id="Add_suraksha_Medi_HDFC" onclick="AddsurkashaMediHDFC(0)">Add</button></th>
                    <th>Name Of Insured</th>
                    <th>DOB</th>
                    <th>Age</th>
                    <th>Relations</th>
                    <th>Nominee Name</th>
                    <th>Nominee Relations</th>
                    <th>Type Of Policy</th>
                    <th>Sum Insured</th>
                    <th>NCB</th>
                    <th>Premium</th>
                    <th>Hospital Daliy Cash</th>
                    <th>Total Premium</th>
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
                <td colspn="3"><strong> Loading: </strong></td>
                <td colspn=""><strong><textarea rows="3" id="load_desc" name="load_desc" class="load_desc form-control"></textarea></strong></td>
                <td><strong id="load_tot_td"><input type="text" id="load_tot" name="load_tot" class="form-control load_tot" onkeyup="Tot_gross_premium();medi_family_disc_tot_Cal();"></strong></td>
            </tr>
            <tr id="">
                <td colspn="3"><strong> Long Term Premuim Discount: </strong></td>
                <td colspn=""><strong id="less_disc_per_td"><input type="text" id="less_disc_per" name="less_disc_per" class="form-control less_disc_per" onkeyup="medi_less_disc_tot_Cal()" value="0"></strong></td>
                <td><strong id="less_disc_tot_td"><input type="text" id="less_disc_tot" name="less_disc_tot" class="form-control less_disc_tot" disabled></strong></td>
            </tr>
            <tr id="">
                <td colspn="3"><strong> Family Discount: </strong></td>
                <td colspn=""><strong><input type="text" id="family_disc_per" name="family_disc_per" class="form-control family_disc_per"  onkeyup="medi_family_disc_tot_Cal()"></strong></td>
                <td><strong id="family_disc_tot_td"><input type="text" id="family_disc_tot" name="family_disc_tot" class="form-control family_disc_tot" disabled></td>
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
                <td><strong id="medi_final_premium_td"><input type="text" id="medi_final_premium" name="medi_final_premium" class="form-control" disabled><input type="hidden" id="medi_hdfc_ergo_health_insu_suraksha_policy_id" name="medi_hdfc_ergo_health_insu_suraksha_policy_id" class="form-control"></td>
            </tr>
        </table>
    </div>
</div>

<script>
    var sum_insured_dropdown_val = "";
    var add_medi_hdfc_counter = 0;
    var main_suraksha_Medi_HDFC = [];
    var actual_data_MediclaimHDFC = [];

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
            get_basic_premium_basedon_region(flag,main_suraksha_Medi_HDFC);
    }

    function removesurakshaMediHDFC(add_medi_hdfc_counter) {
        $("#remove_suraksha_medi_HDFC_" + add_medi_hdfc_counter).closest("tr").remove();
        var indexValue = main_suraksha_Medi_HDFC.indexOf(add_medi_hdfc_counter);
        main_suraksha_Medi_HDFC.splice(indexValue, 1);
        // alert(main_suraksha_Medi_HDFC);
        if (main_suraksha_Medi_HDFC.length == 0) {
            add_medi_hdfc_counter = 0;
            main_suraksha_Medi_HDFC = [];
            $("#Add_suraksha_Medi_HDFC").attr("onClick", "AddsurkashaMediHDFC(" + add_medi_hdfc_counter + ")");
        }
        combine_tot_premium();
        Tot_premium();
        medi_less_disc_tot_Cal();
        medi_family_disc_tot_Cal();
        Tot_gross_premium();
        // alert(main_suraksha_Medi_HDFC);
    }

    function AddsurkashaMediHDFC(add_medi_hdfc_counter) {
        var policy_holder_name = $("#policy_holder_name").val();
        main_suraksha_Medi_HDFC.push(add_medi_hdfc_counter);

        var tr_table = '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_suraksha_medi_HDFC_' + add_medi_hdfc_counter + '" onClick=removesurakshaMediHDFC(' + add_medi_hdfc_counter + ') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_' + add_medi_hdfc_counter + '" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob(' + add_medi_hdfc_counter + ')"> <option value="null">Select Member Names</option>' + option_val_data + '</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_' + add_medi_hdfc_counter + '" name="name_insured_dob[]" value="" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_' + add_medi_hdfc_counter + '" name="name_insured_age[]" value="" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_' + add_medi_hdfc_counter + '" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach; endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_' + add_medi_hdfc_counter + '" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>' + option_val_data + ' </select></td>  <td><select style="width:120px;" id="nominee_relation_' + add_medi_hdfc_counter + '" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach;  endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="type_of_policy_' + add_medi_hdfc_counter + '" name="type_of_policy[]" class="form-control type_of_policy" onchange="get_sum_insured_dropdown(' + add_medi_hdfc_counter + ');get_basic_premium(' + add_medi_hdfc_counter + ');"> <option value="null">Select Type Of Policy</option><option value="Silver Smart">Silver Smart</option><option value="Gold Smart">Gold Smart</option><option value="Platinum Smart">Platinum Smart</option></select></td><td width="12%"><select style="width:130px;" id="name_insured_sum_insured_' + add_medi_hdfc_counter + '" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="get_basic_premium(' + add_medi_hdfc_counter + ')"><option value="null">Select Sum Insured</option></select></td><td width="8%"> <input style="width:100px;" type="text" name="ncb_per[]" id="ncb_per_' + add_medi_hdfc_counter + '" value="" class="form-control ncb_per" ><input style="width:100px;" type="text" name="ncb_tot_sum_insured[]" id="ncb_tot_sum_insured_' + add_medi_hdfc_counter + '"  class="form-control mt-1 ncb_tot_sum_insured" value=""></td><td width="8%"> <input style="width:100px;" type="text" name="basic_premium[]" id="basic_premium_' + add_medi_hdfc_counter + '" value="" class="form-control basic_premium" ></td><td width="12%"><select style="width:180px;" id="hospital_daliy_cash_' + add_medi_hdfc_counter + '" name="hospital_daliy_cash[]" class="form-control hospital_daliy_cash" onchange="get_hospital_daily_cash_premium(' + add_medi_hdfc_counter + ')"> <option value="null">Select Hospital Daliy Cash</option><option value="1000">1000</option><option value="2000">2000</option><option value="3000">3000</option><option value="5000">5000</option><option value="7500">7500</option></select><input style="width:120px;" type="text" name="hospital_daliy_cash_pre[]" id="hospital_daliy_cash_pre_' + add_medi_hdfc_counter + '" value="" class="form-control mt-1 hospital_daliy_cash_pre" ></td><td width="8%"> <input style="width:100px;" type="text" name="tot_pre[]" id="tot_pre_' + add_medi_hdfc_counter + '" value="" class="form-control tot_pre" ></td>  </tr>';
        $("#first_table_tbody").append(tr_table);
        if(add_medi_hdfc_counter == 0){
            $("#name_insured_member_name_" + add_medi_hdfc_counter).val(policy_holder_name);
            get_dob(add_medi_hdfc_counter);
        }
        add_medi_hdfc_counter = add_medi_hdfc_counter + 1;
        $("#Add_suraksha_Medi_HDFC").attr("onClick", "AddsurkashaMediHDFC(" + add_medi_hdfc_counter + ")");
        // alert(main_suraksha_Medi_HDFC);
        medi_family_disc_tot_Cal();
        medi_less_disc_tot_Cal();
    }

    sum_insured_dropdown();

    function sum_insured_dropdown() {
        var sum_Val = ["3,00,000", "4,00,000", "5,00,000", "7,50,000", "10,00,000", "15,00,000", "20,00,000", "25,00,000", "50,00,000", "75,00,000"];
        var i = 0;
        for (i; i <= 9; i++) {
            // sum_insured_dropdown_val += '<option value="' + sum_Val[i] + '">' + sum_Val[i] + '</option>';
        }
        // $(".name_insured_sum_insured").append(sum_insured_dropdown_val);

        $(".name_insured_member_name").empty();
        $(".name_insured_member_name").append('<option value="null">Select Member Names</option>' + option_val_data);
        $(".nominee_name").empty();
        $(".nominee_name").append('<option value="null">Select Nominee Name</option>' + option_val_data);
    }

    function get_sum_insured_dropdown(add_medi_hdfc_counter){
        var type_of_policy = $("#type_of_policy_"+add_medi_hdfc_counter).val();
        var type_of_policy_sum_insured_dropdown_val = "";
        var type_of_policy_sum_insured = "";
        var loop_count = "";
        // alert(type_of_policy);
        if(type_of_policy != "null" || type_of_policy !=""){
            var silver_smart_sum_Val = ["3,00,000", "4,00,000", "5,00,000"];
            var gold_smart_sum_Val = ["7,50,000", "10,00,000", "15,00,000"];
            var platinum_smart_sum_Val = ["20,00,000", "25,00,000", "50,00,000", "75,00,000"];

            if(type_of_policy == "Silver Smart"){
                $("#name_insured_sum_insured_"+add_medi_hdfc_counter).empty();
                type_of_policy_sum_insured = silver_smart_sum_Val;
                loop_count = 2;
                var i = 0;
                for (i; i <= loop_count; i++) {
                    type_of_policy_sum_insured_dropdown_val += '<option value="' + type_of_policy_sum_insured[i] + '">' + type_of_policy_sum_insured[i] + '</option>';
                }
            }else if(type_of_policy == "Gold Smart"){
                $("#name_insured_sum_insured_"+add_medi_hdfc_counter).empty();
                type_of_policy_sum_insured = gold_smart_sum_Val;
                loop_count = 2;
                var i = 0;
                for (i; i <= loop_count; i++) {
                    type_of_policy_sum_insured_dropdown_val += '<option value="' + type_of_policy_sum_insured[i] + '">' + type_of_policy_sum_insured[i] + '</option>';
                }
            }else if(type_of_policy == "Platinum Smart"){
                $("#name_insured_sum_insured_"+add_medi_hdfc_counter).empty();
                type_of_policy_sum_insured = platinum_smart_sum_Val;
                loop_count = 3;
                var i = 0;
                for (i; i <= loop_count; i++) {
                    type_of_policy_sum_insured_dropdown_val += '<option value="' + type_of_policy_sum_insured[i] + '">' + type_of_policy_sum_insured[i] + '</option>';
                }
            }
            // alert(type_of_policy_sum_insured);

            // alert(sum_insured_dropdown_val);
            
            $("#name_insured_sum_insured_"+add_medi_hdfc_counter).append('<option value="null">Select Sum Insured</option>'+type_of_policy_sum_insured_dropdown_val);
            $("#ncb_per_"+add_medi_hdfc_counter).val(0);
        }
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

    function Total_Suraksh_Medi_HDFC() {
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
            var ncb_per = $(".ncb_per", this).val();
            var basic_premium = $(".basic_premium", this).val();
            var hospital_daliy_cash = $(".hospital_daliy_cash", this).val();
            var hospital_daliy_cash_pre = $(".hospital_daliy_cash_pre", this).val();
            var tot_pre = $(".tot_pre", this).val();
            var ncb_tot_sum_insured = $(".ncb_tot_sum_insured", this).val();

            actual_data_MediclaimHDFC.push([key, name_insured_member_name, name_insured_member_name_txt, name_insured_dob, name_insured_age, name_insured_relation, name_insured_relation_txt, nominee_name, nominee_name_txt, nominee_relation, nominee_relation_txt, type_of_policy, name_insured_sum_insured, ncb_per, basic_premium, hospital_daliy_cash, hospital_daliy_cash_pre, tot_pre, ncb_tot_sum_insured]);
            if (name_insured_member_name == '')
                actual_data_MediclaimHDFC.splice(key, 1);
        });
        // console.log(actual_data_MediclaimHDFC);
        // alert(actual_data_MediclaimHDFC);
        return actual_data_MediclaimHDFC;

        // var total_suraksha_MediHDFC = JSON.stringify(Total_Suraksh_Medi_HDFC());
        // alert(total_suraksha_MediHDFC);
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
        else if (name_insured_sum_insured == "15,00,000")
            var sum_insured = "1500000";
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
        if (age <= 17) {
            column_value = "0_17";
        } else if (age <= 35) {
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
        combine_tot_premium(add_medi_hdfc_counter);
        var years_of_premium = $("#years_of_premium").val();
        var region = $("#region").val();
        var type_of_policy = $("#type_of_policy_" + add_medi_hdfc_counter).val();
        var name_insured_age = $("#name_insured_age_" + add_medi_hdfc_counter).val();

        var condition_value = [];
        name_insured_age = parseInt(name_insured_age);
        count=1;
        for(var i=0;i<years_of_premium;i++){
            if(i==0)
                name_insured_age = name_insured_age;
            else
                name_insured_age = name_insured_age+count;
            // name_insured_age = name_insured_age+i;
            condition_value[i] = getcolumnOnAge(name_insured_age);
        }

        var name_insured_sum_insured = $("#name_insured_sum_insured_" + add_medi_hdfc_counter).val();
        var name_insured_sum_insured = sum_insured_int_Converter(name_insured_sum_insured);
        // alert(type_of_policy);
        // alert(condition_value);
        // alert(name_insured_sum_insured);
        if (region != "" && region != "null" && type_of_policy != "" && type_of_policy != "null" && name_insured_age != "" && name_insured_sum_insured != "" && name_insured_sum_insured != "null" && condition_value != "") {
            var url = "<?php echo base_url(); ?>master/remote/get_hdfc_ergo_health_suraksha_basic_premium";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        table_cond:name_insured_sum_insured,
                        region : region,
                        type_of_policy: type_of_policy,
                        age: name_insured_age,
                        condition_value: condition_value,
                        column_value: "individual",
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
                        combine_tot_premium(add_medi_hdfc_counter);
                        medi_less_disc_tot_Cal();
                        // Tot_premium();
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

    function get_basic_premium_basedon_region(flag,main_suraksha_Medi_HDFC){
        if(flag==false){
            $.each(main_suraksha_Medi_HDFC, function(key, val) {
                $('#basic_premium_' + val).val("");
                $('#tot_pre_' + val).val("");
                $("#tot_premium").val("");
            });
        }else if(flag==true){
            
            var region = $("#region").val();
            var years_of_premium = $("#years_of_premium").val();
            $.each(main_suraksha_Medi_HDFC, function(key, val) {
                $('#basic_premium_' + val).val("");
                combine_tot_premium(val);
                var type_of_policy = $("#type_of_policy_" + val).val();
                var name_insured_age = $("#name_insured_age_" + val).val();
                var name_insured_sum_insured = $("#name_insured_sum_insured_" + val).val();
                name_insured_sum_insured = sum_insured_int_Converter(name_insured_sum_insured);
                var condition_value = [];
                name_insured_age = parseInt(name_insured_age);
                count=1;
                for(var i=0;i<years_of_premium;i++){
                    if(i==0)
                        name_insured_age = name_insured_age;
                    else
                        name_insured_age = name_insured_age+count;
                    // name_insured_age = name_insured_age+i;
                    condition_value[i] = getcolumnOnAge(name_insured_age);
                }
                // var condition_value = getcolumnOnAge(name_insured_age);
                // alert(condition_value);
                if (region != "" && region != "null" && type_of_policy != "" && type_of_policy != "null" && name_insured_age != "" && name_insured_sum_insured != "" && name_insured_sum_insured != "null" && condition_value != "") {
                    var url = "<?php echo base_url(); ?>master/remote/get_hdfc_ergo_health_suraksha_basic_premium";

                    if (url != "") {
                        $.ajax({
                            url: url,
                            data: {
                                table_cond:name_insured_sum_insured,
                                region : region,
                                type_of_policy: type_of_policy,
                                age: name_insured_age,
                                condition_value: condition_value,
                                column_value: "individual",
                            },
                            type: 'POST',
                            dataType: 'json',
                            async: false,
                            cache: false,
                            beforeSend: function() {},
                            success: function(data) {
                                if (data["status"] == true) {
                                    if(data["userdata"]=="")
                                        $('#basic_premium_' + val).val("");

                                    $('#basic_premium_' + val).val("");
                                    $('#basic_premium_' + val).val(data["userdata"]);

                                } else {
                                    $('#basic_premium_' + val).val("");
                                }
                                combine_tot_premium(val);
                                medi_less_disc_tot_Cal();
                                // Tot_stay_active_benefit_premium(val);
                            },
                            error: function(xhr, status) {
                                alert('Sorry, there was a problem!');
                            },
                            complete: function(xhr, status) {

                            }
                        });
                    }
                }
            });
        }
    }

    function get_hospital_daily_cash_premium(add_medi_hdfc_counter){
        combine_tot_premium(add_medi_hdfc_counter);
        var name_insured_age = $("#name_insured_age_" + add_medi_hdfc_counter).val();
        var condition_value = getcolumnOnAge(name_insured_age);
        var hospital_daliy_cash = $("#hospital_daliy_cash_" + add_medi_hdfc_counter).val();
        if (name_insured_age != "" && hospital_daliy_cash != "" && condition_value != "") {
            var url = "<?php echo base_url(); ?>master/remote/get_hdfc_ergo_health_surksha_hospital_daily_cash_prem";

            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        age: name_insured_age,
                        sum_insured: hospital_daliy_cash,
                        condition_value: condition_value,
                        column_value:"individual",
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data["status"] == true) {
                            if(data["userdata"]=="")
                                $('#hospital_daliy_cash_pre_' + add_medi_hdfc_counter).val("");

                            $('#hospital_daliy_cash_pre_' + add_medi_hdfc_counter).val("");
                            $('#hospital_daliy_cash_pre_' + add_medi_hdfc_counter).val(data["userdata"]);

                        } else {
                            $('#hospital_daliy_cash_pre_' + add_medi_hdfc_counter).val("");
                        }
                        combine_tot_premium(add_medi_hdfc_counter);
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

    function combine_tot_premium(add_medi_hdfc_counter){
       var basic_premium = $('#basic_premium_' + add_medi_hdfc_counter).val();
       var hospital_daliy_cash_pre = $('#hospital_daliy_cash_pre_' + add_medi_hdfc_counter).val();

       basic_premium = parseInt(basic_premium);
       hospital_daliy_cash_pre = parseInt(hospital_daliy_cash_pre);

        if (isNaN(basic_premium))
            basic_premium = 0;
        else
            basic_premium = basic_premium;
            
        if (isNaN(hospital_daliy_cash_pre))
            hospital_daliy_cash_pre = 0;
        else
            hospital_daliy_cash_pre = hospital_daliy_cash_pre;
        
        var tot_pre = 0;
        tot_pre = tot_pre + basic_premium + hospital_daliy_cash_pre;
        $('#tot_pre_' + add_medi_hdfc_counter).val(tot_pre);
        Tot_premium();
    }

    function Tot_premium() {
        var inputs = $(".tot_pre");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var tot_pre = $(inputs[i]).val();
            tot_pre = parseInt(tot_pre);
            if (isNaN(tot_pre))
                tot_pre = 0;
            else
                tot_pre = tot_pre;

            total = total + tot_pre;
            if (isNaN(total))
                total = 0;
            else    
                total = total;
            $("#tot_premium").val(total);
        }
        // Tot_gross_premium();
        medi_less_disc_tot_Cal();
    }

    function medi_less_disc_tot_Cal() {
        var years_of_premium = $("#years_of_premium").val();
        // var tot_premium = $("#tot_premium").val();

        var vals = $("#less_disc_per").val();
        vals = parseInt(vals);
        // alert(vals);years_of_premium
        if (isNaN(vals))
            vals = "#";
        else
            vals = vals;

        years_of_premium = parseInt(years_of_premium);
        // tot_premium = parseInt(tot_premium);
        
        if (isNaN(years_of_premium))
            years_of_premium = 0;
        else
            years_of_premium = years_of_premium;

        if (years_of_premium <= 1) {
            $("#less_disc_per").val(0);
        } else if(years_of_premium==2){
            // alert("hi")
            var newVals = $("#less_disc_per").val();
            if(newVals!=""){
                if (vals == 0 || vals == "#" || vals !="") {
                    $("#less_disc_per").val(7.5);
                }
            } 
        }else if(years_of_premium>2){
            var newVals = $("#less_disc_per").val();
            if(newVals!=""){
                if (vals == 0 || vals == "#" || vals !="") {
                    $("#less_disc_per").val(12.5);
                }
            } 
        }

        var less_disc_per = $("#less_disc_per").val();
        var tot_premium = $("#tot_premium").val();

        // less_disc_per = parseInt(less_disc_per);
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
                $("#family_disc_per").val(10);
            }
        }
        var family_disc_per = $("#family_disc_per").val();
        var tot_premium = $("#gross_premium_tot_new").val();

        family_disc_per = parseInt(family_disc_per);
        tot_premium = parseInt(tot_premium);

        if (isNaN(family_disc_per))
            family_disc_per = 0;
        else
            family_disc_per = family_disc_per;

        if (isNaN(tot_premium))
            tot_premium = 0;
        else
            tot_premium = tot_premium;

        if (rowCount == 1) {
            var family_disc_tot = Math.round((family_disc_per * tot_premium) / 100);
            family_disc_tot = parseInt(family_disc_tot);

            if (isNaN(family_disc_tot))
                family_disc_tot = 0;
            else
                family_disc_tot = family_disc_tot;
               
            $("#family_disc_tot").val(family_disc_tot);
        } else {
            var family_disc_tot = Math.round((family_disc_per * tot_premium) / 100);
            family_disc_tot = parseInt(family_disc_tot);

            if (isNaN(family_disc_tot))
                family_disc_tot = 0;
            else
                family_disc_tot = family_disc_tot;
            $("#family_disc_tot").val(family_disc_tot);
        }

        Tot_gross_premium();
    }

    function Tot_gross_premium() {
        var tot_premium = $("#tot_premium").val();
        var less_disc_tot = $("#less_disc_tot").val();
        var family_disc_tot = $("#family_disc_tot").val();
        var load_tot = $("#load_tot").val();

        tot_premium = parseInt(tot_premium);
        less_disc_tot = parseInt(less_disc_tot);
        family_disc_tot = parseInt(family_disc_tot);
        load_tot = parseInt(load_tot);

        if (isNaN(tot_premium))
            tot_premium = 0;
        else
            tot_premium = tot_premium;

        if (isNaN(less_disc_tot))
            less_disc_tot = 0;
        else
            less_disc_tot = less_disc_tot;

        if (isNaN(family_disc_tot))
            family_disc_tot = 0;
        else
            family_disc_tot = family_disc_tot;

        if (isNaN(load_tot))
            load_tot = 0;
        else
            load_tot = load_tot;

        var gross_premium_tot = 0;
        gross_premium_tot = tot_premium + load_tot; 

        var discount = (less_disc_tot + family_disc_tot);

        var last_gross_premium = gross_premium_tot-discount;

        gross_premium_tot = parseInt(gross_premium_tot);
        if (isNaN(gross_premium_tot))
            gross_premium_tot = 0;
        else
            gross_premium_tot = gross_premium_tot;

        $("#gross_premium_tot").val(last_gross_premium);
        $("#gross_premium_tot_new").val(gross_premium_tot);
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