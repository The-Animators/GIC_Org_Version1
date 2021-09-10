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
            <label for="" class="col-form-label col-md-5 font-weight-bold">Two Wheeler Calculator : </label>
            <div class="col-md-8">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label for="vehicle_make_model" class="col-form-label col-md-5 font-weight-bold text-right">Vehicle Make & Model : </label>
            <div class="col-md-7">
                <input type="text" name="vehicle_make_model" id="vehicle_make_model" class="form-control vehicle_make_model">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label for="vehicle_reg_no" class="col-form-label col-md-5 font-weight-bold text-right">Vehicle Reg. No : </label>
            <div class="col-md-7">
                <input type="text" name="vehicle_reg_no" id="vehicle_reg_no" class="form-control vehicle_reg_no">
            </div>
        </div>
    </div>

    <div class="col-md-12" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="">
            <tbody>
                <tr>
                    <td>
                        <center class="font-weight-bold">Two Wheeler Calculator (w.e.f 01/07/2002)</center>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center class="font-weight-bold">Basic Details of the Vehicle</center>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-5" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="">
            <tbody>
                <tr>
                    <td>Insured Declared Value</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="insu_declared_val" id="insu_declared_val" class="form-control insu_declared_val"></td>
                </tr>
                <tr>
                    <td>Elec Acc Value</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="elect_acc_val" id="elect_acc_val" class="form-control elect_acc_val"></td>
                </tr>
                <tr>
                    <td>Other Than Elect Accessories</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="other_elect_acc_val" id="other_elect_acc_val" class="form-control other_elect_acc_val"></td>
                </tr>
                <tr>
                    <td colspan="2">Policy Period (Tenure In Years)</td>
                    <td><input style="width: 145px;" type="text" name="policy_period_tenure_years" id="policy_period_tenure_years" class="form-control policy_period_tenure_years"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td rowspan="2"> </td>
                </tr>
                <tr>
                    <td>Previous Policy Expiry Date & Tenure</td>
                    <td><input style="width: 145px;" type="date" name="previous_policy_expiry_date_tenur" id="previous_policy_expiry_date_tenur" class="form-control previous_policy_expiry_date_tenur"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-7" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="">
            <tbody>
                <tr>
                    <td colspan="3">Year Of Manufactur</td>
                    <td><input style="width: 145px;" type="text" name="year_manufact_val" id="year_manufact_val" class="form-control year_manufact_val"></td>
                </tr>
                <tr>
                    <td>RTA</td>
                    <td><input style="width: 145px;" type="text" name="rta_city_code" id="rta_city_code" class="form-control rta_city_code"></td>
                    <td><input style="width: 145px;" type="text" name="rta_city" id="rta_city" class="form-control rta_city"></td>
                    <td><input style="width: 145px;" type="text" name="rta_city_cat" id="rta_city_cat" class="form-control rta_city_cat"></td>
                </tr>
                <tr>
                    <td colspan="3">Cubic Capacity</td>
                    <td><input style="width: 145px;" type="text" name="cubic_capacity_val" id="cubic_capacity_val" class="form-control cubic_capacity_val"></td>
                </tr>
                <tr>
                    <td colspan="3">Type of Cover</td>
                    <td>
                        <input style="width: 145px;" type="text" name="type_of_cover" id="type_of_cover" class="form-control type_of_cover">
                        <!-- Comprehensive -->
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Policy Period</td>
                    <td>Inception Date</td>
                    <td>Expiry Date</td>
                </tr>
                <tr>
                    <td colspan="2"><input style="width: 145px;" type="date" name="policy_period" id="policy_period" class="form-control policy_period"></td>
                    <td><input style="width: 145px;" type="date" name="inception_date" id="inception_date" class="form-control inception_date"></td>
                    <td><input style="width: 145px;" type="date" name="expiry_date" id="expiry_date" class="form-control expiry_date"></td>
                </tr>

            </tbody>
        </table>
    </div>
    <div class="col-md-12" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="">
            <tbody>
                <tr>
                    <td>
                        <center class="font-weight-bold">Premium Calculation</center>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-5" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="">
            <tbody>
                <tr>
                    <td colspan="3" class="font-weight-bold">
                        <center>OD Calculation</center>
                    </td>
                </tr>
                <tr>
                    <td>Basic OD</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="od_basic_od_tot" id="od_basic_od_tot" class="form-control od_basic_od_tot" onkeyup="Basic_OD1_Cal();od_special_load_cal();od_special_disc_cal();"></td>
                </tr>
                <tr>
                    <td>Special Discount</td>
                    <!-- <td></td> -->
                    <td><input style="width: 145px;" type="text" name="od_special_disc_per" id="od_special_disc_per" class="form-control od_special_disc_per" onkeyup="od_special_disc_cal()"></td>
                    <td><input style="width: 145px;" type="text" name="od_special_disc_tot" id="od_special_disc_tot" class="form-control od_special_disc_tot" onkeyup="Basic_OD1_Cal()"></td>
                </tr>
                <tr>
                    <td>Special Loading</td>
                    <!-- <td></td>
                     -->
                     <td><input style="width: 145px;" type="text" name="od_special_load_per" id="od_special_load_per" class="form-control od_special_load_per" onkeyup="od_special_load_cal()"></td>
                    <td><input style="width: 145px;" type="text" name="od_special_load_tot" id="od_special_load_tot" class="form-control od_special_load_tot" onkeyup="Basic_OD1_Cal()"></td>
                </tr>
                <tr>
                    <td>Net Basic OD</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="od_net_basic_od_tot" id="od_net_basic_od_tot" class="form-control od_net_basic_od_tot" onkeyup="Basic_OD1_Cal()"></td>
                </tr>
                <tr>
                    <td>Elec Acc</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="od_elec_acc_tot" id="od_elec_acc_tot" class="form-control od_elec_acc_tot" onkeyup="Basic_OD1_Cal()"></td>
                </tr>
                <tr>
                    <td>Other Than Elec Acc</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="od_other_elec_acc_tot" id="od_other_elec_acc_tot" class="form-control od_other_elec_acc_tot" onkeyup="Basic_OD1_Cal()"></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Basic OD1</td>
                    <td></td>
                    <td><input type="text" name="od_od_basic_od1_tot" id="od_od_basic_od1_tot" class="form-control od_od_basic_od1_tot"></td>
                </tr>
                <tr>
                    <td>Geographical Area</td>
                    <td></td>
                    <td><input type="text" name="od_geographical_area_tot" id="od_geographical_area_tot" class="form-control od_geographical_area_tot" onkeyup="Basic_OD2_Cal()"></td>
                </tr>
                <tr>
                    <td>Rallies (No Of Days)</td>
                    <td></td>
                    <td><input type="text" name="od_rallies_tot" id="od_rallies_tot" class="form-control od_rallies_tot" onkeyup="Basic_OD2_Cal()"></td>
                </tr>
                <tr>
                    <td>Embassy Loading</td>
                    <td></td>
                    <td><input type="text" name="od_embassy_load_tot" id="od_embassy_load_tot" class="form-control od_embassy_load_tot" onkeyup="Basic_OD2_Cal()"></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Basic OD2</td>
                    <td></td>
                    <td><input type="text" name="od_basic_od2_tot" id="od_basic_od2_tot" class="form-control od_basic_od2_tot"> </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Discounts (Minus)</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Anti Theft-IMT-10 (Minus)</td>
                    <td></td>
                    <td><input type="text" name="od_anti_theft_tot" id="od_anti_theft_tot" class="form-control od_anti_theft_tot" onkeyup="Basic_OD3_Cal()"></td>
                </tr>
                <tr>
                    <td>Handicap (Minus)</td>
                    <td></td>
                    <td><input type="text" name="od_handicap_tot" id="od_handicap_tot" class="form-control od_handicap_tot" onkeyup="Basic_OD3_Cal()"></td>
                </tr>
                <tr>
                    <td>AAI (Minus)</td>
                    <td></td>
                    <td><input type="text" name="od_aai_tot" id="od_aai_tot" class="form-control od_aai_tot" onkeyup="Basic_OD3_Cal()"></td>
                </tr>
                <tr>
                    <td>Side Car (Minus)</td>
                    <td></td>
                    <td><input type="text" name="od_side_car_tot" id="od_side_car_tot" class="form-control od_side_car_tot" onkeyup="Basic_OD3_Cal()"></td>
                </tr>
                <tr>
                    <td>Own Premises (Minus)</td>
                    <td></td>
                    <td><input type="text" name="od_own_premises_tot" id="od_own_premises_tot" class="form-control od_own_premises_tot" onkeyup="Basic_OD3_Cal()"></td>
                </tr>
                <tr>
                    <td>Voluntary Excess (Minus)</td>
                    <td></td>
                    <td><input type="text" name="od_voluntary_excess_tot" id="od_voluntary_excess_tot" class="form-control od_voluntary_excess_tot" onkeyup="Basic_OD3_Cal()"></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Basic OD3</td>
                    <td></td>
                    <td><input type="text" name="od_basic_od3_tot" id="od_basic_od3_tot" class="form-control od_basic_od3_tot"></td>
                </tr>
                <tr>
                    <td>NCB</td>
                    <td><input type="text" name="od_ncb_per" id="od_ncb_per" class="form-control od_ncb_per" onkeyup="ncb_Tot_cal()"></td>
                    <td><input type="text" name="od_ncb_tot" id="od_ncb_tot" class="form-control od_ncb_tot" onkeyup="Tot_Anual_premium_cal()"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-purple font-weight-bold">Total OD Premium for the Policy Period</td>
                    <td><input type="text" name="od_tot_od_premium_policy_period" id="od_tot_od_premium_policy_period" class="form-control od_tot_od_premium_policy_period"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-7" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="">
            <tbody>
                <tr>
                    <td colspan="3" class="font-weight-bold">
                        <center>TP Calculation</center>
                    </td>
                </tr>
                <tr>
                    <td>Basic TP</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="tp_basic_tp_tot" id="tp_basic_tp_tot" class="form-control tp_basic_tp_tot" onkeyup=" Basic_TP1_Cal()"></td>
                </tr>
                <tr>
                    <td>Restricted TPPD (Minus)</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="tp_restr_tppd_tot" id="tp_restr_tppd_tot" class="form-control tp_restr_tppd_tot" onkeyup=" Basic_TP1_Cal()"></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Basic TP1</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="tp_basic_tp1_tot" id="tp_basic_tp1_tot" class="form-control tp_basic_tp1_tot"></td>
                </tr>
                <tr>
                    <td>Geographical Area</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="tp_geographical_area_tot" id="tp_geographical_area_tot" class="form-control tp_geographical_area_tot" onkeyup=" Basic_TP2_Cal()"></td>
                </tr>
                <tr>
                    <td>Compulsory PA Own/Driver</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="tp_compul_pa_own_driv_tot" id="tp_compul_pa_own_driv_tot" class="form-control tp_compul_pa_own_driv_tot" onkeyup=" Basic_TP2_Cal()"></td>
                </tr>

                <tr>
                    <td>Unnamed PA</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="tp_unnamed_pa_tot" id="tp_unnamed_pa_tot" class="form-control tp_unnamed_pa_tot" onkeyup=" Basic_TP2_Cal()"></td>
                </tr>

                <tr>
                    <td>LL Drv/Emp IMT 28</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="tp_ll_drv_emp_imt28_tot" id="tp_ll_drv_emp_imt28_tot" class="form-control tp_ll_drv_emp_imt28_tot" onkeyup=" Basic_TP2_Cal()"></td>
                </tr>
                <tr>
                    <td>LL to Other Employees</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="tp_ll_other_emp_tot" id="tp_ll_other_emp_tot" class="form-control tp_ll_other_emp_tot" onkeyup=" Basic_TP2_Cal()"></td>
                </tr>
                <tr>
                    <td>No of Other Employees</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="tp_noof_other_emp_tot" id="tp_noof_other_emp_tot" class="form-control tp_noof_other_emp_tot" onkeyup=" Basic_TP2_Cal()"></td>
                </tr>

                <tr>
                    <td class="font-weight-bold">Basic Tp2</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="tp_basic_tp2_tot" id="tp_basic_tp2_tot" class="form-control tp_basic_tp2_tot"></td>
                </tr>
                <tr>
                    <!-- <td class="font-weight-bold" style="height: 627px;"></td> -->
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-purple">Total TP Premium for the Policy Period</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="tp_tot_premium_policy_period" id="tp_tot_premium_policy_period" class="form-control tp_tot_premium_policy_period"></td>
                </tr>
                <tr>
                    <td colspan="3" class="font-weight-bold">
                        <center>ADD On Covers Premium</center>
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Add On Covers</td>
                    <td class="font-weight-bold">Rate</td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                Plan
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="plan_name" id="plan_name" class="form-control plan_name">
                            </div>
                        </div>
                    </td>
                    <!-- <td><input type="text" name="plan_name_per"  id="plan_name_per" class="form-control plan_name_per"></td> -->
                    <td></td>
                    <td><input type="text" name="plan_name_tot" id="plan_name_tot" class="form-control plan_name_tot" onkeyup="Tp_Plan_Cal()"></td>
                </tr>
                <tr>
                    <td>Other Covers &nbsp; <button class="btn btn-primary btn-sm  Add_other_cover" id="Add_other_cover" onClick="Add_OtherCover(0)">Add Other Covers</button></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table>
                            <tbody id="first_table_tbody">
                            </tbody>
                        </table>
                    </td>
                </tr>
                <!-- <tr>
                    <td class="font-weight-bold text-purple">Total Anual Add On Cover Premium</td>
                    <td></td>
                    <td><input type="text" name="tot_anual_cover_premium" id="tot_anual_cover_premium" class="form-control tot_anual_cover_premium"></td>
                </tr> -->
                <tr>
                    <td class="font-weight-bold text-purple">Total Add On Cover Premium for the Policy Period</td>
                    <td></td>
                    <td><input type="text" name="tot_cover_premium_period" id="tot_cover_premium_period" class="form-control tot_cover_premium_period"></td>
                </tr>
                

            </tbody>
        </table>
    </div>

    <div class="col-md-12">
        <table class="table mb-0 table-bordered" id="">
            <tbody>
                <tr>
                    <td colspan="3">Premium Posting</td>
                </tr>
                <tr>
                    <td>Total Premium</td>
                    <td></td>
                    <td><input type="text" id="tot_premium" name="tot_premium" class="form-control tot_premium"></td>
                </tr>
                <tr>
                    <td colspn=""><strong> CGST:</strong></td>
                    <td><strong id="motor_cgst_rate_td"><input type="text" id="cgst_fire_per" name="motor_cgst_rate" class="form-control" onkeyup="gst_apply()"></td>
                    <!-- <td><strong id=""></strong></td> -->
                    <td><strong id="motor_cgst_tot_td"><input type="text" id="motor_cgst_tot" name="motor_cgst_tot" class="form-control" disabled></td>
                </tr>
                <tr>
                    <td><strong> SGST</strong></td>
                    <td><strong id="motor_sgst_rate_td"><input type="text" id="sgst_fire_per" name="motor_sgst_rate" class="form-control" onkeyup="gst_apply()"></td>
                    <!-- <td><strong id=""></strong></td> -->
                    <td><strong id="motor_sgst_tot_td"><input type="text" id="motor_sgst_tot" name="motor_sgst_tot" class="form-control" disabled></td>
                </tr>
                <!-- <tr>
                    <td>Add GST</td>
                    <td><input type="text" id="gst_rate" name="gst_rate" class="form-control gst_rate" onkeyup="gst_apply()"></td>
                    <td><input type="text" id="gst_tot" name="gst_tot" class="form-control gst_tot"></td>
                </tr> -->
                <tr>
                    <td class="text-purple">Total Payable</td>
                    <td></td>
                    <td><input type="text" id="tot_payable_premium" name="tot_payable_premium" class="form-control tot_payable_premium">
                        <input type="hidden" name="two_wheeler_policy_id" id="two_wheeler_policy_id" value="">
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</div>

