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
    <div class="col-md-12">
        <div class="form-group row">
            <label for="" class="col-form-label col-md-5 font-weight-bold">Commercial : </label>
            <div class="col-md-8">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group row">
            <label for="type_of_business" class="col-form-label col-md-2  text-right">Type of Business : </label>
            <div class="col-md-10">
                <input type="text" name="type_of_business" id="type_of_business" class="form-control type_of_business">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group row">
            <label for="insured" class="col-form-label col-md-2  text-right">Insured : </label>
            <div class="col-md-10">
                <input type="text" name="insured" id="insured" class="form-control insured">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group row">
            <label for="corr_address" class="col-form-label col-md-2  text-right">Corr.Address : </label>
            <div class="col-md-10">
                <textarea rows="3" name="corr_address" id="corr_address" class="form-control corr_address"></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group row">
            <label for="period_of_insurance" class="col-form-label col-md-2  text-right">Period of insurance : </label>
            <div class="col-md-10">
                <input type="text" name="period_of_insurance" id="period_of_insurance" class="form-control period_of_insurance">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group row">
            <label for="business_descr_occ" class="col-form-label col-md-2  text-right">Business Description /Occupancy : </label>
            <div class="col-md-10">
                <input type="text" name="business_descr_occ" id="business_descr_occ" class="form-control business_descr_occ">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group row">
            <label for="tariff_occ" class="col-form-label col-md-2  text-right">Tariff Occupancy : </label>
            <div class="col-md-10">
                <input type="text" name="tariff_occ" id="tariff_occ" class="form-control tariff_occ">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label for="risk_code" class="col-form-label col-md-4  text-right">Risk Code : </label>
            <div class="col-md-8">
                <input type="text" name="risk_code" id="risk_code" class="form-control risk_code">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label for="hazard_grade" class="col-form-label col-md-4  text-right">Hazard Grade : </label>
            <div class="col-md-8">
                <input type="text" name="hazard_grade" id="hazard_grade" class="form-control hazard_grade">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group row">
            <label for="risk_location" class="col-form-label col-md-2  text-right">Risk Locations : </label>
            <div class="col-md-10">
                <textarea rows="3" name="risk_location" id="risk_location" class="form-control risk_location"></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group row">
            <label for="name_of_imd" class="col-form-label col-md-2  text-right">Name of the IMD : </label>
            <div class="col-md-10">
                <input type="text" name="name_of_imd" id="name_of_imd" class="form-control name_of_imd">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group row">
            <label for="commission_pay_imd" class="col-form-label col-md-2  text-right">Commission Payable to IMD : </label>
            <div class="col-md-10">
                <input type="text" name="commission_pay_imd" id="commission_pay_imd" class="form-control commission_pay_imd">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group row">
            <label for="validity_of_quote" class="col-form-label col-md-2  text-right">Validity of Quote : </label>
            <div class="col-md-10">
                <input type="text" name="validity_of_quote" id="validity_of_quote" class="form-control validity_of_quote">
            </div>
        </div>
    </div>
    <div class="col-md-12" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="">
            <tbody>
                <tr>
                    <td>
                        <center class="font-weight-bold">Quotation</center>
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">
                        Standard Fire and Special Perils Policy &nbsp; <button class="btn btn-primary btn-sm  Add_stand" id="Add_stand" onClick="AddStand(0)">Add</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-12" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="">
            <thead>
                <tr>
                    <td>Action</td>
                    <td>Description</td>
                    <td>Sum Insured</td>
                    <td>Rate</td>
                    <td>Net Premium</td>
                    <td>Goods & Service Tax</td>
                    <td>Total Premium</td>
                </tr>
            </thead>
            <tbody id="first_table">

            </tbody>
        </table>
    </div>
    <div class="col-md-12" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="">
            <tbody>
                <tr>
                    <td colspan="2" class="font-weight-bold" width="46%">Total</td>
                    <td width="10%"><input type="text" name="stand_last_tot_sum_insu" id="stand_last_tot_sum_insu" class="form-control stand_last_tot_sum_insu"></td>
                    <td width="10%"></td>
                    <td width="10%"><input type="text" name="stand_last_tot_net_premium" id="stand_last_tot_net_premium" class="form-control stand_last_tot_net_premium"></td>
                    <td width="10%"><input type="text" name="stand_last_tot_gst" id="stand_last_tot_gst" class="form-control stand_last_tot_gst"></td>
                    <td width="10%"><input type="text" name="stand_last_tot_premium" id="stand_last_tot_premium" class="form-control stand_last_tot_premium" onkeyup="Last_Tot_premium()"></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" colspan="7"> </td>
                </tr>
                <tr>
                    <td class="font-weight-bold" colspan="7">
                        b) Add on Cover &nbsp; <button class="btn btn-primary btn-sm  Add_cover" id="Add_cover" onClick="AddCover(0)">Add</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-12" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="">
            <thead>
                <tr>
                    <td>Action</td>
                    <td>Description</td>
                    <td>Sum Insured</td>
                    <td>Rate</td>
                    <td>Net Premium</td>
                    <td>Goods & Service Tax</td>
                    <td>Total Premium</td>
                </tr>
            </thead>
            <tbody id="second_table">

            </tbody>
        </table>
    </div>
    <div class="col-md-12" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="">
            <tbody>
                <tr>
                    <td colspan="2" class="font-weight-bold" width="45%">Total</td>
                    <td width="10%"></td>
                    <td width="10%"></td>
                    <td width="10%"><input type="text" name="cover_last_tot_net_premium" id="cover_last_tot_net_premium" class="form-control cover_last_tot_net_premium"></td>
                    <td width="10%"><input type="text" name="cover_last_tot_gst" id="cover_last_tot_gst" class="form-control cover_last_tot_gst"></td>
                    <td width="10%"><input type="text" name="cover_last_tot_premium" id="cover_last_tot_premium" class="form-control cover_last_tot_premium" onkeyup="Last_Tot_premium()"></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" colspan="7"> </td>
                </tr>
                <tr>
                    <td class="font-weight-bold" colspan="6">
                        <center>Total Premium for Fire Section</center>
                    </td>
                    <td><input type="text" name="tot_fire_sect_premium" id="tot_fire_sect_premium" class="form-control tot_fire_sect_premium"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-md-12">
        <table class="table mb-0 table-bordered" id="">
            <tbody>
                <tr>
                    <td>Net premium</td>
                    <td><input type="text" id="tot_net_premium" name="tot_net_premium" class="form-control tot_net_premium"></td>
                </tr>
                <tr>
                    <td>Goods and Service Tax</td>
                    <td><input type="text" id="good_service_tax" name="good_service_tax" class="form-control good_service_tax"></td>
                </tr>
                <tr>
                    <td class="text-purple">Total Premium</td>
                    <td><input type="text" id="tot_final_premium" name="tot_final_premium" class="form-control tot_final_premium">
                        <input type="hidden" name="private_car_policy_id" id="private_car_policy_id" value="">
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</div>

