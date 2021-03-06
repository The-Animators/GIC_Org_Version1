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
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
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
                                            <h4 class="header-title"><?php echo "Edit " . $title; ?></h4>
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
                        </div>
                        <label for="example-text-input" class="col-sm-2 col-form-label">Refered By</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" required id="reffered_by" name="reffered_by" placeholder="Refered By">
                        </div>
                    </div>
                    <hr>
                    <h3>Contact Person's</h3>
                    <hr>
                    <div class="repeater">
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <input  type="button" id="addContact" value="Add" class="pull-left btn 
                                btn-primary waves-effect waves-light mr-1" style="clear: both"  />
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
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" id="r_address2" name="r_address2" placeholder="Address line 2">
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" id="r_address3" name="r_address3" placeholder="Address line 3">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4">
                            <input class="form-control" type="text" id="r_state" name="r_state" placeholder="Residential State">
                            <?php 
                                // $js = 'id="r_state" class="form-control"';
                                // echo form_dropdown('r_state', $states, '',$js);
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" id="r_country" name="r_country" placeholder="Residential Country">
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" id="r_city" name="r_city" placeholder="Residential City">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4">
                            <input class="form-control" type="text" id="r_zip" name="r_zip" placeholder="Residential Zipcode">
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" id="r_office_contact1" name="r_office_contact1" placeholder="Residential Contact 1">
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" id="r_office_contact2" name="r_office_contact2" placeholder="Residential Contact 2">
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
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control hblank" type="text" id="o_address2" name="o_address2" placeholder="Address line 2">
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control hblank" type="text" id="o_address3" name="o_address3" placeholder="Address line 3">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                        <input class="form-control" type="text" id="o_state" name="o_state" placeholder="Office State">
                            <?php 
                                // $js = 'id="o_state" class="form-control hblank"';
                                // echo form_dropdown('o_state', $states, '',$js);
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control hblank" type="text" id="o_country" name="o_country" placeholder="Office Country">
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control hblank" type="text" id="o_city" name="o_city" placeholder="Office City">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <input class="form-control hblank" type="text" id="o_zip" name="o_zip" placeholder="Office Zipcode">
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control hblank" type="text" id="o_office_contact1" name="o_office_contact1" placeholder="Office Contact 1">
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control hblank" type="text" id="o_office_contact2" name="o_office_contact2" placeholder="Office Contact 2">
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
                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" id="saveMemberDetail" data-form="formData2">
                                    <i class="fa fa-save"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect reset" data-form="permissions-form">
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
<script src="<?= base_url();?>assets/js/master-clients.js"></script>
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
$("#addContact").click(function(){
    
  addContact();
});

function addContact(){
    
//   count = count+1;
//   $("#addContact").attr("onClick", "addContact(" + count + ")");
  var tr_table ='<div class="form-group row "><div class="col-sm-2">';
  tr_table +='<input class="form-control" type="text" name="contact_name[]" placeholder="Name" value="">';
  tr_table +='</div><div class="col-sm-2"><input class="form-control" type="text" name="mobile[]"';
  tr_table +='placeholder="Mobile" value=""></div> <div class="col-sm-2"><input class="form-control" '; tr_table +='type="text" name="whatsapp[]" placeholder="WhatsApp" value=""></div><div class="col-sm-2">';
  tr_table +='<input class="form-control" type="text" name="telegram[]" placeholder="Telegram" value="">';
 
  tr_table +='</div><div class="col-sm-2"><input class="form-control"type="text"name="contact_email[]"';
  tr_table +='placeholder="Email" value=""></div> <div class="col-sm-2"> <input class="btn btn-danger delecontact';
  tr_table +=' waves-effect waves-light" type="button"  value="Delete"/></div></div>';
  $("#client_repete").append(tr_table);

}

