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
            <label for="tpa_company" class="col-form-label col-md-5 font-weight-bold">Email Section : </label>
            <div class="col-md-8">
            </div>
        </div>
    </div>
    <div class="col-md-12" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="first_table">
            <thead>
                <tr>
                    <th><button class="btn btn-primary btn-sm Add_GMC" id="Add_GMC" onclick="AddGMC(0)">Add</button></th>
                    <th>Client Email</th>
                    <th>Date</th>
                    <th>Excel Attach</th>
                    <th>Company Email</th>
                    <th>Attach Quote</th>
                    <th>Attach Endorsment Copy</th>
                    <th>Gross Premium</th>
                    <th>Cgst </th>
                    <th>Sgst</th>
                    <th>Final Premium</th>
                </tr>
            </thead>
            <tbody id="first_table_tbody">
                <tr>
                    <td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_gmc_0" onClick=removeGMC(0) disabled></td>
                    <td width="12%"><textarea style="width:100px;" name="gmc_client_email[]" id="gmc_client_email_0" class="form-control gmc_client_email" rows="3"></textarea></td>
                    <td><input style="width:100px;" type="text" name="gmc_date[]"  id="gmc_date_0"value="" class="form-control gmc_date"></td>

                    <td><input style="width:110px;" type="file" name="gmc_excel_attach[]" id="gmc_excel_attach_0" value="" class="form-control gmc_excel_attach"><span id="gmc_excel_attach_err_0"></span><input type="hidden" class="form-control gmc_excel_attach_file_name" name="gmc_excel_attach_file_name" id="gmc_excel_attach_file_name" value=""></td>

                    <td><textarea style="width:100px;" name="gmc_company_email[]" id="gmc_company_email_0" class="form-control gmc_company_email" rows="3"></textarea></td>
                    
                    <td><input style="width:110px" type="file" name="gmc_attach_quote" id="gmc_attach_quote_0" class="form-control gmc_attach_quote" >
                    <span id="gmc_attach_quote_err_0"></span>
                    <input style="width:100px;" type="hidden" name="gmc_attach_quote_file_name" id="gmc_attach_quote_file_name" class="form-control gmc_attach_quote_file_name" ></td>
                    <td><input style="width:110px;" type="file" name="gmc_attach_endorsment_copy" id="gmc_attach_endorsment_copy_0" class="form-control gmc_attach_endorsment_copy" >
                    <span id="gmc_attach_endorsment_copy_err_0"></span>
                    <input style="width:100px;" type="hidden" name="gmc_attach_endorsment_copy_file_name" id="gmc_attach_endorsment_copy_file_name" class="form-control gmc_attach_endorsment_copy_file_name" ></td>
                    <td><input style="width:100px;" type="text" name="gmc_gross_premium" id="gmc_gross_premium_0" class="form-control gmc_gross_premium" ></td>
                    <td><input style="width:100px;" type="text" name="gmc_cgst" id="gmc_cgst_0" class="form-control gmc_cgst" ></td>
                    <td><input style="width:100px;" type="text" name="gmc_sgst" id="gmc_sgst_0" class="form-control gmc_sgst" ></td>
                    <td><input style="width:100px;" type="text" name="gmc_final_premium" id="gmc_final_premium_0" class="form-control gmc_final_premium" ></td>
                </tr>
                

            </tbody>
        </table>
    </div>

</div>