<script>
    var add_stand_counter = 0;
    var add_cover_counter = 0;
    var main_stand = [];
    var main_cover = [];
    var actual_data_Stand = [];
    var actual_data_Cover = [];

    function removeStand(add_stand_counter) {
        $("#remove_stand_" + add_stand_counter).closest("tr").remove();
        main_stand.splice(main_stand.indexOf(add_stand_counter), 1);
        if (main_stand.length == 0) {
            add_stand_counter = 0;
            main_stand = [];
            $("#Add_stand").attr("onClick", "AddStand(" + add_stand_counter + ")");
        }
        Tp_OtherCover_Cal();
        // alert(main_stand);
    }

    function AddStand(add_stand_counter) {
        if (main_stand.length == 0) {
            add_stand_counter = 0;
            main_stand = [];
        }
        main_stand.push(add_stand_counter);
        // alert(main_stand);
        var tr_table = '<tr> <td><center><button class="btn btn-primary btn-sm dripicons-cross" id="remove_stand_' + add_stand_counter + '" onClick="removeStand(' + add_stand_counter + ')" ></button></center></td><td width="43%"><input type="text" name="stand_description[]"  id="stand_description_' + add_stand_counter + '" class="form-control stand_description"></td> <td><input type="text" name="stand_sum_insured[]"  id="stand_sum_insured_' + add_stand_counter + '" class="form-control stand_sum_insured"></td> <td><input type="text" name="stand_rate[]"  id="stand_rate_' + add_stand_counter + '" class="form-control stand_rate" onkeyup="Tp_OtherCover_Cal()"></td><td><input type="text" name="stand_net_premium[]"  id="stand_net_premium_' + add_stand_counter + '" class="form-control stand_net_premium" onkeyup="Tp_OtherCover_Cal()"></td><td><input type="text" name="stand_good_service_tax[]"  id="stand_good_service_tax_' + add_stand_counter + '" class="form-control stand_good_service_tax" onkeyup="Tp_OtherCover_Cal()"></td><td><input type="text" name="stand_tot_premium[]"  id="stand_tot_premium_' + add_stand_counter + '" class="form-control stand_tot_premium" onkeyup="Tp_OtherCover_Cal()"></td> </tr> ';
        $("#first_table").append(tr_table);
        add_stand_counter = add_stand_counter + 1;
        $("#Add_stand").attr("onClick", "AddStand(" + add_stand_counter + ")");
    }

    function removeCover(add_cover_counter) {
        $("#remove_cover_" + add_cover_counter).closest("tr").remove();
        main_cover.splice(main_cover.indexOf(add_cover_counter), 1);
        if (main_cover.length == 0) {
            add_cover_counter = 0;
            main_cover = [];
            $("#Add_cover").attr("onClick", "AddCover(" + add_cover_counter + ")");
        }
        Tp_OtherCover_Cal();
        // alert(main_cover);
    }

    function AddCover(add_cover_counter) {
        if (main_cover.length == 0) {
            add_cover_counter = 0;
            main_cover = [];
        }
        main_cover.push(add_cover_counter);
        // alert(main_cover);
        var tr_table = '<tr> <td><center><button class="btn btn-primary btn-sm dripicons-cross" id="remove_cover_' + add_cover_counter + '" onClick="removeCover(' + add_cover_counter + ')" ></button></center></td><td width="43%"><input type="text" name="cover_description[]"  id="cover_description_' + add_cover_counter + '" class="form-control cover_description"></td> <td><input type="text" name="cover_sum_insured[]"  id="cover_sum_insured_' + add_cover_counter + '" class="form-control cover_sum_insured"></td> <td><input type="text" name="cover_rate[]"  id="cover_rate_' + add_cover_counter + '" class="form-control cover_rate" onkeyup="Tp_OtherCover_Cal()"></td><td><input type="text" name="cover_net_premium[]"  id="cover_net_premium_' + add_cover_counter + '" class="form-control cover_net_premium" onkeyup="Tp_OtherCover_Cal()"></td><td><input type="text" name="cover_good_service_tax[]"  id="cover_good_service_tax_' + add_cover_counter + '" class="form-control cover_good_service_tax" onkeyup="Tp_OtherCover_Cal()"></td><td><input type="text" name="cover_tot_premium[]"  id="cover_tot_premium_' + add_cover_counter + '" class="form-control cover_tot_premium" onkeyup="Tp_OtherCover_Cal()"></td> </tr> ';
        $("#second_table").append(tr_table);
        add_cover_counter = add_cover_counter + 1;
        $("#Add_cover").attr("onClick", "AddCover(" + add_cover_counter + ")");
    }

    function Total_Stand() {
        actual_data_Stand = [];
        $.each(main_Other_Cover, function(key, val) {
            var stand_description = $('#stand_description_' + val).val();
            var stand_sum_insured = $('#stand_sum_insured_' + val).val();
            var stand_rate = $('#stand_rate_' + val).val();
            var stand_net_premium = $('#stand_net_premium_' + val).val();
            var stand_good_service_tax = $('#stand_good_service_tax_' + val).val();
            var stand_tot_premium = $('#stand_tot_premium_' + val).val();
            actual_data_Stand.push([val, stand_description, stand_sum_insured, stand_rate, stand_net_premium, stand_good_service_tax, stand_tot_premium]);
            if (stand_description == '')
                actual_data_Stand.splice(val, 1);
        });
        return actual_data_Stand;
    }

    function Total_Cover() {
        actual_data_Cover = [];
        $.each(main_Other_Cover, function(key, val) {
            var cover_description = $('#cover_description_' + val).val();
            var cover_sum_insured = $('#cover_sum_insured_' + val).val();
            var cover_rate = $('#cover_rate_' + val).val();
            var cover_net_premium = $('#cover_net_premium_' + val).val();
            var cover_good_service_tax = $('#cover_good_service_tax_' + val).val();
            var cover_tot_premium = $('#cover_tot_premium_' + val).val();
            actual_data_Cover.push([val, cover_description, cover_sum_insured, cover_rate, cover_net_premium, cover_good_service_tax, cover_tot_premium]);
            if (cover_description == '')
                actual_data_Cover.splice(val, 1);
        });
        return actual_data_Cover;
    }

    function Last_Tot_premium() {
        var stand_last_tot_premium = $("#stand_last_tot_premium").val();
        var cover_last_tot_premium = $("#cover_last_tot_premium").val();

        stand_last_tot_premium = parseInt(stand_last_tot_premium);
        cover_last_tot_premium = parseInt(cover_last_tot_premium);

        if (isNaN(stand_last_tot_premium))
            stand_last_tot_premium = 0;
        else
            stand_last_tot_premium = stand_last_tot_premium;

        if (isNaN(cover_last_tot_premium))
            cover_last_tot_premium = 0;
        else
            cover_last_tot_premium = cover_last_tot_premium;

        var tot_fire_sect_premium = 0;
        tot_fire_sect_premium = stand_last_tot_premium + cover_last_tot_premium;

        tot_fire_sect_premium = parseInt(tot_fire_sect_premium);

        if (isNaN(tot_fire_sect_premium))
            tot_fire_sect_premium = 0;
        else
            tot_fire_sect_premium = tot_fire_sect_premium;

        $("#tot_fire_sect_premium").val(tot_fire_sect_premium);
    }

    // Third Party Section 

    function Tp_OtherCover_Cal() {
        var plan_name_tot = $("#plan_name_tot").val();
        plan_name_tot = parseInt(plan_name_tot);
        if (isNaN(plan_name_tot))
            plan_name_tot = 0;
        else
            plan_name_tot = plan_name_tot;

        var inputs = $(".other_cover_tot");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var other_cover_tot = $(inputs[i]).val();
            other_cover_tot = parseInt(other_cover_tot);
            if (isNaN(other_cover_tot))
                other_cover_tot = 0;
            else
                other_cover_tot = other_cover_tot;

            total = total + other_cover_tot;
            // $("#other_cover_tot").val(total);
        }
        var tot_anual_cover_premium = 0;
        tot_anual_cover_premium = tot_anual_cover_premium + plan_name_tot + total;

        tot_anual_cover_premium = parseInt(tot_anual_cover_premium);
        if (isNaN(tot_anual_cover_premium))
            tot_anual_cover_premium = 0;
        else
            tot_anual_cover_premium = tot_anual_cover_premium;

        $("#tot_anual_cover_premium").val(tot_anual_cover_premium);
        $("#tot_cover_premium_period").val(tot_anual_cover_premium);
        Final_cal();
    }

    // Final Calculation

    function Final_cal() {
        var od_tot_od_premium_policy_period = $("#od_tot_od_premium_policy_period").val();
        var tp_tot_premium_policy_period = $("#tp_tot_premium_policy_period").val();
        var tot_cover_premium_period = $("#tot_cover_premium_period").val();

        od_tot_od_premium_policy_period = parseInt(od_tot_od_premium_policy_period);
        tp_tot_premium_policy_period = parseInt(tp_tot_premium_policy_period);
        tot_cover_premium_period = parseInt(tot_cover_premium_period);

        if (isNaN(od_tot_od_premium_policy_period))
            od_tot_od_premium_policy_period = 0;
        else
            od_tot_od_premium_policy_period = od_tot_od_premium_policy_period;

        if (isNaN(tp_tot_premium_policy_period))
            tp_tot_premium_policy_period = 0;
        else
            tp_tot_premium_policy_period = tp_tot_premium_policy_period;

        if (isNaN(tot_cover_premium_period))
            tot_cover_premium_period = 0;
        else
            tot_cover_premium_period = tot_cover_premium_period;

        var tot_premium = 0;

        tot_premium = tot_premium + od_tot_od_premium_policy_period + tp_tot_premium_policy_period + tot_cover_premium_period;
        tot_premium = parseInt(tot_premium);
        if (isNaN(tot_premium))
            tot_premium = 0;
        else
            tot_premium = tot_premium;

        $("#tot_premium").val(tot_premium);
        $("#tot_payable_premium").val(tot_premium);
        gst_apply();
    }

    function gst_apply() {
        var tot_premium = $("#tot_premium").val();
        var gst_rate = $("#gst_rate").val();

        gst_rate = parseInt(gst_rate);
        if (isNaN(gst_rate))
            gst_rate = 0;
        else
            gst_rate = gst_rate;

        tot_premium = parseInt(tot_premium);
        if (isNaN(tot_premium))
            tot_premium = 0;
        else
            tot_premium = tot_premium;

        if (tot_premium == "") {
            $("#gst_tot").val(0);
            $("#medi_ind_2020_sgst_tot").val(0);
            $("#tot_payable_premium").val(0);
        }

        var gst_tot = Math.round((tot_premium * gst_rate) / 100);
        $("#gst_tot").val(gst_tot);

        var tot_payable_premium = 0;

        var tot_payable_premium = tot_payable_premium + parseInt(tot_premium) + parseInt(gst_tot);
        tot_payable_premium = parseInt(tot_payable_premium);
        if (isNaN(tot_payable_premium))
            tot_payable_premium = 0;
        else
            tot_payable_premium = tot_payable_premium;
        $("#tot_payable_premium").val(tot_payable_premium);

    }
</script>