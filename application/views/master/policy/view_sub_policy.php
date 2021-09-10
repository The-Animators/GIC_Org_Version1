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
                                                <label for="company" class="col-form-label col-md-4 text-right">Company<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select namse="company" id="company" class="form-control">
                                                        <option value="null">Select Company</option>
                                                        <?php $company = company_dropdown();
                                                        if (!empty($company)) : foreach ($company as $row) : ?>
                                                                <option value="<?php echo $row["mcompany_id"]; ?>"><?php echo $row["company_name"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <span id="company_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="department" class="col-form-label col-md-4 text-right">Department<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select namse="department" id="department" class="form-control" onchange="departmentBasedPolicy()">
                                                        <option value="null">Select Department</option>
                                                        <?php $department = department_dropdown();
                                                        if (!empty($department)) : foreach ($department as $row) : ?>
                                                                <option value="<?php echo $row["department_id"]; ?>"><?php echo $row["department_name"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <span id="department_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="policy_name" class="col-form-label col-md-4 text-right">Policy Name<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select namse="policy_name" id="policy_name" class="form-control">
                                                        <option value="null">Select Policy Name</option>
                                                        <?php $policy_name = policy_type_dropdown();
                                                        if (!empty($policy_name)) : foreach ($policy_name as $row) : ?>
                                                                <option value="<?php echo $row["policy_type_id"]; ?>"><?php echo $row["policy_type"]; ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                    <span id="policy_name_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="policy_type" class="col-form-label col-md-4 text-right">Policy Type<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select namse="policy_type" id="policy_type" class="form-control" onchange="Policy_Type()">
                                                        <option value="null">Select Policy Type</option>
                                                        <option value="1">Individual</option>
                                                        <option value="2">Floater</option>
                                                        <option value="3">Residential & Commercial</option>
                                                        <option value="4">Common Individual</option>
                                                        <option value="5">Common Floater</option>
                                                    </select>
                                                    <span id="policy_type_err"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <label for="sub_policy_name" class="col-form-label col-md-2 text-right">Sub Policy Name :<span class="text-danger">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="sub_policy_name" id="sub_policy_name" class="form-control sub_policy_name" placeholder="Enter Sub Policy Name">
                                                    <span id="sub_policy_name_err"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row" id="policy_type_div" style="display:none;">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="family_size" class="col-form-label col-md-4 text-right">Family Size :<span class="text-danger">*</span></label>
                                                <div class="col-md-2">
                                                    <div class="custom-control custom-radio col-form-label ">
                                                        <input type="radio" id="family_size_yes" name="family_size_type" class="custom-control-input family_size_type" value="1" onclick="Family_Size_Type()">
                                                        <label class="custom-control-label" for="family_size_yes">Yes</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="custom-control custom-radio col-form-label ">
                                                        <input type="radio" id="family_size_no" name="family_size_type" class="custom-control-input family_size_type" value="2" onchange="Family_Size_Type()" checked="">
                                                        <label class="custom-control-label" for="family_size_no">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 mb-1" id="family_size_div" style="display:none;overflow-x:auto;">
                                            <table class="table mb-0 table-bordered" id="family_first_table">
                                                <thead>
                                                    <tr>
                                                        <th><button class="btn btn-primary btn-xs Add_Family_Size fa fa-plus" id="Add_Family_Size" onclick="AddFamilySize(0)"></button></th>
                                                        <th>Family Size</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="family_size_tbody">

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="add_of_child" class="col-form-label col-md-4 text-right">Addition of Child :<span class="text-danger">*</span></label>
                                                <div class="col-md-2">
                                                    <div class="custom-control custom-radio col-form-label ">
                                                        <input type="radio" id="add_of_child_yes" name="add_of_child_type" class="custom-control-input add_of_child_type" value="1" onclick="Addition_Of_Child_Type()">
                                                        <label class="custom-control-label" for="add_of_child_yes">Yes</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="custom-control custom-radio col-form-label ">
                                                        <input type="radio" id="add_of_child_no" name="add_of_child_type" class="custom-control-input add_of_child_type" value="2" onchange="Addition_Of_Child_Type()" checked="">
                                                        <label class="custom-control-label" for="add_of_child_no">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 mb-1" id="add_of_child_div" style="display:none;overflow-x:auto;">
                                            <table class="table mb-0 table-bordered" id="child_first_table">
                                                <thead>
                                                    <tr>
                                                        <th><button class="btn btn-primary btn-xs Addition_of_Child fa fa-plus" id="Addition_of_Child" onclick="Add_Addition_of_Child(0)"></button></th>
                                                        <th>Addition Of Child</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="add_of_child_tbody">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label id="sub_policy_name_id" hidden>1</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <center>
                                                <button id="update" onclick='onUpdate()' style="display: none;" class="btn btn-primary btn-xs">Update</button>
                                                <button id="submit" class="btn btn-primary btn-xs">Save</button>
                                                <button id="delete" onclick='OnDelete()' style="display: none;" class="btn btn-primary btn-xs">Delete</button>
                                                <button id="recover" onclick='OnRecover()' style="display: none;" class="btn btn-primary btn-xs">Recover</button>
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
                                <div class="col-md-12">

                                    <div class="form-row">

                                        <div class="col-md-6">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="20%">Company : </td>
                                                        <td><span class='text-orange' id="company_det"></span> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="30%">Department : </td>
                                                        <td><span class='text-orange' id="department_det"></span> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="30%">Policy Name : </td>
                                                        <td><span class='text-orange' id="policy_name_det"></span> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="30%">Policy Type : </td>
                                                        <td><span class='text-orange' id="policy_type_det"></span> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="30%">Sub Policy : </td>
                                                        <td><span class='text-orange' id="sub_policy_name_det"></span> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                    <div class="form-row" id="policy_type_det_div" style="display:none;">
                                        <div class="col-md-3">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="40%">Family Size : </td>
                                                        <td><span class='text-orange' id="family_size_type_det"></span> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-3" id="family_size_det_div" style="display:none;overflow-x:auto;">
                                            <table class="table mb-0 table-bordered" id="family_first_table_det">
                                                <thead>
                                                    <tr>
                                                        <th>Family Size</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="family_size_det_tbody">

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td width="40%">Addition of Child :</td>
                                                        <td><span class='text-orange' id="add_of_child_type_det"></span> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-2" id="add_of_child_det_div" style="display:none;overflow-x:auto;">
                                            <table class="table mb-0 table-bordered" id="child_first_table_det">
                                                <thead>
                                                    <tr>
                                                        <th>Addition Of Child</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="add_of_child_det_tbody">

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

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">

                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="header-title"><?php echo $title; ?> List <span id="total_sub_policy_data"></span></h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <input class='btn btn-facebook btn-xs' id='AddForm' value='Add' type='button' />
                                <button type="submit" id="filter_btn" class="btn btn-outline-secondary waves-effect btn-xs"><b><i class="mdi mdi-magnify"></i>&nbsp;Filter Off</b></button>
                                <a href="<?php echo base_url(); ?>master/sub_policy/" class="btn btn-secondary waves-effect btn-xs">Back</a>
                            </div>
                        </div>

                        <!-- <table id="datatable" class="table  table-striped table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> -->
                        <div class="table-cont">
                            <table class="commission_table fixed" id="commission_table" border="1">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>SN.</th>
                                        <th>
                                            <center>Company Name</center>
                                        </th>
                                        <th>Department</th>
                                        <th>Policy Name</th>
                                        <th>Policy Type</th>
                                        <th>Sub Policy Name</th>
                                        <th>Family Size Type</th>
                                        <th>Family Size </th>
                                        <th>Addition of Child Type</th>
                                        <th>Addition of Child</th>
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
    <div id="filter_form_modal" class="modal fade bs-example-modal-lg bs-example-modal-center" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Filter <?php echo $title; ?> Details</h4>
                </div>
                <div class="modal-body">
                    <!-- Form row -->
                    <div class="row">
                        <div class="col-md-4 row">
                            <label for="filter_company" class="col-form-label col-md-4 text-right">Company</label>
                            <div class="col-md-8">
                                <select class="form-control" data-toggle="select2" id="filter_company" name="filter_company" onchange="Filtercompany_department();FilterDepartmentBasedPolicyName();">
                                    <option value="null">Select Company</option>
                                    <?php $company = company_dropdown();
                                    if (!empty($company)) : foreach ($company as $row) : ?>
                                            <option value="<?php echo $row["mcompany_id"]; ?>"><?php echo ucwords($row["company_name"]); ?></option>
                                    <?php endforeach;
                                    endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 row">
                            <label for="filter_department" class="col-form-label col-md-4 text-right">Department</label>
                            <div class="col-md-8">
                                <select name="filter_department" id="filter_department" class="form-control" data-toggle="select2" onchange="FilterDepartmentBasedPolicyName();">
                                    <option value="null">Select Department</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 row">
                            <label for="filter_policy_name" class="col-form-label col-md-4 text-right">Policy Name</label>
                            <div class="col-md-8">
                                <select name="filter_policy_name" id="filter_policy_name" class="form-control" data-toggle="select2">
                                    <option value="null">Select Policy Name</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 row mt-1">
                            <label for="filter_policy_type" class="col-form-label col-md-4 text-right">Policy Type</label>
                            <div class="col-md-8">
                                <select namse="filter_policy_type" id="filter_policy_type" class="form-control">
                                    <option value="null">Select Policy Type</option>
                                    <option value="1">Individual</option>
                                    <option value="2">Floater</option>
                                    <option value="3">Residential & Commercial</option>
                                    <option value="4">Common Individual</option>
                                    <option value="5">Common Floater</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 row mt-1">
                            <label for="filter_sub_policy" class="col-form-label col-md-4 text-right">Sub Policy Name</label>
                            <div class="col-md-8">
                                <input type="text" name="filter_sub_policy" id="filter_sub_policy" class="form-control" placeholder="Enter Sub Policy Name">
                            </div>
                        </div>
                        <div class="col-md-4 row mt-1">
                            <label for="filter_family_size_type" class="col-form-label col-md-4 text-right">Family Size</label>
                            <div class="col-md-8">
                                <select name="filter_family_size_type" id="filter_family_size_type" class="form-control">
                                    <option value="null">Select Family Size</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 row mt-1">
                            <label for="filter_child_type" class="col-form-label col-md-4 text-right">Add. Child Type</label>
                            <div class="col-md-8">
                                <select name="filter_child_type" id="filter_child_type" class="form-control">
                                    <option value="null">Select Child Type</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 row mt-1">
                            <label for="filter_status" class="col-form-label col-md-4 text-right">Status</label>
                            <div class="col-md-8">
                                <select name="filter_status" id="filter_status" class="form-control">
                                    <option value="null">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="2">In-Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mt-1">
                            <center><button type="submit" id="search" class="btn btn-outline-secondary waves-effect width-md btn-sm mr-1" onclick="Filter_data()"><b><i class="mdi mdi-magnify"></i>Filter Off</b></button><button type="submit" id="reset" class="btn btn-outline-secondary waves-effect btn-xs" onclick="Reset_data()"><b><i class="mdi mdi-undo"></i>Reset</b></button></center>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->

<script>
    function Filtercompany_department() {
        var company = $("#filter_company").val();

        var url = "<?php echo $base_url; ?>master/policy/get_companybased_department";

        if (company != "") {
            $.ajax({
                url: url,
                data: {
                    company: company
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    if (data["status"] == true) {
                        var val = data["userdata"];
                        $('#filter_department').html("<option value='null'>Select Department</option>");
                        var option_val = "";
                        for (var i = 0; i < val.length; i++) {
                            var department_id = val[i]["department_id"];
                            var department_name = val[i]["department_name"].charAt(0).toUpperCase() + val[i]["department_name"].slice(1);
                            option_val += '<option value="' + department_id + '">' + department_name + '</option>';
                        }
                    } else {
                        $('#filter_department').html("<option value='null'>Select Department</option>");
                    }
                    $('#filter_department').append(option_val);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function FilterDepartmentBasedPolicyName() {
        var department = $("#filter_department").val();
        var company = $("#filter_company").val();

        var url = "<?php echo $base_url; ?>master/policy/get_departmentBased_policyname";

        if (department != "") {
            $.ajax({
                url: url,
                data: {
                    department: department,
                    company: company,
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    if (data["status"] == true) {
                        var val = data["userdata"];
                        $('#filter_policy_name').html("<option value='null'>Select Policy Name</option>");
                        var option_val = "";
                        for (var i = 0; i < val.length; i++) {
                            var policy_type_id = val[i]["policy_type_id"];
                            var policy_type = val[i]["policy_type"].charAt(0).toUpperCase() + val[i]["policy_type"].slice(1);
                            option_val += '<option value="' + policy_type_id + '">' + policy_type + '</option>';
                        }
                    } else {
                        $('#filter_policy_name').html("<option value='null'>Select Policy Name</option>");
                    }
                    $('#filter_policy_name').append(option_val);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function Filter_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter On');
        $('#filter_form_modal').modal('toggle');

        var filter_company = $("#filter_company").val();
        var filter_department = $("#filter_department").val();
        var filter_policy_name = $("#filter_policy_name").val();
        var filter_policy_type = $("#filter_policy_type").val();
        var filter_sub_policy = $("#filter_sub_policy").val();
        var filter_family_size_type = $("#filter_family_size_type").val();
        var filter_child_type = $("#filter_child_type").val();
        var filter_status = $("#filter_status").val();

        if (filter_company == "null")
            filter_company = "";
        if (filter_department == "null")
            filter_department = "";
        if (filter_policy_name == "null")
            filter_policy_name = "";
        if (filter_policy_type == "null")
            filter_policy_type = "";
        if (filter_family_size_type == "null")
            filter_family_size_type = "";
        if (filter_child_type == "null")
            filter_child_type = "";
        if (filter_status == "null")
            filter_status = "";
        var url = "<?php echo $base_url; ?>master/sub_policy/filter_sub_policy_name_list";

        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    filter_company: filter_company,
                    filter_department: filter_department,
                    filter_policy_name: filter_policy_name,
                    filter_policy_type: filter_policy_type,
                    filter_sub_policy: filter_sub_policy,
                    filter_family_size_type: filter_family_size_type,
                    filter_child_type: filter_child_type,
                    filter_status: filter_status,
                    company_id: '<?php echo $company_id; ?>',
                    policy_name_id: '<?php echo $policy_name_id; ?>',
                    view: '<?php echo $view; ?>',
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var total_sub_policy_data = 0;
                    $("#total_sub_policy_data").text("");
                    $("#tableData").empty();

                    if (data["status"] == true) {
                        var datas = "";
                        var total_policy = data["total_policy"];
                        total_sub_policy_data = data["total_sub_policy_data"];
                        $("#total_sub_policy_data").text(" Count ( " + total_sub_policy_data + " ) ");
                        var data = data["userdata"];
                        // alert(data.length);
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            sub_policy_name_id = parseInt(data[key].sub_policy_name_id);
                            company_id = data[key].fk_company_id;
                            company = data[key].company_name;
                            department_id = data[key].fk_department_id;
                            department = data[key].department_name;
                            policy_name_id = data[key].fk_policy_type_id;
                            policy_name = data[key].policy_name;
                            policy_type = data[key].policy_type;
                            sub_policy_name = data[key].sub_policy_name;

                            family_size_type = data[key].family_size_type;
                            add_of_child_type = data[key].add_of_child_type;

                            family_size_json = data[key].family_size_json;
                            add_of_child_json = data[key].add_of_child_json;
                            if (family_size_json == "" || family_size_json == "undefined" || family_size_json == undefined) {
                                family_size_json = [];
                            } else {
                                family_size_json = JSON.parse(family_size_json);
                            }

                            if (add_of_child_json == "" || add_of_child_json == "undefined" || add_of_child_json == undefined) {
                                add_of_child_json = "";
                            } else {
                                add_of_child_json = JSON.parse(add_of_child_json);
                            }

                            var family_size_txt = "";
                            var child_txt = "";

                            sub_policy_name_status = data[key].sub_policy_name_status;
                            var total_policy = data[key].total_policy;

                            if (family_size_json == "") {
                                family_size_txt = "";
                            } else {
                                $.each(family_size_json, function(f_key, f_val) {
                                    var family_size = family_size_json[f_key][1];
                                    if (family_size_txt == "")
                                        family_size_txt = family_size;
                                    else
                                        family_size_txt = family_size_txt + " , " + family_size;
                                });
                            }

                            if (add_of_child_json == "") {
                                child_txt = "";
                            } else {
                                $.each(add_of_child_json, function(c_key, c_val) {
                                    var add_child = add_of_child_json[c_key][1];
                                    // alert(add_child);
                                    if (child_txt == "")
                                        child_txt = add_child;
                                    else
                                        child_txt = child_txt + " , " + add_child;
                                });
                            }

                            if (family_size_type == "" || family_size_type == "Null" || family_size_type == "undefined" || family_size_type == null || family_size_type == undefined) {
                                var family_size_type_tit = '<span class="badge badge-danger pl-2">No</span>';
                            } else {
                                if (family_size_type == 1)
                                    var family_size_type_tit = '<span class="badge badge-success pl-2">Yes</span>';
                                else if (family_size_type == 2)
                                    var family_size_type_tit = '<span class="badge badge-danger pl-2">No</span>';
                            }

                            if (add_of_child_type == "" || add_of_child_type == "Null" || add_of_child_type == "undefined" || add_of_child_type == null || add_of_child_type == undefined) {
                                var add_of_child_type_tit = '<span class="badge badge-danger pl-2">No</span>';
                            } else {
                                if (add_of_child_type == 1)
                                    var add_of_child_type_tit = '<span class="badge badge-success pl-2">Yes</span>';
                                else if (add_of_child_type == 2)
                                    var add_of_child_type_tit = '<span class="badge badge-danger pl-2">No</span>';
                            }

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

                            var isActive = data[key].del_flag;
                            if (!isNaN(sub_policy_name_id)) {
                                if (sub_policy_name_status == 1) {
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
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + sub_policy_name_id + ")'><b>Delete</b></a>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + sub_policy_name_id + ")'><b>Recover</b></a>";
                                }

                                view_btn = "<a href='<?php echo base_url(); ?>master/sub_policy/view/" + company_id + "/" + policy_name_id + "' class='btn btn-facebook btn-xs mt-1 view'  id='view'><i class='fas fa-eye'></i></a>";
                                status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + sub_policy_name_id + "' value='' type='button' onClick ='updateStatus(" + sub_policy_name_id + "," + sub_policy_name_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + sub_policy_name_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + sub_policy_name_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + sub_policy_name_id + "' href='javascript:void(0);' id='status_btn_" + sub_policy_name_id + "' onClick ='updateStatus(" + sub_policy_name_id + "," + sub_policy_name_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td> <td><center>' + company + '</center></td><td>' + department + '</td><td>' + policy_name + '</td><td>' + policy_type_tit + '</td><td>' + sub_policy_name + '</td><td>' + family_size_type_tit + '</td><td>' + family_size_txt + '</td><td>' + add_of_child_type_tit + '</td><td>' + child_txt + '</td></tr>';
                            }
                        });

                    } else {
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="10"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);

                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    function Reset_data() {
        $("#search,#filter_btn").removeClass("btn btn-outline-danger waves-effect btn-xs mr-2").html('');
        $("#search,#filter_btn").addClass("btn btn-outline-secondary waves-effect btn-xs mr-2").html('<i class="mdi mdi-magnify"></i>&nbsp;Filter Off');
        $('#filter_form_modal').modal('toggle');

        $("#filter_company").val("null");
        $("#filter_department").val("null");
        $("#filter_policy_name").val("null");
        $("#filter_policy_type").val("null");
        $("#filter_sub_policy").val("");
        $("#filter_family_size_type").val("null");
        $("#filter_child_type").val("null");
        $("#filter_status").val("null");

        $("#filter_company").prop('selectedIndex', 0);
        $("#filter_department").prop('selectedIndex', 0);
        $("#filter_policy_name").prop('selectedIndex', 0);
        $("#filter_policy_type").prop('selectedIndex', 0);
        $("#filter_family_size_type").prop('selectedIndex', 0);
        $("#filter_child_type").prop('selectedIndex', 0);
        $("#filter_status").prop('selectedIndex', 0);

        getSub_Policy_Count_List();
    }
    $("#filter_btn").click(function() {
        $('#filter_form_modal').modal('toggle');
    });
    var add_family_counter = 0;
    var add_child_counter = 0;
    var main_family_Arr = [];
    var main_Add_Child_Arr = [];
    var actual_Family_Size_data = [];
    var actual_Child_data = [];

    function Total_Family_Size() {
        actual_Family_Size_data = [];

        $("#family_first_table tr:has(.family_size)").each(function(key, val) {
            var family_size = $(".family_size", this).val();

            actual_Family_Size_data.push([key, family_size]);
            if (family_size == '')
                actual_Family_Size_data.splice(key, 1);
        });
        return actual_Family_Size_data;
    }

    function Total_Child() {
        actual_Child_data = [];

        $("#child_first_table tr:has(.add_of_child)").each(function(key, val) {
            var add_of_child = $(".add_of_child", this).val();

            actual_Child_data.push([key, add_of_child]);
            if (add_of_child == '')
                actual_Child_data.splice(key, 1);
        });
        return actual_Child_data;
    }

    function remove_FamilySize(add_family_counter) {
        $("#remove_family_size_" + add_family_counter).closest("tr").remove();
        var indexValue = main_family_Arr.indexOf(add_family_counter);
        main_family_Arr.splice(indexValue, 1);
        if (main_family_Arr.length == 0) {
            add_family_counter = 0;
            main_family_Arr = [];
            $("#Add_Family_Size").attr("onClick", "AddFamilySize(" + add_family_counter + ")");
        }
    }

    function AddFamilySize(add_family_counter) {
        main_family_Arr.push(add_family_counter);
        var tr_table = '<tr><td><button class="btn btn-danger btn-xs fa fa-trash remove_family_size" id="remove_family_size_' + add_family_counter + '" onClick=remove_FamilySize(' + add_family_counter + ') ></td><td><input type="text" name="family_size" id="family_size_' + add_family_counter + '" class="form-control family_size" placeholder="Enter Family Size"></td> </tr>';
        $("#family_size_tbody").append(tr_table);
        add_family_counter = add_family_counter + 1;
        $("#Add_Family_Size").attr("onClick", "AddFamilySize(" + add_family_counter + ")");
    }

    function remove_Addition_of_Child(add_child_counter) {
        $("#remove_add_of_child_" + add_child_counter).closest("tr").remove();
        var indexValue = main_Add_Child_Arr.indexOf(add_child_counter);
        main_Add_Child_Arr.splice(indexValue, 1);
        if (main_Add_Child_Arr.length == 0) {
            add_child_counter = 0;
            main_Add_Child_Arr = [];
            $("#Addition_of_Child").attr("onClick", "Add_Addition_of_Child(" + add_child_counter + ")");
        }
    }

    function Add_Addition_of_Child(add_child_counter) {
        main_Add_Child_Arr.push(add_child_counter);
        var tr_table = '<tr><td><button class="btn btn-danger btn-xs fa fa-trash remove_add_of_child" id="remove_add_of_child_' + add_child_counter + '" onClick=remove_Addition_of_Child(' + add_child_counter + ') ></td><td><input type="text" name="add_of_child" id="add_of_child_' + add_child_counter + '" class="form-control add_of_child" placeholder="Enter Addition Of Child"></td> </tr>';
        $("#add_of_child_tbody").append(tr_table);
        add_child_counter = add_child_counter + 1;
        $("#Addition_of_Child").attr("onClick", "Add_Addition_of_Child(" + add_child_counter + ")");
    }

    function Family_Size_Type(family_size_type_old) {
        // alert(family_size_type_old);
        // input[name='username']family_size_type
        if (family_size_type_old == "" || family_size_type_old == undefined || family_size_type_old == "undefined" || family_size_type_old == null || family_size_type_old == "null")
            var family_size_type = $("input[name='family_size_type']:checked").val();
        else
            var family_size_type = family_size_type_old;

        // alert(family_size_type);
        if (family_size_type == 1) {
            $("#family_size_div").show();
        } else if (family_size_type == 2) {
            $("#family_size_div").hide();
        }
    }

    function Addition_Of_Child_Type(add_of_child_type_old, add_of_child_json) {
        // alert(add_of_child_type_old);
        // input[name='username']add_of_child_type
        if (add_of_child_type_old == "" || add_of_child_type_old == undefined || add_of_child_type_old == "undefined" || add_of_child_type_old == null || add_of_child_type_old == "null")
            var add_of_child_type = $("input[name='add_of_child_type']:checked").val();
        else
            var add_of_child_type = add_of_child_type_old;

        // alert(add_of_child_type);
        if (add_of_child_type == 1) {
            $("#add_of_child_div").show();
        } else if (add_of_child_type == 2) {
            $("#add_of_child_div").hide();
        }
    }

    function Policy_Type(policy_type_old) {
        if (policy_type_old == "" || policy_type_old == undefined || policy_type_old == "undefined" || policy_type_old == null || policy_type_old == "null")
            var policy_type = $("#policy_type").val();
        else
            var policy_type = policy_type_old;

        if (policy_type == 1 || policy_type == 3 || policy_type == 4) {
            $("#policy_type_div").hide();
        } else if (policy_type == 2 || policy_type == 5) {
            $("#policy_type_div").show();
        }
    }

    function departmentBasedPolicy() {
        var department = $("#department").val();
        var url = "<?php echo $base_url; ?>master/plans_policy/department_based_policy";

        if (department != "") {
            $.ajax({
                url: url,
                data: {
                    department: department
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {},
                success: function(data) {
                    var option_val = "";
                    if (data["status"] == true) {
                        var val = data["userdata"];
                        $('#policy_name').empty("");
                        option_val = '<option value="null">Select Policy Name</option>';
                        for (var i = 0; i < val.length; i++) {
                            var policy_type_id = val[i]["policy_type_id"];
                            var policy_type = val[i]["policy_type"];
                            option_val += '<option value=' + policy_type_id + '>' + policy_type + '</option>';
                        }
                    } else {
                        $('#policy_name').empty("");
                        option_val = '<option value="null">Select Policy Name</option>';
                    }
                    $('#policy_name').append(option_val);
                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                },
                complete: function(xhr, status) {

                }
            });
        }
    }

    $("#AddForm").click(function() {
        $('#form_modal').modal('toggle');
        Family_Size_Type();
        Addition_Of_Child_Type();
        uninitialize();
        clearError();
    });

    
    $('#company').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#department').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#policy_name').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#policy_type').on('change', function() {
        document.getElementById("update").disabled = false;
    });
    $('#sub_policy_name').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
        // $("input[name='family_size_type']:checked").on('change', function() {
    //     alert('Hi');
    //     document.getElementById("update").disabled = false;
    // });
    // $("input[name='add_of_child_type']:checked").on('change', function() {
    //     document.getElementById("update").disabled = false;
    // });
    $("input[type='radio']:checked").on('change', function() {
        // alert('Hi');
        document.getElementById("update").disabled = false;
    });
    $('.family_size').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('.add_of_child').on('keyup', function() {
        document.getElementById("update").disabled = false;
    });
    $('.remove_family_size').on('click', function() {
        document.getElementById("update").disabled = false;
    });
    $('.Add_Family_Size').on('click', function() {
        document.getElementById("update").disabled = false;
    });
    $('.remove_add_of_child').on('click', function() {
        document.getElementById("update").disabled = false;
    });
    $('.Addition_of_Child').on('click', function() {
        document.getElementById("update").disabled = false;
    });

    function clearError() {
        $("#company").removeClass("parsley-error");
        $("#company_err").removeClass("text-danger").text("");

        $("#department").removeClass("parsley-error");
        $("#department_err").removeClass("text-danger").text("");

        $("#policy_name").removeClass("parsley-error");
        $("#policy_name_err").removeClass("text-danger").text("");

        $("#policy_type").removeClass("parsley-error");
        $("#policy_type_err").removeClass("text-danger").text("");

        $("#sub_policy_name").removeClass("parsley-error");
        $("#sub_policy_name_err").removeClass("text-danger").text("");
    }

    function uninitialize() {
        $("#sub_policy_name_id").text("");
        $("#company").val("null");
        $("#department").val("null");
        $("#policy_name").val("null");
        $("#policy_type").val("null");
        $("#sub_policy_name").val("");
        $("#policy_type_div").hide();
        $("#family_size_div").hide();
        $("#add_of_child_div").hide();
        $("#family_size_no").prop('checked', true);
        $("#add_of_child_no").prop('checked', true);
        $("#family_size_tbody").empty();
        $("#add_of_child_tbody").empty();
        $("#update").hide();
        $("#delete").hide();
        $("#submit").show();
    }

    function OnRecover(sub_policy_name_id) {
        var url = "<?php echo $base_url; ?>master/sub_policy/recover_sub_policy_name";
        confirmation_alert(id = sub_policy_name_id, url = url, title = "Sub Policy Name", type = "Recover");
    }

    function OnDelete(sub_policy_name_id) {
        var url = "<?php echo $base_url; ?>master/sub_policy/remove_sub_policy_name";
        confirmation_alert(id = sub_policy_name_id, url = url, title = "Sub Policy Name", type = "Delet");
    }

    function onEdit(val) {
        clearError();
        uninitialize();
        $("#sub_policy_name_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();
        $('#form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/sub_policy/edit_sub_policy_name";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    sub_policy_name_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {

                    var sub_policy_name_id = data["userdata"].sub_policy_name_id;
                    var company = data["userdata"].fk_company_id;
                    var department = data["userdata"].fk_department_id;
                    var policy_name = data["userdata"].fk_policy_type_id;
                    var policy_type = data["userdata"].policy_type;
                    var sub_policy_name = data["userdata"].sub_policy_name;

                    var family_size_type = data["userdata"].family_size_type;
                    var add_of_child_type = data["userdata"].add_of_child_type;
                    var family_size_json = data["userdata"].family_size_json;
                    var add_of_child_json = data["userdata"].add_of_child_json;
                    // alert(sub_policy_name_id);
                    $("#sub_policy_name_id").text(sub_policy_name_id);
                    $("#company").val(company);
                    $("#department").val(department);
                    $("#policy_name").val(policy_name);
                    $("#policy_type").val(policy_type);
                    $("#sub_policy_name").val(sub_policy_name);
                    // alert(family_size_type);
                    Policy_Type(policy_type);

                    var family_size_type_flag = false;
                    var family_size_id = '';
                    if (family_size_type == 1) {
                        $("#family_size_div").show();
                        main_family_Arr = [];
                        $("#family_size_tbody").empty();
                        var tr_table = '';
                        family_size_type_flag = true;
                        family_size_id = 'family_size_yes';
                        var family_size_json = JSON.parse(data["userdata"].family_size_json);
                        var index = "";
                        family_size_json_length = family_size_json.length;
                        $.each(family_size_json, function(key, val) {
                            add_family_counter = key;
                            main_family_Arr.push(add_family_counter);
                            index = family_size_json[key][0];
                            var family_size_txt = family_size_json[key][1];
                            tr_table += '<tr><td><button class="btn btn-danger btn-xs fa fa-trash remove_family_size" id="remove_family_size_' + add_family_counter + '" onClick=remove_FamilySize(' + add_family_counter + ') ></td><td><input type="text" name="family_size" id="family_size_' + add_family_counter + '" class="form-control family_size" placeholder="Enter Family Size" value="' + family_size_txt + '"></td> </tr>';
                        });
                        $("#family_size_tbody").append(tr_table);
                        $("#Add_Family_Size").attr("onClick", "AddFamilySize(" + family_size_json_length + ")");
                    } else if (family_size_type == 2) {
                        $("#family_size_div").hide();
                        main_family_Arr = [];
                        $("#family_size_tbody").empty();
                        family_size_type_flag = true;
                        family_size_id = 'family_size_no';
                    }

                    var add_of_child_type_flag = false;
                    var add_of_child_type_id = '';
                    if (add_of_child_type == 1) {
                        $("#add_of_child_div").show();
                        main_Add_Child_Arr = [];
                        $("#add_of_child_tbody").empty();
                        var tr_table = '';
                        add_of_child_type_flag = true;
                        add_of_child_type_id = 'add_of_child_yes';
                        var add_of_child_json = JSON.parse(data["userdata"].add_of_child_json);
                        var index = "";
                        add_of_child_json_length = add_of_child_json.length;
                        $.each(add_of_child_json, function(key, val) {
                            add_child_counter = key;
                            main_Add_Child_Arr.push(add_child_counter);
                            index = add_of_child_json[key][0];
                            var add_child_txt = add_of_child_json[key][1];
                            tr_table += '<tr><td><button class="btn btn-danger btn-xs fa fa-trash remove_add_of_child" id="remove_add_of_child_' + add_child_counter + '" onClick=remove_Addition_of_Child(' + add_child_counter + ') ></td><td><input type="text" name="add_of_child" id="add_of_child_' + add_child_counter + '" class="form-control add_of_child" placeholder="Enter Addition Of Child" value="' + add_child_txt + '"></td> </tr>';
                        });
                        $("#add_of_child_tbody").append(tr_table);
                        $("#Addition_of_Child").attr("onClick", "Add_Addition_of_Child(" + add_of_child_json_length + ")");
                    } else if (add_of_child_type == 2) {
                        $("#add_of_child_div").hide();
                        main_Add_Child_Arr = [];
                        $("#add_of_child_tbody").empty();
                        add_of_child_type_flag = true;
                        add_of_child_type_id = 'add_of_child_no';
                    }

                    if (family_size_id != '')
                        $("#" + family_size_id).prop('checked', family_size_type_flag);
                    if (add_of_child_type_id != '')
                        $("#" + add_of_child_type_id).prop('checked', add_of_child_type_flag);

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

    function onView(val) {
        clearError();
        $("#sub_policy_name_id").text(val);
        $("#update").show();
        $("#delete").show();
        $("#submit").hide();
        $('#view_form_modal').modal('toggle');
        var url = "<?php echo $base_url; ?>master/sub_policy/edit_sub_policy_name";
        if (url != "") {
            $.ajax({
                url: url,
                data: {
                    sub_policy_name_id: val
                },
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                beforeSend: function() {

                },

                success: function(data) {

                    var sub_policy_name_id = data["userdata"].sub_policy_name_id;
                    var company = data["userdata"].fk_company_id;
                    var company_name = data["userdata"].company_name;
                    var department = data["userdata"].fk_department_id;
                    var department_name = data["userdata"].department_name;
                    var policy_name = data["userdata"].fk_policy_type_id;
                    var policy_name_tit = data["userdata"].policy_name;
                    var policy_type = data["userdata"].policy_type;
                    var sub_policy_name = data["userdata"].sub_policy_name;

                    var family_size_type = data["userdata"].family_size_type;
                    var add_of_child_type = data["userdata"].add_of_child_type;
                    var family_size_json = data["userdata"].family_size_json;
                    var add_of_child_json = data["userdata"].add_of_child_json;
                    // 1:Individual ,2:Floater, 3:Residential & Commercial,4:Common Individual,5:Common Floater

                    if (policy_type == 1)
                        policy_type_tit = 'Individual';
                    else if (policy_type == 2)
                        policy_type_tit = 'Floater';
                    else if (policy_type == 3)
                        policy_type_tit = 'Residential & Commercial';
                    else if (policy_type == 4)
                        policy_type_tit = 'Common Individual';
                    else if (policy_type == 5)
                        policy_type_tit = 'Common Floater';

                    if (policy_type == 1 || policy_type == 3 || policy_type == 4) {
                        $("#policy_type_det_div").hide();
                    } else if (policy_type == 2 || policy_type == 5) {
                        $("#policy_type_det_div").show();
                    }

                    $("#sub_policy_name_id").text(sub_policy_name_id);
                    $("#company_det").text(company_name);
                    $("#department_det").text(department_name);
                    $("#policy_name_det").text(policy_name_tit);
                    $("#policy_type_det").text(policy_type_tit);
                    $("#sub_policy_name_det").text(sub_policy_name);

                    var family_size_type_det = '';
                    if (family_size_type == 1) {
                        $("#family_size_det_tbody").empty();
                        var tr_table = '';
                        var family_size_json = JSON.parse(data["userdata"].family_size_json);
                        var index = "";
                        family_size_json_length = family_size_json.length;
                        $.each(family_size_json, function(key, val) {
                            add_family_counter = key;
                            index = family_size_json[key][0];
                            var family_size_txt = family_size_json[key][1];
                            tr_table += '<tr><td>' + family_size_txt + '</td> </tr>';
                        });
                        $("#family_size_det_tbody").append(tr_table);
                        family_size_type_det = 'Yes';
                        $("#family_size_det_div").show();
                    } else if (family_size_type == 2) {
                        family_size_type_det = 'No';
                        $("#family_size_det_div").hide();
                    }
                    var add_of_child_type_det = '';
                    if (add_of_child_type == 1) {
                        $("#add_of_child_det_tbody").empty();
                        var tr_table = '';
                        var add_of_child_json = JSON.parse(data["userdata"].add_of_child_json);
                        var index = "";
                        add_of_child_json_length = add_of_child_json.length;
                        $.each(add_of_child_json, function(key, val) {
                            add_child_counter = key;
                            main_Add_Child_Arr.push(add_child_counter);
                            index = add_of_child_json[key][0];
                            var add_child_txt = add_of_child_json[key][1];
                            tr_table += '<tr><td>' + add_child_txt + '</td> </tr>';
                        });
                        $("#add_of_child_det_tbody").append(tr_table);
                        add_of_child_type_det = 'Yes';
                        $("#add_of_child_det_div").show();
                    } else if (add_of_child_type == 2) {
                        add_of_child_type_det = 'No';
                        $("#add_of_child_det_div").hide();
                    }
                    if (family_size_type == "" || family_size_type == "Null" || family_size_type == "undefined" || family_size_type == null || family_size_type == undefined) {
                        var family_size_type_tit = "";
                    } else {
                        if (family_size_type == 1)
                            var family_size_type_tit = '<span class="badge badge-success pl-2">Yes</span>';
                        else if (family_size_type == 2)
                            var family_size_type_tit = '<span class="badge badge-danger pl-2">No</span>';
                    }

                    if (add_of_child_type == "" || add_of_child_type == "Null" || add_of_child_type == "undefined" || add_of_child_type == null || add_of_child_type == undefined) {
                        var add_of_child_type_tit = "";
                    } else {
                        if (add_of_child_type == 1)
                            var add_of_child_type_tit = '<span class="badge badge-success pl-2">Yes</span>';
                        else if (add_of_child_type == 2)
                            var add_of_child_type_tit = '<span class="badge badge-danger pl-2">No</span>';
                    }

                    $("#family_size_type_det").html(family_size_type_tit);
                    $("#add_of_child_type_det").html(add_of_child_type_tit);

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
        var sub_policy_name_id = $("#sub_policy_name_id").text();

        var company = $("#company").val();
        var department = $("#department").val();
        var policy_name = $("#policy_name").val();
        var policy_type = $("#policy_type").val();
        var sub_policy_name = $("#sub_policy_name").val();
        var family_size_type = $("input[name='family_size_type']:checked").val();
        var add_of_child_type = $("input[name='add_of_child_type']:checked").val();
        var family_size_json = JSON.stringify(Total_Family_Size());
        var add_of_child_json = JSON.stringify(Total_Child());
        // alert(sub_policy_name_id);
        if (company == "null")
            company = "";

        if (department == "null")
            department = "";

        if (policy_name == "null")
            policy_name = "";

        if (policy_type == "null")
            policy_type = "";

        var form_data = new FormData();
        form_data.append('sub_policy_name_id', sub_policy_name_id);
        form_data.append('company', company);
        form_data.append('department', department);
        form_data.append('policy_name', policy_name);
        form_data.append('policy_type', policy_type);
        form_data.append('sub_policy_name', sub_policy_name);
        form_data.append('family_size_type', family_size_type);
        form_data.append('add_of_child_type', add_of_child_type);
        form_data.append('family_size_json', family_size_json);
        form_data.append('add_of_child_json', add_of_child_json);

        var url = "<?php echo $base_url; ?>master/sub_policy/update_sub_policy_name";

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
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#company").val("null");
                    $("#department").val("null");
                    $("#policy_name").val("null");
                    $("#policy_type").val("");
                    $("#sub_policy_name").val("");

                    $("#company").removeClass("parsley-error");
                    $("#department").removeClass("parsley-error");
                    $("#policy_name").removeClass("parsley-error");
                    $("#policy_type").removeClass("parsley-error");
                    $("#sub_policy_name").removeClass("parsley-error");
                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["message"]["company_err"] != "")
                        $("#company").addClass("parsley-error");
                    else
                        $("#company").removeClass("parsley-error");
                    $("#company_err").addClass("text-danger").html(data["message"]["company_err"]);

                    if (data["message"]["department_err"] != "")
                        $("#department").addClass("parsley-error");
                    else
                        $("#department").removeClass("parsley-error");
                    $("#department_err").addClass("text-danger").html(data["message"]["department_err"]);

                    if (data["message"]["policy_name_err"] != "")
                        $("#policy_name").addClass("parsley-error");
                    else
                        $("#policy_name").removeClass("parsley-error");
                    $("#policy_name_err").addClass("text-danger").html(data["message"]["policy_name_err"]);

                    if (data["message"]["policy_type_err"] != "")
                        $("#policy_type").addClass("parsley-error");
                    else
                        $("#policy_type").removeClass("parsley-error");
                    $("#policy_type_err").addClass("text-danger").html(data["message"]["policy_type_err"]);

                    if (data["message"]["sub_policy_name_err"] != "")
                        $("#sub_policy_name").addClass("parsley-error");
                    else
                        $("#sub_policy_name").removeClass("parsley-error");
                    $("#sub_policy_name_err").addClass("text-danger").html(data["message"]["sub_policy_name_err"]);

                }
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    $("#submit").click(function() {
        var company = $("#company").val();
        var department = $("#department").val();
        var policy_name = $("#policy_name").val();
        var policy_type = $("#policy_type").val();
        var sub_policy_name = $("#sub_policy_name").val();
        var family_size_type = $("input[name='family_size_type']:checked").val();
        var add_of_child_type = $("input[name='add_of_child_type']:checked").val();
        var family_size_json = JSON.stringify(Total_Family_Size());
        var add_of_child_json = JSON.stringify(Total_Child());

        // console.log(family_size_type+"family_size_type");
        // console.log(add_of_child_type+"add_of_child_type");
        // console.log(family_size_json);
        // console.log(add_of_child_json);
        // return false;

        if (company == "null")
            company = "";

        if (department == "null")
            department = "";

        if (policy_name == "null")
            policy_name = "";

        if (policy_type == "null")
            policy_type = "";

        var form_data = new FormData();
        form_data.append('company', company);
        form_data.append('department', department);
        form_data.append('policy_name', policy_name);
        form_data.append('policy_type', policy_type);
        form_data.append('sub_policy_name', sub_policy_name);
        form_data.append('family_size_type', family_size_type);
        form_data.append('add_of_child_type', add_of_child_type);
        form_data.append('family_size_json', family_size_json);
        form_data.append('add_of_child_json', add_of_child_json);

        var url = "<?php echo $base_url; ?>master/sub_policy/add_sub_policy_name";

        $.ajax({
            url: url,
            data: form_data,
            type: 'POST',
            dataType: 'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {},

            success: function(data) {
                if (data["status"] == true) {
                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                    $("#company").val("null");
                    $("#department").val("null");
                    $("#policy_name").val("null");
                    $("#policy_type").val("");
                    $("#sub_policy_name").val("");

                    $("#company").removeClass("parsley-error");
                    $("#department").removeClass("parsley-error");
                    $("#policy_name").removeClass("parsley-error");
                    $("#policy_type").removeClass("parsley-error");
                    $("#sub_policy_name").removeClass("parsley-error");

                    $('#form_modal').modal('toggle');

                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    if (data["message"]["company_err"] != "")
                        $("#company").addClass("parsley-error");
                    else
                        $("#company").removeClass("parsley-error");
                    $("#company_err").addClass("text-danger").html(data["message"]["company_err"]);

                    if (data["message"]["department_err"] != "")
                        $("#department").addClass("parsley-error");
                    else
                        $("#department").removeClass("parsley-error");
                    $("#department_err").addClass("text-danger").html(data["message"]["department_err"]);

                    if (data["message"]["policy_name_err"] != "")
                        $("#policy_name").addClass("parsley-error");
                    else
                        $("#policy_name").removeClass("parsley-error");
                    $("#policy_name_err").addClass("text-danger").html(data["message"]["policy_name_err"]);

                    if (data["message"]["policy_type_err"] != "")
                        $("#policy_type").addClass("parsley-error");
                    else
                        $("#policy_type").removeClass("parsley-error");
                    $("#policy_type_err").addClass("text-danger").html(data["message"]["policy_type_err"]);

                    if (data["message"]["sub_policy_name_err"] != "")
                        $("#sub_policy_name").addClass("parsley-error");
                    else
                        $("#sub_policy_name").removeClass("parsley-error");
                    $("#sub_policy_name_err").addClass("text-danger").html(data["message"]["sub_policy_name_err"]);

                }

            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    });

    getSub_Policy_Count_List();

    function getSub_Policy_Count_List() {
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/sub_policy/get_sub_policy_name_list/view/<?php echo $company_id . "/" . $policy_name_id; ?>";
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
                    var total_sub_policy_data = 0;
                    $("#total_sub_policy_data").text("");
                    $("#tableData").empty();

                    if (data["status"] == true) {
                        var datas = "";
                        var total_policy = data["total_policy"];
                        total_sub_policy_data = data["total_sub_policy_data"];
                        $("#total_sub_policy_data").text(" Count ( " + total_sub_policy_data + " ) ");
                        var data = data["userdata"];
                        // alert(data.length);
                        $.each(data, function(key, val) {
                            sn = parseInt(key) + parseInt(1);
                            sub_policy_name_id = parseInt(data[key].sub_policy_name_id);
                            company_id = data[key].fk_company_id;
                            company = data[key].company_name;
                            department_id = data[key].fk_department_id;
                            department = data[key].department_name;
                            policy_name_id = data[key].fk_policy_type_id;
                            policy_name = data[key].policy_name;
                            policy_type = data[key].policy_type;
                            sub_policy_name = data[key].sub_policy_name;

                            family_size_type = data[key].family_size_type;
                            add_of_child_type = data[key].add_of_child_type;

                            family_size_json = data[key].family_size_json;
                            add_of_child_json = data[key].add_of_child_json;
                            if (family_size_json == "" || family_size_json == "undefined" || family_size_json == undefined) {
                                family_size_json = [];
                            } else {
                                family_size_json = JSON.parse(family_size_json);
                            }

                            if (add_of_child_json == "" || add_of_child_json == "undefined" || add_of_child_json == undefined) {
                                add_of_child_json = "";
                            } else {
                                add_of_child_json = JSON.parse(add_of_child_json);
                            }

                            var family_size_txt = "";
                            var child_txt = "";

                            sub_policy_name_status = data[key].sub_policy_name_status;
                            var total_policy = data[key].total_policy;

                            if (family_size_json == "") {
                                family_size_txt = "";
                            } else {
                                $.each(family_size_json, function(f_key, f_val) {
                                    var family_size = family_size_json[f_key][1];
                                    if (family_size_txt == "")
                                        family_size_txt = family_size;
                                    else
                                        family_size_txt = family_size_txt + " , " + family_size;
                                });
                            }

                            if (add_of_child_json == "") {
                                child_txt = "";
                            } else {
                                $.each(add_of_child_json, function(c_key, c_val) {
                                    var add_child = add_of_child_json[c_key][1];
                                    // alert(add_child);
                                    if (child_txt == "")
                                        child_txt = add_child;
                                    else
                                        child_txt = child_txt + " , " + add_child;
                                });
                            }

                            if (family_size_type == "" || family_size_type == "Null" || family_size_type == "undefined" || family_size_type == null || family_size_type == undefined) {
                                var family_size_type_tit = '<span class="badge badge-danger pl-2">No</span>';
                            } else {
                                if (family_size_type == 1)
                                    var family_size_type_tit = '<span class="badge badge-success pl-2">Yes</span>';
                                else if (family_size_type == 2)
                                    var family_size_type_tit = '<span class="badge badge-danger pl-2">No</span>';
                            }

                            if (add_of_child_type == "" || add_of_child_type == "Null" || add_of_child_type == "undefined" || add_of_child_type == null || add_of_child_type == undefined) {
                                var add_of_child_type_tit = '<span class="badge badge-danger pl-2">No</span>';
                            } else {
                                if (add_of_child_type == 1)
                                    var add_of_child_type_tit = '<span class="badge badge-success pl-2">Yes</span>';
                                else if (add_of_child_type == 2)
                                    var add_of_child_type_tit = '<span class="badge badge-danger pl-2">No</span>';
                            }

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

                            var isActive = data[key].del_flag;
                            if (!isNaN(sub_policy_name_id)) {
                                if (sub_policy_name_status == 1) {
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
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnDelete(" + sub_policy_name_id + ")'><b>Delete</b></a>";
                                } else {
                                    var del_status = "Yes";
                                    var delete_btn_txt = "<a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='OnRecover(" + sub_policy_name_id + ")'><b>Recover</b></a>";
                                }

                                view_btn = "<a href='<?php echo base_url(); ?>master/sub_policy/view/" + company_id + "/" + policy_name_id + "' class='btn btn-facebook btn-xs mt-1 view'  id='view'><i class='fas fa-eye'></i></a>";
                                status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + sub_policy_name_id + "' value='' type='button' onClick ='updateStatus(" + sub_policy_name_id + "," + sub_policy_name_status + ")' >" + status + "</button>";

                                action_btn = "<div class='btn-group'><button type='button' class='btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light ' data-toggle='dropdown' aria-expanded='false'>Actions <i class='mdi mdi-chevron-down'></i> </button><div class='dropdown-menu '><a class='dropdown-item view' href='javascript:void(0);' id='view' onClick ='onView(" + sub_policy_name_id + ")'><b>View</b></a><a class='dropdown-item edit' href='javascript:void(0);' id='edit' onClick ='onEdit(" + sub_policy_name_id + ")'><b>Edit</b></a> <a class='dropdown-item " + status_btn_txt + " status_btn_" + sub_policy_name_id + "' href='javascript:void(0);' id='status_btn_" + sub_policy_name_id + "' onClick ='updateStatus(" + sub_policy_name_id + "," + sub_policy_name_status + ")' ><b>" + status + "</b></a>" + delete_btn_txt + "</div></div>";

                                datas += '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td>' + action_btn + '<br/>' + badge_status + '</td><td>' + sn + '</td> <td><center>' + company + '</center></td><td>' + department + '</td><td>' + policy_name + '</td><td>' + policy_type_tit + '</td><td>' + sub_policy_name + '</td><td>' + family_size_type_tit + '</td><td>' + family_size_txt + '</td><td>' + add_of_child_type_tit + '</td><td>' + child_txt + '</td></tr>';
                            }
                        });

                    } else {
                        datas = '<tr onmouseover="ChangeBackgroundColor(this)" onmouseout="RestoreBackgroundColor(this)"><td colspan="10"><center>Data Not Found</center></td> </tr>';
                    }
                    $("#tableData").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }

    function updateStatus(sub_policy_name_id, sub_policy_name_status) {

        var url = "<?php echo $base_url; ?>master/sub_policy/update_sub_policy_name_status";

        if (sub_policy_name_id != "") {

            $.ajax({
                url: url,
                data: {
                    "id": sub_policy_name_id,
                    "status": sub_policy_name_status
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var status = "";
                    var update_style = "";
                    $("#status_btn_" + sub_policy_name_id).text("");
                    if (data["status"] == true) {
                        toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        if (data["userdata"]["sub_policy_name_status"] == 1) {
                            status = "In-Active";
                            var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light edit";
                            $("#edit_" + sub_policy_name_id).addClass(status_btn_txt);
                            $("#status_btn_" + sub_policy_name_id).text(status);
                        } else {
                            status = "Active";
                            var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light edit";
                            $("#edit_" + sub_policy_name_id).addClass(status_btn_txt);
                            $("#status_btn_" + sub_policy_name_id).text(status);
                        }

                        $("#status_btn_" + sub_policy_name_id).text(status);


                        $('#status_btn_' + sub_policy_name_id).attr('onClick', 'updateStatus(' + sub_policy_name_id + ',' + data["userdata"]["sub_policy_name_status"] + ')');

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
                CheckFormAccess(submenu_permission, 9, url);
                check(role_permission, 9);
            }
        }
    });
</script>