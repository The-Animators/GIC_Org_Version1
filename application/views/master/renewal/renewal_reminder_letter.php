<style>
    table {
        margin: 1em 0;
        border-collapse: collapse;
        border: 0.1em solid #d6d6d6;
        width: 100%;
        font-size: 12px;
    }

    caption {
        text-align: left;
        font-style: italic;
        padding: 0.25em 0.5em 0.5em 0.5em;
    }

    .table td,
    .table th {
        padding: 2px;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    th,
    td {
        padding: 0.25em 0.5em 0.25em 1em;
        vertical-align: text-top;
        text-align: left;
        text-indent: 0em;
    }

    table {
        page-break-inside: auto
    }

    tr {
        page-break-inside: avoid;
        page-break-after: auto
    }

    thead {
        display: table-header-group
    }

    tfoot {
        display: table-footer-group
    }

    tr:nth-child(even) {
        background-color: transparent;
    }

    body {
        /* margin: 0;
        padding: 0;
        background-color: #FAFAFA; */
        margin: 0 auto;
        /* font: 12pt "Tahoma"; */
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    page[size="A4"] {
        width: 210mm;
        height: 297mm;
        display: block;
        margin: 0;
    }

    .page {
        width: 21cm;
        min-height: 29.7cm;
        padding: 15px;
        margin: 1cm auto;
        border: 3px black solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .subpage {
        /* padding: 1cm; */
        padding: 10px;
        border: 3px black solid;
        /* height: 256mm; */
        outline: 1px grey light;
        /* outline: 2cm #FFEAEA solid; */
    }

    @page {
        size: A4;
        margin: 0;
    }

    @media print {
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }

        #content {
            display: table;
            page-break-after: left;

        }

        #pageFooter {
            display: table-footer-group;
        }

        #pageFooter:after {
            counter-increment: page;
            content: counter(page);
        }

        @page {
            @bottom-right {
                content: counter(page) " of "counter(pages);
            }
        }

        .noprint {
            visibility: hidden;
        }

        .notitle {
            display: none;
            content: none !important;
        }

        a[href]:after {
            content: none !important;
        }
    }
</style>

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

            <!-- Form row -->
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="header-title notitle"><?php echo $title; ?></h4>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4 text-right">
                                <a href="<?php echo base_url() . "master/renewal/index2"; ?>" class='btn btn-secondary waves-effect btn-xs noprint'>Back</a>
                            </div>

                        </div>
                        <button id="print_btn" class="btn btn-success btn-xs noprint">Print</button>
                        <!-- <button id="print_btn" class="btn btn-success btn-xs noprint" onclick="window.print()">Print</button> -->
                        <div class="page">
                            <div class="subpage">

                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span style="font-size:12px;color:#3b92ce;" id="names"><b>Insurance Sathi</b></span><br>
                                                <span style="font-size:12px" id="address_line1">602, Tulip Residency, Besant Street, Near Mangal Nursing Home, Santacruz West, Mumbai - 400054</span><br>
                                                <span style="font-size:12px" id="contact">Arvind: +91 9820154985 / Rikin: +91 9820123742 / Office: 9820137128 / 9769263011</span><br>
                                                <span style="font-size:12px" id="email">rikindhanani@rediffmail.com</span>

                                            </td>

                                            <td>
                                                <span style="margin-top:15px;">
                                                    <center>
                                                        <!-- <img src="<?php //echo base_url(); 
                                                                        ?>assets/gic_img/gic_letter_logo.png" alt="Insurance athi" width="60" height="60"> -->
                                                        <img src="<?php echo base_url(); ?>assets/gic_img/gic_per_2.png" alt="Insurance athi" width="60" height="60">
                                                    </center>
                                                </span>
                                            </td>
                                        </tr>

                                        <!-- <tr>
                                            <td>gic_per_2.png

                                            </td>
                                            <td width="60%">
                                                <center>
                                                    <h4 class="modal-title " style="color:red"><u>Renewal Reminder Letter</u></h4>
                                                </center>
                                            </td>
                                            <td>

                                            </td>
                                        </tr> -->

                                    </tbody>
                                </table>
                                <table width="100%">
                                    <tbody>

                                        <!-- <tr>
                                            <td></td>
                                            <td width="60%">
                                                <center>
                                                    <h4 class="modal-title " style="color:red"><u>Renewal Reminder Letter</u></h4>
                                                </center>
                                            </td>
                                            <td> </td>
                                        </tr> -->
                                        <tr>
                                            <td width="100%">
                                                <table class="table mb-0" style="border:none;">
                                                    <hr style="border-top: 1px solid;">
                                                    <span>
                                                        <center>
                                                            <h4 style="color:red"><u>Renewal Reminder Letter</u></h4>
                                                        </center>
                                                    </span>

                                                    <tr>
                                                        <td width="30%">

                                                        </td>
                                                        <td width="30%"></td>
                                                        <td width="40%" style="text-align:right">
                                                            Date : <span id="premium_update_date"></span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100%">
                                                <center><span><b><u>Policy Holder Details</u></b></span></center>
                                                <table class="table mb-0 mt-1 table-bordered">
                                                    <tr>
                                                        <td>Policy Holder Name</td>
                                                        <td>Registered Mobile No</td>
                                                        <td>Registered Email Id</td>
                                                    </tr>
                                                    <tr>
                                                        <td id="policy_holder_name"></td>
                                                        <td id="registered_mobile_no"></td>
                                                        <td id="registered_email_id"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="100%">
                                                &nbsp;<p>&emsp;&emsp;&emsp; Below mentioned <u><b id="para_policy_name"></b></u> Policy No. <u><b id="para_policy_no"></b></u> is due for Renewal on <u><b id="para_policy_to_date"></b></u> details for which are given below.</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="100%">
                                                <center><span><b><u>Policy Details</u></b></span></center>
                                                <table class="table mb-0 mt-1 table-bordered">
                                                    <tr>
                                                        <td>Name Of Insurance Co</td>
                                                        <td>Policy Name </td>
                                                        <td>Individual / Floater</td>
                                                        <td class="type_based_show_quest" style="display:none;">Family size</td>
                                                    </tr>
                                                    <tr>
                                                        <td id="insurance_company"></td>
                                                        <td id="sub_policy_name"></td>
                                                        <td id="policy_type"></td>
                                                        <td class="type_based_show_ans" style="display:none;" id="family_size"></td>
                                                    </tr>

                                                </table>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="100%">
                                                <center><span class="health_table"><b><u>Policy Member details</u></b></span></center>
                                                <table style="display:none;" class="table mb-0 mt-1 table-bordered" id="health_table">
                                                    <tdead>
                                                        <tr>
                                                            <td>Name</td>
                                                            <td>DOB</td>
                                                            <td>Age</td>
                                                            <td>Relation</td>
                                                            <td class="policy_section" style="display:none;">Policy Section</td>
                                                            <td class="protector_rider" style="display:none;">Protector Rider</td>
                                                            <td>Sum Insured</td>
                                                            <td>Final Premium</td>
                                                        </tr>
                                                    </tdead>
                                                    <tbody id="policy_member_table_tbody"></tbody>

                                                </table>
                                                <!-- <center><span class="fire_table"><b><u>Risk Details</u></b></span></center><br /> -->
                                                <center><span class="fire_table"><b><u></u></b></span></center><br />
                                                <span class="type_of_business" id="type_of_business" style="display:none;"><b><u>Type Of Business : </u></b></span><span class="type_of_business_ans" id="type_of_business_ans" style="display:none;"></span><br />
                                                <span id="risk_fire_rc_details"></span>
                                                <table style="display:none;" class="table mb-0 mt-1 table-bordered" id="fire_table">

                                                </table>
                                                <span id="fire_table_2" style="display:none;"></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="100%">
                                                <center><span><b><u>Claim Details in the policy</u></b></span></center>
                                                <table class="table mb-0 mt-1 table-bordered">
                                                    <tdead>
                                                        <tr>
                                                            <td>Name of Claimant</td>
                                                            <td>Claim File No.</td>
                                                            <td>Action</td>
                                                        </tr>
                                                    </tdead>
                                                    <tbody id="claiment_details"></tbody>
                                                    <!-- <tr>
                                                        <td id="name_of_claiment"></td>
                                                        <td id="claim_file_no"></td>
                                                        <td id="action_of_claim"></td>
                                                    </tr> -->
                                                </table>
                                            </td>
                                        </tr>

                                        <tr style="display:none;" id="nominee_details_global">
                                            <td width="100%">
                                                <center><span><b><u>Nomination Details</u></b></span></center>
                                                <table class="table mb-0 mt-1 table-bordered">
                                                    <tdead>
                                                        <tr>
                                                            <td>Nominee Name</td>
                                                            <td>Nominee Relations</td>
                                                        </tr>
                                                    </tdead>
                                                    <tbody id="nominee_table_body"></tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr style="display:none;" id="hypotication_details_global">
                                            <td width="100%">
                                                <center><span><b><u>Bank Hypothecation Details </u></b></span></center>
                                                <table class="table mb-0 mt-1 table-bordered">
                                                    <tdead>
                                                        <tr>
                                                            <td>
                                                                <center>Bank Name</center>
                                                            </td>
                                                            <td>
                                                                <center>Branch Name</center>
                                                            </td>
                                                        </tr>
                                                    </tdead>
                                                    <tbody id="append_hypotication"></tbody>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="100%">
                                                <center><span><b><u>Payment Details Option</u></b></span></center>
                                                <table class="table mb-0 mt-1 table-bordered">
                                                    <tdead>
                                                        <tr>
                                                            <td><b><u>Option 1:</u></b><br /> Prepare Cheque in Favour Of “ <b><u><span id="payment_company_name"></span></u></b> ” Please send Courier at below Mentioned Address “<b><u><span id="payment_company_office_address"></span></u></b>” </td>
                                                        </tr>
                                                    </tdead>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100%">
                                                <span><b><u>Option 2:</u></b><br /> <b><u>RTGS / NEFT / IMPS details of the Insurance Co</u></b></span>
                                                <span id="neft_imps_riggs_details"></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="100%">

                                                <table class="table mb-0 mt-1 table-bordered">

                                                    <td><b><u>Option 3:</u></b><br /> Online Payment Link : <b><u><a target="_blank" href="" id="online_payment_link"><span id="online_payment_links"></span></a></u></b>
                                                        Steps <br /><b><span id="online_payment_steps"></span></b></td>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="100%">
                                                &nbsp;<span>Thank you for your continuous association & Trust on us by giving us any opportunity to serve you</span>
                                                <br />
                                                &nbsp;<span>Assuring you for the best of services </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="100%">

                                                <table class="table mb-0 mt-1 table-bordered">
                                                    <tr>
                                                        <hr style="border-top: 1px solid;">
                                                        <span><b><u>Disclaimer </u></b></span>
                                                        <td>1) The purpose of this report / Letter is solely to give you an Indication / Reminder for Renewal of the Expiring Policy/ies. This is a copy from our office & not from Insurance Company. 2) The presenter in no manner is promising or giving a guarantee about any benefits of the policy. 3) The presenter reserves the right for any mistakes in the above report or letter and is no way liable for the same. 4) The actual benefits will be given in the Policy issued by the Insurance co</td>
                                                    </tr>

                                                </table>
                                                <!-- Total Pages:<span class="total"></span> -->
                                                <!-- <span id="pageFooter"></span> -->
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
    </div>
</div>
<script src="<?php echo base_url(); ?>/assets/custom_js/printThis.js"></script>
<script>
    // const size = 1240; // roughly A4

    // function pageNum(top) {
    // return Math.round((top + window.pageYOffset - document.body.clientTop) / size) + 1;
    // }

    // function pageCount() {
    // return Math.round(document.body.clientHeight / size);
    // }

    // document.addEventListener("DOMContentLoaded", () => {

    // const els = Array.prototype.slice.call(document.querySelectorAll(".counter"));
    // els.map(e => {
    //     const box = e.getBoundingClientRect();
    //     e.textContent = pageNum(box.top);
    // });

    // const footer = document.querySelector(".total");
    // console.log("top", document.body.clientHeight);
    // footer.textContent = pageCount();
    // });


    $('#print_btn').click(function() {
        $(".page").printThis({
            debug: false, // show the iframe for debugging
            importCSS: true, // import parent page css
            importStyle: false, // import style tags
            printContainer: true, // print outer container/$.selector
            loadCSS: "", // path to additional css file - use an array [] for multiple
            pageTitle: "", // add title to print page
            removeInline: false, // remove inline styles from print elements
            removeInlineSelector: "*", // custom selectors to filter inline styles. removeInline must be true
            printDelay: 333, // variable print delay
            header: null, // prefix to html
            footer: null, // postfix to html
            base: false, // preserve the BASE tag or accept a string for the URL
            formValues: true, // preserve input/form values
            canvas: false, // copy canvas content if false Page No Show
            doctypeString: '...', // enter a different doctype for older markup
            removeScripts: false, // remove script tags from print content
            copyTagClasses: false, // copy classes from the html & body tag
            beforePrintEvent: null, // function for printEvent in iframe
            beforePrint: null, // function called before iframe is filled
            afterPrint: null // function called before iframe is removed
            // canvas: true
        });
    });

    // getCompanyDetails();
    var limit = 14;
    var first_pages;
    var total_pages;
    var i = 1;
    var print_pageCount = 1;

    function getCompanyDetails(fk_company_id) {
        $("#tableData").empty();
        var mcompany_id = fk_company_id;
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
                        $("#insurance_company").text(company_name);

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
                        // alert(courier_address);
                        // alert(payment_link);
                        // $("#online_payment_link").attr("href",payment_link);
                        // $("#online_payment_link").text(payment_link);
                        // $("#online_payment_link").html(payment_link);

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
                            account_tr_1 = '<tr><td><center>' + account_holder_name + '</center></td><td><center>' + account_number + '</center></td> <td ><center>' + bank_name + '</center></td><td><center>' + branch_name + '</center></td><td><center>' + ifsc_code + '</center></td><td><center>' + micr_code + '</center></td></tr>';

                        if (account_holder_name_1 != "")
                            account_tr_2 = '<tr><td><center>' + account_holder_name_1 + '</center></td><td><center>' + account_number_1 + '</center></td> <td><center>' + bank_name_1 + '</center></td><td><center>' + branch_name_1 + '</center></td><td><center>' + ifsc_code_1 + '</center></td><td><center>' + micr_code_1 + '</center></td></tr>';


                        var account_details = '<table class="table mb-0 mt-1 table-bordered"><tdead><tr ><td> <center>Account Holder</center></td><td><center>Account Number</center></td><td> <center>Bank Name</center> </td><td><center>Branch Name</center> </td><td><center>IFSC Code</center> </td><td> <center>MICR Code</center></td></tr></tdead><tbody id="append_agent">' + account_tr_1 + account_tr_2 + '</tbody></table>';
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

    getPOLICYDetails();

    function getPOLICYDetails() {
        single_member_id_global = "";
        var policy_id = "<?php echo $policy_id; ?>";
        var url = "<?php echo $base_url; ?>master/renewal/get_renew_policy_letter_details";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    'policy_id': policy_id
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    if (data["status"] == true) {
                        policy_id = parseInt(data["userdata"].policy_id);
                        var serial_no_year = data["userdata"].serial_no_year;
                        var serial_no_month = data["userdata"].serial_no_month;
                        serial_no = data["userdata"].serial_no;

                        var total_serial_no = serial_no_year + "/" + serial_no_month + "/" + serial_no;
                        fk_company_id = data["userdata"].fk_company_id;
                        company_name = data["userdata"].company_name;
                        department_name = data["userdata"].department_name;
                        policy_type_title = data["userdata"].policy_type_title;
                        member_name = data["userdata"].member_name;
                        grpname = data["userdata"].grpname;
                        policy_type = data["userdata"].policy_type;
                        mode_of_premimum = data["userdata"].mode_of_premimum;
                        date_from = data["userdata"].date_from;
                        date_to_new = data["userdata"].date_to;
                        date_to = date_to_new.split("-");
                        // alert(date_to);
                        date_to = date_to[2] + "-" + date_to[1] + "-" + date_to[0];

                        payment_date_from = data["userdata"].payment_date_from;
                        payment_date_to = data["userdata"].payment_date_to;
                        policy_no = data["userdata"].policy_no;
                        date_commenced = data["userdata"].date_commenced;
                        policy_upload = data["userdata"].policy_upload;
                        reg_mobile = data["userdata"].reg_mobile;
                        reg_email = data["userdata"].reg_email;
                        var grpname = data["userdata"].grpname;

                        sum_insured = data["userdata"].basic_sum_insured;
                        gross_premium = data["userdata"].basic_gross_premium;
                        renewal_letter_premium_flag = data["userdata"].renewal_letter_premium_flag;
                        renewal_letter_premium_date = data["userdata"].renewal_letter_premium_date;
                        // alert(renewal_letter_premium_date);
                        if (renewal_letter_premium_flag == 1) {
                            // alert("one");
                            basic_sum_insured = sum_insured;
                            basic_gross_premium = gross_premium;
                        } else if (renewal_letter_premium_flag == 0) {
                            // alert("sec");
                            basic_sum_insured = 0;
                            basic_gross_premium = 0;
                        }
                        var family_size = data["userdata"].family_size
                        if (sum_insured == undefined || sum_insured == null || sum_insured == "null" || sum_insured == "undefined" || sum_insured == "") {
                            sum_insured = "0";
                        }

                        // alert(gross_premium);
                        if (gross_premium == undefined || gross_premium == null || gross_premium == "null" || gross_premium == "undefined" || gross_premium == "") {
                            gross_premium = "0";
                        }
                        var comission = data["userdata"].plan_policy_commission;
                        if (comission == undefined || comission == null || comission == "null" || comission == "undefined" || comission == "") {
                            comission = "0";
                        }
                        var floater_policy_type = data["userdata"].floater_policy_type;
                        master_agency_name = data["userdata"].master_agency_name;
                        master_agency_code = data["userdata"].master_agency_code;
                        sub_agent_name = data["userdata"].sub_agent_name;
                        sub_agent_code = data["userdata"].sub_agent_code;

                        if (master_agency_name == undefined || master_agency_name == null || master_agency_name == "null" || master_agency_name == "")
                            master_agency_name = "";
                        else
                            master_agency_name = master_agency_name;
                        policy_upload = data["userdata"].policy_upload;

                        if (master_agency_code == undefined || master_agency_code == null || master_agency_code == "null" || master_agency_code == "")
                            master_agency_code = "";
                        else
                            master_agency_code = " ( " + master_agency_code + " )";

                        if (sub_agent_name == undefined || sub_agent_name == null || sub_agent_name == "null" || sub_agent_name == "")
                            sub_agent_name = "";
                        else
                            sub_agent_name = sub_agent_name;

                        if (sub_agent_code == undefined || sub_agent_code == null || sub_agent_code == "null" || sub_agent_code != "")
                            sub_agent_code = "";
                        else
                            sub_agent_code = " ( " + sub_agent_code + " )";

                        agency_name_code = master_agency_name + master_agency_code;
                        sub_agent_name_code = sub_agent_name + sub_agent_code;
                        if (floater_policy_type == null || floater_policy_type == "" || floater_policy_type == "null")
                            floater_policy_type = "";
                        else
                            floater_policy_type = " ( " + floater_policy_type + " ) ";

                        if (mode_of_premimum == 1)
                            mode_of_premimum = "Monthly";
                        else if (mode_of_premimum == 2)
                            mode_of_premimum = "Quaterly";
                        else if (mode_of_premimum == 3)
                            mode_of_premimum = "Half-Yearly";
                        else if (mode_of_premimum == 4)
                            mode_of_premimum = "Yearly";
                        else if (mode_of_premimum == 5)
                            mode_of_premimum = "2 Year";
                        else if (mode_of_premimum == 6)
                            mode_of_premimum = "3 Year";
                        else if (mode_of_premimum == 7)
                            mode_of_premimum = "4 Year";
                        else if (mode_of_premimum == 8)
                            mode_of_premimum = "5 Year";
                        else if (mode_of_premimum == 9)
                            mode_of_premimum = "6 Year";
                        else if (mode_of_premimum == 10)
                            mode_of_premimum = "7 Year";
                        else if (mode_of_premimum == 11)
                            mode_of_premimum = "8 Year";
                        else if (mode_of_premimum == 12)
                            mode_of_premimum = "9 Year";
                        else if (mode_of_premimum == 13)
                            mode_of_premimum = "10 Year";

                        policy_member_status = data["userdata"].policy_member_status;
                        var isActive = data["userdata"].del_flag;
                        var dynamic_path = data["userdata"].dynamic_path;

                        if (sub_agent_code == null)
                            sub_agent_code = "";

                        if (policy_type == 1)
                            policy_type_tit = "Individual";
                        else if (policy_type == 2)
                            policy_type_tit = "Floater";
                        else if (policy_type == 3)
                            policy_type_tit = "Residential & Commercial";
                        else if (policy_type == 4)
                            policy_type_tit = "Common Individual";
                        else if (policy_type == 5)
                            policy_type_tit = "Common Floater";

                        tpa_name = data["userdata"].tpa_name;
                        quotation_upload = data["userdata"].quotation_upload;
                        quotation_date = data["userdata"].quotation_date;
                        quotation_male_link = data["userdata"].quotation_male_link;
                        riv = data["userdata"].riv;
                        type_of_bussiness = data["userdata"].type_of_bussiness;
                        description_of_stock = data["userdata"].description_of_stock;
                        riv = data["userdata"].riv;


                        single_member_id_global = data["userdata"].fk_cust_member_id;

                        if (data["userdata"].risk_details == undefined || data["userdata"].risk_details == null)
                            var risk_details = "";
                        else if (data["userdata"].risk_details != undefined)
                            var risk_details = JSON.parse(data["userdata"].risk_details);
                        edit_Risk_details(risk_details, type = data["userdata"].policy_type, basic_sum_insured, basic_gross_premium);

                        var del_flag = data["userdata"].del_flag;
                        var hypotication_details = JSON.parse(data["userdata"].hypotication_details);
                        var policy_member_status = data["userdata"].policy_member_status;
                        var hypotication_tr = "";

                        $.each(hypotication_details, function(key, val) {
                            var bank_name = hypotication_details[key][0];
                            var branch_name = hypotication_details[key][1];
                            hypotication_tr += ' <tr><td><center>' + bank_name + '</center></td><td><center>' + branch_name + '</center></td> </tr>';
                        });
                        $("#append_hypotication").append(hypotication_tr);

                        var correspondence_details = JSON.parse(data["userdata"].correspondence_details);
                        var correspondence_tr = "";
                        $.each(correspondence_details, function(key1, val1) {
                            add_correspondence = key1;
                            var member_name = correspondence_details[key1][0];
                            var member_name_txt = correspondence_details[key1][1];
                            var correspondence_email = correspondence_details[key1][2];
                            var correspondence_whatsapp = correspondence_details[key1][3];
                            var correspondence_telegram = correspondence_details[key1][4];
                            var correspondence_cc = correspondence_details[key1][5];
                            correspondence_cc = correspondence_cc.replace(",", " , ");
                            var correspondence_bcc = correspondence_details[key1][6];
                            correspondence_bcc = correspondence_bcc.replace(",", " , ");

                            correspondence_tr += '<tr><td><center>' + member_name_txt + '</center></td><td><center>' + correspondence_email + '</center></td> <td><center>' + correspondence_whatsapp + '</center></td> <td><center>' + correspondence_telegram + '</center></td> <td><center>' + correspondence_cc + '</center></td> <td><center>' + correspondence_bcc + '</center></td> </tr>';
                        });
                        $("#append_correspondence").append(correspondence_tr);
                        // alert(data["userdata"].policy_type_title);
                        if (data["userdata"].policy_type_title == "Bharat Sookshma Udyam") {
                            var term_plan_policy_header = '<table class="table mb-0 table-bordered"><tr> <td colspan="2" width="65%"><strong>Total Sum Assured</strong></td><td><center><strong id="total_sum_assured"></strong></center></td></tr><tr><td colspan=""><strong> Fire Rate (Per 1000) </strong></td><td><center><strong  id="fire_rate_per"></strong></center></td><td><center><strong id="fire_rate_tot"></strong></center></td></tr><tr><td colspan=""><strong> Less Discount (in %)</strong></td><td><center><strong id="less_discount_per"></strong></center></td><td><center><strong id="less_discount_tot"></strong></center></td></tr> <tr><td colspan="2"><strong>Fire Rate After Discount</strong></td><td><center><strong id="fire_rate_after_discount_tot">  </strong></center></td></tr> <tr><td colspan="2"><strong>Gross Premium</strong></td> <td><center><strong id="gross_premium"></strong></center></td></tr> <tr><td colspan=""><strong>Add CGST (in %)</strong></td><td><center><strong id="cgst_fire_per"></strong></center></td><td><center><strong id="cgst_fire_tot"></strong></center></td> </tr><tr><td colspan=""><strong>  Add SGST (in %) </strong></td><td><center><strong id="sgst_fire_per">  </strong></center></td><td><center><strong id="sgst_fire_tot"> </strong></center></td></tr><tr><td colspan="2"><strong class="text-purple">Final Payable Premium</strong></td><td><center><strong id="final_paybal_premium"></strong></center></td></tr> </table>';
                            // alert(term_plan_policy_header)
                            $("#fire_table_2").show();
                            $("#fire_table_2").empty();
                            $("#fire_table_2").append(term_plan_policy_header);

                            var sookshma_fire_policy_id = data["userdata"].sookshma_fire_policy_id;
                            var total_sum_assured = data["userdata"].total_sum_assured;
                            var fire_rate_per = data["userdata"].fire_rate_per;
                            var fire_rate_tot_amount = data["userdata"].fire_rate_tot_amount;
                            var less_discount_per = data["userdata"].less_discount_per;
                            var less_discount_tot_amount = data["userdata"].less_discount_tot_amount;
                            var fire_rate_after_discount = data["userdata"].fire_rate_after_discount;
                            var gross_premium = data["userdata"].gross_premium;
                            var cgst_rate_per = data["userdata"].cgst_rate_per;
                            var cgst_tot_amount = data["userdata"].cgst_tot_amount;
                            var sgst_rate_per = data["userdata"].sgst_rate_per;
                            var sgst_tot_amount = data["userdata"].sgst_tot_amount;
                            var final_payable_premium = data["userdata"].final_payable_premium;
                            var sookshma_fire_policy_status = data["userdata"].sookshma_fire_policy_status;
                            alert(final_payable_premium);
                            $("#total_sum_assured").text(total_sum_assured);
                            $("#fire_rate_per").text(fire_rate_per);
                            $("#fire_rate_tot").text(fire_rate_tot_amount);
                            $("#less_discount_per").text(less_discount_per);
                            $("#less_discount_tot").text(less_discount_tot_amount);
                            $("#fire_rate_after_discount_tot").text(fire_rate_after_discount);
                            $("#gross_premium").text(gross_premium);
                            $("#cgst_fire_per").text(cgst_rate_per);
                            $("#cgst_fire_tot").text(cgst_tot_amount);
                            $("#sgst_fire_per").text(sgst_rate_per);
                            $("#sgst_fire_tot").text(sgst_tot_amount);
                            $("#final_paybal_premium").text(final_payable_premium);

                        } else if (data["userdata"].policy_type_title == "Bharat Laghu Udyam") {
                            var term_plan_policy_header = '<table class="table mb-0 table-bordered"><tr><td colspan="2" width="65%"><strong>Total Sum Assured</strong></td><td><center><strong id="total_sum_assured"></strong></center></td></tr><tr><td colspan=""><strong>Fire Rate (Per 1000) </strong></td><td><center><strong  id="fire_rate_per"></strong></center></td><td><center><strong id="fire_rate_tot"></strong></center></td></tr><tr> <td colspan=""><strong>Less Discount (in %)</strong></td><td><center><strong id="less_discount_per"></strong></center></td><td><center><strong id="less_discount_tot"></strong></center></td></tr> <tr><td colspan="2"><strong> Fire Rate After Discount </strong></td><td><center><strong id="fire_rate_after_discount_tot">  </strong></center></td> </tr><tr><td colspan="2"><strong>Gross Premium</strong></td><td><center><strong id="gross_premium"></strong></center></td></tr><tr><td colspan=""><strong>  Add CGST (in %)</strong></td> <td><center><strong id="cgst_fire_per"></strong></center></td><td><center><strong id="cgst_fire_tot"></strong></center></td></tr><tr><td colspan=""><strong>Add SGST (in %)</strong></td><td><center><strong id="sgst_fire_per">  </strong></center></td> <td><center><strong id="sgst_fire_tot"> </strong></center></td> </tr><tr><td colspan="2"><strong class="text-purple">Final Payable Premium </strong></td> <td><center><strong id="final_paybal_premium"></strong></center></td> </tr></table>';
                            // alert(term_plan_policy_header)
                            $("#fire_table_2").show();
                            $("#fire_table_2").empty();
                            $("#fire_table_2").append(term_plan_policy_header);
                            var laghu_fire_policy_id = data["userdata"].laghu_fire_policy_id;
                            var laghu_total_sum_assured = data["userdata"].laghu_total_sum_assured;
                            var laghu_fire_rate_per = data["userdata"].laghu_fire_rate_per;
                            var laghu_fire_rate_tot_amount = data["userdata"].laghu_fire_rate_tot_amount;
                            var laghu_less_discount_per = data["userdata"].laghu_less_discount_per;
                            var laghu_less_discount_tot_amount = data["userdata"].laghu_less_discount_tot_amount;
                            var laghu_fire_rate_after_discount = data["userdata"].laghu_fire_rate_after_discount;
                            var laghu_gross_premium = data["userdata"].laghu_gross_premium;
                            var laghu_cgst_rate_per = data["userdata"].laghu_cgst_rate_per;
                            var laghu_cgst_tot_amount = data["userdata"].laghu_cgst_tot_amount;
                            var laghu_sgst_rate_per = data["userdata"].laghu_sgst_rate_per;
                            var laghu_sgst_tot_amount = data["userdata"].laghu_sgst_tot_amount;
                            var laghu_final_payable_premium = data["userdata"].laghu_final_payable_premium;
                            var laghu_fire_policy_status = data["userdata"].laghu_fire_policy_status;
                            $("#total_sum_assured").text(laghu_total_sum_assured);
                            $("#fire_rate_per").text(laghu_fire_rate_per);
                            $("#fire_rate_tot").text(laghu_fire_rate_tot_amount);
                            $("#less_discount_per").text(laghu_less_discount_per);
                            $("#less_discount_tot").text(laghu_less_discount_tot_amount);
                            $("#fire_rate_after_discount_tot").text(laghu_fire_rate_after_discount);
                            $("#gross_premium").text(laghu_gross_premium);
                            $("#cgst_fire_per").text(laghu_cgst_rate_per);
                            $("#cgst_fire_tot").text(laghu_cgst_tot_amount);
                            $("#sgst_fire_per").text(laghu_sgst_rate_per);
                            $("#sgst_fire_tot").text(laghu_sgst_tot_amount);
                            $("#final_paybal_premium").text(laghu_final_payable_premium);

                        } else if (data["userdata"].policy_type_title == "Bharat Griha Raksha") {
                            var term_plan_policy_header = '<table class="table mb-0 table-bordered"><tr><td colspan="2" width="65%"><strong>Total Sum Assured</strong></td><td><center><strong id="total_sum_assured"></strong></center></td></tr><tr><td colspan=""><strong> Fire Rate (Per 1000) </strong></td><td><center><strong  id="fire_rate_per"></strong></center></td><td><center><strong id="fire_rate_tot"></strong></center></td></tr><tr><td colspan=""><strong> Less Discount (in %)</strong></td><td><center><strong id="less_discount_per"></strong></center></td><td><center><strong id="less_discount_tot"></strong></center></td> </tr><tr> <td colspan="2"><strong>Fire Rate After Discount</strong></td><td><center><strong id="fire_rate_after_discount_tot">  </strong></center></td></tr><tr> <td colspan="2"><strong> Gross Premium</strong></td><td><center><strong id="gross_premium"></strong></center></td>  </tr><tr> <td colspan=""><strong> Add CGST (in %) </strong></td><td><center><strong id="cgst_fire_per"></strong></center></td><td><center><strong id="cgst_fire_tot"></strong></center></td></tr><tr> <td colspan=""><strong> Add SGST (in %)</strong></td><td><center><strong id="sgst_fire_per">  </strong></center></td> <td><center><strong id="sgst_fire_tot"> </strong></center></td></tr><tr><td colspan="2"><strong class="text-purple">Final Payable Premium </strong></td><td><center><strong id="final_paybal_premium"></strong></center></td> </tr></table>';
                            // alert(term_plan_policy_header)
                            $("#fire_table_2").show();
                            $("#fire_table_2").empty();
                            $("#fire_table_2").append(term_plan_policy_header);
                            var griharaksha_fire_policy_id = data["userdata"].griharaksha_fire_policy_id;
                            var griharaksha_total_sum_assured = data["userdata"].griharaksha_total_sum_assured;
                            var griharaksha_fire_rate_per = data["userdata"].griharaksha_fire_rate_per;
                            var griharaksha_fire_rate_tot_amount = data["userdata"].griharaksha_fire_rate_tot_amount;
                            var griharaksha_less_discount_per = data["userdata"].griharaksha_less_discount_per;
                            var griharaksha_less_discount_tot_amount = data["userdata"].griharaksha_less_discount_tot_amount;
                            var griharaksha_fire_rate_after_discount = data["userdata"].griharaksha_fire_rate_after_discount;
                            var griharaksha_gross_premium = data["userdata"].griharaksha_gross_premium;
                            var griharaksha_cgst_rate_per = data["userdata"].griharaksha_cgst_rate_per;
                            var griharaksha_cgst_tot_amount = data["userdata"].griharaksha_cgst_tot_amount;
                            var griharaksha_sgst_rate_per = data["userdata"].griharaksha_sgst_rate_per;
                            var griharaksha_sgst_tot_amount = data["userdata"].griharaksha_sgst_tot_amount;
                            var griharaksha_final_payable_premium = data["userdata"].griharaksha_final_payable_premium;
                            var griharaksha_fire_policy_status = data["userdata"].griharaksha_fire_policy_status;
                            $("#total_sum_assured").text(griharaksha_total_sum_assured);
                            $("#fire_rate_per").text(griharaksha_fire_rate_per);
                            $("#fire_rate_tot").text(griharaksha_fire_rate_tot_amount);
                            $("#less_discount_per").text(griharaksha_less_discount_per);
                            $("#less_discount_tot").text(griharaksha_less_discount_tot_amount);
                            $("#fire_rate_after_discount_tot").text(griharaksha_fire_rate_after_discount);
                            $("#gross_premium").text(griharaksha_gross_premium);
                            $("#cgst_fire_per").text(griharaksha_cgst_rate_per);
                            $("#cgst_fire_tot").text(griharaksha_cgst_tot_amount);
                            $("#sgst_fire_per").text(griharaksha_sgst_rate_per);
                            $("#sgst_fire_tot").text(griharaksha_sgst_tot_amount);
                            $("#final_paybal_premium").text(griharaksha_final_payable_premium);

                        } else if (data["userdata"].policy_type_title == "Standard Fire & Allied Perils") {
                            var term_plan_policy_header = '<table class="table mb-0 table-bordered"> <tr> <td colspan="2" width="65%"><strong>Total Sum Assured</strong></td><td><center><strong id="total_sum_assured"></strong></center></td></tr><tr><td colspan=""><strong>   Fire Rate (Per 1000)  </strong></td><td><center><strong  id="fire_rate_per"></strong></center></td><td><center><strong id="fire_rate_tot"></strong></center></td></tr><tr><td colspan=""><strong> Less Discount (in %)</strong></td><td><center><strong id="less_discount_per"></strong></center></td> <td><center><strong id="less_discount_tot"></strong></center></td> </tr><tr><td colspan="2"><strong> Fire Rate After Discount</strong></td><td><center><strong id="fire_rate_after_discount_tot">  </strong></center></td></tr><tr> <td colspan=""><strong>STFI Rate (in %)</strong></td><td><center><strong id="stfi_rate_per"></strong></center></td><td><center><strong id="stfi_rate_total"></strong></center></td></tr> <tr><td colspan=""><strong>  Earthquake Rate (in %)</strong></td><td><center><strong id="earthquake_rate_per"></strong></center></td><td><center><strong id="earthquake_rate_total"></strong></center></td></tr><tr><td colspan=""><strong> Terrorisum Rate (in %) </strong></td><td><center><strong id="terrorisum_rate_per"></strong></center></td> <td><center><strong id="terrorisum_rate_total"></strong></center></td></tr><tr><td colspan="2"><strong> Gross Premium</strong></td><td><center><strong id="gross_premium"></strong></center></td></tr><tr><td colspan=""><strong> Add CGST (in %)</strong></td><td><center><strong id="cgst_fire_per"></strong></center></td><td><center><strong id="cgst_fire_tot"></strong></center></td></tr><tr><td colspan=""><strong> Add SGST (in %)</strong></td><td><center><strong id="sgst_fire_per">  </strong></center></td><td><center><strong id="sgst_fire_tot"> </strong></center></td></tr><tr><td colspan="2"><strong class="text-purple"> Final Payable Premium</strong></td> <td><center><strong id="final_paybal_premium"></strong></center></td> </tr></table>';
                            // alert(term_plan_policy_header)
                            $("#fire_table_2").show();
                            $("#fire_table_2").empty();
                            $("#fire_table_2").append(term_plan_policy_header);

                            var fire_allied_perils_policy_id = data["userdata"].fire_allied_perils_policy_id;
                            var allied_perils_total_sum_assured = data["userdata"].allied_perils_total_sum_assured;
                            var allied_perils_fire_rate_per = data["userdata"].allied_perils_fire_rate_per;
                            var allied_perils_fire_rate_tot_amount = data["userdata"].allied_perils_fire_rate_tot_amount;
                            var allied_perils_less_discount_per = data["userdata"].allied_perils_less_discount_per;
                            var allied_perils_less_discount_tot_amount = data["userdata"].allied_perils_less_discount_tot_amount;
                            var allied_perils_fire_rate_after_discount = data["userdata"].allied_perils_fire_rate_after_discount;

                            var allied_perils_stfi_rate = data["userdata"].allied_perils_stfi_rate;
                            var allied_perils_stfi_rate_total = data["userdata"].allied_perils_stfi_rate_total;
                            var allied_perils_earthquake_rate = data["userdata"].allied_perils_earthquake_rate;
                            var allied_perils_earthquake_rate_total = data["userdata"].allied_perils_earthquake_rate_total;
                            var allied_perils_terrorisum_rate = data["userdata"].allied_perils_terrorisum_rate;
                            var allied_perils_terrorisum_rate_total = data["userdata"].allied_perils_terrorisum_rate_total;
                            var tot_sum_devid = data["userdata"].tot_sum_devid;

                            var allied_perils_gross_premium = data["userdata"].allied_perils_gross_premium;
                            var allied_perils_cgst_rate_per = data["userdata"].allied_perils_cgst_rate_per;
                            var allied_perils_cgst_tot_amount = data["userdata"].allied_perils_cgst_tot_amount;
                            var allied_perils_sgst_rate_per = data["userdata"].allied_perils_sgst_rate_per;
                            var allied_perils_sgst_tot_amount = data["userdata"].allied_perils_sgst_tot_amount;
                            var allied_perils_final_payable_premium = data["userdata"].allied_perils_final_payable_premium;
                            var fire_allied_perils_policy_status = data["userdata"].fire_allied_perils_policy_status;
                            $("#total_sum_assured").text(allied_perils_total_sum_assured);
                            $("#fire_rate_per").text(allied_perils_fire_rate_per);
                            $("#fire_rate_tot").text(allied_perils_fire_rate_tot_amount);
                            $("#less_discount_per").text(allied_perils_less_discount_per);
                            $("#less_discount_tot").text(allied_perils_less_discount_tot_amount);
                            $("#fire_rate_after_discount_tot").text(allied_perils_fire_rate_after_discount);

                            $("#stfi_rate_per").text(allied_perils_stfi_rate);
                            $("#stfi_rate_total").text(allied_perils_stfi_rate_total);
                            $("#earthquake_rate_per").text(allied_perils_earthquake_rate);
                            $("#earthquake_rate_total").text(allied_perils_earthquake_rate_total);
                            $("#terrorisum_rate_per").text(allied_perils_terrorisum_rate);
                            $("#terrorisum_rate_total").text(allied_perils_terrorisum_rate_total);
                            $("#tot_sum_devid").text(tot_sum_devid);

                            $("#gross_premium").text(allied_perils_gross_premium);
                            $("#cgst_fire_per").text(allied_perils_cgst_rate_per);
                            $("#cgst_fire_tot").text(allied_perils_cgst_tot_amount);
                            $("#sgst_fire_per").text(allied_perils_sgst_rate_per);
                            $("#sgst_fire_tot").text(allied_perils_sgst_tot_amount);
                            $("#final_paybal_premium").text(allied_perils_final_payable_premium);
                            $("#fire_allied_perils_policy_id").text(fire_allied_perils_policy_id);

                        } else if (data["userdata"].policy_type_title == "Burglary") {

                            var term_plan_policy_header = '<table class="table mb-0 table-bordered"><tr><td colspan="2" width="65%"><strong>Total Sum Assured</strong></td><td><center><strong id="total_sum_assured"></strong></center></td></tr><tr><td colspan=""><strong>  Burglary Rate (Per 1000)   </strong></td><td><center><strong  id="fire_rate_per"></strong></center></td><td><center><strong id="fire_rate_tot"></strong></center></td></tr><tr><td colspan=""><strong>Less Discount (in %)</strong></td><td><center><strong id="less_discount_per"></strong></center></td><td><center><strong id="less_discount_tot"></strong></center></td></tr><tr><td colspan="2"><strong>Burglary Rate After Discount</strong></td><td><center><strong id="fire_rate_after_discount_tot">  </strong></center></td></tr><tr><td colspan="2"><strong>Gross Premium</strong></td><td><center><strong id="gross_premium"></strong></center></td></tr><tr><td colspan=""><strong>Add CGST (in %)</strong></td><td><center><strong id="cgst_fire_per"></strong></center></td><td><center><strong id="cgst_fire_tot"></strong></center></td></tr><tr><td colspan=""><strong>Add SGST (in %)</strong></td> <td><center><strong id="sgst_fire_per">  </strong></center></td> <td><center><strong id="sgst_fire_tot"> </strong></center></td></tr><tr><td colspan="2"><strong class="text-purple"> Final Payable Premium</strong></td><td><center><strong id="final_paybal_premium"></strong></center></td></tr></table>';
                            // alert(term_plan_policy_header)
                            $(".type_of_business").hide();
                            $(".type_of_business_ans").hide();
                            $("#fire_table_2").show();
                            $("#fire_table_2").empty();
                            $("#fire_table_2").append(term_plan_policy_header);
                            var burglary_policy_id = data["userdata"].burglary_policy_id;
                            var burglary_total_sum_assured = data["userdata"].burglary_total_sum_assured;
                            var burglary_fire_rate_per = data["userdata"].burglary_fire_rate_per;
                            var burglary_fire_rate_tot_amount = data["userdata"].burglary_fire_rate_tot_amount;
                            var burglary_less_discount_per = data["userdata"].burglary_less_discount_per;
                            var burglary_less_discount_tot_amount = data["userdata"].burglary_less_discount_tot_amount;
                            var burglary_fire_rate_after_discount = data["userdata"].burglary_fire_rate_after_discount;
                            var burglary_gross_premium = data["userdata"].burglary_gross_premium;
                            var burglary_cgst_rate_per = data["userdata"].burglary_cgst_rate_per;
                            var burglary_cgst_tot_amount = data["userdata"].burglary_cgst_tot_amount;
                            var burglary_sgst_rate_per = data["userdata"].burglary_sgst_rate_per;
                            var burglary_sgst_tot_amount = data["userdata"].burglary_sgst_tot_amount;
                            var burglary_final_payable_premium = data["userdata"].burglary_final_payable_premium;
                            var burglary_policy_status = data["userdata"].burglary_policy_status;
                            $("#total_sum_assured").text(burglary_total_sum_assured);
                            $("#fire_rate_per").text(burglary_fire_rate_per);
                            $("#fire_rate_tot").text(burglary_fire_rate_tot_amount);
                            $("#less_discount_per").text(burglary_less_discount_per);
                            $("#less_discount_tot").text(burglary_less_discount_tot_amount);
                            $("#fire_rate_after_discount_tot").text(burglary_fire_rate_after_discount);
                            $("#gross_premium").text(burglary_gross_premium);
                            $("#cgst_fire_per").text(burglary_cgst_rate_per);
                            $("#cgst_fire_tot").text(burglary_cgst_tot_amount);
                            $("#sgst_fire_per").text(burglary_sgst_rate_per);
                            $("#sgst_fire_tot").text(burglary_sgst_tot_amount);
                            $("#final_paybal_premium").text(burglary_final_payable_premium);
                            $("#burglary_policy_id").text(burglary_policy_id);

                        } else if (data["userdata"].policy_type_title == "Term Plan") {
                            var term_plan_policy_data_arr = data["userdata"].term_plan_policy_data_arr;
                            var term_plan_policy_header = '<table class="table mb-0 table-bordered"><tr><td colspan="2"><strong id="" >Policy Term </strong></td><td><center><strong id="policy_term" ></strong></center></td></tr><tr><td colspan="2"><strong id="" >Premium paying term</strong></td><td><center><strong id="premium_paying_term" ></strong></center></td></tr> <tr><td colspan="2"><strong id="" > Sum Insured</strong></td><td><center><strong id="sum_insured" ></strong></center></td>  </tr> <tr> <td colspan="2"><strong id="" > Basic Premium</strong></td><td><center><strong id="basic_premium" ></strong></center></td></tr><tr> <td colspan="2"><strong id="" > Add: Loading </strong></td><td><center><strong id="add_loading" ></strong></center></td> </tr><tr><td colspan="2"><strong id="" >Loading description </strong></td><td><center><strong id="loading_description" ></strong></center></td></tr><tr><td colspan="2"><strong id="" >Premium After Loading</strong></td><td><center><strong id="premium_after_loading" ></strong></center></td></tr><tr><td colspan=""><strong id="" >CGST</strong></td><td><center><strong id="cgst_term_plan" ></strong></center></td><td><center><strong id="cgst_term_plan_tot" ></strong></center></td></tr><tr> <td colspan=""><strong id="" >SGST</strong></td><td><center><strong id="sgst_term_plan" ></strong></center></td> <td><center><strong id="sgst_term_plan_tot" ></strong></center></td>  </tr> <tr><td colspan="2"><strong class="text-purple"> Final Payable Premium</strong></td><td><center><strong id="term_plan_final_paybal_premium" ></strong></center></td> </tr> </table>';
                            // alert(term_plan_policy_header)
                            $(".type_of_business").hide();
                            $(".type_of_business_ans").hide();
                            $("#fire_table").empty();
                            $("#fire_table").append(term_plan_policy_header);
                            $.each(term_plan_policy_data_arr, function(key_other, val_other) {
                                var term_plan_policy_id = term_plan_policy_data_arr.term_plan_policy_id;
                                var term_plan_fk_policy_id = term_plan_policy_data_arr.term_plan_fk_policy_id;
                                var fk_policy_type_id = term_plan_policy_data_arr.fk_policy_type_id;
                                var term_plan_policy = term_plan_policy_data_arr.term_plan_policy;
                                var term_plan_premium_paying_term = term_plan_policy_data_arr.term_plan_premium_paying_term;
                                var term_plan_total_sum_insured = term_plan_policy_data_arr.term_plan_total_sum_insured;
                                var term_plan_basic_premium = term_plan_policy_data_arr.term_plan_basic_premium;
                                var term_plan_add_loading = term_plan_policy_data_arr.term_plan_add_loading;
                                var term_plan_loading_description = term_plan_policy_data_arr.term_plan_loading_description;
                                var term_plan_premium_after_loading = term_plan_policy_data_arr.term_plan_premium_after_loading;
                                var term_plan_cgst = term_plan_policy_data_arr.term_plan_cgst;
                                var term_plan_sgst = term_plan_policy_data_arr.term_plan_sgst;
                                var term_plan_cgst_tot_ammount = term_plan_policy_data_arr.term_plan_cgst_tot_ammount;
                                var term_plan_sgst_tot_ammount = term_plan_policy_data_arr.term_plan_sgst_tot_ammount;
                                var term_plan_final_paybal_premium = term_plan_policy_data_arr.term_plan_final_paybal_premium;
                                var term_plan_status = term_plan_policy_data_arr.term_plan_status;

                                $("#policy_term").text(term_plan_policy);
                                $("#premium_paying_term").text(term_plan_premium_paying_term);
                                $("#sum_insured").text(term_plan_total_sum_insured);
                                $("#basic_premium").text(term_plan_basic_premium);
                                $("#add_loading").text(term_plan_add_loading);
                                $("#loading_description").text(term_plan_loading_description);
                                $("#premium_after_loading").text(term_plan_premium_after_loading);
                                $("#cgst_term_plan").text(term_plan_cgst);
                                $("#sgst_term_plan").text(term_plan_sgst);
                                $("#cgst_term_plan_tot").text(term_plan_cgst_tot_ammount);
                                $("#sgst_term_plan_tot").text(term_plan_sgst_tot_ammount);
                                $("#term_plan_final_paybal_premium").text(term_plan_final_paybal_premium);
                                $("#term_plan_policy_id").text(term_plan_policy_id);
                            });

                        } else if (data["userdata"].policy_type_title == "Shopkeeper") {
                            if (data["userdata"].policy_type != 3) {
                                var term_plan_policy_header = '<b>Risk Address:<span id="shopkeeper_risk_address"></span></b><table class="table mb-0 table-bordered"><tdead><tr><td>Section - 1</td><td>Sum Insured</td><td>Rate</td><td>Premium</td></tr></tdead><tr><td colspan="" rowspan="3" width="20%"><strong>Fire</strong><table class="table"><tr><td colspan=""><strong>A</strong></td><td colspan=""><strong>Building</strong></td></tr><tr><td colspan=""><strong>B</strong></td><td colspan=""><strong>Stock</strong></td></tr><tr><td colspan=""><strong></strong><br /></td><td colspan=""><strong>FFFF</strong><br /></td></tr></table></td><td rowspan="3"><table class="table"><tr><br /> <td colspan=""><strong id="fire_sum_insured_1"></strong></td></tr><tr><td colspan=""><strong id="fire_sum_insured_2"></td> </tr><tr><td colspan=""><strong id="fire_sum_insured_3"></td></tr></table> </td> <td rowspan="3"> <table class="table"><tr><br /> <td colspan=""><strong id="fire_rate_1"></strong></td></tr><tr><td colspan=""><strong id="fire_rate_2"></strong></td></tr><tr> <td colspan=""><strong id="fire_rate_3"></strong></td> </tr></table></td> <td rowspan="3"><table class="table"><tr><br /><td colspan=""><strong id="fire_premium_1"></strong></td></tr><tr><td colspan=""><strong id="fire_premium_2"></strong></td></tr><tr> <td colspan=""><strong id="fire_premium_3"></strong></td> </tr></table> </td> </tr></table> <table class="table mb-0 table-bordered"><tdead><tr><td>Section - 2</td> <td>Sum Insured</td> <td>Rate</td><td>Premium</td></tr> </tdead><tr> <td colspan="" rowspan="3" width="20%"><strong>Burglary</strong> <table class="table"><tr><td colspan=""><strong>A</strong></td> <td colspan=""><strong>Building</strong></td></tr> <tr><td colspan=""><strong>B</strong></td><td colspan=""><strong>Stock</strong></td></tr> <tr><td colspan=""><strong></strong><br /></td> <td colspan=""><strong>FFFF</strong><br /></td></tr> </table></td> <td rowspan="3"> <table class="table"><tr> <br /> <td colspan=""><strong id="burglary_sum_insured_1"></strong></td> </tr> <tr><td colspan=""><strong id="burglary_sum_insured_2"></strong></td> </tr>  <tr> <td colspan=""><strong id="burglary_sum_insured_3"></strong></td></tr> </table> </td><td rowspan="3"> <table class="table"><tr><br /><td colspan=""><strong id="burglary_rate_1"></strong></td></tr><tr><td colspan=""><strong id="burglary_rate_2"></strong></td></tr><tr><td colspan=""><strong id="burglary_rate_3"></td> </tr> </table></td><td rowspan="3"> <table class="table"><tr><br /><td colspan=""><strong id="burglary_premium_1"></strong></td></tr> <tr> <td colspan=""><strong id="burglary_premium_2"></strong></td></tr><tr> <td colspan=""><strong id="burglary_premium_3"></strong></td></tr> </table></td> </tr> </table><table class="table mb-0 table-bordered"><tdead><tr><td>Section - 3</td><td>Sum Insured</td><td>Rate</td><td>Premium</td></tr></tdead><tr><td colspan="" rowspan="3" width="20%"><strong>Money Insurance</strong> <table class="table"><tr> <td colspan=""><strong>A</strong></td><td colspan=""><strong>In Transit</strong></td></tr><tr><td colspan=""><strong>B</strong></td><td colspan=""><strong>In Safe</strong></td></tr><tr><td colspan=""><strong>C</strong><br /></td><td colspan=""><strong>In Till Counter</strong><br /></td> </tr></table> </td><td rowspan="3"> <table class="table"><tr><br /> <td colspan=""><strong id="money_insu_sum_insured_1"></strong></td> </tr><tr><td colspan=""><strong id="money_insu_sum_insured_2"></strong></td></tr> <tr><td colspan=""><strong id="money_insu_sum_insured_3"></strong></td></tr> </table> </td><td rowspan="3"> <table class="table"> <tr><br /><td colspan=""><strong id="money_insu_rate_1"></strong></td></tr><tr> <td colspan=""><strong id="money_insu_rate_2"></strong></td></tr> <tr>  <td colspan=""><strong id="money_insu_rate_3"></strong></td> </tr> </table></td><td rowspan="3"> <table class="table"><tr><br /><td colspan=""><strong id="money_insu_premium_1"></strong></td></tr> <tr> <td colspan=""><strong id="money_insu_premium_2"></strong></td> </tr><tr> <td colspan=""><strong id="money_insu_premium_3"></strong></td> </tr> </table> </td></tr></table><table class="table mb-0 table-bordered"><tdead><tr><td>Section</td><td>Sum Insured</td><td>Rate</td> <td>Premium</td> </tr></tdead><tr> <td colspan="" rowspan="" width="20%"><strong>5 - Plate Glass</strong></td> <td rowspan=""><strong id="plate_glass_sum_insured"></strong></td><td rowspan=""><strong id="plate_glass_rate_per"></strong></td><td rowspan=""><strong id="plate_glass_premium"></strong></td></tr><tr><td colspan="" rowspan="" width="20%"><strong>6 - Neon & Glow Sign</strong></td><td rowspan=""><strong id="neon_glow_sum_insured"></strong></td><td rowspan=""><strong id="neon_glow_rate_per"></strong></td><td rowspan=""><strong id="neon_glow_premium"></strong></td></tr><tr><td colspan="" rowspan="" width="20%"><strong>7 - Baggage Insurance</strong></td><td rowspan=""><strong id="baggage_ins_sum_insured"></strong></td><td rowspan=""><strong id="baggage_ins_rate_per"></strong></td><td rowspan=""><strong id="baggage_ins_premium"></strong></td></tr><tr><td colspan="" rowspan="" width="20%"><strong>8 - Personal Accident</strong></td><td colspan="3"><table class="table mb-0 table-bordered" id="personal_acc"><tdead> <tr><td>Name</td><td>D.O.B</td><td>Designation</td><td>Sum Insured</td></tr> </tdead><tbody id="append_personal_acc"> </tbody></table></td></tr><tr><td colspan="1"></td><td rowspan="">Sum Insured : <strong id="personal_accident_sum_insured"></strong></td><td rowspan="">Rate : <strong id="personal_accident_rate_per"></strong></td><td rowspan="">Premium : <strong id="personal_accident_premium"></strong></td></tr><tr><td colspan="" rowspan="" width="20%"><strong>9 - Fidelity Gaurantee</strong></td><td colspan="3"><table class="table mb-0 table-bordered" id="fidelity_gaur"><tdead><tr><td>Name</td><td>D.O.B</td><td>Designation</td><td>Sum Insured</td></tr></tdead><tbody id="append_fidelity_gaur"></tbody></table></td></tr><tr><td colspan="1"></td><td rowspan="">Sum Insured : <strong id="fidelity_gaur_sum_insured"></strong></td><td rowspan="">Rate : <strong id="fidelity_gaur_rate_per"></strong></td><td rowspan="">Premium : <strong id="fidelity_gaur_premium"></strong></td></tr></table><table class="table mb-0 table-bordered"><tdead><tr><td>Section - 10</td> <td>Sum Insured</td><td>Rate</td><td>Premium</td></tr></tdead> <tr><td colspan="" rowspan="2" width="20%"><strong>Public Liability</strong><table class="table"><tr><td colspan=""><strong>A</strong></td><td colspan=""><strong>Public Liability</strong></td></tr><tr><td colspan=""><strong>B</strong></td><td colspan=""><strong>Works Men Compensation</strong></td></tr></table></td><td rowspan="3"><table class="table"><tr><br /><td colspan=""><strong id="pub_libility_sum_insured"></strong></td></tr><tr><td colspan=""><strong id="work_men_compens_sum_insured"></strong></td></tr></table></td><td rowspan="3"><table class="table"><tr><br /><td colspan=""><strong id="pub_libility_rate"></strong></td></tr><tr><td colspan=""><strong id="work_men_compens_rate"></strong></td></tr> </table></td><td rowspan="3"><table class="table"><tr><br /><td colspan=""><strong id="pub_libility_premium"></strong></td></tr><tr><td colspan=""><strong id="work_men_compens_premium"></strong></td></tr></table></td> </tr></table><table class="table mb-0 table-bordered"><tdead><tr><td>Section - 11</td><td>Sum Insured</td><td>Rate</td><td>Premium</td></tr></tdead><tr><td colspan="" rowspan="3" width="20%"><strong>Business Interruption</strong><table class="table"><tr><td colspan=""><strong>A</strong></td> <td colspan=""><strong>Building</strong></td></tr><tr><td colspan=""><strong>B</strong></td><td colspan=""><strong>Stock</strong></td></tr><tr> <td colspan=""><strong></strong><br /></td><td colspan=""><strong>FFFF</strong><br /></td></tr></table></td> <td rowspan="3"><table class="table"><tr><br /><td colspan=""><strong id="bus_inter_sum_insured_1"></strong></td></tr><tr><td colspan=""><strong id="bus_inter_sum_insured_2"></strong></td></tr><tr><td colspan=""><strong id="bus_inter_sum_insured_3"></strong></td> </tr> </table></td><td rowspan="3"><table class="table"><tr><br /> <td colspan=""><strong id="bus_inter_rate_1"></strong></td></tr><tr><td colspan=""><strong id="bus_inter_rate_2"></strong></td></tr><tr><td colspan=""><strong id="bus_inter_rate_3"></strong></td></tr></table></td><td rowspan="3"><table class="table"><tr><br /> <td colspan=""><strong id="bus_inter_premium_1"></strong></td></tr><tr> <td colspan=""><strong id="bus_inter_premium_2"></strong></td> </tr><tr><td colspan=""><strong id="bus_inter_premium_3"></strong></td></tr> </table></td></tr></table><table class="table mb-0 table-bordered"><tr><td colspan=""><strong>Total Sum Assured</strong></td><td><center><strong id="shopkeeper_total_sum_assured"></strong></center></td><td><center><strong id="shopkeeper_total_premium"></strong></center></td></tr><tr><td colspan=""><strong>Less Discount (in %) </strong></td><td><center><strong id="shopkeeper_less_discount_per"> </strong></center></td><td><center><strong id="shopkeeper_less_discount_tot"></strong></center></td></tr> <tr><td colspan="2"><strong>  Amount After Discount</strong></td><td><center><strong id="shopkeeper_fire_rate_after_discount_tot"></strong></center></td></tr><tr><td colspan=""><strong> Add CGST (in %) </strong></td><td><center><strong id="shopkeeper_cgst_fire_per"></strong></center></td><td><center><strong id="shopkeeper_cgst_fire_tot"></strong></center></td></tr><tr><td colspan=""><strong>Add SGST (in %)</strong></td><td><center><strong id="shopkeeper_sgst_fire_per"></strong></center></td><td><center><strong id="shopkeeper_sgst_fire_tot"></strong></center></td></tr><tr><td colspan="2"><center><strong class="text-purple"> Final Payable Premium </strong></center></td><td><center><strong id="shopkeeper_final_paybal_premium"> </strong></center></td></tr></table>';
                                // alert(term_plan_policy_header)
                                $(".type_of_business").hide();
                                $(".type_of_business_ans").hide();
                                $("#fire_table").empty();
                                $("#fire_table").append(term_plan_policy_header);
                                var shopkeeper_policy_data_arr = data["userdata"].shopkeeper_policy_data_arr;

                                edit_shopkeeper(shopkeeper_policy_data_arr);
                            }
                        } else if (data["userdata"].policy_type_title == "Jweller Block") {
                            if (data["userdata"].policy_type != 3) {
                                var term_plan_policy_data_arr = data["userdata"].term_plan_policy_data_arr;
                                var term_plan_policy_header = '<table class="table mb-0 table-bordered"><tdead> <tr><td>Section No.</td><td>Section Name</td><td>Particulars</td><td>Sum Insured</td><td>Premium</td></tr></tdead><tr> <td colspan="" rowspan="6" width="8%"><strong>1</strong></td> <td colspan="" rowspan="6" width="11%"><strong>Stock in Premises</strong></td><td width="44%"><table><tr><td>A. Stock and Stock in Trade on Premises<br /><br /></td> </tr><tr><td>B. Stock and Stock in Trade kept Outside Safe within Premises after Business Hours<br /></td></tr><tr><td>C. Cash and Currency Notes on Premises<br /><br /></td> </tr><tr><td>D. Stock and Stock in Trade in Vaults and Bank Lockers outside Premises <br /><br /></td> </tr><tr><td>Optional Cover: Medical Expenses (Max AOA : AOY Limit = 25000 : 100000)<br /><br /></td></tr><tr><td>Optional Cover: Boiling Casting<br /><br /></td></tr></table></td><td width="21%"><table><tr><td><strong id="stock_premises_sum_insu_1"></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br /></td></tr><tr><td><strong id="stock_premises_sum_insu_2"></strong><br /><br /></td> </tr> <tr><td><strong id="stock_premises_sum_insu_3"></strong><br /><br /></td></tr><tr><td><strong id="stock_premises_sum_insu_4"></strong><br /><br /></td> </tr><tr><td><strong id="stock_premises_sum_insu_5"></strong><br /><br /></td></tr><tr> <td><strong id="stock_premises_sum_insu_6"></strong><br /><br /></td></tr></table></td><td><table><tr> <td rowspan=""><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><strong id="stock_premises_premium_1"></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr><tr><td><strong id="stock_premises_premium_2"></strong><br /><br /></td></tr> </table></td></tr></table> <table class="table mb-0 table-bordered"> <tr><td colspan="" rowspan="6" width="8%"><strong>2</strong></td><td colspan="" rowspan="6" width="11%"><strong>Stock in Custody</strong></td><td width="44%"><table><tr><td>A. Property Insured whilst in the custody of Director(s), Employee(s) including contract employee(s), Partner(s), Duly Constituted Attorney(s) and Consultant(s) and such other authorized persons of yours</td></tr><tr> <td>B. Property insured whilst in the custody of Cutter(s), Broker(s), Agent(s), Gold smith(s), Dealer(s), Client(s), Job worker(s), Contractor(s), Sub-Contractor(s) and other such entities including the employee(s) of the above, whether or not in regular employment of yours</td> </tr><tr><td>Optional Cover:First Buy Cover (Place(s) of first Purchase to be mentioned)</td> </tr> <tr><td>Optional Cover: Deemed Exports/ Imports</td> </tr> </table> </td> <td width="21%"><table><tr> <td><br /><strong id="stock_custody_sum_insu_1"></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br /></td></tr><tr><td><br /><strong id="stock_custody_sum_insu_2"></strong><br /><br /><br /></td></tr><tr><td><strong id="stock_custody_sum_insu_3"></strong><br /></td></tr><tr><td><strong id="stock_custody_sum_insu_4"></strong><br /></td></tr> </tr> </table> </td><td><table> <tr><td rowspan=""><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><strong id="stock_custody_premium_1"></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> </tr><tr><td><strong id="stock_custody_premium_2"></strong></td></tr></table></td> </tr></table><table class="table mb-0 table-bordered"> <tr><td colspan="" rowspan="6" width="8%"><strong>3</strong></td><td colspan="" rowspan="6" width="11%"><strong>Stock in Transit</strong></td><td width="44%"><table><tr><td>Registered Post&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br /></td></tr> <tr><td>Air Transit<br /><br /></td></tr> <tr> <td>Angadia<br /><br /></td> </tr><tr>  <td>Courier<br /></td> </tr>  </table></td> <td width="21%"><table><tr><td><strong id="stock_transit_sum_insu_1"></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br /></td></tr><tr> <td><strong id="stock_transit_sum_insu_2"></strong><br /><br /></td> </tr><tr><td><strong id="stock_transit_sum_insu_3"></strong><br /><br /></td></tr><tr> <td><strong id="stock_transit_sum_insu_4"></strong></td></tr></tr></table> </td> <td><table><tr><td rowspan=""><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><strong id="stock_transit_premium"></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr></table></td></tr></table><table class="table mb-0 table-bordered"><tr><td colspan="" rowspan="6" width="8%"><strong>4A</strong></td><td colspan="" rowspan="6" width="11%"><strong>Standard Fire & Special Perils</strong></td>  <td width="44%"> <table><tr><td>Building (Sum Insured on Reinstatement Value Basis)<br /><br /></td></tr>  <tr><td>Contents excluding Furniture, Fixtures, Fittings and Chandelier (Sum Insured on Market Value Basis)<br /></td> </tr> <tr><td>Furniture, Fixtures and Fittings (Sum Insured on Reinstatement Value Basis)<br /><br /></td>  </tr>  <tr><td>Chandelier (Sum Insured on Market Value Basis)<br /><br /></td> </tr><tr><td>Optional Cover: Chandelier (Accidental damage)<br /><br /></td></tr><tr> <td>Optional Cover: Business Interuption<br /><br /></td>  </tr></table> </td> <td width="21%"><table><tr><td><strong id="standard_fire_perils_1"></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br /></td> </tr><tr> <td><strong id="standard_fire_perils_2"></strong><br /><br /></td> </tr><tr><td><strong id="standard_fire_perils_3"></strong><br /><br /></td></tr> <tr> <td><strong id="standard_fire_perils_4"></strong><br /><br /></td>  </tr><tr>  <td><strong id="standard_fire_perils_5"></strong><br /><br /></td></tr><tr><td><strong id="standard_fire_perils_6"></strong></td> </tr></table> </td> <td><table> <tr><td rowspan=""><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><strong id="standard_fire_perils_premium_1"></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>  <tr> <td><br /><strong id="standard_fire_perils_premium_2"></strong></td></tr><tr><td><br /><strong id="standard_fire_perils_premium_3"></strong></td></tr></table> </td></tr></table> <table class="table mb-0 table-bordered"> <tr><td colspan="" rowspan="6" width="8%"><strong>4B</strong></td><td colspan="" rowspan="6" width="11%"><strong>Content: Burglary</strong></td><td width="44%">First Loss Basis</td><td width="21%"><strong id="content_burglary_sum_insu"></strong></td><td><strong id="content_burglary_premium"></strong></td> </tr></table><table class="table mb-0 table-bordered"><tr><td colspan="" rowspan="6" width="8%"><strong>5</strong></td> <td colspan="" rowspan="6" width="11%"><strong>Stock in Exhibition</strong></td><td width="44%">Any One Loss Limit Basis</td><td width="21%"><strong id="stock_exhibition_sum_insu"></strong></td><td><strong id="stock_exhibition_premium"></strong></td></tr></table><table class="table mb-0 table-bordered"><tr><td colspan="" rowspan="6" width="8%"><strong>6</strong></td><td colspan="" rowspan="6" width="11%"><strong>Fidelity Guarantee Cover</strong></td><td width="44%"><table id="fidelity_gaur"> <tdead><tr><td>Name</td><td>D.O.B</td><td>Designation</td><td>Sum Insured</td></tr></tdead><tbody id="append_fidelity_guar_cover"></tbody></table></td><td width="21%"><strong id="fidelity_guar_cover_sum_insu_1"></strong></td><td> <strong id="fidelity_guar_cover_premium_1"></strong></td></tr></table><table class="table mb-0 table-bordered"><tr><td colspan="" rowspan="6" width="8%"><strong>7</strong></td><td colspan="" rowspan="6" width="11%"><strong>Plate Glass</strong></td><td width="44%"></td><td width="21%"><strong id="plate_glass_sum_insu"></strong></td><td><strong id="plate_glass_premium"></strong></td></tr></table><table class="table mb-0 table-bordered"><tr><td colspan="" rowspan="6" width="8%"><strong>8</strong></td><td colspan="" rowspan="6" width="11%"><strong>Neon Sign</strong></td><td width="44%"></td> <td width="21%"><strong id="neon_sign_sum_insu"></strong></td><td><strong id="neon_sign_premium"></strong></td></tr></table><table class="table mb-0 table-bordered"><tr><td colspan="" rowspan="6" width="8%"><strong>9</strong></td><td colspan="" rowspan="6" width="11%"><strong>Portable Equipmets</strong></td> <td width="44%">Outside India</td> <td width="21%"><strong id="portable_equipmets_sum_insu"></strong></td> <td><strong id="portable_equipmets_premium"></strong></td></tr> </table><table class="table mb-0 table-bordered"> <tr><td colspan="" rowspan="6" width="8%"><strong>10</strong></td><td colspan="" rowspan="6" width="11%"><strong>Employee Compensation</strong></td><td width="44%"><table><tr><td>Retail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br /></td></tr><tr><td>Wholesale & Manufacturing</td> </tr></table></td><td width="21%"><table><tr><td><strong id="employee_compensation_sum_insu_1"></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr><tr> <td><strong id="employee_compensation_sum_insu_2"></strong></td> </tr></table> </td><td> <br /><br /><strong id="employee_compensation_premium"></strong></td></tr></table> <table class="table mb-0 table-bordered"><tr><td colspan="" rowspan="6" width="8%"><strong>11</strong></td><td colspan="" rowspan="6" width="11%"><strong>Electronic Equipment</strong></td><td width="44%"></td><td width="21%"><strong id="electronic_equipment_sum_insu"></strong></td><td><strong id="electronic_equipment_premium"></strong></td> </tr></table><table class="table mb-0 table-bordered"> <tr><td colspan="" rowspan="6" width="8%"><strong>12</strong></td><td colspan="" rowspan="6" width="11%"><strong>Public Liability</strong></td><td width="44%"></td><td width="21%"><strong id="public_liability_sum_insu"></strong></td><td><strong id="public_liability_premium"></strong></td></tr></table><table class="table mb-0 table-bordered"><tr><td colspan="" rowspan="6" width="8%"><strong>13</strong></td> <td colspan="" rowspan="6" width="11%"><strong>Money in Transit</strong></td> <td width="44%"></td><td width="21%"><strong id="money_transit_sum_insu"></strong></td><td><strong id="money_transit_premium"></strong></td></tr></table> <table class="table mb-0 table-bordered"> <tr><td colspan="" rowspan="6" width="8%"><strong>14</strong></td><td colspan="" rowspan="6" width="11%"><strong>Machinery Breakdown</strong></td><td width="44%"></td><td width="21%"><strong id="machinery_breakdown_sum_insu"></strong></td><td><strong id="machinery_breakdown_premium"></strong></td></tr></table><table class="table mb-0 table-bordered"> <tr> <td colspan="" rowspan="6" width="8%"><strong>Base Premium</strong></td><td width="44%"> <table><tr><td>Net Premium Without Terrorism&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /></td></tr><tr><br /><td>Discount<br /></td> </tr><tr><td>Net Premium without Terrorism After Commercial Discount</td></tr></table> </td><td><table><tr><td><br /><br /><br /><strong id="jweller_less_discount"></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br /></td> </tr></table></td><td><table><tr><td><br /><strong id="jweller_total_sum_assured"></strong></td></tr><tr><td><strong id="jweller_less_discount_tot"></strong></td></tr><tr> <td><strong id="jweller_after_discount_tot"></strong></td> </tr></table></td> </tr></table> <table class="table mb-0 table-bordered"> <tr><td colspan="" rowspan="6" width="8%"><strong>Terrorism Cover</strong></td><td width="44%"><table><tr><td>Optional Cover: Terrorism Cover for Section 1, 4A & 4B & 11&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr><tr><td>Total Net Premium including Terrorism</td></tr> </table></td><td> <table><tr> <td><strong id="jweller_terrorism_per"></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br /></td></tr></table> </td><td><table><tr><td><strong id="jweller_terrorism_per_tot"></strong><br /><br /></td></tr><tr><td><strong id="jweller_tot_net_premium"></strong></td> </tr></table></td></tr></table><table class="table mb-0 table-bordered"><tr> <td colspan="" rowspan="6" width="8%"><strong>GST</strong></td><td width="44%"> <table> <tr><td>CGST&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br /></td></tr> <tr><td>SGST<br /></td></tr><tr> <td><strong class="text-purple"><br /><br />Final Premium</strong></td> </tr> </table></td><td> <table> <tr> <td><br /><strong id="cgst_fire_per"></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> </tr> <tr><td><br /><strong id="sgst_fire_per"></strong></td></tr> </table> </td><td> <table><tr><td><br /><strong id="jweller_cgst_per_tot"></strong></td></tr><tr><td><br /><strong id="jweller_sgst_per_tot"></strong></td></tr><tr> <td><br /><strong id="jweller_final_payble" class="text-purple"></strong> </td></tr></table></td> </tr> </table>';
                                // alert(term_plan_policy_header)
                                $(".type_of_business").hide();
                                $(".type_of_business_ans").hide();
                                $("#fire_table").empty();
                                $("#fire_table").append(term_plan_policy_header);
                                var jweller_policy_data_arr = data["userdata"].jweller_policy_data_arr;

                                edit_jweller_block(jweller_policy_data_arr);
                            }
                        } else if (data["userdata"].policy_type_title == "Open Policy" || data["userdata"].policy_type_title == "Stop Policy" || data["userdata"].policy_type_title == "Specific Policy") {
                            var term_plan_policy_header = '<table class="table mb-0 table-bordered col-md-12"><tr id="from_destination_tr"><td colspan=""><strong>From Destination: </strong></td><td><strong id="from_destination"></strong></td></tr><tr id="to_destination_tr"><td colspan=""><strong>To Destination: </strong></td><td><strong id="to_destination"></strong></td></tr><tr><td width="45%"><strong id="policy_title"> Stop Marine Policy Insured : </strong></td><td><strong id="group_name_company"></strong></td></tr><tr><td colspan=""><strong>Coverage Type: </strong></td><td><strong id="coverage_type"></strong></td></tr><tr><td colspan=""><strong>Description: </strong></td><td><strong id="marine_description"></strong></td></tr> <tr><td><strong>Interest Insured: </strong></td><td><strong id="interest_insured"></strong></td></tr><tr><td><strong>Period Of Insurance: </strong></td> <td><strong id="period_of_insurance"></strong></td> </tr><tr><td colspan=""><strong>Office / Correspondence Address: </strong></td><td><strong id="group_name_address"></strong></td></tr><tr><td colspan=""><strong>Sum Insured: </strong></td><td><strong id="marine_sum_insured"></strong></td></tr><tr><td><strong>Packing:</strong></td><td><strong id="packing_stand_customary"> </strong></td></tr><tr><td><strong><u>Marine Conveyance Coverage</u></strong></td><td><table id="marine_convey_c"><tdead><tr><td>SN</td><td>Details</td></tr></tdead> <tbody id="append_marine_cc"></tbody> </table><div id="plus_btn"></div> </td></tr><tr id="business_description_tr"><td colspan=""><strong>Business Description: </strong></td> <td><strong id="business_description"></strong></td> </tr><tr id="voyage_domestic_purchase_tr"><td colspan=""><strong><u>Voyage:</u> <br /> Domestic Purchase: </strong></td><td><strong id="voyage_domestic_purchase"></strong></td></tr><tr id="voyage_international_purchase_tr"><td colspan=""><strong>International Purchase: </strong></td><td><strong id="voyage_international_purchase"></strong></td></tr><tr id="voyage_domestic_sales_tr"><td colspan=""><strong>Domestic Sales: </strong></td><td><strong id="voyage_domestic_sales"></strong></td></tr><tr id="voyage_export_sales_tr"><td colspan=""><strong>Export Sales: </strong></td> <td><strong id="voyage_export_sales"></strong></td></tr><tr id="voyage_job_worker_tr"><td colspan=""><strong>Job / Printer / Washer Etc.. Worker: </strong></td><td><strong id="voyage_job_worker"></strong></td></tr> <tr id="voyage_domestic_fini_good_tr"><td colspan=""><strong>Domestic Finished Goods: </strong></td> <td><strong id="voyage_domestic_fini_good"></strong></td></tr><tr id="voyage_export_fini_good_tr"><td colspan=""><strong>Export Finished Goods: </strong></td> <td><strong id="voyage_export_fini_good"></strong></td></tr><tr id="voyage_domestic_purch_return_tr"><td colspan=""><strong>Domestic Purchase Return: </strong></td><td><strong id="voyage_domestic_purch_return"></strong></td> </tr> <tr id="voyage_export_purch_return_tr"><td colspan=""><strong>Export Purchase Return: </strong></td> <td><strong id="voyage_export_purch_return"></strong></td></tr> <tr id="voyage_sales_return_tr"><td colspan=""><strong>Sale’s Return: </strong></td><td><strong id="voyage_sales_return"></strong></td></tr> <tr id="domestic_purch_tr"><td colspan=""><strong>Domestic Purchase: </strong></td> <td><strong id="domestic_purch"></strong></td> </tr><tr id="international_purch_tr"><td colspan=""><strong>International Purchase: </strong></td><td><strong id="international_purch"></strong></td></tr> <tr id="domestic_sale_tr"> <td colspan=""><strong>Domestic Sale:</strong></td> <td><strong id="domestic_sale"></strong></td> </tr><tr id="export_sale_tr"><td colspan=""><strong>Export Sale: </strong></td><td><strong id="export_sale"></strong></td> </tr><tr id="per_bottom_limit_tr"><td colspan=""><strong>Per Bottom Limit:</strong></td><td><strong id="per_bottom_limit"></strong></td></tr><tr id="per_location_limit_tr"><td colspan=""><strong>Per Location Limit:</strong></td> <td><strong id="per_location_limit"></strong></td></tr><tr id="per_claim_excess_tr"><td colspan=""><strong>Per Claim Excess:</strong></td><td><strong id="per_claim_excess"></strong></td></tr> </table> <table class="table mb-0 table-bordered mt-2 col-md-12"><tr id="declaration_sale_fig_tr"><td colspn="2"><strong> Declaration of Sales Figure: </strong></td><td colspn="2"><strong></strong></td><td><strong id="declaration_sale_fig"></strong></td></tr> <tr id="annual_turn_over_tr"><td colspn="2"><strong> Annual Turn Over: </strong></td><td colspn="2"><strong></strong></td> <td><strong id="annual_turn_over"></td> </tr><tr id="tot_sum_insured_tr"> <td colspn="2"><strong> Sum Insured: </strong></td><td colspn="2"><strong></strong></td><td><strong id="tot_sum_insured"></strong></td></tr><tr><td colspn="2"><strong> Rate Applied Per Rs.100</strong></td><td colspn="2"><strong></strong></td><td><strong id="rate_applied"></strong></td></tr><tr> <td><strong> CGST</strong></td><td><strong id="cgst_fire_per"></strong></td><td><strong id="cgst_rate_tot"></strong></td></tr> <tr><td><strong> SGST</strong></td><td><strong id="sgst_fire_per"></strong></td> <td><strong id="sgst_rate_tot"></strong></td></tr><tr><td colspn="2"><strong class="text-purple">Final Payable Premium</strong></td><td colspn="2"><strong></strong></td><td><strong id="marine_final_payble_premium"></strong></td> </tr> </table>';
                            // alert(term_plan_policy_header)
                            $(".type_of_business").hide();
                            $(".type_of_business_ans").hide();
                            $("#fire_table").empty();
                            $("#fire_table").append(term_plan_policy_header);
                            if (data["userdata"].policy_type != 3) {

                                if (data["userdata"].policy_type_title == "Open Policy") {

                                    $("#from_destination_tr").hide();
                                    $("#to_destination_tr").hide();
                                    $("#policy_title").text("");
                                    $("#policy_title").text("Open Marine Policy Insured :");
                                } else if (data["userdata"].policy_type_title == "Stop Policy") {
                                    $("#from_destination_tr").hide();
                                    $("#to_destination_tr").hide();
                                    $("#policy_title").text("");
                                    $("#policy_title").text("Stop Marine Policy Insured :");
                                } else if (data["userdata"].policy_type_title == "Specific Policy") {
                                    $("#from_destination_tr").show();
                                    $("#to_destination_tr").show();

                                    $("#business_description_tr").hide();
                                    $("#voyage_domestic_purchase_tr").hide();
                                    $("#voyage_international_purchase_tr").hide();
                                    $("#voyage_domestic_sales_tr").hide();
                                    $("#voyage_export_sales_tr").hide();
                                    $("#voyage_job_worker_tr").hide();
                                    $("#voyage_domestic_fini_good_tr").hide();
                                    $("#voyage_export_fini_good_tr").hide();
                                    $("#voyage_domestic_purch_return_tr").hide();
                                    $("#voyage_export_purch_return_tr").hide();
                                    $("#voyage_sales_return_tr").hide();
                                    $("#domestic_purch_tr").hide();
                                    $("#international_purch_tr").hide();
                                    $("#domestic_sale_tr").hide();
                                    $("#export_sale_tr").hide();
                                    $("#per_bottom_limit_tr").hide();
                                    $("#per_location_limit_tr").hide();
                                    $("#per_claim_excess_tr").hide();
                                    $("#declaration_sale_fig_tr").hide();
                                    $("#annual_turn_over_tr").hide();

                                    $("#policy_title").text("");
                                    $("#policy_title").text("Specific Marine Policy Insured :");
                                }
                                var marine_policy_data_arr = data["userdata"].marine_policy_data_arr;
                                var date_from = data["userdata"].date_from;
                                var date_to = data["userdata"].date_to;
                                $("#group_name_company").text(data["userdata"].member_name.charAt(0).toUpperCase() + data["userdata"].member_name.slice(1));
                                if (data["userdata"].policy_type_title == "Specific Policy") {
                                    var img_newDate = new Date(date_from);
                                    var lastDay = new Date(img_newDate.getFullYear(), img_newDate.getMonth() + 1, 0).toLocaleDateString('en-CA');
                                    $("#period_of_insurance").text(date_from + " To " + lastDay);
                                } else {
                                    $("#period_of_insurance").text(date_from + " To " + date_to);
                                }
                                edit_marine_policy(marine_policy_data_arr);
                            }
                        } else if (data["userdata"].policy_type_title == "GMC") {
                            if (data["userdata"].policy_type != 3) {
                                var term_plan_policy_header = "<tr><td><b>Kindly mail us New Active list of Employee to Provide Renewal Quatation.</b></<td></tr>";
                                $(".type_of_business").hide();
                                $(".type_of_business_ans").hide();
                                $("#fire_table").empty();
                                $("#fire_table").append(term_plan_policy_header);
                                if (data["userdata"].policy_type == 1 || data["userdata"].policy_type == 2 || data["userdata"].policy_type == 4 || data["userdata"].policy_type == 5) {

                                    if (policy_type_title == "GMC" || policy_type_title == "GPA") {
                                        $("#gmc_family_size_div").show();
                                    } else {
                                        $("#gmc_family_size_div").hide();
                                    }
                                    var gmc_ind_data_arr = data["userdata"].gmc_ind_data_arr;

                                    edit_GMC(gmc_ind_data_arr);
                                }
                            }
                        } else if (data["userdata"].policy_type_title == "GPA") {
                            if (data["userdata"].policy_type != 3) {
                                var term_plan_policy_header = "<tr><td><b>Kindly mail us New Active list of Employee to Provide Renewal Quatation.</b></<td></tr>";
                                $(".type_of_business").hide();
                                $(".type_of_business_ans").hide();
                                $("#fire_table").empty();
                                $("#fire_table").append(term_plan_policy_header);
                                if (data["userdata"].policy_type == 1 || data["userdata"].policy_type == 2 || data["userdata"].policy_type == 4 || data["userdata"].policy_type == 5) {
                                    if (policy_type_title == "GMC" || policy_type_title == "GPA") {
                                        $("#gmc_family_size_div").show();
                                    } else {
                                        $("#gmc_family_size_div").hide();
                                    }
                                    var gpa_ind_data_arr = data["userdata"].gpa_ind_data_arr;

                                    edit_GPA(gpa_ind_data_arr);
                                }
                            }
                        } else if (data["userdata"].policy_type_title == "Private Car") {
                            if (data["userdata"].policy_type != 3) {

                                if (data["userdata"].policy_type == 1 || data["userdata"].policy_type == 2) {
                                    var term_plan_policy_header = '<style>table {border-collapse: collapse; border-spacing: 0;width: 100%;border: 1px solid #ddd; }  th,td {text-align: left; padding: 8px;}</style><table><tr><td colspan="4">Private Car Calculator : </td></tr><tr><td>Vehicle Make & Model : </td><td><strong id="vehicle_make_model"></strong></td><td >Vehicle Reg. No : </td><td><strong id="vehicle_reg_no"></strong></td></tr><tr><td colspan="4"><center class="font-weight-bold">Private Car Calculator</center></td></tr><tr><td colspan="4"><center class="font-weight-bold">Comprehensive Comprehensive Policy(Own Damage + Third Party)</br />Basic Details of the Vehicle</center></td></tr></table><table><tr><td><table class="table mb-0 table-bordered" id=""><tbody><tr><td>Insured Declared Value - IDV</td><td></td><td><strong id="insu_declared_val"></strong></td></tr><tr><td>Non-Electrical Accessories Value</td> <td></td> <td><strong id="non_elect_access_val"></strong></td> </tr> <tr><td>Electrical Accessories Value</td> <td></td><td><strong id="elect_access_val"></strong></td></tr><tr><td>LPG / CNG IDV if inbuilt IDV is not required</td><td> </td> <td><strong id="lpg_cng_idv_val"></strong></td></tr><tr><td>Trailer</td><td></td><td><strong id="trailer_val"></strong></td></tr><tr><td class="font-weight-bold">Private Car Type</td><td class="font-weight-bold" colspan="2">Private Car 4 Wheeler Normal</td> </tr> </tbody></table></td><td><table class="table mb-0 table-bordered" id=""> <tbody><tr><td colspan="3">Year Of Manufactur</td><td><strong id="year_manufact_val"></strong></td></tr> <tr><td>RTA - Code</td> <td><strong id="rta_city_code"></strong></td><td><strong id="rta_city"></strong></td><td><strong id="rta_city_cat"></strong></td> </tr><tr><td colspan="3">Cubic Capacity</td> <td><strong id="cubic_capacity_val"></strong></td></tr><tr><td style="height:63px;">Calculation Method</td><td> <strong id="calculation_method"></strong> </td><td>Type of Cover</td><td> <strong id="type_of_cover"></strong></td></tr> <tr> <td>Previous Policy Expiry Date</td><td>Policy Period</td> <td>Inception Date</td> <td>Expiry Date</td></tr><tr> <td><strong id="prev_policy_expiry_date"></strong></td><td><strong id="policy_period"></strong></td><td><strong id="inception_date"></strong></td> <td><strong id="expiry_date"></strong></td> </tr> </tbody>  </table></td></tr></table><table><tr><td><center class="font-weight-bold">Premium Calculation</center></td></tr></table><table><tr><td> <table class="table mb-0 table-bordered" id=""><tbody><tr>  <td colspan="3" class="font-weight-bold">  <center>Own Damage Premium (OD)</center> </td> </tr> <tr>   <td>Basic OD</td><td></td> <td><strong id="od_basic_od_tot"></strong></td> </tr> <tr> <td>Special Discount</td> <td><strong id="od_special_disc_per"></strong></td>    <td><strong id="od_special_disc_tot"></strong></td> </tr> <tr> <td>Special Loading</td> <td><strong id="od_special_load_per"></strong></td> <td><strong id="od_special_load_tot"></strong></td> </tr> <tr> <td>Net Basic OD</td> <td></td><td><strong id="od_net_basic_od_tot"></strong></td></tr> <tr> <td>Non-Elec Accessories</td> <td></td><td><strong id="od_non_elec_acc_tot"></strong></td> </tr> <tr><td>Elec Accessories</td><td></td> <td><strong id="od_elec_acc_tot"></strong></td></tr> <tr>  <td>Bi-Fuel Kit</td> <td></td> <td><strong id="od_bi_fuel_kit_tot"></strong></td> </tr><tr> <td class="font-weight-bold">Basic OD1</td><td></td>  <td><strong id="od_od_basic_od1_tot"></strong></td> </tr>  <tr> <td>Trailer</td><td></td>  <td><strong id="od_trailer_tot"></strong></td> </tr><tr><td>Geographical Area</td><td></td><td><strong id="od_geographical_area_tot"></strong></td></tr><tr>  <td>Embassy Loading</td> <td></td>      <td><strong id="od_embassy_load_tot"></strong></td></tr>  <tr><td>Fibre Glass Tank</td><td></td><td><strong id="od_fibre_glass_tank_tot"></strong></td></tr> <tr> <td>Driving Tuitions</td><td></td>  <td><strong id="od_driving_tut_tot"></strong></td> </tr> <tr> <td>Rallies (No of Days)</td> <td></td>  <td><strong id="od_rallies_tot"></strong></td></tr> <tr> <td class="font-weight-bold">Basic OD2</td> <td></td>  <td><strong id="od_basic_od2_tot"></strong> </td> </tr>  <tr> <td class="font-weight-bold">Discounts</td> <td></td><td></td></tr> <tr> <td>Anti Theft</td> <td></td> <td><strong id="od_anti_tot"></strong></td></tr>  <tr><td>Handicap</td> <td></td> <td><strong id="od_handicap_tot"></strong></td> </tr>  <tr><td>AAI</td><td></td> <td><strong id="od_aai_tot"></strong></td></tr><tr><td>Vintage Car</td> <td></td><td><strong id="od_vintage_tot"></strong></td></tr><tr><td>Own Premises</td><td></td><td><strong id="od_own_premises_tot"></strong></td> </tr><tr><td>Voluntary Deductiable</td> <td></td><td><strong id="od_voluntary_deduc_tot"></strong></td></tr><tr><td class="font-weight-bold">Basic OD3</td><td></td> <td><strong id="od_basic_od3_tot"></strong></td></tr> <tr><td>NCB</td><td><strong id="od_ncb_per"></strong></td> <td><strong id="od_ncb_tot"></strong></td></tr><tr> <td class="text-purple font-weight-bold">Total Anual OD Premium</td> <td></td><td><strong id="od_tot_anual_od_premium"></strong></td></tr> <tr><td colspan="2" class="text-purple font-weight-bold">Total OD Premium for the Policy Period</td><td><strong id="od_tot_od_premium_policy_period"></strong></td></tr></tbody></table></td><td> <table class="table mb-0 table-bordered" id=""> <tbody> <tr><td colspan="3" class="font-weight-bold"><center>Third Party Premium (TP)</center></td></tr> <tr> <td>Basic TP</td> <td></td> <td><strong id="tp_basic_tp_tot"></strong></td> </tr> <tr><td>Restricted TPPD</td> <td></td> <td><strong id="tp_restr_tppd"></strong></td></tr> <tr> <td>Trailer</td> <td></td><td><strong id="tp_trailer_tot"></strong></td></tr> <tr> <td style="height:61px;">Bi-Fuel Kit</td> <td></td> <td><strong id="tp_bi_fuel_tot"></strong></td>   </tr><tr> <td class="font-weight-bold">Basic TP1</td> <td></td><td><strong id="tp_basic_tp1_tot"></strong></td>  </tr> <tr><td>Compulsory PA Own/Driver</td><td></td> <td><strong id="tp_compul_own_driv_tot"></strong></td> </tr> <tr> <td>Geographical Area</td>  <td></td><td><strong id="tp_geographical_area_tot"></strong></td> </tr>  <tr><td>Unnamed PA Pax</td><td></td> <td><strong id="tp_unnamed_papax_tot"></strong></td></tr> <tr> <td>No of Seats/Limit Per Person</td>    <td></td> <td><strong id="tp_no_seats_limit_person_tot"></strong></td> </tr> <tr> <td>LL Drv/Emp</td>  <td></td><td><strong id="tp_ll_drv_emp_tot"></strong></td> </tr> <tr> <td>No of Drv/Emp</td><td></td><td><strong id="tp_no_drv_emp_tot"></strong></td> </tr><tr><td>LL to Defence</td>  <td></td> <td><strong id="tp_ll_defe_tot"></td></tr> <tr> <td>No of Persons</td><td></td><td><strong id="tp_noof_person_tot"></strong></td></tr><tr><td>PA Paid Drv</td> <td></td><td><strong id="tp_pa_paid_drv_tot"></strong></td></tr> <tr> <td class="font-weight-bold">Basic Tp2</td><td></td><td><strong id="tp_basic_tp2_tot"></strong></td> </tr> <tr><td class="font-weight-bold text-purple">Total Anual TP Premium</td> <td></td> <td><strong id="tp_tot_anual_tp_premium"></strong></td></tr> <tr><td class="font-weight-bold text-purple">Total TP Premium for the Policy Period</td> <td></td><td><strong id="tp_tot_premium_policy_period"></strong></td></tr> <tr> <td colspan="3" class="font-weight-bold"><center>ADD On Covers Premium</center> </td> </tr><tr> <td class="font-weight-bold">Add On Covers</td><td class="font-weight-bold">Rate</td><td></td> </tr> <tr>  <td> <div class="row"> <div class="col-md-4">Plan</div> <div class="col-md-8"> <strong id="plan_name"></strong></div></div></td> <td></td> <td><strong id="plan_name_tot"></strong></td> </tr> <tr> <td>Other Covers</td><td></td><td></td> </tr> <tr> <td colspan="3"> <table> <tbody id="first_table_tbody"></tbody> </table></td></tr> <tr> <td class="font-weight-bold text-purple">Total Anual Add On Cover Premium</td> <td></td> <td><strong id="tot_anual_cover_premium"></strong></td> </tr> <tr> <td class="font-weight-bold text-purple">Total Add On Cover Premium for the Policy Period</td> <td></td> <td><strong id="tot_cover_premium_period"></strong></td></tr> </tbody></table> </td></tr></table> <table><tr><td><table class="table mb-0 table-bordered" id=""><tbody> <tr> <td colspan="3">Premium Posting</td></tr><tr><td>Total Premium</td><td></td><td><strong id="tot_premium"></strong></td> </tr> <tr> <td colspn=""><strong> CGST:</strong></td><td><strong id="cgst_fire_per"></strong></td> <td><strong id="motor_cgst_tot"></strong></td> </tr> <tr> <td><strong> SGST</strong></td> <td><strong id="sgst_fire_per"></strong></td> <td><strong id="motor_sgst_tot"></strong></td></tr>  <tr><td class="text-purple font-weight-bold">Total Payable</td><td></td><td><strong id="tot_payable_premium"></strong> </td> </tr></tbody></table></td></tr></table>';
                                    $(".type_of_business").hide();
                                    $(".type_of_business_ans").hide();
                                    $("#fire_table").empty();
                                    $("#fire_table").append(term_plan_policy_header);

                                    var private_car_data_arr = data["userdata"].private_car_data_arr;
                                    edit_motor_private_car(private_car_data_arr);
                                }
                            }
                        } else if (data["userdata"].policy_type_title == "2 Wheeler") {
                            if (data["userdata"].policy_type != 3) {

                                if (data["userdata"].policy_type == 1 || data["userdata"].policy_type == 2) {
                                    var motor_2_wheeler_data_arr = data["userdata"].motor_2_wheeler_data_arr;
                                    var term_plan_policy_header = '<style>table {border-collapse: collapse; border-spacing: 0;width: 100%;border: 1px solid #ddd; }  th,td {text-align: left; padding: 8px;}</style><table class="table mb-0 table-bordered" id=""><tbody><tr><td colspan="2">Two Wheeler Calculator : </td> </tr><tr><td>Vehicle Make & Model : </td><td><strong id="vehicle_make_model"></strong></td> <td>Vehicle Reg. No : </td><td><strong id="vehicle_reg_no"></strong></td></tr></tbody></table> <table class="table mb-0 table-bordered" id=""><tbody><tr><td> <center class="font-weight-bold">Two Wheeler Calculator (w.e.f 01/07/2002)</center>  </td></tr> <tr><td><center class="font-weight-bold">Basic Details of the Vehicle</center></td></tr></tbody></table><table><tr><td><table class="table mb-0 table-bordered" id=""> <tbody><tr><td>Insured Declared Value</td><td></td> <td><strong id="insu_declared_val"></strong></td></tr><tr> <td>Elec Acc Value</td><td></td><td><strong id="elect_acc_val"></strong></td></tr><tr> <td>Other Than Elect Accessories</td><td></td> <td><strong id="other_elect_acc_val"></strong></td></tr><tr><td colspan="2">Policy Period (Tenure In Years)</td><td><strong id="policy_period_tenure_years"></strong></td> </tr><tr><td></td> <td></td><td rowspan="2"> </td></tr><tr> <td>Previous Policy Expiry Date & Tenure</td> <td><strong id="previous_policy_expiry_date_tenur"></strong></td> </tr></tbody></table> </td><td ><table class="table mb-0 table-bordered" id=""><tbody>  <tr> <td colspan="3">Year Of Manufactur</td><td><strong id="year_manufact_val"></strong></td></tr><tr><td>RTA</td><td><strong id="rta_city_code"></strong></td><td><strong id="rta_city"></strong></td><td><strong id="rta_city_cat"></strong></td></tr><tr> <td colspan="3">Cubic Capacity</td> <td><strong id="cubic_capacity_val"></strong></td></tr>  <tr><td colspan="3">Type of Cover</td><td> <strong id="type_of_cover"></strong></td></tr><tr><td colspan="2">Policy Period</td> <td>Inception Date</td><td>Expiry Date</td></tr> <tr><td colspan="2"><strong id="policy_period"></strong></td><td><strong id="inception_date"></strong></td><td><strong id="expiry_date"></strong></td> </tr>  </tbody></table></td></tr></table><table><tr><td colspan="2"><table class="table mb-0 table-bordered" id=""><tbody><tr><td > <center class="font-weight-bold">Premium Calculation</center></td></tr></tbody></table></td></tr><tr><td><table class="table mb-0 table-bordered" id=""><tbody> <tr><td colspan="3" class="font-weight-bold"><center>OD Calculation</center></td></tr><tr><td>Basic OD</td><td></td><td><strong id="od_basic_od_tot"></strong></td></tr><tr><td>Special Discount</td><td><strong id="od_special_disc_per"></strong></td> <td><strong id="od_special_disc_tot"></strong></td></tr><tr><td>Special Loading</td><td><strong id="od_special_load_per"></strong></td><td><strong id="od_special_load_tot"></strong></td></tr><tr><td>Net Basic OD</td><td></td><td><strong id="od_net_basic_od_tot"></strong></td></tr><tr><td>Elec Acc</td><td></td><td><strong id="od_elec_acc_tot"></strong></td></tr> <tr><td>Other Than Elec Acc</td><td></td><td><strong id="od_other_elec_acc_tot"></strong></td> </tr><tr><td class="font-weight-bold">Basic OD1</td><td></td><td><strong id="od_od_basic_od1_tot"></strong></td> </tr><tr><td>Geographical Area</td><td></td><td><strong id="od_geographical_area_tot"></strong></td> </tr><tr> <td>Rallies (No Of Days)</td><td></td><td><strong id="od_rallies_tot"></strong></td></tr><tr><td>Embassy Loading</td><td></td><td><strong id="od_embassy_load_tot"></strong></td> </tr><tr> <td class="font-weight-bold">Basic OD2</td><td></td><td><strong id="od_basic_od2_tot"></strong> </td></tr><tr><td class="font-weight-bold">Discounts (Minus)</td><td></td><td></td></tr><tr><td>Anti Theft-IMT-10 (Minus)</td><td></td><td><strong id="od_anti_theft_tot"></strong></td></tr> <tr><td>Handicap (Minus)</td><td></td><td><strong id="od_handicap_tot"></strong></td></tr><tr><td>AAI (Minus)</td><td></td><td><strong id="od_aai_tot"></strong></td></tr><tr><td>Side Car (Minus)</td><td></td><td><strong id="od_side_car_tot"></strong></td></tr><tr><td>Own Premises (Minus)</td><td></td><td><strong id="od_own_premises_tot"></strong></td></tr><tr><td>Voluntary Excess (Minus)</td><td></td><td><strong id="od_voluntary_excess_tot"></strong></td></tr><tr><td class="font-weight-bold">Basic OD3</td><td></td> <td><strong id="od_basic_od3_tot"></strong></td></tr><tr><td>NCB</td><td><strong id="od_ncb_per"></strong></td><td><strong id="od_ncb_tot"></strong></td></tr><tr><td colspan="2" class="text-purple font-weight-bold">Total OD Premium for the Policy Period</td><td><strong id="od_tot_od_premium_policy_period"></strong></td></tr> </tbody></table></td><td ><table class="table mb-0 table-bordered" id=""><tbody><tr><td colspan="3" class="font-weight-bold"><center>TP Calculation</center></td></tr> <tr> <td>Basic TP</td><td></td><td><strong id="tp_basic_tp_tot"></strong></td></tr><tr><td>Restricted TPPD (Minus)</td><td></td> <td><strong id="tp_restr_tppd_tot"></strong></td></tr><tr><td class="font-weight-bold">Basic TP1</td> <td></td><td><strong id="tp_basic_tp1_tot"></strong></td></tr><tr><td>Geographical Area</td><td></td><td><strong id="tp_geographical_area_tot"></strong></td></tr><tr><td>Compulsory PA Own/Driver</td><td></td><td><strong id="tp_compul_pa_own_driv_tot"></strong></td> </tr><tr><td>Unnamed PA</td><td></td><td><strong id="tp_unnamed_pa_tot"></strong></td></tr><tr><td>LL Drv/Emp IMT 28</td><td></td> <td><strong id="tp_ll_drv_emp_imt28_tot"></strong></td></tr><tr><td>LL to Other Employees</td><td></td><td><strong id="tp_ll_other_emp_tot"></strong></td> </tr><tr> <td>No of Other Employees</td><td></td><td><strong id="tp_noof_other_emp_tot"></strong></td></tr><tr><td class="font-weight-bold">Basic Tp2</td><td></td><td><strong id="tp_basic_tp2_tot"></strong></td></tr><tr><td></td><td></td><td></td></tr><tr><td class="font-weight-bold text-purple">Total TP Premium for the Policy Period</td><td></td> <td><strong id="tp_tot_premium_policy_period"></strong></td></tr><tr> <td colspan="3" class="font-weight-bold"> <center>ADD On Covers Premium</center></td></tr><tr><td class="font-weight-bold">Add On Covers</td><td class="font-weight-bold">Rate</td><td></td></tr><tr><td><div class="row"><div class="col-md-4">Plan</div> <div class="col-md-8"><strong id="plan_name"></strong></div> </div> </td> <td></td> <td><strong id="plan_name_tot"></strong></td></tr><tr><td>Other Covers</td><td></td><td></td></tr><tr> <td colspan="3"><table><tbody id="first_table_tbody"></tbody></table></td></tr><tr><td class="font-weight-bold text-purple">Total Add On Cover Premium for the Policy Period</td> <td></td> <td><strong id="tot_cover_premium_period"></strong></td></tr></tbody></table></td></tr><tr ><td colspan="2"><table class="table mb-0 table-bordered" id=""><tbody><tr><td colspan="3">Premium Posting</td></tr><tr><td>Total Premium</td><td></td> <td><strong id="tot_premium"></strong></td></tr><tr> <td colspn=""><strong> CGST:</strong></td> <td><strong id="cgst_fire_per"></strong></td> <td><strong id="motor_cgst_tot"></strong></td> </tr><tr><td><strong> SGST</strong></td> <td><strong id="sgst_fire_per"></strong></td><td><strong id="motor_sgst_tot"></strong></td></tr> <tr><td class="text-purple font-weight-bold">Total Payable</td><td></td><td class="text-purple font-weight-bold"><strong id="tot_payable_premium"></strong></td></tr> </tbody> </table></td></tr></table>';
                                    // alert(term_plan_policy_header)
                                    $(".type_of_business").hide();
                                    $(".type_of_business_ans").hide();
                                    $("#fire_table").empty();
                                    $("#fire_table").append(term_plan_policy_header);
                                    edit_motor_2_wheeler(motor_2_wheeler_data_arr);
                                }
                            }
                        } else if (data["userdata"].policy_type_title == "Commercial Vehicle") {
                            if (data["userdata"].policy_type != 3) {
                                var term_plan_policy_header = '<style>table {border-collapse: collapse; border-spacing: 0;width: 100%;border: 1px solid #ddd; }  th,td {text-align: left; padding: 8px;}</style><table><tr><td colspan="4">Commercial Vehicle : </td></tr><tr><td>Vehicle Make & Model : </td><td> <strong id="vehicle_make_model"></strong></td><td>Vehicle Reg. No : </td><td><strong id="vehicle_reg_no"></strong></td></tr><tr><td  colspan="4"><center class="font-weight-bold">A1-GOODS CARRYING-PUBLIC CARRIERS (OTHER THAN 3 WHEELERS)</center></td></tr><tr><td colspan="4"><center class="font-weight-bold">Comprehensive Comprehensive Policy (Own damage + Third Party)</center></td></tr><tr><td colspan="4"><center class="font-weight-bold">Basic Details of the Vehicle</center></td></tr></table><table><tr><td><table class="table mb-0 table-bordered" id=""> <tbody> <tr> <td>Insured Declared Value-IDV</td><td><center><strong id="insu_declared_val"></strong></center> </td>   </tr> <tr><td>Electrical Accessories value</td><td><center><strong id="elect_acc_val"></strong></center></td> </tr><tr><td>LPG/CNG IDV ( If inbuilt-IDV not required)</td><td><center><strong id="lpg_cng_idv_val"></strong></center></td> </tr> <tr><td>Consolidated Trailers IDV </td><td></td> </tr> <tr><td>No of Trailers</td><td> </td> </tr>  <tr><td>E-Carts / Except E-Carts</td> <td>E-Carts</td> </tr></tbody> </table></td> <td> <table class="table mb-0 table-bordered" id=""><tbody><tr><td colspan="3">Vehicle Manufacturing Year</td> <td><center><strong id="year_manufact_val"></strong></center></td></tr> <tr><td> Zone</td> <td><center><strong id="zone_city_code"></strong></center></td><td><center><strong id="zone_city"></strong></center></td><td><center><strong id="zone_city_cat"></strong></center></td></tr> <tr> <td colspan="3">GVW</td><td><center><strong id="gvw_val"></strong></center></td> </tr> <tr><td colspan="3">Class</td> <td><center><strong id="class_val"></strong></center></td></tr><tr> <td colspan="3">Type of Cover</td> <td><center><strong id="type_of_cover"></strong></center></td></tr> <tr><td colspan="2">Policy Period</td><td>Inception Date</td><td>Expiry Date</td> </tr><tr> <td colspan="2"><center><strong id="policy_period"></strong></center></td> <td><center><strong id="inception_date"></strong></center></td> <td><center><strong id="expiry_date"></strong></center></td></tr>  </tbody> </table></td></tr></table><table><tr><td><center class="font-weight-bold">Premium Calculation</center></td> </tr></table><table><tr><td><table class="table mb-0 table-bordered" id=""><tbody>  <tr><td colspan="3" class="font-weight-bold"> <center>OWN DAMAGE PREMIUM (OD)</center></td></tr><tr><td>Basic OD</td><td></td><td><center><strong id="od_basic_od_tot"></strong></center></td></tr><tr><td>Elec Acc</td><td></td><td><center><strong id="od_elec_acc_tot"></strong></center></td> </tr> <tr><td>Trailer</td> <td></td><td><center><strong id="od_trailer_tot"></strong></center></td></tr><tr><td>Bi-fuel Kit</td> <td></td> <td><center><strong id="od_bi_fuel_kit_tot"></strong></center></td></tr><tr><td class="font-weight-bold">Basic OD1</td><td></td><td><center><strong id="od_od_basic_od1_tot"></strong></center></td></tr><tr><td>Geog area</td><td></td><td><center><strong id="od_geog_area_tot"></strong></center></td></tr><tr><td>Fibre Glass Tank</td><td></td><td><center><strong id="od_fiber_glass_tank_tot"></strong></center></td></tr> <tr><td>IMT 23-Cover for mud-guards etc</td><td></td><td><center><strong id="od_imt_cover_mud_guard_tot"></strong></center></td> </tr> <tr> <td class="font-weight-bold">Basic OD2</td> <td></td> <td><center><strong id="od_basic_od2_tot"></strong></center></td> </tr> <tr> <td class="font-weight-bold">Discounts (Minus)</td><td></td> <td></td></tr> <tr> <td> </td>  <td></td><td></td></tr><tr><td class="font-weight-bold">Basic OD3</td><td></td><td><center><strong id="od_basic_od3_tot"></strong></center></td></tr><tr><td>NCB</td> <td><center><strong id="od_ncb_per"></strong></center></td> <td><center><strong id="od_ncb_tot"></strong></center></td> </tr> <tr> <td colspan="2" class="text-purple font-weight-bold">Annual OD Premium</td> <td><center><strong id="od_tot_anual_od_premium"></strong></center></td> </tr> <tr><td>Special Discount</td> <td><center><strong id="od_special_disc_per"></strong></center></td> <td><center><strong id="od_special_disc_tot"></strong></center></td>  </tr><tr> <td>Special Loading</td> <td><center><strong id="od_special_load_per"></strong></center></td> <td><center><strong id="od_special_load_tot"></strong></center></td></tr><tr> <td colspan="2" class="text-purple font-weight-bold">Total OD Premium</td> <td><center><strong id="od_tot_od_premium"></strong></center></td> </tr> </tbody> </table></td><td>  <table class="table mb-0 table-bordered" id=""><tbody><tr> <td colspan="3" class="font-weight-bold"> <center>THIRD PARTY PREMIUM (TP)</center> </td></tr><tr><td>Basic TP</td><td><center><strong id="tp_basic_tp_tot"></strong></center></td></tr><tr><td>Restricted TPPD (Minus)</td> <td><center><strong id="tp_restr_tppd_tot"></strong></center></td> </tr> <tr><td>Trailer</td> <td><center><strong id="tp_trailer_tot"></strong></center></td> </tr><tr> <td>Bi-fuel kit</td> <td><center><strong id="tp_bi_fuel_kit_tot"></strong></center></td></tr> <tr> <td class="font-weight-bold">Basic TP1</td><td><center><strong id="tp_basic_tp1_tot"></strong></center></td></tr> <tr><td>Geog Area</td> <td><center><strong id="tp_geog_area_tot"></strong></center></td> </tr><tr><td>Compulsory PA Own/Driver</td><td><center><strong id="tp_compul_pa_own_driv_tot"></strong></center></td> </tr> <tr> <td>PA to paid driver - IMT17</td><td><center><strong id="tp_pa_paid_driver_tot"></strong></center></td> </tr><tr> <td>LL to emp/non-fare paying pax (other than WC)</td> <td><center><strong id="tp_ll_emp_non_fare_tot"></strong></center></td></tr><tr><td>LL to driver/cleaner/conductor</td><td><center><strong id="tp_ll_driver_cleaner_tot"></strong></center></td></tr> <tr> <td>LL to person for operation/maintenance</td> <td><center><strong id="tp_ll_person_operation_tot"></strong></center></td> </tr> <tr><td class="font-weight-bold">Basic Tp2</td> <td><center><strong id="tp_basic_tp2_tot"></strong></center></td></tr> <tr><td></td> <td></td> </tr><tr> <td class="font-weight-bold text-purple">Total TP Premium</td><td><center><strong id="tp_tot_premium"></strong></center></td> </tr> <tr><td colspan="3" class="font-weight-bold"><center>ADD On</center></td> </tr><tr><td>Consumables</td> <td><center><strong id="tp_consumables"></strong></center></td> </tr> <tr>  <td>Zero Depreciation</td> <td><center><strong id="tp_zero_depreciation"></strong></center></td> </tr> <tr> <td>Road Side Assistance</td> <td><center><strong id="tp_road_side_ass"></strong></center></td> </tr><tr><td class="font-weight-bold text-purple">Total Add On Premium</td> <td><center><strong id="tp_tot_addon_premium"></strong></center></td></tr></tbody> </table></td></tr></table><table><tr><td> <table class="table mb-0 table-bordered" id=""><tbody> <tr> <td></td><td>Premium</td><td>GST Rate</td><td>GST Amount</td> <td>Final Premium</td></tr><tr> <td>Own Damage (OWD)</td> <td><center><strong id="tot_owd_premium"></strong></center></td>  <td><div class="row"> <div class="col-md-12"> <div class="form-group row"> <label for="" class="col-form-label col-md-5 font-weight-bold">CGST Rate : </label>  <div class="col-form-label col-md-7">     <center><strong id="tot_owd_cgst_rate"></strong></center> </div> </div> <div class="form-group row"> <label for="" class="col-form-label col-md-5 font-weight-bold">SGST Rate : </label> <div class="col-form-label col-md-7">  <center><strong id="tot_owd_sgst_rate"></strong></center></div> </div> </div> </div> </td><td><center><strong id="tot_owd_gst"></strong></center></td> <td><center><strong id="tot_owd_final"></strong></center></td> </tr> <tr>   <td>Add On (OWD)</td> <td><center><strong id="tot_owd_addon_premium"></strong></center> </td> <td> <div class="row"> <div class="col-md-12"><div class="form-group row"> <label for="" class="col-form-label col-md-5 font-weight-bold">CGST Rate : </label> <div class="col-form-label col-md-7"> <center><strong id="tot_owd_addon_cgst_rate"></strong></center>   </div>  </div><div class="form-group row">  <label for="" class="col-form-label col-md-5 font-weight-bold">SGST Rate : </label> <div class="col-form-label col-md-7"><center><strong id="tot_owd_addon_sgst_rate"></strong></center>   </div> </div> </div> </div>  </td><td><center><strong id="tot_owd_addon_gst"></strong></center> </td> <td><center><strong id="tot_owd_addon_final"></strong></center> </td> </tr><tr>  <td>Basic TP (BTP)</td> <td><center><strong id="tot_btp_premium"></strong></center></td> <td> <div class="row"> <div class="col-md-12"> <div class="form-group row"> <label for="" class="col-form-label col-md-5 font-weight-bold">CGST Rate : </label> <div class="col-form-label col-md-7"> <center><strong id="tot_btp_cgst_rate"></strong></center> </div> </div> <div class="form-group row">  <label for="" class="col-form-label col-md-5 font-weight-bold">SGST Rate : </label> <div class="col-form-label col-md-7">  <center><strong id="tot_btp_sgst_rate"></strong></center>   </div> </div> </div>  </div></td><td><center><strong id="tot_btp_gst"></strong></center></td><td><center><strong id="tot_btp_final"></strong></center></td></tr> <tr> <td>Other TP (TDP)</td> <td><center><strong id="tot_other_tp_premium"></strong></center></td> <td> <div class="row"> <div class="col-md-12"> <div class="form-group row"> <label for="" class="col-form-label col-md-5 font-weight-bold">CGST Rate : </label>  <div class="col-form-label col-md-7">   <center><strong id="tot_other_tp_cgst_rate"></strong></center>  </div> </div>   <div class="form-group row"> <label for="" class="col-form-label col-md-5 font-weight-bold">SGST Rate : </label> <div class="col-form-label col-md-7"> <center><strong id="tot_other_tp_sgst_rate"></strong></center></div></div> </div></div> </td> <td><center><strong id="tot_other_tp_gst"></strong></center></td><td><center><strong id="tot_other_tp_final"></strong></center></td> </tr><tr><td>Total</td><td><center><strong id="tot_premium"></strong></center> </td><td></td><td><center><strong id="tot_gst_amt"></strong></center></td> <td><center><strong id="tot_final_premium"></strong></center></td> </tr><tr> <td class="text-purple font-weight-bold">Total Payable</td> <td></td><td></td><td></td> <td class="text-purple font-weight-bold"><center><strong id="tot_payable_premium"></strong></center></td></tr></tbody> </table></td></tr></table>';
                                $(".type_of_business").hide();
                                $(".type_of_business_ans").hide();
                                $("#fire_table").empty();
                                $("#fire_table").append(term_plan_policy_header);
                                if (data["userdata"].policy_type == 1 || data["userdata"].policy_type == 2) {
                                    var motor_commercial_policy_data_arr = data["userdata"].motor_commercial_policy_data_arr;
                                    edit_motor_commercial_policy(motor_commercial_policy_data_arr);
                                }
                            }
                        } else {
                            if ((data["userdata"].policy_type_title == "Worksmen Compentation") || (data["userdata"].policy_type_title == "Money In Transit") || (data["userdata"].policy_type_title == "Plate Glass") || (data["userdata"].policy_type_title == "House Holder") || (data["userdata"].policy_type_title == "All Risk") || (data["userdata"].policy_type_title == "Office Compact") || (data["userdata"].policy_type_title == "Electronic Equipment") || (data["userdata"].policy_type_title == "Product Liability") || (data["userdata"].policy_type_title == "Commercial General Liability") || (data["userdata"].policy_type_title == "Public Liability") || (data["userdata"].policy_type_title == "Professional Indemnity") || (data["userdata"].policy_type_title == "Machinery Breakdown") || (data["userdata"].policy_type_title == "Contractors All Risk")) {

                                var others_policy_data_arr = data["userdata"].others_policy_data_arr;
                                var term_plan_policy_header = ' <table class="table mb-0 table-bordered"><tr><td colspan="2" width="65%"><strong>Total Sum Assured</strong></td><td><center><strong id="total_sum_assured"></strong></center></td> </tr><tr>  <td colspan=""><strong>  Rate (Per 1000)  </strong></td><td><center><strong  id="fire_rate_per"></strong></center></td><td><center><strong id="fire_rate_tot"></strong></center></td></tr><tr><td colspan=""><strong>Less Discount (in %)</strong></td><td><center><strong id="less_discount_per"></strong></center></td><td><center><strong id="less_discount_tot"></strong></center></td> </tr><tr><td colspan="2"><strong>Rate After Discount / Gross Premium</strong></td><td><center><strong id="fire_rate_after_discount_tot">  </strong></center></td> </tr><tr><td colspan=""><strong>Add CGST (in %) </strong></td><td><center><strong id="cgst_fire_per"></strong></center></td><td><center><strong id="cgst_fire_tot"></strong></center></td></tr> <tr> <td colspan=""><strong>Add SGST (in %)</strong></td><td><center><strong id="sgst_fire_per">  </strong></center></td><td><center><strong id="sgst_fire_tot"> </strong></center></td> </tr> <tr><td colspan="2"><strong class="text-purple">  Final Payable Premium</strong></td> <td><center><strong id="final_paybal_premium"></strong></center></td></tr></table>';
                                // alert(term_plan_policy_header)
                                $(".type_of_business").hide();
                                $(".type_of_business_ans").hide();
                                $("#fire_table_2").show();
                                $("#fire_table_2").empty();
                                $("#fire_table_2").append(term_plan_policy_header);
                                $.each(others_policy_data_arr, function(key_other, val_other) {
                                    other_policy_id = others_policy_data_arr.other_policy_id;
                                    other_fk_policy_id = others_policy_data_arr.other_fk_policy_id;
                                    fk_policy_type_id = others_policy_data_arr.fk_policy_type_id;
                                    other_total_sum_assured = others_policy_data_arr.other_total_sum_assured;
                                    other_fire_rate_per = others_policy_data_arr.other_fire_rate_per;
                                    other_fire_rate_tot_amount = others_policy_data_arr.other_fire_rate_tot_amount;
                                    other_less_discount_per = others_policy_data_arr.other_less_discount_per;
                                    other_less_discount_tot_amount = others_policy_data_arr.other_less_discount_tot_amount;
                                    other_fire_rate_after_discount = others_policy_data_arr.other_fire_rate_after_discount;
                                    other_cgst_rate_per = others_policy_data_arr.other_cgst_rate_per;
                                    other_cgst_tot_amount = others_policy_data_arr.other_cgst_tot_amount;
                                    other_sgst_rate_per = others_policy_data_arr.other_sgst_rate_per;
                                    other_sgst_tot_amount = others_policy_data_arr.other_sgst_tot_amount;
                                    other_final_payable_premium = others_policy_data_arr.other_final_payable_premium;
                                    others_policy_status = others_policy_data_arr.others_policy_status;

                                    $("#total_sum_assured").text(other_total_sum_assured);
                                    $("#fire_rate_per").text(other_fire_rate_per);
                                    $("#fire_rate_tot").text(other_fire_rate_tot_amount);
                                    $("#less_discount_per").text(other_less_discount_per);
                                    $("#less_discount_tot").text(other_less_discount_tot_amount);
                                    $("#fire_rate_after_discount_tot").text(other_fire_rate_after_discount);
                                    $("#cgst_fire_per").text(other_cgst_rate_per);
                                    $("#cgst_fire_tot").text(other_cgst_tot_amount);
                                    $("#sgst_fire_per").text(other_sgst_rate_per);
                                    $("#sgst_fire_tot").text(other_sgst_tot_amount);
                                    $("#final_paybal_premium").text(other_final_payable_premium);
                                    $("#other_policy_id").text(other_policy_id);
                                });
                            }
                        }

                        if (data["userdata"].policy_type == 1 && data["userdata"].policy_type_title == "Mediclaim") {
                            if (data["userdata"].policy_type != 3) {

                                if (company_name == "HDFC ERGO HEALTH INSURANCE LTD" || company_name == "HDFC Ergo General Insurance Co Ltd") {
                                    if (data["userdata"].floater_policy_type == "Optima Restore") {
                                        var medi_ind_hdfc_ergo_health_insu_policy_data_arr = data["userdata"].medi_ind_hdfc_ergo_health_insu_policy_data_arr;
                                        edit_medi_ind_HDFC_ERGO_HEALTH_INSURANCE_LTD_Optima_restore_policy(medi_ind_hdfc_ergo_health_insu_policy_data_arr, basic_sum_insured, basic_gross_premium);
                                    } else if (data["userdata"].floater_policy_type == "Energy") {
                                        var medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr = data["userdata"].medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr;
                                        edit_medi_ind_HDFC_ERGO_HEALTH_INSURANCE_LTD_Energy_policy(medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr, basic_sum_insured, basic_gross_premium);
                                    } else if (data["userdata"].floater_policy_type == "Health Suraksha") {
                                        var medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr = data["userdata"].medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr;
                                        edit_medi_ind_HDFC_ERGO_HEALTH_INSURANCE_LTD_Surksha_policy(medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr, basic_sum_insured, basic_gross_premium);
                                    } else if (data["userdata"].floater_policy_type == "Easy Health") {
                                        var easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr = data["userdata"].easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr;
                                        edit_medi_ind_HDFC_ERGO_HEALTH_INSURANCE_LTD_easy_rate_card_policy(easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr, basic_sum_insured, basic_gross_premium);
                                    }
                                } else if (company_name == "The New India Assurance Co Ltd") {
                                    if (data["userdata"].floater_policy_type == "New India Mediclaim Policy 2017") {
                                        var medi_ind_the_new_india_2017_assu_policy_data_arr = data["userdata"].medi_ind_the_new_india_2017_assu_policy_data_arr;
                                        edit_medi_ind_the_new_india_assu_2017_policy(medi_ind_the_new_india_2017_assu_policy_data_arr, basic_sum_insured, basic_gross_premium);
                                    }
                                } else if (company_name == "Max Bupa Health Insurance Co Ltd") {
                                    if (data["userdata"].floater_policy_type == "Reassure") {
                                        var medi_ind_max_bupa_reassure_policy_data_arr = data["userdata"].medi_ind_max_bupa_reassure_policy_data_arr;
                                        edit_medi_ind_max_bupa_reassure_policy(medi_ind_max_bupa_reassure_policy_data_arr, basic_sum_insured, basic_gross_premium);
                                    }
                                } else if (company_name == "Star Health & Allied Insurance Co Ltd") {
                                    if (data["userdata"].floater_policy_type == "Red Carpet") {
                                        var medi_star_health_allied_red_carpet_ind_policy_data_arr = data["userdata"].medi_star_health_allied_red_carpet_ind_policy_data_arr;
                                        edit_medi_ind_star_health_red_arpet_policy(medi_star_health_allied_red_carpet_ind_policy_data_arr, basic_sum_insured, basic_gross_premium);
                                    } else if (data["userdata"].floater_policy_type == "Comprehensive") {
                                        var medi_star_health_allied_comprehensive_ind_policy_data_arr = data["userdata"].medi_star_health_allied_comprehensive_ind_policy_data_arr;
                                        edit_medi_ind_star_health_Comprehensive_policy(medi_star_health_allied_comprehensive_ind_policy_data_arr, basic_sum_insured, basic_gross_premium);
                                    }
                                } else if (company_name == "United India Insurance Co Ltd") {
                                    if (data["userdata"].floater_policy_type == "Individual Health Insurance Policy") {
                                        var mediclaim_policy_data_arr = data["userdata"].mediclaim_policy_data_arr;
                                        edit_mediclaim_policy(mediclaim_policy_data_arr, basic_sum_insured, basic_gross_premium);
                                    } else if (data["userdata"].floater_policy_type == "Floater 2020(Individual)") {
                                        var medi_ind2020_policy_data_arr = data["userdata"].medi_ind2020_policy_data_arr;
                                        edit_medi_ind2020_policy(medi_ind2020_policy_data_arr, basic_sum_insured, basic_gross_premium)
                                    }
                                } else if (company_name == "Care Health Insurance Co Ltd") {
                                    if (data["userdata"].floater_policy_type == "Care Advantage") {
                                        // alert("Hi");
                                        var care_health_care_adv_ind_policy_data_arr = data["userdata"].care_health_care_adv_ind_policy_data_arr;
                                        edit_medi_ind_care_health_care_adv_ind_policy(care_health_care_adv_ind_policy_data_arr, basic_sum_insured, basic_gross_premium);
                                    } else if (data["userdata"].floater_policy_type == "Care") {
                                        var care_health_care_ind_policy_data_arr = data["userdata"].care_health_care_ind_policy_data_arr;
                                        edit_medi_ind_care_health_care_ind_policy(care_health_care_ind_policy_data_arr, basic_sum_insured, basic_gross_premium);
                                    }
                                }
                            }
                        }

                        if (data["userdata"].policy_type == 2 && data["userdata"].policy_type_title == "Mediclaim") {
                            if (data["userdata"].policy_type != 3) {

                                if (company_name == "HDFC ERGO HEALTH INSURANCE LTD" || company_name == "HDFC Ergo General Insurance Co Ltd") {
                                    if (data["userdata"].floater_policy_type == "Optima Restore") {
                                        var medi_float_hdfc_ergo_health_insu_policy_data_arr = data["userdata"].medi_float_hdfc_ergo_health_insu_policy_data_arr;
                                        edit_medi_float_HDFC_ERGO_HEALTH_INSURANCE_LTD_Optima_restore_policy(medi_float_hdfc_ergo_health_insu_policy_data_arr, basic_sum_insured, basic_gross_premium)
                                    } else if (data["userdata"].floater_policy_type == "Health Suraksha") {
                                        var medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr = data["userdata"].medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr;
                                        edit_medi_float_Suraksha_policy_HDFC_ERGO_HEALTH_INSURANCE_LTD(medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr, basic_sum_insured, basic_gross_premium)
                                    } else if (data["userdata"].floater_policy_type == "Easy Health") {
                                        var easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr = data["userdata"].easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr;
                                        edit_medi_float_HDFC_ERGO_HEALTH_INSURANCE_LTD_easy_rate_card_policy(easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr, basic_sum_insured, basic_gross_premium);
                                    }
                                } else if (company_name == "The New India Assurance Co Ltd") {
                                    if (data["userdata"].floater_policy_type == "New India Floater Mediclaim") {
                                        var medi_float_the_new_india_assu_policy_data_arr = data["userdata"].medi_float_the_new_india_assu_policy_data_arr;
                                        edit_medi_floater_the_new_india_assu_policy(medi_float_the_new_india_assu_policy_data_arr, basic_sum_insured, basic_gross_premium);
                                    }
                                } else if (company_name == "Max Bupa Health Insurance Co Ltd") {
                                    if (data["userdata"].floater_policy_type == "Reassure") {
                                        var medi_float_max_bupa_reassure_policy_data_arr = data["userdata"].medi_float_max_bupa_reassure_policy_data_arr;
                                        edit_medi_float_max_bupa_reassure_policy(medi_float_max_bupa_reassure_policy_data_arr, basic_sum_insured, basic_gross_premium);
                                    }
                                } else if (company_name == "Star Health & Allied Insurance Co Ltd") {
                                    if (data["userdata"].floater_policy_type == "Red Carpet") {
                                        var medi_star_health_allied_red_carpet_float_policy_data_arr = data["userdata"].medi_star_health_allied_red_carpet_float_policy_data_arr;
                                        edit_medi_float_star_health_red_arpet_policy(medi_star_health_allied_red_carpet_float_policy_data_arr, basic_sum_insured, basic_gross_premium);
                                    } else if (data["userdata"].floater_policy_type == "Comprehensive") {
                                        var medi_star_health_allied_comprehensive_float_policy_data_arr = data["userdata"].medi_star_health_allied_comprehensive_float_policy_data_arr;
                                        edit_medi_float_star_health_Comprehensive_policy(medi_star_health_allied_comprehensive_float_policy_data_arr, basic_sum_insured, basic_gross_premium);
                                    }
                                } else if (company_name == "United India Insurance Co Ltd") {

                                    if (data["userdata"].family_size == 1)
                                        var Family_size_count = "2A + 0C";
                                    else if (data["userdata"].family_size == 2)
                                        var Family_size_count = "2A + 1C";
                                    else if (data["userdata"].family_size == 3)
                                        var Family_size_count = "2A + 2C";
                                    else if (data["userdata"].family_size == 4)
                                        var Family_size_count = "1A+ 1C";
                                    else if (data["userdata"].family_size == 5)
                                        var Family_size_count = "1A + 2C";
                                    else if (data["userdata"].family_size == 6)
                                        var Family_size_count = "2A + 3C";
                                    $("#family_size").text(Family_size_count);
                                    if (data["userdata"].floater_policy_type == "Family Floater 2014") {
                                        var mediclaim_floater2014_data_arr = data["userdata"].mediclaim_floater2014_data_arr;
                                        edit_mediclaim_floater2014_policy(mediclaim_floater2014_data_arr, basic_sum_insured, basic_gross_premium);
                                    } else if (data["userdata"].floater_policy_type == "Family Floater 2020") {

                                        var medi_floater2020_data_arr = data["userdata"].medi_floater2020_data_arr;
                                        edit_medi_floater2020_policy(medi_floater2020_data_arr, basic_sum_insured, basic_gross_premium);
                                    }
                                } else if (company_name == "Care Health Insurance Co Ltd") {
                                    if (data["userdata"].floater_policy_type == "Care Advantage") {
                                        // alert("Hi");
                                        var care_health_care_adv_float_policy_data_arr = data["userdata"].care_health_care_adv_float_policy_data_arr;
                                        edit_medi_care_health_care_adv_float_policy(care_health_care_adv_float_policy_data_arr, basic_sum_insured, basic_gross_premium);
                                    } else if (data["userdata"].floater_policy_type == "Care") {
                                        var care_health_care_float_policy_data_arr = data["userdata"].care_health_care_float_policy_data_arr;
                                        edit_medi_care_health_care_float_policy(care_health_care_float_policy_data_arr, basic_sum_insured, basic_gross_premium);
                                    }
                                }
                            }
                        }

                        if ((data["userdata"].policy_type == 2 || data["userdata"].policy_type == 5) && (data["userdata"].policy_type_title == "Super Top Up" || data["userdata"].policy_type_title == "Top Up" || data["userdata"].policy_type_title == "Critical illness")) {
                            if (data["userdata"].policy_type != 3) {


                                if (company_name == "HDFC ERGO HEALTH INSURANCE LTD" || company_name == "HDFC Ergo General Insurance Co Ltd") {
                                    $("#hdfc_ergo_health_insu_supertopup_float_family_size").text(data["userdata"].family_size);
                                    $("#hdfc_ergo_health_insu_family_size").text(data["userdata"].family_size);
                                    var hdfc_ergo_health_supertopup_float_data_arr = data["userdata"].hdfc_ergo_health_supertopup_float_data_arr;
                                    edit_hdfc_ergo_health_supertopup_Float_policy(hdfc_ergo_health_supertopup_float_data_arr, data["userdata"].policy_type, basic_sum_insured, basic_gross_premium);
                                } else if (company_name == "The New India Assurance Co Ltd") {
                                    var the_new_india_supertopup_ind_data_arr = data["userdata"].the_new_india_supertopup_ind_data_arr;
                                    edit_the_new_india_assu_supertopup_Float_policy(the_new_india_supertopup_ind_data_arr, data["userdata"].policy_type, basic_sum_insured, basic_gross_premium);
                                } else if (company_name == "Star Health & Allied Insurance Co Ltd") {
                                    $("#floater_type_comm_div").hide();
                                    $("#family_size").text(data["userdata"].family_size);
                                    $("#star_health_allied_insu_supertopup_float_family_size").val(data["userdata"].family_size);
                                    var medi_star_health_allied_supertopup_float_policy_data_arr = data["userdata"].medi_star_health_allied_supertopup_float_policy_data_arr;
                                    edit_medi_float_star_health_Supertopup_policy(medi_star_health_allied_supertopup_float_policy_data_arr, basic_sum_insured, basic_gross_premium);
                                } else {
                                    $("#floater_type_comm_div").hide();
                                    $("#family_size_div").show();
                                    $("#addition_of_more_child_div").hide();

                                    if (data["userdata"].policy_type == 5)
                                        $("#floater_type_comm_div").hide();

                                    if (data["userdata"].family_size == 1)
                                        var Family_size_count = "2A + 0C";
                                    else if (data["userdata"].family_size == 2)
                                        var Family_size_count = "2A + 1C";
                                    else if (data["userdata"].family_size == 3)
                                        var Family_size_count = "2A + 2C";
                                    else if (data["userdata"].family_size == 4)
                                        var Family_size_count = "1A+ 1C";
                                    else if (data["userdata"].family_size == 5)
                                        var Family_size_count = "1A + 2C";
                                    $("#family_size").text(Family_size_count);
                                    var supertopup_floater_data_arr = data["userdata"].supertopup_floater_data_arr;
                                    edit_supertopup_floater_policy(supertopup_floater_data_arr, basic_sum_insured, basic_gross_premium);
                                }
                            }
                        }

                        if ((data["userdata"].policy_type == 1 || data["userdata"].policy_type == 4) && (data["userdata"].policy_type_title == "Super Top Up" || data["userdata"].policy_type_title == "Top Up" || data["userdata"].policy_type_title == "Critical illness")) {
                            if (data["userdata"].policy_type != 3) {

                                if (company_name == "HDFC ERGO HEALTH INSURANCE LTD" || company_name == "HDFC Ergo General Insurance Co Ltd") {
                                    var hdfc_ergo_health_supertopup_ind_data_arr = data["userdata"].hdfc_ergo_health_supertopup_ind_data_arr;
                                    edit_hdfc_ergo_health_supertopup_Ind_policy(hdfc_ergo_health_supertopup_ind_data_arr, basic_sum_insured, basic_gross_premium);
                                } else if (company_name == "The New India Assurance Co Ltd") {
                                    var the_new_india_supertopup_ind_single_data_arr = data["userdata"].the_new_india_supertopup_ind_single_data_arr;
                                    edit_the_new_india_assu_supertopup_INDIVIDUAL_policy(the_new_india_supertopup_ind_single_data_arr, data["userdata"].policy_type, basic_sum_insured, basic_gross_premium);
                                } else if (company_name == "Star Health & Allied Insurance Co Ltd") {
                                    $("#star_health_allied_insu_supertopup_float_family_size").val(data["userdata"].family_size);
                                    var medi_star_health_allied_supertopup_ind_policy_data_arr = data["userdata"].medi_star_health_allied_supertopup_ind_policy_data_arr;
                                    edit_medi_ind_star_health_Supertopup_policy(medi_star_health_allied_supertopup_ind_policy_data_arr, basic_sum_insured, basic_gross_premium);
                                } else {
                                    var supertopup_ind_data_arr = data["userdata"].supertopup_ind_data_arr;
                                    edit_supertopup_Individual_policy(supertopup_ind_data_arr, basic_sum_insured, basic_gross_premium);
                                }
                            }
                        }

                        if ((data["userdata"].policy_type_title == "Mediclaim" || data["userdata"].policy_type_title == "Personal Accident" || data["userdata"].policy_type_title == "Cancer Plan" || data["userdata"].policy_type_title == "Daily Cash" || data["userdata"].policy_type_title == "Overseas Mediclaim" || data["userdata"].policy_type_title == "Student Overseas Mediclaim" || data["userdata"].policy_type_title == "Employment Overseas Mediclaim") && (data["userdata"].policy_type == 4 || data["userdata"].policy_type == 5)) {
                            $("#risk_individual").hide();
                            $("#append_risk").hide();
                            $("#risk_rc").hide();
                            if (data["userdata"].policy_type == 4) { //Common Individual
                                var common_ind_data_arr = data["userdata"].common_ind_data_arr;
                                edit_Common_Individual(common_ind_data_arr, basic_sum_insured, basic_gross_premium);
                            } else if (data["userdata"].policy_type == 5) { //Common Floater
                                var common_float_data_arr = data["userdata"].common_float_data_arr;
                                edit_Common_Floater(common_float_data_arr, basic_sum_insured, basic_gross_premium);
                            }

                        }

                        if ((data["userdata"].policy_type == 1 || data["userdata"].policy_type == 2) && data["userdata"].policy_type_title == "Personal Accident") {
                            $("#risk_individual").hide();
                            $("#append_risk").hide();
                            $("#risk_rc").hide();
                            $(".type_based_show_ans").attr("style", "display:none");
                            $(".type_based_show_quest").attr("style", "display:none");
                            var ind_personal_accident_policy_data_arr = data["userdata"].ind_personal_accident_policy_data_arr;

                            if (company_name == "United India Insurance Co Ltd") {
                                edit_Personal_Accident(ind_personal_accident_policy_data_arr, basic_sum_insured, basic_gross_premium);
                            } else {
                                edit_single_table_Personal_Accident(ind_personal_accident_policy_data_arr, basic_sum_insured, basic_gross_premium);
                            }
                        }

                        var risk_rc_details = JSON.parse(data["userdata"].risk_rc_details);
                        var fire_rc_policy_data_arr = data["userdata"].fire_rc_policy_data_arr;
                        var policy_type_option = data["userdata"].policy_type;
                        edit_FIre_RC_Details(risk_rc_details, fire_rc_policy_data_arr, policy_type_option, basic_sum_insured, basic_gross_premium);


                        if (!isNaN(policy_id)) {
                            // alert(type_of_bussiness);
                            // alert(renewal_letter_premium_date);
                            $("#insurance_company").text(company_name);
                            $("#sub_policy_name").text(policy_type_title + " " + floater_policy_type);
                            $("#policy_type").text(policy_type_tit);
                            $("#family_size").text(family_size);
                            $("#policy_holder_name").text(member_name);
                            $("#registered_mobile_no").text(reg_mobile);
                            $("#registered_email_id").text(reg_email);
                            $("#para_policy_name").text(policy_type_title);
                            $("#para_policy_no").text(policy_no);
                            $("#para_policy_to_date").text(date_to);
                            $(".type_of_business_ans").text(type_of_bussiness);
                            $("#premium_update_date").text(renewal_letter_premium_date);
                            if (policy_type_tit == "Floater" || policy_type_tit == "Common Floater") {
                                $(".type_based_show_quest").show();
                                $(".type_based_show_ans").show();

                            } else {
                                $(".type_based_show_ans").hide();
                                $(".type_based_show_quest").hide();
                            }

                            if (policy_type_title == "Mediclaim" || policy_type_title == "Super Top Up" || policy_type_title == "Top Up" || policy_type_title == "Critical illness" || policy_type_title == "Cancer Plan" || policy_type_title == "Daily Cash" || policy_type_title == "Overseas Mediclaim" || policy_type_title == "Student Overseas Mediclaim" || policy_type_title == "Employment Overseas Mediclaim" || policy_type_title == "Personal Accident") {
                                $("#health_table").show();
                                $(".health_table").show();
                                $(".fire_table").hide();
                                $("#fire_table").hide();
                                // health_claiment_name = data["userdata"].health_claiment_name;
                                // reg_mediclaim_claim_file_no = data["userdata"].reg_mediclaim_claim_file_no;
                            } else {

                                $("#health_table").hide();
                                $("#fire_table").show();
                                $(".fire_table").show();
                                $(".health_table").hide();
                                $("#claiment_details").empty();
                                other_claiment_name_array = data["userdata"].other_claiment_name_array;
                                var claiment_details = "";
                                $.each(other_claiment_name_array, function(key, val) {
                                    claim_main_id = other_claiment_name_array[key].claim_main_id;
                                    claiment_name = other_claiment_name_array[key].claiment_name;
                                    claim_others_file_no = other_claiment_name_array[key].claim_others_file_no;
                                    view_url = '';
                                    claiment_details += '<tr><td>' + claiment_name + '</td><td>' + claim_others_file_no + '</td><td>' + view_url + '</td></tr>'
                                });
                                $("#claiment_details").append(claiment_details);
                                // other_claiment_name = data["userdata"].other_claiment_name;
                                // claim_others_file_no = data["userdata"].claim_others_file_no;
                            }

                            if (policy_type_title == "Bharat Sookshma Udyam" || policy_type_title == "Bharat Laghu Udyam" || policy_type_title == "Bharat Griha Raksha" || policy_type_title == "Standard Fire & Allied Perils" || policy_type_title == "Burglary" || policy_type_title == "Shopkeeper" || policy_type_title == "Contractors All Risk") {
                                $("#hypotication_details_global").show();
                            } else {
                                $("#hypotication_details_global").hide();
                            }

                        }
                    }
                    get_company_payment_details(fk_company_id);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function edit_Risk_details(risk_details, type, basic_sum_insured, basic_gross_premium) {

        $("#fire_table").empty();
        $("#risk_fire_rc_details").hide();
        if (type == 1) { // 1:Individual , 2:Floater

            var html = "";
            // var header = "<tdead><tr><td>Risk Address</td><td>Description</td><td>Sum Assured</td><td>Final Premium</td></tr></tdead><tbody id='risk_details'></tbody>";
            var header = "<tdead><tr><td>Description</td><td>Sum Assured</td><td>Final Premium</td></tr></tdead><tbody id='risk_details'></tbody>";
            // $("#fire_table").append(header);
            // var html = '<table class="table mb-0 table-bordered col-md-12"><tr><td><strong><center>Address</center></strong></td><td><strong><center>Description</center></strong></td><td><strong><center>Sum Assured</center></strong></td>';
            $("#risk_details").empty();
            var risk_discr_arr_data_length = "";

            $.each(risk_details, function(key1, val1) {
                var tr_table = "";
                html = "";
                add_risk_RC = key1;
                var risk_add_key = risk_details[key1][0];
                var risk_add_name = risk_details[key1][1];
                var risk_discr_arr = JSON.stringify(risk_details[key1][2]);
                risk_discr_arr_data = JSON.parse(risk_discr_arr);
                // alert(key1)

                risk_discr_arr_data_length = risk_discr_arr_data.length;
                // html += '  <tr><td rowspan="' + risk_discr_arr_data_length + '"><center>' + risk_add_name + '</center></td>';
                $.each(risk_discr_arr_data, function(key2, val2) {
                    var risk_discr_name = risk_discr_arr_data[key2][1];
                    var risk_discr_sum_insured = risk_discr_arr_data[key2][2];
                    var risk_discr_name_title = risk_discr_arr_data[key2][3];
                    html += '<tr><td><center>' + risk_discr_name_title + '</center></td><td><center>' + risk_discr_sum_insured + '</center></td></tr>';
                    // if (key2 == 0) {
                    //     html += '<td rowspan="' + risk_discr_arr_data_length + '"><center>' + basic_gross_premium + '</center></td></tr>';
                    // }
                });
                if (key1 == 0) {
                    // tr_rc_description += '<td id="counter_' + key1 + '">' + basic_gross_premium + '</td></tr>';
                    var final_premium_txt = '<span><b>Final Premium : ' + basic_gross_premium + '</b></td>';
                } else {
                    var final_premium_txt = '';
                }
                tr_table = final_premium_txt + '<br/><span id="div_' + add_risk_RC + '"> <label for="risk_address"><strong>Risk Address ' + (add_risk_RC + 1) + ': </strong></label> <span > ' + risk_add_name + ' </span> </span> <span  id="r_c_append_' + add_risk_RC + '"   ><table  class="table mb-0 table-bordered" id="append_rcDescription_' + add_risk_RC + '"><tr><td width="40%"><b>Description</b></td><td><b>Sum Insured</b></td></tr>' + html + '</table></span>';
                $("#fire_table").append(tr_table);
            });
            // html += '</table>';
            // $("#append_risk").append(html);
            // $("#risk_details").append(html);



        } else if (type == 2) {
            $("#risk_details").empty();
            $("#fire_table").attr("class", "row");
            $("#fire_table").attr("style", "border:none;");
            var header1 = '<div class="col-md-6"><table class="table mb-0 table-bordered"><tdead><tr><td><strong><center>Address</center></strong></td></tr></tdead><tbody id="risk_address"></tbody>';
            // $("#fire_table").append(header+html_risk);
            var html_details = '';
            var html_risk1 = '';
            var html_risk2 = '';
            var html_risk_add = '';
            var header2 = '';
            // var html_risk = '<div class="col-md-6"><table class="table mb-0 table-bordered"><tr><td><strong><center>Address</center></strong></td></tr>';
            $.each(risk_details, function(key1, val1) {
                var risk_add_key = JSON.stringify(risk_details[key1][0]);
                var risk_add_key2 = JSON.parse(risk_add_key);
                var risk_add_name = JSON.stringify(risk_details[key1][1]);
                var risk_add_name2 = JSON.parse(risk_add_name);
                // html_risk_add = '';
                $.each(risk_add_key2, function(key3, val3) {
                    add_risk_RC = key3;
                    var risk_add = risk_add_key2[key3][1];
                    html_risk1 += '<tr><td rowspan=""><center>' + risk_add + '</center></td></tr>';
                    html_risk_add += '&nbsp;&nbsp;&nbsp;&nbsp;<strong>Risk Address ' + (add_risk_RC + 1) + ': </strong> ' + risk_add + '&nbsp;&nbsp;&nbsp;<br/>';
                });
                // header1 = '';
                // $("#fire_table").append(header1 + html_risk1 + '</table></div>');
                header2 += '<table class="table ml-2 mb-0 table-bordered"><tr><td><strong><center>Description</center></strong></td><td><strong><center>Sum Assured</center></strong></td><td><strong><center>Final Premium</center></strong></td>';
                risk_add_name2_length = risk_add_name2.length;
                $.each(risk_add_name2, function(key2, val2) {
                    var risk_desc = risk_add_name2[key2][0];
                    var risk_sum_insured = risk_add_name2[key2][1];
                    var risk_desc_title = risk_add_name2[key2][2];
                    html_risk2 += '<tr><td><center>' + risk_desc_title + '</center></td><td><center>' + risk_sum_insured + '</center></td>';

                    if (key2 == 0)
                        html_risk2 += '<td rowspan="' + risk_add_name2_length + '"><center>' + basic_gross_premium + '</center></td></tr>'
                    // if (key1 == 0)
                    //     html_risk2 += '<td rowspan="' + risk_add_name2_length + '"><center>' + basic_gross_premium + '</center></td></tr>';
                });
                if (key1 == 0) {
                    // tr_rc_description += '<td id="counter_' + key1 + '">' + basic_gross_premium + '</td></tr>';
                    var final_premium_txt = '<span><b>Final Premium : ' + basic_gross_premium + '</b></td>';
                } else {
                    var final_premium_txt = '';
                }
                html_risk2 += ' </table>';
            });
            $("#fire_table").append('<span>' + html_risk_add + '</span>' + header2 + html_risk2);
            // $("#append_risk").append(html_risk);
            // $("#risk_details").append(html_risk);
        }
    }

    function get_company_payment_details(fk_company_id) {
        // alert(company_id_global);
        $("#company_payment_details").empty();
        $("#company_payment_details").append('<div class="form-row mt-1"><div class="col-md-6"><u><strong>Payment Details</strong></u></div><div class="col-md-6 text-right"></div></div><div class="form-row mt-2"><div class="col-md-2"><u><strong class="text-info">Online</strong></u></div> </div><div class="form-row mt-2"><div class="col-md-6"><div class="form-group row"><label for="online_link" class="col-form-label col-md-4 text-right">Link : </label><div class="col-form-label col-md-8" id="online_link"></div></div></div><div class="col-md-6"><div class="form-group row"><label for="online_steps" class="col-form-label col-md-4 text-right">Payment Steps : </label><div class="col-form-label col-md-8" id="online_steps"></div></div> </div></div><hr><div class="form-row mt-2"><div class="col-md-2"><u><strong class="text-info">Cheque</strong></u></div></div><div class="form-row mt-2"><div class="col-md-6"><div class="form-group row"><label for="name_on_cheque" class="col-form-label col-md-4 text-right">Name on Cheque : </label><div class="col-form-label col-md-8" id="name_on_cheque"></div></div></div><div class="col-md-6"><div class="form-group row"><label for="courier_address" class="col-form-label col-md-4 text-right">Courier Address : </label> <div class="col-form-label col-md-8" id="courier_address"></div></div> </div> </div><hr><div class="form-row mt-2"><div class="col-md-2"><u><strong class="text-info">NEFT / IMPS / RTGS</strong></u></div> <div class="col-md-12 mt-2" id="neft_imps_riggs_details"></div> </div>');

        var url = "<?php echo $base_url; ?>master/policy/get_company_payment_details";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    'company_id': fk_company_id
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},

                success: function(data) {
                    if (data["status"] == true) {

                        var cheque_name = data["userdata"].cheque_name;
                        // alert(cheque_name);
                        $("#name_on_cheque").text(cheque_name);

                        var courier_address = data["userdata"].courier_address;
                        $("#courier_address").text(courier_address);

                        var payment_link = data["userdata"].payment_link;
                        $("#online_payment_links").text(payment_link);
                        $("#online_payment_link").attr("href", "" + payment_link);

                        var payment_steps = data["userdata"].payment_steps;
                        payment_steps = (payment_steps + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + "<br/>" + '$2');
                        $("#online_payment_steps").html(payment_steps);

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
                            account_tr_1 = '<tr><td><center>' + account_holder_name + '</center></td><td><center>' + account_number + '</center></td> <td><center>' + bank_name + '</center></td><td><center>' + branch_name + '</center></td><td><center>' + ifsc_code + '</center></td><td><center>' + micr_code + '</center></td></tr>';

                        if (account_holder_name_1 != "")
                            account_tr_2 = '<tr><td><center>' + account_holder_name_1 + '</center></td><td><center>' + account_number_1 + '</center></td> <td><center>' + bank_name_1 + '</center></td><td><center>' + branch_name_1 + '</center></td><td><center>' + ifsc_code_1 + '</center></td><td><center>' + micr_code_1 + '</center></td></tr>';


                        var account_details = '<table class="table mb-0 mt-1 table-bordered"><tdead><tr><td> <center>Account Holder</center></td><td><center>Account Number</center></td><td> <center>Bank Name</center> </td><td><center>Branch Name</center> </td><td><center>IFSC Code</center> </td><td> <center>MICR Code</center></td></tr></tdead><tbody id="append_agent">' + account_tr_1 + account_tr_2 + '</tbody></table>';
                        $("#neft_imps_riggs_details").append(account_details);
                    }
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function edit_medi_care_health_care_adv_float_policy(care_health_care_adv_float_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_care_adv_float_json_data = "";
        $("#nominee_details_global").show();
        $("#first_table_tbody").empty();
        $.each(care_health_care_adv_float_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var care_adv_float_id = care_health_care_adv_float_policy_data_arr.care_adv_float_id;
            var care_health_care_adv_float_policy_fk_policy_id = care_health_care_adv_float_policy_data_arr.care_health_care_adv_float_policy_fk_policy_id;
            var fk_policy_type_id = care_health_care_adv_float_policy_data_arr.fk_policy_type_id;
            var policy_type_title = care_health_care_adv_float_policy_data_arr.policy_type_title;
            var fk_company_id = care_health_care_adv_float_policy_data_arr.fk_company_id;
            var fk_department_id = care_health_care_adv_float_policy_data_arr.fk_department_id;

            total_care_adv_float_json_data = JSON.parse(care_health_care_adv_float_policy_data_arr.total_care_adv_float_json_data);

            var medi_final_premium = care_health_care_adv_float_policy_data_arr.medi_final_premium;
            var max_age = care_health_care_adv_float_policy_data_arr.max_age;
            var star_health_status = care_health_care_adv_float_policy_data_arr.star_health_status;
            var star_health_del_flag = care_health_care_adv_float_policy_data_arr.star_health_del_flag;

            $("#medi_final_premium").text(medi_final_premium);
            $("#max_age").text(max_age);
            $("#care_adv_float_id ").text(care_adv_float_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var medi_care_health_tr = "";
        var add_care_adv_counter = "";
        var index = "";
        var Family_size_count = total_care_adv_float_json_data.length;
        member_id_global = "";
        $.each(total_care_adv_float_json_data, function(key, val) {
            add_care_adv_counter = key;
            // main_Care_Advantage.push(add_care_adv_counter);
            index = total_care_adv_float_json_data[key][0];
            var name_insured_member_name = total_care_adv_float_json_data[key][1];
            var name_insured_member_name_txt = total_care_adv_float_json_data[key][2];
            var name_insured_dob = total_care_adv_float_json_data[key][3];
            var name_insured_age = total_care_adv_float_json_data[key][4];
            var name_insured_relation = total_care_adv_float_json_data[key][5];
            var name_insured_relation_txt = total_care_adv_float_json_data[key][6];
            var nominee_name = total_care_adv_float_json_data[0][7];
            var nominee_name_txt = total_care_adv_float_json_data[0][8];
            var nominee_relation = total_care_adv_float_json_data[0][9];
            var nominee_relation_txt = total_care_adv_float_json_data[0][10];
            var name_insured_sum_insured = total_care_adv_float_json_data[0][11];
            var basic_premium = total_care_adv_float_json_data[0][12];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td>';

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            if (add_care_adv_counter == 0) {
                nominee_table_body += ' <tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';
                policy_member_table_tbody += '<td rowspan="' + Family_size_count + '">' + name_insured_sum_insured + '</td><td rowspan="' + Family_size_count + '"> ' + basic_gross_premium + '</td></tr>';
            }

        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);
    }

    function edit_medi_care_health_care_float_policy(care_health_care_float_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_care_float_json_data = "";
        var final_premium = "";
        $("#nominee_details_global").show();
        $("#first_table_tbody").empty();
        $.each(care_health_care_float_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var care_float_id = care_health_care_float_policy_data_arr.care_float_id;
            var care_health_care_float_policy_fk_policy_id = care_health_care_float_policy_data_arr.care_health_care_float_policy_fk_policy_id;
            var fk_policy_type_id = care_health_care_float_policy_data_arr.fk_policy_type_id;
            var policy_type_title = care_health_care_float_policy_data_arr.policy_type_title;
            var fk_company_id = care_health_care_float_policy_data_arr.fk_company_id;
            var fk_department_id = care_health_care_float_policy_data_arr.fk_department_id;

            total_care_float_json_data = JSON.parse(care_health_care_float_policy_data_arr.total_care_float_json_data);

            final_premium = care_health_care_float_policy_data_arr.medi_final_premium;
            var max_age = care_health_care_float_policy_data_arr.max_age;
            var star_health_status = care_health_care_float_policy_data_arr.star_health_status;
            var star_health_del_flag = care_health_care_float_policy_data_arr.star_health_del_flag;

            $("#medi_final_premium").text(final_premium);
            $("#max_age").text(max_age);
            $("#care_float_id ").text(care_float_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var add_care_adv_counter = "";
        var index = "";
        var Family_size_count = total_care_float_json_data.length;
        var name_insured_sum_insured = "";
        member_id_global = "";
        $.each(total_care_float_json_data, function(key, val) {
            add_care_adv_counter = key;
            index = total_care_float_json_data[key][0];
            var name_insured_member_name = total_care_float_json_data[key][1];
            var name_insured_member_name_txt = total_care_float_json_data[key][2];
            var name_insured_dob = total_care_float_json_data[key][3];
            var name_insured_age = total_care_float_json_data[key][4];
            var name_insured_relation = total_care_float_json_data[key][5];
            var name_insured_relation_txt = total_care_float_json_data[key][6];
            var nominee_name = total_care_float_json_data[0][7];
            var nominee_name_txt = total_care_float_json_data[0][8];
            var nominee_relation = total_care_float_json_data[0][9];
            var nominee_relation_txt = total_care_float_json_data[0][10];
            name_insured_sum_insured = total_care_float_json_data[0][11];
            var basic_premium = total_care_float_json_data[0][12];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td>';

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            if (add_care_adv_counter == 0) {
                nominee_table_body += '<tr> <td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';
                policy_member_table_tbody += '<td rowspan="' + Family_size_count + '">' + name_insured_sum_insured + '</td><td rowspan="' + Family_size_count + '"> ' + basic_gross_premium + '</td></tr>';
            }

        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td rowspan="' + Family_size_count + '">' + basic_sum_insured + '</td><td rowspan="' + Family_size_count + '">' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);
    }

    function edit_medi_ind_care_health_care_adv_ind_policy(care_health_care_adv_ind_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_care_adv_ind_json_data = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $.each(care_health_care_adv_ind_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var care_adv_ind_id = care_health_care_adv_ind_policy_data_arr.care_adv_ind_id;
            var care_health_care_adv_ind_policy_fk_policy_id = care_health_care_adv_ind_policy_data_arr.care_health_care_adv_ind_policy_fk_policy_id;
            var fk_policy_type_id = care_health_care_adv_ind_policy_data_arr.fk_policy_type_id;
            var policy_type_title = care_health_care_adv_ind_policy_data_arr.policy_type_title;
            var fk_company_id = care_health_care_adv_ind_policy_data_arr.fk_company_id;
            var fk_department_id = care_health_care_adv_ind_policy_data_arr.fk_department_id;

            total_care_adv_ind_json_data = JSON.parse(care_health_care_adv_ind_policy_data_arr.total_care_adv_ind_json_data);

            var medi_final_premium = care_health_care_adv_ind_policy_data_arr.medi_final_premium;
            var star_health_status = care_health_care_adv_ind_policy_data_arr.star_health_status;
            var star_health_del_flag = care_health_care_adv_ind_policy_data_arr.star_health_del_flag;

            $("#medi_final_premium").text(medi_final_premium);
            $("#care_adv_ind_id ").text(care_adv_ind_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var medi_care_health_tr = "";
        var add_care_adv_counter = "";
        var index = "";
        var care_health_care_adv_medi_length = total_care_adv_ind_json_data.length;
        member_id_global = "";
        $.each(total_care_adv_ind_json_data, function(key, val) {
            add_care_adv_counter = key;
            // main_Care_Advantage.push(add_care_adv_counter);
            index = total_care_adv_ind_json_data[key][0];
            var name_insured_member_name = total_care_adv_ind_json_data[key][1];
            var name_insured_member_name_txt = total_care_adv_ind_json_data[key][2];
            var name_insured_dob = total_care_adv_ind_json_data[key][3];
            var name_insured_age = total_care_adv_ind_json_data[key][4];
            var name_insured_relation = total_care_adv_ind_json_data[key][5];
            var name_insured_relation_txt = total_care_adv_ind_json_data[key][6];
            var nominee_name = total_care_adv_ind_json_data[key][7];
            var nominee_name_txt = total_care_adv_ind_json_data[key][8];
            var nominee_relation = total_care_adv_ind_json_data[key][9];
            var nominee_relation_txt = total_care_adv_ind_json_data[key][10];
            var name_insured_sum_insured = total_care_adv_ind_json_data[key][11];
            var basic_premium = total_care_adv_ind_json_data[key][12];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td><td>' + name_insured_sum_insured + '</td>';

            nominee_table_body += '<tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';

            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + care_health_care_adv_medi_length + '"> ' + basic_gross_premium + '</td></tr>';

        });
        $("#Add_Care_Advantage").attr("onClick", "AddCareAdvantage(" + (care_health_care_adv_medi_length) + ")");
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);
    }

    function edit_medi_ind_care_health_care_ind_policy(care_health_care_ind_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_care_ind_json_data = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $.each(care_health_care_ind_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var care_ind_id = care_health_care_ind_policy_data_arr.care_ind_id;
            var care_health_care_ind_policy_fk_policy_id = care_health_care_ind_policy_data_arr.care_health_care_ind_policy_fk_policy_id;
            var fk_policy_type_id = care_health_care_ind_policy_data_arr.fk_policy_type_id;
            var policy_type_title = care_health_care_ind_policy_data_arr.policy_type_title;
            var fk_company_id = care_health_care_ind_policy_data_arr.fk_company_id;
            var fk_department_id = care_health_care_ind_policy_data_arr.fk_department_id;

            total_care_ind_json_data = JSON.parse(care_health_care_ind_policy_data_arr.total_care_ind_json_data);

            var medi_final_premium = care_health_care_ind_policy_data_arr.medi_final_premium;
            var star_health_status = care_health_care_ind_policy_data_arr.star_health_status;
            var star_health_del_flag = care_health_care_ind_policy_data_arr.star_health_del_flag;

            $("#medi_final_premium").text(medi_final_premium);
            $("#care_ind_id ").text(care_ind_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var add_care_counter = "";
        var index = "";
        var care_health_care_medi_length = total_care_ind_json_data.length;
        member_id_global = "";
        $.each(total_care_ind_json_data, function(key, val) {
            add_care_counter = key;
            // main_Care.push(add_care_counter);
            index = total_care_ind_json_data[key][0];
            var name_insured_member_name = total_care_ind_json_data[key][1];
            var name_insured_member_name_txt = total_care_ind_json_data[key][2];
            var name_insured_dob = total_care_ind_json_data[key][3];
            var name_insured_age = total_care_ind_json_data[key][4];
            var name_insured_relation = total_care_ind_json_data[key][5];
            var name_insured_relation_txt = total_care_ind_json_data[key][6];
            var nominee_name = total_care_ind_json_data[key][7];
            var nominee_name_txt = total_care_ind_json_data[key][8];
            var nominee_relation = total_care_ind_json_data[key][9];
            var nominee_relation_txt = total_care_ind_json_data[key][10];
            var name_insured_sum_insured = total_care_ind_json_data[key][11];
            var basic_premium = total_care_ind_json_data[key][12];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td><td>' + name_insured_sum_insured + '</td>';

            nominee_table_body += '<tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';

            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + care_health_care_medi_length + '"> ' + basic_gross_premium + '</td></tr>';

        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#Add_Care").attr("onClick", "AddCare(" + (care_health_care_medi_length) + ")");
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);
    }

    function edit_medi_ind_star_health_Supertopup_policy(medi_star_health_allied_supertopup_ind_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_star_health_supertopup_ind_json_data = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $(".policy_section").show();
        $.each(medi_star_health_allied_supertopup_ind_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var medi_star_health_super_ind_policy_id = medi_star_health_allied_supertopup_ind_policy_data_arr.medi_star_health_super_ind_policy_id;
            var star_health_allied_insu_super_ind_policy_fk_policy_id = medi_star_health_allied_supertopup_ind_policy_data_arr.star_health_allied_insu_super_ind_policy_fk_policy_id;
            var fk_policy_type_id = medi_star_health_allied_supertopup_ind_policy_data_arr.fk_policy_type_id;
            var policy_type_title = medi_star_health_allied_supertopup_ind_policy_data_arr.policy_type_title;
            var fk_company_id = medi_star_health_allied_supertopup_ind_policy_data_arr.fk_company_id;
            var fk_department_id = medi_star_health_allied_supertopup_ind_policy_data_arr.fk_department_id;

            total_star_health_supertopup_ind_json_data = JSON.parse(medi_star_health_allied_supertopup_ind_policy_data_arr.total_star_health_supertopup_ind_json_data);

            var tot_premium = medi_star_health_allied_supertopup_ind_policy_data_arr.tot_premium;
            var medi_cgst_rate = medi_star_health_allied_supertopup_ind_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_star_health_allied_supertopup_ind_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_star_health_allied_supertopup_ind_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_star_health_allied_supertopup_ind_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_star_health_allied_supertopup_ind_policy_data_arr.medi_final_premium;
            var star_health_status = medi_star_health_allied_supertopup_ind_policy_data_arr.star_health_status;
            var star_health_del_flag = medi_star_health_allied_supertopup_ind_policy_data_arr.star_health_del_flag;

            $("#tot_premium").text(tot_premium);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
            $("#medi_star_health_super_ind_policy_id ").text(medi_star_health_super_ind_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var medi_star_health_tr = "";
        var add_medi_starHealth_counter = "";
        var index = "";
        var star_health_supertopup_medi_length = total_star_health_supertopup_ind_json_data.length;
        member_id_global = "";
        $.each(total_star_health_supertopup_ind_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            index = total_star_health_supertopup_ind_json_data[key][0];
            var name_insured_member_name = total_star_health_supertopup_ind_json_data[key][1];
            var name_insured_member_name_txt = total_star_health_supertopup_ind_json_data[key][2];
            var name_insured_dob = total_star_health_supertopup_ind_json_data[key][3];
            var name_insured_age = total_star_health_supertopup_ind_json_data[key][4];
            var name_insured_relation = total_star_health_supertopup_ind_json_data[key][5];
            var name_insured_relation_txt = total_star_health_supertopup_ind_json_data[key][6];
            var nominee_name = total_star_health_supertopup_ind_json_data[key][7];
            var nominee_name_txt = total_star_health_supertopup_ind_json_data[key][8];
            var nominee_relation = total_star_health_supertopup_ind_json_data[key][9];
            var nominee_relation_txt = total_star_health_supertopup_ind_json_data[key][10];
            var type_of_policy = total_star_health_supertopup_ind_json_data[key][11];
            var deductible_prem = total_star_health_supertopup_ind_json_data[key][12];
            var name_insured_sum_insured = total_star_health_supertopup_ind_json_data[key][13];
            var basic_premium = total_star_health_supertopup_ind_json_data[key][14];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (type_of_policy == undefined || type_of_policy == "Null" || type_of_policy == "null" || type_of_policy == "")
                type_of_policy = "";

            if (deductible_prem == undefined || deductible_prem == "Null" || deductible_prem == "null" || deductible_prem == "")
                deductible_prem = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td> <td>' + type_of_policy + '</td> <td>' + name_insured_sum_insured + '</td>';

            nominee_table_body += '<tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';

            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + star_health_supertopup_medi_length + '"> ' + basic_gross_premium + '</td></tr>';

        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);

    }

    function edit_medi_float_star_health_Supertopup_policy(medi_star_health_allied_supertopup_float_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_star_health_supertopup_float_json_data = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $(".policy_section").show();
        $.each(medi_star_health_allied_supertopup_float_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var medi_star_health_super_float_policy_id = medi_star_health_allied_supertopup_float_policy_data_arr.medi_star_health_super_float_policy_id;
            var star_health_allied_insu_super_float_policy_fk_policy_id = medi_star_health_allied_supertopup_float_policy_data_arr.star_health_allied_insu_super_float_policy_fk_policy_id;
            var fk_policy_type_id = medi_star_health_allied_supertopup_float_policy_data_arr.fk_policy_type_id;
            var policy_type_title = medi_star_health_allied_supertopup_float_policy_data_arr.policy_type_title;
            var fk_company_id = medi_star_health_allied_supertopup_float_policy_data_arr.fk_company_id;
            var fk_department_id = medi_star_health_allied_supertopup_float_policy_data_arr.fk_department_id;

            total_star_health_supertopup_float_json_data = JSON.parse(medi_star_health_allied_supertopup_float_policy_data_arr.total_star_health_supertopup_float_json_data);

            var tot_premium = medi_star_health_allied_supertopup_float_policy_data_arr.tot_premium;
            var medi_cgst_rate = medi_star_health_allied_supertopup_float_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_star_health_allied_supertopup_float_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_star_health_allied_supertopup_float_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_star_health_allied_supertopup_float_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_star_health_allied_supertopup_float_policy_data_arr.medi_final_premium;
            var max_age = medi_star_health_allied_supertopup_float_policy_data_arr.max_age;
            var star_health_status = medi_star_health_allied_supertopup_float_policy_data_arr.star_health_status;
            var star_health_del_flag = medi_star_health_allied_supertopup_float_policy_data_arr.star_health_del_flag;

            $("#tot_premium").text(tot_premium);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
            $("#max_age").text(max_age);
            $("#medi_star_health_super_float_policy_id").text(medi_star_health_super_float_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var type_of_policy = "";
        var medi_star_health_tr = "";
        var add_medi_starHealth_counter = "";
        var index = "";
        var Family_size_count = total_star_health_supertopup_float_json_data.length;
        member_id_global = "";
        $.each(total_star_health_supertopup_float_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            // main_SuperTopUp_starHealth.push(add_medi_starHealth_counter);
            index = total_star_health_supertopup_float_json_data[key][0];
            var name_insured_member_name = total_star_health_supertopup_float_json_data[key][1];
            var name_insured_member_name_txt = total_star_health_supertopup_float_json_data[key][2];
            var name_insured_dob = total_star_health_supertopup_float_json_data[key][3];
            var name_insured_age = total_star_health_supertopup_float_json_data[key][4];
            var name_insured_relation = total_star_health_supertopup_float_json_data[key][5];
            var name_insured_relation_txt = total_star_health_supertopup_float_json_data[key][6];
            var nominee_name = total_star_health_supertopup_float_json_data[0][7];
            var nominee_name_txt = total_star_health_supertopup_float_json_data[0][8];
            var nominee_relation = total_star_health_supertopup_float_json_data[0][9];
            var nominee_relation_txt = total_star_health_supertopup_float_json_data[0][10];
            type_of_policy = total_star_health_supertopup_float_json_data[0][11];
            var deductible_prem = total_star_health_supertopup_float_json_data[0][12];
            var name_insured_sum_insured = total_star_health_supertopup_float_json_data[0][13];
            var basic_premium = total_star_health_supertopup_float_json_data[0][14];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (type_of_policy == undefined || type_of_policy == "Null" || type_of_policy == "null" || type_of_policy == "")
                type_of_policy = "";

            if (deductible_prem == undefined || deductible_prem == "Null" || deductible_prem == "null" || deductible_prem == "")
                deductible_prem = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td>';

            if (add_medi_starHealth_counter == 0) {
                type_of_policy = '<td>' + type_of_policy + '</td>';
                nominee_table_body += '<tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';
                policy_member_table_tbody += '<td rowspan="' + Family_size_count + '">' + type_of_policy + '</td><td rowspan="' + Family_size_count + '">' + name_insured_sum_insured + '</td><td rowspan="' + Family_size_count + '"> ' + basic_gross_premium + '</td></tr>';
            }
        });
        // policy_member_table_tbody = policy_member_table_tbody + type_of_policy + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);
    }

    function edit_medi_ind_star_health_Comprehensive_policy(medi_star_health_allied_comprehensive_ind_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_star_health_comprehensive_medi_ind_json_data = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $.each(medi_star_health_allied_comprehensive_ind_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var medi_star_health_comp_ind_policy_id = medi_star_health_allied_comprehensive_ind_policy_data_arr.medi_star_health_comp_ind_policy_id;
            var star_health_allied_insu_comp_ind_policy_fk_policy_id = medi_star_health_allied_comprehensive_ind_policy_data_arr.star_health_allied_insu_comp_ind_policy_fk_policy_id;
            var fk_policy_type_id = medi_star_health_allied_comprehensive_ind_policy_data_arr.fk_policy_type_id;
            var policy_type_title = medi_star_health_allied_comprehensive_ind_policy_data_arr.policy_type_title;
            var fk_company_id = medi_star_health_allied_comprehensive_ind_policy_data_arr.fk_company_id;
            var fk_department_id = medi_star_health_allied_comprehensive_ind_policy_data_arr.fk_department_id;

            total_star_health_comprehensive_medi_ind_json_data = JSON.parse(medi_star_health_allied_comprehensive_ind_policy_data_arr.total_star_health_comprehensive_medi_ind_json_data);

            var years_of_premium = medi_star_health_allied_comprehensive_ind_policy_data_arr.years_of_premium;
            var tot_premium = medi_star_health_allied_comprehensive_ind_policy_data_arr.tot_premium;
            var medi_cgst_rate = medi_star_health_allied_comprehensive_ind_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_star_health_allied_comprehensive_ind_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_star_health_allied_comprehensive_ind_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_star_health_allied_comprehensive_ind_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_star_health_allied_comprehensive_ind_policy_data_arr.medi_final_premium;
            var star_health_status = medi_star_health_allied_comprehensive_ind_policy_data_arr.star_health_status;
            var star_health_del_flag = medi_star_health_allied_comprehensive_ind_policy_data_arr.star_health_del_flag;

            $("#years_of_premium").text(years_of_premium);
            $("#tot_premium").text(tot_premium);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
            $("#medi_star_health_comp_ind_policy_id ").text(medi_star_health_comp_ind_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var medi_star_health_tr = "";
        var add_medi_starHealth_counter = "";
        var index = "";
        var star_health_red_carpet_medi_length = total_star_health_comprehensive_medi_ind_json_data.length;
        member_id_global = "";
        $.each(total_star_health_comprehensive_medi_ind_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            // main_Mediclaim_starHealth.push(add_medi_starHealth_counter);
            index = total_star_health_comprehensive_medi_ind_json_data[key][0];
            var name_insured_member_name = total_star_health_comprehensive_medi_ind_json_data[key][1];
            var name_insured_member_name_txt = total_star_health_comprehensive_medi_ind_json_data[key][2];
            var name_insured_dob = total_star_health_comprehensive_medi_ind_json_data[key][3];
            var name_insured_age = total_star_health_comprehensive_medi_ind_json_data[key][4];
            var name_insured_relation = total_star_health_comprehensive_medi_ind_json_data[key][5];
            var name_insured_relation_txt = total_star_health_comprehensive_medi_ind_json_data[key][6];
            var nominee_name = total_star_health_comprehensive_medi_ind_json_data[key][7];
            var nominee_name_txt = total_star_health_comprehensive_medi_ind_json_data[key][8];
            var nominee_relation = total_star_health_comprehensive_medi_ind_json_data[key][9];
            var nominee_relation_txt = total_star_health_comprehensive_medi_ind_json_data[key][10];
            var name_insured_sum_insured = total_star_health_comprehensive_medi_ind_json_data[key][11];
            var basic_premium = total_star_health_comprehensive_medi_ind_json_data[key][12];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td><td>' + name_insured_sum_insured + '</td>';

            nominee_table_body += '<tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';

            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + star_health_red_carpet_medi_length + '"> ' + basic_gross_premium + '</td></tr>';

        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);

    }

    function edit_medi_float_star_health_Comprehensive_policy(medi_star_health_allied_comprehensive_float_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_star_health_comprehensive_medi_float_json_data = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $.each(medi_star_health_allied_comprehensive_float_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var medi_star_health_comp_float_policy_id = medi_star_health_allied_comprehensive_float_policy_data_arr.medi_star_health_comp_float_policy_id;
            var star_health_allied_insu_comp_float_policy_fk_policy_id = medi_star_health_allied_comprehensive_float_policy_data_arr.star_health_allied_insu_comp_float_policy_fk_policy_id;
            var fk_policy_type_id = medi_star_health_allied_comprehensive_float_policy_data_arr.fk_policy_type_id;
            var policy_type_title = medi_star_health_allied_comprehensive_float_policy_data_arr.policy_type_title;
            var fk_company_id = medi_star_health_allied_comprehensive_float_policy_data_arr.fk_company_id;
            var fk_department_id = medi_star_health_allied_comprehensive_float_policy_data_arr.fk_department_id;

            total_star_health_comprehensive_medi_float_json_data = JSON.parse(medi_star_health_allied_comprehensive_float_policy_data_arr.total_star_health_comprehensive_medi_float_json_data);

            var years_of_premium = medi_star_health_allied_comprehensive_float_policy_data_arr.years_of_premium;
            var tot_premium = medi_star_health_allied_comprehensive_float_policy_data_arr.tot_premium;
            var medi_cgst_rate = medi_star_health_allied_comprehensive_float_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_star_health_allied_comprehensive_float_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_star_health_allied_comprehensive_float_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_star_health_allied_comprehensive_float_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_star_health_allied_comprehensive_float_policy_data_arr.medi_final_premium;
            var max_age = medi_star_health_allied_comprehensive_float_policy_data_arr.max_age;
            var star_health_status = medi_star_health_allied_comprehensive_float_policy_data_arr.star_health_status;
            var star_health_del_flag = medi_star_health_allied_comprehensive_float_policy_data_arr.star_health_del_flag;

            $("#years_of_premium").text(years_of_premium);
            $("#tot_premium").text(tot_premium);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
            $("#max_age").text(max_age);
            $("#medi_star_health_comp_float_policy_id").text(medi_star_health_comp_float_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var medi_star_health_tr = "";
        var add_medi_starHealth_counter = "";
        var index = "";
        var Family_size_count = total_star_health_comprehensive_medi_float_json_data.length;
        member_id_global = "";
        $.each(total_star_health_comprehensive_medi_float_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            // main_Mediclaim_starHealth.push(add_medi_starHealth_counter);
            index = total_star_health_comprehensive_medi_float_json_data[key][0];
            var name_insured_member_name = total_star_health_comprehensive_medi_float_json_data[key][1];
            var name_insured_member_name_txt = total_star_health_comprehensive_medi_float_json_data[key][2];
            var name_insured_dob = total_star_health_comprehensive_medi_float_json_data[key][3];
            var name_insured_age = total_star_health_comprehensive_medi_float_json_data[key][4];
            var name_insured_relation = total_star_health_comprehensive_medi_float_json_data[key][5];
            var name_insured_relation_txt = total_star_health_comprehensive_medi_float_json_data[key][6];
            var nominee_name = total_star_health_comprehensive_medi_float_json_data[0][7];
            var nominee_name_txt = total_star_health_comprehensive_medi_float_json_data[0][8];
            var nominee_relation = total_star_health_comprehensive_medi_float_json_data[0][9];
            var nominee_relation_txt = total_star_health_comprehensive_medi_float_json_data[0][10];
            var name_insured_sum_insured = total_star_health_comprehensive_medi_float_json_data[0][11];
            var basic_premium = total_star_health_comprehensive_medi_float_json_data[0][12];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td>';

            if (add_medi_starHealth_counter == 0) {
                nominee_table_body += '<tr> <td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';
                policy_member_table_tbody += '<td rowspan="' + Family_size_count + '">' + name_insured_sum_insured + '</td><td rowspan="' + Family_size_count + '"> ' + basic_gross_premium + '</td></tr>';
            }
        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);

    }

    function edit_medi_ind_star_health_red_arpet_policy(medi_star_health_allied_red_carpet_ind_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_star_health_red_carpet_medi_ind_json_data = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $.each(medi_star_health_allied_red_carpet_ind_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var medi_star_health_ind_policy_id = medi_star_health_allied_red_carpet_ind_policy_data_arr.medi_star_health_ind_policy_id;
            var star_health_allied_insu_red_carpet_ind_policy_fk_policy_id = medi_star_health_allied_red_carpet_ind_policy_data_arr.star_health_allied_insu_red_carpet_ind_policy_fk_policy_id;
            var fk_policy_type_id = medi_star_health_allied_red_carpet_ind_policy_data_arr.fk_policy_type_id;
            var policy_type_title = medi_star_health_allied_red_carpet_ind_policy_data_arr.policy_type_title;
            var fk_company_id = medi_star_health_allied_red_carpet_ind_policy_data_arr.fk_company_id;
            var fk_department_id = medi_star_health_allied_red_carpet_ind_policy_data_arr.fk_department_id;

            total_star_health_red_carpet_medi_ind_json_data = JSON.parse(medi_star_health_allied_red_carpet_ind_policy_data_arr.total_star_health_red_carpet_medi_ind_json_data);

            var years_of_premium = medi_star_health_allied_red_carpet_ind_policy_data_arr.years_of_premium;
            var tot_premium = medi_star_health_allied_red_carpet_ind_policy_data_arr.tot_premium;
            var medi_cgst_rate = medi_star_health_allied_red_carpet_ind_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_star_health_allied_red_carpet_ind_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_star_health_allied_red_carpet_ind_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_star_health_allied_red_carpet_ind_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_star_health_allied_red_carpet_ind_policy_data_arr.medi_final_premium;
            var star_health_status = medi_star_health_allied_red_carpet_ind_policy_data_arr.star_health_status;
            var star_health_del_flag = medi_star_health_allied_red_carpet_ind_policy_data_arr.star_health_del_flag;

            $("#years_of_premium").text(years_of_premium);
            $("#tot_premium").text(tot_premium);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
            $("#medi_star_health_ind_policy_id ").text(medi_star_health_ind_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var medi_star_health_tr = "";
        var add_medi_starHealth_counter = "";
        var index = "";
        var star_health_red_carpet_medi_length = total_star_health_red_carpet_medi_ind_json_data.length;
        member_id_global = "";
        $.each(total_star_health_red_carpet_medi_ind_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            // main_Mediclaim_starHealth.push(add_medi_starHealth_counter);
            index = total_star_health_red_carpet_medi_ind_json_data[key][0];
            var name_insured_member_name = total_star_health_red_carpet_medi_ind_json_data[key][1];
            var name_insured_member_name_txt = total_star_health_red_carpet_medi_ind_json_data[key][2];
            var name_insured_dob = total_star_health_red_carpet_medi_ind_json_data[key][3];
            var name_insured_age = total_star_health_red_carpet_medi_ind_json_data[key][4];
            var name_insured_relation = total_star_health_red_carpet_medi_ind_json_data[key][5];
            var name_insured_relation_txt = total_star_health_red_carpet_medi_ind_json_data[key][6];
            var nominee_name = total_star_health_red_carpet_medi_ind_json_data[key][7];
            var nominee_name_txt = total_star_health_red_carpet_medi_ind_json_data[key][8];
            var nominee_relation = total_star_health_red_carpet_medi_ind_json_data[key][9];
            var nominee_relation_txt = total_star_health_red_carpet_medi_ind_json_data[key][10];
            var name_insured_sum_insured = total_star_health_red_carpet_medi_ind_json_data[key][11];
            var basic_premium = total_star_health_red_carpet_medi_ind_json_data[key][12];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td><td>' + name_insured_sum_insured + '</td>';

            nominee_table_body += '<tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';

            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + star_health_red_carpet_medi_length + '"> ' + basic_gross_premium + '</td></tr>';

        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);

    }

    function edit_medi_float_star_health_red_arpet_policy(medi_star_health_allied_red_carpet_float_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_star_health_red_carpet_medi_float_json_data = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $.each(medi_star_health_allied_red_carpet_float_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var medi_star_health_float_policy_id = medi_star_health_allied_red_carpet_float_policy_data_arr.medi_star_health_float_policy_id;
            var star_health_allied_insu_red_carpet_float_policy_fk_policy_id = medi_star_health_allied_red_carpet_float_policy_data_arr.star_health_allied_insu_red_carpet_float_policy_fk_policy_id;
            var fk_policy_type_id = medi_star_health_allied_red_carpet_float_policy_data_arr.fk_policy_type_id;
            var policy_type_title = medi_star_health_allied_red_carpet_float_policy_data_arr.policy_type_title;
            var fk_company_id = medi_star_health_allied_red_carpet_float_policy_data_arr.fk_company_id;
            var fk_department_id = medi_star_health_allied_red_carpet_float_policy_data_arr.fk_department_id;

            total_star_health_red_carpet_medi_float_json_data = JSON.parse(medi_star_health_allied_red_carpet_float_policy_data_arr.total_star_health_red_carpet_medi_float_json_data);

            var years_of_premium = medi_star_health_allied_red_carpet_float_policy_data_arr.years_of_premium;
            var tot_premium = medi_star_health_allied_red_carpet_float_policy_data_arr.tot_premium;
            var medi_cgst_rate = medi_star_health_allied_red_carpet_float_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_star_health_allied_red_carpet_float_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_star_health_allied_red_carpet_float_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_star_health_allied_red_carpet_float_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_star_health_allied_red_carpet_float_policy_data_arr.medi_final_premium;
            var max_age = medi_star_health_allied_red_carpet_float_policy_data_arr.max_age;
            var star_health_status = medi_star_health_allied_red_carpet_float_policy_data_arr.star_health_status;
            var star_health_del_flag = medi_star_health_allied_red_carpet_float_policy_data_arr.star_health_del_flag;

            $("#years_of_premium").text(years_of_premium);
            $("#tot_premium").text(tot_premium);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
            $("#max_age").text(max_age);
            $("#medi_star_health_float_policy_id").text(medi_star_health_float_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var medi_star_health_tr = "";
        var add_medi_starHealth_counter = "";
        var index = "";
        var Family_size_count = total_star_health_red_carpet_medi_float_json_data.length;
        member_id_global = "";
        $.each(total_star_health_red_carpet_medi_float_json_data, function(key, val) {
            add_medi_starHealth_counter = key;
            // main_Mediclaim_starHealth.push(add_medi_starHealth_counter);
            index = total_star_health_red_carpet_medi_float_json_data[key][0];
            var name_insured_member_name = total_star_health_red_carpet_medi_float_json_data[key][1];
            var name_insured_member_name_txt = total_star_health_red_carpet_medi_float_json_data[key][2];
            var name_insured_dob = total_star_health_red_carpet_medi_float_json_data[key][3];
            var name_insured_age = total_star_health_red_carpet_medi_float_json_data[key][4];
            var name_insured_relation = total_star_health_red_carpet_medi_float_json_data[key][5];
            var name_insured_relation_txt = total_star_health_red_carpet_medi_float_json_data[key][6];
            var nominee_name = total_star_health_red_carpet_medi_float_json_data[0][7];
            var nominee_name_txt = total_star_health_red_carpet_medi_float_json_data[0][8];
            var nominee_relation = total_star_health_red_carpet_medi_float_json_data[0][9];
            var nominee_relation_txt = total_star_health_red_carpet_medi_float_json_data[0][10];
            var name_insured_sum_insured = total_star_health_red_carpet_medi_float_json_data[0][11];
            var basic_premium = total_star_health_red_carpet_medi_float_json_data[0][12];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td>';

            if (add_medi_starHealth_counter == 0) {
                nominee_table_body += ' <tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';
                policy_member_table_tbody += '<td rowspan="' + Family_size_count + '">' + name_insured_sum_insured + '</td><td rowspan="' + Family_size_count + '"> ' + basic_gross_premium + '</td></tr>';
            }
        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);

    }

    function edit_medi_ind_max_bupa_reassure_policy(medi_ind_max_bupa_reassure_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_max_bupa_medi_reassure_json_data = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $.each(medi_ind_max_bupa_reassure_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var medi_max_bupa_reassure_ind_policy_id = medi_ind_max_bupa_reassure_policy_data_arr.medi_max_bupa_reassure_ind_policy_id;
            var medi_max_bupa_reassure_ind_policy_fk_policy_id = medi_ind_max_bupa_reassure_policy_data_arr.medi_max_bupa_reassure_ind_policy_fk_policy_id;
            var fk_policy_type_id = medi_ind_max_bupa_reassure_policy_data_arr.fk_policy_type_id;
            var policy_type_title = medi_ind_max_bupa_reassure_policy_data_arr.policy_type_title;
            var fk_company_id = medi_ind_max_bupa_reassure_policy_data_arr.fk_company_id;
            var fk_department_id = medi_ind_max_bupa_reassure_policy_data_arr.fk_department_id;

            total_max_bupa_medi_reassure_json_data = JSON.parse(medi_ind_max_bupa_reassure_policy_data_arr.total_max_bupa_medi_reassure_json_data);

            var years_of_premium = medi_ind_max_bupa_reassure_policy_data_arr.years_of_premium;
            var region = medi_ind_max_bupa_reassure_policy_data_arr.region;
            var first_year_rate = medi_ind_max_bupa_reassure_policy_data_arr.first_year_rate;
            var second_year_rate = medi_ind_max_bupa_reassure_policy_data_arr.second_year_rate;
            var third_year_rate = medi_ind_max_bupa_reassure_policy_data_arr.third_year_rate;
            var first_year_tot = medi_ind_max_bupa_reassure_policy_data_arr.first_year_tot;
            var second_year_tot = medi_ind_max_bupa_reassure_policy_data_arr.second_year_tot;
            var third_year_tot = medi_ind_max_bupa_reassure_policy_data_arr.third_year_tot;
            var tot_term_disc = medi_ind_max_bupa_reassure_policy_data_arr.tot_term_disc;

            $("#years_of_premium").text(years_of_premium);
            $("#region").text(region);
            $("#first_year_rate").text(first_year_rate);
            $("#second_year_rate").text(second_year_rate);
            $("#third_year_rate").text(third_year_rate);
            $("#first_year_tot").text(first_year_tot);
            $("#second_year_tot").text(second_year_tot);
            $("#third_year_tot").text(third_year_tot);
            $("#tot_term_disc").text(tot_term_disc);

            var tot_premium = medi_ind_max_bupa_reassure_policy_data_arr.tot_premium;
            var stand_instu_rate = medi_ind_max_bupa_reassure_policy_data_arr.stand_instu_rate;
            var stand_instu_tot = medi_ind_max_bupa_reassure_policy_data_arr.stand_instu_tot;
            var doctor_disc_per = medi_ind_max_bupa_reassure_policy_data_arr.doctor_disc_per;
            var doctor_disc_tot = medi_ind_max_bupa_reassure_policy_data_arr.doctor_disc_tot;
            var family_disc_per = medi_ind_max_bupa_reassure_policy_data_arr.family_disc_per;
            var family_disc_tot = medi_ind_max_bupa_reassure_policy_data_arr.family_disc_tot;
            var gross_premium_tot = medi_ind_max_bupa_reassure_policy_data_arr.gross_premium_tot;
            var gross_premium_tot_new = medi_ind_max_bupa_reassure_policy_data_arr.gross_premium_tot_new;

            $("#tot_premium").text(tot_premium);
            $("#stand_instu_rate").text(stand_instu_rate);
            $("#stand_instu_tot").text(stand_instu_tot);
            $("#doctor_disc_per").text(doctor_disc_per);
            $("#doctor_disc_tot").text(doctor_disc_tot);
            $("#family_disc_per").text(family_disc_per);
            $("#family_disc_tot").text(family_disc_tot);
            $("#gross_premium_tot").text(gross_premium_tot);
            $("#gross_premium_tot_new").text(gross_premium_tot_new);

            var medi_cgst_rate = medi_ind_max_bupa_reassure_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_ind_max_bupa_reassure_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_ind_max_bupa_reassure_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_ind_max_bupa_reassure_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_ind_max_bupa_reassure_policy_data_arr.medi_final_premium;
            var max_bupa_status = medi_ind_max_bupa_reassure_policy_data_arr.max_bupa_status;
            var max_bupa_del_flag = medi_ind_max_bupa_reassure_policy_data_arr.max_bupa_del_flag;
            // alert(medi_final_premium);

            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
            $("#medi_max_bupa_reassure_ind_policy_id").text(medi_max_bupa_reassure_ind_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var medi_max_bupa_tr = "";
        var add_medi_maxBupa_counter = "";
        var index = "";
        var max_bupa_medi_length = total_max_bupa_medi_reassure_json_data.length;
        // var main_Mediclaim_maxBupa = [];
        member_id_global = "";
        $.each(total_max_bupa_medi_reassure_json_data, function(key, val) {
            // alert(sum_insured_dropdown_val);
            add_medi_maxBupa_counter = key;
            // main_Mediclaim_maxBupa.push(add_medi_maxBupa_counter);
            index = total_max_bupa_medi_reassure_json_data[key][0];
            var name_insured_member_name = total_max_bupa_medi_reassure_json_data[key][1];
            var name_insured_member_name_txt = total_max_bupa_medi_reassure_json_data[key][2];
            var name_insured_dob = total_max_bupa_medi_reassure_json_data[key][3];
            var name_insured_age = total_max_bupa_medi_reassure_json_data[key][4];
            var name_insured_relation = total_max_bupa_medi_reassure_json_data[key][5];
            var name_insured_relation_txt = total_max_bupa_medi_reassure_json_data[key][6];
            var nominee_name = total_max_bupa_medi_reassure_json_data[key][7];
            var nominee_name_txt = total_max_bupa_medi_reassure_json_data[key][8];
            var nominee_relation = total_max_bupa_medi_reassure_json_data[key][9];
            var nominee_relation_txt = total_max_bupa_medi_reassure_json_data[key][10];
            var name_insured_sum_insured = total_max_bupa_medi_reassure_json_data[key][11];
            var basic_premium = total_max_bupa_medi_reassure_json_data[key][12];
            var pab_type = total_max_bupa_medi_reassure_json_data[key][13];
            var pab_prem = total_max_bupa_medi_reassure_json_data[key][14];
            var hospital_cash_type = total_max_bupa_medi_reassure_json_data[key][15];
            var hospital_cash_prem = total_max_bupa_medi_reassure_json_data[key][16];
            var safeguard_benefi_type = total_max_bupa_medi_reassure_json_data[key][17];
            var safeguard_benefi_prem = total_max_bupa_medi_reassure_json_data[key][18];
            var tot_prem = total_max_bupa_medi_reassure_json_data[key][19];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (pab_type == undefined || pab_type == "Null" || pab_type == "null" || pab_type == "")
                pab_type = "";

            if (hospital_cash_type == undefined || hospital_cash_type == "Null" || hospital_cash_type == "null" || hospital_cash_type == "")
                hospital_cash_type = "";

            if (safeguard_benefi_type == undefined || safeguard_benefi_type == "Null" || safeguard_benefi_type == "null" || safeguard_benefi_type == "")
                safeguard_benefi_type = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td><td>' + name_insured_sum_insured + '</td>';

            nominee_table_body += '<tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';

            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + max_bupa_medi_length + '"> ' + basic_gross_premium + '</td></tr>';

        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);

        Term_Discount_table();
    }

    function edit_medi_float_max_bupa_reassure_policy(medi_float_max_bupa_reassure_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_max_bupa_medi_float_reassure_json_data = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $.each(medi_float_max_bupa_reassure_policy_data_arr, function(key_max_bupa, val_max_bupa) {
            var medi_max_bupa_reassure_float_policy_id = medi_float_max_bupa_reassure_policy_data_arr.medi_max_bupa_reassure_float_policy_id;
            var medi_max_bupa_reassure_floater_policy_fk_policy_id = medi_float_max_bupa_reassure_policy_data_arr.medi_max_bupa_reassure_floater_policy_fk_policy_id;
            var fk_policy_type_id = medi_float_max_bupa_reassure_policy_data_arr.fk_policy_type_id;
            var policy_type_title = medi_float_max_bupa_reassure_policy_data_arr.policy_type_title;
            var fk_company_id = medi_float_max_bupa_reassure_policy_data_arr.fk_company_id;
            var fk_department_id = medi_float_max_bupa_reassure_policy_data_arr.fk_department_id;

            total_max_bupa_medi_float_reassure_json_data = JSON.parse(medi_float_max_bupa_reassure_policy_data_arr.total_max_bupa_medi_float_reassure_json_data);

            var years_of_premium = medi_float_max_bupa_reassure_policy_data_arr.years_of_premium;
            var region = medi_float_max_bupa_reassure_policy_data_arr.region;
            var first_year_rate = medi_float_max_bupa_reassure_policy_data_arr.first_year_rate;
            var second_year_rate = medi_float_max_bupa_reassure_policy_data_arr.second_year_rate;
            var third_year_rate = medi_float_max_bupa_reassure_policy_data_arr.third_year_rate;
            var first_year_tot = medi_float_max_bupa_reassure_policy_data_arr.first_year_tot;
            var second_year_tot = medi_float_max_bupa_reassure_policy_data_arr.second_year_tot;
            var third_year_tot = medi_float_max_bupa_reassure_policy_data_arr.third_year_tot;
            var tot_term_disc = medi_float_max_bupa_reassure_policy_data_arr.tot_term_disc;

            $("#years_of_premium").text(years_of_premium);
            $("#region").text(region);
            $("#first_year_rate").text(first_year_rate);
            $("#second_year_rate").text(second_year_rate);
            $("#third_year_rate").text(third_year_rate);
            $("#first_year_tot").text(first_year_tot);
            $("#second_year_tot").text(second_year_tot);
            $("#third_year_tot").text(third_year_tot);
            $("#tot_term_disc").text(tot_term_disc);

            var tot_premium = medi_float_max_bupa_reassure_policy_data_arr.tot_premium;
            var stand_instu_rate = medi_float_max_bupa_reassure_policy_data_arr.stand_instu_rate;
            var stand_instu_tot = medi_float_max_bupa_reassure_policy_data_arr.stand_instu_tot;
            var doctor_disc_per = medi_float_max_bupa_reassure_policy_data_arr.doctor_disc_per;
            var doctor_disc_tot = medi_float_max_bupa_reassure_policy_data_arr.doctor_disc_tot;
            var gross_premium_tot = medi_float_max_bupa_reassure_policy_data_arr.gross_premium_tot;
            var gross_premium_tot_new = medi_float_max_bupa_reassure_policy_data_arr.gross_premium_tot_new;

            $("#tot_premium").text(tot_premium);
            $("#stand_instu_rate").text(stand_instu_rate);
            $("#stand_instu_tot").text(stand_instu_tot);
            $("#doctor_disc_per").text(doctor_disc_per);
            $("#doctor_disc_tot").text(doctor_disc_tot);
            $("#gross_premium_tot").text(gross_premium_tot);
            $("#gross_premium_tot_new").text(gross_premium_tot_new);

            var medi_cgst_rate = medi_float_max_bupa_reassure_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_float_max_bupa_reassure_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_float_max_bupa_reassure_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_float_max_bupa_reassure_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_float_max_bupa_reassure_policy_data_arr.medi_final_premium;
            var max_age = medi_float_max_bupa_reassure_policy_data_arr.max_age;
            var max_bupa_status = medi_float_max_bupa_reassure_policy_data_arr.max_bupa_status;
            var max_bupa_del_flag = medi_float_max_bupa_reassure_policy_data_arr.max_bupa_del_flag;
            // alert(medi_final_premium);

            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
            $("#max_age").text(max_age);
            $("#medi_max_bupa_reassure_float_policy_id").text(medi_max_bupa_reassure_float_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var medi_max_bupa_tr = "";
        var add_medi_maxBupa_counter = "";
        var index = "";
        var Family_size_count = total_max_bupa_medi_float_reassure_json_data.length;
        // var main_Mediclaim_maxBupa = [];
        member_id_global = "";
        $.each(total_max_bupa_medi_float_reassure_json_data, function(key, val) {
            // alert(sum_insured_dropdown_val);
            add_medi_maxBupa_counter = key;
            // main_Mediclaim_maxBupa.push(add_medi_maxBupa_counter);
            index = total_max_bupa_medi_float_reassure_json_data[key][0];
            var name_insured_member_name = total_max_bupa_medi_float_reassure_json_data[key][1];
            var name_insured_member_name_txt = total_max_bupa_medi_float_reassure_json_data[key][2];
            var name_insured_dob = total_max_bupa_medi_float_reassure_json_data[key][3];
            var name_insured_age = total_max_bupa_medi_float_reassure_json_data[key][4];
            var name_insured_relation = total_max_bupa_medi_float_reassure_json_data[key][5];
            var name_insured_relation_txt = total_max_bupa_medi_float_reassure_json_data[key][6];
            var nominee_name = total_max_bupa_medi_float_reassure_json_data[0][7];
            var nominee_name_txt = total_max_bupa_medi_float_reassure_json_data[0][8];
            var nominee_relation = total_max_bupa_medi_float_reassure_json_data[0][9];
            var nominee_relation_txt = total_max_bupa_medi_float_reassure_json_data[0][10];
            var name_insured_sum_insured = total_max_bupa_medi_float_reassure_json_data[0][11];
            var basic_premium = total_max_bupa_medi_float_reassure_json_data[0][12];
            var pab_type = total_max_bupa_medi_float_reassure_json_data[0][13];
            var pab_prem = total_max_bupa_medi_float_reassure_json_data[0][14];
            var hospital_cash_type = total_max_bupa_medi_float_reassure_json_data[0][15];
            var hospital_cash_prem = total_max_bupa_medi_float_reassure_json_data[0][16];
            var safeguard_benefi_type = total_max_bupa_medi_float_reassure_json_data[0][17];
            var safeguard_benefi_prem = total_max_bupa_medi_float_reassure_json_data[0][18];
            var tot_prem = total_max_bupa_medi_float_reassure_json_data[0][19];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (pab_type == undefined || pab_type == "Null" || pab_type == "null" || pab_type == "")
                pab_type = "";

            if (hospital_cash_type == undefined || hospital_cash_type == "Null" || hospital_cash_type == "null" || hospital_cash_type == "")
                hospital_cash_type = "";

            if (safeguard_benefi_type == undefined || safeguard_benefi_type == "Null" || safeguard_benefi_type == "null" || safeguard_benefi_type == "")
                safeguard_benefi_type = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td> ';

            if (add_medi_maxBupa_counter == 0) {
                nominee_table_body += '<tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';
                policy_member_table_tbody += '<td rowspan="' + Family_size_count + '">' + name_insured_sum_insured + '</td><td rowspan="' + Family_size_count + '"> ' + basic_gross_premium + '</td></tr>';
            }
        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);

        Term_Discount_table();
    }

    function edit_Personal_Accident(ind_personal_accident_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_pa_ind_json_data = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $.each(ind_personal_accident_policy_data_arr, function(key_other, val_other) {
            var paccident_policy_id = ind_personal_accident_policy_data_arr.paccident_policy_id;
            var personal_accident_policy_ind_fk_policy_id = ind_personal_accident_policy_data_arr.personal_accident_policy_ind_fk_policy_id;
            var fk_policy_type_id = ind_personal_accident_policy_data_arr.fk_policy_type_id
            var fk_company_id = ind_personal_accident_policy_data_arr.fk_company_id;
            var fk_department_id = ind_personal_accident_policy_data_arr.fk_department_id;
            var policy_type_title = ind_personal_accident_policy_data_arr.policy_type_title;
            total_pa_ind_json_data = JSON.parse(ind_personal_accident_policy_data_arr.total_pa_ind_json_data);

            var tot_premium = ind_personal_accident_policy_data_arr.tot_premium;
            var less_disc_rate = ind_personal_accident_policy_data_arr.less_disc_rate;
            var less_disc_tot = ind_personal_accident_policy_data_arr.less_disc_tot;
            var gross_premium = ind_personal_accident_policy_data_arr.gross_premium;
            var gross_premium_new = ind_personal_accident_policy_data_arr.gross_premium_new;
            var medi_cgst_rate = ind_personal_accident_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = ind_personal_accident_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = ind_personal_accident_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = ind_personal_accident_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = ind_personal_accident_policy_data_arr.medi_final_premium;

            var personal_accident_status = ind_personal_accident_policy_data_arr.personal_accident_status;
            var personal_accident_del_flag = ind_personal_accident_policy_data_arr.personal_accident_del_flag;

            $("#tot_premium").text(tot_premium);
            $("#less_disc_rate").text(less_disc_rate);
            $("#less_disc_tot").text(less_disc_tot);
            $("#gross_premium").text(gross_premium);
            $("#gross_premium_new").text(gross_premium_new);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
            $("#paccident_policy_id").text(paccident_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var tr_table = "";
        var add_pa_counter = "";
        var index = "";
        var Personal_accident_length = total_pa_ind_json_data.length;
        member_id_global = "";
        $.each(total_pa_ind_json_data, function(key, val) {
            add_pa_counter = key;
            // main_Personal_accident.push(add_pa_counter);
            index = total_pa_ind_json_data[key][0];
            var name_insured_member_name = total_pa_ind_json_data[key][1];
            var name_insured_member_name_txt = total_pa_ind_json_data[key][2];
            var name_insured_dob = total_pa_ind_json_data[key][3];
            var name_insured_age = total_pa_ind_json_data[key][4];
            var name_insured_relation = total_pa_ind_json_data[key][5];
            var name_insured_relation_txt = total_pa_ind_json_data[key][6];
            var nominee_name = total_pa_ind_json_data[key][7];
            var nominee_name_txt = total_pa_ind_json_data[key][8];
            var nominee_relation = total_pa_ind_json_data[key][9];
            var nominee_relation_txt = total_pa_ind_json_data[key][10];
            var name_insured_sum_insured_1 = total_pa_ind_json_data[key][11];
            var name_insured_sum_insured_2 = total_pa_ind_json_data[key][12];
            var name_insured_sum_insured_3 = total_pa_ind_json_data[key][13];
            var name_insured_sum_insured_4 = total_pa_ind_json_data[key][14];
            var sum_insured = total_pa_ind_json_data[key][15];
            var risk_group_1 = total_pa_ind_json_data[key][16];
            var risk_group_2 = total_pa_ind_json_data[key][17];
            var risk_group_3 = total_pa_ind_json_data[key][18];
            var risk_group_4 = total_pa_ind_json_data[key][19];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            var name_insured_premium_1 = total_pa_ind_json_data[key][20];
            var name_insured_premium_2 = total_pa_ind_json_data[key][21];
            var name_insured_premium_3 = total_pa_ind_json_data[key][22];
            var name_insured_premium_4 = total_pa_ind_json_data[key][23];
            var premium = total_pa_ind_json_data[key][24];

            if (name_insured_sum_insured_1 == "null")
                name_insured_sum_insured_1 = "";
            if (name_insured_sum_insured_2 == "null")
                name_insured_sum_insured_2 = "";
            if (name_insured_sum_insured_3 == "null")
                name_insured_sum_insured_3 = "";
            if (name_insured_sum_insured_4 == "null")
                name_insured_sum_insured_4 = "";

            if (risk_group_1 == "null")
                risk_group_1 = "";
            if (risk_group_2 == "null")
                risk_group_2 = "";
            if (risk_group_3 == "null")
                risk_group_3 = "";
            if (risk_group_4 == "null")
                risk_group_4 = "";

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td> <td>' + name_insured_relation_txt + '</td><td>' + sum_insured + '</td>';

            nominee_table_body += '<tr> <td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';

            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + Personal_accident_length + '"> ' + basic_gross_premium + '</td></tr>';
        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);
    }

    function edit_single_table_Personal_Accident(ind_personal_accident_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_pa_ind_json_data = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $.each(ind_personal_accident_policy_data_arr, function(key_other, val_other) {
            var paccident_policy_id = ind_personal_accident_policy_data_arr.paccident_policy_id;
            var personal_accident_policy_ind_fk_policy_id = ind_personal_accident_policy_data_arr.personal_accident_policy_ind_fk_policy_id;
            var fk_policy_type_id = ind_personal_accident_policy_data_arr.fk_policy_type_id
            var fk_company_id = ind_personal_accident_policy_data_arr.fk_company_id;
            var fk_department_id = ind_personal_accident_policy_data_arr.fk_department_id;
            var policy_type_title = ind_personal_accident_policy_data_arr.policy_type_title;
            total_pa_ind_json_data = JSON.parse(ind_personal_accident_policy_data_arr.total_pa_ind_json_data);

            var tot_premium = ind_personal_accident_policy_data_arr.tot_premium;
            var less_disc_rate = ind_personal_accident_policy_data_arr.less_disc_rate;
            var less_disc_tot = ind_personal_accident_policy_data_arr.less_disc_tot;
            var gross_premium = ind_personal_accident_policy_data_arr.gross_premium;
            var gross_premium_new = ind_personal_accident_policy_data_arr.gross_premium_new;
            var medi_cgst_rate = ind_personal_accident_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = ind_personal_accident_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = ind_personal_accident_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = ind_personal_accident_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = ind_personal_accident_policy_data_arr.medi_final_premium;

            var personal_accident_status = ind_personal_accident_policy_data_arr.personal_accident_status;
            var personal_accident_del_flag = ind_personal_accident_policy_data_arr.personal_accident_del_flag;

            $("#tot_premium").text(tot_premium);
            $("#less_disc_rate").text(less_disc_rate);
            $("#less_disc_tot").text(less_disc_tot);
            $("#gross_premium").text(gross_premium);
            $("#gross_premium_new").text(gross_premium_new);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
            $("#paccident_policy_id").text(paccident_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var tr_table = "";
        var add_pa_counter = "";
        var index = "";
        var Personal_accident_length = total_pa_ind_json_data.length;
        member_id_global = "";
        $.each(total_pa_ind_json_data, function(key, val) {
            add_pa_counter = key;
            // main_Personal_accident.push(add_pa_counter);
            index = total_pa_ind_json_data[key][0];
            var name_insured_member_name = total_pa_ind_json_data[key][1];
            var name_insured_member_name_txt = total_pa_ind_json_data[key][2];
            var name_insured_dob = total_pa_ind_json_data[key][3];
            var name_insured_age = total_pa_ind_json_data[key][4];
            var name_insured_relation = total_pa_ind_json_data[key][5];
            var name_insured_relation_txt = total_pa_ind_json_data[key][6];
            var nominee_name = total_pa_ind_json_data[key][7];
            var nominee_name_txt = total_pa_ind_json_data[key][8];
            var nominee_relation = total_pa_ind_json_data[key][9];
            var nominee_relation_txt = total_pa_ind_json_data[key][10];
            var name_insured_sum_insured_1 = total_pa_ind_json_data[key][11];
            var risk_group_1 = total_pa_ind_json_data[key][12];
            var name_insured_premium_1 = total_pa_ind_json_data[key][13];
            // var name_insured_premium_2 = total_pa_ind_json_data[key][14];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            // alert(name_insured_premium_2);
            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_sum_insured_1 == undefined || name_insured_sum_insured_1 == "Null" || name_insured_sum_insured_1 == "null" || name_insured_sum_insured_1 == "")
                name_insured_sum_insured_1 = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td> <td>' + name_insured_relation_txt + '</td><td>' + name_insured_sum_insured_1 + '</td> ';

            nominee_table_body += '<tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td> </tr>';

            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + Personal_accident_length + '"> ' + basic_gross_premium + '</td></tr>';
        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);
    }

    function edit_motor_2_wheeler(motor_2_wheeler_data_arr, basic_sum_insured, basic_gross_premium) {
        var tot_othercover_ind_json = "";
        $.each(motor_2_wheeler_data_arr, function(key_gmc, val_gmc) {
            var two_wheeler_policy_id = motor_2_wheeler_data_arr.two_wheeler_policy_id;
            two_wheeler_policy_fk_policy_id = motor_2_wheeler_data_arr.two_wheeler_policy_fk_policy_id;
            fk_policy_type_id = motor_2_wheeler_data_arr.fk_policy_type_id;
            fk_company_id = motor_2_wheeler_data_arr.fk_company_id;
            fk_department_id = motor_2_wheeler_data_arr.fk_department_id;
            var policy_type_title = motor_2_wheeler_data_arr.policy_type_title;

            var vehicle_make_model = motor_2_wheeler_data_arr.vehicle_make_model;
            var vehicle_reg_no = motor_2_wheeler_data_arr.vehicle_reg_no;
            var insu_declared_val = motor_2_wheeler_data_arr.insu_declared_val;
            var elect_acc_val = motor_2_wheeler_data_arr.elect_acc_val;
            var other_elect_acc_val = motor_2_wheeler_data_arr.other_elect_acc_val;
            var policy_period_tenure_years = motor_2_wheeler_data_arr.policy_period_tenure_years;
            var previous_policy_expiry_date_tenur = motor_2_wheeler_data_arr.previous_policy_expiry_date_tenur;
            var year_manufact_val = motor_2_wheeler_data_arr.year_manufact_val;
            var rta_city_code = motor_2_wheeler_data_arr.rta_city_code;
            var rta_city = motor_2_wheeler_data_arr.rta_city;
            var rta_city_cat = motor_2_wheeler_data_arr.rta_city_cat;
            var cubic_capacity_val = motor_2_wheeler_data_arr.cubic_capacity_val;
            var type_of_cover = motor_2_wheeler_data_arr.type_of_cover;
            var policy_period = motor_2_wheeler_data_arr.policy_period;
            var inception_date = motor_2_wheeler_data_arr.inception_date;
            var expiry_date = motor_2_wheeler_data_arr.expiry_date;

            $("#vehicle_make_model").text(vehicle_make_model);
            $("#vehicle_reg_no").text(vehicle_reg_no);
            $("#insu_declared_val").text(insu_declared_val);
            $("#elect_acc_val").text(elect_acc_val);
            $("#other_elect_acc_val").text(other_elect_acc_val);
            $("#policy_period_tenure_years").text(policy_period_tenure_years);
            $("#previous_policy_expiry_date_tenur").text(previous_policy_expiry_date_tenur);
            $("#year_manufact_val").text(year_manufact_val);
            $("#rta_city_code").text(rta_city_code);
            $("#rta_city").text(rta_city);
            $("#rta_city_cat").text(rta_city_cat);
            $("#cubic_capacity_val").text(cubic_capacity_val);
            $("#type_of_cover").text(type_of_cover);
            $("#policy_period").text(policy_period);
            $("#inception_date").text(inception_date);
            $("#expiry_date").text(expiry_date);

            var od_basic_od_tot = motor_2_wheeler_data_arr.od_basic_od_tot;
            var od_special_disc_per = motor_2_wheeler_data_arr.od_special_disc_per;
            var od_special_disc_tot = motor_2_wheeler_data_arr.od_special_disc_tot;
            var od_special_load_per = motor_2_wheeler_data_arr.od_special_load_per;
            var od_special_load_tot = motor_2_wheeler_data_arr.od_special_load_tot;
            var od_net_basic_od_tot = motor_2_wheeler_data_arr.od_net_basic_od_tot;
            var od_elec_acc_tot = motor_2_wheeler_data_arr.od_elec_acc_tot;
            var od_other_elec_acc_tot = motor_2_wheeler_data_arr.od_other_elec_acc_tot;
            var od_od_basic_od1_tot = motor_2_wheeler_data_arr.od_od_basic_od1_tot;
            var od_geographical_area_tot = motor_2_wheeler_data_arr.od_geographical_area_tot;
            var od_rallies_tot = motor_2_wheeler_data_arr.od_rallies_tot;
            var od_embassy_load_tot = motor_2_wheeler_data_arr.od_embassy_load_tot;
            var od_basic_od2_tot = motor_2_wheeler_data_arr.od_basic_od2_tot;
            var od_anti_theft_tot = motor_2_wheeler_data_arr.od_anti_theft_tot;
            var od_handicap_tot = motor_2_wheeler_data_arr.od_handicap_tot;
            var od_aai_tot = motor_2_wheeler_data_arr.od_aai_tot;
            var od_side_car_tot = motor_2_wheeler_data_arr.od_side_car_tot;
            var od_own_premises_tot = motor_2_wheeler_data_arr.od_own_premises_tot;
            var od_voluntary_excess_tot = motor_2_wheeler_data_arr.od_voluntary_excess_tot;
            var od_basic_od3_tot = motor_2_wheeler_data_arr.od_basic_od3_tot;
            var od_ncb_per = motor_2_wheeler_data_arr.od_ncb_per;
            var od_ncb_tot = motor_2_wheeler_data_arr.od_ncb_tot;
            var od_tot_od_premium_policy_period = motor_2_wheeler_data_arr.od_tot_od_premium_policy_period;

            $("#od_basic_od_tot").text(od_basic_od_tot);
            $("#od_special_disc_per").text(od_special_disc_per);
            $("#od_special_disc_tot").text(od_special_disc_tot);
            $("#od_special_load_per").text(od_special_load_per);
            $("#od_special_load_tot").text(od_special_load_tot);
            $("#od_net_basic_od_tot").text(od_net_basic_od_tot);
            $("#od_elec_acc_tot	").text(od_elec_acc_tot);
            $("#od_other_elec_acc_tot").text(od_other_elec_acc_tot);
            $("#od_od_basic_od1_tot").text(od_od_basic_od1_tot);
            $("#od_geographical_area_tot").text(od_geographical_area_tot);
            $("#od_rallies_tot").text(od_rallies_tot);
            $("#od_embassy_load_tot").text(od_embassy_load_tot);
            $("#od_basic_od2_tot").text(od_basic_od2_tot);
            $("#od_anti_theft_tot").text(od_anti_theft_tot);
            $("#od_handicap_tot").text(od_handicap_tot);
            $("#od_aai_tot").text(od_aai_tot);
            $("#od_side_car_tot").text(od_side_car_tot);
            $("#od_own_premises_tot").text(od_own_premises_tot);
            $("#od_voluntary_excess_tot").text(od_voluntary_excess_tot);
            $("#od_basic_od3_tot").text(od_basic_od3_tot);
            $("#od_ncb_per").text(od_ncb_per);
            $("#od_ncb_tot").text(od_ncb_tot);
            $("#od_tot_od_premium_policy_period").text(od_tot_od_premium_policy_period);

            var tp_basic_tp_tot = motor_2_wheeler_data_arr.tp_basic_tp_tot;
            var tp_restr_tppd_tot = motor_2_wheeler_data_arr.tp_restr_tppd_tot;
            var tp_basic_tp1_tot = motor_2_wheeler_data_arr.tp_basic_tp1_tot;
            var tp_geographical_area_tot = motor_2_wheeler_data_arr.tp_geographical_area_tot;
            var tp_compul_pa_own_driv_tot = motor_2_wheeler_data_arr.tp_compul_pa_own_driv_tot;
            var tp_unnamed_pa_tot = motor_2_wheeler_data_arr.tp_unnamed_pa_tot;
            var tp_ll_drv_emp_imt28_tot = motor_2_wheeler_data_arr.tp_ll_drv_emp_imt28_tot;
            var tp_ll_other_emp_tot = motor_2_wheeler_data_arr.tp_ll_other_emp_tot;
            var tp_noof_other_emp_tot = motor_2_wheeler_data_arr.tp_noof_other_emp_tot;
            var tp_basic_tp2_tot = motor_2_wheeler_data_arr.tp_basic_tp2_tot;
            var tp_tot_premium_policy_period = motor_2_wheeler_data_arr.tp_tot_premium_policy_period;
            tot_othercover_ind_json = JSON.parse(motor_2_wheeler_data_arr.tot_othercover_ind_json);
            var plan_name = motor_2_wheeler_data_arr.plan_name;
            var plan_name_tot = motor_2_wheeler_data_arr.plan_name_tot;
            var tot_cover_premium_period = motor_2_wheeler_data_arr.tot_cover_premium_period;

            $("#tp_basic_tp_tot").text(tp_basic_tp_tot);
            $("#tp_restr_tppd_tot").text(tp_restr_tppd_tot);
            $("#tp_basic_tp1_tot").text(tp_basic_tp1_tot);
            $("#tp_geographical_area_tot").text(tp_geographical_area_tot);
            $("#tp_compul_pa_own_driv_tot").text(tp_compul_pa_own_driv_tot);
            $("#tp_unnamed_pa_tot").text(tp_unnamed_pa_tot);
            $("#tp_ll_drv_emp_imt28_tot").text(tp_ll_drv_emp_imt28_tot);
            $("#tp_ll_other_emp_tot").text(tp_ll_other_emp_tot);
            $("#tp_noof_other_emp_tot").text(tp_noof_other_emp_tot);
            $("#tp_basic_tp2_tot").text(tp_basic_tp2_tot);
            $("#tp_tot_premium_policy_period").text(tp_tot_premium_policy_period);
            $("#plan_name").text(plan_name);
            $("#plan_name_tot").text(plan_name_tot);
            $("#tot_cover_premium_period").text(tot_cover_premium_period);

            var tot_premium = motor_2_wheeler_data_arr.tot_premium;
            var motor_cgst_rate = motor_2_wheeler_data_arr.motor_cgst_rate;
            var motor_cgst_tot = motor_2_wheeler_data_arr.motor_cgst_tot;
            var motor_sgst_rate = motor_2_wheeler_data_arr.motor_sgst_rate;
            var motor_sgst_tot = motor_2_wheeler_data_arr.motor_sgst_tot;
            // var gst_rate = motor_2_wheeler_data_arr.gst_rate;
            // var gst_tot = motor_2_wheeler_data_arr.gst_tot;
            var tot_payable_premium = motor_2_wheeler_data_arr.tot_payable_premium;

            $("#tot_premium").text(tot_premium);
            $("#cgst_fire_per").text(motor_cgst_rate);
            $("#motor_cgst_tot").text(motor_cgst_tot);
            $("#sgst_fire_per").text(motor_sgst_rate);
            $("#motor_sgst_tot").text(motor_sgst_tot);
            // $("#gst_rate").text(gst_rate);
            // $("#gst_tot").text(gst_tot);
            $("#tot_payable_premium").text(tot_payable_premium);
            $("#two_wheeler_policy_id").text(two_wheeler_policy_id);
        });
        var tr_table = "";
        $.each(tot_othercover_ind_json, function(key, val) {
            add_othercover_counter = key;
            index = tot_othercover_ind_json[key][0];
            var other_cover_name = tot_othercover_ind_json[key][1];
            var other_cover_rate = tot_othercover_ind_json[key][2];
            var other_cover_tot = tot_othercover_ind_json[key][3];
            // main_Other_Cover.push(add_othercover_counter);
            // alert(other_cover_tot);
            tr_table += '<tr> <td width="76%">' + other_cover_name + '</td> <td><center>' + other_cover_rate + '</center></td> <td><center>' + other_cover_tot + '</center></td> </tr> ';
        });
        $("#first_table_tbody").append(tr_table);
    }

    function edit_motor_private_car(private_car_data_arr, basic_sum_insured, basic_gross_premium) {
        var tot_othercover_ind_json = "";
        $.each(private_car_data_arr, function(key_gmc, val_gmc) {
            private_car_policy_id = private_car_data_arr.private_car_policy_id;
            motor_private_car_policy_fk_policy_id = private_car_data_arr.motor_private_car_policy_fk_policy_id;
            fk_policy_type_id = private_car_data_arr.fk_policy_type_id;
            fk_company_id = private_car_data_arr.fk_company_id;
            fk_department_id = private_car_data_arr.fk_department_id;
            var policy_type_title = private_car_data_arr.policy_type_title;

            var vehicle_make_model = private_car_data_arr.vehicle_make_model;
            var vehicle_reg_no = private_car_data_arr.vehicle_reg_no;
            var insu_declared_val = private_car_data_arr.insu_declared_val;
            var non_elect_access_val = private_car_data_arr.non_elect_access_val;
            var elect_access_val = private_car_data_arr.elect_access_val;
            var lpg_cng_idv_val = private_car_data_arr.lpg_cng_idv_val;
            var trailer_val = private_car_data_arr.trailer_val;
            var year_manufact_val = private_car_data_arr.year_manufact_val;
            var rta_city_code = private_car_data_arr.rta_city_code;
            var rta_city = private_car_data_arr.rta_city;
            var rta_city_cat = private_car_data_arr.rta_city_cat;
            var cubic_capacity_val = private_car_data_arr.cubic_capacity_val;
            var calculation_method = private_car_data_arr.calculation_method;
            var type_of_cover = private_car_data_arr.type_of_cover;
            var prev_policy_expiry_date = private_car_data_arr.prev_policy_expiry_date;
            var policy_period = private_car_data_arr.policy_period;
            var inception_date = private_car_data_arr.inception_date;
            var expiry_date = private_car_data_arr.expiry_date;

            var od_basic_od_tot = private_car_data_arr.od_basic_od_tot;
            var od_special_disc_per = private_car_data_arr.od_special_disc_per;
            var od_special_disc_tot = private_car_data_arr.od_special_disc_tot;
            var od_special_load_per = private_car_data_arr.od_special_load_per;
            var od_special_load_tot = private_car_data_arr.od_special_load_tot;
            var od_net_basic_od_tot = private_car_data_arr.od_net_basic_od_tot;
            var od_non_elec_acc_tot = private_car_data_arr.od_non_elec_acc_tot;
            var od_elec_acc_tot = private_car_data_arr.od_elec_acc_tot;
            var od_bi_fuel_kit_tot = private_car_data_arr.od_bi_fuel_kit_tot;
            var od_od_basic_od1_tot = private_car_data_arr.od_od_basic_od1_tot;
            var od_trailer_tot = private_car_data_arr.od_trailer_tot;
            var od_geographical_area_tot = private_car_data_arr.od_geographical_area_tot;
            var od_embassy_load_tot = private_car_data_arr.od_embassy_load_tot;
            var od_fibre_glass_tank_tot = private_car_data_arr.od_fibre_glass_tank_tot;
            var od_driving_tut_tot = private_car_data_arr.od_driving_tut_tot;
            var od_rallies_tot = private_car_data_arr.od_rallies_tot;
            var od_basic_od2_tot = private_car_data_arr.od_basic_od2_tot;
            var od_anti_tot = private_car_data_arr.od_anti_tot;
            var od_handicap_tot = private_car_data_arr.od_handicap_tot;
            var od_aai_tot = private_car_data_arr.od_aai_tot;
            var od_vintage_tot = private_car_data_arr.od_vintage_tot;
            var od_own_premises_tot = private_car_data_arr.od_own_premises_tot;
            var od_voluntary_deduc_tot = private_car_data_arr.od_voluntary_deduc_tot;
            var od_basic_od3_tot = private_car_data_arr.od_basic_od3_tot;
            var od_ncb_per = private_car_data_arr.od_ncb_per;
            var od_ncb_tot = private_car_data_arr.od_ncb_tot;
            var od_tot_anual_od_premium = private_car_data_arr.od_tot_anual_od_premium;
            var od_tot_od_premium_policy_period = private_car_data_arr.od_tot_od_premium_policy_period;

            var tp_basic_tp_tot = private_car_data_arr.tp_basic_tp_tot;
            var tp_restr_tppd = private_car_data_arr.tp_restr_tppd;
            var tp_trailer_tot = private_car_data_arr.tp_trailer_tot;
            var tp_bi_fuel_tot = private_car_data_arr.tp_bi_fuel_tot;
            var tp_basic_tp1_tot = private_car_data_arr.tp_basic_tp1_tot;
            var tp_compul_own_driv_tot = private_car_data_arr.tp_compul_own_driv_tot;
            var tp_geographical_area_tot = private_car_data_arr.tp_geographical_area_tot;
            var tp_unnamed_papax_tot = private_car_data_arr.tp_unnamed_papax_tot;
            var tp_no_seats_limit_person_tot = private_car_data_arr.tp_no_seats_limit_person_tot;
            var tp_ll_drv_emp_tot = private_car_data_arr.tp_ll_drv_emp_tot;
            var tp_no_drv_emp_tot = private_car_data_arr.tp_no_drv_emp_tot;
            var tp_ll_defe_tot = private_car_data_arr.tp_ll_defe_tot;
            var tp_noof_person_tot = private_car_data_arr.tp_noof_person_tot;
            var tp_pa_paid_drv_tot = private_car_data_arr.tp_pa_paid_drv_tot;
            // var tp_blank_tot = private_car_data_arr.tp_blank_tot;
            var tp_basic_tp2_tot = private_car_data_arr.tp_basic_tp2_tot;
            var tp_tot_anual_tp_premium = private_car_data_arr.tp_tot_anual_tp_premium;
            var tp_tot_premium_policy_period = private_car_data_arr.tp_tot_premium_policy_period;
            tot_othercover_ind_json = JSON.parse(private_car_data_arr.tot_othercover_ind_json);
            var plan_name = private_car_data_arr.plan_name;
            var plan_name_tot = private_car_data_arr.plan_name_tot;
            var tot_anual_cover_premium = private_car_data_arr.tot_anual_cover_premium;
            var tot_cover_premium_period = private_car_data_arr.tot_cover_premium_period;

            var tot_premium = private_car_data_arr.tot_premium;
            var motor_cgst_rate = private_car_data_arr.motor_cgst_rate;
            var motor_cgst_tot = private_car_data_arr.motor_cgst_tot;
            var motor_sgst_rate = private_car_data_arr.motor_sgst_rate;
            var motor_sgst_tot = private_car_data_arr.motor_sgst_tot;
            // var gst_rate = private_car_data_arr.gst_rate;
            // var gst_tot = private_car_data_arr.gst_tot;
            var tot_payable_premium = private_car_data_arr.tot_payable_premium;

            $("#vehicle_make_model").text(vehicle_make_model);
            $("#vehicle_reg_no").text(vehicle_reg_no);
            $("#insu_declared_val").text(insu_declared_val);
            $("#non_elect_access_val").text(non_elect_access_val);
            $("#elect_access_val").text(elect_access_val);
            $("#lpg_cng_idv_val").text(lpg_cng_idv_val);
            $("#trailer_val").text(trailer_val);
            $("#year_manufact_val").text(year_manufact_val);
            $("#rta_city_code").text(rta_city_code);
            $("#rta_city").text(rta_city);
            $("#rta_city_cat").text(rta_city_cat);
            $("#cubic_capacity_val").text(cubic_capacity_val);
            $("#calculation_method").text(calculation_method);
            $("#type_of_cover").text(type_of_cover);
            $("#prev_policy_expiry_date").text(prev_policy_expiry_date);
            $("#policy_period").text(policy_period);
            $("#inception_date").text(inception_date);
            $("#expiry_date").text(expiry_date);

            $("#od_basic_od_tot").text(od_basic_od_tot);
            $("#od_special_disc_per").text(od_special_disc_per);
            $("#od_special_disc_tot").text(od_special_disc_tot);
            $("#od_special_load_per").text(od_special_load_per);
            $("#od_special_load_tot").text(od_special_load_tot);
            $("#od_net_basic_od_tot").text(od_net_basic_od_tot);
            $("#od_non_elec_acc_tot").text(od_non_elec_acc_tot);
            $("#od_elec_acc_tot").text(od_elec_acc_tot);
            $("#od_bi_fuel_kit_tot").text(od_bi_fuel_kit_tot);
            $("#od_od_basic_od1_tot").text(od_od_basic_od1_tot);
            $("#od_trailer_tot").text(od_trailer_tot);
            $("#od_geographical_area_tot").text(od_geographical_area_tot);
            $("#od_embassy_load_tot").text(od_embassy_load_tot);
            $("#od_fibre_glass_tank_tot").text(od_fibre_glass_tank_tot);
            $("#od_driving_tut_tot").text(od_driving_tut_tot);
            $("#od_rallies_tot").text(od_rallies_tot);
            $("#od_basic_od2_tot").text(od_basic_od2_tot);
            $("#od_anti_tot").text(od_anti_tot);
            $("#od_handicap_tot").text(od_handicap_tot);
            $("#od_aai_tot").text(od_aai_tot);
            $("#od_vintage_tot").text(od_vintage_tot);
            $("#od_own_premises_tot").text(od_own_premises_tot);
            $("#od_voluntary_deduc_tot").text(od_voluntary_deduc_tot);
            $("#od_basic_od3_tot").text(od_basic_od3_tot);
            $("#od_ncb_per").text(od_ncb_per);
            $("#od_ncb_tot").text(od_ncb_tot);
            $("#od_tot_anual_od_premium").text(od_tot_anual_od_premium);
            $("#od_tot_od_premium_policy_period").text(od_tot_od_premium_policy_period);

            $("#tp_basic_tp_tot").text(tp_basic_tp_tot);
            $("#tp_restr_tppd").text(tp_restr_tppd);
            $("#tp_trailer_tot").text(tp_trailer_tot);
            $("#tp_bi_fuel_tot").text(tp_bi_fuel_tot);
            $("#tp_basic_tp1_tot").text(tp_basic_tp1_tot);
            $("#tp_compul_own_driv_tot").text(tp_compul_own_driv_tot);
            $("#tp_geographical_area_tot").text(tp_geographical_area_tot);
            $("#tp_unnamed_papax_tot").text(tp_unnamed_papax_tot);
            $("#tp_no_seats_limit_person_tot").text(tp_no_seats_limit_person_tot);
            $("#tp_ll_drv_emp_tot").text(tp_ll_drv_emp_tot);
            $("#tp_no_drv_emp_tot").text(tp_no_drv_emp_tot);
            $("#tp_ll_defe_tot").text(tp_ll_defe_tot);
            $("#tp_noof_person_tot").text(tp_noof_person_tot);
            $("#tp_pa_paid_drv_tot").text(tp_pa_paid_drv_tot);
            $("#tp_basic_tp2_tot").text(tp_basic_tp2_tot);
            $("#tp_tot_anual_tp_premium").text(tp_tot_anual_tp_premium);
            $("#tp_tot_premium_policy_period").text(tp_tot_premium_policy_period);
            $("#plan_name").text(plan_name);
            $("#plan_name_tot").text(plan_name_tot);
            $("#tot_anual_cover_premium").text(tot_anual_cover_premium);
            $("#tot_cover_premium_period").text(tot_cover_premium_period);

            $("#tot_premium").text(tot_premium);
            $("#cgst_fire_per").text(motor_cgst_rate);
            $("#motor_cgst_tot").text(motor_cgst_tot);
            $("#sgst_fire_per").text(motor_sgst_rate);
            $("#motor_sgst_tot").text(motor_sgst_tot);
            // $("#gst_rate").text(gst_rate);
            // $("#gst_tot").text(gst_tot);
            $("#tot_payable_premium").text(tot_payable_premium);
            $("#private_car_policy_id").text(private_car_policy_id);

        });
        var tr_table = "";
        $.each(tot_othercover_ind_json, function(key, val) {
            add_othercover_counter = key;
            index = tot_othercover_ind_json[key][0];
            var other_cover_name = tot_othercover_ind_json[key][1];
            var other_cover_rate = tot_othercover_ind_json[key][2];
            var other_cover_tot = tot_othercover_ind_json[key][3];
            // main_Other_Cover.push(add_othercover_counter);
            // alert(other_cover_tot);
            tr_table += '<tr> <td width="76%">' + other_cover_name + '</td> <td><center>' + other_cover_rate + '</center></td> <td><center>' + other_cover_tot + '</center></td> </tr> ';
        });
        $("#first_table_tbody").append(tr_table);
    }

    function edit_motor_commercial_policy(motor_commercial_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        $.each(motor_commercial_policy_data_arr, function(key, val) {
            commercial_policy_id = motor_commercial_policy_data_arr.commercial_policy_id;
            motor_commercial_policy_fk_policy_id = motor_commercial_policy_data_arr.motor_commercial_policy_fk_policy_id;
            fk_policy_type_id = motor_commercial_policy_data_arr.fk_policy_type_id;
            fk_company_id = motor_commercial_policy_data_arr.fk_company_id;
            fk_department_id = motor_commercial_policy_data_arr.fk_department_id;
            var policy_type_title = motor_commercial_policy_data_arr.policy_type_title;
            var commercial_policy_status = motor_commercial_policy_data_arr.commercial_policy_status;
            var commercial_policy_del_flag = motor_commercial_policy_data_arr.commercial_policy_del_flag;

            var vehicle_make_model = motor_commercial_policy_data_arr.vehicle_make_model;
            var vehicle_reg_no = motor_commercial_policy_data_arr.vehicle_reg_no;
            var insu_declared_val = motor_commercial_policy_data_arr.insu_declared_val;
            var elect_acc_val = motor_commercial_policy_data_arr.elect_acc_val;
            var lpg_cng_idv_val = motor_commercial_policy_data_arr.lpg_cng_idv_val;
            var year_manufact_val = motor_commercial_policy_data_arr.year_manufact_val;
            var zone_city_code = motor_commercial_policy_data_arr.zone_city_code;
            var zone_city = motor_commercial_policy_data_arr.zone_city;
            var zone_city_cat = motor_commercial_policy_data_arr.zone_city_cat;
            var gvw_val = motor_commercial_policy_data_arr.gvw_val;
            var class_val = motor_commercial_policy_data_arr.class_val;
            var type_of_cover = motor_commercial_policy_data_arr.type_of_cover;
            var policy_period = motor_commercial_policy_data_arr.policy_period;
            var inception_date = motor_commercial_policy_data_arr.inception_date;
            var expiry_date = motor_commercial_policy_data_arr.expiry_date;

            $("#vehicle_make_model").text(vehicle_make_model);
            $("#vehicle_reg_no").text(vehicle_reg_no);
            $("#insu_declared_val").text(insu_declared_val);
            $("#elect_acc_val").text(elect_acc_val);
            $("#lpg_cng_idv_val").text(lpg_cng_idv_val);
            $("#year_manufact_val").text(year_manufact_val);
            $("#zone_city_code").text(zone_city_code);
            $("#zone_city").text(zone_city);
            $("#zone_city_cat").text(zone_city_cat);
            $("#gvw_val").text(gvw_val);
            $("#class_val").text(class_val);
            $("#type_of_cover").text(type_of_cover);
            $("#policy_period").text(policy_period);
            $("#inception_date").text(inception_date);
            $("#expiry_date").text(expiry_date);

            var od_basic_od_tot = motor_commercial_policy_data_arr.od_basic_od_tot;
            var od_elec_acc_tot = motor_commercial_policy_data_arr.od_elec_acc_tot;
            var od_trailer_tot = motor_commercial_policy_data_arr.od_trailer_tot;
            var od_bi_fuel_kit_tot = motor_commercial_policy_data_arr.od_bi_fuel_kit_tot;
            var od_od_basic_od1_tot = motor_commercial_policy_data_arr.od_od_basic_od1_tot;
            var od_geog_area_tot = motor_commercial_policy_data_arr.od_geog_area_tot;
            var od_fiber_glass_tank_tot = motor_commercial_policy_data_arr.od_fiber_glass_tank_tot;
            var od_imt_cover_mud_guard_tot = motor_commercial_policy_data_arr.od_imt_cover_mud_guard_tot;
            var od_basic_od2_tot = motor_commercial_policy_data_arr.od_basic_od2_tot;
            var od_basic_od3_tot = motor_commercial_policy_data_arr.od_basic_od3_tot;
            var od_ncb_per = motor_commercial_policy_data_arr.od_ncb_per;
            var od_ncb_tot = motor_commercial_policy_data_arr.od_ncb_tot;
            var od_tot_anual_od_premium = motor_commercial_policy_data_arr.od_tot_anual_od_premium;
            var od_special_disc_per = motor_commercial_policy_data_arr.od_special_disc_per;
            var od_special_disc_tot = motor_commercial_policy_data_arr.od_special_disc_tot;
            var od_special_load_per = motor_commercial_policy_data_arr.od_special_load_per;
            var od_special_load_tot = motor_commercial_policy_data_arr.od_special_load_tot;
            var od_tot_od_premium = motor_commercial_policy_data_arr.od_tot_od_premium;

            $("#od_basic_od_tot").text(od_basic_od_tot);
            $("#od_elec_acc_tot").text(od_elec_acc_tot);
            $("#od_trailer_tot").text(od_trailer_tot);
            $("#od_bi_fuel_kit_tot").text(od_bi_fuel_kit_tot);
            $("#od_od_basic_od1_tot").text(od_od_basic_od1_tot);
            $("#od_geog_area_tot").text(od_geog_area_tot);
            $("#od_fiber_glass_tank_tot").text(od_fiber_glass_tank_tot);
            $("#od_imt_cover_mud_guard_tot").text(od_imt_cover_mud_guard_tot);
            $("#od_basic_od2_tot").text(od_basic_od2_tot);
            $("#od_basic_od3_tot").text(od_basic_od3_tot);
            $("#od_ncb_per").text(od_ncb_per);
            $("#od_ncb_tot").text(od_ncb_tot);
            $("#od_tot_anual_od_premium").text(od_tot_anual_od_premium);
            $("#od_special_disc_per").text(od_special_disc_per);
            $("#od_special_disc_tot").text(od_special_disc_tot);
            $("#od_special_load_per").text(od_special_load_per);
            $("#od_special_load_tot").text(od_special_load_tot);
            $("#od_tot_od_premium").text(od_tot_od_premium);

            var tp_basic_tp_tot = motor_commercial_policy_data_arr.tp_basic_tp_tot;
            var tp_restr_tppd_tot = motor_commercial_policy_data_arr.tp_restr_tppd_tot;
            var tp_trailer_tot = motor_commercial_policy_data_arr.tp_trailer_tot;
            var tp_bi_fuel_kit_tot = motor_commercial_policy_data_arr.tp_bi_fuel_kit_tot;
            var tp_basic_tp1_tot = motor_commercial_policy_data_arr.tp_basic_tp1_tot;
            var tp_geog_area_tot = motor_commercial_policy_data_arr.tp_geog_area_tot;
            var tp_compul_pa_own_driv_tot = motor_commercial_policy_data_arr.tp_compul_pa_own_driv_tot;
            var tp_pa_paid_driver_tot = motor_commercial_policy_data_arr.tp_pa_paid_driver_tot;
            var tp_ll_emp_non_fare_tot = motor_commercial_policy_data_arr.tp_ll_emp_non_fare_tot;
            var tp_ll_driver_cleaner_tot = motor_commercial_policy_data_arr.tp_ll_driver_cleaner_tot;
            var tp_ll_person_operation_tot = motor_commercial_policy_data_arr.tp_ll_person_operation_tot;
            var tp_basic_tp2_tot = motor_commercial_policy_data_arr.tp_basic_tp2_tot;
            var tp_tot_premium = motor_commercial_policy_data_arr.tp_tot_premium;
            var tp_consumables = motor_commercial_policy_data_arr.tp_consumables;
            var tp_zero_depreciation = motor_commercial_policy_data_arr.tp_zero_depreciation;
            var tp_road_side_ass = motor_commercial_policy_data_arr.tp_road_side_ass;
            var tp_tot_addon_premium = motor_commercial_policy_data_arr.tp_tot_addon_premium;

            $("#tp_basic_tp_tot").text(tp_basic_tp_tot);
            $("#tp_restr_tppd_tot").text(tp_restr_tppd_tot);
            $("#tp_trailer_tot").text(tp_trailer_tot);
            $("#tp_bi_fuel_kit_tot").text(tp_bi_fuel_kit_tot);
            $("#tp_basic_tp1_tot").text(tp_basic_tp1_tot);
            $("#tp_geog_area_tot").text(tp_geog_area_tot);
            $("#tp_compul_pa_own_driv_tot").text(tp_compul_pa_own_driv_tot);
            $("#tp_pa_paid_driver_tot").text(tp_pa_paid_driver_tot);
            $("#tp_ll_emp_non_fare_tot").text(tp_ll_emp_non_fare_tot);
            $("#tp_ll_driver_cleaner_tot").text(tp_ll_driver_cleaner_tot);
            $("#tp_ll_person_operation_tot").text(tp_ll_person_operation_tot);
            $("#tp_basic_tp2_tot").text(tp_basic_tp2_tot);
            $("#tp_tot_premium").text(tp_tot_premium);
            $("#tp_consumables").text(tp_consumables);
            $("#tp_zero_depreciation").text(tp_zero_depreciation);
            $("#tp_road_side_ass").text(tp_road_side_ass);
            $("#tp_tot_addon_premium").text(tp_tot_addon_premium);

            var tot_owd_premium = motor_commercial_policy_data_arr.tot_owd_premium;
            var tot_owd_addon_premium = motor_commercial_policy_data_arr.tot_owd_addon_premium;
            var tot_btp_premium = motor_commercial_policy_data_arr.tot_btp_premium;
            var tot_other_tp_premium = motor_commercial_policy_data_arr.tot_other_tp_premium;
            var tot_premium = motor_commercial_policy_data_arr.tot_premium;
            var tot_owd_cgst_rate = motor_commercial_policy_data_arr.tot_owd_cgst_rate;
            var tot_owd_sgst_rate = motor_commercial_policy_data_arr.tot_owd_sgst_rate;
            var tot_owd_addon_cgst_rate = motor_commercial_policy_data_arr.tot_owd_addon_cgst_rate;
            var tot_owd_addon_sgst_rate = motor_commercial_policy_data_arr.tot_owd_addon_sgst_rate;
            var tot_btp_cgst_rate = motor_commercial_policy_data_arr.tot_btp_cgst_rate;
            var tot_btp_sgst_rate = motor_commercial_policy_data_arr.tot_btp_sgst_rate;
            var tot_other_tp_cgst_rate = motor_commercial_policy_data_arr.tot_other_tp_cgst_rate;
            var tot_other_tp_sgst_rate = motor_commercial_policy_data_arr.tot_other_tp_sgst_rate;
            var tot_owd_gst = motor_commercial_policy_data_arr.tot_owd_gst;
            var tot_owd_addon_gst = motor_commercial_policy_data_arr.tot_owd_addon_gst;
            var tot_btp_gst = motor_commercial_policy_data_arr.tot_btp_gst;
            var tot_other_tp_gst = motor_commercial_policy_data_arr.tot_other_tp_gst;
            var tot_gst_amt = motor_commercial_policy_data_arr.tot_gst_amt;
            var tot_owd_final = motor_commercial_policy_data_arr.tot_owd_final;
            var tot_owd_addon_final = motor_commercial_policy_data_arr.tot_owd_addon_final;
            var tot_btp_final = motor_commercial_policy_data_arr.tot_btp_final;
            var tot_other_tp_final = motor_commercial_policy_data_arr.tot_other_tp_final;
            var tot_final_premium = motor_commercial_policy_data_arr.tot_final_premium;
            var tot_payable_premium = motor_commercial_policy_data_arr.tot_payable_premium;

            $("#tot_owd_premium").text(tot_owd_premium);
            $("#tot_owd_addon_premium").text(tot_owd_addon_premium);
            $("#tot_btp_premium").text(tot_btp_premium);
            $("#tot_other_tp_premium").text(tot_other_tp_premium);
            $("#tot_premium").text(tot_premium);
            $("#tot_owd_cgst_rate").text(tot_owd_cgst_rate);
            $("#tot_owd_sgst_rate").text(tot_owd_sgst_rate);
            $("#tot_owd_addon_cgst_rate").text(tot_owd_addon_cgst_rate);
            $("#tot_owd_addon_sgst_rate").text(tot_owd_addon_sgst_rate);
            $("#tot_btp_cgst_rate").text(tot_btp_cgst_rate);
            $("#tot_btp_sgst_rate").text(tot_btp_sgst_rate);
            $("#tot_other_tp_cgst_rate").text(tot_other_tp_cgst_rate);
            $("#tot_other_tp_sgst_rate").text(tot_other_tp_sgst_rate);
            $("#tot_owd_gst").text(tot_owd_gst);
            $("#tot_owd_addon_gst").text(tot_owd_addon_gst);
            $("#tot_btp_gst").text(tot_btp_gst);
            $("#tot_other_tp_gst").text(tot_other_tp_gst);
            $("#tot_gst_amt").text(tot_gst_amt);
            $("#tot_owd_final").text(tot_owd_final);
            $("#tot_owd_addon_final").text(tot_owd_addon_final);
            $("#tot_btp_final").text(tot_btp_final);
            $("#tot_other_tp_final").text(tot_other_tp_final);
            $("#tot_final_premium").text(tot_final_premium);
            $("#tot_payable_premium").text(tot_payable_premium);

            $("#commercial_policy_id").text(commercial_policy_id);

        });
    }

    function edit_Common_Individual(common_ind_data_arr, basic_sum_insured, basic_gross_premium) {
        var tot_commind_json_data = "";
        var common_ind_policy_id = "";
        var common_ind_policy_fk_policy_id = "";
        var fk_policy_type_id = "";
        var fk_company_id = "";
        var fk_department_id = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $(".policy_section").show();
        $.each(common_ind_data_arr, function(key_gmc, val_gmc) {
            common_ind_policy_id = common_ind_data_arr.common_ind_policy_id;
            common_ind_policy_fk_policy_id = common_ind_data_arr.common_ind_policy_fk_policy_id;
            fk_policy_type_id = common_ind_data_arr.fk_policy_type_id;
            fk_company_id = common_ind_data_arr.fk_company_id;
            fk_department_id = common_ind_data_arr.fk_department_id;
            var policy_type_title = common_ind_data_arr.policy_type_title;
            tot_commind_json_data = JSON.parse(common_ind_data_arr.tot_commind_json_data);
            var comm_ind_total_amount = common_ind_data_arr.comm_ind_total_amount;
            var comm_ind_less_discount_rate = common_ind_data_arr.comm_ind_less_discount_rate
            var comm_ind_less_discount_tot = common_ind_data_arr.comm_ind_less_discount_tot
            var comm_ind_load_desc = common_ind_data_arr.comm_ind_load_desc
            var comm_ind_load_tot = common_ind_data_arr.comm_ind_load_tot
            var comm_ind_gross_premium = common_ind_data_arr.comm_ind_gross_premium
            var comm_ind_gross_premium_new = common_ind_data_arr.comm_ind_gross_premium_new
            var comm_ind_cgst_rate = common_ind_data_arr.comm_ind_cgst_rate
            var comm_ind_cgst_tot = common_ind_data_arr.comm_ind_cgst_tot
            var comm_ind_sgst_rate = common_ind_data_arr.comm_ind_sgst_rate
            var comm_ind_sgst_tot = common_ind_data_arr.comm_ind_sgst_tot
            var comm_ind_final_premium = common_ind_data_arr.comm_ind_final_premium
            var comm_ind_status = common_ind_data_arr.comm_ind_status
            var comm_ind_del_flag = common_ind_data_arr.comm_ind_del_flag;

            $("#comm_ind_total_amount").text(comm_ind_total_amount);
            $("#comm_ind_less_discount_rate").text(comm_ind_less_discount_rate);
            $("#comm_ind_less_discount_tot").text(comm_ind_less_discount_tot);
            $("#comm_ind_load_desc").text(comm_ind_load_desc);
            $("#comm_ind_load_tot").text(comm_ind_load_tot);
            $("#comm_ind_gross_premium").text(comm_ind_gross_premium);
            $("#comm_ind_gross_premium_new").text(comm_ind_gross_premium_new);
            $("#cgst_fire_per").text(comm_ind_cgst_rate);
            $("#comm_ind_cgst_tot").text(comm_ind_cgst_tot);
            $("#sgst_fire_per").text(comm_ind_sgst_rate);
            $("#comm_ind_sgst_tot").text(comm_ind_sgst_tot);
            $("#comm_ind_final_premium").text(comm_ind_final_premium);
            $("#common_ind_policy_id").text(common_ind_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var commonind_tr = "";
        var add_commonind_counter = "";
        var index = "";
        var commonind_length = tot_commind_json_data.length;
        var last_counter = commonind_length - 1;
        member_id_global = "";
        $.each(tot_commind_json_data, function(key, val) {
            add_commonind_counter = key;
            index = tot_commind_json_data[key][0];
            name_insured_member_name = tot_commind_json_data[key][1];
            name_insured_member_name_txt = tot_commind_json_data[key][2];
            name_insured_dob = tot_commind_json_data[key][3];
            name_insured_age = tot_commind_json_data[key][4];
            name_insured_relation = tot_commind_json_data[key][5];
            name_insured_relation_txt = tot_commind_json_data[key][6];
            past_history = tot_commind_json_data[key][7];
            type_of_policy = tot_commind_json_data[key][8];
            policy_option = tot_commind_json_data[key][9];
            nominee_name = tot_commind_json_data[key][10];
            nominee_name_txt = tot_commind_json_data[key][11];
            nominee_relation = tot_commind_json_data[key][12];
            nominee_relation_txt = tot_commind_json_data[key][13];
            name_insured_sum_insured = tot_commind_json_data[key][14];
            name_insured_premium = tot_commind_json_data[key][15];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);
            // alert(name_insured_premium);
            // main_CommonFloat.push(add_commonind_counter);
            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (type_of_policy == undefined || type_of_policy == "Null" || type_of_policy == "null" || type_of_policy == "")
                type_of_policy = "";

            if (policy_option == undefined || policy_option == "Null" || policy_option == "null" || policy_option == "")
                policy_option = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr> <td>' + name_insured_member_name_txt + '</td> <td>' + name_insured_dob + '</td>   <td>' + name_insured_age + '</td>  <td>' + name_insured_relation_txt + '</td><td>' + type_of_policy + ' </td><td>' + name_insured_sum_insured + ' </td>';

            nominee_table_body += '<tr><td>' + nominee_name_txt + '</td> <td>' + nominee_relation_txt + '</td></tr>';
            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + commonind_length + '"> ' + basic_gross_premium + '</td></tr>';

        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);

    }

    function edit_Common_Floater(common_float_data_arr, basic_sum_insured, basic_gross_premium) {
        var tot_commfloat_json_data = "";
        var common_float_policy_id = "";
        var common_float_policy_fk_policy_id = "";
        var fk_policy_type_id = "";
        var fk_company_id = "";
        var fk_department_id = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $(".policy_section").show();
        $.each(common_float_data_arr, function(key_gmc, val_gmc) {
            common_float_policy_id = common_float_data_arr.common_float_policy_id;
            common_float_policy_fk_policy_id = common_float_data_arr.common_float_policy_fk_policy_id;
            fk_policy_type_id = common_float_data_arr.fk_policy_type_id;
            fk_company_id = common_float_data_arr.fk_company_id;
            fk_department_id = common_float_data_arr.fk_department_id;
            var policy_type_title = common_float_data_arr.policy_type_title;
            tot_commfloat_json_data = JSON.parse(common_float_data_arr.tot_commfloat_json_data);
            var comm_float_total_amount = common_float_data_arr.comm_float_total_amount;
            var comm_float_less_discount_rate = common_float_data_arr.comm_float_less_discount_rate;
            var comm_float_less_discount_tot = common_float_data_arr.comm_float_less_discount_tot;
            var comm_float_load_desc = common_float_data_arr.comm_float_load_desc;
            var comm_float_load_tot = common_float_data_arr.comm_float_load_tot;
            var comm_float_gross_premium = common_float_data_arr.comm_float_gross_premium;
            var comm_float_gross_premium_new = common_float_data_arr.comm_float_gross_premium_new;
            var comm_float_cgst_rate = common_float_data_arr.comm_float_cgst_rate;
            var comm_float_cgst_tot = common_float_data_arr.comm_float_cgst_tot;
            var comm_float_sgst_rate = common_float_data_arr.comm_float_sgst_rate;
            var comm_float_sgst_tot = common_float_data_arr.comm_float_sgst_tot;
            var comm_float_final_premium = common_float_data_arr.comm_float_final_premium;
            var comm_float_status = common_float_data_arr.comm_float_status;
            var comm_float_del_flag = common_float_data_arr.comm_float_del_flag;

            $("#comm_float_total_amount").text(comm_float_total_amount);
            $("#comm_float_less_discount_rate").text(comm_float_less_discount_rate);
            $("#comm_float_less_discount_tot").text(comm_float_less_discount_tot);
            $("#comm_float_load_desc").text(comm_float_load_desc);
            $("#comm_float_load_tot").text(comm_float_load_tot);
            $("#comm_float_gross_premium").text(comm_float_gross_premium);
            $("#comm_float_gross_premium_new").text(comm_float_gross_premium_new);
            $("#cgst_fire_per").text(comm_float_cgst_rate);
            $("#comm_float_cgst_tot").text(comm_float_cgst_tot);
            $("#sgst_fire_per").text(comm_float_sgst_rate);
            $("#comm_float_sgst_tot").text(comm_float_sgst_tot);
            $("#comm_float_final_premium").text(comm_float_final_premium);
            $("#common_float_policy_id").text(common_float_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var commonfloat_tr = "";
        var add_commonfloat_counter = "";
        var index = "";
        var commonfloat_length = tot_commfloat_json_data.length;
        var last_counter = commonfloat_length - 1;
        member_id_global = "";
        $.each(tot_commfloat_json_data, function(key, val) {
            add_commonfloat_counter = key;
            index = tot_commfloat_json_data[key][0];
            name_insured_member_name = tot_commfloat_json_data[key][1];
            name_insured_member_name_txt = tot_commfloat_json_data[key][2];
            name_insured_dob = tot_commfloat_json_data[key][3];
            name_insured_age = tot_commfloat_json_data[key][4];
            name_insured_relation = tot_commfloat_json_data[key][5];
            name_insured_relation_txt = tot_commfloat_json_data[key][6];
            past_history = tot_commfloat_json_data[key][7];
            type_of_policy = tot_commfloat_json_data[key][8];
            policy_option = tot_commfloat_json_data[key][9];
            family_size = tot_commfloat_json_data[0][10];
            nominee_name = tot_commfloat_json_data[0][11];
            nominee_name_txt = tot_commfloat_json_data[0][12];
            nominee_relation = tot_commfloat_json_data[0][13];
            nominee_relation_txt = tot_commfloat_json_data[0][14];
            name_insured_sum_insured = tot_commfloat_json_data[0][15];
            name_insured_premium = tot_commfloat_json_data[0][16];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (family_size == undefined || family_size == "Null" || family_size == "null" || family_size == "")
                family_size = "";

            if (type_of_policy == undefined || type_of_policy == "Null" || type_of_policy == "null" || type_of_policy == "")
                type_of_policy = "";

            if (policy_option == undefined || policy_option == "Null" || policy_option == "null" || policy_option == "")
                policy_option = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;
            // alert(name_insured_premium);
            // main_CommonInd.push(add_commonfloat_counter);
            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td><td>' + name_insured_age + '</td> <td>' + name_insured_relation_txt + '</td><td>' + type_of_policy + '</td>';

            if (add_commonfloat_counter == 0) {
                nominee_table_body += '<tr> <td>' + nominee_name_txt + '</td> <td >' + nominee_relation_txt + '</td> </tr>';
                policy_member_table_tbody += '<td rowspan="' + commonfloat_length + '">' + name_insured_sum_insured + '</td><td rowspan="' + commonfloat_length + '"> ' + basic_gross_premium + '</td></tr>';
            }

        });
        $("#Add_Common_Floater").attr("onClick", "AddCommonFloater(" + (parseInt(commonfloat_length) - 1) + ")");
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);

        $.each(tot_commfloat_json_data, function(key, val) {
            add_commonfloat_counter = key;
            index = tot_commfloat_json_data[key][0];
            name_insured_member_name = tot_commfloat_json_data[key][1];
            name_insured_relation = tot_commfloat_json_data[key][5];
            type_of_policy = tot_commfloat_json_data[key][8];
            policy_option = tot_commfloat_json_data[key][9];
            family_size = tot_commfloat_json_data[0][10];
            nominee_name = tot_commfloat_json_data[0][11];
            nominee_name_txt = tot_commfloat_json_data[0][12];
            nominee_relation = tot_commfloat_json_data[0][13];
            nominee_relation_txt = tot_commfloat_json_data[0][14];
            // alert(nominee_name);
            // $("#type_of_policy_"+add_commonfloat_counter).val(type_of_policy);
            $("#name_insured_member_name_" + add_commonfloat_counter).val(name_insured_member_name);
            $("#name_insured_relation_" + add_commonfloat_counter).val(name_insured_relation);
            $("#policy_option").val(policy_option);
            $("#nominee_name").val(nominee_name);
            $("#nominee_relation").val(nominee_relation);
        });
    }

    function edit_GMC(gmc_ind_data_arr, basic_sum_insured, basic_gross_premium) {

        var tot_gmc_json_data = "";
        var gmc_policy_id = "";
        var gmc_policy_fk_policy_id = "";
        var fk_policy_type_id = "";
        var fk_company_id = "";
        var fk_department_id = "";
        var main_GMC = [];
        $("#first_table_tbody").empty();
        $.each(gmc_ind_data_arr, function(key_gmc, val_gmc) {
            gmc_policy_id = gmc_ind_data_arr.gmc_policy_id;
            gmc_policy_fk_policy_id = gmc_ind_data_arr.gmc_policy_fk_policy_id;
            fk_policy_type_id = gmc_ind_data_arr.fk_policy_type_id;
            fk_company_id = gmc_ind_data_arr.fk_company_id;
            fk_department_id = gmc_ind_data_arr.fk_department_id;
            var policy_type_title = gmc_ind_data_arr.policy_type_title;
            tot_gmc_json_data = JSON.parse(gmc_ind_data_arr.tot_gmc_json_data);
            var gmc_family_size = gmc_ind_data_arr.gmc_family_size;
            var gmc_tot_sum_insured = gmc_ind_data_arr.gmc_tot_sum_insured;
            $("#gmc_family_size").text(gmc_family_size);
            $("#gmc_total_sum_insured").text(gmc_tot_sum_insured);
            $("#gmc_policy_id").val(gmc_policy_id);
        });
        var gmc_tr = "";
        var add_gmc_counter = "";
        var index = "";
        var gmc_length = tot_gmc_json_data.length;
        var last_counter = gmc_length - 1;
        $.each(tot_gmc_json_data, function(key, val) {
            add_gmc_counter = key;
            index = tot_gmc_json_data[key][0];
            gmc_client_email = tot_gmc_json_data[key][1];
            gmc_date = tot_gmc_json_data[key][2];
            gmc_excel_attach_file = tot_gmc_json_data[key][3];
            gmc_company_email = tot_gmc_json_data[key][4];
            gmc_attach_quote_file = tot_gmc_json_data[key][5];
            gmc_attach_endorsment_copy_file = tot_gmc_json_data[key][6];
            gmc_gross_premium = tot_gmc_json_data[key][7];
            gmc_cgst = tot_gmc_json_data[key][8];
            gmc_sgst = tot_gmc_json_data[key][9];
            gmc_final_premium = tot_gmc_json_data[key][10];
            main_GMC.push(add_gmc_counter);
            gmc_tr += '<tr><td>' + gmc_client_email + '</td> <td>' + gmc_date + '</td><td><span id="gmc_excel_details_' + add_gmc_counter + '"></span></td> <td>' + gmc_company_email + '</td><td><span id="gmc_quote_details_' + add_gmc_counter + '" > </span></td><td><span id="gmc_endorsment_copy_details_' + add_gmc_counter + '" > </span></td>  <td>' + gmc_gross_premium + '</td>  <td>' + gmc_cgst + '</td> <td>' + gmc_sgst + '</td>  <td>' + gmc_final_premium + '</td>   </tr>';

        });
        $("#first_table_tbody").append(gmc_tr);

        $.each(tot_gmc_json_data, function(key, val) {
            add_gmc_counter = key;
            gmc_excel_attach_file = tot_gmc_json_data[key][3];
            gmc_attach_quote_file = tot_gmc_json_data[key][5];
            gmc_attach_endorsment_copy_file = tot_gmc_json_data[key][6];
            // alert(gmc_excel_attach_file);
            if (gmc_excel_attach_file == "" || gmc_excel_attach_file == null) {
                // alert("hi")
                var view_gmc_excel_attach = "";
                var download_gmc_excel_attach = "";
            } else if (gmc_excel_attach_file != "") {
                var view_gmc_excel_attach = "<span >" + gmc_excel_attach_file + "</span><br><a href='<?php echo base_url(); ?>master/remote/view_doc/1/1/" + gmc_excel_attach_file + "'  class='text-info'><b>View</b></a>";
                var download_gmc_excel_attach = "<a href='<?php echo base_url(); ?>master/remote/download_doc/1/1/" + gmc_excel_attach_file + "'  class='text-success'><b>Download</b></a>";
            }
            if (gmc_attach_quote_file == "" || gmc_attach_quote_file == null) {
                var view_gmc_attach_quote = "";
                var download_gmc_attach_quote = "";
            } else if (gmc_attach_quote_file != "") {
                var view_gmc_attach_quote = "<span >" + gmc_attach_quote_file + "</span><br><a href='<?php echo base_url(); ?>master/remote/view_doc/1/2/" + gmc_attach_quote_file + "'  class='text-info'><b>View</b></a>";
                var download_gmc_attach_quote = "<a href='<?php echo base_url(); ?>master/remote/download_doc/1/2/" + gmc_attach_quote_file + "'  class='text-success'><b>Download</b></a>";
            }
            if (gmc_attach_endorsment_copy_file == "" || gmc_attach_endorsment_copy_file == null) {
                var view_gmc_attach_endorsment_copy = "";
                var download_gmc_attach_endorsment_copy = "";
            } else if (gmc_attach_endorsment_copy_file != "") {
                var view_gmc_attach_endorsment_copy = "<span >" + gmc_attach_endorsment_copy_file + "</span><br><a href='<?php echo base_url(); ?>master/remote/view_doc/1/3/" + gmc_attach_endorsment_copy_file + "'  class='text-info'><b>View</b></a>";
                var download_gmc_attach_endorsment_copy = "<a href='<?php echo base_url(); ?>master/remote/download_doc/1/3/" + gmc_attach_endorsment_copy_file + "'  class='text-success'><b>Download</b></a>";
            }
            $("#gmc_excel_details_" + add_gmc_counter).html(view_gmc_excel_attach + "  " + download_gmc_excel_attach);
            $("#gmc_quote_details_" + add_gmc_counter).html(view_gmc_attach_quote + "  " + download_gmc_attach_quote);
            $("#gmc_endorsment_copy_details_" + add_gmc_counter).html(view_gmc_attach_endorsment_copy + "  " + download_gmc_attach_endorsment_copy);
        });
    }

    function edit_GPA(gpa_ind_data_arr, basic_sum_insured, basic_gross_premium) {
        var tot_gpa_json_data = "";
        var gpa_policy_id = "";
        var gpa_policy_fk_policy_id = "";
        var fk_policy_type_id = "";
        var fk_company_id = "";
        var fk_department_id = "";
        var main_GPA = [];
        $("#first_table_tbody").empty();
        $.each(gpa_ind_data_arr, function(key_gpa, val_gpa) {
            gpa_policy_id = gpa_ind_data_arr.gpa_policy_id;
            gpa_policy_fk_policy_id = gpa_ind_data_arr.gpa_policy_fk_policy_id;
            fk_policy_type_id = gpa_ind_data_arr.fk_policy_type_id;
            fk_company_id = gpa_ind_data_arr.fk_company_id;
            fk_department_id = gpa_ind_data_arr.fk_department_id;
            var policy_type_title = gpa_ind_data_arr.policy_type_title;
            tot_gpa_json_data = JSON.parse(gpa_ind_data_arr.tot_gpa_json_data);
            var gpa_family_size = gpa_ind_data_arr.gpa_family_size;
            var gpa_tot_sum_insured = gpa_ind_data_arr.gpa_tot_sum_insured;
            $("#gmc_family_size").text(gpa_family_size);
            $("#gmc_total_sum_insured").text(gpa_tot_sum_insured);
            $("#gpa_policy_id").val(gpa_policy_id);
        });
        var gpa_tr = "";
        var add_gpa_counter = "";
        var index = "";
        var gpa_length = tot_gpa_json_data.length;
        var last_counter = gpa_length - 1;
        $.each(tot_gpa_json_data, function(key, val) {
            add_gpa_counter = key;
            index = tot_gpa_json_data[key][0];
            gpa_client_email = tot_gpa_json_data[key][1];
            gpa_date = tot_gpa_json_data[key][2];
            gpa_excel_attach_file = tot_gpa_json_data[key][3];
            gpa_company_email = tot_gpa_json_data[key][4];
            gpa_attach_quote_file = tot_gpa_json_data[key][5];
            gpa_attach_endorsment_copy_file = tot_gpa_json_data[key][6];
            gpa_gross_premium = tot_gpa_json_data[key][7];
            gpa_cgst = tot_gpa_json_data[key][8];
            gpa_sgst = tot_gpa_json_data[key][9];
            gpa_final_premium = tot_gpa_json_data[key][10];
            main_GPA.push(add_gpa_counter);
            gpa_tr += '<tr><td>' + gpa_client_email + '</td> <td>' + gpa_date + '</td><td><span id="gpa_excel_details_' + add_gpa_counter + '"></span></td> <td>' + gpa_company_email + '</td><td><span id="gpa_quote_details_' + add_gpa_counter + '" > </span></td><td><span id="gpa_endorsment_copy_details_' + add_gpa_counter + '" > </span></td>  <td>' + gpa_gross_premium + '</td>  <td>' + gpa_cgst + '</td> <td>' + gpa_sgst + '</td>  <td>' + gpa_final_premium + '</td>   </tr>';

        });
        $("#first_table_tbody").append(gpa_tr);

        $.each(tot_gpa_json_data, function(key, val) {
            add_gpa_counter = key;
            gpa_excel_attach_file = tot_gpa_json_data[key][3];
            gpa_attach_quote_file = tot_gpa_json_data[key][5];
            gpa_attach_endorsment_copy_file = tot_gpa_json_data[key][6];
            // alert(gpa_excel_attach_file);
            if (gpa_excel_attach_file == "" || gpa_excel_attach_file == null) {
                // alert("hi")
                var view_gpa_excel_attach = "";
                var download_gpa_excel_attach = "";
            } else if (gpa_excel_attach_file != "") {
                var view_gpa_excel_attach = "<span >" + gpa_excel_attach_file + "</span><br><a href='<?php echo base_url(); ?>master/remote/view_doc/1/1/" + gpa_excel_attach_file + "'  class='text-info'><b>View</b></a>";
                var download_gpa_excel_attach = "<a href='<?php echo base_url(); ?>master/remote/download_doc/1/1/" + gpa_excel_attach_file + "'  class='text-success'><b>Download</b></a>";
            }
            if (gpa_attach_quote_file == "" || gpa_attach_quote_file == null) {
                var view_gpa_attach_quote = "";
                var download_gpa_attach_quote = "";
            } else if (gpa_attach_quote_file != "") {
                var view_gpa_attach_quote = "<span >" + gpa_attach_quote_file + "</span><br><a href='<?php echo base_url(); ?>master/remote/view_doc/1/2/" + gpa_attach_quote_file + "'  class='text-info'><b>View</b></a>";
                var download_gpa_attach_quote = "<a href='<?php echo base_url(); ?>master/remote/download_doc/1/2/" + gpa_attach_quote_file + "'  class='text-success'><b>Download</b></a>";
            }
            if (gpa_attach_endorsment_copy_file == "" || gpa_attach_endorsment_copy_file == null) {
                var view_gpa_attach_endorsment_copy = "";
                var download_gpa_attach_endorsment_copy = "";
            } else if (gpa_attach_endorsment_copy_file != "") {
                var view_gpa_attach_endorsment_copy = "<span >" + gpa_attach_endorsment_copy_file + "</span><br><a href='<?php echo base_url(); ?>master/remote/view_doc/1/3/" + gpa_attach_endorsment_copy_file + "'  class='text-info'><b>View</b></a>";
                var download_gpa_attach_endorsment_copy = "<a href='<?php echo base_url(); ?>master/remote/download_doc/1/3/" + gpa_attach_endorsment_copy_file + "'  class='text-success'><b>Download</b></a>";
            }
            $("#gpa_excel_details_" + add_gpa_counter).html(view_gpa_excel_attach + "  " + download_gpa_excel_attach);
            $("#gpa_quote_details_" + add_gpa_counter).html(view_gpa_attach_quote + "  " + download_gpa_attach_quote);
            $("#gpa_endorsment_copy_details_" + add_gpa_counter).html(view_gpa_attach_endorsment_copy + "  " + download_gpa_attach_endorsment_copy);
        });
    }

    function edit_the_new_india_assu_supertopup_Float_policy(the_new_india_supertopup_ind_data_arr, policy_type, basic_sum_insured, basic_gross_premium) {
        var total_the_new_india_supertopup_ind_json_data = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $.each(the_new_india_supertopup_ind_data_arr, function(key_other, val_other) {
            var the_new_india_supertopup_assu_ind_policy_id = the_new_india_supertopup_ind_data_arr.the_new_india_supertopup_assu_ind_policy_id;
            var the_new_india_supertopup_ind_assu_policy_fk_policy_id = the_new_india_supertopup_ind_data_arr.the_new_india_supertopup_ind_assu_policy_fk_policy_id;
            var fk_policy_type_id = the_new_india_supertopup_ind_data_arr.fk_policy_type_id;
            var fk_company_id = the_new_india_supertopup_ind_data_arr.fk_company_id;
            var fk_department_id = the_new_india_supertopup_ind_data_arr.fk_department_id;
            var policy_type_title = the_new_india_supertopup_ind_data_arr.policy_type_title;
            total_the_new_india_supertopup_ind_json_data = JSON.parse(the_new_india_supertopup_ind_data_arr.total_the_new_india_supertopup_ind_json_data);

            var tot_premium = the_new_india_supertopup_ind_data_arr.tot_premium;
            var medi_cgst_rate = the_new_india_supertopup_ind_data_arr.medi_cgst_rate;
            var medi_cgst_tot = the_new_india_supertopup_ind_data_arr.medi_cgst_tot;
            var medi_sgst_rate = the_new_india_supertopup_ind_data_arr.medi_sgst_rate;
            var medi_sgst_tot = the_new_india_supertopup_ind_data_arr.medi_sgst_tot;
            var medi_final_premium = the_new_india_supertopup_ind_data_arr.medi_final_premium;
            var the_new_india_status = the_new_india_supertopup_ind_data_arr.the_new_india_status;
            var the_new_india_del_flag = the_new_india_supertopup_ind_data_arr.the_new_india_del_flag;
            // alert(supertopup_ind_policy_id);

            $("#tot_premium").text(tot_premium);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
            $("#the_new_india_supertopup_assu_ind_policy_id").text(the_new_india_supertopup_assu_ind_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var supertopup_tr = "";
        var add_newindia_supertop_counter = "";
        var index = "";
        var supertopup_length = total_the_new_india_supertopup_ind_json_data.length;
        member_id_global = "";
        $.each(total_the_new_india_supertopup_ind_json_data, function(key, val) {
            add_newindia_supertop_counter = key;
            // main_NewIndia_supertopup.push(add_newindia_supertop_counter);
            index = total_the_new_india_supertopup_ind_json_data[key][0];
            var name_insured_member_name = total_the_new_india_supertopup_ind_json_data[key][1];
            var name_insured_member_name_txt = total_the_new_india_supertopup_ind_json_data[key][2];
            var name_insured_dob = total_the_new_india_supertopup_ind_json_data[key][3];
            var name_insured_age = total_the_new_india_supertopup_ind_json_data[key][4];
            var name_insured_relation = total_the_new_india_supertopup_ind_json_data[key][5];
            var name_insured_relation_txt = total_the_new_india_supertopup_ind_json_data[key][6];
            var nominee_name = total_the_new_india_supertopup_ind_json_data[key][7];
            var nominee_name_txt = total_the_new_india_supertopup_ind_json_data[key][8];
            var nominee_relation = total_the_new_india_supertopup_ind_json_data[key][9];
            var nominee_relation_txt = total_the_new_india_supertopup_ind_json_data[key][10];
            var threshold = total_the_new_india_supertopup_ind_json_data[key][11];
            var name_insured_sum_insured = total_the_new_india_supertopup_ind_json_data[key][12];
            var basic_premium = total_the_new_india_supertopup_ind_json_data[key][13];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (threshold == undefined || threshold == "Null" || threshold == "null" || threshold == "")
                threshold = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td><td>' + name_insured_sum_insured + '</td>';

            nominee_table_body += '<tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';

            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + supertopup_length + '"> ' + basic_gross_premium + '</td></tr>';
        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);

    }

    function edit_the_new_india_assu_supertopup_INDIVIDUAL_policy(the_new_india_supertopup_ind_single_data_arr, policy_type, basic_sum_insured, basic_gross_premium) {
        var total_the_new_india_supertopup_ind_single_json_data = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $.each(the_new_india_supertopup_ind_single_data_arr, function(key_other, val_other) {
            var the_new_india_supertopup_assu_ind_single_policy_id = the_new_india_supertopup_ind_single_data_arr.the_new_india_supertopup_assu_ind_single_policy_id;
            var the_new_india_supertopup_ind_single_assu_policy_fk_policy_id = the_new_india_supertopup_ind_single_data_arr.the_new_india_supertopup_ind_single_assu_policy_fk_policy_id;
            var fk_policy_type_id = the_new_india_supertopup_ind_single_data_arr.fk_policy_type_id;
            var fk_company_id = the_new_india_supertopup_ind_single_data_arr.fk_company_id;
            var fk_department_id = the_new_india_supertopup_ind_single_data_arr.fk_department_id;
            var policy_type_title = the_new_india_supertopup_ind_single_data_arr.policy_type_title;
            total_the_new_india_supertopup_ind_single_json_data = JSON.parse(the_new_india_supertopup_ind_single_data_arr.total_the_new_india_supertopup_ind_single_json_data);

            var tot_premium = the_new_india_supertopup_ind_single_data_arr.tot_premium;
            var medi_cgst_rate = the_new_india_supertopup_ind_single_data_arr.medi_cgst_rate;
            var medi_cgst_tot = the_new_india_supertopup_ind_single_data_arr.medi_cgst_tot;
            var medi_sgst_rate = the_new_india_supertopup_ind_single_data_arr.medi_sgst_rate;
            var medi_sgst_tot = the_new_india_supertopup_ind_single_data_arr.medi_sgst_tot;
            var medi_final_premium = the_new_india_supertopup_ind_single_data_arr.medi_final_premium;
            var the_new_india_status = the_new_india_supertopup_ind_single_data_arr.the_new_india_status;
            var the_new_india_del_flag = the_new_india_supertopup_ind_single_data_arr.the_new_india_del_flag;
            // alert(supertopup_ind_policy_id);

            $("#tot_premium").text(tot_premium);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
            $("#the_new_india_supertopup_assu_ind_single_policy_id").text(the_new_india_supertopup_assu_ind_single_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var supertopup_tr = "";
        var add_newindia_supertop_counter = "";
        var index = "";
        var supertopup_length = total_the_new_india_supertopup_ind_single_json_data.length;
        member_id_global = "";
        $.each(total_the_new_india_supertopup_ind_single_json_data, function(key, val) {
            add_newindia_supertop_counter = key;
            // main_NewIndia_supertopup.push(add_newindia_supertop_counter);
            index = total_the_new_india_supertopup_ind_single_json_data[key][0];
            var name_insured_member_name = total_the_new_india_supertopup_ind_single_json_data[key][1];
            var name_insured_member_name_txt = total_the_new_india_supertopup_ind_single_json_data[key][2];
            var name_insured_dob = total_the_new_india_supertopup_ind_single_json_data[key][3];
            var name_insured_age = total_the_new_india_supertopup_ind_single_json_data[key][4];
            var name_insured_relation = total_the_new_india_supertopup_ind_single_json_data[key][5];
            var name_insured_relation_txt = total_the_new_india_supertopup_ind_single_json_data[key][6];
            var nominee_name = total_the_new_india_supertopup_ind_single_json_data[key][7];
            var nominee_name_txt = total_the_new_india_supertopup_ind_single_json_data[key][8];
            var nominee_relation = total_the_new_india_supertopup_ind_single_json_data[key][9];
            var nominee_relation_txt = total_the_new_india_supertopup_ind_single_json_data[key][10];
            var threshold = total_the_new_india_supertopup_ind_single_json_data[key][11];
            var name_insured_sum_insured = total_the_new_india_supertopup_ind_single_json_data[key][12];
            var basic_premium = total_the_new_india_supertopup_ind_single_json_data[key][13];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (threshold == undefined || threshold == "Null" || threshold == "null" || threshold == "")
                threshold = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td><td>' + name_insured_sum_insured + '</td>';

            nominee_table_body += '<tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';
            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + supertopup_length + '"> ' + basic_gross_premium + '</td></tr>';
        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);
    }

    function edit_hdfc_ergo_health_supertopup_Float_policy(hdfc_ergo_health_supertopup_float_data_arr, policy_type, basic_sum_insured, basic_gross_premium) {
        var tot_supertopup_float_hdfc_json = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $.each(hdfc_ergo_health_supertopup_float_data_arr, function(key_other, val_other) {
            var supertopup_float_policy_id = hdfc_ergo_health_supertopup_float_data_arr.supertopup_float_policy_id;
            var hdfc_ergo_health_super_topup_floater_policy_fk_policy_id = hdfc_ergo_health_supertopup_float_data_arr.hdfc_ergo_health_super_topup_floater_policy_fk_policy_id;
            var fk_policy_type_id = hdfc_ergo_health_supertopup_float_data_arr.fk_policy_type_id;
            var fk_company_id = hdfc_ergo_health_supertopup_float_data_arr.fk_company_id;
            var fk_department_id = hdfc_ergo_health_supertopup_float_data_arr.fk_department_id;
            var policy_type_title = hdfc_ergo_health_supertopup_float_data_arr.policy_type_title;
            tot_supertopup_float_hdfc_json = JSON.parse(hdfc_ergo_health_supertopup_float_data_arr.tot_supertopup_float_hdfc_json);

            var years_of_premium = hdfc_ergo_health_supertopup_float_data_arr.years_of_premium;
            var tot_premium = hdfc_ergo_health_supertopup_float_data_arr.tot_premium;
            var load_desc = hdfc_ergo_health_supertopup_float_data_arr.load_desc;
            var load_tot = hdfc_ergo_health_supertopup_float_data_arr.load_tot;
            var less_disc_per = hdfc_ergo_health_supertopup_float_data_arr.less_disc_per;
            var less_disc_tot = hdfc_ergo_health_supertopup_float_data_arr.less_disc_tot;
            var gross_premium_tot = hdfc_ergo_health_supertopup_float_data_arr.gross_premium_tot;
            var gross_premium_tot_new = hdfc_ergo_health_supertopup_float_data_arr.gross_premium_tot_new;
            var medi_cgst_rate = hdfc_ergo_health_supertopup_float_data_arr.medi_cgst_rate;
            var medi_cgst_tot = hdfc_ergo_health_supertopup_float_data_arr.medi_cgst_tot;
            var medi_sgst_rate = hdfc_ergo_health_supertopup_float_data_arr.medi_sgst_rate;
            var medi_sgst_tot = hdfc_ergo_health_supertopup_float_data_arr.medi_sgst_tot;
            var medi_final_premium = hdfc_ergo_health_supertopup_float_data_arr.medi_final_premium;
            var max_age = hdfc_ergo_health_supertopup_float_data_arr.max_age;
            var super_topup_policy_status = hdfc_ergo_health_supertopup_float_data_arr.super_topup_policy_status;
            var super_topup_policy_del_flag = hdfc_ergo_health_supertopup_float_data_arr.super_topup_policy_del_flag;
            // alert(supertopup_float_policy_id);

            $("#years_of_premium").text(years_of_premium);
            $("#tot_premium").text(tot_premium);
            $("#load_desc").text(load_desc);
            $("#load_tot").text(load_tot);
            $("#less_disc_per").text(less_disc_per);
            $("#less_disc_tot").text(less_disc_tot);
            $("#gross_premium_tot").text(gross_premium_tot);
            $("#gross_premium_tot_new").text(gross_premium_tot_new);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
            $("#max_age").text(max_age);
            $("#supertopup_float_policy_id").text(supertopup_float_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var supertopup_tr = "";
        var add_medi_hdfc_counter = "";
        var index = "";
        var Family_size_count = tot_supertopup_float_hdfc_json.length;
        member_id_global = "";
        $.each(tot_supertopup_float_hdfc_json, function(key, val) {
            add_medi_hdfc_counter = key;
            // main_supertopup_Medi_HDFC.push(add_medi_hdfc_counter);
            index = tot_supertopup_float_hdfc_json[key][0];
            var name_insured_member_name = tot_supertopup_float_hdfc_json[key][1];
            var name_insured_member_name_txt = tot_supertopup_float_hdfc_json[key][2];
            var name_insured_dob = tot_supertopup_float_hdfc_json[key][3];
            var name_insured_age = tot_supertopup_float_hdfc_json[key][4];
            var name_insured_relation = tot_supertopup_float_hdfc_json[key][5];
            var name_insured_relation_txt = tot_supertopup_float_hdfc_json[key][6];
            var nominee_name = tot_supertopup_float_hdfc_json[0][7];
            var nominee_name_txt = tot_supertopup_float_hdfc_json[0][8];
            var nominee_relation = tot_supertopup_float_hdfc_json[0][9];
            var nominee_relation_txt = tot_supertopup_float_hdfc_json[0][10];
            var deductable = tot_supertopup_float_hdfc_json[0][11];
            var name_insured_sum_insured = tot_supertopup_float_hdfc_json[0][12];
            var basic_premium = tot_supertopup_float_hdfc_json[0][13];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (deductable == undefined || deductable == "Null" || deductable == "null" || deductable == "")
                deductable = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td>';

            if (add_medi_hdfc_counter == 0) {
                nominee_table_body += '<tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td> </tr>';
                policy_member_table_tbody += '<td rowspan="' + Family_size_count + '">' + name_insured_sum_insured + '</td><td rowspan="' + Family_size_count + '"> ' + basic_gross_premium + '</td></tr>';
            }
        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);
    }

    function edit_hdfc_ergo_health_supertopup_Ind_policy(hdfc_ergo_health_supertopup_ind_data_arr, policy_type, basic_sum_insured, basic_gross_premium) {
        var tot_supertopup_ind_hdfc_json = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $.each(hdfc_ergo_health_supertopup_ind_data_arr, function(key_other, val_other) {
            var supertopup_ind_policy_id = hdfc_ergo_health_supertopup_ind_data_arr.supertopup_ind_policy_id;
            var hdfc_ergo_health_super_topup_policy_fk_policy_id = hdfc_ergo_health_supertopup_ind_data_arr.hdfc_ergo_health_super_topup_policy_fk_policy_id;
            var fk_policy_type_id = hdfc_ergo_health_supertopup_ind_data_arr.fk_policy_type_id;
            var fk_company_id = hdfc_ergo_health_supertopup_ind_data_arr.fk_company_id;
            var fk_department_id = hdfc_ergo_health_supertopup_ind_data_arr.fk_department_id;
            var policy_type_title = hdfc_ergo_health_supertopup_ind_data_arr.policy_type_title;
            tot_supertopup_ind_hdfc_json = JSON.parse(hdfc_ergo_health_supertopup_ind_data_arr.tot_supertopup_ind_hdfc_json);

            var years_of_premium = hdfc_ergo_health_supertopup_ind_data_arr.years_of_premium;
            var tot_premium = hdfc_ergo_health_supertopup_ind_data_arr.tot_premium;
            var load_desc = hdfc_ergo_health_supertopup_ind_data_arr.load_desc;
            var load_tot = hdfc_ergo_health_supertopup_ind_data_arr.load_tot;
            var less_disc_per = hdfc_ergo_health_supertopup_ind_data_arr.less_disc_per;
            var less_disc_tot = hdfc_ergo_health_supertopup_ind_data_arr.less_disc_tot;
            var gross_premium_tot = hdfc_ergo_health_supertopup_ind_data_arr.gross_premium_tot;
            var gross_premium_tot_new = hdfc_ergo_health_supertopup_ind_data_arr.gross_premium_tot_new;
            var medi_cgst_rate = hdfc_ergo_health_supertopup_ind_data_arr.medi_cgst_rate;
            var medi_cgst_tot = hdfc_ergo_health_supertopup_ind_data_arr.medi_cgst_tot;
            var medi_sgst_rate = hdfc_ergo_health_supertopup_ind_data_arr.medi_sgst_rate;
            var medi_sgst_tot = hdfc_ergo_health_supertopup_ind_data_arr.medi_sgst_tot;
            var medi_final_premium = hdfc_ergo_health_supertopup_ind_data_arr.medi_final_premium;
            var super_topup_policy_status = hdfc_ergo_health_supertopup_ind_data_arr.super_topup_policy_status;
            var super_topup_policy_del_flag = hdfc_ergo_health_supertopup_ind_data_arr.super_topup_policy_del_flag;
            // alert(supertopup_ind_policy_id);

            $("#years_of_premium").text(years_of_premium);
            $("#tot_premium").text(tot_premium);
            $("#load_desc").text(load_desc);
            $("#load_tot").text(load_tot);
            $("#less_disc_per").text(less_disc_per);
            $("#less_disc_tot").text(less_disc_tot);
            $("#gross_premium_tot").text(gross_premium_tot);
            $("#gross_premium_tot_new").text(gross_premium_tot_new);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
            $("#supertopup_ind_policy_id").text(supertopup_ind_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var supertopup_tr = "";
        var add_medi_hdfc_counter = "";
        var index = "";
        var supertopup_length = tot_supertopup_ind_hdfc_json.length;
        member_id_global = "";
        $.each(tot_supertopup_ind_hdfc_json, function(key, val) {
            add_medi_hdfc_counter = key;
            // main_supertopup_Medi_HDFC.push(add_medi_hdfc_counter);
            index = tot_supertopup_ind_hdfc_json[key][0];
            var name_insured_member_name = tot_supertopup_ind_hdfc_json[key][1];
            var name_insured_member_name_txt = tot_supertopup_ind_hdfc_json[key][2];
            var name_insured_dob = tot_supertopup_ind_hdfc_json[key][3];
            var name_insured_age = tot_supertopup_ind_hdfc_json[key][4];
            var name_insured_relation = tot_supertopup_ind_hdfc_json[key][5];
            var name_insured_relation_txt = tot_supertopup_ind_hdfc_json[key][6];
            var nominee_name = tot_supertopup_ind_hdfc_json[key][7];
            var nominee_name_txt = tot_supertopup_ind_hdfc_json[key][8];
            var nominee_relation = tot_supertopup_ind_hdfc_json[key][9];
            var nominee_relation_txt = tot_supertopup_ind_hdfc_json[key][10];
            var deductable = tot_supertopup_ind_hdfc_json[key][11];
            var name_insured_sum_insured = tot_supertopup_ind_hdfc_json[key][12];
            var basic_premium = tot_supertopup_ind_hdfc_json[key][13];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (deductable == undefined || deductable == "Null" || deductable == "null" || deductable == "")
                deductable = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td><td>' + name_insured_sum_insured + '</td>';

            nominee_table_body += '<tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td> </tr>';
            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + supertopup_length + '"> ' + basic_gross_premium + '</td></tr>';
        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);
    }

    function edit_supertopup_Individual_policy(supertopup_ind_data_arr, basic_sum_insured, basic_gross_premium) {
        var tot_supertopup_ind_json = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $(".policy_section").show();
        $.each(supertopup_ind_data_arr, function(key_other, val_other) {
            var supertopup_ind_policy_id = supertopup_ind_data_arr.supertopup_ind_policy_id;
            var supertopup_ind_policy_fk_policy_id = supertopup_ind_data_arr.supertopup_ind_policy_fk_policy_id;
            var fk_policy_type_id = supertopup_ind_data_arr.fk_policy_type_id;
            var policy_type_title = supertopup_ind_data_arr.policy_type_title;
            tot_supertopup_ind_json = JSON.parse(supertopup_ind_data_arr.tot_supertopup_ind_json);

            var supertopup_ind_total_premium = supertopup_ind_data_arr.supertopup_ind_total_premium;
            var supertopup_ind_load_description = supertopup_ind_data_arr.supertopup_ind_load_description;
            var supertopup_ind_load_amount = supertopup_ind_data_arr.supertopup_ind_load_amount;
            var supertopup_ind_load_gross_premium = supertopup_ind_data_arr.supertopup_ind_load_gross_premium;
            var supertopup_ind_cgst_rate = supertopup_ind_data_arr.supertopup_ind_cgst_rate;
            var supertopup_ind_cgst_tot = supertopup_ind_data_arr.supertopup_ind_cgst_tot;
            var supertopup_ind_sgst_rate = supertopup_ind_data_arr.supertopup_ind_sgst_rate;
            var supertopup_ind_sgst_tot = supertopup_ind_data_arr.supertopup_ind_sgst_tot;
            var supertopup_ind_final_premium = supertopup_ind_data_arr.supertopup_ind_final_premium;
            var supertopup_ind_status = supertopup_ind_data_arr.supertopup_ind_status;
            var supertopup_ind_del_flag = supertopup_ind_data_arr.supertopup_ind_del_flag;
            // alert(supertopup_ind_policy_id);

            $("#supertopup_ind_total_premium").text(supertopup_ind_total_premium);
            $("#supertopup_ind_description").text(supertopup_ind_load_description);
            $("#supertopup_ind_load_amount").text(supertopup_ind_load_amount);
            $("#supertopup_ind_load_gross_premium").text(supertopup_ind_load_gross_premium);
            $("#cgst_fire_per").text(supertopup_ind_cgst_rate);
            $("#supertopup_ind_cgst_tot").text(supertopup_ind_cgst_tot);
            $("#sgst_fire_per").text(supertopup_ind_sgst_rate);
            $("#supertopup_ind_sgst_tot").text(supertopup_ind_sgst_tot);
            $("#supertopup_ind_final_premium").text(supertopup_ind_final_premium);
            $("#supertopup_ind_policy_id").text(supertopup_ind_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var supertopup_tr = "";
        var add_supertopup_counter = "";
        var index = "";
        var supertopup_length = tot_supertopup_ind_json.length;
        var last_counter = supertopup_length - 1;
        var main_SuperTopUp_Ind = [];
        member_id_global = "";
        // alert(last_counter);
        $.each(tot_supertopup_ind_json, function(key, val) {
            add_supertopup_counter = key;
            main_SuperTopUp_Ind.push(add_supertopup_counter);
            index = tot_supertopup_ind_json[key][0];
            var name_insured_member_name = tot_supertopup_ind_json[key][1];
            var name_insured_member_name_txt = tot_supertopup_ind_json[key][2];
            var name_insured_dob = tot_supertopup_ind_json[key][3];
            var name_insured_age = tot_supertopup_ind_json[key][4];
            var name_insured_relation = tot_supertopup_ind_json[key][5];
            var name_insured_relation_txt = tot_supertopup_ind_json[key][6];
            var past_history = tot_supertopup_ind_json[key][7];
            var name_insured_policy_type = tot_supertopup_ind_json[key][8];
            var name_insured_policy_option = tot_supertopup_ind_json[key][9];
            var name_insured_deductable_thershold = tot_supertopup_ind_json[key][10];
            var name_insured_sum_insured = tot_supertopup_ind_json[key][11];
            var name_insured_premium = tot_supertopup_ind_json[key][12];
            var nominee_name = tot_supertopup_ind_json[key][13];
            var nominee_relation = tot_supertopup_ind_json[key][14];
            var nominee_name_txt = tot_supertopup_ind_json[key][15];
            var nominee_relation_txt = tot_supertopup_ind_json[key][16];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_policy_type == undefined || name_insured_policy_type == "Null" || name_insured_policy_type == "null" || name_insured_policy_type == "")
                name_insured_policy_type = "";

            if (name_insured_policy_option == undefined || name_insured_policy_option == "Null" || name_insured_policy_option == "null" || name_insured_policy_option == "")
                name_insured_policy_option = "";

            if (name_insured_deductable_thershold == undefined || name_insured_deductable_thershold == "Null" || name_insured_deductable_thershold == "null" || name_insured_deductable_thershold == "")
                name_insured_deductable_thershold = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td> <td><center>' + name_insured_dob + '</center></td> <td><center>' + name_insured_age + '</center></td> <td><center>' + name_insured_relation_txt + '</center></td><td><center>' + name_insured_policy_type + '</center> </td><td><center>' + name_insured_sum_insured + '</center> </td>';

            nominee_table_body += '<tr><td>' + nominee_name_txt + '</td><td>' + nominee_relation_txt + '</td></tr>';
            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + supertopup_length + '"> ' + basic_gross_premium + '</td></tr>';
        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);

    }

    function edit_supertopup_floater_policy(supertopup_floater_data_arr, basic_sum_insured, basic_gross_premium) {
        var tot_supertopup_floater_json = "";
        var name_insured_policy_option = "";
        var name_insured_deductable_thershold = "";
        var name_insured_sum_insured = "";
        var name_insured_premium = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $(".policy_section").show();
        $.each(supertopup_floater_data_arr, function(key_other, val_other) {
            var supertopup_floater_policy_id = supertopup_floater_data_arr.supertopup_floater_policy_id;
            var supertopup_floater_policy_fk_policy_id = supertopup_floater_data_arr.supertopup_floater_policy_fk_policy_id;
            var fk_policy_type_id = supertopup_floater_data_arr.fk_policy_type_id;
            var policy_type_title = supertopup_floater_data_arr.policy_type_title;
            // alert(policy_type_title);
            // var tot_supertopup_floater_json = supertopup_floater_data_arr.tot_supertopup_floater_json;
            tot_supertopup_floater_json = JSON.parse(supertopup_floater_data_arr.tot_supertopup_floater_json);

            name_insured_policy_option = supertopup_floater_data_arr.name_insured_policy_option;
            name_insured_deductable_thershold = supertopup_floater_data_arr.name_insured_deductable_thershold;
            name_insured_sum_insured = supertopup_floater_data_arr.name_insured_sum_insured;
            name_insured_premium = supertopup_floater_data_arr.name_insured_premium;

            var supertopup_floater_total_premium = supertopup_floater_data_arr.supertopup_floater_total_premium;
            var supertopup_floater_load_description = supertopup_floater_data_arr.supertopup_floater_load_description;
            var supertopup_floater_load_amount = supertopup_floater_data_arr.supertopup_floater_load_amount;
            var supertopup_floater_load_gross_premium = supertopup_floater_data_arr.supertopup_floater_load_gross_premium;
            var supertopup_floater_cgst_rate = supertopup_floater_data_arr.supertopup_floater_cgst_rate;
            var supertopup_floater_cgst_tot = supertopup_floater_data_arr.supertopup_floater_cgst_tot;
            var supertopup_floater_sgst_rate = supertopup_floater_data_arr.supertopup_floater_sgst_rate;
            var supertopup_floater_sgst_tot = supertopup_floater_data_arr.supertopup_floater_sgst_tot;
            var supertopup_floater_final_premium = supertopup_floater_data_arr.supertopup_floater_final_premium;
            var max_age = supertopup_floater_data_arr.max_age;
            var supertopup_floater_status = supertopup_floater_data_arr.supertopup_floater_status;
            var supertopup_floater_final_del_flag = supertopup_floater_data_arr.supertopup_floater_final_del_flag;
            // alert(supertopup_floater_policy_id);

            $("#supertopup_floater_total_premium").text(supertopup_floater_total_premium);
            $("#supertopup_floater_description").text(supertopup_floater_load_description);
            $("#supertopup_floater_load_amount").text(supertopup_floater_load_amount);
            $("#supertopup_floater_load_gross_premium").text(supertopup_floater_load_gross_premium);
            $("#cgst_fire_per").text(supertopup_floater_cgst_rate);
            $("#supertopup_floater_cgst_tot").text(supertopup_floater_cgst_tot);
            $("#sgst_fire_per").text(supertopup_floater_sgst_rate);
            $("#supertopup_floater_sgst_tot").text(supertopup_floater_sgst_tot);
            $("#supertopup_floater_final_premium").text(supertopup_floater_final_premium);
            $("#max_age").text(max_age);
            $("#supertopup_floater_policy_id").text(supertopup_floater_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var mediclaim_tr = "";
        var add_medi_counter = "";
        var index = "";
        var Family_size_count = tot_supertopup_floater_json.length;
        member_id_global = "";
        // alert(mediclaim_length);
        $.each(tot_supertopup_floater_json, function(key, val) {
            add_medi_counter = key;
            index = tot_supertopup_floater_json[key][0];
            var name_insured_member_name = tot_supertopup_floater_json[key][1];
            var name_insured_member_name_txt = tot_supertopup_floater_json[key][2];
            var name_insured_dob = tot_supertopup_floater_json[key][3];
            var name_insured_age = tot_supertopup_floater_json[key][4];
            var name_insured_relation = tot_supertopup_floater_json[key][5];
            var name_insured_relation_txt = tot_supertopup_floater_json[key][6];
            var past_history = tot_supertopup_floater_json[key][7];
            var name_insured_policy_type = tot_supertopup_floater_json[key][8];
            var nominee_name = tot_supertopup_floater_json[0][13];
            var nominee_relation = tot_supertopup_floater_json[0][14];
            var nominee_name_txt = tot_supertopup_floater_json[0][15];
            var nominee_relation_txt = tot_supertopup_floater_json[0][16];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_policy_type == undefined || name_insured_policy_type == "Null" || name_insured_policy_type == "null" || name_insured_policy_type == "")
                name_insured_policy_type = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td> <td>' + name_insured_policy_type + '</td>';

            if (add_medi_counter == 0) {
                nominee_table_body += '<tr><td ><center>' + nominee_name_txt + '</center></td><td ><center>' + nominee_relation_txt + '</center></td></tr>';
                policy_member_table_tbody += '<td rowspan="' + Family_size_count + '">' + name_insured_sum_insured + '</td><td rowspan="' + Family_size_count + '"> ' + basic_gross_premium + '</td></tr>';
            }

        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);
    }

    function edit_medi_floater2020_policy(medi_floater2020_data_arr, basic_sum_insured, basic_gross_premium) {
        var tot_medi_floater_2020_json = "";
        var name_insured_sum_insured = "";
        var name_insured_premium = "";
        var name_insured_ncd = "";
        var name_insured_premium_after_ncd = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $(".policy_section").show();
        $.each(medi_floater2020_data_arr, function(key_other, val_other) {
            var medi_floater_2020_id = medi_floater2020_data_arr.medi_floater_2020_id;
            var medi_floater2020_policy_fk_policy_id = medi_floater2020_data_arr.medi_floater2020_policy_fk_policy_id;
            var fk_policy_type_id = medi_floater2020_data_arr.fk_policy_type_id;
            var policy_type_title = medi_floater2020_data_arr.policy_type_title;
            // alert(policy_type_title);
            // var tot_medi_floater_2020_json = medi_floater2020_data_arr.tot_medi_floater_2020_json;
            tot_medi_floater_2020_json = JSON.parse(medi_floater2020_data_arr.tot_medi_floater_2020_json);

            name_insured_sum_insured = medi_floater2020_data_arr.name_insured_sum_insured;
            name_insured_premium = medi_floater2020_data_arr.name_insured_premium;
            name_insured_ncd = medi_floater2020_data_arr.name_insured_ncd;
            name_insured_premium_after_ncd = medi_floater2020_data_arr.name_insured_premium_after_ncd;

            var medi_float_2020_total_premium = medi_floater2020_data_arr.medi_float_2020_total_premium;
            var medi_float_2020_child_count = medi_floater2020_data_arr.medi_float_2020_child_count;
            var medi_float_2020_child_count_first_premium = medi_floater2020_data_arr.medi_float_2020_child_count_first_premium;
            var medi_float_2020_child_total_premium = medi_floater2020_data_arr.medi_float_2020_child_total_premium;
            var medi_float_2020_load_description = medi_floater2020_data_arr.medi_float_2020_load_description;
            var medi_float_2020_load_amount = medi_floater2020_data_arr.medi_float_2020_load_amount;
            var medi_float_2020_restore_cover_premium = medi_floater2020_data_arr.medi_float_2020_restore_cover_premium;
            var medi_float_2020_maternity_new_bornbaby = medi_floater2020_data_arr.medi_float_2020_maternity_new_bornbaby;
            var medi_float_2020_daily_cash_allow_hosp = medi_floater2020_data_arr.medi_float_2020_daily_cash_allow_hosp;
            var medi_float_2020_load_gross_premium = medi_floater2020_data_arr.medi_float_2020_load_gross_premium;
            var medi_float_2020_cgst_rate = medi_floater2020_data_arr.medi_float_2020_cgst_rate;
            var medi_float_2020_cgst_tot = medi_floater2020_data_arr.medi_float_2020_cgst_tot;
            var medi_float_2020_sgst_rate = medi_floater2020_data_arr.medi_float_2020_sgst_rate;
            var medi_float_2020_sgst_tot = medi_floater2020_data_arr.medi_float_2020_sgst_tot;
            var medi_float_2020_final_premium = medi_floater2020_data_arr.medi_float_2020_final_premium;
            var max_age = medi_floater2020_data_arr.max_age;
            var medi_float_2020_status = medi_floater2020_data_arr.medi_float_2020_status;
            var medi_float_2020_del_flag = medi_floater2020_data_arr.medi_float_2020_del_flag;
            // alert(medi_float_2020_final_premium);

            $("#medi_float_2020_total_premium").text(medi_float_2020_total_premium);
            $("#medi_float_2020_child_count").text(medi_float_2020_child_count);
            $("#medi_float_2020_child_count_first_premium").text(medi_float_2020_child_count_first_premium);
            $("#medi_float_2020_child_total_premium").text(medi_float_2020_child_total_premium);
            $("#medi_float_2020_load_description").text(medi_float_2020_load_description);
            $("#medi_float_2020_load_amount").text(medi_float_2020_load_amount);
            $("#medi_float_2020_restore_cover_premium").text(medi_float_2020_restore_cover_premium);
            $("#medi_float_2020_maternity_new_bornbaby").text(medi_float_2020_maternity_new_bornbaby);
            $("#medi_float_2020_daily_cash_allow_hosp").text(medi_float_2020_daily_cash_allow_hosp);
            $("#medi_float_2020_load_gross_premium").text(medi_float_2020_load_gross_premium);
            $("#cgst_fire_per").text(medi_float_2020_cgst_rate);
            $("#medi_float_2020_cgst_tot").text(medi_float_2020_cgst_tot);
            $("#sgst_fire_per").text(medi_float_2020_sgst_rate);
            $("#medi_float_2020_sgst_tot").text(medi_float_2020_sgst_tot);
            $("#medi_float_2020_final_premium").text(medi_float_2020_final_premium);
            $("#max_age").text(max_age);
            $("#medi_floater_2020_id").text(medi_floater_2020_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var mediclaim_tr = "";
        var add_medi_counter = "";
        var index = "";
        var medi_floater2020_length = tot_medi_floater_2020_json.length;
        member_id_global = "";
        // alert(mediclaim_length);
        $.each(tot_medi_floater_2020_json, function(key, val) {
            add_medi_counter = key;
            index = tot_medi_floater_2020_json[key][0];
            var name_insured_member_name = tot_medi_floater_2020_json[key][1];
            var name_insured_member_name_txt = tot_medi_floater_2020_json[key][2];
            var name_insured_dob = tot_medi_floater_2020_json[key][3];
            var name_insured_age = tot_medi_floater_2020_json[key][4];
            var name_insured_relation = tot_medi_floater_2020_json[key][5];
            var name_insured_relation_txt = tot_medi_floater_2020_json[key][6];
            var past_history = tot_medi_floater_2020_json[key][7];
            var name_insured_policy_type = tot_medi_floater_2020_json[key][8];
            var name_insured_policy_option = tot_medi_floater_2020_json[key][9];
            var name_insured_sum_insured = tot_medi_floater_2020_json[key][10];
            var name_insured_premium = tot_medi_floater_2020_json[key][11];
            var name_insured_ncd = tot_medi_floater_2020_json[key][12];
            var name_insured_premium_after_ncd = tot_medi_floater_2020_json[key][13];
            var nominee_name = tot_medi_floater_2020_json[0][14];
            var nominee_relation = tot_medi_floater_2020_json[0][15];
            var nominee_name_txt = tot_medi_floater_2020_json[0][16];
            var nominee_relation_txt = tot_medi_floater_2020_json[0][17];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_policy_type == undefined || name_insured_policy_type == "Null" || name_insured_policy_type == "null" || name_insured_policy_type == "")
                name_insured_policy_type = "";

            if (name_insured_policy_option == undefined || name_insured_policy_option == "Null" || name_insured_policy_option == "null" || name_insured_policy_option == "")
                name_insured_policy_option = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td><td >' + name_insured_policy_type + '</td>';

            if (add_medi_counter == 0) {
                nominee_table_body += '<tr><td><center>' + nominee_name_txt + '</center></td><td><center>' + nominee_relation_txt + '</center></td></tr>';
                policy_member_table_tbody += '<td rowspan="' + medi_floater2020_length + '">' + name_insured_sum_insured + '</td><td rowspan="' + medi_floater2020_length + '"> ' + basic_gross_premium + '</td></tr>';
            }
        });
        // alert(mediclaim_tr);
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);
        $("#name_insured_sum_insured").text(name_insured_sum_insured);
        $("#name_insured_premium").text(name_insured_premium);
        $("#name_insured_ncd").text(name_insured_ncd);
        $("#name_insured_premium_after_ncd").text(name_insured_premium_after_ncd);
    }

    function edit_mediclaim_floater2014_policy(mediclaim_floater2014_data_arr, basic_sum_insured, basic_gross_premium) {
        var tot_medi_floater_2014_json = "";
        var name_insured_sum_insured = "";
        var name_insured_premium = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $(".policy_section").show();
        $.each(mediclaim_floater2014_data_arr, function(key_other, val_other) {
            var medi_floater_2014_id = mediclaim_floater2014_data_arr.medi_floater_2014_id;
            var medi_floater_2014_policy_fk_policy_id = mediclaim_floater2014_data_arr.medi_floater_2014_policy_fk_policy_id;
            var fk_policy_type_id = mediclaim_floater2014_data_arr.fk_policy_type_id;
            var policy_type_title = mediclaim_floater2014_data_arr.policy_type_title;
            // alert(policy_type_title);
            // var tot_medi_floater_2014_json = mediclaim_floater2014_data_arr.tot_medi_floater_2014_json;
            tot_medi_floater_2014_json = JSON.parse(mediclaim_floater2014_data_arr.tot_medi_floater_2014_json);

            name_insured_sum_insured = mediclaim_floater2014_data_arr.name_insured_sum_insured;
            name_insured_premium = mediclaim_floater2014_data_arr.name_insured_premium;

            var medi_float_2014_total_premium = mediclaim_floater2014_data_arr.medi_float_2014_total_premium;
            var medi_float_2014_child_count = mediclaim_floater2014_data_arr.medi_float_2014_child_count;
            var medi_float_2014_child_count_first_premium = mediclaim_floater2014_data_arr.medi_float_2014_child_count_first_premium;
            var medi_float_2014_child_total_premium = mediclaim_floater2014_data_arr.medi_float_2014_child_total_premium;
            var medi_float_2014_load_description = mediclaim_floater2014_data_arr.medi_float_2014_load_description;
            var medi_float_2014_load_amount = mediclaim_floater2014_data_arr.medi_float_2014_load_amount;
            var medi_float_2014_load_gross_premium = mediclaim_floater2014_data_arr.medi_float_2014_load_gross_premium;
            var medi_float_2014_cgst_rate = mediclaim_floater2014_data_arr.medi_float_2014_cgst_rate;
            var medi_float_2014_cgst_tot = mediclaim_floater2014_data_arr.medi_float_2014_cgst_tot;
            var medi_float_2014_sgst_rate = mediclaim_floater2014_data_arr.medi_float_2014_sgst_rate;
            var medi_float_2014_sgst_tot = mediclaim_floater2014_data_arr.medi_float_2014_sgst_tot;
            var medi_float_2014_final_premium = mediclaim_floater2014_data_arr.medi_float_2014_final_premium;
            var max_age = mediclaim_floater2014_data_arr.max_age;
            var medi_float_2014_status = mediclaim_floater2014_data_arr.medi_float_2014_status;
            var medi_float_2014_del_flag = mediclaim_floater2014_data_arr.medi_float_2014_del_flag;
            // alert(medi_float_2014_final_premium);

            $("#medi_float_2014_total_premium").text(medi_float_2014_total_premium);
            $("#medi_float_2014_child_count").text(medi_float_2014_child_count);
            $("#medi_float_2014_child_count_first_premium").text(medi_float_2014_child_count_first_premium);
            $("#medi_float_2014_child_total_premium").text(medi_float_2014_child_total_premium);
            $("#medi_float_2014_load_description").text(medi_float_2014_load_description);
            $("#medi_float_2014_load_amount").text(medi_float_2014_load_amount);
            $("#medi_float_2014_load_gross_premium").text(medi_float_2014_load_gross_premium);
            $("#cgst_fire_per").text(medi_float_2014_cgst_rate);
            $("#medi_float_2014_cgst_tot").text(medi_float_2014_cgst_tot);
            $("#sgst_fire_per").text(medi_float_2014_sgst_rate);
            $("#medi_float_2014_sgst_tot").text(medi_float_2014_sgst_tot);
            $("#medi_float_2014_final_premium").text(medi_float_2014_final_premium);
            $("#max_age").text(max_age);
            $("#medi_floater_2014_id").text(medi_floater_2014_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var mediclaim_tr = "";
        var add_medi_counter = "";
        var index = "";
        var mediclaim_length = tot_medi_floater_2014_json.length;
        member_id_global = "";
        // alert(mediclaim_length);
        $.each(tot_medi_floater_2014_json, function(key, val) {
            add_medi_counter = key;
            index = tot_medi_floater_2014_json[key][0];
            var name_insured_member_name = tot_medi_floater_2014_json[key][1];
            var name_insured_member_name_txt = tot_medi_floater_2014_json[key][2];
            var name_insured_dob = tot_medi_floater_2014_json[key][3];
            var name_insured_age = tot_medi_floater_2014_json[key][4];
            var name_insured_relation = tot_medi_floater_2014_json[key][5];
            var name_insured_relation_txt = tot_medi_floater_2014_json[key][6];
            var past_history = tot_medi_floater_2014_json[key][7];
            var name_insured_policy_type = tot_medi_floater_2014_json[key][8];
            var name_insured_policy_option = tot_medi_floater_2014_json[key][9];
            var name_insured_sum_insured = tot_medi_floater_2014_json[key][10];
            var name_insured_premium = tot_medi_floater_2014_json[key][11];
            var nominee_name = tot_medi_floater_2014_json[0][12];
            var nominee_relation = tot_medi_floater_2014_json[0][13];
            var nominee_name_txt = tot_medi_floater_2014_json[0][14];
            var nominee_relation_txt = tot_medi_floater_2014_json[0][15];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_policy_type == undefined || name_insured_policy_type == "Null" || name_insured_policy_type == "null" || name_insured_policy_type == "")
                name_insured_policy_type = "";

            if (name_insured_policy_option == undefined || name_insured_policy_option == "Null" || name_insured_policy_option == "null" || name_insured_policy_option == "")
                name_insured_policy_option = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td> <td><center>' + name_insured_policy_type + '</center></td>';

            if (add_medi_counter == 0) {
                nominee_table_body += '<tr><td><center>' + nominee_name_txt + '</center></td><td><center>' + nominee_relation_txt + '</center></td></tr>';
                policy_member_table_tbody += '<td rowspan="' + mediclaim_length + '">' + name_insured_sum_insured + '</td><td rowspan="' + mediclaim_length + '"> ' + basic_gross_premium + '</td></tr>';
            }

        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);

        $("#name_insured_sum_insured").text(name_insured_sum_insured);
        $("#name_insured_premium").text(name_insured_premium);
    }

    function edit_medi_ind2020_policy(medi_ind2020_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var tot_medi_ind2020_json = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $(".policy_section").show();
        $.each(medi_ind2020_policy_data_arr, function(key_other, val_other) {
            var medi_ind2020_policy_id = medi_ind2020_policy_data_arr.medi_ind2020_policy_id;
            var medi_ind2020_policy_fk_policy_id = medi_ind2020_policy_data_arr.medi_ind2020_policy_fk_policy_id;
            var fk_policy_type_id = medi_ind2020_policy_data_arr.fk_policy_type_id;
            var policy_type_title = medi_ind2020_policy_data_arr.policy_type_title;

            // var tot_medi_ind2020_json = medi_ind2020_policy_data_arr.tot_medi_ind2020_json;
            tot_medi_ind2020_json = JSON.parse(medi_ind2020_policy_data_arr.tot_medi_ind2020_json);
            var medi_ind_2020_total_premium = medi_ind2020_policy_data_arr.medi_ind_2020_total_premium;
            var medi_ind_2020_family_descount_per = medi_ind2020_policy_data_arr.medi_ind_2020_family_descount_per;
            var medi_ind_2020_family_descount_tot = medi_ind2020_policy_data_arr.medi_ind_2020_family_descount_tot;
            var medi_ind_2020_load_description = medi_ind2020_policy_data_arr.medi_ind_2020_load_description;
            var medi_ind_2020_load_amount = medi_ind2020_policy_data_arr.medi_ind_2020_load_amount;
            var medi_ind_2020_restore_cover_premium = medi_ind2020_policy_data_arr.medi_ind_2020_restore_cover_premium;
            var medi_ind_2020_maternity_new_bornbaby = medi_ind2020_policy_data_arr.medi_ind_2020_maternity_new_bornbaby;
            var medi_ind_2020_daily_cash_allow_hosp = medi_ind2020_policy_data_arr.medi_ind_2020_daily_cash_allow_hosp;
            var medi_ind_2020_load_gross_premium = medi_ind2020_policy_data_arr.medi_ind_2020_load_gross_premium;
            var new_load_gross_premium = medi_ind2020_policy_data_arr.new_load_gross_premium;
            var medi_ind_2020_cgst_rate = medi_ind2020_policy_data_arr.medi_ind_2020_cgst_rate;
            var medi_ind_2020_cgst_tot = medi_ind2020_policy_data_arr.medi_ind_2020_cgst_tot;
            var medi_ind_2020_sgst_rate = medi_ind2020_policy_data_arr.medi_ind_2020_sgst_rate;
            var medi_ind_2020_sgst_tot = medi_ind2020_policy_data_arr.medi_ind_2020_sgst_tot;
            var medi_ind_2020_final_premium = medi_ind2020_policy_data_arr.medi_ind_2020_final_premium;
            var medi_ind_2020_status = medi_ind2020_policy_data_arr.medi_ind_2020_status;
            var medi_ind_2020_del_flag = medi_ind2020_policy_data_arr.medi_ind_2020_del_flag;
            // alert(medi_final_premium);
            $("#medi_ind_2020_total_premium").text(medi_ind_2020_total_premium);
            $("#medi_ind_2020_family_descount_per").text(medi_ind_2020_family_descount_per);
            $("#medi_ind_2020_family_descount_tot").text(medi_ind_2020_family_descount_tot);
            $("#medi_ind_2020_load_description").text(medi_ind_2020_load_description);
            $("#medi_ind_2020_load_amount").text(medi_ind_2020_load_amount);
            $("#medi_ind_2020_restore_cover_premium").text(medi_ind_2020_restore_cover_premium);
            $("#medi_ind_2020_maternity_new_bornbaby").text(medi_ind_2020_maternity_new_bornbaby);
            $("#medi_ind_2020_daily_cash_allow_hosp").text(medi_ind_2020_daily_cash_allow_hosp);
            $("#medi_ind_2020_load_gross_premium").text(medi_ind_2020_load_gross_premium);
            $("#new_load_gross_premium").text(new_load_gross_premium);
            $("#cgst_fire_per").text(medi_ind_2020_cgst_rate);
            $("#medi_ind_2020_cgst_tot").text(medi_ind_2020_cgst_tot);
            $("#sgst_fire_per").text(medi_ind_2020_sgst_rate);
            $("#medi_ind_2020_sgst_tot").text(medi_ind_2020_sgst_tot);
            $("#medi_ind_2020_final_premium").text(medi_ind_2020_final_premium);
            $("#medi_ind2020_policy_id").text(medi_ind2020_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var mediclaim_tr = "";
        var add_medi_counter2020 = "";
        var index = "";
        var mediclaim_length = tot_medi_ind2020_json.length;
        var main_Mediclaim2020 = [];
        var restore_cover_flage = false;
        var maternity_new_born_baby_cover_flage = false;
        var daily_cash_allowance_cover_flage = false;
        member_id_global = "";
        $.each(tot_medi_ind2020_json, function(key, val) {
            add_medi_counter2020 = key;
            main_Mediclaim2020.push(add_medi_counter2020);
            index = tot_medi_ind2020_json[key][0];
            var name_insured_member_name = tot_medi_ind2020_json[key][1];
            var name_insured_member_name_txt = tot_medi_ind2020_json[key][2];
            var name_insured_dob = tot_medi_ind2020_json[key][3];
            var name_insured_age = tot_medi_ind2020_json[key][4];
            var name_insured_relation = tot_medi_ind2020_json[key][5];
            var name_insured_relation_txt = tot_medi_ind2020_json[key][6];
            var past_history = tot_medi_ind2020_json[key][7];
            var name_insured_policy_type = tot_medi_ind2020_json[key][8];
            var name_insured_policy_option = tot_medi_ind2020_json[key][9];
            var name_insured_sum_insured = tot_medi_ind2020_json[key][10];
            var name_insured_premium = tot_medi_ind2020_json[key][11];
            var name_insured_ncd = tot_medi_ind2020_json[key][12];
            var name_insured_premium_after_ncd = tot_medi_ind2020_json[key][13];
            var restore_cover = tot_medi_ind2020_json[key][14];
            var restore_cover_premium = tot_medi_ind2020_json[key][15];
            var maternity_new_born_baby_cover = tot_medi_ind2020_json[key][16];
            var maternity_new_born_baby_cover_premium = tot_medi_ind2020_json[key][17];
            var daily_cash_allowance_cover = tot_medi_ind2020_json[key][18];
            var daily_cash_allowance_cover_premium = tot_medi_ind2020_json[key][19];
            var final_combine_cover_with_afterncd_premium = tot_medi_ind2020_json[key][20];
            var nominee_name = tot_medi_ind2020_json[key][21];
            var nominee_relation = tot_medi_ind2020_json[key][22];
            var nominee_name_txt = tot_medi_ind2020_json[key][23];
            var nominee_relation_txt = tot_medi_ind2020_json[key][24];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_policy_type == undefined || name_insured_policy_type == "Null" || name_insured_policy_type == "null" || name_insured_policy_type == "")
                name_insured_policy_type = "";

            if (name_insured_policy_option == undefined || name_insured_policy_option == "Null" || name_insured_policy_option == "null" || name_insured_policy_option == "")
                name_insured_policy_option = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            if (restore_cover == "Required") {
                restore_cover_flage = true;
                restore_cover_premium = restore_cover_premium;
            } else if (restore_cover == "Not Required") {
                restore_cover_premium = "";
            }

            if (maternity_new_born_baby_cover == "Required") {
                maternity_new_born_baby_cover_flage = true;
                maternity_new_born_baby_cover_premium = maternity_new_born_baby_cover_premium;
            } else if (maternity_new_born_baby_cover == "Not Required") {
                maternity_new_born_baby_cover_premium = "";
            }

            if (daily_cash_allowance_cover == "Required") {
                daily_cash_allowance_cover_flage = true;
                daily_cash_allowance_cover_premium = daily_cash_allowance_cover_premium;
            } else if (daily_cash_allowance_cover == "Not Required") {
                daily_cash_allowance_cover_premium = "";
            }

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td><td>' + name_insured_policy_type + '</td><td>' + name_insured_sum_insured + '</td>';

            nominee_table_body += '<tr><td>' + nominee_name_txt + '</td><td>' + nominee_relation_txt + '</td></tr>';

            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + mediclaim_length + '"> ' + basic_gross_premium + '</td></tr>';

        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);
        if (restore_cover_flage == false) {
            $("#restore_C_th").hide();
            $("#restore_CP_th").hide();
            $(".restore_C_td").hide();
            $(".restore_CP_td").hide();
        }
        if (maternity_new_born_baby_cover_flage == false) {
            $("#maternity_C_th").hide();
            $("#maternity_CP_th").hide();
            $(".maternity_C_td").hide();
            $(".maternity_CP_td").hide();
        }
        if (daily_cash_allowance_cover_flage == false) {
            $("#daily_C_th").hide();
            $("#daily_CP_th").hide();
            $(".daily_C_td").hide();
            $(".daily_CP_td").hide();
        }

    }

    function edit_medi_floater_the_new_india_assu_policy(medi_float_the_new_india_assu_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_the_new_india_medi_float_json_data = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $.each(medi_float_the_new_india_assu_policy_data_arr, function(key_other, val_other) {
            var medi_new_india_assu_float_policy_id = medi_float_the_new_india_assu_policy_data_arr.medi_new_india_assu_float_policy_id;
            var medi_the_new_india_floater_assu_fk_policy_id = medi_float_the_new_india_assu_policy_data_arr.medi_the_new_india_floater_assu_fk_policy_id;
            var fk_policy_type_id = medi_float_the_new_india_assu_policy_data_arr.fk_policy_type_id;
            var policy_type_title = medi_float_the_new_india_assu_policy_data_arr.policy_type_title;
            var fk_company_id = medi_float_the_new_india_assu_policy_data_arr.fk_company_id;
            var fk_department_id = medi_float_the_new_india_assu_policy_data_arr.fk_department_id;

            total_the_new_india_medi_float_json_data = JSON.parse(medi_float_the_new_india_assu_policy_data_arr.total_the_new_india_medi_float_json_data);

            var tot_premium = medi_float_the_new_india_assu_policy_data_arr.tot_premium;
            var floater_disc_rate = medi_float_the_new_india_assu_policy_data_arr.floater_disc_rate;
            var floater_disc_tot = medi_float_the_new_india_assu_policy_data_arr.floater_disc_tot;
            var gross_premium_tot = medi_float_the_new_india_assu_policy_data_arr.gross_premium_tot;
            var gross_premium_tot_new = medi_float_the_new_india_assu_policy_data_arr.gross_premium_tot_new;
            var medi_cgst_rate = medi_float_the_new_india_assu_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_float_the_new_india_assu_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_float_the_new_india_assu_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_float_the_new_india_assu_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_float_the_new_india_assu_policy_data_arr.medi_final_premium;

            var the_new_india_status = medi_float_the_new_india_assu_policy_data_arr.the_new_india_status;
            var the_new_india_del_flag = medi_float_the_new_india_assu_policy_data_arr.the_new_india_del_flag;
            // alert(medi_final_premium);
            $("#tot_premium").text(tot_premium);
            $("#floater_disc_rate").text(floater_disc_rate);
            $("#floater_disc_tot").text(floater_disc_tot);
            $("#gross_premium_tot").text(gross_premium_tot);
            $("#gross_premium_tot_new").text(gross_premium_tot_new);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
            $("#medi_new_india_assu_float_policy_id").text(medi_new_india_assu_float_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var mediclaim_tr = "";
        var add_medi_hdfc_counter = "";
        var index = "";
        var mediclaim_length = total_the_new_india_medi_float_json_data.length;
        var main_Mediclaim_HDFC = [];
        member_id_global = "";
        $.each(total_the_new_india_medi_float_json_data, function(key, val) {
            // alert(sum_insured_dropdown_val);
            add_medi_hdfc_counter = key;
            main_Mediclaim_HDFC.push(add_medi_hdfc_counter);
            index = total_the_new_india_medi_float_json_data[key][0];
            var name_insured_member_name = total_the_new_india_medi_float_json_data[key][1];
            var name_insured_member_name_txt = total_the_new_india_medi_float_json_data[key][2];
            var name_insured_dob = total_the_new_india_medi_float_json_data[key][3];
            var name_insured_age = total_the_new_india_medi_float_json_data[key][4];
            var name_insured_relation = total_the_new_india_medi_float_json_data[key][5];
            var name_insured_relation_txt = total_the_new_india_medi_float_json_data[key][6];
            var nominee_name = total_the_new_india_medi_float_json_data[key][7];
            var nominee_name_txt = total_the_new_india_medi_float_json_data[key][8];
            var nominee_relation = total_the_new_india_medi_float_json_data[key][9];
            var nominee_relation_txt = total_the_new_india_medi_float_json_data[key][10];
            var name_insured_sum_insured = total_the_new_india_medi_float_json_data[key][11];
            var basic_premium = total_the_new_india_medi_float_json_data[key][12];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td><td>' + name_insured_sum_insured + '</td>';

            nominee_table_body += '<tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';
            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + mediclaim_length + '"> ' + basic_gross_premium + '</td></tr>';

        });
        $("#Add_Mediclaim_HDFC").attr("onClick", "AddMediclaimHDFC(" + (mediclaim_length) + ")");
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);

    }

    function edit_medi_ind_the_new_india_assu_2017_policy(medi_ind_the_new_india_2017_assu_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_the_new_india_medi_tns_hdfc_json_data = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $.each(medi_ind_the_new_india_2017_assu_policy_data_arr, function(key_other, val_other) {
            var medi_insu_new_india_tns_assu_ind_policy_id = medi_ind_the_new_india_2017_assu_policy_data_arr.medi_insu_new_india_tns_assu_ind_policy_id;
            var the_new_india_medi_policy_2017_ind_assu_fk_policy_id = medi_ind_the_new_india_2017_assu_policy_data_arr.the_new_india_medi_policy_2017_ind_assu_fk_policy_id;
            var fk_policy_type_id = medi_ind_the_new_india_2017_assu_policy_data_arr.fk_policy_type_id;
            var policy_type_title = medi_ind_the_new_india_2017_assu_policy_data_arr.policy_type_title;
            var fk_company_id = medi_ind_the_new_india_2017_assu_policy_data_arr.fk_company_id;
            var fk_department_id = medi_ind_the_new_india_2017_assu_policy_data_arr.fk_department_id;

            total_the_new_india_medi_tns_hdfc_json_data = JSON.parse(medi_ind_the_new_india_2017_assu_policy_data_arr.total_the_new_india_medi_tns_hdfc_json_data);

            var tot_premium = medi_ind_the_new_india_2017_assu_policy_data_arr.tot_premium;
            var medi_cgst_rate = medi_ind_the_new_india_2017_assu_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_ind_the_new_india_2017_assu_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_ind_the_new_india_2017_assu_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_ind_the_new_india_2017_assu_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_ind_the_new_india_2017_assu_policy_data_arr.medi_final_premium;
            var the_new_india_status = medi_ind_the_new_india_2017_assu_policy_data_arr.the_new_india_status;
            var the_new_india_del_flag = medi_ind_the_new_india_2017_assu_policy_data_arr.the_new_india_del_flag;
            // alert(medi_final_premium);
            $("#tot_premium").text(tot_premium);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
            $("#medi_insu_new_india_tns_assu_ind_policy_id").text(medi_insu_new_india_tns_assu_ind_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var mediclaim_tr = "";
        var add_medi_hdfc_counter = "";
        var index = "";
        var mediclaim_length = total_the_new_india_medi_tns_hdfc_json_data.length;
        var main_Mediclaim_HDFC = [];
        member_id_global = "";
        $.each(total_the_new_india_medi_tns_hdfc_json_data, function(key, val) {
            // alert(sum_insured_dropdown_val);
            add_medi_hdfc_counter = key;
            // main_Mediclaim_HDFC.push(add_medi_hdfc_counter);
            index = total_the_new_india_medi_tns_hdfc_json_data[key][0];
            var name_insured_member_name = total_the_new_india_medi_tns_hdfc_json_data[key][1];
            var name_insured_member_name_txt = total_the_new_india_medi_tns_hdfc_json_data[key][2];
            var name_insured_dob = total_the_new_india_medi_tns_hdfc_json_data[key][3];
            var name_insured_age = total_the_new_india_medi_tns_hdfc_json_data[key][4];
            var name_insured_relation = total_the_new_india_medi_tns_hdfc_json_data[key][5];
            var name_insured_relation_txt = total_the_new_india_medi_tns_hdfc_json_data[key][6];
            var nominee_name = total_the_new_india_medi_tns_hdfc_json_data[key][7];
            var nominee_name_txt = total_the_new_india_medi_tns_hdfc_json_data[key][8];
            var nominee_relation = total_the_new_india_medi_tns_hdfc_json_data[key][9];
            var nominee_relation_txt = total_the_new_india_medi_tns_hdfc_json_data[key][10];
            var name_insured_sum_insured = total_the_new_india_medi_tns_hdfc_json_data[key][11];
            var basic_premium = total_the_new_india_medi_tns_hdfc_json_data[key][12];
            var ncd_type = total_the_new_india_medi_tns_hdfc_json_data[key][13];
            var ncd_prem = total_the_new_india_medi_tns_hdfc_json_data[key][14];
            var maternity_type = total_the_new_india_medi_tns_hdfc_json_data[key][15];
            var maternity_prem = total_the_new_india_medi_tns_hdfc_json_data[key][16];
            var limit_of_cataract_type = total_the_new_india_medi_tns_hdfc_json_data[key][17];
            var limit_of_cataract_prem = total_the_new_india_medi_tns_hdfc_json_data[key][18];
            var tot_prem = total_the_new_india_medi_tns_hdfc_json_data[key][19];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name_txt == "null")
                name_insured_member_name_txt = "";

            if (name_insured_relation_txt == "null")
                name_insured_relation_txt = "";

            if (nominee_name_txt == "null")
                nominee_name_txt = "";

            if (nominee_relation_txt == "null")
                nominee_relation_txt = "";

            if (name_insured_sum_insured == "null")
                name_insured_sum_insured = "";

            if (ncd_type == "null")
                ncd_type = "";

            if (maternity_type == "null")
                maternity_type = "";

            if (limit_of_cataract_type == "null")
                limit_of_cataract_type = "";

            if (limit_of_cataract_prem == "null")
                limit_of_cataract_prem = "";

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td><td>' + name_insured_sum_insured + '</td>';

            nominee_table_body += '<tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';
            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + mediclaim_length + '"> ' + basic_gross_premium + '</td></tr>';

        });
        policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);
    }

    function edit_medi_float_Suraksha_policy_HDFC_ERGO_HEALTH_INSURANCE_LTD(medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_suraksha_float_medi_hdfc_json_data = "";
        var tr_table = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $(".policy_section").show();
        $.each(medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr, function(key_other, val_other) {
            var medi_hdfc_ergo_health_float_suraksha_policy_id = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_float_suraksha_policy_id;
            var medi_hdfc_ergo_health_insu_suraksha_floater_policy_fk_policy_id = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_suraksha_floater_policy_fk_policy_id;
            var fk_policy_type_id = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.fk_policy_type_id;
            var policy_type_title = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.policy_type_title;
            total_suraksha_float_medi_hdfc_json_data = JSON.parse(medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.total_suraksha_float_medi_hdfc_json_data);
            var years_of_premium = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.years_of_premium;
            var region = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.region;
            var tot_premium = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.tot_premium;
            var hdfc_ergo_health_insu_child_count = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.hdfc_ergo_health_insu_child_count;
            var hdfc_ergo_health_insu_child_count_first_premium = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.hdfc_ergo_health_insu_child_count_first_premium;
            var hdfc_ergo_health_insu_child_total_premium = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.hdfc_ergo_health_insu_child_total_premium;
            var load_desc = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.load_desc;
            var load_tot = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.load_tot;
            var less_disc_per = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.less_disc_per;
            var less_disc_tot = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.less_disc_tot;
            var gross_premium_tot = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.gross_premium_tot;
            var gross_premium_tot_new = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.gross_premium_tot_new;
            var medi_cgst_rate = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.medi_final_premium;
            var max_age = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.max_age;
            var suraksha_floater_policy_status = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.suraksha_floater_policy_status;
            var suraksha_floater_policy_del_flag = medi_float_suraksha_hdfc_ergo_health_insu_policy_data_arr.suraksha_floater_policy_del_flag;

            $("#medi_hdfc_ergo_health_float_suraksha_policy_id").text(medi_hdfc_ergo_health_float_suraksha_policy_id);
            $("#years_of_premium").text(years_of_premium);
            $("#region").text(region);
            $("#tot_premium").text(tot_premium);
            $("#hdfc_ergo_health_insu_child_count").text(hdfc_ergo_health_insu_child_count);
            $("#hdfc_ergo_health_insu_child_count_first_premium").text(hdfc_ergo_health_insu_child_count_first_premium);
            $("#hdfc_ergo_health_insu_child_total_premium").text(hdfc_ergo_health_insu_child_total_premium);
            $("#load_desc").text(load_desc);
            $("#load_tot").text(load_tot);
            $("#less_disc_per").text(less_disc_per);
            $("#less_disc_tot").text(less_disc_tot);
            $("#gross_premium_tot").text(gross_premium_tot);
            $("#gross_premium_tot_new").text(gross_premium_tot_new);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
            $("#max_age").text(max_age);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var table_tr = "";
        var add_medi_hdfc_counter = "";
        var index = "";
        var Family_size_count = total_suraksha_float_medi_hdfc_json_data.length;
        member_id_global = "";
        // alert(mediclaim_length);
        var type_of_policy = "";
        $.each(total_suraksha_float_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            index = total_suraksha_float_medi_hdfc_json_data[key][0];
            var name_insured_member_name = total_suraksha_float_medi_hdfc_json_data[key][1];
            var name_insured_member_name_txt = total_suraksha_float_medi_hdfc_json_data[key][2];
            var name_insured_dob = total_suraksha_float_medi_hdfc_json_data[key][3];
            var name_insured_age = total_suraksha_float_medi_hdfc_json_data[key][4];
            var name_insured_relation = total_suraksha_float_medi_hdfc_json_data[key][5];
            var name_insured_relation_txt = total_suraksha_float_medi_hdfc_json_data[key][6];
            var nominee_name = total_suraksha_float_medi_hdfc_json_data[0][7];
            var nominee_name_txt = total_suraksha_float_medi_hdfc_json_data[0][8];
            var nominee_relation = total_suraksha_float_medi_hdfc_json_data[0][9];
            var nominee_relation_txt = total_suraksha_float_medi_hdfc_json_data[0][10];
            type_of_policy = total_suraksha_float_medi_hdfc_json_data[0][11];
            var name_insured_sum_insured = total_suraksha_float_medi_hdfc_json_data[0][12];
            var ncb_per = total_suraksha_float_medi_hdfc_json_data[0][13];
            var basic_premium = total_suraksha_float_medi_hdfc_json_data[0][14];
            var hospital_daliy_cash = total_suraksha_float_medi_hdfc_json_data[0][15];
            var hospital_daliy_cash_pre = total_suraksha_float_medi_hdfc_json_data[0][16];
            var tot_pre = total_suraksha_float_medi_hdfc_json_data[0][17];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (type_of_policy == undefined || type_of_policy == "Null" || type_of_policy == "null" || type_of_policy == "")
                type_of_policy = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td>';

            if (add_medi_hdfc_counter == 0) {
                type_of_policy += ' <td>' + type_of_policy + '</td>';
                nominee_table_body += ' <tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td> </tr>';
                policy_member_table_tbody += '<td rowspan="' + Family_size_count + '">' + type_of_policy + '</td><td rowspan="' + Family_size_count + '">' + name_insured_sum_insured + '</td><td rowspan="' + Family_size_count + '"> ' + basic_gross_premium + '</td></tr>';
            }

        });
        // policy_member_table_tbody = policy_member_table_tbody + type_of_policy + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);
    }

    function edit_medi_ind_HDFC_ERGO_HEALTH_INSURANCE_LTD_Surksha_policy(medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_suraksha_medi_hdfc_json_data = "";
        var tr_table = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $(".policy_section").show();
        $.each(medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr, function(key_other, val_other) {
            var medi_hdfc_ergo_health_insu_suraksha_policy_id = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_suraksha_policy_id;
            var medi_hdfc_ergo_health_insu_suraksha_policy_fk_policy_id = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_suraksha_policy_fk_policy_id;
            var fk_policy_type_id = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.fk_policy_type_id;
            var policy_type_title = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.policy_type_title;
            total_suraksha_medi_hdfc_json_data = JSON.parse(medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.total_suraksha_medi_hdfc_json_data);

            var years_of_premium = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.years_of_premium;
            var region = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.region;
            var tot_premium = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.tot_premium;
            var load_desc = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.load_desc;
            var load_tot = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.load_tot;
            var less_disc_per = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.less_disc_per;
            var less_disc_tot = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.less_disc_tot;
            var family_disc_per = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.family_disc_per;
            var family_disc_tot = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.family_disc_tot;
            var gross_premium_tot = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.gross_premium_tot;
            var gross_premium_tot_new = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.gross_premium_tot_new;
            var medi_cgst_rate = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.medi_final_premium;
            var medi_hdfc_ergo_health_insu_suraksha_policy_status = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_suraksha_policy_status;
            var medi_hdfc_ergo_health_insu_suraksha_policy_del_flag = medi_suraksha_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_suraksha_policy_del_flag;

            $("#medi_hdfc_ergo_health_insu_suraksha_policy_id").text(medi_hdfc_ergo_health_insu_suraksha_policy_id);
            $("#years_of_premium").text(years_of_premium);
            $("#region").text(region);
            $("#tot_premium").text(tot_premium);
            $("#load_desc").text(load_desc);
            $("#load_tot").text(load_tot);
            $("#less_disc_per").text(less_disc_per);
            $("#less_disc_tot").text(less_disc_tot);
            $("#family_disc_per").text(family_disc_per);
            $("#family_disc_tot").text(family_disc_tot);
            $("#gross_premium_tot").text(gross_premium_tot);
            $("#gross_premium_tot_new").text(gross_premium_tot_new);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var add_medi_hdfc_counter = "";
        var index = "";
        var medi_ind_hdfc_length = total_suraksha_medi_hdfc_json_data.length;
        member_id_global = "";
        $.each(total_suraksha_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            // main_suraksha_Medi_HDFC.push(add_medi_hdfc_counter);
            index = total_suraksha_medi_hdfc_json_data[key][0];
            var name_insured_member_name = total_suraksha_medi_hdfc_json_data[key][1];
            var name_insured_member_name_txt = total_suraksha_medi_hdfc_json_data[key][2];
            var name_insured_dob = total_suraksha_medi_hdfc_json_data[key][3];
            var name_insured_age = total_suraksha_medi_hdfc_json_data[key][4];
            var name_insured_relation = total_suraksha_medi_hdfc_json_data[key][5];
            var name_insured_relation_txt = total_suraksha_medi_hdfc_json_data[key][6];
            var nominee_name = total_suraksha_medi_hdfc_json_data[key][7];
            var nominee_name_txt = total_suraksha_medi_hdfc_json_data[key][8];
            var nominee_relation = total_suraksha_medi_hdfc_json_data[key][9];
            var nominee_relation_txt = total_suraksha_medi_hdfc_json_data[key][10];
            var type_of_policy = total_suraksha_medi_hdfc_json_data[key][11];
            var name_insured_sum_insured = total_suraksha_medi_hdfc_json_data[key][12];
            var ncb_per = total_suraksha_medi_hdfc_json_data[key][13];
            var basic_premium = total_suraksha_medi_hdfc_json_data[key][14];
            var hospital_daliy_cash = total_suraksha_medi_hdfc_json_data[key][15];
            var hospital_daliy_cash_pre = total_suraksha_medi_hdfc_json_data[key][16];
            var tot_pre = total_suraksha_medi_hdfc_json_data[key][17];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (type_of_policy == undefined || type_of_policy == "Null" || type_of_policy == "null" || type_of_policy == "")
                type_of_policy = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            if (type_of_policy == "null")
                type_of_policy = "";
            if (name_insured_sum_insured == "null")
                name_insured_sum_insured = "";
            if (hospital_daliy_cash == "null")
                hospital_daliy_cash = "";

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td><td>' + type_of_policy + '</td><td>' + name_insured_sum_insured + '</td>';

            nominee_table_body += '<tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';

            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + medi_ind_hdfc_length + '"> ' + basic_gross_premium + '</td></tr>';

            // alert(tr_table);
        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);
    }

    function edit_medi_float_HDFC_ERGO_HEALTH_INSURANCE_LTD_easy_rate_card_policy(easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr, basic_sum_insured, basic_gross_premium) {
        var total_easy_float_medi_hdfc_json_data = "";
        var tr_table = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $(".policy_section").show();
        $(".protector_rider").show();
        $.each(easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr, function(key_other, val_other) {
            var medi_hdfc_ergo_health_insu_easy_float_policy_id = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.medi_hdfc_ergo_health_insu_easy_float_policy_id;
            var hdfc_ergo_health_easy_rate_card_float_policy_fk_policy_id = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.hdfc_ergo_health_easy_rate_card_float_policy_fk_policy_id;
            var fk_policy_type_id = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.fk_policy_type_id;
            var policy_type_title = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.policy_type_title;

            total_easy_float_medi_hdfc_json_data = JSON.parse(easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.total_easy_float_medi_hdfc_json_data);
            var years_of_premium = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.years_of_premium;
            var region = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.region;
            var tot_premium = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.tot_premium;
            var hdfc_ergo_health_insu_child_count = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.hdfc_ergo_health_insu_child_count;
            var hdfc_ergo_health_insu_child_count_first_premium = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.hdfc_ergo_health_insu_child_count_first_premium;
            var hdfc_ergo_health_insu_child_total_premium = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.hdfc_ergo_health_insu_child_total_premium;
            var protect_ride_prem_tot = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.protect_ride_prem_tot;
            var hospital_daily_cash_prem_tot = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.hospital_daily_cash_prem_tot;
            var ipa_rider_prem_tot = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.ipa_rider_prem_tot;
            var load_desc = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.load_desc;
            var load_tot = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.load_tot;
            var less_disc_per = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.less_disc_per;
            var tot_basic_prem = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.tot_basic_prem;
            var less_disc_tot = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.less_disc_tot;
            var stay_active_benefit = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.stay_active_benefit;
            var stay_active_benefit_prem = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.stay_active_benefit_prem;
            var gross_premium_tot = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.gross_premium_tot;
            var gross_premium_tot_new = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.gross_premium_tot_new;
            var medi_cgst_rate = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.medi_cgst_rate;
            var medi_cgst_tot = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.medi_cgst_tot;
            var medi_sgst_rate = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.medi_sgst_rate;
            var medi_sgst_tot = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.medi_sgst_tot;
            var medi_final_premium = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.medi_final_premium;
            var max_age = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.max_age;

            var easy_rate_status = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.easy_rate_status;
            var easy_rate_del_flag = easy_rtate_card_medi_float_hdfc_ergo_health_insu_arr.easy_rate_del_flag;

            $("#medi_hdfc_ergo_health_insu_easy_float_policy_id").text(medi_hdfc_ergo_health_insu_easy_float_policy_id);
            $("#years_of_premium").text(years_of_premium);
            $("#region").text(region);
            $("#tot_premium").text(tot_premium);
            $("#hdfc_ergo_health_insu_child_count").text(hdfc_ergo_health_insu_child_count);
            $("#hdfc_ergo_health_insu_child_count_first_premium").text(hdfc_ergo_health_insu_child_count_first_premium);
            $("#hdfc_ergo_health_insu_child_total_premium").text(hdfc_ergo_health_insu_child_total_premium);
            $("#protect_ride_prem_tot").text(protect_ride_prem_tot);
            $("#hospital_daily_cash_prem_tot").text(hospital_daily_cash_prem_tot);
            $("#ipa_rider_prem_tot").text(ipa_rider_prem_tot);
            $("#load_desc").text(load_desc);
            $("#load_tot").text(load_tot);
            $("#less_disc_per").text(less_disc_per);
            $("#tot_basic_prem").text(tot_basic_prem);
            $("#less_disc_tot").text(less_disc_tot);
            $("#stay_active_benefit").text(stay_active_benefit);
            $("#stay_active_benefit_prem").text(stay_active_benefit_prem);
            $("#gross_premium_tot").text(gross_premium_tot);
            $("#gross_premium_tot_new").text(gross_premium_tot_new);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
            $("#max_age").text(max_age);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var protector_rider_type = "";
        var protector_rider_prem = "";
        var table_tr = "";
        var add_medi_hdfc_counter = "";
        var index = "";
        var type_of_policy = "";
        var Family_size_count = total_easy_float_medi_hdfc_json_data.length;
        member_id_global = "";
        // alert(mediclaim_length);
        $.each(total_easy_float_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            index = total_easy_float_medi_hdfc_json_data[key][0];
            var name_insured_member_name = total_easy_float_medi_hdfc_json_data[key][1];
            var name_insured_member_name_txt = total_easy_float_medi_hdfc_json_data[key][2];
            var name_insured_dob = total_easy_float_medi_hdfc_json_data[key][3];
            var name_insured_age = total_easy_float_medi_hdfc_json_data[key][4];
            var past_history = total_easy_float_medi_hdfc_json_data[key][5];
            var name_insured_relation = total_easy_float_medi_hdfc_json_data[key][6];
            var name_insured_relation_txt = total_easy_float_medi_hdfc_json_data[key][7];
            var nominee_name = total_easy_float_medi_hdfc_json_data[0][8];
            var nominee_name_txt = total_easy_float_medi_hdfc_json_data[0][9];
            var nominee_relation = total_easy_float_medi_hdfc_json_data[0][10];
            var nominee_relation_txt = total_easy_float_medi_hdfc_json_data[0][11];
            type_of_policy = total_easy_float_medi_hdfc_json_data[0][12];
            var name_insured_sum_insured = total_easy_float_medi_hdfc_json_data[0][13];
            var ncb_per = total_easy_float_medi_hdfc_json_data[0][14];
            protector_rider_type = total_easy_float_medi_hdfc_json_data[0][15];
            protector_rider_prem = total_easy_float_medi_hdfc_json_data[0][16];
            var hospital_daily_cash_per_day = total_easy_float_medi_hdfc_json_data[0][17];
            var hospital_daily_cash_prem = total_easy_float_medi_hdfc_json_data[0][18];
            var ipa_rider_sum_insured = total_easy_float_medi_hdfc_json_data[0][19];
            var ipa_rider_prem = total_easy_float_medi_hdfc_json_data[0][20];
            var basic_premium = total_easy_float_medi_hdfc_json_data[0][21];
            var optional_premium = total_easy_float_medi_hdfc_json_data[0][22];
            var premium_after_discount = total_easy_float_medi_hdfc_json_data[0][23];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (type_of_policy == undefined || type_of_policy == "Null" || type_of_policy == "null" || type_of_policy == "")
                type_of_policy = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td>';

            if (add_medi_hdfc_counter == 0) {
                type_of_policy += '<td>' + type_of_policy + '</td>';
                protector_rider_type += '<td>' + protector_rider_type + '<br/>' + protector_rider_prem + '</td>';
                nominee_table_body += '<tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';
                policy_member_table_tbody += '<td rowspan="' + Family_size_count + '">' + type_of_policy + '</td><td rowspan="' + Family_size_count + '">' + protector_rider_type + '<br/>' + protector_rider_prem + '</td><td rowspan="' + Family_size_count + '">' + name_insured_sum_insured + '</td><td rowspan="' + Family_size_count + '"> ' + basic_gross_premium + '</td></tr>';
            }

        });
        // policy_member_table_tbody = policy_member_table_tbody + type_of_policy + protector_rider_type + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);

    }

    function edit_medi_ind_HDFC_ERGO_HEALTH_INSURANCE_LTD_easy_rate_card_policy(easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr, basic_sum_insured, basic_gross_premium) {
        var total_easy_medi_hdfc_json_data = "";
        var tr_table = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $(".policy_section").show();
        $(".protector_rider").show();
        $.each(easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr, function(key_other, val_other) {
            var medi_hdfc_ergo_health_insu_easy_policy_id = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.medi_hdfc_ergo_health_insu_easy_policy_id;
            var hdfc_ergo_health_easy_rate_card_indi_policy_fk_policy_id = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.hdfc_ergo_health_easy_rate_card_indi_policy_fk_policy_id;
            var fk_policy_type_id = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.fk_policy_type_id;
            var policy_type_title = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.policy_type_title;

            total_easy_medi_hdfc_json_data = JSON.parse(easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.total_easy_medi_hdfc_json_data);
            var years_of_premium = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.years_of_premium;
            var region = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.region;
            var tot_premium = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.tot_premium;
            var protect_ride_prem_tot = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.protect_ride_prem_tot;
            var hospital_daily_cash_prem_tot = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.hospital_daily_cash_prem_tot;
            var ipa_rider_prem_tot = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.ipa_rider_prem_tot;
            var load_desc = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.load_desc;
            var load_tot = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.load_tot;
            var less_disc_per = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.less_disc_per;
            var tot_basic_prem = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.tot_basic_prem;
            var less_disc_tot = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.less_disc_tot;
            var family_disc_per = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.family_disc_per;
            var family_disc_tot = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.family_disc_tot;
            var gross_premium_tot = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.gross_premium_tot;
            var gross_premium_tot_new = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.gross_premium_tot_new;
            var medi_cgst_rate = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.medi_cgst_rate;
            var medi_cgst_tot = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.medi_cgst_tot;
            var medi_sgst_rate = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.medi_sgst_rate;
            var medi_sgst_tot = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.medi_sgst_tot;
            var medi_final_premium = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.medi_final_premium;

            var easy_rate_status = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.easy_rate_status;
            var easy_rate_del_flag = easy_rtate_card_medi_ind_hdfc_ergo_health_insu_arr.easy_rate_del_flag;

            $("#medi_hdfc_ergo_health_insu_easy_policy_id").text(medi_hdfc_ergo_health_insu_easy_policy_id);
            $("#years_of_premium").text(years_of_premium);
            $("#region").text(region);
            $("#tot_premium").text(tot_premium);
            $("#protect_ride_prem_tot").text(protect_ride_prem_tot);
            $("#hospital_daily_cash_prem_tot").text(hospital_daily_cash_prem_tot);
            $("#ipa_rider_prem_tot").text(ipa_rider_prem_tot);
            $("#load_desc").text(load_desc);
            $("#load_tot").text(load_tot);
            $("#less_disc_per").text(less_disc_per);
            $("#tot_basic_prem").text(tot_basic_prem);
            $("#less_disc_tot").text(less_disc_tot);
            $("#family_disc_per").text(family_disc_per);
            $("#family_disc_tot").text(family_disc_tot);
            $("#gross_premium_tot").text(gross_premium_tot);
            $("#gross_premium_tot_new").text(gross_premium_tot_new);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var protector_rider_type = "";
        var protector_rider_prem = "";
        var add_medi_hdfc_counter = "";
        var index = "";
        var medi_ind_hdfc_length = total_easy_medi_hdfc_json_data.length;
        member_id_global = "";
        $.each(total_easy_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            // main_Mediclaim_HDFC.push(add_medi_hdfc_counter);
            index = total_easy_medi_hdfc_json_data[key][0];
            var name_insured_member_name = total_easy_medi_hdfc_json_data[key][1];
            var name_insured_member_name_txt = total_easy_medi_hdfc_json_data[key][2];
            var name_insured_dob = total_easy_medi_hdfc_json_data[key][3];
            var name_insured_age = total_easy_medi_hdfc_json_data[key][4];
            var past_history = total_easy_medi_hdfc_json_data[key][5];
            var name_insured_relation = total_easy_medi_hdfc_json_data[key][6];
            var name_insured_relation_txt = total_easy_medi_hdfc_json_data[key][7];
            var nominee_name = total_easy_medi_hdfc_json_data[key][8];
            var nominee_name_txt = total_easy_medi_hdfc_json_data[key][9];
            var nominee_relation = total_easy_medi_hdfc_json_data[key][10];
            var nominee_relation_txt = total_easy_medi_hdfc_json_data[key][11];
            var type_of_policy = total_easy_medi_hdfc_json_data[key][12];
            var name_insured_sum_insured = total_easy_medi_hdfc_json_data[key][13];
            var ncb_per = total_easy_medi_hdfc_json_data[key][14];
            protector_rider_type = total_easy_medi_hdfc_json_data[key][15];
            protector_rider_prem = total_easy_medi_hdfc_json_data[key][16];
            var hospital_daily_cash_per_day = total_easy_medi_hdfc_json_data[key][17];
            var hospital_daily_cash_prem = total_easy_medi_hdfc_json_data[key][18];
            var ipa_rider_sum_insured = total_easy_medi_hdfc_json_data[key][19];
            var ipa_rider_prem = total_easy_medi_hdfc_json_data[key][20];
            var basic_premium = total_easy_medi_hdfc_json_data[key][21];
            var stay_active_benefit = total_easy_medi_hdfc_json_data[key][22];
            var stay_active_benefit_prem = total_easy_medi_hdfc_json_data[key][23];
            var premium_after_discount = total_easy_medi_hdfc_json_data[key][24];
            var optional_premium = total_easy_medi_hdfc_json_data[key][25];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (type_of_policy == undefined || type_of_policy == "Null" || type_of_policy == "null" || type_of_policy == "")
                type_of_policy = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td> <td>' + type_of_policy + '</td> <td>' + protector_rider_type + '<br/>' + protector_rider_prem + '</td><td>' + name_insured_sum_insured + '</td>';

            nominee_table_body += '<tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';
            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + medi_ind_hdfc_length + '">' + basic_gross_premium + '</td></tr>';
            // alert(tr_table);
        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>'+ basic_gross_premium + '</td></tr>';
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);

    }

    function edit_medi_ind_HDFC_ERGO_HEALTH_INSURANCE_LTD_Energy_policy(medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_energy_medi_hdfc_json_data = "";
        var tr_table = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $(".policy_section").show();
        $.each(medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr, function(key_other, val_other) {
            var medi_hdfc_ergo_health_insu_energy_policy_id = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_energy_policy_id;
            var medi_hdfc_ergo_health_insu_energy_policy_fk_policy_id = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_energy_policy_fk_policy_id;
            var fk_policy_type_id = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.fk_policy_type_id;
            var policy_type_title = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.policy_type_title;
            total_energy_medi_hdfc_json_data = JSON.parse(medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.total_energy_medi_hdfc_json_data);

            var tot_premium = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.tot_premium;
            var less_disc_per = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.less_disc_per;
            var less_disc_tot = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.less_disc_tot;
            var load_desc = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.load_desc;
            var load_tot = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.load_tot;
            var gross_premium_tot = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.gross_premium_tot;
            var gross_premium_tot_new = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.gross_premium_tot_new;
            var medi_cgst_rate = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.medi_final_premium;
            var medi_hdfc_ergo_health_insu_energy_policy_status = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_energy_policy_status;
            var medi_hdfc_ergo_health_insu_energy_policy_del_flag = medi_energy_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_energy_policy_del_flag;

            $("#medi_hdfc_ergo_health_insu_energy_policy_id").text(medi_hdfc_ergo_health_insu_energy_policy_id);
            $("#tot_premium").text(tot_premium);
            $("#less_disc_per").text(less_disc_per);
            $("#less_disc_tot").text(less_disc_tot);
            $("#load_desc").text(load_desc);
            $("#load_tot").text(load_tot);
            $("#gross_premium_tot").text(gross_premium_tot);
            $("#gross_premium_tot_new").text(gross_premium_tot_new);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var add_medi_hdfc_counter = "";
        var index = "";
        var medi_ind_hdfc_length = total_energy_medi_hdfc_json_data.length;
        member_id_global = "";
        $.each(total_energy_medi_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            // main_Energy_Medi_HDFC.push(add_medi_hdfc_counter);
            index = total_energy_medi_hdfc_json_data[key][0];
            var name_insured_member_name = total_energy_medi_hdfc_json_data[key][1];
            var name_insured_member_name_txt = total_energy_medi_hdfc_json_data[key][2];
            var name_insured_dob = total_energy_medi_hdfc_json_data[key][3];
            var name_insured_age = total_energy_medi_hdfc_json_data[key][4];
            var name_insured_relation = total_energy_medi_hdfc_json_data[key][5];
            var name_insured_relation_txt = total_energy_medi_hdfc_json_data[key][6];
            var nominee_name = total_energy_medi_hdfc_json_data[key][7];
            var nominee_name_txt = total_energy_medi_hdfc_json_data[key][8];
            var nominee_relation = total_energy_medi_hdfc_json_data[key][9];
            var nominee_relation_txt = total_energy_medi_hdfc_json_data[key][10];
            var type_of_policy = total_energy_medi_hdfc_json_data[key][11];
            var name_insured_sum_insured = total_energy_medi_hdfc_json_data[key][12];
            var basic_premium = total_energy_medi_hdfc_json_data[key][13];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (type_of_policy == undefined || type_of_policy == "Null" || type_of_policy == "null" || type_of_policy == "")
                type_of_policy = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td><td>' + type_of_policy + '</td><td>' + name_insured_sum_insured + '</td>';

            nominee_table_body += '<tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';
            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + medi_ind_hdfc_length + '">' + basic_gross_premium + '</td></tr>';
            // alert(tr_table);
        });
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);
    }

    function edit_medi_ind_HDFC_ERGO_HEALTH_INSURANCE_LTD_Optima_restore_policy(medi_ind_hdfc_ergo_health_insu_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_medi_ind_hdfc_json_data = "";
        var tr_table = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $(".protector_rider").show();
        $.each(medi_ind_hdfc_ergo_health_insu_policy_data_arr, function(key_other, val_other) {
            var medi_hdfc_ergo_health_insu_policy_id = medi_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_policy_id;
            var medi_hdfc_ergo_health_insu_policy_fk_policy_id = medi_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_policy_fk_policy_id;
            var fk_policy_type_id = medi_ind_hdfc_ergo_health_insu_policy_data_arr.fk_policy_type_id;
            var policy_type_title = medi_ind_hdfc_ergo_health_insu_policy_data_arr.policy_type_title;
            total_medi_ind_hdfc_json_data = JSON.parse(medi_ind_hdfc_ergo_health_insu_policy_data_arr.total_medi_ind_hdfc_json_data);
            var years_of_premium = medi_ind_hdfc_ergo_health_insu_policy_data_arr.years_of_premium;
            var region = medi_ind_hdfc_ergo_health_insu_policy_data_arr.region;
            var tot_premium = medi_ind_hdfc_ergo_health_insu_policy_data_arr.tot_premium;
            var protect_ride_prem_tot = medi_ind_hdfc_ergo_health_insu_policy_data_arr.protect_ride_prem_tot;
            var hospital_daily_cash_prem_tot = medi_ind_hdfc_ergo_health_insu_policy_data_arr.hospital_daily_cash_prem_tot;
            var ipa_rider_prem_tot = medi_ind_hdfc_ergo_health_insu_policy_data_arr.ipa_rider_prem_tot;
            var load_desc = medi_ind_hdfc_ergo_health_insu_policy_data_arr.load_desc;
            var load_tot = medi_ind_hdfc_ergo_health_insu_policy_data_arr.load_tot;
            var less_disc_per = medi_ind_hdfc_ergo_health_insu_policy_data_arr.less_disc_per;
            var less_disc_tot = medi_ind_hdfc_ergo_health_insu_policy_data_arr.less_disc_tot;
            var family_disc_per = medi_ind_hdfc_ergo_health_insu_policy_data_arr.family_disc_per;
            var family_disc_tot = medi_ind_hdfc_ergo_health_insu_policy_data_arr.family_disc_tot;
            var gross_premium_tot = medi_ind_hdfc_ergo_health_insu_policy_data_arr.gross_premium_tot;
            var gross_premium_tot_new = medi_ind_hdfc_ergo_health_insu_policy_data_arr.gross_premium_tot_new;
            var medi_cgst_rate = medi_ind_hdfc_ergo_health_insu_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_ind_hdfc_ergo_health_insu_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_ind_hdfc_ergo_health_insu_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_ind_hdfc_ergo_health_insu_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_ind_hdfc_ergo_health_insu_policy_data_arr.medi_final_premium;
            var medi_hdfc_ergo_health_insu_policy_status = medi_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_policy_status;
            var medi_hdfc_ergo_health_insu_policy_del_flag = medi_ind_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_policy_del_flag;

            $("#medi_hdfc_ergo_health_insu_policy_id").text(medi_hdfc_ergo_health_insu_policy_id);
            $("#years_of_premium").text(years_of_premium);
            $("#region").text(region);
            $("#tot_premium").text(tot_premium);
            $("#protect_ride_prem_tot").text(protect_ride_prem_tot);
            $("#hospital_daily_cash_prem_tot").text(hospital_daily_cash_prem_tot);
            $("#ipa_rider_prem_tot").text(ipa_rider_prem_tot);
            $("#load_desc").text(load_desc);
            $("#load_tot").text(load_tot);
            $("#less_disc_per").text(less_disc_per);
            $("#less_disc_tot").text(less_disc_tot);
            $("#family_disc_per").text(family_disc_per);
            $("#family_disc_tot").text(family_disc_tot);
            $("#gross_premium_tot").text(gross_premium_tot);
            $("#gross_premium_tot_new").text(gross_premium_tot_new);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var protector_rider_type = "";
        var protector_rider_prem = "";
        var add_medi_hdfc_counter = "";
        var index = "";
        var medi_ind_hdfc_length = total_medi_ind_hdfc_json_data.length;
        member_id_global = "";
        $.each(total_medi_ind_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            // main_Mediclaim_HDFC.push(add_medi_hdfc_counter);
            index = total_medi_ind_hdfc_json_data[key][0];
            var name_insured_member_name = total_medi_ind_hdfc_json_data[key][1];
            var name_insured_member_name_txt = total_medi_ind_hdfc_json_data[key][2];
            var name_insured_dob = total_medi_ind_hdfc_json_data[key][3];
            var name_insured_age = total_medi_ind_hdfc_json_data[key][4];
            var past_history = total_medi_ind_hdfc_json_data[key][5];
            var name_insured_relation = total_medi_ind_hdfc_json_data[key][6];
            var name_insured_relation_txt = total_medi_ind_hdfc_json_data[key][7];
            var nominee_name = total_medi_ind_hdfc_json_data[key][8];
            var nominee_name_txt = total_medi_ind_hdfc_json_data[key][9];
            var nominee_relation = total_medi_ind_hdfc_json_data[key][10];
            var nominee_relation_txt = total_medi_ind_hdfc_json_data[key][11];
            var name_insured_sum_insured = total_medi_ind_hdfc_json_data[key][12];
            var ncb_per = total_medi_ind_hdfc_json_data[key][13];
            protector_rider_type = total_medi_ind_hdfc_json_data[key][14];
            protector_rider_prem = total_medi_ind_hdfc_json_data[key][15];
            var hospital_daily_cash_per_day = total_medi_ind_hdfc_json_data[key][16];
            var hospital_daily_cash_prem = total_medi_ind_hdfc_json_data[key][17];
            var ipa_rider_sum_insured = total_medi_ind_hdfc_json_data[key][18];
            var ipa_rider_prem = total_medi_ind_hdfc_json_data[key][19];
            var basic_premium = total_medi_ind_hdfc_json_data[key][20];
            var stay_active_benefit = total_medi_ind_hdfc_json_data[key][21];
            var stay_active_benefit_prem = total_medi_ind_hdfc_json_data[key][22];
            var premium_after_discount = total_medi_ind_hdfc_json_data[key][23];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td><td>' + protector_rider_type + '<br/>' + protector_rider_prem + '</td><td>' + name_insured_sum_insured + '</td>';

            nominee_table_body += '<tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';

            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + medi_ind_hdfc_length + '">' + basic_gross_premium + '</td></tr>';
            // alert(tr_table);
        });
        $("#Add_Mediclaim_HDFC").attr("onClick", "AddMediclaimHDFC(" + medi_ind_hdfc_length + ")");
        // policy_member_table_tbody = policy_member_table_tbody + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);
        $.each(total_medi_ind_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            // main_Mediclaim_HDFC.push(add_medi_hdfc_counter);
            index = total_medi_ind_hdfc_json_data[key][0];
            var name_insured_member_name = total_medi_ind_hdfc_json_data[key][1];
            var name_insured_relation = total_medi_ind_hdfc_json_data[key][6];
            var nominee_name = total_medi_ind_hdfc_json_data[key][8];
            var nominee_relation = total_medi_ind_hdfc_json_data[key][10];
            var name_insured_sum_insured = total_medi_ind_hdfc_json_data[key][12];
            var protector_rider_type = total_medi_ind_hdfc_json_data[key][14];
            var hospital_daily_cash_per_day = total_medi_ind_hdfc_json_data[key][16];

            $("#name_insured_member_name_" + add_medi_hdfc_counter).text(name_insured_member_name);
            $("#name_insured_relation_" + add_medi_hdfc_counter).text(name_insured_relation);
            $("#nominee_name_" + add_medi_hdfc_counter).text(nominee_name);
            $("#nominee_relation_" + add_medi_hdfc_counter).text(nominee_relation);
            $("#name_insured_sum_insured_" + add_medi_hdfc_counter).text(name_insured_sum_insured);
            $("#protector_rider_type_" + add_medi_hdfc_counter).text(protector_rider_type);
            $("#hospital_daily_cash_per_day_" + add_medi_hdfc_counter).text(hospital_daily_cash_per_day);

        });
    }

    function edit_medi_float_HDFC_ERGO_HEALTH_INSURANCE_LTD_Optima_restore_policy(medi_float_hdfc_ergo_health_insu_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_medi_float_hdfc_json_data = "";
        var tr_table = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $(".protector_rider").show();
        $.each(medi_float_hdfc_ergo_health_insu_policy_data_arr, function(key_other, val_other) {
            var medi_hdfc_ergo_health_insu_float_policy_id = medi_float_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_float_policy_id;
            var medi_hdfc_ergo_health_insu_float_policy_fk_policy_id = medi_float_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_float_policy_fk_policy_id;
            var fk_policy_type_id = medi_float_hdfc_ergo_health_insu_policy_data_arr.fk_policy_type_id;
            var policy_type_title = medi_float_hdfc_ergo_health_insu_policy_data_arr.policy_type_title;
            total_medi_float_hdfc_json_data = JSON.parse(medi_float_hdfc_ergo_health_insu_policy_data_arr.total_medi_float_hdfc_json_data);
            var years_of_premium = medi_float_hdfc_ergo_health_insu_policy_data_arr.years_of_premium;
            var region = medi_float_hdfc_ergo_health_insu_policy_data_arr.region;
            var tot_premium = medi_float_hdfc_ergo_health_insu_policy_data_arr.tot_premium;
            var hdfc_ergo_health_insu_child_count = medi_float_hdfc_ergo_health_insu_policy_data_arr.hdfc_ergo_health_insu_child_count;
            var hdfc_ergo_health_insu_child_count_first_premium = medi_float_hdfc_ergo_health_insu_policy_data_arr.hdfc_ergo_health_insu_child_count_first_premium;
            var hdfc_ergo_health_insu_child_total_premium = medi_float_hdfc_ergo_health_insu_policy_data_arr.hdfc_ergo_health_insu_child_total_premium;
            var protect_ride_prem_tot = medi_float_hdfc_ergo_health_insu_policy_data_arr.protect_ride_prem_tot;
            var hospital_daily_cash_prem_tot = medi_float_hdfc_ergo_health_insu_policy_data_arr.hospital_daily_cash_prem_tot;
            var ipa_rider_prem_tot = medi_float_hdfc_ergo_health_insu_policy_data_arr.ipa_rider_prem_tot;
            var load_desc = medi_float_hdfc_ergo_health_insu_policy_data_arr.load_desc;
            var load_tot = medi_float_hdfc_ergo_health_insu_policy_data_arr.load_tot;
            var less_disc_per = medi_float_hdfc_ergo_health_insu_policy_data_arr.less_disc_per;
            var less_disc_tot = medi_float_hdfc_ergo_health_insu_policy_data_arr.less_disc_tot;
            var stay_active_benefit = medi_float_hdfc_ergo_health_insu_policy_data_arr.stay_active_benefit;
            var stay_active_benefit_prem_tot = medi_float_hdfc_ergo_health_insu_policy_data_arr.stay_active_benefit_prem_tot;
            var gross_premium_tot = medi_float_hdfc_ergo_health_insu_policy_data_arr.gross_premium_tot;
            var gross_premium_tot_new = medi_float_hdfc_ergo_health_insu_policy_data_arr.gross_premium_tot_new;
            var medi_cgst_rate = medi_float_hdfc_ergo_health_insu_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = medi_float_hdfc_ergo_health_insu_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = medi_float_hdfc_ergo_health_insu_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = medi_float_hdfc_ergo_health_insu_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = medi_float_hdfc_ergo_health_insu_policy_data_arr.medi_final_premium;
            var max_age = medi_float_hdfc_ergo_health_insu_policy_data_arr.max_age;
            var medi_hdfc_ergo_health_insu_float_policy_status = medi_float_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_float_policy_status;
            var medi_hdfc_ergo_health_insu_float_policy_del_flag = medi_float_hdfc_ergo_health_insu_policy_data_arr.medi_hdfc_ergo_health_insu_float_policy_del_flag;

            $("#medi_hdfc_ergo_health_insu_float_policy_id").text(medi_hdfc_ergo_health_insu_float_policy_id);
            $("#years_of_premium").text(years_of_premium);
            $("#region").text(region);
            $("#tot_premium").text(tot_premium);
            $("#hdfc_ergo_health_insu_child_count").text(hdfc_ergo_health_insu_child_count);
            $("#hdfc_ergo_health_insu_child_count_first_premium").text(hdfc_ergo_health_insu_child_count_first_premium);
            $("#hdfc_ergo_health_insu_child_total_premium").text(hdfc_ergo_health_insu_child_total_premium);
            $("#protect_ride_prem_tot").text(protect_ride_prem_tot);
            $("#hospital_daily_cash_prem_tot").text(hospital_daily_cash_prem_tot);
            $("#ipa_rider_prem_tot").text(ipa_rider_prem_tot);
            $("#load_desc").text(load_desc);
            $("#load_tot").text(load_tot);
            $("#less_disc_per").text(less_disc_per);
            $("#less_disc_tot").text(less_disc_tot);
            $("#stay_active_benefit").text(stay_active_benefit);
            $("#stay_active_benefit_prem_tot").text(stay_active_benefit_prem_tot);
            $("#gross_premium_tot").text(gross_premium_tot);
            $("#gross_premium_tot_new").text(gross_premium_tot_new);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
            $("#max_age").text(max_age);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var table_tr = "";
        var add_medi_hdfc_counter = "";
        var index = "";
        var Family_size_count = total_medi_float_hdfc_json_data.length;
        member_id_global = "";
        var protector_rider_type = "";
        var protector_rider_prem = "";
        // alert(mediclaim_length);
        $.each(total_medi_float_hdfc_json_data, function(key, val) {
            add_medi_hdfc_counter = key;
            index = total_medi_float_hdfc_json_data[key][0];
            var name_insured_member_name = total_medi_float_hdfc_json_data[key][1];
            var name_insured_member_name_txt = total_medi_float_hdfc_json_data[key][2];
            var name_insured_dob = total_medi_float_hdfc_json_data[key][3];
            var name_insured_age = total_medi_float_hdfc_json_data[key][4];
            var past_history = total_medi_float_hdfc_json_data[key][5];
            var name_insured_relation = total_medi_float_hdfc_json_data[key][6];
            var name_insured_relation_txt = total_medi_float_hdfc_json_data[key][7];
            var nominee_name = total_medi_float_hdfc_json_data[0][8];
            var nominee_name_txt = total_medi_float_hdfc_json_data[0][9];
            var nominee_relation = total_medi_float_hdfc_json_data[0][10];
            var nominee_relation_txt = total_medi_float_hdfc_json_data[0][11];
            var name_insured_sum_insured = total_medi_float_hdfc_json_data[0][12];
            var ncb_per = total_medi_float_hdfc_json_data[0][13];
            protector_rider_type = total_medi_float_hdfc_json_data[0][14];
            protector_rider_prem = total_medi_float_hdfc_json_data[0][15];
            var hospital_daily_cash_per_day = total_medi_float_hdfc_json_data[0][16];
            var hospital_daily_cash_prem = total_medi_float_hdfc_json_data[0][17];
            var ipa_rider_sum_insured = total_medi_float_hdfc_json_data[0][18];
            var ipa_rider_prem = total_medi_float_hdfc_json_data[0][19];
            var basic_premium = total_medi_float_hdfc_json_data[0][20];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td>';

            if (add_medi_hdfc_counter == 0) {
                protector_rider_type = '<td>' + protector_rider_type + '<br>' + protector_rider_prem + '</td>';
                nominee_table_body += ' <tr><td>' + nominee_name_txt + '</td>  <td>' + nominee_relation_txt + '</td></tr>';
                policy_member_table_tbody += '<td rowspan="' + Family_size_count + '">' + protector_rider_type + '<br>' + protector_rider_prem + '</td><td rowspan="' + Family_size_count + '">' + name_insured_sum_insured + '</td><td rowspan="' + Family_size_count + '"> ' + basic_gross_premium + '</td></tr>';
            }

        });
        // policy_member_table_tbody = policy_member_table_tbody + protector_rider_type + '<td>' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);
    }

    function edit_mediclaim_policy(mediclaim_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var tot_mediclaim_json = "";
        $("#first_table_tbody").empty();
        $("#nominee_details_global").show();
        $(".policy_section").show();
        $.each(mediclaim_policy_data_arr, function(key_other, val_other) {
            var mediclaim_policy_id = mediclaim_policy_data_arr.mediclaim_policy_id;
            var mediclaim_policy_fk_policy_id = mediclaim_policy_data_arr.mediclaim_policy_fk_policy_id;
            var fk_policy_type_id = mediclaim_policy_data_arr.fk_policy_type_id;
            var policy_type_title = mediclaim_policy_data_arr.policy_type_title;

            // var tot_mediclaim_json = mediclaim_policy_data_arr.tot_mediclaim_json;
            tot_mediclaim_json = JSON.parse(mediclaim_policy_data_arr.tot_mediclaim_json);
            var medi_total_ncd_amount = mediclaim_policy_data_arr.medi_total_ncd_amount;
            var medi_total_amount = mediclaim_policy_data_arr.medi_total_amount;
            var medi_family_disc_rate = mediclaim_policy_data_arr.medi_family_disc_rate;
            var medi_family_disc_tot = mediclaim_policy_data_arr.medi_family_disc_tot;
            var medi_premium_after_fd = mediclaim_policy_data_arr.medi_premium_after_fd;
            var medi_cgst_rate = mediclaim_policy_data_arr.medi_cgst_rate;
            var medi_cgst_tot = mediclaim_policy_data_arr.medi_cgst_tot;
            var medi_sgst_rate = mediclaim_policy_data_arr.medi_sgst_rate;
            var medi_sgst_tot = mediclaim_policy_data_arr.medi_sgst_tot;
            var medi_final_premium = mediclaim_policy_data_arr.medi_final_premium;
            var mediclaim_policy_status = mediclaim_policy_data_arr.mediclaim_policy_status;
            var mediclaim_policy_del_flag = mediclaim_policy_data_arr.mediclaim_policy_del_flag;
            // alert(medi_final_premium);
            $("#medi_total_ncd_amount").text(medi_total_ncd_amount);
            $("#medi_total_amount").text(medi_total_amount);
            $("#medi_family_disc_rate").text(medi_family_disc_rate);
            $("#medi_family_disc_tot").text(medi_family_disc_tot);
            $("#medi_premium_after_fd").text(medi_premium_after_fd);
            $("#cgst_fire_per").text(medi_cgst_rate);
            $("#medi_cgst_tot").text(medi_cgst_tot);
            $("#sgst_fire_per").text(medi_sgst_rate);
            $("#medi_sgst_tot").text(medi_sgst_tot);
            $("#medi_final_premium").text(medi_final_premium);
            $("#mediclaim_policy_id").text(mediclaim_policy_id);
        });
        var policy_member_table_tbody = "";
        var nominee_table_body = "";
        var dm_yes_no = "";
        var htn_yes_no = "";
        var dm_yes_no_flage = false;
        var htn_yes_no_flage = false;
        var mediclaim_tr = "";
        var add_medi_counter = "";
        var index = "";
        var mediclaim_length = tot_mediclaim_json.length;
        member_id_global = "";
        $.each(tot_mediclaim_json, function(key, val) {
            var total_items = 0;
            total_items += parseInt(i);
            first_pages = Math.ceil(2 / limit);
            total_pages = Math.ceil(total_items / limit);
            add_medi_counter = key;
            index = tot_mediclaim_json[key][0];
            var name_insured_member_name = tot_mediclaim_json[key][1];
            var name_insured_member_name_txt = tot_mediclaim_json[key][2];
            var name_insured_dob = tot_mediclaim_json[key][3];
            var name_insured_age = tot_mediclaim_json[key][4];
            var name_insured_relation = tot_mediclaim_json[key][5];
            var name_insured_relation_txt = tot_mediclaim_json[key][6];
            var name_insured_policy_type = tot_mediclaim_json[key][7];
            var name_insured_policy_option = tot_mediclaim_json[key][8];
            var name_insured_sum_insured = tot_mediclaim_json[key][9];
            var name_insured_premium = tot_mediclaim_json[key][10];
            dm_yes_no = tot_mediclaim_json[key][11];
            var dm_percentage = tot_mediclaim_json[key][12];
            var dm_loading = tot_mediclaim_json[key][13];
            htn_yes_no = tot_mediclaim_json[key][14];
            var htn_percentage = tot_mediclaim_json[key][15];
            var htn_loading = tot_mediclaim_json[key][16];
            var premium_after_loading = tot_mediclaim_json[key][17];
            var ncd_percentage = tot_mediclaim_json[key][18];
            var ncd_amount = tot_mediclaim_json[key][19];
            var premium_after_ncd_amount = tot_mediclaim_json[key][20];
            var nominee_name = tot_mediclaim_json[key][21];
            var nominee_relation = tot_mediclaim_json[key][22];
            var nominee_name_txt = tot_mediclaim_json[key][23];
            var nominee_relation_txt = tot_mediclaim_json[key][24];

            name_insured_age = parseInt(name_insured_age) + parseInt(1);

            if (name_insured_member_name == undefined || name_insured_member_name == "Null" || name_insured_member_name == "null" || name_insured_member_name == "")
                name_insured_member_name_txt = "";

            if (name_insured_relation == undefined || name_insured_relation == "Null" || name_insured_relation == "null" || name_insured_relation == "")
                name_insured_relation_txt = "";

            if (nominee_name == undefined || nominee_name == "Null" || nominee_name == "null" || nominee_name == "")
                nominee_name_txt = "";

            if (nominee_relation == undefined || nominee_relation == "Null" || nominee_relation == "null" || nominee_relation == "")
                nominee_relation_txt = "";

            if (name_insured_policy_type == undefined || name_insured_policy_type == "Null" || name_insured_policy_type == "null" || name_insured_policy_type == "")
                name_insured_policy_type = "";

            if (name_insured_policy_option == undefined || name_insured_policy_option == "Null" || name_insured_policy_option == "null" || name_insured_policy_option == "")
                name_insured_policy_option = "";

            if (name_insured_sum_insured == undefined || name_insured_sum_insured == "Null" || name_insured_sum_insured == "null" || name_insured_sum_insured == "")
                name_insured_sum_insured = "";

            if (member_id_global == "")
                member_id_global = name_insured_member_name;
            else
                member_id_global = member_id_global + "," + name_insured_member_name;

            // alert(name_insured_member_name);
            // alert(member_id_global);
            // if(member_id_global == "")
            //     member_id_global = name_insured_member_name;
            // else
            //     member_id_global = member_id_global+","+name_insured_member_name;
            // alert(member_id_global);
            if (dm_yes_no == "Yes") {
                dm_yes_no_flage = true;
                dm_percentage = dm_percentage;
            } else if (dm_yes_no == "No") {
                dm_percentage = "";
            }

            if (htn_yes_no == "Yes") {
                htn_yes_no_flage = true;
                htn_percentage = htn_percentage;
            } else if (htn_yes_no == "No") {
                htn_percentage = "";
            }
            // if(dm_yes_no_flage)
            // alert(dm_yes_no_flage);

            policy_member_table_tbody += '<tr><td>' + name_insured_member_name_txt + '</td><td>' + name_insured_dob + '</td> <td>' + name_insured_age + '</td><td>' + name_insured_relation_txt + '</td> <td>' + name_insured_policy_type + '</td> <td>' + name_insured_sum_insured + '</td>';

            nominee_table_body += '<tr><td>' + nominee_name_txt + '</td> <td>' + nominee_relation_txt + '</td></tr>';
            if (key == 0)
                policy_member_table_tbody += '<td rowspan="' + mediclaim_length + '"> ' + basic_gross_premium + '</td></tr>';
        });
        member_id_global = member_id_global;
        // alert(member_id_global);
        // alert(mediclaim_tr);
        // policy_member_table_tbody = policy_member_table_tbody + '<td rowspan="'+mediclaim_length+'">' + basic_sum_insured + '</td><td> ' + basic_gross_premium + '</td></tr>';
        $("#policy_member_table_tbody").append(policy_member_table_tbody);
        $("#nominee_table_body").append(nominee_table_body);
        if (dm_yes_no_flage == false) {
            $("#dm_per_th").hide();
            $("#dm_load_th").hide();
            $(".dm_per_td").hide();
            $(".dm_load_td").hide();
        }
        if (htn_yes_no_flage == false) {
            $("#htn_per_th").hide();
            $("#htn_load_th").hide();
            $(".htn_per_td").hide();
            $(".htn_load_td").hide();
        }
        // alert(dm_yes_no_flage);

    }
    // alert(member_id_global+"hi");
    function edit_marine_policy(marine_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_marine_cc_json = "";
        $("#append_marine_cc").empty();
        $.each(marine_policy_data_arr, function(key_other, val_other) {
            var marine_policy_id = marine_policy_data_arr.marine_policy_id;
            var marine_fk_policy_id = marine_policy_data_arr.marine_fk_policy_id;
            var fk_policy_type_id = marine_policy_data_arr.fk_policy_type_id;

            var policy_type_title = marine_policy_data_arr.policy_type_title;
            var coverage_type = marine_policy_data_arr.coverage_type;
            var from_destination = marine_policy_data_arr.from_destination;
            var to_destination = marine_policy_data_arr.to_destination;
            var marine_description = marine_policy_data_arr.marine_description;
            var interest_insured = marine_policy_data_arr.interest_insured;
            var period_of_insurance = marine_policy_data_arr.period_of_insurance;
            var group_name_address = marine_policy_data_arr.group_name_address;
            var marine_sum_insured = marine_policy_data_arr.marine_sum_insured;
            var packing_stand_customary = marine_policy_data_arr.packing_stand_customary;
            total_marine_cc_json = JSON.parse(marine_policy_data_arr.total_marine_cc_json);
            var business_description = marine_policy_data_arr.business_description;
            $("#from_destination").text(from_destination);
            $("#to_destination").text(to_destination);
            $("#coverage_type").text(coverage_type);
            $("#marine_description").text(marine_description);
            $("#interest_insured").text(interest_insured);
            $("#marine_sum_insured").text(marine_sum_insured);
            $("#packing_stand_customary").text(packing_stand_customary);
            $("#group_name_address").text(group_name_address);
            $("#business_description").text(business_description);

            var voyage_domestic_purchase = marine_policy_data_arr.voyage_domestic_purchase;
            var voyage_international_purchase = marine_policy_data_arr.voyage_international_purchase;
            var voyage_domestic_sales = marine_policy_data_arr.voyage_domestic_sales;
            var voyage_export_sales = marine_policy_data_arr.voyage_export_sales;
            var voyage_job_worker = marine_policy_data_arr.voyage_job_worker;
            var voyage_domestic_fini_good = marine_policy_data_arr.voyage_domestic_fini_good;
            var voyage_export_fini_good = marine_policy_data_arr.voyage_export_fini_good;
            var voyage_domestic_purch_return = marine_policy_data_arr.voyage_domestic_purch_return;

            $("#voyage_domestic_purchase").text(voyage_domestic_purchase);
            $("#voyage_international_purchase").text(voyage_international_purchase);
            $("#voyage_domestic_sales").text(voyage_domestic_sales);
            $("#voyage_export_sales").text(voyage_export_sales);
            $("#voyage_job_worker").text(voyage_job_worker);
            $("#voyage_domestic_fini_good").text(voyage_domestic_fini_good);
            $("#voyage_export_fini_good").text(voyage_export_fini_good);
            $("#voyage_domestic_purch_return").text(voyage_domestic_purch_return);

            var voyage_export_purch_return = marine_policy_data_arr.voyage_export_purch_return;
            var voyage_sales_return = marine_policy_data_arr.voyage_sales_return;
            var domestic_purch = marine_policy_data_arr.domestic_purch;
            var international_purch = marine_policy_data_arr.international_purch;
            var domestic_sale = marine_policy_data_arr.domestic_sale;
            var export_sale = marine_policy_data_arr.export_sale;
            var per_bottom_limit = marine_policy_data_arr.per_bottom_limit;
            var per_location_limit = marine_policy_data_arr.per_location_limit;

            $("#voyage_export_purch_return").text(voyage_export_purch_return);
            $("#voyage_sales_return").text(voyage_sales_return);
            $("#domestic_purch").text(domestic_purch);
            $("#international_purch").text(international_purch);
            $("#domestic_sale").text(domestic_sale);
            $("#export_sale").text(export_sale);
            $("#per_bottom_limit").text(per_bottom_limit);
            $("#per_location_limit").text(per_location_limit);

            var per_claim_excess = marine_policy_data_arr.per_claim_excess;
            var declaration_sale_fig = marine_policy_data_arr.declaration_sale_fig;
            var annual_turn_over = marine_policy_data_arr.annual_turn_over;
            var tot_sum_insured = marine_policy_data_arr.tot_sum_insured;
            var rate_applied = marine_policy_data_arr.rate_applied;
            var rate_applied_per = marine_policy_data_arr.rate_applied_per;
            var rate_applied_hidden = marine_policy_data_arr.rate_applied_hidden;
            var marine_cgst_per = marine_policy_data_arr.marine_cgst_per;
            var marine_sgst_per = marine_policy_data_arr.marine_sgst_per;
            var cgst_rate_tot = marine_policy_data_arr.cgst_rate_tot;
            var sgst_rate_tot = marine_policy_data_arr.sgst_rate_tot;
            var marine_final_payble_premium = marine_policy_data_arr.marine_final_payble_premium;

            $("#per_claim_excess").text(per_claim_excess);
            $("#declaration_sale_fig").text(declaration_sale_fig);
            $("#annual_turn_over").text(annual_turn_over);
            $("#tot_sum_insured").text(tot_sum_insured);
            $("#rate_applied").text(rate_applied);
            $("#rate_applied_per").text(rate_applied_per);
            // $("#rate_applied_hidden").text(rate_applied_hidden);
            $("#cgst_fire_per").text(marine_cgst_per);
            $("#sgst_fire_per").text(marine_sgst_per);
            $("#cgst_rate_tot").text(cgst_rate_tot);
            $("#sgst_rate_tot").text(sgst_rate_tot);
            $("#marine_final_payble_premium").text(marine_final_payble_premium);
            $("#marine_policy_id").text(marine_policy_id);

            var marine_policy_status = marine_policy_data_arr.marine_policy_status;
            var marine_del_flag = marine_policy_data_arr.marine_del_flag;
        });
        var i = 1;
        var marine_cc_tr = "";
        var add_marine_cc = "";
        $.each(total_marine_cc_json, function(key, val) {
            add_marine_cc = key;
            var index = total_marine_cc_json[key][0];
            var marine_cc_name = total_marine_cc_json[key][1];
            marine_cc_tr += '<tr><td>' + i + '</td><td>' + marine_cc_name + '</td></tr>';
            i++;
        });
        $("#append_marine_cc").append(marine_cc_tr);
    }

    function edit_jweller_block(jweller_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var total_fidelity_guar_cover_json = "";
        $("#append_fidelity_guar_cover").empty();
        $.each(jweller_policy_data_arr, function(key_other, val_other) {
            var jweller_policy_id = jweller_policy_data_arr.jweller_policy_id;
            var jweller_fk_policy_id = jweller_policy_data_arr.jweller_fk_policy_id;
            var fk_policy_type_id = jweller_policy_data_arr.fk_policy_type_id;

            //Section 1
            var stock_premises_sum_insu_1 = jweller_policy_data_arr.stock_premises_sum_insu_1;
            var stock_premises_sum_insu_2 = jweller_policy_data_arr.stock_premises_sum_insu_2;
            var stock_premises_sum_insu_3 = jweller_policy_data_arr.stock_premises_sum_insu_3;
            var stock_premises_sum_insu_4 = jweller_policy_data_arr.stock_premises_sum_insu_4;
            var stock_premises_sum_insu_5 = jweller_policy_data_arr.stock_premises_sum_insu_5;
            var stock_premises_sum_insu_6 = jweller_policy_data_arr.stock_premises_sum_insu_6;
            var stock_premises_premium_1 = jweller_policy_data_arr.stock_premises_premium_1;
            var stock_premises_premium_2 = jweller_policy_data_arr.stock_premises_premium_2;

            $("#stock_premises_sum_insu_1").text(stock_premises_sum_insu_1);
            $("#stock_premises_sum_insu_2").text(stock_premises_sum_insu_2);
            $("#stock_premises_sum_insu_3").text(stock_premises_sum_insu_3);
            $("#stock_premises_sum_insu_4").text(stock_premises_sum_insu_4);
            $("#stock_premises_sum_insu_5").text(stock_premises_sum_insu_5);
            $("#stock_premises_sum_insu_6").text(stock_premises_sum_insu_6);
            $("#stock_premises_premium_1").text(stock_premises_premium_1);
            $("#stock_premises_premium_2").text(stock_premises_premium_2);

            //Section 2
            var stock_custody_sum_insu_1 = jweller_policy_data_arr.stock_custody_sum_insu_1;
            var stock_custody_sum_insu_2 = jweller_policy_data_arr.stock_custody_sum_insu_2;
            var stock_custody_sum_insu_3 = jweller_policy_data_arr.stock_custody_sum_insu_3;
            var stock_custody_sum_insu_4 = jweller_policy_data_arr.stock_custody_sum_insu_4;
            var stock_custody_premium_1 = jweller_policy_data_arr.stock_custody_premium_1;
            var stock_custody_premium_2 = jweller_policy_data_arr.stock_custody_premium_2;

            $("#stock_custody_sum_insu_1").text(stock_custody_sum_insu_1);
            $("#stock_custody_sum_insu_2").text(stock_custody_sum_insu_2);
            $("#stock_custody_sum_insu_3").text(stock_custody_sum_insu_3);
            $("#stock_custody_sum_insu_4").text(stock_custody_sum_insu_4);
            $("#stock_custody_premium_1").text(stock_custody_premium_1);
            $("#stock_custody_premium_2").text(stock_custody_premium_2);

            //Section 3
            var stock_transit_sum_insu_1 = jweller_policy_data_arr.stock_transit_sum_insu_1;
            var stock_transit_sum_insu_2 = jweller_policy_data_arr.stock_transit_sum_insu_2;
            var stock_transit_sum_insu_3 = jweller_policy_data_arr.stock_transit_sum_insu_3;
            var stock_transit_sum_insu_4 = jweller_policy_data_arr.stock_transit_sum_insu_4;
            var stock_transit_premium = jweller_policy_data_arr.stock_transit_premium;

            $("#stock_transit_sum_insu_1").text(stock_transit_sum_insu_1);
            $("#stock_transit_sum_insu_2").text(stock_transit_sum_insu_2);
            $("#stock_transit_sum_insu_3").text(stock_transit_sum_insu_3);
            $("#stock_transit_sum_insu_4").text(stock_transit_sum_insu_4);
            $("#stock_transit_premium").text(stock_transit_premium);

            //Section 4A
            var standard_fire_perils_1 = jweller_policy_data_arr.standard_fire_perils_1;
            var standard_fire_perils_2 = jweller_policy_data_arr.standard_fire_perils_2;
            var standard_fire_perils_3 = jweller_policy_data_arr.standard_fire_perils_3;
            var standard_fire_perils_4 = jweller_policy_data_arr.standard_fire_perils_4;
            var standard_fire_perils_5 = jweller_policy_data_arr.standard_fire_perils_5;
            var standard_fire_perils_6 = jweller_policy_data_arr.standard_fire_perils_6;
            var standard_fire_perils_premium_1 = jweller_policy_data_arr.standard_fire_perils_premium_1;
            var standard_fire_perils_premium_2 = jweller_policy_data_arr.standard_fire_perils_premium_2;
            var standard_fire_perils_premium_3 = jweller_policy_data_arr.standard_fire_perils_premium_3;

            $("#standard_fire_perils_1").text(standard_fire_perils_1);
            $("#standard_fire_perils_2").text(standard_fire_perils_2);
            $("#standard_fire_perils_3").text(standard_fire_perils_3);
            $("#standard_fire_perils_4").text(standard_fire_perils_4);
            $("#standard_fire_perils_5").text(standard_fire_perils_5);
            $("#standard_fire_perils_6").text(standard_fire_perils_6);
            $("#standard_fire_perils_premium_1").text(standard_fire_perils_premium_1);
            $("#standard_fire_perils_premium_2").text(standard_fire_perils_premium_2);
            $("#standard_fire_perils_premium_3").text(standard_fire_perils_premium_3);

            //Section 4B
            var content_burglary_sum_insu = jweller_policy_data_arr.content_burglary_sum_insu;
            var content_burglary_premium = jweller_policy_data_arr.content_burglary_premium;

            $("#content_burglary_sum_insu").text(content_burglary_sum_insu);
            $("#content_burglary_premium").text(content_burglary_premium);

            //Section 5
            var stock_exhibition_sum_insu = jweller_policy_data_arr.stock_exhibition_sum_insu;
            var stock_exhibition_premium = jweller_policy_data_arr.stock_exhibition_premium;

            $("#stock_exhibition_sum_insu").text(stock_exhibition_sum_insu);
            $("#stock_exhibition_premium").text(stock_exhibition_premium);

            //Section 6
            var fidelity_guar_cover_sum_insu_1 = jweller_policy_data_arr.fidelity_guar_cover_sum_insu_1;
            var fidelity_guar_cover_sum_insu_2 = jweller_policy_data_arr.fidelity_guar_cover_sum_insu_2;
            var fidelity_guar_cover_premium_1 = jweller_policy_data_arr.fidelity_guar_cover_premium_1;
            var fidelity_guar_cover_premium_2 = jweller_policy_data_arr.fidelity_guar_cover_premium_2;
            total_fidelity_guar_cover_json = JSON.parse(jweller_policy_data_arr.total_fidelity_guar_cover_json);

            $("#fidelity_guar_cover_sum_insu_1").text(fidelity_guar_cover_sum_insu_1);
            $("#fidelity_guar_cover_sum_insu_2").text(fidelity_guar_cover_sum_insu_2);
            $("#fidelity_guar_cover_premium_1").text(fidelity_guar_cover_premium_1);
            $("#fidelity_guar_cover_premium_2").text(fidelity_guar_cover_premium_2);

            //Section 7
            var plate_glass_sum_insu = jweller_policy_data_arr.plate_glass_sum_insu;
            var plate_glass_premium = jweller_policy_data_arr.plate_glass_premium;

            $("#plate_glass_sum_insu").text(plate_glass_sum_insu);
            $("#plate_glass_premium").text(plate_glass_premium);

            //Section 8
            var neon_sign_sum_insu = jweller_policy_data_arr.neon_sign_sum_insu;
            var neon_sign_premium = jweller_policy_data_arr.neon_sign_premium;

            $("#neon_sign_sum_insu").text(neon_sign_sum_insu);
            $("#neon_sign_premium").text(neon_sign_premium);

            //Section 9
            var portable_equipmets_sum_insu = jweller_policy_data_arr.portable_equipmets_sum_insu;
            var portable_equipmets_premium = jweller_policy_data_arr.portable_equipmets_premium;

            $("#portable_equipmets_sum_insu").text(portable_equipmets_sum_insu);
            $("#portable_equipmets_premium").text(portable_equipmets_premium);

            //Section 10
            var employee_compensation_sum_insu_1 = jweller_policy_data_arr.employee_compensation_sum_insu_1;
            var employee_compensation_sum_insu_2 = jweller_policy_data_arr.employee_compensation_sum_insu_2;
            var employee_compensation_premium = jweller_policy_data_arr.employee_compensation_premium;

            $("#employee_compensation_sum_insu_1").text(employee_compensation_sum_insu_1);
            $("#employee_compensation_sum_insu_2").text(employee_compensation_sum_insu_2);
            $("#employee_compensation_premium").text(employee_compensation_premium);

            //Section 11
            var electronic_equipment_sum_insu = jweller_policy_data_arr.electronic_equipment_sum_insu;
            var electronic_equipment_premium = jweller_policy_data_arr.electronic_equipment_premium;

            $("#electronic_equipment_sum_insu").text(electronic_equipment_sum_insu);
            $("#electronic_equipment_premium").text(electronic_equipment_premium);

            //Section 12
            var public_liability_sum_insu = jweller_policy_data_arr.public_liability_sum_insu;
            var public_liability_premium = jweller_policy_data_arr.public_liability_premium;

            $("#public_liability_sum_insu").text(public_liability_sum_insu);
            $("#public_liability_premium").text(public_liability_premium);

            //Section 13
            var money_transit_sum_insu = jweller_policy_data_arr.money_transit_sum_insu;
            var money_transit_premium = jweller_policy_data_arr.money_transit_premium;

            $("#money_transit_sum_insu").text(money_transit_sum_insu);
            $("#money_transit_premium").text(money_transit_premium);

            //Section 14
            var machinery_breakdown_sum_insu = jweller_policy_data_arr.machinery_breakdown_sum_insu;
            var machinery_breakdown_premium = jweller_policy_data_arr.machinery_breakdown_premium;

            $("#machinery_breakdown_sum_insu").text(machinery_breakdown_sum_insu);
            $("#machinery_breakdown_premium").text(machinery_breakdown_premium);

            //Calculation
            var jweller_less_discount = jweller_policy_data_arr.jweller_less_discount;
            var jweller_total_sum_assured = jweller_policy_data_arr.jweller_total_sum_assured;
            var jweller_less_discount_tot = jweller_policy_data_arr.jweller_less_discount_tot;
            var jweller_after_discount_tot = jweller_policy_data_arr.jweller_after_discount_tot;
            var jweller_terrorism_per = jweller_policy_data_arr.jweller_terrorism_per;
            var jweller_terrorism_per_tot = jweller_policy_data_arr.jweller_terrorism_per_tot;
            var jweller_tot_net_premium = jweller_policy_data_arr.jweller_tot_net_premium;
            var jweller_cgst_per = jweller_policy_data_arr.jweller_cgst_per;
            var jweller_sgst_per = jweller_policy_data_arr.jweller_sgst_per;
            var jweller_cgst_per_tot = jweller_policy_data_arr.jweller_cgst_per_tot;
            var jweller_sgst_per_tot = jweller_policy_data_arr.jweller_sgst_per_tot;
            var jweller_final_payble = jweller_policy_data_arr.jweller_final_payble;

            // alert(other_final_payable_premium);
            $("#jweller_less_discount").text(jweller_less_discount);
            $("#jweller_total_sum_assured").text(jweller_total_sum_assured);
            $("#jweller_less_discount_tot").text(jweller_less_discount_tot);
            $("#jweller_after_discount_tot").text(jweller_after_discount_tot);
            $("#jweller_terrorism_per").text(jweller_terrorism_per);
            $("#jweller_terrorism_per_tot").text(jweller_terrorism_per_tot);
            $("#jweller_tot_net_premium").text(jweller_tot_net_premium);
            $("#cgst_fire_per").text(jweller_cgst_per);
            $("#sgst_fire_per").text(jweller_sgst_per);
            $("#jweller_cgst_per_tot").text(jweller_cgst_per_tot);
            $("#jweller_sgst_per_tot").text(jweller_sgst_per_tot);
            $("#jweller_final_payble").text(jweller_final_payble);
        });
        var fidelity_guar_cover_tr = "";
        var add_fidelity_gaur = "";
        $.each(total_fidelity_guar_cover_json, function(key, val) {
            add_fidelity_gaur = key;
            var index = total_fidelity_guar_cover_json[key][0];
            var fidelity_guar_cover_name = total_fidelity_guar_cover_json[key][1];
            var fidelity_guar_cover_dob = total_fidelity_guar_cover_json[key][2];
            var fidelity_guar_cover_designation = total_fidelity_guar_cover_json[key][3];
            var fidelity_guar_cover_single_sum = total_fidelity_guar_cover_json[key][4];
            fidelity_guar_cover_tr += '<tr><td>' + fidelity_guar_cover_name + '</td><td>' + fidelity_guar_cover_dob + '</td><td>' + fidelity_guar_cover_designation + '</td><td>' + fidelity_guar_cover_single_sum + '</td></tr>';
        });
        $("#append_fidelity_guar_cover").append(fidelity_guar_cover_tr);
    }

    function edit_shopkeeper(shopkeeper_policy_data_arr, basic_sum_insured, basic_gross_premium) {
        var personal_accident_json = "";
        var fidelity_gaur_json = "";
        $("#append_personal_acc").empty();
        $("#append_fidelity_gaur").empty();
        $.each(shopkeeper_policy_data_arr, function(key_shop, val_shop) {
            var shopkeeper_policy_id = shopkeeper_policy_data_arr.shopkeeper_policy_id;
            var shopkeeper_fk_policy_id = shopkeeper_policy_data_arr.shopkeeper_fk_policy_id;
            var fk_policy_type_id = shopkeeper_policy_data_arr.fk_policy_type_id;
            // Section 1
            var shopkeeper_risk_address = shopkeeper_policy_data_arr.shopkeeper_risk_address;
            var fire_sum_insured_1 = shopkeeper_policy_data_arr.fire_sum_insured_1;
            var fire_sum_insured_2 = shopkeeper_policy_data_arr.fire_sum_insured_2;
            var fire_sum_insured_3 = shopkeeper_policy_data_arr.fire_sum_insured_3;
            var fire_rate_1 = shopkeeper_policy_data_arr.fire_rate_1;
            var fire_rate_2 = shopkeeper_policy_data_arr.fire_rate_2;
            var fire_rate_3 = shopkeeper_policy_data_arr.fire_rate_3;
            var fire_premium_1 = shopkeeper_policy_data_arr.fire_premium_1;
            var fire_premium_2 = shopkeeper_policy_data_arr.fire_premium_2;
            var fire_premium_3 = shopkeeper_policy_data_arr.fire_premium_3;

            $("#shopkeeper_risk_address").text(shopkeeper_risk_address);
            $("#fire_sum_insured_1").text(fire_sum_insured_1);
            $("#fire_sum_insured_2").text(fire_sum_insured_2);
            $("#fire_sum_insured_3").text(fire_sum_insured_3);
            $("#fire_rate_1").text(fire_rate_1);
            $("#fire_rate_2").text(fire_rate_2);
            $("#fire_rate_3").text(fire_rate_3);
            $("#fire_premium_1").text(fire_premium_1);
            $("#fire_premium_2").text(fire_premium_2);
            $("#fire_premium_3").text(fire_premium_3);

            // Section 2
            var burglary_sum_insured_1 = shopkeeper_policy_data_arr.burglary_sum_insured_1;
            var burglary_sum_insured_2 = shopkeeper_policy_data_arr.burglary_sum_insured_2;
            var burglary_sum_insured_3 = shopkeeper_policy_data_arr.burglary_sum_insured_3;
            var burglary_rate_1 = shopkeeper_policy_data_arr.burglary_rate_1;
            var burglary_rate_2 = shopkeeper_policy_data_arr.burglary_rate_2;
            var burglary_rate_3 = shopkeeper_policy_data_arr.burglary_rate_3;
            var burglary_premium_1 = shopkeeper_policy_data_arr.burglary_premium_1;
            var burglary_premium_2 = shopkeeper_policy_data_arr.burglary_premium_2;
            var burglary_premium_3 = shopkeeper_policy_data_arr.burglary_premium_3;

            $("#burglary_sum_insured_1").text(burglary_sum_insured_1);
            $("#burglary_sum_insured_2").text(burglary_sum_insured_2);
            $("#burglary_sum_insured_3").text(burglary_sum_insured_3);
            $("#burglary_rate_1").text(burglary_rate_1);
            $("#burglary_rate_2").text(burglary_rate_2);
            $("#burglary_rate_3").text(burglary_rate_3);
            $("#burglary_premium_1").text(burglary_premium_1);
            $("#burglary_premium_2").text(burglary_premium_2);
            $("#burglary_premium_3").text(burglary_premium_3);

            // Section 3
            var money_insu_sum_insured_1 = shopkeeper_policy_data_arr.money_insu_sum_insured_1;
            var money_insu_sum_insured_2 = shopkeeper_policy_data_arr.money_insu_sum_insured_2;
            var money_insu_sum_insured_3 = shopkeeper_policy_data_arr.money_insu_sum_insured_3;
            var money_insu_rate_1 = shopkeeper_policy_data_arr.money_insu_rate_1;
            var money_insu_rate_2 = shopkeeper_policy_data_arr.money_insu_rate_2;
            var money_insu_rate_3 = shopkeeper_policy_data_arr.money_insu_rate_3;
            var money_insu_premium_1 = shopkeeper_policy_data_arr.money_insu_premium_1;
            var money_insu_premium_2 = shopkeeper_policy_data_arr.money_insu_premium_2;
            var money_insu_premium_3 = shopkeeper_policy_data_arr.money_insu_premium_3;

            $("#money_insu_sum_insured_1").text(money_insu_sum_insured_1);
            $("#money_insu_sum_insured_2").text(money_insu_sum_insured_2);
            $("#money_insu_sum_insured_3").text(money_insu_sum_insured_3);
            $("#money_insu_rate_1").text(money_insu_rate_1);
            $("#money_insu_rate_2").text(money_insu_rate_2);
            $("#money_insu_rate_3").text(money_insu_rate_3);
            $("#money_insu_premium_1").text(money_insu_premium_1);
            $("#money_insu_premium_2").text(money_insu_premium_2);
            $("#money_insu_premium_3").text(money_insu_premium_3);

            // Section 5
            var plate_glass_sum_insured = shopkeeper_policy_data_arr.plate_glass_sum_insured;
            var plate_glass_rate_per = shopkeeper_policy_data_arr.plate_glass_rate_per;
            var plate_glass_premium = shopkeeper_policy_data_arr.plate_glass_premium;

            $("#plate_glass_sum_insured").text(plate_glass_sum_insured);
            $("#plate_glass_rate_per").text(plate_glass_rate_per);
            $("#plate_glass_premium").text(plate_glass_premium);
            // Section 6
            var neon_glow_sum_insured = shopkeeper_policy_data_arr.neon_glow_sum_insured;
            var neon_glow_rate_per = shopkeeper_policy_data_arr.neon_glow_rate_per;
            var neon_glow_premium = shopkeeper_policy_data_arr.neon_glow_premium;

            $("#neon_glow_sum_insured").text(neon_glow_sum_insured);
            $("#neon_glow_rate_per").text(neon_glow_rate_per);
            $("#neon_glow_premium").text(neon_glow_premium);
            // Section 7
            var baggage_ins_sum_insured = shopkeeper_policy_data_arr.baggage_ins_sum_insured;
            var baggage_ins_rate_per = shopkeeper_policy_data_arr.baggage_ins_rate_per;
            var baggage_ins_premium = shopkeeper_policy_data_arr.baggage_ins_premium;

            $("#baggage_ins_sum_insured").text(baggage_ins_sum_insured);
            $("#baggage_ins_rate_per").text(baggage_ins_rate_per);
            $("#baggage_ins_premium").text(baggage_ins_premium);
            // Section 8
            personal_accident_json = JSON.parse(shopkeeper_policy_data_arr.personal_accident_json);
            var personal_accident_sum_insured = shopkeeper_policy_data_arr.personal_accident_sum_insured;
            var personal_accident_rate_per = shopkeeper_policy_data_arr.personal_accident_rate_per;
            var personal_accident_premium = shopkeeper_policy_data_arr.personal_accident_premium;

            $("#personal_accident_sum_insured").text(personal_accident_sum_insured);
            $("#personal_accident_rate_per").text(personal_accident_rate_per);
            $("#personal_accident_premium").text(personal_accident_premium);
            // Section 9
            fidelity_gaur_json = JSON.parse(shopkeeper_policy_data_arr.fidelity_gaur_json);
            var fidelity_gaur_sum_insured = shopkeeper_policy_data_arr.fidelity_gaur_sum_insured;
            var fidelity_gaur_rate_per = shopkeeper_policy_data_arr.fidelity_gaur_rate_per;
            var fidelity_gaur_premium = shopkeeper_policy_data_arr.fidelity_gaur_premium;

            $("#fidelity_gaur_sum_insured").text(fidelity_gaur_sum_insured);
            $("#fidelity_gaur_rate_per").text(fidelity_gaur_rate_per);
            $("#fidelity_gaur_premium").text(fidelity_gaur_premium);
            // Section 10
            var pub_libility_sum_insured = shopkeeper_policy_data_arr.pub_libility_sum_insured;
            var work_men_compens_sum_insured = shopkeeper_policy_data_arr.work_men_compens_sum_insured;
            var pub_libility_rate = shopkeeper_policy_data_arr.pub_libility_rate;
            var work_men_compens_rate = shopkeeper_policy_data_arr.work_men_compens_rate;
            var pub_libility_premium = shopkeeper_policy_data_arr.pub_libility_premium;
            var work_men_compens_premium = shopkeeper_policy_data_arr.work_men_compens_premium;

            $("#pub_libility_sum_insured").text(pub_libility_sum_insured);
            $("#work_men_compens_sum_insured").text(work_men_compens_sum_insured);
            $("#pub_libility_rate").text(pub_libility_rate);
            $("#work_men_compens_rate").text(work_men_compens_rate);
            $("#pub_libility_premium").text(pub_libility_premium);
            $("#work_men_compens_premium").text(work_men_compens_premium);

            // Section 11
            var bus_inter_sum_insured_1 = shopkeeper_policy_data_arr.bus_inter_sum_insured_1;
            var bus_inter_sum_insured_2 = shopkeeper_policy_data_arr.bus_inter_sum_insured_2;
            var bus_inter_sum_insured_3 = shopkeeper_policy_data_arr.bus_inter_sum_insured_3;
            var bus_inter_rate_1 = shopkeeper_policy_data_arr.bus_inter_rate_1;
            var bus_inter_rate_2 = shopkeeper_policy_data_arr.bus_inter_rate_2;
            var bus_inter_rate_3 = shopkeeper_policy_data_arr.bus_inter_rate_3;
            var bus_inter_premium_1 = shopkeeper_policy_data_arr.bus_inter_premium_1;
            var bus_inter_premium_2 = shopkeeper_policy_data_arr.bus_inter_premium_2;
            var bus_inter_premium_3 = shopkeeper_policy_data_arr.bus_inter_premium_3;

            $("#bus_inter_sum_insured_1").text(bus_inter_sum_insured_1);
            $("#bus_inter_sum_insured_2").text(bus_inter_sum_insured_2);
            $("#bus_inter_sum_insured_3").text(bus_inter_sum_insured_3);
            $("#bus_inter_rate_1").text(bus_inter_rate_1);
            $("#bus_inter_rate_2").text(bus_inter_rate_2);
            $("#bus_inter_rate_3").text(bus_inter_rate_3);
            $("#bus_inter_premium_1").text(bus_inter_premium_1);
            $("#bus_inter_premium_2").text(bus_inter_premium_2);
            $("#bus_inter_premium_3").text(bus_inter_premium_3);

            var shopkeeper_total_sum_assured = shopkeeper_policy_data_arr.shopkeeper_total_sum_assured;
            var shopkeeper_total_premium = shopkeeper_policy_data_arr.shopkeeper_total_premium;
            var shopkeeper_less_discount_per = shopkeeper_policy_data_arr.shopkeeper_less_discount_per;
            var shopkeeper_less_discount_tot = shopkeeper_policy_data_arr.shopkeeper_less_discount_tot;
            var shopkeeper_fire_rate_after_discount_tot = shopkeeper_policy_data_arr.shopkeeper_fire_rate_after_discount_tot;
            var shopkeeper_cgst_fire_per = shopkeeper_policy_data_arr.shopkeeper_cgst_fire_per;
            var shopkeeper_cgst_fire_tot = shopkeeper_policy_data_arr.shopkeeper_cgst_fire_tot;
            var shopkeeper_sgst_fire_per = shopkeeper_policy_data_arr.shopkeeper_sgst_fire_per;
            var shopkeeper_sgst_fire_tot = shopkeeper_policy_data_arr.shopkeeper_sgst_fire_tot;
            var shopkeeper_final_paybal_premium = shopkeeper_policy_data_arr.shopkeeper_final_paybal_premium;
            var shopkeeper_policy_status = shopkeeper_policy_data_arr.shopkeeper_policy_status;
            var shopkeeper_policy_del_flag = shopkeeper_policy_data_arr.shopkeeper_policy_del_flag;

            // alert(term_plan_final_paybal_premium);
            $("#shopkeeper_total_sum_assured").text(shopkeeper_total_sum_assured);
            $("#shopkeeper_total_premium").text(shopkeeper_total_premium);
            $("#shopkeeper_less_discount_per").text(shopkeeper_less_discount_per);
            $("#shopkeeper_less_discount_tot").text(shopkeeper_less_discount_tot);
            $("#shopkeeper_fire_rate_after_discount_tot").text(shopkeeper_fire_rate_after_discount_tot);
            $("#shopkeeper_cgst_fire_per").text(shopkeeper_cgst_fire_per);
            $("#shopkeeper_cgst_fire_tot").text(shopkeeper_cgst_fire_tot);
            $("#shopkeeper_sgst_fire_per").text(shopkeeper_sgst_fire_per);
            $("#shopkeeper_sgst_fire_tot").text(shopkeeper_sgst_fire_tot);
            $("#shopkeeper_final_paybal_premium").text(shopkeeper_final_paybal_premium);
            $("#shopkeeper_policy_id").text(shopkeeper_policy_id);
        });
        var personal_accident_length = personal_accident_json.length;
        var personal_accident_tr = "";
        var add_personal_acc = "";
        // alert(personal_accident_length);
        $.each(personal_accident_json, function(key, val) {
            add_personal_acc = key;
            var index = personal_accident_json[key][0];
            var personal_accident_name = personal_accident_json[key][1];
            var personal_accident_dob = personal_accident_json[key][2];
            var personal_accident_designation = personal_accident_json[key][3];
            var personal_accident_single_sum = personal_accident_json[key][4];
            personal_accident_tr += '<tr><td>' + personal_accident_name + '</td><td>' + personal_accident_dob + '</td><td>' + personal_accident_designation + '</td><td>' + personal_accident_single_sum + '</td</tr>';
        });
        $("#append_personal_acc").append(personal_accident_tr);

        var fidelity_gaur_length = fidelity_gaur_json.length;
        var fidelity_gaur_tr = "";
        var add_fidelity_gaur = "";
        $.each(fidelity_gaur_json, function(key, val) {
            add_fidelity_gaur = key;
            var index = fidelity_gaur_json[key][0];
            var fidelity_gaur_name = fidelity_gaur_json[key][1];
            var fidelity_gaur_dob = fidelity_gaur_json[key][2];
            var fidelity_gaur_designation = fidelity_gaur_json[key][3];
            var fidelity_gaur_single_sum = fidelity_gaur_json[key][4];
            fidelity_gaur_tr += '<tr><td>' + fidelity_gaur_name + '</td><td>' + fidelity_gaur_dob + '</td><td>' + fidelity_gaur_designation + '</td><td>' + fidelity_gaur_single_sum + '</td></tr>';
        });
        $("#append_fidelity_gaur").append(fidelity_gaur_tr);
    }

    function edit_FIre_RC_Details(risk_rc_details, fire_rc_policy_data_arr, policy_type_option, basic_sum_insured, basic_gross_premium) {
        var tr_rc_description = "";
        var risk_rc_details_length = risk_rc_details.length;
        $("#risk_fire_rc_details").empty();

        if (policy_type_option == 3) { // 1:Individual , 2:Floater ,3:Residential & Commercial Section
            var tr_rc_description = "";
            var tr_table = "";
            var html = "";
            var risk_discr_arr_data = "";
            // var risk_addres_header = "<span id='risk_address_count' class='font-weight-bold'></span><span id='risk_address'></span>";
            // var header = "<tdead><tr><td>Description</td><td>Nos.</td><td>Value</td><td>Sum Assured</td><td>Final Premium</td></tr></tdead><tbody id='risk_details'></tbody>";
            // $("#fire_table").append(header);


            // var html = '<table class="table mb-0 table-bordered col-md-12"><tr><td><strong><center>Address</center></strong></td><td><strong><center>Description</center></strong></td><td><strong><center>Sum Assured</center></strong></td>';
            // $("#risk_details").empty();
            $.each(risk_rc_details, function(key1, val1) {
                // $("#risk_fire_rc_details").append(risk_addres_header);
            });
            $.each(risk_rc_details, function(key1, val1) {
                var tr_table = "";
                var tr_rc_description = "";
                add_risk_RC = key1;
                var risk_add_key = risk_rc_details[key1][0];
                var risk_add_name = risk_rc_details[key1][1];
                var risk_discr_arr = JSON.stringify(risk_rc_details[key1][2]);
                risk_discr_arr_data = JSON.parse(risk_discr_arr);
                risk_discr_arr_data_length = risk_discr_arr_data.length;

                // $("#risk_address_count").append("<span id='risk_address_count_"+key1+"' class='font-weight-bold'><b>Risk Address "+(parseInt(key1)+parseInt(1))+" : </b></span>");
                // $("#risk_address").append("<span id='risk_address_"+key1+"'>"+risk_add_name+"</span>");
                // html += '  <tr>';
                $.each(risk_discr_arr_data, function(key2, val2) {
                    var risk_discr_key = risk_discr_arr_data[key2][0].split("_");
                    var risk_discr_name = risk_discr_arr_data[key2][1];
                    var risk_discr_nos = risk_discr_arr_data[key2][2];
                    var risk_discr_value = risk_discr_arr_data[key2][3];
                    var risk_discr_sum_insured = risk_discr_arr_data[key2][4];

                    if (parseInt(risk_discr_key[0]) == val1[0]) {
                        tr_rc_description += '<tr><td>' + risk_discr_name + '</td><td><center>' + risk_discr_nos + '</center></td><td><center>' + risk_discr_value + '</center></td><td><center>' + risk_discr_sum_insured + '</center></td>';


                    }

                });
                if (key1 == 0) {
                    // tr_rc_description += '<td id="counter_' + key1 + '">' + basic_gross_premium + '</td></tr>';
                    var final_premium_txt = '<span><b>Final Premium : ' + basic_gross_premium + '</b></td>';
                } else {
                    var final_premium_txt = '';
                }
                var tr_table = final_premium_txt + '<br/><span id="div_' + add_risk_RC + '"> <label for="risk_address"><strong>Risk Address ' + (add_risk_RC + 1) + ': </strong></label> <span > ' + risk_add_name + ' </span> </span> <span  id="r_c_append_' + add_risk_RC + '"   ><table  class="table mb-0 table-bordered" id="append_rcDescription_' + add_risk_RC + '"><tr><td width="40%"><b>Description</b></td><td width="10%"><b>Nos.</b></td><td width="14%"><b>Value</b></td><td><b>Sum Insured</b></td></tr>' + tr_rc_description + '</table></span>';
                $("#risk_fire_rc_details").append(tr_table);

                // if (parseInt(risk_discr_key[0]) == val1[0]) {
                //     // tr_rc_description += '<tr><td>' + risk_discr_name + '</td><td><center>' + risk_discr_nos + '</center></td><td><center>' + risk_discr_value + '</center></td><td><center>' + risk_discr_sum_insured + '</center></td></tr>';
                //     html += '<td>' + risk_discr_name + '</td><td><center>' + risk_discr_nos + '</center></td><td><center>' + risk_discr_value + '</center></td><td><center>' + risk_discr_sum_insured + '</center></td>';

                //     if (key2 == 0)
                //         html += '<td id="counter_' + key1 + '" rowspan="' + risk_discr_arr_data_length + '"><center>' + basic_gross_premium + '</center></td>';
                // }
                // html += '</tr>';
                // });
            });
            // html += '</table>';
            // $("#risk_details").append(html);
            $.each(risk_rc_details, function(key1, val1) {
                if (key1 != 0)
                    $("#counter_" + key1).hide();
            });

        }

        if (policy_type_option == 3) { //3:Residential & Commercial Section

            if (fire_rc_policy_data_arr.length != 0 || fire_rc_policy_data_arr.length != "") {
                $.each(fire_rc_policy_data_arr, function(key_other, val_other) {
                    var fire_rc_policy_id = fire_rc_policy_data_arr.fire_rc_policy_id;
                    var fire_rc_fk_policy_id = fire_rc_policy_data_arr.fire_rc_fk_policy_id;
                    var fk_policy_type_id = fire_rc_policy_data_arr.fk_policy_type_id;
                    var fire_rc_total_sum_assured = fire_rc_policy_data_arr.fire_rc_total_sum_assured;
                    var fire_rc_fire_rate_per = fire_rc_policy_data_arr.fire_rc_fire_rate_per;
                    var fire_rc_fire_rate_tot_amount = fire_rc_policy_data_arr.fire_rc_fire_rate_tot_amount;
                    var fire_rc_less_discount_per = fire_rc_policy_data_arr.fire_rc_less_discount_per;
                    var fire_rc_less_discount_tot_amount = fire_rc_policy_data_arr.fire_rc_less_discount_tot_amount;
                    var fire_rc_rate_after_discount = fire_rc_policy_data_arr.fire_rc_rate_after_discount;
                    var fire_rc_gross_premium = fire_rc_policy_data_arr.fire_rc_gross_premium;

                    var fire_rc_stfi_rate = fire_rc_policy_data_arr.fire_rc_stfi_rate;
                    var fire_rc_stfi_rate_total = fire_rc_policy_data_arr.fire_rc_stfi_rate_total;
                    var fire_rc_earthquake_rate = fire_rc_policy_data_arr.fire_rc_earthquake_rate;
                    var fire_rc_earthquake_rate_total = fire_rc_policy_data_arr.fire_rc_earthquake_rate_total;
                    var fire_rc_terrorisum_rate = fire_rc_policy_data_arr.fire_rc_terrorisum_rate;
                    var fire_rc_terrorisum_rate_total = fire_rc_policy_data_arr.fire_rc_terrorisum_rate_total;

                    var fire_rc_cgst_rate_per = fire_rc_policy_data_arr.fire_rc_cgst_rate_per;
                    var fire_rc_cgst_tot_amount = fire_rc_policy_data_arr.fire_rc_cgst_tot_amount;
                    var fire_rc_sgst_rate_per = fire_rc_policy_data_arr.fire_rc_sgst_rate_per;
                    var fire_rc_sgst_tot_amount = fire_rc_policy_data_arr.fire_rc_sgst_tot_amount;
                    var fire_rc_final_payable_premium = fire_rc_policy_data_arr.fire_rc_final_payable_premium;
                    var fire_rc_policy_status = fire_rc_policy_data_arr.fire_rc_policy_status;
                    // alert(fire_rc_final_payable_premium);
                    $("#total_sum_assured").text(fire_rc_total_sum_assured);
                    $("#fire_rate_per").text(fire_rc_fire_rate_per);
                    $("#fire_rate_tot").text(fire_rc_fire_rate_tot_amount);
                    $("#less_discount_per").text(fire_rc_less_discount_per);
                    $("#less_discount_tot").text(fire_rc_less_discount_tot_amount);
                    $("#fire_rate_after_discount_tot").val(fire_rc_rate_after_discount);
                    $("#gross_premium").text(fire_rc_gross_premium);

                    $("#stfi_rate_per").text(fire_rc_stfi_rate);
                    $("#stfi_rate_total").text(fire_rc_stfi_rate_total);
                    $("#earthquake_rate_per").text(fire_rc_earthquake_rate);
                    $("#earthquake_rate_total").text(fire_rc_earthquake_rate_total);
                    $("#terrorisum_rate_per").text(fire_rc_terrorisum_rate);
                    $("#terrorisum_rate_total").text(fire_rc_terrorisum_rate_total);

                    $("#cgst_fire_per").text(fire_rc_cgst_rate_per);
                    $("#cgst_fire_tot").text(fire_rc_cgst_tot_amount);
                    $("#sgst_fire_per").text(fire_rc_sgst_rate_per);
                    $("#sgst_fire_tot").text(fire_rc_sgst_tot_amount);
                    $("#final_paybal_premium").text(fire_rc_final_payable_premium);
                    $("#fire_rc_policy_id").text(fire_rc_policy_id);
                });
            }
        }
    }

    getPOLICYList();

    function getPOLICYList() {
        var policy_id = "<?php echo $policy_id; ?>";
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/renewal/edit_renew_policy";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    policy_id: policy_id
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    console.log(data);
                    var total_policy_data = 0;
                    $("#total_policy_data").text("");
                    if (data["status"] == true) {
                        var datas = "";
                        total_policy_data = data["total_policy_data"];
                        $("#total_policy_data").text(" Count ( " + total_policy_data + " ) ");

                        $.each(data, function(key, val) {

                            policy_id = parseInt(data["userdata"].policy_id);
                            var serial_no_year = data["userdata"].serial_no_year;
                            var serial_no_month = data["userdata"].serial_no_month;
                            serial_no = data["userdata"].serial_no;

                            var total_serial_no = serial_no_year + "/" + serial_no_month + "/" + serial_no;
                            company_name = data["userdata"].company_name;
                            department_name = data["userdata"].department_name;
                            policy_type_title = data["userdata"].policy_type_title;
                            member_name = data["userdata"].member_name;
                            grpname = data["userdata"].grpname;
                            policy_type = data["userdata"].policy_type;
                            mode_of_premimum = data["userdata"].mode_of_premimum;
                            date_from = data["userdata"].date_from;
                            date_to_new = data["userdata"].date_to;
                            date_to = date_to_new.split("-");
                            // alert(date_to);
                            date_to = date_to[2] + "-" + date_to[1] + "-" + date_to[0];

                            payment_date_from = data["userdata"].payment_date_from;
                            payment_date_to = data["userdata"].payment_date_to;
                            policy_no = data["userdata"].policy_no;
                            date_commenced = data["userdata"].date_commenced;
                            policy_upload = data["userdata"].policy_upload;
                            reg_mobile = data["userdata"].reg_mobile;
                            reg_email = data["userdata"].reg_email;
                            var grpname = data["userdata"].grpname;
                            var sum_insured = data["userdata"].basic_sum_insured;
                            var family_size = data["userdata"].family_size
                            var courier_address = data["userdata"].courier_address;

                            if (sum_insured == undefined || sum_insured == null || sum_insured == "null" || sum_insured == "undefined" || sum_insured == "") {
                                sum_insured = "0";
                            }
                            var gross_premium = data["userdata"].basic_gross_premium;
                            // alert(gross_premium);
                            if (gross_premium == undefined || gross_premium == null || gross_premium == "null" || gross_premium == "undefined" || gross_premium == "") {
                                gross_premium = "0";
                            }
                            var comission = data["userdata"].plan_policy_commission;
                            if (comission == undefined || comission == null || comission == "null" || comission == "undefined" || comission == "") {
                                comission = "0";
                            }
                            var floater_policy_type = data["userdata"].floater_policy_type;
                            master_agency_name = data["userdata"].master_agency_name;
                            master_agency_code = data["userdata"].master_agency_code;
                            sub_agent_name = data["userdata"].sub_agent_name;
                            sub_agent_code = data["userdata"].sub_agent_code;

                            if (master_agency_name == undefined || master_agency_name == null || master_agency_name == "null" || master_agency_name == "")
                                master_agency_name = "";
                            else
                                master_agency_name = master_agency_name;
                            policy_upload = data["userdata"].policy_upload;

                            if (master_agency_code == undefined || master_agency_code == null || master_agency_code == "null" || master_agency_code == "")
                                master_agency_code = "";
                            else
                                master_agency_code = " ( " + master_agency_code + " )";

                            if (sub_agent_name == undefined || sub_agent_name == null || sub_agent_name == "null" || sub_agent_name == "")
                                sub_agent_name = "";
                            else
                                sub_agent_name = sub_agent_name;

                            if (sub_agent_code == undefined || sub_agent_code == null || sub_agent_code == "null" || sub_agent_code != "")
                                sub_agent_code = "";
                            else
                                sub_agent_code = " ( " + sub_agent_code + " )";

                            agency_name_code = master_agency_name + master_agency_code;
                            sub_agent_name_code = sub_agent_name + sub_agent_code;
                            // alert(floater_policy_type);
                            if (floater_policy_type == null || floater_policy_type == "" || floater_policy_type == "null")
                                floater_policy_type = "";
                            else
                                floater_policy_type = " ( " + floater_policy_type + " ) ";

                            if (mode_of_premimum == 1)
                                mode_of_premimum = "Monthly";
                            else if (mode_of_premimum == 2)
                                mode_of_premimum = "Quaterly";
                            else if (mode_of_premimum == 3)
                                mode_of_premimum = "Half-Yearly";
                            else if (mode_of_premimum == 4)
                                mode_of_premimum = "Yearly";
                            else if (mode_of_premimum == 5)
                                mode_of_premimum = "2 Year";
                            else if (mode_of_premimum == 6)
                                mode_of_premimum = "3 Year";
                            else if (mode_of_premimum == 7)
                                mode_of_premimum = "4 Year";
                            else if (mode_of_premimum == 8)
                                mode_of_premimum = "5 Year";
                            else if (mode_of_premimum == 9)
                                mode_of_premimum = "6 Year";
                            else if (mode_of_premimum == 10)
                                mode_of_premimum = "7 Year";
                            else if (mode_of_premimum == 11)
                                mode_of_premimum = "8 Year";
                            else if (mode_of_premimum == 12)
                                mode_of_premimum = "9 Year";
                            else if (mode_of_premimum == 13)
                                mode_of_premimum = "10 Year";

                            policy_member_status = data["userdata"].policy_member_status;
                            var isActive = data["userdata"].del_flag;
                            var dynamic_path = data["userdata"].dynamic_path;

                            if (sub_agent_code == null)
                                sub_agent_code = "";

                            if (policy_type == 1)
                                policy_type_tit = "Individual";
                            else if (policy_type == 2)
                                policy_type_tit = "Floater";
                            else if (policy_type == 3)
                                policy_type_tit = "Residential & Commercial";
                            else if (policy_type == 4)
                                policy_type_tit = "Common Individual";
                            else if (policy_type == 5)
                                policy_type_tit = "Common Floater";
                            // alert(family_size);
                            if (!isNaN(policy_id)) {
                                $("#insurance_company").text(company_name);
                                $("#sub_policy_name").text(policy_type_title + " " + floater_policy_type);
                                $("#policy_type").text(policy_type_tit);
                                $("#family_size").text(family_size);
                                $("#policy_holder_name").text(member_name);
                                $("#registered_mobile_no").text(reg_mobile);
                                $("#registered_email_id").text(reg_email);
                                $("#para_policy_name").text(policy_type_title);
                                $("#para_policy_no").text(policy_no);
                                $("#para_policy_to_date").text(date_to);
                                $("#payment_company_name").text(company_name);
                                $("#payment_company_office_address").text(courier_address);
                                if (policy_type_tit == "Floater" || policy_type_tit == "Common Floater") {
                                    $(".type_based_show_quest").show();
                                    $(".type_based_show_ans").show();
                                } else {
                                    $(".type_based_show_ans").hide();
                                    $(".type_based_show_quest").hide();
                                }

                            }
                        });

                    } else {
                        datas = '<tr><td colspan="22"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }
</script>