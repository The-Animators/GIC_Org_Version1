<div class="form-group row">
    <table class="table mb-0 table-bordered col-md-12">
        <tr>
            <td colspan=""><strong>From Destination: </strong></td>
            <td><strong><input type="text" name="from_destination" id="from_destination" value="" class="form-control">
                </strong></td>
        </tr>
        <tr>
            <td colspan=""><strong>To Destination: </strong></td>
            <td><strong><input type="text" name="to_destination" id="to_destination" value="" class="form-control">
                </strong></td>
        </tr>
        <tr>
            <td width="45%"><strong id="policy_title"> Specific Marine Policy Insured : </strong></td>

            <td><strong id="group_name_company"></strong></td>
        </tr>
        <tr>
            <td colspan=""><strong>Coverage Type: </strong></td>
            <td><strong><input type="text" name="coverage_type" id="coverage_type" value="All Risk + SRCC + War + 10%" class="form-control">
                </strong></td>
        </tr>
        <tr>
            <td colspan=""><strong>Description: </strong></td>
            <td><strong><textarea name="marine_description" id="marine_description" value="" class="form-control">They are a Manufacturing Unit with Office’s / Factories / Godowns’s they will sell or send their finished products to their owned Retail Shops / Franchise / Other Customers - Dommestic as well as export.</textarea>
                </strong></td>
        </tr>
        <tr>
            <td><strong>Interest Insured: </strong></td>
            <td><strong><textarea name="interest_insured" id="interest_insured" value="" class="form-control">Upon Consignment Said to contain Raw Material, Semi Finished & Finished Goods, Readymade Garments, All Types of Fabrics, Packing Materials, Samples, Sales Promotion Goods & any such other items pertaining to insured’s trade </textarea></strong></td>
        </tr>
        <tr>
            <td><strong>Period Of Insurance: </strong></td>
            <td><strong id="period_of_insurance"></strong></td>
        </tr>
        <tr>
            <td colspan=""><strong>Office / Correspondence Address: </strong></td>
            <td><strong><textarea name="group_name_address" id="group_name_address" value="" class="form-control"></textarea></strong></td>
        </tr>
        <tr>
            <td colspan=""><strong>Sum Insured: </strong></td>
            <td><strong><input type="number" name="marine_sum_insured" id="marine_sum_insured" value="" class="form-control">
                </strong></td>
        </tr>
        <tr>
            <td><strong>Packing:</strong></td>
            <td><strong><input type="text" name="packing_stand_customary" id="packing_stand_customary" value=" Standard & Customary" class="form-control">
                </strong></td>
        </tr>
        <tr>
            <td><strong><u>Marine Conveyance Coverage</u></strong></td>
            <td>
                <table id="marine_convey_c">
                    <thead>
                        <tr>
                            <td>Details</td>
                            <td>Action &nbsp;<button class="btn btn-primary btn-sm addMarine_conveyance_coverage" id="addMarine_conveyance_coverage" onclick="addMarine_Conveyance_Coverage()">Add</button></td>
                        </tr>
                    </thead>
                    <tbody id="append_marine_cc"></tbody>
                </table>
                <div id="plus_btn"></div>
                <!-- 1 By Road<br>
                2 By Rail<br>
                3 By Sea<br>
                4 By Air<br>
                5 By Courier Services<br>
                6 By Clients Own Vehicles<br>
                7 By Clients Personal Vehiles<br>
                8 By Peronal Hand Carriage (Employee)<br>
                9 By Post<br>
                10 By Local Angadia<br>
                11 By Private Tempo<br> -->
            </td>
        </tr>
        <!-- <tr>
            <td colspan=""><strong>Business Description: </strong></td>
            <td><strong><input type="text" name="business_description" id="business_description" value="" class="form-control"></strong></td>
        </tr>
        <tr>
            <td colspan=""><strong><u>Voyage:</u> <br /> Domestic Purchase: </strong></td>
            <td><strong><textarea name="voyage_domestic_purchase" id="voyage_domestic_purchase" value="" class="form-control">From Any Where In India To any Where in Office / Factories / Godown’s in India</textarea></strong></td>
        </tr>
        <tr>
            <td colspan=""><strong>International Purchase: </strong></td>
            <td><strong><textarea name="voyage_international_purchase" id="voyage_international_purchase" value="" class="form-control">From Any Where In World To any Where in Office’s / Factories / Godown’s in India</textarea></strong></td>
        </tr>
        <tr>
            <td colspan=""><strong>Domestic Sales: </strong></td>
            <td><strong><textarea name="voyage_domestic_sales" id="voyage_domestic_sales" value="" class="form-control">From Any Where in Office’s / Factories / Godown’s in India To Any Where In India </textarea></strong></td>
        </tr>
        <tr>
            <td colspan=""><strong>Export Sales: </strong></td>
            <td><strong><textarea name="voyage_export_sales" id="voyage_export_sales" value="" class="form-control">From Any Where in Office’s / Factories / Godown’s in India To Any Where In World</textarea></strong></td>
        </tr>
        <tr>
            <td colspan=""><strong>Job / Printer / Washer Etc.. Worker: </strong></td>
            <td><strong><textarea name="voyage_job_worker" id="voyage_job_worker" value="" class="form-control">Between Client Factories / Office’s / Godown’s & Job Worker / Printer / Washer etc... any where in India</textarea></strong></td>
        </tr>
        <tr>
            <td colspan=""><strong>Domestic Finished Goods: </strong></td>
            <td><strong><textarea name="voyage_domestic_fini_good" id="voyage_domestic_fini_good" value="" class="form-control">From Any Where in Office’s / Factories / Godown’s in India To Any Where In India </textarea></strong></td>
        </tr>
        <tr>
            <td colspan=""><strong>Export Finished Goods: </strong></td>
            <td><strong><textarea name="voyage_export_fini_good" id="voyage_export_fini_good" value="" class="form-control">From Any Where in Office’s / Factories / Godown’s in India To Any Where In World </textarea></strong></td>
        </tr>
        <tr>
            <td colspan=""><strong>Domestic Purchase Return: </strong></td>
            <td><strong><textarea name="voyage_domestic_purch_return" id="voyage_domestic_purch_return" value="" class="form-control">Any Where in Office’s / Factories / Godown’s To Any Where In India [Suppliers]</textarea></strong></td>
        </tr>
        <tr>
            <td colspan=""><strong>Export Purchase Return: </strong></td>
            <td><strong><textarea name="voyage_export_purch_return" id="voyage_export_purch_return" value="" class="form-control">Any Where in Office’s / Factories / Godown’s To Any Where In World [Suppliers]</textarea></strong></td>
        </tr>
        <tr>
            <td colspan=""><strong>Sale’s Return: </strong></td>
            <td><strong><textarea name="voyage_sales_return" id="voyage_sales_return" value="" class="form-control">From Any Where In India To any Where in Office’s / Factories / Godown in India</textarea></strong></td>
        </tr>

        <tr>
            <td colspan=""><strong>Domestic Purchase: </strong></td>
            <td><strong><input type="text" name="domestic_purch" id="domestic_purch" value="" class="form-control"></strong></td>
        </tr>
        <tr>
            <td colspan=""><strong>International Purchase: </strong></td>
            <td><strong><input type="text" name="international_purch" id="international_purch" value="" class="form-control"></strong></td>
        </tr>
        <tr>
            <td colspan=""><strong>Domestic Sale:</strong></td>
            <td><strong><input type="text" name="domestic_sale" id="domestic_sale" value="" class="form-control"></strong></td>
        </tr>
        <tr>
            <td colspan=""><strong>Export Sale: </strong></td>
            <td><strong><input type="text" name="export_sale" id="export_sale" value="" class="form-control"></strong></td>
        </tr>
        <tr>
            <td colspan=""><strong>Per Bottom Limit:</strong></td>
            <td><strong><input type="text" name="per_bottom_limit" id="per_bottom_limit" value="" class="form-control"></strong></td>
        </tr>
        <tr>
            <td colspan=""><strong>Per Location Limit:</strong></td>
            <td><strong><input type="text" name="per_location_limit" id="per_location_limit" value="" class="form-control"></strong></td>
        </tr>
        <tr>
            <td colspan=""><strong>Per Claim Excess:</strong></td>
            <td><strong><input type="text" name="per_claim_excess" id="per_claim_excess" value="" class="form-control"></strong></td>
        </tr> -->
    </table>

    <table class="table mb-0 table-bordered mt-2 col-md-12">
        <!-- <tr id="declaration_sale_fig_tr">
            <td colspn="2"><strong> Declaration of Sales Figure: </strong></td>
            <td colspn="2"><strong></strong></td>
            <td><strong id=""><input type="text" name="declaration_sale_fig" id="declaration_sale_fig" value="" class="form-control"></strong></td>
        </tr>
        <tr id="annual_turn_over_tr">
            <td colspn="2"><strong> Annual Turn Over: </strong></td>

            <td colspn="2"><strong></strong></td>
            <td><strong id=""><input type="number" name="annual_turn_over" id="annual_turn_over" value="" class="form-control"></strong></td>
        </tr> -->
        <tr id="tot_sum_insured_tr">
            <td colspn="2"><strong> Sum Insured: </strong></td>
            <td colspn="2"><strong></strong></td>
            <td><strong id=""><input type="number" name="tot_sum_insured" id="tot_sum_insured" value="" class="form-control" onkeyup="get_tot_sum_insured()"></strong></td>
        </tr>
        <tr>
            <td colspn="2"><strong> Rate Applied Per Rs.100</strong></td>
            <td colspn="2"><strong><input type="number" name="rate_applied_per" id="rate_applied_per" value="" class="form-control" onkeyup="get_applied_rate_per_tot_sum_insured()"></strong></td>
            <td><strong id=""><input type="number" name="rate_applied" id="rate_applied" value="" class="form-control"></strong></td>
        </tr>
        <tr>
            <td><strong> Add: CGST</strong></td>
            <td><strong id=""><input type="number" name="cgst_fire_per" id="cgst_fire_per" value="" class="form-control" onkeyup="gst_apply()"></strong></td>
            <td><strong id=""><input type="number" name="cgst_rate_tot" id="cgst_rate_tot" value="" class="form-control"></strong></td>
        </tr>
        <tr>
            <td><strong> Add: SGST</strong></td>
            <td><strong id=""><input type="number" name="sgst_fire_per" id="sgst_fire_per" value="" class="form-control" onkeyup="gst_apply()"></strong></td>
            <td><strong id=""><input type="number" name="sgst_rate_tot" id="sgst_rate_tot" value="" class="form-control"></strong></td>
        </tr>
        <tr>
            <td colspn="2"><strong class="text-purple">Final Payable Premium</strong></td>
            <td colspn="2"><strong></strong></td>
            <td><strong id=""><input type="number" name="marine_final_payble_premium" id="marine_final_payble_premium" value="" class="form-control">
                    <input type="hidden" name="rate_applied_hidden" id="rate_applied_hidden" value="">
                    <input type="hidden" name="marine_policy_id" id="marine_policy_id" value="" class="form-control">
                </strong></td>
        </tr>
    </table>
