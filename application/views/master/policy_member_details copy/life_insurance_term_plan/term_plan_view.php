<div class="row">
    <div class="col-md-12">
        <table class="table mb-0 table-bordered">
            <tr>
                <td colspan="2"><strong>Policy Term </strong></td>
                <td><strong><input type="number" name="policy_term" id="policy_term" value="" class="form-control"></strong></td>
            </tr>
            <tr>
                <td colspan="2"><strong>Premium paying term</strong></td>
                <td><strong><input type="number" name="premium_paying_term" id="premium_paying_term" value="" class="form-control"></strong></td>
            </tr>
            <tr>
                <td colspan="2"><strong> Sum Insured</strong></td>
                <td><strong><input type="number" name="sum_insured" id="sum_insured" value="" class="form-control">
                    </strong></td>
            </tr>
            <tr>
                <td colspan="2"><strong> Basic Premium</strong></td>
                <td><strong><input type="number" name="basic_premium" id="basic_premium" value="" class="form-control" onkeyup="get_premium_after_load()">
                    </strong></td>
            </tr>

            <tr>
                <td colspan="2"><strong> Add: Loading </strong></td>
                <td><strong> <input type="number" name="add_loading" id="add_loading" value="" class="form-control" onkeyup="get_premium_after_load()"> </strong></td>
            </tr>
            <tr>
                <td colspan="2"><strong>Loading description </strong></td>
                <td><strong><textarea name="loading_description" id="loading_description" class="form-control"></textarea></strong></td>
            </tr>
            <tr>
                <td colspan="2"><strong>Premium After Loading</strong></td>
                <td><strong><input type="number" name="premium_after_loading" id="premium_after_loading" value="" class="form-control"></strong></td>
            </tr>
            <tr>
                <td colspan=""><strong>CGST</strong></td>
                <td><strong><input type="number" name="cgst_term_plan" id="cgst_term_plan" value="" class="form-control" onkeyup="gst_apply()"></strong></td>
                <td><strong><input type="number" name="cgst_term_plan_tot" id="cgst_term_plan_tot" value="" class="form-control"></strong></td>
            </tr>
            <tr>
                <td colspan=""><strong>SGST</strong></td>
                <td><strong><input type="number" name="sgst_term_plan" id="sgst_term_plan" value="" class="form-control" onkeyup="gst_apply()"></strong></td>
                <td><strong><input type="number" name="sgst_term_plan_tot" id="sgst_term_plan_tot" value="" class="form-control"></strong></td>
            </tr>
            <tr>
                <td colspan="2"><strong class="text-purple"> Final Payable Premium</strong></td>
                <td><strong><input type="number" name="term_plan_final_paybal_premium" id="term_plan_final_paybal_premium" value="" class="form-control">
                        <input type="hidden" name="term_plan_policy_id" id="term_plan_policy_id" value="" class="form-control">
                    </strong></td>
            </tr>
        </table>
    </div>
</div>

<script>
    function get_premium_after_load() {
        var basic_premium = $("#basic_premium").val();
        var add_loading = $("#add_loading").val();

        basic_premium = parseInt(basic_premium);
        add_loading = parseInt(add_loading);

        if (isNaN(basic_premium))
            basic_premium = 0;
        else
            basic_premium = basic_premium;

        if (isNaN(add_loading))
            add_loading = 0;
        else
            add_loading = add_loading;

        var premium_after_loading = basic_premium + add_loading;

        $("#premium_after_loading").val(premium_after_loading);
        gst_apply();
    }

    function gst_apply() {
        var cgst_term_plan = $("#cgst_term_plan").val();
        var sgst_term_plan = $("#sgst_term_plan").val();
        var premium_after_loading = $("#premium_after_loading").val();

        cgst_term_plan = parseInt(cgst_term_plan);
        sgst_term_plan = parseInt(sgst_term_plan);
        premium_after_loading = parseInt(premium_after_loading);

        if (isNaN(cgst_term_plan))
            cgst_term_plan = 0;
        else
            cgst_term_plan = cgst_term_plan;

        if (isNaN(sgst_term_plan))
            sgst_term_plan = 0;
        else
            sgst_term_plan = sgst_term_plan;

        if (isNaN(premium_after_loading))
            premium_after_loading = 0;
        else
            premium_after_loading = premium_after_loading;

        if (premium_after_loading == "") {
            $("#cgst_term_plan_tot").val(0);
            $("#sgst_term_plan_tot").val(0);
            $("#term_plan_final_paybal_premium").val(0);
        }

        var cgst_term_plan_tot = Math.round((premium_after_loading * cgst_term_plan) / 100);
        var sgst_term_plan_tot = Math.round((premium_after_loading * sgst_term_plan) / 100);
        $("#cgst_term_plan_tot").val(cgst_term_plan_tot);
        $("#sgst_term_plan_tot").val(sgst_term_plan_tot);

        var term_plan_final_paybal_premium = parseInt(premium_after_loading) + parseInt(cgst_term_plan_tot) + parseInt(sgst_term_plan_tot);
        // alert(term_plan_final_paybal_premium);
        $("#term_plan_final_paybal_premium").val(term_plan_final_paybal_premium);
    }
</script>