$(document).ready(function() {
    $(document).on('click', '.delecontact', function () {
		var del_e = $(this).parent().parent().remove();
        
    });
});
                $("#AddForm").click(function() {
                    $('#form_modal').modal('toggle');
                    uninitialize();
                    clearError();
                });
                $('#department_name').on('keyup', function() {
                    document.getElementById("update").disabled = false;
                });

                function clearError() {
                    $("#department_name").removeClass("parsley-error");
                    $("#department_name_err").removeClass("text-danger").text("");
                }

                function uninitialize() {
                    $("#department_id").text("");
                    $("#department_name").val("");
                    $("#update").hide();
                    $("#delete").hide();
                    $("#submit").show();
                }

                function OnRecover() {
                    var department_id = $("#department_id").text();
                    var url = "<?php echo $base_url; ?>master/department/recover_department";
                    confirmation_alert(id = department_id, url = url, title = "Department", type = "Recover");
                }

                function OnDelete() {
                    var department_id = $("#department_id").text();
                    var url = "<?php echo $base_url; ?>master/department/remove_department";
                    confirmation_alert(id = department_id, url = url, title = "Department", type = "Delet");
                }

                function onEdit(val) {
                    clearError();
                    $("#department_id").text(val);
                    $("#update").show();
                    $("#delete").show();
                    $("#submit").hide();
                    $('#form_modal').modal('toggle');
                    var url = "<?php echo $base_url; ?>master/department/edit_department";
                    if (url != "") {
                        $.ajax({
                            url: url,
                            data: {
                                department_id: val
                            },
                            type: 'POST',
                            dataType: 'json',
                            async: false,
                            cache: false,
                            beforeSend: function() {

                            },

                            success: function(data) {
                                // var myObj = JSON.parse(data);
                                $("#department_id").text(data["userdata"].department_id);
                                $("#department_name").val(data["userdata"].department_name);

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
                    var department_id = $("#department_id").text();
                    var department_name = $("#department_name").val();

                    var url = "<?php echo $base_url; ?>master/department/update_department";

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            department_id: department_id,
                            department_name: department_name,
                        },
                        dataType: 'json',
                        async: false,
                        cache: false,
                        beforeSend: function() {

                        },
                        success: function(data) {
                            if (data["status"] == true) {
                                toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                                $("#department_name").val("");
                                $("#department_name").removeClass("parsley-error");
                                $('#form_modal').modal('toggle');

                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            } else {
                                if (data["message"]["department_name_err"] != "")
                                    $("#department_name").addClass("parsley-error");
                                else
                                    $("#department_name").removeClass("parsley-error");
                                $("#department_name_err").addClass("text-danger").html(data["message"]["department_name_err"]);

                            }
                        },
                        error: function(request, status, error) {
                            alert(request.responseText);
                        }
                    });
                }

                $("#submit").click(function() {
                    var department_name = $("#department_name").val();
                    var url = "<?php echo $base_url; ?>master/department/add_department";

                    $.ajax({
                        url: url,
                        data: {
                            department_name: department_name,
                        },
                        type: 'POST',
                        dataType: 'json',
                        async: false,
                        cache: false,
                        beforeSend: function() {

                        },

                        success: function(data) {
                            if (data["status"] == true) {
                                toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                                $("#department_name").val("");
                                $("#department_name").removeClass("parsley-error");
                                $('#form_modal').modal('toggle');

                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            } else {
                                if (data["message"]["department_name_err"] != "")
                                    $("#department_name").addClass("parsley-error");
                                else
                                    $("#department_name").removeClass("parsley-error");
                                $("#department_name_err").addClass("text-danger").html(data["message"]["department_name_err"]);

                            }

                        },
                        error: function(request, status, error) {
                            alert(request.responseText);
                        }
                    });
                });

                getDepartmentList();

                function getDepartmentList() {
                    $("#tableData").empty();
                    var url = "<?php echo $base_url; ?>master/department/get_department_list";
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
                                if (data["status"] == true) {
                                    var edit_btn = "";
                                    var status_btn = "";
                                    var department_id = "";
                                    var department_name = "";
                                    var department_status = "";
                                    var datas = "";
                                    var status = "";
                                    $.each(data, function(key, val) {

                                        department_id = parseInt(data[key].department_id);
                                        department_name = data[key].department_name;
                                        department_status = data[key].department_status;
                                        var isActive = data[key].del_flag;
                                        if (!isNaN(department_id)) {
                                            if (department_status == 1) {
                                                status = "Active";
                                                var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light  btn-sm";
                                            } else {
                                                status = "In-Active";
                                                var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light  btn-sm";
                                            }

                                            if (isActive == 1)
                                                var del_status = "No";
                                            else
                                                var del_status = "Yes";

                                            edit_btn = "<button class='btn btn-info waves-effect width-md waves-light btn-sm' id='edit_btn' value='' type='button' onClick ='onEdit(" + department_id + ")' >Edit</button>";
                                            status_btn = "<button class='" + status_btn_txt + "' id='status_btn_" + department_id + "' value='' type='button' onClick ='updateStatus(" + department_id + "," + department_status + ")' >" + status + "</button>";

                                            datas += '<tr><td>' + edit_btn + '</td> <td>' + department_name + '</td><td>' + status_btn + '</td> <td>' + del_status + '</td></tr>';
                                        }
                                    });

                                } else {
                                    datas = '<tr><td colspan="4"><center>Data Not Found</center></td> </tr>';
                                }
                                $("#tableData").append(datas);
                            },
                            error: function(request, status, error) {
                                alert(request.responseText);
                            }
                        });
                    }
                }

                function updateStatus(department_id, department_status) {

                    var url = "<?php echo $base_url; ?>master/department/update_department_status";

                    if (department_id != "") {

                        $.ajax({
                            url: url,
                            data: {
                                "id": department_id,
                                "status": department_status
                            },
                            type: 'POST',
                            //dataType : 'json',
                            success: function(data) {
                                var data = JSON.parse(data);
                                var status = "";
                                var update_style = "";
                                $("#status_btn_" + department_id).text("");
                                if (data["status"] == true) {
                                    toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
                                    setTimeout(function() {
                                        location.reload();
                                    }, 1000);
                                    if (data["userdata"]["department_status"] == 1) {
                                        status = "In-Active";
                                        var status_btn_txt = "btn btn-outline-danger waves-effect width-md waves-light";
                                        $("#edit_" + department_id).addClass(status_btn_txt);
                                        $("#status_btn_" + department_id).text(status);
                                    } else {
                                        status = "Active";
                                        var status_btn_txt = "btn btn-outline-success waves-effect width-md waves-light";
                                        $("#edit_" + department_id).addClass(status_btn_txt);
                                        $("#status_btn_" + department_id).text(status);
                                    }

                                    $("#status_btn_" + department_id).text(status);


                                    $('#status_btn_' + department_id).attr('onClick', 'updateStatus(' + department_id + ',' + data["userdata"]["department_status"] + ')');

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