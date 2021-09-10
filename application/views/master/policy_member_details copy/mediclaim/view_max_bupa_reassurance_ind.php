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
    <div class="col-md-6">
        <div class="form-group row">
            <label for="risk_code" class="col-form-label col-md-4  text-right">Years of Premium : </label>
            <div class="col-form-label col-md-8"><strong id="years_of_premium" ></strong>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label for="hazard_grade" class="col-form-label col-md-4  text-right">Region : </label>
            <div class="col-form-label col-md-8"><strong id="region" ></strong>
            </div>
        </div>
    </div>
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
                    <th>Sum Insured</th>
                    <th>Basic Premium</th>
                    <th>Personal Accident Benefit Premium</th>
                    <th>Hospital Cash</th>
                    <th>Safeguard Benefit</th>
                    <th>Total Premium</th>
                </tr>
            </thead>
            <tbody id="first_table_tbody">

            </tbody>
        </table>
    </div>
    <div class="col-md-12 mt-2"><span><strong>Term Discount : </strong></span></div>
    <div class="col-md-12">
    
        <table class="table mb-0 table-bordered mt-2 col-md-12">
            <thead>
                <tr id="">
                    <th><strong>Term: </strong></td>
                    <td><strong>Percentage: </strong></td>
                    <td><strong>Discount: </strong></td>
                    <td><strong>Notes: </strong></td>
                </tr>
            </thead> 

            <tbody>
                <tr id="first_term">
                    <td>1</td>
                    <td><center><strong id="first_year_rate" ></strong></center></td>
                    <td><center><strong id="first_year_tot" ></strong></center></td>
                    <td>0%</td>
                </tr>
                <tr id="second_term" style="display:none;">
                    <td>2</td>
                    <td><center><strong id="second_year_rate" ></strong></center></td>
                    <td><center><strong id="second_year_tot" ></strong></center></td>
                    <td>7.5% on 2nd year’s premium</td>
                </tr>
                <tr id="third_term" style="display:none;">
                    <td>3</td>
                    <td><center><strong id="third_year_rate" ></strong></center></td>
                    <td><center><strong id="third_year_tot" ></strong></center></td>
                    <td>Additional 15% on 3rd year’s premium</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td></td>
                    <td><center><strong id="tot_term_disc" ></strong></center></td>
                    <td></td>
                </tr>
            </tbody> 
        </table>

        <table class="table mb-0 table-bordered mt-2 col-md-12">
            <tr id="">
                <td colspn="2"><strong>Total Premium: </strong></td>
                <td colspn=""><strong></strong></td>
                <td><center><strong id="tot_premium" ></strong></center></td>
            </tr>
            <td colspn="3"><strong> Standing Instruction Discount: </strong></td>
                <td colspn=""><center><strong id="stand_instu_rate" ></strong></center></td>
                <td><center><strong id="stand_instu_tot" ></strong></center></td>
            </tr>
            <td colspn="3"><strong> Doctor Discount: </strong></td>
                <td colspn=""><center><strong id="doctor_disc_per" ></strong></center></td>
                <td><center><strong id="doctor_disc_tot" ></strong></center></td>
            </tr>
            <tr id="">
                <td colspn="3"><strong> Family discount on individual sum insured basis: </strong></td>
                <td colspn=""><center><strong id="family_disc_per" ></strong></center><strong></td>
                <td><center><strong id="family_disc_tot" ></strong></center></td>
            </tr>
            <tr id="">
                <td colspn="3"><strong>Gross Premium: </strong></td>
                <td colspn=""><strong></strong></td>
                <td><center><strong id="gross_premium_tot" ></strong></center></td>
            </tr>
            <tr>
                <td colspn=""><strong> CGST:</strong></td>
                <td><center><strong id="cgst_fire_per" ></strong></center></td>
                <td><center><strong id="medi_cgst_tot" ></strong></center></td>
            </tr>
            <tr>
                <td><strong> SGST</strong></td>
                <td><center><strong id="sgst_fire_per" ></strong></center></td>
                <td><center><strong id="medi_sgst_tot" ></strong></center></td>
            </tr>
            <tr>
                <td colspn="3"><strong class="text-purple">Final Premium</strong></td>
                <td colspn="2"><strong></strong></td>
                <td><center><strong id="medi_final_premium" class="text-purple" ></strong></center></td>
            </tr>
        </table>
    </div>
</div>
<script>
    function Term_Discount_table(){
        var years_of_premium = $("#years_of_premium").text();
        if(years_of_premium == 2){
            $("#second_term").show();
            $("#third_term").hide();
        }else if(years_of_premium == 3 || years_of_premium == 4 || years_of_premium == 5){
            $("#second_term").show();
            $("#third_term").show();
        }else if(years_of_premium == 1){
            $("#second_term").hide();
            $("#third_term").hide();
        }
    }
</script>