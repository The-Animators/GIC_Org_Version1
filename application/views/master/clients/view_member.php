    <?php

    // echo '<pre>';
    // echo $client_details[0]['id'];
    // exit;

    $doc = (array)json_decode($client_details[0]['document']);
    // $contact_per = (array)json_decode($client_details[0]['contact_person']);

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
                            <!-- <h4 class="page-title"><?php //echo $title; 
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

                    <div class="col-12" id="personalDetail">
                        <form method="POST" id="formData" enctype="multipart/form-data">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5>Members Detail</h5>
                                        </div>
                                        <div class="col-md-8  text-right">
                                            <a href='<?php echo $base_url . "clients/edit_member/" . $client_details[0]['id']; ?>' class='btn btn-facebook btn-xs mr-1 edit' id='edit'><i class='fas fa-pencil-alt'></i></a>
                                            <?php //print_r($back); die("Test"); 
                                            ?>
                                            <input type="button" value="Back" class="btn btn-secondary waves-effect btn-xs" onclick="history.go(-1);" />
                                            <!-- <a href="<?php //echo $back; 
                                                            ?>" class="btn btn-secondary waves-effect width-md btn-sm">Back</a> -->
                                        </div>
                                    </div>
                                    <!-- <h4 class="card-title"></h4> -->
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class='mdi-18'>Title :</td>
                                                        <td><strong><span id="" class="text-orange"><?php

                                                                                                    if ($client_details[0]['role_type'] == 5) {
                                                                                                        echo 'Client Admin';
                                                                                                    } else {
                                                                                                        echo 'Client Individual';
                                                                                                    }
                                                                                                    ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Title : </label> -->
                                            <?php

                                            // if ($client_details[0]['role_type'] == 5) {
                                            //     echo 'Client Admin';
                                            // } else {
                                            //     echo 'Client Individual';
                                            // }
                                            ?>


                                        </div>


                                    </div>
                                    <hr>

                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Title :</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['title']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Title : </label><?php //echo $client_details[0]['title']; 
                                                                                                    ?> -->

                                        </div>

                                        <div class="col-sm-4">
                                            <?php
                                            if (empty($client_details[0]['name']) || $client_details[0]['name'] == "null")
                                                $name = " ";
                                            else
                                                $name = " " . $client_details[0]['name'];

                                            if (empty($client_details[0]['middle_name']) || $client_details[0]['middle_name'] == "null")
                                                $middle_name = " ";
                                            else
                                                $middle_name = " " . $client_details[0]['middle_name'];

                                            if (empty($client_details[0]['surname']) || $client_details[0]['surname'] == "null")
                                                $surname = " ";
                                            else
                                                $surname = " " . $client_details[0]['surname'];


                                            // echo $client_details[0]['name'] . ' ' . $client_details[0]['middle_name'] . ' ' . $client_details[0]['surname'];
                                            ?>
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Name:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $name . $middle_name . $surname; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Name : </label> -->
                                            <?php
                                            // if (empty($client_details[0]['name']) || $client_details[0]['name'] == "null")
                                            //     $name = " ";
                                            // else
                                            //     $name = " " . $client_details[0]['name'];

                                            // if (empty($client_details[0]['middle_name']) || $client_details[0]['middle_name'] == "null")
                                            //     $middle_name = " ";
                                            // else
                                            //     $middle_name = " " . $client_details[0]['middle_name'];

                                            // if (empty($client_details[0]['surname']) || $client_details[0]['surname'] == "null")
                                            //     $surname = " ";
                                            // else
                                            //     $surname = " " . $client_details[0]['surname'];

                                            // echo $name . $middle_name . $surname;
                                            // echo $client_details[0]['name'] . ' ' . $client_details[0]['middle_name'] . ' ' . $client_details[0]['surname'];
                                            ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Contact:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['contact']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Contact : </label><?php //echo $client_details[0]['contact']; 
                                                                                                    ?> -->
                                        </div>


                                        <!-- </div>

                                    <div class="form-group row"> -->

                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Email:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['email']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Email : </label><?php //echo $client_details[0]['email']; 
                                                                                                    ?> -->
                                        </div>
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Address:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['address']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Address : </label><?php //echo $client_details[0]['address']; 
                                                                                                    ?> -->
                                        </div>
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Relation:</td>
                                                        <td><strong><span id="" class="text-orange"><?php

                                                                                                    $sql = "select relation from master_relation where id='" . $client_details[0]['relation'] . "' ";
                                                                                                    $query = $this->db->query($sql);
                                                                                                    $result = (array)$query->result();
                                                                                                    // print_r($result); exit;
                                                                                                    if (!empty($result[0]->relation))
                                                                                                        echo $result[0]->relation; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Relation : </label><?php

                                                                                                    $sql = "select relation from master_relation where id='" . $client_details[0]['relation'] . "' ";
                                                                                                    $query = $this->db->query($sql);
                                                                                                    $result = (array)$query->result();
                                                                                                    // print_r($result); exit;
                                                                                                    if (!empty($result[0]->relation))
                                                                                                        echo $result[0]->relation; ?> -->
                                        </div>


                                        <!-- </div>
                                    <div class="form-group row"> -->
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Gender:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['gender']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Gender : </label>
                                            <?php //echo $client_details[0]['gender']; 
                                            ?> -->

                                        </div>

                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>D.O.B:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['dob']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Date Of Birth : </label><?php //echo $client_details[0]['dob']; 
                                                                                                            ?> -->
                                        </div>
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Education:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['education']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Education : </label><?php //echo $client_details[0]['education']; 
                                                                                                        ?> -->
                                        </div>



                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Proffession:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['proffession']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Proffession : </label><?php //echo $client_details[0]['proffession']; 
                                                                                                        ?> -->
                                        </div>


                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Martial Status:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['martial_status']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Martial Status : </label> -->
                                            <?php //echo $client_details[0]['martial_status']; 
                                            ?>

                                        </div>

                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Marrage date:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['dom']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Marrage date : </label><?php //echo $client_details[0]['dom']; 
                                                                                                        ?> -->
                                        </div>

                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Annaul Income:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['annual_income']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Annaul Income : </label><?php //echo $client_details[0]['annual_income']; 
                                                                                                            ?> -->
                                        </div>


                                    </div>


                                    <hr>
                                    <h5>KYC Detail</h5>
                                    <!-- <h4 class="card-title"></h4> -->
                                    <hr>

                                    <div class="form-group row">

                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Pan Card:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['pan_number']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Pan Card : </label><?php //echo $client_details[0]['pan_number']; 
                                                                                                    ?> -->
                                        </div>

                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Aadhar Card:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['aadhar_card']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Aadhar Card : </label><?php //echo $client_details[0]['aadhar_card']; 
                                                                                                        ?> -->
                                        </div>
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Passport:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['passport']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Passport : </label><?php //echo $client_details[0]['passport']; 
                                                                                                    ?> -->
                                        </div>

                                        <!-- </div>

                                    <div class="form-group row"> -->
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Gstin Number:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['gst_no']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <!-- <label for="example-text-input">Gstin Number : </label><?php //echo $client_details[0]['gst_no']; 
                                                                                                        ?> -->
                                        </div>
                                        <!-- </div>

                                    <div class="form-group row"> -->
                                        <?php
                                        $base_url = base_url();
                                        if (empty($doc['pan_image'])) {
                                            $view_pan_image = "";
                                        } else if (!empty($doc['pan_image'])) {
                                            $pan_image = $doc['pan_image'];
                                            $view_pan_image = "<a href='$base_url/assets/member_doc/pan_image/$pan_image' target='_blank'><strong><i class='fas fa-eye mdi-18'></i></strong></a>";
                                        }
                                        if (empty($doc['aadhar_image'])) {
                                            $view_aadhar_image = "";
                                        } else if (!empty($doc['aadhar_image'])) {
                                            $aadhar_image = $doc['aadhar_image'];
                                            $view_aadhar_image = "<a href='$base_url/assets/member_doc/aadhar_image/$aadhar_image' target='_blank'><strong><i class='fas fa-eye mdi-18'></i></strong></a>";
                                        }
                                        if (empty($doc['passport_image'])) {
                                            $view_passport_image = "";
                                        } else if (!empty($doc['passport_image'])) {
                                            $passport_image = $doc['passport_image'];
                                            $view_passport_image = "<a href='$base_url/assets/member_doc/passport_image/$passport_image' target='_blank'><strong><i class='fas fa-eye mdi-18'></i></strong></a>";
                                        }
                                        if (empty($doc['gst_image'])) {
                                            $view_gst_image = "";
                                        } else if (!empty($doc['gst_image'])) {
                                            $gst_image = $doc['gst_image'];
                                            $view_gst_image = "<a href='$base_url/assets/member_doc/gst_image/$gst_image' target='_blank'><strong><i class='fas fa-eye mdi-18'></i></strong></a>";
                                        }
                                        if (empty($doc['birth_certificate'])) {
                                            $view_birth_certificate = "";
                                        } else if (!empty($doc['birth_certificate'])) {
                                            $birth_certificate = $doc['birth_certificate'];
                                            $view_birth_certificate = "<a href='$base_url/assets/member_doc/birth_certificate/$birth_certificate' target='_blank'><strong><i class='fas fa-eye mdi-18'></i></strong></a>";
                                        }
                                        if (empty($doc['photo'])) {
                                            $view_photo = "";
                                        } else if (!empty($doc['photo'])) {
                                            $photo = $doc['photo'];
                                            $view_photo = "<a href='$base_url/assets/member_doc/photo/$photo' target='_blank'><strong><i class='fas fa-eye mdi-18'></i></strong></a>";
                                        }
                                        ?>
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Pan Card:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $view_pan_image; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <!-- <div class="col-sm-2">
                                            <label>Pan Card : <?php //echo $view_pan_image; 
                                                                ?></label>
                                        </div> -->
                                        <!-- <div class="col-sm-2"> -->

                                        <?php //echo $view_pan_image; 
                                        ?>
                                        <!-- <a href="<?php //echo base_url(); 
                                                        ?>assets/member_doc/pan_image/<?php //echo @$doc['pan_image']; 
                                                                                        ?>" target="_blank"><img width="30%" src="<?php //echo base_url(); 
                                                                                                                                    ?>assets/member_doc/pan_image/<?php //echo @$doc['pan_image']; 
                                                                                                                                                                    ?>" alt="Pan Image"></a> -->
                                        <!-- </div> -->
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Aadhar Card:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $view_aadhar_image; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <!-- <div class="col-sm-2">
                                            <label>Aadhar Card : <?php //echo $view_aadhar_image; 
                                                                    ?></label>
                                        </div> -->
                                        <!-- <div class="col-sm-2"> -->
                                        <?php //echo $view_aadhar_image; 
                                        ?>
                                        <!-- <a href="<?php //echo base_url(); 
                                                        ?>assets/member_doc/aadhar_image/<?php //echo @$doc['aadhar_image']; 
                                                                                            ?>" target="_blank"><img width="30%" src="<?php //echo base_url(); 
                                                                                                                                        ?>assets/member_doc/aadhar_image/<?php //echo @$doc['aadhar_image']; 
                                                                                                                                                                            ?>" alt="Adhar Image"></a> -->
                                        <!-- </div> -->
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Passport:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $view_passport_image; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <!-- <div class="col-sm-2">
                                            <label>Passport : <?php echo $view_passport_image; ?></label>
                                        </div> -->
                                        <!-- <div class="col-sm-2"> -->
                                        <?php //echo $view_passport_image; 
                                        ?>
                                        <!-- <a href="<?php //echo base_url(); 
                                                        ?>assets/member_doc/passport_image/<?php //echo @$doc['passport_image']; 
                                                                                            ?>" target="_blank"><img width="30%" src="<?php //echo base_url(); 
                                                                                                                                        ?>assets/member_doc/passport_image/<?php //echo @$doc['passport_image']; 
                                                                                                                                                                            ?>" alt="Passport Image"></a> -->

                                        <!-- </div> -->


                                        <!-- </div>
                                    <div class="form-group row"> -->
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Gst:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $view_gst_image; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <!-- <div class="col-sm-2">
                                            <label>Gst : <?php echo $view_gst_image; ?></label>
                                        </div> -->
                                        <!-- <div class="col-sm-2"> -->
                                        <?php //echo $view_gst_image; 
                                        ?>
                                        <!-- <a href="<?php //echo base_url(); 
                                                        ?>assets/member_doc/gst_image/<?php //echo @$doc['gst_image']; 
                                                                                        ?>" target="_blank"><img width="30%" src="<?php //echo base_url(); 
                                                                                                                                    ?>assets/member_doc/gst_image/<?php //echo @$doc['gst_image']; 
                                                                                                                                                                    ?>" alt="Gst Image"></a> -->
                                        <!-- </div> -->
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Birth Certificate:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $view_birth_certificate; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <!-- <div class="col-sm-2">
                                            <label>Birth Certificate : <?php echo $view_birth_certificate; ?></label>
                                        </div> -->
                                        <!-- <div class="col-sm-2"> -->

                                        <!-- <a href="<?php //echo base_url(); 
                                                        ?>assets/member_doc/birth_certificate/<?php //echo @$doc['birth_certificate']; 
                                                                                                ?>" target="_blank"><img width="30%" src="<?php //echo base_url(); 
                                                                                                                                            ?>assets/member_doc/birth_certificate/<?php //echo @$doc['birth_certificate']; 
                                                                                                                                                                                    ?>" alt="Birth Certificate"></a> -->
                                        <!-- </div> -->
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Photo:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $view_photo; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <!-- <div class="col-sm-2">
                                            <label>Photo : <?php //echo $view_photo; 
                                                            ?></label>
                                        </div> -->
                                        <!-- <div class="col-sm-2"> -->

                                        <!-- <a href="<?php //echo base_url(); 
                                                        ?>assets/member_doc/photo/<?php //echo @$doc['photo']; 
                                                                                    ?>" target="_blank"><img width="30%" src="<?php //echo base_url(); 
                                                                                                                                ?>assets/member_doc/photo/<?php //echo @$doc['photo']; 
                                                                                                                                                            ?>" alt="Photo"></a> -->

                                        <!-- </div> -->
                                    </div>
                                    <hr>
                                    <h4>Bio Detail</h4>

                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Height:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['height']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Weight:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['weight']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Chest:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['chest']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Abdomen:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['abdomen']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <!-- <div class="col-sm-4">
                                            <label for="example-text-input">Height : </label><?php //echo $client_details[0]['height']; ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="example-text-input">Weight : </label><?php //echo $client_details[0]['weight']; ?>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="example-text-input">Chest : </label><?php //echo $client_details[0]['chest']; ?>
                                        </div> -->


                                    <!-- </div>
                                    <div class="form-group row"> -->
                                        <!-- <div class="col-sm-4">
                                            <label for="example-text-input">Abdomen : </label><?php echo $client_details[0]['abdomen']; ?>
                                        </div> -->
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Current Health Status:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['current_health_status']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col-sm-4">
                                            <table class="table mr-1 ml-1 mb-1 table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="30%" class=''>Glasses:</td>
                                                        <td><strong><span id="" class="text-orange"><?php echo $client_details[0]['glasses']; ?></span></strong></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <!-- <div class="col-sm-4">
                                            <label for="example-text-input">Current Health Status : </label><?php //echo $client_details[0]['current_health_status']; ?>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="example-text-input">Glasses : </label><?php //echo $client_details[0]['glasses']; ?>
                                        </div> -->


                                    </div>

                                    <hr>

                                    <?php
                                    $j = 1;
                                    foreach ($policy_section as $val) { ?>

                                        <h4><?php echo $val['policy_question_section_name']; ?></h4>

                                        <?php

                                        $sql = "select policy_question_id,question from master_policy_question_ans where fk_policy_question_section_id = " . $val['policy_question_section_id'] . " ";
                                        $query = $this->db->query($sql);
                                        $result = $query->result_array();


                                        $i = 1;
                                        foreach ($result as $qst) { ?>

                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label><b><?php echo $i; ?></b> <?php echo $qst['question'] ?></label>
                                                    <input type="hidden" name="question_list[]" value="<?php echo $qst['policy_question_id'] ?>">
                                                </div>
                                                <div class="col-sm-2">
                                                    <span id="live_or_travel<?php echo $j; ?>"></span>
                                                    <!-- <select class="form-control" disabled id="live_or_travel<?php echo $j; ?>" name="live_or_travel[]">
                                                        <option value="">Select</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>

                                                    </select> -->
                                                </div>
                                                <div class="col-sm-4">
                                                    <span id="live_or_travel_remarks<?php echo $j; ?>"></span>
                                                    <!-- <input class="form-control" type="text" id="live_or_travel_remarks<?php //echo $j; 
                                                                                                                            ?>" name="live_or_travel_remarks[]" readonly value="" placeholder="Detail/ Remark"> -->
                                                </div>
                                            </div>
                                        <?php $i++;
                                            $j++;
                                        }   ?>

                                    <?php  } ?>



                                    <!-- <div class="form-group mb-0 text-center">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" id="saveMemberDetail" data-form="formData2">
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

        $(document).ready(function() {

            getClientDetails();
        });


        function getClientDetails() {

            $("#tableData").empty();
            var c_id = "<?php echo $c_id; ?>";
            // alert(mcompany_id);
            var url = "<?php echo $base_url; ?>clients/getmDetails";
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

                                $('#title option[value="' + val.title + '"]').prop("selected", true);
                                $('#gender option[value="' + val.gender + '"]').prop("selected", true);
                                $('#martial_status option[value="' + val.martial_status + '"]').prop("selected", true);

                                var qst_and_ans = JSON.parse(val.qst_and_ans);

                                var k = 1;
                                if (qst_and_ans == "null" || qst_and_ans == null) {
                                    qst_and_ans = "";
                                }
                                $.each(qst_and_ans.live_or_travel, function(key, val) {

                                    // $('#live_or_travel' + k + ' option[value="' + val + '"]').prop("selected", true);
                                    $('#live_or_travel' + k).text(val);

                                    k++;
                                })
                                k = 1
                                $.each(qst_and_ans.live_or_travel_remarks, function(key, val) {

                                    $("#live_or_travel_remarks" + k).text(val);
                                    // $("#live_or_travel_remarks" + k).val(val);

                                    k++;
                                })

                            });

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

        function OnDelete(cust_id, is_del) {

            $.ajax({
                type: "POST",
                url: baseUrl + 'Clients/delete_customer',
                data: {
                    'id': cust_id,
                    'delete': is_del
                },
                // contentType: false,
                // processData: false,
                dataType: "json",
                success: function(data) {

                    if (data.status == true) {
                        toaster(message_type = "Success", message_txt = "Data updated Successfully", message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        // alert('Data updated Successfully');
                        // window.location.reload();
                    }
                },
                error: function(response) {
                    alert('Error posting feeds');
                    return false;
                }
            });
        }

        function updateStatus(cust_id, status) {

            $.ajax({
                type: "POST",
                url: baseUrl + 'Clients/active_customer',
                data: {
                    'id': cust_id,
                    'status': status
                },
                // contentType: false,
                // processData: false,
                dataType: "json",
                success: function(data) {

                    if (data.status == true) {
                        toaster(message_type = "Success", message_txt = "Data updated Successfully", message_icone = "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        // alert('Data updated Successfully');
                        // window.location.reload();
                    }
                },
                error: function(response) {
                    alert('Error posting feeds');
                    return false;
                }
            });
        }
    </script>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>