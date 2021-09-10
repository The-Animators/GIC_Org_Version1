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
            <label for="" class="col-form-label col-md-5 font-weight-bold">Private Car Calculator : </label>
            <div class="col-md-8">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label for="vehicle_make_model" class="col-form-label col-md-5 font-weight-bold text-right">Vehicle Make & Model : </label>
            <div class="col-md-7 col-form-label">
                <strong id="vehicle_make_model"></strong>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label for="vehicle_reg_no" class="col-form-label col-md-5 font-weight-bold text-right">Vehicle Reg. No : </label>
            <div class="col-md-7 col-form-label">
                <strong id="vehicle_reg_no"></strong>
            </div>
        </div>
    </div>

    <div class="col-md-12" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="">
            <tbody>
                <tr>
                    <td>
                        <center class="font-weight-bold">Private Car Calculator</center>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center class="font-weight-bold">Comprehensive Comprehensive Policy(Own Damage + Third Party)</br />Basic Details of the Vehicle</center>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-5" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="">
            <tbody>
                <tr>
                    <td>Insured Declared Value - IDV</td>
                    <td></td>
                    <td><strong id="insu_declared_val"></strong></td>
                </tr>
                <tr>
                    <td>Non-Electrical Accessories Value</td>
                    <td></td>
                    <td><strong id="non_elect_access_val"></strong></td>
                </tr>
                <tr>
                    <td>Electrical Accessories Value</td>
                    <td></td>
                    <td><strong id="elect_access_val"></strong></td>
                </tr>
                <tr>
                    <td>LPG / CNG IDV if inbuilt IDV is not required</td>
                    <td>

                    </td>
                    <td><strong id="lpg_cng_idv_val"></strong></td>
                </tr>
                <tr>
                    <td>Trailer</td>
                    <td>
                    </td>
                    <td><strong id="trailer_val"></strong></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Private Car Type</td>
                    <td class="font-weight-bold" colspan="2">Private Car 4 Wheeler Normal</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-7" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="">
            <tbody>
                <tr>
                    <td colspan="3">Year Of Manufactur</td>
                    <td><strong id="year_manufact_val"></strong></td>
                </tr>
                <tr>
                    <td>RTA - Code</td>
                    <td><strong id="rta_city_code"></strong></td>
                    <td><strong id="rta_city"></strong></td>
                    <td><strong id="rta_city_cat"></strong></td>
                </tr>
                <tr>
                    <td colspan="3">Cubic Capacity</td>
                    <td><strong id="cubic_capacity_val"></strong></td>
                </tr>
                <tr>
                    <td style="height:63px;">Calculation Method</td>
                    <td>
                        <strong id="calculation_method"></strong>
                        <!-- Pro - Rate -->
                    </td>
                    <td>Type of Cover</td>
                    <td>
                        <strong id="type_of_cover"></strong>
                        <!-- Comprehensive -->
                    </td>
                </tr>
                <tr>
                    <td>Previous Policy Expiry Date</td>
                    <td>Policy Period</td>
                    <td>Inception Date</td>
                    <td>Expiry Date</td>
                </tr>
                <tr>
                    <td><strong id="prev_policy_expiry_date"></strong></td>
                    <td><strong id="policy_period"></strong></td>
                    <td><strong id="inception_date"></strong></td>
                    <td><strong id="expiry_date"></strong></td>
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
                        <center>Own Damage Premium (OD)</center>
                    </td>
                </tr>
                <tr>
                    <td>Basic OD</td>
                    <td></td>
                    <td><strong id="od_basic_od_tot"></strong></td>
                </tr>
                <tr>
                    <td>Special Discount</td>
                    <td><strong id="od_special_disc_per"></strong></td>
                    <td><strong id="od_special_disc_tot"></strong></td>
                </tr>
                <tr>
                    <td>Special Loading</td>
                    <td><strong id="od_special_load_per"></strong></td>
                    <td><strong id="od_special_load_tot"></strong></td>
                </tr>
                <tr>
                    <td>Net Basic OD</td>
                    <td></td>
                    <td><strong id="od_net_basic_od_tot"></strong></td>
                </tr>
                <tr>
                    <td>Non-Elec Accessories</td>
                    <td></td>
                    <td><strong id="od_non_elec_acc_tot"></strong></td>
                </tr>
                <tr>
                    <td>Elec Accessories</td>
                    <td></td>
                    <td><strong id="od_elec_acc_tot"></strong></td>
                </tr>
                <tr>
                    <td>Bi-Fuel Kit</td>
                    <td></td>
                    <td><strong id="od_bi_fuel_kit_tot"></strong></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Basic OD1</td>
                    <td></td>
                    <td><strong id="od_od_basic_od1_tot"></strong></td>
                </tr>
                <tr>
                    <td>Trailer</td>
                    <td></td>
                    <td><strong id="od_trailer_tot"></strong></td>
                </tr>
                <tr>
                    <td>Geographical Area</td>
                    <td></td>
                    <td><strong id="od_geographical_area_tot"></strong></td>
                </tr>
                <tr>
                    <td>Embassy Loading</td>
                    <td></td>
                    <td><strong id="od_embassy_load_tot"></strong></td>
                </tr>
                <tr>
                    <td>Fibre Glass Tank</td>
                    <td></td>
                    <td><strong id="od_fibre_glass_tank_tot"></strong></td>
                </tr>
                <tr>
                    <td>Driving Tuitions</td>
                    <td></td>
                    <td><strong id="od_driving_tut_tot"></strong></td>
                </tr>
                <tr>
                    <td>Rallies (No of Days)</td>
                    <td></td>
                    <td><strong id="od_rallies_tot"></strong></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Basic OD2</td>
                    <td></td>
                    <td><strong id="od_basic_od2_tot"></strong> </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Discounts</td>
                    <td></td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>Anti Theft</td>
                    <td></td>
                    <td><strong id="od_anti_tot"></strong></td>
                </tr>
                <tr>
                    <td>Handicap</td>
                    <td></td>
                    <td><strong id="od_handicap_tot"></strong></td>
                </tr>
                <tr>
                    <td>AAI</td>
                    <td></td>
                    <td><strong id="od_aai_tot"></strong></td>
                </tr>
                <tr>
                    <td>Vintage Car</td>
                    <td></td>
                    <td><strong id="od_vintage_tot"></strong></td>
                </tr>
                <tr>
                    <td>Own Premises</td>
                    <td></td>
                    <td><strong id="od_own_premises_tot"></strong></td>
                </tr>
                <tr>
                    <td>Voluntary Deductiable</td>
                    <td></td>
                    <td><strong id="od_voluntary_deduc_tot"></strong></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Basic OD3</td>
                    <td></td>
                    <td><strong id="od_basic_od3_tot"></strong></td>
                </tr>
                <tr>
                    <td>NCB</td>
                    <td><strong id="od_ncb_per"></strong></td>
                    <td><strong id="od_ncb_tot"></strong></td>
                </tr>
                <tr>
                    <td class="text-purple font-weight-bold">Total Anual OD Premium</td>
                    <td></td>
                    <td><strong id="od_tot_anual_od_premium"></strong></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-purple font-weight-bold">Total OD Premium for the Policy Period</td>
                    <td><strong id="od_tot_od_premium_policy_period"></strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-7" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="">
            <tbody>
                <tr>
                    <td colspan="3" class="font-weight-bold">
                        <center>Third Party Premium (TP)</center>
                    </td>
                </tr>
                <tr>
                    <td>Basic TP</td>
                    <td></td>
                    <td><strong id="tp_basic_tp_tot"></strong></td>
                </tr>
                <tr>
                    <td>Restricted TPPD</td>
                    <td></td>
                    <td><strong id="tp_restr_tppd"></strong></td>
                </tr>
                <tr>
                    <td>Trailer</td>
                    <td></td>
                    <td><strong id="tp_trailer_tot"></strong></td>
                </tr>
                <tr>
                    <td style="height:61px;">Bi-Fuel Kit</td>
                    <td></td>
                    <td><strong id="tp_bi_fuel_tot"></strong></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Basic TP1</td>
                    <td></td>
                    <td><strong id="tp_basic_tp1_tot"></strong></td>
                </tr>
                <tr>
                    <td>Compulsory PA Own/Driver</td>
                    <td></td>
                    <td><strong id="tp_compul_own_driv_tot"></strong></td>
                </tr>
                <tr>
                    <td>Geographical Area</td>
                    <td></td>
                    <td><strong id="tp_geographical_area_tot"></strong></td>
                </tr>
                <tr>
                    <td>Unnamed PA Pax</td>
                    <td></td>
                    <td><strong id="tp_unnamed_papax_tot"></strong></td>
                </tr>
                <tr>
                    <td>No of Seats/Limit Per Person</td>
                    <td></td>
                    <td><strong id="tp_no_seats_limit_person_tot"></strong></td>
                </tr>
                <tr>
                    <td>LL Drv/Emp</td>
                    <td></td>
                    <td><strong id="tp_ll_drv_emp_tot"></strong></td>
                </tr>
                <tr>
                    <td>No of Drv/Emp</td>
                    <td></td>
                    <td><strong id="tp_no_drv_emp_tot"></strong></td>
                </tr>
                <tr>
                    <td>LL to Defence</td>
                    <td></td>
                    <td><strong id="tp_ll_defe_tot"></td>
                </tr>
                <tr>
                    <td>No of Persons</td>
                    <td></td>
                    <td><strong id="tp_noof_person_tot"></strong></td>
                </tr>
                <tr>
                    <td>PA Paid Drv</td>
                    <td></td>
                    <td><strong id="tp_pa_paid_drv_tot"></strong></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Basic Tp2</td>
                    <td></td>
                    <td><strong id="tp_basic_tp2_tot"></strong></td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-purple">Total Anual TP Premium</td>
                    <td></td>
                    <td><strong id="tp_tot_anual_tp_premium"></strong></td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-purple">Total TP Premium for the Policy Period</td>
                    <td></td>
                    <td><strong id="tp_tot_premium_policy_period"></strong></td>
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
                                <strong id="plan_name"></strong>
                            </div>
                        </div>
                    </td>
                    <td></td>
                    <td><strong id="plan_name_tot"></strong></td>
                </tr>
                <tr>
                    <td>Other Covers</td>
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
                <tr>
                    <td class="font-weight-bold text-purple">Total Anual Add On Cover Premium</td>
                    <td></td>
                    <td><strong id="tot_anual_cover_premium"></strong></td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-purple">Total Add On Cover Premium for the Policy Period</td>
                    <td></td>
                    <td><strong id="tot_cover_premium_period"></strong></td>
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
                    <td><strong id="tot_premium"></strong></td>
                </tr>
                <tr>
                    <td colspn=""><strong> CGST:</strong></td>
                    <td><strong id="cgst_fire_per"></strong></td>
                    <td><strong id="motor_cgst_tot"></strong></td>
                </tr>
                <tr>
                    <td><strong> SGST</strong></td>
                    <td><strong id="sgst_fire_per"></strong></td>
                    <td><strong id="motor_sgst_tot"></strong></td>
                </tr>
                <!-- <tr>
                    <td>Add GST</td>
                    <td><strong id="gst_rate"></strong></td>
                    <td><strong id="gst_tot"></strong></td>
                </tr> -->
                <tr>
                    <td class="text-purple font-weight-bold">Total Payable</td>
                    <td></td>
                    <td><strong id="tot_payable_premium"></strong>
                        
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</div>
