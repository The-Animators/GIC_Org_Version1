<div class="row">
    <div class="col-md-10">
        <table class="table mb-0 table-bordered">
            <tr>
                <td colspan="2"><strong>
                        Total Sum Assured
                        <!--<center> Total Sum Assured</center> -->
                    </strong></td>

                <td><strong>
                        <input type="number" name="total_sum_assured" id="total_sum_assured" value="" class="form-control">
                    </strong></td>
            </tr>
            <tr>
                <td colspan=""><strong>
                        Fire Rate (Per 1000)
                        <!-- Fire Rate (in %) -->
                    </strong></td>

                <td><strong>
                        <input type="number" name="fire_rate_per" id="fire_rate_per" value="" class="form-control" onkeyup="get_total_fire()">
                    </strong></td>
                <td><strong>
                        <input type="number" name="fire_rate_tot" id="fire_rate_tot" value="" class="form-control">
                    </strong></td>
            </tr>
            <tr>
                <td colspan=""><strong>
                        Less Discount (in %)
                    </strong></td>

                <td><strong>
                        <input type="number" name="less_discount_per" id="less_discount_per" value="" class="form-control" onkeyup="get_total_discount()">
                    </strong></td>
                <td><strong>
                        <input type="number" name="less_discount_tot" id="less_discount_tot" value="" class="form-control">
                    </strong></td>
            </tr>
            <tr>
                <td colspan="2"><strong>
                        Fire Rate After Discount
                    </strong></td>

                <td><strong>
                        <input type="number" name="fire_rate_after_discount_tot" id="fire_rate_after_discount_tot" value="" class="form-control">
                    </strong></td>
            </tr>
            <tr>
                <td colspan="2"><strong>
                        Gross Premium
                    </strong></td>

                <td><strong>
                        <input type="number" name="gross_premium" id="gross_premium" value="" class="form-control">
                    </strong></td>
            </tr>
            <tr>
                <td colspan=""><strong>
                        Add CGST (in %)
                    </strong></td>

                <td><strong>
                        <input type="number" name="cgst_fire_per" id="cgst_fire_per" value="" class="form-control" onkeyup="gst_apply()">
                    </strong></td>
                <td><strong>
                        <input type="number" name="cgst_fire_tot" id="cgst_fire_tot" value="" class="form-control">
                    </strong></td>
            </tr>
            <tr>
                <td colspan=""><strong>
                        Add SGST (in %)
                    </strong></td>

                <td><strong>
                        <input type="number" name="sgst_fire_per" id="sgst_fire_per" value="" class="form-control" onkeyup="gst_apply()">
                    </strong></td>
                <td><strong>
                        <input type="number" name="sgst_fire_tot" id="sgst_fire_tot" value="" class="form-control">
                    </strong></td>
            </tr>
            <tr>
                <td colspan="2"><strong class="text-purple">
                        Final Payable Premium
                    </strong></td>

                <td><strong>
                        <input type="number" name="final_paybal_premium" id="final_paybal_premium" value="" class="form-control">
                        <input type="hidden" name="griharaksha_fire_policy_id" id="griharaksha_fire_policy_id" value="" class="form-control">
                    </strong></td>
            </tr>
        </table>
    </div>
</div>

<script>
function get_total_sum_Assured(){
    var inputs = $(".risk_sum_assured");
    var total = 0; 
    for(var i = 0; i < inputs.length; i++){
    // alert($(inputs[i]).val());
        var risk_sum_assured = $(inputs[i]).val();
        risk_sum_assured = parseInt(risk_sum_assured);
        if(isNaN(risk_sum_assured))
        risk_sum_assured = 0;
        else
        risk_sum_assured = risk_sum_assured;

        total = total + risk_sum_assured;
        // alert(total);
    }
    // total=total.toFixed(2);
    $("#total_sum_assured").val(total);
    gst_apply();
    get_total_fire();
    get_total_discount();
}

