    <?php

    // echo '<pre>';
    // echo $client_details[0]['id'];
    // exit;

    $doc = (array)json_decode($client_details[0]['document']);
    $contact_per = (array)json_decode($client_details[0]['contact_person']);

    // foreach($contact_per as $val){
    //     $val = (array)$val;
    //     echo $val['name'];
    //     echo $val['email'];

    // }
    // exit;

    ?>

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
                            <!-- <h4 class="page-title"><?php // echo $title; 
                                                        ?></h4> -->
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
                                            <div class="col-md-5">
                                                <div class="form-group row">
                                                    <label for="department_name" class="col-form-label col-md-4 text-right">Department Name<span class="text-danger">*</span></label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="department_name" id="department_name" value="" placeholder="Enter Department Name" class="form-control">
                                                        <span id="department_name_err"></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label id="department_id" hidden>1</label>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <center>
                                                    <button id="update" onclick='onUpdate()' style="display: none;" class="btn btn-primary btn-sm">Update <?php echo $title; ?></button>
                                                    <button id="submit" class="btn btn-primary btn-sm">Save <?php echo $title; ?></button>
                                                    <!-- <button id="delete" onclick='OnDelete()' style="display: none;" class="btn btn-primary btn-sm">Delete <?php echo $title; ?></button> -->
                                                    <!-- <button id="recover" onclick='OnRecover()' style="display: none;" class="btn btn-primary btn-sm">Recover <?php echo $title; ?></button> -->
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
                <!-- 
                    <style type="text/css">
                        .input-group{width: 40%; float:right}
                        .card-title{padding: 10px;background: #cdcdcd!important}
                        label b{color: #000!important}
                    </style> -->
                <div class="row">

                    <div class="col-12" id="personalDetail">
                        <form method="POST" id="formData" enctype="multipart/form-data">
                            <div class="card">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <!-- <h4 class="header-title"><?php //echo "View " . $title; 
                                                                            ?></h4> -->
                                        </div>
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-6 text-right" id="btn_details">
                                            <!-- <a href="<?php //echo base_url() . "master/insurance_company_details"; 
                                                            ?>" class='btn btn-secondary waves-effect width-md btn-sm'>Back</a> -->
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <?php
                                        // if($group_list){
                                        //     echo '<a class="btn btn-primary waves-effect mr-1" href="'.base_url().'clients/group/list">View Group</a>';
                                        // }
                                        // if($group_member_list){
                                        //     echo '<a class="btn btn-primary waves-effect" href="'.base_url().'clients/member/list">View Group Member</a>';
                                        // }
                                        ?>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class='md-18'>Group Name :</td>
                                                        <td><strong><span id="" class="text-orange md-18"><?php echo $client_details[0]['grpname']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Group Name :</label>
                                            <?php //echo $client_details[0]['grpname']; 
                                            ?> -->
                                        </div>


                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%">Refered By :</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['reffered_by']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Refered By :</label> -->
                                            <?php //echo $client_details[0]['reffered_by']; 
                                            ?>
                                        </div>
                                    </div>

                                    <hr>
                                    <h5>Contact Person's</h5>
                                    <hr>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name </th>
                                                <th>Mobile </th>
                                                <th>Whatsapp </th>
                                                <th>Telegram </th>
                                                <th>Email </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($contact_per)) {
                                                for ($i = 0; $i < count($contact_per['contact_name']); $i++) {                            // $val = (array)$val; 
                                            ?>
                                                    <tr>
                                                        <td><?php echo $contact_per['contact_name'][$i]; ?></td>
                                                        <td><?php echo $contact_per['mobile'][$i]; ?></td>
                                                        <td><?php echo $contact_per['whatsapp'][$i]; ?></td>
                                                        <td><?php echo $contact_per['telegram'][$i]; ?></td>
                                                        <td><?php echo $contact_per['contact_email'][$i]; ?></td>
                                                    </tr>



                                                <?php }
                                            } else { ?>
                                                <tr class="text-center">
                                                    <td colspan="5">No Records Found</td>
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>


                                    <hr>
                                    <h5>Residential Address</h5>
                                    <hr>

                                    <div class="form-group row">

                                        <div class="col-sm-6">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%">Address Line 1:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['r_address1']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Address Line 1 : </label> -->

                                            <?php //echo $client_details[0]['r_address1']; 
                                            ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%">Address Line 2:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['r_address2']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Address Line 2 : </label> -->

                                            <?php //echo $client_details[0]['r_address2']; 
                                            ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%">Address Line 3:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['r_address3']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Address Line 3 : </label> -->

                                            <?php //echo $client_details[0]['r_address3']; 
                                            ?>
                                        </div>


                                        <!-- </div>

                                    <div class="form-group row"> -->
                                        <div class="col-sm-3">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%">State:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['r_state']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">State : </label> -->
                                            <?php //echo $client_details[0]['r_state']; 
                                            ?>
                                        </div>
                                        <div class="col-sm-3">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%">Country:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['r_country']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Country : </label><?php //echo $client_details[0]['r_country']; 
                                                                                                    ?> -->
                                        </div>
                                        <div class="col-sm-3">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%">City:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['r_city']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">City : </label><?php //echo $client_details[0]['r_city']; 
                                                                                                ?> -->
                                        </div>

                                        <!-- </div>

                                    <div class="form-group row"> -->

                                        <div class="col-sm-3">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%">Zipcode:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['r_zip']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Residential Zipcode : </label><?php //echo $client_details[0]['r_zip']; 
                                                                                                                ?> -->
                                        </div>
                                        <div class="col-sm-3">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%">Contact 1:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['r_office_contact1']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Residential Contact 1 : </label><?php //echo $client_details[0]['r_office_contact1']; 
                                                                                                                    ?> -->
                                        </div>
                                        <div class="col-sm-3">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%">Contact 2:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['r_office_contact2']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Residential Contact 2 : </label><?php //echo $client_details[0]['r_office_contact2']; 
                                                                                                                    ?> -->
                                        </div>

                                    </div>

                                    <hr>
                                    <h5>
                                        Office Address
                                        <!-- <div class="pull-right" style="float: right;">
                            <label for="sameasresidential">
                                <input type="checkbox" class="checkbox" name="sameasresidential" id="sameasresidential"> 
                                <small>Same As Home Address</small>
                            </label>
                        </div> -->
                                    </h5>
                                    <hr>
                                    <div class="form-group row">

                                        <div class="col-sm-6">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%">Address Line 1 :</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['o_address1']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Address Line 1 : </label><?php //echo $client_details[0]['o_address1']; 
                                                                                                            ?> -->
                                        </div>
                                        <div class="col-sm-6">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%">Address Line 2 :</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['o_address2']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Address Line 2 : </label><?php //echo $client_details[0]['o_address2']; 
                                                                                                            ?> -->
                                        </div>
                                        <div class="col-sm-6">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%">Address Line 3 :</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['o_address3']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Address Line 3 : </label><?php //echo $client_details[0]['o_address3']; 
                                                                                                            ?> -->
                                        </div>


                                        <!-- </div>
                                    <div class="form-group row"> -->
                                        <div class="col-sm-3">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%">State :</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['r_state']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">State : </label> -->
                                            <?php //echo $client_details[0]['r_state']; 
                                            ?>
                                        </div>

                                        <div class="col-sm-3">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%">Country :</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['o_country']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Country : </label><?php //echo $client_details[0]['o_country']; 
                                                                                                    ?> -->
                                        </div>
                                        <div class="col-sm-3">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%">City:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['o_city']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">City : </label><?php //echo $client_details[0]['o_city']; 
                                                                                                ?> -->
                                        </div>



                                        <!-- </div>
                                    <div class="form-group row"> -->


                                        <div class="col-sm-3">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%">Zipcode :</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['o_zip']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Zipcode : </label><?php //echo $client_details[0]['o_zip']; 
                                                                                                    ?> -->
                                        </div>
                                        <div class="col-sm-3">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%">Contact 1:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['o_office_contact1']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Contact 1 : </label><?php //echo $client_details[0]['o_office_contact1']; 
                                                                                                        ?> -->
                                        </div>
                                        <div class="col-sm-3">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%">Contact 2:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['o_office_contact2']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Contact 2 : </label><?php //echo $client_details[0]['o_office_contact2']; 
                                                                                                        ?> -->
                                        </div>

                                    </div>
                                    <hr>
                                    <h5>Correspondence Address</h5>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <!-- <td width="30%">Contact 1:</td> -->
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['officecheck']; ?> Address</span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label>
                                                <?php //echo $client_details[0]['officecheck']; 
                                                ?> Address
                                            </label> -->

                                        </div>
                                    </div>
                                    <hr>
                                    <a class="btn btn-success button button5 btn-sm" href="<?php echo base_url(); ?>clients/member_details/<?php echo $c_id; ?>" type="button">Add Member</a>
                                    <h5>Member List</h5>

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name </th>
                                                <th>Contact </th>
                                                <th>Email </th>
                                                <th>address </th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($member_details)) {
                                                foreach ($member_details as $val) {
                                                    if (empty($val['name']) || $val['name'] == "null")
                                                        $name = " ";
                                                    else
                                                        $name = " " . $val['name'];

                                                    if (empty($val['middle_name']) || $val['middle_name'] == "null")
                                                        $middle_name = " ";
                                                    else
                                                        $middle_name = " " . $val['middle_name'];

                                                    if (empty($val['surname']) || $val['surname'] == "null")
                                                        $surname = " ";
                                                    else
                                                        $surname = " " . $val['surname'];
                                                    //print_r($member_details) ;                // $val = (array)$val; 
                                            ?>
                                                    <tr>
                                                        <td><?php echo $name . $middle_name . $surname; ?></td>
                                                        <td><?php echo $val['contact']; ?></td>
                                                        <td><?php echo $val['email']; ?></td>
                                                        <td><?php echo $val['address']; ?></td>
                                                        <td>
                                                            <div class="btn-group"><button type="button" class="btn btn-facebook dropdown-toggle waves-effect btn-xs waves-light " data-toggle="dropdown" aria-expanded="false">Actions <i class="mdi mdi-chevron-down"></i> </button>
                                                                <div class="dropdown-menu "><a class="dropdown-item view" href="<?php echo base_url(); ?>clients/view_member/<?php echo $val['id']; ?>" id="view"><b>View</b></a><a class="dropdown-item edit" href="<?php echo base_url(); ?>clients/edit_member/<?php echo $val['id']; ?>" id="edit"><b>Edit</b></a> <a class="dropdown-item delete" href="javascript:void(0);" id="delete" onclick="delete_single_memb(<?php echo $val['id']; ?>)" title="Delete"><b>Delete</b></a> </div>
                                                            </div>

                                                            <!-- <a class="btn btn-facebook btn-sm" href="<?php echo base_url(); ?>clients/view_member/<?php echo $val['id']; ?>" type="button"><i class='fas fa-eye'></i></a> <a class="btn btn-facebook  btn-sm" href="<?php echo base_url(); ?>clients/edit_member/<?php echo $val['id']; ?>" type="button"><i class='fas fa-pencil-alt'></i></a> <button type="button" class="btn btn-danger btn-sm" onclick="delete_single_memb(<?php echo $val['id']; ?>)" title="Delete"><i class="fa fa fa-trash" aria-hidden="true"></i></button> -->
                                                        </td>
                                                    </tr>



                                            <?php }
                                            } else {
                                                echo '<tr class="text-center"><td colspan="5">No Member Found</td> <tr>';
                                            }
                                            ?>

                                        </tbody>
                                    </table>

                                    <!-- <div class="form-group mb-0 text-center">
                        <div>
                            <input type="hidden" id="id" name="id" value="0">
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" id="save" data-form="formData">
                                <i class="fa fa-save"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect reset" data-form="permissions-form">
                                Cancel
                            </button>
                        </div>
                    </div> -->



                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Members Detail</h4>
                <div id="memberDetail" style="display: none">
                    <form method="POST" id="formData2">
                        
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div> -->

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
    <!-- <script src="<?= base_url(); ?>assets/js/master-clients.js"></script> -->
    <!-- <script src="<?php echo base_url(); ?>assets/js/common.js"></script> -->

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
    <script>
        let baseUrl = "<?php echo base_url(); ?>";
    </script>
    <script>
        function delete_single_memb(id) {

            $.ajax({
                type: "POST",
                url: baseUrl + 'Clients/delete_member',
                data: {
                    'id': id
                },
                // contentType: false,
                // processData: false,
                dataType: "json",
                success: function(data) {

                    if (data.status == true) {
                        toaster(message_type = "Success", message_txt = "Data Deleted Successfully", message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        // alert('Data Deleted Successfully');
                        window.location.reload();
                    }
                },
                error: function(response) {
                    alert('Error posting feeds');
                    return false;
                }
            });
        }
        // getAgentDetails(<?php // echo $company_id; 
                            ?>);

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
        // getEmployeeDetails(<?php // echo $company_id; 
                                ?>);

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
                                emp_tr += ' <tr><td style="border: 1px solid #dddddd;padding:10px;"><center>' + member_name + '</center></td><td style="border: 1px solid #dddddd;"><center>' + designation + '</center></td><td style="border: 1px solid #dddddd;"><center>' + contact1 + '</center></td><td style="border: 1px solid #dddddd;"><center>' + contact2 + '</center></td><td style="border: 1px solid #dddddd;"><center>' + email1 + '</center></td> </tr>';
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

        getClientDetails();

        function getClientDetails() {
            $("#tableData").empty();
            var c_id = "<?php echo $c_id; ?>";
            // alert(mcompany_id);
            var url = "<?php echo $base_url; ?>clients/getClient";
            if (url != "") {
                $.ajax({
                    url: url,
                    data: {
                        'id': c_id
                    },
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    cache: false,
                    beforeSend: function() {

                    },

                    success: function(data) {

                        var res = data.data;

                        if (data.status == true) {

                            $.each(res, function(key, val) {
                                // $('#r_state option[value="' + val.r_state +'"]').prop("selected", true);
                                // $('#o_state option[value="' + val.o_state +'"]').prop("selected", true);

                                // var qst_and_ans = JSON.parse(val.qst_and_ans);

                                // var k =1;

                                // $.each(qst_and_ans.live_or_travel, function(key, val) {

                                //     $('#live_or_travel'+ k +' option[value="' + val +'"]').prop("selected", true);

                                //     k++;
                                // })
                                // k =1
                                // $.each(qst_and_ans.live_or_travel_remarks, function(key, val) {

                                //     $("#live_or_travel_remarks"+ k).val(val);

                                //     k++;
                                // })


                                if (val.c_status == 1) {

                                    var status = "fa fa-toggle-on";
                                    var status_btn_txt = "btn btn-outline-success waves-effect waves-light btn-sm";
                                } else {
                                    var status = "fa fa-toggle-off";
                                    var status_btn_txt = "btn btn-outline-danger waves-effect waves-light btn-sm";
                                }

                                if (val.c_is_delete == 1) {
                                    var dstatus = "<button id='recover' onclick='OnRecover(" + val.id + ")' class='btn btn-primary btn-sm mr-1' ><i class='fa fa-undo'></i> </button>";
                                } else {
                                    var dstatus = "<button type='button' id='delete' onclick='OnDelete(" + val.id + ")' class='btn btn-danger btn-sm mr-1'><i class='fa fa-trash'></i></button>";
                                }

                                // alert(val.c_is_delete);
                                var edit_btn = " <a href='<?php echo base_url() . "clients/edit_client/"; ?>" + val.id + "' class='btn btn-facebook btn-sm mr-1' ><i class='fas fa-pencil-alt'></i></a>" + dstatus;

                                var status_btn = "<button class='" + status_btn_txt + "  mr-1' id='status_btn_" + val.id + "' value='' type='button' onClick ='updateStatus(" + val.id + "," + val.c_status + ")' ><i class='" + status + "'></i></button>";

                                var back_btn = '<a href="<?php echo base_url() . "clients/client_list"; ?>" class="btn btn-secondary waves-effect btn-xs">Back</a>';
                                $("#btn_details").append(edit_btn + status_btn + back_btn);
                                if (val.c_is_delete == 1) {
                                    $("#recover").show();
                                    $("#delete").hide();
                                } else {
                                    $("#delete").show();
                                    $("#recover").hide();
                                }
                            });

                        }

                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            }
        }

        function OnRecover(client_id) {
            // alert(client_id);
            var url = "<?php echo base_url(); ?>clients/recover_client";
            confirmation_alert(id = client_id, url = url, title = "Client", type = "Recover");
        }

        function OnDelete(client_id) {
            // alert(client_id);
            var url = "<?php echo base_url(); ?>clients/remove_client";
            confirmation_alert(id = client_id, url = url, title = "Client", type = "Delet");
        }

        function updateStatus(client_id, client_status) {

            var url = "<?php echo base_url(); ?>clients/update_client_status";

            if (client_id != "") {

                $.ajax({
                    url: url,
                    data: {
                        "id": client_id,
                        "status": client_status
                    },
                    type: 'POST',
                    //dataType : 'json',
                    success: function(data) {
                        var data = JSON.parse(data);
                        var status = "";
                        var update_style = "";
                        $("#status_btn_" + client_id).text("");
                        if (data["status"] == true) {
                            toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                            if (data["userdata"]["company_status"] == 1) {
                                status = "In-Active";
                                var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light";
                                $("#edit_" + client_id).addClass(status_btn_txt);
                                $("#status_btn_" + client_id).text(status);
                            } else {
                                status = "Active";
                                var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light";
                                $("#edit_" + client_id).addClass(status_btn_txt);
                                $("#status_btn_" + client_id).text(status);
                            }

                            $("#status_btn_" + client_id).text(status);


                            $('#status_btn_' + client_id).attr('onClick', 'updateStatus(' + client_id + ',' + data["userdata"]["c_status"] + ')');


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
        // function OnRecover(company_id) {
        //     var url = "<?php echo $base_url; ?>master/insurance_company_details/recover_company";
        //     confirmation_alert(id = company_id, url = url, title = "Company Details", type = "Recover");
        // }

        // function OnDelete(cust_id, is_del) {

        //     $.ajax({
        //         type: "POST",
        //         url: baseUrl + 'Clients/delete_customer',
        //         data: {
        //             'id': cust_id,
        //             'delete': is_del
        //         },
        //         // contentType: false,
        //         // processData: false,
        //         dataType: "json",
        //         success: function(data) {

        //             if (data.status == true) {
        //                 toaster(message_type = "Success", message_txt = "Data updated Successfully", message_icone = "success");
        //                 // alert('Data updated Successfully');
        //                 setTimeout(function() {
        //                     location.reload();
        //                 }, 1000);
        //                 // window.location.reload();
        //             }
        //         },
        //         error: function(response) {
        //             alert('Error posting feeds');
        //             return false;
        //         }
        //     });
        // }

        // function updateStatus(cust_id, status) {

        //     $.ajax({
        //         type: "POST",
        //         url: baseUrl + 'Clients/active_customer',
        //         data: {
        //             'id': cust_id,
        //             'status': status
        //         },
        //         // contentType: false,
        //         // processData: false,
        //         dataType: "json",
        //         success: function(data) {

        //             if (data.status == true) {
        //                 toaster(message_type = "Success", message_txt = "Data updated Successfully", message_icone = "success");
        //                 // alert('Data updated Successfully');
        //                 setTimeout(function() {
        //                     location.reload();
        //                 }, 1000);
        //                 // window.location.reload();
        //             }
        //         },
        //         error: function(response) {
        //             alert('Error posting feeds');
        //             return false;
        //         }
        //     });
        // }
    </script>