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
        font-size:12px;
    }

    /* tr:nth-child(even) {
        background-color: #f2f2f2
    } */
</style>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label for="risk_code" class="col-form-label col-md-4  text-right">Years of Premium : </label>
            <div class="col-md-8 col-form-label" id="years_of_premium"> </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label for="hazard_grade" class="col-form-label col-md-4  text-right">Region : </label>
            <div class="col-md-8 col-form-label" id="region"></div>
        </div>
    </div>
    <div class="col-md-12" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="first_table">
            <thead>
                <tr>
                    <th>Name Of Insured</th>
                    <th>DOB</th>
                    <th>Age</th>
                    <th>Past History</th>
                    <th>Relations</th>
                    <th>Nominee Name</th>
                    <th>Nominee Relations</th>
                    <th>Sum Insured</th>
                    <th>NCB</th>
                    <th>Protector Rider</th>
                    <th>Hospital Daily Cash(Per Day)</th>
                    <th>IPA Rider Si</th>
                    <th>Basic Premium</th>
                </tr>
            </thead>
            <tbody id="first_table_tbody">

            </tbody>
        </table>
    </div>
    <div class="col-md-12">
        <table class="table mb-0 table-bordered mt-2 col-md-12">
            <tr id="">
                <td colspn="2"><strong>Total Premium: </strong></td>
                <td colspn=""><strong></strong></td>
                <td><center><strong id="tot_premium"></strong></center></td>
            </tr>
            <tr id="annual_turn_over_tr">
                <td colspn=""><strong> Premium For Additional Child: </strong></td>
                <td colspn=""><strong>
                <div class="row">
                    <div class="col-md-5"><center><strong id="hdfc_ergo_health_insu_child_count"></strong></center></div>
                    <div class="col-md-2"><center><strong>*</strong></center></div>
                    <div class="col-md-5"><center><strong id="hdfc_ergo_health_insu_child_count_first_premium"></strong></center></div>
                </div></strong></td>
                <td><center><strong id="hdfc_ergo_health_insu_child_total_premium"></strong></center></td>
            </tr>
            <tr id="">
                <td colspn="2"><strong>Protector Rider Premium: </strong></td>
                <td colspn=""><strong></strong></td>
                <td><center><strong id="protect_ride_prem_tot"></strong></center></td>
            </tr>
            <tr id="">
                <td colspn=""><strong> Hospital Daily Cash Premium: </strong></td>
                <td colspn=""><strong></strong></td>
                <td><center><strong id="hospital_daily_cash_prem_tot"></strong></center></td>
            </tr>
            <tr id="">
                <td colspn=""><strong>IPA Rider Premium:</strong></td>
                <td colspn=""><strong></strong></td>
                <td><center><strong id="ipa_rider_prem_tot"></strong></center></td>
            </tr>
            <tr id="">
                <td colspn="3"><strong> Long Term Premuim Discount: </strong></td>
                <td colspn=""><center><strong id="less_disc_per"></strong></center></td>
                <td><center><strong id="less_disc_tot"></strong></center></td>
            </tr>
            <tr id="">
                <td colspn=""><strong>Stay Active Benefit:</strong></td>
                <td colspn=""><center><strong id="stay_active_benefit"></strong></center></td>
                <td><center><strong id="stay_active_benefit_prem_tot"></center></td>
            </tr>
            <tr id="">
                <td colspn="3"><strong> Loading: </strong></td>
                <td colspn=""><center><strong id="load_desc"></strong></center></td>
                <td><center><strong id="load_tot"></strong></center></td>
            </tr>
            <tr id="">
                <td colspn="3"><strong> Gross Premium: </strong></td>
                <td colspn=""><strong></strong></td>
                <td><center><strong id="gross_premium_tot"></strong></center></td>
            </tr>
            <tr>
                <td colspn=""><strong> CGST:</strong></td>
                <td><center><strong id="cgst_fire_per"></strong></center></td>
                <td><center><strong id="medi_cgst_tot"></strong></center></td>
            </tr>
            <tr>
                <td><strong> SGST</strong></td>
                <td><center><strong id="sgst_fire_per"></strong></center></td>
                <td><center><strong id="medi_sgst_tot"></strong></center></td>
            </tr>
            <tr>
                <td colspn="3"><strong class="text-purple">Final Premium</strong></td>
                <td colspn="2"><strong></strong></td>
                <td><center><strong id="medi_final_premium"  class="text-purple"></strong></center></td>
            </tr>
        </table>
    </div>
</div>
