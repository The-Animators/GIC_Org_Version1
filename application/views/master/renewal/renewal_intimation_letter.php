<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <?php
                                if (!empty($breadcrumbs)) {
                                    foreach ($breadcrumbs as $row) {
                                        if ($row["breadcrumb_active"] == true) {
                                            echo "<li class=\"breadcrumb-item active\" >";
                                            echo $row["breadcrumb_label"];
                                            echo "</li>";
                                        } else {
                                            echo "<li class=\"breadcrumb-item\" >";
                                            echo "<a href=\"" . $row["breadcrumb_url"] . "\">";
                                            echo $row["breadcrumb_label"];
                                            echo "</a></li>";
                                        }
                                    }
                                }
                                ?>
                            </ol>
                        </div>
                        <h4 class="page-title"><?php echo $title; ?></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div id="form_modal" class="modal fade bs-example-modal-lg bs-example-modal-center" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Description Details</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-row">
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <label for="description_name" class="col-form-label col-md-4 text-right">Description Name<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="description_name" id="description_name" value="" placeholder="Enter Description Name" class="form-control">
                                                    <span id="description_name_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <center>
                                                <button id="submit_description" onclick="DescriptionSave()" class="btn btn-primary btn-sm">Save</button>
                                            </center>
                                        </div>
                                        <div class="form-group col-md-4"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form row -->
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="header-title"><?php echo $title; ?></h4>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4 text-right">
                                <a href="<?php echo base_url() . "master/policy"; ?>" class='btn btn-secondary waves-effect width-md btn-sm'>Back</a>
                            </div>

                        </div>

                        <p class="sub-header">

                        </p>

                        <table style="width:700px;">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <center>
                                            <h4 class="modal-title">Renewal Intimation</h4>
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <center>
                                            <h4 class="modal-title">Policy No : P/171141/01/2021/003521</h4>
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <br>
                                        <label><b id="names">MUHEEDA CHANDMIYA GOANKHADKAR</b></label>
                                        <br>
                                        <label id="address_line1">420 B,PURNAD, RATNAGIRI, PURNAGAD</label>
                                        <br>
                                        <label id="address_line2">THIKWADI, RATNAGIRI, MAHARASHTRA - 415616</label>
                                        <br>
                                        <label id="contact">8286623649</label>
                                        <br>
                                        <label id="email">rikindhanani@rediffmail.com</label>
                                        <br>
                                        <label id="proposer">
                                            Proposer/Cust Code : 18256436 / AA0015286922
                                        </label>
                                    </td>
                                    <td>
                                        <br>
                                        <label><b>June 21, 2021</b></label>
                                        <br>
                                        <label id="company_address_line1">171123 - Branch Office Dadar II no.201, 2nd Floor, Laxmi Commercial Complex,</label>
                                        <br>
                                        <label id="company_address_line2">Near Flower Market, Dadar (W), Mumbai - 4000028.</label>
                                        <br>
                                        <label id="contact">022 - 24371059</label><br>
                                        <label id="email">mumbai@starhealth.in</label><br>
                                        <label id="ref_no">
                                            Reference No : R/171123/01/2022/029792 - Direct Receipt
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <br>
                                        <br>
                                        <label><b>Dear Customer,</b></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        We value your relationship with us and thank you for the same. we wish to bring to your kind notice that your <b id="policy_name">Corona Kavach Ploicy</b> is due for renewal on <b id="expiry_date">20/04/2021</b>. The renewal premium & details of policy is given below.
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table border="1" style="text-align: center;">
                                            <tr>
                                                <th>
                                                    Sr.No.
                                                </th>
                                                <th>
                                                    Name of the Insured
                                                </th>
                                                <th>
                                                    Date Of Birth
                                                </th>
                                                <th>
                                                    Age (Years)
                                                </th>
                                                <th>
                                                    RelationShip with Proposer
                                                </th>
                                                <th>
                                                    Sum Insured (Rs.)
                                                </th>
                                                <th>
                                                    Premium (Rs.)
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    MUHEEDA CHANDMIYA GOANKHADKAR
                                                </td>
                                                <td>
                                                    20/06/1991
                                                </td>
                                                <td>
                                                    29
                                                </td>
                                                <td>
                                                    SELF
                                                </td>
                                                <td>
                                                    200000
                                                </td>
                                                <td>
                                                    983
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;" colspan="6">
                                                    CGST@<b>9%</b>
                                                </td>
                                                <td>
                                                    <b>88</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;" colspan="6">
                                                    SGST@<b>9%</b>
                                                </td>
                                                <td>
                                                    <b>88</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;" colspan="6">
                                                    Total Renewal Premium
                                                </td>
                                                <td>
                                                    <b>1159</b>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <label><b><u>Payment Details</u></b></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-row mt-4">
                                            <div class="col-md-6">
                                                <u><strong>Payment Details</strong></u>
                                            </div>
                                            <div class="col-md-6 text-right"></div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col-md-2"><u><strong class="text-info">Online</strong></u></div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="online_link" class="col-form-label col-md-4 text-right">Link : </label>
                                                    <div class="col-form-label col-md-8" id="online_link"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="online_steps" class="col-form-label col-md-4 text-right">Payment Steps : </label>
                                                    <div class="col-form-label col-md-8" id="online_steps"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-row mt-2">
                                            <div class="col-md-2"><u><strong class="text-info">Cheque</strong></u></div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="name_on_cheque" class="col-form-label col-md-4 text-right">Name on Cheque : </label>
                                                    <div class="col-form-label col-md-8" id="name_on_cheque"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="courier_address" class="col-form-label col-md-4 text-right">Courier Address : </label>
                                                    <div class="col-form-label col-md-8" id="courier_address"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-row mt-2">
                                            <div class="col-md-2"><u><strong class="text-info">NEFT / IMPS / RTGS</strong></u></div>
                                            <div class="col-md-12 mt-2" id="neft_imps_riggs_details"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <label><b>Thank you for giving us an opportunity to serve you</b></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <label><b>Disclaimer : </b></label>
                                        <br>
                                        1. This is a renewal reminder from out office. This is not from Insurance co.
                                        <br>
                                        2. We Reserve the right for any mistake above.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
