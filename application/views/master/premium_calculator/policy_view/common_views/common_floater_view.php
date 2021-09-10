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
                    <th><button class="btn btn-primary btn-sm Add_Common_Floater" id="Add_Common_Floater" onclick="AddCommonFloater(0)">Add</button></th>
                    <th>Name Of Insured</th>
                    <th>DOB</th>
                    <th>Age</th>
                    <th>Relations</th>
                    <th>Past History</th>
                    <th>Type Of Policy</th>
                    <th>Option </th>
                    <th>Family Size</th>
                    <th>Nominee Name</th>
                    <th>Nominee Relations</th>
                    <th>Sum Insured</th>
                    <th>Premium</th>
                </tr>
            </thead>
            <tbody id="first_table_tbody">
                <!-- <tr>
                    <td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_commonfloater_0" onClick=remove_Common_Floater(0) disabled></td>
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

                    <td><textarea style="width:180px;" id="past_history_0" name="past_history[]" class="form-control past_history" rows="3"></textarea> </td>
                    <td><input style="width:100px;" type="text" id="type_of_policy_0" name="type_of_policy[]" class="form-control type_of_policy" > </td>
                    <td id="policy_option_div"><select style="width:100px;" class="form-control policy_option" name="policy_option[]" id="policy_option" disabled>
                            <option value="Floater" selected >Floater</option>
                            <option value="Individual">Individual</option>    
                    </select></td>
                    <td id="family_size_div_txt"><input style="width:100px;" type="text" id="family_size" name="family_size[]" class="form-control family_size" > </td>
                    <td width="12%" id="nominee_name_div"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name">
                            <option value="null">Select Nominee Name</option>
                        </select></td>
                    <td id="nominee_relation_div"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation">
                            <option value="null">Select Nominee Relation</option>
                            <?php $relationship = relationship_dropdown();
                            if (!empty($relationship)) : foreach ($relationship as $relation) : ?>
                                    <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option>
                            <?php endforeach;
                            endif; ?>
                        </select></td>
                    <td width="8%" id="name_insured_sum_insured_div"><input style="width:110px;" type="text" name="name_insured_sum_insured[]" id="name_insured_sum_insured" value="" class="form-control name_insured_sum_insured"></td>

                    <td width="8%" id="name_insured_premium_div"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium" value="" class="form-control name_insured_premium"  onkeyup="Total_Premium_Cal(0)"></td>
                    
                </tr> -->

            </tbody>
        </table>
    </div>
    <div class="col-md-12">
        <table class="table mb-0 table-bordered mt-2 col-md-12">
            <tr id="declaration_sale_fig_tr">
                <td colspn="2"><strong>Total Premium: </strong></td>
                <td colspn="2"><strong></strong></td>
                <td><strong id="comm_float_total_amount_td"><input type="text" id="comm_float_total_amount" name="comm_float_total_amount" class="form-control" disabled></strong></td>
            </tr>
            <tr id="annual_turn_over_tr">
                <td colspn=""><strong> Less Discount: </strong></td>

                <td colspn=""><strong><input type="text" id="comm_float_less_discount_rate" name="comm_float_less_discount_rate" class="form-control" onkeyup="comm_float_less_discount_tot_Cal()"></strong></td>
                <td><strong id="comm_float_less_discount_tot_td"><input type="text" id="comm_float_less_discount_tot" name="comm_float_less_discount_tot" class="form-control"  onkeyup="comm_float_load_tot_Cal()"></strong></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong>Add Loading: </strong></td>
                <td colspn=""><strong><textarea id="comm_float_load_desc" name="comm_float_load_desc" class="form-control" rows="3"></textarea></strong></td>
                <td><strong id="comm_float_load_tot_td"><input type="text" id="comm_float_load_tot" name="comm_float_load_tot" class="form-control"  onkeyup="comm_float_load_tot_Cal()"></strong></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong>Premium After Loading/Gross Premium: </strong></td>
                <td colspn=""><strong></strong></td>
                <td><strong id="comm_float_gross_premium_td"><input type="text" id="comm_float_gross_premium" name="comm_float_gross_premium" class="form-control" disabled><input type="hidden" id="comm_float_gross_premium_new" name="comm_float_gross_premium_new" class="form-control" disabled></strong></td>
            </tr>
            <tr>
                <td colspn=""><strong> CGST:</strong></td>
                <td><strong id="comm_float_cgst_rate_td"><input type="text" id="cgst_fire_per" name="comm_float_cgst_rate" class="form-control" onkeyup="gst_apply()"></td>
                <td><strong id="comm_float_cgst_tot_td"><input type="text" id="comm_float_cgst_tot" name="comm_float_cgst_tot" class="form-control" disabled></td>
            </tr>
            <tr>
                <td><strong> SGST</strong></td>
                <td><strong id="comm_float_sgst_rate_td"><input type="text" id="sgst_fire_per" name="comm_float_sgst_rate" class="form-control" onkeyup="gst_apply()"></td>
                <td><strong id="comm_float_sgst_tot_td"><input type="text" id="comm_float_sgst_tot" name="comm_float_sgst_tot" class="form-control" disabled></td>
            </tr>
            <tr>
                <td colspn="3"><strong class="text-purple">Final Premium</strong></td>
                <td colspn="2"><strong></strong></td>
                <td><strong id="comm_float_final_premium_td"><input type="text" id="comm_float_final_premium" name="comm_float_final_premium" class="form-control" disabled><input type="hidden" id="common_float_policy_id" name="common_float_policy_id" class="form-control" ></td>
            </tr>
        </table>
    </div>
