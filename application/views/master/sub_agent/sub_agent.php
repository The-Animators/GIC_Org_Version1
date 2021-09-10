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
            <div id="form_modal" class="modal fade bs-example-modal-lg bs-example-modal-center" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title"><?php echo $title; ?> Details</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-row">

                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="sub_agent_name" class="col-form-label col-md-4 text-right">Sub-Agent Name<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="sub_agent_name" id="sub_agent_name" value="" placeholder="Enter Sub-Agent Name" class="form-control">
                                                    <span id="sub_agent_name_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="sub_agent_code" class="col-form-label col-md-4 text-right">Sub-Agent Code<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="sub_agent_code" id="sub_agent_code" value="" placeholder="Enter Sub-Agent Code" class="form-control">
                                                    <input type="hidden" name="sub_agent_counter" id="sub_agent_counter" value="" placeholder="Enter Sub Agent Counter." class="form-control">
                                                    <span id="sub_agent_code_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="mobile_1" class="col-form-label col-md-4 text-right">Mobile 1<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="mobile_1" id="mobile_1" value="" placeholder="Enter Mobile Number 2" class="form-control">
                                                    <span id="mobile_1_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="mobile_2" class="col-form-label col-md-4 text-right">Mobile 2<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="mobile_2" id="mobile_2" value="" placeholder="Enter Mobile  Number 2" class="form-control">
                                                    <span id="mobile_2_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="email" class="col-form-label col-md-4 text-right">Email<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="email" id="email" value="" placeholder="Enter Email" class="form-control">
                                                    <span id="email_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="login_our_site" class="col-form-label col-md-4 text-right">Login Our Site<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <textarea name="login_our_site" id="login_our_site" value="" placeholder="Enter Login Our Site" class="form-control"></textarea>
                                                    <span id="login_our_site_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="less_income_tax" class="col-form-label col-md-4 text-right">Less Income Tax<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="less_income_tax" id="less_income_tax" value="" placeholder="Enter Less Income Tax" class="form-control">
                                                    <span id="less_income_tax_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="commission_percentage" class="col-form-label col-md-4 text-right">Commision Percentage<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" name="commission_percentage" id="commission_percentage" value="" placeholder="Enter Commision Percentage" class="form-control">
                                                    <span id="commission_percentage_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-1">
                                            <div class="form-row">
                                                <label for="address" class="col-form-label col-md-4 text-right">Address</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="sub_agent_profile" class="col-form-label col-md-4 text-right">Profile</label>
                                                <div class="col-md-8">
                                                    <input type="file" name="sub_agent_profile" id="sub_agent_profile" class="form-control filestyle sub_agent_profile" data-input="false" id="filestyle-1" tabindex="-1" onchange="check_file_upload(id ='sub_agent_profile')">
                                                    <span id="sub_agent_profile_err"></span>
                                                    <span id="sub_agent_profile_det" style="display:none;"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="sub_agent_id" hidden>1</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <center>
                                                <button id="update" onclick='onUpdate()' style="display: none;" class="btn btn-primary btn-sm">Update <?php echo $title; ?></button>
                                                <button id="submit" class="btn btn-primary btn-sm">Save <?php echo $title; ?></button>
                                                <!-- <button id="delete" onclick='OnDelete()' style="display: none;" class="btn btn-primary btn-sm">Delete <?php echo $title; ?></button>
                                                <button id="recover" onclick='OnRecover()' style="display: none;" class="btn btn-primary btn-sm">Recover <?php echo $title; ?></button> -->
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

            <div id="view_form_modal" class="modal fade bs-example-modal-lg bs-example-modal-center" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">View <?php echo $title; ?> Details</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row">
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Sub-Agent Name :</td>
                                                <td><strong><span id="sub_agent_name_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Sub-Agent Code :</td>
                                                <td><strong><span id="sub_agent_code_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Mobile 1 :</td>
                                                <td><strong><span id="mobile_1_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Mobile 2 :</td>
                                                <td><strong><span id="mobile_2_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Email :</td>
                                                <td><strong><span id="email_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Login Our Site :</td>
                                                <td><strong><span id="login_our_site_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Less Income Tax :</td>
                                                <td><strong><span id="less_income_tax_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Commision Percentage :</td>
                                                <td><strong><span id="commission_percentage_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                    <!-- <div class="form-row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="sub_agent_name" class="col-form-label col-md-6 text-right"><strong>Sub-Agent Name : </strong></label>
                                                <div class="col-md-6 col-form-label" id="sub_agent_name_det"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="sub_agent_code" class="col-form-label col-md-6 text-right"><strong>Sub-Agent Code : </strong></label>
                                                <div class="col-md-6 col-form-label " id="sub_agent_code_det"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="mobile_1" class="col-form-label col-md-6 text-right"><strong>Mobile 1 : </strong></label>
                                                <div class="col-md-6 col-form-label" id="mobile_1_det"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="mobile_2" class="col-form-label col-md-6 text-right"><strong>Mobile 2 : </strong></label>
                                                <div class="col-md-6 col-form-label" id="mobile_2_det"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="email" class="col-form-label col-md-6 text-right"><strong>Email : </strong></label>
                                                <div class="col-md-6 col-form-label" id="email_det"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="login_our_site" class="col-form-label col-md-6 text-right"><strong>Login Our Site : </strong></label>
                                                <div class="col-md-6 col-form-label" id="login_our_site_det"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="less_income_tax" class="col-form-label col-md-6 text-right"><strong>Less Income Tax : </strong></label>
                                                <div class="col-md-6 col-form-label" id="less_income_tax_det"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="commission_percentage" class="col-form-label col-md-6 text-right"><strong>Commision Percentage : </strong></label>
                                                <div class="col-md-6 col-form-label" id="commission_percentage_det"></div>
                                            </div>
                                        </div>

                                    </div> -->

                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Address :</td>
                                                <td><strong><span id="address_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table mr-1 ml-1 mb-1 table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="40%">Profile :</td>
                                                <td><strong><span id="sub_agent_profile_view_det" class="text-orange"></span></strong></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="filter_form_modal" class="modal fade bs-example-modal-lg bs-example-modal-center" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Filter <?php echo $title; ?> Details</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Form row -->
                            <div class="row ">
                                <div class="col-md-4">
                                    <div class="form-row">
                                        <label for="filter_sub_agent_name" class="col-form-label col-md-4 text-right">Sub-Agent Name</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="filter_sub_agent_name" name="filter_sub_agent_name" placeholder="Enter Sub-Agent Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-row">
                                        <label for="filter_sub_agent_code" class="col-form-label col-md-4 text-right">Code</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="filter_sub_agent_code" name="filter_sub_agent_code" placeholder="Enter Sub-Agent Code">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-row">
                                        <label for="filter_mobile_1" class="col-form-label col-md-4 text-right">Mobile 1</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="filter_mobile_1" name="filter_mobile_1" placeholder="Enter Mobile 1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-1">
                                    <div class="form-row">
                                        <label for="filter_mobile_2" class="col-form-label col-md-4 text-right">Mobile 2</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="filter_mobile_2" name="filter_mobile_2" placeholder="Enter Mobile 2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-1">
                                    <div class="form-row">
                                        <label for="filter_email" class="col-form-label col-md-4 text-right">Email</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="filter_email" name="filter_email" placeholder="Enter Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-1">
                                    <div class="form-row">
                                        <label for="filter_status" class="col-form-label col-md-4 text-right">Status</label>
                                        <div class="col-md-8">
                                            <select name="filter_status" id="filter_status" class="form-control">
                                                <option value="null">Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="2">In-Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-1 ml-1">
                                    <center><button type="submit" id="search" class="btn btn-outline-secondary waves-effect btn-xs mr-4" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="reset" class="btn btn-outline-secondary waves-effect btn-xs" onclick="Reset_data()"><b><i class="mdi mdi-undo"></i>Reset</b></button></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_sub_agent_data"></span></h4>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4 text-right">
                                <input class='btn btn-facebook btn-xs' id='AddForm' value='Add' type='button' />
                                <button type="submit" id="filter_btn" class="btn btn-outline-secondary waves-effect btn-xs"><b><i class="mdi mdi-magnify"></i>&nbsp;Filter Off</b></button>
                            </div>

                        </div>


                        <!-- <table id="datatable" class="table  table-striped table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> -->
                        <!-- <div class="row ">
                            <div class="col-md-4">
                                <div class="form-row">
                                    <label for="filter_sub_agent_name" class="col-form-label col-md-4 text-right">Sub-Agent Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="filter_sub_agent_name" name="filter_sub_agent_name" placeholder="Enter Sub-Agent Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-row">
                                    <label for="filter_sub_agent_code" class="col-form-label col-md-4 text-right">Code</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="filter_sub_agent_code" name="filter_sub_agent_code" placeholder="Enter Sub-Agent Code">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-row">
                                    <label for="filter_mobile_1" class="col-form-label col-md-4 text-right">Mobile 1</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="filter_mobile_1" name="filter_mobile_1" placeholder="Enter Mobile 1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-1">
                                <div class="form-row">
                                    <label for="filter_mobile_2" class="col-form-label col-md-4 text-right">Mobile 2</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="filter_mobile_2" name="filter_mobile_2" placeholder="Enter Mobile 2">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-1">
                                <div class="form-row">
                                    <label for="filter_email" class="col-form-label col-md-4 text-right">Email</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="filter_email" name="filter_email" placeholder="Enter Email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-1">
                                <div class="form-row">
                                    <label for="filter_status" class="col-form-label col-md-4 text-right">Status</label>
                                    <div class="col-md-8">
                                        <select name="filter_status" id="filter_status" class="form-control">
                                            <option value="null">Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="2">In-Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-1 ml-1">
                                <center><button type="submit" id="search" class="btn btn-outline-secondary waves-effect btn-xs mr-4" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="reset" class="btn btn-outline-secondary waves-effect btn-xs" onclick="Reset_data()"><b><i class="mdi mdi-undo"></i>Reset</b></button></center>
                            </div>
                        </div> -->
                        <div class="table-cont">
                            <table class="commission_table fixed" id="commission_table" border="1">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>SN.</th>
                                        <th>
                                            <center>Sub-Agent Name</center>
                                        </th>
                                        <th>Code</th>
                                        <th>Mobile 1</th>
                                        <th>Mobile 2</th>
                                        <th>Email</th>
                                        <th>Login Our Site</th>
                                        <th>Less Income Tax</th>
                                        <th>Commission %</th>
                                        <!-- <th>Sub-Agent Status</th> -->
                                        <th>Delete Status</th>
                                    </tr>
                                </thead>

                                <tbody id="tableData">

                                </tbody>
                            </table>
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
    $("#AddForm").click(function() {
        $('#form_modal').modal('toggle');
        uninitialize();
        clearError();
        get_sub_agent_counter();
        $("#sub_agent_profile_det").hide();
    });

    $("#filter_btn").click(function() {
        $('#filter_form_modal').modal('toggle');
    });

    $('#sub_agent_name').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    $('#sub_agent_code').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    $('#mobile_1').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    $('#mobile_2').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    $('#email').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    $('#login_our_site').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#less_income_tax').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('#commission_percentage').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    $('#address').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });

    $('#sub_agent_profile').on('click', function() {
        document.getElementById("update").disabled = false;
    });

    function clearError() {
        $("#sub_agent_name").removeClass("parsley-error");
        $("#sub_agent_name_err").removeClass("text-danger").text("");

        $("#sub_agent_code").removeClass("parsley-error");
        $("#sub_agent_code_err").removeClass("text-danger").text("");

        $("#mobile_1").removeClass("parsley-error");
        $("#mobile_1_err").removeClass("text-danger").text("");

        $("#mobile_2").removeClass("parsley-error");
        $("#mobile_2_err").removeClass("text-danger").text("");

        $("#email").removeClass("parsley-error");
        $("#email_err").removeClass("text-danger").text("");

        $("#login_our_site").removeClass("parsley-error");
        $("#login_our_site_err").removeClass("text-danger").text("");

        $("#less_income_tax").removeClass("parsley-error");
        $("#less_income_tax_err").removeClass("text-danger").text("");

        $("#commission_percentage").removeClass("parsley-error");
        $("#commission_percentage_err").removeClass("text-danger").text("");

        $("#address").removeClass("parsley-error");
        $("#address_err").removeClass("text-danger").text("");

        $("#sub_agent_profile").removeClass("parsley-error");
        $("#sub_agent_profile_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#sub_agent_id").text("");

        $("#sub_agent_name").val("");
        $("#sub_agent_code").val("");
        $("#mobile_1").val("");
        $("#mobile_2").val("");
        $("#email").val("");
        $("#login_our_site").val("");
        $("#less_income_tax").val("");
        $("#commission_percentage").val("");
        $("#address").val("");
        $("#sub_agent_profile").val("");

        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function get_sub_agent_counter() {
        var url = "<?php echo $base_url; ?>master/sub_agent/get_sub_agent_counter";
        if (url != "") {
            $.ajax({
                url: url,
                data: {},
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var data_details = data["userdata"].sub_agent_counter;
                    // alert(data_details);
                    var sub_agent_counter = 0;
                    if (data_details == 0 || data_details == "" || data_details == "null" || data_details == "undefined" || data_details == null || data_details == undefined) {
                        sub_agent_counter = "00001";
                        var actual_sub_agent_counter = "1";
                    } else {
                        var sub_agent_counter_new = data_details;
                        sub_agent_counter = parseInt(sub_agent_counter_new) + 1;
                        var actual_sub_agent_counter = sub_agent_counter;
                        sub_agent_counter = sub_agent_counter.toString();
                        // alert(sub_agent_counter.length);
                        if (sub_agent_counter.length == 1) {
                            sub_agent_counter = "0000" + sub_agent_counter;
                        } else if (sub_agent_counter.length == 2) {
                            sub_agent_counter = "000" + sub_agent_counter;
                        } else if (sub_agent_counter.length == 3) {
                            sub_agent_counter = "00" + sub_agent_counter;
                        } else if (sub_agent_counter.length == 4) {
                            sub_agent_counter = "0" + sub_agent_counter;
                        }
                    }
                    // alert(current_month);
                    $('#sub_agent_code').val('SA-' + sub_agent_counter + "/");
                    $("#sub_agent_counter").val(actual_sub_agent_counter);

                    if (actual_sub_agent_counter != "")
                        document.getElementById("sub_agent_code").disabled = true;

                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    $('#address').on('keyup', function() {
        var address = $("#address").val().toLowerCase().replace(/\b[a-z]/g, function(letter) {
            return letter.toUpperCase();
        });
        var sub_agent_code = $("#sub_agent_code").val().split("/");
        $("#sub_agent_code").val(sub_agent_code[0] + "/" + address);
    });

    function check_file_upload(id) {
        if ($.inArray($('#' + id).val().split('.').pop().toLowerCase(), ['png', 'jpg', 'jpeg', 'jpe']) == -1) {
            toaster(message_type = "Error", message_txt = "Invalid Extension!", message_icone = "error");
            $('#' + id).addClass("parsley-error");
            $('#' + id + "_err").addClass("text-danger").html("Please Select Only Valid Document Like Image File Only.");
            toaster(message_type = "Error", message_txt = "Please Select Only Valid Document Like Image File Only.", message_icone = "error");
            return false;
        } else {
            $('#' + id).removeClass("parsley-error");
            $('#' + id + "_err").removeClass("text-danger").html("");
        }
    }

    function OnDelete_Doc(staff_doc_details) {
        var staff_doc_details = staff_doc_details.split(",");
        var staff_id = staff_doc_details[0];
        var doc_type = staff_doc_details[1];
        var doc_name = staff_doc_details[2];
        var url = staff_doc_details[3];

        if (doc_type == 1)
            var title = "Profile Photo";
        document_confirmation_alert(id = staff_id, doc_type = doc_type, doc_name = doc_name, url = url, title = title, type = "Delet");
    }

    function OnRecover(sub_agent_id) {
        // var sub_agent_id = $("#sub_agent_id").text();
        var url = "<?php echo $base_url; ?>master/sub_agent/recover_sub_agent";
        confirmation_alert(id = sub_agent_id, url = url, title = "Sub-Agent", type = "Recover");
    }

    function OnDelete(sub_agent_id) {
        // var sub_agent_id = $("#sub_agent_id").text();
        var url = "<?php echo $base_url; ?>master/sub_agent/remove_sub_agent";
        confirmation_alert(id = sub_agent_id, url = url, title = "Sub-Agent", type = "Delet");
    }

    function onView(val) {
        // clearError();
        $('#view_form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/sub_agent/edit_sub_agent";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    sub_agent_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    $("#sub_agent_name_det").text(data["userdata"].sub_agent_name);
                    $("#sub_agent_code_det").text(data["userdata"].sub_agent_code);
                    $("#mobile_1_det").text(data["userdata"].contact_1);
                    $("#mobile_2_det").text(data["userdata"].contact_2);
                    $("#email_det").text(data["userdata"].email);
                    $("#login_our_site_det").text(data["userdata"].login_our_site);
                    $("#less_income_tax_det").text(data["userdata"].less_income_tax);
                    $("#commission_percentage_det").text(data["userdata"].commission_percentage);
                    $("#address_det").text(data["userdata"].address);

                    var sub_agent_id = data["userdata"].sub_agent_id;
                    var sub_agent_profile = data["userdata"].sub_agent_profile;
                    if (sub_agent_profile == "" || sub_agent_profile == null || sub_agent_profile == undefined) {
                        var view_sub_agent_profile = "";
                        var download_sub_agent_profile = "";
                        var delete_sub_agent_profile = "";
                        $("#sub_agent_profile_view_det").hide();
                    } else if (sub_agent_profile != "") {
                        $("#sub_agent_profile_view_det").show();
                        // alert(sub_agent_profile);
                        var view_sub_agent_profile = "<a href='<?php echo base_url(); ?>master/sub_agent/view_doc/1/" + sub_agent_id + "/" + sub_agent_profile + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        var download_sub_agent_profile = "<a href='<?php echo base_url(); ?>master/sub_agent/download_doc/1/" + sub_agent_id + "/" + sub_agent_profile + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        var delete_sub_agent_profile = "<a onclick=OnDelete_Doc('" + sub_agent_id + ',' + 1 + ',' + sub_agent_profile + ',' + '<?php echo base_url(); ?>master/sub_agent/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";

                    }
                    $("#sub_agent_profile_view_det").html(view_sub_agent_profile + "&nbsp;&nbsp;&nbsp;&nbsp;" + download_sub_agent_profile + "&nbsp;&nbsp;&nbsp;&nbsp;" + delete_sub_agent_profile);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function onEdit(val) {
        clearError();
        $("#sub_agent_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();
        $('#form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/sub_agent/edit_sub_agent";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    sub_agent_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    // var myObj = JSON.parse(data);
                    $("#sub_agent_id").text(data["userdata"].sub_agent_id);
                    $("#sub_agent_name").val(data["userdata"].sub_agent_name);
                    $("#sub_agent_code").val(data["userdata"].sub_agent_code);
                    $("#mobile_1").val(data["userdata"].contact_1);
                    $("#mobile_2").val(data["userdata"].contact_2);
                    $("#email").val(data["userdata"].email);
                    $("#login_our_site").val(data["userdata"].login_our_site);
                    $("#less_income_tax").val(data["userdata"].less_income_tax);
                    $("#commission_percentage").val(data["userdata"].commission_percentage);
                    $("#address").val(data["userdata"].address);

                    var sub_agent_id = data["userdata"].sub_agent_id;
                    var sub_agent_profile = data["userdata"].sub_agent_profile;
                    if (sub_agent_profile == "" || sub_agent_profile == null || sub_agent_profile == undefined) {
                        var view_sub_agent_profile = "";
                        var download_sub_agent_profile = "";
                        var delete_sub_agent_profile = "";
                        $("#sub_agent_profile_det").hide();
                    } else if (sub_agent_profile != "") {
                        $("#sub_agent_profile_det").show();
                        // alert(sub_agent_profile);
                        var view_sub_agent_profile = "<a href='<?php echo base_url(); ?>master/sub_agent/view_doc/1/" + sub_agent_id + "/" + sub_agent_profile + "'  class='text-info'  target='_blank'><b><i class='mdi mdi-eye mdi-18'></i></b></a>";
                        var download_sub_agent_profile = "<a href='<?php echo base_url(); ?>master/sub_agent/download_doc/1/" + sub_agent_id + "/" + sub_agent_profile + "'  class='text-success'><b><i class='mdi mdi-cloud-download-outline mdi-18'></i></b></a>";
                        var delete_sub_agent_profile = "<a onclick=OnDelete_Doc('" + sub_agent_id + ',' + 1 + ',' + sub_agent_profile + ',' + '<?php echo base_url(); ?>master/sub_agent/delete_doc' + "') href='javascript:void(0);' class='text-danger'><b><i class='mdi mdi-delete-empty mdi-18'></i></b></a>";

                    }
                    $("#sub_agent_profile_det").html(view_sub_agent_profile + "  " + download_sub_agent_profile + "  " + delete_sub_agent_profile);

                    var isActive = data["userdata"].del_flag;

                    if (isActive == 0) {
                        $("#recover").show();
                        $("#update").hide();
                        $("#delete").hide();
                    } else {
                        $("#recover").hide();
                        $("#update").show();
                        $("#delete").show();
                    }
                    document.getElementById("update").disabled = true;

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function onUpdate() {
        var sub_agent_id = $("#sub_agent_id").text();
        var sub_agent_name = $("#sub_agent_name").val();
        var sub_agent_code = $("#sub_agent_code").val();
        // var sub_agent_counter = $("#sub_agent_counter").val();
        var mobile_1 = $("#mobile_1").val();
        var mobile_2 = $("#mobile_2").val();
        var email = $("#email").val();
        var login_our_site = $("#login_our_site").val();
        var less_income_tax = $("#less_income_tax").val();
        var commission_percentage = $("#commission_percentage").val();
        var address = $("#address").val();
        var sub_agent_profile = $('#sub_agent_profile').prop('files')[0];

        var form_data = new FormData();
        form_data.append('sub_agent_id', sub_agent_id);
        form_data.append('sub_agent_name', sub_agent_name);
        form_data.append('sub_agent_code', sub_agent_code);
        form_data.append('mobile_1', mobile_1);
        form_data.append('mobile_2', mobile_2);
        form_data.append('email', email);
        form_data.append('login_our_site', login_our_site);
        form_data.append('less_income_tax', less_income_tax);
        form_data.append('commission_percentage', commission_percentage);
        form_data.append('address', address);
        form_data.append('sub_agent_profile', sub_agent_profile);

        var url = "<?php echo $base_url; ?>master/sub_agent/update_sub_agent";

        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            // data: {
            //     sub_agent_id: sub_agent_id,
            //     sub_agent_name: sub_agent_name,
            //     sub_agent_code: sub_agent_code,
            //     mobile_1: mobile_1,
            //     mobile_2: mobile_2,
            //     email: email,
            //     login_our_site: login_our_site,
            //     less_income_tax: less_income_tax,
            //     commission_percentage: commission_percentage,
            //     address: address,
            // },
            dataType: 'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {

            },
            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#sub_agent_name").val("");
                    $("#sub_agent_name").removeClass("parsley-error");
                    $("#sub_agent_code").val("");
                    $("#sub_agent_code").removeClass("parsley-error");
                    $("#mobile_1").val("");
                    $("#mobile_1").removeClass("parsley-error");
                    $("#mobile_2").val("");
                    $("#mobile_2").removeClass("parsley-error");
                    $("#email").val("");
                    $("#email").removeClass("parsley-error");
                    $("#login_our_site").val("");
                    $("#login_our_site").removeClass("parsley-error");
                    $("#less_income_tax").val("");
                    $("#less_income_tax").removeClass("parsley-error");
                    $("#commission_percentage").val("");
                    $("#commission_percentage").removeClass("parsley-error");
                    $("#address").val("");
                    $("#address").removeClass("parsley-error");
                    $("#sub_agent_profile").val("");
                    $("#sub_agent_profile").removeClass("parsley-error");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["message"]["sub_agent_name_err"] != "")
                        $("#sub_agent_name").addClass("parsley-error");
                    else
                        $("#sub_agent_name").removeClass("parsley-error");
                    $("#sub_agent_name_err").addClass("text-danger").html(data["message"]["sub_agent_name_err"]);

                    if (data["message"]["sub_agent_code_err"] != "")
                        $("#sub_agent_code").addClass("parsley-error");
                    else
                        $("#sub_agent_code").removeClass("parsley-error");
                    $("#sub_agent_code_err").addClass("text-danger").html(data["message"]["sub_agent_code_err"]);

                    if (data["message"]["mobile_1_err"] != "")
                        $("#mobile_1").addClass("parsley-error");
                    else
                        $("#mobile_1").removeClass("parsley-error");
                    $("#mobile_1_err").addClass("text-danger").html(data["message"]["mobile_1_err"]);

                    if (data["message"]["mobile_2_err"] != "")
                        $("#mobile_2").addClass("parsley-error");
                    else
                        $("#mobile_2").removeClass("parsley-error");
                    $("#mobile_2_err").addClass("text-danger").html(data["message"]["mobile_2_err"]);

                    if (data["message"]["email_err"] != "")
                        $("#email").addClass("parsley-error");
                    else
                        $("#email").removeClass("parsley-error");
                    $("#email_err").addClass("text-danger").html(data["message"]["email_err"]);

                    if (data["message"]["login_our_site_err"] != "")
                        $("#login_our_site").addClass("parsley-error");
                    else
                        $("#login_our_site").removeClass("parsley-error");
                    $("#login_our_site_err").addClass("text-danger").html(data["message"]["login_our_site_err"]);

                    if (data["message"]["less_income_tax_err"] != "")
                        $("#less_income_tax").addClass("parsley-error");
                    else
                        $("#less_income_tax").removeClass("parsley-error");
                    $("#less_income_tax_err").addClass("text-danger").html(data["message"]["less_income_tax_err"]);

                    if (data["message"]["commission_percentage_err"] != "")
                        $("#commission_percentage").addClass("parsley-error");
                    else
                        $("#commission_percentage").removeClass("parsley-error");
                    $("#commission_percentage_err").addClass("text-danger").html(data["message"]["commission_percentage_err"]);

                    if (data["message"]["address_err"] != "")
                        $("#address").addClass("parsley-error");
                    else
                        $("#address").removeClass("parsley-error");
                    $("#address_err").addClass("text-danger").html(data["message"]["address_err"]);

                    if (data["message"]["sub_agent_profile_err"] != "")
                        $("#sub_agent_profile").addClass("parsley-error");
                    else
                        $("#sub_agent_profile").removeClass("parsley-error");
                    $("#sub_agent_profile_err").addClass("text-danger").html(data["message"]["sub_agent_profile_err"]);
                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    $("#submit").click(function() {
        var sub_agent_name = $("#sub_agent_name").val();
        var sub_agent_code = $("#sub_agent_code").val();
        var sub_agent_counter = $("#sub_agent_counter").val();
        var mobile_1 = $("#mobile_1").val();
        var mobile_2 = $("#mobile_2").val();
        var email = $("#email").val();
        var login_our_site = $("#login_our_site").val();
        var less_income_tax = $("#less_income_tax").val();
        var commission_percentage = $("#commission_percentage").val();
        var address = $("#address").val();
        var sub_agent_profile = $('#sub_agent_profile').prop('files')[0];

        var form_data = new FormData();
        form_data.append('sub_agent_name', sub_agent_name);
        form_data.append('sub_agent_code', sub_agent_code);
        form_data.append('sub_agent_counter', sub_agent_counter);
        form_data.append('mobile_1', mobile_1);
        form_data.append('mobile_2', mobile_2);
        form_data.append('email', email);
        form_data.append('login_our_site', login_our_site);
        form_data.append('less_income_tax', less_income_tax);
        form_data.append('commission_percentage', commission_percentage);
        form_data.append('address', address);
        form_data.append('sub_agent_profile', sub_agent_profile);

        var url = "<?php echo $base_url; ?>master/sub_agent/add_Sub_agent";

        $.ajax({
            url: url,
            data: form_data,
            // data: {
            //     sub_agent_name: sub_agent_name,
            //     sub_agent_code: sub_agent_code,
            //     mobile_1: mobile_1,
            //     mobile_2: mobile_2,
            //     email: email,
            //     login_our_site: login_our_site,
            //     less_income_tax: less_income_tax,
            //     commission_percentage: commission_percentage,
            //     sub_agent_counter: sub_agent_counter,
            //     address: address,
            // },
            type: 'POST',
            dataType: 'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {

            },

            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#sub_agent_name").val("");
                    $("#sub_agent_name").removeClass("parsley-error");
                    $("#sub_agent_code").val("");
                    $("#sub_agent_code").removeClass("parsley-error");
                    $("#mobile_1").val("");
                    $("#mobile_1").removeClass("parsley-error");
                    $("#mobile_2").val("");
                    $("#mobile_2").removeClass("parsley-error");
                    $("#email").val("");
                    $("#email").removeClass("parsley-error");
                    $("#login_our_site").val("");
                    $("#login_our_site").removeClass("parsley-error");
                    $("#less_income_tax").val("");
                    $("#less_income_tax").removeClass("parsley-error");
                    $("#commission_percentage").val("");
                    $("#commission_percentage").removeClass("parsley-error");
                    $("#address").val("");
                    $("#address").removeClass("parsley-error");
                    $("#sub_agent_profile").val("");
                    $("#sub_agent_profile").removeClass("parsley-error");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["message"]["sub_agent_name_err"] != "")
                        $("#sub_agent_name").addClass("parsley-error");
                    else
                        $("#sub_agent_name").removeClass("parsley-error");
                    $("#sub_agent_name_err").addClass("text-danger").html(data["message"]["sub_agent_name_err"]);

                    if (data["message"]["sub_agent_code_err"] != "")
                        $("#sub_agent_code").addClass("parsley-error");
                    else
                        $("#sub_agent_code").removeClass("parsley-error");
                    $("#sub_agent_code_err").addClass("text-danger").html(data["message"]["sub_agent_code_err"]);

                    if (data["message"]["mobile_1_err"] != "")
                        $("#mobile_1").addClass("parsley-error");
                    else
                        $("#mobile_1").removeClass("parsley-error");
                    $("#mobile_1_err").addClass("text-danger").html(data["message"]["mobile_1_err"]);

                    if (data["message"]["mobile_2_err"] != "")
                        $("#mobile_2").addClass("parsley-error");
                    else
                        $("#mobile_2").removeClass("parsley-error");
                    $("#mobile_2_err").addClass("text-danger").html(data["message"]["mobile_2_err"]);

                    if (data["message"]["email_err"] != "")
                        $("#email").addClass("parsley-error");
                    else
                        $("#email").removeClass("parsley-error");
                    $("#email_err").addClass("text-danger").html(data["message"]["email_err"]);

                    if (data["message"]["login_our_site_err"] != "")
                        $("#login_our_site").addClass("parsley-error");
                    else
                        $("#login_our_site").removeClass("parsley-error");
                    $("#login_our_site_err").addClass("text-danger").html(data["message"]["login_our_site_err"]);

                    if (data["message"]["less_income_tax_err"] != "")
                        $("#less_income_tax").addClass("parsley-error");
                    else
                        $("#less_income_tax").removeClass("parsley-error");
                    $("#less_income_tax_err").addClass("text-danger").html(data["message"]["less_income_tax_err"]);

                    if (data["message"]["commission_percentage_err"] != "")
                        $("#commission_percentage").addClass("parsley-error");
                    else
                        $("#commission_percentage").removeClass("parsley-error");
                    $("#commission_percentage_err").addClass("text-danger").html(data["message"]["commission_percentage_err"]);

                    if (data["message"]["address_err"] != "")
                        $("#address").addClass("parsley-error");
                    else
                        $("#address").removeClass("parsley-error");
                    $("#address_err").addClass("text-danger").html(data["message"]["address_err"]);

                    if (data["message"]["sub_agent_profile_err"] != "")
                        $("#sub_agent_profile").addClass("parsley-error");
                    else
                        $("#sub_agent_profile").removeClass("parsley-error");
                    $("#sub_agent_profile_err").addClass("text-danger").html(data["message"]["sub_agent_profile_err"]);
                }

            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    });

    function encryption_decryption(string) {

        var enc = window.btoa(string);
        return enc;

        // var str = "Hello World!";
        // var enc = window.btoa(str);
        // var dec = window.atob(enc);

        // var res = "Encoded String: " + enc + "<br>" + "Decoded String: " + dec;
        // document.getElementById("demo").innerHTML = res;
    }

    function first_letter_capital(string) {
        string = string.toLowerCase().replace(/\b[a-z]/g, function(letter) {
            return letter.toUpperCase();
        });
    }

    function Filter_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-secondary waves-effect btn-xs mr-4").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-danger waves-effect btn-xs mr-4").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter On');
        $('#filter_form_modal').modal('toggle');
        var filter_sub_agent_name = $("#filter_sub_agent_name").val();
        var filter_sub_agent_code = $("#filter_sub_agent_code").val();
        var filter_mobile_1 = $("#filter_mobile_1").val();
        var filter_mobile_2 = $("#filter_mobile_2").val();
        var filter_email = $("#filter_email").val();
        var filter_status = $("#filter_status").val();
        // var my_arr = encryption_decryption([
        //     {'filter_sub_agent_name':filter_sub_agent_name},
        //     {'filter_sub_agent_code':filter_sub_agent_code},
        //     {'filter_mobile_1':filter_mobile_1},
        // ]);
        if (filter_status == "null")
            filter_status = "";
        var url = "<?php echo $base_url; ?>master/sub_agent/filter_sub_agent_list";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_sub_agent_name: filter_sub_agent_name,
                    filter_sub_agent_code: filter_sub_agent_code,
                    filter_mobile_1: filter_mobile_1,
                    filter_mobile_2: filter_mobile_2,
                    filter_email: filter_email,
                    filter_status: filter_status,
                    // my_arr:my_arr,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var total_sub_agent_data = 0;
                    $("#total_sub_agent_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var sub_agent_id = "";
                        var sub_agent_name = "";
                        var sub_agent_code = "";
                        var contact_1 = "";
                        var contact_2 = "";
                        var email = "";
                        var login_our_site = "";
                        var less_income_tax = "";
                        var commission_percentage = "";
                        var sub_agent_status = "";
                        var datas = "";
                        var status = "";
                        total_sub_agent_data = data["total_sub_agent_data"];
                        $("#total_sub_agent_data").text(" Count ( " + total_sub_agent_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            sub_agent_id = parseInt(data[key].sub_agent_id);
                            sub_agent_name = data[key].sub_agent_name;
                            sub_agent_code = data[key].sub_agent_code;
                            contact_1 = data[key].contact_1;
                            contact_2 = data[key].contact_2;
                            email = data[key].email;
                            login_our_site = data[key].login_our_site;
                            login_our_site = (login_our_site + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + "<br/>" + '$2');
                            less_income_tax = data[key].less_income_tax;
                            commission_percentage = data[key].commission_percentage;
                            sub_agent_status = data[key].sub_agent_status;
                            var isActive = data[key].del_flag;
                            if (!isNaN(sub_agent_id)) {
                                if (sub_agent_status == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light  btn-sm edit";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light  btn-sm edit";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }

                                if (isActive == 1) {
                                    var del_status = "No";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + sub_agent_id + ")'><b>Delete</b></a>";
                                    // var delete_btn_txt = "<button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + sub_agent_id + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + sub_agent_id + ")'><b>Recover</b></a>";
                                    // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + sub_agent_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                                }
                                var view_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view' id='view' value='' type='button' onClick ='onView(" + sub_agent_id + ")' >View</button>";
                                edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm edit' id='edit' value='' type='button' onClick ='onEdit(" + sub_agent_id + ")' >Edit</button>";
                                status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + sub_agent_id + "' value='' type='button' onClick ='updateStatus(" + sub_agent_id + "," + sub_agent_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + sub_agent_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + sub_agent_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + sub_agent_id + "' href='javascript:void(0);' id='status_btn_" + sub_agent_id + "' onClick ='updateStatus(" + sub_agent_id + "," + sub_agent_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td> <td><center>' + sub_agent_name + '</center></td><td>' + sub_agent_code + '</td><td>' + contact_1 + '</td><td>' + contact_2 + '</td><td>' + email + '</td><td>' + login_our_site + '</td><td>' + less_income_tax + '</td><td>' + commission_percentage + '</td> <td>' + del_status + '</td></tr>';
                            }
                        });

                    } else {
                        $("#total_sub_agent_data").text(" Count ( " + total_sub_agent_data + " ) ");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="11"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {}
            });
        }
    }

    function Reset_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-danger waves-effect btn-xs mr-4").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-secondary waves-effect btn-xs mr-4").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter Off');
        $('#filter_form_modal').modal('toggle');
        $("#filter_sub_agent_name").val("");
        $("#filter_sub_agent_code").val("");
        $("#filter_mobile_1").val("");
        $("#filter_mobile_2").val("");
        $("#filter_email").val("");
        $("#filter_status").val("null");
        getSubAgentList();
    }
    getSubAgentList();

    function getSubAgentList() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/sub_agent/get_sub_agent_list";
        if (url != "") {
            $.ajax({
                url: url,
                data: {},
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {
                    var total_sub_agent_data = 0;
                    $("#total_sub_agent_data").text("");
                    $("#tableData").empty();
                    if (data["status"] == true) {
                        var edit_btn = "";
                        var status_btn = "";
                        var sub_agent_id = "";
                        var sub_agent_name = "";
                        var sub_agent_code = "";
                        var contact_1 = "";
                        var contact_2 = "";
                        var email = "";
                        var login_our_site = "";
                        var less_income_tax = "";
                        var commission_percentage = "";
                        var sub_agent_status = "";
                        var datas = "";
                        var status = "";
                        total_sub_agent_data = data["total_sub_agent_data"];
                        $("#total_sub_agent_data").text(" Count ( " + total_sub_agent_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            sub_agent_id = parseInt(data[key].sub_agent_id);
                            sub_agent_name = data[key].sub_agent_name;
                            sub_agent_code = data[key].sub_agent_code;
                            contact_1 = data[key].contact_1;
                            contact_2 = data[key].contact_2;
                            email = data[key].email;
                            login_our_site = data[key].login_our_site;
                            login_our_site = (login_our_site + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + "<br/>" + '$2');
                            less_income_tax = data[key].less_income_tax;
                            commission_percentage = data[key].commission_percentage;
                            sub_agent_status = data[key].sub_agent_status;
                            var isActive = data[key].del_flag;
                            if (!isNaN(sub_agent_id)) {
                                if (sub_agent_status == 1) {
                                    status = "Active";
                                    var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light  btn-sm edit";
                                    badge_status = '<span class="badge badge-success pl-2"> Active</span>';
                                } else {
                                    status = "In-Active";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light  btn-sm edit";
                                    badge_status = '<span class="badge badge-danger pl-2"> In-Active</span>';
                                }

                                if (isActive == 1) {
                                    var del_status = "No";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + sub_agent_id + ")'><b>Delete</b></a>";
                                    // var delete_btn_txt = "<button class='btn btn-info waves-effect width-md waves-light btn-sm delete' value='' type='button' onClick ='OnDelete(" + sub_agent_id + ")' >Delete</button>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + sub_agent_id + ")'><b>Recover</b></a>";
                                    // var delete_btn_txt = "<button id='recover' onclick='OnRecover(" + sub_agent_id + ")' class='btn btn-info waves-effect width-md waves-light btn-sm delete'>Recover</button>";
                                }
                                var view_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm mt-1 view' id='view' value='' type='button' onClick ='onView(" + sub_agent_id + ")' >View</button>";
                                edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm edit' id='edit' value='' type='button' onClick ='onEdit(" + sub_agent_id + ")' >Edit</button>";
                                status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + sub_agent_id + "' value='' type='button' onClick ='updateStatus(" + sub_agent_id + "," + sub_agent_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + sub_agent_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + sub_agent_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + sub_agent_id + "' href='javascript:void(0);' id='status_btn_" + sub_agent_id + "' onClick ='updateStatus(" + sub_agent_id + "," + sub_agent_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td> <td><center>' + sub_agent_name + '</center></td><td>' + sub_agent_code + '</td><td>' + contact_1 + '</td><td>' + contact_2 + '</td><td>' + email + '</td><td>' + login_our_site + '</td><td>' + less_income_tax + '</td><td>' + commission_percentage + '</td> <td>' + del_status + '</td></tr>';
                            }
                        });

                    } else {
                        $("#total_sub_agent_data").text(" Count ( " + total_sub_agent_data + " ) ");
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="11"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function updateStatus(sub_agent_id, sub_agent_status) {

        var url = "<?php echo $base_url; ?>master/sub_agent/update_sub_agent_status";

        if (sub_agent_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": sub_agent_id,
                    "status": sub_agent_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + sub_agent_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["sub_agent_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                            $("#edit_" + sub_agent_id).addClass(status_btn_txt);
                            $("#status_btn_" + sub_agent_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                            $("#edit_" + sub_agent_id).addClass(status_btn_txt);
                            $("#status_btn_" + sub_agent_id).text(status);
                        }

                        $("#status_btn_" + sub_agent_id).text(status);


                        $('#status_btn_' + sub_agent_id).attr('onClick', 'updateStatus(' + sub_agent_id + ',' + data["userdata"]["sub_agent_status"] + ')');

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
                CheckFormAccess(submenu_permission, 10, url);
                check(role_permission, 10);
            }
        }
    });
</script>