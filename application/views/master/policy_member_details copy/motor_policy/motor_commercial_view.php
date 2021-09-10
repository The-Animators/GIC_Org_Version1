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
            <label for="" class="col-form-label col-md-5 font-weight-bold">Commercial Vehicle : </label>
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
                        <center class="font-weight-bold">A1-GOODS CARRYING-PUBLIC CARRIERS (OTHER THAN 3 WHEELERS)</center>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center class="font-weight-bold">Comprehensive Comprehensive Policy (Own damage + Third Party)</center>
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
                    <td>Insured Declared Value-IDV</td>
                    <!-- <td></td> -->
                    <td><input style="width: 145px;" type="text" name="insu_declared_val" id="insu_declared_val" class="form-control insu_declared_val"></td>
                </tr>
                <tr>
                    <td>Electrical Accessories value</td>
                    <!-- <td></td> -->
                    <td><input style="width: 145px;" type="text" name="elect_acc_val" id="elect_acc_val" class="form-control elect_acc_val"></td>
                </tr>
                <tr>
                    <td>LPG/CNG IDV ( If inbuilt-IDV not required)</td>
                    <!-- <td></td> -->
                    <td><input style="width: 145px;" type="text" name="lpg_cng_idv_val" id="lpg_cng_idv_val" class="form-control lpg_cng_idv_val"></td>
                </tr>
                <tr>
                    <td>Consolidated Trailers IDV </td>
                    <!-- <td></td> -->
                    <td></td>
                </tr>
                <tr>
                    <td>No of Trailers</td>
                    <!-- <td></td> -->
                    <td> </td>
                </tr>
                <tr>
                    <td>E-Carts / Except E-Carts</td>
                    <!-- <td></td> -->
                    <td>E-Carts</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-7" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="">
            <tbody>
                <tr>
                    <td colspan="3">Vehicle Manufacturing Year</td>
                    <td><input style="width: 145px;" type="text" name="year_manufact_val" id="year_manufact_val" class="form-control year_manufact_val"></td>
                </tr>
                <tr>
                    <td> Zone</td>
                    <td><input style="width: 145px;" type="text" name="zone_city_code" id="zone_city_code" class="form-control zone_city_code"></td>
                    <td><input style="width: 145px;" type="text" name="zone_city" id="zone_city" class="form-control zone_city"></td>
                    <td><input style="width: 145px;" type="text" name="zone_city_cat" id="zone_city_cat" class="form-control zone_city_cat"></td>
                </tr>
                <tr>
                    <td colspan="3">GVW</td>
                    <td><input style="width: 145px;" type="text" name="gvw_val" id="gvw_val" class="form-control gvw_val"></td>
                </tr>
                <tr>
                    <td colspan="3">Class</td>
                    <td><input style="width: 145px;" type="text" name="class_val" id="class_val" class="form-control class_val"></td>
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
                    <td colspan="2"><input style="width: 145px;" type="text" name="policy_period" id="policy_period" class="form-control policy_period"></td>
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
                        <center>OWN DAMAGE PREMIUM (OD)</center>
                    </td>
                </tr>
                <tr>
                    <td>Basic OD</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="od_basic_od_tot" id="od_basic_od_tot" class="form-control od_basic_od_tot" onkeyup="Basic_OD1_Cal();"></td>
                </tr>
                <tr>
                    <td>Elec Acc</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="od_elec_acc_tot" id="od_elec_acc_tot" class="form-control od_elec_acc_tot" onkeyup="Basic_OD1_Cal()"></td>
                </tr>
                <tr>
                    <td>Trailer</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="od_trailer_tot" id="od_trailer_tot" class="form-control od_trailer_tot" onkeyup="Basic_OD1_Cal()"></td>
                </tr>
                <tr>
                    <td>Bi-fuel Kit</td>
                    <td></td>
                    <td><input style="width: 145px;" type="text" name="od_bi_fuel_kit_tot" id="od_bi_fuel_kit_tot" class="form-control od_bi_fuel_kit_tot" onkeyup="Basic_OD1_Cal()"></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Basic OD1</td>
                    <td></td>
                    <td><input type="text" name="od_od_basic_od1_tot" id="od_od_basic_od1_tot" class="form-control od_od_basic_od1_tot"></td>
                </tr>
                <tr>
                    <td>Geog area</td>
                    <td></td>
                    <td><input type="text" name="od_geog_area_tot" id="od_geog_area_tot" class="form-control od_geog_area_tot" onkeyup="Basic_OD2_Cal()"></td>
                </tr>
                <tr>
                    <td>Fibre Glass Tank</td>
                    <td></td>
                    <td><input type="text" name="od_fiber_glass_tank_tot" id="od_fiber_glass_tank_tot" class="form-control od_fiber_glass_tank_tot" onkeyup="Basic_OD2_Cal()"></td>
                </tr>
                <tr>
                    <td>IMT 23-Cover for mud-guards etc</td>
                    <td></td>
                    <td><input type="text" name="od_imt_cover_mud_guard_tot" id="od_imt_cover_mud_guard_tot" class="form-control od_imt_cover_mud_guard_tot" onkeyup="Basic_OD2_Cal()"></td>
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
                    <td>
                        <!-- Anti Theft-IMT-10 (Minus) -->
                    </td>
                    <td></td>
                    <td>
                        <!-- <input type="text" name="od_anti_theft_tot" id="od_anti_theft_tot" class="form-control od_anti_theft_tot" onkeyup="Basic_OD3_Cal()"> -->
                    </td>
                </tr>

                <tr>
                    <td class="font-weight-bold">Basic OD3</td>
                    <td></td>
                    <td><input type="text" name="od_basic_od3_tot" id="od_basic_od3_tot" class="form-control od_basic_od3_tot"></td>
                </tr>
                <tr>
                    <td>NCB</td>
                    <td><input type="text" name="od_ncb_per" id="od_ncb_per" class="form-control od_ncb_per" onkeyup="ncb_Tot_cal()"></td>
                    <td><input type="text" name="od_ncb_tot" id="od_ncb_tot" class="form-control od_ncb_tot" onkeyup="Tot_Anual_premium_cal();"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-purple font-weight-bold">Annual OD Premium</td>
                    <td><input type="text" name="od_tot_anual_od_premium" id="od_tot_anual_od_premium" class="form-control od_tot_anual_od_premium"></td>
                </tr>
                <tr>
                    <td>Special Discount</td>
                    <td><input style="width: 145px;" type="text" name="od_special_disc_per" id="od_special_disc_per" class="form-control od_special_disc_per" onkeyup="od_special_disc_cal()"></td>
                    <td><input style="width: 145px;" type="text" name="od_special_disc_tot" id="od_special_disc_tot" class="form-control od_special_disc_tot" onkeyup="Basic_OD1_Cal()"></td>
                </tr>
                <tr>
                    <td>Special Loading</td>
                    <td><input style="width: 145px;" type="text" name="od_special_load_per" id="od_special_load_per" class="form-control od_special_load_per" onkeyup="od_special_load_cal()"></td>
                    <td><input style="width: 145px;" type="text" name="od_special_load_tot" id="od_special_load_tot" class="form-control od_special_load_tot" onkeyup="Basic_OD1_Cal()"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-purple font-weight-bold">Total OD Premium</td>
                    <td><input type="text" name="od_tot_od_premium" id="od_tot_od_premium" class="form-control od_tot_od_premium"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-7" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="">
            <tbody>
                <tr>
                    <td colspan="3" class="font-weight-bold">
                        <center>THIRD PARTY PREMIUM (TP)</center>
                    </td>
                </tr>
                <tr>
                    <td>Basic TP</td>
                    <td><input style="width: 145px;" type="text" name="tp_basic_tp_tot" id="tp_basic_tp_tot" class="form-control tp_basic_tp_tot" onkeyup=" Basic_TP1_Cal()"></td>
                </tr>
                <tr>
                    <td>Restricted TPPD (Minus)</td>
                    <td><input style="width: 145px;" type="text" name="tp_restr_tppd_tot" id="tp_restr_tppd_tot" class="form-control tp_restr_tppd_tot" onkeyup=" Basic_TP1_Cal()"></td>
                </tr>
                <tr>
                    <td>Trailer</td>
                    <td><input style="width: 145px;" type="text" name="tp_trailer_tot" id="tp_trailer_tot" class="form-control tp_trailer_tot" onkeyup=" Basic_TP1_Cal()"></td>
                </tr>
                <tr>
                    <td>Bi-fuel kit</td>
                    <td><input style="width: 145px;" type="text" name="tp_bi_fuel_kit_tot" id="tp_bi_fuel_kit_tot" class="form-control tp_bi_fuel_kit_tot" onkeyup=" Basic_TP1_Cal()"></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Basic TP1</td>
                    <td><input style="width: 145px;" type="text" name="tp_basic_tp1_tot" id="tp_basic_tp1_tot" class="form-control tp_basic_tp1_tot"></td>
                </tr>
                <tr>
                    <td>Geog Area</td>
                    <td><input style="width: 145px;" type="text" name="tp_geog_area_tot" id="tp_geog_area_tot" class="form-control tp_geog_area_tot" onkeyup=" Basic_TP2_Cal()"></td>
                </tr>
                <tr>
                    <td>Compulsory PA Own/Driver</td>
                    <td><input style="width: 145px;" type="text" name="tp_compul_pa_own_driv_tot" id="tp_compul_pa_own_driv_tot" class="form-control tp_compul_pa_own_driv_tot" onkeyup=" Basic_TP2_Cal()"></td>
                </tr>

                <tr>
                    <td>PA to paid driver - IMT17</td>
                    <td><input style="width: 145px;" type="text" name="tp_pa_paid_driver_tot" id="tp_pa_paid_driver_tot" class="form-control tp_pa_paid_driver_tot" onkeyup=" Basic_TP2_Cal()"></td>
                </tr>

                <tr>
                    <td>LL to emp/non-fare paying pax (other than WC)</td>
                    <td><input style="width: 145px;" type="text" name="tp_ll_emp_non_fare_tot" id="tp_ll_emp_non_fare_tot" class="form-control tp_ll_emp_non_fare_tot" onkeyup=" Basic_TP2_Cal()"></td>
                </tr>
                <tr>
                    <td>LL to driver/cleaner/conductor</td>
                    <td><input style="width: 145px;" type="text" name="tp_ll_driver_cleaner_tot" id="tp_ll_driver_cleaner_tot" class="form-control tp_ll_driver_cleaner_tot" onkeyup=" Basic_TP2_Cal()"></td>
                </tr>
                <tr>
                    <td>LL to person for operation/maintenance</td>
                    <td><input style="width: 145px;" type="text" name="tp_ll_person_operation_tot" id="tp_ll_person_operation_tot" class="form-control tp_ll_person_operation_tot" onkeyup=" Basic_TP2_Cal()"></td>
                </tr>

                <tr>
                    <td class="font-weight-bold">Basic Tp2</td>
                    <td><input style="width: 145px;" type="text" name="tp_basic_tp2_tot" id="tp_basic_tp2_tot" class="form-control tp_basic_tp2_tot"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-purple">Total TP Premium</td>
                    <td><input style="width: 145px;" type="text" name="tp_tot_premium" id="tp_tot_premium" class="form-control tp_tot_premium"></td>
                </tr>
                <tr>
                    <td colspan="3" class="font-weight-bold">
                        <center>ADD On</center>
                    </td>
                </tr>
                <tr>
                    <td>Consumables</td>
                    <td><input type="text" name="tp_consumables" id="tp_consumables" class="form-control tp_consumables" onkeyup="Add_on_Cal()"></td>
                </tr>
                <tr>
                    <td>Zero Depreciation</td>
                    <td><input type="text" name="tp_zero_depreciation" id="tp_zero_depreciation" class="form-control tp_zero_depreciation" onkeyup="Add_on_Cal()"></td>
                </tr>
                <tr>
                    <td>Road Side Assistance</td>
                    <td><input type="text" name="tp_road_side_ass" id="tp_road_side_ass" class="form-control tp_road_side_ass" onkeyup="Add_on_Cal()"></td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-purple">Total Add On Premium</td>
                    <td><input type="text" name="tp_tot_addon_premium" id="tp_tot_addon_premium" class="form-control tp_tot_addon_premium"></td>
                </tr>


            </tbody>
        </table>
    </div>

    <div class="col-md-12">
        <table class="table mb-0 table-bordered" id="">
            <tbody>
                <tr>
                    <td></td>
                    <td>Premium</td>
                    <td>GST Rate</td>
                    <td>GST Amount</td>
                    <td>Final Premium</td>
                </tr>
                <tr>
                    <td>Own Damage (OWD)</td>
                    <td><input type="text" name="tot_owd_premium" id="tot_owd_premium" class="form-control tot_owd_premium" onkeyup="tot_premium_Cal()"></td>
                    <td>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-4 font-weight-bold">CGST Rate : </label>
                                    <div class="col-md-8">
                                        <input type="text" name="tot_owd_cgst_rate" id="tot_owd_cgst_rate" class="form-control tot_owd_cgst_rate" onkeyup="owd_gst_apply()">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-4 font-weight-bold">SGST Rate : </label>
                                    <div class="col-md-8">
                                        <input type="text" name="tot_owd_sgst_rate" id="tot_owd_sgst_rate" class="form-control tot_owd_sgst_rate" onkeyup="owd_gst_apply()">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><input type="text" name="tot_owd_gst" id="tot_owd_gst" class="form-control tot_owd_gst"></td>
                    <td><input type="text" name="tot_owd_final" id="tot_owd_final" class="form-control tot_owd_final"></td>
                </tr>
                <tr>
                    <td>Add On (OWD)</td>
                    <td><input type="text" name="tot_owd_addon_premium" id="tot_owd_addon_premium" class="form-control tot_owd_addon_premium" onkeyup="tot_premium_Cal()"></td>
                    <td>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-4 font-weight-bold">CGST Rate : </label>
                                    <div class="col-md-8">
                                        <input type="text" name="tot_owd_addon_cgst_rate" id="tot_owd_addon_cgst_rate" class="form-control tot_owd_addon_cgst_rate" onkeyup="owd_addon_gst_apply()">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-4 font-weight-bold">SGST Rate : </label>
                                    <div class="col-md-8">
                                        <input type="text" name="tot_owd_addon_sgst_rate" id="tot_owd_addon_sgst_rate" class="form-control tot_owd_addon_sgst_rate" onkeyup="owd_addon_gst_apply()">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><input type="text" name="tot_owd_addon_gst" id="tot_owd_addon_gst" class="form-control tot_owd_addon_gst"></td>
                    <td><input type="text" name="tot_owd_addon_final" id="tot_owd_addon_final" class="form-control tot_owd_addon_final"></td>
                </tr>
                <tr>
                    <td>Basic TP (BTP)</td>
                    <td><input type="text" name="tot_btp_premium" id="tot_btp_premium" class="form-control tot_btp_premium" onkeyup="tot_premium_Cal()"></td>
                    <td>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-4 font-weight-bold">CGST Rate : </label>
                                    <div class="col-md-8">
                                        <input type="text" name="tot_btp_cgst_rate" id="tot_btp_cgst_rate" class="form-control tot_btp_cgst_rate" onkeyup="btp_gst_apply()">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-4 font-weight-bold">SGST Rate : </label>
                                    <div class="col-md-8">
                                        <input type="text" name="tot_btp_sgst_rate" id="tot_btp_sgst_rate" class="form-control tot_btp_sgst_rate" onkeyup="btp_gst_apply()">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><input type="text" name="tot_btp_gst" id="tot_btp_gst" class="form-control tot_btp_gst"></td>
                    <td><input type="text" name="tot_btp_final" id="tot_btp_final" class="form-control tot_btp_final"></td>
                </tr>
                <tr>
                    <td>Other TP (TDP)</td>
                    <td><input type="text" name="tot_other_tp_premium" id="tot_other_tp_premium" class="form-control tot_other_tp_premium" onkeyup="tot_premium_Cal()"></td>
                    <td>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-4 font-weight-bold">CGST Rate : </label>
                                    <div class="col-md-8">
                                        <input type="text" name="tot_other_tp_cgst_rate" id="tot_other_tp_cgst_rate" class="form-control tot_other_tp_cgst_rate" onkeyup="other_gst_apply()">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-4 font-weight-bold">SGST Rate : </label>
                                    <div class="col-md-8">
                                        <input type="text" name="tot_other_tp_sgst_rate" id="tot_other_tp_sgst_rate" class="form-control tot_other_tp_sgst_rate" onkeyup="other_gst_apply()">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><input type="text" name="tot_other_tp_gst" id="tot_other_tp_gst" class="form-control tot_other_tp_gst"></td>
                    <td><input type="text" name="tot_other_tp_final" id="tot_other_tp_final" class="form-control tot_other_tp_final"></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td><input type="text" id="tot_premium" name="tot_premium" class="form-control tot_premium"></td>
                    <td></td>
                    <td><input type="text" id="tot_gst_amt" name="tot_gst_amt" class="form-control tot_gst_amt"></td>
                    <td><input type="text" id="tot_final_premium" name="tot_final_premium" class="form-control tot_final_premium"></td>
                </tr>
                <tr>
                    <td class="text-purple font-weight-bold">Total Payable</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="text" id="tot_payable_premium" name="tot_payable_premium" class="form-control tot_payable_premium">
                        <input type="hidden" name="commercial_policy_id" id="commercial_policy_id" value="">
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</div>