</div>

<script>
    var add_marine_cc = 0;
    var main_Marine = [];
    var count_rc = 0;

    function addsingle_Marine(removeMarineIDS) {
        main_Marine = main_Marine;
        removeMarineIDS = removeMarineIDS.replace('"', '');
        var removeMarineIDS_new = removeMarineIDS.split("_");
        var tr_rc_description = "";
        count_rc = parseInt(removeMarineIDS_new[1]) + 1;

        removeMarineID = removeMarineIDS_new[0] + '_' + count_rc;
        main_Marine.push(removeMarineID);
        $("#addsingle_marine_" + removeMarineIDS).attr("onClick", "addsingle_Marine('" + removeMarineID + "')");
        $("#addsingle_marine_" + removeMarineIDS).attr("id", "addsingle_marine_" + removeMarineID);

        tr_rc_description += '<tr><td><input type="text" class="form-control marine_cc" id="marine_cc_' + removeMarineID + '" name="marine_cc[]" value=""></td><td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_marine_cc_' + removeMarineID + '" onClick=removeMarine_cc("' + removeMarineID + '") ></td></tr>';
        // alert(tr_rc_description);
        $("#append_marine_cc").append(tr_rc_description);
        // $("#append_marine_cc" + removeMarineIDS_new[0]).append(tr_rc_description);
    }

    function removeMarine_cc(add_marine_cc) {
        removeMarineIDS = add_marine_cc.replace('"', '');
        var removeMarineIDS_new = removeMarineIDS.split("_");
        var ids = parseInt(removeMarineIDS_new[1]);
        var index = main_Marine.indexOf(removeMarineIDS);
        // console.log(main_Marine);
        // alert(main_Marine);
        $("#remove_marine_cc_" + add_marine_cc).closest("tr").remove();
        main_Marine.splice(index, 1);
        if (main_Marine.length == 0) {
            add_marine_cc = 0;
            counterArray = [];
            main_Marine = [];
            $("#addMarine_conveyance_coverage").attr("onClick", "addMarine_Conveyance_Coverage(" + add_marine_cc + ")");
            // $("#addMarine_conveyance_coverage").attr("disabled","");
            document.getElementById("addMarine_conveyance_coverage").disabled = false;
        }
    }

    function addMarine_Conveyance_Coverage() {
        // alert(main_Marine);
        $("#plus_btn").empty();
        if (counterArray.length == 0) {
            add_marine_cc = 0;
        }
        var counter = 0;
        var tr_Marine_cc = "";
        var removeMarineIDS = "";
        var i = 0;
        var description_Array = ['By Road', 'By Rail', 'By Sea', 'By Air ', 'By Courier Services ', 'By Clients Own Vehicles', 'By Clients Personal Vehiles', 'By Peronal Hand Carriage (Employee)', 'By Post', 'By Local Angadia ', 'By Private Tempo'];
        for (i; i <= 10; i++) {
            removeMarineIDS = add_marine_cc + '_' + i;
            main_Marine.push(removeMarineIDS);
            tr_Marine_cc += '<tr><td><input type="text" class="form-control marine_cc" id="marine_cc_' + add_marine_cc + '_' + i + '" name="marine_cc[]" value="' + description_Array[i] + '"></td><td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_marine_cc_' + add_marine_cc + '_' + i + '" onClick=removeMarine_cc("' + removeMarineIDS + '") ></td></tr>';
        }
        // tr_Marine_cc = tr_Marine_cc+;
        var plus_btn = '<button class="btn btn-primary btn-sm dripicons-plus  mt-2" id="addsingle_marine_' + removeMarineIDS + '" onClick=addsingle_Marine("' + removeMarineIDS + '") >';
        $("#plus_btn").append(plus_btn);
        $("#addMarine_conveyance_coverage").attr("onClick", "addMarine_Conveyance_Coverage(" + add_marine_cc + ")");
        $("#append_marine_cc").append(tr_Marine_cc);
        counterArray[add_marine_cc] = 0;
        // mainMarineRC.push(add_marine_cc);
        add_marine_cc = add_marine_cc + 1;
        $("#addMarine_conveyance_coverage").attr("disabled", "disabled")
    }
    var actual_data_Marine_con_c = [];

    function Total_Marine_con_c() {
        actual_data_Marine_con_c = [];

        $("#marine_convey_c tr:has(.marine_cc)").each(function(index2, value2) {
            var marine_cc = $(".marine_cc", this).val();
            // alert(marine_cc);
            var key = "0_" + index2;
            actual_data_Marine_con_c.push([key, marine_cc]);
            if (marine_cc == '')
                actual_data_Marine_con_c.splice(key, 1);
        });
        // alert(actual_data_Marine_con_c);
        return actual_data_Marine_con_c;
    }


    $(document).ready(function() {
        // alert("hi");
        var policy_name_txt = $("#policy_name option:selected").text();
        var date_from = $("#date_from").val();
        var date_to = $("#date_to").val();
        // alert(policy_name_txt);
        // $("#period_of_insurance").text(date_from+" To "+date_to);
        if (policy_name_txt == "Open Policy") {
            $("#policy_title").text("");
            $("#policy_title").text("Open Marine Policy Insured :");
            // $("#declaration_sale_fig_tr").hide();
            // $("#annual_turn_over_tr").hide();
            // $("#tot_sum_insured_tr").show();
        } else if (policy_name_txt == "Stop Policy") {
            $("#policy_title").text("");
            $("#policy_title").text("Stop Marine Policy Insured :");
            // $("#declaration_sale_fig_tr").show();
            // $("#annual_turn_over_tr").show();
            // $("#tot_sum_insured_tr").hide();
        }
    });

    function get_tot_sum_insured_bak() {
        var tot_sum_insured = $("#tot_sum_insured").val();
        tot_sum_insured = parseInt(tot_sum_insured);
        if (isNaN(tot_sum_insured))
            tot_sum_insured = 0;
        else
            tot_sum_insured = tot_sum_insured;

        var rate_applied = tot_sum_insured / 100;
        $("#rate_applied").val(rate_applied);
        $("#rate_applied_hidden").val(rate_applied);
        gst_apply();
        // get_applied_rate_per_tot_sum_insured();
    }

    function get_applied_rate_per_tot_sum_insured_bak() {
        var rate_applied = $("#rate_applied").val();
        var rate_applied_hidden = $("#rate_applied_hidden").val();
        var rate_applied_per = $("#rate_applied_per").val();
        rate_applied = parseInt(rate_applied);
        if (isNaN(rate_applied))
            rate_applied = 0;
        else
            rate_applied = rate_applied;

        rate_applied_hidden = parseInt(rate_applied_hidden);
        if (isNaN(rate_applied_hidden))
            rate_applied_hidden = 0;
        else
            rate_applied_hidden = rate_applied_hidden;

        if(rate_applied==""){
            rate_applied=rate_applied_hidden;
        }else{
            rate_applied=rate_applied;
        }

        rate_applied_per = parseInt(rate_applied_per);
        if (isNaN(rate_applied_per))
            rate_applied_per = 0;
        else
            rate_applied_per = rate_applied_per;

        var rate_applied = Math.round((rate_applied * rate_applied_per) / 100);
        $("#rate_applied").val(rate_applied);
        $("rate_applied_hidden").val(rate_applied);
        gst_apply();
    }

    function get_applied_rate_per_tot_sum_insured() {
        var tot_sum_insured = $("#tot_sum_insured").val();
        var rate_applied = $("#rate_applied").val();
        var rate_applied_hidden = $("#rate_applied_hidden").val();
        var rate_applied_per = $("#rate_applied_per").val();

        tot_sum_insured = parseInt(tot_sum_insured);
        if (isNaN(tot_sum_insured))
            tot_sum_insured = 0;
        else
            tot_sum_insured = tot_sum_insured;

        rate_applied = parseInt(rate_applied);
        if (isNaN(rate_applied))
            rate_applied = 0;
        else
            rate_applied = rate_applied;

        rate_applied_hidden = parseInt(rate_applied_hidden);
        if (isNaN(rate_applied_hidden))
            rate_applied_hidden = 0;
        else
            rate_applied_hidden = rate_applied_hidden;

        if(rate_applied==""){
            rate_applied=rate_applied_hidden;
        }else{
            rate_applied=rate_applied;
        }

        rate_applied_per = parseInt(rate_applied_per);
        if (isNaN(rate_applied_per))
            rate_applied_per = 0;
        else
            rate_applied_per = rate_applied_per;

        var rate_applied = Math.round((tot_sum_insured * rate_applied_per) / 100);
        $("#rate_applied").val(rate_applied);
        $("rate_applied_hidden").val(rate_applied);
        gst_apply();
    }

    function gst_apply() {
        var tot_sum_insured = $("#tot_sum_insured").val();
        var cgst_fire_per = $("#cgst_fire_per").val();
        var sgst_fire_per = $("#sgst_fire_per").val();
        var rate_applied = $("#rate_applied").val();

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

        rate_applied = parseInt(rate_applied);
        if (isNaN(rate_applied))
            rate_applied = 0;
        else
            rate_applied = rate_applied;

        if (tot_sum_insured == "") {
            $("#rate_applied").val(0);
            $("#cgst_rate_tot").val(0);
            $("#sgst_rate_tot").val(0);
            $("#marine_final_payble_premium").val(0);
        }

        var cgst_rate_tot = Math.round((rate_applied * cgst_fire_per) / 100);
        var sgst_rate_tot = Math.round((rate_applied * sgst_fire_per) / 100);
        $("#cgst_rate_tot").val(cgst_rate_tot);
        $("#sgst_rate_tot").val(sgst_rate_tot);

        var marine_final_payble_premium = parseInt(rate_applied) + parseInt(cgst_rate_tot) + parseInt(sgst_rate_tot);
        $("#marine_final_payble_premium").val(marine_final_payble_premium);

    }
</script>