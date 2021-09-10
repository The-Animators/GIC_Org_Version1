<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <label for="shopkeeper_risk_address" class="col-form-label col-md-2 text-right">Risk Address:<span class="text-danger">*</span></label>
            <div class="col-md-10">
                <input type="text" name="shopkeeper_risk_address" id="shopkeeper_risk_address" value="" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <table class="table mb-0 table-bordered">
            <thead>
                <tr>
                    <th>Section</th>
                    <th>Sum Inured</th>
                    <th>Rate</th>
                    <th>Premium</th>
                </tr>
            </thead>
            <tr>
                <td colspan="" rowspan="3" width="20%"><strong>1 - Fire</strong>
                    <table class="table">
                        <tr>
                            <td colspan=""><strong>A</strong><br /><br /></td>
                            <td colspan=""><strong>Building</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong>B</strong><br /><br /></td>
                            <td colspan=""><strong>Stock</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong></strong><br /></td>
                            <td colspan=""><strong>FFFF</strong><br /></td>
                        </tr>
                    </table>
                    <!-- <table class="table">
                        <tr>
                            <td colspan=""><strong>Building</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong>Stock</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong>FFFF</strong><br /></td>
                        </tr>
                    </table> -->
                </td>
                <!-- <td rowspan="3">

                </td>
                <td rowspan="3" width="18%">
             
                </td> -->
                <td rowspan="3">
                    <table class="table">
                        <tr>
                        <br/>
                            <td colspan=""><strong><input type="number" name="fire_sum_insured_1" id="fire_sum_insured_1" value="" class="form-control" onkeyup="section_1sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="fire_sum_insured_2" id="fire_sum_insured_2" value="" class="form-control" onkeyup="section_1sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="fire_sum_insured_3" id="fire_sum_insured_3" value="" class="form-control" onkeyup="section_1sum_insured()"></strong></td>
                        </tr>
                    </table>
                </td>
                <td rowspan="3">
                    <table class="table">
                        <tr>
                        <br/>
                            <td colspan=""><strong><input type="number" name="fire_rate_1" id="fire_rate_1" value="" class="form-control" onkeyup="section_1sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="fire_rate_2" id="fire_rate_2" value="" class="form-control" onkeyup="section_1sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="fire_rate_3" id="fire_rate_3" value="" class="form-control" onkeyup="section_1sum_insured()"></strong></td>
                        </tr>
                    </table>
                </td>
                <td rowspan="3">
                    <table class="table">
                        <tr>
                        <br/>
                            <td colspan=""><strong><input type="number" name="fire_premium_1" id="fire_premium_1" value="" class="form-control" onkeyup="get_total_sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="fire_premium_2" id="fire_premium_2" value="" class="form-control" onkeyup="get_total_sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="fire_premium_3" id="fire_premium_3" value="" class="form-control" onkeyup="get_total_sum_insured()"></strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table class="table mb-0 table-bordered">
            <tr>
                <td colspan="" rowspan="3" width="20%"><strong>Section 2 - Burglary</strong></td>
                <td rowspan="3">
                    <table class="table">
                        <tr>
                            <td colspan=""><strong>A</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong>B</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong></strong><br /></td>
                        </tr>
                    </table>
                </td>
                <td rowspan="3" width="18%">
                    <table class="table">
                        <tr>
                            <td colspan=""><strong>Building</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong>Stock</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong>FFFF</strong><br /></td>
                        </tr>
                    </table>
                </td>
                <td rowspan="3">
                    <table class="table">
                        <tr>
                            <td colspan=""><strong><input type="number" name="burglary_sum_insured_1" id="burglary_sum_insured_1" value="" class="form-control" onkeyup="section_2sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="burglary_sum_insured_2" id="burglary_sum_insured_2" value="" class="form-control" onkeyup="section_2sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="burglary_sum_insured_3" id="burglary_sum_insured_3" value="" class="form-control" onkeyup="section_2sum_insured()"></strong></td>
                        </tr>
                    </table>
                </td>
                <td rowspan="3">
                    <table class="table">
                        <tr>
                            <td colspan=""><strong><input type="number" name="burglary_rate_1" id="burglary_rate_1" value="" class="form-control" onkeyup="section_2sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="burglary_rate_2" id="burglary_rate_2" value="" class="form-control" onkeyup="section_2sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="burglary_rate_3" id="burglary_rate_3" value="" class="form-control" onkeyup="section_2sum_insured()"></strong></td>
                        </tr>
                    </table>
                </td>
                <td rowspan="3">
                    <table class="table">
                        <tr>
                            <td colspan=""><strong><input type="number" name="burglary_premium_1" id="burglary_premium_1" value="" class="form-control" onkeyup="get_total_sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="burglary_premium_2" id="burglary_premium_2" value="" class="form-control" onkeyup="get_total_sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="burglary_premium_3" id="burglary_premium_3" value="" class="form-control" onkeyup="get_total_sum_insured()"></strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table class="table mb-0 table-bordered">
            <tr>
                <td colspan="" rowspan="3" width="20%"><strong>Section 3 - Money Insurance</strong></td>
                <td rowspan="3">
                    <table class="table">
                        <tr>
                            <td colspan=""><strong>A</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong>B</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong>C</strong><br /></td>
                        </tr>
                    </table>
                </td>
                <td rowspan="3" width="18%">
                    <table class="table">
                        <tr>
                            <td colspan=""><strong>In Transit</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong>In Safe</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong>In Till Counter</strong><br /></td>
                        </tr>
                    </table>
                </td>
                <td rowspan="3">
                    <table class="table">
                        <tr>
                            <td colspan=""><strong><input type="number" name="money_insu_sum_insured_1" id="money_insu_sum_insured_1" value="" class="form-control" onkeyup="section_3sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="money_insu_sum_insured_2" id="money_insu_sum_insured_2" value="" class="form-control" onkeyup="section_3sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="money_insu_sum_insured_3" id="money_insu_sum_insured_3" value="" class="form-control" onkeyup="section_3sum_insured()"></strong></td>
                        </tr>
                    </table>
                </td>
                <td rowspan="3">
                    <table class="table">
                        <tr>
                            <td colspan=""><strong><input type="number" name="money_insu_rate_1" id="money_insu_rate_1" value="" class="form-control" onkeyup="section_3sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="money_insu_rate_2" id="money_insu_rate_2" value="" class="form-control" onkeyup="section_3sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="money_insu_rate_3" id="money_insu_rate_3" value="" class="form-control" onkeyup="section_3sum_insured()"></strong></td>
                        </tr>
                    </table>
                </td>
                <td rowspan="3">
                    <table class="table">
                        <tr>
                            <td colspan=""><strong><input type="number" name="money_insu_premium_1" id="money_insu_premium_1" value="" class="form-control" onkeyup="get_total_sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="money_insu_premium_2" id="money_insu_premium_2" value="" class="form-control" onkeyup="get_total_sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="money_insu_premium_3" id="money_insu_premium_3" value="" class="form-control" onkeyup="get_total_sum_insured()"></strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table class="table mb-0 table-bordered">
            <tr>
                <td colspan="" rowspan="" width="20%"><strong>Section 5 - Plate Glass</strong></td>
                <td rowspan="" width="6%"></td>
                <td rowspan="" width="17%"></td>
                <td rowspan=""><input type="number" name="plate_glass_sum_insured" id="plate_glass_sum_insured" value="" class="form-control" onkeyup="section_5sum_insured()"></td>
                <td rowspan=""><input type="number" name="plate_glass_rate_per" id="plate_glass_rate_per" value="" class="form-control" onkeyup="section_5sum_insured()"></td>
                <td rowspan=""><input type="number" name="plate_glass_premium" id="plate_glass_premium" value="" class="form-control" onkeyup="get_total_sum_insured()"></td>
            </tr>
            <tr>
                <td colspan="" rowspan="" width="20%"><strong>Section 6 - Neon & Glow Sign</strong></td>
                <td rowspan="" width="6%"></td>
                <td rowspan="" width="17%"></td>
                <td rowspan=""><input type="number" name="neon_glow_sum_insured" id="neon_glow_sum_insured" value="" class="form-control" onkeyup="section_6sum_insured()"></td>
                <td rowspan=""><input type="number" name="neon_glow_rate_per" id="neon_glow_rate_per" value="" class="form-control" onkeyup="section_6sum_insured()"></td>
                <td rowspan=""><input type="number" name="neon_glow_premium" id="neon_glow_premium" value="" class="form-control" onkeyup="get_total_sum_insured()"></td>
            </tr>
            <tr>
                <td colspan="" rowspan="" width="20%"><strong>Section 7 - Baggage Insurance</strong></td>
                <td rowspan="" width="6%"></td>
                <td rowspan="" width="17%"></td>
                <td rowspan=""><input type="number" name="baggage_ins_sum_insured" id="baggage_ins_sum_insured" value="" class="form-control" onkeyup="section_7sum_insured()"></td>
                <td rowspan=""><input type="number" name="baggage_ins_rate_per" id="baggage_ins_rate_per" value="" class="form-control" onkeyup="section_7sum_insured()"></td>
                <td rowspan=""><input type="number" name="baggage_ins_premium" id="baggage_ins_premium" value="" class="form-control" onkeyup="get_total_sum_insured()"></td>
            </tr>
            <tr>
                <td colspan="" rowspan="" width="20%"><strong>Section 8 - Personal Accident</strong></td>
                <td rowspan="" width="6%"></td>
                <td rowspan="" width="17%"></td>
                <td rowspan=""><input type="number" name="personal_accident_sum_insured" id="personal_accident_sum_insured" value="" class="form-control"></td>
                <td rowspan=""><input type="number" name="personal_accident_rate_per" id="personal_accident_rate_per" value="" class="form-control"></td>
                <td rowspan=""><input type="number" name="personal_accident_premium" id="personal_accident_premium" value="" class="form-control"></td>
            </tr>
            <tr>
                <td colspan="" rowspan="" width="20%"><strong>Section 9 - Fidelity Gaurantee</strong></td>
                <td rowspan="" width="6%"></td>
                <td rowspan="" width="17%"></td>
                <td rowspan=""><input type="number" name="fidelity_gaur_sum_insured" id="fidelity_gaur_sum_insured" value="" class="form-control"></td>
                <td rowspan=""><input type="number" name="fidelity_gaur_rate_per" id="fidelity_gaur_rate_per" value="" class="form-control"></td>
                <td rowspan=""><input type="number" name="fidelity_gaur_premium" id="fidelity_gaur_premium" value="" class="form-control"></td>
            </tr>
        </table>
        <table class="table mb-0 table-bordered">
            <tr>
                <td colspan="" rowspan="2" width="20%"><strong>Section 10 - Public Liability</strong></td>
                <td rowspan="2" width="6%">
                    <table class="table">
                        <tr>
                            <td colspan=""><strong>A</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong>B</strong><br /><br /></td>
                        </tr>
                    </table>
                </td>
                <td rowspan="2" width="18%">
                    <table class="table">
                        <tr>
                            <td colspan=""><strong>Public Liability</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong>Work's Men Compensation</strong><br /><br /></td>
                        </tr>
                    </table>
                </td>
                <td rowspan="3">
                    <table class="table">
                        <tr>
                            <td colspan=""><strong><input type="number" name="pub_libility_sum_nsured" id="pub_libility_sum_nsured" value="" class="form-control" onkeyup="section_10sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="work_men_compens_sum_nsured" id="work_men_compens_sum_nsured" value="" class="form-control" onkeyup="section_10sum_insured()"></strong></td>
                        </tr>
                    </table>
                </td>
                <td rowspan="3">
                    <table class="table">
                        <tr>
                            <td colspan=""><strong><input type="number" name="pub_libility_rate" id="pub_libility_rate" value="" class="form-control" onkeyup="section_10sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="work_men_compens_rate" id="work_men_compens_rate" value="" class="form-control" onkeyup="section_10sum_insured()"></strong></td>
                        </tr>
                    </table>
                </td>
                <td rowspan="3">
                    <table class="table">
                        <tr>
                            <td colspan=""><strong><input type="number" name="pub_libility_premium" id="pub_libility_premium" value="" class="form-control" onkeyup="get_total_sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="work_men_compens_premium" id="work_men_compens_premium" value="" class="form-control" onkeyup="get_total_sum_insured()"></strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table class="table mb-0 table-bordered">
            <tr>
                <td colspan="" rowspan="3" width="20%"><strong>Section 11 - Business Interruption</strong></td>
                <td rowspan="3" width="6%">
                    <table class="table">
                        <tr>
                            <td colspan=""><strong>A</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong>B</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong></strong><br /></td>
                        </tr>
                    </table>
                </td>
                <td rowspan="3" width="18%">
                    <table class="table">
                        <tr>
                            <td colspan=""><strong>Building</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong>Stock</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong>FFFF</strong><br /></td>
                        </tr>
                    </table>
                </td>
                <td rowspan="3">
                    <table class="table">
                        <tr>
                            <td colspan=""><strong><input type="number" name="bus_inter_sum_insured_1" id="bus_inter_sum_insured_1" value="" class="form-control" onkeyup="section_11sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="bus_inter_sum_insured_2" id="bus_inter_sum_insured_2" value="" class="form-control" onkeyup="section_11sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="bus_inter_sum_insured_3" id="bus_inter_sum_insured_3" value="" class="form-control" onkeyup="section_11sum_insured()"></strong></td>
                        </tr>
                    </table>
                </td>
                <td rowspan="3">
                    <table class="table">
                        <tr>
                            <td colspan=""><strong><input type="number" name="bus_inter_rate_1" id="bus_inter_rate_1" value="" class="form-control" onkeyup="section_11sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="bus_inter_rate_2" id="bus_inter_rate_2" value="" class="form-control" onkeyup="section_11sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="bus_inter_rate_3" id="bus_inter_rate_3" value="" class="form-control" onkeyup="section_11sum_insured()"></strong></td>
                        </tr>
                    </table>
                </td>
                <td rowspan="3">
                    <table class="table">
                        <tr>
                            <td colspan=""><strong><input type="number" name="bus_inter_premium_1" id="bus_inter_premium_1" value="" class="form-control" onkeyup="get_total_sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="bus_inter_premium_2" id="bus_inter_premium_2" value="" class="form-control" onkeyup="get_total_sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="bus_inter_premium_3" id="bus_inter_premium_3" value="" class="form-control" onkeyup="get_total_sum_insured()"></strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

    <div class="col-md-12">
        <table class="table mb-0 table-bordered">
            <tr>
                <td colspan="2"><strong>
                        Total Sum Assured
                        <!--<center> Total Sum Assured</center> -->
                    </strong></td>

                <td><strong>
                        <input type="number" name="shopkeeper_total_sum_assured" id="shopkeeper_total_sum_assured" value="" class="form-control">
                    </strong></td>
            </tr>
            <tr>
                <td colspan=""><strong>
                        Less Discount (in %)
                    </strong></td>

                <td><strong>
                        <input type="number" name="shopkeeper_less_discount_per" id="shopkeeper_less_discount_per" value="" class="form-control" onkeyup="get_amount_after_discount()">
                    </strong></td>
                <td><strong>
                        <input type="number" name="shopkeeper_less_discount_tot" id="shopkeeper_less_discount_tot" value="" class="form-control">
                    </strong></td>
            </tr>
            <tr>
                <td colspan="2"><strong>
                        Amount After Discount
                    </strong></td>

                <td><strong>
                        <input type="number" name="shopkeeper_fire_rate_after_discount_tot" id="shopkeeper_fire_rate_after_discount_tot" value="" class="form-control">
                    </strong></td>
            </tr>

            <tr>
                <td colspan=""><strong>
                        Add CGST (in %)
                    </strong></td>

                <td><strong>
                        <input type="number" name="shopkeeper_cgst_fire_per" id="shopkeeper_cgst_fire_per" value="" class="form-control" onkeyup="gst_apply()">
                    </strong></td>
                <td><strong>
                        <input type="number" name="shopkeeper_cgst_fire_tot" id="shopkeeper_cgst_fire_tot" value="" class="form-control">
                    </strong></td>
            </tr>
            <tr>
                <td colspan=""><strong>
                        Add SGST (in %)
                    </strong></td>

                <td><strong>
                        <input type="number" name="shopkeeper_sgst_fire_per" id="shopkeeper_sgst_fire_per" value="" class="form-control" onkeyup="gst_apply()">
                    </strong></td>
                <td><strong>
                        <input type="number" name="shopkeeper_sgst_fire_tot" id="shopkeeper_sgst_fire_tot" value="" class="form-control">
                    </strong></td>
            </tr>
            <tr>
                <td colspan="2"><strong class="text-purple">
                        Final Payable Premium
                    </strong></td>

                <td><strong>
                        <input type="number" name="shopkeeper_final_paybal_premium" id="shopkeeper_final_paybal_premium" value="" class="form-control">
                        <input type="hidden" name="shopkeeper_policy_id" id="shopkeeper_policy_id" value="" class="form-control">
                    </strong></td>
            </tr>
        </table>
    </div>

