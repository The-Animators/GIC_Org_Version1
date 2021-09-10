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
                    <th><button class="btn btn-primary btn-sm Add_GPA" id="Add_GPA" onclick="AddGPA(0)">Add</button></th>
                    <th>Client Email</th>
                    <th>Date</th>
                    <th>Excel Attach (Only Excel File)</th>
                    <th>Company Email</th>
                    <th>Attach Quote(Only Excel & PDF File)</th>
                    <th>Attach Endorsment Copy(Only Excel & PDF File)</th>
                    <th>Gross Premium</th>
                    <th>Cgst </th>
                    <th>Sgst</th>
                    <th>Final Premium<input type="hidden" name="gpa_policy_id" id="gpa_policy_id" value=""><input type="hidden" name="last_date" id="last_date" value=""></th>
                </tr>
            </thead>
            <tbody id="first_table_tbody">
                <tr>
                    <td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_gpa_0" onClick=removeGPA(0) disabled></td>
                    <td width="12%"><textarea style="width:100px;" name="gpa_client_email[]" id="gpa_client_email_0" class="form-control gpa_client_email" rows="3"  onkeyup="Enter_Date(0)"></textarea></td>
                    <td><input style="width:140px;" type="date" name="gpa_date[]" id="gpa_date_0" value="" class="form-control gpa_date"  onchange="Last_Date(0)"><span id="gpa_date_details_0"  class="text-danger"></span></td>

                    <td><input style="width:200px;" type="file" name="gpa_excel_attach[]" id="gpa_excel_attach_0" value="" class="form-control gpa_excel_attach"><span id="gpa_excel_attach_err_0"></span><input type="hidden" class="form-control gpa_excel_attach_file_name" name="gpa_excel_attach_file_name" id="gpa_excel_attach_file_name" value=""></td>

                    <td><textarea style="width:100px;" name="gpa_company_email[]" id="gpa_company_email_0" class="form-control gpa_company_email" rows="3"></textarea></td>

                    <td><input style="width:200px" type="file" name="gpa_attach_quote" id="gpa_attach_quote_0" class="form-control gpa_attach_quote">
                        <span id="gpa_attach_quote_err_0"></span>
                        <input style="width:100px;" type="hidden" name="gpa_attach_quote_file_name" id="gpa_attach_quote_file_name" class="form-control gpa_attach_quote_file_name">
                    </td>
                    <td><input style="width:200px;" type="file" name="gpa_attach_endorsment_copy" id="gpa_attach_endorsment_copy_0" class="form-control gpa_attach_endorsment_copy">
                        <span id="gpa_attach_endorsment_copy_err_0"></span>
                        <input style="width:100px;" type="hidden" name="gpa_attach_endorsment_copy_file_name" id="gpa_attach_endorsment_copy_file_name" class="form-control gpa_attach_endorsment_copy_file_name">
                    </td>
                    <td><input style="width:100px;" type="text" name="gpa_gross_premium" id="gpa_gross_premium_0" class="form-control gpa_gross_premium"></td>
                    <td><input style="width:100px;" type="text" name="gpa_cgst" id="gpa_cgst_0" class="form-control gpa_cgst"></td>
                    <td><input style="width:100px;" type="text" name="gpa_sgst" id="gpa_sgst_0" class="form-control gpa_sgst"></td>
                    <td><input style="width:100px;" type="text" name="gpa_final_premium" id="gpa_final_premium_0" class="form-control gpa_final_premium">
                    </td>

                </tr>


            </tbody>
        </table>
    </div>

</div>

