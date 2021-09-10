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
            <div class="col-form-label col-md-7">
                <strong id="vehicle_make_model"></strong>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label for="vehicle_reg_no" class="col-form-label col-md-5 font-weight-bold text-right">Vehicle Reg. No : </label>
            <div class="col-form-label col-md-7">
                <strong id="vehicle_reg_no"></strong>
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
                    <td><center><strong id="insu_declared_val"></strong></center> </td>
                </tr>
                <tr>
                    <td>Electrical Accessories value</td>
                    <td><center><strong id="elect_acc_val"></strong></center></td>
                </tr>
                <tr>
                    <td>LPG/CNG IDV ( If inbuilt-IDV not required)</td>
                    <td><center><strong id="lpg_cng_idv_val"></strong></center></td>
                </tr>
                <tr>
                    <td>Consolidated Trailers IDV </td>
                    <td></td>
                </tr>
                <tr>
                    <td>No of Trailers</td>
                    <td> </td>
                </tr>
                <tr>
                    <td>E-Carts / Except E-Carts</td>
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
                    <td><center><strong id="year_manufact_val"></strong></center></td>
                </tr>
                <tr>
                    <td> Zone</td>
                    <td><center><strong id="zone_city_code"></strong></center></td>
                    <td><center><strong id="zone_city"></strong></center></td>
                    <td><center><strong id="zone_city_cat"></strong></center></td>
                </tr>
                <tr>
                    <td colspan="3">GVW</td>
                    <td><center><strong id="gvw_val"></strong></center></td>
                </tr>
                <tr>
                    <td colspan="3">Class</td>
                    <td><center><strong id="class_val"></strong></center></td>
                </tr>
                <tr>
                    <td colspan="3">Type of Cover</td>
                    <td><center><strong id="type_of_cover"></strong></center></td>
                </tr>
                <tr>
                    <td colspan="2">Policy Period</td>
                    <td>Inception Date</td>
                    <td>Expiry Date</td>
                </tr>
                <tr>
                    <td colspan="2"><center><strong id="policy_period"></strong></center></td>
                    <td><center><strong id="inception_date"></strong></center></td>
                    <td><center><strong id="expiry_date"></strong></center></td>
                </tr>

            </tbody>
        </table>
    </div>
    <div class="col-md-12" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="">
            <tbody>
                <tr>
                    <td><center class="font-weight-bold">Premium Calculation</center></td>
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
                    <td><center><strong id="od_basic_od_tot"></strong></center></td>
                </tr>
                <tr>
                    <td>Elec Acc</td>
                    <td></td>
                    <td><center><strong id="od_elec_acc_tot"></strong></center></td>
                </tr>
                <tr>
                    <td>Trailer</td>
                    <td></td>
                    <td><center><strong id="od_trailer_tot"></strong></center></td>
                </tr>
                <tr>
                    <td>Bi-fuel Kit</td>
                    <td></td>
                    <td><center><strong id="od_bi_fuel_kit_tot"></strong></center></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Basic OD1</td>
                    <td></td>
                    <td><center><strong id="od_od_basic_od1_tot"></strong></center></td>
                </tr>
                <tr>
                    <td>Geog area</td>
                    <td></td>
                    <td><center><strong id="od_geog_area_tot"></strong></center></td>
                </tr>
                <tr>
                    <td>Fibre Glass Tank</td>
                    <td></td>
                    <td><center><strong id="od_fiber_glass_tank_tot"></strong></center></td>
                </tr>
                <tr>
                    <td>IMT 23-Cover for mud-guards etc</td>
                    <td></td>
                    <td><center><strong id="od_imt_cover_mud_guard_tot"></strong></center></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Basic OD2</td>
                    <td></td>
                    <td><center><strong id="od_basic_od2_tot"></strong></center></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Discounts (Minus)</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td></td>
                    <td>
                    </td>
                </tr>

                <tr>
                    <td class="font-weight-bold">Basic OD3</td>
                    <td></td>
                    <td><center><strong id="od_basic_od3_tot"></strong></center></td>
                </tr>
                <tr>
                    <td>NCB</td>
                    <td><center><strong id="od_ncb_per"></strong></center></td>
                    <td><center><strong id="od_ncb_tot"></strong></center></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-purple font-weight-bold">Annual OD Premium</td>
                    <td><center><strong id="od_tot_anual_od_premium"></strong></center></td>
                </tr>
                <tr>
                    <td>Special Discount</td>
                    <td><center><strong id="od_special_disc_per"></strong></center></td>
                    <td><center><strong id="od_special_disc_tot"></strong></center></td>
                </tr>
                <tr>
                    <td>Special Loading</td>
                    <td><center><strong id="od_special_load_per"></strong></center></td>
                    <td><center><strong id="od_special_load_tot"></strong></center></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-purple font-weight-bold">Total OD Premium</td>
                    <td><center><strong id="od_tot_od_premium"></strong></center></td>
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
                    <td><center><strong id="tp_basic_tp_tot"></strong></center></td>
                </tr>
                <tr>
                    <td>Restricted TPPD (Minus)</td>
                    <td><center><strong id="tp_restr_tppd_tot"></strong></center></td>
                </tr>
                <tr>
                    <td>Trailer</td>
                    <td><center><strong id="tp_trailer_tot"></strong></center></td>
                </tr>
                <tr>
                    <td>Bi-fuel kit</td>
                    <td><center><strong id="tp_bi_fuel_kit_tot"></strong></center></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Basic TP1</td>
                    <td><center><strong id="tp_basic_tp1_tot"></strong></center></td>
                </tr>
                <tr>
                    <td>Geog Area</td>
                    <td><center><strong id="tp_geog_area_tot"></strong></center></td>
                </tr>
                <tr>
                    <td>Compulsory PA Own/Driver</td>
                    <td><center><strong id="tp_compul_pa_own_driv_tot"></strong></center></td>
                </tr>

                <tr>
                    <td>PA to paid driver - IMT17</td>
                    <td><center><strong id="tp_pa_paid_driver_tot"></strong></center></td>
                </tr>

                <tr>
                    <td>LL to emp/non-fare paying pax (other than WC)</td>
                    <td><center><strong id="tp_ll_emp_non_fare_tot"></strong></center></td>
                </tr>
                <tr>
                    <td>LL to driver/cleaner/conductor</td>
                    <td><center><strong id="tp_ll_driver_cleaner_tot"></strong></center></td>
                </tr>
                <tr>
                    <td>LL to person for operation/maintenance</td>
                    <td><center><strong id="tp_ll_person_operation_tot"></strong></center></td>
                </tr>

                <tr>
                    <td class="font-weight-bold">Basic Tp2</td>
                    <td><center><strong id="tp_basic_tp2_tot"></strong></center></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-purple">Total TP Premium</td>
                    <td><center><strong id="tp_tot_premium"></strong></center></td>
                </tr>
                <tr>
                    <td colspan="3" class="font-weight-bold">
                        <center>ADD On</center>
                    </td>
                </tr>
                <tr>
                    <td>Consumables</td>
                    <td><center><strong id="tp_consumables"></strong></center></td>
                </tr>
                <tr>
                    <td>Zero Depreciation</td>
                    <td><center><strong id="tp_zero_depreciation"></strong></center></td>
                </tr>
                <tr>
                    <td>Road Side Assistance</td>
                    <td><center><strong id="tp_road_side_ass"></strong></center></td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-purple">Total Add On Premium</td>
                    <td><center><strong id="tp_tot_addon_premium"></strong></center></td>
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
                    <td><center><strong id="tot_owd_premium"></strong></center></td>
                    <td>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-5 font-weight-bold">CGST Rate : </label>
                                    <div class="col-form-label col-md-7">
                                        <center><strong id="tot_owd_cgst_rate"></strong></center>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-5 font-weight-bold">SGST Rate : </label>
                                    <div class="col-form-label col-md-7">
                                        <center><strong id="tot_owd_sgst_rate"></strong></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><center><strong id="tot_owd_gst"></strong></center></td>
                    <td><center><strong id="tot_owd_final"></strong></center></td>
                </tr>
                <tr>
                    <td>Add On (OWD)</td>
                    <td><center><strong id="tot_owd_addon_premium"></strong></center> </td>
                    <td>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-5 font-weight-bold">CGST Rate : </label>
                                    <div class="col-form-label col-md-7">
                                        <center><strong id="tot_owd_addon_cgst_rate"></strong></center> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-5 font-weight-bold">SGST Rate : </label>
                                    <div class="col-form-label col-md-7">
                                        <center><strong id="tot_owd_addon_sgst_rate"></strong></center> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><center><strong id="tot_owd_addon_gst"></strong></center> </td>
                    <td><center><strong id="tot_owd_addon_final"></strong></center> </td>
                </tr>
                <tr>
                    <td>Basic TP (BTP)</td>
                    <td><center><strong id="tot_btp_premium"></strong></center></td>
                    <td>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-5 font-weight-bold">CGST Rate : </label>
                                    <div class="col-form-label col-md-7">
                                        <center><strong id="tot_btp_cgst_rate"></strong></center>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-5 font-weight-bold">SGST Rate : </label>
                                    <div class="col-form-label col-md-7">
                                        <center><strong id="tot_btp_sgst_rate"></strong></center> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><center><strong id="tot_btp_gst"></strong></center></td>
                    <td><center><strong id="tot_btp_final"></strong></center></td>
                </tr>
                <tr>
                    <td>Other TP (TDP)</td>
                    <td><center><strong id="tot_other_tp_premium"></strong></center></td>
                    <td>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-5 font-weight-bold">CGST Rate : </label>
                                    <div class="col-form-label col-md-7">
                                        <center><strong id="tot_other_tp_cgst_rate"></strong></center>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-5 font-weight-bold">SGST Rate : </label>
                                    <div class="col-form-label col-md-7">
                                        <center><strong id="tot_other_tp_sgst_rate"></strong></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><center><strong id="tot_other_tp_gst"></strong></center></td>
                    <td><center><strong id="tot_other_tp_final"></strong></center></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td><center><strong id="tot_premium"></strong></center> </td>
                    <td></td>
                    <td><center><strong id="tot_gst_amt"></strong></center></td>
                    <td><center><strong id="tot_final_premium"></strong></center></td>
                </tr>
                <tr>
                    <td class="text-purple font-weight-bold">Total Payable</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-purple font-weight-bold"><center><strong id="tot_payable_premium"></strong></center></td>
                </tr>

            </tbody>
        </table>
    </div>

</div>
