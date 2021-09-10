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
                    <th>Section - 1</th>
                    <th>Sum Insured</th>
                    <th>Rate</th>
                    <th>Premium</th>
                </tr>
            </thead>
            <tr>
                <td colspan="" rowspan="3" width="20%"><strong>Fire</strong>
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
                </td>
                <td rowspan="3">
                    <table class="table">
                        <tr>
                            <br />
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
                            <br />
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
                            <br />
                            <td colspan=""><strong><input type="number" name="fire_premium_1" id="fire_premium_1" value="" class="form-control" onkeyup="get_total_premium()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="fire_premium_2" id="fire_premium_2" value="" class="form-control" onkeyup="get_total_premium()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="fire_premium_3" id="fire_premium_3" value="" class="form-control" onkeyup="get_total_premium()"></strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table class="table mb-0 table-bordered">
            <thead>
                <tr>
                    <th>Section - 2</th>
                    <th>Sum Insured</th>
                    <th>Rate</th>
                    <th>Premium</th>
                </tr>
            </thead>
            <tr>
                <td colspan="" rowspan="3" width="20%"><strong>Burglary</strong>
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
                </td>
                <td rowspan="3">
                    <table class="table">
                        <tr>
                            <br />
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
                            <br />
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
                            <br />
                            <td colspan=""><strong><input type="number" name="burglary_premium_1" id="burglary_premium_1" value="" class="form-control" onkeyup="get_total_premium()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="burglary_premium_2" id="burglary_premium_2" value="" class="form-control" onkeyup="get_total_premium()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="burglary_premium_3" id="burglary_premium_3" value="" class="form-control" onkeyup="get_total_premium()"></strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table class="table mb-0 table-bordered">
            <thead>
                <tr>
                    <th>Section - 3</th>
                    <th>Sum Insured</th>
                    <th>Rate</th>
                    <th>Premium</th>
                </tr>
            </thead>
            <tr>
                <td colspan="" rowspan="3" width="20%"><strong>Money Insurance</strong>
                    <table class="table">
                        <tr>
                            <td colspan=""><strong>A</strong><br /><br /></td>
                            <td colspan=""><strong>In Transit</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong>B</strong><br /><br /></td>
                            <td colspan=""><strong>In Safe</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong>C</strong><br /></td>
                            <td colspan=""><strong>In Till Counter</strong><br /></td>
                        </tr>
                    </table>
                </td>

                <td rowspan="3">
                    <table class="table">
                        <tr>
                            <br />
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
                            <br />
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
                            <br />
                            <td colspan=""><strong><input type="number" name="money_insu_premium_1" id="money_insu_premium_1" value="" class="form-control" onkeyup="get_total_premium()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="money_insu_premium_2" id="money_insu_premium_2" value="" class="form-control" onkeyup="get_total_premium()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="money_insu_premium_3" id="money_insu_premium_3" value="" class="form-control" onkeyup="get_totalget_total_premium_sum_insured()"></strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table class="table mb-0 table-bordered">
            <thead>
                <tr>
                    <th>Section</th>
                    <th>Sum Insured</th>
                    <th>Rate</th>
                    <th>Premium</th>
                </tr>
            </thead>
            <tr>
                <td colspan="" rowspan="" width="20%"><strong>5 - Plate Glass</strong></td>
                <td rowspan=""><input type="number" name="plate_glass_sum_insured" id="plate_glass_sum_insured" value="" class="form-control" onkeyup="section_5sum_insured()"></td>
                <td rowspan=""><input type="number" name="plate_glass_rate_per" id="plate_glass_rate_per" value="" class="form-control" onkeyup="section_5sum_insured()"></td>
                <td rowspan=""><input type="number" name="plate_glass_premium" id="plate_glass_premium" value="" class="form-control" onkeyup="get_total_premium()"></td>
            </tr>
            <tr>
                <td colspan="" rowspan="" width="20%"><strong>6 - Neon & Glow Sign</strong></td>
                <td rowspan=""><input type="number" name="neon_glow_sum_insured" id="neon_glow_sum_insured" value="" class="form-control" onkeyup="section_6sum_insured()"></td>
                <td rowspan=""><input type="number" name="neon_glow_rate_per" id="neon_glow_rate_per" value="" class="form-control" onkeyup="section_6sum_insured()"></td>
                <td rowspan=""><input type="number" name="neon_glow_premium" id="neon_glow_premium" value="" class="form-control" onkeyup="get_total_premium()"></td>
            </tr>
            <tr>
                <td colspan="" rowspan="" width="20%"><strong>7 - Baggage Insurance</strong></td>
                <td rowspan=""><input type="number" name="baggage_ins_sum_insured" id="baggage_ins_sum_insured" value="" class="form-control" onkeyup="section_7sum_insured()"></td>
                <td rowspan=""><input type="number" name="baggage_ins_rate_per" id="baggage_ins_rate_per" value="" class="form-control" onkeyup="section_7sum_insured()"></td>
                <td rowspan=""><input type="number" name="baggage_ins_premium" id="baggage_ins_premium" value="" class="form-control" onkeyup="get_total_premium()"></td>
            </tr>
            <tr>
                <td colspan="" rowspan="" width="20%"><strong>8 - Personal Accident</strong></td>
                <td colspan="3">
                    <table class="table mb-0 table-bordered" id="personal_acc">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>D.O.B</th>
                                <th>Designation</th>
                                <th>Sum Insured</th>
                                <th>Action&nbsp;&nbsp;<button class="btn btn-facebook btn-sm add_personal_acc" id="add_personal_acc" onclick="add_personal_Acc(0)">Add</button></th>
                            </tr>
                        </thead>
                        <tbody id="append_personal_acc">
                            <tr>
                                <td><input type="text" name="personal_accident_name[]" id="personal_accident_name_0" value="" class="form-control personal_accident_name"></td>
                                <td><input type="date" name="personal_accident_dob[]" id="personal_accident_dob_0" value="" class="form-control personal_accident_dob"></td>
                                <td><input type="text" name="personal_accident_designation[]" id="personal_accident_designation_0" value="" class="form-control personal_accident_designation"></td>
                                <td><input type="number" name="personal_accident_single_sum[]" id="personal_accident_single_sum_0" value="" class="form-control personal_accident_single_sum" onkeyup="section_personal_accident_sum()"></td>
                                <td><button class="btn btn-facebook btn-sm dripicons-cross" id="remove_personal_acc_0" onClick="remove_personal_acc(0)" disabled></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="1"></td>
                <td rowspan="">Sum Insured<input type="number" name="personal_accident_sum_insured" id="personal_accident_sum_insured" value="" class="form-control" onkeyup="section_8sum_insured()"></td>
                <td rowspan="">Rate<input type="number" name="personal_accident_rate_per" id="personal_accident_rate_per" value="" class="form-control" onkeyup="section_8sum_insured()"></td>
                <td rowspan="">Premium<input type="number" name="personal_accident_premium" id="personal_accident_premium" value="" class="form-control" onkeyup="get_total_premium()"></td>
            </tr>
            <tr>
                <td colspan="" rowspan="" width="20%"><strong>9 - Fidelity Gaurantee</strong></td>

                <td colspan="3">
                    <table class="table mb-0 table-bordered" id="fidelity_gaur">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>D.O.B</th>
                                <th>Designation</th>
                                <th>Sum Insured</th>
                                <th>Action&nbsp;&nbsp;<button class="btn btn-facebook btn-sm add_fidelity_gaur" id="add_fidelity_gaur" onclick="add_fidelity_Gaur(0)">Add</button></th>
                            </tr>
                        </thead>
                        <tbody id="append_fidelity_gaur">
                            <tr>
                                <td><input type="text" name="fidelity_gaur_name[]" id="fidelity_gaur_name_0" value="" class="form-control fidelity_gaur_name"></td>
                                <td><input type="date" name="fidelity_gaur_dob[]" id="fidelity_gaur_dob_0" value="" class="form-control fidelity_gaur_dob"></td>
                                <td><input type="text" name="fidelity_gaur_designation[]" id="fidelity_gaur_designation_0" value="" class="form-control fidelity_gaur_designation"></td>
                                <td><input type="number" name="fidelity_gaur_single_sum[]" id="fidelity_gaur_single_sum_0" value="" class="form-control fidelity_gaur_single_sum" onkeyup="section_fidelity_gaur_sum()"></td>
                                <td><button class="btn btn-facebook btn-sm dripicons-cross" id="remove_fidelity_gaur_0" onClick="remove_fidelity_gaur(0)" disabled></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="1"></td>
                <td rowspan="">Sum Insured<input type="number" name="fidelity_gaur_sum_insured" id="fidelity_gaur_sum_insured" value="" class="form-control" onkeyup="section_9sum_insured()"></td>
                <td rowspan="">Rate<input type="number" name="fidelity_gaur_rate_per" id="fidelity_gaur_rate_per" value="" class="form-control" onkeyup="section_9sum_insured()"></td>
                <td rowspan="">Premium<input type="number" name="fidelity_gaur_premium" id="fidelity_gaur_premium" value="" class="form-control" onkeyup="get_total_premium()"></td>
            </tr>
        </table>
        <table class="table mb-0 table-bordered">
            <thead>
                <tr>
                    <th>Section - 10</th>
                    <th>Sum Insured</th>
                    <th>Rate</th>
                    <th>Premium</th>
                </tr>
            </thead>
            <tr>
                <td colspan="" rowspan="2" width="20%"><strong>Public Liability</strong>
                    <table class="table">
                        <tr>
                            <td colspan=""><strong>A</strong><br /><br /></td>
                            <td colspan=""><strong>Public Liability</strong><br /><br /></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong>B</strong><br /><br /></td>
                            <td colspan=""><strong>Work's Men Compensation</strong><br /><br /></td>
                        </tr>
                    </table>
                </td>

                <td rowspan="3">
                    <table class="table">
                        <tr>
                            <br />
                            <td colspan=""><strong><input type="number" name="pub_libility_sum_insured" id="pub_libility_sum_insured" value="" class="form-control" onkeyup="section_10sum_insured()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="work_men_compens_sum_insured" id="work_men_compens_sum_insured" value="" class="form-control" onkeyup="section_10sum_insured()"></strong></td>
                        </tr>
                    </table>
                </td>
                <td rowspan="3">
                    <table class="table">
                        <tr>
                            <br />
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
                            <br />
                            <td colspan=""><strong><input type="number" name="pub_libility_premium" id="pub_libility_premium" value="" class="form-control" onkeyup="get_total_premium()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="work_men_compens_premium" id="work_men_compens_premium" value="" class="form-control" onkeyup="get_total_premium()"></strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table class="table mb-0 table-bordered">
            <thead>
                <tr>
                    <th>Section - 11</th>
                    <th>Sum Insured</th>
                    <th>Rate</th>
                    <th>Premium</th>
                </tr>
            </thead>
            <tr>
                <td colspan="" rowspan="3" width="20%"><strong>Business Interruption</strong>
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
                </td>

                <td rowspan="3">
                    <table class="table">
                        <tr>
                            <br />
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
                            <br />
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
                            <br />
                            <td colspan=""><strong><input type="number" name="bus_inter_premium_1" id="bus_inter_premium_1" value="" class="form-control" onkeyup="get_total_premium()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="bus_inter_premium_2" id="bus_inter_premium_2" value="" class="form-control" onkeyup="get_total_premium()"></strong></td>
                        </tr>
                        <tr>
                            <td colspan=""><strong><input type="number" name="bus_inter_premium_3" id="bus_inter_premium_3" value="" class="form-control" onkeyup="get_total_premium()"></strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

    <div class="col-md-12">
        <table class="table mb-0 table-bordered">
            <tr>
                <td colspan=""><strong>
                        Total Sum Assured
                        <!--<center> Total Sum Assured</center> -->
                    </strong></td>

                <td><strong>
                        <input type="number" name="shopkeeper_total_sum_assured" id="shopkeeper_total_sum_assured" value="" class="form-control">
                    </strong></td>
                <td><strong>
                        <input type="number" name="shopkeeper_total_premium" id="shopkeeper_total_premium" value="" class="form-control">
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
    var add_personal_acc = 0;
    var add_fidelity_gaur = 0;

    var actual_data_personal_accident = [];
    var actual_data_fidelity_gaur = [];
    var personal_accident_Arr = [];
    var fidelity_gaur_Arr = [];

    function Totalpersonal_accident() {
        actual_data_personal_accident = [];
        $("#personal_acc tr:has(.personal_accident_name)").each(function(index, value) {
            var personal_accident_name = $(".personal_accident_name", this).val();
            var personal_accident_dob = $(".personal_accident_dob", this).val();
            var personal_accident_designation = $(".personal_accident_designation", this).val();
            var personal_accident_single_sum = $(".personal_accident_single_sum", this).val();
            actual_data_personal_accident.push([index, personal_accident_name, personal_accident_dob, personal_accident_designation, personal_accident_single_sum]);
            if (personal_accident_name == '')
                actual_data_personal_accident.splice(index, 1);
        });
        // alert(actual_data_personal_accident);
        return actual_data_personal_accident;
    }

    function Totalfidelity_gaur() {
        actual_data_fidelity_gaur = [];

        $("#fidelity_gaur tr:has(.fidelity_gaur_name)").each(function(index2, value2) {
            var fidelity_gaur_name = $(".fidelity_gaur_name", this).val();
            var fidelity_gaur_dob = $(".fidelity_gaur_dob", this).val();
            var fidelity_gaur_designation = $(".fidelity_gaur_designation", this).val();
            var fidelity_gaur_single_sum = $(".fidelity_gaur_single_sum", this).val();
            actual_data_fidelity_gaur.push([index2, fidelity_gaur_name, fidelity_gaur_dob, fidelity_gaur_designation, fidelity_gaur_single_sum]);
            if (fidelity_gaur_name == '')
                actual_data_fidelity_gaur.splice(index2, 1);
        });
        // alert(actual_data_fidelity_gaur);
        return actual_data_fidelity_gaur;
    }

    function Totalpersonal_accident_1() {
        actual_data_personal_accident = [];
        $.each(personal_accident_Arr, function(key, value) {
            var personal_accident_name = $('#personal_accident_name_' + value).val();
            var personal_accident_dob = $('#personal_accident_dob_' + value).val();
            var personal_accident_designation = $('#personal_accident_designation_' + value).val();
            var personal_accident_single_sum = $('#personal_accident_single_sum_' + value).val();
            actual_data_risk_RC.push([value, personal_accident_name, personal_accident_dob, personal_accident_designation, personal_accident_single_sum]);
            if (personal_accident_name == '')
                actual_data_personal_accident.splice(value, 1);
        });
        alert(actual_data_personal_accident);
        return actual_data_personal_accident;
    }

    function Totalfidelity_gaur_1() {
        actual_data_fidelity_gaur = [];
        $.each(personal_accident_Arr, function(key, value) {
            var fidelity_gaur_name = $('#fidelity_gaur_name_' + value).val();
            var fidelity_gaur_dob = $('#fidelity_gaur_dob_' + value).val();
            var fidelity_gaur_designation = $('#fidelity_gaur_designation_' + value).val();
            var fidelity_gaur_single_sum = $('#fidelity_gaur_single_sum_' + value).val();
            actual_data_fidelity_gaur.push([value, fidelity_gaur_name, fidelity_gaur_dob, fidelity_gaur_designation, fidelity_gaur_single_sum]);
            if (fidelity_gaur_name == '')
                actual_data_fidelity_gaur.splice(value, 1);
        });
        alert(actual_data_fidelity_gaur);
        return actual_data_fidelity_gaur;
    }

    function remove_personal_acc(add_personal_acc) {
        $("#remove_personal_acc_" + add_personal_acc).closest("tr").remove();
        personal_accident_Arr.splice(personal_accident_Arr.indexOf(add_personal_acc), 1);
        section_personal_accident_sum();
        section_8sum_insured();
        get_total_sum_insured();
        if (personal_accident_Arr.length == 0) {
            add_personal_acc = 0;
            personal_accident_Arr = [];
            $("#add_personal_acc").attr("onClick", "add_personal_Acc(" + add_personal_acc + ")");
        }
    }

    function add_personal_Acc(add_personal_acc) {
        add_personal_acc = add_personal_acc + 1;
        personal_accident_Arr.push(add_personal_acc);
        $("#add_personal_acc").attr("onClick", "add_personal_Acc(" + add_personal_acc + ")");
        var tr_table = '<tr><td><input type="text" name="personal_accident_name[]" id="personal_accident_name_' + add_personal_acc + '" value="" class="form-control personal_accident_name"></td><td><input type="date" name="personal_accident_dob[]" id="personal_accident_dob_' + add_personal_acc + '" value="" class="form-control personal_accident_dob"></td><td><input type="text" name="personal_accident_designation[]" id="personal_accident_designation_' + add_personal_acc + '" value="" class="form-control personal_accident_designation"></td><td><input type="number" name="personal_accident_single_sum[]" id="personal_accident_single_sum_' + add_personal_acc + '" value="" class="form-control personal_accident_single_sum" onkeyup="section_personal_accident_sum()"></td><td><button class="btn btn-facebook btn-sm dripicons-cross" id="remove_personal_acc_' + add_personal_acc + '" onClick="remove_personal_acc(' + add_personal_acc + ')" ></td> </tr>';
        $("#append_personal_acc").append(tr_table);
        section_personal_accident_sum();
        section_8sum_insured();
        get_total_sum_insured();
    }

    function remove_fidelity_gaur(add_fidelity_gaur) {
        $("#remove_fidelity_gaur_" + add_fidelity_gaur).closest("tr").remove();
        fidelity_gaur_Arr.splice(fidelity_gaur_Arr.indexOf(add_fidelity_gaur), 1);
        section_fidelity_gaur_sum();
        section_9sum_insured();
        get_total_sum_insured();
        if (fidelity_gaur_Arr.length == 0) {
            add_fidelity_gaur = 0;
            fidelity_gaur_Arr = [];
            $("#add_fidelity_gaur").attr("onClick", "add_fidelity_Gaur(" + add_fidelity_gaur + ")");
        }
    }

    function add_fidelity_Gaur(add_fidelity_gaur) {
        add_fidelity_gaur = add_fidelity_gaur + 1;
        fidelity_gaur_Arr.push(add_fidelity_gaur);
        $("#add_fidelity_gaur").attr("onClick", "add_fidelity_Gaur(" + add_fidelity_gaur + ")");
        var tr_table = '<tr><td><input type="text" name="fidelity_gaur_name[]" id="fidelity_gaur_name_' + add_fidelity_gaur + '" value="" class="form-control fidelity_gaur_name"></td><td><input type="date" name="fidelity_gaur_dob[]" id="fidelity_gaur_dob_' + add_fidelity_gaur + '" value="" class="form-control fidelity_gaur_dob"></td><td><input type="text" name="fidelity_gaur_designation[]" id="fidelity_gaur_designation_' + add_fidelity_gaur + '" value="" class="form-control fidelity_gaur_designation"></td><td><input type="number" name="fidelity_gaur_single_sum[]" id="fidelity_gaur_single_sum_' + add_fidelity_gaur + '" value="" class="form-control fidelity_gaur_single_sum" onkeyup="section_fidelity_gaur_sum()"></td><td><button class="btn btn-facebook btn-sm dripicons-cross" id="remove_fidelity_gaur_' + add_fidelity_gaur + '" onClick="remove_fidelity_gaur(' + add_fidelity_gaur + ')" ></td> </tr>';
        $("#append_fidelity_gaur").append(tr_table);
        section_fidelity_gaur_sum();
        section_9sum_insured();
        get_total_sum_insured();
    }

    function section_personal_accident_sum() {
        var inputs = $(".personal_accident_single_sum");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var personal_accident_single_sum = $(inputs[i]).val();
            personal_accident_single_sum = parseInt(personal_accident_single_sum);
            if (isNaN(personal_accident_single_sum))
                personal_accident_single_sum = 0;
            else
                personal_accident_single_sum = personal_accident_single_sum;

            total = total + personal_accident_single_sum;
            $("#personal_accident_sum_insured").val(total);
        }
        section_8sum_insured()
        get_total_sum_insured();
    }

    function section_fidelity_gaur_sum() {
        var inputs = $(".fidelity_gaur_single_sum");
        var total = 0;
        for (var i = 0; i < inputs.length; i++) {
            var fidelity_gaur_single_sum = $(inputs[i]).val();
            fidelity_gaur_single_sum = parseInt(fidelity_gaur_single_sum);
            if (isNaN(fidelity_gaur_single_sum))
                fidelity_gaur_single_sum = 0;
            else
                fidelity_gaur_single_sum = fidelity_gaur_single_sum;

            total = total + fidelity_gaur_single_sum;
            $("#fidelity_gaur_sum_insured").val(total);
        }
        section_9sum_insured();
        get_total_sum_insured();
    }

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

        var fire_premium_1 = Math.round((fire_sum_insured_1 * fire_rate_1) / 1000);
        var fire_premium_2 = Math.round((fire_sum_insured_2 * fire_rate_2) / 1000);
        var fire_premium_3 = Math.round((fire_sum_insured_3 * fire_rate_3) / 1000);

        $("#fire_premium_1").val(fire_premium_1);
        $("#fire_premium_2").val(fire_premium_2);
        $("#fire_premium_3").val(fire_premium_3);

        get_total_sum_insured();
        get_total_premium();
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

        var burglary_premium_1 = Math.round((burglary_sum_insured_1 * burglary_rate_1) / 1000);
        var burglary_premium_2 = Math.round((burglary_sum_insured_2 * burglary_rate_2) / 1000);
        var burglary_premium_3 = Math.round((burglary_sum_insured_3 * burglary_rate_3) / 1000);

        $("#burglary_premium_1").val(burglary_premium_1);
        $("#burglary_premium_2").val(burglary_premium_2);
        $("#burglary_premium_3").val(burglary_premium_3);

        get_total_sum_insured();
        get_total_premium();
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

        if (isNaN(money_insu_rate_1))
            money_insu_rate_1 = 0;
        else
            money_insu_rate_1 = money_insu_rate_1;

        if (isNaN(money_insu_rate_2))
            money_insu_rate_2 = 0;
        else
            money_insu_rate_2 = money_insu_rate_2;

        if (isNaN(money_insu_rate_3))
            money_insu_rate_3 = 0;
        else
            money_insu_rate_3 = money_insu_rate_3;

        var money_insu_premium_1 = Math.round((money_insu_sum_insured_1 * money_insu_rate_1) / 1000);
        var money_insu_premium_2 = Math.round((money_insu_sum_insured_2 * money_insu_rate_2) / 1000);
        var money_insu_premium_3 = Math.round((money_insu_sum_insured_3 * money_insu_rate_3) / 1000);

        $("#money_insu_premium_1").val(money_insu_premium_1);
        $("#money_insu_premium_2").val(money_insu_premium_2);
        $("#money_insu_premium_3").val(money_insu_premium_3);

        get_total_sum_insured();
        get_total_premium();
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

        var plate_glass_premium = Math.round((plate_glass_sum_insured * plate_glass_rate_per) / 1000);

        $("#plate_glass_premium").val(plate_glass_premium);

        get_total_sum_insured();
        get_total_premium();
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

        var neon_glow_premium = Math.round((neon_glow_sum_insured * neon_glow_rate_per) / 1000);

        $("#neon_glow_premium").val(neon_glow_premium);

        get_total_sum_insured();
        get_total_premium();
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

        var baggage_ins_premium = Math.round((baggage_ins_sum_insured * baggage_ins_rate_per) / 1000);

        $("#baggage_ins_premium").val(baggage_ins_premium);

        get_total_sum_insured();
        get_total_premium();
    }


    function section_8sum_insured() {
        var personal_accident_sum_insured = $("#personal_accident_sum_insured").val();

        // personal_accident_sum_insured = parseInt(personal_accident_sum_insured);

        if (isNaN(personal_accident_sum_insured))
            personal_accident_sum_insured = 0;
        else
            personal_accident_sum_insured = personal_accident_sum_insured;

        var personal_accident_rate_per = $("#personal_accident_rate_per").val();

        // personal_accident_rate_per = parseInt(personal_accident_rate_per);

        if (isNaN(personal_accident_rate_per))
            personal_accident_rate_per = 0;
        else
            personal_accident_rate_per = personal_accident_rate_per;

        var personal_accident_premium = Math.round((personal_accident_sum_insured * personal_accident_rate_per) / 1000);

        $("#personal_accident_premium").val(personal_accident_premium);

        get_total_sum_insured();
        get_total_premium();
    }


    function section_9sum_insured() {
        var fidelity_gaur_sum_insured = $("#fidelity_gaur_sum_insured").val();

        // fidelity_gaur_sum_insured = parseInt(fidelity_gaur_sum_insured);

        if (isNaN(fidelity_gaur_sum_insured))
            fidelity_gaur_sum_insured = 0;
        else
            fidelity_gaur_sum_insured = fidelity_gaur_sum_insured;

        var fidelity_gaur_rate_per = $("#fidelity_gaur_rate_per").val();

        // fidelity_gaur_rate_per = parseInt(fidelity_gaur_rate_per);

        if (isNaN(fidelity_gaur_rate_per))
            fidelity_gaur_rate_per = 0;
        else
            fidelity_gaur_rate_per = fidelity_gaur_rate_per;

        var fidelity_gaur_premium = Math.round((fidelity_gaur_sum_insured * fidelity_gaur_rate_per) / 1000);

        $("#fidelity_gaur_premium").val(fidelity_gaur_premium);

        get_total_sum_insured();
        get_total_premium();
    }

    function section_10sum_insured() {
        var pub_libility_sum_insured = $("#pub_libility_sum_insured").val();
        var work_men_compens_sum_insured = $("#work_men_compens_sum_insured").val();

        // pub_libility_sum_insured = parseInt(pub_libility_sum_insured);
        // work_men_compens_sum_insured = parseInt(work_men_compens_sum_insured);

        if (isNaN(pub_libility_sum_insured))
            pub_libility_sum_insured = 0;
        else
            pub_libility_sum_insured = pub_libility_sum_insured;

        if (isNaN(work_men_compens_sum_insured))
            work_men_compens_sum_insured = 0;
        else
            work_men_compens_sum_insured = work_men_compens_sum_insured;

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

        var pub_libility_premium = Math.round((pub_libility_sum_insured * pub_libility_rate) / 1000);
        var work_men_compens_premium = Math.round((work_men_compens_sum_insured * work_men_compens_rate) / 1000);

        $("#pub_libility_premium").val(pub_libility_premium);
        $("#work_men_compens_premium").val(work_men_compens_premium);
        get_total_sum_insured();
        get_total_premium();
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

        var bus_inter_premium_1 = Math.round((bus_inter_sum_insured_1 * bus_inter_rate_1) / 1000);
        var bus_inter_premium_2 = Math.round((bus_inter_sum_insured_2 * bus_inter_rate_2) / 1000);
        var bus_inter_premium_3 = Math.round((bus_inter_sum_insured_3 * bus_inter_rate_3) / 1000);

        $("#bus_inter_premium_1").val(bus_inter_premium_1);
        $("#bus_inter_premium_2").val(bus_inter_premium_2);
        $("#bus_inter_premium_3").val(bus_inter_premium_3);

        get_total_sum_insured();
        get_total_premium();
    }

    function get_total_sum_insured() {
        //Section 1
        var fire_sum_insured_1 = $("#fire_sum_insured_1").val();
        var fire_sum_insured_2 = $("#fire_sum_insured_2").val();
        var fire_sum_insured_3 = $("#fire_sum_insured_3").val();

        //Section 2
        var burglary_sum_insured_1 = $("#burglary_sum_insured_1").val();
        var burglary_sum_insured_2 = $("#burglary_sum_insured_2").val();
        var burglary_sum_insured_3 = $("#burglary_sum_insured_3").val();

        //Section 3
        var money_insu_sum_insured_1 = $("#money_insu_sum_insured_1").val();
        var money_insu_sum_insured_2 = $("#money_insu_sum_insured_2").val();
        var money_insu_sum_insured_3 = $("#money_insu_sum_insured_3").val();

        //Section 5
        var plate_glass_sum_insured = $("#plate_glass_sum_insured").val();

        //Section 6
        var neon_glow_sum_insured = $("#neon_glow_sum_insured").val();

        //Section 7
        var baggage_ins_sum_insured = $("#baggage_ins_sum_insured").val();

        //Section 8
        var personal_accident_sum_insured = $("#personal_accident_sum_insured").val();

        //Section 9
        var fidelity_gaur_sum_insured = $("#fidelity_gaur_sum_insured").val();

        //Section 10
        var pub_libility_sum_insured = $("#pub_libility_sum_insured").val();
        var work_men_compens_sum_insured = $("#work_men_compens_sum_insured").val();

        //Section 11
        var bus_inter_sum_insured_1 = $("#bus_inter_sum_insured_1").val();
        var bus_inter_sum_insured_2 = $("#bus_inter_sum_insured_2").val();
        var bus_inter_sum_insured_3 = $("#bus_inter_sum_insured_3").val();

        var shopkeeper_total_sum_assured = 0;

        fire_sum_insured_1 = parseInt(fire_sum_insured_1);
        fire_sum_insured_2 = parseInt(fire_sum_insured_2);
        fire_sum_insured_3 = parseInt(fire_sum_insured_3);
        burglary_sum_insured_1 = parseInt(burglary_sum_insured_1);
        burglary_sum_insured_2 = parseInt(burglary_sum_insured_2);
        burglary_sum_insured_3 = parseInt(burglary_sum_insured_3);
        money_insu_sum_insured_1 = parseInt(money_insu_sum_insured_1);
        money_insu_sum_insured_2 = parseInt(money_insu_sum_insured_2);
        money_insu_sum_insured_3 = parseInt(money_insu_sum_insured_3);
        plate_glass_sum_insured = parseInt(plate_glass_sum_insured);
        neon_glow_sum_insured = parseInt(neon_glow_sum_insured);
        baggage_ins_sum_insured = parseInt(baggage_ins_sum_insured);
        personal_accident_sum_insured = parseInt(personal_accident_sum_insured);
        fidelity_gaur_sum_insured = parseInt(fidelity_gaur_sum_insured);
        pub_libility_sum_insured = parseInt(pub_libility_sum_insured);
        work_men_compens_sum_insured = parseInt(work_men_compens_sum_insured);
        bus_inter_sum_insured_1 = parseInt(bus_inter_sum_insured_1);
        bus_inter_sum_insured_2 = parseInt(bus_inter_sum_insured_2);
        bus_inter_sum_insured_3 = parseInt(bus_inter_sum_insured_3);

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

        if (isNaN(plate_glass_sum_insured))
            plate_glass_sum_insured = 0;
        else
            plate_glass_sum_insured = plate_glass_sum_insured;

        if (isNaN(neon_glow_sum_insured))
            neon_glow_sum_insured = 0;
        else
            neon_glow_sum_insured = neon_glow_sum_insured;

        if (isNaN(baggage_ins_sum_insured))
            baggage_ins_sum_insured = 0;
        else
            baggage_ins_sum_insured = baggage_ins_sum_insured;

        if (isNaN(personal_accident_sum_insured))
            personal_accident_sum_insured = 0;
        else
            personal_accident_sum_insured = personal_accident_sum_insured;

        if (isNaN(fidelity_gaur_sum_insured))
            fidelity_gaur_sum_insured = 0;
        else
            fidelity_gaur_sum_insured = fidelity_gaur_sum_insured;

        if (isNaN(pub_libility_sum_insured))
            pub_libility_sum_insured = 0;
        else
            pub_libility_sum_insured = pub_libility_sum_insured;

        if (isNaN(work_men_compens_sum_insured))
            work_men_compens_sum_insured = 0;
        else
            work_men_compens_sum_insured = work_men_compens_sum_insured;

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

        shopkeeper_total_sum_assured = parseInt(shopkeeper_total_sum_assured) + parseInt(fire_sum_insured_1) + parseInt(fire_sum_insured_2) + parseInt(fire_sum_insured_3) + parseInt(burglary_sum_insured_1) + parseInt(burglary_sum_insured_2) + parseInt(burglary_sum_insured_3) + parseInt(money_insu_sum_insured_1) + parseInt(money_insu_sum_insured_2) + parseInt(money_insu_sum_insured_3) + parseInt(plate_glass_sum_insured) + parseInt(neon_glow_sum_insured) + parseInt(baggage_ins_sum_insured) + parseInt(personal_accident_sum_insured) + parseInt(fidelity_gaur_sum_insured) + parseInt(pub_libility_sum_insured) + parseInt(work_men_compens_sum_insured) + parseInt(bus_inter_sum_insured_1) + parseInt(bus_inter_sum_insured_2) + parseInt(bus_inter_sum_insured_3);

        $("#shopkeeper_total_sum_assured").val(shopkeeper_total_sum_assured);
        get_amount_after_discount();
    }

    function get_total_premium() {
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

        //Section 8
        var personal_accident_premium = $("#personal_accident_premium").val();

        //Section 9
        var fidelity_gaur_premium = $("#fidelity_gaur_premium").val();

        //Section 10
        var pub_libility_premium = $("#pub_libility_premium").val();
        var work_men_compens_premium = $("#work_men_compens_premium").val();

        //Section 11
        var bus_inter_premium_1 = $("#bus_inter_premium_1").val();
        var bus_inter_premium_2 = $("#bus_inter_premium_2").val();
        var bus_inter_premium_3 = $("#bus_inter_premium_3").val();

        var shopkeeper_total_premium = 0;

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
        personal_accident_premium = parseInt(personal_accident_premium);
        fidelity_gaur_premium = parseInt(fidelity_gaur_premium);
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

        if (isNaN(personal_accident_premium))
            personal_accident_premium = 0;
        else
            personal_accident_premium = personal_accident_premium;

        if (isNaN(fidelity_gaur_premium))
            fidelity_gaur_premium = 0;
        else
            fidelity_gaur_premium = fidelity_gaur_premium;

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

        shopkeeper_total_premium = parseInt(shopkeeper_total_premium) + parseInt(fire_premium_1) + parseInt(fire_premium_2) + parseInt(fire_premium_3) + parseInt(burglary_premium_1) + parseInt(burglary_premium_2) + parseInt(burglary_premium_3) + parseInt(money_insu_premium_1) + parseInt(money_insu_premium_2) + parseInt(money_insu_premium_3) + parseInt(plate_glass_premium) + parseInt(neon_glow_premium) + parseInt(baggage_ins_premium) + parseInt(personal_accident_premium) + parseInt(fidelity_gaur_premium) + parseInt(pub_libility_premium) + parseInt(work_men_compens_premium) + parseInt(bus_inter_premium_1) + parseInt(bus_inter_premium_2) + parseInt(bus_inter_premium_3);

        $("#shopkeeper_total_premium").val(shopkeeper_total_premium);
        get_amount_after_discount();

    }

    function get_amount_after_discount() {
        var shopkeeper_total_premium = $("#shopkeeper_total_premium").val();
        var shopkeeper_less_discount_per = $("#shopkeeper_less_discount_per").val();

        shopkeeper_total_premium = parseInt(shopkeeper_total_premium);
        // shopkeeper_less_discount_per = parseInt(shopkeeper_less_discount_per);

        if (isNaN(shopkeeper_total_premium))
            shopkeeper_total_premium = 0;
        else
            shopkeeper_total_premium = shopkeeper_total_premium;

        // if (isNaN(shopkeeper_less_discount_per))
        //     shopkeeper_less_discount_per = 0;
        // else
        //     shopkeeper_less_discount_per = shopkeeper_less_discount_per;

        var shopkeeper_less_discount_tot = Math.round((shopkeeper_less_discount_per * shopkeeper_total_premium) / 100);
        var shopkeeper_fire_rate_after_discount_tot = shopkeeper_total_premium - shopkeeper_less_discount_tot;
        $("#shopkeeper_less_discount_tot").val(shopkeeper_less_discount_tot);
        $("#shopkeeper_fire_rate_after_discount_tot").val(shopkeeper_fire_rate_after_discount_tot);
        gst_apply();
    }

    function get_amount_after_discount_bak() {
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

        var shopkeeper_less_discount_tot = Math.round((shopkeeper_less_discount_per * shopkeeper_total_sum_assured) / 100);
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

        var shopkeeper_cgst_fire_tot = Math.round((shopkeeper_fire_rate_after_discount_tot * shopkeeper_cgst_fire_per) / 100);
        var shopkeeper_sgst_fire_tot = Math.round((shopkeeper_fire_rate_after_discount_tot * shopkeeper_sgst_fire_per) / 100);
        $("#shopkeeper_cgst_fire_tot").val(shopkeeper_cgst_fire_tot);
        $("#shopkeeper_sgst_fire_tot").val(shopkeeper_sgst_fire_tot);

        var shopkeeper_final_paybal_premium = parseInt(shopkeeper_fire_rate_after_discount_tot) + parseInt(shopkeeper_cgst_fire_tot) + parseInt(shopkeeper_sgst_fire_tot);
        // alert(shopkeeper_final_paybal_premium);
        $("#shopkeeper_final_paybal_premium").val(shopkeeper_final_paybal_premium);
    }
</script>