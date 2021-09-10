<?php

// echo '<pre>';
// print_r($client_details); exit;
// $doc = (array)json_decode(@$client_details[0]['document']);
// $contact_per = (array)json_decode(@$client_details[0]['contact_person']);


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
                                                <button id="delete" onclick='OnDelete()' style="display: none;" class="btn btn-primary btn-sm">Delete <?php echo $title; ?></button>
                                                <button id="recover" onclick='OnRecover()' style="display: none;" class="btn btn-primary btn-sm">Recover <?php echo $title; ?></button>
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
                <div class="col-12">
                </div>
                <div class="col-12" id="personalDetail">
                    <form method="POST" id="formData" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <?php
                                    // if($group_list){
                                    //     echo '<a class="btn btn-primary waves-effect mr-1" href="'.base_url().'clients/group/list">View Group</a>';
                                    // }
                                    // if($group_member_list){
                                    //     echo '<a class="btn btn-primary waves-effect" href="'.base_url().'clients/member/list">View Group Member</a>';
                                    // }
                                    ?>
                                    <div class="col-md-4">
                                        <h4 class="header-title"><?php echo "Add " . $title; ?></h4>
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                    <div class="col-md-4 text-right">

                                        <a href="<?php echo base_url() . "clients/client_list"; ?>" class='btn btn-secondary waves-effect width-md btn-sm'>Back</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Group Name</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="grpname" name="grpname" placeholder="Group Name" required autofocus>
                                        <span id="grpname_err" ></span>
                                    </div>
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Refered By</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" required id="reffered_by" name="reffered_by" placeholder="Refered By">
                                        <span id="reffered_by_err" ></span>
                                    </div>
                                </div>
                                <hr>
                                <h3>Contact Person's</h3>
                                <hr>
                                <div class="repeater">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="button" id="addContact" value="Add" class="pull-left btn 
                                btn-primary waves-effect waves-light  btn-sm mr-1" style="clear: both" />
                                        </div>
                                    </div>
                                    <div id="client_repete">
                                        <div class="form-group row">
                                            <div class="col-sm-2">
                                                <input class="form-control" type="text" name="contact_name[]" placeholder="Name">
                                            </div>
                                            <div class="col-sm-2">
                                                <input class="form-control" type="text" name="mobile[]" placeholder="Mobile">
                                            </div>
                                            <div class="col-sm-2">
                                                <input class="form-control" type="text" name="whatsapp[]" placeholder="WhatsApp">
                                            </div>
                                            <div class="col-sm-2">
                                                <input class="form-control" type="text" name="telegram[]" placeholder="Telegram">
                                            </div>
                                            <div class="col-sm-2">
                                                <input class="form-control" type="text" name="contact_email[]" placeholder="Email">
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <h3>Residential Address</h3>
                                <hr>

                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="r_address1" name="r_address1" placeholder="Address Line 1">
                                        <span id="r_address1_err" ></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="r_address2" name="r_address2" placeholder="Address line 2">
                                        <span id="r_address2_err" ></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="r_address3" name="r_address3" placeholder="Address line 3">
                                        <span id="r_address3_err" ></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="r_state" name="r_state" placeholder="Residential State">
                                        <span id="r_state_err" ></span>
                                        <?php
                                        // $js = 'id="r_state" class="form-control"';
                                        // echo form_dropdown('r_state', $states, '',$js);
                                        ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="r_country" name="r_country" placeholder="Residential Country">
                                        <span id="r_country_err" ></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="r_city" name="r_city" placeholder="Residential City">
                                        <span id="r_city_err" ></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="r_zip" name="r_zip" placeholder="Residential Zipcode">
                                        <span id="r_zip_err" ></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="r_office_contact1" name="r_office_contact1" placeholder="Residential Contact 1">
                                        <span id="r_office_contact1_err" ></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="r_office_contact2" name="r_office_contact2" placeholder="Residential Contact 2">
                                        <span id="r_office_contact2_err" ></span>
                                    </div>
                                </div>

                                <hr>
                                <h3>
                                    Office Address
                                    <div class="pull-right" style="float: right;">
                                        <label for="sameasresidential">
                                            <input type="checkbox" class="checkbox" name="sameasresidential" id="sameasresidential">
                                            <small>Same As Home Address</small>
                                        </label>
                                    </div>
                                </h3>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input class="form-control hblank" type="text" id="o_address1" name="o_address1" placeholder="Address Line 1">
                                        <span id="o_address1_err" ></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control hblank" type="text" id="o_address2" name="o_address2" placeholder="Address line 2">
                                        <span id="o_address2_err" ></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control hblank" type="text" id="o_address3" name="o_address3" placeholder="Address line 3">
                                        <span id="o_address3_err" ></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="o_state" name="o_state" placeholder="Office State">
                                        <span id="o_state_err" ></span>
                                        <?php
                                        // $js = 'id="o_state" class="form-control hblank"';
                                        // echo form_dropdown('o_state', $states, '',$js);
                                        ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control hblank" type="text" id="o_country" name="o_country" placeholder="Office Country">
                                        <span id="o_country_err" ></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control hblank" type="text" id="o_city" name="o_city" placeholder="Office City">
                                        <span id="o_city_err" ></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input class="form-control hblank" type="text" id="o_zip" name="o_zip" placeholder="Office Zipcode">
                                        <span id="o_zip_err" ></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control hblank" type="text" id="o_office_contact1" name="o_office_contact1" placeholder="Office Contact 1">
                                        <span id="o_office_contact1_err" ></span>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control hblank" type="text" id="o_office_contact2" name="o_office_contact2" placeholder="Office Contact 2">
                                        <span id="o_office_contact2_err" ></span>
                                    </div>
                                </div>
                                <hr>
                                <h3>Correspondence Address</h3>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="optradio1">
                                            <input type="radio" name="officecheck" id="optradio1" value="Home">
                                            Home Address
                                        </label>
                                        <label for="optradio2">
                                            <input type="radio" name="officecheck" id="optradio2" value="Office" checked>
                                            Office Address
                                        </label>
                                    </div>
                                </div>
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



                                <div class="form-group mb-0 text-center">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light btn-sm mr-1" id="AddClient" data-form="formData2">
                                            <i class="fa fa-save"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect btn-sm reset" data-form="permissions-form">
                                            Cancel
                                        </button>
                                    </div>
                                </div>

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
<script src="<?= base_url(); ?>assets/js/master-clients.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/js/common.js"></script> -->

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->
<script>
    let baseUrl = "<?php echo base_url(); ?>";
