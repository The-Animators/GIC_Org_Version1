<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
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
                                <h4 class="header-title"><?php echo "View " . $title; ?></h4>
                            </div>
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-6 text-right" id="btn_details">
                                <a href="<?php echo base_url() . "master/insurance_company_details"; ?>" class='btn btn-secondary waves-effect btn-xs'>Back</a>
                            </div>

                        </div>

                        <p class="sub-header">

                        </p>

                        <div class="row">
                            <div class="col-md-12">

                                <u> <strong>Company General Details</strong></u>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <table class="table mr-1 ml-1 mb-1 table-bordered">
                                            <thead>
                                                <tr>
                                                    <td width="30%">Company Name :</td>
                                                    <td><strong><span id="company_name" class="text-orange"></span></strong></td>
                                                </tr>
                                            </thead>
                                        </table>
                                        <!-- <div class="form-group row">
                                            <label for="company_name" class="col-form-label col-md-4 text-right">Company Name : </label>
                                            <div class="col-form-label col-md-8 text-success" id="company_name"></div>
                                        </div> -->
                                    </div>

                                    <div class="col-md-4">
                                        <table class="table mr-1 ml-1 mb-1 table-bordered">
                                            <thead>
                                                <tr>
                                                    <td width="30%">Short Name :</td>
                                                    <td><strong><span id="short_name" class="text-orange"></span></strong></td>
                                                </tr>
                                            </thead>
                                        </table>
                                        <!-- <div class="form-group row">
                                            <label for="short_name" class="col-form-label col-md-4 text-right">Short Name : </label>
                                            <div class="col-form-label col-md-8" id="short_name"></div>
                                        </div> -->
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table mr-1 ml-1 mb-1 table-bordered">
                                            <thead>
                                                <tr>
                                                    <td width="30%">Common Email :</td>
                                                    <td><strong><span id="comman_email" class="text-orange"></span></strong></td>
                                                </tr>
                                            </thead>
                                        </table>
                                        <!-- <div class="form-group row">
                                            <label for="comman_email" class="col-form-label col-md-4  text-right">Common Email : </label>
                                            <div class="col-form-label col-md-8" id="comman_email"></div>
                                        </div> -->
                                    </div>
                                    <div class="col-md-8">
                                        <table class="table mr-1 ml-1 mb-1 table-bordered">
                                            <thead>
                                                <tr>
                                                    <td width="15%">Address :</td>
                                                    <td><strong><span id="address" class="text-orange"></span></strong></td>
                                                </tr>
                                            </thead>
                                        </table>
                                        <!-- <div class="form-group row">
                                            <label for="address" class="col-form-label col-md-4  text-right">Address : </label>
                                            <div class="col-form-label col-md-8" id="address"></div>
                                        </div> -->
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table mr-1 ml-1 mb-1 table-bordered">
                                            <thead>
                                                <tr>
                                                    <td width="30%">Office Contact :</td>
                                                    <td><strong><span id="office_contact" class="text-orange"></span></strong></td>
                                                </tr>
                                            </thead>
                                        </table>
                                        <!-- <div class="form-group row">
                                            <label for="office_contact" class="col-form-label col-md-4  text-right">Office Contact : </label>
                                            <div class="col-form-label col-md-8" id="office_contact"></div>
                                        </div> -->
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table mr-1 ml-1 mb-1 table-bordered">
                                            <thead>
                                                <tr>
                                                    <td width="30%">Website :</td>
                                                    <td><strong><span id="website" class="text-orange"></span></strong></td>
                                                </tr>
                                            </thead>
                                        </table>
                                        <!-- <div class="form-group row">
                                            <label for="website" class="col-form-label col-md-4  text-right">Website : </label>
                                            <div class="col-form-label col-md-8" id="website"></div>
                                        </div> -->
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table mr-1 ml-1 mb-1 table-bordered">
                                            <thead>
                                                <tr>
                                                    <td width="30%">Toll Free No.1 :</td>
                                                    <td><strong><span id="tollfree_1" class="text-orange"></span></strong></td>
                                                </tr>
                                            </thead>
                                        </table>
                                        <!-- <div class="form-group row">
                                            <label for="tollfree_1" class="col-form-label col-md-4  text-right">Toll Free No.1 : </label>
                                            <div class="col-form-label col-md-8" id="tollfree_1"> </div>
                                        </div> -->
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table mr-1 ml-1 mb-1 table-bordered">
                                            <thead>
                                                <tr>
                                                    <td width="30%">Toll Free No.2 :</td>
                                                    <td><strong><span id="tollfree_2" class="text-orange"></span></strong></td>
                                                </tr>
                                            </thead>
                                        </table>
                                        <!-- <div class="form-group row">
                                            <label for="tollfree_2" class="col-form-label col-md-4  text-right">Toll Free No.2 : </label>
                                            <div class="col-form-label col-md-8" id="tollfree_2"> </div>
                                        </div> -->
                                    </div>

                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <u><strong>Company Agent Details</strong></u>
                                    </div>
                                    <div class="col-md-6 text-right"></div>
                                </div>

                                <hr class="mt-2">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <table style="border: 1px solid #dddddd;padding: 8px; width: 100%;">
                                            <thead>
                                                <tr style="padding:10px;">
                                                    <th style="border: 1px solid #dddddd;padding:10px;">
                                                        <center>Name</center>
                                                    </th>
                                                    <th style="border: 1px solid #dddddd;">
                                                        <center>Agency Code</center>
                                                    </th>
                                                    <th style="border: 1px solid #dddddd;">
                                                        <center>Portal Link</center>
                                                    </th>
                                                    <th style="border: 1px solid #dddddd;">
                                                        <center>User Id</center>
                                                    </th>
                                                    <th style="border: 1px solid #dddddd;">
                                                        <center>Password</center>
                                                    </th>
                                                    <th style="border: 1px solid #dddddd;">
                                                        <center>Status</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="append_agent">
                                                <tr>
                                                    <td style="border: 1px solid #dddddd;"></td>
                                                    <td style="border: 1px solid #dddddd;"></td>
                                                    <td style="border: 1px solid #dddddd;"></td>
                                                    <td style="border: 1px solid #dddddd;"></td>
                                                    <td style="border: 1px solid #dddddd;"></td>
                                                    <td style="border: 1px solid #dddddd;"></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                                <hr>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <u><strong>Company Employee Details</strong></u>
                                    </div>
                                    <div class="col-md-6 text-right"></div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <table style="border: 1px solid #dddddd;padding: 8px; width: 100%;">
                                            <thead>
                                                <tr style="padding:10px;">
                                                    <th style="border: 1px solid #dddddd;padding:10px;">
                                                        <center>Name</center>
                                                    </th>
                                                    <th style="border: 1px solid #dddddd;">
                                                        <center>Designation</center>
                                                    </th>
                                                    <th style="border: 1px solid #dddddd;">
                                                        <center>Mobile 1</center>
                                                    </th>
                                                    <th style="border: 1px solid #dddddd;">
                                                        <center>Mobile 2</center>
                                                    </th>
                                                    <th style="border: 1px solid #dddddd;">
                                                        <center>Email</center>
                                                    </th>
                                                    <th style="border: 1px solid #dddddd;">
                                                        <center>Agency Name</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="append_emp">
                                                <tr>
                                                    <td style="border: 1px solid #dddddd;"></td>
                                                    <td style="border: 1px solid #dddddd;"></td>
                                                    <td style="border: 1px solid #dddddd;"></td>
                                                    <td style="border: 1px solid #dddddd;"></td>
                                                    <td style="border: 1px solid #dddddd;"></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>


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
                                <!-- <div class="form-row mt-2">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="account_holder" class="col-form-label col-md-4 text-right">Account Holder : </label>
                                            <div class="col-md-8"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="account_no" class="col-form-label col-md-4 text-right">Account Number : </label>
                                            <div class="col-md-8"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="bank_name" class="col-form-label col-md-4 text-right">Bank Name : </label>
                                            <div class="col-md-8"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="branch_namw" class="col-form-label col-md-4 text-right">Branch Name : </label>
                                            <div class="col-md-8"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="ifs_code" class="col-form-label col-md-4 text-right">IFSC Code : </label>
                                            <div class="col-md-8"> </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="micr_code" class="col-form-label col-md-4 text-right">MICR Code : </label>
                                            <div class="col-md-8"> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mt-2">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="account_holder_1" class="col-form-label col-md-4 text-right">Account Holder 2: </label>
                                            <div class="col-md-8"> </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="account_no_1" class="col-form-label col-md-4 text-right">Account Number 2 : </label>
                                            <div class="col-md-8"> </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="bank_name_1" class="col-form-label col-md-4 text-right">Bank Name 2 : </label>
                                            <div class="col-md-8"> </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="branch_namw_1" class="col-form-label col-md-4 text-right">Branch Name 2 : </label>
                                            <div class="col-md-8"> </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="ifs_code_1" class="col-form-label col-md-4 text-right">IFSC Code 2 : </label>
                                            <div class="col-md-8"> </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="micr_code_1" class="col-form-label col-md-4 text-right">MICR Code 2 : </label>
                                            <div class="col-md-8"> </div>
                                        </div>
                                    </div>
                                </div> -->
                                <hr>


                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->

        </div> <!-- end container-fluid -->

    </div> <!-- end content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php echo date("Y"); ?> &copy; GIC by <a href="">Animator</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->