</div>

<script>
    function section_1sum_insured() {
        var fire_sum_insured_1 = $("#fire_sum_insured_1").val();
        var fire_sum_insured_2 = $("#fire_sum_insured_2").val();
        var fire_sum_insured_3 = $("#fire_sum_insured_3").val();

        // fire_sum_insured_1 = parseInt(fire_sum_insured_1);
        // fire_sum_insured_2 = parseInt(fire_sum_insured_2);
        // fire_sum_insured_3 = parseInt(fire_sum_insured_3);

        if (isNaN(fire_sum_insured_1))
            fire_sum_insured_1 = 0;
        else
            fire_sum_insured_1 = fire_sum_insured_1;

        if (isNaN(fire_sum_insured_2))
            fire_sum_insured_2 = 0;
        else
            fire_sum_insured_2 = fire_sum_insured_2;

        if (isNaN(fire_sum_insured_3))
            fire_sum_insured_3 = 0;
        else
            fire_sum_insured_3 = fire_sum_insured_3;

        var fire_rate_1 = $("#fire_rate_1").val();
        var fire_rate_2 = $("#fire_rate_2").val();
        var fire_rate_3 = $("#fire_rate_3").val();

        // fire_rate_1 = parseInt(fire_rate_1);
        // fire_rate_2 = parseInt(fire_rate_2);
        // fire_rate_3 = parseInt(fire_rate_3);

        if (isNaN(fire_rate_1))
            fire_rate_1 = 0;
        else
            fire_rate_1 = fire_rate_1;

        if (isNaN(fire_rate_2))
            fire_rate_2 = 0;
        else
            fire_rate_2 = fire_rate_2;

        if (isNaN(fire_rate_3))
            fire_rate_3 = 0;
        else
            fire_rate_3 = fire_rate_3;

        var fire_premium_1 = (fire_sum_insured_1 * fire_rate_1) / 1000;
        var fire_premium_2 = (fire_sum_insured_2 * fire_rate_2) / 1000;
        var fire_premium_3 = (fire_sum_insured_3 * fire_rate_3) / 1000;

        $("#fire_premium_1").val(fire_premium_1);
        $("#fire_premium_2").val(fire_premium_2);
        $("#fire_premium_3").val(fire_premium_3);

        get_total_sum_insured();
    }

    function section_2sum_insured() {
        var burglary_sum_insured_1 = $("#burglary_sum_insured_1").val();
        var burglary_sum_insured_2 = $("#burglary_sum_insured_2").val();
        var burglary_sum_insured_3 = $("#burglary_sum_insured_3").val();

        // burglary_sum_insured_1 = parseInt(burglary_sum_insured_1);
        // burglary_sum_insured_2 = parseInt(burglary_sum_insured_2);
        // burglary_sum_insured_3 = parseInt(burglary_sum_insured_3);

        if (isNaN(burglary_sum_insured_1))
            burglary_sum_insured_1 = 0;
        else
            burglary_sum_insured_1 = burglary_sum_insured_1;

        if (isNaN(burglary_sum_insured_2))
            burglary_sum_insured_2 = 0;
        else
            burglary_sum_insured_2 = burglary_sum_insured_2;

        if (isNaN(burglary_sum_insured_3))
            burglary_sum_insured_3 = 0;
        else
            burglary_sum_insured_3 = burglary_sum_insured_3;

        var burglary_rate_1 = $("#burglary_rate_1").val();
        var burglary_rate_2 = $("#burglary_rate_2").val();
        var burglary_rate_3 = $("#burglary_rate_3").val();

        // burglary_rate_1 = parseInt(burglary_rate_1);
        // burglary_rate_2 = parseInt(burglary_rate_2);
        // burglary_rate_3 = parseInt(burglary_rate_3);

        if (isNaN(burglary_rate_1))
            burglary_rate_1 = 0;
        else
            burglary_rate_1 = burglary_rate_1;

        if (isNaN(burglary_rate_2))
            burglary_rate_2 = 0;
        else
            burglary_rate_2 = burglary_rate_2;

        if (isNaN(burglary_rate_3))
            burglary_rate_3 = 0;
        else
            burglary_rate_3 = burglary_rate_3;

        var burglary_premium_1 = (burglary_sum_insured_1 * burglary_rate_1) / 1000;
        var burglary_premium_2 = (burglary_sum_insured_2 * burglary_rate_2) / 1000;
        var burglary_premium_3 = (burglary_sum_insured_3 * burglary_rate_3) / 1000;

        $("#burglary_premium_1").val(burglary_premium_1);
        $("#burglary_premium_2").val(burglary_premium_2);
        $("#burglary_premium_3").val(burglary_premium_3);

        get_total_sum_insured();
    }

    function section_3sum_insured() {
        var money_insu_sum_insured_1 = $("#money_insu_sum_insured_1").val();
        var money_insu_sum_insured_2 = $("#money_insu_sum_insured_2").val();
        var money_insu_sum_insured_3 = $("#money_insu_sum_insured_3").val();

        // money_insu_sum_insured_1 = parseInt(money_insu_sum_insured_1);
        // money_insu_sum_insured_2 = parseInt(money_insu_sum_insured_2);
        // money_insu_sum_insured_3 = parseInt(money_insu_sum_insured_3);

        if (isNaN(money_insu_sum_insured_1))
            money_insu_sum_insured_1 = 0;
        else
            money_insu_sum_insured_1 = money_insu_sum_insured_1;

        if (isNaN(money_insu_sum_insured_2))
            money_insu_sum_insured_2 = 0;
        else
            money_insu_sum_insured_2 = money_insu_sum_insured_2;

        if (isNaN(money_insu_sum_insured_3))
            money_insu_sum_insured_3 = 0;
        else
            money_insu_sum_insured_3 = money_insu_sum_insured_3;

        var money_insu_rate_1 = $("#money_insu_rate_1").val();
        var money_insu_rate_2 = $("#money_insu_rate_2").val();
        var money_insu_rate_3 = $("#money_insu_rate_3").val();

        // money_insu_rate_1 = parseInt(money_insu_rate_1);
        // money_insu_rate_2 = parseInt(money_insu_rate_2);
        // money_insu_rate_3 = parseInt(money_insu_rate_3);

        if (isNaN(money_insu_rate_2))
            money_insu_rate_2 = 0;
        else
            money_insu_rate_2 = money_insu_rate_2;

        if (isNaN(money_insu_rate_2))
            money_insu_rate_2 = 0;
        else
            money_insu_rate_2 = money_insu_rate_2;

        if (isNaN(money_insu_rate_3))
            money_insu_rate_3 = 0;
        else
            money_insu_rate_3 = money_insu_rate_3;

        var money_insu_premium_1 = (money_insu_sum_insured_1 * money_insu_rate_2) / 1000;
        var money_insu_premium_2 = (money_insu_sum_insured_2 * money_insu_rate_2) / 1000;
        var money_insu_premium_3 = (money_insu_sum_insured_3 * money_insu_rate_3) / 1000;

        $("#money_insu_premium_1").val(money_insu_premium_1);
        $("#money_insu_premium_2").val(money_insu_premium_2);
        $("#money_insu_premium_3").val(money_insu_premium_3);

        get_total_sum_insured();
    }

    function section_5sum_insured() {
        var plate_glass_sum_insured = $("#plate_glass_sum_insured").val();

        // plate_glass_sum_insured = parseInt(plate_glass_sum_insured);

        if (isNaN(plate_glass_sum_insured))
            plate_glass_sum_insured = 0;
        else
            plate_glass_sum_insured = plate_glass_sum_insured;

        var plate_glass_rate_per = $("#plate_glass_rate_per").val();

        // plate_glass_rate_per = parseInt(plate_glass_rate_per);

        if (isNaN(plate_glass_rate_per))
            plate_glass_rate_per = 0;
        else
            plate_glass_rate_per = plate_glass_rate_per;

        var plate_glass_premium = (plate_glass_sum_insured * plate_glass_rate_per) / 1000;

        $("#plate_glass_premium").val(plate_glass_premium);

        get_total_sum_insured();
    }

    function section_6sum_insured() {
        var neon_glow_sum_insured = $("#neon_glow_sum_insured").val();

        // neon_glow_sum_insured = parseInt(neon_glow_sum_insured);

        if (isNaN(neon_glow_sum_insured))
            neon_glow_sum_insured = 0;
        else
            neon_glow_sum_insured = neon_glow_sum_insured;

        var neon_glow_rate_per = $("#neon_glow_rate_per").val();

        // neon_glow_rate_per = parseInt(neon_glow_rate_per);

        if (isNaN(neon_glow_rate_per))
            neon_glow_rate_per = 0;
        else
            neon_glow_rate_per = neon_glow_rate_per;

        var neon_glow_premium = (neon_glow_sum_insured * neon_glow_rate_per) / 1000;

        $("#neon_glow_premium").val(neon_glow_premium);

        get_total_sum_insured();
    }

    function section_7sum_insured() {
        var baggage_ins_sum_insured = $("#baggage_ins_sum_insured").val();

        // baggage_ins_sum_insured = parseInt(baggage_ins_sum_insured);

        if (isNaN(baggage_ins_sum_insured))
            baggage_ins_sum_insured = 0;
        else
            baggage_ins_sum_insured = baggage_ins_sum_insured;

        var baggage_ins_rate_per = $("#baggage_ins_rate_per").val();

        // baggage_ins_rate_per = parseInt(baggage_ins_rate_per);

        if (isNaN(baggage_ins_rate_per))
            baggage_ins_rate_per = 0;
        else
            baggage_ins_rate_per = baggage_ins_rate_per;

        var baggage_ins_premium = (baggage_ins_sum_insured * baggage_ins_rate_per) / 1000;

        $("#baggage_ins_premium").val(baggage_ins_premium);

        get_total_sum_insured();
    }

    function section_10sum_insured() {
        var pub_libility_sum_nsured = $("#pub_libility_sum_nsured").val();
        var work_men_compens_sum_nsured = $("#work_men_compens_sum_nsured").val();

        // pub_libility_sum_nsured = parseInt(pub_libility_sum_nsured);
        // work_men_compens_sum_nsured = parseInt(work_men_compens_sum_nsured);

        if (isNaN(pub_libility_sum_nsured))
            pub_libility_sum_nsured = 0;
        else
            pub_libility_sum_nsured = pub_libility_sum_nsured;

        if (isNaN(work_men_compens_sum_nsured))
            work_men_compens_sum_nsured = 0;
        else
            work_men_compens_sum_nsured = work_men_compens_sum_nsured;

        var pub_libility_rate = $("#pub_libility_rate").val();
        var work_men_compens_rate = $("#work_men_compens_rate").val();

        // pub_libility_rate = parseInt(pub_libility_rate);
        // work_men_compens_rate = parseInt(work_men_compens_rate);

        if (isNaN(pub_libility_rate))
            pub_libility_rate = 0;
        else
            pub_libility_rate = pub_libility_rate;

        if (isNaN(work_men_compens_rate))
            work_men_compens_rate = 0;
        else
            work_men_compens_rate = work_men_compens_rate;

        var pub_libility_premium = (pub_libility_sum_nsured * pub_libility_rate) / 1000;
        var work_men_compens_premium = (work_men_compens_sum_nsured * work_men_compens_rate) / 1000;

        $("#pub_libility_premium").val(pub_libility_premium);
        $("#work_men_compens_premium").val(work_men_compens_premium);
        get_total_sum_insured();
    }

    function section_11sum_insured() {
        var bus_inter_sum_insured_1 = $("#bus_inter_sum_insured_1").val();
        var bus_inter_sum_insured_2 = $("#bus_inter_sum_insured_2").val();
        var bus_inter_sum_insured_3 = $("#bus_inter_sum_insured_3").val();

        // bus_inter_sum_insured_1 = parseInt(bus_inter_sum_insured_1);
        // bus_inter_sum_insured_2 = parseInt(bus_inter_sum_insured_2);
        // bus_inter_sum_insured_3 = parseInt(bus_inter_sum_insured_3);

        if (isNaN(bus_inter_sum_insured_1))
            bus_inter_sum_insured_1 = 0;
        else
            bus_inter_sum_insured_1 = bus_inter_sum_insured_1;

        if (isNaN(bus_inter_sum_insured_2))
            bus_inter_sum_insured_2 = 0;
        else
            bus_inter_sum_insured_2 = bus_inter_sum_insured_2;

        if (isNaN(bus_inter_sum_insured_3))
            bus_inter_sum_insured_3 = 0;
        else
            bus_inter_sum_insured_3 = bus_inter_sum_insured_3;

        var bus_inter_rate_1 = $("#bus_inter_rate_1").val();
        var bus_inter_rate_2 = $("#bus_inter_rate_2").val();
        var bus_inter_rate_3 = $("#bus_inter_rate_3").val();

        // bus_inter_rate_1 = parseInt(bus_inter_rate_1);
        // bus_inter_rate_2 = parseInt(bus_inter_rate_2);
        // bus_inter_rate_3 = parseInt(bus_inter_rate_3);

        if (isNaN(bus_inter_rate_1))
            bus_inter_rate_1 = 0;
        else
            bus_inter_rate_1 = bus_inter_rate_1;

        if (isNaN(bus_inter_rate_2))
            bus_inter_rate_2 = 0;
        else
            bus_inter_rate_2 = bus_inter_rate_2;

        if (isNaN(bus_inter_rate_3))
            bus_inter_rate_3 = 0;
        else
            bus_inter_rate_3 = bus_inter_rate_3;

        var bus_inter_premium_1 = (bus_inter_sum_insured_1 * bus_inter_rate_1) / 1000;
        var bus_inter_premium_2 = (bus_inter_sum_insured_2 * bus_inter_rate_2) / 1000;
        var bus_inter_premium_3 = (bus_inter_sum_insured_3 * bus_inter_rate_3) / 1000;

        $("#bus_inter_premium_1").val(bus_inter_premium_1);
        $("#bus_inter_premium_2").val(bus_inter_premium_2);
        $("#bus_inter_premium_3").val(bus_inter_premium_3);

        get_total_sum_insured();
    }

    function get_total_sum_insured() {
        //Section 1
        var fire_premium_1 = $("#fire_premium_1").val();
        var fire_premium_2 = $("#fire_premium_2").val();
        var fire_premium_3 = $("#fire_premium_3").val();

        //Section 2
        var burglary_premium_1 = $("#burglary_premium_1").val();
        var burglary_premium_2 = $("#burglary_premium_2").val();
        var burglary_premium_3 = $("#burglary_premium_3").val();

        //Section 3
        var money_insu_premium_1 = $("#money_insu_premium_1").val();
        var money_insu_premium_2 = $("#money_insu_premium_2").val();
        var money_insu_premium_3 = $("#money_insu_premium_3").val();

        //Section 5
        var plate_glass_premium = $("#plate_glass_premium").val();

        //Section 6
        var neon_glow_premium = $("#neon_glow_premium").val();

        //Section 7
        var baggage_ins_premium = $("#baggage_ins_premium").val();

        //Section 10
        var pub_libility_premium = $("#pub_libility_premium").val();
        var work_men_compens_premium = $("#work_men_compens_premium").val();

        //Section 11
        var bus_inter_premium_1 = $("#bus_inter_premium_1").val();
        var bus_inter_premium_2 = $("#bus_inter_premium_2").val();
        var bus_inter_premium_3 = $("#bus_inter_premium_3").val();

        var shopkeeper_total_sum_assured = 0;

        fire_premium_1 = parseInt(fire_premium_1);
        fire_premium_2 = parseInt(fire_premium_2);
        fire_premium_3 = parseInt(fire_premium_3);
        burglary_premium_1 = parseInt(burglary_premium_1);
        burglary_premium_2 = parseInt(burglary_premium_2);
        burglary_premium_3 = parseInt(burglary_premium_3);
        money_insu_premium_1 = parseInt(money_insu_premium_1);
        money_insu_premium_2 = parseInt(money_insu_premium_2);
        money_insu_premium_3 = parseInt(money_insu_premium_3);
        plate_glass_premium = parseInt(plate_glass_premium);
        neon_glow_premium = parseInt(neon_glow_premium);
        baggage_ins_premium = parseInt(baggage_ins_premium);
        pub_libility_premium = parseInt(pub_libility_premium);
        work_men_compens_premium = parseInt(work_men_compens_premium);
        bus_inter_premium_1 = parseInt(bus_inter_premium_1);
        bus_inter_premium_2 = parseInt(bus_inter_premium_2);
        bus_inter_premium_3 = parseInt(bus_inter_premium_3);

        if (isNaN(fire_premium_1))
            fire_premium_1 = 0;
        else
            fire_premium_1 = fire_premium_1;

        if (isNaN(fire_premium_2))
            fire_premium_2 = 0;
        else
            fire_premium_2 = fire_premium_2;

        if (isNaN(fire_premium_3))
            fire_premium_3 = 0;
        else
            fire_premium_3 = fire_premium_3;

        if (isNaN(burglary_premium_1))
            burglary_premium_1 = 0;
        else
            burglary_premium_1 = burglary_premium_1;

        if (isNaN(burglary_premium_2))
            burglary_premium_2 = 0;
        else
            burglary_premium_2 = burglary_premium_2;

        if (isNaN(burglary_premium_3))
            burglary_premium_3 = 0;
        else
            burglary_premium_3 = burglary_premium_3;

        if (isNaN(money_insu_premium_1))
            money_insu_premium_1 = 0;
        else
            money_insu_premium_1 = money_insu_premium_1;

        if (isNaN(money_insu_premium_2))
            money_insu_premium_2 = 0;
        else
            money_insu_premium_2 = money_insu_premium_2;

        if (isNaN(money_insu_premium_3))
            money_insu_premium_3 = 0;
        else
            money_insu_premium_3 = money_insu_premium_3;

        if (isNaN(plate_glass_premium))
            plate_glass_premium = 0;
        else
            plate_glass_premium = plate_glass_premium;

        if (isNaN(neon_glow_premium))
            neon_glow_premium = 0;
        else
            neon_glow_premium = neon_glow_premium;

        if (isNaN(baggage_ins_premium))
            baggage_ins_premium = 0;
        else
            baggage_ins_premium = baggage_ins_premium;

        if (isNaN(pub_libility_premium))
            pub_libility_premium = 0;
        else
            pub_libility_premium = pub_libility_premium;

        if (isNaN(work_men_compens_premium))
            work_men_compens_premium = 0;
        else
            work_men_compens_premium = work_men_compens_premium;

        if (isNaN(bus_inter_premium_1))
            bus_inter_premium_1 = 0;
        else
            bus_inter_premium_1 = bus_inter_premium_1;

        if (isNaN(bus_inter_premium_2))
            bus_inter_premium_2 = 0;
        else
            bus_inter_premium_2 = bus_inter_premium_2;

        if (isNaN(bus_inter_premium_3))
            bus_inter_premium_3 = 0;
        else
            bus_inter_premium_3 = bus_inter_premium_3;

        shopkeeper_total_sum_assured = parseInt(shopkeeper_total_sum_assured) + parseInt(fire_premium_1) + parseInt(fire_premium_2) + parseInt(fire_premium_3) + parseInt(burglary_premium_1) + parseInt(burglary_premium_2) + parseInt(burglary_premium_3) + parseInt(money_insu_premium_1) + parseInt(money_insu_premium_2) + parseInt(money_insu_premium_3) + parseInt(plate_glass_premium) + parseInt(neon_glow_premium) + parseInt(baggage_ins_premium) + parseInt(pub_libility_premium) + parseInt(work_men_compens_premium) + parseInt(bus_inter_premium_1) + parseInt(bus_inter_premium_2) + parseInt(bus_inter_premium_3);

        $("#shopkeeper_total_sum_assured").val(shopkeeper_total_sum_assured);
    }

    function get_amount_after_discount() {
        var shopkeeper_total_sum_assured = $("#shopkeeper_total_sum_assured").val();
        var shopkeeper_less_discount_per = $("#shopkeeper_less_discount_per").val();

        shopkeeper_total_sum_assured = parseInt(shopkeeper_total_sum_assured);
        shopkeeper_less_discount_per = parseInt(shopkeeper_less_discount_per);

        if (isNaN(shopkeeper_total_sum_assured))
            shopkeeper_total_sum_assured = 0;
        else
            shopkeeper_total_sum_assured = shopkeeper_total_sum_assured;

        if (isNaN(shopkeeper_less_discount_per))
            shopkeeper_less_discount_per = 0;
        else
            shopkeeper_less_discount_per = shopkeeper_less_discount_per;

        var shopkeeper_less_discount_tot = (shopkeeper_less_discount_per * shopkeeper_total_sum_assured) / 100;
        var shopkeeper_fire_rate_after_discount_tot = shopkeeper_total_sum_assured - shopkeeper_less_discount_tot;
        $("#shopkeeper_less_discount_tot").val(shopkeeper_less_discount_tot);
        $("#shopkeeper_fire_rate_after_discount_tot").val(shopkeeper_fire_rate_after_discount_tot);
        gst_apply();
    }

    function gst_apply() {
        var shopkeeper_cgst_fire_per = $("#shopkeeper_cgst_fire_per").val();
        var shopkeeper_sgst_fire_per = $("#shopkeeper_sgst_fire_per").val();
        var shopkeeper_fire_rate_after_discount_tot = $("#shopkeeper_fire_rate_after_discount_tot").val();
        var shopkeeper_less_discount_per = $("#shopkeeper_less_discount_per").val();

        shopkeeper_cgst_fire_per = parseInt(shopkeeper_cgst_fire_per);
        shopkeeper_sgst_fire_per = parseInt(shopkeeper_sgst_fire_per);
        shopkeeper_fire_rate_after_discount_tot = parseInt(shopkeeper_fire_rate_after_discount_tot);
        shopkeeper_less_discount_per = parseInt(shopkeeper_less_discount_per);

        if (isNaN(shopkeeper_cgst_fire_per))
            shopkeeper_cgst_fire_per = 0;
        else
            shopkeeper_cgst_fire_per = shopkeeper_cgst_fire_per;

        if (isNaN(shopkeeper_sgst_fire_per))
            shopkeeper_sgst_fire_per = 0;
        else
            shopkeeper_sgst_fire_per = shopkeeper_sgst_fire_per;

        if (isNaN(shopkeeper_fire_rate_after_discount_tot))
            shopkeeper_fire_rate_after_discount_tot = 0;
        else
            shopkeeper_fire_rate_after_discount_tot = shopkeeper_fire_rate_after_discount_tot;

        if (isNaN(shopkeeper_less_discount_per))
            shopkeeper_less_discount_per = 0;
        else
            shopkeeper_less_discount_per = shopkeeper_less_discount_per;

        if (shopkeeper_less_discount_per == "") {
            $("#shopkeeper_cgst_fire_tot").val(0);
            $("#shopkeeper_sgst_fire_tot").val(0);
            $("#shopkeeper_fire_rate_after_discount_tot").val(0);
            $("#shopkeeper_final_paybal_premium").val(0);
        }

        var shopkeeper_cgst_fire_tot = (shopkeeper_fire_rate_after_discount_tot * shopkeeper_cgst_fire_per) / 100;
        var shopkeeper_sgst_fire_tot = (shopkeeper_fire_rate_after_discount_tot * shopkeeper_sgst_fire_per) / 100;
        $("#shopkeeper_cgst_fire_tot").val(shopkeeper_cgst_fire_tot);
        $("#shopkeeper_sgst_fire_tot").val(shopkeeper_sgst_fire_tot);

        var shopkeeper_final_paybal_premium = parseInt(shopkeeper_fire_rate_after_discount_tot) + parseInt(shopkeeper_cgst_fire_tot) + parseInt(shopkeeper_sgst_fire_tot);
        // alert(shopkeeper_final_paybal_premium);
        $("#shopkeeper_final_paybal_premium").val(shopkeeper_final_paybal_premium);
    }
</script>