</script>
<script>
    $(document).ready(function() {

        $('.match_time').datetimepicker({
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1,
            use24hours: true,
            dateFormat: 'dd/mm/yy, HH:II:SS'
        });
    });

    // var clickCounter=0;
    $("#addContact").click(function() {

        addContact();
    });

    function addContact() {

        //   count = count+1;
        //   $("#addContact").attr("onClick", "addContact(" + count + ")");
        var tr_table = '<div class="form-group row "><div class="col-sm-2">';
        tr_table += '<input class="form-control" type="text" name="contact_name[]" placeholder="Name" value="">';
        tr_table += '</div><div class="col-sm-2"><input class="form-control" type="text" name="mobile[]"';
        tr_table += 'placeholder="Mobile" value=""></div> <div class="col-sm-2"><input class="form-control" ';
        tr_table += 'type="text" name="whatsapp[]" placeholder="WhatsApp" value=""></div><div class="col-sm-2">';
        tr_table += '<input class="form-control" type="text" name="telegram[]" placeholder="Telegram" value="">';

        tr_table += '</div><div class="col-sm-2"><input class="form-control"type="text"name="contact_email[]"';
        tr_table += 'placeholder="Email" value=""></div> <div class="col-sm-2"> <input class="btn btn-danger delecontact';
        tr_table += ' waves-effect waves-light" type="button"  value="Delete"/></div></div>';
        $("#client_repete").append(tr_table);

    }

    $(document).ready(function() {
        $(document).on('click', '.delecontact', function() {
            var del_e = $(this).parent().parent().remove();

        });
    });
</script>