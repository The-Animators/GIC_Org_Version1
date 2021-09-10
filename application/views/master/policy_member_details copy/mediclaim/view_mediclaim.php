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
    .table td, .table th {
    padding: .5rem;
    font-size: 13px;
    }
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
                    <th>Type Of Policy</th>
                    <th>Option </th>
                    <th>Sum Insured</th>
                    <th>Premium</th>
                    <th id="dm_per_th">DM %</th>
                    <th id="dm_load_th">DM Loading</th>
                    <th id="htn_per_th">HTN %</th>
                    <th id="htn_load_th">HTN Loading</th>
                    <th>Premium After Loading</th>
                    <th>NCD %</th>
                    <th>NCD Amount</th>
                    <th>Premium After NCD</th>
                </tr>
            </thead>
            <tbody id="first_table_tbody">

            </tbody>
        </table>
    </div>
    <div class="col-md-12">
        <table class="table mb-0 table-bordered mt-2 col-md-12">
            <tr id="declaration_sale_fig_tr">
                <!-- <td colspn="2"><strong>NCD Total: </strong></td> -->
                <td colspn="2" width="50%"><strong>Total: </strong></td>
                <td colspn="2" width="35%"><strong> </strong></td>
                <td colspn=""><center><strong id="medi_total_ncd_amount"></strong></center></td>
                <!-- <td colspn="2"><strong> Premium Total: </strong></td> -->
                <td><center><strong id="medi_total_amount"></strong></center></td>
            </tr>
            <tr id="annual_turn_over_tr">
                <td colspn=""><strong> Family Discount: </strong></td>
                <td colspn=""><center><strong id="medi_family_disc_rate"></strong></center></td>
                <td colspn=""><strong></strong></td>
                <td><center><strong id="medi_family_disc_tot"></center></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Pemium After FD: </strong></td>
                <td colspn=""><strong></strong></td>
                <td colspn=""><strong></strong></td>
                <td><center><strong id="medi_premium_after_fd"></center></td>
            </tr>
            <tr>
                <td colspn=""><strong> CGST:</strong></td>
                <td><center><strong id="cgst_fire_per"></center></td>
                <td><strong id=""></strong></td>
                <td><center><strong id="medi_cgst_tot"></center></td>
            </tr>
            <tr>
                <td><strong> SGST</strong></td>
                <td><center><strong id="sgst_fire_per"></center></td>
                <td><strong id=""></strong></td>
                <td><center><strong id="medi_sgst_tot"></center></td>
            </tr>
            <tr>
                <td colspn="3"><strong class="text-purple">Final Premium</strong></td>
                <td colspn="2"><strong></strong></td>
                <td colspn="2"><strong></strong></td>
                <td><center><strong class="text-purple" id="medi_final_premium"></center></td>
            </tr>
        </table>
    </div>
</div>