</div>

<script>

    var add_commonfloat_counter = 0;
    var main_CommonInd = [];
    function remove_Common_Floater(add_commonfloat_counter) {
        $("#remove_commonfloater_" + add_commonfloat_counter).closest("tr").remove();
        main_CommonInd.splice(main_CommonInd.indexOf(add_commonfloat_counter), 1);
        // var indexValue = main_CommonInd.indexOf(add_commonfloat_counter);
        //     main_CommonInd.splice(indexValue, 1);
            // alert(main_CommonInd);
        if (main_CommonInd.length == 0) {
            add_commonfloat_counter=0;
            main_CommonInd = [];
            $("#Add_Common_Floater").attr("onClick", "AddCommonFloater(" + add_commonfloat_counter + ")");
        }
    }

    function AddCommonFloater(add_commonfloat_counter) {
        var policy_holder_name = $("#policy_holder_name").val();
        // alert(add_commonfloat_counter);

        main_CommonInd.push(add_commonfloat_counter);
        var tr_table = "";
        tr_table += '<tr><td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_commonfloater_'+add_commonfloat_counter+'" onClick=remove_Common_Floater('+add_commonfloat_counter+') ></td> <td width="12%"><select style="width:280px;" id="name_insured_member_name_'+add_commonfloat_counter+'" name="name_insured_member_name[]" class="form-control name_insured_member_name" onchange="get_dob('+add_commonfloat_counter+')"> <option value="null">Select Member Names</option>'+option_val_data+'</select></td><td><input style="width:100px;" type="text" id="name_insured_dob_'+add_commonfloat_counter+'" name="name_insured_dob[]" value="" class="form-control name_insured_dob"></td><td><input style="width:55px;" type="text" id="name_insured_age_'+add_commonfloat_counter+'" name="name_insured_age[]" value="" class="form-control name_insured_age"></td> <td><select style="width:120px;" id="name_insured_relation_'+add_commonfloat_counter+'" name="name_insured_relation[]" class="form-control name_insured_relation"><option value="null">Select Relation</option> <?php $relationship = relationship_dropdown(); if (!empty($relationship)) : foreach ($relationship as $relation) : ?>    <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option>  <?php endforeach;  endif; ?>  </select></td> <td><textarea style="width:180px;" id="past_history_'+add_commonfloat_counter+'" name="past_history[]" class="form-control past_history" rows="3"></textarea> </td><td><input style="width:100px;" type="text" id="type_of_policy_'+add_commonfloat_counter+'" name="type_of_policy[]" class="form-control type_of_policy" > </td><td><select style="width:100px;" class="form-control policy_option" name="policy_option[]" id="policy_option_'+add_commonfloat_counter+'" disabled><option value="Floater" selected >Floater</option><option value="Individual">Individual</option>  </select></td>';

        var rwospan_count = add_commonfloat_counter;
        if((add_commonfloat_counter==0)){
            tr_table += '<td id="family_size_div_txt" rowspan="'+rwospan_count+'"><input style="width:100px;" type="text" id="family_size" name="family_size[]" class="form-control family_size" > </td><td width="12%" id="nominee_name_div"  rowspan="'+rwospan_count+'"><select style="width:280px;" id="nominee_name" name="nominee_name[]" class="form-control nominee_name"><option value="null">Select Nominee Name</option> </select></td><td id="nominee_relation_div" rowspan="'+rwospan_count+'"><select style="width:120px;" id="nominee_relation" name="nominee_relation[]" class="form-control nominee_relation">  <option value="null">Select Nominee Relation</option> <?php $relationship = relationship_dropdown();   if (!empty($relationship)) : foreach ($relationship as $relation) : ?> <option value="<?php echo $relation["relation_id"]; ?>"><?php echo $relation["relation_title"]; ?></option> <?php endforeach;   endif; ?>  </select></td> <td width="8%" id="name_insured_sum_insured_div" rowspan="'+rwospan_count+'"><input style="width:110px;" type="text" name="name_insured_sum_insured[]" id="name_insured_sum_insured" value="" class="form-control name_insured_sum_insured"></td> <td width="8%" id="name_insured_premium_div" rowspan="'+rwospan_count+'"><input style="width:110px;" type="text" name="name_insured_premium[]" id="name_insured_premium" value="" class="form-control name_insured_premium"  onkeyup="Total_Premium_Cal(0)"></td> </tr>';
        }
        $("#first_table_tbody").append(tr_table);

        // $("#policy_option_div").attr("rowspan",(parseInt(add_commonfloat_counter)+1));
        $("#family_size_div_txt").attr("rowspan",(parseInt(add_commonfloat_counter)));
        $("#nominee_name_div").attr("rowspan",(parseInt(add_commonfloat_counter)));
        $("#nominee_relation_div").attr("rowspan",(parseInt(add_commonfloat_counter)));
        $("#name_insured_sum_insured_div").attr("rowspan",(parseInt(add_commonfloat_counter)));
        $("#name_insured_premium_div").attr("rowspan",(parseInt(add_commonfloat_counter)));
        if(add_commonfloat_counter == 0){
            $("#name_insured_member_name_" + add_commonfloat_counter).val(policy_holder_name);
            get_dob(add_commonfloat_counter);
        }
        add_commonfloat_counter = add_commonfloat_counter + 1;
        $("#Add_Common_Floater").attr("onClick", "AddCommonFloater(" + add_commonfloat_counter + ")");
        // $(".name_insured_member_name").empty();
        // $(".name_insured_member_name").append('<option value="null">Select Member Names</option>'+option_val_data);
        // $(".nominee_name").empty();
        // $(".nominee_name").append('<option value="null">Select Nominee Name</option>'+option_val_data);
        
    }
    autofill();
    function autofill(){
        $(".name_insured_member_name").empty();
        $(".name_insured_member_name").append('<option value="null">Select Member Names</option>'+option_val_data);
        $(".nominee_name").empty();
        $(".nominee_name").append('<option value="null">Select Nominee Name</option>'+option_val_data);
    }
    var actual_data_CommFloat = [];

    function Total_CommFloat() {
        actual_data_CommFloat = [];

        $("#first_table tr:has(.name_insured_member_name)").each(function(key, val) {

            var name_insured_member_name = $(".name_insured_member_name", this).val();
            var name_insured_member_name_txt = $(".name_insured_member_name option:selected", this).text();
            var name_insured_dob = $(".name_insured_dob", this).val();
            var name_insured_age = $(".name_insured_age", this).val();
            var name_insured_relation = $(".name_insured_relation", this).val();
            var name_insured_relation_txt = $(".name_insured_relation option:selected", this).text();
            var past_history = $(".past_history", this).val();
            var type_of_policy = $(".type_of_policy", this).val();
            var policy_option = $(".policy_option", this).val();
            var family_size = $(".family_size", this).val();
            var nominee_name = $(".nominee_name", this).val();
            var nominee_relation = $(".nominee_relation", this).val();
            var nominee_name_txt = $(".nominee_name option:selected", this).text();
            var nominee_relation_txt = $(".nominee_relation option:selected", this).text();
            var name_insured_sum_insured = $(".name_insured_sum_insured", this).val();
            var name_insured_premium = $(".name_insured_premium", this).val();

            actual_data_CommFloat.push([key, name_insured_member_name , name_insured_member_name_txt , name_insured_dob , name_insured_age , name_insured_relation , name_insured_relation_txt , past_history , type_of_policy , policy_option , family_size , nominee_name , nominee_name_txt , nominee_relation , nominee_relation_txt , name_insured_sum_insured , name_insured_premium]);
            if (name_insured_member_name == '')
                actual_data_CommFloat.splice(key, 1);
        });
        // console.log(actual_data_CommFloat);
        // alert(actual_data_CommFloat);
        return actual_data_CommFloat;

        // var total_commfloat = JSON.stringify(Total_CommFloat());
        // alert(total_commfloat);
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

    function get_dob(add_commonfloat_counter) {
        // alert(add_commonfloat_counter);
        var rowCount = $('#first_table tbody tr').length;

        if(add_commonfloat_counter == 0){
            var name_insured_relation =  $('#name_insured_relation_'+add_commonfloat_counter+' option').filter(function () { return $(this).html() == "Self"; }).val();
            $('#name_insured_relation_'+add_commonfloat_counter).val(name_insured_relation);
        }

        var name_insured_member_name = $("#name_insured_member_name_"+add_commonfloat_counter).val();
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
                        $('#name_insured_dob_'+add_commonfloat_counter).val("");
                        var dob = data["userdata"].dob;
                        // alert(dob);
                        if(dob == "null"){
                            dob = "";
                            toaster(message_type = "Error", message_txt = "The DOB field is required.", message_icone = "error");
                        }else{
                            dob = dateFormate(dob);
                        }
                        // alert(dob);
                        $('#name_insured_dob_'+add_commonfloat_counter).val(dob);
                        get_age(add_commonfloat_counter);
                    } else {
                        $('#name_insured_dob_'+add_commonfloat_counter).val("");
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

    function get_age(add_commonfloat_counter) {
        var name_insured_member_name = $("#name_insured_member_name_"+add_commonfloat_counter).val();
        var name_insured_dob = $("#name_insured_dob_"+add_commonfloat_counter).val();
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
                        $('#name_insured_age_'+add_commonfloat_counter).val("");
                        var age = data["age"];
                        $('#name_insured_age_'+add_commonfloat_counter).val(age);
                    } else {
                        $('#name_insured_age_'+add_commonfloat_counter).val("");
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

    function Total_Premium_Cal(add_commonind_counter){
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
            $("#comm_float_total_amount").val(total);
            $("#comm_float_gross_premium").val(total);
        }
        gst_apply();
        comm_float_less_discount_tot_Cal();
        comm_float_load_tot_Cal();
    }

    function comm_float_less_discount_tot_Cal() {

        var comm_float_less_discount_rate = $("#comm_float_less_discount_rate").val();
        var comm_float_total_amount = $("#comm_float_total_amount").val();

        comm_float_less_discount_rate = parseInt(comm_float_less_discount_rate);
        comm_float_total_amount = parseInt(comm_float_total_amount);

        if (isNaN(comm_float_less_discount_rate))
            comm_float_less_discount_rate = 0;
        else
            comm_float_less_discount_rate = comm_float_less_discount_rate;

        if (isNaN(comm_float_total_amount))
            comm_float_total_amount = 0;
        else
            comm_float_total_amount = comm_float_total_amount;

            // alert(comm_float_less_discount_rate);
        if(comm_float_less_discount_rate !="" || comm_float_less_discount_rate !=0){

        var comm_float_less_discount_tot = Math.round((comm_float_less_discount_rate * comm_float_total_amount) / 100);
        comm_float_less_discount_tot = parseInt(comm_float_less_discount_tot);
        
        if (isNaN(comm_float_less_discount_tot))
            comm_float_less_discount_tot = 0;
        else
            comm_float_less_discount_tot = comm_float_less_discount_tot;

        var comm_float_gross_premium=parseInt(comm_float_total_amount)-parseInt(comm_float_less_discount_tot);
        // alert(comm_float_less_discount_tot);
        $("#comm_float_less_discount_tot").val(comm_float_less_discount_tot);
    }else{
        $("#comm_float_less_discount_tot").val("0");
    }
        $("#comm_float_gross_premium_new").val(comm_float_gross_premium);
        comm_float_load_tot_Cal();
        gst_apply();
    }

    function comm_float_load_tot_Cal(){
        var comm_float_less_discount_rate = $("#comm_float_less_discount_rate").val();
        var comm_float_gross_premium_new = $("#comm_float_gross_premium_new").val();
        var comm_float_less_discount_tot = $("#comm_float_less_discount_tot").val();
        var comm_float_load_tot = $("#comm_float_load_tot").val();

        comm_float_less_discount_rate = parseInt(comm_float_less_discount_rate);
        comm_float_gross_premium_new = parseInt(comm_float_gross_premium_new);
        comm_float_less_discount_tot = parseInt(comm_float_less_discount_tot);
        comm_float_load_tot = parseInt(comm_float_load_tot);

        if (isNaN(comm_float_less_discount_rate))
            comm_float_less_discount_rate = 0;
        else
            comm_float_less_discount_rate = comm_float_less_discount_rate;

        if (isNaN(comm_float_gross_premium_new))
            comm_float_gross_premium_new = 0;
        else
            comm_float_gross_premium_new = comm_float_gross_premium_new;

        if (isNaN(comm_float_less_discount_tot))
            comm_float_less_discount_tot = 0;
        else
            comm_float_less_discount_tot = comm_float_less_discount_tot;
        
        if (isNaN(comm_float_load_tot))
            comm_float_load_tot = 0;
        else
            comm_float_load_tot = comm_float_load_tot;
            if(comm_float_less_discount_rate =="" || comm_float_less_discount_rate ==0){
                var comm_float_total_amount = $("#comm_float_total_amount").val();
                comm_float_total_amount = parseInt(comm_float_total_amount);

                if (isNaN(comm_float_total_amount))
                    comm_float_gross_premium_new = 0;
                else
                    comm_float_gross_premium_new = comm_float_total_amount;
            }
            // alert(comm_float_less_discount_rate+"rate");
            if(comm_float_less_discount_rate !="" || comm_float_less_discount_rate !=0)
                var new_comm_float_gross_premium = comm_float_gross_premium_new+comm_float_load_tot;
            else
                var new_comm_float_gross_premium = (comm_float_gross_premium_new-comm_float_less_discount_tot)+comm_float_load_tot;
            // alert(comm_float_gross_premium_new+"new");
            // alert(new_comm_float_gross_premium+"Gross");
        $("#comm_float_gross_premium").val(new_comm_float_gross_premium);
        gst_apply();
    }
    
    function gst_apply() {
        var comm_float_gross_premium = $("#comm_float_gross_premium").val();
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

        comm_float_gross_premium = parseInt(comm_float_gross_premium);
        if (isNaN(comm_float_gross_premium))
            comm_float_gross_premium = 0;
        else
            comm_float_gross_premium = comm_float_gross_premium;

        if (comm_float_gross_premium == "") {
            $("#comm_float_cgst_tot").val(0);
            $("#comm_float_sgst_tot").val(0);
            $("#comm_float_final_premium").val(0);
        }

        var comm_float_cgst_tot = Math.round((comm_float_gross_premium * cgst_fire_per) / 100);
        var comm_float_sgst_tot = Math.round((comm_float_gross_premium * sgst_fire_per) / 100);
        $("#comm_float_cgst_tot").val(comm_float_cgst_tot);
        $("#comm_float_sgst_tot").val(comm_float_sgst_tot);

        var comm_float_final_premium = parseInt(comm_float_gross_premium) + parseInt(comm_float_cgst_tot) + parseInt(comm_float_sgst_tot);
        $("#comm_float_final_premium").val(comm_float_final_premium);

    }

    // Calculation Section End
</script>