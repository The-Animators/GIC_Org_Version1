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
<?php //print_r($company_array); ?>
<div class="row">
    <div class="col-md-12" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="first_table">
            <thead>
                <tr>
                    <th><button class="btn btn-primary btn-sm Add_Mediclaim" id="Add_Mediclaim" onclick="AddMediclaim(0)">Add</button></th>
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

            </tbody>
        </table>
    </div>
    <div class="col-md-12">
        <table class="table mb-0 table-bordered mt-2 col-md-12" id="calculation_table">
            <tr id="declaration_sale_fig_tr">
                <td colspn="2"><strong> NCD Total: </strong></td>
                <td colspn=""><strong><input type="text" id="medi_total_ncd_amount" name="medi_total_ncd_amount" class="form-control" disabled></strong></td>
                <td colspn="2"><strong> Premium Total: </strong></td>
                <td><strong id="medi_total_amount_td"><input type="text" id="medi_total_amount" name="medi_total_amount" class="form-control" disabled></strong></td>
            </tr>
            <tr id="annual_turn_over_tr">
                <td colspn=""><strong> Family Discount: </strong></td>

                <td colspn=""><strong><input type="text" id="medi_family_disc_rate" name="medi_family_disc_rate" class="form-control" onkeyup="medi_family_disc_tot_Cal()"></strong></td>
                <td colspn=""><strong></strong></td>
                <td><strong id="medi_family_disc_tot_td"><input type="text" id="medi_family_disc_tot" name="medi_family_disc_tot" class="form-control" disabled></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Pemium After FD: </strong></td>
                <td colspn=""><strong></strong></td>
                <td colspn=""><strong></strong></td>
                <td><strong id="medi_premium_after_fd_td"><input type="text" id="medi_premium_after_fd" name="medi_premium_after_fd" class="form-control" disabled></td>
            </tr>
            <tr>
                <td colspn=""><strong> CGST:</strong></td>
                <td><strong id="medi_cgst_rate_td"><input type="text" id="cgst_fire_per" name="medi_cgst_rate" class="form-control" onkeyup="gst_apply()"></td>
                <td><strong id=""></strong></td>
                <td><strong id="medi_cgst_tot_td"><input type="text" id="medi_cgst_tot" name="medi_cgst_tot" class="form-control" disabled></td>
            </tr>
            <tr>
                <td><strong> SGST</strong></td>
                <td><strong id="medi_sgst_rate_td"><input type="text" id="sgst_fire_per" name="medi_sgst_rate" class="form-control" onkeyup="gst_apply()"></td>
                <td><strong id=""></strong></td>
                <td><strong id="medi_sgst_tot_td"><input type="text" id="medi_sgst_tot" name="medi_sgst_tot" class="form-control" disabled></td>
            </tr>
            <tr>
                <td colspn="3"><strong class="text-purple">Final Premium</strong></td>
                <td colspn="2"><strong></strong></td>
                <td colspn="2"><strong></strong></td>
                <td><strong id="medi_final_premium_td"><input type="text" id="medi_final_premium" name="medi_final_premium" class="form-control" disabled><input type="hidden" id="mediclaim_policy_id" name="mediclaim_policy_id" class="form-control" ></td>
            </tr>
        </table>
    </div>
</div>

