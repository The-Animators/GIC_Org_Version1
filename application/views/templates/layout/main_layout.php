<?php $this->benchmark->mark('start'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title><?php echo $title; ?> | </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="<?php echo $title; ?>" name="description"  />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/gic_img/gic_logo_new.png" style="max-height: 95px;max-width: 150px;">
  <!-- <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/gic_img/gic_logo.jpeg"> -->

  <!-- C3 Chart css -->
  <link href="<?php echo base_url(); ?>assets/libs/c3/c3.min.css" rel="stylesheet" type="text/css" />

  <!-- App css -->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
  <link href="<?php echo base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
  
  <!-- CSS Plugins Start For This Page -->
  <?php
  if (isset($css_plugins) && !empty($css_plugins)) :
    foreach ($css_plugins as $css_file) :
      $this->load->view($this->config->item('template_folder') . "plugins/css_plugins/$css_file");
    endforeach;
  endif;
  ?>
  <link href="<?php echo base_url(); ?>assets/custom_js/custom_css.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
  <style>
    tfoot {
      display: table-row-group;
    }
  </style>
  <!-- CSS Plugins End For This Page -->
  <!-- Vendor js -->
  <script src="<?php echo base_url(); ?>assets/js/vendor.min.js"></script>

  <?php $this->load->view("templates/include/custom_script_message"); ?>

</head>

<body data-layout="horizontal">
  <!-- Begin page -->
  <div id="wrapper">

    <!-- Navigation Bar-->
    <header id="topnav">
      <!-- Topbar Start -->
      <?php $this->load->view($top_bar); ?>
      <!-- end Topbar -->
      <!-- Nav Bar Custom Start -->
      <?php $this->load->view($nav_bar); ?>
      <!-- end navbar-custom -->
    </header>
    <?php $this->load->view($main_page); ?>
    <?php $this->load->view($this->config->item("template_folder") . "include/footer"); ?>
  </div>
  <!-- END wrapper -->
  <?php $this->load->view($right_sidebar); ?>
  <!-- Right bar overlay-->
  <div class="rightbar-overlay"></div>
  <!-- Vendor JS Files -->



  <!--C3 Chart-->
  <script src="<?php echo base_url(); ?>assets/libs/d3/d3.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/c3/c3.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/libs/echarts/echarts.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/pages/dashboard.init.js"></script>

  <!-- App js -->
  <script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>

  <!-- JS Plugins Start For This Page -->
  <?php
  if (isset($js_plugins) && !empty($js_plugins)) :
    foreach ($js_plugins as $js_file) :
      $this->load->view($this->config->item('template_folder') . "plugins/js_plugins/$js_file");
    endforeach;
  endif;
  ?>
  <!-- JS Plugins End For This Page -->
  <script type="text/javascript" src="<?php echo $base_url; ?>assets/custom_js/custom_toast.js"></script>
  <script type="text/javascript" src="<?php echo $base_url; ?>assets/custom_js/CheckFormAccess.js"></script>
  <script>
    $(document).ready(function() {
      var intervalId = window.setInterval(function() {
        // alert("Priyanshu Singh");
        // update_task_view_status();
        //var task_counter = '<?php echo $task_counter = task_counter(); ?>';
        // $(".rounded-circle").text(task_counter);
        get_task_count();
        // console.log(task_counter);

      }, 5000);
      // var intervalId = window.setInterval(function() {
      //   get_log_path_track();
      // }, 2000);
    });

    document.addEventListener('visibilitychange', function(event) {
      if (document.hidden) {
        console.log('not visible');
      } else {
        console.log('visible');
        var intervalId = window.setInterval(function() {
        // get_log_path_track();
      }, 2000);
        // console.log(<?php //echo $method; ?>);
        <?php if($class == "task_work" && $method == "index"){ ?>
          // alert("Enter");
        update_task_view_status();
        <?php } ?>
      }
    });

    function get_log_path_track() {
      var page_title = $('meta[name="description"]').attr("content");
      // alert(page_title);
        var url = "<?php echo $base_url; ?>master/common/get_log_path_track";

        if (url != "") {

            $.ajax({
                url: url,
                data: {page_title:page_title},
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var count_status = data["userdata"];
                    if (data["status"] == true) {} else {
                       
                    }

                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                }

            });
        }
    }

    function get_task_count() {
      var url = "<?php echo $base_url; ?>master/task_work/get_task_count";

      if (url != "") {

        $.ajax({
          url: url,
          data: {},
          type: 'POST',
          dataType: 'json',
          success: function(data) {
            var task_counter = data["userdata"];
            // alert(data["status"]);
            if (data["status"] == true) {
              // alert(task_counter);
              $(".rounded-circle").empty('');
              $("#work_id").empty('');
              $("#task_manage_id").empty('');
              $("#my_task_id").empty('');
              if (task_counter == 0) {
                $(".rounded-circle").empty('');
                $("#work_id").empty('');
                $("#task_manage_id").empty('');
                $("#my_task_id").empty('');
              } else {
                $("#work_id").append('<span class="badge badge-pink rounded-circle noti-icon-badgeml-1" style="<?php if ($this->session->userdata("@_user_role_id") == 1 || $this->session->userdata("@_user_role_id") == 2) : echo "display:none;";
                                                                                                                endif; ?>" >' + task_counter + '</span>');
                $("#task_manage_id").append('<span class="badge badge-pink rounded-circle noti-icon-badgeml-1" style="<?php if ($this->session->userdata("@_user_role_id") == 1 || $this->session->userdata("@_user_role_id") == 2) : echo "display:none;";
                                                                                                                      endif; ?>" >' + task_counter + '</span>');
                $("#my_task_id").append('<span class="badge badge-pink rounded-circle noti-icon-badgeml-1" style="<?php if ($this->session->userdata("@_user_role_id") == 1 || $this->session->userdata("@_user_role_id") == 2) : echo "display:none;";
                                                                                                                  endif; ?>" >' + task_counter + '</span>');
              }
            } else {
              $(".rounded-circle").empty('');
              $("#work_id").empty('');
              $("#task_manage_id").empty('');
              $("#my_task_id").empty('');
            }

          },
          error: function(xhr, status) {
            alert('Sorry, there was a problem!');
          }

        });
      }
    }

    
    function update_task_view_status() {
        var staff_id = "<?php echo $this->session->userdata("@_staff_id"); ?>";
        var user_role_id = "<?php echo $this->session->userdata("@_user_role_id"); ?>";
        var url = "<?php echo $base_url; ?>master/task_work/update_task_view_status";

        if (url != "") {

            $.ajax({
                url: url,
                data: {
                    "staff_id": staff_id,
                    "status": 2,
                },
                type: 'POST',
                //dataType : 'json',
                success: function(data) {
                    var data = JSON.parse(data);
                    var count_status = data["userdata"];
                    if (data["status"] == true) {} else {
                        // toaster(message_type = "Error", message_txt = data["message"], message_icone = "error");
                    }

                },
                error: function(xhr, status) {
                    alert('Sorry, there was a problem!');
                }

            });
        }
    }

    // function update_task_view_status() {
    //     var staff_id = "<?php echo $this->session->userdata("@_staff_id"); ?>";
    //     var user_role_id = "<?php echo $this->session->userdata("@_user_role_id"); ?>";
    //     var url = "<?php echo $base_url; ?>master/task_work/update_task_view_status";

    //     if (url != "") {

    //         $.ajax({
    //             url: url,
    //             data: {
    //                 "staff_id": staff_id,
    //                 "status": 2,
    //             },
    //             type: 'POST',
    //             //dataType : 'json',
    //             success: function(data) {
    //                 var data = JSON.parse(data);
    //                 var count_status = data["userdata"];
    //                 if (data["status"] == true) {
    //                     var my_flag = false;
    //                     // toaster(message_type = "Success", message_txt = data["message"], message_icone = "success");
    //                     $.each(count_status,function(key,val){
    //                         var task_view_status = count_status[key].task_view_status;
    //                         if(task_view_status==1)
    //                             my_flag = true;

    //                     });
    //                     // var reloads = [2000, 13000]
    //                     // if(my_flag==true){
    //                     //     setTimeout(function() {
    //                     //         location.reload();
    //                     //     }, 1000);
    //                     // }
    //                     if(user_role_id == 1 || user_role_id == 2){

    //                     }else{
    //                         ;(function () {
    //                         var reloads = [500],
    //                             storageKey = 'reloadIndex',
    //                             reloadIndex = parseInt(localStorage.getItem(storageKey), 10) || 0;

    //                         if (reloadIndex >= reloads.length || isNaN(reloadIndex)) {
    //                             localStorage.removeItem(storageKey);
    //                             return;
    //                         }

    //                         setTimeout(function(){
    //                             window.location.reload();
    //                         }, reloads[reloadIndex]);

    //                         localStorage.setItem(storageKey, parseInt(reloadIndex, 10) + 1);
    //                     }());
    //                 }


    //                 } else {
    //                     // toaster(message_type = "Error", message_txt = data["message"], message_icone = "error");
    //                 }

    //             },
    //             error: function(xhr, status) {
    //                 alert('Sorry, there was a problem!');
    //             }

    //         });
    //     }
    // }
  </script>
</body>

</html>
<?php

$this->benchmark->mark('end');
$page_time = $this->benchmark->elapsed_time('start', 'end');
//~ echo $page_time;
//~ echo "test";

?>