getCompanyDetails();

function getCompanyDetails() {
    $("#tableData").empty();
    var mcompany_id = "1";
    // alert(mcompany_id);
    var url = "<?php echo $base_url; ?>master/insurance_company_details/get_company_details";
    if (url != "") {
        $.ajax({
            url: url,
            data: {
                'company_id': mcompany_id
            },
            type: 'POST',
            dataType: 'json',
            async: false,
            cache: false,
            beforeSend: function() {

            },

            success: function(data) {
                $("#neft_imps_riggs_details").empty();
                $("#btn_details").empty();
                if (data["status"] == true) {

                    var company_id = parseInt(data["userdata"].mcompany_id);
                    var company_name = data["userdata"].company_name;
                    $("#company_name").text(company_name);

                    var short_name = data["userdata"].short_name;
                    $("#short_name").text(short_name);

                    var common_email = data["userdata"].common_email;
                    $("#comman_email").text(common_email);

                    var address = data["userdata"].address;
                    var state = data["userdata"].state;
                    var city = data["userdata"].city;
                    var zipcode = data["userdata"].zipcode;

                    var website = data["userdata"].website;
                    $("#website").text(website);

                    var office_contact = data["userdata"].office_contact;
                    $("#office_contact").text(office_contact);

                    var tollfree_no_1 = data["userdata"].tollfree_no_1;
                    $("#tollfree_1").text(tollfree_no_1);

                    var tollfree_no_2 = data["userdata"].tollfree_no_2;
                    $("#tollfree_2").text(tollfree_no_2);

                    var company_status = data["userdata"].company_status;

                    var cheque_name = data["userdata"].cheque_name;
                    $("#name_on_cheque").text(cheque_name);

                    var courier_address = data["userdata"].courier_address;
                    $("#courier_address").text(courier_address);

                    var payment_link = data["userdata"].payment_link;
                    $("#online_link").text(payment_link);

                    var payment_steps = data["userdata"].payment_steps;
                    payment_steps = (payment_steps + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + "<br/>" + '$2');
                    $("#online_steps").html(payment_steps);

                    var account_holder_name = data["userdata"].account_holder_name;
                    var account_holder_name_1 = data["userdata"].account_holder_name_1;
                    var account_number = data["userdata"].account_number;
                    var account_number_1 = data["userdata"].account_number_1;
                    var bank_name = data["userdata"].bank_name;
                    var bank_name_1 = data["userdata"].bank_name_1;
                    var branch_name = data["userdata"].branch_name;
                    var branch_name_1 = data["userdata"].branch_name_1;
                    var ifsc_code = data["userdata"].ifsc_code;
                    var ifsc_code_1 = data["userdata"].ifsc_code_1;
                    var micr_code = data["userdata"].micr_code;
                    var micr_code_1 = data["userdata"].micr_code_1;
                    var company_del_flag = data["userdata"].company_del_flag;
                    var account_tr_1 = "";
                    var account_tr_2 = "";
                    if (account_holder_name != "")
                        account_tr_1 = '<tr style="padding:10px;"><td style="border: 1px solid #dddddd;padding:10px;"><center>' + account_holder_name + '</center></td><td style="border: 1px solid #dddddd;"><center>' + account_number + '</center></td> <td style="border: 1px solid #dddddd;"><center>' + bank_name + '</center></td><td style="border: 1px solid #dddddd;"><center>' + branch_name + '</center></td><td style="border: 1px solid #dddddd;"><center>' + ifsc_code + '</center></td><td style="border: 1px solid #dddddd;"><center>' + micr_code + '</center></td></tr>';

                    if (account_holder_name_1 != "")
                        account_tr_2 = '<tr style="padding:10px;"><td style="border: 1px solid #dddddd;padding:10px;"><center>' + account_holder_name_1 + '</center></td><td style="border: 1px solid #dddddd;"><center>' + account_number_1 + '</center></td> <td style="border: 1px solid #dddddd;"><center>' + bank_name_1 + '</center></td><td style="border: 1px solid #dddddd;"><center>' + branch_name_1 + '</center></td><td style="border: 1px solid #dddddd;"><center>' + ifsc_code_1 + '</center></td><td style="border: 1px solid #dddddd;"><center>' + micr_code_1 + '</center></td></tr>';


                    var account_details = '<table style="border: 1px solid #dddddd;padding: 8px; width: 100%;"><thead><tr style="padding:10px;"><th style="border: 1px solid #dddddd;padding:10px;"> <center>Account Holder</center></th><th style="border: 1px solid #dddddd;"><center>Account Number</center></th><th style="border: 1px solid #dddddd;"> <center>Bank Name</center> </th><th style="border: 1px solid #dddddd;"><center>Branch Name</center> </th><th style="border: 1px solid #dddddd;"><center>IFSC Code</center> </th><th style="border: 1px solid #dddddd;"> <center>MICR Code</center></th></tr></thead><tbody id="append_agent">' + account_tr_1 + account_tr_2 + '</tbody></table>';
                    $("#neft_imps_riggs_details").append(account_details);
                    var comman_address = address + " , " + state + " , " + city + " , " + zipcode;
                    $("#address").text(comman_address);
                    if (!isNaN(company_id)) {
                        if (company_status == 1) {
                            var status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light btn-sm edit";
                        } else {
                            var status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light btn-sm edit";
                        }

                        var edit_btn = " <a id='edit' href='<?php echo base_url() . "master/insurance_company_details/edit_company/"; ?>" + company_id + "' class='btn btn-facebook btn-sm mr-1 edit' id='edit'>Edit Company</a><button id='delete' onclick='OnDelete(" + company_id + ")' class='btn btn-primary btn-sm mr-1'>Delete <?php echo $title; ?></button><button id='recover' onclick='OnRecover(" + company_id + ")' class='btn btn-primary btn-sm mr-1' style='display:none;'>Recover <?php echo $title; ?></button>";
                        var status_btn = "<button class='" + status_btn_txt + "  mr-1' id='status_btn_" + company_id + "' value='' type='button' onClick ='updateStatus(" + company_id + "," + company_status + ")' >" + status + "</button>";
                        var back_btn = '<a href="<?php echo base_url() . "master/insurance_company_details"; ?>" class="btn btn-secondary waves-effect width-md btn-sm">Back</a>';
                        $("#btn_details").append(edit_btn + status_btn + back_btn);

                        if (company_del_flag == 0) {
                            $("#recover").show();
                            $("#delete").hide();
                        } else {
                            $("#delete").show();
                            $("#recover").hide();
                        }

                    }
                }

            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }
}
</script>