<script>
    var add_gmc_counter = 0;
    var main_GMC = [];
    $(function() {
            $("#gmc_date_0").datepicker({
                'format': 'yyyy-mm-dd',
                'autoclose': true,
                'todayHighlight': true
            });
        });

    function removeGMC(add_gmc_counter) {
        $("#remove_gmc_" + add_gmc_counter).closest("tr").remove();
        // var indexValue = main_GMC.indexOf(add_gmc_counter);
        main_GMC.splice(main_GMC.indexOf(add_gmc_counter), 1);
        // main_GMC.splice(indexValue, 1);
        // alert(main_GMC);
        if (main_GMC.length == 0) {
            add_gmc_counter = 0;
            main_GMC = [];
            $("#Add_GMC").attr("onClick", "AddGMC(" + add_gmc_counter + ")");
        }
        // alert(main_GMC);
    }

    function AddGMC(add_gmc_counter) {
        if(add_gmc_counter==0){
            main_GMC.push(add_gmc_counter);
        }
        add_gmc_counter = add_gmc_counter + 1;
        // alert(add_gmc_counter);
        $(function() {
            $("#gmc_date_"+add_gmc_counter).datepicker({
                'format': 'yyyy-mm-dd',
                'autoclose': true,
                'todayHighlight': true
            });
        });

        main_GMC.push(add_gmc_counter);
        // alert(main_GMC);
        $("#Add_GMC").attr("onClick", "AddGMC(" + add_gmc_counter + ")");
        var tr_table = '<tr><td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_gmc_'+add_gmc_counter+'" onClick=removeGMC('+add_gmc_counter+') ></td><td width="12%"><textarea name="gmc_client_email[]" id="gmc_client_email_'+add_gmc_counter+'" class="form-control gmc_client_email" rows="3"></textarea></td> <td><input style="width:100px;" type="text" name="gmc_date[]"  id="gmc_date_'+add_gmc_counter+'"value="" class="form-control gmc_date"></td><td><input style="width:110px;" type="file" name="gmc_excel_attach[]" id="gmc_excel_attach_'+add_gmc_counter+'" value="" class="form-control gmc_excel_attach" ><span id="gmc_excel_attach_err_'+add_gmc_counter+'"></span></td> <td><textarea name="gmc_company_email[]" id="gmc_company_email_'+add_gmc_counter+'" class="form-control gmc_company_email" rows="3"></textarea></td><td><input style="width:110px;" type="file" name="gmc_attach_quote" id="gmc_attach_quote_'+add_gmc_counter+'" class="form-control gmc_attach_quote" ><span id="gmc_attach_quote_err_'+add_gmc_counter+'"></span></td><td><input style="width:110px;" type="file" name="gmc_attach_endorsment_copy" id="gmc_attach_endorsment_copy_'+add_gmc_counter+'" class="form-control gmc_attach_endorsment_copy" ><span id="gmc_attach_endorsment_copy_err_'+add_gmc_counter+'"></span></td>  <td><input type="text" name="gmc_gross_premium" id="gmc_gross_premium_'+add_gmc_counter+'" class="form-control gmc_gross_premium" ></td>  <td><input type="text" name="gmc_cgst" id="gmc_cgst_'+add_gmc_counter+'" class="form-control gmc_cgst" ></td> <td><input type="text" name="gmc_sgst" id="gmc_sgst_'+add_gmc_counter+'" class="form-control gmc_sgst" ></td>  <td><input type="text" name="gmc_final_premium" id="gmc_final_premium_'+add_gmc_counter+'" class="form-control gmc_final_premium" ></td>   </tr>';
        $("#first_table_tbody").append(tr_table);
    }

    var actual_data_GMC = [];

    function Total_GMC() {
        actual_data_GMC = [];
        actual_data_flag = "false";

        gmc_excel_attach = "";
        gmc_attach_quote = "";
        gmc_attach_endorsment_copy_file = "";
                
        gmc_excel_attach_file = "";
        gmc_excel_attach_flag = "";
        gmc_attach_quote_file = "";
        gmc_attach_quote_flag = "";
        gmc_attach_endorsment_copy_file = "";
        gmc_attach_endorsment_copy_flag = "";

        $("#first_table tr:has(.gmc_client_email)").each(function(key, val) {
            alert(key);
            // alert(val);
            var gmc_client_email = $(".gmc_client_email", this).val();
            var gmc_date = $(".gmc_date", this).val();
            $.each(main_GMC,function(count_key,count_val){
                // alert(count_key);
                alert(count_val);
            });
            var gmc_excel_attach = gmc_excel_attach_file_upload(key);
            gmc_excel_attach=gmc_excel_attach.split("$%^&*(&&*%^$%$");
            var gmc_excel_attach_file = gmc_excel_attach[0];
            var gmc_excel_attach_flag = gmc_excel_attach[1];
            if(gmc_excel_attach_flag == "true"){
                actual_data_flag = "true";
                return false;
            }

            alert(gmc_excel_attach_file+" gmc_excel_attach"+gmc_excel_attach_flag);
            var gmc_company_email = $(".gmc_company_email", this).val();
            // alert(gmc_company_email+" gmc_company_email");

            var gmc_attach_quote = gmc_attach_quote_file_upload(key);
            gmc_attach_quote=gmc_attach_quote.split("$%^&*(&&*%^$%$");
            var gmc_attach_quote_file = gmc_attach_quote[0];
            var gmc_attach_quote_flag = gmc_attach_quote[1];
            if(gmc_attach_quote_flag == "true"){
                actual_data_flag = "true";
                return false;
            }
            alert(gmc_attach_quote_file+" gmc_attach_quote");

            var gmc_attach_endorsment_copy = gmc_attach_endorsment_copy_file_upload(key);
            gmc_attach_endorsment_copy=gmc_attach_endorsment_copy.split("$%^&*(&&*%^$%$");
            var gmc_attach_endorsment_copy_file = gmc_attach_endorsment_copy[0];
            var gmc_attach_endorsment_copy_flag = gmc_attach_endorsment_copy[1];
            if(gmc_attach_endorsment_copy_flag == "true"){
                actual_data_flag = "true";
                return false;
            }
            alert(gmc_attach_endorsment_copy_file+" gmc_attach_endorsment_copy");
            var gmc_gross_premium = $(".gmc_gross_premium", this).val();
            var gmc_cgst = $(".gmc_cgst", this).val();
            var gmc_sgst = $(".gmc_sgst", this).val();
            var gmc_final_premium = $(".gmc_final_premium", this).val();
            // alert(gmc_excel_attach_file_name);
            actual_data_GMC.push([key, gmc_client_email, gmc_date, gmc_excel_attach_file, gmc_company_email, gmc_attach_quote_file, gmc_attach_endorsment_copy_file, gmc_gross_premium, gmc_cgst, gmc_sgst, gmc_final_premium]);
            if (gmc_client_email == '')
                actual_data_GMC.splice(key, 1);
        });
        // console.log(actual_data_GMC);
        // alert(actual_data_GMC);
        return actual_data_GMC+"&%$#&"+actual_data_flag;

        // var total_GMC = JSON.stringify(Total_GMC());
        // alert(total_GMC);
        // return false;
    }
    // Calculation Section Start


    function dateFormate(value) {
        var date = value.split("-");

        var day = (date[0]),
            month = (date[1]),
            year = (date[2]);

        if (!$.isNumeric(month)) {
            month = getMonthFromString(month);
        }
        var new_date = new Date(year, month - 1, day).toLocaleDateString('en-CA');

        var date = new Date(new_date),
            get_y = date.getFullYear(),
            get_m = ("0" + (date.getMonth() + 1)).slice(-2);
        get_d = ("0" + date.getDate()).slice(-2);

        var org_date = get_d + "-" + get_m + "-" + get_y;

        return org_date;
    }

    function getMonthFromString(mon) {
        return new Date(Date.parse(mon + " 1, 2012")).getMonth() + 1
    }

    function gmc_excel_attach_file_upload(add_gmc_counter){
        // var gmc_excel_attach = $('#gmc_excel_attach').prop('files')[0];
        event.preventDefault();
        // var gmc_excel_attach = $('.gmc_excel_attach')[0].files;
        var gmc_excel_attach = $('#gmc_excel_attach_'+add_gmc_counter).prop('files')[0];
        var serial_no_year = $('#serial_no_year').val();
        var serial_no_month = $('#serial_no_month').val();
        var serial_no = $('#serial_no').val();
        // var length = gmc_excel_attach.length;
        // alert(length);
        var form_data = new FormData();
        form_data.append('gmc_excel_attach', gmc_excel_attach);
        form_data.append('serial_no_year', serial_no_year);
        form_data.append('serial_no_month', serial_no_month);
        form_data.append('serial_no', serial_no);
        var gmc_excel_attach_file = "";
        var gmc_excel_attach_flag = "false";
        var url = "<?php echo base_url(); ?>master/remote/get_gmc_excel_attach_file_upload";
        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            dataType: 'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {},
            success: function(data) {
                if (data["status"] == true) {
                    // gmc_excel_attach="";
                    // $('#gmc_excel_attach_'+add_gmc_counter).val("");
                    gmc_excel_attach_file = data["userdata"];
                    $("#gmc_excel_attach_"+add_gmc_counter).removeClass("parsley-error");
                    $("#gmc_excel_attach_err_"+add_gmc_counter).removeClass("text-danger").html("");
                } else {
                    // toaster(message_type = "Error", message_txt = data["error"], message_icone = "error");
                    // toaster(message_type = "Error", message_txt = data["messages"]["gmc_excel_attach_err"], message_icone = "error");
                    // alert(data["error"]);
                    // alert(data["messages"]["gmc_excel_attach_err"]);
                    gmc_excel_attach_file="";
                    $('#gmc_excel_attach_'+add_gmc_counter).val("");
                    if(data["messages"] != ""){
                        $("#gmc_excel_attach_"+add_gmc_counter).addClass("parsley-error");
                        $("#gmc_excel_attach_err_"+add_gmc_counter).addClass("text-danger").html(data["messages"]["gmc_excel_attach_err"]);
                        gmc_excel_attach_flag="true";
                        return;
                    }else{
                        $("#gmc_excel_attach_"+add_gmc_counter).removeClass("parsley-error");
                        $("#gmc_excel_attach_err_"+add_gmc_counter).removeClass("text-danger").html("");
                    }
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
        return gmc_excel_attach_file+"$%^&*(&&*%^$%$"+gmc_excel_attach_flag;
    }

    function gmc_attach_quote_file_upload(add_gmc_counter){
        event.preventDefault();
        var gmc_attach_quote_file = "";
        var gmc_attach_quote_flag = "false";
        var gmc_attach_quote = $('#gmc_attach_quote_'+add_gmc_counter).prop('files')[0];
        var serial_no_year = $('#serial_no_year').val();
        var serial_no_month = $('#serial_no_month').val();
        var serial_no = $('#serial_no').val();
        var form_data = new FormData();
        form_data.append('gmc_attach_quote', gmc_attach_quote);
        form_data.append('serial_no_year', serial_no_year);
        form_data.append('serial_no_month', serial_no_month);
        form_data.append('serial_no', serial_no);
        
        var url = "<?php echo base_url(); ?>master/remote/get_gmc_attach_quote_file_upload";
        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            dataType: 'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {},
            success: function(data) {
                if (data["status"] == true) {
                    // gmc_attach_quote_file="";
                    // $('#gmc_attach_quote_'+add_gmc_counter).val("");
                    gmc_attach_quote_file = data["userdata"];
                    $("#gmc_attach_quote_"+add_gmc_counter).removeClass("parsley-error");
                    $("#gmc_attach_quote_err_"+add_gmc_counter).removeClass("text-danger").html("");
                } else {
                    gmc_attach_quote_file="";
                    $('#gmc_attach_quote_'+add_gmc_counter).val("");
                    if(data["messages"] != ""){
                        $("#gmc_attach_quote_"+add_gmc_counter).addClass("parsley-error");
                        $("#gmc_attach_quote_err_"+add_gmc_counter).addClass("text-danger").html(data["messages"]["gmc_attach_quote_err"]);
                        gmc_attach_quote_flag="true";
                        return;
                    }else{
                        $("#gmc_attach_quote_"+add_gmc_counter).removeClass("parsley-error");
                        $("#gmc_attach_quote_err_"+add_gmc_counter).removeClass("text-danger").html("");
                    }
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
        // return gmc_attach_quote_file;
        return gmc_attach_quote_file+"$%^&*(&&*%^$%$"+gmc_attach_quote_flag;
    }
  
    function gmc_attach_endorsment_copy_file_upload(add_gmc_counter){
        event.preventDefault();
        var gmc_attach_endorsment_copy_file="";
        var gmc_attach_endorsment_copy_flag = "false";
        var gmc_attach_endorsment_copy = $('#gmc_attach_endorsment_copy_'+add_gmc_counter).prop('files')[0];
        var serial_no_year = $('#serial_no_year').val();
        var serial_no_month = $('#serial_no_month').val();
        var serial_no = $('#serial_no').val();
        var form_data = new FormData();
        form_data.append('gmc_attach_endorsment_copy', gmc_attach_endorsment_copy);
        form_data.append('serial_no_year', serial_no_year);
        form_data.append('serial_no_month', serial_no_month);
        form_data.append('serial_no', serial_no);
        
        var url = "<?php echo base_url(); ?>master/remote/get_gmc_attach_endorsment_copy_file_upload";
        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            dataType: 'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {},
            success: function(data) {
                if (data["status"] == true) {
                    // gmc_attach_endorsment_copy_file = "";
                    // $('#gmc_attach_quote_'+add_gmc_counter).val("");
                    gmc_attach_endorsment_copy_file = data["userdata"];
                    $("#gmc_attach_endorsment_copy_"+add_gmc_counter).removeClass("parsley-error");
                    $("#gmc_attach_endorsment_copy_err_"+add_gmc_counter).removeClass("text-danger").html("");
                } else {

                    gmc_attach_endorsment_copy_file = "";
                        $('#gmc_attach_endorsment_copy_'+add_gmc_counter).val("");

                    if(data["messages"] != ""){
                        $("#gmc_attach_endorsment_copy_"+add_gmc_counter).addClass("parsley-error");
                        $("#gmc_attach_endorsment_copy_err_"+add_gmc_counter).addClass("text-danger").html(data["messages"]["gmc_attach_endorsment_copy_err"]);
                        gmc_attach_endorsment_copy_flag = "true";
                        return;
                    }else{
                        $("#gmc_attach_endorsment_copy_"+add_gmc_counter).removeClass("parsley-error");
                        $("#gmc_attach_endorsment_copy_err_"+add_gmc_counter).removeClass("text-danger").html("");
                    }
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
        // return gmc_attach_endorsment_copy_file;
        return gmc_attach_endorsment_copy_file+"$%^&*(&&*%^$%$"+gmc_attach_endorsment_copy_flag;
    }
    // Calculation Section End
</script>