<script>
    var add_othercover_counter = 0;
    var main_Other_Cover = [];
    var actual_data_othercover = [];

    function removeOtherCover(add_othercover_counter) {
        $("#remove_othercover_" + add_othercover_counter).closest("tr").remove();
        main_Other_Cover.splice(main_Other_Cover.indexOf(add_othercover_counter), 1);
        if (main_Other_Cover.length == 0) {
            add_othercover_counter = 0;
            main_Other_Cover = [];
            $("#Add_other_cover").attr("onClick", "Add_OtherCover(" + add_othercover_counter + ")");
        }
        Tp_OtherCover_Cal();
        // alert(main_Other_Cover);
    }

    function Add_OtherCover(add_othercover_counter) {
        if (main_Other_Cover.length == 0) {
            add_othercover_counter = 0;
            main_Other_Cover = [];
        }
        main_Other_Cover.push(add_othercover_counter);
        // alert(main_Other_Cover);
        var tr_table = '<tr> <td><center><button class="btn btn-primary btn-sm dripicons-cross" id="remove_othercover_' + add_othercover_counter + '" onClick="removeOtherCover(' + add_othercover_counter + ')" ></button></center></td><td width="43%"><input type="text" name="other_cover_name[]"  id="other_cover_name_' + add_othercover_counter + '" class="form-control other_cover_name"></td> <td><input type="text" name="other_cover_rate[]"  id="other_cover_rat_' + add_othercover_counter + '" class="form-control other_cover_rate"></td> <td><input type="text" name="other_cover_tot[]"  id="other_cover_tot_' + add_othercover_counter + '" class="form-control other_cover_tot" onkeyup="Tp_OtherCover_Cal()"></td> </tr> ';
        $("#first_table_tbody").append(tr_table);
        add_othercover_counter = add_othercover_counter + 1;
        $("#Add_other_cover").attr("onClick", "Add_OtherCover(" + add_othercover_counter + ")");
    }

    function Total_OtherCover() {
        actual_data_othercover = [];
        $.each(main_Other_Cover, function(key, val) {
            var other_cover_name = $('#other_cover_name_' + val).val();
            var other_cover_rate = $('#other_cover_rat_' + val).val();
            var other_cover_tot = $('#other_cover_tot_' + val).val();
            actual_data_othercover.push([val, other_cover_name, other_cover_rate, other_cover_tot]);
            if (other_cover_name == '')
                actual_data_othercover.splice(val, 1);
        });
        return actual_data_othercover;
    }
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
    function Tp_Plan_Cal() {
        var plan_name_tot = $("#plan_name_tot").val();

        plan_name_tot = parseInt(plan_name_tot);

        if (isNaN(plan_name_tot))
            plan_name_tot = 0;
        else
            plan_name_tot = plan_name_tot;

        // alert(plan_name_tot);
        $("#tot_anual_cover_premium").val(plan_name_tot);
        $("#tot_cover_premium_period").val(plan_name_tot);
        // Tp_OtherCover_Cal();
        Final_cal();
    }
    
    function od_special_disc_cal() {
        var od_special_disc_per = $("#od_special_disc_per").val();

        od_special_disc_per = parseInt(od_special_disc_per);
        if (isNaN(od_special_disc_per))
            od_special_disc_per = 0;
        else
            od_special_disc_per = od_special_disc_per;

        var od_basic_od_tot = $("#od_basic_od_tot").val();

        od_basic_od_tot = parseInt(od_basic_od_tot);
        if (isNaN(od_basic_od_tot))
            od_basic_od_tot = 0;
        else
            od_basic_od_tot = od_basic_od_tot;

        var od_special_disc_tot = 0;
        od_special_disc_tot = Math.round((od_basic_od_tot * od_special_disc_per) / 100);

        $("#od_special_disc_tot").val(od_special_disc_tot);
        Basic_OD1_Cal();
    }

    function od_special_load_cal() {
        var od_special_load_per = $("#od_special_load_per").val();

        od_special_load_per = parseInt(od_special_load_per);
        if (isNaN(od_special_load_per))
            od_special_load_per = 0;
        else
            od_special_load_per = od_special_load_per;

        var od_basic_od_tot = $("#od_basic_od_tot").val();

        od_basic_od_tot = parseInt(od_basic_od_tot);
        if (isNaN(od_basic_od_tot))
            od_basic_od_tot = 0;
        else
            od_basic_od_tot = od_basic_od_tot;

        var od_special_load_tot = 0;
        od_special_load_tot = Math.round((od_basic_od_tot * od_special_load_per) / 100);

        $("#od_special_load_tot").val(od_special_load_tot);
        Basic_OD1_Cal();
    }

    function Basic_OD1_Cal() {
        var od_basic_od_tot = $("#od_basic_od_tot").val();
        var od_special_disc_tot = $("#od_special_disc_tot").val();
        var od_special_load_tot = $("#od_special_load_tot").val();
        var od_net_basic_od_tot = $("#od_net_basic_od_tot").val();
        var od_elec_acc_tot = $("#od_elec_acc_tot").val();
        var od_other_elec_acc_tot = $("#od_other_elec_acc_tot").val();

        od_basic_od_tot = parseInt(od_basic_od_tot);
        if (isNaN(od_basic_od_tot))
            od_basic_od_tot = 0;
        else
            od_basic_od_tot = od_basic_od_tot;

        od_special_disc_tot = parseInt(od_special_disc_tot);
        if (isNaN(od_special_disc_tot))
            od_special_disc_tot = 0;
        else
            od_special_disc_tot = od_special_disc_tot;

        od_special_load_tot = parseInt(od_special_load_tot);
        if (isNaN(od_special_load_tot))
            od_special_load_tot = 0;
        else
            od_special_load_tot = od_special_load_tot;

        od_net_basic_od_tot = parseInt(od_net_basic_od_tot);
        if (isNaN(od_net_basic_od_tot))
            od_net_basic_od_tot = 0;
        else
            od_net_basic_od_tot = od_net_basic_od_tot;

        od_other_elec_acc_tot = parseInt(od_other_elec_acc_tot);
        if (isNaN(od_other_elec_acc_tot))
            od_other_elec_acc_tot = 0;
        else
            od_other_elec_acc_tot = od_other_elec_acc_tot;

        od_elec_acc_tot = parseInt(od_elec_acc_tot);
        if (isNaN(od_elec_acc_tot))
            od_elec_acc_tot = 0;
        else
            od_elec_acc_tot = od_elec_acc_tot;

        var od_od_basic_od1_tot = 0;
        od_od_basic_od1_tot = od_od_basic_od1_tot + od_basic_od_tot -(od_special_disc_tot) + od_special_load_tot + od_net_basic_od_tot + od_other_elec_acc_tot + od_elec_acc_tot;

        od_od_basic_od1_tot = parseInt(od_od_basic_od1_tot);
        if (isNaN(od_od_basic_od1_tot))
            od_od_basic_od1_tot = 0;
        else
            od_od_basic_od1_tot = od_od_basic_od1_tot;

        $("#od_od_basic_od1_tot").val(od_od_basic_od1_tot);
        Basic_OD2_Cal();
    }

    function Basic_OD2_Cal() {
        var od_od_basic_od1_tot = $("#od_od_basic_od1_tot").val();
        var od_geographical_area_tot = $("#od_geographical_area_tot").val();
        var od_embassy_load_tot = $("#od_embassy_load_tot").val();
        var od_rallies_tot = $("#od_rallies_tot").val();

        od_od_basic_od1_tot = parseInt(od_od_basic_od1_tot);
        if (isNaN(od_od_basic_od1_tot))
            od_od_basic_od1_tot = 0;
        else
            od_od_basic_od1_tot = od_od_basic_od1_tot;

        od_geographical_area_tot = parseInt(od_geographical_area_tot);
        if (isNaN(od_geographical_area_tot))
            od_geographical_area_tot = 0;
        else
            od_geographical_area_tot = od_geographical_area_tot;

        od_embassy_load_tot = parseInt(od_embassy_load_tot);
        if (isNaN(od_embassy_load_tot))
            od_embassy_load_tot = 0;
        else
            od_embassy_load_tot = od_embassy_load_tot;

        od_rallies_tot = parseInt(od_rallies_tot);
        if (isNaN(od_rallies_tot))
            od_rallies_tot = 0;
        else
            od_rallies_tot = od_rallies_tot;
        var od_basic_od2_tot = 0;
        od_basic_od2_tot = od_basic_od2_tot + od_od_basic_od1_tot + od_geographical_area_tot + od_embassy_load_tot + od_rallies_tot;

        od_basic_od2_tot = parseInt(od_basic_od2_tot);
        if (isNaN(od_basic_od2_tot))
            od_basic_od2_tot = 0;
        else
            od_basic_od2_tot = od_basic_od2_tot;

        $("#od_basic_od2_tot").val(od_basic_od2_tot);

        Basic_OD3_Cal();
    }

    function Basic_OD3_Cal() {
        var od_basic_od2_tot = $("#od_basic_od2_tot").val();
        var od_anti_theft_tot = $("#od_anti_theft_tot").val();
        var od_handicap_tot = $("#od_handicap_tot").val();
        var od_aai_tot = $("#od_aai_tot").val();
        var od_side_car_tot = $("#od_side_car_tot").val();
        var od_own_premises_tot = $("#od_own_premises_tot").val();
        var od_voluntary_excess_tot = $("#od_voluntary_excess_tot").val();

        od_basic_od2_tot = parseInt(od_basic_od2_tot);
        od_anti_theft_tot = parseInt(od_anti_theft_tot);
        od_handicap_tot = parseInt(od_handicap_tot);
        od_aai_tot = parseInt(od_aai_tot);
        od_side_car_tot = parseInt(od_side_car_tot);
        od_own_premises_tot = parseInt(od_own_premises_tot);
        od_voluntary_excess_tot = parseInt(od_voluntary_excess_tot);

        if (isNaN(od_basic_od2_tot))
            od_basic_od2_tot = 0;
        else
            od_basic_od2_tot = od_basic_od2_tot;

        if (isNaN(od_anti_theft_tot))
            od_anti_theft_tot = 0;
        else
            od_anti_theft_tot = od_anti_theft_tot;

        if (isNaN(od_handicap_tot))
            od_handicap_tot = 0;
        else
            od_handicap_tot = od_handicap_tot;

        if (isNaN(od_aai_tot))
            od_aai_tot = 0;
        else
            od_aai_tot = od_aai_tot;

        if (isNaN(od_side_car_tot))
            od_side_car_tot = 0;
        else
            od_side_car_tot = od_side_car_tot;

        if (isNaN(od_own_premises_tot))
            od_own_premises_tot = 0;
        else
            od_own_premises_tot = od_own_premises_tot;

        if (isNaN(od_voluntary_excess_tot))
            od_voluntary_excess_tot = 0;
        else
            od_voluntary_excess_tot = od_voluntary_excess_tot;

        var od_basic_od3_tot = 0;
        od_basic_od3_tot = od_basic_od2_tot - (od_anti_theft_tot + od_handicap_tot + od_aai_tot + od_side_car_tot + od_own_premises_tot + od_voluntary_excess_tot);
        $("#od_basic_od3_tot").val(od_basic_od3_tot);
        ncb_Tot_cal();
    }

    function ncb_Tot_cal() {
        var od_ncb_per = $("#od_ncb_per").val();
        var od_ncb_tot = $("#od_ncb_tot").val();

        od_ncb_per = parseInt(od_ncb_per);
        if (isNaN(od_ncb_per))
            od_ncb_per = 0;
        else
            od_ncb_per = od_ncb_per;

        od_ncb_tot = parseInt(od_ncb_tot);
        if (isNaN(od_ncb_tot))
            od_ncb_tot = 0;
        else
            od_ncb_tot = od_ncb_tot;

        var od_basic_od3_tot = $("#od_basic_od3_tot").val();

        od_basic_od3_tot = parseInt(od_basic_od3_tot);
        if (isNaN(od_basic_od3_tot))
            od_basic_od3_tot = 0;
        else
            od_basic_od3_tot = od_basic_od3_tot;

        var od_ncb_tot = 0;
        od_ncb_tot = Math.round((od_basic_od3_tot * od_ncb_per) / 100);

        od_ncb_tot = parseInt(od_ncb_tot);
        if (isNaN(od_ncb_tot))
            od_ncb_tot = 0;
        else
            od_ncb_tot = od_ncb_tot;

        var od_tot_od_premium_policy_period = 0;
        od_tot_od_premium_policy_period = (od_basic_od3_tot - od_ncb_tot);

        od_tot_od_premium_policy_period = parseInt(od_tot_od_premium_policy_period);
        if (isNaN(od_tot_od_premium_policy_period))
            od_tot_od_premium_policy_period = 0;
        else
            od_tot_od_premium_policy_period = od_tot_od_premium_policy_period;

        $("#od_ncb_tot").val(od_ncb_tot);
        $("#od_tot_od_premium_policy_period").val(od_tot_od_premium_policy_period);
        Tot_Anual_premium_cal();
    }

    function Tot_Anual_premium_cal() {
        var od_basic_od3_tot = $("#od_basic_od3_tot").val();
        var od_ncb_tot = $("#od_ncb_tot").val();

        od_basic_od3_tot = parseInt(od_basic_od3_tot);
        if (isNaN(od_basic_od3_tot))
            od_basic_od3_tot = 0;
        else
            od_basic_od3_tot = od_basic_od3_tot;

        od_ncb_tot = parseInt(od_ncb_tot);
        if (isNaN(od_ncb_tot))
            od_ncb_tot = 0;
        else
            od_ncb_tot = od_ncb_tot;

        var od_tot_od_premium_policy_period = 0;
        od_tot_od_premium_policy_period = od_basic_od3_tot - od_ncb_tot;

        od_tot_od_premium_policy_period = parseInt(od_tot_od_premium_policy_period);
        if (isNaN(od_tot_od_premium_policy_period))
            od_tot_od_premium_policy_period = 0;
        else
            od_tot_od_premium_policy_period = od_tot_od_premium_policy_period;

        $("#od_tot_od_premium_policy_period").val(od_tot_od_premium_policy_period);
        Final_cal();
    }
    // Third Party Section 

    function unnamed_pax_based_on_noseat_limit() {
        var tp_no_seats_limit_person_per = $("#tp_no_seats_limit_person_per").val();

        tp_no_seats_limit_person_per = parseInt(tp_no_seats_limit_person_per);
        if (isNaN(tp_no_seats_limit_person_per))
            tp_no_seats_limit_person_per = 0;
        else
            tp_no_seats_limit_person_per = tp_no_seats_limit_person_per;

        var tp_unnamed_pa_tot = 0;
        tp_unnamed_pa_tot = ((tp_no_seats_limit_person_per) * (25));

        tp_unnamed_pa_tot = parseInt(tp_unnamed_pa_tot);
        if (isNaN(tp_unnamed_pa_tot))
            tp_unnamed_pa_tot = 0;
        else
            tp_unnamed_pa_tot = tp_unnamed_pa_tot;

        $("#tp_unnamed_pa_tot").val(tp_unnamed_pa_tot);

    }

    function no_drv_emp_per_based_on_ll_drv_emp() {
        var tp_no_drv_emp_per = $("#tp_no_drv_emp_per").val();

        tp_no_drv_emp_per = parseInt(tp_no_drv_emp_per);
        if (isNaN(tp_no_drv_emp_per))
            tp_no_drv_emp_per = 0;
        else
            tp_no_drv_emp_per = tp_no_drv_emp_per;

        var tp_ll_drv_emp_tot = 0;
        tp_ll_drv_emp_tot = ((tp_no_drv_emp_per) * (50));

        tp_ll_drv_emp_tot = parseInt(tp_ll_drv_emp_tot);
        if (isNaN(tp_ll_drv_emp_tot))
            tp_ll_drv_emp_tot = 0;
        else
            tp_ll_drv_emp_tot = tp_ll_drv_emp_tot;

        // alert(tp_ll_drv_emp_tot);

        $("#tp_ll_drv_emp_tot").val(tp_ll_drv_emp_tot);

    }

    function Basic_TP1_Cal() {
        var tp_basic_tp_tot = $("#tp_basic_tp_tot").val();
        var tp_restr_tppd_tot = $("#tp_restr_tppd_tot").val();
        var tp_trailer_tot = $("#tp_trailer_tot").val();
        var tp_bi_fuel_tot = $("#tp_bi_fuel_tot").val();

        tp_basic_tp_tot = parseInt(tp_basic_tp_tot);
        tp_restr_tppd_tot = parseInt(tp_restr_tppd_tot);

        if (isNaN(tp_basic_tp_tot))
            tp_basic_tp_tot = 0;
        else
            tp_basic_tp_tot = tp_basic_tp_tot;

        if (isNaN(tp_restr_tppd_tot))
            tp_restr_tppd_tot = 0;
        else
            tp_restr_tppd_tot = tp_restr_tppd_tot;

        var tp_basic_tp1_tot = 0;
        tp_basic_tp1_tot = tp_basic_tp_tot - (tp_restr_tppd_tot);

        tp_basic_tp1_tot = parseInt(tp_basic_tp1_tot);
        if (isNaN(tp_basic_tp1_tot))
            tp_basic_tp1_tot = 0;
        else
            tp_basic_tp1_tot = tp_basic_tp1_tot;

        $("#tp_basic_tp1_tot").val(tp_basic_tp1_tot);
        Basic_TP2_Cal();
    }

    function Basic_TP2_Cal() {
        var tp_basic_tp1_tot = $("#tp_basic_tp1_tot").val();
        var tp_geographical_area_tot = $("#tp_geographical_area_tot").val();
        var tp_compul_pa_own_driv_tot = $("#tp_compul_pa_own_driv_tot").val();
        var tp_unnamed_pa_tot = $("#tp_unnamed_pa_tot").val();
        var tp_ll_drv_emp_imt28_tot = $("#tp_ll_drv_emp_imt28_tot").val();
        var tp_ll_other_emp_tot = $("#tp_ll_other_emp_tot").val();
        var tp_noof_other_emp_tot = $("#tp_noof_other_emp_tot").val();

        tp_basic_tp1_tot = parseInt(tp_basic_tp1_tot);
        tp_geographical_area_tot = parseInt(tp_geographical_area_tot);
        tp_compul_pa_own_driv_tot = parseInt(tp_compul_pa_own_driv_tot);
        tp_unnamed_pa_tot = parseInt(tp_unnamed_pa_tot);
        tp_ll_drv_emp_imt28_tot = parseInt(tp_ll_drv_emp_imt28_tot);
        tp_ll_other_emp_tot = parseInt(tp_ll_other_emp_tot);
        tp_noof_other_emp_tot = parseInt(tp_noof_other_emp_tot);

        if (isNaN(tp_basic_tp1_tot))
            tp_basic_tp1_tot = 0;
        else
            tp_basic_tp1_tot = tp_basic_tp1_tot;

        if (isNaN(tp_geographical_area_tot))
            tp_geographical_area_tot = 0;
        else
            tp_geographical_area_tot = tp_geographical_area_tot;

        if (isNaN(tp_compul_pa_own_driv_tot))
            tp_compul_pa_own_driv_tot = 0;
        else
            tp_compul_pa_own_driv_tot = tp_compul_pa_own_driv_tot;

        if (isNaN(tp_unnamed_pa_tot))
            tp_unnamed_pa_tot = 0;
        else
            tp_unnamed_pa_tot = tp_unnamed_pa_tot;

        if (isNaN(tp_ll_drv_emp_imt28_tot))
            tp_ll_drv_emp_imt28_tot = 0;
        else
            tp_ll_drv_emp_imt28_tot = tp_ll_drv_emp_imt28_tot;

        if (isNaN(tp_ll_other_emp_tot))
            tp_ll_other_emp_tot = 0;
        else
            tp_ll_other_emp_tot = tp_ll_other_emp_tot;

        if (isNaN(tp_noof_other_emp_tot))
            tp_noof_other_emp_tot = 0;
        else
            tp_noof_other_emp_tot = tp_noof_other_emp_tot;

        var tp_basic_tp2_tot = 0;
        tp_basic_tp2_tot = tp_basic_tp1_tot + tp_geographical_area_tot + tp_compul_pa_own_driv_tot + tp_unnamed_pa_tot + tp_ll_drv_emp_imt28_tot + tp_ll_other_emp_tot + tp_noof_other_emp_tot;

        tp_basic_tp2_tot = parseInt(tp_basic_tp2_tot);
        if (isNaN(tp_basic_tp2_tot))
            tp_basic_tp2_tot = 0;
        else
            tp_basic_tp2_tot = tp_basic_tp2_tot;

        $("#tp_basic_tp2_tot").val(tp_basic_tp2_tot);
        $("#tp_tot_premium_policy_period").val(tp_basic_tp2_tot);

        Final_cal();
    }

    // Final Calculation

    function Final_cal() {
        var tot_cover_premium_period = $("#tot_cover_premium_period").val();
        var od_tot_od_premium_policy_period = $("#od_tot_od_premium_policy_period").val();
        var tp_tot_premium_policy_period = $("#tp_tot_premium_policy_period").val();

        tot_cover_premium_period = parseInt(tot_cover_premium_period);
        od_tot_od_premium_policy_period = parseInt(od_tot_od_premium_policy_period);
        tp_tot_premium_policy_period = parseInt(tp_tot_premium_policy_period);

        if (isNaN(tot_cover_premium_period))
            tot_cover_premium_period = 0;
        else
            tot_cover_premium_period = tot_cover_premium_period;

        if (isNaN(od_tot_od_premium_policy_period))
            od_tot_od_premium_policy_period = 0;
        else
            od_tot_od_premium_policy_period = od_tot_od_premium_policy_period;

        if (isNaN(tp_tot_premium_policy_period))
            tp_tot_premium_policy_period = 0;
        else
            tp_tot_premium_policy_period = tp_tot_premium_policy_period;

        var tot_premium = 0;

        tot_premium = tot_premium + od_tot_od_premium_policy_period + tp_tot_premium_policy_period +tot_cover_premium_period;
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

        tot_premium = parseInt(tot_premium);
        if (isNaN(tot_premium))
            tot_premium = 0;
        else
            tot_premium = tot_premium;

        if (tot_premium == "") {
            $("#motor_cgst_tot").val(0);
            $("#motor_sgst_tot").val(0);
            $("#tot_payable_premium").val(0);
        }

        var motor_cgst_tot = Math.round((tot_premium * cgst_fire_per) / 100);
        var motor_sgst_tot = Math.round((tot_premium * sgst_fire_per) / 100);
        $("#motor_cgst_tot").val(motor_cgst_tot);
        $("#motor_sgst_tot").val(motor_sgst_tot);

        var tot_payable_premium = parseInt(tot_premium) + parseInt(motor_cgst_tot) + parseInt(motor_sgst_tot);
        $("#tot_payable_premium").val(tot_payable_premium);

    }
    
    function gst_apply_bak() {
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