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
                    <th>Past History</th>
                    <th>Type Of Policy</th>
                    <th>Option </th>
                    <th>Nominee Name</th>
                    <th>Nominee Relations</th>
                    <th>Sum Insured</th>
                    <th>Premium</th>
                </tr>
            </thead>
            <tbody id="first_table_tbody">

            </tbody>
            <input type="hidden" id="max_age" name="max_age" value="">
        </table>
    </div>
    <div class="col-md-12">
        <table class="table mb-0 table-bordered mt-2 col-md-12">
            <tr id="declaration_sale_fig_tr">
                <td colspn="2" width="65%"><strong> Total Premium: </strong></td>
                <td colspn="2" width="25%"><strong></strong></td>
                <td><center><strong id="medi_float_2014_total_premium"></strong></center></td>
            </tr>
            <tr id="annual_turn_over_tr">
                <td colspn=""><strong> Premium For Additional Child: </strong></td>
                <td colspn="">
                <div class="row">
                            <div class="col-md-5"><center><strong id="medi_float_2014_child_count"></strong></center></div>
                            <div class="col-md-2"><center><strong id="">*</strong></center></div>
                            <div class="col-md-5"><center><strong id="medi_float_2014_child_count_first_premium"></strong></center></div>
                        </div>
                <!-- <center><strong id="medi_float_2014_child_count"></strong></center> -->
                
                </td>
                <td><center><strong id="medi_float_2014_child_total_premium"></strong></center></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Add Loading: </strong></td>
                <td colspn=""><center><strong id="medi_float_2014_load_description"></strong></center></td>
                <td><center><strong id="medi_float_2014_load_amount"></strong></center></td>
            </tr>
            <tr id="tot_sum_insured_tr">
                <td colspn="3"><strong> Premium After Loading/Gross Premium: </strong></td>
                <td colspn=""><strong id=""></strong></td>
                <td><center><strong id="medi_float_2014_load_gross_premium"></strong></center></td>
            </tr>
            <tr>
                <td colspn=""><strong> CGST:</strong></td>
                <td><center><strong id="cgst_fire_per"></strong></center></td>
                <td><center><strong id="medi_float_2014_cgst_tot"></strong></center></td>
            </tr>
            <tr>
                <td><strong> SGST</strong></td>
                <td><center><strong id="sgst_fire_per"></strong></center></td>
                <td><center><strong id="medi_float_2014_sgst_tot"></strong></center></td>
            </tr>
            <tr>
                <td colspn="3"><strong class="text-purple">Final Premium</strong></td>
                <td colspn="3"><strong class="text-purple"></strong></td>
                <td><center><strong id="medi_float_2014_final_premium"  class="text-purple"></strong></center></td>
            </tr>
        </table>
    </div>
</div>
