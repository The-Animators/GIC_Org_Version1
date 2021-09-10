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
                    <th>Name Of Insured</th>
                    <th>DOB</th>
                    <th>Age</th>
                    <th>Relations</th>
                    <th>Nominee Name</th>
                    <th>Nominee Relations</th>
                    <th>Past History</th>
                    <th>Type Of Policy</th>
                    <th>Option </th>
                    <th>Sum Insured</th>
                    <th>Premium</th>
                    <th>NCD (No Claim Discount)</th>
                    <th>Premium After NCD</th>
                    <th id="restore_C_th">Restore Cover</th>
                    <th id="restore_CP_th">Restore Premium</th>
                    <th id="maternity_C_th">Maternity Cover</th>
                    <th id="maternity_CP_th">Maternity Premium</th>
                    <th id="daily_C_th">Daily Cash Cover</th>
                    <th id="daily_CP_th">Daily Cash Premium</th>
                    <th id="">Final Premium</th>
                </tr>
            </thead>
            <tbody id="first_table_tbody">
        
        </tbody>
            <input type="hidden" id="new_load_gross_premium" name="new_load_gross_premium" value="">
        </table>
    </div>
    <div class="col-md-12">
        <table class="table mb-0 table-bordered mt-2 col-md-12">
            <tr id="declaration_sale_fig_tr">
                <td colspn="2"><strong> Total Premium: </strong></td>
                <td colspn="2"><strong></strong></td>
                <td><center><strong id="medi_ind_2020_total_premium"></strong></center></td>
            </tr>
            <tr id="annual_turn_over_tr">
                <td colspn=""><strong> Family discount to be considered in individual policy for more than 2 people: </strong></td>
                <td colspn=""><center><strong id="medi_ind_2020_family_descount_per"></strong></center></td>
                <td><center><strong id="medi_ind_2020_family_descount_tot"></strong></center></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Add Loading: </strong></td>
                <td colspn=""><center><strong id="medi_ind_2020_load_description"></strong></center></td>
                <td><center><strong id="medi_ind_2020_load_amount"></strong></center></td>
            </tr>

            <!-- <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Restore Cover Premium: </strong></td>
                <td colspn=""><strong id=""></strong></td>
                <td><strong id="medi_ind_2020_restore_cover_premium"></strong></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Maternity & New Born Baby Cover PREMIUM: </strong></td>
                <td colspn=""><strong id=""></strong></td>
                <td><strong id="medi_ind_2020_maternity_new_bornbaby"></strong></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Daily Cash Allowance on Hospitalization Cover Premium (consider B chart): </strong></td>
                <td colspn=""><strong id=""></strong></td>
                <td><strong id="medi_ind_2020_daily_cash_allow_hosp"></strong></td>
            </tr> -->

            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Premium After Loading/Gross Premium: </strong></td>
                <td colspn=""><strong id=""></strong></td>
                <td><center><strong id="medi_ind_2020_load_gross_premium"></strong></center></td>
            </tr>
            <tr>
                <td colspn=""><strong> CGST:</strong></td>
                <td><center><strong id="cgst_fire_per"></strong></center></td>
                <td><center><strong id="medi_ind_2020_cgst_tot"></strong></center></td>
            </tr>
            <tr>
                <td><strong> SGST</strong></td>
                <td><center><strong id="sgst_fire_per"></strong></center></td>
                <td><center><strong id="medi_ind_2020_sgst_tot"></strong></center></td>
            </tr>
            <tr>
                <td colspn="3"><strong class="text-purple">Final Premium</strong></td>
                <td colspn="3"><strong class="text-purple"></strong></td>
                <td><center><strong id="medi_ind_2020_final_premium" class="text-purple"></strong></center></td>
            </tr>
        </table>
    </div>
</div>