<script>
    var sum_insured_dropdown_val = "";
    var add_medi_counter = 0;
    var main_Mediclaim = [];
    var member_array = <?php echo json_encode($member_array); ?>;
    var not_converted_sum_insured = '<?php echo $not_converted_sum_insured; ?>';
    console.log(member_array);
    // alert(not_converted_sum_insured);
    // alert('<?php echo $not_converted_sum_insured; ?>');
    $(document).ready(function() {
        if(member_array != "")
        AddMediclaim_by_arra(member_array);
    });
    function AddMediclaim_by_arra(member_array) {
        var tr_table = "";
        $.each(member_array,function(key,val){

            var member_id= member_array[key][0];
            var member_name= member_array[key][1];
            var member_dob= member_array[key][2];
            var member_age= member_array[key][3];
            var member_relation_id= member_array[key][4];
            var member_relation= member_array[key][5];

            tr_table += '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_mediclaim_'+key+'" onClick=removeMediclaim('+key+') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_'+key+'" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob('+key+')"> <option value="null">Select Member Names</option>'+option_val_member_data+'</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_'+key+'" name="name_insured_dob[]" value="" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_'+key+'" name="name_insured_age[]" value="" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_'+key+'" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;  endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_'+key+'" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>'+option_val_member_data+' </select></td>  <td><select style="width:120px;" id="nominee_relation_'+key+'" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();    if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td><select style="width:120px;" id="name_insured_policy_type_'+key+'" name="name_insured_policy_type[]" class="form-control name_insured_policy_type" onchange="remove_sumInsured_basedon_policyType('+key+')">  <option value="null">Select Policy Type</option> <option value="Platinum">Platinum</option> <option value="Gold">Gold</option><option value="Sr. Citizen">Sr. Citizen</option> </select></td><td><select style="width:110px;" id="name_insured_policy_option_'+key+'" name="name_insured_policy_option[]" class="form-control name_insured_policy_option" disabled><option value="Individual">Individual</option> <option value="Floater">Floater</option> </select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_'+key+'" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="premium_basedon_Type('+key+')"><option value="null">Select Sum Insured</option> '+sum_insured_dropdown_val+'   </select></td><td width="8%"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium_'+key+'" value="" class="form-control name_insured_premium"></td><td width="8%"> <div class="row"><div class="col-md-12"><select style="width:90px;" id="dm_yes_no_'+key+'" name="dm_yes_no[]" class="form-control dm_yes_no" onchange="dm_yes_no('+key+')"> <option value="No">No</option><option value="Yes">Yes</option>   </select></div><div class="col-md-12 mt-1"><input style="width:90px;" type="text" name="dm_percentage[]" id="dm_percentage_'+key+'" value="10" class="form-control dm_percentage" onkeyup="dm_loading_Cal('+key+')"></div>  </div>  </td> <td width="8%"><input style="width:110px;" type="text" name="dm_loading[]" id="dm_loading_'+key+'" value="" class="form-control dm_loading"></td><td width="8%"><div class="row"> <div class="col-md-12"><select style="width:90px;" id="htn_yes_no_'+key+'" name="htn_yes_no[]" class="form-control htn_yes_no" onchange="htn_yes_no('+key+')"><option value="No">No</option><option value="Yes">Yes</option> </select></div> <div class="col-md-12 mt-1"><input style="width:90px;" type="text" name="htn_percentage[]" id="htn_percentage_'+key+'" value="10" class="form-control htn_percentage" onkeyup="htn_loading_Cal('+key+')"></div>  </div> </td> <td><input style="width:110px;" type="text" name="htn_loading[]" id="htn_loading_'+key+'" value="" class="form-control htn_loading"></td> <td><input style="width:110px;" type="text" name="premium_after_loading[]" id="premium_after_loading_'+key+'" value="" class="form-control premium_after_loading"></td> <td width="9%"> <select style="width:90px;" id="ncd_percentage_'+key+'" name="ncd_percentage[]" class="form-control ncd_percentage" onchange="ncd_amount_Cal('+key+')"> <option value="5">5%</option> <option value="10">10%</option><option value="15">15%</option> <option value="20">20%</option><option value="25">25%</option> </select>  </td><td><input style="width:110px;" type="text" name="ncd_amount[]" id="ncd_amount_'+key+'" value="" class="form-control ncd_amount"></td><td><input style="width:110px;" type="text" name="premium_after_ncd_amount[]" id="premium_after_ncd_amount_'+key+'" value="" class="form-control premium_after_ncd_amount"></td></tr>';

            
        });
        console.log(tr_table);
        $("#first_table_tbody").empty();
        //document.getElementById("first_table_tbody").appendChild(tr_table);filter_sum_insured
        $("#first_table_tbody").append(tr_table);
        var count = member_array.length;
        $.each(member_array,function(key,val){
            var member_id= member_array[key][0];
            var member_name= member_array[key][1];
            var member_dob= member_array[key][2];
            var member_age= member_array[key][3];
            var member_relation_id= member_array[key][4];
            var member_relation= member_array[key][5];
            if (member_age > 61) {
                var policy_type = "Sr. Citizen";
            } else if (member_age > 36) {
                var policy_type = "Gold";
            } else if (member_age <= 36) {
                var policy_type = "Platinum";
            }
            $("#name_insured_member_name_"+key).val(member_id);
            $("#name_insured_dob_"+key).val(member_dob);
            $("#name_insured_age_"+key).val(member_age);
            $("#name_insured_relation_"+key).val(member_relation_id);
            $("#name_insured_policy_type_"+key).val(policy_type);
            $("#name_insured_sum_insured_"+key).val(not_converted_sum_insured);
            dm_yes_no(key);
            htn_yes_no(key);
            main_Mediclaim.push(key);
        });
        $.each(member_array,function(key,val){
            premium_basedon_Type(key)
        });
        
        $("#Add_Mediclaim").attr("onClick", "AddMediclaim(" + count + ")");
    }

    function removeMediclaim(add_medi_counter) {
        $("#remove_mediclaim_" + add_medi_counter).closest("tr").remove();
        var indexValue = main_Mediclaim.indexOf(add_medi_counter);
            main_Mediclaim.splice(indexValue, 1);
            // alert(main_Mediclaim);
        if (main_Mediclaim.length == 0) {
            add_medi_counter=0;
            main_Mediclaim = [];
            $("#Add_Mediclaim").attr("onClick", "AddMediclaim(" + add_medi_counter + ")");
        }
        medi_ncd_amount_Cal();
        medi_total_amount_Cal();
    }

    function AddMediclaim(add_medi_counter) {
        
        var policy_holder_name = $("#policy_holder_name").val();
        // alert(add_medi_counter);

        main_Mediclaim.push(add_medi_counter);
        
        var tr_table = '<tr><td width="3%"><button class="btn btn-primary btn-sm dripicons-cross" id="remove_mediclaim_'+add_medi_counter+'" onClick=removeMediclaim('+add_medi_counter+') ></td><td width="12%"><select style="width:280px;" id="name_insured_member_name_'+add_medi_counter+'" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob('+add_medi_counter+')"> <option value="null">Select Member Names</option>'+option_val_member_data+'</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_'+add_medi_counter+'" name="name_insured_dob[]" value="" class="form-control name_insured_dob"></td> <td><input style="width:55px;" type="text" id="name_insured_age_'+add_medi_counter+'" name="name_insured_age[]" value="" class="form-control name_insured_age"></td><td><select style="width:120px;" id="name_insured_relation_'+add_medi_counter+'" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown();  if (!empty($relationship)) : foreach ($relationship as $relation) : ?>  <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;  endif; ?> </select></td> <td width="12%"><select style="width:280px;" id="nominee_name_'+add_medi_counter+'" name="nominee_name[]" class="form-control nominee_name"> <option value="null">Select Nominee Name</option>'+option_val_member_data+' </select></td>  <td><select style="width:120px;" id="nominee_relation_'+add_medi_counter+'" name="nominee_relation[]" class="form-control nominee_relation"> <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();    if (!empty($relationship)) : foreach ($relationship as $relation) : ?>       <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option><?php endforeach; endif; ?> </select></td><td><select style="width:120px;" id="name_insured_policy_type_'+add_medi_counter+'" name="name_insured_policy_type[]" class="form-control name_insured_policy_type" onchange="remove_sumInsured_basedon_policyType('+add_medi_counter+')">  <option value="null">Select Policy Type</option> <option value="Platinum">Platinum</option> <option value="Gold">Gold</option><option value="Sr. Citizen">Sr. Citizen</option> </select></td><td><select style="width:110px;" id="name_insured_policy_option_'+add_medi_counter+'" name="name_insured_policy_option[]" class="form-control name_insured_policy_option" disabled><option value="Individual">Individual</option> <option value="Floater">Floater</option> </select></td><td width="12%"><select style="width:105px;" id="name_insured_sum_insured_'+add_medi_counter+'" name="name_insured_sum_insured[]" class="form-control name_insured_sum_insured" onchange="premium_basedon_Type('+add_medi_counter+')"><option value="null">Select Sum Insured</option> '+sum_insured_dropdown_val+'   </select></td><td width="8%"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium_'+add_medi_counter+'" value="" class="form-control name_insured_premium"></td><td width="8%"> <div class="row"><div class="col-md-12"><select style="width:90px;" id="dm_yes_no_'+add_medi_counter+'" name="dm_yes_no[]" class="form-control dm_yes_no" onchange="dm_yes_no('+add_medi_counter+')"> <option value="No">No</option><option value="Yes">Yes</option>   </select></div><div class="col-md-12 mt-1"><input style="width:90px;" type="text" name="dm_percentage[]" id="dm_percentage_'+add_medi_counter+'" value="10" class="form-control dm_percentage" onkeyup="dm_loading_Cal('+add_medi_counter+')"></div>  </div>  </td> <td width="8%"><input style="width:110px;" type="text" name="dm_loading[]" id="dm_loading_'+add_medi_counter+'" value="" class="form-control dm_loading"></td><td width="8%"><div class="row"> <div class="col-md-12"><select style="width:90px;" id="htn_yes_no_'+add_medi_counter+'" name="htn_yes_no[]" class="form-control htn_yes_no" onchange="htn_yes_no('+add_medi_counter+')"><option value="No">No</option><option value="Yes">Yes</option> </select></div> <div class="col-md-12 mt-1"><input style="width:90px;" type="text" name="htn_percentage[]" id="htn_percentage_'+add_medi_counter+'" value="10" class="form-control htn_percentage" onkeyup="htn_loading_Cal('+add_medi_counter+')"></div>  </div> </td> <td><input style="width:110px;" type="text" name="htn_loading[]" id="htn_loading_'+add_medi_counter+'" value="" class="form-control htn_loading"></td> <td><input style="width:110px;" type="text" name="premium_after_loading[]" id="premium_after_loading_'+add_medi_counter+'" value="" class="form-control premium_after_loading"></td> <td width="9%"> <select style="width:90px;" id="ncd_percentage_'+add_medi_counter+'" name="ncd_percentage[]" class="form-control ncd_percentage" onchange="ncd_amount_Cal('+add_medi_counter+')"> <option value="5">5%</option> <option value="10">10%</option><option value="15">15%</option> <option value="20">20%</option><option value="25">25%</option> </select>  </td><td><input style="width:110px;" type="text" name="ncd_amount[]" id="ncd_amount_'+add_medi_counter+'" value="" class="form-control ncd_amount"></td><td><input style="width:110px;" type="text" name="premium_after_ncd_amount[]" id="premium_after_ncd_amount_'+add_medi_counter+'" value="" class="form-control premium_after_ncd_amount"></td></tr>';
        $("#first_table_tbody").append(tr_table);
        if(add_medi_counter == 0){
            $("#name_insured_member_name_" + add_medi_counter).val(policy_holder_name);
            get_dob(add_medi_counter);
        }
        dm_yes_no(add_medi_counter);
        htn_yes_no(add_medi_counter);
        add_medi_counter = add_medi_counter + 1;
        $("#Add_Mediclaim").attr("onClick", "AddMediclaim(" + add_medi_counter + ")");
    }

    var actual_data_Mediclaim_Individual_Health_Insurance_Policy_ind = [];
    var actual_data_Mediclaim_Individual_Health_Insurance_Policy_ind_calculation_table = [];

    function Total_Mediclaim_Individual_Health_Insurance_Policy_ind() {
        actual_data_Mediclaim_Individual_Health_Insurance_Policy_ind = [];

        $("#first_table tr:has(.name_insured_member_name)").each(function(key, val) {

            var name_insured_member_name = $(".name_insured_member_name", this).val();
            var name_insured_member_name_txt = $(".name_insured_member_name option:selected", this).text();
            var name_insured_dob = $(".name_insured_dob", this).val();
            var name_insured_age = $(".name_insured_age", this).val();
            var name_insured_relation = $(".name_insured_relation", this).val();
            var name_insured_relation_txt = $(".name_insured_relation option:selected", this).text();
            var name_insured_policy_type = $(".name_insured_policy_type", this).val();
            var name_insured_policy_option = $(".name_insured_policy_option", this).val();
            var name_insured_sum_insured = $(".name_insured_sum_insured", this).val();
            var name_insured_premium = $(".name_insured_premium", this).val();
            var dm_yes_no = $(".dm_yes_no", this).val();
            var dm_percentage = $(".dm_percentage", this).val();
            var dm_loading = $(".dm_loading", this).val();
            var htn_yes_no = $(".htn_yes_no", this).val();
            var htn_percentage = $(".htn_percentage", this).val();
            var htn_loading = $(".htn_loading", this).val();
            var premium_after_loading = $(".premium_after_loading", this).val();
            var ncd_percentage = $(".ncd_percentage", this).val();
            var ncd_amount = $(".ncd_amount", this).val();
            var premium_after_ncd_amount = $(".premium_after_ncd_amount", this).val();
            var nominee_name = $(".nominee_name", this).val();
            var nominee_relation = $(".nominee_relation", this).val();
            
            var nominee_name_txt = $(".nominee_name option:selected", this).text();
            var nominee_relation_txt = $(".nominee_relation option:selected", this).text();

            actual_data_Mediclaim_Individual_Health_Insurance_Policy_ind.push([key, name_insured_member_name , name_insured_member_name_txt , name_insured_dob , name_insured_age , name_insured_relation , name_insured_relation_txt , name_insured_policy_type , name_insured_policy_option , name_insured_sum_insured , name_insured_premium , dm_yes_no , dm_percentage , dm_loading , htn_yes_no , htn_percentage , htn_loading , premium_after_loading , ncd_percentage , ncd_amount , premium_after_ncd_amount,nominee_name,nominee_relation,nominee_name_txt,nominee_relation_txt]);
            if (name_insured_member_name == '')
            actual_data_Mediclaim_Individual_Health_Insurance_Policy_ind.splice(key, 1);
            // alert(actual_data_Mediclaim_Individual_Health_Insurance_Policy_ind);
        });
        return actual_data_Mediclaim_Individual_Health_Insurance_Policy_ind;
    }

    function Total_calculation_table_Individual_Health_Insurance_Policy_ind(){
        actual_data_Mediclaim_Individual_Health_Insurance_Policy_ind_calculation_table = [];
            var medi_total_ncd_amount = $("#medi_total_ncd_amount").val();
            var medi_total_amount = $("#medi_total_amount").val();
            var medi_family_disc_rate = $("#medi_family_disc_rate").val();
            var medi_family_disc_tot = $("#medi_family_disc_tot").val();
            var medi_premium_after_fd = $("#medi_premium_after_fd").val();
            var cgst_fire_per = $("#cgst_fire_per").val();
            var medi_cgst_tot = $("#medi_cgst_tot").val();
            var sgst_fire_per = $("#sgst_fire_per").val();
            var medi_sgst_tot = $("#medi_sgst_tot").val();
            var medi_final_premium = $("#medi_final_premium").val();

            actual_data_Mediclaim_Individual_Health_Insurance_Policy_ind_calculation_table.push([medi_total_ncd_amount , medi_total_amount , medi_family_disc_rate , medi_family_disc_tot , medi_premium_after_fd , cgst_fire_per , medi_cgst_tot , sgst_fire_per , medi_sgst_tot , medi_final_premium]);

        // alert(actual_data_Mediclaim_Individual_Health_Insurance_Policy_ind_calculation_table);
        return actual_data_Mediclaim_Individual_Health_Insurance_Policy_ind_calculation_table;
    }