<script>
    getAgentDetails(<?php echo $company_id; ?>);

    function getAgentDetails(company_id) {
        // return false;
        // alert(company_id);
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/insurance_company_details/get_agent_details";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    'company_id': company_id
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    $("#append_agent").empty();
                    var emp_tr = '';
                    if (data["status"] == true) {
                        var agent = data["userdata"];
                        $.each(agent, function(key, val) {
                            var magency_id = agent[key].magency_id;
                            var agent_name = agent[key].agent_name;
                            var code = agent[key].code;
                            var link = agent[key].link;
                            var username = agent[key].username;
                            var password = agent[key].password;
                            var magency_status = agent[key].magency_status;
                            var agent_del_flag = agent[key].agent_del_flag;
                            var fk_mcompany_id = agent[key].fk_mcompany_id;
                            if (agent_name == "" || agent_name == null || agent_name == "null" || agent_name == undefined || agent_name == "undefined")
                                agent_name = '';
                            else
                                agent_name = agent_name;

                            if (code == "" || code == null || code == "null" || code == undefined || code == "undefined")
                                code = '';
                            else
                                code = code;

                            if (username == "" || username == null || username == "null" || username == undefined || username == "undefined")
                                username = '';
                            else
                                username = username;

                            if (password == "" || password == null || password == "null" || password == undefined || password == "undefined")
                                password = '';
                            else
                                password = password;

                            if (link == "" || link == null || link == "null" || link == undefined || link == "undefined")
                                link = '';
                            else
                                link = link;
                            if (magency_status == 1)
                                var status_txt = 'Active';
                            else
                                var status_txt = 'In-Active';
                            emp_tr += ' <tr><td style="border: 1px solid #dddddd;padding:10px;"><center>' + agent_name + '</center></td><td style="border: 1px solid #dddddd;"><center>' + code + '</center></td><td style="border: 1px solid #dddddd;"><center>' + link + '</center></td><td style="border: 1px solid #dddddd;"><center>' + username + '</center></td><td style="border: 1px solid #dddddd;"><center>' + password + '</center></td><td style="border: 1px solid #dddddd;"><center>' + status_txt + '</center></td> </tr>';
                        });
                        $("#append_agent").append(emp_tr);
                    }

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }
    getEmployeeDetails(<?php echo $company_id; ?>);

    function getEmployeeDetails(company_id) {
        // return false;
        // alert(company_id);
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/insurance_company_details/get_employee_details";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    'company_id': company_id
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    $("#append_emp").empty();
                    var emp_tr = '';

                    if (data["status"] == true) {
                        var employee = data["userdata"];
                        $.each(employee, function(key, val) {
                            var mmember_id = employee[key].mmember_id;
                            var member_name = employee[key].member_name;
                            var designation = employee[key].designation;
                            var contact1 = employee[key].contact1;
                            var contact2 = employee[key].contact2;
                            var email1 = employee[key].email1;
                            var member_del_flag = employee[key].member_del_flag;
                            var mmember_status = employee[key].mmember_status;
                            var fk_mcompany_id = employee[key].fk_mcompany_id;
                            fk_agency_id = employee[key].fk_agency_id;
                            var agency_name = getAgency_nameDetails(fk_agency_id, fk_mcompany_id);
                            // alert(agency_name);
                            // alert(agency_name);
                            emp_tr += ' <tr><td style="border: 1px solid #dddddd;padding:10px;"><center>' + member_name + '</center></td><td style="border: 1px solid #dddddd;"><center>' + designation + '</center></td><td style="border: 1px solid #dddddd;"><center>' + contact1 + '</center></td><td style="border: 1px solid #dddddd;"><center>' + contact2 + '</center></td><td style="border: 1px solid #dddddd;"><center>' + email1 + '</center></td><td style="border: 1px solid #dddddd;"><center>' + agency_name + '</center></td> </tr>';
                        });
                        $("#append_emp").append(emp_tr);
                    }

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function getAgency_nameDetails(agency_id, company_id) {
        // alert(agency_id);
        // alert(company_id);
        var agent_name = "";
        var url = "<?php echo $base_url; ?>master/insurance_company_details/get_agent_name_details";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    'company_id': company_id,
                    'agency_id': agency_id,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {

                    if (data["status"] == true) {
                        agent_name = data["userdata"];
                    } else {
                        agent_name = "";
                    }

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
        return agent_name;
    }

    getCompanyDetails();

    function wordwrap(str = "", width = "", brk = "", cut = "", type = "") { // Type 1:break, 2:not Break
        // if (str && !str.match(/^.+:\/\/.*/)) {
        //     str ='https://' + str;
        // }
        if (type == 1)
            brk = brk;
        else
            brk = '';
        brk = brk || 'n';
        width = width || 75;
        cut = cut || false;

        if (!str) {
            return str;
        }

        var regex = '.{1,' + width + '}(\|$)' + (cut ? '|.{' + width + '}|.+$' : '|\S+?(\|$)');

        return str.match(RegExp(regex, 'g')).join(brk);

    }

    function getCompanyDetails() {
        $("#tableData").empty();
        var mcompany_id = "<?php echo $company_id; ?>";
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

                        // var website = data["userdata"].website;
                        var website = wordwrap(data["userdata"].website, '20', '<br/>', cut = '', type = "2");
                        if (website == "" || website == null || website == undefined)
                            website = '';
                        else
                            website = '<a href ="' + data["userdata"].website + '" target="_blank">[' + website + ']</a>';
                        $("#website").html(website);
                        // $("#website").text(website);

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

                        // var payment_link = data["userdata"].payment_link;
                        // $("#online_link").text(payment_link);

                        var payment_link = wordwrap(data["userdata"].payment_link, '20', '<br/>', cut = '', type = "2");
                        if (payment_link == "" || payment_link == null || payment_link == undefined)
                            payment_link = '';
                        else
                            payment_link = '<a href ="' + data["userdata"].payment_link + '" target="_blank">[' + payment_link + ']</a>';
                        $("#online_link").html(payment_link);

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
                                var status = "fa fa-toggle-on";
                                var status_btn_txt = "btn btn-outline-success waves-effect waves-light btn-xs edit";
                            } else {
                                var status = "fa fa-toggle-off";
                                var status_btn_txt = "btn btn-outline-danger waves-effect waves-light btn-xs edit";
                            }

                            // <a href="http://localhost/gic/master/policy/edit_policy/1" class="btn btn-facebook btn-sm mt-1 edit" id="edit"><i class="fas fa-pencil-alt"></i></a>

                            var edit_btn = " <a id='edit' href='<?php echo base_url() . "master/insurance_company_details/edit_company/"; ?>" + company_id + "' class='btn btn-facebook btn-xs mr-1 edit' id='edit'><i class='fas fa-pencil-alt'></i></a><button id='delete' onclick='OnDelete(" + company_id + ")' class='btn btn-danger btn-xs mr-1'><i class='fa fa-trash'></i></button><button id='recover' onclick='OnRecover(" + company_id + ")' class='btn btn-success btn-xs mr-1' style='display:none;'><i class='fa fa-undo'></i></button>";
                            var status_btn = "<button class='" + status_btn_txt + "  mr-1' id='status_btn_" + company_id + "' value='' type='button' onClick ='updateStatus(" + company_id + "," + company_status + ")' ><i class='" + status + "'></i></button>";
                            var back_btn = '<a href="<?php echo base_url() . "master/insurance_company_details"; ?>" class="btn btn-secondary waves-effect btn-xs">Back</a>';
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

    function OnRecover(company_id) {
        var url = "<?php echo $base_url; ?>master/insurance_company_details/recover_company";
        confirmation_alert(id = company_id, url = url, title = "Company Details", type = "Recover");
    }

    function OnDelete(company_id) {
        var url = "<?php echo $base_url; ?>master/insurance_company_details/remove_company";
        confirmation_alert(id = company_id, url = url, title = "Company Details", type = "Delet");
    }

    function updateStatus(company_id, company_status) {

        var url = "<?php echo $base_url; ?>master/insurance_company_details/update_company_status";

        if (company_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": company_id,
                    "status": company_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + company_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["company_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                            $("#edit_" + company_id).addClass(status_btn_txt);
                            $("#status_btn_" + company_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                            $("#edit_" + company_id).addClass(status_btn_txt);
                            $("#status_btn_" + company_id).text(status);
                        }

                        $("#status_btn_" + company_id).text(status);


                        $('#status_btn_' + staff_id).attr('onClick', 'updateStatus(' + staff_id + ',' + data["userdata"]["menu_status"] + ')');


                    } else {
                        toaster(message_type = "Error", message_txt = data["message"], message_icone = "error");
                    }

                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                }

            });
        }
    }
</script>
<script>
    $(document).ready(function() {
        var path = window.location.pathname;
        var page = path.split("/").pop();
        var user_role_id = <?php echo  $this->session->userdata("@_user_role_id"); ?>;
        var submenu_permission = "<?php echo $this->session->userdata("@_user_role_sub_menu_permission"); ?>";
        var role_permission = '<?php echo $this->session->userdata("@_staff_role_permission"); ?>';
        var url = '<?php echo base_url(); ?>login/logout';
        if ((user_role_id != 1) && (user_role_id != 2)) {
            var id = $("#submenu").data("value");
            if (id != "") {
                CheckFormAccess(submenu_permission, 1, url);
                check(role_permission, 1);
            }
        }
    });
</script>