function get_total_fire(){
    var fire_rate_per = $("#fire_rate_per").val();
    var total_sum_assured = $("#total_sum_assured").val();
    // fire_rate_per = parseInt(fire_rate_per);

        if(isNaN(fire_rate_per))
        fire_rate_per = 0;
        else
        fire_rate_per = fire_rate_per;

        // total_sum_assured = parseInt(total_sum_assured);
        if(isNaN(total_sum_assured))
        total_sum_assured = 0;
        else
        total_sum_assured = total_sum_assured;

        var fire_rate_tot = Math.round((total_sum_assured*fire_rate_per)/1000);

        // fire_rate_tot=fire_rate_tot.toFixed(2);
    $("#fire_rate_tot").val(fire_rate_tot);
    gst_apply();
    get_total_discount();
}


function get_total_discount(){
    var less_discount_per = $("#less_discount_per").val();
    var fire_rate_tot = $("#fire_rate_tot").val();
    // less_discount_per = parseInt(less_discount_per);
        if(isNaN(less_discount_per))
        less_discount_per = 0;
        else
        less_discount_per = less_discount_per;

        // fire_rate_tot = parseInt(fire_rate_tot);
        if(isNaN(fire_rate_tot))
        fire_rate_tot = 0;
        else
        fire_rate_tot = fire_rate_tot;

    var less_discount_tot = Math.round((less_discount_per*fire_rate_tot)/100);

    // less_discount_tot=less_discount_tot.toFixed(2);

    $("#less_discount_tot").val(less_discount_tot);
    get_fixrate_after_Discount();
    gst_apply();
}


function get_fixrate_after_Discount(){
    var less_discount_tot = $("#less_discount_tot").val();
    var fire_rate_tot = $("#fire_rate_tot").val();
    // less_discount_per = parseInt(less_discount_per);
        if(isNaN(less_discount_tot))
        less_discount_tot = 0;
        else
        less_discount_tot = less_discount_tot;

        // fire_rate_tot = parseInt(fire_rate_tot);
        if(isNaN(fire_rate_tot))
        fire_rate_tot = 0;
        else
        fire_rate_tot = fire_rate_tot;

    var fire_rate_after_discount_tot = (fire_rate_tot-less_discount_tot);

    // fire_rate_after_discount_tot = fire_rate_after_discount_tot.toFixed(2);

    $("#fire_rate_after_discount_tot").val(fire_rate_after_discount_tot);
    $("#gross_premium").val(fire_rate_after_discount_tot);
    gst_apply();
}

function gst_apply(){
    var cgst_fire_per = $("#cgst_fire_per").val();
    var sgst_fire_per = $("#sgst_fire_per").val();
    var fire_rate_per = $("#fire_rate_per").val();
    var gross_premium = $("#gross_premium").val();
    
    // fire_rate_per = parseInt(fire_rate_per);
    if(isNaN(fire_rate_per))
    fire_rate_per = 0;
        else
        fire_rate_per = fire_rate_per;

        // gross_premium = parseInt(gross_premium);
        if(isNaN(gross_premium))
        gross_premium = 0;
        else
        gross_premium = gross_premium;


        if(fire_rate_per == ""){
        $("#fire_rate_tot").val(0.00);
        $("#less_discount_tot").val(0.00);
        $("#fire_rate_after_discount_tot").val(0.00);
        $("#gross_premium").val(0.00);
        $("#cgst_fire_tot").val(0.00);
        $("#sgst_fire_tot").val(0.00);
        $("#final_paybal_premium").val(0.00);
    }

    var cgst_fire_tot =Math.round((gross_premium*cgst_fire_per)/100);
    var sgst_fire_tot =Math.round((gross_premium*sgst_fire_per)/100);

    // cgst_fire_tot = cgst_fire_tot.toFixed(2);
    // sgst_fire_tot = sgst_fire_tot.toFixed(2);

    $("#cgst_fire_tot").val(cgst_fire_tot);
    $("#sgst_fire_tot").val(sgst_fire_tot);

    var final_paybal_premium = parseInt(gross_premium)+parseInt(cgst_fire_tot)+parseInt(sgst_fire_tot);
    // final_paybal_premium = final_paybal_premium.toFixed(2);
    $("#final_paybal_premium").val(final_paybal_premium);


}
</script>