// Calculation Section Start

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

    function get_dob(add_medi_counter) {
        // alert(add_medi_counter);
        var rowCount = $('#first_table tbody tr').length;

        if(add_medi_counter == 0){
            var name_insured_relation =  $('#name_insured_relation_'+add_medi_counter+' option').filter(function () { return $(this).html() == "Self"; }).val();
            $('#name_insured_relation_'+add_medi_counter).val(name_insured_relation);
        }
        // alert(rowCount);
        if(rowCount==1){
            // var name_insured_relation = $('#name_insured_relation').find('option[text="Self"]').val();
            // var name_insured_relation =  $('#name_insured_relation_'+add_medi_counter+' option').filter(function () { return $(this).html() == "Self"; }).val();
            // $('#name_insured_relation_'+add_medi_counter).val(name_insured_relation);
        }

        var name_insured_member_name = $("#name_insured_member_name_"+add_medi_counter).val();
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
                        $('#name_insured_dob_'+add_medi_counter).val("");
                        var dob = data["userdata"].dob;
                        // alert(dob);
                        if(dob == "null"){
                            dob = "";
                            toaster(message_type = "Error", message_txt = "The DOB field is required.", message_icone = "error");
                        }else{
                            dob = dateFormate(dob);
                        }
                        // alert(dob);
                        $('#name_insured_dob_'+add_medi_counter).val(dob);
                        get_age(add_medi_counter);
                    } else {
                        $('#name_insured_dob_'+add_medi_counter).val("");
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

    function get_age(add_medi_counter) {
        var name_insured_member_name = $("#name_insured_member_name_"+add_medi_counter).val();
        var name_insured_dob = $("#name_insured_dob_"+add_medi_counter).val();
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
                        $('#name_insured_age_'+add_medi_counter).val("");
                        var age = data["age"];
                        $('#name_insured_age_'+add_medi_counter).val(age);
                        remove_policyType_basedonAge(add_medi_counter);
                    } else {
                        $('#name_insured_age_'+add_medi_counter).val("");
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

    function remove_policyType_basedonAge(add_medi_counter) {
        var name_insured_age = $("#name_insured_age_"+add_medi_counter).val();
        if (name_insured_age > 36 || name_insured_age > 61) {
            // alert("36");
            if (name_insured_age > 36) {
                $("#name_insured_policy_type_"+add_medi_counter+" option[value='Platinum']").remove();
            } else {
                $("#name_insured_policy_type_"+add_medi_counter+" option[value='Platinum']").remove();
                $("#name_insured_policy_type_"+add_medi_counter).append('<option value="Platinum">Platinum</option>');
            }
            if (name_insured_age > 61) {
                $("#name_insured_policy_type_"+add_medi_counter+" option[value='Gold']").remove();
            } else {
                $("#name_insured_policy_type_"+add_medi_counter+" option[value='Gold']").remove();
                $("#name_insured_policy_type_"+add_medi_counter).append('<option value="Gold">Gold</option>');
            }
        } else {
            $("#name_insured_policy_type_"+add_medi_counter).empty();
            $("#name_insured_policy_type_"+add_medi_counter).append('<option value="null">Select Policy Type</option><option value="Platinum">Platinum</option><option value="Gold">Gold</option><option value="Sr. Citizen">Sr. Citizen</option>');
        }
        var name_insured_policy_type = $("#name_insured_policy_type_"+add_medi_counter).val();
        if(name_insured_policy_type=="null"){
            $("#name_insured_sum_insured_"+add_medi_counter).empty();
            $("#name_insured_premium_"+add_medi_counter).val("");
        }
        remove_sumInsured_basedon_policyType(add_medi_counter);
    }

    function remove_sumInsured_basedon_policyType(add_medi_counter) {
        var name_insured_policy_type = $("#name_insured_policy_type_"+add_medi_counter).val();
        // alert(name_insured_policy_type);
        if (name_insured_policy_type == "Gold" || name_insured_policy_type == "Sr. Citizen") {
            $("#name_insured_sum_insured_"+add_medi_counter+" option[value='15,00,000']").remove();
            $("#name_insured_sum_insured_"+add_medi_counter+" option[value='20,00,000']").remove();
        } else {
            // alert(sum_insured_dropdown_val);
            // $("#name_insured_sum_insured").append('<option value="1,50,0000">1,50,0000</option>');
            // $("#name_insured_sum_insured").append('<option value="2,00,000">2,00,000</option>');
            $("#name_insured_sum_insured_"+add_medi_counter).empty();
            $("#name_insured_sum_insured_"+add_medi_counter).append(sum_insured_dropdown_val);
        }

        get_premiumBasedon_age_sumInsured_PolicyType(add_medi_counter);
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

    function premium_basedon_Type(add_medi_counter) {
        get_premiumBasedon_age_sumInsured_PolicyType(add_medi_counter);
        var name_insured_premium = $("#name_insured_premium_"+add_medi_counter).val();
        if (name_insured_premium == "") {
            $("#dm_loading_"+add_medi_counter).val("");
            $("#htn_loading_"+add_medi_counter).val("");
            $("#premium_after_loading_+add_medi_counter_"+add_medi_counter).val("");
            $("#ncd_amount_"+add_medi_counter).val("");
            $("#premium_after_ncd_amount_"+add_medi_counter).val("");

            $("#dm_loading_"+add_medi_counter).val(0);
            $("#htn_loading_"+add_medi_counter).val(0);
            $("#premium_after_loading_"+add_medi_counter).val(0);
            $("#ncd_amount_"+add_medi_counter).val(0);
            $("#premium_after_ncd_amount_"+add_medi_counter).val(0);
        }
             medi_ncd_amount_Cal();
            medi_total_amount_Cal();
    }

    function get_premiumBasedon_age_sumInsured_PolicyType(add_medi_counter) {
        var name_insured_age = $("#name_insured_age_"+add_medi_counter).val();
        // alert(column_value);
        var name_insured_sum_insured = $("#name_insured_sum_insured_"+add_medi_counter).val();
        var name_insured_policy_type = $("#name_insured_policy_type_"+add_medi_counter).val();
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
                            $('#name_insured_premium_'+add_medi_counter).val("");
                            $('#name_insured_premium_'+add_medi_counter).val(data["userdata"]);
                            if (data["userdata"] == "") {
                                $("#dm_loading_"+add_medi_counter).val("");
                                $("#htn_loading_"+add_medi_counter).val("");
                                $("#premium_after_loading_"+add_medi_counter).val("");
                                $("#ncd_amount_"+add_medi_counter).val("");
                                $("#premium_after_ncd_amount_"+add_medi_counter).val("");

                                $("#dm_loading_"+add_medi_counter).val(0);
                                $("#htn_loading_"+add_medi_counter).val(0);
                                $("#premium_after_loading_"+add_medi_counter).val(0);
                                $("#ncd_amount_"+add_medi_counter).val(0);
                                $("#premium_after_ncd_amount_"+add_medi_counter).val(0);
                            }
                            dm_yes_no(add_medi_counter);
                            htn_yes_no(add_medi_counter);
                            
                        } else {
                            $('#name_insured_premium_'+add_medi_counter).val("");
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

    dm_yes_no(add_medi_counter);
    function dm_yes_no(add_medi_counter) {

        var dm_yes_no = $("#dm_yes_no_"+add_medi_counter).val();
        if (dm_yes_no == "Yes") {
            $("#dm_percentage_"+add_medi_counter).show();
            $("#dm_percentage_"+add_medi_counter).val("10");
        } else if (dm_yes_no == "No") {
            $("#dm_percentage_"+add_medi_counter).hide();
            $("#dm_percentage_"+add_medi_counter).val(0);
        }
        dm_loading_Cal(add_medi_counter);
    }
    htn_yes_no(add_medi_counter);
    function htn_yes_no(add_medi_counter) {
        // alert("hi");
        var htn_yes_no = $("#htn_yes_no_"+add_medi_counter).val();
        // alert(add_medi_counter);
        // alert(htn_yes_no);
        if (htn_yes_no == "Yes") {
            $("#htn_percentage_"+add_medi_counter).show();
            $("#htn_percentage_"+add_medi_counter).val(10);
        } else if (htn_yes_no == "No") {
            $("#htn_percentage_"+add_medi_counter).hide();
            $("#htn_percentage_"+add_medi_counter).val(0);
        }
        htn_loading_Cal(add_medi_counter);
    }

    function dm_loading_Cal(add_medi_counter) {
        var dm_percentage = $("#dm_percentage_"+add_medi_counter).val();
        var name_insured_premium = $("#name_insured_premium_"+add_medi_counter).val();

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
        $("#dm_loading_"+add_medi_counter).val(dm_loading);
        premium_after_loading_Cal(add_medi_counter);
    }

    function htn_loading_Cal(add_medi_counter) {
        var htn_percentage = $("#htn_percentage_"+add_medi_counter).val();
        var name_insured_premium = $("#name_insured_premium_"+add_medi_counter).val();

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
        $("#htn_loading_"+add_medi_counter).val(htn_loading);
        premium_after_loading_Cal(add_medi_counter);
    }

    function premium_after_loading_Cal(add_medi_counter) {
        var dm_loading = $("#dm_loading_"+add_medi_counter).val();
        var htn_loading = $("#htn_loading_"+add_medi_counter).val();
        var name_insured_premium = $("#name_insured_premium_"+add_medi_counter).val();

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
        $("#premium_after_loading_"+add_medi_counter).val(premium_after_loading);
        ncd_amount_Cal(add_medi_counter);
    }

    function ncd_amount_Cal(add_medi_counter) {
        var ncd_percentage = $("#ncd_percentage_"+add_medi_counter).val();
        var premium_after_loading = $("#premium_after_loading_"+add_medi_counter).val();

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
        $("#ncd_amount_"+add_medi_counter).val(ncd_amount);
        premium_after_ncd_amount_Cal(add_medi_counter);

    }

    function premium_after_ncd_amount_Cal(add_medi_counter) {
        var ncd_amount = $("#ncd_amount_"+add_medi_counter).val();
        var premium_after_loading = $("#premium_after_loading_"+add_medi_counter).val();

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
        $("#premium_after_ncd_amount_"+add_medi_counter).val(premium_after_ncd_amount);
        medi_ncd_amount_Cal(add_medi_counter);
        medi_total_amount_Cal(add_medi_counter);
    }

    // var ncd_amount_Total = 0;
    function medi_ncd_amount_Cal_bak(add_medi_counter) {
        var ncd_amount = $("#ncd_amount_"+add_medi_counter).val();

        ncd_amount = parseInt(ncd_amount);

        if (isNaN(ncd_amount))
            ncd_amount = 0;
        else
            ncd_amount = ncd_amount;

        $("#medi_total_ncd_amount").val(ncd_amount);
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
            $("#medi_total_ncd_amount").val(total);
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

            total = total + premium_after_ncd_amount;
            $("#medi_total_amount").val(total);
        }
        medi_family_disc_tot_Cal();
    }

    function medi_total_amount_Cal_bak(add_medi_counter) {
        var premium_after_ncd_amount = $("#premium_after_ncd_amount_"+add_medi_counter).val();

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
        var vals=$("#medi_family_disc_rate").val();
        vals = parseInt(vals);

        if (isNaN(vals))
            vals = "#";
        else
            vals = vals;
        if (rowCount == 1) {
            $("#medi_family_disc_rate").val(0);
        } else if (rowCount == 2){
            if(vals==0 && vals!="#"){
                // alert(vals);
                $("#medi_family_disc_rate").val(5);
            }
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
            var medi_family_disc_tot = Math.round((medi_family_disc_rate * medi_total_amount) / 100);
            $("#medi_family_disc_tot").val(medi_family_disc_tot);
            // $("#medi_family_disc_tot").val(medi_total_amount);
        } else {
            var medi_family_disc_tot = Math.round((medi_family_disc_rate * medi_total_amount) / 100);
            $("#medi_family_disc_tot").val(medi_family_disc_tot);
        }
        medi_premium_after_fd_Cal();
    }

    function medi_premium_after_fd_Cal() {
        var medi_total_amount = $("#medi_total_amount").val();
        var medi_family_disc_tot = $("#medi_family_disc_tot").val();
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

        $("#medi_premium_after_fd").val(medi_premium_after_fd);
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

        var medi_cgst_tot = Math.round((medi_premium_after_fd * cgst_fire_per) / 100);
        var medi_sgst_tot = Math.round((medi_premium_after_fd * sgst_fire_per) / 100);
        $("#medi_cgst_tot").val(medi_cgst_tot);
        $("#medi_sgst_tot").val(medi_sgst_tot);

        var medi_final_premium = parseInt(medi_premium_after_fd) + parseInt(medi_cgst_tot) + parseInt(medi_sgst_tot);
        $("#medi_final_premium").val(medi_final_premium);

    }

    // Calculation Section End
</script>