<script>
    $(document).ready(function() {
        $(function() {
            var dtToday = new Date();
            var last_date=$("#last_date").val();
            // alert(last_date);
            // var month = dtToday.getMonth() + 1;
            // var day = dtToday.getDate();
            // var year = dtToday.getFullYear();

            // if (month < 10)
            //     month = '0' + month.toString();
            // if (day < 10)
            //     day = '0' + day.toString();

            // var maxDate = day + "-" + month + "-" + year;
            $("#dateControl").attr("min", last_date);
        });
    });
    var add_gpa_counter = 0;
    var main_GPA = [];
    // $(function() {
    //     $("#gpa_date_0").datepicker({
    //         'format': 'yyyy-mm-dd',
    //         'autoclose': true,
    //         'todayHighlight': true
    //     });
    // });

    function removeGPA(add_gpa_counter) {
        $("#remove_gpa_" + add_gpa_counter).closest("tr").remove();
        // var indexValue = main_GPA.indexOf(add_gpa_counter);
        main_GPA.splice(main_GPA.indexOf(add_gpa_counter), 1);
        // main_GPA.splice(indexValue, 1);
        // alert(main_GPA);
        if (main_GPA.length == 0) {
            add_gpa_counter = 0;
            main_GPA = [];
            $("#Add_GPA").attr("onClick", "AddGPA(" + add_gpa_counter + ")");
        }
        // alert(main_GPA);
    }

    function AddGPA(add_gpa_counter) {
        var method = $("#function_name").val();
        // alert(method);
        if (add_gpa_counter == 0) {
            if (method != "edit_policy")
                main_GPA.push(0);
            if (method == "edit_policy") {
                $.each(main_GPA, function(key, val) {
                    if (val != add_gpa_counter)
                        main_GPA.push(0);
                });
            }
        }
        add_gpa_counter = add_gpa_counter + 1;
        // alert(add_gpa_counter);
        // $(function() {
        //     $("#gpa_date_"+add_gpa_counter).datepicker({
        //         'format': 'yyyy-mm-dd',
        //         'autoclose': true,
        //         'todayHighlight': true
        //     });
        // });

        main_GPA.push(add_gpa_counter);


        // alert(main_GPA);
        $("#Add_GPA").attr("onClick", "AddGPA(" + add_gpa_counter + ")");
        var tr_table = '<tr><td><button class="btn btn-primary btn-sm dripicons-cross" id="remove_gpa_' + add_gpa_counter + '" onClick=removeGPA(' + add_gpa_counter + ') ></td><td width="12%"><textarea name="gpa_client_email[]" id="gpa_client_email_' + add_gpa_counter + '" class="form-control gpa_client_email" rows="3" onkeyup="Enter_Date('+add_gpa_counter+')"></textarea></td> <td><input style="width:140px;" type="date" name="gpa_date[]"  id="gpa_date_' + add_gpa_counter + '"value="" class="form-control gpa_date"  onchange="Last_Date('+add_gpa_counter+')"><span id="gpa_date_details_'+add_gpa_counter+'"  class="text-danger"></span></td><td><input style="width:200px;" type="file" name="gpa_excel_attach[]" id="gpa_excel_attach_' + add_gpa_counter + '" value="" class="form-control gpa_excel_attach" ><span id="gpa_excel_attach_err_' + add_gpa_counter + '"></span></td> <td><textarea style="width:100px;" name="gpa_company_email[]" id="gpa_company_email_' + add_gpa_counter + '" class="form-control gpa_company_email" rows="3"></textarea></td><td><input style="width:200px;" type="file" name="gpa_attach_quote" id="gpa_attach_quote_' + add_gpa_counter + '" class="form-control gpa_attach_quote" ><span id="gpa_attach_quote_err_' + add_gpa_counter + '"></span></td><td><input style="width:200px;" type="file" name="gpa_attach_endorsment_copy" id="gpa_attach_endorsment_copy_' + add_gpa_counter + '" class="form-control gpa_attach_endorsment_copy" ><span id="gpa_attach_endorsment_copy_err_' + add_gpa_counter + '"></span></td>  <td><input style="width:100px;" type="text" name="gpa_gross_premium" id="gpa_gross_premium_' + add_gpa_counter + '" class="form-control gpa_gross_premium" ></td>  <td><input style="width:100px;" type="text" name="gpa_cgst" id="gpa_cgst_' + add_gpa_counter + '" class="form-control gpa_cgst" ></td> <td><input style="width:100px;" type="text" name="gpa_sgst" id="gpa_sgst_' + add_gpa_counter + '" class="form-control gpa_sgst" ></td>  <td><input style="width:100px;" type="text" name="gpa_final_premium" id="gpa_final_premium_' + add_gpa_counter + '" class="form-control gpa_final_premium" ></td>   </tr>';
        $("#first_table_tbody").append(tr_table);
        var last_date=$("#last_date").val();
        $(".gpa_date").attr("min", last_date);
        var final_date="";
        
        $.each(main_GPA,function(key,val){
            // alert("val-"+val);
            var last_date_2=$("#gpa_date_"+val).val();
            
            if(last_date_2==""){
                // alert("found"+final_date);
                $.each(main_GPA,function(key,val){
                    $("#gpa_date_"+val).attr("min", final_date);
                });
                return false;
            }else{
                final_date=last_date_2;
            }
        });
    }

    function Enter_Date(add_gpa_counter){
        var last_date=$("#gpa_date_"+add_gpa_counter).val();
        if(last_date !="")
            $("#gpa_date_details_"+add_gpa_counter).text("");
        else
            $("#gpa_date_details_"+add_gpa_counter).text("Please Enter Date.");
    }

    function Last_Date(add_gpa_counter){
        var last_count=add_gpa_counter-1;
        var last_date=$("#gpa_date_"+add_gpa_counter).val();
        var l_last_date=$("#gpa_date_"+last_count).val();
        if(last_date !="")
            $("#gpa_date_details_"+add_gpa_counter).text("");

        $.each(main_GPA,function(key,val){
            $("#gpa_date_"+val).attr("min", last_date);
        });

    }

    var actual_data_GPA = [];

    function Total_GPA() {
        actual_data_GPA = [];
        var new_main_GPA = [];
        actual_data_flag = "false";
        var method = $("#function_name").val();
        if (method == "add_policy") {
            if (main_GPA == "")
                new_main_GPA.push(0);
            else
                new_main_GPA = main_GPA;
        } else {
            new_main_GPA = main_GPA;
        }
        // alert(new_main_GPA);
        gpa_excel_attach = "";
        gpa_attach_quote = "";
        gpa_attach_endorsment_copy_file = "";

        gpa_excel_attach_file = "";
        gpa_excel_attach_flag = "";
        gpa_attach_quote_file = "";
        gpa_attach_quote_flag = "";
        gpa_attach_endorsment_copy_file = "";
        gpa_attach_endorsment_copy_flag = "";
        $.each(new_main_GPA, function(key, val) {
            var gpa_client_email = $('#gpa_client_email_' + val).val();
            var gpa_date = $('#gpa_date_' + val).val();
            var gpa_excel_attach = gpa_excel_attach_file_upload(val);
            gpa_excel_attach = gpa_excel_attach.split("$%^&*(&&*%^$%$");
            var gpa_excel_attach_file = gpa_excel_attach[0];
            var gpa_excel_attach_flag = gpa_excel_attach[1];
            if (gpa_excel_attach_flag == "true") {
                actual_data_flag = "true";
                return false;
            }
            // alert(gpa_excel_attach_file+" gpa_excel_attach");
            var gpa_company_email = $('#gpa_company_email_' + val).val();
            var gpa_attach_quote = gpa_attach_quote_file_upload(val);
            gpa_attach_quote = gpa_attach_quote.split("$%^&*(&&*%^$%$");
            var gpa_attach_quote_file = gpa_attach_quote[0];
            var gpa_attach_quote_flag = gpa_attach_quote[1];
            if (gpa_attach_quote_flag == "true") {
                actual_data_flag = "true";
                return false;
            }
            // alert(gpa_attach_quote_file+" gpa_attach_quote");

            var gpa_attach_endorsment_copy = gpa_attach_endorsment_copy_file_upload(val);
            gpa_attach_endorsment_copy = gpa_attach_endorsment_copy.split("$%^&*(&&*%^$%$");
            var gpa_attach_endorsment_copy_file = gpa_attach_endorsment_copy[0];
            var gpa_attach_endorsment_copy_flag = gpa_attach_endorsment_copy[1];
            if (gpa_attach_endorsment_copy_flag == "true") {
                actual_data_flag = "true";
                return false;
            }
            if (gpa_excel_attach_file == "") {
                gpa_excel_attach_file = "";
                var gpa_excel_attach_hidden = $('#gpa_excel_attach_hidden_' + val).val();
                if (gpa_excel_attach_hidden == undefined || gpa_excel_attach_hidden == "null")
                    gpa_excel_attach_hidden = "";
                gpa_excel_attach_file = gpa_excel_attach_hidden;
            }
            if (gpa_attach_quote_file == "") {
                gpa_attach_quote_file = "";
                var gpa_attach_quote_hidden = $('#gpa_attach_quote_hidden_' + val).val();
                if (gpa_attach_quote_hidden == undefined || gpa_attach_quote_hidden == "null")
                    gpa_attach_quote_hidden = "";
                gpa_attach_quote_file = gpa_attach_quote_hidden;
            }
            if (gpa_attach_endorsment_copy_file == "") {
                gpa_attach_endorsment_copy_file = "";
                var gpa_attach_endorsment_copy_hidden = $('#gpa_attach_endorsment_copy_hidden_' + val).val();
                if (gpa_attach_endorsment_copy_hidden == undefined || gpa_attach_endorsment_copy_hidden == "null")
                    gpa_attach_endorsment_copy_hidden = "";

                gpa_attach_endorsment_copy_file = gpa_attach_endorsment_copy_hidden;
            }
            // alert(gpa_client_email+" gpa_excel_attach");
            // alert(gpa_attach_quote_file+" gpa_attach_quote");
            // alert(gpa_attach_endorsment_copy_file+" gpa_attach_endorsment_copy");

            var gpa_gross_premium = $('#gpa_gross_premium_' + val).val();
            var gpa_cgst = $('#gpa_cgst_' + val).val();
            var gpa_sgst = $('#gpa_sgst_' + val).val();
            var gpa_final_premium = $('#gpa_final_premium_' + val).val();

            actual_data_GPA.push([val, gpa_client_email, gpa_date, gpa_excel_attach_file, gpa_company_email, gpa_attach_quote_file, gpa_attach_endorsment_copy_file, gpa_gross_premium, gpa_cgst, gpa_sgst, gpa_final_premium]);
            if (gpa_client_email == '')
                actual_data_GPA.splice(val, 1);

        });

        // console.log(actual_data_GPA);
        // alert(actual_data_GPA);
        // alert(actual_data_flag);
        return JSON.stringify(actual_data_GPA) + "&%$#&" + actual_data_flag;

        // var total_GPA = JSON.stringify(Total_GPA());
        // alert(total_GPA);
        // return false;
        // var total_GPA = Total_GPA();
        // total_GPA = total_GPA.split("&%$#&")
        // var total_GPA_data = total_GPA[0];
        // alert(total_GPA[0]);
        // alert(total_GPA[1]);
        // alert(total_GPA_data);

        // return false;
        // if(total_GPA[1] == "true")
        //     return false;
    }
    // Calculation Section Start


    function dateFormate_new(value) {
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

    function gpa_excel_attach_file_upload(add_gpa_counter) {
        // var gpa_excel_attach = $('#gpa_excel_attach').prop('files')[0];
        event.preventDefault();
        // var gpa_excel_attach = $('.gpa_excel_attach')[0].files;
        var gpa_excel_attach = $('#gpa_excel_attach_' + add_gpa_counter).prop('files')[0];
        var serial_no_year = $('#serial_no_year').val();
        var serial_no_month = $('#serial_no_month').val();
        var serial_no = $('#serial_no').val();
        // var length = gpa_excel_attach.length;
        // alert(length);
        var form_data = new FormData();
        form_data.append('gpa_excel_attach', gpa_excel_attach);
        form_data.append('serial_no_year', serial_no_year);
        form_data.append('serial_no_month', serial_no_month);
        form_data.append('serial_no', serial_no);
        var gpa_excel_attach_file = "";
        var gpa_excel_attach_flag = "false";
        var url = "<?php echo base_url(); ?>master/remote/get_gpa_excel_attach_file_upload";
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
                    // gpa_excel_attach="";
                    // $('#gpa_excel_attach_'+add_gpa_counter).val("");
                    gpa_excel_attach_file = data["userdata"];
                    $("#gpa_excel_attach_" + add_gpa_counter).removeClass("parsley-error");
                    $("#gpa_excel_attach_err_" + add_gpa_counter).removeClass("text-danger").html("");
                } else {
                    // toaster(message_type = "Error", message_txt = data["error"], message_icone = "error");
                    // toaster(message_type = "Error", message_txt = data["messages"]["gpa_excel_attach_err"], message_icone = "error");
                    // alert(data["error"]);
                    // alert(data["messages"]["gpa_excel_attach_err"]);
                    gpa_excel_attach_file = "";
                    $('#gpa_excel_attach_' + add_gpa_counter).val("");
                    if (data["messages"] != "") {
                        toaster(message_type = "Error", message_txt = "Excel Attach: " + data["messages"]["gpa_excel_attach_err"], message_icone = "error");
                        $("#gpa_excel_attach_" + add_gpa_counter).focus();
                        $("#gpa_excel_attach_" + add_gpa_counter).addClass("parsley-error");
                        $("#gpa_excel_attach_err_" + add_gpa_counter).addClass("text-danger").html(data["messages"]["gpa_excel_attach_err"]);
                        gpa_excel_attach_flag = "true";
                        return;
                    } else {
                        $("#gpa_excel_attach_" + add_gpa_counter).removeClass("parsley-error");
                        $("#gpa_excel_attach_err_" + add_gpa_counter).removeClass("text-danger").html("");
                    }
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
        return gpa_excel_attach_file + "$%^&*(&&*%^$%$" + gpa_excel_attach_flag;
    }

    function gpa_attach_quote_file_upload(add_gpa_counter) {
        event.preventDefault();
        var gpa_attach_quote_file = "";
        var gpa_attach_quote_flag = "false";
        var gpa_attach_quote = $('#gpa_attach_quote_' + add_gpa_counter).prop('files')[0];
        var serial_no_year = $('#serial_no_year').val();
        var serial_no_month = $('#serial_no_month').val();
        var serial_no = $('#serial_no').val();
        var form_data = new FormData();
        form_data.append('gpa_attach_quote', gpa_attach_quote);
        form_data.append('serial_no_year', serial_no_year);
        form_data.append('serial_no_month', serial_no_month);
        form_data.append('serial_no', serial_no);

        var url = "<?php echo base_url(); ?>master/remote/get_gpa_attach_quote_file_upload";
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
                    // gpa_attach_quote_file="";
                    // $('#gpa_attach_quote_'+add_gpa_counter).val("");
                    gpa_attach_quote_file = data["userdata"];
                    $("#gpa_attach_quote_" + add_gpa_counter).removeClass("parsley-error");
                    $("#gpa_attach_quote_err_" + add_gpa_counter).removeClass("text-danger").html("");
                } else {
                    gpa_attach_quote_file = "";
                    $('#gpa_attach_quote_' + add_gpa_counter).val("");
                    if (data["messages"] != "") {
                        toaster(message_type = "Error", message_txt = "Attach Quote: " + data["messages"]["gpa_attach_quote_err"], message_icone = "error");
                        $("#gpa_attach_quote_" + add_gpa_counter).focus();
                        $("#gpa_attach_quote_" + add_gpa_counter).addClass("parsley-error");
                        $("#gpa_attach_quote_err_" + add_gpa_counter).addClass("text-danger").html(data["messages"]["gpa_attach_quote_err"]);
                        gpa_attach_quote_flag = "true";
                        return;
                    } else {
                        $("#gpa_attach_quote_" + add_gpa_counter).removeClass("parsley-error");
                        $("#gpa_attach_quote_err_" + add_gpa_counter).removeClass("text-danger").html("");
                    }
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
        // return gpa_attach_quote_file;
        return gpa_attach_quote_file + "$%^&*(&&*%^$%$" + gpa_attach_quote_flag;
    }

    function gpa_attach_endorsment_copy_file_upload(add_gpa_counter) {
        event.preventDefault();
        var gpa_attach_endorsment_copy_file = "";
        var gpa_attach_endorsment_copy_flag = "false";
        var gpa_attach_endorsment_copy = $('#gpa_attach_endorsment_copy_' + add_gpa_counter).prop('files')[0];
        var serial_no_year = $('#serial_no_year').val();
        var serial_no_month = $('#serial_no_month').val();
        var serial_no = $('#serial_no').val();
        var form_data = new FormData();
        form_data.append('gpa_attach_endorsment_copy', gpa_attach_endorsment_copy);
        form_data.append('serial_no_year', serial_no_year);
        form_data.append('serial_no_month', serial_no_month);
        form_data.append('serial_no', serial_no);

        var url = "<?php echo base_url(); ?>master/remote/get_gpa_attach_endorsment_copy_file_upload";
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
                    // gpa_attach_endorsment_copy_file = "";
                    // $('#gpa_attach_quote_'+add_gpa_counter).val("");
                    gpa_attach_endorsment_copy_file = data["userdata"];
                    $("#gpa_attach_endorsment_copy_" + add_gpa_counter).removeClass("parsley-error");
                    $("#gpa_attach_endorsment_copy_err_" + add_gpa_counter).removeClass("text-danger").html("");
                } else {

                    gpa_attach_endorsment_copy_file = "";
                    $('#gpa_attach_endorsment_copy_' + add_gpa_counter).val("");

                    if (data["messages"] != "") {
                        toaster(message_type = "Error", message_txt = "Attach Endorsment Copy: " + data["messages"]["gpa_attach_endorsment_copy_err"], message_icone = "error");
                        $("#gpa_attach_endorsment_copy_" + add_gpa_counter).focus();
                        $("#gpa_attach_endorsment_copy_" + add_gpa_counter).addClass("parsley-error");
                        $("#gpa_attach_endorsment_copy_err_" + add_gpa_counter).addClass("text-danger").html(data["messages"]["gpa_attach_endorsment_copy_err"]);
                        gpa_attach_endorsment_copy_flag = "true";
                        return;
                    } else {
                        $("#gpa_attach_endorsment_copy_" + add_gpa_counter).removeClass("parsley-error");
                        $("#gpa_attach_endorsment_copy_err_" + add_gpa_counter).removeClass("text-danger").html("");
                    }
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
        // return gpa_attach_endorsment_copy_file;
        return gpa_attach_endorsment_copy_file + "$%^&*(&&*%^$%$" + gpa_attach_endorsment_copy_flag;
    }
    // Calculation Section End
</script>