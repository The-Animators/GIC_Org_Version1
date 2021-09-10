<style>
    .table td,
    .table th {
        padding: .2rem;
    }
</style>
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
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
                        <h4 class="page-title"><?php echo $title; ?> </h4>
                    </div>
                </div>
            </div>
            <div class="row" id="staff_card_details">

            </div>

        </div>

    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php echo date("Y"); ?> &copy; GIC by <a href="">Animator</a>
                </div>
            </div>
        </div>
    </footer>
</div>
<script>
    getStaffList();

    function getStaffList() {
        var staff_sess_id = '<?php echo $this->session->userdata("@_staff_id"); ?>';
        $("#tableData").empty();
        var url = "<?php echo $base_url; ?>master/log_master/get_attendence_current_date_List";
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
                    $("#tableData").empty();
                    var total_atendence_track_data = 0;
                    var total_every_day_sallary = 0;
                    $("#total_atendence_track_data").text("");
                    if (data["status"] == true) {
                        var datas = "";

                        total_atendence_track_data = data["total_atendence_track_data"];
                        $("#total_atendence_track_data").text(" Count ( " + total_atendence_track_data + " ) ");
                        var data = data["userdata"];
                        $.each(data, function(key, val) {
                            var sn = parseInt(key) + parseInt(1);
                            log_track_id = parseInt(data[key].log_track_id);
                            log_type = data[key].log_type;
                            log_action_details = data[key].log_action_details;
                            staff = data[key].staff_name;
                            staff_sallary = data[key].staff_sallary;
                            user_role = data[key].user_role_title;
                            fk_staff_id = data[key].fk_staff_id;
                            fk_user_role_id = data[key].fk_user_role_id;
                            ip_address = data[key].ip_address;
                            pc_ip_address = data[key].pc_ip_address;
                            message = data[key].message;
                            type = data[key].type;
                            user_name = data[key].user_name;
                            password = data[key].password;
                            log_date = data[key].log_date;
                            log_time = data[key].log_time;
                            log_time2 = data[key].log_time2;
                            halfday_fullday = data[key].halfday_fullday;
                            create_date = data[key].create_date;
                            off_day = data[key].off_day;
                            if (staff == "null" || staff == null || staff == undefined || staff == "undefined" || staff == "")
                                staff = "Unknown";
                            else
                                staff = staff;

                            if (off_day == "null" || off_day == null || off_day == undefined || off_day == "undefined" || off_day == "")
                                off_day = "";
                            else
                                off_day = off_day;

                            if (!isNaN(log_track_id)) {

                                if (off_day == 1) {
                                    every_day_sallary = 0;
                                    var status = '<span class="badge badge-danger pl-2">Absent</span>';
                                } else if (off_day == 2) {
                                    var status = '<span class="badge badge-success pl-2">Present</span>';
                                }

                                check_box = "<div class='custom-control custom-checkbox'><input type='checkbox' name='log_track_ids[]' class='custom-control-input all' id='" + log_track_id + "' value='" + log_track_id + "'><label class='custom-control-label' for='" + log_track_id + "'></label></div>";

                                datas += '<div class="col-lg-3"><div class="text-center card-box">      <div class="row mt-2"><div class="col-md-12"><div class="form-row">    <div class="col-md-12"><table class="table mr-1 ml-1 mb-1 table-bordered"><thead><tr><td width="40%">Staff Name :</td><td><strong><span class="text-orange">' + staff + '</span></strong></td> </tr></thead></table></div>        <div class="col-md-12"><table class="table mr-1 ml-1 mb-1 table-bordered"><thead><tr><td width="40%">Status :</td><td><strong><span class="text-orange">' + status + '</span></strong></td></tr></thead></table></div>             </div></div></div></div></div>';
                            }
                        });
                                       
                    } else {
                        $("#total_atendence_track_data").text(" Count ( " + total_atendence_track_data + " ) ");
                        datas = '<div class="col-lg-3"><div class="text-center card-box">      <div class="row mt-2"><div class="col-md-12"><div class="form-row">    <div class="col-md-12"><table class="table mr-1 ml-1 mb-1 table-bordered"><thead><tr><td width="40%">Staff Name :</td><td><strong><span class="text-orange">NA</span></strong></td> </tr></thead></table></div>        <div class="col-md-12"><table class="table mr-1 ml-1 mb-1 table-bordered"><thead><tr><td width="40%">Status :</td><td><strong><span class="text-orange">NA</span></strong></td></tr></thead></table></div>             </div></div></div></div></div>';
                    }
                    $("#staff_card_details").append(datas);
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    }
</script>