<script>
    function Basic_OD1_Cal() {
        var od_basic_od_tot = $("#od_basic_od_tot").val();
        var od_elec_acc_tot = $("#od_elec_acc_tot").val();
        var od_trailer_tot = $("#od_trailer_tot").val();
        var od_bi_fuel_kit_tot = $("#od_bi_fuel_kit_tot").val();

        od_basic_od_tot = parseInt(od_basic_od_tot);
        if (isNaN(od_basic_od_tot))
            od_basic_od_tot = 0;
        else
            od_basic_od_tot = od_basic_od_tot;

        od_elec_acc_tot = parseInt(od_elec_acc_tot);
        if (isNaN(od_elec_acc_tot))
            od_elec_acc_tot = 0;
        else
            od_elec_acc_tot = od_elec_acc_tot;

        od_trailer_tot = parseInt(od_trailer_tot);
        if (isNaN(od_trailer_tot))
            od_trailer_tot = 0;
        else
            od_trailer_tot = od_trailer_tot;

        od_bi_fuel_kit_tot = parseInt(od_bi_fuel_kit_tot);
        if (isNaN(od_bi_fuel_kit_tot))
            od_bi_fuel_kit_tot = 0;
        else
            od_bi_fuel_kit_tot = od_bi_fuel_kit_tot;

        var od_od_basic_od1_tot = 0;
        od_od_basic_od1_tot = od_od_basic_od1_tot + od_basic_od_tot + od_elec_acc_tot + od_trailer_tot + od_bi_fuel_kit_tot;

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
        var od_geog_area_tot = $("#od_geog_area_tot").val();
        var od_fiber_glass_tank_tot = $("#od_fiber_glass_tank_tot").val();
        var od_imt_cover_mud_guard_tot = $("#od_imt_cover_mud_guard_tot").val();

        od_od_basic_od1_tot = parseInt(od_od_basic_od1_tot);
        if (isNaN(od_od_basic_od1_tot))
            od_od_basic_od1_tot = 0;
        else
            od_od_basic_od1_tot = od_od_basic_od1_tot;

        od_geog_area_tot = parseInt(od_geog_area_tot);
        if (isNaN(od_geog_area_tot))
            od_geog_area_tot = 0;
        else
            od_geog_area_tot = od_geog_area_tot;

        od_fiber_glass_tank_tot = parseInt(od_fiber_glass_tank_tot);
        if (isNaN(od_fiber_glass_tank_tot))
            od_fiber_glass_tank_tot = 0;
        else
            od_fiber_glass_tank_tot = od_fiber_glass_tank_tot;

        od_imt_cover_mud_guard_tot = parseInt(od_imt_cover_mud_guard_tot);
        if (isNaN(od_imt_cover_mud_guard_tot))
            od_imt_cover_mud_guard_tot = 0;
        else
            od_imt_cover_mud_guard_tot = od_imt_cover_mud_guard_tot;

        var od_basic_od2_tot = 0;
        od_basic_od2_tot = od_basic_od2_tot + od_od_basic_od1_tot + od_geog_area_tot + od_fiber_glass_tank_tot + od_imt_cover_mud_guard_tot;

        od_basic_od2_tot = parseInt(od_basic_od2_tot);
        if (isNaN(od_basic_od2_tot))
            od_basic_od2_tot = 0;
        else
            od_basic_od2_tot = od_basic_od2_tot;

        $("#od_basic_od2_tot").val(od_basic_od2_tot);
        $("#od_basic_od3_tot").val(od_basic_od2_tot);

        // Basic_OD3_Cal();
        ncb_Tot_cal();
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

        od_ncb_tot = Math.round((od_basic_od3_tot * od_ncb_per) / 100);

        od_ncb_tot = parseInt(od_ncb_tot);
        if (isNaN(od_ncb_tot))
            od_ncb_tot = 0;
        else
            od_ncb_tot = od_ncb_tot;

        var od_tot_anual_od_premium = 0;
        od_tot_anual_od_premium = (od_basic_od3_tot - od_ncb_tot);

        od_tot_anual_od_premium = parseInt(od_tot_anual_od_premium);
        if (isNaN(od_tot_anual_od_premium))
            od_tot_anual_od_premium = 0;
        else
            od_tot_anual_od_premium = od_tot_anual_od_premium;

        $("#od_ncb_tot").val(od_ncb_tot);
        $("#od_tot_anual_od_premium").val(od_tot_anual_od_premium);
        $("#od_tot_od_premium").val(od_tot_anual_od_premium);
        // Tot_Anual_premium_cal();
    }

    function od_special_disc_cal() {
        var od_special_disc_per = $("#od_special_disc_per").val();

        od_special_disc_per = parseInt(od_special_disc_per);
        if (isNaN(od_special_disc_per))
            od_special_disc_per = 0;
        else
            od_special_disc_per = od_special_disc_per;

        var od_tot_anual_od_premium = $("#od_tot_anual_od_premium").val();

        od_tot_anual_od_premium = parseInt(od_tot_anual_od_premium);
        if (isNaN(od_tot_anual_od_premium))
            od_tot_anual_od_premium = 0;
        else
            od_tot_anual_od_premium = od_tot_anual_od_premium;

        var od_special_disc_tot = 0;
        od_special_disc_tot = Math.round((od_tot_anual_od_premium * od_special_disc_per) / 100);

        $("#od_special_disc_tot").val(od_special_disc_tot);
        // Basic_OD1_Cal();
        Tot_Anual_premium_cal();
    }

    function od_special_load_cal() {
        var od_special_load_per = $("#od_special_load_per").val();

        od_special_load_per = parseInt(od_special_load_per);
        if (isNaN(od_special_load_per))
            od_special_load_per = 0;
        else
            od_special_load_per = od_special_load_per;

        var od_tot_anual_od_premium = $("#od_tot_anual_od_premium").val();

        od_tot_anual_od_premium = parseInt(od_tot_anual_od_premium);
        if (isNaN(od_tot_anual_od_premium))
            od_tot_anual_od_premium = 0;
        else
            od_tot_anual_od_premium = od_tot_anual_od_premium;

        var od_special_load_tot = 0;
        od_special_load_tot = Math.round((od_tot_anual_od_premium * od_special_load_per) / 100);

        $("#od_special_load_tot").val(od_special_load_tot);
        // Basic_OD1_Cal();
        Tot_Anual_premium_cal();
    }

    function Tot_Anual_premium_cal() {
        var od_tot_anual_od_premium = $("#od_tot_anual_od_premium").val();
        var od_special_disc_tot = $("#od_special_disc_tot").val();
        var od_special_load_tot = $("#od_special_load_tot").val();

        od_tot_anual_od_premium = parseInt(od_tot_anual_od_premium);
        if (isNaN(od_tot_anual_od_premium))
            od_tot_anual_od_premium = 0;
        else
            od_tot_anual_od_premium = od_tot_anual_od_premium;

            // alert(od_tot_anual_od_premium);

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

        var discount = 0;
        discount = od_special_disc_tot + od_special_load_tot;

        discount = parseInt(discount);
        if (isNaN(discount))
            discount = 0;
        else
            discount = discount;

        var od_tot_od_premium = 0;
        od_tot_od_premium = od_tot_anual_od_premium - discount;

        od_tot_od_premium = parseInt(od_tot_od_premium);
        if (isNaN(od_tot_od_premium))
            od_tot_od_premium = 0;
        else
            od_tot_od_premium = od_tot_od_premium;
        // alert(discount);
        // alert(od_tot_anual_od_premium);
        // alert(od_tot_od_premium);
        $("#od_tot_od_premium").val(od_tot_od_premium);
        $("#tot_owd_premium").val(od_tot_od_premium);
        tot_premium_Cal();
        Final_cal();
    }
    // Third Party Section 

    function Basic_TP1_Cal() {
        var tp_basic_tp_tot = $("#tp_basic_tp_tot").val();
        var tp_restr_tppd_tot = $("#tp_restr_tppd_tot").val();
        var tp_trailer_tot = $("#tp_trailer_tot").val();
        var tp_bi_fuel_kit_tot = $("#tp_bi_fuel_kit_tot").val();

        tp_basic_tp_tot = parseInt(tp_basic_tp_tot);
        tp_restr_tppd_tot = parseInt(tp_restr_tppd_tot);
        tp_trailer_tot = parseInt(tp_trailer_tot);
        tp_bi_fuel_kit_tot = parseInt(tp_bi_fuel_kit_tot);

        if (isNaN(tp_basic_tp_tot))
            tp_basic_tp_tot = 0;
        else
            tp_basic_tp_tot = tp_basic_tp_tot;

        if (isNaN(tp_restr_tppd_tot))
            tp_restr_tppd_tot = 0;
        else
            tp_restr_tppd_tot = tp_restr_tppd_tot;

        if (isNaN(tp_trailer_tot))
            tp_trailer_tot = 0;
        else
            tp_trailer_tot = tp_trailer_tot;

        if (isNaN(tp_bi_fuel_kit_tot))
            tp_bi_fuel_kit_tot = 0;
        else
            tp_bi_fuel_kit_tot = tp_bi_fuel_kit_tot;

        var tp_basic_tp1_tot = 0;
        var total = 0;
        total = tp_basic_tp_tot + tp_trailer_tot + tp_bi_fuel_kit_tot;

        total = parseInt(total);
        if (isNaN(total))
            total = 0;
        else
            total = total;

        tp_basic_tp1_tot = total - (tp_restr_tppd_tot);

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
        var tp_geog_area_tot = $("#tp_geog_area_tot").val();
        var tp_compul_pa_own_driv_tot = $("#tp_compul_pa_own_driv_tot").val();
        var tp_pa_paid_driver_tot = $("#tp_pa_paid_driver_tot").val();
        var tp_ll_emp_non_fare_tot = $("#tp_ll_emp_non_fare_tot").val();
        var tp_ll_driver_cleaner_tot = $("#tp_ll_driver_cleaner_tot").val();
        var tp_ll_person_operation_tot = $("#tp_ll_person_operation_tot").val();

        tp_basic_tp1_tot = parseInt(tp_basic_tp1_tot);
        tp_geog_area_tot = parseInt(tp_geog_area_tot);
        tp_compul_pa_own_driv_tot = parseInt(tp_compul_pa_own_driv_tot);
        tp_pa_paid_driver_tot = parseInt(tp_pa_paid_driver_tot);
        tp_ll_emp_non_fare_tot = parseInt(tp_ll_emp_non_fare_tot);
        tp_ll_driver_cleaner_tot = parseInt(tp_ll_driver_cleaner_tot);
        tp_ll_person_operation_tot = parseInt(tp_ll_person_operation_tot);

        if (isNaN(tp_basic_tp1_tot))
            tp_basic_tp1_tot = 0;
        else
            tp_basic_tp1_tot = tp_basic_tp1_tot;

        if (isNaN(tp_geog_area_tot))
            tp_geog_area_tot = 0;
        else
            tp_geog_area_tot = tp_geog_area_tot;

        if (isNaN(tp_compul_pa_own_driv_tot))
            tp_compul_pa_own_driv_tot = 0;
        else
            tp_compul_pa_own_driv_tot = tp_compul_pa_own_driv_tot;

        if (isNaN(tp_pa_paid_driver_tot))
            tp_pa_paid_driver_tot = 0;
        else
            tp_pa_paid_driver_tot = tp_pa_paid_driver_tot;

        if (isNaN(tp_ll_emp_non_fare_tot))
            tp_ll_emp_non_fare_tot = 0;
        else
            tp_ll_emp_non_fare_tot = tp_ll_emp_non_fare_tot;

        if (isNaN(tp_ll_driver_cleaner_tot))
            tp_ll_driver_cleaner_tot = 0;
        else
            tp_ll_driver_cleaner_tot = tp_ll_driver_cleaner_tot;

        if (isNaN(tp_ll_person_operation_tot))
            tp_ll_person_operation_tot = 0;
        else
            tp_ll_person_operation_tot = tp_ll_person_operation_tot;

        var tp_basic_tp2_tot = 0;
        tp_basic_tp2_tot = tp_basic_tp1_tot + tp_geog_area_tot + tp_compul_pa_own_driv_tot + tp_pa_paid_driver_tot + tp_ll_emp_non_fare_tot + tp_ll_driver_cleaner_tot + tp_ll_person_operation_tot;

        tp_basic_tp2_tot = parseInt(tp_basic_tp2_tot);
        if (isNaN(tp_basic_tp2_tot))
            tp_basic_tp2_tot = 0;
        else
            tp_basic_tp2_tot = tp_basic_tp2_tot;

        $("#tp_basic_tp2_tot").val(tp_basic_tp2_tot);
        $("#tp_tot_premium").val(tp_basic_tp2_tot);
        $("#tot_btp_premium").val(tp_basic_tp2_tot);

        Final_cal();
    }

    function Add_on_Cal() {
        var tp_consumables = $("#tp_consumables").val();
        var tp_zero_depreciation = $("#tp_zero_depreciation").val();
        var tp_road_side_ass = $("#tp_road_side_ass").val();

        tp_consumables = parseInt(tp_consumables);
        tp_zero_depreciation = parseInt(tp_zero_depreciation);
        tp_road_side_ass = parseInt(tp_road_side_ass);

        if (isNaN(tp_consumables))
            tp_consumables = 0;
        else
            tp_consumables = tp_consumables;

        if (isNaN(tp_zero_depreciation))
            tp_zero_depreciation = 0;
        else
            tp_zero_depreciation = tp_zero_depreciation;

        if (isNaN(tp_road_side_ass))
            tp_road_side_ass = 0;
        else
            tp_road_side_ass = tp_road_side_ass;

        var tp_tot_addon_premium = 0;
        tp_tot_addon_premium = tp_consumables + tp_zero_depreciation + tp_road_side_ass;
        $("#tp_tot_addon_premium").val(tp_tot_addon_premium);
        $("#tot_owd_addon_premium").val(tp_tot_addon_premium);
        tot_premium_Cal();
    }

    // Final Calculation

    function owd_gst_apply() {
        var tot_owd_premium = $("#tot_owd_premium").val();
        var tot_owd_cgst_rate = $("#tot_owd_cgst_rate").val();
        var tot_owd_sgst_rate = $("#tot_owd_sgst_rate").val();

        tot_owd_cgst_rate = parseInt(tot_owd_cgst_rate);
        if (isNaN(tot_owd_cgst_rate))
            tot_owd_cgst_rate = 0;
        else
            tot_owd_cgst_rate = tot_owd_cgst_rate;

        tot_owd_sgst_rate = parseInt(tot_owd_sgst_rate);
        if (isNaN(tot_owd_sgst_rate))
            tot_owd_sgst_rate = 0;
        else
            tot_owd_sgst_rate = tot_owd_sgst_rate;

        tot_owd_premium = parseInt(tot_owd_premium);
        if (isNaN(tot_owd_premium))
            tot_owd_premium = 0;
        else
            tot_owd_premium = tot_owd_premium;

        if (tot_owd_premium == "") {
            $("#tot_owd_gst").val(0);
            $("#tot_owd_final").val(0);
        }

        var motor_cgst_tot = Math.round((tot_owd_premium * tot_owd_cgst_rate) / 100);
        var motor_sgst_tot = Math.round((tot_owd_premium * tot_owd_sgst_rate) / 100);

        motor_cgst_tot = parseInt(motor_cgst_tot);
        if (isNaN(motor_cgst_tot))
            motor_cgst_tot = 0;
        else
            motor_cgst_tot = motor_cgst_tot;

        motor_sgst_tot = parseInt(motor_sgst_tot);
        if (isNaN(motor_sgst_tot))
            motor_sgst_tot = 0;
        else
            motor_sgst_tot = motor_sgst_tot;

        var tot_owd_gst = 0;

        tot_owd_gst = tot_owd_gst + motor_cgst_tot + motor_sgst_tot;

        $("#tot_owd_gst").val(tot_owd_gst);

        var tot_owd_final = parseInt(tot_owd_premium) + parseInt(tot_owd_gst);
        $("#tot_owd_final").val(tot_owd_final);
        tot_gst_final_Cal();
        Final_cal();
    }

    function owd_addon_gst_apply() {
        var tot_owd_addon_premium = $("#tot_owd_addon_premium").val();
        var tot_owd_addon_cgst_rate = $("#tot_owd_addon_cgst_rate").val();
        var tot_owd_addon_sgst_rate = $("#tot_owd_addon_sgst_rate").val();

        tot_owd_addon_cgst_rate = parseInt(tot_owd_addon_cgst_rate);
        if (isNaN(tot_owd_addon_cgst_rate))
            tot_owd_addon_cgst_rate = 0;
        else
            tot_owd_addon_cgst_rate = tot_owd_addon_cgst_rate;

        tot_owd_addon_sgst_rate = parseInt(tot_owd_addon_sgst_rate);
        if (isNaN(tot_owd_addon_sgst_rate))
            tot_owd_addon_sgst_rate = 0;
        else
            tot_owd_addon_sgst_rate = tot_owd_addon_sgst_rate;

        tot_owd_addon_premium = parseInt(tot_owd_addon_premium);
        if (isNaN(tot_owd_addon_premium))
            tot_owd_addon_premium = 0;
        else
            tot_owd_addon_premium = tot_owd_addon_premium;

        if (tot_owd_addon_premium == "") {
            $("#tot_owd_addon_gst").val(0);
            $("#tot_owd_addon_final").val(0);
        }

        var motor_cgst_tot = Math.round((tot_owd_addon_premium * tot_owd_addon_cgst_rate) / 100);
        var motor_sgst_tot = Math.round((tot_owd_addon_premium * tot_owd_addon_sgst_rate) / 100);

        motor_cgst_tot = parseInt(motor_cgst_tot);
        if (isNaN(motor_cgst_tot))
            motor_cgst_tot = 0;
        else
            motor_cgst_tot = motor_cgst_tot;

        motor_sgst_tot = parseInt(motor_sgst_tot);
        if (isNaN(motor_sgst_tot))
            motor_sgst_tot = 0;
        else
            motor_sgst_tot = motor_sgst_tot;

        var tot_owd_addon_gst = 0;

        tot_owd_addon_gst = tot_owd_addon_gst + motor_cgst_tot + motor_sgst_tot;

        $("#tot_owd_addon_gst").val(tot_owd_addon_gst);

        var tot_owd_addon_final = parseInt(tot_owd_addon_premium) + parseInt(tot_owd_addon_gst);
        $("#tot_owd_addon_final").val(tot_owd_addon_final);
        tot_gst_final_Cal();
        Final_cal();
    }

    function btp_gst_apply() {
        var tot_btp_premium = $("#tot_btp_premium").val();
        var tot_btp_cgst_rate = $("#tot_btp_cgst_rate").val();
        var tot_btp_sgst_rate = $("#tot_btp_sgst_rate").val();

        tot_btp_cgst_rate = parseInt(tot_btp_cgst_rate);
        if (isNaN(tot_btp_cgst_rate))
            tot_btp_cgst_rate = 0;
        else
            tot_btp_cgst_rate = tot_btp_cgst_rate;

        tot_btp_sgst_rate = parseInt(tot_btp_sgst_rate);
        if (isNaN(tot_btp_sgst_rate))
            tot_btp_sgst_rate = 0;
        else
            tot_btp_sgst_rate = tot_btp_sgst_rate;

        tot_btp_premium = parseInt(tot_btp_premium);
        if (isNaN(tot_btp_premium))
            tot_btp_premium = 0;
        else
            tot_btp_premium = tot_btp_premium;

        if (tot_btp_premium == "") {
            $("#tot_btp_gst").val(0);
            $("#tot_btp_final").val(0);
        }

        var motor_cgst_tot = Math.round((tot_btp_premium * tot_btp_cgst_rate) / 100);
        var motor_sgst_tot = Math.round((tot_btp_premium * tot_btp_sgst_rate) / 100);

        motor_cgst_tot = parseInt(motor_cgst_tot);
        if (isNaN(motor_cgst_tot))
            motor_cgst_tot = 0;
        else
            motor_cgst_tot = motor_cgst_tot;

        motor_sgst_tot = parseInt(motor_sgst_tot);
        if (isNaN(motor_sgst_tot))
            motor_sgst_tot = 0;
        else
            motor_sgst_tot = motor_sgst_tot;

        var tot_btp_gst = 0;

        tot_btp_gst = tot_btp_gst + motor_cgst_tot + motor_sgst_tot;

        $("#tot_btp_gst").val(tot_btp_gst);

        var tot_btp_final = parseInt(tot_btp_premium) + parseInt(tot_btp_gst);
        $("#tot_btp_final").val(tot_btp_final);
        tot_gst_final_Cal();
        Final_cal();
    }

    function other_gst_apply() {
        var tot_other_tp_premium = $("#tot_other_tp_premium").val();
        var tot_other_tp_cgst_rate = $("#tot_other_tp_cgst_rate").val();
        var tot_other_tp_sgst_rate = $("#tot_other_tp_sgst_rate").val();

        tot_other_tp_cgst_rate = parseInt(tot_other_tp_cgst_rate);
        if (isNaN(tot_other_tp_cgst_rate))
            tot_other_tp_cgst_rate = 0;
        else
            tot_other_tp_cgst_rate = tot_other_tp_cgst_rate;

        tot_other_tp_sgst_rate = parseInt(tot_other_tp_sgst_rate);
        if (isNaN(tot_other_tp_sgst_rate))
            tot_other_tp_sgst_rate = 0;
        else
            tot_other_tp_sgst_rate = tot_other_tp_sgst_rate;

        tot_other_tp_premium = parseInt(tot_other_tp_premium);
        if (isNaN(tot_other_tp_premium))
            tot_other_tp_premium = 0;
        else
            tot_other_tp_premium = tot_other_tp_premium;

        if (tot_other_tp_premium == "") {
            $("#tot_other_tp_gst").val(0);
            $("#tot_other_tp_final").val(0);
        }

        var motor_cgst_tot = Math.round((tot_other_tp_premium * tot_other_tp_cgst_rate) / 100);
        var motor_sgst_tot = Math.round((tot_other_tp_premium * tot_other_tp_sgst_rate) / 100);

        motor_cgst_tot = parseInt(motor_cgst_tot);
        if (isNaN(motor_cgst_tot))
            motor_cgst_tot = 0;
        else
            motor_cgst_tot = motor_cgst_tot;

        motor_sgst_tot = parseInt(motor_sgst_tot);
        if (isNaN(motor_sgst_tot))
            motor_sgst_tot = 0;
        else
            motor_sgst_tot = motor_sgst_tot;

        var tot_other_tp_gst = 0;

        tot_other_tp_gst = tot_other_tp_gst + motor_cgst_tot + motor_sgst_tot;

        $("#tot_other_tp_gst").val(tot_other_tp_gst);

        var tot_other_tp_final = parseInt(tot_other_tp_premium) + parseInt(tot_other_tp_gst);
        $("#tot_other_tp_final").val(tot_other_tp_final);
        tot_gst_final_Cal();
        Final_cal();
    }

    function tot_premium_Cal() {
        var tot_owd_premium = $("#tot_owd_premium").val();
        var tot_owd_addon_premium = $("#tot_owd_addon_premium").val();
        var tot_btp_premium = $("#tot_btp_premium").val();
        var tot_other_tp_premium = $("#tot_other_tp_premium").val();

        tot_owd_premium = parseInt(tot_owd_premium);
        tot_owd_addon_premium = parseInt(tot_owd_addon_premium);
        tot_btp_premium = parseInt(tot_btp_premium);
        tot_other_tp_premium = parseInt(tot_other_tp_premium);

        if (isNaN(tot_owd_premium))
            tot_owd_premium = 0;
        else
            tot_owd_premium = tot_owd_premium;

        if (isNaN(tot_owd_addon_premium))
            tot_owd_addon_premium = 0;
        else
            tot_owd_addon_premium = tot_owd_addon_premium;

        if (isNaN(tot_btp_premium))
            tot_btp_premium = 0;
        else
            tot_btp_premium = tot_btp_premium;

        if (isNaN(tot_other_tp_premium))
            tot_other_tp_premium = 0;
        else
            tot_other_tp_premium = tot_other_tp_premium;

        var tot_premium = 0;
        tot_premium = tot_premium + tot_owd_premium + tot_owd_addon_premium + tot_btp_premium + tot_other_tp_premium;
        $("#tot_premium").val(tot_premium);
        owd_gst_apply();
        owd_addon_gst_apply();
        btp_gst_apply();
        other_gst_apply();
    }

    function tot_gst_final_Cal() {
        var tot_owd_gst = $("#tot_owd_gst").val();
        var tot_owd_addon_gst = $("#tot_owd_addon_gst").val();
        var tot_btp_gst = $("#tot_btp_gst").val();
        var tot_other_tp_gst = $("#tot_other_tp_gst").val();

        tot_owd_gst = parseInt(tot_owd_gst);
        tot_owd_addon_gst = parseInt(tot_owd_addon_gst);
        tot_btp_gst = parseInt(tot_btp_gst);
        tot_other_tp_gst = parseInt(tot_other_tp_gst);

        if (isNaN(tot_owd_gst))
            tot_owd_gst = 0;
        else
            tot_owd_gst = tot_owd_gst;

        if (isNaN(tot_owd_addon_gst))
            tot_owd_addon_gst = 0;
        else
            tot_owd_addon_gst = tot_owd_addon_gst;

        if (isNaN(tot_btp_gst))
            tot_btp_gst = 0;
        else
            tot_btp_gst = tot_btp_gst;

        if (isNaN(tot_other_tp_gst))
            tot_other_tp_gst = 0;
        else
            tot_other_tp_gst = tot_other_tp_gst;

        var tot_gst_amt = 0;
        tot_gst_amt = tot_gst_amt + tot_owd_gst + tot_owd_addon_gst + tot_btp_gst + tot_other_tp_gst;
        $("#tot_gst_amt").val(tot_gst_amt);
    }

    function Final_cal() {
        var tot_owd_final = $("#tot_owd_final").val();
        var tot_owd_addon_final = $("#tot_owd_addon_final").val();
        var tot_btp_final = $("#tot_btp_final").val();
        var tot_other_tp_final = $("#tot_other_tp_final").val();

        tot_owd_final = parseInt(tot_owd_final);
        tot_owd_addon_final = parseInt(tot_owd_addon_final);
        tot_btp_final = parseInt(tot_btp_final);
        tot_other_tp_final = parseInt(tot_other_tp_final);

        if (isNaN(tot_owd_final))
            tot_owd_final = 0;
        else
            tot_owd_final = tot_owd_final;

        if (isNaN(tot_owd_addon_final))
            tot_owd_addon_final = 0;
        else
            tot_owd_addon_final = tot_owd_addon_final;

        if (isNaN(tot_btp_final))
            tot_btp_final = 0;
        else
            tot_btp_final = tot_btp_final;

        if (isNaN(tot_other_tp_final))
            tot_other_tp_final = 0;
        else
            tot_other_tp_final = tot_other_tp_final;

        var tot_final_premium = 0;

        tot_final_premium = tot_final_premium + tot_owd_final + tot_owd_addon_final + tot_btp_final + tot_other_tp_final;
        tot_final_premium = parseInt(tot_final_premium);
        if (isNaN(tot_final_premium))
            tot_final_premium = 0;
        else
            tot_final_premium = tot_final_premium;

        $("#tot_final_premium").val(tot_final_premium);
        $("#tot_payable_premium").val(tot_final_premium);
    }
</script>